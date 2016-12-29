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
        $e = $this->recuperaEvento($ris);
        return $e;
    }
    
    public function recuperaEvento($ris){
        include_once 'model/Evento.php';
        $riga = mysql_fetch_assoc($ris);
        $evento = new Evento($riga['TitoloArtistaAlbum'], $riga['InfoDettagliate'], null, $riga['Ingresso'], $riga['Localita'], $riga['Regione'], $riga['Provincia'], $riga['Data'], $riga['Orario'], $riga['PostiDisponibili'], $riga['Telefono'], $riga['EmailOrganizzatore']);
        return $evento;
    }
    
    public function mostraMieiEventi($email){
        $query = "SELECT * FROM Evento WHERE EmailOrganizzatore = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function recuperaEventiPerRegione($regione){
        $query = "SELECT * FROM Evento WHERE Regione = '$regione' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function recuperaEventiPerProvincia($provincia){
        $query = "SELECT * FROM Evento WHERE Provincia = '$provincia' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function recuperaEventiOrdinaPer($criterio, $cerca){
        $query = "SELECT * FROM Evento WHERE Provincia ='$cerca' OR Regione ='$cerca' ORDER BY ".$criterio;
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
    public function recuperaEventiFiltraPer($criterio, $cerca, $miaEmail){
        if($criterio=="Gratuito"){
            $query = "SELECT * FROM Evento WHERE Ingresso ='Gratuito' AND (Provincia='$cerca' OR Regione='$cerca')";
        }
        else if($criterio=="Preferiti"){
            $query = "SELECT * FROM Evento, UtentePreferito WHERE (Evento.Provincia='$cerca' OR Evento.Regione='$cerca') AND (Evento.EmailOrganizzatore=UtentePreferito.Preferito AND UtentePreferito.Utente='$miaEmail')";
        }
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        return $ris;
    }
    
}
