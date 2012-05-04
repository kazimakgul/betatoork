-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2012 at 05:37 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Race'),
(4, 'Shooting'),
(5, 'Board'),
(6, 'Multiplayer'),
(7, 'Puzzle'),
(8, 'Card'),
(9, 'Social'),
(10, '3D'),
(11, 'Kids'),
(12, 'Girls'),
(13, 'Word'),
(14, 'Role-Playing'),
(15, 'Fighting');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Turkey'),
(2, 'USA'),
(3, 'England'),
(4, 'Germany'),
(5, 'France');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `game_id`, `id`) VALUES
(3, 2, 1),
(4, 2, 2),
(2, 4, 3),
(6, 7, 4),
(2, 7, 5),
(7, 7, 6),
(7, 10, 7),
(11, 12, 8),
(11, 9, 9),
(8, 2, 11),
(8, 7, 12),
(8, 6, 14),
(8, 8, 15),
(8, 11, 16),
(8, 14, 17),
(8, 12, 18),
(8, 4, 20),
(8, 9, 21),
(10, 3, 22),
(13, 10, 23),
(7, 12, 24),
(5, 9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `active` binary(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `starsize` int(11) DEFAULT NULL,
  `rate_count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `embed` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_User` (`user_id`),
  KEY `fk_Game_Category1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `link`, `description`, `active`, `user_id`, `category_id`, `picture`, `starsize`, `rate_count`, `created`, `embed`) VALUES
(2, 'Need For Speed Online', 'http://world.needforspeed.com/login?xl=%2Fdow', 'Need for speed world forever play it online for real. Get it done', '1', 2, 3, 'resized_nfs_world.jpg', 80, 23, '2012-04-03 23:30:42', NULL),
(3, 'Metal Slug Brutal', 'http://www.arabasayar.com/action/metal-slug-3', 'A very metal slug game which is brutal now. These guys are angry now.', '1', 2, 2, 'metal_slug_xx_header.jpg', 70, 52, '2012-04-03 23:30:42', NULL),
(4, 'Angry Birds', 'http://chrome.angrybirds.com/', 'Angry birds have fun enjoy waht you have to d', '1', 3, 4, 'angrybirdss.jpeg', 90, 2, '2012-04-10 01:33:12', NULL),
(6, 'Plants vs Zombies', 'http://chrome.plantsvszombies.com', 'planz versus zombies', '1', 4, 2, 'plants_vs_zombies_116454.jpg', 80, 1, '2012-04-11 01:22:57', NULL),
(7, 'Cut The Rope', 'http://www.cuttherope.ie/', 'Play Cut the Rope! A mysterious package has a', '1', 2, 7, 'cutropeBuyuk.jpg', 93, 3, '2012-04-14 14:48:21', NULL),
(8, 'Gravity Guy', 'http://www.miniclip.com/games/gravity-guy/tr/', 'You''ve been granted the power to control gravity.', '1', 6, 2, 'gravityguy_feature.jpg', 87, 3, '2012-04-14 23:33:21', '<iframe src="http://www.miniclip.com/games/gravity-guy/en/webgame.php" frameborder="0" style="border:none;" width="640" height="501" scrolling="no"></iframe>'),
(9, 'Monster Island', 'http://www.miniclip.com/games/monster-island/', 'Ä°nsanlarÄ±n ulaÅŸamadÄ±ÄŸÄ±, keÅŸfedilmemiÅŸ bir adada, canavarlar Canavar AdasÄ±''na (Monster Island''a) hÃ¼kmetmek iÃ§in Ã§etin bir savaÅŸa giriyorlar. Elindeki canavar bombalarÄ± fÄ±rlat ve hepsine egemen olmak iÃ§in mÃ¼cadele et! iPhone ile de oynanabilir!', '1', 6, 4, 'monster_island_1.png', 100, 3, '2012-04-14 23:37:48', '<iframe src="http://www.miniclip.com/games/monster-island/en/webgame.php" frameborder="0" style="border:none;" width="608" height="516" scrolling="no"></iframe>'),
(10, 'Boom Bugs', 'http://www.miniclip.com/games/fragger-lost-ci', 'Oh no! The forest has been invaded by nasty spiders!', '1', 6, 7, 'boom_bugs_angry_birds_benzeri_buyuk.jpg', 20, 1, '2012-04-14 23:41:43', '<iframe src="http://www.miniclip.com/games/boom-bugs/en/webgame.php" frameborder="0" style="border:none;" width="608" height="520" scrolling="no"></iframe>'),
(11, 'Fancy Pants', 'http://armorgames.com/play/12141/kingdom-rush', 'Kingdom Rush, a free online strategy game brought to you by Armor Games. The kingdom is under attack! Defend your realm against hordes of orcs, trolls, evil ...', '1', 7, 1, 'Fancy_Pants_Billboard_1_656x369.jpeg', 100, 1, '2012-04-16 23:55:33', '<embed src="http://armorgames.com/files/games/fancy-pants-adventur-301.swf" type="application/x-shockwave-flash" width="720" height="480"></embed>'),
(12, 'iStunt Skating', 'http://www.miniclip.com/games/istunt-2/tr/', 'Hit the Alps at full speed on a snowboard and pull off daring stunts scoring as many points as possible. Become the iStunt 2 legend! Also available on the ...', '1', 6, 3, 'istunt2.jpg', 70, 2, '2012-04-18 01:44:26', '<iframe src="http://www.miniclip.com/games/istunt-2/en/webgame.php" frameborder="0" style="border:none;" width="600" height="480" scrolling="no"></iframe>'),
(13, 'Saloon Brawl', 'http://www.miniclip.com/games/saloon-brawl/en', 'Saloon Brawl Saloon Brawl. Join in the saloon brawl and knock out the other cowboys! Play this free game now!', '1', 6, 15, 'Saloon_Brawl_game_1327977587.jpg', 60, 1, '2012-04-20 17:14:16', '<iframe src="http://www.miniclip.com/games/saloon-brawl/en/webgame.php" frameborder="0" style="border:none;" width="608" height="455" scrolling="no"></iframe>'),
(14, 'Bunny Flags', NULL, 'How would you defend your flag from a waves of enemies? Would you be an engineer with his army of towers?, or a Commando designing attack stategies â€¦ or maybe the destroyer, who leaves nothing in his path?\r\nCreate mazes with barricades, place strategically towers of combat and use the talent tree to become more powerful, against your enemies. 17 maps, 3 classes, 4 difficulties, 12 ranks, 8 types of enemies and 3 talent tree.', '1', 8, 4, 'Bunny_Flags_2_1.jpg', 20, 1, '2012-04-25 00:05:39', '<embed width="800" height="600" base="http://external.kongregate-games.com/gamez/0009/3499/live/" src="http://external.kongregate-games.com/gamez/0009/3499/live/embeddable_93499.swf" type="application/x-shockwave-flash"></embed>'),
(15, 'FieldRunners', 'http://fieldrunnershtml5.appspot.com/', 'The award winning tower defense game everyone has been talking about is now free to play in the Chrome Web Store! Like the game? Purchase additional levels through the in-game store to unlock new maps, levels, and the special mode, Tower Combo 2!', '1', 10, 4, 'FieldRunners.jpg', 100, 1, '2012-04-25 00:19:48', NULL),
(16, 'White Water Rafting ', NULL, 'Paddle down the unpredictable White Water Rivers.', '1', 2, 10, 'white_water_Rafting_game_00.jpg', 100, 3, '2012-05-01 13:16:39', '<iframe src="http://www.miniclip.com/games/white-water-rafting/en/webgame.php" frameborder="0" style="border:none;" width="590" height="443" scrolling="no"></iframe>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `playcounts`
--

INSERT INTO `playcounts` (`user_id`, `game_id`, `id`, `count`, `created`) VALUES
(3, 2, 17, 1, '2012-04-13 20:40:49'),
(3, 3, 18, 1, '2012-04-13 20:41:14'),
(-1, 2, 19, 6, '2012-04-13 23:28:14'),
(-1, 4, 20, 3, '2012-04-13 23:33:15'),
(2, 2, 21, 1, '2012-04-13 23:45:11'),
(2, 6, 22, 2, '2012-04-13 23:45:35'),
(5, 2, 23, 1, '2012-04-14 00:22:18'),
(2, 3, 24, 2, '2012-04-14 01:34:00'),
(2, 7, 25, 3, '2012-04-14 14:51:24'),
(-1, 7, 26, 8, '2012-04-14 14:52:34'),
(4, 7, 27, 1, '2012-04-14 15:19:09'),
(6, 10, 28, 1, '2012-04-14 23:42:01'),
(2, 8, 29, 1, '2012-04-15 17:03:23'),
(2, 10, 30, 1, '2012-04-15 18:31:36'),
(7, 11, 31, 5, '2012-04-16 23:55:50'),
(-1, 9, 32, 13, '2012-04-17 23:35:14'),
(6, 9, 33, 1, '2012-04-20 19:03:31'),
(6, 8, 34, 1, '2012-04-23 23:26:41'),
(-1, 8, 35, 11, '2012-04-23 23:27:15'),
(-1, 10, 36, 1, '2012-04-23 23:32:31'),
(-1, 13, 37, 2, '2012-04-23 23:43:17'),
(-1, 6, 38, 3, '2012-04-24 00:02:03'),
(6, 7, 39, 1, '2012-04-24 22:23:49'),
(-1, 12, 40, 4, '2012-04-24 23:40:41'),
(11, 10, 41, 1, '2012-04-24 23:53:42'),
(11, 9, 42, 1, '2012-04-24 23:54:27'),
(8, 14, 43, 3, '2012-04-25 00:08:19'),
(8, 4, 44, 1, '2012-04-25 00:12:40'),
(10, 15, 45, 1, '2012-04-25 00:20:52'),
(13, 13, 46, 1, '2012-04-25 10:15:35'),
(13, 10, 47, 2, '2012-04-25 10:20:34'),
(13, 15, 48, 1, '2012-04-25 22:56:26'),
(2, 15, 49, 1, '2012-04-28 17:39:51'),
(7, 13, 50, 1, '2012-04-29 21:05:12'),
(7, 12, 51, 1, '2012-04-30 06:25:15'),
(-1, 14, 52, 1, '2012-04-30 17:51:38'),
(15, 8, 53, 1, '2012-05-01 06:19:51'),
(15, 12, 54, 1, '2012-05-01 06:20:18'),
(-1, 15, 55, 1, '2012-05-01 06:30:58'),
(2, 9, 56, 1, '2012-05-01 13:12:17'),
(2, 11, 57, 1, '2012-05-01 13:12:38'),
(2, 14, 58, 1, '2012-05-01 13:13:18'),
(2, 16, 59, 2, '2012-05-01 13:17:14'),
(4, 16, 60, 1, '2012-05-01 13:20:28'),
(7, 9, 61, 1, '2012-05-02 09:40:42'),
(-1, 11, 62, 1, '2012-05-02 10:44:31'),
(-1, 3, 63, 1, '2012-05-02 10:58:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(3, 4, 8, 5),
(9, 6, 9, 5),
(8, 7, 10, 4),
(7, 2, 11, 5),
(11, 7, 12, 5),
(10, 7, 13, 1),
(8, 6, 14, 5),
(12, 11, 15, 5),
(9, 11, 16, 5),
(14, 8, 17, 1),
(15, 10, 18, 5),
(13, 7, 19, 3),
(9, 7, 20, 5),
(2, 14, 21, 3),
(7, 14, 22, 4),
(8, 14, 23, 4),
(12, 7, 24, 2),
(16, 2, 25, 5),
(16, 7, 26, 5),
(16, 4, 27, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriber_id`, `subscriber_to_id`, `created`) VALUES
(1, 0, 0, '2012-04-12 17:04:29'),
(2, 0, 0, '2012-04-12 17:06:34'),
(17, 3, 4, '2012-04-13 17:07:42'),
(18, 5, 3, '2012-04-13 18:20:46'),
(19, 5, 4, '2012-04-13 18:25:37'),
(22, 5, 2, '2012-04-14 00:22:36'),
(23, 2, 5, '2012-04-14 00:23:14'),
(27, 7, 8, '2012-04-15 13:39:14'),
(28, 2, 6, '2012-04-15 18:01:27'),
(29, 2, 8, '2012-04-15 18:06:16'),
(32, 2, 3, '2012-04-15 18:06:53'),
(34, 2, 4, '2012-04-21 15:56:50'),
(35, 2, 2, '2012-04-23 13:00:45'),
(36, 2, 11, '2012-04-23 13:03:32'),
(37, 2, 10, '2012-04-23 13:03:50'),
(38, 6, 7, '2012-04-23 23:18:41'),
(39, 6, 9, '2012-04-23 23:18:49'),
(40, 6, 3, '2012-04-23 23:19:00'),
(41, 6, 2, '2012-04-23 23:19:07'),
(42, 6, 6, '2012-04-24 22:23:12'),
(43, 8, 8, '2012-04-28 23:43:37'),
(46, 7, 10, '2012-04-29 00:30:24'),
(47, 14, 6, '2012-04-29 21:19:06'),
(48, 14, 2, '2012-04-29 21:19:28'),
(49, 7, 7, '2012-04-30 06:37:30'),
(50, 7, 14, '2012-04-30 06:37:35'),
(51, 7, 13, '2012-04-30 06:37:42'),
(52, 2, 15, '2012-05-01 06:26:27'),
(53, 7, 2, '2012-05-03 15:34:04'),
(54, 7, 6, '2012-05-03 16:03:18'),
(61, 4, 8, '2012-05-03 19:46:27'),
(68, 4, 4, '2012-05-03 20:10:08'),
(69, 4, 15, '2012-05-03 20:39:23'),
(70, 4, 6, '2012-05-03 20:39:40'),
(71, 4, 2, '2012-05-03 20:39:45'),
(72, 4, 7, '2012-05-03 20:40:01'),
(73, 4, 3, '2012-05-03 20:40:18');

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
  `active` binary(1) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `active`, `created`, `country_id`, `birth_date`, `gender`, `adcode`, `picture`) VALUES
