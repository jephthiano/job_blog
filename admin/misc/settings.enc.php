<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page_url = file_location('admin_url','misc/settings/');
require_once(file_location('admin_inc_path','session_check.inc.php'));
$page = "WEBSITE SETTING";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
if($adlevel != 3){trigger_error_manual(404);}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once(file_location('inc_path','meta.inc.php'));?>		
<title><?=$page_name?></title>
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
			<div class='j-padding'>
				<h2 class='j-text-color1 j-padding j-color4'><b>WEBSITE SETTING</b></h2>
			</div>
			<div class="j-container">
				<div class='j-color4'>
					<div class='j-color5'><div class='j-padding j-large'><b>Color Settings</b></div></div>
					<div class='j-padding'>
						<div class='j-row'>
							<div class='j-col m6'>
								<div>
									<?php //primary color ?>
									<span class='j-bolder j-text-color7'style='margin-right:20px;'>PRIMARY COLOR:</span>
									<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('primary_color','color')?>;height:30px;width:30px;"></span>
								</div><br>
								<div>
									<input type="text"class="j-left j-input j-medium j-border-2 j-border-color7 j-round"placeholder="Primary Color"\
										   name="pry_color"id="pry_color"value="<?=get_json_data('primary_color','color')?>"
										   style="width:60%;max-width:200px;margin-right:20px;"/>
										<button type='submit'id='sbtn'class="primary_color j-btn j-medium j-color1 j-round j-bolder"onclick="css('color','primary_color',$('#pry_color').val());">Save</button>
								</div>
							</div>
							<div class='j-col m6'>
								<div>
									<?php //secondary color ?>
									<span class='j-bolder j-text-color7'style='margin-right:20px;'>SECONDARY COLOR:</span>
									<span class='j-padding j-text-color4'style="background-color:<?=get_json_data('secondary_color','color')?>;height:30px;width:30px;"></span>
								</div><br>
								<div>
									<input type="text"class="j-left j-input j-medium j-border-2 j-border-color7 j-round"placeholder="Secondary Color"
										   name="sec_color"id="sec_color"value="<?=get_json_data('secondary_color','color')?>"
										   style="width:60%;max-width:200px;margin-right:20px;"/>
										   <button type='submit'id='sbtn'class="secondary_color j-btn j-medium j-color1 j-round j-bolder"onclick="css('color','secondary_color',$('#sec_color').val());">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div><br>
				
				<div class=''style='margin:15px 0px;'>
					<div class='j-color4'>
						<div class='j-color5'><div class='j-padding j-large'><b>Activity Settings</b></div></div>
						<div class='j-padding '>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //keywords ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>ALL ACTIVITIES:</div>
									<div class='j-bolder'>
										<span style='margin-right:15px;'>
											<span>Status: </span>
											<span class='j-text-color5'><?php $status = get_json_data('all','act');?><?=$status == 1?"Enabled":"Disabled";?></span>
										</span>
										<span class='j-btn j-color1 j-round'onclick="css('act','all','<?=$status == 1?0:1;?>');">
											<?=$status == 1?"Disable":"Enable";?>
										</span>
									</div>
								</div>
								<div class='j-col m6'>
									<?php //site surfing ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>WEBSITE SURFING:</div>
									<div class='j-bolder'>
										<span style='margin-right:15px;'>
											<span>Status: </span>
											<span class='j-text-color5'><?php $status = get_json_data('surfing','act');?><?=$status == 1?"Enabled":"Disabled";?></span>
										</span>
										<span class='j-btn j-color1 j-round'onclick="css('act','surfing','<?=$status == 1?0:1;?>');">
											<?=$status == 1?"Disable":"Enable";?>
										</span>
									</div>
								</div>
							</div><br>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //comment ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>COMMENT:</div>
									<div class='j-bolder'>
										<span style='margin-right:15px;'>
											<span>Status: </span>
											<span class='j-text-color5'><?php $status = get_json_data('comment','act');?><?=$status == 1?"Enabled":"Disabled";?></span>
										</span>
										<span class='j-btn j-color1 j-round'onclick="css('act','comment','<?=$status == 1?0:1;?>');">
											<?=$status == 1?"Disable":"Enable";?>
										</span>
									</div>
								</div>
							</div><br>
						</div>
					</div>
				</div><br>
				
				<div class=''style='margin:15px 0px;'>
					<div class='j-color4'>
						<div class='j-color5'><div class='j-padding j-large'><b>Miscellaneous</b></div></div>
						<div class='j-padding '>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //keywords ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>KEYWORDS:</div>
									<textarea placeholder="keywords"id='keywords'name="keywords"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									><?=get_json_data('keywords','about_us')?></textarea><br>
									<button type='submit'id='sbtn'class="keywords j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','keywords',$('#keywords').val());">Save</button>
								</div>
								<div class='j-col m6'>
									<?php //regular_email ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>REGULAR EMAIL:</div>
									<input type='email' placeholder="Regular Email"id='regular_email'name="regular_email"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									value="<?=get_json_data('regular_email','about_us')?>"/><br>
									<button type='submit'id='sbtn'class="regular_email j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','regular_email',$('#regular_email').val());">Save</button>
								</div>
							</div><br>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //support_email ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>SUPPORT EMAIL:</div>
									<input type='email' placeholder="Support Email"id='support_email'name="support_email"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									value="<?=get_json_data('support_email','about_us')?>"/><br>
									<button type='submit'id='sbtn'class="support_email j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','support_email',$('#support_email').val());">Save</button>
								</div>
								<div class='j-col m6'>
									<?php //phonenumber ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>COMPANY PHONENUMBER:</div>
									<input type='tel' placeholder="Company Phonenumber"id='phonenumber'name="phonenumber"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									value="<?=get_json_data('phonenumber','about_us')?>"/><br>
									<button type='submit'id='sbtn'class="phonenumber j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','phonenumber',$('#phonenumber').val());">Save</button>
								</div>
							</div><br>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //locality ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>LOCALITY:</div>
									<input type='text' placeholder="Delivery Locality"id='locality'name="locality"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									value="<?=get_json_data('locality','about_us')?>"/><br>
									<button type='submit'id='sbtn'class="locality j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','locality',$('#locality').val());">Save</button>
								</div>
								<div class='j-col m6'>
									<?php //address ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>COMPANY ADDRESS:</div>
									<textarea placeholder="address"id='address'name="address"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									><?=get_json_data('address','about_us')?></textarea><br>
									<button type='submit'id='sbtn'class="address j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','address',$('#address').val());">Save</button>
								</div>
							</div>
							<div class='j-row'>
								<div class='j-col m6'>
									<?php //category ?>
									<div class='j-bolder j-text-color7'style='margin-right:20px;'>DELIVERY CATEGORY:</div>
									<textarea placeholder="category"id='category'name="category"style="width:100%;max-width:400px;"rows="4"class="j-input j-medium j-border-2 j-border-color7 j-color4 j-round"
									><?=get_json_data('category','about_us')?></textarea><br>
									<button type='submit'id='sbtn'class="category j-btn j-medium j-color1 j-round j-bolder"onclick="css('about_us','category',$('#category').val());">Save</button>
								</div>
								<div class='j-col m6'>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div><br>
			</div>
		</div>
	</div>
	<span id='st'></span>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>