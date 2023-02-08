<?php
$data = new Databases;
$userLogs = "SELECT * FROM  admin_board  WHERE admin_board_status='on' and sha1(admin_board_email)='".$_COOKIE["PHPSESSID"]."' ORDER BY admin_board_id DESC LIMIT 1";
$userLogs_data = $data->con->query($userLogs);
foreach($userLogs_data as $session)
{
?>
<section role="main" class="content-body" id="here">
<div class="row">
<div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
<section class="card">
<div class="card-body">
<div class="thumb-info mb-3">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/5356680.png" class="rounded img-fluid" alt="John Doe">
<div class="thumb-info-title">
<span class="thumb-info-inner"><?php echo $session['admin_board_name']; ?></span>
</div>
</div>
<div class="widget-toggle-expand mb-3">
<div class="widget-header">
<h5 class="mb-2 font-size-12">Profile Completion</h5>
<div class="widget-toggle">+</div>
</div>
<div class="widget-content-collapsed">
<div class="progress progress-xs light">
<div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50">
50
</div>
</div>
</div>
<div class="widget-content-expanded">
<ul class="simple-todo-list mt-3">
<li class="completed">Update Profile Picture</li>
<li class="completed">Change Personal Information</li>
<li>Update Social Media</li>
<li>Follow Someone</li>
</ul>
</div>
</div>
</div>
</section>
</div>
<div class="col-lg-8 col-xl-6">
<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
<li class="nav-item active">
<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Overview</button>
</li>
<li class="nav-item">
<button class="nav-link" data-bs-target="#address" data-bs-toggle="tab">Address</button>
</li>
<li class="nav-item">
<button class="nav-link" data-bs-target="#authorized" data-bs-toggle="tab">Authorized</button>
</li>
<li class="nav-item">
<button class="nav-link" data-bs-target="#password" data-bs-toggle="tab">Password</button>
</li>
</ul>
<div class="tab-content">
<div id="overview" class="tab-pane active">
<div class="p-3">
<?php
$resultTitle = $data->select('website_title', $data);
foreach($resultTitle as $title)
{
?>
<h4 class="mb-3 font-size-12">Website Information</h4>
<form class="form">
<section class="simple-compose-box mb-3">
<input type="hidden" name="websiteUpID" value="<?php echo $title['website_title_id']; ?>" />
<textarea name="update_web_title" placeholder="What's on your mind?" rows="4" required><?php echo $title['website_title_content']; ?></textarea>
<div class="compose-box-footer">
<ul class="compose-toolbar">
<li>
<a href="#"><i class="fas fa-camera"></i></a>
</li>
<li>
<a href="#"><i class="fas fa-map-marker-alt"></i></a>
</li>
</ul>
<ul class="compose-btn">
<li>
<button type="submit" class="btn btn-primary form-btn-runded submit">Save</button>
</li>
</ul>
</div>
</section>
</form>
<?php } ?>
</div>
</div>
<div id="address" class="tab-pane">
<?php
$address = array(
'admin_board_id' => $session['admin_board_id']
);
$address_data = $data->select('admin_address', $address);
if(count($address_data) > 0){
foreach($address_data as $row)
{
?>
<form class="form p-3">
<h4 class="mb-3 font-size-12">Personal Information</h4>
<div class="row row mb-4">
<div class="form-group col">
<label for="inputAddress">Full Name</label>
<input type="hidden" name="adminUpdateID" value="<?php echo $session['admin_board_id']; ?>">
<input type="text" class="form-control form-input-custome" value="<?php echo $session['admin_board_name']; ?>" id="inputAddress" placeholder="Full Name" disabled>
</div>
</div>
<div class="row mb-4">
<div class="form-group col">
<label for="inputAddress2">Address</label>
<input type="text" name="adminAddress" class="form-control form-input-custome" value="<?php echo $row['admin_address_content']; ?>" id="inputAddress2" placeholder="Address" required>
</div>
</div>
<div class="row">
<div class="form-group col-md-6">
<label for="inputCity">City</label>
<input type="text" name="adminCity" class="form-control form-input-custome" value="<?php echo $row['admin_address_city']; ?>" id="inputCity" placeholder="City" required>
</div>
<div class="form-group col-md-6 border-top-0 pt-0">
<label for="inputZip">Zip</label>
<input type="number" name="adminZip" class="form-control form-input-custome" value="<?php echo $row['admin_address_zip']; ?>" id="inputZip" placeholder="Zip" required>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Save</button>
</div>
</div>
</form>
<?php } } else { ?>
<form class="form p-3">
<h4 class="mb-3 font-size-12">Personal Information</h4>
<div class="row row mb-4">
<div class="form-group col">
<label for="inputAddress">Full Name</label>
<input type="hidden" name="adminUpdateID" value="<?php echo $session['admin_board_id']; ?>">
<input type="text" class="form-control form-input-custome" value="<?php echo $session['admin_board_name']; ?>" id="inputAddress" placeholder="Full Name" disabled>
</div>
</div>
<div class="row mb-4">
<div class="form-group col">
<label for="inputAddress2">Address</label>
<input type="text" name="adminAddress" class="form-control form-input-custome" id="inputAddress2" placeholder="Address" required>
</div>
</div>
<div class="row">
<div class="form-group col-md-6">
<label for="inputCity">City</label>
<input type="text" name="adminCity" class="form-control form-input-custome" id="inputCity" placeholder="City" required>
</div>
<div class="form-group col-md-6 border-top-0 pt-0">
<label for="inputZip">Zip</label>
<input type="number" name="adminZip"  class="form-control form-input-custome" id="inputZip" placeholder="Zip" required>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Save</button>
</div>
</div>
</form>
<?php } ?>
</div>
<div id="authorized" class="tab-pane">
<form class="form p-3">
<h4 class="mb-3 font-size-12">Authorized Information</h4>
<div class="row row mb-4">
<div class="form-group col">
<label for="inputAddress">Full Name</label>
<input type="hidden" name="authUpdateID" value="<?php echo $session['admin_board_id']; ?>">
<input type="text" name="adminFname" class="form-control form-input-custome" value="<?php echo $session['admin_board_name']; ?>" id="inputAddress" placeholder="Full Name" required>
</div>
</div>
<div class="row mb-4">
<div class="form-group col">
<label for="inputAddress2">Email Address</label>
<input type="email" name="adminEmail" class="form-control form-input-custome" value="<?php echo $session['admin_board_email']; ?>" id="inputAddress2" placeholder="Email Address" required>
</div>
</div>
<div class="row">
<div class="form-group col-md-12">
<label for="inputCity">Phone Number</label>
<input type="number" name="adminNumber" class="form-control form-input-custome" value="<?php echo $session['admin_board_phone']; ?>" id="inputCity" placeholder="Phone Number" required>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Save</button>
</div>
</div>
</form>
</div>
<div id="password" class="tab-pane">
<form class="form p-3">
<h4 class="mb-3 font-size-12">Password Information</h4>
<div class="row row mb-4">
<div class="form-group col">
<label for="inputAddress">Old Password</label>
<input type="hidden" name="passUpdateID" value="<?php echo $session['admin_board_id']; ?>">
<input type="password" name="oldPassword" class="form-control form-input-custome" id="inputAddress" placeholder="Old Password" required>
</div>
</div>
<div class="row mb-4">
<div class="form-group col">
<label for="inputAddress2">New Password</label>
<input type="password" name="newPassword" class="form-control form-input-custome" id="inputAddress2" placeholder="New Password" required>
</div>
</div>
<div class="row">
<div class="form-group col-md-12">
<label for="inputCity">Password Confirm</label>
<input type="password" name="confirmPassword" class="form-control form-input-custome" id="inputCity" placeholder="Password Confirm" required>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Save</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
<?php } ?>
