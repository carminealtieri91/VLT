-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dic 08, 2016 alle 15:27
-- Versione del server: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_vinyllisteningtogether`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Evento`
--

CREATE TABLE IF NOT EXISTS `Evento` (
  `TitoloArtistaAlbum` varchar(30) NOT NULL,
  `InfoDettagliate` text,
  `ImmagineCopertina` varchar(30) DEFAULT NULL,
  `Ingresso` varchar(20) NOT NULL,
  `Localita` varchar(50) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Data` date NOT NULL,
  `Orario` time NOT NULL,
  `PostiDisponibili` int(5) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Chiave` int(10) NOT NULL AUTO_INCREMENT,
  `Id` int(10) NOT NULL,
  PRIMARY KEY (`Chiave`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `Feedback`
--

CREATE TABLE IF NOT EXISTS `Feedback` (
  `Votante` varchar(30) NOT NULL,
  `Votato` varchar(30) NOT NULL,
  `Votazione` int(6) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `Immagine`
--

CREATE TABLE IF NOT EXISTS `Immagine` (
  `Foto` varchar(30) NOT NULL,
  `Size` int(10) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `ImmagineEvento`
--

CREATE TABLE IF NOT EXISTS `ImmagineEvento` (
  `Foto` varchar(30) NOT NULL,
  `Size` int(10) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Evento` int(50) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `Profilo`
--

CREATE TABLE IF NOT EXISTS `Profilo` (
  `Foto` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DataUltimoAccesso` date DEFAULT NULL,
  `NumeroEventi` int(30) NOT NULL DEFAULT '0',
  `MediaFeedback` double(2,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Profilo`
--

INSERT INTO `Profilo` (`Foto`, `Email`, `Username`, `Password`, `DataUltimoAccesso`, `NumeroEventi`, `MediaFeedback`) VALUES
('', 'stefdibenedetto88@gmail.com', 'Stefano', 'mannitidiriale', NULL, 0, 0.00);

-- --------------------------------------------------------

--
-- Struttura della tabella `Provincia`
--

CREATE TABLE IF NOT EXISTS `Provincia` (
  `Provincia` varchar(20) NOT NULL,
  `Regione` varchar(20) NOT NULL,
  PRIMARY KEY (`Provincia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `UtentePreferito`
--

CREATE TABLE IF NOT EXISTS `UtentePreferito` (
  `Utente` varchar(30) NOT NULL,
  `Preferito` varchar(30) NOT NULL,
  PRIMARY KEY (`Preferito`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
