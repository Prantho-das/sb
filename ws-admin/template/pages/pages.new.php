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
'pages_id' =>$update
);
$result = $data->select_where('pages', $where);
foreach($result as $row)
{
?>
<form class="form">
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="hidden" name="pageID" value="<?php echo $row['pages_id']; ?>" />
<input type="text" class="form-control form-input-custome" name="pageTitle" value="<?php echo $row['pages_title']; ?>" placeholder="Add Pages Title" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" id="noWhiteSpaceAtTheStart" name="pageSlug" value="<?php echo $row['pages_content_slug']; ?>" placeholder="Add Pages Slug" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" id="content" class="form-control form-textarea-custome" name="pageDescription" placeholder="Description" required><?php echo $row['pages_content']; ?></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesPossition" class="form-control form-input-custome" required>
<option value="<?php echo $row['pages_possition']; ?>"><?php echo $row['pages_possition']; ?></option>
<option value="Header">Header</option>
<option value="Footer">Footer</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesActivitics" class="form-control form-input-custome" required>
<option value="<?php echo $row['pages_activitics']; ?>"><?php echo $row['pages_activitics']; ?></option>
<option value="Level">Level</option>
<option value="Dropdown">Dropdown</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesContentSide" class="form-control form-input-custome" required>
<option value="<?php echo $row['pages_content_side']; ?>"><?php echo $row['pages_content_side']; ?></option>
<option value="1">Columns 1</option>
<option value="2">Columns 2</option>
<option value="3">Columns 3</option>
<option value="4">Columns 4</option>
<option value="5">Columns 5</option>
<option value="6">Columns 6</option>
<option value="7">Columns 7</option>
<option value="8">Columns 8</option>
<option value="9">Columns 9</option>
<option value="10">Columns 10</option>
</select>
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
<input type="hidden" name="pageInsert" value="Insert" />
<input type="text" class="form-control form-input-custome" name="pageTitle" placeholder="Add Pages Title" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<input type="text" class="form-control form-input-custome" id="noWhiteSpaceAtTheStart" name="pageSlug" placeholder="Add Pages Slug" required />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<textarea rows="5" id="content" class="form-control form-textarea-custome" name="pageDescription" placeholder="Description" required></textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesPossition" class="form-control form-input-custome" required>
<option value="">------ None ------</option>
<option value="Header">Header</option>
<option value="Footer">Footer</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesActivitics" class="form-control form-input-custome" required>
<option value="">------ None ------</option>
<option value="Level">Level</option>
<option value="Dropdown">Dropdown</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-xl-12">
<select name="pagesContentSide" class="form-control form-input-custome" required>
<option value="">------ None ------</option>
<option value="1">Columns 1</option>
<option value="2">Columns 2</option>
<option value="3">Columns 3</option>
<option value="4">Columns 4</option>
<option value="5">Columns 5</option>
<option value="6">Columns 6</option>
<option value="7">Columns 7</option>
<option value="8">Columns 8</option>
<option value="9">Columns 9</option>
<option value="10">Columns 10</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-12 text-end mt-3">
<button class="btn btn-primary form-btn-runded submit">Submit</button>
</div>
</div>
</form>
<?php } ?>
</div>
</div>
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
url:"<?php echo pathUrl(__DIR__ . '/../../'); ?>function/content/pages/content.pages.php",
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
CKEDITOR.replace('content',{
height:300,
filebrowserUploadUrl: "<?php echo pathUrl(__DIR__ . '/../../'); ?>function/upload/news.gallery.php"
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
