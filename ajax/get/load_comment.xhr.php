<?php
if(isset($_GET['id']) && isset($_GET['sta']) && isset($_GET['dis'])){
	require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');// all functions
	$error = [];
	//validating and sanitising n_id
	$id = test_input(removenum($_GET['id']));
	if(empty($id)){$error[] = "fid";}else{$n_id = test_input($id);}
	
	//validating and sanitising n_id
	$sta = ($_GET['sta']);
	if(empty($id)){$error[] = "sta";}else{$start = test_input($sta);}
	
	//validating and sanitising n_id
	$dis = ($_GET['dis']);
	if(empty($dis)){$error[] = "dis";}else{$display = test_input($dis);}
	
	if(empty($error)){
		get_comment($n_id,$start,$display);
	}
}//end of if isset
?>