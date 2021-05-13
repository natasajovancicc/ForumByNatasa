-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 13. maj 2021 ob 18.25
-- Različica strežnika: 10.4.6-MariaDB
-- Različica PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `dbforum`
--

-- --------------------------------------------------------

--
-- Struktura tabele `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `upIme` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `admin`
--

INSERT INTO `admin` (`Id`, `upIme`, `geslo`) VALUES
(1, 'admin1', 'admin1'),
(4, 'nata', 'nata'),
(5, 'na', 'na');

-- --------------------------------------------------------

--
-- Struktura tabele `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorija_Id` int(12) NOT NULL,
  `kategorija` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `kategorija`
--

INSERT INTO `kategorija` (`kategorija_Id`, `kategorija`) VALUES
(1, 'Zabava'),
(6, 'Šport'),
(7, 'Glasba'),
(11, 'Ostalo');

-- --------------------------------------------------------

--
-- Struktura tabele `komentar`
--

CREATE TABLE `komentar` (
  `komentar_Id` int(11) NOT NULL,
  `komentar` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `tema_Id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `uporabnik_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `komentar`
--

INSERT INTO `komentar` (`komentar_Id`, `komentar`, `tema_Id`, `datetime`, `uporabnik_Id`) VALUES
(22, 'Vse po malem', 28, '2021-05-13 04:37:40', 29),
(26, 'Kdaj mislite, da se bo spet vse vrnilo, kot je bilo včasih?', 33, '2021-05-13 06:19:30', 31),
(27, 'Jaz tudi še ne vem...', 27, '2021-05-13 06:19:46', 31),
(28, 'Odvisno od razpoloženja :)', 28, '2021-05-13 06:20:05', 31),
(29, 'mene pa zanima, če se boste šli cepit?', 33, '2021-05-13 06:20:52', 32),
(30, 'Zabavno, narodnozabavno, rock, pop, klasiko', 28, '2021-05-13 06:21:40', 32),
(31, 'Odvisno od financ :D', 27, '2021-05-13 06:22:01', 32),
(32, 'Jaz študiram, da grem v Bulgarijo... lepe plaže so tam', 27, '2021-05-13 06:22:49', 33),
(33, 'Maribor  ŠAMPION !!! ', 26, '2021-05-13 06:23:34', 34),
(34, 'Jaz še ne vem.', 33, '2021-05-13 06:24:01', 34),
(35, 'Jaz pa kar na slovensko obalo, Portorož ', 27, '2021-05-13 06:24:46', 34);

-- --------------------------------------------------------

--
-- Struktura tabele `racun`
--

CREATE TABLE `racun` (
  `racun_Id` int(11) NOT NULL,
  `upIme` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `uporabnik_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `racun`
--

INSERT INTO `racun` (`racun_Id`, `upIme`, `geslo`, `uporabnik_Id`) VALUES
(25, 'JanezN', '827ccb0eea8a706c4c34a16891f84e7b', 27),
(27, 'MajaK', 'ae404a1ecbcdc8e96ae4457790025f50', 29),
(29, 'nata', '093d8a0793df4654fee95cc1215555b3', 31),
(30, 'MihaK', 'ae404a1ecbcdc8e96ae4457790025f50', 32),
(31, 'MajaM', 'ae404a1ecbcdc8e96ae4457790025f50', 33),
(32, 'MatejS', 'ae404a1ecbcdc8e96ae4457790025f50', 34);

-- --------------------------------------------------------

--
-- Struktura tabele `tema`
--

CREATE TABLE `tema` (
  `tema_Id` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `vsebina` text COLLATE utf8_slovenian_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `kategorija_id` int(12) DEFAULT NULL,
  `uporabnik_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `tema`
--

INSERT INTO `tema` (`tema_Id`, `naslov`, `vsebina`, `datetime`, `kategorija_id`, `uporabnik_Id`) VALUES
(26, 'Nogomet', 'Danes je derbi... kdo bo zmagal? Jaz navijam za Maribor! :)', '2021-05-13 04:29:43', 6, 27),
(27, 'Dopust', 'Kam imate kaj letos oditi na dopust? Jaz še ne vem...', '2021-05-13 04:31:41', 1, 27),
(28, 'Splošno', 'Kakšno zvrst glasbe poslušate najraje?', '2021-05-13 04:32:02', 7, 27),
(33, 'Covid', 'Upam, da čimprej mine... in bo vse kot je bil včasih.', '2021-05-13 06:16:14', 11, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnik`
--

CREATE TABLE `uporabnik` (
  `uporabnik_Id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `priimek` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabnik`
--

INSERT INTO `uporabnik` (`uporabnik_Id`, `ime`, `priimek`) VALUES
(27, 'Janez', 'Novak'),
(29, 'Maja', 'Kos'),
(31, 'Nataša', 'Jovančić'),
(32, 'Miha', 'K'),
(33, 'Maja', 'M'),
(34, 'Matej', 'S');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksi tabele `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorija_Id`);

--
-- Indeksi tabele `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_Id`),
  ADD KEY `user_Id` (`uporabnik_Id`),
  ADD KEY `post_Id` (`tema_Id`),
  ADD KEY `user_Id_2` (`uporabnik_Id`);

--
-- Indeksi tabele `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`racun_Id`),
  ADD KEY `user_Id` (`uporabnik_Id`);

--
-- Indeksi tabele `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`tema_Id`),
  ADD KEY `cat_id` (`kategorija_id`),
  ADD KEY `user_Id` (`uporabnik_Id`);

--
-- Indeksi tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  ADD PRIMARY KEY (`uporabnik_Id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT tabele `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `kategorija_Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT tabele `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT tabele `racun`
--
ALTER TABLE `racun`
  MODIFY `racun_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT tabele `tema`
--
ALTER TABLE `tema`
  MODIFY `tema_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `uporabnik_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`uporabnik_Id`) REFERENCES `uporabnik` (`uporabnik_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`tema_Id`) REFERENCES `tema` (`tema_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omejitve za tabelo `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `racun_ibfk_1` FOREIGN KEY (`uporabnik_Id`) REFERENCES `uporabnik` (`uporabnik_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omejitve za tabelo `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`kategorija_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
