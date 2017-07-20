<?php 
include("baglan.php");
if($_FILES["fileToUpload"]==""){
	@session_start();
$urun_id=$_SESSION["urun_id"];	
$urun_adi=$_POST["urun_adi"];
$urun_aciklama=$_POST["urun_aciklama"];
$urun_fiyat=$_POST["urun_fiyat"];
$urun_kategori_id=$_POST["urun_kategori"];
 
$sorgu1=mysql_query("UPDATE urunler set urun_adi='$urun_adi' ,urun_aciklama='$urun_aciklama', urun_fiyat='$urun_fiyat', urun_kategori_id='$urun_kategori_id' Where urun_id='$urun_id'");

	header("location:urunlistesi.php");
	}
	
	
	else {
		
	
	
	
	



@session_start();

	
$urun_id=$_SESSION["urun_id"];	
$urun_adi=$_POST["urun_adi"];
$urun_aciklama=$_POST["urun_aciklama"];
$urun_fiyat=$_POST["urun_fiyat"];
$urun_kategori_id=$_POST["urun_kategori"];


$uye_id=$_SESSION['uyeid'];
$new_name='images/'.rand(100,99999999999).$_SESSION['uyeid'].".jpg";
$target_dir = "images/";
$target_file = $target_dir . basename($new_name);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
      
	  	@session_start();
$urun_id=$_SESSION["urun_id"];	
$urun_adi=$_POST["urun_adi"];
$urun_aciklama=$_POST["urun_aciklama"];
$urun_fiyat=$_POST["urun_fiyat"];
$urun_kategori_id=$_POST["urun_kategori"];
 
$sorgu1=mysql_query("UPDATE urunler set urun_adi='$urun_adi' ,urun_aciklama='$urun_aciklama', urun_fiyat='$urun_fiyat', urun_kategori_id='$urun_kategori_id' Where urun_id='$urun_id'");

	header("location:urunlistesi.php");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    require('urunlistesi.php');
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 9999999999999999) {
header("location: ".$_SERVER['HTTP_REFERER']."");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
header("location: ".$_SERVER['HTTP_REFERER']."");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_name)) {
       
	$sorgu1=mysql_query("UPDATE urunler set urun_adi='$urun_adi' ,urun_aciklama='$urun_aciklama', urun_fiyat='$urun_fiyat', urun_kategori_id='$urun_kategori_id', urun_pic='$new_name' Where urun_id='$urun_id'");

		
		 require('urunlistesi.php');
    } else {
 header("location: ".$_SERVER['HTTP_REFERER']."");
    }
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
		}


?>