<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include 'model/Utente.php';

$utente = unserialize($_SESSION['utenteLoggato']);
$email = $utente->getEmail();
$pass = $utente->getPassword();
$username = $utente->getUsername();
header("Content-type: text/xml");
echo '<?xml version="1.0"?>';
echo '<response>';
echo "<email>$email</email>";
echo "<pass>$pass</pass>";
echo "<user>$username</user>";
echo '</response>';