<?php
require_once("header.php");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Liste chauffeur </small>
        </h1>

    </div>
</div>


<a href="ajouter_ch.php"><img src='img/ajout.png' width='30' height='30'></a>
<br><br>
<div id="chercher_s">
    <div class="row">

        <form class="form-horizontal" id="recherche" role="form" method="post">
            <div class="form-group">

                <div class="col-sm-10 col-sm-offset-1">
                    <input type="text" class="form-control" id="chaufeur" name="chaufeur" placeholder="Chercher par Nom & Prénom">

                </div>
                <div class="col-sm-1">


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
    <table class="table table-responsive table-bordered table-hover" id="liste_s">
        <thead>
            <tr>
                <th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Telephone</th><th>Disponibilité</th><th>Modifier</th><th>Archiver</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ch->liste_chauffeur();
            ?>
        </tbody>
    </table>
</div>

<script>
    $("#chaufeur").keyup(function () {

        var formData = $("#recherche").serialize();


        $.ajax({
            type: "POST",
            url: "chercher_chaufeur.php",
            cache: false,
            data: formData,
            success: onSucces,
            error: onErro

        });
        function onSucces(data, status) {

            $("#liste_s").hide('slow');
            $("#resultat").html(data);


        }
        function onErro(data, status) {
            alert('erreur de connexion');
        }

    });
</script>

</div>
<!-- /#page-wrapper -->
<?php
require_once("footer.php");
?>