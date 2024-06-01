<?php //SUBSCRIBER JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/subscriber/index.php'){ ?>
<?php //get subscriber result ?>
gsr(<?=$page_num?>);function gsr(pg){$.ajax({type:'POST',url:adar+'get/gsr/',data:{"s":$('#sx').val(),'pg':pg}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>