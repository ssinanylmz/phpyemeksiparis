<?php
include("baglan.php"); 
$ad=$_POST["reg_Ad"];
$soyad=$_POST["reg_Soyad"];
$adres=$_POST["reg_Adres"];
$ililce=$_POST["reg_ililce"];
$postakodu=$_POST["reg_Postakodu"];
$eposta=$_POST["reg_Eposta"];
$telefon=$_POST["reg_Telefon"];
@session_start();
$uye_id=$_SESSION["uyeid"];

if($_SESSION["mail"]!=$eposta){
$sorgu=mysql_query("SELECT * FROM uyeler where uye_mail='$eposta' ");


$kayit=mysql_fetch_array($sorgu);



	
if($kayit) {

	
@session_start();
@$_SESSION['epostahata']="Hata!! E-Posta Adresi Kullanımda.";
	header("location: ".$_SERVER['HTTP_REFERER']."");
	}else{
		$sorgu1=mysql_query("UPDATE uyeler set uye_adi='$ad' ,uye_soyadi='$soyad', uye_adres='$adres', uye_il_ilce='$ililce', uye_postakodu='$postakodu', uye_telefon='$telefon', uye_mail='$eposta' Where uye_id='$uye_id'");

	$_SESSION['adi']=$ad;
	$_SESSION['soyadi']=$soyad;
	$_SESSION['ililce']=$ililce;
	$_SESSION['postakodu']=$postakodu;
	$_SESSION['telefon']=$telefon;
	$_SESSION['mail']=$eposta;
	$_SESSION['adres']=$adres;
		header("location: ".$_SERVER['HTTP_REFERER']."");
		}
	
	}
	
	else{

try {

$sorgu1=mysql_query("UPDATE uyeler set uye_adi='$ad' ,uye_soyadi='$soyad', uye_adres='$adres', uye_il_ilce='$ililce', uye_postakodu='$postakodu', uye_telefon='$telefon', uye_mail='$eposta' Where uye_id='$uye_id'");

	$_SESSION['adi']=$ad;
	$_SESSION['soyadi']=$soyad;
	$_SESSION['ililce']=$ililce;
	$_SESSION['postakodu']=$postakodu;
	$_SESSION['telefon']=$telefon;
	$_SESSION['mail']=$eposta;
	$_SESSION['adres']=$adres;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	header("location: ".$_SERVER['HTTP_REFERER']."");

	}

?>