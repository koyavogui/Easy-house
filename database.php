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
 ?>