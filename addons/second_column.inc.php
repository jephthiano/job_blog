<div>
    <?php //ADVERT ?>
    <?php show_advert('sidebar')?>
    <?php //POPULAR POSTS ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Latest Posts</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            $or = multiple_content_data('news_table','n_id','active','n_status',"ORDER BY n_id DESC LIMIT 5");
            if($or !== false){
                ?>
                <div class="j-row"><?php foreach($or AS $news_id){get_news($news_id,'sidebar');}?></div>
                <?php
            }else{
                ?><div class='j-center j-margin'>No content to display</div><br><?php
            }
            ?>
        </ul>
    </div>
    <?php //ADVERT ?>
    <?php show_advert('sidebar')?>
    <?php //LATEST POST ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Popular Posts</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            $or = multiple_content_data('news_table','n_id','active','n_status',"ORDER BY RAND() LIMIT 5");
            if($or !== false){
                ?>
                <div class="j-row"><?php foreach($or AS $news_id){get_news($news_id,'sidebar');}?></div>
                <?php
            }else{
                ?><div class='j-center j-margin'>No content to display</div><br><?php
            }
            ?>
        </ul>
    </div>
    <?php //TAGS ?>
    <div class="j-card j-white" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-black"><h4>Tags</h4></div>
        <div class="j-container j-white">
            <p>
                <?php
                $category = get_json_data('category','about_us');
                $category_array = explode('|',$category);$len = count($category_array);
                if($len > 0){
                    foreach($category_array AS $index => $category){
                        ?>
                        <a href="<?=file_location('home_url','category/'.$category.'/')?>">
                        <span class="j-tag j-btn j-black j-margin-bottom"><?=ucfirst($category)?></span>
                        </a>
                        <?php
                    }
                }else{
                    ?>
                    <a href="<?=file_location('home_url','category/sport/')?>"><span class="j-tag j-btn j-black j-margin-bottom">Sport</span></a>
                    <a href="<?=file_location('home_url','category/news')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">News</span></a>
                    <a href="<?=file_location('home_url','category/politics/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Politics</span></a>
                    <a href="<?=file_location('home_url','category/religion/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Religion</span></a>
                    <a href="<?=file_location('home_url','category/entertainment/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Entertainment</span></a>
                    <a href="<?=file_location('home_url','category/lifestyle/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Lifestyle</span></a>
                    <a href="<?=file_location('home_url','category/business/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Business</span></a>
                    <a href="<?=file_location('home_url','category/health')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Health</span></a>
                    <a href="<?=file_location('home_url','category/travel')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Travel</span></a>
                    <a href="<?=file_location('home_url','category/technology')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Technology</span></a>
                    <a href="<?=file_location('home_url','category/finance')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Finance</span></a>
                    <?php
                }
                ?>
			</p>
        </div>
    </div>
    <?php //FOLLOW US ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Follow Us</h4></div>
        <div class="j-container j-xlarge j-padding j-color5">
            <div class=""><?php get_all_social_handle('j-color4','j-text-color7')?></div>
        </div>
    </div>
    <?php //NEWSLETTER ?>
    <?php
    if($_SERVER['PHP_SELF'] !== '/index.php'){
        ?>
        <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
            <div class="j-container j-padding j-color3"><h4>Subscribe To Our Newletter</h4></div>
            <div class="j-text-color3 j-panel">Join our mailing list to receive updates on the latest news and programmes.</div>
            <div class="j-container">
                <form id='subform'class=''>
                    <span class='mg j-text-color1'id='nme'></span>
                    <input type='text'id='nm'name='nm'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Name'style="width:100%;"/><br>
                    <span class='mg j-text-color1'id='eme'></span>
                    <input type='email'id='em'name='em'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Email'style="width:100%;"/><br>
                    <div style='padding-bottom: 20px;'class='j-itallic'>By clicking Subscribe, agree to receive notifications, updates, publications, alerts and newsletters from <?=ucwords(get_xml_data('company_name'))?>.</div>
                    <button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Subscribe</button>
                </form>
            </div><br>
        </div>
        <?php
        $second_column = 'set';
    }
    ?>
</div>