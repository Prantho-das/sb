$("body").on("contextmenu", "img", function(e) {
return false;
});

document.addEventListener("DOMContentLoaded", function() {
var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

if ("IntersectionObserver" in window) {
let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
entries.forEach(function(entry) {
if (entry.isIntersecting) {
let lazyImage = entry.target;
lazyImage.src = lazyImage.dataset.src;
lazyImage.srcset = lazyImage.dataset.srcset;
lazyImage.classList.remove("lazy");
lazyImage.classList.remove("src");
lazyImage.classList.remove("data-src");
lazyImageObserver.unobserve(lazyImage);
}
});
});

lazyImages.forEach(function(lazyImage) {
lazyImageObserver.observe(lazyImage);
});
} else {
// Possibly fall back to event handlers here
}
});



if (typeof Array.prototype.forEach != 'function') {
Array.prototype.forEach = function (callback) {
for (var i = 0; i < this.length; i++) {
callback.apply(this, [this[i], i, this]);
}
};
}

if (window.NodeList && !NodeList.prototype.forEach) {
NodeList.prototype.forEach = Array.prototype.forEach;
}

document.addEventListener("DOMContentLoaded", function () {
var lazyloadImages = document.querySelectorAll("lazy");
var lazyloadThrottleTimeout;

function lazyload() {
if (lazyloadThrottleTimeout) {
clearTimeout(lazyloadThrottleTimeout);
}

lazyloadThrottleTimeout = setTimeout(function () {
var scrollTop = window.pageYOffset;
lazyloadImages.forEach(function (img) {
if (img.offsetTop < (window.innerHeight + scrollTop)) {
img.src = img.dataset.src;
img.classList.remove('lazy');
}
});
if (lazyloadImages.length == 0) {
document.removeEventListener("scroll", lazyload);
window.removeEventListener("resize", lazyload);
window.removeEventListener("orientationChange", lazyload);
}
}, 20);
}

document.addEventListener("scroll", lazyload);
window.addEventListener("resize", lazyload);
window.addEventListener("orientationChange", lazyload);

});
/* ---------- Lazy loading images ends ---------- */
