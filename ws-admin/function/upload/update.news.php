<?php include '../../../config/config.db.php';
$data = new Databases;
if(isset($_POST['UpPostNewsID'])){
if(is_array($_FILES)) {
$uploadedFile = $_FILES['file']['tmp_name'];
$sourceProperties = getimagesize($uploadedFile);
$newFileName = time().rand(100,999);
$dirPath = "../../uploads/NewsGallery/";
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$imageType = $sourceProperties[2];
switch ($imageType) {
case IMAGETYPE_PNG:
$imageSrc = imagecreatefrompng($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagepng($tmp,$dirPath. $newFileName. ".". $ext);
break;
case IMAGETYPE_JPEG:
$imageSrc = imagecreatefromjpeg($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagejpeg($tmp,$dirPath. $newFileName. ".". $ext);
break;
case IMAGETYPE_GIF:
$imageSrc = imagecreatefromgif($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagegif($tmp,$dirPath. $newFileName. ".". $ext);
break;
default:
exit;
break;
}
$where = array(
'newsa_image_id' => mysqli_real_escape_string($data->con, $_POST['UpPostNewsID'])
);
$insert_data = array(
'newsa_image_name' => mysqli_real_escape_string($data->con, $newFileName.".".$ext)
);
if($data->update('news_images', $insert_data, $where))
{
$upload = 'success';
}
}
}
function imageResize($imageSrc,$imageWidth,$imageHeight) {
$newImageWidth =770;
$newImageHeight =430;
$newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
return $newImageLayer;
}
?>
