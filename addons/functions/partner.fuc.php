<?php
//PARTNER FUNCTION STARTS
//get partner starts
function get_partner($id){
 ?>
  <div class='j-row'>
   <div class='j-col s12'style='padding: 0px 0px;'>
   <img src="<?=file_location('media_url',get_media('partner',$id))?>"alt="<?=ucfirst((content_data('partner_table','p_name',$id,'p_id')))?>Image"class=""style="width:17px;height:17px;margin-right:4px;">
   
   <span class=""><?=ucfirst((content_data('partner_table','p_name',$id,'p_id')))?></span>
   </div>
  </div>
 <?php
}
//PARTNER FUNCTION ENDS
?>