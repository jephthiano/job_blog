<div  id="load_modal"class="j-modal-load"style='display:none'>
	<div class="j-modal-content j-display-container j-color4"style="width:100%;max-width:100%;height:100%;background-color:rgba(0,0,0,0.7);">
		<?php //navigation starts?>
		<?php if(!strstr($_SERVER['PHP_SELF'],'admin')){
			?>
			<div class="j-bar j-card-4 j-animate-left j-fixed-top j-home-padding"style="margin:0px;font-size:12px;z-index:1;height:60px;background-color:rgba(0,0,0,0.8);">
				<?php //code for large screen ?>
					<a href="<?= file_location('home_url','');?>"class="j-bar-item"style='padding:0px;'>
						<img src="<?=file_location('media_url','home/logo.png')?>"class=''alt="BLOG LOGO IMAGE"style="width:150px;height:58px;">
					</a>
					<a  href="javascript:void(0)" class="j-text-color4 j-bar-item j-button j-right j-xlarge j-hide-large j-hide-xlarge" onclick="ad()">&#9776;</a>
					<span class="j-text-color4 j-bar-item j-padding-16 j-hide-large j-hide-xlarge j-hide-medium j-right">
						<i class="j-large <?=icon('search')?>"></i>
					</span>
					<?php // search for large ?>
					<span class="j-bar-item j-hide-small"style='padding:7px 10px 5px 30px;'>
						<input type="search"class="j-input j-small j-border j-border-gray j-round"
							   placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="display:inline;width:300px"/>
						<span class="j-large j-clickable j-padding j-round j-color4"style="padding: 0px 0px;position:relative;top:3px;left:0px;">
							<i class="<?= icon('search');?>"></i>
						</span>
					</span>
					<div class="j-right j-text-color4 j-large j-hide-small j-hide-medium">
						<a class="j-bar-item j-button j-padding-16">News</a>		
						<a class="j-bar-item j-button j-padding-16">Sport</a>
						<a class="j-bar-item j-button j-padding-16">Place</a>
						<div style='display: inline;'class=''>
							<a class="j-bar-item j-button j-padding-16">Tech</a>
							<a class="j-bar-item j-button j-padding-16">Finance</a>
							<a class="j-bar-item j-hide-large j-button j-padding-16">Entertainment</a>
						</div>
					</div>
				<?// code for small screen ?>
				<div class="j-card-4 j-color3 j-hide-large j-hide-xlarge"><br><br><br>
					<div class="j-bar-block j-sidebar j-collapse j-animate-top j-bolder j-text-color4 clickable"
					style="max-height:310px;right:0;background-color:rgba(0,0,0,0.8);display:none">
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">News</a>		
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">Sport</a>
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">Place</a>
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">Tech</a>
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">Finance</a>
						<a style="opacity:100%;"class="j-bar-item j-button j-padding-16">Entertainment</a>
					</div>
				</div>
		</div>
		<?php // search for small ?>
		<div class="j-card-4 j-color3 j-fixed-top j-animate-top j-hide-medium j-hide-large j-hide-xlarge"
		style="margin:0px;font-size:12px;z-index:1;height:60px;width:100%;display:none;">
			<input type="search"class="j-input j-small j-round j-border-0 j-color4 j-text-color3"
				placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="width:84%;height:inherit;display:inline;"/>
			<span class="j-right"style="position:relative;top:3px;left:0px;width:10%;height:inherit;padding-top:5px;">
				<span class='j-xlarge'>&times</span>
			</span>
		</div>
			<?php
		}
		?>
		<?php //loader icon and company name?>
		<div class="j-display-middle">
			<div class='j-text-color1 j-hide-small'>
				<span class='j-spinner-border j-spinner-border j-large'style='margin-right:5px;position:relative;top:3px;'></span>
				<span class='j-xlarge'><?=ucwords(get_xml_data('company_name'))?>...</span>
			</div>
			<div class='j-text-color1 j-hide-medium j-hide-large j-hide-xlarge'>
				<span class='j-spinner-border-sm j-spinner-border j-medium'style='margin-right:2px;'></span>
				<span class='j-small'><?=ucwords(get_xml_data('company_name'))?>...</span>
				</div>
		</div>
	</div>
</div>
<script>$('#load_modal').show();</script>