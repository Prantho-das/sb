<?php
include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
if(!empty($videoID)){
$newsListing = "SELECT * FROM  categories INNER JOIN video_gallery ON categories.categories_id=video_gallery.categories_id WHERE video_gallery.video_gallery_id='$videoID'";
$newsListing_data = $data->con->query($newsListing);
foreach($newsListing_data as $listing)
{
$pagesID = $listing['categories_id'];
?>
<div class="container">
<div class="page-breadcrumbs">
<h1 class="section-title"><?php echo $listing['categories_name']; ?></h1>
<div class="world-nav cat-menu"></div>
</div>
<div class="section">
<div class="row">
<div class="col-md-8 col-lg-9">
<div id="site-content" class="site-content">
<div class="row">
<div class="col">
<div class="left-content">
<div class="details-news">
<div class="post">
<center>
<div class="entry-header">
<div class="entry-thumbnail">
<div class="youtube" data-id="<?php echo $listing['video_gallery_youtubeid']; ?>"></div>
</div>
</div>
</center>
<div class="post-content">
<h2 class="entry-title">
<?php echo $listing['video_gallery_title']; ?>
</h2>
<div class="entry-content text-justify">
<p><?php echo $listing['video_gallery_content']; ?></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="section">
<div class="row">
<?php
$newsVideo = "SELECT * FROM  video_gallery WHERE video_gallery_status='publish' ORDER BY video_gallery.video_gallery_id DESC LIMIT 12";
$newsVideo_data = $data->con->query($newsVideo);
foreach($newsVideo_data as $video)
{
?>
<div class="col-md-6 col-lg-4">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/video/<?php echo $video['video_gallery_id']; ?>">
<div class="card-image post feature-post">
<div class="entry-header">
<div class="entry-thumbnail">
<div class="youtube" data-id="<?php echo $video['video_gallery_youtubeid']; ?>"></div>
</div>
</div>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
<div class="section">
<h1 class="section-title">More in <?php echo $listing['categories_name']; ?></h1>
<div class="row">
<?php
$newsPages = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_categoriid IN ($pagesID) GROUP BY news_images.newsa_image_id, rand() DESC LIMIT 12";
$newsPages_data = $data->con->query($newsPages);
foreach($newsPages_data as $pages)
{
?>
<div class="col-md-6 col-lg-3">
<div class="post medium-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $pages['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pages['categories_id']; ?>/<?php echo $pages['newsa_image_id']; ?>"><?php echo $pages['newsa_post_title']; ?></a>
</h2>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-lg-3 tr-sticky">
<div id="sitebar" class="theiaStickySidebar">
<div class="widget">
<div class="add featured-add">
<a href="#"><img class="img-fluid" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add1.jpg" alt="lading..." /></a>
</div>
</div>
<div class="widget follow-us">
<h1 class="section-title title">Follow Us</h1>
<ul class="list-inline social-icons">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
</ul>
</div>
<div class="widget">
<ul class="post-list">
<?php
$newsCategories = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 6";
$categories_data = $data->con->query($newsCategories);
foreach($categories_data as $categories)
{
?>
<li>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $categories['categories_id']; ?>/<?php echo $categories['newsa_image_id']; ?>">
<div class="post small-post">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $categories['newsa_image_name']; ?>" />
</div>
</div>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } }
flush();
$data->con->close();
?>
