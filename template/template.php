<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
function insert_charset_header() {
header('Content-Type: text/html; charset=UTF-8');
exit;
}
include 'config/url/pathUrl.url.php';
include 'template/modular/modular.head.php';
echo '<div  id="main-wrapper" class="homepage">';
echo '<div class="preloading"><div class="dot-pulse dot-pulse-custome"></div></div>';
include 'template/partials/partials.header.php';
include 'controller/controller.php';
include 'template/partials/partials.footer.php';
echo '</div>';
include 'template/modular/modular.foot.php';
?>
