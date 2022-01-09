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
        <li class="nav-item">
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
        <li class="nav-item">
          <a class="nav-link" href="authentifier.php" >s'authentifier<span>|</span></a>
            
        </li>
        
       
        <li class="nav-item active">
          <a class="nav-link" href="contact.php">Contactez-nous</a>
        </li>
      </ul>
      
      </div>
  </div>
</nav>

<!--====  End of Navigation Section  ====-->



<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>contactez-nous</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.php">accueil</a></li>
				  <li class="breadcrumb-item active">contactez-nous</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<section class="section contact-form">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Pour plus <span class="alternate">D'infos</span></h3>
					<p>si vous avez des questions n'hésitez pas de nous contacter !!</p>
				</div>
			</div>
		</div>
		<form action="#" class="row">
			<div class="col-md-6">
				<input type="text" class="form-control main" name="name" id="name" placeholder="nom">
			</div>
			<div class="col-md-6">
				<input type="email" class="form-control main" name="email" id="email" placeholder="Email">
			</div>
			<div class="col-md-12">
				<input type="text" class="form-control main" name="phone" id="phone" placeholder="Telephone">
			</div>
			<div class="col-md-12">
				<textarea name="message" id="message" class="form-control main" rows="10" placeholder="votre Message"></textarea>
			</div>
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-main-md">Envoyer</button>
			</div>
		</form>
	</div>
</section>

<!--================================
=            Google Map            =
=================================-->



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
<!-- Subfooter -->



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