<?php 
include("baglan.php");
@session_start();

$uye_id=$_SESSION["uyeid"];


	
	
$sorgu3=mysql_query("delete FROM gecicisepet WHERE gs_uye_id='$uye_id'");
header("location: ".$_SERVER['HTTP_REFERER']."");
	



?>