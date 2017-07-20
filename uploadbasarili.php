<?php
include("baglan.php");


 ?><?php 
@session_start();
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
   <?php @session_start(); if(@$_SESSION["onay"]==1){
				  ?>  <meta http-equiv="refresh" content="3; url=http://localhost/YemekSiparis/admin.php" /> <?php
				  }else{ ?>
  <meta http-equiv="refresh" content="3; url=http://localhost/YemekSiparis/index.php" />
  <?php } ?>
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
							<a class="logo" href="index.php"><img class="img-responsive" src="images/logo_mod-a.png" alt="Logo"></a>	<span class="header-basket sb-toggle-right"><i class="icon pe-7s-cart"></i><span class="header-basket__number"><?php @session_start(); echo  @$_SESSION["sepetsayac"];  ?></span></span>
						</div>
					</header>
					<!-- end header -->

					<div class="section-title">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<h1 class="ui-title-page">Güncelleme Basarılı</h1>
										<ol class="breadcrumb">
											<li><a href="index.php">Anasayfa</a></li>
											<li class="active">Güncelleme Başarılı</li>
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
						
						<!-- end row -->
					</div>
					<!-- end container -->

					
					<!-- end section_mod-b -->


					<section class="section-subscribe">
						<form class="form-subscribe" action="index.php">
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
									  <h2 class="ui-title-block ui-title-block_mod-a form-subscribe__title">Anasayfaya Yönlendiriliyorsunuz Lütfen Bekleyiniz....</h2>
									
										<button class="ui-btn ui-btn_mod-c btn-effect btn-effect">Beklemek İstemiyorsanız Tıklayın</button>
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
                <a href="profilim.php">
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
			<a class="link-account" href="profilim.php"><img width="25px" height="25px" src="images/user.png"/>  Profilim</a>
            <a class="link-account" href="siparislerim.php"><img width="25px" height="25px" src="images/cart.png"/> Son Siparişlerim</a>      
                    <a class="link-account" href="cikis.php"><img width="25px" height="25px" src="images/logout.png"/> Oturumu Kapat</a>
				   <?php } else { ?>
                 	
                    <a class="link-account" href="login.php">Giriş Yap</a>
				
				<a class="link-account" href="register.php">Kayıt Ol</a>
                
                       <?php } ?> <br>
                       <div class="border-bottom"></div>
                       <br>
				<nav class="main-nav">
					<ul class="navig-menu list-unstyled">
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="index.php"><img width="25px" height="25px" src="images/home.png"/> Anasayfa</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="pizzalar.php"><img width="25px" height="25px" src="images/pizza.png"/> Pizzalar</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="tatlilar.php"><img width="25px" height="25px" src="images/dessert.png"/> Tatlılar</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="drinks.php"><img width="25px" height="25px" src="images/drink.png"/> İçecekler</a>
						</li>
						
						</li>
					</ul>
				</nav>
				<!-- end main-nav -->

				
                
                       
			</div>
			<!-- end sb-left -->

					<div class="sb-slidebar sb-right">
				<section class="section-list-cart">
					<h2 class="ui-title-inner">Sepetim</h2>
					<ul class="list-cart list-unstyled">
                      <?php  $sorgu=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id'");
					  	
						 
while($kayit=mysql_fetch_array($sorgu)){ 
$yeniUrun_id=$kayit["gs_urun_id"];
$sorgu3=mysql_query("SELECT * FROM gecicisepet WHERE gs_uye_id='$uye_id' and gs_urun_id='$yeniUrun_id'");
$kayit3=mysql_fetch_array($sorgu3);	
$sorgu1=mysql_query("SELECT * FROM urunler WHERE urun_id='$yeniUrun_id'");
$kayit1=mysql_fetch_array($sorgu1);			  	
							 

?>
                    
						<li class="list-cart__item">
							<div class="list-cart__img"><a href="sepeturunsil.php?urun_id=<?php echo $kayit1["urun_id"]; ?>&uye_id=<?php echo $uye_id; ?>"><i class="list-cart__icon icon fa fa-times js-del"></i></a><img class="img-responsive" src="images/1-2.png" height="87" width="87" alt="Foto"></div>
							<div class="list-cart__inner">
								<h3 class="list-cart__title"><?php echo $kayit1["urun_adi"]; ?></h3>
								<div class="list-cart__size"><span class="list-cart__size_name">Ürün Kodu:</span> <?php echo $kayit1["urun_id"]; ?></div>
								<div class="list-cart__price"><span class="color_primary"><?php echo $kayit3["adet"]; ?> x</span> <?php echo $kayit1["urun_fiyat"]*$kayit3["adet"]; ?>₺</div>
							</div>
						</li>
                        <?php @$toplam=$toplam+$kayit1["urun_fiyat"]*$kayit3["adet"];
						} ?>
						
					</ul>
					<div class="total-price clearfix">Toplam Tutar:
						<span class="total-price__number"><?php echo @$toplam; ?> ₺</span>
					</div>
					<a class="total-price__btn ui-btn ui-btn_mod-a btn-effect btn-block" href="sepetitemizle.php">Sepeti Temizle</a>
						<a class="total-price__btn ui-btn ui-btn-primary btn-effect btn-block" href="siparisitamamla.php">Siparişi Tamamla</a>
				</section>
				<!-- end list-cart -->
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


