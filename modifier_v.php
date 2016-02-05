<?php
require_once("header.php");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Modifier véhicule  </small>
        </h1>

    </div>
</div>
<br>
<?php
$id = $_GET["id"];

$liste = $vh->select_vehicule($id);
foreach ($liste as $row) {

    $date_f = $row["date_f"];
    $mat = $row["matricule"];
    $type = $row["type"];
    $marque = $row["marque"];
}
?> 

<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $_GET['id']; ?>">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

<?php
$matE = $typeE = $ageE = $marqueE = "";
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
    if ($controle->vide($_POST["mat"])) {
        $matE = " * champ obligatoire";
    }

    if ($controle->vide($_POST["type"])) {
        $typeE = " * champ obligatoire";
    }

    if ($controle->vide($_POST["date_f"])) {
        $ageE = " * champ obligatoire";
    }

    if ($controle->vide($_POST["marque"])) {
        $marqueE = " * champ obligatoire";
    }



    if ($controle->no_vide($_POST["mat"], $_POST["type"], $_POST["date_f"])) {

        $mat = $_POST['mat'];
        $type = $_POST['type'];
        $date_f = $_POST['date_f'];
        $marque = $_POST['marque'];
        $id = $_POST['id'];
 


        $ajout = $vh->modifier_vehicule($id, $mat, $type, $date_f, $marque);


        if ($ajout) {



            echo '<script language="Javascript">
<!--
document.location.replace("consulter_v.php?id='.$id.'");
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
                <label class="control-label" for="typeahead">Matricule :  </label>
                <div class="controls">
                    <input type="text" name="mat" value="<?php echo $mat; ?>" class="form-control"  >
                    <p class="help-block"><?php echo $matE ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Date de fabrication :  </label>
                <div class="controls">
                    <input type="number" name="date_f" value="<?php echo $date_f; ?>" class="form-control" >

                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Type :  </label>
                <div class="controls">
                    <select name="type" class="form-control">
<?php if ($type == voiture) { ?> 
                            <option selected value="voiture">Voiture</option>
                            <option value="camion">Camion</option>
<?php } ?>

<?php if ($type == camion) { ?> 
                            <option  value="voiture">Voiture</option>
                            <option selected value="camion">Camion</option>
<?php } ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead">Marque :  </label>
                <div class="controls">
                    <input type="text" name="marque" value="<?php echo $marque; ?>" class="form-control"  >
                    <p class="help-block"><?php echo $marqueE ?></p>
                </div>
            </div>
            <br>
            <div class="form-actions">
                <button type="reset" class="btn btn-primary">Annuler</button>
                <button type="submit" name="xx" class="btn btn-primary">Modifier</button>

            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</form>   

</div>



<?php
require_once ('footer.php');
?>