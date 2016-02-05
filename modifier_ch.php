<?php
require_once("header.php");
 ?>

				<?php 
				$id = $_GET["id"];
				$liste = $ch->select_chauffeur($id);

				foreach($liste 	as $row )
				{
					$nom = $row["nom"];
					$prenom = $row["prenom"];
					$email = $row["email"];
					$tel = $row["tel"];
                                        $disponible = $row["disponible"];
                                        $archive = $row["archive"];
				}

				?>
  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small>Ajouter Chauffeur </small>
                        </h1>
                       
                    </div>
                </div>
                <br>
                 
	<form class="form-horizontal" role="form" method="post" action="#">



 <?php
 
 $nomE=$prenomE=$emailE=$telE="";
 
	 if (isset($_POST["xx"])) 
		{
		
if( $controle->vide($_POST["nom"])) 
{
	$nomE=" * champ obligatoire";

}	

if( $controle->vide($_POST["prenom"])) 
{
	$prenomE=" * champ obligatoire";
}

if( $controle->vide($_POST["email"])) 
{
	$emailE=" * champ obligatoire";
}

if( $controle->vide($_POST["tel"])) 
{
	$telE=" * champ obligatoire";
}



if($controle->no_vide($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["tel"]))
{		

			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$email = $_POST['email'];
			$tel = $_POST['tel'];
			$disponible = $_POST['disponible'];
			
			
			$ajout=$ch->modifier_chauffeur($id,$nom,$prenom,$email,$tel,$disponible);
			
			if($ajout)
			{
				
echo '<script language="Javascript">
<!--
document.location.replace("liste_chauffeur.php?message=update");
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
							  <label class="control-label" for="typeahead">Nom :  </label>
							  <div class="controls">
								<input type="text" value="<?php  echo $nom;  ?>" name="nom" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $nomE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label" for="typeahead">Prenom :  </label>
							  <div class="controls">
								<input type="text" value="<?php  echo $prenom;  ?>" name="prenom" class="form-control"  id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $prenomE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label" for="typeahead">Email :  </label>
							  <div class="controls">
								<input type="text" value="<?php  echo $email;  ?>" name="email" class="form-control"  id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $emailE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label"  for="typeahead">Teléphone :  </label>
							  <div class="controls">
								<input type="text" value="<?php  echo $tel;  ?>" name="tel" class="form-control"  id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $telE ?></p>
							  </div>
							</div>
                                                      
                                                      <div class="form-group">
							  <label class="control-label"  for="typeahead">Disponibilité :  </label>
							  <div class="controls">
                                                              <select  name="disponible" class="form-control" >
                                                                  <?php 
                                                                  if($disponible=="disponible")
                                                                  {
                                                                  ?>
                                                                  <option selected value="disponible">disponible</option>
                                                                  <option   value="en congé">en congé</option>
                                                                  <?php 
                                                                  } 
                                                                  ?>
                                                                  <?php 
                                                                  if($disponible=="en congé")
                                                                  {
                                                                  ?>
                                                                  <option value="disponible">disponible</option>
                                                                  <option selected value="en congé">en congé</option>
                                                                  <?php 
                                                                  } 
                                                                  ?>
                                                              </select>
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
