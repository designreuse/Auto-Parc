<?php
require_once("header.php");
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Ajouter panne </small>
        </h1>

    </div>
</div>
<br>

<form class="form-horizontal" role="form" method="post" action="<?php echo$_SERVER['PHP_SELF']; ?>">



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        $date = $_POST['date'];
        $etat = $_POST['etat'];
        $vehicule = $_POST['vehicule'];



        $ajout = $panne->ajouter_panne($date, $etat, $vehicule);

        if ($ajout) {

            echo '<script language="Javascript">
<!--
document.location.replace("liste_panne.php?message=add");
// -->
</script>';
        }
    }
    ?>


    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label" for="typeahead">Date :  </label>
                <div class="controls">
                    <input type="text" name="date" class="form-control" id="datepicker"  >

                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="typeahead">Etat :  </label>
                <div class="controls">
                    <select name="etat" class="form-control" >
                        <option value="en panne"> Vehicule en panne 		</option>
                        <option value="répare"> Vehicule Réparée 		</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label" for="typeahead">Vehicule :  </label>
                <div class="controls">
                    <select  name="vehicule" class="form-control">
<?php
$vh->liste_vehicule_select_option();
?>
                    </select>
                </div>
            </div>


            <br>
            <div class="form-actions">
                <button type="reset" class="btn btn-primary">Annuler</button>
                <button type="submit" name="xx" class="btn btn-primary">Ajouter</button>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</form>   

</div>


<script>
  $('#datepicker').datepicker();
</script>

<?php
require_once 'footer.php';
?>