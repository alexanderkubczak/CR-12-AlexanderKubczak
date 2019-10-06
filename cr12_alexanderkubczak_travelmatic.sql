-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Okt 2019 um 19:17
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr12_alexanderkubczak_travelmatic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artist`
--

CREATE TABLE `artist` (
  `artistID` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `located` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `artist`
--

INSERT INTO `artist` (`artistID`, `name`, `genre`, `located`, `portfolio`) VALUES
(1, 'PLEASUREKRAFT', 'Techno', 'Sweden', 'https://open.spotify.com/artist/4ipS3ZbqP46bs124yqp9N4?autoplay=true&v=A'),
(2, 'InsideInfo', 'Drum n Bass', 'England', 'https://open.spotify.com/artist/4HVopeHcb4aGTBsfIRrRcQ?si=xo2lSJOrRXK-ki1P2ektpQ'),
(3, 'VANDAL', 'Tekk', 'England', 'https://vandal-kaotik.bandcamp.com/');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `eventID` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `artistID` int(6) DEFAULT NULL,
  `locationID` int(6) DEFAULT NULL,
  `eventdate` date DEFAULT NULL,
  `eventtime` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `age` int(6) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`eventID`, `name`, `artistID`, `locationID`, `eventdate`, `eventtime`, `genre`, `age`, `price`, `description`) VALUES
(1, 'CONTRAST presents InsideInfo & Ulterior Motive', 2, 1, '2019-09-21', '23:00-06:00', 'Drum n Bass', 18, 10, 'f you’re looking for kiddie music, then look somewhere else - This one is all about quality!'),
(2, 'ZUCKERWATT w/ Pleasurekraft', 3, 1, '2019-10-11', '23:00-06:00', 'Techno', 18, 15, 'A musical vision attempting to encapsulate the power & beauty of the Cosmos within the confines of Techno music, while thematically yearning toward a greater understanding of the universe and our humble place within it.'),
(3, 'Vandal * Kaotik * Rush Hour reloaded *', 3, 2, '2019-09-21', '23:00-06:00', 'Tekk', 18, 15, 'Hardtekk on two floors, all night'),
(4, 'sdsd', NULL, NULL, '2022-09-09', NULL, 'tekk', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `locationID` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `telephone` int(20) DEFAULT NULL,
  `opening` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`locationID`, `name`, `adress`, `genre`, `telephone`, `opening`) VALUES
(1, 'Grelle Forelle', 'Spittelauer Lände 12, 1090 Wien', 'Techno', 2345678, '23:00-06:00'),
(2, 'Fluc', 'Praterstern 5', 'Techno', 12182824, '23:00-06:00'),
(3, 'Flex', 'Augartenbrücke 1, 1010 Wien', 'Hip Hop', 1234567, '23:00-06:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_password`, `role`) VALUES
(1, 'alex.kubczak@gmail.com', 'Alexander Kubczak', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(2, 'test@gmail.com', 'Test', '1e6fc791dc84fee0b7c81e461307249ff9c1f6ff00a899bd8c16dd0f9beddd0d', 0),
(3, 'www@gmail.com', 'Alex', 'ef5cba799ae6e785a4c07876b6a81358c8fc3ca74b6343ffe20ff5036514687a', 0),
(4, 'dadi@gmail.com', 'Yasemin Gezgin', 'ef5cba799ae6e785a4c07876b6a81358c8fc3ca74b6343ffe20ff5036514687a', 1),
(5, 'tester@gmail.com', 'tester testington', 'ef5cba799ae6e785a4c07876b6a81358c8fc3ca74b6343ffe20ff5036514687a', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistID`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `artistID` (`artistID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artist`
--
ALTER TABLE `artist`
  MODIFY `artistID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artist` (`artistID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
