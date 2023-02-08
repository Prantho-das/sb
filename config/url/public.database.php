<?php
$data = new Databases;
if(!empty($_GET['limit'])){
$search_limit = $_GET['limit'];
}else{
$search_limit = 10;
}
if(!empty($_GET['page'])){
$page = $_GET['page'];
}else{
$page = 1;
}
?>
