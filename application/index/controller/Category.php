<?php
namespace app\index\controller;

use think\Controller;
class Category extends Common
{
    
    public function lists()
    {
        $catid = intval(input('catid'));
        if (!$catid) {
            $this->error('参数错误');
        }
		$this->assign('catid', $catid);
		
        $cate_db = db('category');
        /*栏目详情start*/
        $cate_info = $cate_db->where('catid', $catid)->find();
        if (!$cate_info) {
            $this->error('栏目不存在');
        }
        $this->assign('category', new_html_entity_decode($cate_info));
        /*栏目详情end*/
        
        /*文章列表start*/
        $article_db = db('article');
        $article_list = $article_db->where('catid', 'in', catid_str($catid))->where('status', 1)->order('listorder desc,id desc')->paginate(10, false, ['query' => ['catid' => $catid]]);
        $page = $article_list->render();
        $this->assign('article_list', $article_list);
        $this->assign('page', $page);
        /*文章列表end*/
        /*seo start*/
        $seo = seo($cate_info['catname'] . '-' . $this->seo['title'], $cate_info['keywords'], $cate_info['description']);
        $this->assign('seo', $seo);
        /*seo end*/
        /*模板start*/
        if ($cate_info['ispart'] == 1) {
            return $this->fetch($this->template.$cate_info['category']);
        } else {
            return $this->fetch($this->template.$cate_info['list']);
        }
        /*模板end*/
    }
   
}