<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php');
require_once(file_location('admin_inc_path','session_check_nologout.inc.php'));
if(isset($_POST['s']) && isset($_POST['st']) && isset($_POST['pg'])){
	$searchtext = test_input(($_POST['s']));
	$status2 = test_input($_POST['st']);
	$cur_page = test_input(($_POST['pg']));
	if(is_numeric($status2)){
		$add = "n_id = '{$status2}'" ;
		$title = content_data('news_table','n_title',$status2,'n_id');
	}else{
		$add = "c_status = '{$status2}'" ;
		$title = $status2;
	}
	require_once(file_location('admin_inc_path','pagination_total.inc.php'));
	
	if(!empty($searchtext)){ // if the search text is not empty
		$searchtext = $searchtext."*";
		$sql = "SELECT c_id,c_name,c_comment,c_regdatetime,n_id FROM comment_table
		WHERE (MATCH(c_name,c_comment,c_ipaddress) AGAINST(:searchtext IN BOOLEAN MODE)) AND $add
		ORDER BY MATCH(c_name,c_comment,c_ipaddress) AGAINST(:searchtext IN BOOLEAN MODE)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':searchtext',$searchtext,PDO::PARAM_STR);
	}else{ // if it the field is empty
		$sql = "SELECT c_id,c_name,c_comment,c_status,c_regdatetime,n_id FROM comment_table WHERE $add ORDER BY c_id DESC LIMIT $start,$display";
		$stmt = $conn->prepare($sql);
	}// end of if empty($searchtext)
	$stmt->bindColumn('c_id',$id);
	$stmt->bindColumn('c_name',$name);
	$stmt->bindColumn('c_comment',$comment);
	$stmt->bindColumn('c_status',$comment_status);
	$stmt->bindColumn('c_regdatetime',$regdatetime);
	$stmt->bindColumn('n_id',$n_id);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){// if a record is found
		if(empty($searchtext)){$numRow = $total_records;}
		?>
		<center>
			<div class="j-responsive"style='line-height:27px;'>
				<p class="j-text-color5">
					<b><?=empty($searchtext)?$numRow.' Comment(s) found':$numRow." result(s) found for <span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$title." comments";?></b>
				</p>
				<table class="j-table-all j-border-0">
					<tr class="j-border-0 j-text-color1">
						<td><b>S/N</b></td><td><b>Name</b></td><td><b>Comment</b></td>
						<?php if(is_numeric($status2)){?><td><b>Status</b></td><?php }?>
						<td><b>Article</b></td>
						<td><b>Datetime</b></td><td><b>Preview</b></td>
					</tr>
					<?php
					while($stmt->fetch()){
						$article = content_data('news_table','n_title',$n_id,'n_id');
						if(empty($name) || is_null($name)){$name = 'Anonymous';}
						?>
						<tr class="j-border-0">
							<td><?php s_n();?></td><td><?=ucwords(($name));?></td>
							<td><?=decode_data($comment)?></td><?php if(is_numeric($status2)){?><td><?=$comment_status;?></td><?php }?>
							<td><?=$article?></td><td><?=showdate($regdatetime)?></td>
							<td><a href="<?= file_location('admin_url','comment/preview_comment/'.addnum($id))?>"><i class="<?= icon('eye');?>"></i></a></td>
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
				<b><?=empty($searchtext)?"0 $title comment found":"0 result found for <b><span class='j-text-color1'> '".remove_last_value($searchtext)."' </span> in ".$title." comment";?></b>
			</div>
		</center>
			<?php
		}// end of if $numRow
		require_once(file_location('admin_inc_path','pagination_button.inc.php'));
}// end of if isset
?>
<br><br><br><br>