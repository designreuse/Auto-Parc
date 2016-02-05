<?php 
require_once('class/main.php');
$id = $_GET['id'];

$panne->supprimer_panne($id);
$link="liste_panne.php?message=delete";
$user->location($link);

?>