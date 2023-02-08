<?php
include '../../../../config/config.db.php';
include '../../../../config/url/pathUrl.url.php';
if($_POST['show']){
$limit = $_POST['show'];
}else{
$limit = '10';
}
$page = 1;
if($_POST['page'] > 1)
{
$start = (($_POST['page'] - 1) * $limit);
$page = $_POST['page'];
}
else
{
$start = 0;
}
$query = "
SELECT * FROM   youtube_channel
";
if($_POST['query'] != '')
{
$query .= '
WHERE youtube_channel_name LIKE "%'.($_POST['query']).'%"
';
}
$query .= 'ORDER BY youtube_channel_id ASC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();
$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
$output = '
<table class="table table-bordered table-hover">
<tbody>
';
if($total_data > 0)
{
foreach($result as $row)
{
$output .= '
<tr>
<td>
<center><input type="checkbox" class="form-check-input" name="UpaddChannel[]" value="'.$row['youtube_channel_id'].'"></center>
</td>
<td class="align-items-center">
<div class="pl-3 email">
<a class="table-edit-now" href="'.pathUrl(__DIR__ . '/../../../').'channel/update/'.$row['youtube_channel_store'].'/'.$row['youtube_channel_id'].'"><i class="bx bxs-edit-alt" ></i> Edit</a>
<span>'.$row['youtube_channel_name'].'</span>
</div>
</td>
<td><td class="status"><div class="pl-3 email"><span class="text-uppercase text-small">Status</span><span>'.$row['youtube_channel_status'].'</span></div></td>
<td class="status"><div class="pl-3 email"><span class="text-uppercase text-small">URL</span><span><a href="'.$row['youtube_channel_url'].'" target="_blank">'.$row['youtube_channel_url'].'</a></span></div></td>
<td><td class="status text-right"><div class="pl-3 email"><span class="text-uppercase text-small">Date</span><span>'.$row['youtube_channel_createdb'].'</span></div></td>
</tr>
';
}
}
else
{
$output .= file_get_contents('../../../template/error/error.data.php');
}
$output .= '
</tbody>
</table>
<nav aria-label="page navigation example">
<ul class="pagination">
';
if($total_data == '0'){
}else{
$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';
if($total_links > 9)
{
if($page < 10)
{
for($count = 1; $count <= 10; $count++)
{
$page_array[] = $count;
}
$page_array[] = '...';
$page_array[] = $total_links;
}
else
{
$end_limit = $total_links - 10;
if($page > $end_limit)
{
$page_array[] = 1;
$page_array[] = '...';
for($count = $end_limit; $count <= $total_links; $count++)
{
$page_array[] = $count;
}
}
else
{
$page_array[] = 1;
$page_array[] = '...';
for($count = $page - 1; $count <= $page + 1; $count++)
{
$page_array[] = $count;
}
$page_array[] = '...';
$page_array[] = $total_links;
}
}
}
else
{
for($count = 1; $count <= $total_links; $count++)
{
$page_array[] = $count;
}
}

for($count = 0; $count < count($page_array); $count++)
{
if($page == $page_array[$count])
{
$page_link .= '
<li class="page-item active">
<a class="page-link" href="?page='.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
</li>
';
$previous_id = $page_array[$count] - 1;
if($previous_id > 0)
{
$previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
}
else
{
$previous_link = '
<li class="page-item disabled">
<a class="page-link" href="#">Previous</a>
</li>
';
}
$next_id = $page_array[$count] + 1;
if($next_id >= $total_links)
{
$next_link = '
<li class="page-item disabled">
<a class="page-link" href="#">Next</a>
</li>
';
}
else
{
$next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
}
}
else
{
if($page_array[$count] == '...')
{
$page_link .= '
<li class="page-item disabled">
<a class="page-link" href="#">...</a>
</li>
';
}
else
{
$page_link .= '
<li class="page-item"><a class="page-link" href="?page='.$page_array[$count].'" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
';
}
}
}
$output .= $previous_link . $page_link . $next_link;
$output .= '
</ul>
</nav>
';
}
echo $output;
?>
