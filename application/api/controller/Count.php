<?php
namespace app\api\controller;

use think\Controller;
use think\Db;
class Count extends Controller
{
    public function index()
    {
        $id = intval(input('id'));
        if (!$id) {
            echo "document.write(0);\r\n";
        }
        $check_exist = db('article')->where('id', $id)->field('id,catid')->find();
        if ($check_exist) {
            $r = db('hits')->where('contentid', $id)->find();
            if ($r) {
                $views = $r['views'] + 1;
                $yesterdayviews = date('Ymd', $r['updatetime']) == date('Ymd', strtotime('-1 day')) ? $r['dayviews'] : $r['yesterdayviews'];
                $dayviews = date('Ymd', $r['updatetime']) == date('Ymd', request()->time()) ? $r['dayviews'] + 1 : 1;
                $weekviews = date('YW', $r['updatetime']) == date('YW', request()->time()) ? $r['weekviews'] + 1 : 1;
                $monthviews = date('Ym', $r['updatetime']) == date('Ym', request()->time()) ? $r['monthviews'] + 1 : 1;
                $data = array('views' => $views, 'yesterdayviews' => $yesterdayviews, 'dayviews' => $dayviews, 'weekviews' => $weekviews, 'monthviews' => $monthviews, 'updatetime' => request()->time());
                db('hits')->where('contentid',$id)->update($data);
                echo "document.write('" . $views . "');\r\n";
            } else {
                db('hits')->insert(['contentid' => $id, 'catid' => $check_exist['catid'], 'views' => 1, 'dayviews' => 1, 'weekviews' => 1, 'monthviews' => 1, 'updatetime' => request()->time()]);
                echo "document.write(1);\r\n";
            }
        } else {
            echo "document.write(0);\r\n";
        }
    }
}