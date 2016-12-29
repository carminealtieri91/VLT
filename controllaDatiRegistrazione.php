<?php

include 'gestoreProfilo.php';
include 'model/Utente.php';

$em = $_POST['email'];
$usern = $_POST['username'];
$pass = $_POST['password'];
$foto = $_POST['foto'];

$gestoreProfilo = new gestoreProfilo();
$utente = new Utente($em, $usern, $pass, $foto);
$utenteEsistente = $gestoreProfilo->recuperaProfilo($em);
if($utenteEsistente->getEmail()==null){
    $gestoreProfilo->registraUtente($utente);
    header("Location: index.php");
}
else{
    echo "Attenzione, l'email inserita corrisponde ad un utente gia' registrato. Si prega di ricontrollare i dati. ";
    echo "<a href='registrazione.php'>Riprova</a>";
}

