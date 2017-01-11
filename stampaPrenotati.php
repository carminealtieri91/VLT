<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'gestorePrenotazione.php';
include_once 'gestoreProfilo.php';
$id = $_GET['id'];
$gestorePrenotazione = new gestorePrenotazione();
$gestoreProfilo = new gestoreProfilo();
$ris = $gestorePrenotazione->visualizzaPrenotati($id);

?>

<html>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php 
            while($riga = mysql_fetch_assoc($ris)){
                $utente = $gestoreProfilo->recuperaProfilo($riga['Prenotato']);
                echo "<tr>";
                echo "<td>".$utente->getUsername()."</td>";
                echo "<td>".$utente->getEmail()."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br><a href="iMieiEventi.php">Torna Indietro</a>
</html>