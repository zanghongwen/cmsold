<?php
function FilterSearch($keyword)
{
    $keyword = preg_replace("/[\"\r\n\t\$\\><']/", '', $keyword);
    if ($keyword != stripslashes($keyword)) {
        return '';
    } else {
        return $keyword;
    }
}
function seo($title = '', $keywords = '', $description = '')
{
    if (!empty($title)) {
        $title = strip_tags($title);
    }
    if (!empty($description)) {
        $description = strip_tags($description);
    }
    if (!empty($keywords)) {
        $description = strip_tags($keywords);
    }
    $seo['keywords'] = $keywords;
    $seo['description'] = $description;
    $seo['title'] = $title;
    foreach ($seo as $k => $v) {
        $seo[$k] = str_replace(array("\n", "\r"), '', $v);
    }
    return $seo;
}
function dump($var, $echo = true, $label = null, $strict = true)
{
    $label = $label === null ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = "<pre>" . $label . htmlspecialchars($output, ENT_QUOTES) . "</pre>";
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace("/\\]\\=\\>\n(\\s+)/m", "] => ", $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo $output;
        return null;
    } else {
        return $output;
    }
}
/**
 * 返回经addslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_addslashes($string)
{
    if (!is_array($string)) {
        return addslashes($string);
    }
    foreach ($string as $key => $val) {
        $string[$key] = new_addslashes($val);
    }
    return $string;
}
/**
 * 返回经stripslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_stripslashes($string)
{
    if (!is_array($string)) {
        return stripslashes($string);
    }
    foreach ($string as $key => $val) {
        $string[$key] = new_stripslashes($val);
    }
    return $string;
}
/**
 * 返回经htmlspecialchars处理过的字符串或数组
 * @param $obj 需要处理的字符串或数组
 * @return mixed
 */
