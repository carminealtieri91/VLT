<?php

session_start();

include_once 'gestoreProfilo.php';

$gestoreProfilo = new gestoreProfilo();
$email = $_SESSION['utenteLoggato'];
if($gestoreProfilo->cancellaProfilo($email)){
    header("Location: index.php");
}

