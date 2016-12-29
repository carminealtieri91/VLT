<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'gestorePrenotazione.php';
include_once 'visualizzatoreEvento.php';
include_once 'gestorePreferiti.php';
include_once 'model/Evento.php';
$id = $_GET['id'];
$visualizzatoreEvento = new visualizzatoreEvento();
$gestorePreferiti = new gestorePreferiti();
$gestorePrenotazione = new gestorePrenotazione();
$evento = $visualizzatoreEvento->visualizza($id);
$data = date_format(date_create($evento->getData()),'d/m/Y');
if($gestorePrenotazione->controllaPrenotazione($id, $_SESSION['utenteLoggato'])){
    $giaPrenotato = "si";
}
else{
    $giaPrenotato = "no";
}
if($gestorePreferiti->controllaPreferito($_SESSION['utenteLoggato'], $evento->getEmailOrganizzatore())){
    $utentePreferito = "si";
}
else {
    $utentePreferito = "no";
}

header("Content-type: text/xml");
echo '<?xml version="1.0"?>';
echo '<response>';
echo "<TitoloVinile>".$evento->getTitoloVinile()."</TitoloVinile>";
echo "<Info>".$evento->getDettagliEvento()."</Info>";
echo "<Localita>".$evento->getLocalita()."</Localita>";
echo "<Regione>".$evento->getRegione()."</Regione>";
echo "<Provincia>".$evento->getProvincia()."</Provincia>";
echo "<Data>".$data."</Data>";
echo "<Orario>".substr($evento->getOrario(), 0, 5)."</Orario>";
echo "<Ingresso>".$evento->getIngresso()."</Ingresso>";
echo "<Posti>".$evento->getPostiDisponibili()."</Posti>";
echo "<Telefono>".$evento->getNumTelefono()."</Telefono>";
echo "<Email>".$evento->getEmailOrganizzatore()."</Email>";
echo "<UtentePreferito>".$utentePreferito."</UtentePreferito>";
echo "<GiaPrenotato>".$giaPrenotato."</GiaPrenotato>";
echo '</response>';
