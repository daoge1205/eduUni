<?php
	$q=$_GET["q"];
	if(empty($q)) {
    		echo '请选择一个网站';
    		exit;
	}

	$con = mysqli_connect('localhost','root','103125');
	if (!$con){
   		 
		die('Could not connect: ' . mysqli_error($con));
	}
// 选择数据库
mysqli_select_db($con,"test");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf:8");
$sql="SELECT * FROM Books WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
 
echo "<table border='1'>
<tr>
<th>ID</th>
<th>name</th>
<th>sum</th>
</tr>";
 
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['sum'] . "</td>";
    echo "</tr>";
}
echo "</table>";
 
mysqli_close($con);
?>
