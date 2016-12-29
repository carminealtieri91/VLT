<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestoreFeedback
 *
 * @author Carmine
 */
class gestoreFeedback {
    
    public $database;
    
    public function __construct() {
        include_once 'database.php';
        $this->database = new database();
    }
    
    public function inserisciFeedback($invia, $riceve, $votazione){
        if(!$this->giaInserito($invia, $riceve)){
            $query = "INSERT INTO Feedback (Votante, Votato, Votazione) VALUES ('$invia', '$riceve', '$votazione')";
            if($this->database->queryDB("my_vinyllisteningtogether", $query)){
                $this->aggiornaMediaFeedbackUtente($riceve);
                return true;
            }   
        }
        return false;
    }
    
    public function visualizzaFeedback($email){
        $query = "SELECT * FROM Feedback WHERE Votato='$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function giaInserito($invia, $riceve){
        $query = "SELECT * FROM Feedback WHERE Votante='$invia' AND Votato='$riceve' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        if(mysql_fetch_row($ris)){
            return true;
        }
        return false;
    }
    
    public function aggiornaMediaFeedbackUtente($riceve){
        $ris = $this->visualizzaFeedback($riceve);
        $numFeedback = mysql_num_rows($ris);
        while($riga = mysql_fetch_assoc($ris)){
            $n += $riga['Votazione'];
        }
        $media = (($n/$numFeedback)*100)/5;
        $query = "UPDATE Profilo SET MediaFeedback='$media' WHERE Email = '$riceve' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
}
