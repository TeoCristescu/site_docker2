<?php
if(isset($_GET['id_selectat']))
{
	$id_produs=mysqli_real_escape_string($conn,$_GET['id_selectat']);
	
$sql="SELECT * FROM products where id='$id_produs'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>