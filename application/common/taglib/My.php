<?php
namespace app\Common\taglib;

use think\template\TagLib;
class My extends Taglib
{
    // 标签定义
    protected $tags = [
	'clist' => ['attr' => 'pid,num,order,name', 'close' => 1], //分类列表
	'alist' => ['attr' => 'cateid,num,order,name', 'close' => 1],//文章列表
	'plist' => ['attr' => 'cateid,num,order,name', 'close' => 1],//推荐列表
	'rlist' => ['attr' => 'cateid,num,order,name', 'close' => 1],//排行列表  
	'tlist' => ['attr' => 'num,order,name', 'close' => 1], //tag列表
	'flist' => ['attr' => 'num,order,name', 'close' => 1]//友情链接
	];
	
	public function tagClist($tag, $content)
    {
        $pid = isset($tag['pid']) ? $tag['pid'] : 0;
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'catid desc';
        $parseStr = $parseStr = '<?php ';
        $parseStr .= '$__CATEGORY__ = db(\'category\')->where(\'pid\',' . $pid . ')->where(\'ishidden\',0)->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '?>{volist name="__CATEGORY__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
    public function tagAlist($tag, $content)
    {
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'id desc';
        $where = 'status=1';
        if (isset($tag['catid']) && intval($tag['catid'])) {
            $where .= ' and catid in (' . catid_str($tag['catid']) . ')';
        }
        $parseStr = $parseStr = '<?php ';
		//$parseStr .= '$__LIST__ =db(\'article\')->alias(\'a\')->join(\'__CATEGORY__ c \',\'c.catid= a.catid\')->field(\'a.*,c.catname,c.url as caturl\')->where("' . $where . '")->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '$__LIST__ =db(\'article\')->where("' . $where . '")->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '?>{volist name="__LIST__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
    public function tagPlist($tag, $content)
    {
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'inputtime desc';
        $where = 'p.posid=' . $tag['posid'];
        if (isset($tag['catid']) && intval($tag['catid'])) {
            //$where .= 'and p.catid in (' . catid_str($tag['catid']) . ') ';
			$where .= 'and p.catid ='.$tag['catid'];
        }
        $parseStr = $parseStr = '<?php ';
        $parseStr .= '$__LIST__ = db(\'position_data\')->alias(\'p\')->join(\'__ARTICLE__ a\',\'p.contentid= a.id\')->field(\'p.posid,a.title,a.catid,a.url,a.inputtime,a.thumb,a.keywords,a.description,a.username\')->where("' . $where . '")->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '?>{volist name="__LIST__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
    public function tagTlist($tag, $content)
    {
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'tagid desc';
        $parseStr = $parseStr = '<?php ';
        $parseStr .= '$__LIST__ = db(\'tag\')->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '?>{volist name="__LIST__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
    public function tagFlist($tag, $content)
    {
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'id desc';
        if (isset($tag['logo']) && intval($tag['logo'])) {
            $where = "logo != ''";
        } else {
            $where = "logo  = ''";
        }
        $parseStr = $parseStr = '<?php ';
        $parseStr .= '$__LIST__ = db(\'flink\')->where("' . $where . '")->order("' . $order . '")->limit(' . $num . ')->select();';
        $parseStr .= '?>{volist name="__LIST__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
    public function tagRlist($tag, $content)
    {
        $num = $tag['num'];
        $order = isset($tag['order']) ? $tag['order'] : 'views desc';
        $parseStr = $parseStr = '<?php ';
        if (isset($tag['catid']) && intval($tag['catid'])) {
            $where = 'a.catid in (' . catid_str($tag['catid']) . ')';
            $parseStr .= '$__LIST__ = db(\'hits\')->alias(\'h\')->join(\'__ARTICLE__ a\',\'h.contentid= a.id\')->field(\'h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username\')->where("' . $where . '")->order("' . $order . '")->limit(' . $num . ')->select();';
        } else {
            $parseStr .= '$__LIST__ = db(\'hits\')->alias(\'h\')->join(\'__ARTICLE__ a\',\'h.contentid= a.id\')->field(\'h.*,a.title,a.url,a.inputtime,a.keywords,a.description,a.username\')->order("' . $order . '")->limit(' . $num . ')->select();';
        }
        $parseStr .= '?>{volist name="__LIST__" id="' . $tag['name'] . '"}';
        $parseStr .= $content;
        $parseStr .= '{/volist}';
        //解析模板
        $this->tpl->parse($parseStr);
        return $parseStr;
    }
}