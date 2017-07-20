<?php
include("baglan.php"); 



$uye_id=$_GET["uye_id"];

$sorgu=mysql_query("SELECT * FROM uyeler where uye_id='$uye_id'");


$kayit=mysql_fetch_array($sorgu);


	
	
if($kayit["uye_onay"]==0) {

 $sorgu1=mysql_query("UPDATE uyeler set uye_onay=1 Where uye_id='$uye_id'");
 
 
	header("location:adminlist.php");

	}
	
	
	else{


 $sorgu1=mysql_query("UPDATE uyeler set uye_onay=0 Where uye_id='$uye_id'");
 
 
	header("location:uyeler.php");

	}

?>