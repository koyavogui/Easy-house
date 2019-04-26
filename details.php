<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    require('bootstrap.php'); 
    session_start(); 
    include('database.php'); 
    ?>
    <title>Easy Home</title>
</head>
<body>
    <div class="container">
        <div></div>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="">
                        <img src="img/typemaison.jpg" alt="Lights" style="width:100%">
                        <div class="caption">
                            <div class="row">
                                <div class="col-md-6"> <h5>Loyer mensuel : </h5></div>
                                <div class="col-md-6"> <h5>Caution :</h5></div>
                            </div> 
                        </div>
                    </a>
                </div>
            </div>
        <?php
            $data = $db->query("SELECT * FROM maison WHERE pp_home = 9")->fetchAll();
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
                    <div class="col-md-6"><button class="btn btn-default">Voir plus</button></div>
                </div>
            </div>
            </a>
            </div>
            </div>';
            }
        ?>
        
        <div></div>
    </div>
</body>
</html>