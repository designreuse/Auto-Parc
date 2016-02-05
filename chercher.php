<?php
require_once 'class/main.php';

$jour = $_POST['jour'] ; 
$mois = $_POST['mois'] ; 
$annes = $_POST['annes']; 
$type = $_POST['type'] ; 

$sortie->chercher_sortie($jour,$mois,$annes,$type);
