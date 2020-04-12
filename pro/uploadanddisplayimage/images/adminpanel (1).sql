-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 10 Mai 2019 à 23:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `adminpanel`
--

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `register`
--

INSERT INTO `register` (`username`, `email`, `password`, `id`, `usertype`) VALUES
('wiam bndj', 'wiam@gmail.com', 'wiam', 1, ''),
('wiwitta1300', 'infomaiw1300@gmail.com', 'wiwitta13', 3, ''),
('amina', 'amina@gmail.com', '123456', 6, ''),
('riha', 'amina@gmail.com', '1234', 7, ''),
('qqqq', 'qqqq@gm.c', '123456', 8, ''),
('riad', 'r@g.c', '123456', 10, ''),
('nadir', 'na@g.c', '123456', 11, ''),
('kkkk', 'k@g.c', '123456', 12, ''),
('ranimen', 'rani@g.c', 'rani', 13, ''),
('tsante1', 'tsante1@gmail.com', '123456', 14, ''),
('djamel', 'd@g.c', '123456', 15, ''),
('riri ', 'riri@gmail.com', 'riri', 16, ''),
('wiwiwi ', 'wi@g.c', 'wiwiwi', 17, ''),
('fatima ', 'fati@gmail.com', 'fatima', 18, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
