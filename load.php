<?php 
session_name('K1Q');
session_start();
if(empty($_SESSION['l'])  ||  empty($_SESSION['SUCe']) || $_SESSION['SUCe']!="xx88xxc1r123yyI;;::!!1a"    )
{
	header('location:index.php');
}
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


    <link rel="stylesheet" href="css/xstyle.css">
   
</head>

<body style="background-color:#3c8dbc;">
<center>
    <img src="img/load.GIF" class="myload">
</center>
</body>
<script>
    setTimeout(function(){location.href="accueil.php"} , 2500);   
</script>
</html>
