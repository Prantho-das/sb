<?php
if(isset($_POST["adminUpdateID"])){
if(!empty($_POST['adminAddress'])){
$sql = "SELECT * FROM admin_address WHERE admin_board_id='".mysqli_real_escape_string($data->con, $_POST['adminUpdateID'])."'";
$result = $data->con->query($sql);
if ($result->num_rows > 0) {
$update = array(
'admin_address_content' => mysqli_real_escape_string($data->con, $_POST['adminAddress']),
'admin_address_city'    => mysqli_real_escape_string($data->con, $_POST['adminCity']),
'admin_address_zip'     => mysqli_real_escape_string($data->con, $_POST['adminZip'])
);
$whereAddress = array(
'admin_board_id' => mysqli_real_escape_string($data->con, $_POST['adminUpdateID'])
);
if($data->update('admin_address', $update , $whereAddress))
{
$message = 'Success...';
}
}else{
$insert_data = array(
'admin_board_id'        => mysqli_real_escape_string($data->con, $_POST['adminUpdateID']),
'admin_address_content' => mysqli_real_escape_string($data->con, $_POST['adminAddress']),
'admin_address_city'    => mysqli_real_escape_string($data->con, $_POST['adminCity']),
'admin_address_zip'     => mysqli_real_escape_string($data->con, $_POST['adminZip'])
);
if($data->insert('admin_address', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["authUpdateID"])){
if(!empty($_POST['adminEmail'])){
$update = array(
'admin_board_name'   => mysqli_real_escape_string($data->con, $_POST['adminFname']),
'admin_board_email'  => mysqli_real_escape_string($data->con, $_POST['adminEmail']),
'admin_board_phone'  => mysqli_real_escape_string($data->con, $_POST['adminNumber'])
);
$whereAdmin = array(
'admin_board_id' => mysqli_real_escape_string($data->con, $_POST['authUpdateID'])
);
if($data->update('admin_board', $update , $whereAdmin))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["passUpdateID"])){
if(!empty($_POST['oldPassword'])){
$sql = "SELECT * FROM admin_board where admin_board_id='".$_POST["passUpdateID"]."'";
$result = $data->con->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
if (password_verify($_POST['oldPassword'], $row['admin_board_password'])) {
if((mysqli_real_escape_string($data->con, $_POST['newPassword'])) == (mysqli_real_escape_string($data->con, $_POST['confirmPassword']))){
if(strlen(mysqli_real_escape_string($data->con, $_POST['confirmPassword'])) >= 6){
$newpassword = array(
'admin_board_password' => mysqli_real_escape_string($data->con, password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT))
);
$where_passsword = array(
'admin_board_id' => mysqli_real_escape_string($data->con, $_POST['passUpdateID'])
);
if($data->update('admin_board', $newpassword , $where_passsword))
{
$message = 'Save Success...';
}
}else{
$message = 'Sorry password minlength 6';
}
}else{
$message = 'Sorry password not confirm';
}
}else{
$message = 'Sorry old password not match';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["UpcategorizeID"])){
if(!empty($_POST['UpcategorizeName'])){
$update = array(
'categories_name'       => mysqli_real_escape_string($data->con, $_POST['UpcategorizeName']),
'categories_slug'       => mysqli_real_escape_string($data->con, $_POST['UpcategorizeSlug']),
'categories_parant_id'  => mysqli_real_escape_string($data->con, $_POST['UpcategorizeParent']),
'categories_position'  => mysqli_real_escape_string($data->con, $_POST['UpcategorizePosition']),
'categories_descript'   => mysqli_real_escape_string($data->con, $_POST['UpcategorizeDescription'])
);
$whereCategories = array(
'categories_id' => mysqli_real_escape_string($data->con, $_POST['UpcategorizeID'])
);
if($data->update('categories', $update , $whereCategories))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["tagsID"])){
if(!empty($_POST['tagsID'])){
$update_data = array(
'tags_name'         => mysqli_real_escape_string($data->con, $_POST['tagsName']),
'tags_slug'         => mysqli_real_escape_string($data->con, $_POST['tagsSlug']),
'tags_description'  => mysqli_real_escape_string($data->con, $_POST['tagsDescription'])
);
$whereTags = array(
'tags_id' => mysqli_real_escape_string($data->con, $_POST['tagsID'])
);
if($data->update('tags', $update_data, $whereTags))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["pageID"])){
if(!empty($_POST['pageID'])){
$updatePages = array(
'pages_title'        => mysqli_real_escape_string($data->con, $_POST['pageTitle']),
'pages_content_slug' => mysqli_real_escape_string($data->con, $_POST['pageSlug']),
'pages_content'      => mysqli_real_escape_string($data->con, $_POST['pageDescription']),
'pages_possition'    => mysqli_real_escape_string($data->con, $_POST['pagesPossition']),
'pages_activitics'   => mysqli_real_escape_string($data->con, $_POST['pagesActivitics']),
'pages_content_side' => mysqli_real_escape_string($data->con, $_POST['pagesContentSide'])
);
$wherePages = array(
'pages_id' => mysqli_real_escape_string($data->con, $_POST['pageID'])
);
if($data->update('pages', $updatePages, $wherePages))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["pagesStatusName"])){
if(!empty($_POST['UpaddPages'])){
for($i=0; $i < count($_POST['UpaddPages']);$i++){
if(($_POST['pagesStatusName'] == 'publish') or ($_POST['pagesStatusName'] == 'unpublish')){
$UpdatePagesID = array(
'pages_id' => mysqli_real_escape_string($data->con, $_POST['UpaddPages'][$i])
);
$UpPages = array(
'pages_status' => mysqli_real_escape_string($data->con, $_POST['pagesStatusName'])
);
if($data->update('pages', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['pagesStatusName'] == 'delete'){
$UpdatePagesID = array(
'pages_id' => mysqli_real_escape_string($data->con, $_POST['UpaddPages'][$i])
);
if($data->delete('pages', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["UpPostNewsID"])){
if(!empty($_POST['UpNewsTitle'])){
$CategoriID = implode(",",$_POST['UpaddCategoriesID']);
$AddTags    = implode(",",$_POST['UpaddTags']);
$updatePages = array(
'newsa_post_title'        => mysqli_real_escape_string($data->con, $_POST['UpNewsTitle']),
'newsa_post_content'      => mysqli_real_escape_string($data->con, $_POST['UpnNwsContent']),
'newsa_post_format'       => mysqli_real_escape_string($data->con, $_POST['UpNewsFormat']),
'newsa_post_categoriid'   => mysqli_real_escape_string($data->con, $CategoriID),
'newsa_post_tagsid'       => mysqli_real_escape_string($data->con, $AddTags),
);
$wherePages = array(
'newsa_image_id' => mysqli_real_escape_string($data->con, $_POST['UpPostNewsID'])
);
if($data->update('newsa_post', $updatePages, $wherePages))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["PostNewsStatus"])){
if(!empty($_POST['UpaddPostnews'])){
for($i=0; $i < count($_POST['UpaddPostnews']);$i++){
if(($_POST['PostNewsStatus'] == 'publish') or ($_POST['PostNewsStatus'] == 'unpublish')){
$UpdatePagesID = array(
'newsa_post_id' => mysqli_real_escape_string($data->con, $_POST['UpaddPostnews'][$i])
);
$UpPages = array(
'newsa_post_public' => mysqli_real_escape_string($data->con, $_POST['PostNewsStatus'])
);
if($data->update('newsa_post', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['PostNewsStatus'] == 'delete'){
$UpdatePagesID = array(
'newsa_post_id' => mysqli_real_escape_string($data->con, $_POST['UpaddPostnews'][$i])
);
if($data->delete('newsa_post', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["update_web_title"])){
if(!empty($_POST['websiteUpID'])){
$updateTitle = array(
'website_title_content'   => mysqli_real_escape_string($data->con, $_POST['update_web_title']),
'website_title_createdb'  => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
$whereTitle = array(
'website_title_id' => mysqli_real_escape_string($data->con, $_POST['websiteUpID'])
);
if($data->update('website_title', $updateTitle, $whereTitle))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["statusCategoriseName"])){
if(!empty($_POST['UpaddCategorie'])){
for($i=0; $i < count($_POST['UpaddCategorie']);$i++){
if(($_POST['statusCategoriseName'] == 'publish') or ($_POST['statusCategoriseName'] == 'unpublish')){
$UpdatePagesID = array(
'categories_id' => mysqli_real_escape_string($data->con, $_POST['UpaddCategorie'][$i])
);
$UpPages = array(
'categories_status' => mysqli_real_escape_string($data->con, $_POST['statusCategoriseName'])
);
if($data->update('categories', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['statusCategoriseName'] == 'delete'){
$UpdatePagesID = array(
'categories_id' => mysqli_real_escape_string($data->con, $_POST['UpaddCategorie'][$i])
);
if($data->delete('categories', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["TagesStatusName"])){
if(!empty($_POST['UpaddTags'])){
for($i=0; $i < count($_POST['UpaddTags']);$i++){
if(($_POST['TagesStatusName'] == 'publish') or ($_POST['TagesStatusName'] == 'unpublish')){
$UpdatePagesID = array(
'tags_id' => mysqli_real_escape_string($data->con, $_POST['UpaddTags'][$i])
);
$UpPages = array(
'tags_status' => mysqli_real_escape_string($data->con, $_POST['TagesStatusName'])
);
if($data->update('tags', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['TagesStatusName'] == 'delete'){
$UpdatePagesID = array(
'tags_id' => mysqli_real_escape_string($data->con, $_POST['UpaddTags'][$i])
);
if($data->delete('tags', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["VideoStatusName"])){
if(!empty($_POST['UpaddVdeo'])){
for($i=0; $i < count($_POST['UpaddVdeo']);$i++){
if(($_POST['VideoStatusName'] == 'publish') or ($_POST['VideoStatusName'] == 'unpublish')){
$UpdatePagesID = array(
'video_gallery_id' => mysqli_real_escape_string($data->con, $_POST['UpaddVdeo'][$i])
);
$UpPages = array(
'video_gallery_status' => mysqli_real_escape_string($data->con, $_POST['VideoStatusName'])
);
if($data->update('video_gallery', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['VideoStatusName'] == 'delete'){
$UpdatePagesID = array(
'video_gallery_id' => mysqli_real_escape_string($data->con, $_POST['UpaddVdeo'][$i])
);
if($data->delete('video_gallery', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["UpchanneStoreID"])){
if(!empty($_POST['UpChannelName'])){
$updatePages = array(
'youtube_channel_name'    => mysqli_real_escape_string($data->con, $_POST['UpChannelName']),
'youtube_channel_url'     => mysqli_real_escape_string($data->con, $_POST['UpChannelUrl']),
'youtube_channel_content' => mysqli_real_escape_string($data->con, $_POST['UpChannelContent'])
);
$wherePages = array(
'youtube_channel_id' => mysqli_real_escape_string($data->con, $_POST['UpchanneStoreID'])
);
if($data->update('youtube_channel', $updatePages, $wherePages))
{
$message = 'Success...';
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
if(isset($_POST["channelStatusName"])){
if(!empty($_POST['UpaddChannel'])){
for($i=0; $i < count($_POST['UpaddChannel']);$i++){
if(($_POST['channelStatusName'] == 'publish') or ($_POST['channelStatusName'] == 'unpublish')){
$UpdatePagesID = array(
'youtube_channel_id' => mysqli_real_escape_string($data->con, $_POST['UpaddChannel'][$i])
);
$UpPages = array(
'youtube_channel_status' => mysqli_real_escape_string($data->con, $_POST['channelStatusName'])
);
if($data->update('youtube_channel', $UpPages, $UpdatePagesID))
{
$message = 'Success...';
}
}
if($_POST['channelStatusName'] == 'delete'){
$UpdatePagesID = array(
'youtube_channel_id' => mysqli_real_escape_string($data->con, $_POST['UpaddChannel'][$i])
);
if($data->delete('youtube_channel', $UpdatePagesID))
{
$message = 'Delete Now';
}
}
}
}else{
$message = 'This value is required...';
}
echo $message;
exit();
}
?>
