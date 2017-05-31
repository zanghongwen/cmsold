<?php
/**
 * 模板风格列表
 * @param integer $disable 是否显示停用的{1:是,0:否}
 */
function template_list($disable = 0) {
	
		$list = glob(ROOT_PATH.'template'.DIRECTORY_SEPARATOR.'*', GLOB_ONLYDIR);
		$arr =  array();
		foreach ($list as $key=>$v) {
			$dirname = basename($v);
			if (file_exists($v.DIRECTORY_SEPARATOR.'config.php')) {
				$arr[$key] = include $v.DIRECTORY_SEPARATOR.'config.php';
				if (!$disable && isset($arr[$key]['disable']) && $arr[$key]['disable'] == 1) {
					unset($arr[$key]);
					continue;
				}
			} else {
				$arr[$key]['name'] = $dirname;
			}
			$arr[$key]['dirname']=$dirname;
		}
		return $arr;
	}