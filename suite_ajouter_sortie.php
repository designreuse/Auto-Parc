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
<?php
$date = $sortie->select_date();

$id = $sortie->select_id();
?>
<form class="form-horizontal" role="form" method="post" action="<?php echo$_SERVER['PHP_SELF']; ?>">



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{

        $id_ch = $_POST['chaufeur'];
        $id_v = $_POST['vehicule'];



        $ajout = $sortie->modifier_sortie($id_ch, $id_v, $id);
        $id = $sortie->last_sortie();

        if ($ajout) {

            echo "<script language='Javascript'>
<!--
document.location.replace('consulter_sortie.php?id=" . $id . "&message=add');
// -->
</script>";
        }
    }
    ?>


    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label" for="typeahead"> Vehicule :  </label>
                <div class="controls">
<?php 

      
?>
                    <select name="vehicule" class="form-control">
                       <?php 
                       
                      $vh->liste_vehicule_date($date,$id_v)
                       ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="typeahead"> Chauffeur :  </label>
                <div class="controls">
                    <select name="chaufeur" class="form-control">
                        <?php
                        $ch->liste_chaufeur_date($date);
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
</form>   

</div>


<?php
require_once 'footer.php';
?>					