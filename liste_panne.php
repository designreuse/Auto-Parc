<?php
require_once("header.php");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Liste panne  </small>
        </h1>

    </div>
</div>
<br>
<a href="ajouter_panne.php"><img src='img/ajout.png' width='30' height='30'></a>
<a href="liste_panne.php"><img src='img/liste.png' width='30' height='30'></a>
<br><br>
<div id="chercher_s">
<div class="row">
    <form class="form-horizontal" id="recherche1" role="form" method="post">
		<div class="form-group">
      <label for="firstname" class="col-sm-1 control-label"> </label>
      <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Chercher par matricule" id="matricule" name="matricule" >
	
	  </div>
                </div>
    </form>
    <br>
<form class="form-horizontal" id="recherche" role="form" method="post">
		<div class="form-group">
      <label for="firstname" class="col-sm-1 control-label"> </label>
     
      <div class="col-sm-4">
          <select class="form-control" id="type" name="type">
              <option selected value="">Type</option>
               <option value="voiture">Voiture</option>
               <option value="camion">Camion</option>
               
          </select>
      </div>
      <div class="col-sm-4">
          <select class="form-control" id="type" name="etat">
              <option selected value="">Etat</option>
               <option value="réparer">Réparer</option>
               <option value="en panne">En panne</option>
               
          </select>
      </div>
       
      <div class="col-sm-3">
          <input type="button" class="btn btn-primary" value="Chercher" id="btn-sub">
       
      </div>
      

     
	  
	   </div>
		</form>
</div>
</div>

<br>

<?php
$user->affichage();
?>

<br>
 <div id="resultat">
<table class="table table-responsive table-bordered" id="liste_s">
    <thead>
        <tr>
            <th>ID</th><th>Jour</th><th>Date</th><th>Matricule</th><th>Marque</th><th>Type</th><th>Etat</th><th>Modifier</th><th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php
$panne->liste_panne();
?>
    </tbody>
</table>
 </div>
 <script>

$("#btn-sub").click(function(){
	  var formData=$("#recherche").serialize();
	
	
	$.ajax({
		type: "POST",
		url: "chercher_panne.php",
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
		alert('erreur');
			}
	
	});
        
        
$("#matricule").keyup(function(){
  
	  var formData=$("#recherche1").serialize();
	
	
	$.ajax({
		type: "POST",
		url: "chercher_panne_mat.php",
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
		alert('erreur');
			}
	
	});
        
 </script>

        <?php
        require_once 'footer.php';
        ?>