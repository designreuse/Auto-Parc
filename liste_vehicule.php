<?php
require_once("header.php");
 ?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Liste véhicule  </small>
        </h1>

    </div>
</div>
<br>
<a href="ajouter_v.php"><img src='img/ajout.png' width='30' height='30'></a>
<a href="liste_vehicule.php"><img src='img/liste.png' width='30' height='30'></a>
 
<br><br>
<form class="form-horizontal" id="recherche" role="form" method="post">
		<div class="form-group">
      <label for="firstname" class="col-sm-1 control-label"> </label>
      <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Chercher par matricule" id="matricule" name="matricule" >
	
	  </div>
                </div>
    <br><br>
   <div class="form-group">
      <div class="col-sm-3">
          <select name="type" class="form-control" id="type">
              <option selected value="tous">Voiture et Camion</option>
              <option value="voiture">Voiture</option>
              <option value="camion">Camion</option>
          </select>
     
	  </div>
	 
	   </div>
		</form>


 <?php 

 
 $user->affichage();
 

 ?>

 
 <div id="resultat">
		<table class="table table-responsive table-bordered table-hover" id="liste_s">
		<thead>
		<tr>
		<th>ID</th><th>Matricule</th><th>Type</th><th>Marque</th><th>Age ( ans )</th><th>Consulter</th><th>Modifier</th><th>Supprimer</th>
                
		</tr>
		</thead>
		<tbody>
		<?php
		

		$vh->liste_vehicule();
		?>
		</tbody>
		</table>
 </div>
 <script>
 $("#type").change(function () {
    
    
   
	  var formData=$("#recherche").serialize();
	
	
	$.ajax({
		type: "POST",
		url: "chercher_vehicule.php",
		cache:false,
		data: formData,
                
		success:onSucces,
		error:onErro 
			
  });
	function onSucces(data,status){
            
             $("#liste_s").hide('slow');
		$("#resultat").html(data);
               
                
			}
	function onErro(data,status){
		alert('erreur de connexion');
			}
	
	});
         $("#matricule").keyup(function(){
   
	  var formData=$("#recherche").serialize();
	
	
	$.ajax({
		type: "POST",
		url: "chercher_vehicule_matricule.php",
		cache:false,
		data: formData,
                
		success:onSucces,
		error:onErro 
			
  });
	function onSucces(data,status){
           
             $("#liste_s").hide('slow');
		$("#resultat").html(data);
               
                
			}
	function onErro(data,status){
		alert('erreur de connexion');
			}
	
	});
       
 </script>
					
		<?php
        require_once 'footer.php';
        ?>