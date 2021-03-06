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
        include_once 'database.php';
        $this->database = new database();
    }
    
    public function inserisciEvento(Evento $evento){
        $titVinile = $evento->getTitoloVinile();
        $info = $evento->getDettagliEvento();
        $ingresso = $evento->getIngresso();
        $localita = $evento->getLocalita();
        $regione = $evento ->getRegione();
        $orario = $evento->getOrario();
        $provincia = $evento->getProvincia();
        $data = $evento->getData();
        $posti = $evento->getPostiDisponibili();
        $tel = $evento->getNumTelefono();
        $em = $evento->getEmailOrganizzatore();
        $numEventi = $this->recuperaNumEventi($em);
        $id = $numEventi+1;
        $query = "INSERT INTO Evento (TitoloArtistaAlbum, InfoDettagliate, Ingresso, Localita, Regione, Orario, Provincia, Data, PostiDisponibili, Telefono, EmailOrganizzatore, Id) VALUES ('$titVinile', '$info', '$ingresso', '$localita', '$regione', '$orario', '$provincia', STR_TO_DATE('$data','%d-%m-%Y'), '$posti', '$tel', '$em', '$id')";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            $query = "UPDATE Profilo SET NumeroEventi='$id' WHERE Email = '$em' ";
            $this->database->queryDB("my_vinyllisteningtogether", $query);
            return true;
        }
        else{
            return false;
        }
    }
    
    public function modificaEvento(Evento $evento, $id){
        $titVinile = $evento->getTitoloVinile();
        $info = $evento->getDettagliEvento();
        $ingresso = $evento->getIngresso();
        $localita = $evento->getLocalita();
        $regione = $evento ->getRegione();
        $orario = $evento->getOrario();
        $provincia = $evento->getProvincia();
        $data = $evento->getData();
        $tel = $evento->getNumTelefono();
        $query = "UPDATE Evento SET TitoloArtistaAlbum='$titVinile', InfoDettagliate='$info', Ingresso='$ingresso', Localita='$localita', Regione='$regione', Orario='$orario', Provincia='$provincia', Data=STR_TO_DATE('$data','%d-%m-%Y'), Telefono='$tel' WHERE Chiave='$id' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
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
    
    public function aggiornaPosti($newPosti, $id){
        $query = "UPDATE Evento SET PostiDisponibili='$newPosti' WHERE Chiave = '$id' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        return false;
    }
    
}
