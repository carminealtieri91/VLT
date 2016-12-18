<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestoreEvento
 *
 * @author Carmine
 */
class gestoreEvento {
   
    public $database;
    
    public function __construct() {
        include 'database.php';
        $this->database = new database();
    }
    
    public function inserisciEvento(Evento $evento){
        $titVinile = $evento->getTitoloVinile();
        $info = $evento->getDettagliEvento();
        $ingresso = $evento->getIngresso();
        $localita = $evento->getLocalita();
        $orario = $evento->getOrario();
        $provincia = $evento->getProvincia();
        $data = $evento->getData();
        $posti = $evento->getPostiDisponibili();
        $tel = $evento->getNumTelefono();
        $em = $evento->getEmailOrganizzatore();
        $numEventi = $this->recuperaNumEventi($em);
        $id = $numEventi+1;
        $query = "INSERT INTO Evento (TitoloArtistaAlbum, InfoDettagliate, Ingresso, Localita, Orario, Provincia, Data, PostiDisponibili, Telefono, EmailOrganizzatore, Id) VALUES ('$titVinile', '$info', '$ingresso', '$localita', '$orario', '$provincia', STR_TO_DATE('$data','%d-%m-%Y'), '$posti', '$tel', '$em', '$id')";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            $query = "UPDATE Profilo SET NumeroEventi='$id' WHERE Email = '$em' ";
            $this->database->queryDB("my_vinyllisteningtogether", $query);
            return true;
        }
        else{
            return false;
        }
    }
    
    public function modificaEvento($evento){
        
    }
    
    public function eliminaEvento($id){
        session_start();
        $email = $_SESSION['utenteLoggato'];
        $query = "DELETE FROM Evento WHERE EmailOrganizzatore = '$email' AND Chiave = '$id' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            $numEventi = $this->recuperaNumEventi($email);
            $numEventi--;
            $query = "UPDATE Profilo SET NumeroEventi='$numEventi' WHERE Email = '$email' ";
            $this->database->queryDB("my_vinyllisteningtogether", $query);
            return true;
        }
        else{
            return false;
        }
    }
    
    public function recuperaNumEventi($email){
        $query = "SELECT NumeroEventi FROM Profilo WHERE Email = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        $riga = mysql_fetch_row($ris);
        return $riga[0];
    }
    
}
