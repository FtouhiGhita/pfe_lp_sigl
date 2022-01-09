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
    .authentifier
    {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 500px;
        height: 620px;
        padding: 0px 40px;
        margin-top: 60px;
        box-sizing: border-box;
        background: rgba(0,0,0,.5);
    }
   
    .authentifier h4 {
        margin: 0;
        padding: 0 0 20px;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
    }
    .authentifier p
    {
        margin: 0;
        padding: 0;
        font-weight: bold;
        color: #fff;
    }
    .authentifier input,
    .authentifier select
    {
        width: 100%;
        margin-bottom: 20px;
    }
    .authentifier input[type="text"],
    .authentifier input[type="password"],
    .authentifier select
    {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
    }
    .authentifier input[type="button"] {
        height: 30px;
        color: #fff;
        font-size: 15px;
        background: #FF6600;
        cursor: pointer;
        border-radius: 25px;
        border: none;
        outline: none;
        margin-top: 5%;
    }
    .authentifier a
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
        <li class="nav-item">
          <a class="nav-link" href="SeConnecter.php">Se connecter
            <span>|</span>
          </a>
        </li>
        <li class="nav-item dropdown active dropdown-slide">
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




    


    <div class="authentifier">
        <br>
        <br>
        <h4>S'authentifier</h4>
        <form>
            
           


            <div class="form-row">
              
              <div class="form-group col-md-6">
                <p for="inputNom">Nom</p>
                <input type="text" class="form-control" id="inputNom" placeholder="Nom">
              </div>
              <div class="form-group col-md-6">
                <p for="inputPrenom">Prenom</p>
                <input type="text" class="form-control" id="inputPrenom" placeholder="Prenom">
              </div>
            </div>
            <div class="form-row">
              
              <div class="form-group col-md-6">
                <p for="inputTelephone">Telephone</p>
                <input type="text" class="form-control" id="inputTelephone" placeholder="+212 620664469">
              </div>
              <div class="form-group col-md-6">
                <p for="inputPrenom">Genre</p>
                <select id="inputGenre">
                    <option value="HOMME">Homme</option>
                    <option value="FEMME">Femme</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                <p for="inputEmail">Email</p>
                <input type="text" class="form-control" id="inputEmail" placeholder="votre Email">
              </div>
              
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <p for="inputPassword">mot de passe</p>
                <input type="password" class="form-control" id="inputPassword" placeholder="mot de passe">
              </div>
              <div class="form-group col-md-6">
                <p for="inputPassword">Confirmation mot de passe</p>
                <input type="password" class="form-control" id="inputConfirmePassword" placeholder="mot de passe">
              </div>
              
            </div>
            
            <input id="btnSignIn" type="button" name="" value="S'authentifier">
            
        </form>
    </div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/generale.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="assets/js/notification.js"></script>
<script src="assets/js/authentifier.js"></script>
</html>