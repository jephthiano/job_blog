<div id="footer"title='footer'class="j-color3 j-text-color4 j-home-padding"style="padding-bottom:8px;padding-top:8px">
	<div class='j-center'><h4 style="font-size:20px"><b><?=ucwords(get_xml_data('company_name'))?></b></h4></div>
	<div class=''>
		<div class='j-row j-text-color4'>
			<div class='j-col m3 j-padding'>
				<div class='j-bolder'>STAY CONNECTED</div>
				<div class=""><?php get_all_social_handle('j-color4','j-text-color7')?></div>
			</div>
			<div class='j-col m3 j-padding'>
				<div class='j-bolder'>SUPPORT</div>
				<div class='j-text-color6'>
					<a href="<?=file_location('home_url','misc/about_us/');?>"class="j-round-large"title="ABOUT">About us</a><br>
					<a href="<?=file_location('home_url','misc/contact_us/');?>"class="j-round-large"title="CONTACT US">Contact us</a><br>
					<a href="<?=file_location('home_url','misc/faq/');?>"class="j-round-large"title="PRIVACY POLICY">FAQ</a><br>
					</div>
			</div>
			<div class='j-col m3 j-padding'>
				<div class='j-bolder'>LEGAL</div>
				<div class='j-text-color6'>
					<a href="<?=file_location('home_url','misc/terms_of_service/');?>"class="j-round-large"title="TERMS OF SERVICES">Terms of Service</a><br>
					<a href="<?=file_location('home_url','misc/privacy_policy/');?>"class="j-round-large"title="PRIVACY POLICY">Privacy Policy</a><br>
				</div>
			</div>
			<div class='j-col m3 j-padding'>
				<div class='j-bolder'>PARTNERS</div>
				<div class='j-text-color6'>
					<?php
					require_once(file_location('inc_path','connection.inc.php'));
					@$conn = dbconnect('admin','PDO');
					$sql = "SELECT p_id from partner_table";
					$stmt = $conn->prepare($sql);
					$stmt->bindColumn('p_id',$partner_id);
					$stmt->execute();
					$numRow = $stmt->rowCount();
					if($numRow > 0){
						while($stmt->fetch()){get_partner($partner_id);}// end of while
					}else{ // if num_row is 0
						?><div>No Partner at the moment, contact us to be a partner</div><?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
    <p class="j-small j-center"style="margin:0px;padding:5px;font-family:Open Sans">Copyright &copy <?= date("Y")?> <?=ucwords(get_xml_data('company_name'))?>. All rights reserved.</p>
	<center><a class='j-text-color4 j-underline'target="_blank"href="https://jephthiano.000webhostapp.com">Designed & Developed by Oladejo Jephthah</a></center>
</div>