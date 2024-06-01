<?php //NEWS JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/index.php'){ ?>
<?php //get news result ?>
gnr('<?=$status?>',<?=$page_num?>);function gnr(st,pg){$.ajax({type:'POST',url:adar+'get/gnr/',data:{"s":$('#sx').val(),"st":st,'pg':pg}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/insert_news.enc.php'){ ?>
<?php //insert newss ?>
$(document).ready(function(){
$('#insnw').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting News');
$.ajax({type:'POST',url:adar+"act/in/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while creating news, try again'));r_b('Insert New News');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else{if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{$('#st').html(r_m2(s.message));};r_b('Insert New News');}})
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/update_news.enc.php'){ ?>
<?php //update news ?>
$(document).ready(function(){
$('#upnw').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating News');
$.ajax({type:'POST',url:adar+"act/upn/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){r_b('Update News');$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating news, try again'));})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else{r_b('Update News');if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));}}})
})
})
<?php } ?>