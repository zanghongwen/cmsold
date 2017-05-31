<?php
namespace app\user\controller;

use think\Controller;
use think\Db;
class Index extends Controller
{
    public $userid, $userinfo, $headpic, $webconfig;
    protected function _initialize()
    {
        if (!session('fivecms_user_userid') || !session('fivecms_user_username') || request()->time() - session('fivecms_user_logintime') > 2 * 60 * 60) {
            $this->redirect(url('Login/index'));
        }
        $this->userid = session('fivecms_user_userid');
        $this->userinfo = db('user')->where('userid', $this->userid)->find();
        $headpic = $this->userinfo['headpic'];
        $this->headpic = $headpic ? $headpic : __ROOT__ . '/public/images/headpic.png';
        $this->webconfig = db('system')->where('id', 1)->find();
    }
    public function logout()
    {
        session('fivecms_user_username', null);
        session('fivecms_user_userid', null);
        session('fivecms_user_lasttime', null);
        session('fivecms_user_logintime', null);
        session('fivecms_user_lastip', null);
        $this->success('退出成功', 'Login/index');
    }
    public function index()
    {
        $this->assign('headpic', $this->headpic);
        return $this->fetch();
    }
    public function info()
    {
        $info = $this->userinfo;
        $this->assign('info', new_html_entity_decode($info));
        return $this->fetch();
    }
    public function detail()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['email'] = is_email($data['email']);
            db('user')->where('userid', $this->userid)->update($data);
            $this->success('修改成功');
        } else {
            $info = $this->userinfo;
            $this->assign('info', new_html_entity_decode($info));
            return $this->fetch();
        }
    }
    public function password()
    {
        if (request()->isPost()) {
            $password_o = is_password(input('password_o'));
            $password_r = is_password(input('password_r'));
            $password_n = is_password(input('password_n'));
            $r = db('user')->where('userid', $this->userid)->field('password,encrypt')->find();
            if ($password_n == $password_o) {
                $this->error('新密码与旧密码一致');
            }
            if ($password_n != $password_r) {
                $this->error('新密码与确认新密码不一致');
            }
            if ($r['password'] != five_password($password_o, $r['encrypt'])) {
                $this->error('旧密码错误');
            }
            $encrypt = five_random_str();
            $password = five_password($password_n, $encrypt);
            $data = ['encrypt' => $encrypt, 'password' => $password];
            db('user')->where('userid', $this->userid)->update($data);
            $this->success('修改成功');
        } else {
            return $this->fetch();
        }
    }
    public function headpic()
    {
        if (request()->isPost()) {
            $data = input('post.');
            db('user')->where('userid', $this->userid)->update($data);
            $this->success('修改成功');
        } else {
            $this->assign('headpic', $this->headpic);
            return $this->fetch();
        }
    }
    public function article_list()
    {
        $q = input('q');
        $catid = input('catid');
        $map['username'] = session('fivecms_user_username');
        if (!empty($q)) {
            $map['title'] = ['like', '%' . strip_tags(trim($q)) . '%'];
        }
        if ($catid) {
            $map['catid'] = intval($catid);
        }
        $article_list = db('article')->where($map)->order('listorder desc,id desc')->paginate(10, false, ['query' => ['q' => $q, 'catid' => $catid]]);
        $page = $article_list->render();
        $this->assign('q', $q);
        $this->assign('catid', $catid);
        $this->assign('article_list', $article_list);
        $cate_list = db('category')->order('listorder desc')->select();
        $this->assign('cate_list', cTree($cate_list));
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function article_add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $this->add_content($data);
            $addpoint = db('system')->where('id', 1)->value('addpoint');
            db('user')->where('userid', $this->userid)->setInc('point', $addpoint);
            $this->success('添加成功');
        } else {
            $list = db('category')->order('listorder desc')->select();
            $this->assign('list', cTree($list));
            return $this->fetch();
        }
    }
    public function article_edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $this->edit_content($data);
            $this->success('修改成功');
        } else {
            $id = intval(input('id'));
            if (!$id) {
                $this->error('非法参数');
            }
            $r1 = db('article')->where(['id' => $id, 'username' => session('fivecms_user_username')])->find();
            $r2 = db('article_data')->where('id', $id)->find();
            if (!$r1 || !$r2) {
                $this->error('文章不存在');
            }
            $info = array_merge($r1, $r2);
            $info = array_map('htmlspecialchars_decode', $info);
            $list = db('category')->order('listorder desc')->select();
            $this->assign('list', cTree($list));
            $this->assign('info', $info);
            return $this->fetch();
        }
    }
    public function article_delete()
    {
        $id = intval(input('id'));
        if (!$id) {
            $this->error('非法参数');
        }
        db('article')->where(['id' => $id, 'username' => session('fivecms_user_username')])->delete();
        db('article_data')->where('id', $id)->delerte();
        $point = db('user')->where('userid', $this->userid)->value('point');
        $delpoint = db('system')->where('id', 1)->value('delpoint');
        if ($point > $delpoint) {
            db('user')->where('userid', $this->userid)->setDec('point', $delpoint);
        }
        $this->success('删除成功');
    }
    private function add_content($data)
    {
        if (!intval($data['catid'])) {
            $this->error('请选择栏目');
        }
        $issend = db('category')->where('catid', $data['catid'])->value('issend');
        if (!$issend) {
            $this->error('不允许发表');
        }
        if (empty($data['title'])) {
            $this->error('标题必须填写');
        }
        $data_1['catid'] = $data['catid'];
        $data_1['title'] = safe_replace($data['title']);
        $data_1['inputtime'] = $data_1['updatetime'] = request()->time();
        $data_1['username'] = session('fivecms_user_username');
        $data_1['status'] = 1;
        if (isset($data['thumb'])) {
            $data_1['thumb'] = $data['thumb'];
        }
        if (isset($data['content'])) {
            $data['content'] = auto_save_image($data['content']);
        }
        //自动提取摘要
        if ($data['description'] == '' && isset($data['content'])) {
            $description_length = 200;
            $data['description'] = str_cut(str_replace(["'", "\r\n", "\t", '&ldquo;', '&rdquo;', '&nbsp;'], '', strip_tags(stripslashes($data['content']))), $description_length);
            $data['description'] = addslashes($data['description']);
        }
        //自动提取缩略图
        if (!isset($data['thumb']) && isset($data['content'])) {
            $auto_thumb_no = 0;
            if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\\.(gif|jpg|jpeg|bmp|png))\\2/i", stripslashes($data['content']), $matches)) {
                $data_1['thumb'] = $matches[3][$auto_thumb_no];
            }
        }
        $data_1['description'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['description']);
        $data_1['keywords'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['keywords']);
        $data_1['inputtime'] = $data_1['updatetime'] = request()->time();
        $data_1['username'] = session('fivecms_user_username');
        $data_1['status'] = 1;
        if (isset($data['content'])) {
            $data_2['content'] = $data['content'];
        }
        if (isset($data['gallery'])) {
            if (count($data['gallery']) > 20) {
                $this->error('组图图片不能超过20张');
            }
            $data_2['gallery'] = array2string($data['gallery']);
        }
        $id = db('article')->insertGetId($data_1);
        if (!$id) {
            return FALSE;
        }
        $url = __ROOT__ . '/index.php/article/show.html?catid=' . $data['catid'] . '&id=' . $id;
        db('article')->where('id', $id)->update(['url' => $url]);
        $data_2['id'] = $id;
        db('article_data')->insert($data_2);
        if (isset($data['keywords'])) {
            go_to_tag($id, $data['keywords']);
        }
        return true;
    }
    private function edit_content($data)
    {
        if (!intval($data['catid'])) {
            $this->error('请选择栏目');
        }
        $issend = db('category')->where('catid', $data['catid'])->value('issend');
        if (!$issend) {
            $this->error('不允许发表');
        }
        if (empty($data['title'])) {
            $this->error('标题必须填写');
        }
        $data_1['catid'] = $data['catid'];
        $data_1['title'] = safe_replace($data['title']);
        if (isset($data['thumb'])) {
            $data_1['thumb'] = $data['thumb'];
        }
        if (isset($data['content'])) {
            $data['content'] = auto_save_image($data['content']);
        }
        //自动提取摘要
        if ($data['description'] == '' && isset($data['content'])) {
            $description_length = 200;
            $data['description'] = str_cut(str_replace(["'", "\r\n", "\t", '&ldquo;', '&rdquo;', '&nbsp;'], '', strip_tags(stripslashes($data['content']))), $description_length);
            $data['description'] = addslashes($data['description']);
        }
        //自动提取缩略图
        if (!isset($data['thumb']) && isset($data['content'])) {
            $auto_thumb_no = 0;
            if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\\.(gif|jpg|jpeg|bmp|png))\\2/i", stripslashes($data['content']), $matches)) {
                $data_1['thumb'] = $matches[3][$auto_thumb_no];
            }
        }
        $data_1['description'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['description']);
        $data_1['keywords'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['keywords']);
        $data_1['updatetime'] = request()->time();
        $data_1['username'] = session('fivecms_user_username');
        $data_1['status'] = 1;
        if (isset($data['content'])) {
            $data_2['content'] = $data['content'];
        }
        if (isset($data['gallery'])) {
            if (count($data['gallery']) > 20) {
                $this->error('组图图片不能超过20张');
            }
            $data_2['gallery'] = array2string($data['gallery']);
        }
        $id = intval($data['id']);
        if (!$id) {
            return false;
        }
        db('article')->where('id', $id)->where('username', session('fivecms_user_username'))->update($data_1);
        db('article_data')->where('id', $id)->update($data_2);
        if (isset($data['keywords'])) {
            go_to_tag($id, $data['keywords']);
        }
        return true;
    }
}