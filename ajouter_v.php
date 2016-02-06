<?php
require_once("header.php");
 ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Ajouter véhicule  </small>
        </h1>

    </div>
</div>
<br>
	<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>>

 <?php
 
 $matE=$typeE=$ageE=$marqueE="";
 
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
if( $controle->vide($_POST["mat"])) 
{
	$matE=" * champ obligatoire";

}	

if( $controle->vide($_POST["type"])) 
{
	$typeE=" * champ obligatoire";
}

if( $controle->vide($_POST["date_f"])) 
{
	$ageE=" * champ obligatoire";
}

if( $controle->vide($_POST["marque"])) 
{
	$marqueE=" * champ obligatoire";
}


if($controle->no_vide($_POST["mat"],$_POST["type"],$_POST["date_f"],$_POST["marque"]))
{		

			$mat = htmlentities($_POST['mat']);
			$type = $_POST['type'];
			$date_f = $_POST['date_f'];
			$marque = $_POST['marque'];
			
			 
			
			
			$ajout=$vh->ajouter_vehicule($mat,$type,$date_f,$marque);
			
			if($ajout)
			{
				
echo '<script language="Javascript">
<!--
document.location.replace("liste_vehicule.php?message=add");
// -->
</script>';


			}
		}}
	?>


						<div class="row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-8">
							<div class="form-group">
							  <label class="control-label" for="typeahead">Matricule :  </label>
							  <div class="controls">
								<input type="text" name="mat" class="form-control" id="typeahead"   >
								<p class="help-block"><?php echo $matE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label" for="typeahead">Date de fabrication  :  </label>
							  <div class="controls">
								<input type="text" name="date_f" class="form-control"  id="datepicker">
								<p class="help-block"></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label" for="typeahead">Type :  </label>
							  <div class="controls">

								<select name="type" class="form-control" >
									<option  value="voiture">Voiture</option>
								<option  value="camion">Camion</option>
								</select>
							  </div>
							</div>
                                                      <div class="form-group">
							  <label class="control-label" for="typeahead">Marque :  </label>
							  <div class="controls">
								<input type="text" name="marque" class="form-control"  id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $marqueE ?></p>
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