function new_html_special_chars($string)
{
    $encoding = 'utf-8';
    if (!is_array($string)) {
        return htmlspecialchars($string, ENT_QUOTES, $encoding);
    }
    foreach ($string as $key => $val) {
        $string[$key] = new_html_special_chars($val);
    }
    return $string;
}
function new_html_entity_decode($string)
{
    $encoding = 'utf-8';
    if (!is_array($string)) {
        return html_entity_decode($string, ENT_QUOTES, $encoding);
    }
    foreach ($string as $key => $val) {
        $string[$key] = new_html_entity_decode($val);
    }
    return $string;
}
function new_htmlentities($string)
{
    $encoding = 'utf-8';
    return htmlentities($string, ENT_QUOTES, $encoding);
}
function safe_replace($string)
{
    $string = str_replace('%20', '', $string);
    $string = str_replace('%27', '', $string);
    $string = str_replace('%2527', '', $string);
    $string = str_replace('*', '', $string);
    $string = str_replace('"', '&quot;', $string);
    $string = str_replace("'", '', $string);
    $string = str_replace('"', '', $string);
    $string = str_replace(';', '', $string);
    $string = str_replace('<', '&lt;', $string);
    $string = str_replace('>', '&gt;', $string);
    $string = str_replace("{", '', $string);
    $string = str_replace('}', '', $string);
    $string = str_replace('\\', '', $string);
    return $string;
}
function delDirAndFile($path, $delDir = FALSE)
{
    $message = "";
    $handle = opendir($path);
    if ($handle) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("{$path}/{$item}")) {
                    $msg = delDirAndFile("{$path}/{$item}", $delDir);
                    if ($msg) {
                        $message .= $msg;
                    }
                } else {
                    $message .= "删除文件" . $item;
                    if (unlink("{$path}/{$item}")) {
                        $message .= "成功<br />";
                    } else {
                        $message .= "失败<br />";
                    }
                }
            }
        }
        closedir($handle);
        if ($delDir) {
            if (rmdir($path)) {
                $message .= "删除目录" . dirname($path) . "<br />";
            } else {
                $message .= "删除目录" . dirname($path) . "失败<br />";
            }
        }
    } else {
        if (file_exists($path)) {
            if (unlink($path)) {
                $message .= "删除文件" . basename($path) . "<br />";
            } else {
                $message .= "删除文件" + basename($path) . "失败<br />";
            }
        } else {
            $message .= "文件" + basename($path) . "不存在<br />";
        }
    }
    return $message;
}
function cTree($arr, $pid = 0, $level = 0)
{
    static $tree = array();
    foreach ($arr as $v) {
        if ($v['pid'] == $pid) {
            //$v['level'] = str_repeat('&nbsp;└─&nbsp;', $level);
            $v['level'] = $level;
            $tree[] = $v;
            cTree($arr, $v['catid'], $level + 1);
        }
    }
    return $tree;
}
function str_cut($string, $length, $dot = '...')
{
    $strlen = strlen($string);
    if ($strlen <= $length) {
        return $string;
    }
    $string = str_replace(array(' ', '&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵', ' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
    $strcut = '';
    $length = intval($length - strlen($dot) - $length / 3);
    $n = $tn = $noc = 0;
    while ($n < strlen($string)) {
        $t = ord($string[$n]);
        if ($t == 9 || $t == 10 || 32 <= $t && $t <= 126) {
            $tn = 1;
            $n++;
            $noc++;
        } elseif (194 <= $t && $t <= 223) {
            $tn = 2;
            $n += 2;
            $noc += 2;
        } elseif (224 <= $t && $t <= 239) {
            $tn = 3;
            $n += 3;
            $noc += 2;
        } elseif (240 <= $t && $t <= 247) {
            $tn = 4;
            $n += 4;
            $noc += 2;
        } elseif (248 <= $t && $t <= 251) {
            $tn = 5;
            $n += 5;
            $noc += 2;
        } elseif ($t == 252 || $t == 253) {
            $tn = 6;
            $n += 6;
            $noc += 2;
        } else {
            $n++;
        }
        if ($noc >= $length) {
            break;
        }
    }
    if ($noc > $length) {
        $n -= $tn;
    }
    $strcut = substr($string, 0, $n);
    $strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
    return $strcut . $dot;
}
function dir_path($path)
{
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/') {
        $path = $path . '/';
    }
    return $path;
}
function dir_create($path, $mode = 0777)
{
    if (is_dir($path)) {
        return TRUE;
    }
    $ftp_enable = 0;
    $path = dir_path($path);
    $temp = explode('/', $path);
    $cur_dir = '';
    $max = count($temp) - 1;
    for ($i = 0; $i < $max; $i++) {
        $cur_dir .= $temp[$i] . '/';
        if (@is_dir($cur_dir)) {
            continue;
        }
        @mkdir($cur_dir, 0777, true);
        @chmod($cur_dir, 0777);
    }
    return is_dir($path);
}
function auto_save_image($body)
{
    $body = new_stripslashes($body);
    if (!preg_match_all('/<img.*?src="(.*?)".*?>/is', $body, $img_array)) {
        return $body;
    }
    $img_array = array_unique($img_array[1]);
    set_time_limit(0);
    $imgPath = 'uploads/' . date("Ymd");
    $milliSecond = date("YmdHis");
    dir_create($imgPath);
    foreach ($img_array as $key => $value) {
        if (preg_match("#" . "http://" . $_SERVER["HTTP_HOST"] . "#i", $value)) {
            continue;
        }
        if (!preg_match("#^http:\\/\\/#i", $value)) {
            continue;
        }
        $value = trim($value);
        $imgAttr = get_headers($value, true);
        switch ($imgAttr['Content-Type']) {
            case 'image/png':
                $ext = 'png';
                break;
            case 'image/jpeg':
                $ext = 'jpg';
                break;
            case 'image/gif':
                $ext = 'gif';
                break;
            default:
                $ext = 'jpg';
        }
        $get_file = @file_get_contents($value);
        $filename = mt_rand(100000, 999999) . $milliSecond . $key . '.' . $ext;
        $rndFileName = $imgPath . '/' . $filename;
        if ($get_file) {
            $fp = @fopen($rndFileName, "w");
            @fwrite($fp, $get_file);
            @fclose($fp);
            $webconfig = db('system')->where('id', 1)->find();
            if ($webconfig['isthumb']) {
                $image = \org\Image::open('./' . $rndFileName);
                $image->thumb($webconfig['width'], $webconfig['height'])->save('./' . $rndFileName);
            }
            if ($webconfig['iswater']) {
                $image = \org\Image::open('./' . $rndFileName);
                if ($webconfig['pwater'] == 0) {
                    $webconfig['pwater'] = rand(1, 9);
                }
                $image->water('./public/admin/water/water.png', $webconfig['pwater'])->save('./' . $rndFileName);
            }
        }
        db('attachment')->insert(array('filename' => $filename, 'filepath' => $rndFileName, 'fileext' => $ext, 'filesize' => @filesize(pathConvert(ROOT_PATH . $rndFileName)), 'inputtime' => request()->time()));
        $body = @ereg_replace($value, __ROOT__ . '/' . $rndFileName, $body);
    }
    return $body;
}
//获取某分类的直接子分类
function getSons($categorys, $catid = 0)
{
    $sons = array();
    foreach ($categorys as $item) {
        if ($item['pid'] == $catid) {
            $sons[] = $item;
        }
    }
    return $sons;
}
//获取某个分类的所有子分类
function getSubs($categorys, $catid = 0, $level = 1)
{
    $subs = array();
    foreach ($categorys as $item) {
        if ($item['pid'] == $catid) {
            $item['level'] = $level;
            $subs[] = $item;
            $subs = array_merge($subs, getSubs($categorys, $item['catid'], $level + 1));
        }
    }
    return $subs;
}
//获取某个分类的所有父分类
//方法一，递归
function getParents($categorys, $catid)
{
    $tree = array();
    foreach ($categorys as $item) {
        if ($item['catid'] == $catid) {
            if ($item['pid'] > 0) {
                $tree = array_merge($tree, getParents($categorys, $item['pid']));
            }
            $tree[] = $item;
            break;
        }
    }
    return $tree;
}
function catid_str($catid)
{
    $list = db('category')->select();
    $list = getSubs($list, $catid);
    $str = '';
    foreach ($list as $k1 => $v1) {
        $str .= $v1['catid'] . ',';
    }
    $str = substr($str, 0, -1);
    if ($str == '') {
        $str = $catid;
    } else {
        $str = $catid . ',' . $str;
    }
    return $str;
}
function get_catname($catid)
{
	if($catid==0)return '';
    return db('category')->where('catid', $catid)->value('catname');
}
function get_caturl($catid)
{
    return db('category')->where('catid', $catid)->value('url');
}
function get_catpid($catid)
{
    return db('category')->where('catid', $catid)->value('pid');
}

function get_hits($id)
{
	$r=db('hits')->where('contentid', $id)->field('views')->find();
	if($r){
		return $r['views'];
		}
    return 0;
}
function catpos($catid, $symbol = ' > ')
{
    $list = db('category')->field('catid,pid,url,catname')->select();
    $list = getParents($list, $catid);
    $str = '';
    foreach ($list as $v) {
        $str .= '<a href=' . __ROOT__ . '/' . $v['url'] . '>' . $v['catname'] . '</a>' . $symbol;
    }
    $str = '<a href=' . __ROOT__ . '>首页</a>' . $symbol . $str;
    return $str;
}
function five_random($length, $chars = '0123456789')
{
    $hash = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
function five_random_str($lenth = 6)
{
    return five_random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}
function five_password($password, $encrypt = '')
{
    $pwd = array();
    $pwd['encrypt'] = $encrypt ? $encrypt : five_random_str();
    $pwd['password'] = md5(md5(trim($password)) . $pwd['encrypt']);
    return $encrypt ? $pwd['password'] : $pwd;
}
function pathConvert($path)
{
    $path = str_replace('./', '/', $path);
    $path = str_replace('\\', '/', $path);
    return str_replace('//', '/', $path);
}
function stringToArray($strs)
{
    $result = array();
    $array = array();
    $strs = str_replace('，', ',', $strs);
    $strs = str_replace("n", ',', $strs);
    $strs = str_replace("rn", ',', $strs);
    $strs = str_replace(' ', ',', $strs);
    $array = explode(',', $strs);
    foreach ($array as $key => $value) {
        if ('' != ($value = trim($value))) {
            $result[] = $value;
        }
    }
    return $result;
}
/**
* 转换字节数为其他单位
*
*
* @param	string	$filesize	字节大小
* @return	string	返回大小
*/
function sizecount($filesize)
{
    if ($filesize >= 1073741824) {
        $filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
    } elseif ($filesize >= 1048576) {
        $filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
    } elseif ($filesize >= 1024) {
        $filesize = round($filesize / 1024 * 100) / 100 . ' KB';
    } else {
        $filesize = $filesize . ' Bytes';
    }
    return $filesize;
}
/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '')
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $size >= 1024 && $i < 6; $i++) {
        $size /= 1024;
    }
    return round($size, 2) . $delimiter . $units[$i];
}
function kw_to_array($strs)
{
    $result = array();
    $array = array();
    $strs = str_replace('，', ',', $strs);
    $strs = str_replace("n", ',', $strs);
    $strs = str_replace("rn", ',', $strs);
    $strs = str_replace(' ', ',', $strs);
    $array = explode(',', $strs);
    foreach ($array as $key => $value) {
        if ('' != ($value = trim($value))) {
            $result[] = $value;
        }
    }
    return $result;
}
function random_color()
{
    mt_srand((double) microtime() * 1000000);
    $c = '';
    while (strlen($c) < 6) {
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return $c;
}
/*栏目列表*/
function catelist($pid = 0, $num = 5)
{
    $list = db('category')->where('ishidden', 0)->where('pid', $pid)->limit($num)->select();
    return $list;
}
/*子栏目列表*/
function subcatelist($catid, $num = 5)
{
    $sub = db('category')->where('pid', $catid)->limit($num)->select();
    $same = db('category')->where('pid', get_catpid($catid))->limit($num)->select();
    if (empty($sub)) {
        $sub = $same;
    }
    return $sub;
}

/*子栏目文章*/
function subarclist($catid, $a=0, $b=5, $order='id desc')
{
    $list = db('article')->where('catid', $catid)->where('status',1)->limit($a,$b)->order($order)->select();
    return $list;
}

/*同级栏目列表*/
function samecatelist($catid, $num = 5)
{
    $list = db('category')->where('pid', get_catpid($catid))->limit($num)->select();
    return $list;
}
function string2array($data)
{
    $data = trim($data);
    if ($data == '') {
        return array();
    }
    if (strpos($data, 'array') === 0) {
        @eval("\$array = {$data};");
    } else {
        if (strpos($data, '{\\') === 0) {
            $data = stripslashes($data);
        }
        $array = json_decode($data, true);
    }
    return $array;
}
function array2string($data, $isformdata = 1)
{
    if ($data == '' || empty($data)) {
        return '';
    }
    if ($isformdata) {
        $data = new_stripslashes($data);
    }
    if (version_compare(PHP_VERSION, '5.3.0', '<')) {
        return addslashes(json_encode($data));
    } else {
        return addslashes(json_encode($data, JSON_FORCE_OBJECT));
    }
}
function is_username($username)
{
    $username = strtolower($username);
    if (!preg_match('/^[a-z0-9_-]{5,16}$/', $username)) {
        die('用户名格式错误');
    }
    return $username;
}
function is_password($password)
{
    $password = strtolower($password);
    if (!preg_match('/^[a-z0-9_-]{6,18}$/', $password)) {
        die('密码格式错误');
    }
    return $password;
}
function is_email($email)
{
    $email = strtolower($email);
    if (!preg_match('/^([a-z0-9_\\.-]+)@([\\da-z\\.-]+)\\.([a-z\\.]{2,6})$/', $email)) {
        die('邮箱格式错误');
    }
    return $email;
}
function go_to_tag($contentid, $data)
{
    $data = preg_split('/[ ,]+/', $data);
    $tag_db = db('tag');
    $tag_data_db = db('tag_data');
    if (is_array($data) && !empty($data)) {
        foreach ($data as $v) {
            $v = safe_replace(addslashes($v));
            $v = str_replace(['//', '#', '.'], ' ', $v);
            $r = $tag_db->where('tag', $v)->find();
            if (!$r) {
                $tagid = $tag_db->insertGetId(['tag' => $v, 'count' => 1]);
            } else {
                $tag_db->where('tagid', $r['tagid'])->setInc('count', 1);
                $tagid = $r['tagid'];
            }
            if (!$tag_data_db->where(['tagid' => $tagid, 'contentid' => $contentid])->find()) {
                $tag_data_db->insert(['tagid' => $tagid, 'contentid' => $contentid]);
            }
        }
    }
}
function get_groupname($groupid)
{
    if ($groupid == 0) {
        return "注册会员";
    }
    $name = db('user_group')->where('groupid', $groupid)->value('name');
    return $name;
}

function form_image($field,$value=''){
	$str='<input type="file" id="'.$field.'">';
	if($value){
		$str .='<img src="'.$value.'" style="max-width:300px; max-height:100px" />';
		}
	$str .="<script type=\"text/javascript\">
			$(\"#".$field."\").uploadify({
				queueSizeLimit : 1,
				height          : 30,
				swf             : '__PUBLIC__/uploadify/uploadify.swf',
				fileObjName     : 'file',
				buttonText      : '上传图片',
				uploader        : '".__ROOT__."/api.php/upload/upimg.html',
				width           : 120,
				removeTimeout	  : 1,
				fileTypeExts	  : '*.jpg; *.png; *.gif;',
				fileSizeLimit   :2048,
				onUploadSuccess : uploadPicture,
				onFallback : function() {
					alert('未检测到兼容版本的Flash.');
				}
			});
			function uploadPicture(file, data){
				var data = \$.parseJSON(data);
				if(data.status){           	
							var html = '<span>'+ '<img style=\"max-width:300px; max-height:100px;\" src=\"'+data.url+'\">' ;
							html += '<a href=\"javascript:void(0)\" onclick=\"delete_attachment(this);\">&nbsp;&nbsp;删除</a>';
							html += '<input type=\"hidden\" name=".$field." value=\"'+data.url+'\" /></span>';
							\$('#".$field."').after(html);
				} else {
					alert('上传出错，请稍后再试');
					return false;
				}
			}
			</script>";
	
	
	return $str;
	}
