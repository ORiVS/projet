<?php class Database {
    private static $dbName = 'samuel' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;
    public function __construct() {
        die('Init function is not allowed');
    } //constructeur
    public static function connect() {
        if ( null == self::$cont ) {
            try {
                self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
                /*crée une nouvelle instance de l'objet PDO en PHP
                 crée une connexion à une base de données MySQL avec
                  les options d'hôte, de nom de base de données, de nom d'utilisateur et de mot de passe spécifiées.*/
                 // echo 'CONNEXION REUSSIE';
            } catch(PDOException $e) {
                die($e->getMessage()); 
            }
       }
       return self::$cont;
    }
     
    public static function disconnect(){
        self::$cont = null;
    }
}
?>
        