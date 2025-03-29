<?php

require_once('../classes/Kontakt.php');
use formular\Kontakt;

$meno = $_POST['meno'];
$email = $_POST['email'];
$sprava = $_POST['sprava'];


if (empty($meno) || empty($email) || empty($sprava)) {
    die('Chyba: Všetky polia sú povinné!');
}

$kontakt = new Kontakt();
$ulozene = $kontakt->saveContact($meno, $email, $sprava);

if ($ulozene) {
    header('Location: ../thankyou.php');
    exit;
} else {
    die('error while sending data');
    http_response_code(404);
}
?>