<?php
require_once("header.php");
 ?>

  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small>Ajouter Chauffeur </small>
                        </h1>
                       
                    </div>
                </div>
                <br>
                 
	<form class="form-horizontal" role="form" method="post" action="<?php echo$_SERVER['PHP_SELF']; ?>">



 <?php
 
 $nomE=$prenomE=$emailE=$telE="";
 
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
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
			
			
			
			$ajout=$ch->ajouter_chauffeur($nom,$prenom,$email,$tel);
			
			if($ajout)
			{
				
echo '<script language="Javascript">
<!--
document.location.replace("liste_chauffeur.php?message=add");
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
							  <label for="typeahead">Nom :  </label>
							  <div class="controls">
								<input type="text" name="nom" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $nomE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label for="typeahead">Prenom :  </label>
							  <div class="controls">
								<input type="text" name="prenom" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $prenomE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label" for="typeahead">Email :  </label>
							  <div class="controls">
								<input type="text" name="email" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $emailE ?></p>
							  </div>
							</div>
							<div class="form-group">
							  <label  for="typeahead">Teléphone :  </label>
							  <div class="controls">
								<input type="text" name="tel" class="form-control" id="typeahead"  data-provide="typeahead" data-items="4" >
								<p class="help-block"><?php echo $telE ?></p>
							  </div>
							</div>
                                                   
							
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
					
					


			<?php
        require_once 'footer.php';
        ?>