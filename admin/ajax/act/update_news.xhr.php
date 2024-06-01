<?php
if(isset($_POST)){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	// validating and sanitizing title
	$tit = ($_POST['tt']);
	if(empty($tit)){$error['tte'] = "* title cannot be empty";}else{$title=test_input($tit);}
	
	// validating and sanitizing category
	$ct = ($_POST['ct']);
	if(empty($ct)){$error['cte'] = "* category cannot be empty";}else{$category=test_input($ct);}
	
	// validating and sanitizing keyword
	$ky = ($_POST['ky']);
	if(empty($ky)){$error['kye'] = "* keyword cannot be empty";}else{$keyword=test_input($ky);}
	
	// validating and sanitizing image caption
	$ic = ($_POST['ic']);
	if(empty($ic)){$error['ice'] = "* image caption cannot be empty";}else{$imagecaption=test_input($ic);}
	
	// validating and sanitizing paragraph1
	$par1 = ($_POST['ph1']);
	if(empty($par1)){$error['ph1e'] = "* first paragraph cannot be empty";}else{$paragraph1=test_input($par1);}
	
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
	if(empty($dat)){$regdatetime = format_sql_date();}elseif(!regex('sql_date',$dat)){$error['rge'] = "* invalid date format";}else{$regdatetime=test_input($dat);}
	
	// validating and sanitizing id
	$id = test_input(removenum($_POST['tid']));
	if(empty($id) || !is_numeric($id)){$error[] = "number";}else{$c_id = test_input($id);}
	
	if(empty($error)){
		$news = new news('admin');
		$news->id = $c_id;
		$news->title = $title;
		$news->category = $category;
		$news->keyword = $keyword;
		$news->imagecaption = $imagecaption;
		$news->paragraph1 = $paragraph1;
		$news->paragraph2 = $paragraph2;
		$news->paragraph3 = $paragraph3;
		$news->source = $source;
		$news->regdatetime = $regdatetime;
		$update = $news->update_news();
		if($update === true){
			$data["status"] = 'success';$data["message"] = file_location('admin_url','news/preview_news/'.addnum($c_id));
			//INSERT LOG
			$log = new log('admin');
			$log->brief = 'news was edited';
			$log->details = "edited the news (<b>{$title}</b>)";
			$log->insert_log();
		}elseif($update === false){
			$data["status"] = 'fail';$data["message"] = 'Sorry!!!<br>Error occurred while updating news, try again later222';
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>