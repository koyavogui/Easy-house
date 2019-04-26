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
        <div class="row">
        <?php require('nav.php') ?>
        </div>
        <div class="row">
        <?php 
                        $data = $db->query("SELECT * FROM koh WHERE typekoh ='appartement'")->fetchAll();
                        //preparation du chemin de l'image à afficher.
                        $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['adresse_pp'];
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
     <script src=""></script>  
    </body>
    </html>