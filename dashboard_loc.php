<?php 
        session_start();
        include("database.php");
        $db = database::connect();
    ?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php require('bootstrap.php') ?>
        <title>Easy House</title>
    </head>
    <body>
    <div class="container">
        <div class="row"><?php require('nav-dash.php') ?></div>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Acceuil</a></li>
                <li><a data-toggle="tab" href="#menu1">Studios</a></li>
                <li><a data-toggle="tab" href="#menu2">Appartement</a></li>
                <li><a data-toggle="tab" href="#menu3">Maison</a></li>
                <li><a data-toggle="tab" href="#menu4">Villa</a></li>
                <li><a data-toggle="tab" href="#menu5">Bungalow</a></li>               
                <li><a data-toggle="tab" href="#menu6">Maison de Ville</a></li>                
                <li><a data-toggle="tab" href="#menu7">Domaine</a></li>                
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <h3>Toute vos Maisons</h3>                
                    <div class="row" id="typemaison">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="studio.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Studio</h3>
                                    <p>Voir les 19 Studios</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="appartement.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Appartement</h3>
                                    <p>Voir les 19 Appartements</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="maison.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Maison</h3>
                                    <p>Voir les 19 Maisons</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="villa.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Villa</h3>
                                    <p>Voir les 19 Villas</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="bungalow.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Bungalow</h3>
                                    <p>Voir les 19 Bungalows</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="manoir.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Manoir</h3>
                                    <p>Voir les 19 Manoirs</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="maisondeville.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Maison de Ville</h3>
                                    <p>Voir les 19 Maisons de Ville</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="domaine.php">
                                    <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                    <h3>Domaine</h3>
                                    <p>Voir les 19 Dommaines</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                <h3>Tous les Studios</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='studio'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                <h3>Tous les Appartements</h3>
                <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='appartement'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Toutes les Maisons</h3>
                    <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='maison'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3>Toutes les Villas</h3>
                    <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='villa'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <h3>Tous les Bungalow</h3>
                    <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='bungalow'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <h3>Toutes les Maisons de Ville</h3>
                    <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='maison de ville'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <h3>Tous les Domaines</h3>
                    <div class="row">
                    <?php 
                    $data = $db->query("SELECT * FROM koh WHERE typekoh ='domaine'")->fetchAll();
                    //preparation du chemin de l'image à afficher.
                    $dossier= $_SESSION['nom'].$_SESSION['prenom'].$_SESSION['adresse'];
                    ?>
                    <!-- Debut de la carte  avec meuble -->
                    <?php foreach ($data as $row) {?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                    <h3><?php echo $row['typekoh'] ;?></h3>
                                    <p>Loyer Mensuel : <?php echo $row['loyermaison'] ; ?> fr</p>
                                    <p>Causion : <?php echo $row['loyermaison']*$row['caution'] ?>  fr</p>
                                    <p><span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></p>
                                    <a href="contrat.php?<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Louer </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                </div>
            </div>
</div>
        </div>        
    </div>
    </html>
    