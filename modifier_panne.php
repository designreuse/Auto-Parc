<?php
require_once("header.php");
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Modifier Panne </small>
        </h1>

    </div>
</div>
<br>

<?php
$id = $_GET["id"];
$liste = $panne->info_panne($id);
foreach ($liste as $item) {

    $date = $item["date_p"];
    $etat = $item["etat"];
    $id_p = $item["id_panne"];
}

$ndate = $date[6] . $date[7] . $date[8] . $date[9] . "/" . $date[3] . $date[4] . "/" . $date[0] . $date[1];
$date = $ndate;
?>
<form class="form-horizontal" role="form" method="post" action="#">



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $date = $_POST['date'];
    $etat = $_POST['etat'];




    $Modif = $panne->modifier_panne($id, $date, $etat);

    if ($Modif) {
        echo '<script language="Javascript">
<!--
document.location.replace("liste_panne.php?message=update");
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
                    <input type="text" value="<?php echo $date; ?>" name="date" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >

                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="typeahead">Etat :  </label>
                <div class="controls">
<?php
if ($etat == "réparer") {
    ?>

                        <select name="etat" class="form-control">
                            <option  value="en panne"> Vehicule en panne 		</option>
                            <option selected  value="réparer"> Vehicule Réparée 		</option>
                        </select>

    <?php
} else {
    ?>
                        <select name="etat" class="form-control">
                            <option selected value="en panne"> Vehicule en panne 		</option>
                            <option  value="réparer"> Vehicule Réparée 		</option>
                        </select>

    <?php
}
?>

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




<div class="clearfix"></div>



<!-- start: JavaScript-->

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.0.0.min.js"></script>

<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="js/jquery.ui.touch-punch.js"></script>

<script src="js/modernizr.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>

<script src='js/fullcalendar.min.js'></script>

<script src='js/jquery.dataTables.min.js'></script>

<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>

<script src="js/jquery.chosen.min.js"></script>

<script src="js/jquery.uniform.min.js"></script>

<script src="js/jquery.cleditor.min.js"></script>

<script src="js/jquery.noty.js"></script>

<script src="js/jquery.elfinder.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.iphone.toggle.js"></script>

<script src="js/jquery.uploadify-3.1.min.js"></script>

<script src="js/jquery.gritter.min.js"></script>

<script src="js/jquery.imagesloaded.js"></script>

<script src="js/jquery.masonry.min.js"></script>

<script src="js/jquery.knob.modified.js"></script>

<script src="js/jquery.sparkline.min.js"></script>

<script src="js/counter.js"></script>

<script src="js/retina.js"></script>

<script src="js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>


