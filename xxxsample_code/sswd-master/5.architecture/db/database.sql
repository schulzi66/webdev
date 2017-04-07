-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2015 at 10:28 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sswd`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages1`
--

CREATE TABLE IF NOT EXISTS `pages1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages1`
--

INSERT INTO `pages1` (`id`, `page`, `title`, `text`) VALUES
(1, 'home', 'Welcome to the home page', '<p>This is the home page.</p>'),
(2, 'about', 'About Us', '<p>This is the about page.</p>');
