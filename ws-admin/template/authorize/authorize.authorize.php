<?php
if(!empty($_COOKIE["PHPSESSID"])){
header("location:pathUrl__DIR__ . /../");
}else{
include 'modular/modular.head.php';
?>
<body>
<section class="body-sign">
<div class="center-sign">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>" class="logo float-left">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/logo.png" height="75" alt="WS Admin" />
</a>
<div class="panel card-sign">
<div class="card-title-sign mt-3 text-end">
<h2 class="title text-uppercase m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In</h2>
</div>
<?php include 'controller/controller.authorize.php'; ?>
</div>
</div>
</section>
</body>
<?php
}
$jsSubmit = '';
$jsSubmit  .='
<script   src="'.pathUrl(__DIR__ . '/../../').'public/authorize.main.js"></script>
';
echo $jsSubmit;
include 'modular/modular.foot.php'; ?>
