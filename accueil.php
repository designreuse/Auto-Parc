<?php
require_once("header.php");
?>
<br><br><br><br><br>
    <div class="row">
        
                   
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-3">
                                        <i class="fa fa-road fa-5x"></i>
                                    </div>
                                    <br>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            
                                            <?php 
                                            $sortie->total_sortie();
                                            ?>
                                            
                                        </div>
                                        <div>Sortie</div>
                                    </div>
                                </div>
                            </div>
                            <a href="liste_sortie.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Liste des sorties</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
         <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <br>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $ch->total_chauffeur()
                                            ?>
                                        </div>
                                        <div>Chauffeur</div>
                                    </div>
                                </div>
                            </div>
                            <a href="liste_chauffeur.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Liste chauffeur</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
<br><br><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-3">
                                        <i class="fa fa-car fa-5x"></i>
                                    </div>
                                    <br>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php 
                                            $vh->total_voiture();
                                            ?>
                                        </div>
                                        <div>Voiture</div>
                                    </div>
                                </div>
                            </div>
                            <a href="liste_vehicule.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Liste des véhicules</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <br>
                                    <div class="col-xs-3">
                                        <i class="fa fa-truck fa-5x"></i>
                                    </div>
                                    <br>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php 
                                            $vh->total_camion();
                                            ?>
                                        </div>
                                        <div>Camion</div>
                                    </div>
                                </div>
                            </div>
                            <a href="liste_vehicule.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Liste des véhicules</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


<?php
require_once 'footer.php';
?>