-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Apr 2017 um 16:39
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `libraryswd`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` varchar(10) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `Taken` date DEFAULT NULL,
  `Returned` date DEFAULT NULL,
  `ImageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`ID`, `Title`, `Author`, `ISBN`, `Category`, `MemberID`, `Taken`, `Returned`, `ImageID`) VALUES
(1, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', '0439064872', 'Children,Fantasy', NULL, NULL, NULL, 1),
(2, 'A Feast of Crows', 'George R.R. Martin', '055358202X', 'Fantasy', 1, '2017-04-17', NULL, 4),
(3, 'A Dance with Dragons', 'George R.R. Martin', '0553841122', 'Fantasy', NULL, NULL, NULL, 5),
(4, 'A Game of Thrones', 'George R.R. Martin', '0553573403', 'Fantasy', NULL, NULL, NULL, 6),
(5, 'Das Kaenguru-Manifest', 'Marc-Uwe Kling', '3548373836', 'Humour,Political', NULL, NULL, NULL, 7),
(6, 'Relativity: The Special and the General Theory', 'Albert Einstein', '1891396307', 'Science,Education', NULL, NULL, NULL, 8),
(7, 'Eine Billion Dollar', 'Andreas Eschbach', '3404150406', 'Thriller,Fantasy', NULL, NULL, NULL, 9),
(8, 'The Call of Cthulhu', 'H.P. Lovecraft', '1500584339', 'Horror,Fantasy', NULL, NULL, NULL, 10),
(9, 'Paperback Oxford English Dictionary', 'Oxford Dictionaries', '0199640947', 'Education', NULL, NULL, NULL, 11),
(10, 'Gone Girl: A Novel', 'Gillian Flynn', '0385347774', 'Mystery,Thriller', NULL, NULL, NULL, 12),
(11, 'How To Win Friends And Influence People', 'Dale Carnegie', '1439199191', 'Business', NULL, NULL, NULL, 13),
(12, 'The 4-Hour Workweek', 'Timothy Ferriss', '0307465357', 'Business', NULL, NULL, NULL, 14),
(13, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', '0099590085', 'History,Education', NULL, NULL, NULL, 15),
(14, 'Java ist auch eine Insel', 'Christian Ullenboom', '3836241196', 'Education', NULL, NULL, NULL, 16),
(15, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', '1408855658', 'Children,Fantasy', NULL, NULL, NULL, 17),
(16, 'The Lord of the Rings', 'J.R.R. Tolkien', '0007525540', 'Fantasy', NULL, NULL, NULL, 18),
(17, 'Burnt Paper Sky', 'Gilly Macmillan', '0349406391', 'Mystery,Thriller', NULL, NULL, NULL, 19),
(18, 'The Da Vinci Code', 'Dan Brown', '0307474275', 'Mystery,Thriller', NULL, NULL, NULL, 20),
(19, 'The Dictator\'s Handbook: Why Bad Behavior is Almost Always Good Politics', 'Bruce Bueno de Mesquita', '1610391845', 'History,Education', NULL, NULL, NULL, 21),
(20, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', '0345391802', 'Fantasy,Humour', NULL, NULL, NULL, 22);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gallery`
--

CREATE TABLE `gallery` (
  `GalleryID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `State` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `gallery`
--

INSERT INTO `gallery` (`GalleryID`, `Name`, `State`) VALUES
(1, 'about', 1),
(2, 'index', 0),
(3, 'contact', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galleryimages`
--

CREATE TABLE `galleryimages` (
  `GalleryID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `galleryimages`
--

INSERT INTO `galleryimages` (`GalleryID`, `ImageID`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(2, 23),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `PictureRef` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`ImageID`, `Type`, `PictureRef`, `Name`, `Caption`) VALUES
(1, 'jpg', 'harry-potter-and-the-chamber-of-secrets', 'Testimage', ''),
(2, 'jpg', 'library-5', 'Library', ''),
(3, 'jpg', 'class-steel-installation', 'Class Steel Installation', ''),
(4, 'jpg', 'AFeastForCrows', 'A Feast For Crows', ''),
(5, 'jpg', 'A_Dance_With_Dragons', 'A Dance With Dragons', ''),
(6, 'jpg', 'AGameOfThrones', 'A Game of Thrones', ''),
(7, 'jpg', 'Das_Kaenguru-Manifest', 'Das Kaenguru-Manifest', ''),
(8, 'jpg', 'Relativity', 'Relativity: The Special and General Theory', ''),
(9, 'jpg', 'EineBillionDollar', 'Eine Billion Dollar', ''),
(10, 'jpg', 'CallOfCthulhu', 'The Call of Cthulhu', ''),
(11, 'jpg', 'Oxford', 'Paperback Oxford English Dictionary', ''),
(12, 'jpg', 'GoneGirl', 'Gone Girl: A Novel', ''),
(13, 'jpg', 'HowToWinFriends', 'How To Win Friends And Influence People', ''),
(14, 'jpg', 'FourHourWorkweek', 'The 4-Hour Workweek', ''),
(15, 'jpg', 'Sapiens_A_Brief_History_of_Humankind', 'Sapiens: A Brief History of Humankind', ''),
(16, 'jpg', 'Java-ist-auch-eine-Insel', 'Java ist auch eine Insel', ''),
(17, 'jpg', 'Harry_Potter_and_the_Philosophers_Stone', 'Harry Potter and the Philosophers Stone', ''),
(18, 'jpg', 'lotr', 'The Lord of the Rings', ''),
(19, 'jpg', 'burntpapersky', 'Burnt Paper Sky', ''),
(20, 'jpg', 'DaVinciCode', 'The Da Vinci Code', ''),
(21, 'jpg', 'TheDictatorsHandbook', 'The Dictators Handbook: Why Bad Behavior is Almost Always Good Politics', ''),
(22, 'jpg', 'The_Hitchhikers_Guide_to_the_Galaxy', 'The Hitchhikers Guide to the Galaxy', ''),
(23, 'jpg', 'ArchitectureArtDesigns-180', 'Architecture Art Designs', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Birth` date DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `member`
--

INSERT INTO `member` (`MemberID`, `Firstname`, `Surname`, `Address`, `Phone`, `Birth`, `Gender`, `Email`) VALUES
(1, 'Philip', 'Koep', 'School Avenue, Glasheen, Cork', '+4901721234567', '1992-01-23', 'Male', 'philip.koep@eufh-mail.de'),
(2, 'Marius', 'Schulze', 'School Avenue, Glasheen, Cork', '+4901607654321', '1995-04-01', 'Male', 'marius.schulze@eufh-mail.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` longtext NOT NULL,
  `Replied` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `messages`
--

INSERT INTO `messages` (`MessageID`, `Firstname`, `Surname`, `Email`, `Message`, `Replied`) VALUES
(1, 'Marius', 'Schulze', 'marius.schulze@eufh-mail.de', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pagecontent`
--

CREATE TABLE `pagecontent` (
  `PageID` int(11) NOT NULL,
  `PageName` varchar(50) NOT NULL,
  `Headline` varchar(255) NOT NULL,
  `Content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `pagecontent`
--

INSERT INTO `pagecontent` (`PageID`, `PageName`, `Headline`, `Content`) VALUES
(1, 'about', 'About', 'The SWD Library is a great library with all kinds of books for all ages. - Your library team'),
(2, 'contact', 'Contact Us', 'Please feel free to contact us anytime with regards to any questions'),
(3, 'index', 'Home', 'Welcome to the SWD Library!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`) VALUES
(1, 'admin', 'password');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_books_member` (`MemberID`),
  ADD KEY `FK_books_images` (`ImageID`);

--
-- Indizes für die Tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`GalleryID`);

--
-- Indizes für die Tabelle `galleryimages`
--
ALTER TABLE `galleryimages`
  ADD PRIMARY KEY (`GalleryID`,`ImageID`),
  ADD KEY `FK_images` (`ImageID`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indizes für die Tabelle `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indizes für die Tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indizes für die Tabelle `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD PRIMARY KEY (`PageID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT für Tabelle `gallery`
--
ALTER TABLE `gallery`
  MODIFY `GalleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT für Tabelle `member`
--
ALTER TABLE `member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `PageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_books_images` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`),
  ADD CONSTRAINT `FK_books_member` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberID`);

--
-- Constraints der Tabelle `galleryimages`
--
ALTER TABLE `galleryimages`
  ADD CONSTRAINT `FK_gallery` FOREIGN KEY (`GalleryID`) REFERENCES `gallery` (`GalleryID`),
  ADD CONSTRAINT `FK_images` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
