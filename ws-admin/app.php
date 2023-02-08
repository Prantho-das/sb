<?php
if (array_search(__FILE__, get_included_files()) === 0) {
if(!empty($_GET['secure'])){
header("location:pathUrl__DIR__ . /../");
}
include("server.php");
}else{
}
?>
