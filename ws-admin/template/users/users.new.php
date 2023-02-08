<?php include '../config/url/public.database.php'; ?>
<section role="main" class="content-body content-body-modern mt-0">
<div class="ecommerce-form action-buttons-fixed" action="#" method="post">
<div class="row">
<div class="col">
<section class="card card-modern card-big-info">
<div class="card-body">
<div class="row">
<div class="col-lg-2-5 col-xl-1-5">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/5356680.png" class="lazy rounded img-fluid" alt="loading....">
</div>
<div class="col-lg-3-5 col-xl-4-5 padding-10px">
<?php
if(!empty($update)){
$where = array(
'admin_board_id' =>$update
);
$result = $data->select_where('admin_board', $where);
foreach($result as $row)
{
?>
<form class="form">
<form class="form">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="userName" value="<?php echo $row['admin_board_name']; ?>" placeholder="Name" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="userEmail" value="<?php echo $row['admin_board_email']; ?>" placeholder="Email" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="number" class="form-control form-input-custome" name="userPhone" value="<?php echo $row['admin_board_phone']; ?>" placeholder="Number" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="userControl" required>
<option value="<?php echo $row['admin_board_description']; ?>">Control</option>
<option value="admin">Admin</option>
<option value="editor">Editor</option>
<option value="moderator">Moderator</option>
<option value="advertiser">Advertiser</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" class="form-control form-textarea-custome" name="userDescription" placeholder="Description" required><?php echo $row['admin_board_description']; ?></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="password" class="form-control form-input-custome" name="userPassword" placeholder="Password" required />
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Submit</button>
</div>
</div>
</form>
<?php } } else { ?>
<form class="form">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="userName" placeholder="Name" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="userEmail" placeholder="Email" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="number" class="form-control form-input-custome" name="userPhone" placeholder="Number" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="userControl" required>
<option value="">Control</option>
<option value="admin">Admin</option>
<option value="editor">Editor</option>
<option value="moderator">Moderator</option>
<option value="advertiser">Advertiser</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" class="form-control form-textarea-custome" name="userDescription" placeholder="Description" required></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="password" class="form-control form-input-custome" name="userPassword" placeholder="Password" required />
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded">Submit</button>
</div>
</div>
</form>
<?php } ?>
</div>
<form class="form">
<div class="row">
<div class="col">
<section class="card card-padding-top">
<div class="card-body">
<div class="form-group search-table">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome search_box" placeholder="Search" />
</div>
</div>
<div class="responsive-table">
<div id="dynamic_content"></div>
</div>
</div>
</section>
</div>
</div>
</form>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<script>
$(document).ready(function(){
$('#dynamic_content').html(make_skeleton());
setTimeout(function(){
load_content(6);
},2000);
function make_skeleton()
{
var output = '';
for(var count = 0; count < 6; count++)
{
output += '<div class="ph-item">';
output += '<div class="ph-col-12" id="ph-col-12">';
output += '<div class="ph-row">';
output += '<div class="ph-col-12 big"></div>';
output += '<div class="ph-col-12"></div>';
output += '<div class="ph-col-12"></div>';
output += '<div class="ph-col-12"></div>';
output += '<div class="ph-col-12"></div>';
output += '</div>';
output += '</div>';
output += '</div>';
}
return output;
}
function load_content(limit)
{
load_data(1);
function load_data(page, query = '', show = '<?php echo $search_limit; ?>')
{
$.ajax({
url:"<?php echo pathUrl(__DIR__ . '/../../'); ?>function/content/users/content.users.php",
method:"POST",
data:{page:<?php echo $page; ?>, query:query, show:show},
success:function(data)
{
setTimeout(function(){
$(".preloading").fadeOut("slow");
$('.responsive-table').css('opacity','10');
$('#dynamic_content').html(data);
}, 2500);
}
});
}
$(document).on('click', '.page-link', function(){
var query = $('.search_box').val();
load_data(page, query);
});
$('.search_box').keyup(function(){
$('.preloading').show();
$('.responsive-table').css('opacity','0.1');
var query = $('.search_box').val();
load_data(1, query);
});
}
});
</script>
