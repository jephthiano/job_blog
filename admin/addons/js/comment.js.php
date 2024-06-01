<?php //SUBSCRIBER JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/comment/index.php'){ ?>
<?php //get comment result ?>
gcr('<?=$status?>',<?=$page_num?>);function gcr(st,pg){$.ajax({type:'POST',url:adar+'get/gcr/',data:{"s":$('#sx').val(),"st":st,'pg':pg}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>