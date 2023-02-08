<?php
if(isset($_POST["categorizeName"])){
if(!empty($_POST['categorizeName'])){
$where = array(
'categories_name'     => mysqli_real_escape_string($data->con, $_POST['categorizeName']),
'categories_position' => mysqli_real_escape_string($data->con, $_POST['categorizePosition'])
);
$result = $data->select_where('categories', $where);
if(count($result) > 0){
$message = 'Categori name done...';
}else{
$insert_data = array(
'categories_name'       => mysqli_real_escape_string($data->con, $_POST['categorizeName']),
'categories_slug'       => mysqli_real_escape_string($data->con, $_POST['categorizeSlug']),
'categories_parant_id'  => mysqli_real_escape_string($data->con, $_POST['categorizeParent']),
'categories_position'  => mysqli_real_escape_string($data->con, $_POST['categorizePosition']),
'categories_descript'   => mysqli_real_escape_string($data->con, $_POST['categorizeDescription']),
'categories_status'     => mysqli_real_escape_string($data->con, 'unpublish'),
'categories_createdb'   => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->insert('categories', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["tagsInsert"])){
if(!empty($_POST['tagsName'])){
$where = array(
'tags_name'    => mysqli_real_escape_string($data->con, $_POST['tagsName'])
);
$result = $data->select_where('tags', $where);
if(count($result) > 0){
$message = 'Tage name done...';
}else{
$insert_data = array(
'tags_name'         => mysqli_real_escape_string($data->con, $_POST['tagsName']),
'tags_slug'         => mysqli_real_escape_string($data->con, $_POST['tagsSlug']),
'tags_description'  => mysqli_real_escape_string($data->con, $_POST['tagsDescription']),
'tags_status'       => mysqli_real_escape_string($data->con, 'unpublish'),
'tags_createdb'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->insert('tags', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["pageInsert"])){
if(!empty($_POST['pageDescription'])){
$where = array(
'pages_title'    => mysqli_real_escape_string($data->con, $_POST['pageTitle'])
);
$result = $data->select_where('pages', $where);
if(count($result) > 0){
$message = 'Title name done...';
}else {
$insert_data = array(
'pages_title'        => mysqli_real_escape_string($data->con, $_POST['pageTitle']),
'pages_content_slug' => mysqli_real_escape_string($data->con, $_POST['pageSlug']),
'pages_content'      => mysqli_real_escape_string($data->con, $_POST['pageDescription']),
'pages_possition'    => mysqli_real_escape_string($data->con, $_POST['pagesPossition']),
'pages_activitics'   => mysqli_real_escape_string($data->con, $_POST['pagesActivitics']),
'pages_content_side' => mysqli_real_escape_string($data->con, $_POST['pagesContentSide']),
'pages_author'       => mysqli_real_escape_string($data->con, 'admin'),
'pages_status'       => mysqli_real_escape_string($data->con, 'unpublish'),
'pages_createdb'     => mysqli_real_escape_string($data->con, date('Y/m/d, h:i:sa'))
);
if($data->insert('pages', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["postNewsID"])){
if(!empty($_POST['newsTitle'])){
$where = array(
'newsa_post_title'  => mysqli_real_escape_string($data->con, $_POST['newsTitle'])
);
$result = $data->select_where('newsa_post', $where);
if(count($result) > 0){
$message = 'Title name done...';
}else {
$CategoriID = implode(",",$_POST['addCategoriesID']);
$AddTags    = implode(",",$_POST['addTags']);
$insert_data = array(
'newsa_image_id'          => mysqli_real_escape_string($data->con, $_POST['postNewsID']),
'newsa_post_title'        => mysqli_real_escape_string($data->con, $_POST['newsTitle']),
'newsa_post_content'      => mysqli_real_escape_string($data->con, $_POST['content']),
'newsa_post_format'       => mysqli_real_escape_string($data->con, $_POST['newsFormat']),
'newsa_post_categoriid'   => mysqli_real_escape_string($data->con, $CategoriID),
'newsa_post_tagsid'       => mysqli_real_escape_string($data->con, $AddTags),
'newsa_post_public'       => mysqli_real_escape_string($data->con, $_POST['NewsStatus']),
'newsa_post_createdb'     => mysqli_real_escape_string($data->con, date('Y/m/d, h:i:sa'))
);
if($data->insert('newsa_post', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["videoTitle"])){
if(!empty($_POST['videoID'])){
$whereV = array(
'video_gallery_youtubeid'  => mysqli_real_escape_string($data->con, $_POST['videoID'])
);
$resultV = $data->select_where('video_gallery', $whereV);
if(count($resultV) > 0){
$message = 'Title or youtube ID done...';
}else{
$VategoriID = implode(",",$_POST['videoCategoriesID']);
$insert_data = array(
'categories_id'           => mysqli_real_escape_string($data->con, $VategoriID),
'video_gallery_title'     => mysqli_real_escape_string($data->con, $_POST['videoTitle']),
'video_gallery_youtubeid' => mysqli_real_escape_string($data->con, $_POST['videoID']),
'video_gallery_content'   => mysqli_real_escape_string($data->con, $_POST['videoContent']),
'video_gallery_status'    => mysqli_real_escape_string($data->con, 'unpublish'),
'video_gallery_createdb'  => mysqli_real_escape_string($data->con, date('Y/m/d, h:i:sa'))
);
if($data->insert('video_gallery', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["ChannelName"])){
if(!empty($_POST['ChannelUrl'])){
$whereV = array(
'youtube_channel_name'  => mysqli_real_escape_string($data->con, $_POST['ChannelName'])
);
$resultV = $data->select_where('youtube_channel', $whereV);
if(count($resultV) > 0){
$message = 'Channel name done...';
}else{
$insert_data = array(
'youtube_channel_store'    => mysqli_real_escape_string($data->con, $_POST['channeStoreID']),
'youtube_channel_name'     => mysqli_real_escape_string($data->con, $_POST['ChannelName']),
'youtube_channel_url'      => mysqli_real_escape_string($data->con, $_POST['ChannelUrl']),
'youtube_channel_status'   => mysqli_real_escape_string($data->con, 'unpublish'),
'youtube_channel_content'  => mysqli_real_escape_string($data->con, $_POST['ChannelContent']),
'youtube_channel_createdb' => mysqli_real_escape_string($data->con, date('Y/m/d, h:i:sa'))
);
if($data->insert('youtube_channel', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["userEmail"])){
if(!empty($_POST['userName'])){
$where = array(
'admin_board_email'     => mysqli_real_escape_string($data->con, $_POST['userEmail']),
'admin_board_phone'     => mysqli_real_escape_string($data->con, $_POST['userPhone'])
);
$result = $data->select_where('admin_board', $where);
if(count($result) > 0){
$message = 'Phone or email done...';
}else{
$insert_data = array(
'admin_board_name'        => mysqli_real_escape_string($data->con, $_POST['userName']),
'admin_board_email'        => mysqli_real_escape_string($data->con, $_POST['userEmail']),
'admin_board_phone'       => mysqli_real_escape_string($data->con, $_POST['userPhone']),
'admin_board_roles'       => mysqli_real_escape_string($data->con, $_POST['userControl']),
'admin_board_description' => mysqli_real_escape_string($data->con, $_POST['userDescription']),
'admin_board_password'    => mysqli_real_escape_string($data->con, password_hash($_POST['userPassword'], PASSWORD_DEFAULT)),
'admin_board_ip'          => mysqli_real_escape_string($data->con, $_SERVER['REMOTE_ADDR']),
'admin_board_status'      => mysqli_real_escape_string($data->con, 'off'),
'admin_board_createdb'    => mysqli_real_escape_string($data->con, date('Y/m/d')),
'admin_board_updatedb'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->insert('admin_board', $insert_data))
{
$message = 'Success...';
}
}
}else{
$message = 'This value is required...';
}
echo $message;
$data->con->close();
exit();
}
?>
