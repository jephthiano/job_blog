<?php
if(isset($_POST)){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	if(get_json_data('comment','act') == 0 || get_json_data('all','act') == 0){//if checkout and all act is disabled
		$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br> Comment has been diasbled';
	}else{
		$error = []; $data = [];
		if(isset($_POST['anm']) && $_POST['anm']=== 'yes'){
			$name = NULL;
		}else{
			// validating and sanitizing name
			$nam = $_POST['nam'];
			if(empty($nam)){$error['name'] = "* Name cannot be empty";}else{$name = strtolower(test_input($nam));}
			
		}
		
		// validating and sanitizing comment
		$com = $_POST['cmt'];
		if(empty($com)){$error['cmte'] = "* Comment cannot be empty";}else{$user_comment = strtolower(test_input($com));}
		
		//validating and sanitising n_id
		$id = test_input($_POST['nid']);
		if(empty($id)){$error[] = "nid";}else{$n_id = test_input($id);}
		
		if(empty($error)){
			$comment = new comment('admin');
			$comment->name = $name;
			$comment->user_comment = $user_comment;
			$comment->n_id = $n_id;
			$insert = $comment->insert_comment();
			if($insert === true){
				$data["status"] = 'success';$data["message"] = 'Thanks!!!<br>Your Comment has been submitted';
			}elseif($insert === 'exist'){
				$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>You've already given this comment";
			}else{
				$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occur while submitting comment, try again later";
			}
	
		}else{
			$data["status"] = 'error';$data["errors"] = $error;
		}
	}
	echo json_encode($data);
}