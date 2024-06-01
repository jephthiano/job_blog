<div id="nav"class="j-bar j-card-4 j-animate-left j-fixed-top j-home-padding"style="margin:0px;font-size:12px;z-index:1;height:60px;background-color:rgba(0,0,0,0.8);">
		<?php //code for large screen ?>
			<a href="<?= file_location('home_url','');?>"class="j-bar-item"style='padding:0px;'>
				<img src="<?=file_location('media_url','home/logo.png')?>"class=''alt="BLOG LOGO IMAGE"style="width:150px;height:58px;">
			</a>
			<a  id="mo" href="javascript:void(0)" class="j-text-color4 j-bar-item j-button j-right j-xlarge j-hide-large j-hide-xlarge" onclick="ad()">&#9776;</a>
			<span id='srht'class="j-text-color4 j-bar-item j-padding-16 j-hide-large j-hide-xlarge j-hide-medium j-right"onclick="n('nav',$('#nav'),$('#sp'))">
				<i class="j-large <?=icon('search')?>"></i>
			</span>
			<?php // search for large ?>
			<span class="j-bar-item j-hide-small"style='padding:7px 10px 5px 30px;'>
				<input type="search"name="txtsearch"id="txtsearch"class="searchinput j-input j-small j-border j-border-gray j-round"
					   onsearch="sb($('#txtsearch').val());"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="display:inline;width:300px"/>
				<span class="j-large j-clickable j-padding j-round j-color4"id="search" style="padding: 0px 0px;position:relative;top:3px;left:0px;"
					onclick="sb($('#txtsearch').val());">
					<i class="<?= icon('search');?>"></i>
				</span>
			</span>
			<div class="j-right j-text-color4 j-large j-hide-small j-hide-medium">
				<a href="<?= file_location('home_url','category/news/');?>" class="j-bar-item j-button j-padding-16">News</a>		
				<a href="<?= file_location('home_url','category/sport/');?>" class="j-bar-item j-button j-padding-16">Sport</a>
				<a href="<?= file_location('home_url','category/politics/');?>" class="j-bar-item j-button j-padding-16">Politics</a>
				<div style='display: inline;'class=''>
					<a href="<?= file_location('home_url','category/business/');?>" class="j-bar-item j-button j-padding-16">Business</a>
					<a href="<?= file_location('home_url','category/finance/');?>" class="j-bar-item j-button j-padding-16">Finance</a>
					<a href="<?= file_location('home_url','category/entertainment/');?>" class="j-bar-item j-hide-large j-button j-padding-16">Entertainment</a>
				</div>
			</div>
		<?// code for small screen ?>
		<div class="j-card-4 j-color3 j-hide-large j-hide-xlarge"><br><br><br>
			<div id="a" class="j-bar-block j-sidebar j-collapse j-animate-top j-bolder j-text-color4 clickable"
			style="max-height:310px;right:0;background-color:rgba(0,0,0,0.8);display:none">
				<a href="<?= file_location('home_url','category/news/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">News</a>		
				<a href="<?= file_location('home_url','category/sport/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Sport</a>
				<a href="<?= file_location('home_url','category/politics/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Politics</a>
				<a href="<?= file_location('home_url','category/business/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Business</a>
				<a href="<?= file_location('home_url','category/finance/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Finance</a>
				<a href="<?= file_location('home_url','category/entertainment/');?>"style="opacity:100%;"class="j-bar-item j-button j-padding-16">Entertainment</a>
			</div>
		</div>
</div>
<?php // search for small ?>
<div id='sp'class="j-card-4 j-color3 j-fixed-top j-animate-top j-hide-medium j-hide-large j-hide-xlarge"
style="margin:0px;font-size:12px;z-index:1;height:60px;width:100%;display:none;">
	<input type="search"name="txtsearch2"id="txtsearch2"class="searchinput j-input j-small j-round j-border-0 j-color4 j-text-color3"
		onsearch="sb($('#txtsearch2').val());"onkeyup="s($('#txtsearch2'),$('#search2'));"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="width:84%;height:inherit;display:inline;"/>
	<span id="search2"class="j-right"style="position:relative;top:3px;left:0px;width:10%;height:inherit;padding-top:5px;">
		<span class='j-xlarge'onclick="n('sea',$('#nav'),$('#sp'))">&times</span>
	</span>
</div>
<?php //header ?>
<div id='header'class="j-center j-light-gray"style='height:1px;margin-top:60px;'></div>