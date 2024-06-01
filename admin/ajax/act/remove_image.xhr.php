<?php
if(isset($_GET['t']) && isset($_GET['i'])){
	require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');// all functions
	$error = [];
	//validating and sanitising content type
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "t";}else{$type = test_input($ty);}
	
	// validating and sanitizing percentage
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error)){
		//DELETE IMAGE AND DELETE IF FROM THE DB
		if($type === 'admin'){
			$message = "removed his/her profile pics";
			$admin = new admin('admin');
			$admin->id = $c_id;
			$remove = $admin->remove_image();
		}elseif($type === 'partner'){
			$message = "removed partner (<b>".content_data('partner_table','p_name',$c_id,'p_id')."</b>) image";
			$partner = new partner('admin');
			$partner->id = $c_id;
			$remove = $partner->remove_image();
		}elseif($type === 'news'){
			$message = "removed news (<b>".content_data('news_table','n_title',$c_id,'n_id')."</b>) image";
			$news = new news('admin');
			$news->id = $c_id;
			$remove = $news->remove_image();
		}else{
			$error[] = "no type";
		}
		if(empty($error)){
			if($remove === true){
				$data["status"] = 'success';$data["message"] = "Success!!!<br>Image successfully removed";
				//INSERT LOG
				$log = new log('admin');
				$log->brief = $type.' image was removed';
				$log->details = $message;
				$log->insert_log();
			}else{
				$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
			}
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
		}
	}else{
		$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while removing image";
	}
	//end of if empty
	echo json_encode($data);
}//end of if isset
?>