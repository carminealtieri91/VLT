<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestoreEvento.php';
$id = $_GET['id'];
$gestoreEvento = new gestoreEvento();
if($gestoreEvento->eliminaEvento($id)){
    header("Location: iMieiEventi.php");
    exit;
}
else{
    echo "C'è stato un errore nella cancellazione dell'evento nel database.";
}