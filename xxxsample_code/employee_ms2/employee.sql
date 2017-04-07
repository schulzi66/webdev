-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 10:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_no` char(4) NOT NULL,
  `dept_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_no`, `dept_name`) VALUES
('D005', 'Cumstomer Service'),
('D001', 'Finance'),
('D004', 'Human Resource'),
('D003', 'Marketing'),
('D002', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `dept_emp`
--

CREATE TABLE IF NOT EXISTS `dept_emp` (
  `emp_no` int(11) NOT NULL,
  `dept_no` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `hire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`first_name`, `last_name`, `emp_no`, `birth_date`, `gender`, `telephone`, `email`, `address`, `salary`, `hire_date`) VALUES
('Bruce', 'Banner', 0, '1983-11-02', '', '+353810594370', 'Bruce.Banner@example.com', '19 Wood Lane', 32200, '2015-02-02'),
('Patrick', 'Harvey-Ryan', 4, '0990-02-01', 'Female', '+234949494', 'ryan@gmail.com', '23 Leafy Drive', 43444, '0016-01-02'),
('John', 'O''Neill', 5, '1987-04-21', 'Male', '+234949494', 'ryan@gmail.com', '23 Leafy Ave', 43444, '2015-01-14'),
('Jason', 'Reily O''Neill', 6, '1983-04-12', 'Male', '+234949494', 'jason@gmail.com', '2 Hillwalk Ave', 43100, '2015-01-14'),
('June', 'McMahon', 9, '1986-04-21', 'Female', '+8739398393', 'june@gmail.com', '1004 New Appartments', 24000, '2000-03-01'),
('Patricia', 'D''Arcy', 142, '0000-00-00', 'Female', '+234949494', 'r233434@gmail.com', '23 Leafy Drive', 43444, '0000-00-00'),
('Patricia', 'D''Olier-Smyth', 143, '0000-00-00', 'Female', '+234949494', 'r233434@gmail.com', '23 Leafy Drive', 43444, '0000-00-00'),
('Bruce', 'Banner', 194, '1983-11-02', '', '+353810594370', 'Bruce.Banner@example.com', '19 Wood Lane', 32200, '2015-02-02'),
('Bruce Alan', 'Johnson', 245, '1983-11-30', 'Male', '+3538104949', 'johnson@example.com', '19 Wood Lane', 32200, '2015-02-02'),
('Holly', 'Hassett', 327, '0000-00-00', 'Female', '+3424443', 'holly@hotmail.com', '1 High St', 24344, '0000-00-00'),
('Hilda', 'Hennessy', 329, '0000-00-00', 'Female', '+335454544', 'hilda@hotmail.com', '2 High St', 24344, '0000-00-00'),
('Nicola', 'Green', 332, '0000-00-00', 'Female', '+3433939393', 'nicola@gmail.com', '1 The Lane', 67888, '0000-00-00'),
('Jennifer', 'Ryan', 334, '0000-00-00', 'Female', '+3433939535', 'jena@gmail.com', '1 The Woods', 67000, '0000-00-00'),
('Joanie', 'Halligan', 343, '0000-00-00', 'Female', '+3534423232', 'joannie@gmail.com', '12 Wood Lawn', 43232, '0000-00-00'),
('Linda', 'O''Brien', 386, '0000-00-00', 'Female', '+234345435', 'linda@gmail.co.uk', '9 Wishing Well', 24000, '0000-00-00'),
('Ciara', 'Cannon', 431, '1996-09-19', 'Female', '+3535858585', 'ciarac@gmail.com', '10 Deer Park', 45000, '2016-05-01'),
('David James', 'O''Connor Lee', 438, '1980-03-11', 'Male', '+353810594rr', 'davidjames44@example.com', '112 Larkspur Ave,\r\nMidleton, Cork.', 76000, '2014-02-25'),
('Kevin', 'Reilly', 444, '1995-03-21', 'Male', '+353885855119', 'kevin46@gmail.com', '1 The Lane, Cork', 36500, '2016-03-12'),
('Andrew', 'Foster', 511, '1990-02-21', 'Male', '+353810594370', 'andrewfoster@example.com', 'Boher Bui\r\nCastlemartyr', 32200, '2016-02-01'),
('Lorna', 'Doone', 534, '1963-09-02', 'Female', '+3538585855', 'ldoone@example.com', '1 Wood Lane', 32200, '2015-10-22'),
('Brian', 'Bateman', 537, '1987-12-25', 'Male', '+3538105444', 'brian.bateman@example.com', '98 Hags Lane', 32200, '2015-02-23'),
('Lee', 'Blennerhasset', 555, '1972-03-11', 'Female', '+35394949444', 'carolyn@hotmail.com', '45 Willow Avenue,\r\nDouglas,\r\nCork,\r\nIreland.', 35200, '2016-02-18'),
('Elise', 'Dumont', 737, '1990-02-21', 'Female', '+42424242', 'elise@gmail.com', '102 Belle Vue', 34000, '2015-03-01'),
('Henry', 'Fox', 782, '1987-02-21', 'Male', '+44585858585', 'henry@hotmail.com', '1 Fox Grove,\r\nLeicester.', 60000, '2014-09-21'),
('Lisa', 'Allen', 895, '1988-10-09', 'Female', '+35381054455', 'lisa123@example.com', '12 Oak Lane', 32555, '2012-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`dept_no`), ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `dept_emp`
--
ALTER TABLE `dept_emp`
 ADD PRIMARY KEY (`emp_no`,`dept_no`), ADD KEY `dept_no` (`dept_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`emp_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dept_emp`
--
ALTER TABLE `dept_emp`
ADD CONSTRAINT `dept_emp_ibfk_1` FOREIGN KEY (`emp_no`) REFERENCES `employee` (`emp_no`) ON DELETE CASCADE,
ADD CONSTRAINT `dept_emp_ibfk_2` FOREIGN KEY (`dept_no`) REFERENCES `department` (`dept_no`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
