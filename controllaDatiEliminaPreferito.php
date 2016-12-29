<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'gestorePreferiti.php';
$emailPreferito = $_GET['email'];
$emailUtente = $_SESSION['utenteLoggato'];
$gestorePreferiti = new gestorePreferiti();
if($gestorePreferiti->cancellaPreferito($emailUtente, $emailPreferito)){
    header("Location: utentiPreferiti.php");
    exit;
}
else{
    echo "C'è stato un errore nella cancellazione dell'utente dai preferiti.";
}