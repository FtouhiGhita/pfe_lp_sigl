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
    <!-- CSS Just for demo purpose, don't include it in your project -->



    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
       
        td { font-size: 12px;
         }
         td.titre{font-size: 14px;}
        
        table td:nth-child(1){
            color:  #ff6600;;
            
            font-weight:bold;
        }
        
        table.table td a.edit {
        color: #ff6600;
        
        }
        table.table td a.delete {
        color: #ff6600;
        }
        .search{
            background-color: red;
        }
       
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();
            })
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
                    <li>
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
                    <li  class="nav-item active">
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
                            header('Location:accueil.php');
                        }
                    ?>
                    <?php 
                        if ($roleUser=="chefDeProjet") {
                            header('Location:accueil.php');
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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <div class="col-sm-9">
                                        <a  href="#ajouterChef" data-toggle="modal"><button class="btn btn-outline-secondary" style=" border: 2px solid #ff6600;"><i class="fa fa-plus"></i> Ajouter un chef de projet</button></a>
                                             
                                    </div>
                                    <!--<div class="col-xs-3 ">
                                        <div class="input-group">
                                            <input type="text" class="form-control" class="search" name="x" placeholder="Search term...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" class="search"><span class="glyphicon glyphicon-search"></span></button>
                                            </span>
                                        </div>
                                    </div>-->
                                
                                   
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped  table-bordered">
                                        <thead >
                                            <th style="font-weight: bold; color: #ff6600;">Nom</th>
                                            <th style="font-weight: bold; color: #ff6600;">Prenom</th>
                                            <th style="font-weight: bold; color: #ff6600;" >Telephone</th>
                                            <th style="font-weight: bold; color: #ff6600;">Email</th>
                                            <th style="font-weight: bold; color: #ff6600;">genre</th>
                                            <th style="font-weight: bold; color: #ff6600;">ACTION</th>
                                        </thead>
                                        <tbody id="tblBody">
                                            <tr>
                                                <td>Ghita </td>
                                                <td>Ftouhi</td>
                                                <td>projet de CHU</td>
                                                <td>+212 684484438</td>
                                                <td>ghitaftouhi1@gmail.com</td>
                                                <td>femme</td>
                                                
                                                
                                                
                                                <td>
                                                    <a href="#modifierChef" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                    <a href="#suppChef" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                            
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Delete Modal php -->
            <div id="suppChef" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">						
                                <h4 class="modal-title">Supprimer Chef de projet</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <p>Voulez-vous vraiment supprimer ce Chef?</p>
                                <p class="text-danger"><small>Cette action ne peut pas être annulée.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <input type="button" id="btnDeleteChef" class="btn btn-outline-danger" value="Supprimer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Editt client-->
            <div id="modifierChef" class="modal fade " >
                <div class="modal-dialog  " >
                    <div class="modal-content ">
                        <form class="formajouter">
                            <div class="modal-header">						
                                <h4 class="modal-title"><b>Modifier Les informations de chef de projet</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group row" >
                                    <label for="inputnommembre" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputnomchef" placeholder="nom de membre" required > 
                                    </div>
                                    
                                </div>
                                <div class="form-group row" >
                                    
                                    <label for="inputprenomchef" class="col-sm-3 col-form-label"> Prénom </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputprenomchef" placeholder="prenom de membre" required >
                                        
                                    </div>  
                                </div>
                                <div class="form-group row" >
                                    <label for="inputtelephone" class="col-sm-3 col-form-label"> Télephone </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputtelephone" placeholder="numero de telephone de membre" required > 
                                    </div>  
                                </div>
                                <div class="form-group row" >
                                    <label for="inputemailchef" class="col-sm-3 col-form-label"> Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputemail" placeholder="like username@gmail.com" required > 
                                    </div>  
                                </div>

                                

                                <div class="form-group row" >
                                    <label for="genrechef" class="col-sm-3 col-form-label">Genre </label>
                                    <div class="col-sm-9">
                                        <input id="inputgenre" list="genremembre" class="form-control" class="col-sm-12 col-form-label" >
                                            <datalist id="genrechef">
                                                <option value="homme">
                                                <option value="femme">
                                            </datalist>
                                            
                                    </div>  
                                </div>
                               			
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <input type="button" id="btnUpdateChef" class="btn btn-default" value="Modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Client -->
            <div id="ajouterChef" class="modal fade " >
                <div class="modal-dialog  " >
                    <div class="modal-content ">
                        <form class="formajouter">
                            <div class="modal-header">						
                                <h4 class="modal-title"><b>Ajouter un nouveau chef de projet</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group row" >
                                    <label for="inputnomchef" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputnomchefa" placeholder="nom de chef" required > 
                                    </div>
                                    
                                </div>
                                <div class="form-group row" >
                                    
                                    <label for="inputprenomchef" class="col-sm-3 col-form-label"> Prénom </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputprenomchefa" placeholder="prenom de chef" required >
                                        
                                    </div>  
                                </div>
                                <div class="form-group row" >
                                    <label for="inputtelephone" class="col-sm-3 col-form-label"> Télephone </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputtelephonea" placeholder="numero de telephone de chef" required > 
                                    </div>  
                                </div>
                                <div class="form-group row" >
                                    <label for="inputemail" class="col-sm-3 col-form-label"> Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"id="inputemaila" placeholder="like username@gmail.com" required > 
                                    </div>  
                                </div>

                                <div class="form-group row" >
                                    <label for="genremembre" class="col-sm-3 col-form-label">Genre </label>
                                    <div class="col-sm-9">
                                        <input id="inputgenrea" list="genremembre" class="form-control" class="col-sm-12 col-form-label" >
                                            <datalist id="genremembre">
                                                <option value="homme">
                                                <option value="femme">
                                            </datalist>
                                            
                                    </div>  
                                </div>
                                <div class="form-group row" >
                                    <label for="inputpass" class="col-sm-3 col-form-label"> Mot de passe </label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputpassa" placeholder="Votre mot de passe" required > 
                                    </div>  
                                </div>
                               			
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <input type="button" id="btnAddChef" class="btn btn-default" value="Ajouter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
                        
            
            
            <footer class="footer">
                <div class="container-fluid">
                    
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">FtouhiGhita</a>, made with love :)
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    <!--   -->
    
</body>
     <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/bootstrap-switch.js"></script>
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
    <script src="assets/js/generale.js"></script>
    <script src="assets/js/notification.js"></script>
    <script src="assets/js/chefdeprojet.js"></script>
</html>