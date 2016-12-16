<?php

include 'gestoreProfilo.php';
include 'model/Utente.php';

$em = $_POST['email'];
$usern = $_POST['username'];
$pass = $_POST['password'];
$foto = $_POST['foto'];

$gestoreProfilo = new gestoreProfilo();
$utente = new Utente($em, $usern, $pass, $foto);
$gestoreProfilo->registraUtente($utente);

header("Location: index.php");

