-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 08 feb 2015 om 13:51
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `freshframework`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateSent` datetime NOT NULL,
  `ipAddress` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `userId`, `message`, `dateSent`, `ipAddress`) VALUES
(1, 1, 'This is my first message', '2015-02-08 09:45:17', 1270);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `insertion` varchar(15) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `insertion`, `surname`, `email`) VALUES
(1, 'Arjen', '', 'Schumacher', 'arjen.schumacher@gmail.com'),
(2, 'wewer', '', 'erwtert', 'erte@werwe.nl'),
(3, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(4, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(5, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(6, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(7, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(8, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(9, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(10, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(11, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(12, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(13, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(14, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(15, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(16, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(17, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(18, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(19, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(20, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(21, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(22, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(23, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(24, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(25, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(26, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(27, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com'),
(28, 'werwer', '', 'werwer', 'arjen.schumacher@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
