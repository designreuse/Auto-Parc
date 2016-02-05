<?php

require_once 'class/main.php';

$matricule = $_POST['matricule'] ; 
 

$vh->chercher_vehicule_matricule($matricule);

