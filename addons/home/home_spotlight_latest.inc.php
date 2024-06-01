<div>
 <div style="margin-top:10px;">
  <?php // Spotlight ?>
  <div class="j-bolder j-xxlarge j-padding"style="border-left:solid 10px green;margin-bottom:3px;">Spotlight</div>
  <div>
   <?php
   $or = multiple_content_data('news_table','n_id','active','n_status',"ORDER BY RAND() LIMIT 6");
   if($or !== false){
    ?>
    <div class="j-row"><?php foreach($or AS $news_id){get_news($news_id,'spotlight');}?></div>
    <?php
   }else{
    ?><div class='j-center j-large'>No content available at the moment</div><?php
   }
   ?>
  </div>
 </div>
 
 <?php // latest ?>
 <div style="margin-top:10px;">
  <div class="j-bolder j-xxlarge j-padding"style="border-left:solid 10px green;margin-bottom:3px;">Latest</div>
  <div class="j-row-padding">
   <div class="j-col m6">
    <?php
    $news_id = content_data('news_table','n_id','active','n_status',"ORDER BY n_id DESC");
    if($news_id !== false){get_news($news_id,'home_preview2');}
    ?>
    </div>
   <div class="j-col m6">
    <?php
    $or = multiple_content_data('news_table','n_id','active','n_status',"ORDER BY n_id DESC LIMIT 1,6");
    if($or !== false){
     ?>
     <div class="j-row"><?php foreach($or AS $news_id){get_news($news_id,'sidebar2');}?></div>
     <?php
    }else{
     ?><div class='j-center j-large'>No content available at the moment</div><?php
    }
    ?>
   </div>
  </div>
 </div>
</div>
<br>