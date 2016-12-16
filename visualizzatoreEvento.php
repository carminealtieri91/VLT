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
        include 'database.php';
        $this->database = new database();
    }
    
    public function visualizza($email){
        $query = "SELECT * FROM Evento WHERE EmailOrganizzatore = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
}
