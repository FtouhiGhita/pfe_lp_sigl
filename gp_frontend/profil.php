<?php 
    session_start();
    if(!isset($_SESSION["idSession"])){
        header('Location:SeConnecter.php');
    }else{
        $idUser = $_SESSION["idSession"];
        $roleUser = $_SESSION["roleSession"];
    }                                   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Plan Pro</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    


                         <!--showwwwwwwwwwwww passwordddddd   -->

 <script>
       
            $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
        });
 </script> 
                <!--********************************** -->

                <script>
                    $(document).ready(function() {
            
            
                    var readURL = function(input) {
                    if (input.files && input.files[0]) {
                     var reader = new FileReader();
            
                    reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                     }
            
                    reader.readAsDataURL(input.files[0]);
                     }
                    }
            
            
                    $(".file-upload").on('change', function(){
                        readURL(this);
                    });
                    });
            
            </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo" style="height: 100px">
                    <a style="margin-left: 15px;" class="navbar-brand" href="accueil.php">
                        <h2 style="color: #222222;font-weight: 600;">Plan <span style="color: #ff6600;font-style: italic;font-weight: 400;">Pro</span></h2>
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="accueil.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>accueil</p>
                        </a>
                    </li>
                    <?php 
                        if ($roleUser=="admin") {

                    ?>
                    <li>
                        <a class="nav-link" href="./projet.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Projets</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./client.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Clients</p>
                        </a>
                    </li>                 
                    <li>
                        <a class="nav-link" href="./membre.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Membres</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./chefdeprojet.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Chef de projet</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php 
                        if ($roleUser=="membre") {
                    ?>
                    <li>
                        <a class="nav-link" href="./tache.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Taches</p>
                        </a>
                    </li>            
                    <li>
                        <a class="nav-link" href="./membre.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Membres</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php 
                        if ($roleUser=="chefDeProjet") {
                    ?>
                    <li>
                        <a class="nav-link" href="./projet.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Projets</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./tache.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Taches</p>
                        </a>
                    </li>               
                    <li>
                        <a class="nav-link" href="./membre.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Membres</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./equipe.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Equipes</p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Table List </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="nav navbar-nav mr-auto" style="padding-left:820px;">
                    
                    
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="username"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="profil.php">Parametre</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#" onclick="destructionSession()">Deconnexion</a>
                                </div>
                            </li>
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
            <!--                                End Navbar                                      -->
           
            <!--                                User Profil                                    -->
            <div class="col-sm-4" style="padding-left: 30px; padding-top: 30px;" ><!--left col-->
              

                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" width="150" height="150">
                    <h6>telecharger une photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div><br>
    
                   
              
              
              
              <ul class="list-group">
                <li class="list-group-item text-muted">Activités <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Taches</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Projets</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Equipes</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Factures</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Clients</strong></span> 78</li>
              </ul> 
                   
              
              
            </div><!--/col-3-->
        
    
            <div class="col-sm-7" style="padding-top: 30px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Parametre</a></li>
                    <li><a data-toggle="tab" href="#changepassword">Changer le mot de passe</a></li>
                    
                  </ul>
    
                  
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                      <form class="form" action="##" method="post" id="registrationForm">
                          <div class="form-group">
                              
                              <div class="col-xs-6">
                                  <label for="first_name"><h4>Nom</h4></label>
                                  <input type="text" class="form-control" name="nom" id="first_name" placeholder="nom" title="enter votre nom.">
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-xs-6">
                                <label for="last_name"><h4>Prenom</h4></label>
                                  <input type="text" class="form-control" name="prenom" id="last_name" placeholder="prenom " title="entrer votre prenom."><br><br>
                              </div>
                          </div>
                         
              
                          <div class="form-group">
                              
                              <div class="col-xs-6">
                                  <label for="phone"><h4>Telephone</h4></label>
                                  <input type="text" class="form-control" name="tel" id="phone" placeholder="enter numero telephone" title="entrer votre numero .">
                              </div>
                          </div>
              
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label for="mobile"><h4>Email</h4></label>
                                  <input type="text" class="form-control" name="email" id="mobile" placeholder="toi@gmail.com" title="enter votre email ."><br><br>
                              </div>
                          </div>
    
                          <div class="form-group">
                              <div class="col-xs-6">

                                 <label for="email"><h4>Adresse</h4></label>
                                  <input type="email" class="form-control" name="adresse" id="email" placeholder="votre adresse" title="enter votre adresse">
                              </div>
                          </div>
    
                         
                          <div class="form-group">
                            <div class="col-sm-6">
                                <label for="genre"><h4>Genre</h4></label>
                                <input list="genre" class="form-control" class="col-sm-12 col-form-label" >
                                    
                                    <datalist id="genre">
                                        <option value="Femme">
                                        <option value="Homme">
                                       
                                    </datalist>
                                
                             </div> 
                            </div>
                          
                         
                          <div class="form-group">
                               <div class="col-xs-12">
                                    <br>
                                      <button class="btn btn-outline-dark" type="button" style="background-color: #DED8D6;"><i class="glyphicon glyphicon-ok-sign"></i> Modifier</button>
                                </div>
                          </div>
                      </form>
                  
                  <hr>
                  
                 </div><!--/tab-pane-->
                 
                 
                 <div class="tab-pane" id="changepassword">
                        
                       
                      <hr>
                      <form class="form" action="#" method="post" id="registrationForm">
                          <div class="form-group">
                              
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4" style="padding-top: 20px;">
                                        
                                        <label>Actuel Mot de passe</label>
    
                                        <div class="form-group pass_show"> 
                                            <div class="form-group pass_show"> 
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" value="" class="form-control" placeholder=" actuel mot de passe"> 
                                                            <div class="input-group-addon">
                                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                             </div>
                                                  
                                              </div> 
                                           
                                        </div> 
                                    <label>Nouveau mot de passe</label>
                                    <div class="form-group pass_show"> 
                                        <div class="form-group pass_show"> 
                                            <div class="form-group pass_show"> 
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" value="" class="form-control" placeholder="Nouveau mot de passe"> 
                                                            <div class="input-group-addon">
                                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                            </div>
                                                    
                                                </div> 
                                           
                                            </div> 
                                          
                                           
                                        </div> 
                                    </div>
                                    <label>Confirmer mot de passe</label>
                                    <div class="form-group pass_show"> 
                                        <div class="form-group pass_show"> 
                                            <div class="form-group pass_show"> 
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" value="" class="form-control" placeholder="Confirmer mot de passe"> 
                                                            <div class="input-group-addon">
                                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                            </div>
                                                    
                                                </div> 
                                           
                                            </div> 
                                          
                                           
                                        </div> 
                                    </div>
                                          
    
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                 <br>
                                                   <button class="btn btn-secondary" style="background-color: #DED8D6;" type="button"><i class="glyphicon glyphicon-ok-sign"></i> Modifier</button>
                                             </div>
                                       </div>
                                        
                                    </div>  
                                </div>
                            </div>
    
    
                            
                          
                        
                      </form>
                  </div>
                   
                  </div><!--/tab-pane-->
              </div><!--/tab-content-->
    
            </div><!--/col-9-->
        </div><!--/row-->



            <!--                                     Footer                                -->
        <footer class="footer">
             <div class="container-fluid">
                 <nav>
                        
                    <p class="copyright text-center">
                        ©
                        <script>
                          document.write(new Date().getFullYear())
                        </script>
                        <a href="#">FtouhiGhita</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
        </footer>
            <!--                                END      Footer                                -->
        </div>
    </div>
    
 
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="assets/js/generale.js"></script>

</html>
