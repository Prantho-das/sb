<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
return false;
}
require_once __DIR__ . '../../../routing/Bramus/Router/Router.php';
require_once __DIR__ . '../../../config/config.db.php';
require_once __DIR__ . '../../../config/url/pathUrl.url.php';
// Create a Router
$router = new \Bramus\Router\Router();
// Static route: / (homepage)
$router->get('/', function () {
include 'template/home/home.home.php';
});
$router->get('/posts/all', function () {
include 'template/posts/posts.newsall.php';
});
$router->get('/posts/all/(\w+)', function ($statusName) {
include 'template/posts/posts.newsall.php';
});
$router->get('/posts/new/(\d+)', function ($newsNewID) {
include 'template/posts/posts.create.php';
});
$router->get('/posts/update/(\d+)', function ($newsNewID) {
include 'template/posts/posts.update.php';
});
$router->get('/post/categories', function () {
include 'template/posts/posts.categories.php';
});
$router->get('/post/categories/update/(\d+)', function ($update) {
include 'template/posts/posts.categories.php';
});
$router->get('/post/tags', function () {
include 'template/posts/posts.tags.php';
});
$router->get('/post/tags/update/(\d+)', function ($update) {
include 'template/posts/posts.tags.php';
});
$router->get('/media/library', function () {
include 'template/media/media.library.php';
});
$router->get('/media/library/(\d+)', function ($gallery) {
include 'template/media/media.library.php';
});
$router->get('/media/new', function () {
include 'template/media/media.new.php';
});
$router->get('/media/new/(\d+)', function ($folder) {
include 'template/media/media.new.php';
});
$router->get('/video/new', function () {
include 'template/video/video.new.php';
});
$router->get('/video/update/(\d+)', function ($update) {
include 'template/video/video.new.php';
});
$router->get('/video/library', function () {
include 'template/video/video.library.php';
});
$router->get('/channel/new/(\d+)', function ($channelID) {
include 'template/channel/channel.new.php';
});
$router->get('/channel/update/(\d+)/(\d+)', function ($channelID,$update) {
include 'template/channel/channel.new.php';
});
$router->get('/channel/library', function () {
include 'template/channel/channel.libary.php';
});
$router->get('/pages/all', function () {
include 'template/pages/pages.all.php';
});
$router->get('/pages/new', function () {
include 'template/pages/pages.new.php';
});
$router->get('/pages/new/update/(\d+)', function ($update) {
include 'template/pages/pages.new.php';
});
$router->get('/comments', function () {
include 'template/comments/comments.php';
});
$router->get('/visitors', function () {
include 'template/visitors/visitors.newsvisitors.php';
});
$router->get('/users/all', function () {
include 'template/users/users.all.php';
});
$router->get('/users/new', function () {
include 'template/users/users.new.php';
});
$router->get('/users/new/update/(\d+)', function ($update) {
include 'template/users/users.new.php';
});
$router->get('/users/profile', function () {
include 'template/users/users.profile.php';
});
$router->get('/profile', function () {
include 'template/profile/profile.profile.php';
});
$router->get('/logout', function () {
include 'template/logout/logout.logout.php';
});
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
include 'template/home/home.home.php';
});
$router->run();
?>
