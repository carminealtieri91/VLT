<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestoreProfilo
 *
 * @author Carmine
 */

class gestoreProfilo {
    
    public $database;
    
    public function __construct() {
        include 'database.php';
        $this->database = new database();
    }
    
    public function login($email, $pwd){
        $query = "SELECT * FROM Profilo WHERE Email = '$email' AND Password = '$pwd' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        $riga = mysql_fetch_array($ris);
        if($riga){
            $cod = $riga["Email"];
            if($cod == NULL){
                    /*DA AGGIUSTARE, BISOGNA FARE IL REDIRECT ALLA PAGINA DI ERRORE*/
                return false;
            }
            else{
                session_start();
                $utente = $this->recuperaProfilo($email);
                $_SESSION['utenteLoggato'] = serialize($utente);
                return true;
            }
        }
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
    
    public function registraUtente(Utente $utente){
        $foto = $utente->getFoto();
        $email = $utente->getEmail();
        $username = $utente->getUsername();
        $pass = $utente->getPassword();
        $query = "INSERT INTO Profilo (Foto, Email, Username, Password) VALUES ('$foto', '$email', '$username', '$pass')";
        $this->database->queryDB("my_vinyllisteningtogether", $query);
    }
    
    public function cancellaProfilo($email){
        session_start();
        $query = "DELETE FROM Profilo WHERE Email = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        if($ris){
            session_unset();
            session_destroy();
            return true;
        }
        return false;
    }
    
    function recuperaProfilo($email){
        include_once 'model/Utente.php';
        $query = "SELECT * FROM Profilo WHERE Email = '$email' ";
        $ris = $this->database->queryDB("my_vinyllisteningtogether", $query);
        $riga = mysql_fetch_assoc($ris);
        $utente = new Utente($riga['Email'], $riga['Username'], $riga['Password'], $riga['Foto'], $riga['MediaFeedback'], $riga['NumeroEventi']);
        return $utente;
    }
    
    public function modificaProfilo($email, $newEmail, $newUsername, $newPassword){
        $query = "UPDATE Profilo SET Email='$newEmail', Username='$newUsername', Password='$newPassword' WHERE Email = '$email' ";
        if($this->database->queryDB("my_vinyllisteningtogether", $query)){
            return true;
        }
        else{
            return false;
        }
    }
    
}