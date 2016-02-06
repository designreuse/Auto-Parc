<?php
require_once("class/main.php");
?>
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

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/xstyle.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Connect script -->



    </head>

    <body>

        <div class="wrapper">

            <form class="form-signin" method="post" id="login-form">       
                <center>
                    <center>
                        <h2>Auto-Parc</h2>
                    </center>
                    <br>
                    <img src="img/parking.png" height="230" width="240">
                    </center>
                <input type="text" class="form-control" name="login" placeholder="Login"  id="email"  />
                <input type="password" class="form-control" name="pass" placeholder="Mot de passe" id="password" />      

                <button class="btn btn-lg btn-primary btn-block"  id="login-submit" type="submit">Connecter</button>   

                <div id="msgbox" class="msgbox"></div>


            </form>
        </div>

        <script src="js/connect.js"></script>

        <?php
        require_once 'footer.php';
        ?>