<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    include_once 'gestoreProfilo.php';
    $gestoreProfilo = new gestoreProfilo();
    if(isset($_GET['Email'])){
        $utenteTrovato = $gestoreProfilo->recuperaProfilo($_GET['Email']);
    }
    else if(isset ($_GET['Nickname'])){
        $ris = $gestoreProfilo->recuperaProfiloTramiteUsername($_GET['Nickname']);
        $numUtentiTrovati = mysql_num_rows($ris);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ricerca</title>
    </head>
    <body>
        <?php
            include_once 'view/headerAreaRiservata.php';
        ?>
        <h1 style="color:brown;text-align:center"> Risultati della tua ricerca </h1>
        <?php
            if(isset($_GET['Email']) && $utenteTrovato->getEmail()==null){
                echo "<div style='font-size:20px;text-align:center;'>";
                echo "Mi spiace ma non esiste nessun utente registrato con questa email";
                echo "</div>";
            }
            else if(isset($_GET['Nickname']) && $numUtentiTrovati==0){
                echo "<div style='font-size:20px;text-align:center;'>";
                echo "Mi spiace ma non esiste nessun utente registrato con questo username";
                echo "</div>";
            }
            else{
                echo "<div id='tavola2' style='display:table; width:40%; margin:auto'>";
                if(isset($utenteTrovato)){
                    echo "<div class='riga' style='display:table-row'>";
                    echo "<span class='cella' style='display:table-cell;text-align:center;'>".$utenteTrovato->getUsername()."</span>";
                    echo "<span class='cella' style='display:table-cell;text-align:center;'><a href='recuperaEmailUtente.php?email=".$utenteTrovato->getEmail()."' style='font-size:20px; cursor:pointer; color:brown;'>Profilo</span>";
                    echo "</div>";
                }
                while($riga = mysql_fetch_assoc($ris)){
                    echo "<div class='riga' style='display:table-row'>";
                    echo "<span class='cella' style='display:table-cell;text-align:center;'>".$riga['Username']."</span>";
                    echo "<span class='cella' style='display:table-cell;text-align:center;'><a href='recuperaEmailUtente.php?email=".$riga['Email']."' style='font-size:20px; cursor:pointer; color:brown;'>Profilo</span>";
                    echo "</div>";
                }
            }
        ?>
    </body>
</html>
