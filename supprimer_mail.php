<?php 
require_once('class/main.php');
$id = $_GET['id'];

$mail->supprimer_mail($id);
$link="liste_mail.php?message=delete";
$user->location($link);

?>