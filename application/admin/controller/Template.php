<?php
namespace app\admin\controller;

use think\Controller;
use think\Validate;
use think\Config;
use think\Db;
class Template extends Common
{
    private $filepath;
    public function __construct()
    {
        $this->filepath = ROOT_PATH . 'template' . DIRECTORY_SEPARATOR;
        parent::__construct();
    }
    public function index()
    {
        $list = template_list(1);
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function disable()
    {
        $style = trim(input('style'));
        if (!preg_match('/([a-z0-9_\\-]+)/i', $style)) {
            $this->error('参数错误');
        }
        $filepath = $this->filepath . $style . DIRECTORY_SEPARATOR . 'config.php';
        if (file_exists($filepath)) {
            $arr = (include $filepath);
            if (!isset($arr['disable'])) {
                $arr['disable'] = 1;
            } else {
                if ($arr['disable'] == 1) {
                    $arr['disable'] = 0;
                } else {
                    $arr['disable'] = 1;
                }
            }
            if (is_writable($filepath)) {
                file_put_contents($filepath, '<?php return ' . var_export($arr, true) . ';?>');
            } else {
                $this->error('文件不可写');
            }
        } else {
            $arr = array('name' => $style, 'disable' => 1, 'dirname' => $style);
            file_put_contents($filepath, '<?php return ' . var_export($arr, true) . ';?>');
        }
        $this->success('操作成功');
    }
    public function updatename()
    {
        $data = input('param.');
        if (!$data['name']) {
            $this->error('参数错误');
        }
        if (is_array($data['name'])) {
            foreach ($data['name'] as $key => $val) {
                $filepath = $this->filepath . $key . DIRECTORY_SEPARATOR . 'config.php';
                if (file_exists($filepath)) {
                    $arr = (include $filepath);
                    $arr['name'] = $val;
                } else {
                    $arr = array('name' => $val, 'disable' => 0, 'dirname' => $key);
                }
                @file_put_contents($filepath, '<?php return ' . var_export($arr, true) . ';?>');
            }
            $this->success('操作成功');
        } else {
            $this->error('参数错误');
        }
    }
}