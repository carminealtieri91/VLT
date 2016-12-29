<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'gestorePreferiti.php';
include_once 'gestoreProfilo.php';
$emailUtente = $_SESSION['utenteLoggato'];
$gestorePreferiti = new gestorePreferiti();
$gestoreProfilo = new gestoreProfilo();
$ris = $gestorePreferiti->visualizzaPreferiti($emailUtente);

?>

<html>
    <div class="riga"> 
        <span class="cella"><h3> Username </h3></span>
        <span class="cella"></span>
        <span class="cella"></span>
    </div>
    <?php
        while($riga = mysql_fetch_assoc($ris)){
            $utentePreferito = $gestoreProfilo->recuperaProfilo($riga['Preferito']);
            echo "<div class='riga'>";
            echo "<span class='cella'>".$utentePreferito->getUsername()."</span>";
            echo "<span class='cella'><a href='recuperaEmailUtentiPreferiti.php?email=".$utentePreferito->getEmail()."'>Profilo</a></span>";
            echo "<span class='cella'><a href='controllaDatiEliminaPreferito.php?email=".$utentePreferito->getEmail()."' onclick='return confermaEliminaPreferito()'>Elimina dai preferiti</a></span>";
            echo "</div>";
        }
    ?>
</html>