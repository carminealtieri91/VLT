<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Feedback
 *
 * @author Carmine
 */
class Feedback {
    
    private $votante;
    private $votato;
    private $votazione;

    public function __construct($votante, $votato, $votazione) {
        $this->votante = $votante;
        $this->votato = $votato;
        $this->votazione = $votazione;
    }
    
    function getVotante() {
        return $this->votante;
    }

    function getVotato() {
        return $this->votato;
    }

    function getVotazione() {
        return $this->votazione;
    }

    function setVotante($votante) {
        $this->votante = $votante;
    }

    function setVotato($votato) {
        $this->votato = $votato;
    }

    function setVotazione($votazione) {
        $this->votazione = $votazione;
    }


    
}
