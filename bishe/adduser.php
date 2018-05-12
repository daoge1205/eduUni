<?php
header("Content-type: text/html; charset=utf-8");
$num=$_POST["nameandclass"];
$name=$_POST["name"];

$db=new mysqli('localhost','root','103125','test');
mysqli_query($db,"set names utf8");
if ($db->connect_error) {
    die("连接失败: " . $db->connect_error);
} 
echo "连接成功";
$sql="select max(num) from user where num like '$tag%'";
$rows=$db->query($sql);
$max=$rows->fetch_row();
if(!isset($max[0])){
	echo "kong!";
}
?>
