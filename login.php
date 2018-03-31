<?php
if(!isset($_POST['submit']))
	exit('非法访问');
$user=$_POST['username'];
$pass=$_POST['passwd'];
echo '***********'.$pass.'************';
include 'conn.php';
$result = $conn->query("select * from account where password='$pass' and username='$user'");
echo 'hangshu:'.$result->num_rows;

$conn->close();
?>
