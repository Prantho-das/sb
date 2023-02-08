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
include 'template/authorize/authorize.login.php';
});
$router->get('/login', function () {
include 'template/authorize/authorize.login.php';
});
$router->get('/password', function () {
include 'template/authorize/authorize.password.php';
});
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
header("location:pathUrl__DIR__ . /../../");
});
$router->run();
?>
