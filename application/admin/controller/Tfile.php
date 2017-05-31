<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Tfile extends Common
{
    //模板文件夹
    private $filepath;
    //风格名
    private $style;
    //风格属性
    private $style_info;
    //是否允许在线编辑模板
    private $tpl_edit;
    public function __construct()
    {
        $this->style = trim(input('style'));
        if (!preg_match('/([a-z0-9_\\-]+)/i', $this->style)) {
            $this->error('参数错误');
        }
        $this->style = str_replace(array('..\\', '../', './', '.\\', '/', '\\'), '', $this->style);
        $this->filepath = ROOT_PATH . 'template' . DIRECTORY_SEPARATOR . $this->style . DIRECTORY_SEPARATOR;
        if (file_exists($this->filepath . 'config.php')) {
            $this->style_info = (include $this->filepath . 'config.php');
            if (!isset($this->style_info['name'])) {
                $this->style_info['name'] = $this->style;
            }
        }
        $this->tpl_edit = 1;
        parent::__construct();
    }
    public function index()
    {
        $filepath = $this->filepath;
        $list = glob($filepath . '*');
        if (!empty($list)) {
            ksort($list);
        }
        $file_explan = $this->style_info['file_explan'];
        foreach ($file_explan as $k => $v) {
            if (!file_exists($filepath . $k)) {
                unset($file_explan[$k]);
            }
        }
        $this->style_info['file_explan'] = $file_explan;
        @file_put_contents($this->filepath . 'config.php', '<?php return ' . var_export($this->style_info, true) . ';?>');
        $this->assign('tpl_edit', $this->tpl_edit);
        $this->assign('style', $this->style);
        $this->assign('style_info', $this->style_info);
        $this->assign('file_explan', $file_explan);
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function updatefilename()
    {
        $data = input('post.');
        $file_explan = $data['file_explan'];
        if (!isset($this->style_info['file_explan'])) {
            $this->style_info['file_explan'] = array();
        }
        $this->style_info['file_explan'] = array_merge($this->style_info['file_explan'], $file_explan);
        @file_put_contents($this->filepath . 'config.php', '<?php return ' . var_export($this->style_info, true) . ';?>');
        $this->success('操作成功');
    }
    public function edit_file()
    {
        if (!$this->tpl_edit) {
            $this->error('参数错误');
        }
        $file = input('file') ? trim(input('file')) : '';
        if ($file) {
            preg_match('/^([a-zA-Z0-9])?([^.|-|_]+)/i', $file, $file_t);
            $file_t = $file_t[0];
        }
        if (substr($file, -4, 4) != 'html') {
            $this->error('文件不能修改');
        }
        $filepath = $this->filepath . $file;
        $is_write = 0;
        if (is_writable($filepath)) {
            $is_write = 1;
        }
        if (request()->isPost()) {
            $code = stripslashes(input('code'));
            if ($is_write == 1) {
                $code = str_replace('{PUBLIC}', '__PUBLIC__', $code);
                $code = str_replace('{ROOT}', '__ROOT__', $code);
                file_put_contents($filepath, htmlspecialchars_decode($code));
                $this->error('操作成功',url('Tfile/index',['style'=>$this->style]));
            } else {
                $this->error('文件不可写');
            }
        } else {
            if (file_exists($filepath)) {
                $data = new_html_special_chars(file_get_contents($filepath));
                $data = str_replace('__PUBLIC__', '{PUBLIC}', $data);
                $data = str_replace('__ROOT__', '{ROOT}', $data);
            } else {
                $this->error('文件不存在');
            }
        }
        $this->assign('data', $data);
        $this->assign('file', $file);
        $this->assign('style', $this->style);
        $this->assign('style_info', $this->style_info);
        return $this->fetch();
    }
    public function add_file()
    {
        if (!$this->tpl_edit) {
            $this->error('参数错误');
        }
        $filepath = $this->filepath;
        $is_write = 0;
        if (is_writable($filepath)) {
            $is_write = 1;
        }
        if (!$is_write) {
            $this->error('目录不可写');
        }
        if (request()->isPost()) {
            $name = trim(input('name'));
            if (!preg_match('/^[\\w]+$/i', $name)) {
                $this->error('只能为数字、字母、下划线。');
            }
            if (file_exists($this->filepath . $name . '.html')) {
                $this->error('模板已存在');
            }
            if ($is_write == 1) {
                @file_put_contents($filepath . $name . '.html', '');
                $this->success('添加成功', url('Tfile/index', array('style' => $this->style)));
            } else {
                $this->error('目录不可写');
            }
        }
        $this->assign('style', $this->style);
        $this->assign('style_info', $this->style_info);
        return $this->fetch();
    }
    public function delete_file()
    {
        $file = input('file');
        if (!$file) {
            $this->error('参数错误');
        }
        if (substr($file, -4, 4) != 'html') {
            $this->error('文件不能删除');
        }
        $filepath = $this->filepath . $file;
        if (file_exists($filepath)) {
            @unlink($filepath);
        }
        $this->success('删除成功');
    }
}