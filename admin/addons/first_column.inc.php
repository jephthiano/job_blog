<div id="firstcol"style='line-height:27px;background-color:rgba(0,0,10,0.8);overflow-y:scroll;'>
    <a href="<?= file_location('admin_url','');?>"class="j-bar-item"style='padding:0px;'>
    <img src="<?=file_location('media_url','home/admin_logo.png')?>"class=''alt="<?=get_xml_data('company_name')?> LOGO IMAGE"style="width:100%;height:60px;">
    </a>
    <div class="j-text-color4"style='padding:20px 15px;background-image:url(<?=file_location('media_url','home/no_media.png')?>)'>
        <div class='j-row'>
            <div class='j-col s4 xl3'>
                <img class='j-circle'src='<?=file_location('media_url',get_media('admin',$adid))?>'style="height:40px;width:40px">
            </div>
            <div class='j-col s8 xl9'style='position: relative;top:5px;left:5px;'>
                <span class='j-bolder'><?=ucwords(content_data('admin_table','ad_fullname',$adid,'ad_id'))?> </span>
            </div>
        </div>
        <center><div class=''><b>(<?=ucwords(check_level(content_data('admin_table','ad_level',$adid,'ad_id')))?>)</b></div></center>
    </div>
    <div class=''>
        <div class='j-xlarge j-text-color4 j-padding'><b>Dashboard</b></div>
        <div class="j-small"style=''>
            <?php if($adlevel == 3){?>
                <a href="<?= file_location('admin_url','misc/settings/');?>"class="">
                <div class='<?=$_SERVER['PHP_SELF'] === '/admin/misc/settings.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> j-row j-padding'>
                    <b><span class="j-large j-col s3"><i class="<?=icon('cog')?>"></i> </span> <span class='j-col s9'>Site Settings</span></b>
                </div>
                </a>
                <a href="<?= file_location('admin_url','misc/site_data/');?>"class="">
                <div class='<?=$_SERVER['PHP_SELF'] === '/admin/misc/site_data.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> j-row j-padding'>
                    <b><span class="j-large j-col s3"><i class="<?=icon('address-card')?>"></i> </span> <span class='j-col s9'>Site Data</span></b>
                </div>
                </a>
                <a href="<?= file_location('admin_url','admin/all/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/admin/index.php' || $_SERVER['PHP_SELF'] === '/admin/admin/preview_admin.enc.php' || $_SERVER['PHP_SELF'] === '/admin/admin/insert_admin.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> 
                    j-row j-padding'>
                  <b><span class="j-large j-col s3"><i class='<?=icon('users')?>'></i> </span> <span class='j-col s9'> Admin</span></b>
                </div>
                </a>
            <?php } ?>
            <a href="<?= file_location('admin_url','news/active/');?>"class="">
            <div class='
            <?=$_SERVER['PHP_SELF'] === '/admin/news/index.php' || $_SERVER['PHP_SELF'] === '/admin/news/preview_news.enc.php' || $_SERVER['PHP_SELF'] === '/admin/news/insert_news.enc.php' || $_SERVER['PHP_SELF'] === '/admin/news/update_news.enc.php'?'j-color4 j-text-color3':'j-text-color4'?>
            j-row j-padding'>
            <b><span class="j-large j-col s3"><i class='<?=icon('newspaper')?>'></i> </span> <span class='j-col s9'>News</span></b>
            </div>
            </a>
            <a href="<?= file_location('admin_url','comment/active/');?>"class="">
            <div class='
            <?=$_SERVER['PHP_SELF'] === '/admin/comment/index.php' || $_SERVER['PHP_SELF'] === '/admin/comment/preview_comment.enc.php' || $_SERVER['PHP_SELF'] === '/admin/comment/insert_comment.enc.php' || $_SERVER['PHP_SELF'] === '/admin/comment/update_comment.enc.php'?'j-color4 j-text-color3':'j-text-color4'?>
            j-row j-padding'>
            <b><span class="j-large j-col s3"><i class='<?=icon('comment')?>'></i> </span> <span class='j-col s9'>Comment</span></b>
            </div>
            </a>
            <?php if($adlevel > 1){ ?>
                <a href="<?= file_location('admin_url','social_handle/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/social_handle/index.php' || $_SERVER['PHP_SELF'] === '/admin/social_handle/preview_social_handle.enc.php' || $_SERVER['PHP_SELF'] === '/admin/social_handle/insert_social_handle.enc.php' || $_SERVER['PHP_SELF'] === '/admin/social_handle/update_social_handle.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> 
                    j-row j-padding'>
                    <b><span class="j-large j-col s3"><i class='<?=icon('scribd','fab')?>'></i> </span> <span class='j-col s9'>Soc-Handles</span></b>
                </div>
                </a>
                <a href="<?= file_location('admin_url','partner/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/partner/index.php' || $_SERVER['PHP_SELF'] === '/admin/partner/preview_partner.enc.php' || $_SERVER['PHP_SELF'] === '/admin/partner/insert_partner.enc.php' || $_SERVER['PHP_SELF'] === '/admin/partner/update_partner.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> 
                    j-row j-padding'>
                    <b><span class="j-large j-col s3"><i class='<?=icon('handshake')?>'></i> </span> <span class='j-col s9'>Partners</span></b>
                </div>
                </a>
                <a href="<?= file_location('admin_url','subscriber/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/subscriber/index.php' || $_SERVER['PHP_SELF'] === '/admin/subscriber/preview_subscriber.enc.php'?'j-color4 j-text-color3':'j-text-color4'?> 
                    j-row j-padding'>
                    <b><span class="j-large j-col s3"><i class='<?=icon('user')?>'></i> </span> <span class='j-col s9'>Subscribers</span></b>
                </div>
                </a>
            <?php } ?>
                <a href="<?= file_location('admin_url','message/all/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/message/index.php' || $_SERVER['PHP_SELF'] === '/admin/message/preview_message.enc.php' || $_SERVER['PHP_SELF'] === '/admin/message/send_email.enc.php'?'j-color4 j-text-color3':'j-text-color4'?>
                    j-row j-padding'>
                    <b>
                        <span class="j-large j-col s3"><i class='<?=icon('envelope')?>'></i> </span>
                        <?php $numrowms = get_numrow('message_table','m_status','new',"return",'round');?>
                        <span class='j-col s9'>Messages (<?=$numrowms?>)</span>
                    </b>
                </div>
                </a>
                <?php if($adlevel == 3){?>
                <a href="<?= file_location('admin_url','log/');?>"class="">
                <div class='
                    <?=$_SERVER['PHP_SELF'] === '/admin/log/index.php' || $_SERVER['PHP_SELF'] === '/admin/log/preview_log.enc.php'?'j-color4 j-text-color3':'j-text-color4'?>
                    j-row j-padding'>
                    <b>
                        <span class="j-large j-col s3"><i class='<?=icon('file-alt')?>'></i> </span>
                        <span class='j-col s9'>Logs</span>
                    </b>
                </div>
                </a>
                <?php } ?>
        </div>
    </div>
</div>