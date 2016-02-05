<?php
require_once("DataBase.php");
class vehicule
{

public function liste_vehicule()
	{
		$select = DataBase::connect()->query("select * from vehicule  ORDER BY id_v DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_v= $donnees->id_v;
			$type= $donnees->type;
			$matricule= $donnees->matricule;
			$date_f= $donnees->date_f;
                        $marque = $donnees->marque ; 
			echo "<tr>";
			echo "<td>";
			echo $id_v;
			echo "</td>";
			echo "<td>";
			echo $matricule;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
                        echo "<td>";
			echo $marque;
			echo "</td>";
			echo "<td>";
                        $date_n = date('Y:m:d');
                        $age = $date_n - $date_f ;
                        if($age == 0 )
                        {
                            echo 1;
                        }
                        else
                        {
                            echo $age;
                        }
                        echo "</td>";
			echo "<td>";
			echo "<a href='consulter_v.php?id=$id_v'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_v.php?id=$id_v'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_v.php?id=$id_v'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}

public function select_liste_vehicule()
	{	
		
		$select = DataBase::connect()->query("select * from vehicule where   ORDER BY id_v DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_v= $donnees->id_v;
			$type= $donnees->type;
			$matricule= $donnees->matricule;
			$date_f= $donnees->date_f;
			echo "<tr>";
			echo "<td>";
			echo $id_v;
			echo "</td>";
			echo "<td>";
			echo $matricule;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "<td>";
                        $date_n = date('Y:m:d');
                        $age = $date_n - $date_f ;
                        if($age == 0 )
                        {
                            echo 1;
                        }
                        else
                        {
                            echo $age;
                        }
			echo "<td>";
			echo "<a href='consulter_v.php?id=$id_v'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_v.php?id=$id_v'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_v.php?id=$id_v'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}

	public function supprimer_vehicule($id)
	{
		$delete = DataBase::connect()->query("delete from vehicule where id_v=$id");
		if($delete)
		{
			return true;
		}
	}

public function select_vehicule($id)
	{
		$select = DataBase::connect()->query("select * from vehicule where id_v=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
	}

public function ajouter_vehicule($mat,$type,$date_f,$marque)
	{       $date_n = date('Y:m:d');
                $age = $date_n - $date_f ; 
		$insert = DataBase::connect()->prepare('insert into vehicule VALUES
		(NULL,:matricule,:type,:marque,:date_f)');
try {		
	$ins = $insert->execute(
	array(
	'matricule'=>$mat,
	'type'=>$type,
	'date_f'=>$date_f,
        'marque'=>$marque
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			return true;
		}


public function modifier_vehicule($id,$mat,$type,$date_f,$marque)
	{
	
		$up = DataBase::connect()->prepare('update  vehicule SET
		matricule=:mat,date_f=:date_f,type=:type,marque=:marque where id_v=:id_v');
try {		
	$update = $up->execute(
	array(
	'id_v'=>$id,
	'mat'=>$mat,
	'type'=>$type,
	'date_f'=>$date_f,
	'marque'=>$marque
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	

			}
			
		return true;
		
	}



public function liste_vehicule_date($date,$id_v)
{   
      $select = DataBase::connect()->query("select * from vehicule where vehicule.id_v NOT IN "
              . "(select id_v from sortie where sortie.id_v IS NOT NULL and sortie.date like '$date')"
              . " and vehicule.id_v NOT IN (select id_v from panne where  panne.etat like 'en panne') ");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
                foreach ($liste as $donnees)
                {
       
		
	
                       echo "<option value=".$donnees['id_v'].">";

			echo $donnees['type']." ".$donnees['marque']." ".$donnees['matricule'];

			echo "</option>";
                }
}


public function liste_vehicule_select_option()
{
	$select = DataBase::connect()->query("select * from vehicule where id_v not in (select id_v from panne)");
		$row = array();
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			echo "<option value='$donnees->id_v'>";

			echo $donnees->type." ".$donnees->marque." ".$donnees->matricule;

			echo "</option>";
		}

		return true;
}

public function chercher_vehicule($type)
	{       if($type=="tous")
                {
		$select = DataBase::connect()->query("select * from vehicule ORDER BY id_v DESC");
                }else 
                {
                    $select = DataBase::connect()->query("select * from vehicule where type='$type'  ORDER BY id_v DESC");
                
                }
                if($select->rowCount())
                {
                    echo "<table class='table table-responsive table-bordered table-hover'>
		<thead>
		<tr>
		<th>ID</th><th>Matricule</th><th>Type</th><th>Marque</th><th>Age ( ans )</th><th>Consulter</th><th>Modifier</th><th>Supprimer</th>
		</tr>
		</thead>
		<tbody>" ; 
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_v= $donnees->id_v;
			$type= $donnees->type;
			$matricule= $donnees->matricule;
			$date_f= $donnees->date_f;
                        $marque = $donnees->marque ; 
			echo "<tr>";
			echo "<td>";
			echo $id_v;
			echo "</td>";
			echo "<td>";
			echo $matricule;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
                        echo "<td>";
			echo $marque;
			echo "</td>";
			echo "<td>";
                         $date_n = date('Y:m:d');
                        $age = $date_n - $date_f ;
                        if($age == 0 )
                        {
                            echo 1;
                        }
                        else
                        {
                            echo $age;
                        }
                        echo "<td>";
			echo "<a href='consulter_v.php?id=$id_v'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_v.php?id=$id_v'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_v.php?id=$id_v'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
                        
		}
                echo "</tbody><table>";
	}
        else
        {
             echo "<br><br><center><h3>Aucun resultat</h3>";
        }
        }
        
public function chercher_vehicule_matricule($matricule)
	{       
    
                    $select = DataBase::connect()->query("select * from vehicule where matricule like '%$matricule%'  ORDER BY id_v DESC");
                
                
                if($select->rowCount())
                {
                    echo "<table class='table table-responsive table-bordered table-hover'>
		<thead>
		<tr>
		<th>ID</th><th>Matricule</th><th>Type</th><th>Marque</th><th>Age ( ans )</th><th>modifier</th><th>supprimer</th>
		</tr>
		</thead>
		<tbody>" ; 
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_v= $donnees->id_v;
			$type= $donnees->type;
			$matricule= $donnees->matricule;
			$date_f= $donnees->date_f;
                        $marque = $donnees->marque ; 
			echo "<tr>";
			echo "<td>";
			echo $id_v;
			echo "</td>";
			echo "<td>";
			echo $matricule;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
                        echo "<td>";
			echo $marque;
			echo "</td>";
			echo "<td>";
                         $date_n = date('Y:m:d');
                        $age = $date_n - $date_f ;
                        if($age == 0 )
                        {
                            echo 1;
                        }
                        else
                        {
                            echo $age;
                        }
                        echo "<td>";
			echo "<a href='consulter_v.php?id=$id_v'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_v.php?id=$id_v'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_v.php?id=$id_v'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
                        
		}
                echo "</tbody><table>";
	}
        else
        {
             echo "<br><br><center><h3>Aucun resultat</h3>";
        }
        }
        public function total_voiture() {
            $type="voiture" ; 
            
        $select = DataBase::connect()->query("select * from vehicule where type like '$type'");

        $nbr = $select->rowcount();

        echo $nbr;
    }
    public function total_camion() {
            $type="camion" ; 
            
        $select = DataBase::connect()->query("select * from vehicule where type like '$type'");

        $nbr = $select->rowcount();

        echo $nbr;
    }
}