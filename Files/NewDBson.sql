-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2012 at 12:40 AM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Race'),
(4, 'Shooting');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--


-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_User_has_Game_User1` (`user_id`),
  KEY `fk_User_has_Game_Game1` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `game_id`, `id`) VALUES
(3, 2, 1),
(4, 2, 2),
(2, 4, 3),
(6, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `link`, `description`, `active`, `user_id`, `category_id`, `picture`, `starsize`, `rate_count`, `created`, `embed`) VALUES
(2, 'Need For Speed', 'http://world.needforspeed.com/login?xl=%2Fdow', 'Need for speed world forever play it online f', '1', 2, 3, 'resized_nfs_world.jpg', 90, 22, '2012-04-03 23:30:42', NULL),
(3, 'Metal Slug Brutal', 'http://www.arabasayar.com/action/metal-slug-3', 'A very metal slug game which is brutal now', '1', 2, 2, '300px_MetalSlugCharacters.jpg', 70, 52, '2012-04-03 23:30:42', NULL),
(4, 'Angry Birds', 'http://chrome.angrybirds.com/', 'Angry birds have fun enjoy waht you have to d', '1', 3, 4, 'angrybirdss.jpeg', 90, 2, '2012-04-10 01:33:12', NULL),
(6, 'Plants vs Zombies', 'http://chrome.plantsvszombies.com', 'planz versus zombies', '1', 4, 2, 'plants_vs_zombies_116454.jpg', 80, 1, '2012-04-11 01:22:57', NULL),
(7, 'Cut The Rope', 'http://www.cuttherope.ie/', 'Play Cut the Rope! A mysterious package has a', '1', 2, 3, 'cutropeBuyuk.jpg', 100, 1, '2012-04-14 14:48:21', NULL),
(8, 'Gravity Guy', 'http://www.miniclip.com/games/gravity-guy/tr/', 'You''ve been granted the power to control grav', '1', 6, 1, 'Club.jpg', NULL, NULL, '2012-04-14 23:33:21', NULL),
(9, 'Monster Island', 'http://www.miniclip.com/games/monster-island/', 'Ä°nsanlarÄ±n ulaÅŸamadÄ±ÄŸÄ±, keÅŸfedilmemiÅŸ bir adada, canavarlar Canavar AdasÄ±''na (Monster Island''a) hÃ¼kmetmek iÃ§in Ã§etin bir savaÅŸa giriyorlar. Elindeki canavar bombalarÄ± fÄ±rlat ve hepsine egemen olmak iÃ§in mÃ¼cadele et! iPhone ile de oynanabilir!', '1', 6, 0, 'monster_island_1.png', NULL, NULL, '2012-04-14 23:37:48', NULL),
(10, 'Fragger', 'http://www.miniclip.com/games/fragger-lost-ci', 'Fareyle gÃ¼cÃ¼ ayarlayÄ±p niÅŸan alÄ±n, ardÄ±ndan tÄ±klayarak el bombalarÄ±nÄ± fÄ±rlatÄ±n ve dÃ¼ÅŸmanlarÄ± havaya uÃ§urun!', '1', 6, 0, 'fragger_lostcity.JPG', NULL, NULL, '2012-04-14 23:41:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `malicious`
--

CREATE TABLE IF NOT EXISTS `malicious` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users30` (`user_id`),
  KEY `fk_Users_has_Games_Games30` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `malicious`
--


-- --------------------------------------------------------

--
-- Table structure for table `playcounts`
--

CREATE TABLE IF NOT EXISTS `playcounts` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users2` (`user_id`),
  KEY `fk_Users_has_Games_Games2` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `playcounts`
--

INSERT INTO `playcounts` (`user_id`, `game_id`, `id`, `count`, `created`) VALUES
(3, 2, 17, 1, '2012-04-13 20:40:49'),
(3, 3, 18, 1, '2012-04-13 20:41:14'),
(-1, 2, 19, 2, '2012-04-13 23:28:14'),
(-1, 4, 20, 1, '2012-04-13 23:33:15'),
(2, 2, 21, 1, '2012-04-13 23:45:11'),
(2, 6, 22, 2, '2012-04-13 23:45:35'),
(5, 2, 23, 1, '2012-04-14 00:22:18'),
(2, 3, 24, 2, '2012-04-14 01:34:00'),
(2, 7, 25, 1, '2012-04-14 14:51:24'),
(-1, 7, 26, 2, '2012-04-14 14:52:34'),
(4, 7, 27, 1, '2012-04-14 15:19:09'),
(6, 10, 28, 1, '2012-04-14 23:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_has_User_Game1` (`game_id`),
  KEY `fk_Game_has_User_User1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`game_id`, `user_id`, `id`, `current`) VALUES
(2, 3, 1, 5),
(4, 2, 2, 5),
(6, 2, 3, 4),
(3, 2, 4, 2),
(7, 4, 5, 5),
(2, 4, 6, 4),
(4, 4, 7, 4),
(3, 4, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users1` (`user_id`),
  KEY `fk_Users_has_Games_Games1` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_id` int(11) NOT NULL,
  `subscriber_to_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriber_id`, `subscriber_to_id`, `created`) VALUES
(1, 0, 0, '2012-04-12 17:04:29'),
(2, 0, 0, '2012-04-12 17:06:34'),
(17, 3, 4, '2012-04-13 17:07:42'),
(18, 5, 3, '2012-04-13 18:20:46'),
(19, 5, 4, '2012-04-13 18:25:37'),
(20, 2, 2, '2012-04-13 21:01:11'),
(22, 5, 2, '2012-04-14 00:22:36'),
(23, 2, 5, '2012-04-14 00:23:14'),
(24, 4, 2, '2012-04-14 15:21:03'),
(25, 6, 2, '2012-04-14 23:39:20'),
(26, 6, 6, '2012-04-14 23:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `active`, `created`, `country_id`, `birth_date`, `gender`, `adcode`, `picture`) VALUES
(2, 'kazim', 'kazim@faros.com.tr', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 1, '1', '2012-04-03 23:15:18', NULL, NULL, NULL, NULL, NULL),
(3, 'oguzhanaltan', 'hoaltan@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 1, '1', '2012-04-10 01:32:29', NULL, NULL, NULL, NULL, NULL),
(4, 'safinaz', 'safinaz@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 0, '1', '2012-04-11 00:48:13', NULL, NULL, NULL, NULL, NULL),
(5, 'hayribey', 'haldun@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 0, '1', '2012-04-13 17:08:12', NULL, NULL, NULL, NULL, NULL),
(6, 'miniclip', 'miniclip@toork.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-14 23:25:41', NULL, NULL, NULL, NULL, NULL),
(7, 'armorgames', 'armorgames@toork.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-14 23:27:33', NULL, NULL, NULL, NULL, NULL),
(8, 'kongregate', 'kongregate@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-14 23:29:38', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallentries`
--

CREATE TABLE IF NOT EXISTS `wallentries` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users3` (`user_id`),
  KEY `fk_Users_has_Games_Games3` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallentries`
--

