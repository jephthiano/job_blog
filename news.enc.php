<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['title'])){// getting the value in $_GET  and assigning the value of id
	$raw_title = ($_GET['title']);
	$id = content_data('news_table','n_id',$raw_title,'n_title',"AND n_status = 'active'");
	if($id === false){trigger_error_manual(404);}
}else{
	trigger_error_manual(404);
}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url',get_media('news',$id));
$image_type = substr($image_link,-3);
$page = strtoupper($raw_title)." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','news/'.$raw_title.'/');//url redirection current page
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$id === false?'Page Not Found':$page_name;?></title>
<?php //AddToAny js cdn ?><script async src="https://static.addtoany.com/menu/page.js"></script></head>
<body id="body" class="j-light-gray" style="font-family:Roboto,sans-serif;">
	<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
	<?php require_once(file_location('inc_path','navigation.inc.php')); //navigation?>
	<div class='j-home-padding'>
		<div class="j-row">
			<div class="j-col l8 s12">
				<div class='j-color4 j-container'>
					<?php
					if($id === false){
						page_not_available();
					}else{
						get_news($id,'details');
						require_once(file_location('inc_path','news/share_modal.inc.php')); //share modal
						require_once(file_location('inc_path','news/share_this_story_button.inc.php'));//share this story button
						?><div><?php require_once(file_location('inc_path','more_stories.inc.php')); //more stories?></div><?php
						require_once(file_location('inc_path','news/add_comment_trigger_and_comment_input.inc.php'));//add comment trigger and comment input
						?>
						<div id='cmtsec'><?php get_comment_section($id);// comment counter and comment section?></div>
						<?php
					}
					?>
				</div>
				<br>
			</div>
			<div class="j-col l4 s12"><?php require_once(file_location('inc_path','second_column.inc.php'));?></div>
		</div>
		<?php back_to_top() //back to the top?>
	</div>
	<span id='st'></span>
	<?php require_once(file_location('inc_path','footer.inc.php')); //footer?>
	<?php //AddToAny js plugins ?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>"></script>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>