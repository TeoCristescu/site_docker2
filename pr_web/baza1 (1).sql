-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 15, 2020 la 04:08 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `baza1`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cart`
--

CREATE TABLE `cart` (
  `Id_produs` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `cart`
--

INSERT INTO `cart` (`Id_produs`, `Id_client`, `cantitate`) VALUES
(4, 1, 1),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

CREATE TABLE `comenzi` (
  `Id_comanda` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  `Data` date NOT NULL,
  `pret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comenzi`
--

INSERT INTO `comenzi` (`Id_comanda`, `Id_client`, `Data`, `pret`) VALUES
(2, 3, '2020-05-14', 13800),
(3, 3, '2020-05-15', 40000);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `detalii_comenzi`
--

CREATE TABLE `detalii_comenzi` (
  `Id_comanda` int(11) NOT NULL,
  `Id_produs` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `detalii_comenzi`
--

INSERT INTO `detalii_comenzi` (`Id_comanda`, `Id_produs`, `cantitate`) VALUES
(2, 1, 4),
(2, 2, 1),
(2, 3, 1),
(3, 3, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `nume`
--

CREATE TABLE `nume` (
  `Nume_si_prenume` varchar(50) NOT NULL,
  `User` varchar(30) NOT NULL,
  `Parola` varchar(20) NOT NULL,
  `Adresa` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `nume`
--

INSERT INTO `nume` (`Nume_si_prenume`, `User`, `Parola`, `Adresa`, `Email`, `Id`) VALUES
('Admin', 'Admin', 'Admin', '', '', 1),
('Teodor', 'Teo', 'G5kLisODZC', 'Pitesti', 'teocrriss99@gmail.com', 3),
('Sir', 'Sir', 'sir', 'sir ', 'sir@gmai.com', 4),
('yyyyy', 'yyyyy', 'yyyy', 'yyyyy', 'yyyyy@yahoo.com', 5),
('client2', 'client2', 'client2', 'client2', 'client2@yahoo.com', 6),
('aaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaa', 'aaaaaa@yahoo.aaaa', 8);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `redus` varchar(10) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`, `redus`, `categorie`) VALUES
(1, 'Pusca', '1', 200.00, 'img/1.jpg', 'da', 'arma'),
(2, 'Pistol', '2', 5000.00, 'img/2.jpg', 'nu', 'arma'),
(3, 'Barca', '3', 8000.00, 'img/b1.jpg', 'nu', 'palarie'),
(4, 'Palarie', '4', 4333.00, 'img/c3.jpg', 'da', 'palarie'),
(10, 'pusca2', '5', 4555.00, 'img/1.jpg', 'da', 'arma'),
(12, 'pusca3', '6', 4805.00, 'img/1.jpg', 'da', 'arma');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`Id_comanda`);

--
-- Indexuri pentru tabele `nume`
--
ALTER TABLE `nume`
  ADD PRIMARY KEY (`Id`);

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `Id_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `nume`
--
ALTER TABLE `nume`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
