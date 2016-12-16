<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'database.php';
$datab = new database();
$query = "SELECT DISTINCT Regione FROM Provincia ORDER BY Regione";
$ris = $datab->queryDB("my_vinyllisteningtogether", $query);

echo "<option value='0'disabled='' selected=''> Scegli una regione. . . </option>";
while ($riga = mysql_fetch_row($ris)){
    echo "<option value='$riga[0]'>$riga[0]</option>";
}