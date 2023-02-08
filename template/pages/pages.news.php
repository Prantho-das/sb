<?php
include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
if(!empty($newsDetailes)){
$newsListing = "SELECT * FROM  categories WHERE categories_id='$newsDetailes'";
$newsListing_data = $data->con->query($newsListing);
foreach($newsListing_data as $listing)
{
?>
<div class="container">
<div class="page-breadcrumbs">
<h1 class="section-title"><?php echo $listing['categories_name']; ?></h1>
<div class="world-nav cat-menu">
<ul class="list-inline">
<li class="active"><a href="#">Upcomming</a></li>
</ul>
</div>
</div>
<div class="section">
<div class="row">
<div class="col-md-8 col-lg-9">
<div id="site-content" class="site-content">
<div class="row">
<?php
$newsDetails = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id WHERE newsa_post.newsa_image_id='$newsID'";
$newsdetails_data = $data->con->query($newsDetails);
foreach($newsdetails_data as $news)
{
$newsa_post_id = $news['newsa_post_id'];
?>
<div class="col">
<div class="left-content">
<div class="details-news">
<div class="card-image post">
<br>
<center>
<div class="entry-header">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $news['newsa_image_name']; ?>" />
</div>
</div>
</center>
<div class="post-content">
<h2 class="entry-title"><?php echo $news['newsa_post_title']; ?></h2>
<div class="entry-content text-justify">
<?php echo $news['newsa_post_content']; ?>
<p><?php echo $news['newsa_post_createdb']; ?></p>
<center>
<div class="social">
<div class="social__item">
<span class="fa fa-facebook" data-count="..." data-social="fb"></span>
</div>
<div class="social__item">
<span class="fa fa-vk" data-count="..." data-social="vk"></span>
</div>
<div class="social__item">
<span class="fa fa-twitter" data-count="..." data-social="tw"></span>
</div>
<div class="social__item">
<span class="fa fa-linkedin" data-count="..." data-social="ln"></span>
</div>
<div class="social__item">
<span class="fa fa-pinterest" data-count="..." data-social="pt"></span>
</div>
</div>
</center>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-12">
<div class="section">
<div class="row">
<?php
$newsVideo = "SELECT * FROM  video_gallery INNER JOIN categories ON  video_gallery.categories_id=categories.categories_id WHERE video_gallery.categories_id IN ($newsDetailes) ORDER BY video_gallery.video_gallery_id DESC LIMIT 4";
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
<div class="section">
<h1 class="section-title">More in <?php echo $listing['categories_name']; ?></h1>
<div class="row">
<?php
$newsPages = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_categoriid IN ($newsDetailes) and newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 12";
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
<div class="comments-wrapper">
<div class="comments-box">
<h1 class="section-title title">Comments</h1>
<form class="form" id="comment-form" action="#" method="post">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<input type="hidden" name="newsComment" value="<?php echo $newsa_post_id; ?>" class="form-control form-input-custome" placeholder="Name" required="required">
<input type="text" name="name" class="form-control form-input-custome" placeholder="Name" required="required">
</div>
</div>
<div class="col-md-8">
<div class="form-group">
<input type="email" name="userEmail" class="form-control form-input-custome" placeholder="Email" required="required">
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<textarea name="userComment" id="comment" required="required" class="form-control form-input-custome" rows="2" placeholder="Your Comments"></textarea>
</div>
<div class="text-right">
<button type="submit" class="btn btn-primary">Comments</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-lg-3 tr-sticky">
<div id="sitebar" class="theiaStickySidebar">
<div class="widget">
<div class="add featured-add">
<a href="#"><img class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add1.jpg" alt="Image" /></a>
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
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $categories['categories_id']; ?>/<?php echo $categories['newsa_image_id']; ?>">
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
<script>
var shareUrl = 'https://belyash.github.io';
var SocialShares = {
fb: {
url: "https://graph.facebook.com/?id=",
callback: function (data) {
console.log("fb", data);
if (data && data.shares) {
this.count = data.shares;
} else {
this.count = 0;
}
},
share: "https://www.facebook.com/sharer/sharer.php?u=<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pages['newsa_image_id']; ?>"
},
vk: {
url: "https://vk.com/share.php?act=count&url=<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pages['newsa_image_id']; ?>",
callback: function (data) {
console.log("vk", data);
},
share: "https://vk.com/share.php?url=<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pages['newsa_image_id']; ?>"
},
tw: {
url: "https://cdn.api.twitter.com/1/urls/count.json?url=<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $pages['newsa_image_id']; ?>",
callback: function (data) {
console.log("tw", data);
if (data && data.count) {
this.count = data.count;
} else {
this.count = 0;
}
},
share: "https://twitter.com/intent/tweet?url="
},
ln: {
url: "https://www.linkedin.com/countserv/count/share?format=jsonp&url=",
callback: function (data) {
console.log("ln", data);
if (data && data.count) {
this.count = data.count;
} else {
this.count = 0;
}
},
share: "https://www.linkedin.com/cws/share?url="
},
pt: {
url: "https://api.pinterest.com/v1/urls/count.json?url=",
callback: function (data) {
console.log("pt", data);
if (data && data.count) {
this.count = data.count;
} else {
this.count = 0;
}
},
share: "https://www.pinterest.com/pin/create/bookmarklet/?description=Vasiliy Lazarev&url="
},
};
var VK = VK || {};
VK.Share = VK.Share || {};
VK.Share.count = function (index, count) {
console.log("vk", count);
SocialShares.vk.count = count;
}
$(function () {
$('[data-social]').each(function () {
var $this = $(this),
social = $this.data('social'),
oSocial;
if (SocialShares.hasOwnProperty(social)) {
oSocial = SocialShares[social];

if (oSocial.url) {
$.getScript(
oSocial.url + shareUrl + "&callback=SocialShares." + social + ".callback",
function(data, textStatus, jqxhr) {
$this.attr("data-count", oSocial.count);
}
);
}
if (oSocial.share) {
$this.on("click", function () {
window.open(
oSocial.share + shareUrl,
'',
'menubar=no,toolbar=no,resizable=yes' +
',scrollbars=yes' +
',height=300,width=600'
);
});
}
}
});
});
</script>
<?php } }
flush();
$data->con->close();
?>
