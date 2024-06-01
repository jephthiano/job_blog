<?php
//MODAL FUNCTION STARTS
//admin modal starts
function admin_modal($type,$id='none',$subtype=''){
 if($type === 'admin_log_out'){
 ?>
 <!--logout modal starts-->
 <center>
  <div id="log_out_modal"class="j-modal j-modal-click">
   <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1"style="width:98%;max-width:400px;height:auto;">
    <div class="j-display-container j-center">
     <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#log_out_modal').hide();"></span>
     <div class="j-container j-text-color1"><p><b>Log Out?</b></p></div>
     <div>
      <h5 class="j-text-color3">Are you sure want to log out of your account?</h5><hr>
							<p style='display:inline'><button id='lobtn'class="j-margin j-btn j-round-large j-color1 j-text-color4"onClick="lg();">Log Out</button></p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color3 j-hover-color1 j-round-large"onclick="$('#log_out_modal').hide();">Cancel</button></p>
					</div>
    </div>
   </div>
  </div>
	</center>
	<!--logout modal ends-->
 <?php
 }elseif($type === 'admin_delete_account'){
  ?>
  <!--deleteadmin modal starts-->
  <center>
   <div  id="delete_account_modal" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#delete_account_modal').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Delete Account?</b></p></div>
      <div>
       <h5 class="j-text-color3">Are you sure want to delete your account?. The action cannot be reverse.</h5><hr>
       <span class='j-text-color1 mg j-left'id='pse'></span>
       <input type="password"class=" j-input j-medium j-border j-border-color5 j-round-large"placeholder="Password"
          name="ps"id="ps"value=""style="width:100%;"/>
							<p style='display:inline'><button type="submit"id='dabtn'class="j-margin j-btn j-round j-color1 j-text-color4"onClick="da($('#ps'))">Delete Account</button></p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#delete_account_modal').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <!--deleteadmin modal ends-->
  <?php
 }
}
//admin modal ends

function image_modal($type,$id,$s_id=1500000000){
 if(get_media($type,$id) !== 'home/no_media.png' && get_media($type,$id) !== 'home/avatar.png'){$image = 'exists';}else{$image = 'no image';} //check if image exists
 ?>
 <div id="<?=$type.$id?>_pics_modal" class="j-modal">
  <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-teal">
   <div class="j-display-container">
    <div class="j-line-height j-text-color1">
     <div class='j-clickable j-row'onclick="$('#<?=$type.$id?>_pics_modal').hide();ti($('#<?=$type.$id?>_pics'))">
      <div class="j-col s1"> <i class='<?= icon('upload');?>'></i> </div>
      <div class="j-col s11 j-bolder"><?= $image === 'exists'?'Change':'Upload'?> Image</div>
     </div>
     <input type="file"name="<?=$type?>_pics"id="<?=$type.$id?>_pics"class="j-round j-hide"onchange="ci(this,'<?=$type?>',<?=addnum($id)?>,<?=addnum($s_id)?>);">
     <?php
     if($image === 'exists'){
      ?>
      <div class='j-clickable j-row' onclick="$('#remove_<?=$type.$id?>_image_modal').show();$('#<?=$type.$id?>_pics_modal').hide();">
       <div class="j-col s1"> <i class='<?= icon('times');?>'></i> </div>
       <div class="j-col s11 j-bolder">Remove Image</div>
      </div>
      <?php
      }
      ?>
   </div>
   </div>
  </div>
 </div>
 <!--remove image modal starts-->
  <center>
   <div  id="remove_<?=$type.$id?>_image_modal" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#remove_<?=$type.$id?>_image_modal').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Remove Image?</b></p></div>
      <div>
       <h5 class="j-text-color3">Are you sure want to remove the image? The action cannot be reverse.</h5><hr>
							<p style='display:inline'><button type="submit"id='rmbtn<?=$id?>'class="rmbtn j-margin j-btn j-round j-color1 j-text-color4"onClick="ri('<?=$type?>',<?=addnum($id)?>);">Remove</button></p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#remove_<?=$type.$id?>_image_modal').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <!--remove image modal ends-->
 <?php
 }
//image modal ends

