<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utente
 *
 * @author Carmine
 */
class Utente {
    private $email;
    private $username;
    private $password;
    private $dataUltimoAccesso;
    private $foto;
    private $medFeedback;
    private $numEventi;
    
    public function __construct($email, $username, $password, $foto, $medFeedback, $numEventi) {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->foto = $foto;
        $this->medFeedback = $medFeedback;
        $this->numEventi = $numEventi;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getFoto(){
        return $this->foto;
    }
    
    public function setEmail($newEmail){
        $this->email = $newEmail;
    }
    
    public function setUsername($newUsername){
        $this->username = $newUsername;
    }
    
    public function setPassword($newPassword){
        $this->password = $newPassword;
    }
    
    public function setFoto($newFoto){
        $this->foto = $newFoto;
    }
    
    public function setMediaFeedback($newValore){
        $this->medFeedback = $newValore;
    }
    
    public function getMediaFeedback(){
        return $this->medFeedback;
    }
    
    function getNumEventi() {
        return $this->numEventi;
    }

    function setNumEventi($numEventi) {
        $this->numEventi = $numEventi;
    }




    
}
