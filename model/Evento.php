<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evento
 *
 * @author Carmine
 */
class Evento {
    private $titoloVinile;
    private $dettagliEvento;
    private $immagineVinile;
    private $ingresso;
    private $localita;
    private $provincia;
    private $data;
    private $orario;
    private $postiDisponibili;
    private $numTelefono;
    private $emailOrganizzatore;
    
    public function __construct($titoloVinile, $dettagliEvento, $immagineVinile, $ingresso, $localita, $provincia, $data, $orario, $postiDisponibili, $numTelefono, $emailOrganizzatore) {
        $this->titoloVinile = $titoloVinile;
        $this->dettagliEvento = $dettagliEvento;
        $this->immagineVinile = $immagineVinile;
        $this->ingresso = $ingresso;
        $this->localita = $localita;
        $this->provincia = $provincia;
        $this->data = $data;
        $this->orario = $orario;
        $this->postiDisponibili = $postiDisponibili;
        $this->numTelefono = $numTelefono;
        $this->emailOrganizzatore = $emailOrganizzatore;
    }
    
    function getTitoloVinile() {
        return $this->titoloVinile;
    }

    function getDettagliEvento() {
        return $this->dettagliEvento;
    }

    function getImmagineVinile() {
        return $this->immagineVinile;
    }

    function getIngresso() {
        return $this->ingresso;
    }

    function getLocalita() {
        return $this->localita;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getData() {
        return $this->data;
    }

    function getOrario() {
        return $this->orario;
    }

    function getPostiDisponibili() {
        return $this->postiDisponibili;
    }

    function getNumTelefono() {
        return $this->numTelefono;
    }

    function setTitoloVinile($titoloVinile) {
        $this->titoloVinile = $titoloVinile;
    }

    function setDettagliEvento($dettagliEvento) {
        $this->dettagliEvento = $dettagliEvento;
    }

    function setImmagineVinile($immagineVinile) {
        $this->immagineVinile = $immagineVinile;
    }

    function setIngresso($ingresso) {
        $this->ingresso = $ingresso;
    }

    function setLocalita($localita) {
        $this->localita = $localita;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setOrario($orario) {
        $this->orario = $orario;
    }

    function setPostiDisponibili($postiDisponibili) {
        $this->postiDisponibili = $postiDisponibili;
    }

    function setNumTelefono($numTelefono) {
        $this->numTelefono = $numTelefono;
    }

    function getEmailOrganizzatore() {
        return $this->emailOrganizzatore;
    }

    function setEmailOrganizzatore($emailOrganizzatore) {
        $this->emailOrganizzatore = $emailOrganizzatore;
    }


    
}
