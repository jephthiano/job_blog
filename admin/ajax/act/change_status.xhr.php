<?php
if(isset($_GET["t"]) && isset($_GET["i"] )){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing type
	$ty = ($_GET['t']);
	if(empty($ty)){$error[] = "empty";}else{$type = test_input($ty);}
	
	// validating and sanitizing id
	$id = test_input(removenum($_GET['i']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	// validating and sanitizing status
	$st = ($_GET['s']);
	if(empty($st)){$error[] = "empty";}else{$status = test_input($st);}
	
	if(empty($error) and empty($missing)){
		if($type ===  "admin"){
			$cur_status = content_data('admin_table','ad_status',$c_id,'ad_id');
			$ind = content_data('admin_table','ad_username',$c_id,'ad_id');
			$admin = new admin('admin');
			$admin->id = $c_id;
			$admin->status = $status;
			$change = $admin->change_status();
		}elseif($type ===  "news"){
			$cur_status = content_data('news_table','n_status',$c_id,'n_id');
			$ind = content_data('news_table','n_title',$c_id,'n_id');
			$news = new news('admin');
			$news->id = $c_id;
			$news->status = $status;
			$change = $news->change_status();
		}elseif($type ===  "comment"){
			$cur_status = content_data('comment_table','c_status',$c_id,'c_id');
			$ind = content_data('comment_table','c_comment',$c_id,'c_id');
			$comment = new comment('admin');
			$comment->id = $c_id;
			$comment->status = $status;
			$change = $comment->change_status();
		}else{
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
		}
		if($change === true){
			$data["status"] = 'success';$data["message"] = "Success!!!<br>Status successfully updated";
			//INSERT LOG
			$log = new log('admin');
			$log->brief = $type.' status was changed';
			$log->details = "changed {$type} status of <b>".ucwords($ind)."</b> from <b>{$cur_status}</b> to <b>{$status}</b>";
			$log->insert_log();
		}elseif($change === false){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
		}
	}else{
		$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occurred while updating status";
	}
	echo json_encode($data);
}//end of if isset
?>