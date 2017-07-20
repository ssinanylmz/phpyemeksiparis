<?php
include("baglan.php"); 

@session_start();
$uye_id=$_SESSION['uyeid'];
$new_name='uploads/'.rand(100,99999999999).$_SESSION['uyeid'].".jpg";
$target_dir = "uploads/";
$target_file = $target_dir . basename($new_name);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
      
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    require('profilfotodegistir.php');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
   require('profilfotodegistir.php');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    	 require('profilfotodegistir.php');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_name)) {
       
		 $sorgu1=mysql_query("UPDATE uyeler set uye_pf='$new_name' Where uye_id='$uye_id'");
		 $_SESSION["pf"]=$new_name;
		 require('uploadbasarili.php');
    } else {
  require('profilfotodegistir.php');
    }
}
?> 