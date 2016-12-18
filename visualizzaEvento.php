<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
    include_once 'visualizzatoreEvento.php';
    include_once 'gestoreProfilo.php';
    include_once 'model/Evento.php';
    include_once 'model/Utente.php';
    $id = $_GET['id'];
    $visualizzatoreEvento = new visualizzatoreEvento();
    $evento = $visualizzatoreEvento->visualizza($id);
    $gestoreProfilo = new gestoreProfilo();
    $utenteOrganizzatore = $gestoreProfilo->recuperaProfilo($evento->getEmailOrganizzatore());
    if (isset($_SESSION['utenteLoggato'])){
        $obj = unserialize($_SESSION['utenteLoggato']);
        $em = $obj->getEmail();
        $utenteLoggato = $gestoreProfilo->recuperaProfilo($em);
    }
?>

<html>
    <head>
        <title>Visualizza Evento</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if(isset($_SESSION['utenteLoggato'])){
                include 'view/headerAreaRiservata.php';
            }
            else{
                include 'view/header.php';
            }
        ?>
        <span id="intestazione"> 
            <h1 id="titolo"><?php echo $evento->getTitoloVinile() ?></h1>
            <?php 
                if($utenteLoggato->getEmail() == $utenteOrganizzatore->getEmail()){ 
                    echo "<h3>Questo è un tuo evento</h3>";
                }
                else{
                    echo "<h3>inserito da $utenteOrganizzatore->getUsername()</h3>";
                }
                if(isset($_SESSION['utenteLoggato'])){
                    echo "<h5><img id='preferito' src='../Immagini/stellaVuota.png'> <a id='gestionePreferito' onclick='gestisciPreferito()'>Aggiungi ai preferiti</a></h5>";
                }
            ?>
        </span>
    </body>
</html>
