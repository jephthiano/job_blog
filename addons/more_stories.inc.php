<?php // more stories
$or = multiple_content_data('news_table','n_id','',''," ORDER BY RAND() LIMIT 20");
if($or !== false){
  ?>
  <div class='j-color7'><div class='j-padding j-large'><b>More Stories</b></div></div>
  <div class='j-vertical-scroll'>
    <?php
    foreach($or AS $n_id){get_news($n_id,'horizontal');}
    ?>
  </div>
  <?php
  }
?>