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
  <style>
    body{
        margin: 0;
        padding: 0;
    }
    body:before{
        content: '';
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-image: url("assets/images/4.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        -webkit-filter: blur(10px);
        -moz-filter: blur(10px);
        -o-filter: blur(10px);
        -ms-filter: blur(10px);
        filter: blur(10px);
    }
    .Se-Connecter
    {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 400px;
        height: 500px;
        padding: 80px 40px;
        box-sizing: border-box;
        background: rgba(0,0,0,.5);
    }
    .avatar {
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        top: calc(-80px/2);
        left: calc(50% - 40px);
    }
    .Se-Connecter h4 {
        margin: 0;
        padding: 0 0 20px;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
    }
    .Se-Connecter p
    {
        margin: 0;
        padding: 0;
        font-weight: bold;
        color: #fff;
    }
    .Se-Connecter input
    {
        width: 100%;
        margin-bottom: 20px;
    }
    .Se-Connecter input[type="text"],
    .Se-Connecter input[type="password"]
    {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
    }
    .Se-Connecter input[type="button"] {
        height: 30px;
        color: #fff;
        font-size: 15px;
        background: #FF6600;
        cursor: pointer;
        border-radius: 25px;
        border: none;
        outline: none;
        margin-top: 15%;
    }
    .Se-Connecter a
    {
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
    }
    input[type="checkbox"] {
        width: 20%;
    }
</style>

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
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="index.php"  data-toggle="dropdown">Accueil
            <span>|</span>
          </a>
          <!-- Dropdown list -->
         
        </li>
        <li class="nav-item active">
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




    


    <div class="Se-Connecter" style="padding-top: 90px;">
       <br>
       <br>
        <h4>Se-Connecter</h4>
        <form>
            <p>Email</p>
            <input id="email" type="text" name="" placeholder="Entrer votre email">
            <p>Password</p>
            <input id="password" type="password" name="" placeholder="Entrer votre mot de passe">
            <input id="btnLogin" type="button" name="" value="Connexion">
            <span>informations de compte oubliées ?</span>

            
        </form>
    </div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/generale.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="assets/js/notification.js"></script>
<script src="assets/js/SeConnecter.js"></script>
</html>