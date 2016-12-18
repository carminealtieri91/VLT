<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include_once 'gestoreProfilo.php';

$newEmail = $_POST['email'];
$newUsername = $_POST['username'];
$newPassword = $_POST['password'];
$email = $_SESSION['utenteLoggato'];
$gestoreProfilo = new gestoreProfilo();
if($gestoreProfilo->modificaProfilo($email, $newEmail, $newUsername, $newPassword)){
    $_SESSION['utenteLoggato'] = $newEmail;
    header("Location: modificaProfilo.php");
}
else {
    echo "C'è stato un errore nell'aggiornamento dei dati";
}
