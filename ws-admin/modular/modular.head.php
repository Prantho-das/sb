<?php
include '../config/config.html.php';
include '../config/url/pathUrl.url.php';
?>
<!doctype html>
<html lang="en" class="fixed">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="keywords" content="Best Newspaper Admin Board" />
<meta name="description" content="Best newspaper admin board">
<meta name="author" content="https://waresun.com/">
<title>WS newspaper</title>
<link rel="icon" type="image/x-icon" href="<?php echo pathUrl(__DIR__ . '/../'); ?>uploads/favicon/icons8-news-ios-32.png">
<?php
$js  = '';
$css = '';
$js  .='
<script type= "text/javascript" src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/vendor/jquery-cookie/jquery.cookie.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/vendor/modernizr/modernizr.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/ajax/dropzone.min.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/master/style-switcher/style.switcher.localstorage.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/js/jquery-ui/jquery-ui.js"></script>
<script type= "text/javascript" src="'.pathUrl(__DIR__ . '/../').'public/js/jquery-3.6.1.slim.min.js"></script>
';
$css .='
<link   rel="stylesheet"  href="'.pathUrl(__DIR__ . '/../').'public/css/placeholder_loading.min.css" type="text/css" />
<link   rel="stylesheet"  href="'.pathUrl(__DIR__ . '/../').'public/public.main.css" type="text/css" />
';
echo $css;
echo $js;
?>
</head>
