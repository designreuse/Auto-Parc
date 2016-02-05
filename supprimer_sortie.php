<?php 
require_once('class/main.php');
$id = $_GET['id'];

$sortie->supprimer_sortie($id);
$link="liste_sortie.php?message=delete";
$user->location($link);

?>