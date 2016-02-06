<?php

require_once("DataBase.php");

class sortie {

    public function ajouter_sortie($date, $heur_s, $heur_r, $direction) {

        
        $mois = date("m", strtotime($date));
        $annes = date("Y", strtotime($date));
        $jour = date("d", strtotime($date));
        $day = date("l", strtotime($date));
      
        switch ($day) {
            case "Monday":
                $day = "Lundi";
                break;
            case "Tuesday":
                $day = "Mardi";
                break;
            case "Wednesday":
                $day = "Mercredi";
                break;
            case "Thursday":
                $day = "Jeudi";
                break;
            case "Friday":
                $day = "Vendredi";
                break;
            case "Saturday":
                $day = "Samedi";
                break;
            case "Sunday":
                $day = "Dimanche";
                ;
                break;
        }
        $insert = DataBase::connect()->prepare('insert into sortie VALUES
		(NULL,:date,:heur_s,:heur_r,:direction,:day,:jour,:mois,:annes,NULL,NULL)');
        try {
            $ins = $insert->execute(
                    array(
                        'date' => $date,
                        'heur_r' => $heur_r,
                        'heur_s' => $heur_s,
                        'direction' => $direction,
                        'mois' => $mois,
                        'jour' => $jour,
                        'day' => $day,
                        'annes' => $annes
                    )
            );
        } catch (Exception $e) {

            echo 'Erreur de requÃ¨te : ', $e->getMessage();
        }
        return true;
    }

    public function modifier_sortie($id_ch, $id_v, $id) {

        $insert = DataBase::connect()->prepare('update sortie SET
		id_ch=:id_ch,id_v=:id_v where id_sortie=:id_sortie');
        try {
            $ins = $insert->execute(
                    array(
                        'id_ch' => $id_ch,
                        'id_v' => $id_v,
                        'id_sortie' => $id
                    )
            );
        } catch (Exception $e) {

            echo 'Erreur de requÃ¨te : ', $e->getMessage();
        }
        return true;
    }

    public function liste_sortie() {


        $select = DataBase::connect()->query("select * from sortie as s inner join vehicule as v on s.id_v=v.id_v inner join chaufeur as ch on ch.id_ch=s.id_ch    ORDER BY id_sortie DESC LIMIT 100 ");

        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
            $id_sortie = $donnees->id_sortie;
            $date = $donnees->date;
            $heur_s = $donnees->heur_s;
            $heur_r = $donnees->heur_r;
            $direction = $donnees->direction;
            $matricule = $donnees->matricule;
            $type = $donnees->type;
            $marque = $donnees->marque;
            $nom = $donnees->nom;
            $prenom = $donnees->prenom;
            $day = $donnees->day;
            echo "<tr>";

            echo "<td>";
            echo $id_sortie;
            echo "</td>";
            echo "<td>";
            echo $day;
            echo "</td>";
            echo "<td>";
            echo $date;
            echo "</td>";
            echo "<td>";
            echo $type . " - " . $marque . " - " . $matricule;
            echo "</td>";
            echo "<td>";
            echo $nom . " " . $prenom;
            echo "</td>";
            echo "<td>";
            echo $heur_r;
            echo "</td>";
            echo "<td>";
            echo $heur_s;
            echo "</td>";
            echo "<td>";
            echo $direction;
            echo "</td>";

            echo "<td>";
            echo "<a href='consulter_sortie.php?id=$id_sortie'>";
            echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";
            echo "</td>";


            echo "<td>";
            echo "<a href='supprimer_sortie.php?id=$id_sortie'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>";
            echo " <img src='img/del.png' width='30' height='30'></img> </a>";
            echo "</td>";
            echo "</tr>";
        }
    }

    public function select_date() {
        $select = DataBase::connect()->query("select * from sortie  ORDER BY id_sortie DESC LIMIT 1");

        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {

            $date = $donnees->date;
        }


        return $date;
    }

    public function select_id() {
        $select = DataBase::connect()->query("select * from sortie  ORDER BY id_sortie DESC LIMIT 1");

        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {

            $id = $donnees->id_sortie;
        }


        return $id;
    }

    public function supprimer_sortie($id) {
        $delete = DataBase::connect()->query("delete from sortie where id_sortie=$id");
        if ($delete) {
            return true;
        }
    }

    public function last_sortie() {
        $select = DataBase::connect()->query("select * from sortie  ORDER BY id_sortie DESC LIMIT 1 ");

        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
            $id = $donnees->id_sortie;
        }
        return $id;
    }

