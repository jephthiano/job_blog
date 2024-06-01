<?php
if(isset($_GET["t"]) && isset($_GET["i"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing skill
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "empty";}else{$type = test_input($ty);}
	
	// validating and sanitizing percentage
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error)){
		if($type ===  "admin"){
			$name = content_data('admin_table','ad_username',$c_id,'ad_id');
			$admin = new admin('admin');
			$admin->id = $c_id;
			$delete = $admin->delete_admin();
		}elseif($type ===  "social_handle"){
			$name = content_data('social_handle_table','s_name',$c_id,'s_id');
			$social_handle = new social_handle('admin');
			$social_handle->id = $c_id;
			$delete = $social_handle->delete_social_handle();
		}elseif($type ===  "partner"){
			$name = content_data('partner_table','p_name',$c_id,'p_id');
			$partner = new partner('admin');
			$partner->id = $c_id;
			$delete = $partner->delete_partner();
		}elseif($type ===  "subscriber"){
			$name = content_data('subscriber_table','s_name',$c_id,'s_id');
			$subscriber = new subscriber('admin');
			$subscriber->id = $c_id;
			$delete = $subscriber->delete_subscriber();
		}elseif($type ===  "news"){
			$name = content_data('news_table','n_title',$c_id,'n_id');
			$news = new news('admin');
			$news->id = $c_id;
			$delete = $news->delete_news();
		}elseif($type ===  "comment"){
			$name = content_data('comment_table','c_comment',$c_id,'c_id');
			$comment = new comment('admin');
			$comment->id = $c_id;
			$delete = $comment->delete_comment();
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
		}
		if($delete === true){
			$data["status"] = 'success';$data["message"] = "Success!!!<br>Content successfully deleted";
			//INSERT LOG
			$log = new log('admin');
			$log->brief = $type.' was deleted';
			$log->details = "deleted the {$type} (<b>{$name}</b>)";
			$log->insert_log();
		}elseif($delete === false){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
		}
	}else{
		$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while deleting content";
	}
	echo json_encode($data);
}//end of if isset
?>