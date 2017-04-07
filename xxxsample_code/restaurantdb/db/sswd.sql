-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 07:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sswd`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--
CREATE DATABASE IF NOT EXISTS sswd;
CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `star` int(1) NOT NULL,
  `show_comment` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `name`, `email`, `message`, `star`, `show_comment`) VALUES
(1, '2015-02-24 15:58:34', 'JOBS Steve', 'steve.jobs@gmail.com', 'Hello', 2, 0),
(19, '2016-04-10 18:04:12', 'Joe Bloggs', 'joe@gmail.com', 'Very nice atmosphere and great food.', 4, 1),
(20, '2016-04-18 14:01:02', 'Cathy', 'cmalone21@gmail.com', 'Really good', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `text`) VALUES
(1, 'Since opening five years ago, The Apple Tree has become one of most popular restaurants for locals & visitors alike.\r\nThis has been built on our molecular gastronomy Chef James Fleming of Michelin star restaurant, who proudly raises his own produce and livestock so that he has the freshest, purest ingredients to use in his modernist versions of traditional cuisine, as well as the buzzing atmosphere.\r\n\r\nUpstairs in The Apple Tree with its the panoramic views of St. Finbarr’s Cathedral & the historical South Mall provide the perfect backdrop to the finest quality food to be had in Cork city centre.\r\n\r\n\r\nOur Lunch Menu runs from midday to 5pm daily. \r\nFor all occasions, whether a working lunch or a celebration, Upstairs at The Apple Tree is the place to go.\r\nOur evening menus begin at 5pm.\r\nFor enquiries or reservations please email Book@TheAppleTree.com or call +353 21 4222 990\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
`id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `show_meal` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `type`, `title`, `price`, `picture`, `description`, `show_meal`) VALUES
(1, 'main', 'Smoked Raw Salmon with Dill Cream ', '13', 'Smoked_Salmon.jpg', '<p>The raw salmon is smoked tableside under a glass with mesquite smoke using the Smoking Gun. The smoked raw salmon is sprinkled with crispy shallots and micro greens and it is served with toasted baguette slices and a dill cream.</p>', 1),
(2, 'starter', 'Smoked Butter with Sherry Vinegar Jelly ', '15', 'Smoked_Butter.jpg', '<p>The smoked butter is sprinkled with sea salt flakes and it is served with Sherry vinegar jelly and a fresh bread roll.</p>', 1),
(3, 'starter', 'Smoked Spinach Salad', '10', 'Smoked_Spinach.jpg', ' The spinach is infused with a delicate smoke aroma using the Smoking Gun.\r\nThe salad also has rosemary, dried cranberries, caramelized pecans and feta cheese. ', 1),
(4, 'starter', 'Coconut Bubbles, Gruyere and Candied Apricot ', '12', 'Coconut_Bubbles.jpg', 'The crispy and salty Gruyere tuille pairs perfectly with the sweet candied apricots and coconut bubbles.\r\nThe bubbles are made using the fish tank air pump technique. ', 1),
(5, 'main', 'Carrot Air with Tangerine Granita ', '20', 'Carrot_Air.jpg', 'A flavorful tangerine pulp granita with ultra-light carrot foam (air) and spiced up with cardamom and thyme leaves.\r\n', 1),
(6, 'dessert', 'Saffron Creme Anglaise with Coffee Air ', '21', 'Saffron_Creme_Anglaise.jpg', 'The creme anglaise is infused with a delicate saffron aroma and topped with coffee air.', 1),
(7, 'main', 'Mini Air Bread with Iberian Bacon & Caviaroli ', '18', 'Mini_Air_Bread.jpg', 'The smoky flavor of bacon melds with the crispy texture and mildly sour flavor of these delightfully\r\nbite-sized breads while the crunch of sea salt and the pop of the oil spheres combine to deliver a surprisingly\r\ncomplex flavor and texture experience .', 1),
(8, 'dessert', 'Yuzu Cilantro Spheres ', '19', 'Yuzu_Cilantro_Spheres.jpg', '<p>The spheres are garnished with cilantro leaf, orange zest and popping sugar, adding an extra pop and crackling. In this recipe we''ll be using Frozen Reverse Spherification to create the spheres.</p>', 1),
(9, 'appetizer', 'Down The Rabbit Hole', '8', 'Down_The_Rabbit_Hole.jpg', '<p>This cocktail is served in two parts to the guest with instructions to pour one part into the other for a color change before their eyes. Part one is the main cocktail served in a bespoke bottle that is citrus-yellow in color and is poured over a glass with ice cubes and a few drops of blue Butterfly Pea Flower Extract (b''Lure), a new and unique product from Wild Hibiscus Flower Company.</p>', 1),
(10, 'dessert', 'Goat Milk Gel, Strawberries, Port, Apple Cider', '20', 'Goat_Milk_Gel.jpg', 'A refreshing dessert with goat milk gel, macerated strawberries, port wine fluid gel, apple cider fluid gel, powdered blueberries, candied pecans and cilantro.', 1),
(11, 'appetizer', 'White Sangria in Suspension ', '7', 'White_Sangria.jpg', 'A delicious, refreshing and incredibly smooth and velvety sangria with suspended fruit and mint leaves at different levels. ', 1),
(12, 'appetizer', 'Coffee and Milk Foam', '7', 'Coffee_Milk_Foam.jpg', 'A simple airy coffee and milk foam. Made light and airy with an iSi Whip charged with N2O and stabilized with soy lecithin as the emulsifier and iota carrageenan as a thickener', 1),
(13, 'appetizer', 'Changing Gin & Tonic Blue Ice', '8', 'Changing_Gin_Tonic_Blue_Ice.jpg', 'a classic gin tonic  with butterfly pea flowers. \r\nThese magical blue flowers, commonly used in Thailand, have a distinct bright blue color. \r\nWhat is special about the intense blue extract from these flowers is that it changes to purple and pink with a citrus squeeze.', 1),
(14, 'dessert', 'Sakura cress Chocolate, Yogurt, Red Pepper, Cayenne ', '14', 'Sakura_cress_Chocolate.jpg', '<p>In this dessert, we are combining Sakura Cress, chocolate, yogurt, roasted red pepper and cayenne pepper. Sakura Cress is the dark purple version of Daikon Cress and tastes similar to radish sprouts.</p>', 1),
(15, 'appetizer', 'champagne', '20', 'BAR_CHAMPAGNE.jpg', '<p>Choose a champagne between our Bellinis, Laurent Perrier etc...</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `page`, `description`) VALUES
(1, 'ch_nitrogen.jpg', '', ''),
(2, 'image-moleculaire.jpg', '', ''),
(3, 'Smoked_Salmon.jpg', '', ''),
(4, 'Smoked_Butter.jpg', '', ''),
(5, 'Smoked_Spinach.jpg', '', ''),
(6, 'Coconut_Bubbles.jpg', '', ''),
(7, 'Carrot_Air.jpg', '', ''),
(8, 'Saffron_Creme_Anglaise.jpg', '', ''),
(9, 'Mini_Air_Bread.jpg', '', ''),
(10, 'Yuzu_Cilantro_Spheres.jpg', '', ''),
(11, 'Down_The_Rabbit_Hole.jpg', '', ''),
(12, 'Goat_Milk_Gel.jpg', '', ''),
(13, 'White_Sangria.jpg.jpg', '', ''),
(14, 'Coffee_Milk_Foam.jpg', '', ''),
(15, 'Changing_Gin_Tonic_Blue_Ice.jpg', '', ''),
(16, 'Sakura_cress_Chocolate.jpg', '', ''),
(17, 'telechargement.jpg', '', ''),
(18, 'telechargement2.jpg', '', ''),
(19, 'view.jpg', 'home', 'Here is a beautiful view from our restaurant in Paris'),
(20, 'sanfrancisco.jpg', '', '<p>Here is a beautiful view from our restaurant in SF</p>'),
(26, 'pict2.jpg', '', '<p>Discover our new recipes !</p>'),
(27, 'contact_us.jpg', 'contact', '<p>Feel free to contact us !</p>'),
(29, 'cocktail.jpg', 'XSMAS', '<p>newwwww</p>'),
(30, 'menu.jpg', 'menu', ''),
(31, 'BAR_CHAMPAGNE.jpg', '', ''),
(32, 'RESTAURANT.jpg', '', ''),
(33, 'Hydrangeas.jpg', 'Contact', '<p>Flowers</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`, `title`, `text`) VALUES
(1, 'home', 'Welcome to The Apple Tree', '<p>Since opening five years ago, <strong>The Apple Tree</strong> has become one of most popular restaurants for locals &amp; visitors alike. This has been built on the gastronomy of Chef John Flood of Michelin star fame, who proudly raises his own produce and livestock so that he has the freshest, purest ingredients to use in his modernist versions of traditional cuisine.</p>\r\n<p><br />Upstairs in The Apple Tree with its the panoramic views of Paris provide the perfect backdrop to the finest quality food to be had in the city of light. For all occasions, whether a working lunch or a celebration, Upstairs at The Apple Tree&nbsp;is the place to go.</p>\r\n<p><br /> Our Lunch Menu runs from midday to 3pm daily. Our evening menus begin at 6pm.<br />For enquiries or reservations please email Book@AppleTree.com or call +331 21 42 22 90</p>'),
(2, 'menu', 'Menu', '<p><strong>Lunch menu:</strong></p>\r\n<ul>\r\n<li>&nbsp;3 course menu &euro;50 ( 1 starter or dessert, 1 main and 1 appetizer)</li>\r\n<li>&nbsp;4 course menu &euro;60 ( 1 starter, 1 main, 1 dessert and 1 appetizer)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Diner menu : </strong></p>\r\n<ul>\r\n<li>6 course menu &euro;60 ( 2 starter or dessert, 3 main and 1 appetizer)</li>\r\n<li>10 course menu &euro;65 ( 2 starter, 4 main, 2 dessert and 2 appetizers)</li>\r\n</ul>'),
(3, 'contact', '', '<p>For enquiries or reservations please email Book@AppleTree.com or call +331 21 42 22 90</p>\r\n<p>Send us a comment.</p>'),
(5, 'XMAS', 'SPECIAL EVENTS FOR Christmas', '<p>Discover our special menu and events for <strong>Christmas!!</strong></p>'),
(7, 'Useful Information', 'Useful Information', '<p>&nbsp;<img src="http://cieldeparis.com/public/images/image_list/1205_CDP_IMAGE_300_150_RESTAURANT.jpg" alt="" width="300" height="150" /></p></p><p>The Apple Tree Restaurant is open everyday from 7.30 am to 11.00 pm <br /> The Champagne Bar is open until 1.00 am<br /> <br />Service Hours :<br /> <br /> <br /> Lunch from 12.00 am to 2.30 pm<br /> <br /> <br /> Dinner from 19.00 pm to 11.00 pm<br /> First service from 7.00 pm &agrave; 9.00 pm<br /> Second service from 9.45 pm to 11.00 pm</p><p><br /> Supper (after theatre)<br />Thursday, Friday and Saturday<br />&nbsp; from 11.00 pm to 11.30 pm</p><p>The Apple Tree Restaurant<br /> Tour Maine Montparnasse<br /> 56th floor<br /> 33, avenue du Maine<br /> 75015 Paris</p><p>Restaurant access by elevator <em>The Apple Tree</em></p><p>---</p><p>Parking :<br /> Rue du D&eacute;part or Rue de l''arriv&eacute;e 4th underground - zone C<br /> <br /> Subway :<br /> station&nbsp; Montparnasse-Bienven&uuml;e <br /> line 4, 6, 12, 13</p><p>Bus :<br /> lines 28, 58, 82, 88, 89, 91, 92, 94, 95, 96</p><p>SNCF :<br /> Gare Montparnasse</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `username`, `password`) VALUES
(1, '2015-02-17 12:21:11', 'admin', 'password'),
(2, '2016-04-10 20:39:44', 'joe', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
 ADD PRIMARY KEY (`id`), ADD KEY `title` (`title`), ADD KEY `title_2` (`title`), ADD KEY `title_3` (`title`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
