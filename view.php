 <?php 
        session_start();
        include("database.php");
        $db = database::connect();
        if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $data = $db->query("SELECT * FROM koh WHERE num = ".$id)->fetchAll();
    $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['adresse_pp'];
    foreach ($data as $row) {    }
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
                    <div class="col-sm-6">
                            <h1><strong>Details <?php echo '  '.$row['typekoh'];?></strong></h1>
                            <br>
                            <form>
                            <div class="form-group">
                                <label>Loyer Mensuel:</label><?php echo '  '.$row['loyermaison'];?>
                            </div>
                            <div class="form-group">
                                <label>Caution:</label><?php echo '  '.$row['loyermaison']*$row['caution'].' f';?>
                            </div>
                            <div class="form-group">
                                <label>Etat des Meuble:  <span <?php 
                                if ($row['etatmeuble'] == "sans meuble") {echo 'class="label label-warning"';
                                    } else{ echo 'class="label label-success"';} ?> ><?php echo '  '.$row['etatmeuble']?></span></label>
                            </div>
                            </form>
                            <br>
                            <div class="form-actions">
                            <a class="btn btn-primary" href="dashboard_pp.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                            </div>
                    </div> 
                    <div class="col-sm-6 site">
                        <div class="thumbnail">
                            <img src="img/<?php echo $dossier.'/'.$row['img']; ?>" alt="Lights" style="width:100%">                        
                        </div>
                    </div>
            </div>   
        </div>   
    </body>
</html>