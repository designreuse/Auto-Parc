<?php
require_once 'class/main.php';
$log = $_POST["login"];
$pass = $_POST["pass"];

if ($user->login($log, $pass)) {
   session_name('K1Q');
    session_start() ; 
    $_SESSION['l'] = $log;
    $_SESSION['SUCe']= "xx88xxc1r123yyI;;::!!1a" ; 
 
    echo 1 ;
} else {
    echo 0 ;
}




?>