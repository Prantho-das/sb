<section role="main" class="content-body">
<?php
$data = new Databases;
if(!empty($update)){
$where = array(
'video_gallery_id' =>$update
);
$result = $data->select_where('video_gallery', $where);
foreach($result as $row)
{
?>
<form class="ecommerce-form action-buttons-fixed form" action="#" method="post">
<div class="row">
<div class="col-lg-12 col-xl-9">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Update Video</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<section class="simple-compose-box mb-3">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" name="vidUPID" value="<?php echo $row['video_gallery_id']; ?>" />
<input type="text" class="form-control form-input-custome" name="videoUpTitle" value="<?php echo $row['video_gallery_title']; ?>" placeholder="Add Video Title" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="videoUpID" value="<?php echo $row['video_gallery_youtubeid']; ?>" placeholder="Youtube Video***ID" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea class="form-control" id="content" rows="4"  name="videoUpContent"><?php echo $row['video_gallery_content']; ?></textarea>
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
<span class="va-middle">Categories</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$resultMenu = "SELECT * FROM  categories WHERE categories_position !='Video' ORDER BY categories_id ASC";
$menu_data = $data->con->query($resultMenu);
foreach($menu_data as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="videoUpCategoriesID[]" value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?>
</label>
</div>
<?php } ?>
</ul>
</div>
</div>
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>
<h2 class="card-title font-size-12">
<span class="va-middle">More Video</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$result = "SELECT * FROM  categories WHERE categories_position='Video' ORDER BY categories_id ASC";
$result_data = $data->con->query($result);
foreach($result_data as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="videoUpCategoriesID[]" value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?>
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
<?php } } else { ?>
<form class="ecommerce-form action-buttons-fixed form" action="#" method="post">
<div class="row">
<div class="col-lg-12 col-xl-9">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Add New Video</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<section class="simple-compose-box mb-3">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="videoTitle" placeholder="Add Video Title" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="videoID" placeholder="Youtube Video***ID" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea class="form-control" id="content" rows="4" id="comment" name="videoContent"></textarea>
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
<span class="va-middle">News Categories</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$resultMenu = "SELECT * FROM  categories WHERE categories_position !='Video' ORDER BY categories_id ASC";
$menu_data = $data->con->query($resultMenu);
foreach($menu_data as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="videoCategoriesID[]" value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?>
</label>
</div>
<?php } ?>
</ul>
</div>
</div>
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>
<h2 class="card-title font-size-12">
<span class="va-middle">More Video</span>
</h2>
</header>
<div class="card-body">
<div class="content">
<ul class="simple-user-list">
<?php
$result = "SELECT * FROM  categories WHERE categories_position='Video' ORDER BY categories_id ASC";
$result_data = $data->con->query($result);
foreach($result_data as $row)
{
?>
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" name="videoCategoriesID[]" value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?>
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
<?php } ?>
</section>
<script>
CKEDITOR.replace('content',{
height:300,
filebrowserUploadUrl: "<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/news.gallery.php"
});
</script>
