<?php $data = new Databases;
if(!empty($newsNewID)){
$newsPost = "SELECT * FROM  newsa_post WHERE  newsa_image_id='$newsNewID'";
$newspost_data = $data->con->query($newsPost);
foreach($newspost_data as $post){
?>
<section role="main" class="content-body">
<div class="row">
<div class="col-lg-12 col-xl-12">
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded upload_button">Upload</button>
</div>
</div>
<div id="dropzone">
<form id="dropzoneFrom"  action="<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/update.news.php" enctype="multipart/form-data" class="dropzone">
<input type="hidden" name="UpPostNewsID" value="<?php echo $newsNewID; ?>" />
<div class="dz-message needsclick" id="image-upload">
<span class="text">
News files here or Click to Uploads
</span>
<span class="plus">+</span>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
autoProcessQueue: false,
maxFilesize: 1,
addRemoveLinks: true,
acceptedFiles: ".jpeg,.jpg,.png,.gif",
dictResponseError: 'Error while uploading file!',
init: function() {
this.on('success', function(){
if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
}
});
this.on("error", function(file, response) {
alert(response);
});
}
});
$('.upload_button').click(function(){
myDropzone.processQueue();
$(".submit").prop("disabled",false);
});
</script>
<form class="ecommerce-form action-buttons-fixed form" action="#" method="post">
<div class="row">
<div class="col-lg-12 col-xl-9">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Add New Post</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<section class="simple-compose-box mb-3">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" name="UpPostNewsID" value="<?php echo $newsNewID; ?>" />
<input type="text" class="form-control form-input-custome" name="UpNewsTitle" value="<?php echo $post['newsa_post_title']; ?>" placeholder="Add New Title" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea name="UpnNwsContent" id="content" class="form-control ckeditor"><?php echo $post['newsa_post_content']; ?></textarea>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3">
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>
<h2 class="card-title font-size-12">
<span class="va-middle">Format</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Standard">Standard
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Aside">Aside
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Image">Image
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Video">Video
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Quote">Quote
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Link">Link
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Gallery">Gallery
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Chat">Chat
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Audio">Audio
</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="UpNewsFormat" value="Status">Status
</label>
</div>
</ul>
</div>
</div>
<br>
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>
<h2 class="card-title font-size-12">
<span class="va-middle">Categories</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$order = array(
'categories_id' => ''
);
$result = $data->select('categories', $order);
foreach($result as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="UpaddCategoriesID[]" value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?>
</label>
</div>
<?php } ?>
</ul>
</div>
</div>
<br>
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>
<h2 class="card-title font-size-12">
<span class="va-middle">Tags</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$order = array(
'tags_id' => ''
);
$result = $data->select('tags', $order);
foreach($result as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="UpaddTags[]" value="<?php echo $row['tags_id'] ?>"><?php echo $row['tags_name'] ?>
</label>
</div>
<?php } ?>
</ul>
</div>
</div>
</div>
<div class="row action-buttons">
<div class="col-12 col-md-auto">
<button type="submit" class="submit btn btn-primary form-btn-runded btn-px-6 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
Submit
</button>
</div>
<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto"></div>
</div>
</div>
</form>
</section>
<script>
$("#dropzoneFrom").click(function(){
$(".submit").prop("disabled",true);
});
</script>
<script>
CKEDITOR.replace('content',{
height:300,
filebrowserUploadUrl: "<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/news.gallery.php"
});
</script>
<?php } } else { header("location:pathUrl__DIR__ . /../"); }  ?>