(2, 'kazim', 'kazim@faros.com.tr', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 1, '1', '2012-04-03 23:15:18', 1, '1994-10-06', 'm', NULL, 'flash_original.png'),
(3, 'oguzhanaltan', 'hoaltan@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 1, '1', '2012-04-10 01:32:29', NULL, NULL, NULL, NULL, NULL),
(4, 'safinaz', 'safinaz@hotmail.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-11 00:48:13', 4, '1993-05-01', 'f', NULL, 'green_lantern_original.png'),
(5, 'hayribey', 'haldun@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 0, '1', '2012-04-13 17:08:12', NULL, NULL, NULL, NULL, NULL),
(6, 'miniclip', 'miniclip@toork.com', '7b8e26a055f89ddd0d716d5744d75bafebb05e87', 2, '1', '2012-04-14 23:25:41', 1, '2002-07-27', 'f', '<iframe src="http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&amp;t=728x90&amp;channel=2&amp;cb=1335227868456" style="width:728px;height:90px;" frameborder="0" scrolling="no"></iframe>', 'wonder_woman_useravatar.png'),
(7, 'armorgames', 'armorgames@toork.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 2, '1', '2012-04-14 23:27:33', 3, '1984-10-06', 'm', 'adcode', 'batman_original.png'),
(8, 'kongregate', 'kongregate@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 2, '1', '2012-04-14 23:29:38', 1, '2002-04-28', '', '<iframe src="http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&amp;t=728x90&amp;channel=2&amp;cb=1335227868456" style="width:728px;height:90px;" frameborder="0" scrolling="no"></iframe>', 'green_lantern_useravatar.png'),
(9, 'kralOyun', 'kral@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '0', '2012-04-18 21:22:49', NULL, NULL, NULL, NULL, NULL),
(10, 'Tazmania', 'taztaz@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-19 02:10:33', NULL, NULL, NULL, NULL, NULL),
(11, 'nihatDogan', 'nihat@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-20 23:40:38', NULL, NULL, NULL, NULL, NULL),
(13, 'kedikiz', 'kedikiz@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-25 10:02:34', NULL, NULL, NULL, NULL, NULL),
(14, 'KaraGulle', 'karagul@amazebuy.com', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 0, '1', '2012-04-29 21:16:39', 4, '1975-01-30', 'm', NULL, NULL),
(15, 'GameZidan', 'ayseakgulzo@hotmail.com', 'a6583514a7c1e6f1378d5af23c53c4f79afdf8b2', 0, '1', '2012-05-01 06:11:20', 3, '2002-05-01', 'f', NULL, 'wonder_woman_useravatar.png'),
(16, 'gamelara', 'alaraakgul@gmail.com', 'c1b18e66e78cba73cad937091338d7ad16717b34', 0, '1', '2012-05-01 06:15:23', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallentries`
--

CREATE TABLE IF NOT EXISTS `wallentries` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users3` (`user_id`),
  KEY `fk_Users_has_Games_Games3` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wallentries`
--

INSERT INTO `wallentries` (`user_id`, `game_id`, `id`, `created`) VALUES
(7, 2, 1, '2012-05-02 23:51:49'),
(7, 3, 2, '2012-05-02 23:51:28');
