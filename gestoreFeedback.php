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
    
    public function inserisciFeedback(Feedback $fb){
        $votante = $fb->getVotante();
        $votato = $fb->getVotato();
        $votazione = $fb->getVotazione();
        if(!$this->giaInserito($votante, $votato)){
            $query = "INSERT INTO Feedback (Votante, Votato, Votazione) VALUES ('$votante', '$votato', '$votazione')";
            if($this->database->queryDB("my_vinyllisteningtogether", $query)){
                $this->aggiornaMediaFeedbackUtente($votato);
                return true;
            }   
        }
        else{
            if($this->modificaFeedback($fb)){
                return true;
            }
        }
        return false;
    }
    
    public function modificaFeedback(Feedback $fb){
        $query = "UPDATE Feedback SET Votazione='".$fb->getVotazione()."' WHERE Votante='".$fb->getVotante()."' AND Votato='".$fb->getVotato()."'";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            $this->aggiornaMediaFeedbackUtente($fb->getVotato());
            return true;
        }
        return false;
    }
    
    public function visualizzaFeedback($email){
        $query = "SELECT * FROM Feedback WHERE Votato='$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function giaInserito($votante, $votato){
        $query = "SELECT * FROM Feedback WHERE Votante='$votante' AND Votato='$votato' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        if(mysql_fetch_row($ris)){
            return true;
        }
        return false;
    }
    
    public function aggiornaMediaFeedbackUtente($votato){
        $ris = $this->visualizzaFeedback($votato);
        $numFeedback = mysql_num_rows($ris);
        while($riga = mysql_fetch_assoc($ris)){
            $n += $riga['Votazione'];
        }
        $media = (($n/$numFeedback)*100)/5;
        $query = "UPDATE Profilo SET MediaFeedback='$media' WHERE Email = '$votato' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
}
