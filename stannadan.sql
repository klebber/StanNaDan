-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 05:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stannadan`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresa`
--

CREATE TABLE `adresa` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adresa`
--

INSERT INTO `adresa` (`id`, `naziv`) VALUES
(2, 'Jurija Gagarina, Novi Beograd'),
(1, 'Solunska, Dorćol'),
(3, 'Vukice Mitrović, Vračar');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `stan` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `tekst` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `stan`, `korisnik`, `tekst`) VALUES
(15, 2, 9, 'Sve preporuke, stan je skuplji, ali vredi tih para. Pozdrav :)');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `ime` varchar(50) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`, `ime`, `prezime`, `email`, `role`) VALUES
(1, 'bojanstojev', 'bojan', 'Bojan', 'Stojev', 'bojan@fon.rs', 'admin'),
(5, 'jelenautvic', 'jelena', 'Jelena', 'Utvic', 'jelena@fon.rs', 'korisnik'),
(7, 'sarakompirovic', 'sara', 'Sara', 'Kompirovic', 'sara@fon.rs', 'korisnik'),
(9, 'nevenastojadinovic', 'nevena', 'Nevena', 'Stojadinovic', 'nevena@fon.rs', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `stan` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `korisnik`, `stan`, `datum`) VALUES
(64, 7, 1, '2020-05-20'),
(65, 9, 1, '2020-05-21'),
(66, 7, 1, '2020-05-22'),
(67, 9, 1, '2020-05-23'),
(68, 7, 1, '2020-05-24'),
(71, 5, 2, '2020-06-03'),
(73, 5, 2, '2020-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `stan`
--

CREATE TABLE `stan` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_bin NOT NULL,
  `opis` varchar(255) COLLATE utf8_bin NOT NULL,
  `ulica` int(11) NOT NULL,
  `broj` varchar(10) COLLATE utf8_bin NOT NULL,
  `tip` varchar(50) COLLATE utf8_bin NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `vlasnik` int(11) NOT NULL,
  `troskovi` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `stan`
--

INSERT INTO `stan` (`id`, `naziv`, `opis`, `ulica`, `broj`, `tip`, `cena`, `vlasnik`, `troskovi`) VALUES
(1, 'ZEN', 'ZEN je studio apartman, čiji enterijer nikog ne ostavlja ravnodušnim.', 1, '13', 'apartman', '1500', 5, '184'),
(2, 'GLAM', 'Jedan od luksuzno opremljenih apartmana iz naše ponude je Apartman Glam.', 2, '74', 'jednosobni', '4950', 7, '450'),
(3, 'TRITON', 'Lokacija apartmana TRITON je poslednjih godina izuzetno atraktivna – on je pravi pravcati dvosoban stan na dan na Čuburi sa garažom.', 3, '26', 'dvosobni', '3499', 9, '320');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresa`
--
ALTER TABLE `adresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_fk` (`korisnik`),
  ADD KEY `stan_fk` (`stan`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stan` (`stan`,`datum`),
  ADD KEY `rezervacija_ibfk_2` (`korisnik`);

--
-- Indexes for table `stan`
--
ALTER TABLE `stan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vlasnik_fk` (`vlasnik`),
  ADD KEY `adresa_fk` (`ulica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresa`
--
ALTER TABLE `adresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `stan`
--
ALTER TABLE `stan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `korisnik_fk` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stan_fk` FOREIGN KEY (`stan`) REFERENCES `stan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`stan`) REFERENCES `stan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stan`
--
ALTER TABLE `stan`
  ADD CONSTRAINT `adresa_fk` FOREIGN KEY (`ulica`) REFERENCES `adresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vlasnik_fk` FOREIGN KEY (`vlasnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
