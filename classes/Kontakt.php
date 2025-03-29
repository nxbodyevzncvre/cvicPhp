<?php
namespace formular;

require_once("../db/Database.php");
use db\Database;

class Kontakt {
    private $connection;

    public function __construct() {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function saveContact($meno, $email, $sprava) {
        $sql = "INSERT INTO udaje(meno, email, sprava) VALUES (:meno, :email, :sprava)";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(":meno", $meno);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":sprava", $sprava);

        try {
            $statement->execute();
            http_response_code(200);
            return true; 
        } catch (\PDOException $e) {
            error_log("Error saving contact: " . $e->getMessage());
            return false;
        }
    }
}
?>