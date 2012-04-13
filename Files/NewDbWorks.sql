-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Nis 2012, 20:42:46
-- Sunucu sürümü: 5.5.20
-- PHP Sürümü: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `newdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Race'),
(4, 'Shooting');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_User_has_Game_User1` (`user_id`),
  KEY `fk_User_has_Game_Game1` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`user_id`, `game_id`, `id`) VALUES
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `games`
--

CREATE TABLE IF NOT EXISTS `games` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `games`
--

INSERT INTO `games` (`id`, `name`, `link`, `description`, `active`, `user_id`, `category_id`, `picture`, `starsize`, `rate_count`, `created`, `embed`) VALUES
(2, 'Metal Slug Brutal', 'http://www.arabasayar.com/action/metal-slug-3', 'A very metal slug game which is brutal now', '1', 2, 1, '300px_MetalSlugCharacters.jpg', 100, 21, '2012-04-03 23:30:42', NULL),
(3, 'Redkit III', 'http://www.arabasayar.com/action/metal-slug-3', 'A very metal slug game which is brutal now', '1', 2, 1, '300px_MetalSlugCharacters.jpg', 4, 50, '2012-04-03 23:30:42', NULL),
(4, 'Metal 3', 'http://www.poca.com', 'fdgfdshsfhfdsafasd', '1', 3, 1, 'adsenseads.png', NULL, NULL, '2012-04-10 01:33:12', NULL),
(6, 'asdasd', 'http://www.poca.com', '12fsdafsadfsdafsadf', '1', 4, 0, '184271_10150160432485120_711440119_8575066_3763420_n.jpg', NULL, NULL, '2012-04-11 01:22:57', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malicious`
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `playcounts`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `playcounts`
--

INSERT INTO `playcounts` (`user_id`, `game_id`, `id`, `count`, `created`) VALUES
(3, 2, 17, 1, '2012-04-13 20:40:49'),
(3, 3, 18, 1, '2012-04-13 20:41:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_has_User_Game1` (`game_id`),
  KEY `fk_Game_has_User_User1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `rates`
--

INSERT INTO `rates` (`game_id`, `user_id`, `id`, `current`) VALUES
(2, 3, 1, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users1` (`user_id`),
  KEY `fk_Users_has_Games_Games1` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_id` int(11) NOT NULL,
  `subscriber_to_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Tablo döküm verisi `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriber_id`, `subscriber_to_id`, `created`) VALUES
(1, 0, 0, '2012-04-12 17:04:29'),
(2, 0, 0, '2012-04-12 17:06:34'),
(17, 3, 4, '2012-04-13 17:07:42'),
(18, 5, 3, '2012-04-13 18:20:46'),
(19, 5, 4, '2012-04-13 18:25:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `active`, `created`, `country_id`, `birth_date`, `gender`, `adcode`, `picture`) VALUES
(2, 'kazim', 'kazim@faros.com.tr', 'cd356305c53dd1d0c37cb8c25523e749e8a7b48b', 1, '1', '2012-04-03 23:15:18', NULL, NULL, NULL, NULL, NULL),
(3, 'oguzhanaltan', 'hoaltan@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 1, '1', '2012-04-10 01:32:29', NULL, NULL, NULL, NULL, NULL),
(4, 'safinaz', 'safinaz@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 0, '1', '2012-04-11 00:48:13', NULL, NULL, NULL, NULL, NULL),
(5, 'hayribey', 'haldun@hotmail.com', '3f11a8012cf1525b3c41f65ba3d3bd2073f74b71', 0, '1', '2012-04-13 17:08:12', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wallentries`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
