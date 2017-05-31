<?php
namespace app\index\controller;

use think\Controller;
class Tag extends Common
{
    
    public function tag()
    {
        $tag = input('get.tag');
        $tag = FilterSearch(urldecode($tag));
        $r = db('tag')->where('tag', $tag)->find();
        if (!$r) {
            $this->error('TAG不存在！', __ROOT__);
        }
		$this->assign('tag', $tag);
        $tagid = $r['tagid'];
        $list = db('tag_data')->where('tagid', $tagid)->paginate(10);
        if (!empty($list)) {
            $article_list = [];
            foreach ($list as $k => $v) {
                $article_info = db('article')->where('id', $v['contentid'])->where('status',1)->find();
                $article_list[$k]['title'] = str_replace($tag, '<font color="#f00">' . $tag . '</font>', $article_info['title']);
                $article_list[$k]['description'] = str_replace($tag, '<font color="#f00">' . $tag . '</font>', $article_info['description']);
                $article_list[$k]['thumb'] = $article_info['thumb'];
                $article_list[$k]['inputtime'] = $article_info['inputtime'];
                $article_list[$k]['url'] = $article_info['url'];
				$article_list[$k]['keywords'] = $article_info['keywords'];
				$article_list[$k]['id'] = $article_info['id'];
				$article_list[$k]['catid'] = $article_info['catid'];
            }
        }
        $page = $list->render();
        $this->assign('article_list', $article_list);
        $this->assign('page', $page);
        $seo = seo($tag . '-' . $this->seo['title'], $this->seo['keywords'], $this->seo['description']);
        $this->assign('seo', $seo);
        /*点击数start*/
        db('tag')->where('tag', $tag)->setInc('hits');
        /*点击数end*/
        return $this->fetch($this->template.'tag.html');
    }
    public function tag_list()
    {
        $seo = seo($this->seo['title'], $this->seo['keywords'], $this->seo['description']);
        $this->assign('seo', $seo);
        return $this->fetch($this->template.'tag_list.html');
    }
}