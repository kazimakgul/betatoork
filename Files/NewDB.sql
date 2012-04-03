-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2012 at 11:34 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `NewDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Race'),
(4, 'Shooting');

-- --------------------------------------------------------

--
-- Table structure for table `Countries`
--

CREATE TABLE IF NOT EXISTS `Countries` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Countries`
--


-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE IF NOT EXISTS `Favorites` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_User_has_Game_User1` (`user_id`),
  KEY `fk_User_has_Game_Game1` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Favorites`
--


-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE IF NOT EXISTS `Games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `active` binary(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `starsize` int(11) DEFAULT NULL,
  `rate_count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `embed` text,
  PRIMARY KEY (`id`),
  KEY `fk_Game_User` (`user_id`),
  KEY `fk_Game_Category1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Games`
--

INSERT INTO `Games` (`id`, `name`, `link`, `description`, `active`, `user_id`, `category_id`, `picture`, `starsize`, `rate_count`, `created`, `embed`) VALUES
(2, 'Metal Slug Brutal', 'http://www.arabasayar.com/action/metal-slug-3', 'A very metal slug game which is brutal now', '1', 2, 1, '300px_MetalSlugCharacters.jpg', NULL, NULL, '2012-04-03 23:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Malicious`
--

CREATE TABLE IF NOT EXISTS `Malicious` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users30` (`user_id`),
  KEY `fk_Users_has_Games_Games30` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Malicious`
--


-- --------------------------------------------------------

--
-- Table structure for table `Playcounts`
--

CREATE TABLE IF NOT EXISTS `Playcounts` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users2` (`user_id`),
  KEY `fk_Users_has_Games_Games2` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Playcounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `Rates`
--

CREATE TABLE IF NOT EXISTS `Rates` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_has_User_Game1` (`game_id`),
  KEY `fk_Game_has_User_User1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Rates`
--


-- --------------------------------------------------------

--
-- Table structure for table `Sliders`
--

CREATE TABLE IF NOT EXISTS `Sliders` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users1` (`user_id`),
  KEY `fk_Users_has_Games_Games1` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sliders`
--


-- --------------------------------------------------------

--
-- Table structure for table `Subscriptions`
--

CREATE TABLE IF NOT EXISTS `Subscriptions` (
  `id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `subscriber_to_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subscriptions`
--


-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `active` binary(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `adcode` varchar(500) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username_UNIQUE` (`username`),
  UNIQUE KEY `Email_UNIQUE` (`email`),
  KEY `fk_Users_Country1` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `password`, `role`, `active`, `created`, `country_id`, `birth_date`, `gender`, `adcode`, `picture`) VALUES
(2, 'kazim', 'kazim@faros.com.tr', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 1, '1', '2012-04-03 23:15:18', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Wallentries`
--

CREATE TABLE IF NOT EXISTS `Wallentries` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users3` (`user_id`),
  KEY `fk_Users_has_Games_Games3` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Wallentries`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `fk_User_has_Game_Game1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Game_User1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Games`
--
ALTER TABLE `Games`
  ADD CONSTRAINT `fk_Game_Category1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Game_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Malicious`
--
ALTER TABLE `Malicious`
  ADD CONSTRAINT `fk_Users_has_Games_Games30` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Games_Users30` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Playcounts`
--
ALTER TABLE `Playcounts`
  ADD CONSTRAINT `fk_Users_has_Games_Games2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Games_Users2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Rates`
--
ALTER TABLE `Rates`
  ADD CONSTRAINT `fk_Game_has_User_Game1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Game_has_User_User1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sliders`
--
ALTER TABLE `Sliders`
  ADD CONSTRAINT `fk_Users_has_Games_Games1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Games_Users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `fk_Users_Country1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Wallentries`
--
ALTER TABLE `Wallentries`
  ADD CONSTRAINT `fk_Users_has_Games_Games3` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Games_Users3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
