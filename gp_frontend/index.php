<?php 
    session_start();
    if(isset($_SESSION["idSession"])){
        header('Location:accueil.php');
    }                                 
?>
<!DOCTYPE html>
<html lang="en">


<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Plan Pro</title>
  
  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="assets/plugins/slick/slick.css" rel="stylesheet">
  <link href="assets/plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- FAVICON --><link rel="icon" type="image/png" href="assets/img/favicon.ico">

</head>

<body class="body-wrapper">


<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="index.php">
        <h2>Plan <span class="alternate">Pro</span></h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown active dropdown-slide">
          <a class="nav-link" href="index.php"  data-toggle="dropdown">Accueil
            <span>|</span>
          </a>
          <!-- Dropdown list -->
         
        </li>
        <li class="nav-item">
          <a class="nav-link" href="SeConnecter.php">Se connecter
            <span>|</span>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="authentifier.php" >s'authentifier<span>|</span></a>
            
        </li>
        
       
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contactez-nous</a>
        </li>
      </ul>
      
      </div>
  </div>
</nav>

<!--====  End of Navigation Section  ====-->



<!--============================
=            Banner            =
=============================-->

<section class="banner-two bg-banner-two overlay-white-slant text-overlay">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<!-- Content Block -->
				<div class="block">
					<h3>Créer Une</h3>
					<h1>Harmonie</h1>
					
					<h3>de Travail</h3>
					<br></br>
					
					<!-- Action Button -->
					<a href="SeConnecter.php" class="btn btn-main-md">Se connecter</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Banner  ====-->

<!--===========================
=            About            =
============================-->

<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" src="assets/images/speakers/featured-speaker.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-8 col-md-6 align-self-center">
				<div class="content-block">
					<h2>à propos de  <span class="alternate">nous</span></h2>
					<div class="description-one">
						<p>
							Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500,
						</p>
					</div>
					<div class="description-two">
						<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500,.</p>
					</div>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="contact.php" class="btn btn-main-md">Contactez-nous</a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-transparent-md">Pour plus d'information Contacter-nous</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


<!--====  End of About  ====-->



<!--==============================
=            Schedule            =
===============================-->


<!--====  End of Schedule  ====-->

<!--=============================
=            Feature            =
==============================-->

<section class="ticket-feature">
	<div class="container-fluid m-0 p-0">
		<div class="row p-0 m-0">
			<div class="col-lg-12 p-0 m-0">
				<div class="block bg-timer overlay-dark text-center">
					<div class="section-title white m-0">
						<h3>Lorem ipsum <span class="alternate">Lorem </span></h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm</p>
					</div>
					<!-- Coundown Timer -->
					<div class="timer"></div>
					<a href="contact.php" class="btn btn-main-md">Contactez-nous</a>
				</div>
			</div>
			
	</div>
</section>

<!--====  End of Feature  ====-->


<!--==========================
=            News            =
===========================-->



<!--====  End of Gallery  ====-->

<!--===================================
=            Pricing Table            =
====================================-->

<section class="section pricing two">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>notre <span class="alternate">Service</span></h3>
					<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<!-- Pricing Item -->
				<div class="pricing-item">
					<div class="pricing-heading text-center">
						<!-- Title -->
						<div class="title">
							<h6>Gerer les projet</h6>
						</div>
						<!-- Price -->
						
					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0">
							<li><p><span class="fa fa-check-circle available"></span>Ajouter nouveau projet</p></li>
							<li><p><span class="fa fa-check-circle available"></span>Supprimer un projet</p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
						</ul>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<!-- Pricing Item -->
				<div class="pricing-item">
					<div class="pricing-heading text-center">
						<!-- Title -->
						<div class="title">
							<h6>Gerer les taches</h6>
						</div>
						<!-- Price -->
						
					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0">
							<li><p><span class="fa fa-check-circle available"></span>Ajouter nouveau projet</p></li>
							<li><p><span class="fa fa-check-circle available"></span>Supprimer un projet</p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
						</ul>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 m-auto">
				<!-- Pricing Item -->
				<div class="pricing-item">
					<div class="pricing-heading text-center">
						<!-- Title -->
						<div class="title">
							<h6>Gerer les Client</h6>
						</div>
						<!-- Price -->
						
					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0">
							<li><p><span class="fa fa-check-circle available"></span>Ajouter nouveau projet</p></li>
							<li><p><span class="fa fa-check-circle available"></span>Supprimer un projet</p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
							<li><p><span class="fa fa-times-circle available"></span>Le Lorem Ipsum est simplement </p></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Pricing Table  ====-->



<!--============================
=            Footer            =
=============================-->

<footer class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <div class="footer-logo">
				<h2>  <span class="alternate">PlanPro</span></h2>
            </div>
            <ul class="social-links-footer list-inline">
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-instagram"></i></a>
              </li>
           
            </ul>
          </div>
          
        </div>
      </div>
    </div>
</footer>
<!-- Subfooter -->
<footer class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="copyright-text">
          <p><a href="#">PlanPro</a> &#169; 2020 </p>
        </div>
      </div>
      <div class="col-md-6">
          <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
  </div>
</footer>


  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="assets/plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="assets/plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="assets/plugins/smoothscroll/SmoothScroll.min.js"></script>  
  <!-- Isotope -->
  <script src="assets/plugins/isotope/mixitup.min.js"></script>  
  <!-- Magnific Popup -->
  <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="assets/plugins/slick/slick.min.js"></script>  
  <!-- SyoTimer -->
  <script src="assets/plugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="assets/plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="assets/js/custom.js"></script>
</body>



</html>