    public function select_sortie($id) {
        $select = DataBase::connect()->query("select * from sortie as s inner join vehicule as v inner join chaufeur as c on s.id_v=v.id_v and s.id_ch=c.id_ch where id_sortie='$id'");
        $liste = $select->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }

    public function chercher_sortie($jour, $mois, $annes, $type) {


        $where = " where";

        $x = 0;
        if ($jour != "") {
            if ($x > 0) {
                $where = $where . " and s.jour like '$jour' ";
            } else {
                $where = $where . "  s.jour like '$jour' ";
            }

            $x++;
        }

        if ($mois != "") {
            if ($x > 0) {

                $where = $where . " and s.mois like '$mois' ";
            } else {
                $where = $where . "  s.mois like '$mois' ";
            }

            $x++;
        }

        if ($annes != "") {
            if ($x > 0) {

                $where = $where . " and s.annes like '$annes' ";
            } else {
                $where = $where . "  s.annes like '$annes' ";
            }

            $x++;
        }
        if ($type != "") {
            if ($x > 0) {

                $where = $where . " and v.type like '$type' ";
            } else {
                $where = $where . "  v.type like '$type' ";
            }

            $x++;
        }
        if ($x == 0) {
            $where = " ";
        }


        $select = DataBase::connect()->query("select * from sortie as s inner join vehicule as v on s.id_v=v.id_v inner join chaufeur as ch on ch.id_ch=s.id_ch" . $where . " ORDER BY id_sortie DESC");


        if ($select->rowcount() > 0) {
            echo "<table class='table table-responsive table-bordered table-hover'>
		<thead>
		<tr>
		<th>ID</th><th>Jour</th><th>Date</th></th><th>Véhicule</th><th>Nom & Prénom</th><th>Heur de sortie</th><th>Heur de retour</th><th>Direction</th><th></th><th></th>
		</tr>
		</thead>
		<tbody>";
            while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
                $id_sortie = $donnees->id_sortie;
                $date = $donnees->date;
                $heur_s = $donnees->heur_s;
                $heur_r = $donnees->heur_r;
                $direction = $donnees->direction;
                $matricule = $donnees->matricule;
                $type = $donnees->type;
                $marque = $donnees->marque;
                $nom = $donnees->nom;
                $prenom = $donnees->prenom;
                $day = $donnees->day;
                $mois_s = $donnees->mois;
                ;
                $annes_s = $donnees->annes;
                ;


                echo "<tr>";

                echo "<td>";
                echo $id_sortie;
                echo "</td>";
                echo "<td>";
                echo $day;
                echo "</td>";
                echo "<td>";
                echo $date;
                echo "</td>";
                echo "<td>";
                echo $type . " - " . $marque . " - " . $matricule;
                echo "</td>";
                echo "<td>";
                echo $nom . " " . $prenom;
                echo "</td>";
                echo "<td>";
                echo $heur_r;
                echo "</td>";
                echo "<td>";
                echo $heur_s;
                echo "</td>";
                echo "<td>";
                echo $direction;
                echo "</td>";

                echo "<td>";
                echo "<a href='consulter_sortie.php?id=$id_sortie'>";
                echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";
                echo "</td>";


                echo "<td>";
                echo "<a href='supprimer_sortie.php?id=$id_sortie'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la vehicule: ?&quot;)) { return true; } return false;'>";
                echo " <img src='img/del.png' width='30' height='30'></img> </a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody> </table>";
        } else {
            echo "<br><br><center><h3>Aucun resultat</h3>";
        }
    }

    public function total_sortie() {
        $select = DataBase::connect()->query("select * from sortie   ORDER BY id_sortie DESC");

        $nbr = $select->rowcount();

        echo $nbr;
    }

}

?>
