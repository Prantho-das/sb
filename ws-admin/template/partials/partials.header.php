<!-- start: header -->
<header class="header">
<div class="logo-container">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>" class="logo">
<div class="stage"><div class="dot-stretching"></div></div>
</a>
<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
</div>
</div>
<div class="header-right">
<div class="content">
<span class="separator"></span>
<div id="userbox" class="userbox">
<a href="#" data-bs-toggle="dropdown">
<figure class="profile-picture">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/user.png" class="rounded-circle" data-lock-picture="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/user.png"  />
</figure>
<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
<span class="name"><?php echo $session['admin_board_name']; ?></span>
<span class="role">Administrator</span>
</div>
</a>
<div class="dropdown-menu">
<ul class="list-unstyled mb-2">
<li class="divider"></li>
<li>
<a role="menuitem" tabindex="-1" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>profile"><i class="bx bx-user-circle"></i> My Profile</a>
</li>
<li>
<a role="menuitem" tabindex="-1" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>logout"><i class="bx bx-power-off"></i> Logout</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</header>
<!-- end: header -->
