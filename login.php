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
            <form action="query/cnx.php" method="post" enctype="multipart/form-data" class="well well-sm">
                <div class="form-group">
                    <label class="control-label" for="">Nom d'utilisateur</label>
                    <input type="text" class="form-control " name="username" placeholder="">        
                </div>
                
                <div class="form-group">
                    <label class="control-label" for="">Mot de Passe</label>
                    <input type="password" class="form-control " name="mpd" placeholder="">
                </div>
                <div class="form-group">
                    <label for="" class="label-control">Type d'utilisateur</label>
                    <select name="utilisateur" id="" class="form-control">
                        <option value="pp">Propietaire de Maison</option>
                        <option value="loc">Locataire de maison</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Connexion</button>
                </div>
            </form>
        </div>
    </div>
     <script src=""></script>  
    </body>
    </html>