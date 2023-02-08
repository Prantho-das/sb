<?php $data= new Databases; ?>
<section role="main" class="content-body">
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
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>media/library/<?php echo $row['folder_id']; ?>" class="menu-item"><i class="fas fa-camera-retro"></i> <?php echo $row['folder_name']; ?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</menu>
<form class="form">
<div class="inner-body mg-main">
<div class="inner-toolbar clearfix">
<ul>
<li>
<button type="submit" class="default-bottom">Delete Now</button>
</li>
<li>
<a href="#" id="mgSelectAll"><i class="fas fa-check-square me-1"></i> <span data-all-text="Select All" data-none-text="Select None">Select All</span></a>
</li>
<li class="right" data-sort-source data-sort-id="media-gallery">
<ul class="nav nav-pills nav-pills-primary">
<li class="nav-item active">
<a class="nav-link" data-option-value="*" href="#all">All</a>
</li>
<li class="nav-item">
<a class="nav-link" data-option-value=".document" href="#document">Documents</a>
</li>
<li class="nav-item">
<a class="nav-link" data-option-value=".image" href="#image">Images</a>
</li>
<li class="nav-item">
<a class="nav-link" data-option-value=".video" href="#video">Videos</a>
</li>
</ul>
</li>
</ul>
</div>
<div class="d-flex flex-row flex-wrap justify-content-center row mg-files" data-sort-destination data-sort-id="media-gallery">
<?php
if(!empty($gallery)){
$sqlGallery = "SELECT * FROM folder INNER JOIN images_storages ON images_storages.folder_id=folder.folder_id WHERE folder.folder_id='$gallery' ORDER BY images_storages.img_store_id ASC";
}else{
$sqlGallery = "SELECT * FROM folder INNER JOIN images_storages ON images_storages.folder_id=folder.folder_id ORDER BY images_storages.img_store_id ASC";
}
$resultGallery = $data->con->query($sqlGallery);
foreach ($resultGallery as $row) {
?>
<div class="d-flex flex-column isotope-item document col-sm-6 col-md-4 col-lg-3 photos">
<div class="thumbnail">
<div class="thumb-preview">
<a class="thumb-image mx-auto d-block" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/<?php echo $row['folder_slug']; ?>/<?php echo $row['img_store_name']; ?>">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/<?php echo $row['folder_slug']; ?>/<?php echo $row['img_store_name']; ?>" class="lazy img-fluid" alt="loading...">
</a>
<div class="mg-thumb-options">
<div class="mg-zoom"><i class="bx bx-search"></i></div>
<div class="mg-toolbar">
<div class="mg-option checkbox-custom checkbox-inline">
<input type="checkbox" name="imageDeleteID[]" value="<?php echo $row['img_store_id']; ?>">
<label for="file_1">SELECT</label>
</div>
<div class="mg-group float-end">
<button class="dropdown-toggle mg-toggle" data-bs-toggle="dropdown"><span class="caret"></span></button>
<div class="dropdown-menu mg-dropdown" role="menu">
<a down class="dropdown-item text-1" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/<?php echo $row['folder_slug']; ?>/<?php echo $row['img_store_name']; ?>"><i class="fas fa-download"></i> Download</a>
<a class="dropdown-item text-1" href="#"><i class="far fa-trash-alt"></i> Delete</a>
</div>
</div>
</div>
</div>
</div>
<h5 class="mg-title font-weight-semibold"></h5>
<div class="mg-description">
<small class="float-left text-muted"><?php echo $row['folder_name']; ?></small>
<small class="float-end text-muted"><?php echo $row['img_store_createdb']; ?></small>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</form>
</div>
</section>
</section>
