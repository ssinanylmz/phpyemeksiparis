<?php
include("baglan.php");


 ?>
<?php 
@session_start();
if($_SESSION["uyeid"] && $_SESSION['onay']==1){
if(@$_SESSION['uyeid']){
	
	$uye_id=@$_SESSION['uyeid'];
	
	
	}
	else{
		
		
		$uye_id=rand(10000,1000000000);
		
		@$_SESSION['uyeid']=$uye_id;
		
		}
		
		if(@$_GET['urun_id']){
			
$urun_id=$_GET['urun_id'];
$adet=1;

	$sorgu=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$urun_id'");
if($kayit=mysql_fetch_array($sorgu)){
	$adet=$kayit["adet"]+1;
	 $sorgu1=mysql_query("UPDATE gecicisepet set adet='$adet' Where gs_uye_id='$uye_id' and gs_urun_id='$urun_id'");
	 header("location: ".$_SERVER['HTTP_REFERER']."");
}else{
  $sql = mysql_query("INSERT INTO gecicisepet (gs_urun_id, gs_uye_id,adet)
    VALUES ('".$urun_id."','".$uye_id."','".$adet."')");
header("location: ".$_SERVER['HTTP_REFERER']."");

		} }
  $sorgu=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id'");
					  	
				 @$_SESSION["sepetsayac"]=0;			 
while($kayit=mysql_fetch_array($sorgu)){ 
$yeniUrun_id=$kayit["gs_urun_id"];
$sorgu3=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$yeniUrun_id'");
$kayit3=mysql_fetch_array($sorgu3);	
$sorgu1=mysql_query("SELECT * FROM urunler WHERE urun_id='$yeniUrun_id'");
$kayit1=mysql_fetch_array($sorgu1);			  	
							 
 @$_SESSION["sepetsayac"]+=$kayit3["adet"];
}

?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from html.templines.com/margherita/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 15:47:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>Margherita, Online Sipariş</title>

	<link href="images/favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="images/master.css" rel="stylesheet">
		<script src="images/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->


		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="200">

			<div id="sb-site">

				<div class="wrap-content">


					<!-- HEADER -->
					<header class="header clearfix">
						<div class="header__wrap">
							<span class="sb-toggle-left"><i class="icon pe-7s-menu"></i></span>
							<a class="logo" href="#"><img class="img-responsive" src="images/logo_mod-a.png" alt="Logo"></a>
							<span class="header-basket sb-toggle-right"><i class="icon pe-7s-cart"></i><span class="header-basket__number">0</span></span>
						</div>
					</header>
					<!-- end header -->

					<div class="section-title">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<h1 class="ui-title-page">Şifre Güncelleme</h1>
										<ol class="breadcrumb">
											<li><a href="admin.php">Anasayfa</a></li>
                                            	<li><a href="adminprofili.php">Profilim</a></li>
											<li class="active">Şifre Güncelleme</li>
										</ol>
									</div>
									<!-- end section__inner -->
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</div>
					<!-- end section-title -->


					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="checkout-top-line">Şifrenizi aşağıda bulunan formdan güncelleyebilirsiniz. </a></div>
							</div>
							<!-- end col -->

							<div class="col-md-4">
								<div class="checkout-top-line">Profil Sayfasına Dönmek için <a class="checkout-top-line__link" href="adminprofili.php">Tıklayın..</a></div>
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->
					</div>
					<!-- end container -->

					<div class="section_mod-f">
						<div class="container">
                        
							<div class="row">
                         
								<div class="col-md-8">
                                   <div class="section-bg_mod-c"><?php @session_start(); echo @$_SESSION['sifrehata']; @$_SESSION['sifrehata']=""; ?> </div>	
									<form method="post" action="sifredegistamamla.php" class="form-details">
										<section class="section-area">
										
											
											<div class="row">
                                            <label class="ui-form-label" >ESKİ ŞİFRE *</label>
												<input name="reg_ESifre" type="password" class="form-control" type="text" required>
												<label class="ui-form-label" >YENİ ŞİFRE *</label>
												<input id="reg_Sifre" name="reg_Sifre" type="password" class="form-control" type="text" required>
                                            <label class="ui-form-label">YENİ ŞİFRE TEKRAR *</label>
												<input id="reg_SifreTekrar" name="reg_SifreTekrar" type="password" class="form-control" type="text"  required>
                                                 
												 <script>		
	var reg_Sifre = document.getElementById("reg_Sifre")
  , reg_SifreTekrar = document.getElementById("reg_SifreTekrar");

function validatePassword(){
  if(reg_Sifre.value != reg_SifreTekrar.value) {
    reg_SifreTekrar.setCustomValidity("Passwords Don't Match");
  } else {
    reg_SifreTekrar.setCustomValidity('');
  }
}

reg_Sifre.onchange = validatePassword;
reg_SifreTekrar.onkeyup = validatePassword;</script>

                                                    <button style="width:100%" type="submit" name="GirisYap" class="form-payment__btn ui-btn ui-btn-primary btn-effect" id="GirisYap">ŞİFREMİ GÜNCELLE</button>
                                                 
											</div>
											

											
									</form>
								</div>
								<!-- end col -->

								<div class="col-md-4">
									<div class="section-table-order section-table-order_mod-a">
										<section class="section-area">
											
									
										<!-- end section-area -->
<section class="section_mod-g">
											<h2 class="table-order__title ui-title-inner">Panel Kısayolları</h2>
											
													<form class="form-payment" action="admin.php">
												<a class="form-payment__btn ui-btn ui-btn-primary btn-effect" href="admin.php">SİPARİŞLER</a>
                                                
											</form>
                                            	<form class="form-payment" action="uyeler.php">
												<a class="form-payment__btn ui-btn ui-btn-primary btn-effect" href="uyeler.php">ÜYELER</a>
                                                
											</form>
                                            <form class="form-payment" action="urunekle.php">
												<a class="form-payment__btn ui-btn ui-btn-primary btn-effect" href="urunekle.php">ÜRÜN EKLEME</a>
                                                
											</form>
                                                 <form class="form-payment" action="urunekle.php">
												<a class="form-payment__btn ui-btn ui-btn-primary btn-effect" href="urunlistesi.php">ÜRÜN LİSTESİ</a>
                                                
											</form>
                                               <form class="form-payment" action="adminlist.php">
												<a class="form-payment__btn ui-btn ui-btn-primary btn-effect" href="adminlist.php">YÖNETİCİ LİSTESİ</a>
                                                
											</form>








										</section>


									</div>
									<!-- end section-table-order -->
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</div>
					<!-- end section_mod-b -->


					<section class="section-subscribe">
						<form class="form-subscribe" action="#">
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
									  <h2 class="ui-title-block ui-title-block_mod-a form-subscribe__title">Bizi takip edin; Fırsatları kaçırmayın...</h2>
										<input class="form-control" type="text" placeholder="Email adresinizi girin..." required>
										<button class="ui-btn ui-btn_mod-c btn-effect btn-effect">Abone ol</button>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
							</div>
							<!-- end container -->
						</form>
						<!-- end footer-form -->
					</section>
					<!-- end section-subscribe -->


					<footer class="footer">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="footer-contacts"><span class="footer-contacts__number">+90 554 54 54 854</span>margherita@pizza.ktu.edu.tr</div>
									<div class="footer-decor decor-2">&</div>
									<ul class="footer-list list-inline">
										<li class="footer-list__item"><a class="footer-list__link" href="javascript:void(0);">Facebook</a></li>
										<li class="footer-list__item"><a class="footer-list__link" href="javascript:void(0);">Twitter</a></li>
										<li class="footer-list__item"><a class="footer-list__link" href="javascript:void(0);">Instagram</a></li>
										<li class="footer-list__item"><a class="footer-list__link" href="javascript:void(0);">Pinterest</a></li>
										<li class="footer-list__item"><a class="footer-list__link" href="javascript:void(0);">Flickr</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="copyright border-top">
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<div class="text-center">Copyright © 2015 <a class="copyright__link" href="javascript:void(0);">Margherita.</a> All rights reserved.</div>
									</div>
								</div>
							</div>
						</div><!-- end copyright -->
					</footer>
					<!-- end footer -->

				</div>
				<!-- end wrap-content -->

			</div>
			<!-- end #sb-site -->

<div class="sb-slidebar sb-left">
				<form method="get" action="arama.php" class="form-search" id="search-global-form">
					<input name="Arama" class="form-search__input" type="text" placeholder="Arama">
					<button class="form-search__btn"><i class="icon fa fa-search"></i></button>
				</form>
                <?php @session_start(); if(@$_SESSION['giriskontrol']==1){ ?>
               
                <center>
                <a href="adminprofili.php">
                <div class="profile-header-container">   
    		<div class="profile-header-img">
                 <?php @session_start(); if(@$_SESSION['pf']==""){ ?>
                <img class="img-circle" src="images/profilepic.png" />
            <?php }else{?>
             <img width="50" height="50"  class="img-circle" src="<?php echo $_SESSION["pf"]; ?>" />
               <?php }?>
                <!-- badge -->
                <div class="rank-label-container">
                
                    <span class="label label-default rank-label"><?php @session_start(); echo @$_SESSION['adi']." ".@$_SESSION['soyadi'];  ?></span>
                </div>
            </div>
        </div> 
</a>
        </center>
        	<a class="link-account" href="adminprofili.php"><img width="25px" height="25px" src="images/user.png"/> Profilim</a>
			<a class="link-account" href="admin.php"><img width="25px" height="25px" src="images/cart.png"/>  Siparişler</a>
            <a class="link-account" href="uyeler.php"><img width="25px" height="25px" src="images/Limited_users.png"/> Üyeler</a>     
            <a class="link-account" href="urunekle.php"><img width="25px" height="25px" src="images/add-512.png"/> Ürün Ekleme</a>  
               <a class="link-account" href="urunlistesi.php"><img width="25px" height="25px" src="images/pizza.png"/> Ürün Listesi</a>  
                     <a class="link-account" href="adminlist.php"><img width="25px" height="25px" src="images/toggle.png"/> Yönetici Listesi</a>  
                    <a class="link-account" href="cikis.php"><img width="25px" height="25px" src="images/logout.png"/> Oturumu Kapat</a>
				   <?php } else { ?>
                 	
                    <a class="link-account" href="login.php">Giriş Yap</a>
				
				<a class="link-account" href="register.php">Kayıt Ol</a>
                
                       <?php } ?> <br>
                       <div class="border-bottom"></div>
                       <br>
				
				<!-- end main-nav -->

				
                
                       
			</div>
            
      		
			<!-- end sb-right -->

		</div>
		<!-- end layout-theme -->



		<!-- SCRIPTS MAIN -->

		<script src="images/jquery-migrate-1.2.1.js"></script>
		<script src="images/bootstrap.min.js"></script>
		<script src="images/waypoints.min.js"></script>
		<script src="../cdnjs.cloudflare.com/images/jquery.easing.min.js"></script>
		<script src="images/modernizr.custom.js"></script>
		<script src="images/cssua.min.js"></script>


		<!--SCRIPTS THEME-->

		<!-- Sidebar -->
		<script src="images/slidebars.js"></script>
		<!-- Home slider -->
		<script src="images/jquery.sliderpro.js"></script>
		<!-- Sliders -->
		<script src="images/owl.carousel.min.js"></script>
		<!-- Isotope -->
		<script src="images/isotope.pkgd.min.js"></script>
		<!-- Modal -->
		<script src="images/jquery.prettyphoto.js"></script>
		<!-- Date select -->
		<script src="images/jquery.datetimepicker.js"></script>
		<!-- Select customization -->
		<script src="images/bootstrap-select.js"></script>
		<!-- Price slider -->
		<script src="images/jquery.nouislider.all.min.js"></script>
		<!-- Chart -->
		<script src="images/jquery.easypiechart.min.js"></script>
		<!-- Animation -->
		<script src="images/wow.min.js"></script>

		<!-- Custom -->
		<script src="images/custom.js"></script>

	</body>

<!-- Mirrored from html.templines.com/margherita/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 15:47:56 GMT -->
</html>

<?php } else { header("location:index.php");} ?>
