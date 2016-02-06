<?php
require_once("DataBase.php");
class chauffeur
{

public function liste_chauffeur()
	{
		$select = DataBase::connect()->query("select * from chaufeur  ORDER BY id_ch DESC");

	
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_ch= $donnees->id_ch;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$email= $donnees->email;
			$tel= $donnees->tel;
			$disponible= $donnees->disponible;
                        $archive= $donnees->archive;
                        if($archive == 0)
                        {
			echo "<tr>";
			echo "<td>";
			echo $id_ch;
			echo "</td>";
			echo "<td>";
			echo $nom;
			echo "</td>";
			echo "<td>";
			echo $prenom;
			echo "</td>";
			
			echo "<td>";
			echo $email;
			echo "</td>";
			echo "<td>";
			echo $tel;
			echo "</td>";
                        echo "<td>";
			echo $disponible;
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_ch.php?id=$id_ch'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='archiver_ch.php?id=$id_ch'  onclick='if (confirm(&quot;Voulez vous vraiment archiver le chauffeur: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/archiver.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
                        }
		}
	}


public function archiver_chauffeur($id)
	{	
	$archive = 1 ;
		$up = DataBase::connect()->prepare('update chaufeur SET
		archive=:archive where id_ch=:id_ch');
try {		
	$update = $up->execute(
	array(
	'id_ch'=>$id,
	'archive'=>$archive,
	
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}

public function select_chauffeur($id)
	{
		$select = DataBase::connect()->query("select * from chaufeur where id_ch=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
	}

public function ajouter_chauffeur($nom,$prenom,$email,$tel)
	{       $np = $nom." ".$prenom ;
                $disponible = "disponible" ;
                $archive = 0 ; 
		$insert = DataBase::connect()->prepare('insert into chaufeur VALUES
		(NULL,:nom,:prenom,:np,:email,:tel,:disponible,:archive)');
try {		
	$ins = $insert->execute(
	array(
	'nom'=>$nom,
	'prenom'=>$prenom,
        'np'=>$np,    
	'email'=>$email,
        'tel'=>$tel,
        'disponible'=>$disponible,
        'archive' =>$archive
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			return true;
		}


public function modifier_chauffeur($id,$nom,$prenom,$email,$tel,$disponible)
	{	
	
		$up = DataBase::connect()->prepare('update chaufeur SET
		nom=:nom,prenom=:prenom,tel=:tel,email=:email,disponible=:disponible where id_ch=:id_ch');
try {		
	$update = $up->execute(
	array(
	'id_ch'=>$id,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'tel'=>$tel,
	'email'=>$email,
        'disponible'=>$disponible
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}


	public function liste_chaufeur_date($date)
{       $etat = 'disponible';
	$select = DataBase::connect()->query("select * from chaufeur where chaufeur.archive=0 and chaufeur.disponible like '$etat'"
                . " and chaufeur.id_ch NOT IN (select id_ch from sortie where id_ch IS NOT NULL and  sortie.date like '$date')");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			echo "<option value='$donnees->id_ch'>";

			echo $donnees->nom." ".$donnees->prenom;

			echo "</option>";
		}

		return true;
}

public function chercher_chaufeur($chaufeur)
	{
		$select = DataBase::connect()->query("select * from chaufeur where nom like '%$chaufeur%' or id_ch like '%$chaufeur%' or prenom like '%$chaufeur%' or np like '%$chaufeur%' ORDER BY id_ch DESC");
                
                if($select->rowCount()>0)
                {
                    echo "<table class='table table-responsive table-bordered table-hover' class='liste_s'>
    <thead>
        <tr>
            <th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Telephone</th><th>Disponibilité</th><th>Modifier</th><th>Archiver</th>
        </tr>
    </thead>
    <tbody>";
                
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_ch= $donnees->id_ch;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$email= $donnees->email;
			$tel= $donnees->tel;
			$disponible= $donnees->disponible;
                        $archive= $donnees->archive;
                        if($archive == 0)
                        {
			echo "<tr>";
			echo "<td>";
			echo $id_ch;
			echo "</td>";
			echo "<td>";
			echo $nom;
			echo "</td>";
			echo "<td>";
			echo $prenom;
			echo "</td>";
			
			echo "<td>";
			echo $email;
			echo "</td>";
			echo "<td>";
			echo $tel;
			echo "</td>";
                        echo "<td>";
			echo $disponible;
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_ch.php?id=$id_ch'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='archiver_ch.php?id=$id_ch'  onclick='if (confirm(&quot;Voulez vous vraiment archiver le chauffeur: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/archiver.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
                        }
		}
                echo "</tbody></table>";
                }
                else 
                {
                     echo "<br><br><center><h3>Aucun resultat</h3>";
                }
                
	}
        
        public function total_chauffeur() {
        $select = DataBase::connect()->query("select * from chaufeur   ORDER BY id_ch DESC");

        $nbr = $select->rowcount();

        echo $nbr;
    }

}