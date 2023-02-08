<header id="navigation">
<div class="navbar navbar-expand-lg" role="banner">
<div class="container"></div>
<div class="topbar">
<div class="container">
<div id="topbar" class="navbar-header">
<a class="navbar-brand" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>">
<img loading="lazy" class="lazy main-logo img-fluid" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/presets/preset1/logo.png" alt="logo">
</a>
<div id="topbar-right">
<div id="date-time"></div>
<div id="weather">
<span class="weather-icon">
<img loading="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/others/weather.png" alt="Icon" class="lazy img-fluid">
</span>
<span class="temp"></span>
</div>
</div>
</div>
</div>
</div>
<div id="menubar" class="container">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
</button>
<a class="navbar-brand d-lg-none" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>">
<img class="main-logo img-fluid" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/presets/preset1/logo.png" alt="logo">
</a>
<nav id="mainmenu" class="navbar-left collapse navbar-collapse">
<ul class="nav navbar-nav">
<?php
$li_data = "SELECT * FROM  categories WHERE categories_status='publish' ORDER BY categories_id LIMIT 10";
$result_data = $data->con->query($li_data);
foreach($result_data as $li)
{
?>
<li class="home"><a href="<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo $li['categories_slug']; ?>/<?php echo $li['categories_id']; ?>"><?php echo $li['categories_name']; ?></a></li>
<?php } ?>
<li class="lifestyle"><a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>youtube">Youtube</a></li>
<li class="lifestyle"><a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>gallery">Gallery</a></li>
</ul>
</nav>
<div class="searchNlogin">
<ul>
<li class="search-icon"><i class="fa fa-search"></i></li>
<li class="dropdown user-panel"><a href="javascript:void(0);"><i class="fa fa-user"></i></a>
</li>
</ul>
<div class="search">
<form role="form">
<input type="text" class="search-form" autocomplete="off" placeholder="Search your news">
</form>
</div>
</div>
</div>
</div>
</header>
