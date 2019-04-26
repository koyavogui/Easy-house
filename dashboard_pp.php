
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
                <li><a data-toggle="tab" href="#menu1">Maison En Location</a></li>
                <li><a data-toggle="tab" href="#menu2">Maison Libre</a></li>
                <li><a data-toggle="tab" href="#menu3">Ajouter une maison</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Toute vos Maison</h3>
                    
                    <div class="row">
                    <!-- Debut de la carte-->
                    
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                <h3>Appartement</h3>
                                <p>Voir les 19 Appartements</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- fin de la carte de la carte-->
                    <?php 
                        $data = $db->query("SELECT * FROM koh WHERE proprietaire =".$_SESSION['id'])->fetchAll();
                        //preparationi du chemin de l'image à afficher.
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
                                    <a href="view.php?id=<?php echo $row['num'] ; ?>" class="btn btn-primary btn-sm"> Voir</a>
                                </div>
                            </a>
                        </div>
                    </div>
                     <?php } ?>
                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Maison en Location</h3>
                    <div class="row">
                    <!-- Debut de la carte-->
                    
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                <h3>Appartement</h3>
                                <p>Voir les 19 Appartements</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Maison Libre</h3>
                    <div class="row">
                    <!-- Debut de la carte-->
                    
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="">
                                <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                                <!-- legende de la carte-->                  
                                <div class="caption">
                                <h3>Appartement</h3>
                                <p>Voir les 19 Appartements</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- fin de la carte de la carte-->
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                <h3>Ajoutez une maison</h3>
                <form action="query/ajoutkoh.php" method="post" enctype="multipart/form-data" class="well">
                    <div class="form-group">
                        <label for="">Type de maison : </label>
                        <select name="typemaison" class="form-control">
                            <option value="studio">Studio</option>
                            <option value="appartement">Appartement</option>
                            <option value="maison">Maison</option>
                            <option value="villa">Villa</option>
                            <option value="bungalow">bungalow</option>
                            <option value="manoir">Manoir</option>
                            <option value="maison de ville">Maison de ville</option>
                            <option value="domaine">Domaine</option>
                        </select>    
                    </div>
                    <div class="form-group"><label for="">Nombre de Pièces</label><input type="text" class="form-control" name="nombredepiece"></div>
                    <div class="form-group"><label for="">Loyer mensuel</label><input type="text" class="form-control" name="loyermensuel"></div>
                    <div class="form-group"><label for="">Nombre de mois de Caution</label><input type="text" class="form-control" name="caution"></div>
                    <div class="form-group"><label for="">Etat des meubles</label>
                        <select name="etatmeuble" id="" class="form-control">
                            <option value="avec meuble">Avec Meuble</option>
                            <option value="sans meuble">Sans Meuble</option>
                        </select>
                    </div>
                    <div class="form-group"><label for="">Image</label><input type="file" class="form-control" name="photo"></div>
                    <button type="submit" class="btn btn-default"> Send</button>
                </form>
                </div>
            </div>
</div>
        </div>        
    </div>
    <body>
    </html>