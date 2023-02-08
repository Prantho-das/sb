<?php include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
?>
<div class="site-content" id="SKELETON_DEMO_WRAPPER">
<div class="container">
<div id="main-slider">
<?php
$newsGallery = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id WHERE newsa_post_public='publish' ORDER BY newsa_post.newsa_post_id DESC LIMIT 10";
$slider_data = $data->con->query($newsGallery);
foreach($slider_data as $slider)
{
?>
<div class="post feature-post" style="background-image:url('<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $slider['newsa_image_name']; ?>'); background-size:cover;"></div>
<?php } ?>
</div>
</div>
<div class="container">
<div class="section add inner-add">
<a href="#"><img class="lazy rounded mx-auto d-block  img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add2.jpg" alt="loading..." /></a>
</div>
<div class="section">
<div class="row">
<div class="col-lg-12 col-md-12">
<div id="site-content" class="site-content">
<div class="row">
<div class="col-sm-12">
<div class="section">
<div class="row">
<?php
$latestNews = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 60";
$latestNews_data = $data->con->query($latestNews);
foreach($latestNews_data as $lNews)
{
?>
<div class="col-md-6 col-lg-3">
<div class="card-image post feature-post">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $lNews['categories_id']; ?>/<?php echo $lNews['newsa_image_id']; ?>">
<div class="entry-header">
<div class="entry-thumbnail">
<img class="lazy rounded mx-auto d-block lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $lNews['newsa_image_name']; ?>" />
</div>
</div>
</a>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="col-md-12 col-lg-12">
<div class="post">
<div class="list-post">
<ul><li class="load-more-top-10"><a href="#">Load more <i class="fa fa-angle-right"></i></a></li></ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
flush();
$data->con->close();
?>
