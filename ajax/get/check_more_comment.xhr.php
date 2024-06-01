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
	if(empty($dis)){$error[] = "dis";}else{$display = (test_input($dis)+1);}
	
	if(empty($error)){
		$numrow = get_numrow('comment_table','n_id',$n_id,"return",'no round',"AND c_status = 'active' ORDER BY c_id DESC LIMIT {$start},{$display}");
		if($numrow > 10){echo 'yes';}else{echo 'no';}
	}
}//end of if isset
?>