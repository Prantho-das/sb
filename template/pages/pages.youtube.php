<?php
include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
if(!empty($categories)){
$categories_slug = $categories;
}else{
$categories_slug = 'o';
}
$newsListing = "SELECT * FROM  categories INNER JOIN video_gallery ON categories.categories_id=video_gallery.categories_id WHERE video_gallery.video_gallery_status='publish' ORDER BY video_gallery.video_gallery_id DESC LIMIT 1";
$newsListing_data = $data->con->query($newsListing);
foreach($newsListing_data as $listing)
{
$pagesID = $listing['categories_id'];
?>
<div class="container">
<div class="page-breadcrumbs">
<h1 class="section-title">Youtube</h1>
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
$newsVideo = "SELECT * FROM  video_gallery ORDER BY video_gallery.video_gallery_id DESC LIMIT 32";
$newsVideo_data = $data->con->query($newsVideo);
foreach($newsVideo_data as $video)
{
?>
<div class="col-md-6 col-lg-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/video/<?php echo $video['video_gallery_id']; ?>">
<div class="post feature-post">
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
</div>
</div>
<div class="section">
<div class="latest-news-wrapper">
<h1 class="section-title">Channel</h1>
<div id="channel-news-youtube" class="text-center">
<?php
$youTubeChannel = "SELECT * FROM  youtube_channel  INNER JOIN  channel_logos  ON youtube_channel.youtube_channel_store=channel_logos.youtube_channel_store WHERE youtube_channel.youtube_channel_status='publish'  ORDER BY youtube_channel.youtube_channel_id ASC LIMIT 6";
$channel_data = $data->con->query($youTubeChannel);
foreach($channel_data as $channel)
{
?>
<div class="card-image post medium-post post-bg-none">
<a href="<?php echo $channel['youtube_channel_url']; ?>" target="_blank">
<div class="entry-header">
<div class="entry-thumbnail">
<img class="lazy round-logo rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Channel/<?php echo $channel['channel_logos_names']; ?>" />
</div>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-lg-3 tr-sticky">
<div id="sitebar" class="theiaStickySidebar">
<div class="widget">
<div role="tabpanel" class="tab-pane active show" id="tag">
<ul class="comment-list">
<?php
$result = "SELECT * FROM  categories WHERE categories_position='Video' and categories_status='publish' ORDER BY categories_id ASC";
$result_data = $data->con->query($result);
foreach($result_data as $video)
{
?>
<li>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>youtube/<?php echo $video['categories_slug']; ?>">
<div class="post small-post">
<div class="post-content post-content-custome">
<h2 class="entry-title font-size-12">
<?php echo $video['categories_name']; ?>
</h2>
</div>
</div>
</a>
</li>
<?php } ?>
</ul>
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
$newsCategories = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id GROUP BY news_images.newsa_image_id, rand() ASC LIMIT 6";
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
<?php }
flush();
$data->con->close();
?>
