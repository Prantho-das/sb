<?php
header("X-Foo: Bar");
header("X-Bar: Baz");
header_remove("X-Foo");
header_remove('x-powered-by');
require_once __DIR__ . '../../../config/config.db.php';
require_once __DIR__ . '../../../config/url/pathUrl.url.php';
$data    = new Databases;
$message = 0;
include(__DIR__.'/function.login.php');
include(__DIR__.'/function.insert.php');
include(__DIR__.'/function.update.php');
include(__DIR__.'/function.delete.php');
?>
