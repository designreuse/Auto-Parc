<?php
session_name('K1Q');
session_start();
if(empty($_SESSION['l'])  ||  empty($_SESSION['SUCe']) || $_SESSION['SUCe']!="xx88xxc1r123yyI;;::!!1a"    )
{
	header('location:./');
}
require_once("class/main.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Auto-Parc</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/fakeLoader.css">
    <script src="js/fakeLoader.min.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="accueil.php">Auto-Parc</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Paramétre <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="changer_pass.php"><i class="fa fa-fw fa-key"></i> Mot de passe</a>
                        </li>
                       
                        <li>
                            <a href="class/logout.php"><i class="fa fa-fw fa-power-off"></i> Déxonnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                     <li><a href="accueil.php"><i class="fa fa-fw fa-home"></i> Accueil</a></li>
                    <li><a href="liste_sortie.php"><i class="fa fa-fw fa-road"></i> Gérer Sortie</a></li>
                    <li><a href="liste_vehicule.php"><i class="fa fa-fw fa-truck"></i> Gérer vehicule</a></li>
                    <li><a href="liste_chauffeur.php"><i class="fa fa-fw fa-users"></i> Gérer chauffeur</a></li>
                    <li><a href="liste_panne.php"><i class="fa fa-fw fa-ban"></i> Gérer Panne</a></li>
                    <li><a href="class/logout.php"> <i class="fa fa-fw fa-sign-out"></i> Déconnexion</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
              