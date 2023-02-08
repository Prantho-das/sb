<?php $data = new Databases;
if(!empty($channelID)){
$subID = rand(10,99);
?>
<section role="main" class="content-body">
<?php
if(!empty($update)){
$where = array(
'youtube_channel_id' => $update
);
$result = $data->select_where('youtube_channel', $where);
foreach($result as $row)
{
?>
<div id="dropzone">
<form id="dropzoneFrom"  action="<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/channel.update.php" enctype="multipart/form-data" class="dropzone">
<input type="hidden" name="UpchanneStoreID" value="<?php echo $row['youtube_channel_store']; ?>" />
<div class="dz-message needsclick" id="image-upload">
<span class="text">
files here or Click to Uploads
</span>
<span class="plus">+</span>
</div>
</form>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded upload_button">Upload</button>
</div>
</div>
</div>
<form class="ecommerce-form action-buttons-fixed form" action="#" method="post">
<div class="row">
<div class="col-lg-12 col-xl-9">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Update</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<section class="simple-compose-box mb-3">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" name="UpchanneStoreID" value="<?php echo $row['youtube_channel_id']; ?>" />
<input type="text" class="form-control form-input-custome" name="UpChannelName" value="<?php echo $row['youtube_channel_name']; ?>" placeholder="Channel Name" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="url" class="form-control form-input-custome" name="UpChannelUrl" value="<?php echo $row['youtube_channel_url']; ?>" placeholder="Channel URL" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea class="form-control" id="content" rows="4"  name="UpChannelContent"><?php echo $row['youtube_channel_content']; ?></textarea>
</div>
</div>
</section>
</div>
</div>
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
<?php } } else { ?>
<div id="dropzone">
<form id="dropzoneFrom"  action="<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/channel.upload.php" enctype="multipart/form-data" class="dropzone">
<input type="hidden" name="channeStoreID" value="<?php echo $channelID.$subID; ?>" />
<div class="dz-message needsclick" id="image-upload">
<span class="text">
Channel logo here or Click to Uploads
</span>
<span class="plus">+</span>
</div>
</form>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded upload_button">Upload</button>
</div>
</div>
</div>
<form class="ecommerce-form action-buttons-fixed form" action="#" method="post">
<div class="row">
<div class="col-lg-12 col-xl-9">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Add New Channel</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<section class="simple-compose-box mb-3">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" name="channeStoreID" value="<?php echo $channelID.$subID; ?>" />
<input type="text" class="form-control form-input-custome" name="ChannelName" placeholder="Channel Name" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="url" class="form-control form-input-custome" name="ChannelUrl" placeholder="Channel URL" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea class="form-control" id="content" rows="4" name="ChannelContent"></textarea>
</div>
</div>
</section>
</div>
</div>
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
<?php } ?>
</section>
<script type="text/javascript">
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
autoProcessQueue: false,
maxFilesize: 1,
acceptedFiles: ".jpeg,.jpg,.png,.gif",
init: function() {
this.on('success', function(){
if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
}
});
}
});
$('.upload_button').click(function(){
myDropzone.processQueue();
$(".submit").prop("disabled",false);
});
</script>
<script>
$("#dropzoneFrom").click(function(){
$(".submit").prop("disabled",true);
});
</script>
<script>
CKEDITOR.replace('content',{
height:300,
});
</script>
<?php } ?>
