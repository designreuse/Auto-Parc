<?php
require_once("header.php");
?>




<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Consulter Véhicule </small>
        </h1>

    </div>
</div>
<br>

<?php
$id = $_GET["id"];
$liste = $vh->select_vehicule($id);

foreach ($liste as $row) {
    ?>
    <br>
    <a href="" onclick='window.print();'><img src='img/print.png' width='30' height='30'></img> </a>
   
    <br><br>
    <table class="table table-responsive table-bordered table-hover">

        <tbody>

            <tr>

                <td>
                    ID : 
                </td>
                <td>
    <?php
    echo $row["id_v"];
    ?>
                </td>
            </tr>

            <tr>

                <td>
                    Marque : 
                </td>
                <td>
    <?php
    echo $row["marque"];
    ?>
                </td>
            </tr>

            <tr>

                <td>
                    Matricule : 
                </td>
                <td>
    <?php
    echo $row["matricule"];
    ?>
                </td>
            </tr>

            <tr>

                <td>
                    Age : 
                </td>
                <td>
    <?php
    $date_n = date('Y:m:d');
    $date_f = $row["date_f"];
    $age = $date_n - $date_f;
    if ($age == 0) {
        echo 1;
    } else {
        echo $age;
    }
    ?>
                </td>
            </tr>




<?php } ?>

    </tbody>
</table>
<br>
<h4>Liste des pannes</h4>
<br>
<table class="table table-responsive table-bordered" id="liste_s">
    <thead>
        <tr>
            <th>ID</th><th>Jour</th><th>Date</th><th>Place</th><th>Etat</th>
        </tr>
    </thead>
    <tbody>
<?php
$panne->select_panne($id);
?>
    </tbody>
</table>





        <?php
        require_once('footer.php');
        ?>