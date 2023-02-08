<?php
include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
if(!empty($pagesID)){
$newsListing = "SELECT * FROM  categories WHERE categories_id='$pagesID'";
$newsListing_data = $data->con->query($newsListing);

foreach($newsListing_data as $listing)
{
$allCategori = $listing['categories_id'];
?>
<div class="site-content">
<div class="container">
<div class="page-breadcrumbs">
<h1 class="section-title"><?php echo $listing['categories_name']; ?></h1>
<div class="world-nav cat-menu">
<ul class="list-inline">
<?php
$newsTags = "SELECT * FROM tags  ORDER BY tags_id ASC LIMIT 6";
$newsTags_data = $data->con->query($newsTags);
foreach($newsTags_data as $tags)
{
?>
<li><a href="#"><?php echo $tags['tags_name']; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="section">
<div class="row">
<div class="col-md-8 col-lg-9">
<div id="site-content" class="site-content">
<div class="row">
<div class="col-md-6 col-lg-8">
<div class="left-content">
<div class="world-news">
<?php


$newsCategories = "SELECT * FROM  news_images INNER JOIN
 newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id
  WHERE newsa_post.newsa_post_categoriid IN ($allCategori)
   ORDER BY newsa_post.newsa_post_id DESC LIMIT 3";
$categories_data = $data->con->query($newsCategories);
foreach($categories_data as $categories)
{
$contenIn = preg_replace("/<img[^>]+\>/i", "", $categories['newsa_post_content']);
?>
<div class="post">
<div class="entry-header">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $categories['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pagesID; ?>/<?php echo $categories['newsa_image_id']; ?>"><?php echo $categories['newsa_post_title']; ?></a>
</h2>
<div class="entry-content text-justify">
<p id="pageContent<?php echo $categories['newsa_post_id']; ?>"></p>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pagesID; ?>/<?php echo $categories['newsa_image_id']; ?>">Read More</a>
<script>
let text<?php echo $categories['newsa_post_id']; ?> = "<?php echo $contenIn;  ?>";
let resultContent<?php echo $categories['newsa_post_id']; ?> = text<?php echo $categories['newsa_post_id']; ?>.substr(0, 551);
document.getElementById("pageContent<?php echo $categories['newsa_post_id']; ?>").innerHTML = resultContent<?php echo $categories['newsa_post_id']; ?>;
</script>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="middle-content">
<div class="section video-section">
<?php
$newsBusiness = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_public='publish' and newsa_post.newsa_post_categoriid IN ($pagesID) GROUP BY news_images.newsa_image_id DESC LIMIT 8";
$newsBusiness_data = $data->con->query($newsBusiness);
foreach($newsBusiness_data as $business)
{
?>
<div class="card-image post medium-post">
<div class="entry-header">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pagesID; ?>/<?php echo $business['newsa_image_id']; ?>">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $business['newsa_image_name']; ?>" />
</div>
</a>
</div>
</div>
<?php } ?>
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
$newsVideo = "SELECT * FROM  video_gallery INNER JOIN categories ON  video_gallery.categories_id=categories.categories_id WHERE video_gallery.categories_id IN ($pagesID) ORDER BY video_gallery.video_gallery_id DESC LIMIT 4";
$newsVideo_data = $data->con->query($newsVideo);
foreach($newsVideo_data as $video)
{
?>
<div class="col-md-6 col-lg-3">
<div class="card-image post feature-post">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/video/<?php echo $video['video_gallery_id']; ?>">
<div class="entry-header">
<div class="entry-thumbnail">
<div class="youtube" data-id="<?php echo $video['video_gallery_youtubeid']; ?>"></div>
</div>
</div>
</a>
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
<a href="#"><img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add1.jpg" alt="loading..." /></a>
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
$newsCategories = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 8";
$categories_data = $data->con->query($newsCategories);
foreach($categories_data as $categories)
{
?>
<li>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pagesID; ?>/<?php echo $categories['newsa_image_id']; ?>">
<div class="card-image post small-post">
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
</div>
<?php } }
flush();
$data->con->close();
?>
