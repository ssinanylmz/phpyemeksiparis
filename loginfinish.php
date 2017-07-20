<?php
include("baglan.php"); 

$sifre=$_POST["giris_sifre"];
$eposta=$_POST["giris_Eposta"];

$onay=0;


$sorgu=mysql_query("SELECT * FROM uyeler where uye_mail='$eposta' and uye_sifre='$sifre'");


$kayit=mysql_fetch_array($sorgu);


	
	
if($kayit) {
	 session_start();
	$_SESSION['giriskontrol']=1;
	$_SESSION['uyeid']=$kayit["uye_id"]; 
	$_SESSION['adi']=$kayit["uye_adi"];
	$_SESSION['soyadi']=$kayit["uye_soyadi"];
	$_SESSION['sifre']=$kayit["uye_sifre"];
	$_SESSION['ililce']=$kayit["uye_il_ilce"];
	$_SESSION['postakodu']=$kayit["uye_postakodu"];
	$_SESSION['telefon']=$kayit["uye_telefon"];
	$_SESSION['mail']=$kayit["uye_mail"];
	$_SESSION['adres']=$kayit["uye_adres"];
	$_SESSION['onay']=$kayit["uye_onay"];
	$_SESSION['pf']=$kayit["uye_pf"];

if($_SESSION['onay']==1){
	header("location:admin.php");
	
	}
	else{
header("location:index.php");
	}
	
	}else{
		
			session_start();
		  $_SESSION["Hata"] = "E-Posta veya Şifre Yanlış ! ";

header("location:login.php");

		
		}




?>