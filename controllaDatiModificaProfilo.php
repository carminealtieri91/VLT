<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include 'gestoreProfilo.php';
include_once 'model/Utente.php';

$newEmail = $_POST['email'];
$newUsername = $_POST['username'];
$newPassword = $_POST['password'];
$utente = unserialize($_SESSION['utenteLoggato']);
$email = $utente->getEmail();
$gestoreProfilo = new gestoreProfilo();
if($gestoreProfilo->modificaProfilo($email, $newEmail, $newUsername, $newPassword)){
    $newUtente = $gestoreProfilo->recuperaProfilo($email);
    $_SESSION['utenteLoggato'] = serialize($newUtente);
    header("Location: modificaProfilo.php");
}
else {
    echo "C'è stato un errore nell'aggiornamento dei dati";
}
