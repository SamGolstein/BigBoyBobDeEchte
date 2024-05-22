-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 mei 2024 om 13:40
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigboybob`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klantId` int(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerkerId` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerkerId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerkerId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
