-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2013 at 10:57 AM
-- Server version: 5.5.29-log
-- PHP Version: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `suplink-143783`
--
CREATE DATABASE `suplink-143783` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `suplink-143783`;

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_link` varchar(255) NOT NULL,
  `date_click` date NOT NULL,
  `referee` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`id`, `short_link`, `date_click`, `referee`, `country`) VALUES
(1, 'n5d42', '2013-02-21', 'test', 'test'),
(2, 'n5d42', '2013-02-21', 'test', 'test'),
(3, 'n5d42', '2013-02-21', 'test', 'test'),
(4, 'n5d42', '2013-02-21', 'test', 'test'),
(5, 'n5d42', '2013-02-21', 'test', 'test'),
(6, 'mpVN7', '2013-02-21', 'test', 'test'),
(7, 'mpVN7', '2013-02-21', 'test', 'test'),
(8, 'n5d42', '2013-02-21', 'test', 'test'),
(9, 'n5d42', '2013-02-21', 'test', 'test'),
(10, 'n5d42', '2013-02-21', 'test', 'test'),
(11, 'n5d42', '2013-02-21', 'test', 'test'),
(12, 'n5d42', '2013-02-21', 'test', 'test'),
(13, 'n5d42', '2013-02-21', 'test', 'test'),
(14, 'n5d42', '2013-02-28', 'test', 'test'),
(15, 'mpVN7', '2013-02-28', 'test', 'test'),
(16, 'MVF62', '2013-02-28', 'test', 'test'),
(17, '3GCVP', '2013-02-28', 'test', 'test'),
(18, '3GCVP', '2013-02-28', 'test', 'test'),
(19, '3GCVP', '2013-02-28', 'test', 'test'),
(20, '3GCVP', '2013-02-28', 'test', 'test'),
(21, '3GCVP', '2013-02-28', 'test', 'test'),
(22, '3GCVP', '2013-02-28', 'test', 'test'),
(23, '3GCVP', '2013-02-28', 'test', 'test'),
(24, 'n5d42', '2013-02-28', 'test', 'test'),
(25, '3n2vw', '2013-02-28', 'test', 'test'),
(26, '3GCVP', '2013-02-28', 'test', 'test'),
(27, 'MVF62', '2013-02-28', 'test', 'test'),
(28, '3n2vw', '2013-02-28', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_link` varchar(255) NOT NULL,
  `long_link` varchar(255) NOT NULL,
  `click_total` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `id_user`, `name`, `short_link`, `long_link`, `click_total`, `date_create`) VALUES
(62, 11, '&lt;script&gt;while(1){}&lt;/script&gt;', '3n2vw', 'http://www.google.fr', 2, '2013-02-28 10:23:08'),
(63, 10, 'CATS', 'MVF62', 'http://www.reddit.com/r/aww/', 2, '2013-02-28 10:24:13'),
(64, 10, 'fb', 'ZWEaj', 'https://www.facebook.com/', 0, '2013-02-28 10:24:40'),
(65, 11, 'awww', '3GCVP', 'http://www.reddit.com/r/aww/', 8, '2013-02-28 10:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `verif` tinyint(1) NOT NULL,
  `verif_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `date_inscription`, `verif`, `verif_hash`) VALUES
(10, 'test@te.st', 'ecVLdK/k7KQMg', '2013-02-18 23:55:47', 0, 'ecP9XoTPjdUUI'),
(11, 'aze@aze.aze', 'eczGZeSYYwHo2', '2013-02-19 09:27:29', 0, 'eciDirSJPW7Ws'),
(12, 'qsd@qsd.qsd', 'ecAf2/axzQRo2', '2013-02-19 15:01:23', 0, 'ecXZuKPs2QBwM');
