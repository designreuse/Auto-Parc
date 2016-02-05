<?php



require_once 'class/main.php';

$matricule = $_POST['matricule'] ; 


$panne->chercher_panne_mat($matricule);
