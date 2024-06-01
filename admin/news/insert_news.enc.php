<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
$follow_type = 'no follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page_url = file_location('admin_url','/news/insert_news/');
$page = "INSERT NEWS";
$page_name = $page." | ".strtoupper(get_xml_data('company_name'));
require_once(file_location('admin_inc_path','session_check.inc.php'));
if($adlevel < 2){trigger_error_manual(404);}
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
		<div class='j-padding'>
			<h2 class='j-text-color1 j-padding j-color4'><b>INSERT NEW NEWS</b></h2>
		</div>
		<div class='j-padding'>
			<a href="<?=file_location('admin_url','news/')?>" class="j-btn j-color1 j-right j-round j-card-4 j-bolder">Show All News</a>
			<br class='j-clearfix'>
		</div>
		<div id=""class='j-color4'style='padding-top: 9px;'>
			<div id='preview'class='j-border-color7 j-border-2 j-round j-color5 j-vertical-center-container j-margin j-clickable'style='width:100px;height:100px;'
				 onclick='ti($("#image"))'>
				<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>
			</div>
			<form onsubmit="event.preventDefault();"id='insnw'class=''>
				<input type="file"name="image"id="image"class="j-round j-hide"onchange="pi(this,document.getElementById('preview'));">
				<div class='j-row'>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Title:</b> <span class='j-text-color1 mg'id="tte">*</span></label>
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Title" maxlength='255'
							name="tt"id="tt"value=""style="width:100%;"/>
					</div>
					
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Category:</b> <span class='j-text-color1 mg'id="cte">*</span></label>
						<select name="ct"id="ct"class='j-select j-color4 j-round j-border-2 j-border-color5'style="width:100%;max-width:400px;">
							<option value=''>Select category</option><?php get_category()?>
						</select>
					</div>
				</div>
				<div class='j-row'>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Keywords:</b> <span class='j-text-color1 mg'id="kye">*</span></label>
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Keywords"
							name="ky"id="ky"value=""style="width:100%;"/>
						<span class='j-small j-text-color5'>(Seperate each keyword with | e.g Keyword|good boy|each)</span>
					</div>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Image Caption:</b> <span class='j-text-color1 mg'id="ice">*</span></label>
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Image Caption"maxlength='100'
							name="ic"id="ic"value=""style="width:100%;"/>
					</div>
				</div>
				<div class='j-row'>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>First Paragraph: </b> <span class='j-text-color1 mg'id='ph1e'>*</span></label>
						<textarea placeholder="First Paragraph"id='ph1'name="ph1"style="width:100%;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"></textarea>
					</div>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Second Paragraph: </b> <span class='j-text-color1 mg'id='ph2e'></span></label>
						<textarea placeholder="Second Paragraph"id='ph2'name="ph2"style="width:100%;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"></textarea>
						<span class='j-small j-text-color5'>(optional)</span>
					</div>
				</div>
				<div class='j-row'>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Third Paragraph: </b> <span class='j-text-color1 mg'id='ph3e'></span></label>
						<textarea placeholder="Third Paragraph"id='ph3'name="ph3"style="width:100%;"rows="4"class="j-input j-medium j-border-2 j-border-color5 j-color4 j-round-large"></textarea>
						<span class='j-small j-text-color5'>(optional)</span>
					</div>
				</div>
				<div class='j-row'>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>Source:</b> <span class='j-text-color1 mg'id="sce"></span></label>
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Source"maxlength='55'
							name="sc"id="sc"value=""style="width:100%;"/>
						<span class='j-small j-text-color5'>(optional)</span>
					</div>
					<div class='j-col m6 j-padding'>
						<label class="j-large j-text-color7"><b>DateTime:</b> <span class='j-text-color1 mg'id="rge"></span></label>
						<input type="text"class="j-input j-medium j-border-2 j-border-color5 j-round"placeholder="DateTime"
							name="rg"id="rg"value=""style="width:100%;"/>
						<span class='j-small j-text-color5'>(if field is left blank, current time will be used or type in your date in the following format 2021-09-05 15:45:23)</span>
					</div>
				</div>
				<div class='j-margin'>
					<button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round j-bolder">Insert News</button>
				</div>
			</form>
			<span id="st"></span>
			<br><br>
		</div>
	</div>
</div>
<!-- BODY ENDS -->
<?php require_once(file_location('admin_inc_path','js.inc.php'));?>
</body>
</html>