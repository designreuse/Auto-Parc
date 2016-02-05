<?php
require_once("header_atelier.php");
 ?>


			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					
				</li>
				<li><a href="#">Changer Mot de passe</a></li>
			</ul>
			<div class="box-content">

	<form class="form-horizontal" role="form" method="post" action="#">



 <?php
 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {

	

			$pass = $_POST['pass'];
			$npass = $_POST['npass'];
			$rnpass = $_POST['rnpass'];
			$type = "responsable atelier";
			
			
			
			$ajout=$user->changer_pass($npass,$type);
			
			if($ajout)
			{
				
echo '<script language="Javascript">
<!--
document.location.replace("suc_atelier.php");
// -->
</script>';
			}
		}
	?>


						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ancien Mot de passe :  </label>
							  <div class="controls">
								<input type="password" name="pass" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
							
							  </div>
							</div>

						<div class="control-group">
							  <label class="control-label" for="typeahead">Nouveau Mot de passe :  </label>
							  <div class="controls">
								<input type="password" name="npass" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
							
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Confirmation Mot de passe :  </label>
							  <div class="controls">
								<input type="password" name="rnpass" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
							
							  </div>
							</div>
							
							</div>
							<br><br><br>
							<div class="form-actions">
							  <button type="submit" name="xx" class="btn btn-primary">Valider</button>
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
