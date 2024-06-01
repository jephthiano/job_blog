<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['cat'])){
	$raw_val = test_input($_GET['cat']);
	if(empty($raw_val)){
		trigger_error_manual(404);
	}else{
		$cat = ($raw_val);
	}
}else{
	trigger_error_manual(404);
}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = strtoupper($cat)."| CATEGORY | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','category/'.$cat.'/');//url redirection current page
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body" class="j-light-gray"style="font-family:Roboto,sans-serif;">
	<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
	<?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?>
	<div class='j-home-padding'>
		<div class="j-row">
			<div class="j-col l8 s12"style="margin-top:9px;"><?php require_once(file_location('inc_path','blog_entries.inc.php'));?></div>
			<div class="j-col l4 s12"><?php require_once(file_location('inc_path','second_column.inc.php'));?></div>
		</div>
		<div><?php require_once(file_location('inc_path','more_stories.inc.php')); //more stories?></div>
		<?php back_to_top() //back to the top?>
	</div>
	<span id='st'></span>
<?php require_once(file_location('inc_path','footer.inc.php')); //footer?>
<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>