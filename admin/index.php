<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once(file_location('inc_path','all_tables.inc.php')); // create all tables
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "CONTROL PANEL";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>		
<title>CPANEL | HOME</title>
</head>
<body class="j-color6"style="font-family:Roboto,sans-serif;width:100%;"onload="">
<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
<!-- BODY STARTS-->
<div class="j-row">
	<div class="j-col s12 l2 j-hide-small j-hide-medium">
		<?php require_once(file_location('admin_inc_path','first_column.inc.php'));?>
	</div>
	<div class="j-col s12 l10"id='mainbody'>
		<?php require(file_location('admin_inc_path','navigation.inc.php'));?>
		<div id="maincol">
			<center>
				<div class='j-padding'>
					<h2 class='j-text-color1 j-padding j-color4'><b><?=$page_name?></b></h2>
				</div>
				<br>
				<div class='j-container j-row j-medium'>
					<?php if($adlevel == 3){ ?>
					<div class='j-col m3'>
						<a href="<?=file_location('admin_url','misc/site_data/')?>"class='j-text-color4 j-left j-color1 j-btn j-round j-bolder j-itallic'>
						<i class='<?=icon('address-card')?>'></i> Website Data
						</a>
					</div>
					<div class='j-col m3'>
						<a href="<?=file_location('admin_url','misc/settings/')?>"class='j-text-color4 j-color1 j-btn j-round j-bolder j-itallic'>
						<i class='<?=icon('cog')?>'></i> Site Settings
						</a>
					</div>
					<div class='j-col m3'>
						<a href="<?=file_location('admin_url','misc/run_action/')?>"class='j-text-color4 j-color1 j-btn j-round j-bolder j-itallic'>
						<i class='<?=icon('hourglass-start')?>'></i> Run Action
						</a>
					</div>
					<?php }?>
				</div>
				<div class="j-container">
					<?php if($adlevel == 3){ ?>
					<a href="<?=file_location('admin_url','admin/all/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Admin</span><span class='j-padding'>(<?=get_numrow('admin_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('users')?>"> </span> 
					</a>
					<?php }?>
					<a href="<?=file_location('admin_url','news/active/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>News</span><span class='j-padding'>(<?=get_numrow('news_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('newspaper')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','comment/active/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Comment</span><span class='j-padding'>(<?=get_numrow('comment_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('comment')?>"> </span> 
					</a>
					<?php if($adlevel > 1){ ?>
					<a href="<?=file_location('admin_url','social_handle/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Social Handles</span><span class='j-padding'>(<?=get_numrow('social_handle_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('scribd','fab')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','partner/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Partner</span><span class='j-padding'>(<?=get_numrow('partner_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('handshake')?>"> </span> 
					</a>
					<a href="<?=file_location('admin_url','subscriber/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Subscribers</span><span class='j-padding'>(<?=get_numrow('subscriber_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('user')?>"> </span> 
					</a>
					<?php }?>
					<a href="<?=file_location('admin_url','message/all/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Messages</span><span class='j-padding'>(<?=get_numrow('message_table')?>)</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('envelope')?>"> </span> 
					</a>
					<?php if($adlevel == 3){?>
					<a href="<?=file_location('admin_url','log/')?>"class='j-btn j-color1 j-text-color4 j-round j-container j-margin-cpanel'style="padding:10px 20px;">
					<b><span class=''>Logs</span></b>
					<br>
					<span style='margin-top:5px;'class="j-large <?=icon('file-alt')?>"> </span> 
					</a>
					<?php } ?>
				</div>
			</center>
		</div>
	</div>
</div>
<span id='st'></span>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>