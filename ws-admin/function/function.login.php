<?php
if(isset($_POST['userEmail_address'])){
if(!empty($_POST['passwordLogs'])){
$sql = "SELECT * FROM  admin_board  WHERE admin_board_email='".$_POST['userEmail_address']."'";
$result = $data->con->query($sql);
if($result->num_rows > 0){
$_SESSION['userEmail']=$_POST['userEmail_address'];
if(($_SESSION['userEmail']=$_POST['userEmail_address'])){
$sqlCheck = "SELECT * FROM admin_board where admin_board_email='".$_SESSION['userEmail']."'";
$resultCheck = $data->con->query($sqlCheck);
if ($resultCheck->num_rows > 0) {
while($row = $resultCheck->fetch_assoc()){
$message = $row['admin_board_password'];
if (password_verify($_POST['passwordLogs'], $row['admin_board_password'])){
if($row['admin_board_status'] == 'on'){
$sql = "UPDATE admin_board SET admin_board_ip='".$_SERVER['REMOTE_ADDR']."',admin_board_updatedb='".date('Y-m-d')."' WHERE admin_board_id='".$row['admin_board_id']."'";
if ($data->con->query($sql) === TRUE) {
$register_loign_admin = sha1($row['admin_board_email']);
$message = '<span class="dots-circle-spinner loading"></span> Login Successfully';
print "<script>window.open('pathUrl__DIR__ . /../?secure=$register_loign_admin','_self')</script>";
}else{
$message = '<span class="dots-circle-spinner loading"></span> Your account is closed';
}
}else{
$message = '<span class="dots-circle-spinner loading"></span> Your account is closed';
}
}else{
$message = '<span class="dots-circle-spinner loading"></span> Sorry is not valid password';
}
}
}
}
}else{
$message = '<span class="dots-circle-spinner loading"></span> Sorry not valid Email';
}
}else{
$message = '<span class="dots-circle-spinner loading"></span> Sorry not Information';
}
echo $message;
$data->con->close();
exit();
}
?>
