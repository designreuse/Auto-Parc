<?php 
require_once('class/main.php');
$id_v = $_GET['id'];

$vh->supprimer_vehicule($id_v);
$link="liste_vehicule.php?message=delete";
$user->location($link);

?>