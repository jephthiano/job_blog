<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page_url = file_location('admin_url','news/preview_news/'.$_GET['page']);
$page = "NEWS DATA";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('news_table','n_id',$cid,'n_id');
	}else{
		trigger_error_manual(404);
	}
}else{
	trigger_error_manual(404);
}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>
<title><?=$page_name?></title>
</head>
<body class="j-color6"style="font-family:Roboto,sans-serif;width:100%;"onload="">
<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
<div class="j-row">
	<div class="j-col s12 l2 j-hide-small j-hide-medium">
		<?php require_once(file_location('admin_inc_path','first_column.inc.php'));?>
	</div>
	<div class="j-col s12 l10"id='mainbody'>
		<?php require(file_location('admin_inc_path','navigation.inc.php'));?>
		<div id="maincol"class=''>
			<div class=''style='margin-bottom:20px;'>
				<h2 class='j-text-color1 j-padding j-color4'><b>PREVIEW NEWS DATA</b></h2>
			</div>
			<div class='j-row'>
			<div class='j-margin'>
				<div class=''>
					<a href="<?=file_location('admin_url','news/active/')?>"class="j-btn j-color1 j-left j-round j-card-4 j-bolder"style='margin-right:30px;'>Active News</a>
					<a href="<?=file_location('admin_url','news/pending/')?>"class="j-btn j-color1 j-round j-card-4 j-bolder"style='margin-right:30px;'>Pending News</a>
					<a href="<?=file_location('admin_url','news/suspended/')?>"class="j-btn j-color1 j-round j-card-4 j-bolder">Suspended News</a>
					<a href="<?=file_location('admin_url','news/insert_news/')?>"class='j-btn j-color1 j-right j-round j-card-4 j-bolder'>Insert New News</a>
				</div>
			</div>
			<br class='j-clearfix'><br>
			<?php
			if($id === false){
				page_not_available('short');
			}else{
				?>
				<div id=""class='j-col m9 j-padding'>
					<div class="j-container j-color4 j-padding">
						<?php
						if($adlevel > 1){
							preview_modal('news',$id);
							?>
							<div class='j-right'>
								<span class='j-clickable j-color1 j-btn j-round j-bolder'style="margin:3px;"onclick="$('#update_news<?=$id?>').show();">
								<i class='<?=icon('sort-amount-up');?>'style='padding-right:5px;'></i>
								Update News Status
								</span>
								<a href='<?= file_location("admin_url","news/update_news/".addnum($id)."/");?>'class='j-clickable j-color1 j-btn j-round j-bolder'style="margin:3px;">
								<i class='<?=icon('edit');?>'style='padding-right:5px;'></i>
								Edit News
								</a>
								<span class='j-clickable j-color1 j-btn j-round j-bolder'style="margin:3px;"onclick="$('#delete_news<?=$id?>').show();">
								<i class='<?=icon('trash');?>'style='padding-right:5px;'></i>
								Delete News
								</span>
							</div>
							<span class='j-clearfix'></span>
							<?php
						}
						?>
						<div style='line-height:30px;'>
							<div>
								<div class='j-text-color7 j-bolder j-large'>Images</div>
								<div>
									<img src="<?=file_location('media_url',get_media('new',$id))?>"style='width:100px;height:100px;margin-right:9px;'/>
								</div>
							</div><br>
							<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>TITLE:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_title',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>CATEGORY:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_category',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>STATUS:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_status',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>KEYWORD:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_keyword',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>IMAGE CAPTION:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_imagecaption',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>FIRST PARAGRAPH:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_category',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>FIRST PARAGRAPH:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_paragraph1',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>SECOND PARAGRAPH:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_paragraph2',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>THIRD PARAGRAPH:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_paragraph3',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>SOURCE:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('news_table','n_source',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>DATETIME:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords(showdate(content_data('news_table','n_regdatetime',$id,'n_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>UPLOADED/LAST EDITED BY:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords(content_data('admin_table','ad_username',content_data('news_table','ad_id',$id,'n_id','','null'),'ad_id','','null'))?></b></div>
								</div>
								<br><br>
						</div>
						<br<br><br>
					</div>
				</div>
				
				<div id=""class='j-col m3 j-padding'>
					<div class='j-padding j-color4'>
						<div class='j-large j-bolder j-text-color1'>Article Summary</div>
						<a href="<?=file_location('admin_url','comment/'.addnum($id).'/')?>" class='j-bolder j-text-color5 j-small'>
							Click here to see comment on this article
						</a>
						<div style='line-height: 40px;'>
							<div class='j-large'>
								<span class='j-bolder j-text-color1'>Total Comment:</span>
								<span class='j-bolder j-text-color1'>
									<?=get_numrow('comment_table','n_id',$id,'return','round',"")?>
								</span>
							</div>
							<div class='j-large'>
								<span class='j-bolder j-text-color1'>Active Comment:</span>
								<span class='j-bolder j-text-color1'>
									<?=get_numrow('comment_table','n_id',$id,'return','round',"AND c_status = 'active'")?>
								</span>
							</div>
							<div class='j-large'>
								<span class='j-bolder j-text-color1'>Suspended Comment:</span>
								<span class='j-bolder j-text-color1'>
									<?=get_numrow('comment_table','n_id',$id,'return','round',"AND c_status = 'suspended'")?>
								</span>
							</div>
						</div>
					</div>
					<br>
				</div>
				<?php 
			}
			?>
			<span id="st"></span>
		</div>
	</div>
</div>
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>