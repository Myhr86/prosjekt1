-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10. Nov, 2018 21:15 p.m.
-- Server-versjon: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prosjekt1`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

DROP TABLE IF EXISTS `brukere`;
CREATE TABLE IF NOT EXISTS `brukere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(255) CHARACTER SET utf16 COLLATE utf16_danish_ci NOT NULL,
  `etternavn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `epost` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `telefon` int(8) NOT NULL,
  `brukernavn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `passord` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `bilde` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `regdato` datetime NOT NULL,
  `logintid` datetime NOT NULL,
  `niva` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci COMMENT='brukere';

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `fornavn`, `etternavn`, `epost`, `telefon`, `brukernavn`, `passord`, `bilde`, `regdato`, `logintid`, `niva`) VALUES
(1, 'Åge', 'Sivertsen', 'agesivertsen.86@gmail.com', 95104343, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '', '2018-11-10 21:49:43', '2018-11-10 21:49:43', 0),
(2, 'Stein Arild', 'Myhr', 'stein@gmail.com', 12345678, 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '', '2018-11-10 21:50:32', '2018-11-10 21:50:32', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
