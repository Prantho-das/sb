<?php
$dpl = $data->con->query("SELECT count(*) as total  FROM newsa_post");
$row = $dpl->fetch_assoc();
if($row['total'] == ''){
$total_news = '0.00';
}else{
$total_news = $row['total'];
}
$dpl = $data->con->query("SELECT count(*) as total  FROM newsa_post WHERE newsa_post_public='publish'");
$row = $dpl->fetch_assoc();
if($row['total'] == ''){
$total_newsPublish = '0.00';
}else{
$total_newsPublish = $row['total'];
}
$dpl = $data->con->query("SELECT count(*) as total  FROM newsa_post WHERE newsa_post_public='unpublish'");
$row = $dpl->fetch_assoc();
if($row['total'] == ''){
$total_newsUnPublish = '0.00';
}else{
$total_newsUnPublish = $row['total'];
}
?>
