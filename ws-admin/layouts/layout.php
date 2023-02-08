<?php
error_reporting(false);
function insert_charset_header() {
header('Content-Type: text/html; charset=UTF-8');
exit;
}
if(!empty($_COOKIE["PHPSESSID"])){
include 'modular/modular.head.php';
echo '<body>';
echo '<section class="body">';
include 'template/partials/partials.header.php';
echo '<div class="inner-wrapper">';
include 'template/partials/partials.asidebar.php';
include 'controller/controller.dashboard.php';
echo '<div class="preloading">';
echo '<div class="d-flex align-items-center text-success">';
echo '<strong class="results">Loading...</strong>';
echo '<div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
echo '</body>';
}else{ header("location:pathUrl__DIR__ . /../"); }
$jsSubmit = '';
$jsSubmit  .='
<script   src="'.pathUrl(__DIR__ . '/../').'public/public.main.js"></script>
';
echo $jsSubmit;
include 'modular/modular.foot.php';
include '../config/config.minify.php';
?>
