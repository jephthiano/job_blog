<?php
//COMMENT FUNCTION STARTS
//get comment section starts
function get_comment_section($id){
	$display = 10;
	?>
	<div>
		<div class='j-text-color1 j-bolder'>
			<?php $total_comment = get_numrow('comment_table','n_id',$id,'','round',"AND c_status = 'active'");?>
			COMMENTS (<?=$total_comment?>)
		</div><br>
		<?php
		if($total_comment < 1){
			?>
			<div id=''>
				<span>Be the first to comment</span>
			</div>
			<?php
		}else{
			?>
			<div id='cmtdiv'><?php get_comment($id,0,$display);?></div>
			<?php
		}
		if(get_numrow('comment_table','n_id',$id,'return','round',"AND c_status = 'active'") > $display){
			?>
			<center>
				<div class="j-btn j-color1 j-round-large j-small"id='lmc'style="width:60%;margin-top:5px;"onclick='lmc(<?=addnum($id)?>);'>
				View more comment</div>
			</center>
			<?php
		}
		?>
	</div>
    <?php
}
//get comment section ends

//get comment starts
function get_comment($id,$start,$display){
	// creating connection
	require_once(file_location('inc_path','connection.inc.php'));
	@$conn = dbconnect('admin','PDO');
	$sql = "SELECT c_id,c_name,c_comment,c_regdatetime FROM comment_table
	WHERE c_status = 'active' AND n_id = :id ORDER BY c_id DESC LIMIT :start,:display";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->bindParam(':start',$start,PDO::PARAM_INT);
	$stmt->bindParam(':display',$display,PDO::PARAM_INT);
	$stmt->bindColumn('c_id',$c_id);
	$stmt->bindColumn('c_name',$name);
	$stmt->bindColumn('c_comment',$comment);
	$stmt->bindColumn('c_regdatetime',$datetime);
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){
		while($stmt->fetch()){
			if(empty($name) || is_null($name)){$name = 'Anonymous';}
			?>
			<div class='j-row j-border j-border-color5 j-padding j-round'id=''>
				<div class='j-col s2'>
					<center>
						<img src="<?=file_location('media_url','home/avatar.png')?>"alt='AVATAR'style='width:90%;max-width:70px;'class='j-circle'/>
					</center>
				</div>
				<div class='j-col s10'>
					<span class='j-bolder j-text-color1'><?=ucwords($name)?></span>
					<span class='j-text-color5'style='margin-left:9px;'><?=showdate2($datetime,'full')?></span>
					<br>
					<span><?=convert_2_br(decode_data($comment))?></span><br>
				</div>
				<span class='lsi j-hide'><?php //for start counter?></span>
			</div><br>
			<?php
		}// end of while
	}
}
//get comment ends
//COMMENT FUNCTION ENDS
?>