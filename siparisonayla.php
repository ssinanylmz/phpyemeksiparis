<?php
include("baglan.php"); 
@session_start();
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$adres=$_POST["adres"];
$ililce=$_POST["ililce"];
$postakodu=$_POST["postakodu"];
$eposta=$_POST["eposta"];
$telefon=$_POST["telefon"];
$uye_id=$_SESSION["uyeid"];
$fiyat=$_SESSION["sepetfiyat"];
$tarih=date('d.m.Y H:i:s');

	 $sorgu=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id'");
			

$sepet="";
while($kayit=mysql_fetch_array($sorgu)){ 
$yeniUrun_id=$kayit["gs_urun_id"];
$sorgu3=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$yeniUrun_id'");
$kayit3=mysql_fetch_array($sorgu3);	
$sorgu1=mysql_query("SELECT * FROM urunler WHERE urun_id='$yeniUrun_id'");
$kayit1=mysql_fetch_array($sorgu1);		

$sepet=$sepet." ".$kayit1["urun_adi"]." ".$kayit3["adet"]."x,";


}

	


try {
	if($_SESSION["uyeid"]){$uye_id=$_SESSION["uyeid"];}else{$uye_id=0;}
    $sql = mysql_query("INSERT INTO siparisler (siparis_sepeti, siparis_musteri_adi, siparis_musteri_soyadi, siparis_musteri_adres, siparis_musteri_ililce, siparis_musteri_postakodu,  	siparis_musteri_eposta, siparis_musteri_telefon, siparis_fiyat, siparis_uye_id, siparis_tarihi)
    VALUES ('".$sepet."','".$ad."','".$soyad."','".$adres."','".$ililce."','".$postakodu."','".$eposta."','".$telefon."','".$fiyat."','".$uye_id."','".$tarih."')");
	
	$uye_id=$_SESSION["uyeid"];
	
$sorgu3=mysql_query("delete FROM gecicisepet WHERE gs_uye_id='$uye_id'");
	
	
	header('location:siparisbasarili.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  

	

?>