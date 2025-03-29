<?php
namespace db;
require_once("config.php");
use PDO;

class Database{
    private $conn;
    public function __construct() {
        $this->connect();
    }
    
    public function getConnection(){
        if ($this->conn === null) {
            $this->connect();
        }
        return $this->conn;
    }
    private function connect(){
        $config = DATABASE;

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try{
            $this->conn = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], $config['USER_NAME'], $config['PASSWORD'], $options);


        }catch(PDOException $e){
            die("Error getting connection: " . $e->getMessage());
        }

        
    }
}

?>