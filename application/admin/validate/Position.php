<?php
namespace app\admin\validate;

use think\Validate;
class Position extends Validate
{
    protected $rule = ['name' => 'require',
					  ];
					  
    protected $message = ['name.require' => '推荐位名称必须填写',
						 ];
						 
    
}