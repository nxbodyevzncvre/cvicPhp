<?php

$host = "localhost";
$dbname = "formular";
$port = 8888;
$username = "root";
$password = "root";


$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);

try{
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";port=" . $port, $username, $password, $options);

}catch(Exception $e){
    error_log("Failed to connect to database");
    die($e->getMessage());

}



$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];

$sql = "INSERT INTO udaje(meno, email, sprava) VALUES(:meno, :email, :sprava)";

$stmt = $conn->prepare($sql);


$stmt->bindParam(':meno', $meno);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':sprava', $sprava);

try{
    $stmt->execute();
    header("Location: http://localhost:8888/cvika/thankyou.php");
    return "Done";

}catch(Exception $e){
    return false;
}


$conn = null;






?>