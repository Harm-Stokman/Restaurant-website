-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 14 apr 2026 om 18:45
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE `gerechten` (
  `id` int NOT NULL,
  `gerechtnaam` varchar(40) NOT NULL,
  `ingrediënten` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`id`, `gerechtnaam`, `ingrediënten`, `prijs`) VALUES
(1, 'Pizza Salami', 'Tomatensaus, Kaas, Salami', 11.99),
(2, 'Pizza Funghi', 'Tomatensaus, Kaas, Champignons', 12.99),
(3, 'Pizza Prosciutto', 'Tomatensaus, Kaas, Ham', 11.99),
(4, 'Pizza Capriciosa', 'Tomatensaus, Kaas, Ham, Champignons, Artisjokken, Oregano', 13.99),
(5, 'Pizza Margherita', 'Tomatensaus, kaas', 10.99),
(13, 'Pizza Hawaii', 'Tomatensaus, Kaas, Ham, Ananas', 12.99);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gerechten`
--
ALTER TABLE `gerechten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
