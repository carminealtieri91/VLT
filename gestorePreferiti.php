<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestorePreferiti
 *
 * @author Carmine
 */
class gestorePreferiti {
    
    public $database;
    
    public function __construct() {
        include_once 'database.php';
        $this->database = new database();
    }
    
    public function inserisciPreferito($emailUtente, $emailPreferito){
        $query = "INSERT INTO UtentePreferito (Utente, Preferito) VALUES ('$emailUtente', '$emailPreferito')";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
    public function cancellaPreferito($emailUtente, $emailPreferito){
        $query = "DELETE FROM UtentePreferito WHERE Utente='$emailUtente' AND Preferito = '$emailPreferito' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
    public function visualizzaPreferiti($emailUtente){
        $query = "SELECT * FROM UtentePreferito WHERE Utente='$emailUtente' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function controllaPreferito($emailUtente, $emailPreferito){
        $query = "SELECT * FROM UtentePreferito WHERE Utente='$emailUtente' AND Preferito='$emailPreferito' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        if(mysql_fetch_row($ris)){
            return true;
        }
        return false;
    }
    
}
