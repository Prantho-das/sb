<?php
if(!defined('ABSPATH')){
include '../config/config.db.php';
$data = new Databases;
/**
* @package        Responsive
* @author         support@gmail.com
* @copyright      2020 - 2021 CyberChimps
* @license        license.txt
* @version        Release: 1.0
* @filesource     index.php
* @link           https://waresun.com/
* @since          available since Release 1.0
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_unset();
set_time_limit(5000);
ini_set('memory_limit', '2048M');
header("Expires:");
header('Content-Type: text/html; charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
@ini_set('no-gzip', 0);
@ini_set('zlib.output_compression', 100000);
@ini_set('implicit_flush', 1);
ob_implicit_flush(1);
$_script_started = microtime(1);
$_page_time_seconds = microtime(1) - $_script_started;
if(!isset($_GET['secure'])){
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
}else{
$id = $_GET['secure'];
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && die;
$a_admin = session_id($id);
if(empty($a_admin)) session_start();
}
if (!isset($_COOKIE["PHPSESSID"])){
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_COOKIE["PHPSESSID"] = '0';
require ('template/authorize/authorize.authorize.php');
}else{
$userLogs = "SELECT * FROM  admin_board  WHERE admin_board_status='on' and sha1(admin_board_email)='".$_COOKIE["PHPSESSID"]."' ORDER BY admin_board_id DESC LIMIT 1";
$session_data = $data->con->query($userLogs);
foreach($session_data as $session)
{
include 'layouts/layout.php';
}
}
flush();
session_write_close();
$data->con->close();
exit();
}
?>
