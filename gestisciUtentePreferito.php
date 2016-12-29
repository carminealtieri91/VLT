<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestorePreferiti.php';

$emailUtente = $_GET['utente'];
$emailPreferito = $_GET['preferito'];

$gestorePreferiti = new gestorePreferiti();
if(!$gestorePreferiti->controllaPreferito($emailUtente, $emailPreferito)){
    $gestorePreferiti->inserisciPreferito($emailUtente, $emailPreferito);
}
else{
    $gestorePreferiti->cancellaPreferito($emailUtente, $emailPreferito);
}