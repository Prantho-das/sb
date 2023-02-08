<?php include '../config/url/public.database.php'; ?>
<section role="main" class="content-body content-body-modern mt-0">
<div class="ecommerce-form action-buttons-fixed" action="#" method="post">
<div class="row">
<div class="col">
<section class="card card-modern card-big-info">
<div class="card-body">
<div class="row">
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
<div class="row action-buttons margin-bottom-15">
<div class="col-12 col-md-auto">
<select class="form-control form-input-custome" name="userstatusUpdate" required>
<option>------ None ------</option>
<option value="on">On</option>
<option value="off">Off</option>
<option value="Delete">Delete</option>
</select>
</div>
<div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
<button class="btn btn-primary form-btn-runded submit">Submit</button>
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
