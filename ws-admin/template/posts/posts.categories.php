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
'categories_id' =>$update
);
$result = $data->select_where('categories', $where);
foreach($result as $row)
{
?>
<form class="form">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" value="<?php echo $row['categories_id']; ?>" name="UpcategorizeID"/>
<input type="text" class="form-control form-input-custome" value="<?php echo $row['categories_name']; ?>" name="UpcategorizeName" placeholder="Name" required/>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" id="noWhiteSpaceAtTheStart" class="form-control form-input-custome" value="<?php echo $row['categories_slug']; ?>" name="UpcategorizeSlug" placeholder="Slug" required/>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="UpcategorizeParent" required>
<option value="<?php echo $row['categories_parant_id']; ?>">Parent Category</option>
<option value="Auto">Auto</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="UpcategorizePosition" required>
<option value="<?php echo $row['categories_position']; ?>"><?php echo $row['categories_position']; ?></option>
<option value="Header">Header</option>
<option value="Footer">Footer</option>
<option value="Video">Video</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" class="form-control form-textarea-custome" name="UpcategorizeDescription" placeholder="Description" required><?php echo $row['categories_descript']; ?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Save</button>
</div>
</div>
</form>
<?php } } else { ?>
<form class="form">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" name="categorizeName" placeholder="Name" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" id="noWhiteSpaceAtTheStart" class="form-control form-input-custome" name="categorizeSlug" placeholder="Slug" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="categorizeParent" required>
<option value="1">Parent Category</option>
<option value="Auto">Auto</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select class="form-control form-input-custome" name="categorizePosition" required>
<option value="">Position</option>
<option value="Header">Header</option>
<option value="Footer">Footer</option>
<option value="Video">Video</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" class="form-control form-textarea-custome" name="categorizeDescription" placeholder="Description" required></textarea>
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
<div class="row action-buttons">
<div class="col-12 col-md-auto">
<select name="statusCategoriseName" class="form-control form-input-custome" required>
<option value="">------ None ------</option>
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
<option value="delete">Delete</option>
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
url:"<?php echo pathUrl(__DIR__ . '/../../'); ?>function/content/posts/content.categorie.php",
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
<script>
var inp =  document.querySelector('#noWhiteSpaceAtTheStart');
inp.addEventListener("keypress",function(e){
var key = e.keyCode;
if(key === 32){
e.preventDefault();
return false;
}
})
</script>
