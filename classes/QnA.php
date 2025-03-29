<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__DIR__ . '/../db/Database.php');
use db\Database;

class QnA {
    private $connection;

    public function __construct() {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function getAllQuestionsAndAnswers() {
        try {
            $sql = "SELECT otazka, odpoved FROM qna";
            $statement = $this->connection->query($sql);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("error while reading q and a " . $e->getMessage());
        }
    }

    public function insertQnA() {
        try {
            $data = json_decode(file_get_contents('../datas.json'), true);
            $otazky = $data["otazky"];
            $odpovede = $data["odpovede"];

            $this->connection->beginTransaction();

            $sql = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $checkSql = "SELECT COUNT(*) FROM qna WHERE otazka = :otazka AND odpoved = :odpoved";
            $statement = $this->connection->prepare($sql);
            $checkStatement = $this->connection->prepare($checkSql);

            for ($i = 0; $i < count($otazky); $i++) {

                $checkStatement->bindParam(':otazka', $otazky[$i]);
                $checkStatement->bindParam(':odpoved', $odpovede[$i]);
                $checkStatement->execute();
                $exists = $checkStatement->fetchColumn(); // check if smth exists

                if ($exists == 0) { 
                    $statement->bindParam(':otazka', $otazky[$i]);
                    $statement->bindParam(':odpoved', $odpovede[$i]);
                    $statement->execute();
                } else {
                    echo "already have these data" . $otazky[$i] . " - " . $odpovede[$i] . "\n";
                }
            }

            $this->connection->commit();
            echo "success"; 
        } catch (\PDOException $e) {
            $this->connection->rollBack();
            die("error while inserting data " . $e->getMessage());
        } finally {
            $this->connection = null;
        }
    }
}
?>