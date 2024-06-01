<?php
if(isset($_POST)){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	require_once(file_location('admin_inc_path','session_check_nologout.inc.php'));
	$error = []; $missing = []; $data = [];
	
	// validating and sanitizing partner
	$nm = ($_POST['nm']);
	if(empty($nm)){$missing['nme'] = "* partner cannot be empty";}else{$name = strtolower(test_input($nm));}
	
	if(empty($error) and empty($missing)){
		//FORM IMAGE UPLOAD
		$location = 'partner';$size = 50000000;$file_mode = ["image/png","image/jpeg"];$file_type = 'image';
		require_once(file_location('inc_path','image_upload.inc.php'));
		
		if(empty($missing) && empty($error)){
			if($file2 === "larger"){ // if file is larger tha expected echo error
				$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Image is larger than expected';
			}elseif($file2 === "normal" || $file2 === "no file"){
				$partner = new partner('admin');
				$partner->name = $name;
				$partner->type = $file2;
				if($file2 === "normal"){$partner->file_name = $correct['filename'];$partner->extension = $correct['extension'];}
				$insert = $partner->insert_partner();
				if($insert == true && is_numeric($insert)){
					$data["status"] = 'success';$data["message"] = file_location('admin_url','partner/preview_partner/'.addnum($insert));
					//INSERT LOG
					$log = new log('admin');
					$log->brief = 'new partner was registered';
					$log->details = "registered new partner (<b>{$name}</b>)";
					$log->insert_log();
				}elseif($insert === false){
					$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while uploading partner data';
				}elseif($insert === 'exists'){
					$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Partner data with the same name already exists, please try and verify before adding partner';
				}
			}else{
				$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while uploading partner data, try again later';
			}// end of else if $file = "" // end of else if $file = ""
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $missing;
	}
	echo json_encode($data);
}//end of if isset
?>