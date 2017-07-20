<?php 
include("baglan.php");

$urun_id=$_GET["urun_id"];






	
	
$sorgu3=mysql_query("delete FROM urunler WHERE  urun_id='$urun_id'");
header("location: ".$_SERVER['HTTP_REFERER']."");
	


	
	
	


?>