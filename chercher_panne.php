<?php



require_once 'class/main.php';

$type = $_POST['type'] ; 
$etat = $_POST['etat'] ;

$panne->chercher_panne($type,$etat);
