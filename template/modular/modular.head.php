<?php include 'config/config.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="cache-control" content="no-cache" />
<meta property="fb:pages" content="127767417823797" />
<meta property="og:type" content="wabisabi">
<meta property="og:url" content="https://wabisabibd.com/">
<link rel="icon" type="image/png" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/logo_icon.png" sizes="32x32">
<meta property="og:title" content="সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
<meta property="og:description" content="সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/magnific-popup.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/subscribe-better.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/placeholder_loading.min.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/skeleton.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/main.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/presets/preset1.css" id="preset" rel="stylesheet" type="text/css">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/social_media.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/responsive.css" rel="stylesheet">
<link href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/css/custome.css" rel="stylesheet">
<script src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/plyr/plyr.js"></script>
<script src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
function setCookie(cname, cvalue, exdays) {
var d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
var expires = "expires="+ d.toUTCString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
var name = cname + "=";
var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split(';');
for(var i = 0; i <ca.length; i++) {
var c = ca[i];
while (c.charAt(0) == ' ') {
c = c.substring(1);
}
if (c.indexOf(name) == 0) {
return c.substring(name.length, c.length);
}
}
return "";
}
function deleteAllCookies() {
var cookies = document.cookie.split(";");
for (var i = 0; i < cookies.length; i++) {
var cookie = cookies[i];
var eqPos = cookie.indexOf("=");
var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
document.cookie = name + "=;expires=";
}
}
</script>
</head>
<body>
