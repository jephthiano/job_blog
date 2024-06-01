<div class="j-cnter">
 <div class='j-xlarge j-bolder j-color7 j-text-color4 j-padding'>Categories</div>
 <?php
 $category = get_json_data('category','about_us');
 $category_array = explode('|',$category);$len = count($category_array);
 if($len > 0){
  foreach($category_array AS $index => $category){
   ?>
   <a href="<?=file_location('home_url','category/'.$category.'/')?>">
    <span class="j-tag j-btn j-black j-margin-bottom j-round j-large"style="margin:10px;padding:16px"><?=ucfirst($category)?></span>
   </a>
   <?php
  }
 }else{
  ?>
  <a href="<?=file_location('home_url','category/sport/')?>"><span class="j-tag j-btn j-black j-margin-bottom j-round j-large">Sport</span></a>
  <a href="<?=file_location('home_url','category/news')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">News</span></a>
  <a href="<?=file_location('home_url','category/politics/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Politics</span></a>
  <a href="<?=file_location('home_url','category/religion/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Religion</span></a>
  <a href="<?=file_location('home_url','category/entertainment/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Entertainment</span></a>
  <a href="<?=file_location('home_url','category/lifestyle/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Lifestyle</span></a>
  <a href="<?=file_location('home_url','category/business/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Business</span></a>
  <a href="<?=file_location('home_url','category/health')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Health</span></a>
  <a href="<?=file_location('home_url','category/travel')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Travel</span></a>
  <a href="<?=file_location('home_url','category/technology')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Technology</span></a>
  <a href="<?=file_location('home_url','category/finance')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom j-round j-large">Finance</span></a>
  <?php
 }
 ?>
</div>