//preview modal starts
function preview_modal($type,$id=''){
 //STARTS OF SUB MODAL
 //<!--update level modal for admin starts-->
 if($type === 'admin'){
   ?>
  <center>
   <div  id="update_<?=$type.$id?>" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#update_<?=$type.$id?>').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Update <?=ucfirst(content_data('admin_table','ad_username',$id,'ad_id'))?> Level?</b></p></div>
      <div>
       <?php $cur_level = content_data('admin_table','ad_level',$id,'ad_id');?>
       <div class='j-left'style='margin-bottom:9px;'><span class='j-bolder j-text-color5'>Current Level:</span> <span><?=ucwords(check_level($cur_level))?></span></div>
       <select id="lv"name="lv"class="j-select j-border j-border-color5 j-color4 j-round-large"style="width:98%;"><?php get_level(3,$cur_level,'upgrade')?></select><br>
							<p style='display:inline'><button type="submit"id='clbtn'class="j-margin j-btn j-round j-color1 j-text-color4"onclick="upl($('#lv').val(),<?=$id?>);">Update</button></p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#update_<?=$type.$id?>').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //<!--update level modal ends-->
  //<!--update status starts-->
  if($type === 'admin'){
  ?>
  <center>
   <div  id="<?=$type.$id?>status" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#<?=$type.$id?>status').hide();"></span>
      <?php
      if($type === 'admin'){
       $status = content_data('admin_table','ad_status',$id,'ad_id');
       $status === 'active'? $new_status = 'suspended' : $new_status = 'active';
       ?>
       <div class="j-container j-text-color1"><p><b> <?=$status === 'active'?'Suspend':'Re-activate';?> <?=ucwords($type)?>?</b></p></div>
        <h5 class="j-text-color3">Are you sure?</h5><hr>
        <p style='display:inline'>
         <button type="submit"id='upbtn<?=$type?>'class="j-margin j-btn j-round j-color1 j-text-color4"
         onClick="cs('<?=$type?>',<?=addnum($id)?>,'<?=$new_status?>')">Update
         </button>
        </p>
       <?php
      }
      ?>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#<?=$type.$id?>status').hide();">Cancel</button></p>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //<!--update status ends-->
  //<!--update status modal for news and comment starts-->
 if($type === 'news' || $type === 'comment'){
   ?>
  <center>
   <div  id="update_<?=$type.$id?>" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#update_<?=$type.$id?>').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Update Status?</b></p></div>
      <div>
       <?php
       if($type === 'news'){$cur_status = content_data('news_table','n_status',$id,'n_id');}elseif($type === 'comment'){$cur_status = content_data('comment_table','c_status',$id,'c_id');;}
       if($type === 'news'){$all_level = ['active','pending','suspended'];}elseif($type === 'comment'){$all_level = ['active','suspended'];}
       ?>
       <div class='j-left'style='margin-bottom:9px;'>
        <span class='j-bolder j-text-color5'>Current Status:</span>
        <span><?=ucwords(($cur_status))?></span>
       </div>
       <select id="sta"name="sta"class="j-select j-border j-border-color5 j-color4 j-round-large"style="width:98%;">
        <option value="">Select Status</option>
        <?php
        foreach($all_level AS $level){if($level !== $cur_status){?><option value="<?=$level?>"><?=ucwords($level)?></option><?php }}
        ?>
       </select><br>
							<p style='display:inline'><button type="submit"id='clbtn'class="j-margin j-btn j-round j-color1 j-text-color4"
       onclick="cs('<?=$type?>',<?=addnum($id)?>,$('#sta').val())">Update</button></p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#update_<?=$type.$id?>').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //<!--update status news ends-->
  //delete modal starts
  if($type !== 'message'){
  ?>
  <center>
   <div  id="delete_<?=$type.$id?>" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#delete_<?=$type.$id?>').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Delete <?=ucfirst($type)?>?</b></p></div>
      <div>
       <h5 class="j-text-color3">Your action cannot be reversed.</h5><hr>
							<p style='display:inline'>
        <button type="submit"id=''class="dcbtn<?=$type?> j-margin j-btn j-round j-color1 j-text-color4"onClick="dc('<?=$type?>',<?=addnum($id)?>);">
          Delete
        </button>
       </p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#delete_<?=$type.$id?>').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //delete modal ends
  //clear logs modal starts
  if($type === 'log' ){
  ?>
  <center>
   <div  id="clear_<?=$type?>" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#clear_<?=$type?>').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Clear <?=($type)?>?</b></p></div>
      <div>
       <h5 class="j-text-color3">Your action cannot be reversed.</h5><hr>
							<p style='display:inline'>
        <button type="submit"id='clbtn'class="j-margin j-btn j-round j-color1 j-text-color4"onClick="cl();">Clear Logs</button>
       </p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#clear_<?=$type?>').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //clear logs modal ends
  //run action modal starts
  if($type === 'run_action' ){
  ?>
  <center>
   <div  id="run_action" class="j-modal j-modal-click">
    <div class="j-card-4 j-modal-content j-light-color5 j-round-large j-padding j-text-color1" style="width:98%; max-width:400px;height: auto;">
     <div class="j-display-container j-center">
      <span class="j-button j-display-topright j-large j-text-color1 <?=icon('times')?>"onclick="$('#run_action').hide();"></span>
      <div class="j-container j-text-color1"><p><b>Run Action?</b></p></div>
      <div>
       <h5 class="j-text-color3">Your action cannot be reversed.</h5><hr>
							<p style='display:inline'>
        <button type="submit"id='rabtn'class="j-margin j-btn j-round j-color1 j-text-color4"onClick="ra();">Run Actions</button>
       </p>
       <p style='display:inline'><button class="j-margin j-btn j-border j-border-color1 j-text-color1 j-hover-color1 j-round" onclick="$('#run_action').hide();">Cancel</button></p>
      </div>
     </div>
    </div>
   </div>
  </center>
  <?php
  }
  //run action modal ends
  //END OF SUB MODAL
}
//preview modal ends
//MODAL FUNCTIONS ENDS
?>