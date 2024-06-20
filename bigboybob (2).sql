-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jun 2024 om 13:51
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
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `factuur_id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `totaal_bedrag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`factuur_id`, `klant_id`, `datum`, `totaal_bedrag`) VALUES
(1, 1, '2024-06-12', 1300),
(2, 1, '2024-06-12', 0),
(3, 1, '2024-06-19', 0),
(4, 1, '2024-06-19', 200),
(5, 2, '2024-06-20', 40),
(6, 3, '2024-06-20', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuurregel`
--

CREATE TABLE `factuurregel` (
  `factuurregel_id` int(11) NOT NULL,
  `factuur_id` int(11) NOT NULL,
  `uren` int(11) NOT NULL,
  `prijs` double DEFAULT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `factuurregel`
--

INSERT INTO `factuurregel` (`factuurregel_id`, `factuur_id`, `uren`, `prijs`, `omschrijving`) VALUES
(5, 1, 12, 100, 'Kit randje aangelegd'),
(4, 1, 3, 10, 'Een beetje stucwerk gedaan'),
(6, 4, 2, 100, 'Sam is dik'),
(7, 1, 1, 10, 'Water aangesloten'),
(8, 1, 2, 10, 'Een wc geplaats'),
(9, 5, 4, 10, 'Een lekkage gefixt'),
(10, 19, 1, 5, 'Maccie gehaald'),
(11, 1, 2, 20, 'Reparatie gedaan');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klantId` int(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `woonplaats` varchar(255) DEFAULT NULL,
  `straat` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `telefoonnummer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klantId`, `voornaam`, `achternaam`, `email`, `woonplaats`, `straat`, `postcode`, `telefoonnummer`) VALUES
(1, 'jopie', 'test', 'jopie@gmail.com', 'hallo', 'hallostraat 15', '1732 JF', '06814581345'),
(2, 'jopies', 'van zanten', 'jopievanzanten@gmail.com', 'Jopieland', 'Jopielaan 12', '1851 HA', '06816746'),
(3, 'mohamed', 'janssen', 'mohammedjanssen@gmail.com', 'Mohammedland', 'Mohammedlaan 42', '8151 FN', '061846123'),
(4, 'timomensink@gmai.com', 'Mensink', 'Mensink', 'Bicmacland', 'HugeMacStraat 19', '1851 JD', '06719572');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`gebruikersnaam`, `wachtwoord`) VALUES
('Admin', 'Admin');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuur_id`);

--
-- Indexen voor tabel `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD PRIMARY KEY (`factuurregel_id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantId`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`gebruikersnaam`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
  MODIFY `factuur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `factuurregel`
--
ALTER TABLE `factuurregel`
  MODIFY `factuurregel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klantId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
