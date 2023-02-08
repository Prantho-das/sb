<?php
if(isset($_POST["imageDeleteID"])){
if(!empty($_POST['imageDeleteID'])){
foreach($_POST['imageDeleteID'] as $DELimages){
$where_delete = array(
'img_store_id' => $DELimages
);
if($data->delete('images_storages',  $where_delete))
{
$message = 'Delete Now...';
}
}
}else{
$message = 'Please Select';
}
echo $message;
exit();
}
?>
