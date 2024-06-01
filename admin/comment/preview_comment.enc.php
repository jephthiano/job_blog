<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page_url = file_location('admin_url','comment/preview_comment/'.$_GET['page']);
$page = "COMMENT DATA";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if(isset($_GET['page']) AND is_numeric($_GET['page'])){ //getting the value of the get 
	$cid = test_input(removenum($_GET['page']));
	if(!empty($cid)){	
		$id = content_data('comment_table','c_id',$cid,'c_id');
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
				<h2 class='j-text-color1 j-padding j-color4'><b>PREVIEW COMMENT DATA</b></h2>
			</div>
			<div class='j-row'>
			<div class='j-margin'>
				<div class=''>
					<a href="<?=file_location('admin_url','comment/active/')?>"class="j-btn j-color1 j-left j-round j-card-4 j-bolder"style='margin-right:30px;'>Active Comment</a>
					<a href="<?=file_location('admin_url','comment/suspended/')?>"class="j-btn j-color1 j-round j-card-4 j-bolder">Suspended Comment</a>
				</div>
			</div>
			<br class='j-clearfix'><br>
			<?php
			if($id === false){
				page_not_available('short');
			}else{
				?>
				<div id=""class='j-col m7 j-padding'>
					<div class="j-container j-color4 j-padding">
						<?php
						if($adlevel > 1){
							preview_modal('comment',$id);
							?>
							<div class='j-right'>
								<span class='j-clickable j-color1 j-btn j-round j-bolder'style="margin:3px;"onclick="$('#update_comment<?=$id?>').show();">
								<i class='<?=icon('sort-amount-up');?>'style='padding-right:5px;'></i>
								Update Comment Status
								</span>
								<span class='j-clickable j-color1 j-btn j-round j-bolder'style="margin:3px;"onclick="$('#delete_comment<?=$id?>').show();">
								<i class='<?=icon('trash');?>'style='padding-right:5px;'></i>
								Delete Comment
								</span>
							</div>
							<span class='j-clearfix'></span>
							<?php
						}
						?>
						<div style='line-height:30px;'>
							<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>NAME:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('comment_table','c_name',$id,'c_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>COMMENT:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('comment_table','c_comment',$id,'c_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>STATUS:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('comment_table','c_status',$id,'c_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>KEYWORD:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords((content_data('comment_table','c_ipaddress',$id,'c_id','','null')))?></b></div>
								</div>
								<div class="j-row-padding j-padding">
									<div class='j-col s4 j-text-color3 j-bolder'><b>DATETIME:</b></div>
									<div class='j-col s8 j-text-color5'><b><?=ucwords(showdate(content_data('comment_table','c_regdatetime',$id,'c_id','','null')))?></b></div>
								</div>
								<br><br>
						</div>
						<br<br><br>
					</div>
				</div>
				
				<div id=""class='j-col m5 j-padding'style='line-height: 40px;'>
					<?php $n_id = content_data('comment_table','n_id',$id,'c_id','','null')?>
					<div class='j-padding j-color4'>
							<div class='j-large j-bolder j-text-color1'>Article Summary</div>
							<a href="<?=file_location('admin_url','comment/'.addnum($n_id).'/')?>" class='j-bolder j-text-color5 j-small'>
							Click here to see comments on this article
							</a>
							<div class=''style='line-height: 40px;'>
								<div>
									<span class='j-bolder j-text-color7'>Title:</span>
									<a href="<?=file_location('admin_url','news/preview_news/'.addnum($n_id).'/')?>" class='j-bolder j-text-color1 j-small'>
									<span class='j-text-color7'><?=ucwords(content_data('news_table','n_title',$n_id,'n_id','','null'))?></span>
									</a>
								</div>
							</div>
						</div>
						<br>
						
					<div class="j-container j-color4 j-padding">
						<div class='j-large'>
							<span class='j-bolder j-text-color1'>Total comment on this article:</span>
							<span class='j-bolder j-text-color1'>
								<?=get_numrow('comment_table','n_id',$n_id,'return','round',"")?>
							</span>
						</div>
						<div class='j-large'>
							<span class='j-bolder j-text-color1'>Active comment on this article:</span>
							<span class='j-bolder j-text-color1'>
								<?=get_numrow('comment_table','n_id',$n_id,'return','round',"AND c_status = 'active'")?>
							</span>
						</div>
						<div class='j-large'>
							<span class='j-bolder j-text-color1'>Suspended comment on this article:</span>
							<span class='j-bolder j-text-color1'>
								<?=get_numrow('comment_table','n_id',$n_id,'return','round',"AND c_status = 'suspended'")?>
							</span>
						</div>
					</div>
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