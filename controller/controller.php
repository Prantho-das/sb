<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
return false;
}
require_once __DIR__ . '../../routing/Bramus/Router/Router.php';
require_once __DIR__ . '../../config/config.db.php';
require_once __DIR__ . '../../config/url/pathUrl.url.php';
// Create a Router
$router = new \Bramus\Router\Router();
// Static route: / (homepage)
$router->get('/', function () {
include 'template/pages/pages.home.php';
});
$router->get('/(\w+)/(\d+)', function ($slugID,$pagesID) {
include 'template/pages/pages.listing.php';
});
$router->get('/news/details/(\d+)/(\d+)', function ($newsDetailes,$newsID) {
include 'template/pages/pages.news.php';
});
$router->get('/news/video/(\d+)', function ($videoID) {
include 'template/pages/pages.video.php';
});
$router->get('/youtube', function () {
include 'template/pages/pages.youtube.php';
});
$router->get('/youtube/(\w+)', function ($categories) {
include 'template/pages/pages.youtube.php';
});
$router->get('/gallery', function () {
include 'template/pages/pages.gallery.php';
});
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
header("location:pathUrl__DIR__ . /../../");
});
$router->run();
?>
