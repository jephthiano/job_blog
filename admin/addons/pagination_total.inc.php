<?php
// creating connection
require_once(file_location('inc_path','connection.inc.php'));
@$conn = dbconnect('admin','PDO');
if(empty($searchtext)){// if the search text is not empty
  //PAGINATION CODE START HERE
  $display = 20; // number of records to show per page
  //calculate the number of pages
  if($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_admin_result.xhr.php'){ //for admin
    $total_records = get_numrow('admin_table','ad_id',1,"return",'no round',"AND {$add}",'not');
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_news_result.xhr.php'){ //for news
    $total_records = get_numrow('news_table','n_status',$status2,"return",'no round');
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_comment_result.xhr.php'){ //for comment
    if(is_numeric($status2)){
      $total_records = get_numrow('comment_table','n_id',$status2,"return",'no round');
    }else{
      $total_records = get_numrow('comment_table','c_status',$status2,"return",'no round');
    }
    
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_social_handle_result.xhr.php'){ //for social_handle
    $total_records = get_numrow('social_handle_table','','',"return",'no round');
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_partner_result.xhr.php'){ //for partner
    $total_records = get_numrow('partner_table','','',"return",'no round');
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_subscriber_result.xhr.php'){ //for subscriber
    $total_records = get_numrow('subscriber_table','','',"return",'no round');
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_message_result.xhr.php'){ //for message
    $total_records = get_numrow('message_table','','',"return",'no round',"WHERE {$add}");
  }elseif($_SERVER['PHP_SELF'] === '/admin/ajax/get/get_log_result.xhr.php'){ //for log
    $total_records = get_numrow('log_table','','',"return",'no round');
  }
  
  if($total_records > $display){ // if the number of record is more than the displayed num(10)
    $total_pages = ceil($total_records / $display);
  }else{ // if the number of record is not more than the displayed num(10)
    $total_pages = 1;
  }
  
  // getting the current page and where to start
  if(isset($cur_page) && is_numeric($cur_page) && $cur_page > 0){ // for other pages other than first page
    $current_page =  $cur_page; //  get the current page from the url if it is  not the first page
    $start = ($current_page * $display) - $display;            // use the current page to determine the $start in the LIMIT
    if($cur_page > $total_pages){die(page_not_available(''));}// what to echo if the user enter more than maximum page
  }else{ // if $_GET IS empty
    $current_page = 1;  $start = 0;// for the first page
  }
}
?>