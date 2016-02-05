<?php
require_once("header.php");
 ?>

<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					
				</li>
				<li><a href="#">Envoyer mail</a></li>
			</ul>
			<div class="box-content">

	<form class="form-horizontal" role="form" method="post" action="#">



 <?php
 
 $dateE="";
 
	 if (isset($_POST["xx"])) 
		{
		
if( $controle->vide($_POST["date"])) 
{
	$dateE=" * champ obligatoire";

}	






if($controle->no_vide($_POST["date"],$_POST["age"]))
{		

			$date = $_POST['date'];
			$id_v = $_POST['vehicule'];
			
			
			 
			
			
			$ajout=$vh->ajouter_vehicule($mat,$type,$age);
			
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


						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Matricule :  </label>
							  <div class="controls">
								<input type="number" name="mat" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $matE ?></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Age :  </label>
							  <div class="controls">
								<input type="number" name="age" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block"><?php echo $ageE ?></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Type :  </label>
							  <div class="controls">

								<select name="type">
									<option  value="voiture">Voiture</option>
								<option  value="camion">Camion</option>
								</select>
							  </div>
							</div>
							<br><br><br>
							<div class="form-actions">
							  <button type="submit" name="xx" class="btn btn-primary">Ajouter</button>
							  <button type="reset" class="btn btn-primary">Annuler</button>
							</div>
						  </fieldset>
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
