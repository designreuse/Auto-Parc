<?php 
require_once('class/main.php');
$id_ch = $_GET['id'];

$ch->archiver_chauffeur($id_ch);
$link="liste_chauffeur.php?message=archive";
$user->location($link);

?>