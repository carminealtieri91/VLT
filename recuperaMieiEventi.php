<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'visualizzatoreEvento.php';
include_once 'model/Utente.php';
$utente = unserialize($_SESSION['utenteLoggato']);
$email = $utente->getEmail();
$visualizzatoreEvento = new visualizzatoreEvento();
$ris = $visualizzatoreEvento->visualizza($email);

?>

<div class="riga"> 
            <span class="cella"> <h3> Vinile </h3> </span>
            <span class="cella"> <h3> Localita' </h3> </span>
            <span class="cella"> <h3> Data</h3> </span>
            <span class="cella"> <h3> Orario</h3> </span>
            <span class="cella"> <h3> Ingresso €</h3> </span>
            <span class="cella"> <h3> Prenotati </h3> </span>
            <span class="cella">  </span>
            <span class="cella">  </span>
            <span class="cella">  </span>
</div>

<?php 
    while ($riga = mysql_fetch_array($ris)){
        echo "<div class='riga'>";
        echo "<span class='cella'> <a href='visualizzaEvento.php?id=$riga[Id]'>$riga[TitoloArtistaAlbum]</a></span>";
        echo "<span class='cella'> $riga[Localita] </span>";
        echo "<span class='cella'> $riga[Data] </span>";
        echo "<span class='cella'> $riga[Orario] </span>";
        echo "<span class='cella'> $riga[Ingresso] </span>";
        echo "<span class='cella'> Test Prenotati </span>";
        echo "<span class='cella'> <a href='stampaPrenotati.php?id=$riga[Id]'> Stampa Prenotati </a></span>";
        echo "<span class='cella'> <a href='modificaEvento.php?id=$riga[Id]'> Modifica </a></span>";
        echo "<span class='cella'> <a href='controllaDatiEliminaEvento.php?id=$riga[Id]' onclick='return conferma();'> Elimina </a></span>";
        echo "</div>";
    }
?>
