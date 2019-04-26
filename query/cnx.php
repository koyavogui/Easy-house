<?php
    session_start();
    extract($_POST);
    var_dump($_POST);
    //Connexion a la base de données
    include('../database.php');

    
    
    $db = database::connect();
    if ($_POST['utilisateur'] === pp) {
        $sql = "SELECT * FROM proprietaire WHERE username_pp = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    print_r($user);
    echo '<br>';echo '<br>';echo '<br>';echo '<br>';
    
    //var_dump($db);echo ' basededonne <br>';
    var_dump($username); echo ' username <br>';
    var_dump($user['mpd_pp']); echo '<br>';
    if (($username === $user['username_pp']) && ($mpd == $user['mpd_pp']))
	{
        echo "valid!";
         
						$_SESSION['id']=$user['id_pp'];
						$_SESSION['nom']=$user['nom_pp'];
						$_SESSION['prenom']=$user['prenom_pp'];
						$_SESSION['age']=$user['age_pp'];
						$_SESSION['contact']=$user['contact_pp'];
						$_SESSION['adresse']=$user['adresse_pp'];
						$_SESSION['username']=$user['username_pp'];
						$_SESSION['mpd']=$user['mpd_pp'];
						header("location:../dashboard_pp.php");
	    //exit();
	} else {
	    echo "invalid";
	}
    } else {
        $sql = "SELECT * FROM locataire WHERE username_loc = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        print_r($user);
        echo '<br>';echo '<br>';echo '<br>';echo '<br>';
        
        //var_dump($db);echo ' basededonne <br>';
        var_dump($username); echo ' username <br>';
        var_dump($user['mpd_loc']); echo '<br>';
        if (($username === $user['username_loc']) && ($mpd == $user['mpd_loc']))
        {
            echo "valid!";
             
                            $_SESSION['id']=$user['id_loc'];
                            $_SESSION['nom']=$user['nom_loc'];
                            $_SESSION['prenom']=$user['prenom_loc'];
                            $_SESSION['age']=$user['age_loc'];
                            $_SESSION['contact']=$user['contact_loc'];
                            $_SESSION['adresse']=$user['adresse_loc'];
                            $_SESSION['username']=$user['username_loc'];
                            $_SESSION['mpd']=$user['mpd_loc'];
                            header("location:../dashboard_loc.php");
            //exit();
        } else {
            echo "invalid";
        }
    
    }
    
    
?>