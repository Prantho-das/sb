<?php
include 'config/config.db.php';
$data = new Databases;
if(!defined('ABSPATH')){
/**
* @package        Responsive
* @author         support@waresun.com
* @copyright      2017 - 2022 CyberChimps
* @license        license.txt
* @version        Release: 1.0
* @filesource     waresun-content/themes/responsive/index.php
* @link           https://waresun.com/
* @since          available since Release 1.0
*/
function ob_end_clean_all() {
$handlers = ob_list_handlers();
while (count($handlers) > 0 && $handlers[count($handlers) - 1] != 'ob_gzhandler' && $handlers[count($handlers) - 1] != 'zlib output compression') {
ob_end_clean();
$handlers = ob_list_handlers();
}
}
ob_implicit_flush(1);
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../") && die;
require ('template/template.php');
flush();
session_write_close();
$data->con->close();
exit();
}
?>
