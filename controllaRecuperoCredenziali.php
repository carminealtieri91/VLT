<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestoreProfilo.php';
$gestoreProfilo = new gestoreProfilo();

$utente = $gestoreProfilo->recuperaProfilo($_POST['email']);
if($utente->getEmail()==null){
    echo "Mi spiace ma l'indirizzo email digitato non corrisponde a nessun utente registrato al portale VLT.<br>";
    echo "Assicurati di aver digitato l'indirizzo correttamente. <a href='recuperoCredenziali.php'>Riprova</a>.";
    exit;
}
$subject = "Recupero dei dati di accesso alla piattaforma VLT";
$message = "VLT ti comunica i tuoi dati per accedere al portale.\nLa tua password è: ".$utente->getPassword()."\n";
$message2 = "Ti ricordiamo che nella tua area riservata potrai controllare ed eventualmente modificare i tuoi dati di accesso compreso la tua password, basta pigiare su Modifica Profilo nel pannello di controllo a cui avrai accesso  dopo che hai effettuato il login.\nSaluti.\n";
$message3 = "Lo sviluppatore di VLT";
if(!mail($utente->getEmail(), $subject, $message.$message2.$message3)){
    echo "Errore nell'invio della mail. Nessun email inviata.";
}
else{
    echo "Ti abbiamo inviato un email contenente i dati di accesso... se non la ricevi controlla tra la posta indesiderata.<br>";
    echo "Clicca <a href='login.php'>QUI</a> per reindirizzarti alla pagina di Login.";
}