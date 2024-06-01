<?php //PARTNER JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/index.php'){ ?>
<?php //get partners result ?>
gpr(<?=$page_num?>);function gpr(pg){$.ajax({type:'POST',url:adar+'get/gpr/',data:{"s":$('#sx').val(),'pg':pg}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/insert_partner.enc.php'){ ?>
<?php //insert partners ?>
$(document).ready(function(){
$('#inspt').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting Partner');
$.ajax({type:'POST',url:adar+"act/ip/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while creating partner, try again'));r_b('Insert New Partner');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else{if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{$('#st').html(r_m2(s.message));};r_b('Insert New Partner');}})
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/update_partner.enc.php'){ ?>
<?php //update partner ?>
$(document).ready(function(){
$('#upspt').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating Partner');
$.ajax({type:'POST',url:adar+"act/upt/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){r_b('Update Partner');$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating partner, try again'));})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else{r_b('Update Partner');if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));}}})
})
})
<?php } ?>