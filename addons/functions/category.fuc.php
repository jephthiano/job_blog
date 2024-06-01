<?php
//CATEGORY FUNCTION STARTS
//function get category starts
function get_category($blog_category=''){
 $category = get_json_data('category','about_us');
 $category_array = explode('|',$category);$len = count($category_array);
			if($len > 0){
				foreach($category_array AS $index => $category){
          ?><option value='<?=strtolower($category)?>'<?php if(strtolower($blog_category)===strtolower($category)){echo 'selected';}?>><?=ucwords($category)?></option><?php
    }
   }
}
//function get category ends
//CATEGORY FUNCTION ENDS
?>