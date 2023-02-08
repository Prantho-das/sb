class skeleton {
  /**
   * Lock skeleton
   */
  static lock() {
    var skel = this.objects();
    var len = skel ? skel.length : 0;
    for (var i = 0; i < len; i++) {
      skel[i].classList.add("skel");
    }
    //span.select2-container
  }

  /**
   * Object of skeletonable element
   */
  static objects() {
    return document.querySelectorAll(
      ".card-image,.card-title,h1,img,p,h2,h3,h4,h5,select,button:not(#SKELETON_DEMO_ON),table"
    );
  }

  /**
   * Release skeleton
   */
  static release() {
    var skel = this.objects();
    var len = skel ? skel.length : 0;
    for (var i = 0; i < len; i++) {
      skel[i].classList.remove("skel");
    }
  }
}

/*
 * For demo purpose
 */
if (typeof location != "undefined") {
  if (/(cdpn|codepen)\.io/s.test(location.host)) {
    /* Demo */
    console.clear();
    if (typeof jQuery != "undefined") {
      /* Select2 Demo */
      $("#SKELETON_DEMO_SELECT2").select2();
    }
    /* Skeleton start */
    turnOnSkeleton(); //lock
  }
}

function turnOnSkeleton(timeout) {
  if (!timeout) {
    timeout = 5000;
  }
  skeleton.lock();
  setTimeout(function () {
    skeleton.release();
  }, timeout); //release
}
