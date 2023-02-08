<?php
$data       = new Databases;
$outContent = '';
if(!empty($pagesID)){
$pageTitle = "SELECT * FROM  categories WHERE categories_id='$pagesID'";
$newsTitle_data = $data->con->query($pageTitle);
foreach($newsTitle_data as $title)
{
$outContent .='
<title>'.$title['categories_name'].'</title>
<meta property="og:title" content="'.$title['categories_name'].' সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
<meta property="og:description" content="'.$title['categories_name'].' সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
';
}
}elseif (!empty($newsID)){
$newsTitle = "SELECT * FROM  news_images INNER JOIN newsa_post ON news_images.newsa_image_id=newsa_post.newsa_image_id WHERE newsa_post.newsa_image_id='$newsID'";
$newsdetailsT_title = $data->con->query($newsTitle);
foreach($newsdetailsT_title as $newsT)
{
$outContent .='
<title>'.$newsT['newsa_post_title'].'</title>
<meta property="og:description" content="'.$newsT['newsa_post_title'].'">
<meta property="og:image" content="'.pathUrl(__DIR__ . '/../../').'ws-admin/uploads/NewsGallery/'.$newsT['newsa_image_name'].'">
';
}
}elseif (!empty($videoID)){
$videoTitle = "SELECT * FROM  categories INNER JOIN video_gallery ON categories.categories_id=video_gallery.categories_id WHERE video_gallery.video_gallery_id='$videoID'";
$videoTitle_data = $data->con->query($videoTitle);
foreach($videoTitle_data as $rowVideo)
{
$outContent .='
<title>'.$rowVideo['video_gallery_title'].'</title>
<meta property="og:description" content="'.$rowVideo['video_gallery_title'].'">
';
}
}else {
$outContent .='
<title>সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিক </title>
<meta property="og:title" content="সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
<meta property="og:description" content="সবার আগে সর্বশেষ নিউজ পেতে আমাদের সাথে সংযুক্ত থাকুন wabisabi একটি নির্ভর যোগ্য অনলাইন প্রত্রিকা">
';
}
echo $outContent;
?>
