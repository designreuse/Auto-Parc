<?php 
require_once('class/main.php');
$id_ch = $_GET['id'];

$ch->supprimer_chauffeur($id_ch);
$link="liste_chauffeur.php?message=delete";
$user->location($link);

?>