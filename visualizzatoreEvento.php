<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of visualizzatoreEvento
 *
 * @author Carmine
 */

class visualizzatoreEvento {
    
    public $database;
    
    public function __construct() {
        include_once 'database.php';
        $this->database = new database();
    }
    
    public function visualizza($id){
        $query = "SELECT * FROM Evento WHERE Chiave = '$id' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $this->recuperaEvento($ris);
    }
    
    public function recuperaEvento($ris){
        include_once 'model/Evento.php';
        $riga = mysql_fetch_assoc($ris);
        $evento = new Evento($riga['TitoloArtistaAlbum'], $riga['InfoDettagliate'], null, $riga['Ingresso'], $riga['Localita'], $riga['Provincia'], $riga['Data'], $riga['Orario'], $riga['PostiDisponibili'], $riga['Telefono'], $riga['EmailOrganizzatore']);
        return $evento;
    }
    
    public function mostraMieiEventi($email){
        $query = "SELECT * FROM Evento WHERE EmailOrganizzatore = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
}
