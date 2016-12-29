<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestorePrenotazione.php';
include_once 'gestoreEvento.php';
include_once 'visualizzatoreEvento.php';
$gestorePrenotazione = new gestorePrenotazione();
$gestoreEvento = new gestoreEvento();
$visualizzatoreEvento = new visualizzatoreEvento();
$evento = $visualizzatoreEvento->visualizza($_GET['evento']);

if($_GET['tipo']=="effettuare"){
    if($gestorePrenotazione->inserisciPrenotazione($_GET['evento'], $_GET['utente'])){
        $gestoreEvento->aggiornaPosti($evento->getPostiDisponibili()-1, $_GET['evento']);
    }
    else {
        echo "C'è stato un errore nella gestione della prenotazione all'evento.";
    }
}

else if($_GET['tipo']=="annullare"){
    if($gestorePrenotazione->annullaPrenotazione($_GET['evento'], $_GET['utente'])){
        $gestoreEvento->aggiornaPosti($evento->getPostiDisponibili()+1, $_GET['evento']);
    }
    else {
        echo "C'è stato un errore nella gestione della prenotazione all'evento.";
    }
}