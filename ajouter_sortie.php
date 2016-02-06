<?php
require_once("header.php");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Ajouter sortie </small>
        </h1>

    </div>
</div>
<br>


<form class="form-horizontal" role="form" method="post" action="<?php echo$_SERVER['PHP_SELF']; ?>">



    <?php
    $dateE = $heur_sE = $heur_rE = $directionE = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{

        if ($controle->vide($_POST["date"])) {
            $dateE = " * champ obligatoire";
        }

        if ($controle->vide($_POST["heur_s"])) {
            $heur_sE = " * champ obligatoire";
        }

        if ($controle->vide($_POST["heur_r"])) {
            $$heur_rE = " * champ obligatoire";
        }

        if ($controle->vide($_POST["direction"])) {
            $directionE = " * champ obligatoire";
        }



        if ($controle->no_vide($_POST["date"], $_POST["heur_s"], $_POST["heur_r"], $_POST["direction"])) {

            $date = $_POST['date'];
            $heur_s = $_POST['heur_s'];
            $heur_r = $_POST['heur_r'];
            $direction = $_POST['direction'];



            $ajout = $sortie->ajouter_sortie($date, $heur_s, $heur_r, $direction);

            if ($ajout) {

                echo '<script language="Javascript">
<!--
document.location.replace("suite_ajouter_sortie.php?message=add");
// -->
</script>';
            }
        }
    }
    ?>


    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label" for="typeahead">Date de sortie :  </label>
                <div class="controls">
                    <input type="text" name="date" class="form-control" id="datepicker"  >
                    <p class="help-block"><?php echo $dateE ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Heure de sortie :  </label>
                <div class="controls">
                    <input type="time" name="heur_s" class="form-control" id="typeahead"   >
                    <p class="help-block"><?php echo $heur_sE ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Heure de retour :  </label>
                <div class="controls">
                    <input type="time" name="heur_r" class="form-control" id="typeahead"  >
                    <p class="help-block"><?php echo $heur_rE ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Direction :  </label>
                <div class="controls">
                    <input type="text" name="direction" class="form-control" id="typeahead" >
                    <p class="help-block"><?php echo $directionE ?></p>
                </div>
            </div>
            <br>
            <div class="form-actions">
                <button type="reset" class="btn btn-primary">Annuler</button>
                <button type="submit" name="xx" class="btn btn-primary">Suivant</button>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
</form>   

</div>


    <script>
   $('#datepicker').datepicker();
    </script>



<?php
require_once 'footer.php';
?>