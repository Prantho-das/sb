$('.preloading').css('display','none');
$(document).ready(function(){
$('.form').submit(function(e){
$('.submit').html("Process...");
for(var name in CKEDITOR.instances)
CKEDITOR.instances[name].updateElement();
$('.preloading').show();
$('.content-body').css('opacity','0.1');
e.preventDefault();
var formData= $(this).closest('.form').serialize();
$('.submit').click(function () {
$(this).prop("disabled", true);
$(this).closest('form').trigger('submit');
});
$.ajax({
type: 'POST',
url:'https://wabisabibd.com/ws-admin/function/',
timeout:60000,
cache:false,
async: false,
dataType:'html',
processData: false,
data: formData,
success: function(data){
setTimeout(function(){ location.reload(); }, 7000);
}
})
.done(function(data){
setTimeout(function() {
$('.preloading').remove();
}, 4000);
$('.results').html(data);
$('.form')[0].reset();
})
.fail(function() {
setTimeout(function() {
$('.results').html('Internet please checking');
$('.response').remove();
}, 4000);
});
return false;
});
})
