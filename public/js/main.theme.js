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
img.classList.remove('lazy');
}
});
if(lazyloadImages.length == 0) {
document.removeEventListener("scroll", lazyload);
}
}, 5000);
}
document.addEventListener("scroll", lazyload);
}
});
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
$(function(){
$(window).on('load', function(){
$('[data-src]').each(function(){
var $this = $(this),
src = $(this).data('src');
$this.attr('src', src);
console.log(src);
});
});
});
function loadImage (src) {
var deferred = when.defer(),
img = document.createElement('img');
img.onload = function () {
deferred.resolve(img);
};
img.onerror = function () {
deferred.reject(new Error('Image not found: ' + src));
};
img.src = src;
return deferred.promise;
}
function loadImages(srcs) {
var deferreds = [];
for(var i = 0, len = srcs.length; i < len; i++) {
deferreds.push(loadImage(srcs[i]));
}
return when.all(deferreds);
}
loadImages(imageSrcArray).then(
function gotEm(imageArray) {
doFancyStuffWithImages(imageArray);
return imageArray.length;
},
function doh(err) {
handleError(err);
}
).then(
function shout (count) {
alert('see my new ' + count + ' image?');
}
);
function BackgroundNode({node, loadedClassName}) {
let src = node.getAttribute('data-background-image-url');
let show = (onComplete) => {
requestAnimationFrame(() => {
node.style.backgroundImage = `url(${src})`
node.classList.add(loadedClassName);
onComplete();
})
}
return {
node,
load: (onComplete) => {
let img = new Image();
img.onload = show(onComplete);
img.src = src;
}
}
}
let defaultOptions = {
selector: '[data-background-image-url]',
loadedClassName: 'loaded'
}
function BackgroundLazyLoader({selector, loadedClassName} = defaultOptions) {
let nodes = [].slice.apply(document.querySelectorAll(selector))
.map(node => new BackgroundNode({node, loadedClassName}));
let callback = (entries, observer) => {
entries.forEach(({target, isIntersecting}) => {
if (!isIntersecting) {
return;
}
let obj = nodes.find(it => it.node.isSameNode(target));
if (obj) {
obj.load(() => {
observer.unobserve(target);
nodes = nodes.filter(n => !n.node.isSameNode(target));
if (!nodes.length) {
observer.disconnect();
}
});
}
})
};
let observer = new IntersectionObserver(callback);
nodes.forEach(node => observer.observe(node.node));
};
BackgroundLazyLoader();
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
//'current-time', // The current time of playback
