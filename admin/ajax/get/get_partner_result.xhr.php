<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
if(isset($_POST['s']) && isset($_POST['pg'])){
	$searchtext = test_input(($_POST['s']));
	$cur_page = test_input(($_POST['pg']));
	require_once(file_location('admin_inc_path','pagination_total.inc.php'));
	
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext2 = $searchtext."*";
		$sql = "SELECT p_id,p_name FROM partner_table
		WHERE (MATCH(p_name) AGAINST(:searchtext IN BOOLEAN MODE))
		ORDER BY MATCH(p_name) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext2,PDO::PARAM_STR);
		$stmt->bindColumn('p_id',$id);
		$stmt->bindColumn('p_name',$name);
		$stmt->execute();
		$numRow = $stmt->rowCount();
	}else{ // if it the field is empty
		$sql = "SELECT p_id,p_name FROM partner_table ORDER BY p_id DESC LIMIT $start,$display";
		$stmt = $conn->prepare($sql);
		$stmt->bindColumn('p_id',$id);
		$stmt->bindColumn('p_name',$name);
		$stmt->execute();
		$numRow = $stmt->rowCount();
	}// end of if empty($searchtext)
	if($numRow > 0){		// if a record is found
		if(empty($searchtext)){$numRow = $total_records;}
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' Partner(s)':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in Partners";?></b>
				</p>
				<table class="j-table-all j-border-0">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Name</b></td><td><b>Preview</b></td><td><b>Edit</b></td><td><b>Delete</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($name));?></td>
							<td><a href='<?= file_location('admin_url','partner/preview_partner/'.addnum($id))?>'><i class="j-large <?= icon('eye');?>"></i></a></td>
							<td><a href='<?= file_location('admin_url','partner/update_partner/'.addnum($id))?>'><i class="j-large <?= icon('edit');?>"></i></a></td>
							<td><i class="j-large <?= icon('trash');?> j-clickable"onclick="$('#delete_partner<?=$id?>').show();"></i></td>
						</tr>
						<?php
						preview_modal('partner',$id);
					}// end of while
					?>
				</table>
			</div>
		</center>
		<?php
	}else{
		?>
		<br>
		<center>
			<div class='j-text-color5'>
				<b><?=empty($searchtext)?'0 Partner found':"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in Partner";?></b>
			</div>
		</center>
		<?php
	}// end of if $numRow
	require_once(file_location('admin_inc_path','pagination_button.inc.php'));
}// end of if isset
?>
<br><br><br><br>