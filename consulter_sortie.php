<?php
require_once("header.php");
?>




<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Consulter sortie </small>
        </h1>

    </div>
</div>
<br>

<?php
$user->affichage();
?>

<?php
$id = $_GET["id"];
$liste = $sortie->select_sortie($id);

foreach ($liste as $row) {
    ?>
    <br>
    <a href="" onclick='window.print();'><img src='img/print.png' width='30' height='30'></a>
    <a href="liste_sortie.php"><img src='img/liste.png' width='30' height='30'></a>

    <br><br>
   


            <table class="table table-responsive table-bordered table-hover">

                <tbody>

                    <tr>

                        <td>
                            ID : 
                        </td>
                        <td>
                            <?php
                            echo $row["id_sortie"];
                            ?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Date : 
                        </td>
                        <td>
                            <?php
                            echo $row["date"];
                            ?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Heur de sortie : 
                        </td>
                        <td>
                            <?php
                            echo $row["heur_s"];
                            ?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Heur de retour : 
                        </td>
                        <td>
                            <?php
                            echo $row["heur_r"];
                            ?>
                        </td>
                    </tr>



                    <tr>

                        <td>
                            Type de vehicule : 
                        </td>
                        <td>
                            <?php
                            echo $row["type"];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Matricule de vehicule : 
                        </td>
                        <td>
                            <?php
                            echo $row["matricule"];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nom & Prenom de chauffeur : 
                        </td>
                        <td>
                            <?php
                            echo $row["nom"] . " " . $row["prenom"];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Direction : 
                        </td>
                        <td>
                            <?php
                            echo $row["direction"];
                            ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

  

<?php
require_once('footer.php');
?>