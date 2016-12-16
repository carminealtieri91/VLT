<?php

session_start();

include 'gestoreProfilo.php';
include 'model/Utente.php';

$gestoreProfilo = new gestoreProfilo();
$utente = unserialize($_SESSION['utenteLoggato']);
$email = $utente->getEmail();
if($gestoreProfilo->cancellaProfilo($email)){
    header("Location: index.php");
}

