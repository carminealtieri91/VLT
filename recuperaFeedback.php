<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'gestoreFeedback.php';
include_once 'gestoreProfilo.php';
$gestoreProfilo = new gestoreProfilo();
$gestoreFeedback = new gestoreFeedback();
$ris = $gestoreFeedback->visualizzaFeedback($_SESSION['utenteLoggato']);

?>

<div class="riga"> 
    <span class="cella"> <h3> Username </h3> </span>
    <span class="cella"> <h3> Voto </h3> </span>
</div>
<?php 
    while($riga = mysql_fetch_assoc($ris)){
        $utente = $gestoreProfilo->recuperaProfilo($riga['Votante']);
        echo "<div class='riga'>";
        echo "<span class='cella'>".$utente->getUsername()."</span>";
        echo "<span class='cella'>".$riga['Votazione']."</span>";
        echo "</div>";
    }
?>