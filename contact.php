<?php

$headers = "Challange.io";
$sendTo = "flipflopslt@gmail.com, liudas.stonys@gmail.com";
$subject = "New registration";
$email = $_POST["email"];

$okMessage = "Your registration was successful!";
$errorMessage = "Something went wrong. Please try again.";

try {
    if(count($_POST) == 0) throw new Exception ("Please enter you email.");
    $emailText = $email;
    mail($sendTo, $subject, $emailText);
    $responseArray = array('type' => 'success', 'message' => $okMessage);
} catch (Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded;
}
else {
    echo $responseArray['message'];
}
