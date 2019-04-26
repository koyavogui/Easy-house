<?php 
    //demarrage d'une session
    session_start();
    extract($_POST);
    //Connexion a la base de données
    include('../database.php');

   $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['username_pp'];
   

   if (!(file_exists("../img/".$dossier))) {
    $target_dir = mkdir("../img/".$dossier);
}
else{
    $target_dir = "../img/".$dossier;
}
    //$target_file spécifie le chemin du fichier à télécharger
    $target_file[0] = $target_dir.basename($_FILES['photo']['name'][0]);
    $target_file[1] = $target_dir.basename($_FILES['photo']['name'][1]);
    $target_file[2] = $target_dir.basename($_FILES['photo']['name'][2]);

    //$imageFileType contient l'extension de fichier du fichier
    $imageFileType[0] = strtolower(pathinfo($target_file[0],PATHINFO_EXTENSION));
    $imageFileType[1] = strtolower(pathinfo($target_file[1],PATHINFO_EXTENSION));
    $imageFileType[2] = strtolower(pathinfo($target_file[2],PATHINFO_EXTENSION));
    
    if(!empty($_POST)) {
        $check[0] = getimagesize($_FILES["photo"]["tmp_name"][0]);
        $check[1] = getimagesize($_FILES["photo"]["tmp_name"][1]);
        $check[2] = getimagesize($_FILES["photo"]["tmp_name"][2]);
        //var_dump();


        if(($check[0] !== false) && ($check[1] !== false) && $check[2] !== false) {
            echo "le fichier est une image - " . $check[0]["mime"] . ".";
            echo "le fichier est une image - " . $check[1]["mime"] . ".";
            echo "le fichier est une image - " . $check[2]["mime"] . ".";
            $uploadOk = 1;
            var_dump($_FILES['photo']['name'][0]);
            var_dump($_FILES['photo']['name'][1]);
            var_dump($_FILES['photo']['name'][2]);
            echo '<br>';
            echo '<br>';
            echo 'verification de basename <br>';
            var_dump(basename($_FILES['photo']['name'][0]));
            echo '<br>';echo '<br>';
            var_dump($_SESSION);
        } else {
            echo "File n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // téléchargerment des fichiers JPG, JPEG, PNG et GIF uniquement.
    if(($imageFileType[0] != ("jpg" && "png" && "jpeg" && "gif")) && ($imageFileType[1] != ("jpg" && "png" && "jpeg" && "gif")) && 
    ($imageFileType[2] != ("jpg" && "png" && "jpeg" && "gif")) ){
        echo " desolé, ce fichier n'est pas une image";
    }
    $db = database::connect();
        if(!empty($_POST)){
            $data = [
                'typemaison'=>$typemaison,
                'nombredepiece'=>$nombredepiece,
                'loyermensuel'=>$loyermensuel,
                'caution'=>$caution,
                'meuble'=>$meuble,
                'pphome' =>$_SESSION['id_pp'],
                'img1'=>$_FILES['photo']['name'][0],
                'img2'=>$_FILES['photo']['name'][1],
                'img3'=>$_FILES['photo']['name'][2],
                
            ];
            $req =$db->prepare('INSERT INTO maison(
               num_home,
               type_home,
               nbrep_home,
               loyer_home,
               caution_home,
               etatmeuble_home,
               pp_home,
               img1,
               img2,
               img3,
               ) 
                VALUES("", :typemaison, :nombredepiece, :loyermensuel, :caution, :meuble, :pphome, :img1, :img2, :img3)');
                $succes = $req->execute($data);
                if ($succes)
                {
                    $name[0] = basename($_FILES['photo']['name'][0]);
                    $name[1] = basename($_FILES['photo']['name'][1]);
                    $name[2] = basename($_FILES['photo']['name'][2]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name[0]");
                    move_uploaded_file($_FILES["photo"]["tmp_name"][1], "$target_dir/$name[1]");
                    move_uploaded_file($tmp_name, "$uploads_dir/$name[2]");
                    header('location:../dashboard_pp.php');
            }
        
                echo '<br> Valeur de la variable succes  ';
                var_dump($succes);
                echo '<br>'; 
                
        } 

        
        
        echo '<br>';echo '<br>';
        var_dump($data);
       
?>