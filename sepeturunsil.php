<?php 
include("baglan.php");
@session_start();
$urun_id=$_GET["urun_id"];
$uye_id=$_SESSION["uyeid"];


$sorgu3=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$urun_id'");
$kayit3=mysql_fetch_array($sorgu3);
echo $kayit3["adet"];
if($kayit3["adet"]==1){
	
	
$sorgu3=mysql_query("delete FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$urun_id'");
header("location: ".$_SERVER['HTTP_REFERER']."");
	
	} else{
		$adet=$kayit3["adet"]-1;
		 $sorgu1=mysql_query("UPDATE gecicisepet set adet='$adet' Where gs_uye_id='$uye_id' and gs_urun_id='$urun_id'");
		
		header("location: ".$_SERVER['HTTP_REFERER']."");
		}


?>