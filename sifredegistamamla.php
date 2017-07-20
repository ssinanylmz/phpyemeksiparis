<?php
include("baglan.php"); 

$esifre=$_POST["reg_ESifre"];
$sifre=$_POST["reg_Sifre"];
$sifretekrar=$_POST["reg_SifreTekrar"];

@session_start();
$uye_id=$_SESSION['uyeid'];

$sorgu=mysql_query("SELECT * FROM uyeler where uye_id='$uye_id' and uye_sifre='$esifre'");


$kayit=mysql_fetch_array($sorgu);


	
	
if($kayit) {
 $sorgu1=mysql_query("UPDATE uyeler set uye_sifre='$sifre' Where uye_id='$uye_id'");
 
 $_SESSION['sifre']=$sifre;
 
	  require('sifredegistirmebasarili.php');

	}
	
	
	else{

@session_start();
@$_SESSION['sifrehata']="Hata!! Mevcut Şifreniz Yanlış.";
	 require('sifredegistir.php');


	}

?>