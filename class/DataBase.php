<?php
/*
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

class Database {

    public $connexion;

    public function __construct() {
        $this->connexion = NULL;
    }

    public static function connect() {

        try {
           $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
            $connexion = new PDO($dsn, DB_USER, DB_PASS);
            return $connexion;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
*/
class Database {

	public $connexion ;
	
	public function __construct() 
	{
		$this->connexion = NULL;
	}

	public static function connect() {
		
			$connexion = new PDO('mysql:host=localhost;dbname=parc', 'root', '');

			$connexion->exec("SET CHARACTER SET utf8");
		return $connexion;
	}
	
}  




?>