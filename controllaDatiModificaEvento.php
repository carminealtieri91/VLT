<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestoreEvento.php';
include_once 'model/Evento.php';

$id = $_GET['id'];

$gestoreEvento = new gestoreEvento();
if(isset($_POST['ingresso']) && $_POST['ingresso'] == 'gratuito'){
    $ingresso = 'Gratuito';
}
else if(isset($_POST['ingresso']) && $_POST['ingresso'] == 'costo'){
    $ingresso = $_POST['prezzo'];
}
$data = $_POST['giorno'].'-'.$_POST['mese'].'-'.$_POST['anno'];
$orario = $_POST['hh'].":".$_POST['mm'];
$evento = new Evento($_POST['titolo'], $_POST['info'], null, $ingresso, $_POST['localita'], $_POST['regione'], $_POST['provincia'], $data, $orario, $_POST['posti'], $_POST['telefono'], $_POST['email']);
if($gestoreEvento->modificaEvento($evento, $id)){
    header("Location: modificaEvento.php?id=".$id);
    exit;
}
else{
    echo "C'è stato un errore nella modifica dell'evento nel database.";
}