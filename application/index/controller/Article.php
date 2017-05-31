<?php
namespace app\index\controller;

use think\Controller;
class Article extends Common
{
    public function show()
    {
        $id = intval(input('id'));
        if (!$id) {
            $this->error('参数错误');
        }
        $cate_db = db('category');
        $article_db = db('article');
        /*文章详情start*/
        $r = db('article')->alias('a')->join('__ARTICLE_DATA__ d ', 'a.id= d.id')->where('a.id', $id)->where('a.status', 1)->find();
        if (!$r) {
            $this->error('文章不存在');
        }
        $gallery = string2array($r['gallery']);
        $this->assign('gallery', $gallery);
        $keywords = $r['keywords'];
        $this->assign('keywords', stringToArray($keywords));
        $this->assign('article', new_html_entity_decode($r));
        /*文章详情end*/
        /*栏目详情start*/
        $catid = $r['catid'];
        $this->assign('catid', $catid);
        $cate_info = $cate_db->where('catid', $catid)->find();
        $this->assign('category', new_html_entity_decode($cate_info));
        /*栏目详情end*/
        /*上一篇start*/
        $previous_page = $article_db->where('catid', $catid)->where('status', 1)->where('id', 'lt', $id)->order('id desc')->limit('1')->find();
        if (empty($previous_page)) {
            $previous_page = ['title' => '第一篇', 'thumb' => __ROOT__ . '/public/images/nopic_small.gif', 'url' => 'javascript:alert(\'第一篇\');'];
        }
        $this->assign('previous_page', $previous_page);
        /*上一篇end*/
        /*下一篇start*/
        $next_page = $article_db->where('catid', $catid)->where('status', 1)->where('id', 'gt', $id)->order('id asc')->limit('1')->find();
        if (empty($next_page)) {
            $next_page = ['title' => '最后一篇', 'thumb' => __ROOT__ . '/public/images/nopic_small.gif', 'url' => 'javascript:alert(\'最后一篇\');'];
        }
        $this->assign('next_page', $next_page);
        /*下一篇end*/
        /*seo start*/
        $seo = seo($r['title'] . '-' . $this->seo['title'], $r['keywords'], $r['description']);
        $this->assign('seo', $seo);
        /*seo end*/
        /*模板start*/
        return $this->fetch($this->template . $cate_info['show']);
        /*模板end*/
    }
}