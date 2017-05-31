<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
	protected function initialize()
    {
       
        parent::initialize();
    }

	public  function getTreeList(){
		
		$list = $this->order('listorder desc')->select();
		$list=cTree($list);
		return $list;
		}
	
	
	
}