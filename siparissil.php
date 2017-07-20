<?php 
include("baglan.php");

$uye_id=$_GET["urun_id"];






	
	
$sorgu3=mysql_query("delete FROM siparisler WHERE  siparis_id='$uye_id'");
header("location: ".$_SERVER['HTTP_REFERER']."");
	


	
	
	


?>