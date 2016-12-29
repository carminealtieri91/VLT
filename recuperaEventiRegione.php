<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'visualizzatoreEvento.php';
$regione = $_GET['regione'];
$visualizzatoreEvento = new visualizzatoreEvento();
$ris = $visualizzatoreEvento->recuperaEventiPerRegione($regione);
?>

<html>
    <div class="riga">
        <span class="cella" style="color:brown">
            <img style="cursor:pointer" src="../Immagini/search.png" onclick="cercaPerRegione()">
            <input class="barra" onkeypress="return invioRegione(event)" id="regioneCercata" placeholder=" regione " type="text"> 
        </span>
        <span class="cella" style="color:brown">
            <img style="cursor:pointer" src="../Immagini/search.png" onclick="cercaPerProvincia()">
            <input class="barra" onkeypress="return invioProvincia(event)" id="provinciaCercata" placeholder=" provincia " type="text"> 
        </span>
        <span class="cella" style="color:brown">
            <select name="ordina" onchange="ordinaPer(this.options[this.selectedIndex].value)">
                <option value="Ordina Per" selected="" disabled=""> Ordina per...</option>
                <option value="Data"> Data </option>
                <option value="Ingresso"> Ingresso </option>
            </select>  
        </span>
        <span class="cella" style="color:brown">
            <select name="filtra" onchange="filtraPer(this.options[this.selectedIndex].value)">
                <option value="Filtra Per" selected="" disabled=""> Filtra per...</option>
                <option value="Gratuito"> Gratuito </option>
                <option value="Preferiti"> Preferiti </option>
            </select>
        </span>
        <span class="cella" style="color:brown"></span>
    </div>
    <div class="riga"> 
        <span class="cella" style="color:brown"> <h3> Artista/Album vinile </h3> </span>
        <span class="cella" style="color:brown"> <h3> Località (luogo e città) </h3> </span>
        <span class="cella" style="color:brown"> <h3> Provincia</h3> </span>
        <span class="cella" style="color:brown"> <h3> Data </h3> </span>
        <span class="cella" style="color:brown"> <h3> Orario </h3> </span> 
        <span class="cella" style="color:brown"> <h3> Ingresso (euro)</h3> </span>
        <span class="cella" style="color:brown"> <h3> Posti disponibili </h3> </span>
    </div>
    <?php 
        while ($riga = mysql_fetch_array($ris)){
            echo "<div class='riga'>";
            echo "<span class='cella'><a href='visualizzaEvento.php?id=".$riga['Chiave']."'>".$riga['TitoloArtistaAlbum']."</a></span>";
            echo "<span class='cella'>".$riga['Localita']."</span>";
            echo "<span class='cella'>".$riga['Provincia']."</span>";
            echo "<span class='cella'>".date_format(date_create($riga['Data']),'d/m/Y')."</span>"; //da verificare
            echo "<span class='cella'>".substr($riga['Orario'], 0, 5)."</span>";
            echo "<span class='cella'>".$riga['Ingresso']."</span>";
            echo "<span class='cella'>".$riga['PostiDisponibili']."</span>";
            echo "</div>";
        }
    ?>
</html>