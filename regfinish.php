<?php
include("baglan.php"); 
$ad=$_POST["reg_Ad"];
$soyad=$_POST["reg_Soyad"];
$sifre=$_POST["reg_Sifre"];
$adres=$_POST["reg_Adres"];
$ililce=$_POST["reg_ililce"];
$postakodu=$_POST["reg_Postakodu"];
$eposta=$_POST["reg_Eposta"];
$telefon=$_POST["reg_Telefon"];
$onay=0;
$pf="";

$sorgu=mysql_query("SELECT * FROM uyeler where uye_mail='$eposta'");


$kayit=mysql_fetch_array($sorgu);


	
	
if($kayit) {

	
@session_start();
@$_SESSION['epostahata']="Hata!! E-Posta Adresi Kullanımda.";
	 require('register.php');
	}else{

try {
    $sql = mysql_query("INSERT INTO uyeler (uye_adi, uye_soyadi, uye_adres, uye_il_ilce, uye_postakodu, uye_telefon, uye_mail, uye_sifre, uye_onay,uye_pf)
    VALUES ('".$ad."','".$soyad."','".$adres."','".$ililce."','".$postakodu."','".$telefon."','".$eposta."','".$sifre."','".$onay."','".$pf."')");

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  require('kayitbasarili.php');

	}

?>