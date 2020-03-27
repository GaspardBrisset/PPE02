<?php

    class DatabaseLinker
    {
	private static $urlBdd="mysql:host=localhost; dbname=bdd_tacos; charset=utf8";
	private static $username="root";
	private static $password="root";
	private static $connexionPdo;
		
	public static function getConnexion()
	{
            if(DatabaseLinker::$connexionPdo==null)
            {
		DatabaseLinker::$connexionPdo=new PDO(DatabaseLinker::$urlBdd,DatabaseLinker::$username,DatabaseLinker::$password);
            }
            return DatabaseLinker::$connexionPdo;
	}
    }

?>
