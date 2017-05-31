<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Index extends Common
{
    public function index()
    {
        $seo = seo($this->seo['title'], $this->seo['keywords'], $this->seo['description']);
        $this->assign('seo', $seo);
        return $this->fetch($this->template . 'index.html');
    }
}