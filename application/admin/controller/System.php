<?php
namespace app\admin\controller;

use think\Controller;
class System extends Common
{
    public function set()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['isthumb'] = isset($data['isthumb']) ? 1 : 0;
            $data['iswater'] = isset($data['iswater']) ? 1 : 0;
            $data['width'] = intval($data['width']);
            $data['height'] = intval($data['height']);
            if ($data['width'] == 0) {
                $data['width'] = 320;
            }
            if ($data['height'] == 0) {
                $data['height'] = 320;
            }
            $data['pwater'] = intval($data['pwater']);
            $data['regpoint'] = intval($data['regpoint']) > 0 ? intval($data['regpoint']) : 0;
            $data['addpoint'] = intval($data['addpoint']) > 0 ? intval($data['addpoint']) : 0;
            $data['delpoint'] = intval($data['delpoint']) > 0 ? intval($data['delpoint']) : 0;
            $data['daypoint'] = intval($data['daypoint']) > 0 ? intval($data['daypoint']) : 0;
            if (!$data['template']) {
                $data['template'] = 'default';
            }
            $filepath = APP_PATH . 'index/config.php';
            if (file_exists($filepath)) {
                $arr = (include $filepath);
                $arr['template']['view_path'] = './template/' . $data['template'] . '/';
                if (is_writable($filepath)) {
                    @file_put_contents($filepath, '<?php return ' . var_export($arr, true) . ';?>');
                } else {
                    $this->error('config.php文件不可写');
                }
            }
            db('system')->where('id', 1)->update($data);
            $this->success('设置成功');
        } else {
            $detail = db('system')->where('id', 1)->find();
            $this->assign('detail', $detail);
            $list = template_list(1);
            $this->assign('list', $list);
            return $this->fetch();
        }
    }
}