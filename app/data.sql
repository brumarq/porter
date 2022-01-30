-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 30, 2022 at 04:44 PM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porter`
--
CREATE DATABASE porter;
use porter;
-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `textMarkup` longtext DEFAULT NULL,
  `textHtml` longtext DEFAULT NULL,
  `fkWorkspace` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `textMarkup`, `textHtml`, `fkWorkspace`, `title`, `created`) VALUES
(36, '\n# Wikipedia definition\nAircraft hijacking (also known as airplane hijacking, skyjacking, plane hijacking, plane jacking, air robbery, air piracy, or aircraft piracy, with the last term used within the special aircraft jurisdiction of the United States) is the unlawful seizure of an aircraft by an individual or a group.[1] Dating from the earliest of hijackings, most cases involve the pilot being forced to fly according to the hijacker\'s demands. However, in rare cases, the hijackers have flown the aircraft themselves and used them in suicide attacks – most notably in the September 11 attacks – and in several cases, planes have been hijacked by the official pilot or co-pilot; e.g., the Lubitz case.[2][3][4]\n\nUnlike carjacking or sea piracy, an aircraft hijacking is not usually committed for robbery or theft. Individuals driven by personal gain often divert planes to destinations where they are not planning to go themselves.[5] Some hijackers intend to use passengers or crew as hostages, either for monetary ransom or for some political or administrative concession by authorities. Various motives have driven such occurrences, such as demanding the release of certain high-profile individuals or for the right of political asylum (notably Flight ET 961), but sometimes a hijacking may have been affected by a failed private life or financial distress, as in the case of Aarno Lamminparras in the Oulu Aircraft Hijacking.[6] Hijackings involving hostages have produced violent confrontations between hijackers and the authorities, during negotiation and settlement. In the case of Lufthansa Flight 181 and Air France Flight 139, the hijackers were not satisfied and showed no inclination to surrender, resulting in attempts by special forcessd to rescue passengers.[7]\n\nIn most jurisdictions of the world, aircraft hijacking is punishable by life imprisonment or a long prison sentence. In most jurisdictions where the death penalty is a legal punishment, aircraft hijacking is a capital crime, including in China, India, Liberia and the U.S. states of Georgia and Mississippi.                                    ', '<h1>Wikipedia definition</h1>\n<p>Aircraft hijacking (also known as airplane hijacking, skyjacking, plane hijacking, plane jacking, air robbery, air piracy, or aircraft piracy, with the last term used within the special aircraft jurisdiction of the United States) is the unlawful seizure of an aircraft by an individual or a group.[1] Dating from the earliest of hijackings, most cases involve the pilot being forced to fly according to the hijacker\'s demands. However, in rare cases, the hijackers have flown the aircraft themselves and used them in suicide attacks – most notably in the September 11 attacks – and in several cases, planes have been hijacked by the official pilot or co-pilot; e.g., the Lubitz case.[2][3][4]</p>\n<p>Unlike carjacking or sea piracy, an aircraft hijacking is not usually committed for robbery or theft. Individuals driven by personal gain often divert planes to destinations where they are not planning to go themselves.[5] Some hijackers intend to use passengers or crew as hostages, either for monetary ransom or for some political or administrative concession by authorities. Various motives have driven such occurrences, such as demanding the release of certain high-profile individuals or for the right of political asylum (notably Flight ET 961), but sometimes a hijacking may have been affected by a failed private life or financial distress, as in the case of Aarno Lamminparras in the Oulu Aircraft Hijacking.[6] Hijackings involving hostages have produced violent confrontations between hijackers and the authorities, during negotiation and settlement. In the case of Lufthansa Flight 181 and Air France Flight 139, the hijackers were not satisfied and showed no inclination to surrender, resulting in attempts by special forcessd to rescue passengers.[7]</p>\n<p>In most jurisdictions of the world, aircraft hijacking is punishable by life imprisonment or a long prison sentence. In most jurisdictions where the death penalty is a legal punishment, aircraft hijacking is a capital crime, including in China, India, Liberia and the U.S. states of Georgia and Mississippi.</p>\n', 24, 'Plane hijacking', '2022-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fkWorkspace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `description`, `fkWorkspace`) VALUES
(37, 'Hangar', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `taskDescription` text NOT NULL,
  `dateTime` datetime NOT NULL,
  `priority` enum('High','Medium','Low') NOT NULL,
  `fkWorkspace` int(11) NOT NULL,
  `fkSubject` int(11) DEFAULT NULL,
  `status` enum('open','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `taskDescription`, `dateTime`, `priority`, `fkWorkspace`, `fkSubject`, `status`) VALUES
(61, 'Hijack Plane', '2022-01-30 20:41:07', 'High', 24, 37, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(256) NOT NULL,
  `lName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `password`) VALUES
(118, 'Tom', 'Cruise', 'tomcruise@gmail.com', 'test..123');

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fkuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workspaces`
--

INSERT INTO `workspaces` (`id`, `name`, `fkuser`) VALUES
(24, 'Mission Impossible', 118);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkWorkspace` (`fkWorkspace`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_ibfk_1` (`fkWorkspace`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkSubject` (`fkSubject`) USING BTREE,
  ADD KEY `fkWorkspace` (`fkWorkspace`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkuser` (`fkuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`fkWorkspace`) REFERENCES `workspaces` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`fkWorkspace`) REFERENCES `workspaces` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`fkWorkspace`) REFERENCES `workspaces` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`fkSubject`) REFERENCES `subjects` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD CONSTRAINT `workspaces_ibfk_1` FOREIGN KEY (`fkuser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
