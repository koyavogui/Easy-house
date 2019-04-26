    <?php
        //demarrage d'une session
        session_start();
        extract($_POST);
        var_dump(extract($_POST));
        //Connexion a la base de données
        include('../database.php');
        $db = database::connect();

        // vérification de l'image
        if(!empty($_FILES)){
            $photo=$_FILES['photo'];
            $nom_photo=$photo['name'];
            $ext=strtolower(substr($nom_photo,-3));
            $verif_ext=array("jpg","png","gif");
            }
            var_dump($_POST);
        if (in_array($ext, $verif_ext)){
            $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['adresse_pp'];
            
                // Preparation de la requete d'insertion
                $req =$db->prepare('INSERT INTO koh(
                    typekoh, 
                    piece,
                    loyermaison,
                    caution,
                    etatmeuble,
                    img,
                    proprietaire) 
                    VALUES(?,?,?,?,?,?,?)');
                $succes = $req->execute ([$typemaison,$nombredepiece,$loyermensuel,$caution,$etatmeuble,$nom_photo,$_SESSION['id_pp']]);
            
            if ($succes) {
                //Vérification si le dossier existe ou pas pour telecharger l'image
                mkdir("../img/".$dossier);
                //importation d'image                
                move_uploaded_file($photo['tmp_name'],"../img/".$dossier."/".$photo['name']);
                var_dump($succes);
                var_dump($nom_photo);
                var_dump($_POST);
                //retour
                header('location:../dashboard_pp.php');
            }
        }
                
    ?>