<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'gestoreFeedback.php';
$gestoreFeedback = new gestoreFeedback();
$inviaVotazione = $_SESSION['utenteLoggato'];
$riceveVotazione = $_GET['utente'];
$voto = $_POST['voto'];
if($gestoreFeedback->inserisciFeedback($inviaVotazione, $riceveVotazione, $voto)){
    header("Location: utentiPreferiti.php");
    exit;
}
else{
    echo "C'è stato un errore nell'inserimento del feedback. Assicurati di non aver già dato un voto a questo utente.";
}