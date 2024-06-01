<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(strstr(file_location('home_url',''),'000webhostapp')){$server = 'live';}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "HOME | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body" class="j-light-gray" style="font-family:Roboto,sans-serif;">
	<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
	<?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?>
	<div class='j-home-padding'style="margin-top:5px">
		<?php $category = "sport";$color ="red";require(file_location('inc_path','home/home_data.inc.php'));//travel?>
		<?php $category = "travel";$color ="teal";require(file_location('inc_path','home/home_data.inc.php'));//sport?>
		<?php $category = "lifestyle";$color ="green";require(file_location('inc_path','home/home_data.inc.php'));//politics?>
		<?php $category = "entertainment";$color ="blue";require(file_location('inc_path','home/home_data.inc.php'));//entertainment?>
		<?php require(file_location('inc_path','home/home_spotlight_latest.inc.php'));//spotlight and latest?>
		<?php require(file_location('inc_path','home/home_all_category.inc.php'));//all category?>
	</div>
	<?php back_to_top() //back to the top?>
	<?php require_once(file_location('inc_path','subscribe.inc.php'));//subscribe?>
	<?php if(isset($server) && $server === 'live'){require_once(file_location('inc_path','notice_modal.inc.php')); } //notice ?>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','footer.inc.php')); //footer?>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>