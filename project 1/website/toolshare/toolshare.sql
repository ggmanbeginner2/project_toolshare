-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2026 om 11:18
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolshare`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berichten`
--

CREATE TABLE `berichten` (
  `id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bericht` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `omschrijving` text NOT NULL,
  `conditie` varchar(50) NOT NULL,
  `locatie` varchar(100) DEFAULT NULL,
  `beschikbaar` tinyint(1) DEFAULT 1,
  `borg` decimal(6,2) DEFAULT 0.00,
  `opmerkingen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tools`
--

INSERT INTO `tools` (`id`, `naam`, `category`, `omschrijving`, `conditie`, `locatie`, `beschikbaar`, `borg`, `opmerkingen`) VALUES
(10, 'boormachine', 'gerdeedschap', 'ik heb een boormachine gekocht en nooit gebruiakt', 'nieuw', 'tiel', 1, 50.00, 'goed gaant.'),
(11, 'zaag', 'gerdeedschap', 'gebruikt en een beetje roest er op.', 'oud', 'amsterdam', 1, 12.00, 'goed'),
(12, 'schep', 'tuin', 'gebruikt schep. 1 keer gebruikt.', 'nieuw', 'tiel', 1, 19.00, ''),
(13, 'Boormachine', 'Elektrisch', 'Sterke boor voor hout en metaal', 'Goed', 'Kast A', 1, 20.00, 'Geen'),
(14, 'Hamer', 'Handgereedschap', 'Stalen hamer', 'Nieuw', 'Kast B', 1, 0.00, ''),
(15, 'Zaag', 'Handgereedschap', 'Handzaag voor hout', 'Gebruikt', 'Kast C', 1, 5.00, 'Let op: iets bot'),
(16, 'test 404543', 'bouw', 'dfd', 'dfsf', 'dsf', 1, 23.00, 'dssfdrefbfdsdfbydsvf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(18) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`users_id`, `username`, `wachtwoord`, `is_admin`) VALUES
(2, 'admin', '$2y$10$gBS0xKBFnGG.bQFRXbRGFuDyeuHkxfemfjq.ENR9deAnfx5Z/MrfK', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `berichten`
--
ALTER TABLE `berichten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_id` (`tool_id`);

--
-- Indexen voor tabel `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `berichten`
--
ALTER TABLE `berichten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `berichten`
--
ALTER TABLE `berichten`
  ADD CONSTRAINT `berichten_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
