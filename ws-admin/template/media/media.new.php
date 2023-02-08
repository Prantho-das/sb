<?php $data= new Databases; ?>
<section role="main" class="content-body">
<header class="page-header">
<div class="right-wrapper text-end">
</div>
</header>
<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
<div class="content-with-menu-container">
<menu id="content-menu" class="inner-menu" role="menu">
<div class="nano">
<div class="nano-content">
<div class="inner-menu-content">
<div class="sidebar-widget m-0">
<div class="widget-content">
<ul class="mg-folders">
<?php
$result = $data->select('folder  ORDER BY folder_id ASC', $data);
foreach($result as $row)
{
?>
<li>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>media/new/<?php echo $row['folder_id']; ?>" class="menu-item"><i class="fas fa-folder"></i> <?php echo $row['folder_name']; ?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</menu>
<div class="inner-body mg-main">
<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
<?php
if(!empty($folder)){
$where = array(
'folder_id' => $folder
);
$result = $data->select_where('folder', $where);
foreach($result as $row)
{
?>
<div id="dropzone">
<form id="dropzoneFrom"  action="<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/upload.php" enctype="multipart/form-data" class="dropzone">
<input type="hidden" name="folderName" value="<?php echo $row['folder_slug']; ?>" />
<input type="hidden" name="folderID"   value="<?php echo $row['folder_id']; ?>" />
<div class="dz-message needsclick" id="image-upload">
<span class="text">
<?php echo $row['folder_name']; ?> files here or Click to Uploads
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
<?php } } else { ?>
<div id="dropzone">
<form class="dropzone">
<div class="dz-message needsclick" id="image-upload">
<span class="text">
Drop files here or Click to Uploads
</span>
<span class="plus">+</span>
</div>
</form>
</div>
<?php } ?>
</div>
</div>
</div>
</section>
</section>
<script type="text/javascript">
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
autoProcessQueue: false,
maxFilesize: 1,
addRemoveLinks: true,
acceptedFiles: ".jpeg,.jpg,.png,.gif",
init: function() {
this.on('success', function(){
if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
location.reload();
}
});
}
});
$('.upload_button').click(function(){
myDropzone.processQueue();
});
</script>
