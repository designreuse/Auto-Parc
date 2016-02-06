<?php

require_once("DataBase.php");

class panne {

    public function liste_panne() {
        $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v  ORDER BY id_panne DESC");


        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
            $id_panne = $donnees->id_panne;
            $date_p = $donnees->date_p;
            $etat = $donnees->etat;
            $type = $donnees->type;
            $marque = $donnees->marque;
            $matricule = $donnees->matricule;
            $id_v = $donnees->id_v;
            $jour = $donnees->jour;
            echo "<tr>";
            echo "<td>";
            echo $id_panne;
            echo "</td>";
            echo "<td>";
            echo $jour;
            echo "</td>";
            echo "<td>";
            echo $date_p;
            echo "</td>";
            echo "<td>";
            echo $matricule;
            echo "</td>";
            echo "<td>";
            echo $marque;
            echo "</td>";
            echo "<td>";
            echo $type;
            echo "</td>";



            echo "<td>";
            if ($etat == "en panne") {
                echo " <img src='img/nn.png' width='30' height='30'></img>";
            } else {
                echo " <img src='img/ok.png' width='35' height='30'></img>";
            }

            echo "</td>";

            echo "<td>";
            echo "<a href='modifier_panne.php?id=$id_panne'>";
            echo " <img src='img/modif.png' width='35' height='30'></img> </a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='supprimer_panne.php?id=$id_panne'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la panne: ?&quot;)) { return true; } return false;'>";
            echo " <img src='img/del.png' width='30' height='30'></img> </a>";
            echo "</td>";
            echo "</tr>";
        }
    }

    public function supprimer_panne($id) {
        $delete = DataBase::connect()->query("delete from panne where id_panne=$id");
        if ($delete) {
            return true;
        }
    }

    public function select_panne($id) {
        $select = DataBase::connect()->query("select * from panne where id_v=$id");
        while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
            $id_panne = $donnees->id_panne;
            $date_p = $donnees->date_p;
            $etat = $donnees->etat;
            $jour = $donnees->jour;
            $place = $donnees->place;
            echo "<tr>";
            echo "<td>";
            echo $id_panne;
            echo "</td>";


            echo "<td>";
            echo $jour;
            echo "</td>";

            echo "<td>";
            echo $date_p;
            echo "</td>";
            echo "<td>";
            echo $place;
            echo "</td>";

            echo "<td>";
            if ($etat == "en panne") {
                echo " <img src='img/nn.png' width='30' height='30'></img>";
            } else {
                echo " <img src='img/ok.png' width='35' height='30'></img>";
            }

            echo "</td>";


            echo "</tr>";
        }
    }

    public function ajouter_panne($date, $etat, $vehicule) {
       
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


        $insert = DataBase::connect()->prepare('insert into panne VALUES
		(NULL,:date,:etat,:day,:jour,:mois,:annes,:vehicule)');
        try {
            $ins = $insert->execute(
                    array(
                        'date' => $date,
                        'etat' => $etat,
                        'vehicule' => $vehicule,
                        'day' => $day,
                        'jour' => $jour,
                        'mois' => $mois,
                        'annes' => $annes
                    )
            );
        } catch (Exception $e) {

            echo 'Erreur de requète : ', $e->getMessage();
        } 
        return true;
    }

    public function modifier_panne($id, $date, $etat) {

        $up = DataBase::connect()->prepare('update panne SET
		date_p=:date,etat=:etat where id_panne=:id_panne');
        try {
            $update = $up->execute(
                    array(
                        'id_panne' => $id,
                        'date' => $date,
                        'etat' => $etat
                    )
            );
        } catch (Exception $e) {

            echo 'Erreur de requète : ', $e->getMessage();
        }

        return true;
    }

    public function chercher_panne($type, $etat) {

        if ($type == "" && $etat == "") {
            $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v  ORDER BY id_panne DESC");
        }

        if ($type != "" && $etat == "") {
            $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v where type like '$type'  ORDER BY id_panne DESC");
        }
        if ($type == "" && $etat != "") {
            $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v where etat like '$etat' ORDER BY id_panne DESC");
        }

        if ($type != "" && $etat != "") {
            $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v where type like '$type' and etat like '$etat' ORDER BY id_panne DESC");
        }

        if ($select->rowCount() > 0) {
            echo "<table class='table table-responsive table-bordered table-hover' id='liste_s'>
    <thead>
        <tr>
            <th>ID</th><th>Jour</th><th>Date</th><th>Place</th><th>Matricule</th><th>Marque</th><th>Type</th><th>Etat</th><th>Modifier</th><th>Supprimer</th>
        </tr>
    </thead>
    <tbody>";

            while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
                $id_panne = $donnees->id_panne;
                $date_p = $donnees->date_p;
                $etat = $donnees->etat;
                $type = $donnees->type;
                $marque = $donnees->marque;
                $matricule = $donnees->matricule;
                $id_v = $donnees->id_v;
                $jour = $donnees->jour;
                $place = $donnees->place;
                echo "<tr>";
                echo "<td>";
                echo $id_panne;
                echo "</td>";
                echo "<td>";
                echo $jour;
                echo "</td>";
                echo "<td>";
                echo $date_p;
                echo "</td>";
                echo "<td>";
                echo $place;
                echo "</td>";
                echo "<td>";
                echo $matricule;
                echo "</td>";
                echo "<td>";
                echo $marque;
                echo "</td>";
                echo "<td>";
                echo $type;
                echo "</td>";





                echo "<td>";
                if ($etat == "en panne") {
                    echo " <img src='img/nn.png' width='30' height='30'></img>";
                } else {
                    echo " <img src='img/ok.png' width='35' height='30'></img>";
                }

                echo "</td>";

                echo "<td>";
                echo "<a href='modifier_panne.php?id=$id_panne'>";
                echo " <img src='img/modif.png' width='35' height='30'></img> </a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='supprimer_panne.php?id=$id_panne'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la panne: ?&quot;)) { return true; } return false;'>";
                echo " <img src='img/del.png' width='30' height='30'></img> </a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<br><br><center><h3>Aucun resultat</h3>";
        }
    }

    public function chercher_panne_mat($matricule) {


        $select = DataBase::connect()->query("select * from panne as p inner join vehicule as v on p.id_v=v.id_v where matricule like '%$matricule%'  ORDER BY id_panne DESC");



        if ($select->rowCount() > 0) {
            echo "<table class='table table-responsive table-bordered table-hover' id='liste_s'>
    <thead>
        <tr>
            <th>ID</th><th>Jour</th><th>Date</th><th>Place</th><th>Matricule</th><th>Marque</th><th>Type</th><th>Etat</th><th>Modifier</th><th>Supprimer</th>
        </tr>
    </thead>
    <tbody>";

            while ($donnees = $select->fetch(PDO::FETCH_OBJ)) {
                $id_panne = $donnees->id_panne;
                $date_p = $donnees->date_p;
                $etat = $donnees->etat;
                $type = $donnees->type;
                $marque = $donnees->marque;
                $matricule = $donnees->matricule;
                $id_v = $donnees->id_v;
                $jour = $donnees->jour;
                $place = $donnees->place;
                echo "<tr>";
                echo "<td>";
                echo $id_panne;
                echo "</td>";
                echo "<td>";
                echo $jour;
                echo "</td>";
                echo "<td>";
                echo $date_p;
                echo "</td>";
                echo "<td>";
                echo $place;
                echo "</td>";
                echo "<td>";
                echo $matricule;
                echo "</td>";
                echo "<td>";
                echo $marque;
                echo "</td>";
                echo "<td>";
                echo $type;
                echo "</td>";





                echo "<td>";
                if ($etat == "en panne") {
                    echo " <img src='img/nn.png' width='30' height='30'></img>";
                } else {
                    echo " <img src='img/ok.png' width='35' height='30'></img>";
                }

                echo "</td>";

                echo "<td>";
                echo "<a href='modifier_panne.php?id=$id_panne'>";
                echo " <img src='img/modif.png' width='35' height='30'></img> </a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='supprimer_panne.php?id=$id_panne'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la panne: ?&quot;)) { return true; } return false;'>";
                echo " <img src='img/del.png' width='30' height='30'></img> </a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<br><br><center><h3>Aucun resultat</h3>";
        }
    }
    
           public function info_panne($id) {
        $select = Database::connect()->query("select * from panne where id_panne=$id");
        $liste = $select->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    }

}
