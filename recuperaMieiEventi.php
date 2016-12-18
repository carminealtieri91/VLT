<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'visualizzatoreEvento.php';
$email = $_SESSION['utenteLoggato'];
$visualizzatoreEvento = new visualizzatoreEvento();
$ris = $visualizzatoreEvento->mostraMieiEventi($email);

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
        echo "<span class='cella'> <a href='visualizzaEvento.php?id=$riga[Chiave]'>$riga[TitoloArtistaAlbum]</a></span>";
        echo "<span class='cella'> $riga[Localita] </span>";
        $data = date_create($riga[Data]);
        $data = date_format($data,'d/m/Y');
        echo "<span class='cella'> $data </span>";
        $orario = substr($riga[Orario], 0, 5);
        echo "<span class='cella'> $orario </span>";
        echo "<span class='cella'> $riga[Ingresso] </span>";
        echo "<span class='cella'> Test Prenotati </span>";
        echo "<span class='cella'> <a href='stampaPrenotati.php?id=$riga[Chiave]'> Stampa Prenotati </a></span>";
        echo "<span class='cella'> <a href='modificaEvento.php?id=$riga[Chiave]'> Modifica </a></span>";
        echo "<span class='cella'> <a href='controllaDatiEliminaEvento.php?id=$riga[Chiave]' onclick='return confermaEliminaEvento();'> Elimina </a></span>";
        echo "</div>";
    }
?>
