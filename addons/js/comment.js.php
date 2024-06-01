<?php //COMMENT JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/news.enc.php'){ ?>
<?php //hide and show name and email?>
function hsn(n,m){if(n.checked === true){m.hide();}else{m.show();}}
<?php //insert comment?>
$(document).ready(function(){
$('#cmtfrm').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Submitting','id','cmtbtn');
$.ajax({type:'POST',url:dar+"act/ic/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while submitting comment, try again'));r_b('Submit','id','cmtbtn');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('.ip').val('');gcs(<?=addnum($id)?>)}$('#st').html(r_m2(s.message));};r_b('Submit','id','cmtbtn');});alertoff();
})
})
<?php //get comment section //to be called when comment is inserted?>
function gcs(i){
$.ajax({url:dar+"get/gcs/"+i+'/'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fetching comment, try again',))})
.done(function(e){$('#cmtsec').html(e);})
}
<?php //load more comment?>
function lmc(i){
var s=$('.lsi').length;var d=10;var p='/'+i+'/'+s+'/'+d;
$.ajax({url:dar+"get/lc"+p})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fetching more comment, try again',))})
.done(function(e){
<?php //check if the comment is more than remaining/ view more button control ?>
$.ajax({url:dar+"get/cmc"+p})
.done(function(s){if(s==='no'){$('#lmc').hide();}});
$('#cmtdiv').append(e);
})
}
<?php }?>