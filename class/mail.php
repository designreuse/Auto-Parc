<?php
require_once("DataBase.php");
class mail
{

public function liste_mail()
	{
		$select = DataBase::connect()->query("select * from mail  ORDER BY id_mail DESC");

	
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_mail= $donnees->id_mail;
			$sujet= $donnees->sujet;
			$date= $donnees->date;
			$vue= $donnees->vue;
			$texte= $donnees->texte;
			$editeur= $donnees->editeur;
			
			
			echo "<tr>";
			
			echo "<td>";
			echo $id_mail;
			echo "</td>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo $editeur;
			echo "</td>";
			echo "<td>";
			echo $sujet;
			echo "</td>";
			
			
			
			echo "<td>";
			echo "<a href='consulter_mail.php?id=$id_mail'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_mail.php?id=$id_mail'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le chauffeur: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}

public function liste_mail_a()
	{
		$select = DataBase::connect()->query("select * from mail  ORDER BY id_mail DESC");

	
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_mail= $donnees->id_mail;
			$sujet= $donnees->sujet;
			$date= $donnees->date;
			$vue= $donnees->vue;
			$texte= $donnees->texte;
			$editeur= $donnees->editeur;
			
			
			echo "<tr>";
			
			echo "<td>";
			echo $id_mail;
			echo "</td>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo $editeur;
			echo "</td>";
			echo "<td>";
			echo $sujet;
			echo "</td>";
			
			
			
			echo "<td>";
			echo "<a href='consulter_mail_a.php?id=$id_mail'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_mail_a.php?id=$id_mail'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le chauffeur: ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}



	public function supprimer_mail($id)
	{
		$delete = DataBase::connect()->query("delete from mail where id_mail=$id");
		if($delete)
		{
			return true;
		}
	}

public function select_mail($id)
	{
		$select = DataBase::connect()->query("select * from mail where id_mail=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
	}

public function ajouter_mail($sujet,$texte,$date,$editeur)
	{
	
		$insert = DataBase::connect()->prepare('insert into mail VALUES
		(NULL,:sujet,:texte,:date,:vue,:editeur)');
try {		
	$ins = $insert->execute(
	array(
	'sujet'=>$sujet,
	'texte'=>$texte,
	'date'=>$date,
	'vue'=>0,
	'editeur'=>$editeur
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			return true;
		}







}