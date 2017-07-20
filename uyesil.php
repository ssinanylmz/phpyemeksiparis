<?php 
include("baglan.php");

$uye_id=$_GET["uye_id"];






	
	
$sorgu3=mysql_query("delete FROM uyeler WHERE  uye_id='$uye_id'");
header("location: ".$_SERVER['HTTP_REFERER']."");
	


	
	
	


?>