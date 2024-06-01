<?php
if(isset($_POST["nm"]) && isset($_POST["em"])){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	
	// validating and sanitizing name
	$nam = ($_POST['nm']);
	if(empty($nam)){$error['nme'] = "* Name cannot be empty";}else{$name = test_input($nam);}
	
	// validating and sanitizing email
	$emai = ($_POST['em']);
	if(empty($emai)){$error['eme'] = "* Email cannot be empty";}elseif(!regex('email',$emai)){$error['eme'] = "* Invalid email";}else{$email = test_input($emai);}
	
	if(empty($error) and empty($missing)){
		$subscriber = new subscriber('admin');
		$subscriber->name = $name;
		$subscriber->email = $email;
		$insert = $subscriber->insert_subscriber();
		if($insert === true){
			$data["status"] = 'success';$data["message"] = 'Thanks!!!<br>Subscription successful';
		}elseif($insert === false){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occur while subscribing for newsletter, try again later";
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>