<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Article extends Common
{
    public $prefix;
    public function __construct()
    {
        parent::__construct();
        $config = Config::get('database');
        $this->prefix = $config['prefix'];
    }
    public function index()
    {
        $q = input('q');
        $username = trim(input('username'));
        $catid = input('catid');
        if ($q) {
            $map['title'] = ['like', '%' . strip_tags(trim($q)) . '%'];
        }
        if ($catid) {
            $map['catid'] = intval($catid);
        }
        if ($username) {
            $map['username'] = $username;
        }
        if (empty($map)) {
            $map = 1;
        }
        $article_list = db('article')->where($map)->order('listorder desc,id desc')->paginate(10, false, ['query' => ['q' => $q, 'username' => $username, 'catid' => $catid]]);
        $page = $article_list->render();
        $this->assign('q', $q);
        $this->assign('username', $username);
        $this->assign('catid', $catid);
        $this->assign('article_list', $article_list);
        $this->assign('cate_list', model('category')->getTreeList());
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $this->add_content($data);
            if (isset($data['dosubmit'])) {
                $this->success('添加成功', 'Article/index');
            } else {
                $this->success('添加成功');
            }
        } else {
            $catid = input('catid');
            $this->assign('list', model('category')->getTreeList());
            $this->assign('catid', intval($catid));
            $this->assign('position_list', db('position')->select());
            return $this->fetch();
        }
    }
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $this->edit_content($data);
            $this->success('修改成功', 'Article/index');
        } else {
            $id = intval($_GET['id']);
            if (!$id) {
                $this->error('非法参数');
            }
            $r = db('article')->alias('a')->join('__ARTICLE_DATA__ d ', 'a.id= d.id')->where('a.id', $id)->find();
            if (!$r) {
                $this->error('文章不存在');
            }
            $r['posids'] = string2array($r['posids']);
            $this->assign('list', model('category')->getTreeList());
            $this->assign('result', new_html_entity_decode($r));
            $this->assign('position_list', db('position')->select());
            return $this->fetch();
        }
    }
    public function delete()
    {
        $data = input('param.');
        if (!isset($data['id']) || empty($data['id'])) {
            $this->error('参数错误');
        }
        if (is_array($data['id'])) {
            foreach ($data['id'] as $v) {
                $v = intval($v);
                db('article')->where('id', $v)->delete();
                db('article_data')->where('id', $v)->delete();
                db('position_data')->where('contentid', $v)->delete();
				db('hits')->where('contentid', $v)->delete();
            }
            $this->success('删除成功');
        } else {
            $id = intval($data['id']);
            if (!$id) {
                $this->error('非法参数');
            }
            db('article')->where('id', $id)->delete();
            db('article_data')->where('id', $id)->delete();
            db('position_data')->where('contentid', $id)->delete();
			db('hits')->where('contentid', $id)->delete();
            $this->success('删除成功');
        }
        $this->success('删除成功');
    }
    public function deleteAll()
    {
        Db::execute('truncate ' . $this->prefix . 'article');
        Db::execute('truncate ' . $this->prefix . 'article_data');
        Db::execute('truncate ' . $this->prefix . 'tag');
        Db::execute('truncate ' . $this->prefix . 'tag_data');
        Db::execute('truncate ' . $this->prefix . 'position_data');
		Db::execute('truncate ' . $this->prefix . 'hits');
        $this->success('删除成功');
    }
    public function listorder()
    {
        $data = input('post.');
        if (!$data) {
            $this->error('参数错误');
        }
        foreach ($data['listorder'] as $k => $v) {
            $k = intval($k);
            db('article')->where('id', $k)->update(['listorder' => $v]);
        }
        $this->success('更新成功');
    }
    public function status()
    {
        $data = input('post.');
        if (!isset($data['id']) || empty($data['id'])) {
            $this->error('参数错误');
        }
        foreach ($data['id'] as $v) {
            $v = intval($v);
            $status = db('article')->where('id', $v)->value('status');
            $status = $status ? 0 : 1;
            db('article')->where('id', $v)->update(['status' => $status]);
        }
        $this->success('更新成功');
    }
    private function add_content($data)
    {
        if (!intval($data['catid'])) {
            $this->error('请选择栏目');
        }
        if (empty($data['title'])) {
            $this->error('标题必须填写');
        }
        if (!isset($data['content'])) {
            $this->error('内容必须填写');
        }
        $data_1['catid'] = $data['catid'];
        $data_1['title'] = safe_replace($data['title']);
        if (isset($data['thumb'])) {
            $data_1['thumb'] = $data['thumb'];
        }
        $data['content'] = auto_save_image($data['content']);
        //自动提取摘要
        if ($data['description'] == '') {
            $description_length = 200;
            $data['description'] = str_cut(str_replace(["'", "\r\n", "\t", '&ldquo;', '&rdquo;', '&nbsp;'], '', strip_tags(stripslashes($data['content']))), $description_length);
            $data['description'] = addslashes($data['description']);
        }
        //自动提取缩略图
        if (!isset($data['thumb'])) {
            $auto_thumb_no = 0;
            if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\\.(gif|jpg|jpeg|bmp|png))\\2/i", stripslashes($data['content']), $matches)) {
                $data_1['thumb'] = $matches[3][$auto_thumb_no];
            }
        }
        $data_1['description'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['description']);
        $data_1['keywords'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['keywords']);
        $data_1['inputtime'] = $data_1['updatetime'] = request()->time();
        $data_1['username'] = session('fivecms_admin_username');
        $data_1['status'] = 1;
        $data_2['content'] = $data['content'];
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
        $url = __ROOT__ . '/index.php/article/show.html?id=' . $id;
        db('article')->where('id', $id)->update(['url' => $url]);
        $data_2['id'] = $id;
        db('article_data')->insert($data_2);
        if (isset($data['keywords'])) {
            go_to_tag($id, $data['keywords']);
        }
        if (isset($data['posid'])) {
            foreach ($data['posid'] as $v) {
                db('position_data')->insert(['posid' => $v, 'contentid' => $id, 'inputtime' => request()->time(), 'catid' => $data['catid']]);
            }
            db('article')->where('id', $id)->update(['posids' => array2string($data['posid'])]);
        }
        return true;
    }
    private function edit_content($data)
    {
        if (!intval($data['catid'])) {
            $this->error('请选择栏目');
        }
        if (empty($data['title'])) {
            $this->error('标题必须填写');
        }
        if (!isset($data['content'])) {
            $this->error('内容必须填写');
        }
        $data_1['catid'] = $data['catid'];
        $data_1['title'] = safe_replace($data['title']);
        if (isset($data['thumb'])) {
            $data_1['thumb'] = $data['thumb'];
        }
        $data['content'] = auto_save_image($data['content']);
        //自动提取摘要
        if ($data['description'] == '') {
            $description_length = 200;
            $data['description'] = str_cut(str_replace(["'", "\r\n", "\t", '&ldquo;', '&rdquo;', '&nbsp;'], '', strip_tags(stripslashes($data['content']))), $description_length);
            $data['description'] = addslashes($data['description']);
        }
        //自动提取缩略图
        if (!isset($data['thumb'])) {
            $auto_thumb_no = 0;
            if (preg_match_all("/(src)=([\"|']?)([^ \"'>]+\\.(gif|jpg|jpeg|bmp|png))\\2/i", stripslashes($data['content']), $matches)) {
                $data_1['thumb'] = $matches[3][$auto_thumb_no];
            }
        }
        $data_1['description'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['description']);
        $data_1['keywords'] = str_replace(['/', '\\', '#', '.', "'"], ' ', $data['keywords']);
        $data_1['updatetime'] = request()->time();
        $data_1['username'] = session('fivecms_admin_username');
        $data_1['status'] = 1;
        $data_2['content'] = $data['content'];
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
        db('article')->where('id', $id)->update($data_1);
        if (isset($data_2)) {
            db('article_data')->where('id', $id)->update($data_2);
        }
        if (isset($data['keywords'])) {
            go_to_tag($id, $data['keywords']);
        }
        if (isset($data['posid'])) {
            db('position_data')->where('contentid', $id)->where('posid', 'not in', $data['posid'])->delete();
            foreach ($data['posid'] as $v) {
                $position_data_check = db('position_data')->where(['posid' => $v, 'contentid' => $id])->find();
                if (!$position_data_check) {
                    db('position_data')->insert(['posid' => $v, 'contentid' => $id, 'inputtime' => request()->time(), 'catid' => $data['catid']]);
                }
            }
            db('article')->where('id', $id)->update(['posids' => array2string($data['posid'])]);
        } else {
            db('article')->where('id', $id)->update(['posids' => '']);
            db('position_data')->where('contentid', $id)->delete();
        }
        return true;
    }
}