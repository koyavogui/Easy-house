<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>test</title>
</head>
<body class="container">
    <form action="ajout.php" method="post" enctype="multipart/form-data" class="well">
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
        <div class="form-group"><label for="">Image</label><input type="file" class="form-control" name="photo"></div>

        <button type="submit" class="btn btn-default"> Send</button>
    </form>
</body>
</html>




<?php
            $data = $db->query("SELECT * FROM maison")->fetchAll();
            // and somewhere later:
            $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['username_pp'];
            foreach ($data as $row) {
                //echo $row['num_home']." ".$row['pp_home']."<br />\n";
                echo  '
                <div class="col-md-4">
                    <div class="thumbnail">
                            <a href=" ">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicateur -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
    
                             <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">';
                echo '<img src="img/'.$dossier.'/'.$row['img1'].'" alt="Chicago">';
                echo '</div><div class="item"><img src="img/'.$dossier.'/'.$row['img2'].'" alt="Chicago">';
                echo '</div><div class="item"><img src="img/'.$dossier.'/'.$row['img3'].'" alt="Chicago">';
                echo ' </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                <div class="caption">
                <div class="row">
                    <div class="col-md-6"> <h5>Loyer mensuel :'.$row['loyer_home'] .' f </h5></div>
                    <div class="col-md-6"> <h5>Caution : '.$row['loyer_home']*$row['caution_home'].'</h5></div>
                </div> 
                <div class="row">
                    <div class="col-md-6"><p>Lorem ipsum...</p></div>
                    <div class="col-md-6"><a class="btn btn-default" href="view.php?id='.$row['num_home'].'">Voir</a></div>
                </div>
            </div>
            </a>
            </div>
            </div>';
            }
        ?>