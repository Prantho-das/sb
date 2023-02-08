<?php
include 'template/titles/title.content.php';
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && exit();
?>
<div class="site-content" id="SKELETON_DEMO_WRAPPER">
<div class="container">
<div class="section">
<div class="row">
<div class="site-content col-lg-9">
<div class="row">
<div class="col-md-8">
<div id="home-slider">
<?php
$newsGallery = "SELECT * FROM  news_images


 INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id
 INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id
 
 
 
 
 
  WHERE newsa_post.newsa_post_public='publish' 
  ORDER BY newsa_post.newsa_post_id DESC LIMIT 10";
$slider_data = $data->con->query($newsGallery);




foreach($slider_data as $slider)
{
?>

<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $slider['categories_id']; ?>/<?php echo $slider['newsa_image_id']; ?>">

<div class="card-image post feature-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $slider['newsa_image_name']; ?>" />
</div>
</div>
</div>
</a>
<?php } ?>
</div>
</div>
<div class="col-md-4">
<div class="card-image post feature-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/slider/2.jpg" alt="loading...." />
</div>
</div>
<div class="post-content">
<div class="entry-meta"></div>
<h2 class="entry-title">
<a href="#"></a>
</h2>
</div>
</div>
</div>
</div>
<div class="row">
<?php
$newsCategories = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 3";
$categories_data = $data->con->query($newsCategories);
foreach($categories_data as $categories)
{
?>
<div class="col-md-4">
<div class="card-image post feature-post">
<div class="entry-header">
<div class="entry-thumbnail">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $categories['categories_id']; ?>/<?php echo $categories['newsa_image_id']; ?>">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $categories['newsa_image_name']; ?>" />
</a>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="col-lg-3 d-none d-lg-block">
<div class="add featured-add">
<a href="#"><img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add1.jpg" alt="loading..." /></a>
</div>
</div>
<div class="site-content col-lg-12">
<div class="row">
<?php
$newsVideo = "SELECT * FROM  video_gallery WHERE video_gallery_status='publish' GROUP BY video_gallery_id DESC LIMIT 4";
$newsVideo_data = $data->con->query($newsVideo);
foreach($newsVideo_data as $video)
{
?>
<div class="col-md-3">
<div class="card-image post feature-post">
<div class="entry-header">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/video/<?php echo $video['video_gallery_id']; ?>">
<div class="entry-thumbnail">
<div class="youtube" data-id="<?php echo $video['video_gallery_youtubeid']; ?>"></div>
</div>
</a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="site-content">
<div class="col-lg-12">
<div class="row">
<div id="book-news" class="col-lg-12 text-center">
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/01.png" alt="loading...." />
</a>
</div>
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/02.png" alt="loading...." />
</a>
</div>
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/03.png" alt="loading...." />
</a>
</div>
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/04.png" alt="loading...." />
</a>
</div>
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/05.png" alt="loading...." />
</a>
</div>
<div class="post bg-none">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#book/details/2">
<img loading="lazy" class="lazy img-responsive rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Publications/06.png" alt="loading...." />
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="section add inner-add">
<a href="#"><img loading="lazy" class="lazy rounded mx-auto d-block  img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add2.jpg" alt="loading..." /></a>
</div>
<div class="section">
<div class="latest-news-wrapper">
<h1 class="section-title">Latest News</h1>
<div id="latest-news">
<?php
$latestNews = "SELECT * FROM  news_images 

INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id 
INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id 



WHERE newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id, rand() ASC LIMIT 12";
$latestNews_data = $data->con->query($latestNews);
foreach($latestNews_data as $lNews)
{
?>
<div class="card-image post medium-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $lNews['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $lNews['categories_id']; ?>/<?php echo $lNews['newsa_image_id']; ?>"><?php echo $lNews['newsa_post_title']; ?></a>
</h2>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="section">
<div class="latest-news-wrapper">
<h1 class="section-title">Channel</h1>
<div id="channel-news" class="text-center">
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
<img loading="lazy" class="lazy round-logo rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/Channel/<?php echo $channel['channel_logos_names']; ?>" />
</div>
</div>
</a>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="section">
<div class="row">
<div class="col-md-8 col-lg-9">
<div id="site-content">
<div class="row">
<div class="col-lg-8 col-md-6 tr-sticky">
<div class="left-content theiaStickySidebar">
<div class="section world-news">
<h1 class="section-title title">Worlds</h1>
<div class="world-nav cat-menu">
<ul class="list-inline">
<li class="active"><a href="#">Asia</a></li>
<li><a href="#">Africa</a></li>
<li><a href="#">North America</a></li>
<li><a href="#">South America</a></li>
<li><a href="#">Antarctica</a></li>
<li><a href="#">Australia</a></li>
</ul>
</div>
<?php
$newsWorld = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE categories.categories_name='world' and newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id DESC LIMIT 1";
$newsWorld_data = $data->con->query($newsWorld);
foreach($newsWorld_data as $world)
{
$contenIn = preg_replace("/<img[^>]+\>/i", "", $world['newsa_post_content']);
?>
<div class="card-image post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $world['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $world['categories_id']; ?>/<?php echo $world['newsa_image_id']; ?>"><?php echo $world['newsa_post_title']; ?></a>
</h2>
<div class="entry-content text-justify">
<p id="contentWorld"></p>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $world['categories_id']; ?>/<?php echo $world['newsa_image_id']; ?>">Read More</a>
<script>
let text = "<?php echo $contenIn; ?>";
let result = text.substr(0, 650);
document.getElementById("contentWorld").innerHTML = result;
</script>
</div>
</div>
</div>
<?php } ?>
</div>
<div class="section technology-news">
<h1 class="section-title">Technology</h1>
<div class="cat-menu">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>technology/5">See all</a>
</div>
<?php
$newsTechnology = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE categories.categories_name='Technology' and newsa_post.newsa_post_public='publish' GROUP BY news_images.newsa_image_id, rand() DESC LIMIT 1";
$newsTechnology_data = $data->con->query($newsTechnology);
foreach($newsTechnology_data as $technology)
{
$contenTech = preg_replace("/<img[^>]+\>/i", "", $technology['newsa_post_content']);
?>
<div class="row">
<div class="col-lg-8">
<div class="card-image post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $technology['newsa_image_name']; ?>" alt="loading......"/>
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $technology['newsa_image_id']; ?>"><?php echo $technology['newsa_post_title']; ?></a>
</h2>
<div class="entry-content text-justify">
<p id="content"></p>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $technology['categories_id']; ?>/<?php echo $technology['newsa_image_id']; ?>">Read More</a>
<script>
let textTech = "<?php echo $contenTech; ?>";
let resultTech = textTech.substr(0, 320);
document.getElementById("content").innerHTML = resultTech;
</script>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<?php
$AsideTechnology = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE (categories.categories_name='Technology' and newsa_post.newsa_post_format='Aside') and newsa_post.newsa_post_public='publish'  GROUP BY news_images.newsa_image_id, rand() DESC LIMIT 3";
$AsideTechnology_data = $data->con->query($AsideTechnology);
foreach($AsideTechnology_data as $aside)
{
?>
<div class="card-image post small-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $aside['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $aside['categories_id']; ?>/<?php echo $aside['newsa_image_id']; ?>"><?php echo $aside['newsa_post_title']; ?></a>
</h2>
</div>
</div>
<?php } ?>
</div>
</div>
<?php } ?>
</div>
<div class="section add inner-add">
<a href="#"><img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add4.jpg" alt="loading..." /></a>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 tr-sticky">
<div class="middle-content theiaStickySidebar">
<div class="section sports-section">
<h1 class="section-title title">Sports</h1>
<div class="cat-menu">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>sports/6">See all</a>
</div>
<div class="football-result post">
<div class="featured-result">
<h2 class="league-name">Premier League</h2>
<div class="row">
<div class="col-4">
<img class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/league1.png" alt="loading..." />
<span class="match-result">3</span>
</div>
<div class="col-4">
<span class="verses">VS</span>
<span class="match-time">90:00</span>
</div>
<div class="col-4">
<img class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/league2.png" alt="loading..." />
<span class="match-result">0</span>
</div>
</div>
</div>
<div class="league-result">
<ul>
<li>
<div class="row">
<div class="col-4">
<img class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team1.png" alt="loading..." />
<span class="team-name">Bra</span>
</div>
<div class="col-4">
<span class="match-result">3-2</span>
</div>
<div class="col-4">
<span class="team-name">Arg</span>
<img class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team2.png" alt="loading..." />
</div>
</div>
</li>
<li>
<div class="row">
<div class="col-4">
<img class="lazy img-fluid" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team2.png" alt="loading..." />
<span class="team-name">Arg</span>
</div>
<div class="col-4">
<span class="match-result">5-4</span>
</div>
<div class="col-4">
<span class="team-name">Bra</span>
<img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team1.png" alt="loading..." />
</div>
</div>
</li>
<li>
<div class="row">
<div class="col-4">
<img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team1.png" alt="loading..." />
<span class="team-name">Bra</span>
</div>
<div class="col-4">
<span class="match-result">1-2</span>
</div>
<div class="col-4">
<span class="team-name">Arg</span>
<img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/team2.png" alt="loading..." />
</div>
</div>
</li>
</ul>
</div>
</div>
<?php
$newsSports = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE categories.categories_name='sports' and newsa_post.newsa_post_public='publish'  GROUP BY news_images.newsa_image_id DESC LIMIT 4";
$newsSports_data = $data->con->query($newsSports);
foreach($newsSports_data as $sports)
{
?>
<div class="card-image post medium-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $sports['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $sports['categories_id']; ?>/<?php echo $sports['newsa_image_id']; ?>"><?php echo $sports['newsa_post_title']; ?></a>
</h2>
</div>
</div>
<?php } ?>
</div>
<div class="section">
<div class="add inner-add">
<a href="#"><img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add5.jpg" alt="loading...." /></a>
</div>
</div>
<div class="section business-section">
<h1 class="section-title">Business</h1>
<div class="cat-menu">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>business/13">See all</a>
</div>
<?php
$newsBusiness = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id INNER JOIN categories ON newsa_post.newsa_post_categoriid=categories.categories_id WHERE categories.categories_name='Business' GROUP BY news_images.newsa_image_id, rand() DESC LIMIT 3";
$newsBusiness_data = $data->con->query($newsBusiness);
foreach($newsBusiness_data as $business)
{
?>
<div class="card-image post medium-post">
<div class="entry-header">
<div class="entry-thumbnail">
<img loading="lazy" class="lazy rounded mx-auto d-block img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>ws-admin/uploads/NewsGallery/<?php echo $business['newsa_image_name']; ?>" />
</div>
</div>
<div class="post-content">
<h2 class="entry-title">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/details/<?php echo $business['categories_id']; ?>/<?php echo $business['newsa_image_id']; ?>"><?php echo $business['newsa_post_title']; ?></a>
</h2>
</div>
</div>
<?php } ?>
<div class="stock-exchange text-center">
<div class="stock-exchange-zone">
<a href="#"><img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/gallery/stock.png" alt="loading..." /></a>
</div>
<div class="stock-header">
<div class="row">
<div class="col-4">Name</div>
<div class="col-4">Price</div>
<div class="col-4">%+/-</div>
</div>
</div>
<div class="stock-reports">
<div class="com-details">
<div class="row">
<div class="col-4 com-name">BP</div>
<div class="col-4 current-price">388.65</div>
<div class="col-4 current-result">+0.58 <i class="fa fa-caret-up"></i></div>
</div>
</div>
<div class="com-details">
<div class="row">
<div class="col-4 com-name">Royal Ba...</div>
<div class="col-4 current-price">318.25</div>
<div class="col-4 current-result">+0.32 <i class="fa fa-caret-up"></i></div>
</div>
</div>
<div class="com-details">
<div class="row">
<div class="col-4 com-name">Inmarsat</div>
<div class="col-4 current-price">214.19</div>
<div class="col-4 current-result">-0.43 <i class="fa fa-caret-down"></i></div>
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
<div class="col-md-4 col-lg-3 tr-sticky">
<div id="sitebar" class="theiaStickySidebar">
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
<div class="add">
<a href="#"><img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add3.jpg" alt="loading..." /></a>
</div>
</div>
<div class="widget">
<div class="add">
<a href="#"><img loading="lazy" class="lazy img-fluid img-loading" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/post/add/add6.jpg" alt="loading..." /></a>
</div>
</div>
<div class="widget weather-widget">
<div id="weather-widget">
<span class="weather-icon">
<img loading="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/others/weather.png" alt="loading..." class="lazy img-fluid img-loading">
</span>
<span class="temp"></span>
<span class="weather-humidity">87%</span>
<span class="weather-wind">3.6 MPH</span>
</div>
</div>
<div class="widget meta-widget">
<h1 class="section-title title">Widget</h1>
<div class="meta-tab">
<ul class="nav nav-tabs nav-justified" role="tablist">
<li role="presentation"><a href="#author" data-toggle="tab"><i class="fa fa-user"></i>Authors</a></li>
<li role="presentation" class="active"><a href="#comment" data-toggle="tab"><i class="fa fa-comment-o"></i>Comments</a></li>
<li role="presentation"><a href="#tag" data-toggle="tab"><i class="fa fa-inbox"></i>Tag</a></li>
</ul>
<div class="tab-content">
<div role="tabpanel" class="tab-pane" id="author">
<ul class="authors-post">
<li>
<a href="#">
<div class="post small-post">
<div class="post-content post-content-custome">
<h2 class="entry-title font-size-12">
.................
</h2>
</div>
</div>
</a>
</li>
</ul>
</div>
<div role="tabpanel" class="tab-pane" id="comment">
<ul class="comment-list">
<li>
<div class="post small-post">
<div class="post-content post-content-custome">
<div class="entry-meta">
<ul class="list-inline">
<li class="post-author"><a href="#">..........</a></li>
<li class="publish-date"><a href="#">..........</a></li>
</ul>
</div>
<h2 class="entry-title">
<a href="news-details.html">..........</a>
</h2>
</div>
</div>
</li>
</ul>
</div>
<div role="tabpanel" class="tab-pane active show" id="tag">
<ul class="comment-list">
<?php
$tagSql = "SELECT * FROM   tags WHERE  	tags_status='publish' ORDER BY  tags_id DESC LIMIT 16";
$tags_data = $data->con->query($tagSql);
foreach($tags_data as $tags)
{
?>
<li>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>news/<?php echo $tags['tags_slug']; ?>">
<div class="post small-post">
<div class="post-content post-content-custome">
<h2 class="entry-title font-size-12">
<?php echo $tags['tags_name']; ?>
</h2>
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
</div>
</div>
</div>
<?php
flush();
$data->con->close();
?>
