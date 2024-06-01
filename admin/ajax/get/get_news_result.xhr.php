<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once(file_location('admin_inc_path','session_check_nologout.inc.php'));
if(isset($_POST['s']) && isset($_POST['st']) && isset($_POST['pg'])){
	$searchtext = test_input(($_POST['s']));
	$status2 = test_input($_POST['st']);
	$cur_page = test_input(($_POST['pg']));
	$add = "n_status = '{$status2}'" ;
	require_once(file_location('admin_inc_path','pagination_total.inc.php'));
	
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT n_id,n_title,n_category,n_regdatetime FROM news_table
		WHERE (MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:searchtext IN BOOLEAN MODE)) AND $add
		ORDER BY MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT n_id,n_title,n_category,n_regdatetime FROM news_table WHERE $add ORDER BY n_id DESC LIMIT $start,$display";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('n_id',$id);
	$stmt->bindColumn('n_title',$title);
	$stmt->bindColumn('n_category',$category);
	$stmt->bindColumn('n_regdatetime',$regdatetime);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		if(empty($searchtext)){$numRow = $total_records;}
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' News(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." newss";?></b>
				</p>
				<table class="j-table-all j-border-0">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Title</b></td><td><b>Image</b></td><td><b>Category</b></td>
						<td><b>Datetime</b></td><td><b>Preview</b></td>
						<?php if($adlevel > 1){ ?>
						<td><b>Edit</b></td>
						<?php } ?>
					</tr>
					<?php
					while($stmt->fetch()){
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($title));?></td>
							<td><img class='j-round'src="<?=file_location('media_url',get_media('news',$id))?>"style='width:30px;height:30px;'/></td>
							<td><?=$category?></td><td><?=showdate($regdatetime)?></td>
							<td><a href='<?= file_location('admin_url','news/preview_news/'.addnum($id))?>'><i class="<?= icon('eye');?>"></i></a></td>
							<?php if($adlevel > 1){ ?>
							<td><a href='<?= file_location('admin_url','news/update_news/'.addnum($id))?>'><i class="j-large <?= icon('edit');?>"></i></a></td>
							<?php } ?>
						</tr>
						<?php
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
				<b><?=empty($searchtext)?"0 $status2 news found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$status2." news";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
		
		require_once(file_location('admin_inc_path','pagination_button.inc.php'));
}// end of if isset
?>
<br><br><br><br>