<?php 
	class database 
	{
	    private static $dbhost = "localhost";
	    private static $dbname = "easyhome";
	    private static $dbuser = "root";
	    private static $dbpassword = "";

	    private static $connection = null;

	    public static function connect()
	    {
	        try {
	        	self::$connection = new PDO("mysql:host=" .self::$dbhost. ";dbname=".self::$dbname  , self::$dbuser, self::$dbpassword);
	        } catch (PDOException $e) {
	        	die($e->getMessage());
	        }
	        return self::$connection;
	    }
	    public static function disconnect()
	    {
	    	self::$connection = null;
	    }
	}
	//INSERT INTO bdconnect (nom,prenom,age) values ($nom,$prenom,$age);
    //header();
    session_start();
    extract($_POST);

    $photo=$_FILES['photo'];
    print_r($photo)."<hr>";
    //verification de l'image
    if(!empty($_FILES)){
    $photo=$_FILES['photo'];
    $nom_photo=$photo['name'];
    $ext=strtolower(substr($nom_photo,-3));
    $verif_ext=array("jpg","png","gif");
        }
    var_dump($_POST);
    $db = database::connect();
    if(!empty($_POST)){
        $req =$db->prepare('INSERT INTO koh (typekoh, piece, loyermaison, caution, etatmeuble, img, proprietaire) VALUES (?,?,?,?,?,?,?)');
        $succes = $req->execute([
        $typemaison, 
        $nombredepiece,
        $loyermensuel,
        $caution,
        $etatmeuble, 
        $nom_photo,
        $_SESSION['id_pp']]);
        $dossier= $_SESSION['nom_pp'].$_SESSION['prenom_pp'].$_SESSION['username_pp'];
        if ($succes) {
            move_uploaded_file($photo['tmp_name'],"../img/". $dossier."/".$photo['name']);
            var_dump($succes);
            var_dump($_POST);
            header('location :../dashboard.php');
        }
    }
 ?>