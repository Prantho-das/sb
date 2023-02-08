CKEDITOR.replace('editor');
$(document).ready(function(){
$("button").prop("disabled",true);
});
document.addEventListener("DOMContentLoaded", function() {
var lazyImages;
if ("IntersectionObserver" in window) {
lazyImages = document.querySelectorAll(".lazy");
var imageObserver = new IntersectionObserver(function(entries, observer) {
entries.forEach(function(entry) {
if (entry.isIntersecting) {
var image = entry.target;
image.src = image.dataset.src;
image.classList.remove("lazy");
imageObserver.unobserve(image);
}
});
});
lazyImages.forEach(function(image) {
imageObserver.observe(image);
});
$('.lazy').lazy({
delay: 6000
});
const image = document.querySelector('img[data-src]');
const sources = image.dataset.randomImage.split(" ");
const randomSource = sources[Math.floor(Math.random() * sources.length)]
image.setAttribute('src', randomSource);
} else {
var lazyloadTimeout;
lazyImages = document.querySelectorAll(".lazy");
function lazyload () {
if(lazyloadTimeout) {
clearTimeout(lazyloadTimeout);
}
lazyloadTimeout = setTimeout(function() {
var scrollTop = window.pageYOffset;
lazyImages.forEach(function(img) {
if(img.offsetTop < (window.innerHeight + scrollTop)) {
img.src = img.dataset.src;
img.classList.remove('.lazy');
}
});
if(lazyloadImages.length == 0) {
document.removeEventListener("scroll", lazyload);
}
}, 5000);
}
document.addEventListener("scroll", lazyload);
}
})
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
<script>
window.onload = function () {
var imgDefer = document.getElementsByTagName("img");
for (var i = 0; i < imgDefer.length; i++) {
if (imgDefer[i].getAttribute("data-src")) {
imgDefer[i].setAttribute("src", imgDefer[i].getAttribute("data-src"));
}
}
var $container = $(".masonry");
$container.imagesLoaded(function () {
$container.masonry({
percentPosition: true
});
});
};
