<?php 
    //demarrage d'une session
    session_start();
    extract($_POST);
    var_dump(extract($_POST));
    //Connexion a la base de données
    include('../database.php');
    $db = database::connect();
    if ($_POST['utilisateur'] === pp) {
        $req = $db->prepare('SELECT COUNT(*) AS nombre FROM 
        proprietaire WHERE  username_pp=?');
    
        $req->execute(array($username));
    
        while ($resultat = $req->fetch()) {
        $nombre=$resultat['nombre'];
        }
    
        if ($nombre==1){
            echo $nombre;
            header("location:");
        } else {
            if(!empty($_POST)){
                $data = [
                    'nom'=>$nom,
                    'prenom'=>$prenom,
                    'age'=>$age,
                    'contact'=>$contact,
                    'adresse'=>$adresse,
                    'username'=>$username,
                    'mpd'=>$mpd,
                ];
                $req =$db->prepare('INSERT INTO proprietaire(id_pp, nom_pp, prenom_pp, age_pp, contact_pp, adresse_pp, username_pp ,mpd_pp) 
                    VALUES("", :nom, :prenom, :age, :contact, :adresse, :username, :mpd)');
                    $succes = $req->execute ($data);
                    
            } 
            var_dump($succes);
            if ($succes)
            {
                //declaration de session
                $_SESSION['nom']=$nom;
                $_SESSION['prenom']=$prenom;
                $req=$db->query('SELECT * FROM proprietaire WHERE username_pp='.$username);
                foreach((array)$req as $resultat){
                $_SESSION['id']=$resultat['id_pp'];
                $_SESSION['nom']=$resultat['nom_pp'];
                $_SESSION['prenom']=$resultat['prenom_pp'];
                $_SESSION['age']=$resultat['age_pp'];
                $_SESSION['contact']=$resultat['contact_pp'];
                $_SESSION['adresse']=$resultat['adresse_pp'];
                header('location:../dashboard_pp.php');
            }
            }
        
        }
      
    } else {
        $req = $db->prepare('SELECT COUNT(*) AS nombre FROM 
        locataire WHERE  username_loc=?');
    
        $req->execute(array($username));
    
        while ($resultat = $req->fetch()) {
        $nombre=$resultat['nombre'];
        }
    
        if ($nombre==1){
            echo $nombre;
            header("location:");
        } else {
            if(!empty($_POST)){
                $data = [
                    'nom'=>$nom,
                    'prenom'=>$prenom,
                    'age'=>$age,
                    'contact'=>$contact,
                    'adresse'=>$adresse,
                    'username'=>$username,
                    'mpd'=>$mpd,
                ];
                $req =$db->prepare('INSERT INTO locataire(id_loc, nom_loc, prenom_loc, age_loc, contact_loc, adresse_loc, username_loc ,mpd_loc) 
                    VALUES("", :nom, :prenom, :age, :contact, :adresse, :username, :mpd)');
                    $succes = $req->execute ($data);
                    
            } 
            var_dump($succes);
            if ($succes)
            {
                //declaration de session
                $_SESSION['nom']=$nom;
                $_SESSION['prenom']=$prenom;
                $req=$db->query('SELECT * FROM locataire WHERE username_loc='.$username);
                foreach((array)$req as $resultat){
                $_SESSION['id']=$resultat['id_loc'];
                $_SESSION['nom']=$resultat['nom_loc'];
                $_SESSION['prenom']=$resultat['prenom_loc'];
                $_SESSION['age']=$resultat['age_loc'];
                $_SESSION['contact']=$resultat['contact_loc'];
                $_SESSION['adresse']=$resultat['adresse_loc'];
                header('location:../dashboard_loc.php');
            }
            }
        
        }
    
    }
    
    
    
    echo $_POST['nom']."<br>";
    echo $age."<br>";
    //verification de l'existence d'un utilisateur


?>