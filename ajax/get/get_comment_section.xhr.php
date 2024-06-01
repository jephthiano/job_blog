<?php
if(isset($_GET['id'])){
	require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');// all functions
	$error = [];
	//validating and sanitising n_id
	$id = test_input(removenum($_GET['id']));
	if(empty($id)){$error[] = "fid";}else{$n_id = test_input($id);}
	
	if(empty($error)){
		get_comment_section($n_id);
	}
}//end of if isset
?>