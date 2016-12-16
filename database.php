<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author Carmine
 */
class database {
    
    public $query;
    public $conn;
    
    public function __construct() {
        $this->conn = mysql_connect("localhost", "vinyllisteningtogether", "") or die("Impossibile stabilire una connessione col DB");
    }
    
    //implementare funzione __destruct()
    
    public function queryDB($nomeDB, $qu){
        mysql_select_db($nomeDB, $this->conn) or die("Errore durante la selezione del database");
        $this->query = mysql_query($qu, $this->conn) or die (mysql_error());
        if(!$this->query){
            echo "Errore: Database non interrogato correttamente";
        }
        else{
            return $this->query;
        }
    }
    
}
