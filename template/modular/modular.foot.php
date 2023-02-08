<script>
$(document).ready(function() {
$(".preloading").fadeOut(2000,function() {
$(".site-content").fadeIn(2000);
});
$(window).bind('load', function() {
$('.preloading, body').addClass('loaded');
setTimeout(function() {
$('.preloading').css({'display':'none'})
}, 2000)
});
setTimeout(function() {
$('.preloading, body').addClass('loaded');
}, 60000);
});
window.addEventListener( ".img", function load(e){
window.removeEventListener( ".img", load, false );
document.body.style.opacity = 1;
})
</script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/appear.js" type="text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/skeleton.js" type="text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/appearlazy.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/main.theme.js" type="text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/popper.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/bootstrap.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery.magnific-popup.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/owl.carousel.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/moment.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery.sticky-kit.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery.easy-ticker.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery.subscribe-better.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/theia-sticky-sidebar.min.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/main.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/switcher.js" type="7296d47969a338601ba3dd9f-text/javascript"></script>
<script data-cfasync="false" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7296d47969a338601ba3dd9f-|49" defer=""></script>
<script>
(function () {
var v = document.getElementsByClassName("youtube");
for (var n = 0; n < v.length; n++) {
var p = document.createElement("div");
p.innerHTML = labnolThumb(v[n].dataset.id);
p.onclick = labnolIframe;
v[n].appendChild(p);
}
})();
function labnolThumb(id) {
return '<img class="youtube__img" src="//i.ytimg.com/vi/' + id + '/hqdefault.jpg"><div class="youtube__play"></div>';
}
function labnolIframe() {
var iframe = document.createElement("iframe");
iframe.setAttribute("src", "//www.youtube.com/embed/" + this.parentNode.dataset.id + "?autoplay=1");
iframe.setAttribute("frameborder", "0");
iframe.setAttribute("allowfullscreen", "1");
iframe.setAttribute("id", "youtube-iframe");
this.parentNode.replaceChild(iframe, this);
}
</script>
</body>
</html>
<?php include 'config/config.minify.php'; ?>
