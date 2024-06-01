<script>
<?php
$js = ['general','admin','news','comment','social_handle','partner','subscriber','message','misc','log'];
foreach($js AS $section){require_once(file_location('admin_inc_path',"js/$section.js.php"));}
?>
</script>