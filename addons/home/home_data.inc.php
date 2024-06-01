<div>
 <div style="margin-top:10px;">
  <div class="j-bolder j-xxlarge j-padding"style="border-left:solid 10px <?=$color?>;margin-bottom:3px;">
   <?=ucwords($category)?>
  </div>
  <div style="margin-bottom:9px;">
   <?php
   $news_id = content_data('news_table','n_id','active','n_status',"AND n_category = '{$category}' ORDER BY n_id DESC");
   if($news_id !== false){get_news($news_id,'home_preview');}
   ?>
   </div>
  <div>
   <?php
   $or = multiple_content_data('news_table','n_id','active','n_status',"AND n_category = '{$category}' ORDER BY n_id DESC LIMIT 1,6");
   if($or !== false){
    ?>
    <div class="j-row"><?php foreach($or AS $news_id){get_news($news_id,'home_add');}?></div>
    <?php
   }else{
    ?><div class='j-center j-large'>No <?=$category?> article available at the moment</div><?php
   }
   ?>
   </div>
  <a href="<?=file_location('home_url',"category/{$category}/")?>">
   <center><div class='j-btn j-round j-color1 j-bolder j-margin'>Read More <?=ucwords($category)?> Articles</div></center>
  </a>
 </div>
</div>
<br>