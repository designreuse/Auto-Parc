<?php

require_once("header.php");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Changer mot de passe </small>
        </h1>

    </div>
</div>
<br>
<?php
$data = array();

$data['login'] = $_SESSION['l'];

$login = $data['login'];

$tpass = $user->select_pass($login);
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">



    <?php
    $passE = $npassE = $rnpassE = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($controle->vide($_POST['pass'])) {
            $passE = "* champ obligatoire";
        }
        if ($controle->vide($_POST['npass'])) {
            $npassE = "* champ obligatoire";
        }
        if ($controle->vide($_POST['rnpass'])) {
            $rnpassE = "* champ obligatoire";
        }
        if ($controle->no_vide($_POST['pass'], $_POST['npass'], $_POST['rnpass'])) {



            $pass = $crypt->encrypt($_POST['pass']);
            $npass = $crypt->encrypt($_POST['npass']);
            $rnpass = $crypt->encrypt($_POST['rnpass']);
            if (($pass != $tpass)) {
                $passE = "ancien mot de passe incorrecte";
            }



            if ($npass != $rnpass) {
                $rnpassE = "retaper mot de passe correctement";
            }

            if (($pass == $tpass) && ($npass == $rnpass)) {


                $ajout = $user->changer_pass($npass, $login);


                if ($ajout) {


                    echo '<script language="Javascript">
<!--
document.location.replace("suc_parking.php");
// -->
</script>';
                }
            }
        }
    }
    ?>


    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label" for="typeahead">Ancien Mot de passe :  </label>
                <div class="controls">
                    <input type="password" name="pass" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
                    <p class="help-block"><?php echo $passE ?></p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="typeahead">Nouveau Mot de passe :  </label>
                <div class="controls">
                    <input type="password" name="npass" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
                    <p class="help-block"><?php echo $npassE ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Confirmation Mot de passe :  </label>
                <div class="controls">
                    <input type="password" name="rnpass" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
                    <p class="help-block"><?php echo $rnpassE ?></p>
                </div>
            </div>


            <br>
            <div class="form-actions">
                <button type="reset" class="btn btn-primary">Annuler</button>
                <button type="submit" name="xx" class="btn btn-primary">Valider</button>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</form>   

</div>


<?php
require_once 'footer.php';
?>