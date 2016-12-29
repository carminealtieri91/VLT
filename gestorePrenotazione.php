<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestorePrenotazione
 *
 * @author Carmine
 */
class gestorePrenotazione {
    
    public $database;
    
    public function __construct() {
        include_once 'database.php';
        $this->database = new database();
    }
    
    public function inserisciPrenotazione($id, $emailUtente){
        $query = "INSERT INTO Prenotazione (Evento, Prenotato) VALUES ('$id', '$emailUtente')";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
    public function annullaPrenotazione($id, $emailUtente){
        $query = "DELETE FROM Prenotazione WHERE Evento='$id' AND Prenotato='$emailUtente' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
    public function visualizzaPrenotati($id){
        $query = "SELECT * FROM Prenotazione WHERE Evento='$id' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function controllaPrenotazione($id, $emailUtente){
        $query = "SELECT * FROM Prenotazione WHERE Evento='$id' AND Prenotato='$emailUtente' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        if(mysql_fetch_row($ris)){
            return true;
        }
        return false;
    }
    
}
