<?php
//test input starts
function test_input($data){
 $data = htmlspecialchars($data,ENT_QUOTES,'UTF-8',true);
	$data = htmlentities($data,ENT_QUOTES,'UTF-8',true);
	$data = trim($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
	$data = stripslashes($data);
 return $data;
}
//test input ends

//file location starts
function file_location($type='home_url',$filename = ''){ 
	if($type === 'media_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/media/'.$filename);
	}elseif($type === 'media_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/media/'.$filename);
	}elseif($type === 'home_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/'.$filename);
	}elseif($type === 'home_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/'.$filename);
	}elseif($type === 'admin_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/admin/'.$filename);
	}elseif($type === 'admin_ajax_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/admin/ajax/'.$filename);
	}elseif($type === 'ajax_url'){
		return test_input('https://'.$_SERVER['SERVER_NAME'].'/ajax/'.$filename);
	}elseif($type === 'inc_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/addons/'.$filename);
	}elseif($type === 'admin_inc_path'){
		return ($_SERVER['DOCUMENT_ROOT'].'/admin/addons/'.$filename);
	}
}
//file location ends

$fur = ['json','xml','general','device_and_location','date_and_time','file_upload','social_handle','category','get_database',
        'others','admin','modal','news','comment','partner'];
foreach($fur AS $section){
 require_once(file_location('inc_path',"functions/$section.fuc.php"));
}
?>