function form_images($field,$value=''){
	
	$str='<input type="file" id="'.$field.'">';
	if($value){
		$value=string2array($value);
		foreach($value as $v){
		$str .='<span><img style="max-width:300px; max-height:100px;" src='.$v.' />' ;
		$str .='<a href="javascript:void(0)" onclick="delete_attachment(this);">&nbsp;删除&nbsp;</a>';
		$str .='<input type="hidden" name='.$field.'[] value='.$v.' /></span>';
		}
		}
	$str .="<script type=\"text/javascript\">
			$(\"#".$field."\").uploadify({
				queueSizeLimit : 20,
				height          : 30,
				swf             : '__PUBLIC__/uploadify/uploadify.swf',
				fileObjName     : 'file',
				buttonText      : '上传图片',
				uploader        : '".__ROOT__."/api.php/upload/upimg.html',
				width           : 120,
				removeTimeout	  : 1,
				fileTypeExts	  : '*.jpg; *.png; *.gif;',
				fileSizeLimit   :2048,
				onUploadSuccess : uploadPicture,
				onFallback : function() {
					alert('未检测到兼容版本的Flash.');
				}
			});
			function uploadPicture(file, data){
				var data = \$.parseJSON(data);
				if(data.status){           	
							var html = '<span>'+ '<img style=\"max-width:300px; max-height:100px;\" src=\"'+data.url+'\" />' ;
							html += '<a href=\"javascript:void(0)\" onclick=\"delete_attachment(this);\">&nbsp;删除&nbsp;</a>';
							html += '<input type=\"hidden\" name=".$field."[] value=\"'+data.url+'\" /></span>';
							\$('#".$field."').after(html);
				} else {
					alert('上传出错，请稍后再试');
					return false;
				}
			}
			</script>";
	
	
	return $str;
	}
function form_editor($field, $value='')
    {
       
        $str = '<script type="text/plain" id="' . $field . '"  style="width:805px;height:200px;">' . new_html_entity_decode($value) .'</script>';
        $str .= "<script type=\"text/javascript\">\r\n";
        $str .= "var um = UM.getEditor(\"{$field}\",{";
        $str .= 'UEDITOR_HOME_URL: "__PUBLIC__/ueditor/",';
        $str .= 'imageUrl: "__ROOT__/api.php/upload/ueditor",';
        $str .= 'imagePath: "__ROOT__/",';
        $str .= "textarea: '{$field}' });";
        $str .= '</script>';
        return $str;
    }
	
