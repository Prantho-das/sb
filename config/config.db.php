<?php
date_default_timezone_set('Asia/Dhaka');
class Databases{
public $con;
public $error;
public function __construct()
{
$servername = "localhost";
$username   = "wabisabi_rana";
$password   = "Rana@#01737";
$dbname     = "wabisabi_store";
$this->con = mysqli_connect($servername, $username, $password, $dbname);
$this->con->set_charset('utf8mb4');
}
public function select($table_name, $data)
{
$array = array();
$query = "SELECT * FROM ".$table_name."";
$result = mysqli_query($this->con, $query);
while($row = mysqli_fetch_assoc($result))
{
$array[] = $row;
}
return $array;
}
public function select_where($table_name, $where_condition)
{
$condition = '';
$array = array();
foreach($where_condition as $key => $value)
{
$condition .= $key . " = '".$value."' AND ";
}
$condition = substr($condition, 0, -5);
$query = "SELECT * FROM ".$table_name." WHERE " . $condition;
$result = mysqli_query($this->con, $query);
while($row = mysqli_fetch_array($result))
{
$array[] = $row;
}
return $array;
}
public function insert($table_name, $data)
{
$string = "INSERT INTO ".$table_name." (";
$string .= implode(",", array_keys($data)) . ') VALUES (';
$string .= "'" . implode("','", array_values($data)) . "')";
if(mysqli_query($this->con, $string))
{
return true;
}
else
{
echo mysqli_error($this->con);
}
}
public function insert_multiple($table_name, $data)
{
$string = "INSERT INTO ".$table_name." (";
$string .= implode(",", array_keys($data)) . ') VALUES (';
$string .= "'" . implode("','", array_values($data)) . "')";
if(mysqli_multi_query($this->con, $string))
{
return true;
}
else
{
echo mysqli_error($this->con);
}
}
public function update($table_name, $fields, $where_condition)
{
$query = '';
$condition = '';
foreach($fields as $key => $value)
{
$query .= $key . "='".$value."', ";
}
$query = substr($query, 0, -2);
/*This code will convert array to string like this-
input - array(
'key1'     =>     'value1',
'key2'     =>     'value2'
)
output = key1 = 'value1', key2 = 'value2'*/
foreach($where_condition as $key => $value)
{
$condition .= $key . "='".$value."' AND ";
}
$condition = substr($condition, 0, -5);
/*This code will convert array to string like this-
input - array(
'id'     =>     '5'
)
output = id = '5'*/
$query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";
if(mysqli_query($this->con, $query))
{
return true;
}
}
public function delete($table_name, $where_condition)
{
$condition = '';
foreach($where_condition as $key => $value)
{
$condition .= $key . " = '".$value."' AND ";
/*This code will convert array to string like this-
input - array(
'id'     =>     '5'
)
output = id = '5'*/
$condition = substr($condition, 0, -5);
$query = "DELETE FROM ".$table_name." WHERE ".$condition."";
if(mysqli_query($this->con, $query))
{
return true;
}
}
}
}
$servername = "localhost";
$username = "wabisabi_rana";
$password = "Rana@#01737";
$database = "wabisabi_store";
try {
$connect = new PDO ("mysql:host=$servername;dbname=$database", "$username", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
$connect->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
echo "" . $e->getMessage();
}
?>
