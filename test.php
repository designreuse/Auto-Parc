<?php
  // le user_id devrait être issus du login
  $user_id=42;

  // la clef secrete (grain de sable) et la durée de validité devraient être stockés 
  // dans un fichier de configuration
  $secret_key= "chaine aleatoire";
  $validity_time=600;

  // le jeton est composé de la clef secrète, de l'url du service et du user-agent
  $token_clair=$secret_key."https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]
    .$_SERVER['HTTP_USER_AGENT'];

  // les informations (ici: id de l'utilisateur et la date de création du jeton) 
  // vont être transmis en clair dans un cookie  et ajouté au jeton pour être signé.
  // On pourra ainsi s'assurer de leur authenticité.
  $informations=time()."-".$user_id;

  // On encode le jeton
  $token = hash('sha256', $token_clair.$informations);

  // On poste les cookies
  setcookie("session_token", $token, time()+$validity_time);
  setcookie("session_informations", $informations, time()+$validity_time);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
<form method="POST" action="something.php">
      <input type="text" name="message"><br />
      <input type="submit">
    </form>
  </body>
</html>