<?php 


 require_once("DataBase.php");
 require_once("user.php");
 require_once("ctrl.php");
 require_once("vehicule.php");
 require_once("chauffeur.php");
 require_once("sortie.php");
 require_once("panne.php");
 require_once("mail.php");
 require_once("crypt.php");

 
  $user = new user();
  $controle = new ctrl();
  $db= new Database(); 
  $vh= new vehicule();
  $ch= new chauffeur();
  $sortie = new sortie();
  $panne = new panne();
  $mail = new mail();
  $crypt = new Crypt();


?>