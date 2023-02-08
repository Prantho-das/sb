<?php
$dpl = $data->con->query("SELECT count(*) as total  FROM news_comment WHERE newsa_post_id='".$row['newsa_post_id']."'");
$rowCount = $dpl->fetch_assoc();
if($rowCount['total'] == ''){
$total_comments = '0.00';
}else{
$total_comments = $rowCount['total'];
}
?>
