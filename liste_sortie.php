<?php
require_once("header.php");
?>




<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Liste sortie </small>
        </h1>

    </div>
</div>
<br>
<a href="ajouter_sortie.php"><img src='img/ajout.png' width='30' height='30'></a>
<a href="liste_sortie.php"><img src='img/liste.png' width='30' height='30'></a>

<br><br>

<?php
$user->affichage();
?>
<br>
<div id="chercher_s">
    <div class="row">
        <form class="form-horizontal" id="recherche" role="form" method="post">
            <div class="form-group">
                <label for="firstname" class="col-sm-1 control-label"> </label>
                <div class="col-sm-2">
                    <select class="form-control" name="jour">
                        <option selected value="">Jour</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="mois">
                        <option selected value="">Mois</option>
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="annes">
                        <option selected value="">Année</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option  value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="type">
                        <option selected value="">Type</option>
                        <option value="voiture">Voiture</option>
                        <option value="camion">Camion</option>

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
<div id="resultat">

    <table class="table table-responsive table-bordered table-hover" id="liste_s">
        <thead>
            <tr>
                <th>ID</th><th>Jour</th><th>Date</th><th>Véhicule </th><th>Nom & Prénom</th><th>Heur de sortie</th><th>Heur de retour</th><th>Direction</th><th>Consulter</th><th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
<?php
$sortie->liste_sortie();
?>
        </tbody>
    </table>

</div>

<script>





    $("#btn-sub").click(function () {
        var formData = $("#recherche").serialize();


        $.ajax({
            type: "POST",
            url: "chercher.php",
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
            alert('erreur');
        }

    });
    $(".fakeloader").fakeLoader({

// Time in milliseconds for fakeLoader disappear
timeToHide:1200, 

// 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7' 
spinner:"spinner1",//Options: 

// Background color. Hex, RGB or RGBA colors
bgColor:"#2ecc71",

// Custom loading GIF.
imagePath:"yourPath/customizedImage.gif" 
            
});
</script>


<?php
require_once 'footer.php';
?>