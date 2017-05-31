<?php
namespace app\api\controller;

use think\Controller;
use think\Db;
class Upload extends Controller
{
    public $webconfig;
    protected function _initialize()
    {
        $this->webconfig = db('system')->where('id', 1)->find();
    }
    public function upimg()
    {
        $file = request()->file('file');
        $info = $file->move('./uploads/');
        if (!empty($info)) {
            $attachment['filename'] = $info->getFilename();
            $attachment['filepath'] = 'uploads/' . pathConvert($info->getSaveName());
            $attachment['fileext'] = $info->getExtension();
            $attachment['filesize'] = $info->getSize();
            $attachment['inputtime'] = request()->time();
            $this->pic_check($attachment['filepath']);
            db('attachment')->insert($attachment);
            $data['url'] = __ROOT__ . '/uploads/' . pathConvert($info->getSaveName());
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        return json($data);
    }
    public function ueditor()
    {
        $config = ["savePath" => "uploads/", "maxSize" => 1024, "allowFiles" => [".gif", ".png", ".jpg", ".jpeg", ".bmp"]];
        $up = new \org\Uploader("upfile", $config);
        $info = $up->getFileInfo();
        $this->pic_check($info['url']);
        db('attachment')->insert(array('filename' => $info['name'], 'filepath' => $info['url'], 'fileext' => str_replace('.', '', $info['type']), 'filesize' => $info['size'], 'inputtime' => request()->time()));
        echo json_encode($info);
    }
    private function pic_check($url)
    {
        if ($this->webconfig['isthumb']) {
            $image = \org\Image::open('./' . $url);
            $image->thumb($this->webconfig['width'], $this->webconfig['height'])->save('./' . $url);
        }
        if ($this->webconfig['iswater']) {
            $image = \org\Image::open('./' . $url);
            if ($this->webconfig['pwater'] == 0) {
                $this->webconfig['pwater'] = rand(1, 9);
            }
            $image->water('./public/admin/water/water.png', $this->webconfig['pwater'])->save('./' . $url);
        }
    }
	
  public function headpic()
    {
        $file = request()->file('file');
        $info = $file->move('./uploads/headpic/');
        if (!empty($info)) {
            $filepath = 'uploads/headpic/' . pathConvert($info->getSaveName());
            $image = \org\Image::open('./' . $filepath);
            $image->thumb(200, 200)->save('./' . $filepath);
            $data['url'] = __ROOT__ . '/uploads/headpic/' . pathConvert($info->getSaveName());
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        return json($data);
    }	
}