<?php
if(isset($_POST)){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $missing = []; $data = [];
	
	// validating and sanitizing title
	$tit = ($_POST['tt']);
	if(empty($tit)){$missing['tte'] = "* title cannot be empty";}else{$title=test_input($tit);}
	
	// validating and sanitizing category
	$ct = ($_POST['ct']);
	if(empty($ct)){$missing['cte'] = "* category cannot be empty";}else{$category=test_input($ct);}
	
	// validating and sanitizing keyword
	$ky = ($_POST['ky']);
	if(empty($ky)){$missing['kye'] = "* keyword cannot be empty";}else{$keyword=test_input($ky);}
	
	// validating and sanitizing image caption
	$ic = ($_POST['ic']);
	if(empty($ic)){$missing['ice'] = "* image caption cannot be empty";}else{$imagecaption=test_input($ic);}
	
	// validating and sanitizing paragraph1
	$par1 = ($_POST['ph1']);
	if(empty($par1)){$missing['ph1e'] = "* first paragraph cannot be empty";}else{$paragraph1=test_input($par1);}
	
	// validating and sanitizing paragraph2
	$par2 = ($_POST['ph2']);
	if(empty($par2)){$paragraph2 = NULL;}else{$paragraph2=test_input($par2);}
	
	// validating and sanitizing paragraph3
	$par3 = ($_POST['ph3']);
	if(empty($par3)){$paragraph3 = NULL;}else{$paragraph3=test_input($par3);}
	
	// validating and sanitizing datetime
	$sc = ($_POST['sc']);
	if(empty($sc)){$source = get_xml_data('company_name');}else{$source=test_input($sc);}
	
	// validating and sanitizing datetime
	$dat = ($_POST['rg']);
	if(empty($dat)){$regdatetime = format_sql_date();}elseif(!regex('sql_date',$dat)){$missing['rge'] = "* invalid date format";}else{$regdatetime=test_input($dat);}
	
	if(empty($error) and empty($missing)){
		//FORM IMAGE UPLOAD
		$location = 'news';$size = 50000000;$file_mode = ["image/png","image/jpeg"];$file_type = 'image';
		require_once(file_location('inc_path','image_upload.inc.php'));
		
		if(empty($missing) && empty($error)){
			if($file2 === "larger"){ // if file is larger tha expected echo error
				$data["status"] = 'fail';$data["message"] = 'Image is larger than expected';
			}elseif($file2 === "normal" || $file2 === "no file"){
				$news = new news('admin');
				$news->title = $title;
				$news->category = $category;
				$news->keyword = $keyword;
				$news->imagecaption = $imagecaption;
				$news->paragraph1 = $paragraph1;
				$news->paragraph2 = $paragraph2;
				$news->paragraph3 = $paragraph3;
				$news->source = $source;
				$news->regdatetime = $regdatetime;
				$news->type = $file2;
				if($file2 === "normal"){$news->file_name = $correct['filename'];$news->extension = $correct['extension'];}
				$insert = $news->insert_news();
				if($insert == true && is_numeric($insert)){
					$data["status"] = 'success';$data["message"] = file_location('admin_url','news/preview_news/'.addnum($insert));
					//INSERT LOG
					$log = new log('admin');
					$log->brief = 'new news was uploaded';
					$log->details = "uploaded new news (<b>{$title}</b>)";
					$log->insert_log();
				}elseif($insert === 'exists'){
					$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>News already exists, confirm the title and try again later';
				}elseif($insert === false){
					$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while uploading news data';
				}
			}else{
				$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred, try again later';
			}// end of else if $file = "" // end of else if $file = ""
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $missing;
	}
	echo json_encode($data);
}//end of if isset
?>