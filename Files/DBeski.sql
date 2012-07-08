-- MySQL dump 10.13  Distrib 5.1.62, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: NewDB
-- ------------------------------------------------------
-- Server version	5.1.62-0ubuntu0.10.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Action'),(2,'Adventure'),(3,'Race'),(4,'Shooting'),(5,'Board'),(6,'Multiplayer'),(7,'Puzzle'),(8,'Card'),(9,'Social'),(10,'3D'),(11,'Kids'),(12,'Girls'),(13,'Word'),(14,'Role-Playing'),(15,'Fighting');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan'),(2,'Albania'),(3,'Algeria'),(4,'American Samoa'),(5,'Andorra'),(6,'Angola'),(7,'Anguilla'),(8,'Antarctica'),(9,'Antigua and Barbuda'),(10,'Argentina'),(11,'Armenia'),(12,'Aruba'),(13,'Australia'),(14,'Austria'),(15,'Azerbaijan'),(16,'Bahamas'),(17,'Bahrain'),(18,'Bangladesh'),(19,'Barbados'),(20,'Belarus'),(21,'Belgium'),(22,'Belize'),(23,'Benin'),(24,'Bermuda'),(25,'Bhutan'),(26,'Bolivia'),(27,'Bosnia and Herzegovina'),(28,'Botswana'),(29,'Bouvet Island'),(30,'Brazil'),(31,'British Indian Ocean Territory'),(32,'Brunei Darussalam'),(33,'Bulgaria'),(34,'Burkina Faso'),(35,'Burundi'),(36,'Cambodia'),(37,'Cameroon'),(38,'Canada'),(39,'Cape Verde'),(40,'Cayman Islands'),(41,'Central African Republic'),(42,'Chad'),(43,'Chile'),(44,'China'),(45,'Christmas Island'),(46,'Cocos (Keeling) Islands'),(47,'Colombia'),(48,'Comoros'),(49,'Congo'),(50,'Congo, The Democratic Republic of the'),(51,'Cook Islands'),(52,'Costa Rica'),(53,'Croatia'),(54,'Cuba'),(55,'Cyprus'),(56,'Czech Republic'),(57,'Denmark'),(58,'Djibouti'),(59,'Dominica'),(60,'Dominican Republic'),(61,'Ecuador'),(62,'Egypt'),(63,'El Salvador'),(64,'Equatorial Guinea'),(65,'Eritrea'),(66,'Estonia'),(67,'Ethiopia'),(68,'Falkland Islands (Malvinas)'),(69,'Faroe Islands'),(70,'Fiji'),(71,'Finland'),(72,'France'),(73,'French Guiana'),(74,'French Polynesia'),(75,'French Southern Territories'),(76,'Gabon'),(77,'Gambia'),(78,'Georgia'),(79,'Germany'),(80,'Ghana'),(81,'Gibraltar'),(82,'Greece'),(83,'Greenland'),(84,'Grenada'),(85,'Guadeloupe'),(86,'Guam'),(87,'Guatemala'),(88,'Guernsey'),(89,'Guinea'),(90,'Guinea-Bissau'),(91,'Guyana'),(92,'Haiti'),(93,'Heard Island and McDonald Islands'),(94,'Holy See (Vatican City State)'),(95,'Honduras'),(96,'Hong Kong'),(97,'Hungary'),(98,'Iceland'),(99,'India'),(100,'Indonesia'),(101,'Iran, Islamic Republic of'),(102,'Iraq'),(103,'Ireland'),(104,'Isle of Man'),(105,'Israel'),(106,'Italy'),(107,'Jamaica'),(108,'Japan'),(109,'Jersey'),(110,'Jordan'),(111,'Kazakhstan'),(112,'Kenya'),(113,'Kiribati'),(114,'Korea, Democratic People\'s Republic of'),(115,'Korea, Republic of'),(116,'Kuwait'),(117,'Kyrgyzstan'),(118,'Lao People\'s Democratic Republic'),(119,'Latvia'),(120,'Lebanon'),(121,'Lesotho'),(122,'Liberia'),(123,'Libyan Arab Jamahiriya'),(124,'Liechtenstein'),(125,'Lithuania'),(126,'Luxembourg'),(127,'Macao'),(128,'Macedonia, The Former Yugoslav Republic of'),(129,'Madagascar'),(130,'Malawi'),(131,'Malaysia'),(132,'Maldives'),(133,'Mali'),(134,'Malta'),(135,'Marshall Islands'),(136,'Martinique'),(137,'Mauritania'),(138,'Mauritius'),(139,'Mayotte'),(140,'Mexico'),(141,'Micronesia, Federated States of'),(142,'Moldova, Republic of'),(143,'Monaco'),(144,'Mongolia'),(145,'Montenegro'),(146,'Montserrat'),(147,'Morocco'),(148,'Mozambique'),(149,'Myanmar'),(150,'Namibia'),(151,'Nauru'),(152,'Nepal'),(153,'Netherlands'),(154,'Netherlands Antilles'),(155,'New Caledonia'),(156,'New Zealand'),(157,'Nicaragua'),(158,'Niger'),(159,'Nigeria'),(160,'Niue'),(161,'Norfolk Island'),(162,'Northern Mariana Islands'),(163,'Norway'),(164,'Oman'),(165,'Pakistan'),(166,'Palau'),(167,'Palestinian Territory, Occupied'),(168,'Panama'),(169,'Papua New Guinea'),(170,'Paraguay'),(171,'Peru'),(172,'Philippines'),(173,'Pitcairn'),(174,'Poland'),(175,'Portugal'),(176,'Puerto Rico'),(177,'Qatar'),(178,'Reunion'),(179,'Romania'),(180,'Russian Federation'),(181,'Rwanda'),(182,'Saint Helena'),(183,'Saint Kitts and Nevis'),(184,'Saint Lucia'),(185,'Saint Martin'),(186,'Saint Pierre and Miquelon'),(187,'Saint Vincent and the Grenadines'),(188,'Samoa'),(189,'San Marino'),(190,'Sao Tome and Principe'),(191,'Saudi Arabia'),(192,'Senegal'),(193,'Serbia'),(194,'Seychelles'),(195,'Sierra Leone'),(196,'Singapore'),(197,'Slovakia'),(198,'Slovenia'),(199,'Solomon Islands'),(200,'Somalia'),(201,'South Africa'),(202,'South Georgia and the South Sandwich Islands'),(203,'Spain'),(204,'Sri Lanka'),(205,'Sudan'),(206,'Suriname'),(207,'Svalbard and Jan Mayen'),(208,'Swaziland'),(209,'Sweden'),(210,'Switzerland'),(211,'Syrian Arab Republic'),(212,'Taiwan, Province Of China'),(213,'Tajikistan'),(214,'Tanzania, United Republic of'),(215,'Thailand'),(216,'Timor-Leste'),(217,'Togo'),(218,'Tokelau'),(219,'Tonga'),(220,'Trinidad and Tobago'),(221,'Tunisia'),(222,'Turkey'),(223,'Turkmenistan'),(224,'Turks and Caicos Islands'),(225,'Tuvalu'),(226,'Uganda'),(227,'Ukraine'),(228,'United Arab Emirates'),(229,'United Kingdom'),(230,'United States'),(231,'United States Minor Outlying Islands'),(232,'Uruguay'),(233,'Uzbekistan'),(234,'Vanuatu'),(235,'Venezuela'),(236,'Viet Nam'),(237,'Virgin Islands, British'),(238,'Virgin Islands, U.S.'),(239,'Wallis And Futuna'),(240,'Western Sahara'),(241,'Yemen'),(242,'Zambia'),(243,'Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_User_has_Game_User1` (`user_id`),
  KEY `fk_User_has_Game_Game1` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (3,2,1),(2,4,3),(6,7,4),(2,7,5),(7,7,6),(7,10,7),(11,12,8),(11,9,9),(8,2,11),(8,7,12),(8,6,14),(8,8,15),(8,11,16),(8,12,18),(8,4,20),(8,9,21),(10,3,22),(13,10,23),(7,12,24),(7,20,26),(23,21,28),(23,18,29),(23,28,30),(23,29,31),(7,11,32),(20,30,33),(5,25,34),(7,6,35),(4,32,36),(15,4,37),(15,35,38),(15,10,39),(38,59,40),(2,33,41),(38,62,42),(38,68,43),(38,69,44),(38,64,45),(38,66,46),(38,63,47),(2,6,48),(2,12,49),(2,25,50),(2,60,51),(2,32,52),(2,28,53),(2,63,54),(2,50,55),(2,43,56),(2,15,57),(2,67,58),(40,7,59),(40,15,60),(40,32,61),(40,3,62);
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (2,'Need For Speed Online','http://world.needforspeed.com/login?xl=%2Fdow','Need for speed world forever play it online for real. Get it done','1',2,3,'Need_for_Speed_World_1589.jpg',80,3,'2012-04-03 23:30:42',''),(3,'Metal Slug Brutal','http://www.arabasayar.com/action/metal-slug-3','A very metal slug game which is brutal now. These guys are angry now.','1',2,2,'metal_slug_xx_header.jpg',100,3,'2012-04-03 23:30:42','<object width=\"720\" height=\"540\"> <param name=\"movie\" value=\"http://www.arabasayar.com/games/msb3.swf\"> <embed src=\"http://www.arabasayar.com/games/msb3.swf\" width=\"720\" height=\"540\"> </embed> </object>'),(4,'Angry Birds','http://chrome.angrybirds.com/','Angry birds have fun enjoy waht you have to d','1',3,4,'angry_birds.jpg',95,4,'2012-04-10 01:33:12',''),(6,'Plants vs Zombies','http://chrome.plantsvszombies.com','Help plants to kill zombies :)','1',4,14,'plants_vs_zombies_116454.jpg',90,2,'2012-04-11 01:22:57',NULL),(7,'Cut The Rope','http://www.cuttherope.ie/','Play Cut the Rope! A mysterious package has a','1',2,7,'cutropeBuyuk.jpg',96,5,'2012-04-14 14:48:21',NULL),(8,'Gravity Guy','http://www.miniclip.com/games/gravity-guy/tr/','You\\\'ve been granted the power to control gravity.','1',6,2,'mzl_dknejafy_1024x1024_65.jpg',87,3,'2012-04-14 23:33:21','<iframe src=\"http://www.miniclip.com/games/gravity-guy/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"640\" height=\"501\" scrolling=\"no\"></iframe>'),(9,'Monster Island','http://www.miniclip.com/games/monster-island/','Monster thugs are on the loose harassing the inhabitants of the colorful world of Monster Island. Now, it\\\'s up to you and your arsenal of mini-monster bombs to get rid of this plague of unwanted visitors. Can you stand against such mischievous foes? ','1',6,4,'mzl_rtgqyxmy_1024x1024_65.jpg',100,3,'2012-04-14 23:37:48','<iframe src=\"http://www.miniclip.com/games/monster-island/en/webgame.php\" frameborder=\"2px\" style=\"border:none;\" width=\"608\" height=\"516\" scrolling=\"no\"></iframe>'),(10,'Boom Bugs','http://www.miniclip.com/games/fragger-lost-ci','Oh no! The forest has been invaded by nasty spiders!','1',6,7,'bummbugs.jpg',20,1,'2012-04-14 23:41:43','<iframe src=\"http://www.miniclip.com/games/boom-bugs/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"608\" height=\"520\" scrolling=\"no\"></iframe>'),(11,'Fancy Pants','http://armorgames.com/play/12141/kingdom-rush','Kingdom Rush, a free online strategy game brought to you by Armor Games. The kingdom is under attack! Defend your realm against hordes of orcs, trolls, evil ...','1',7,1,'Fancy_Pants_Billboard_1_656x369.jpeg',100,1,'2012-04-16 23:55:33','<embed wmode=\"transparent\" src=\"http://armorgames.com/files/games/fancy-pants-adventur-301.swf\" type=\"application/x-shockwave-flash\" width=\"720\" height=\"480\"></embed>'),(12,'iStunt Skating','http://www.miniclip.com/games/istunt-2/tr/','Hit the Alps at full speed on a snowboard and pull off daring stunts scoring as many points as possible. Become the iStunt 2 legend! Also available on the ...','1',6,3,'istunt2.jpg',80,3,'2012-04-18 01:44:26','<iframe src=\"http://www.miniclip.com/games/istunt-2/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"600\" height=\"480\" scrolling=\"no\"></iframe>'),(13,'Saloon Brawl','http://www.miniclip.com/games/saloon-brawl/en','Saloon Brawl Saloon Brawl. Join in the saloon brawl and knock out the other cowboys! Play this free game now!','1',6,15,'Saloon_Brawl_Large.png',60,1,'2012-04-20 17:14:16','<iframe src=\"http://www.miniclip.com/games/saloon-brawl/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"608\" height=\"455\" scrolling=\"no\"></iframe>'),(15,'Galaxy Life','http://games.digitalchocolate.com/canvas/galaxylife?src=dcw_web_portalhome','The award winning tower defense game everyone has been talking about is now free to play in the Chrome Web Store! Like the game? Purchase additional levels through the in-game store to unlock new maps, levels, and the special mode, Tower Combo 2!','1',10,9,'GalaxyLife.png',100,2,'2012-04-25 00:19:48',NULL),(16,'White Water Rafting ','','Paddle down the unpredictable White Water Rivers.','1',2,10,'toork_whiteWR.jpg',100,3,'2012-05-01 13:16:39','<iframe src=\"http://www.miniclip.com/games/white-water-rafting/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"590\" height=\"443\" scrolling=\"no\"></iframe>'),(17,'Empire',NULL,'Become the lord of a castle and turn your small fortress into the capital of the entire kingdom in this exciting online strategy game. Establish an efficient economic system and assemble a mighty army to defend your realm and extend your territory. Forge alliances with other players worldwide to crush your enemies, and become the sole ruler of a mighty empire!','1',21,6,'921.jpg',100,1,'2012-05-05 09:42:03','<embed wmode=\"transparent\" src=\"http://games4chrome.com/games/ggsempire.swf\" width=\"800\" height=\"600\"> </embed>'),(18,'Crash Bandicoot','http://gamecano.com/index.php?task=view&id=3','Play the classic Crash Bandicoot Online! Go through all the levels and complete the whole adventure!','1',23,2,'Crash_Bandicoot_Wallpaper_by_E_122_Psi.png',100,1,'2012-05-05 15:58:43','<object width=\"550\" height=\"400\"> <param name=\"movie\" value=\"http://www.dailyfreegames.com/gameswf/Crash Bandicoot.swf\"> <embed src=\"http://www.dailyfreegames.com/gameswf/Crash Bandicoot.swf\" width=\"550\" height=\"400\"> </embed> </object>'),(19,'Harry Quantum','','Harry Quantum PI is back, this time to solve a case for wrestling champion SuperBurro.','1',3,1,'guitar_master_game.jpg',NULL,NULL,'2012-05-05 18:09:40','<embed width=\"700\" height=\"525\" base=\"http://external.kongregate-games.com/gamez/0013/9609/live/\" src=\"http://external.kongregate-games.com/gamez/0013/9609/live/embeddable_139609.swf\" type=\"application/x-shockwave-flash\"></embed>'),(20,'Demolition City 2',NULL,'Demolish buildings all over the world. Strategically place different explosives on a building or tower and take it down under the goal line. Watch out for falling debris causing too much damage to the surrounding environment.','1',7,7,'demolition.jpg',100,1,'2012-05-05 20:49:10','<embed wmode=\"transparent\"  src=\"http://armorgames.com/files/games/demolition-city-2-4611.swf\" type=\"application/x-shockwave-flash\" width=\"700\" height=\"600\"></embed>'),(21,'Truck loader 2','http://gamecano.com/index.php?task=view&id=16','Using your Magnetic lever, attach and load crates in their correct positions on the truck.','1',23,2,'truckloader.jpg',100,1,'2012-05-06 08:30:39','<object wmode=\'transparent\' width=\"756\" height=\"567\"> <param name=\"movie\" value=\"http://gamecano.com/games/truckloader2-fe0aad62-678d8a70.swf\"> <embed src=\"http://gamecano.com/games/truckloader2-fe0aad62-678d8a70.swf\" width=\"756\" height=\"567\"> </embed> </object>'),(22,'Chaos Faction','http://toberoot.com/tiktak/game.php?id=312','How to Play:\r\nControls\r\n-Left: move left\r\n-Right: move right\r\n-Up: jump/double jump\r\n-Down: shield/stomp\r\n-Z: attack 1\r\n-X: attack 2\r\n-Shift: hold with weapon to melee attack\r\n-D: drop weapon\r\n-Spacebar: pause game','1',25,1,'Chaos_Faction.JPG',NULL,NULL,'2012-05-07 11:16:10',NULL),(23,'Ski Maniacs','http://gamecano.com/index.php?task=view&id=15','Winter is upon us and the CycloManiacs have put away their bikes. But Ski Maniacs are out in force!','1',23,3,'ski_maniacs_320.jpg',100,1,'2012-05-07 12:34:23',NULL),(24,'Cloudy','http://gamecano.com/index.php?task=view&id=52','Set your paper air-o-plane to sail with the wind!','1',23,2,'H8uPb.jpg',100,1,'2012-05-07 12:36:34',NULL),(25,'I Remain','http://gamecano.com/index.php?task=view&id=13','Desolation. Isolation. Survival. One of the last survivors on earth must use his wits to escape the abandoned farmhouse. Explore the house, use the items and the clues to decipher a mystery, to escape, and to remain one of the living. i remain.','1',23,2,'iRemainThumbOL.jpg',100,1,'2012-05-07 12:40:27',NULL),(26,'Cannon Plunder','http://gamecano.com/index.php?task=view&id=11','Ahoy!! Collect the coins by firing your cannon. Sounds simple, but is it? When you\'re ready create and share your own levels too!','1',23,1,'screen1.jpg',100,1,'2012-05-07 12:43:56',NULL),(28,'Billiard 3D Pool','http://gamecano.com/index.php?task=view&id=136','play classic pool 3D versiyon...','1',23,5,'3d_pool_game_615_384.jpg',100,2,'2012-05-07 14:11:07','<object width=\"650\" height=\"550\"> <param name=\"movie\" value=\"http://gamecano.com/games/game_pool-master_10676.swf\"> <embed src=\"http://gamecano.com/games/game_pool-master_10676.swf\" width=\"650\" height=\"550\"> </embed> </object>'),(29,' Capoeira Fighter 3','http://gamecano.com/index.php?task=view&id=106','Test your capoeira skills against other fighting styles from around the world in several different match types with up to 4 players. Train hard to earn credits and unlock new fighters and then go toe to toe with the best fighters in the world.','1',23,15,'capoera.jpg',100,1,'2012-05-07 14:12:12','<object width=\"650\" height=\"500\"> <param name=\"movie\" value=\"http://gamecano.com/games/roda.swf\"> <embed src=\"http://gamecano.com/games/roda.swf\" width=\"650\" height=\"500\"> </embed> </object>'),(30,'Call Of Gods','http://cog.outspark.com/','Call of Gods is a browser game hosted by Aeria Games, where players fill the shoes of a general set in a dangerous world of magic to lead your own personal army consisting of various species of heroes and warriors.','0',20,6,'callofgods.jpg',NULL,NULL,'2012-05-13 14:59:03',NULL),(31,'Catapult Madness','http://apps.facebook.com/simsdontallow/','Your castle is under siege! Use your catapult to launch peasants to reach a neighbor castle and ask for help. Use magic, bombs, beans, beer and other crazy stuff to reach your goal.','1',7,4,'catapult.jpg',100,1,'2012-05-14 09:51:45','<embed  wmode=\"transparent\" src=\"http://armorgames.com/files/games/catapult-madness-6646.swf\" type=\"application/x-shockwave-flash\" width=\"800\" height=\"550\"></embed>'),(32,'Paladog','http://armorgames.com/play/13262/paladog','In a far future,\\r\\nthe mother earth has lost vitality due to overwhelming greed and selfishness of human.\\r\\nNot so long after, the gods eventually decide to annihilate the entire human race.\\r\\nInstead, critters have given intelligence to have a chance to establish their own civilization.\\r\\nThey worshipped their creators and spent a millennium in peace.','1',7,14,'paladog.jpg',100,2,'2012-05-25 01:57:52',''),(33,'ZombieGames.net','http://www.zombiegames.net/','Play all zombie games from one source. which is dedicated to zombies. Enjoy http://zombiegames.net','0',4,4,'zombies_1.jpg',NULL,NULL,'2012-05-25 16:11:15',NULL),(34,'Goodgame Cafe','','Goodgame Caf&Atilde;&copy; is an enormously exciting time management online game. Open up your own Caf&Atilde;&copy; and amaze your customers with your cooking skills. Become a kitchen chef, decide what&acirc;€™s on the menu today and shop tasty ingredients. ','1',21,9,'Goodgame_Cafe_toork.jpg',100,1,'2012-05-26 11:36:44','<embed src=\"http://games4chrome.com/games/ggscafe.swf\" width=\"800\" height=\"600\"> </embed> '),(37,'Super Mario Star Scramble 3','','Play the third installment of the awesome Super Mario Star arcade game. Explore several levels, jump and run through platforms to collect coins and stars, eat mushrooms and defeat your enemies, the goombas. Enjoy Super Mario Star Scramble 3','1',15,2,'640.jpg',100,2,'2012-05-27 11:21:29','<object width=\"640\" height=\"400\"> <param name=\"movie\" value=\"http://f1.silvergames.com/super-mario-star-scramble-3.swf\",\"swf\"> <embed src=\"http://f1.silvergames.com/super-mario-star-scramble-3.swf\",\"swf\" width=\"640\" height=\"400\"> </embed> </object>'),(38,'Tower Bloxx','','Who knew that building an entire city could be so easy? Stack up blocks to make the highest skyscrapers possible and give the umbrella peeps a home.','1',15,7,'640.jpg',100,1,'2012-05-27 11:39:23','<object width=\"640\" height=\"480\"> <param name=\"movie\" value=\"http://www.fupa.com/swf/tower-bloxx-mochi/towerbloxx.swf\"> <embed src=\"http://www.fupa.com/swf/tower-bloxx-mochi/towerbloxx.swf\" width=\"640\" height=\"480\"> </embed> </object>'),(39,'Totems Awakening','','Throw coconuts to break wooden objects, press buttons and hit totems. Wake up each totem quickly to earn a star.','1',15,7,'TotemsAwakening_510x300.png',100,1,'2012-05-27 11:52:58','<object width=\"700\" height=\"500\"> <param name=\"movie\" value=\"http://www.swartag.com/games/Totems.swf\"> <embed src=\"http://www.swartag.com/games/Totems.swf\" width=\"700\" height=\"500\"> </embed> </object>'),(40,'Secure The Deck','','Secure the Deck is a cool game of control and precision. Fly a navy helicopter, drop off all your men safely on the ship and secure the deck. Get all boarding party members into position. Enjoy the game!','1',15,2,'642.jpg',100,1,'2012-05-28 06:30:44','<object width=\"700\" height=\"370\"> <param name=\"movie\" value=\"http://f1.silvergames.com/secure-the-deck.swf\"> <embed src=\"http://f1.silvergames.com/secure-the-deck.swf\" width=\"700\" height=\"370\"> </embed> </object>'),(41,'Chicken House','','Solve puzzles with angry chickens in the house! Chop some wood boards or ice cubes to smash all those angry birds along with their white egg too! This game is free.','1',15,2,'640.jpg',100,1,'2012-05-28 08:03:07','<object width=\"640\" height=\"550\"> <param name=\"movie\" value=\"http://cdn.fupa.com/swf/Chicken-House/ChickenHouseRedistLauncher.swf\"> <embed src=\"http://cdn.fupa.com/swf/Chicken-House/ChickenHouseRedistLauncher.swf\" width=\"640\" height=\"550\"> </embed> </object>'),(42,'Yoda Battle Slash','','Star wars continue. Hop aboard the Twilight and defend the Republic fleet from attacking droid fighters. The Force will be with you in Fierce Twilight.','1',15,2,'640.jpg',100,1,'2012-05-28 08:10:03','<object width=\"600\" height=\"400\"> <param name=\"movie\" value=\"http://files.gamezhero.com/games/f04/e63/f04e637e4ca7ddc6/data/yoda-battle-slash.swf\"> <embed src=\"http://files.gamezhero.com/games/f04/e63/f04e637e4ca7ddc6/data/yoda-battle-slash.swf\" width=\"600\" height=\"400\"> </embed> </object>'),(43,'4x4 Monster 2','','Drive a big monster truck over mountains, cars and other obstacles while keeping your truck balanced. Complete each level in the shortest time and avoid crashing for higher score.','1',15,3,'643.jpg',100,1,'2012-05-28 08:16:44','<object width=\"640\" height=\"480\"> <param name=\"movie\" value=\"http://games.mochiads.com/c/g/4x4-monster-2/4x4monster2-mochi.swf\"> <embed src=\"http://games.mochiads.com/c/g/4x4-monster-2/4x4monster2-mochi.swf\" width=\"640\" height=\"480\"> </embed> </object>'),(44,'Overkill Apache','','You &amp;amp;amp;amp; your Apache helicopter make the ultimate weapon - and you\\\'ve been called to arms! Score 25,000 points for the award!','1',15,2,'644.jpg',100,1,'2012-05-28 08:35:44','<object width=\"600\" height=\"400\"> <param name=\"movie\" value=\"http://swf2.cafeoyun.com/games/1229.swf\"> <embed src=\"http://swf2.cafeoyun.com/games/1229.swf\" width=\"600\" height=\"400\"> </embed> </object>'),(45,'Angry Rocket Bird 2','','This version will give you more challenge. The precious eggs of this bird was stolen. He really got angry and he vowed to get them all back. He got a rocket to help him. Do you think he can collect all the lost eggs?','1',15,2,'640.jpg',100,1,'2012-05-28 08:44:44','<object width=\"640\" height=\"480\"> <param name=\"movie\" value=\"http://media.y8.com/system/contents/41453/original/2_Angry_Rocket_Birds_2.swf\"> <embed src=\"http://media.y8.com/system/contents/41453/original/2_Angry_Rocket_Birds_2.swf\" width=\"640\" height=\"480\"> </embed> </object>'),(46,'Fragger','','Dust off your grenades and clean up the city from evil foes - Fragger style! Scoring 85,000 will get you the Golden Grenade Award!','1',15,2,'641.jpg',100,1,'2012-05-28 09:51:34','<object width=\"800\" height=\"600\"> <param name=\"movie\" value=\"http://www.oyunlook.com/games/Fragger.swf\"> <embed src=\"http://www.oyunlook.com/games/Fragger.swf\" width=\"800\" height=\"600\"> </embed> </object>'),(47,'Bloons Tower Defense 4','','Bloons Tower Defense 4 features improved graphics,','1',15,7,'640.jpg',100,1,'2012-05-28 17:17:52','<object width=\"600\" height=\"600\"> <param name=\"movie\" value=\"http://voxcast.dedegames.com/games/bloons-tower-defense-4.swf\"> <embed src=\"http://voxcast.dedegames.com/games/bloons-tower-defense-4.swf\" width=\"600\" height=\"600\"> </embed> </object>'),(49,'Red Ball 2','','Bigger, better, stronger, cuter...and more lost than ever. Red Ball 2 is here, and he has lost his beloved crown. Help him play through puzzles, cannons, water, pins, toxic waste, invisible platforms, boats and much, much more on his quest to find the crown. Features 20 action-packed levels, one golden crown, and a Red Ball on a mission to find it.','1',15,2,'640.jpg',100,1,'2012-05-31 07:40:00','<object width=\"640\" height=\"480\"> <param name=\"movie\" value=\"http://www.physicsgames.net/swf/redball2.swf\"> <embed src=\"http://www.physicsgames.net/swf/redball2.swf\" width=\"640\" height=\"480\"> </embed> </object>'),(50,'Avanger vs Gamma Monsters','http://marvel.com/games/play/82/avengers_vs_gamma_monsters','The Helicarrier is under attack by a Gamma Monster invasion. Fury needs to assemble the Avengers to protect the ship.','1',31,2,'avangers.jpg',100,1,'2012-05-31 22:06:04',NULL),(51,'Ourworld','','Welcome to ourWorld! Choose from over 100 puzzle, strategy or action games, watch YouTube with your friends, or hang out in a nightclub','1',22,9,'ow_slider.jpg',100,4,'2012-06-01 08:05:37','<iframe id=\"frame\" src=\"http://www.ourworld.com/ow/tracking?source=games4chrome&network=games4chrome&env=affiliate\" width=\"872px\" height=\"580px\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"auto\"> </iframe> '),(57,'Cactus McCoy 2','','Cactus McCoy returns for a brand-new epic adventure! After a struggle with rival treasure hunter Ella Windstorm, McCoy learns of the ruins of Calavera and the riches it holds in the distant lands to the south.','1',2,2,'toork_cactusMC.jpg',NULL,NULL,'2012-06-02 20:34:59','<object width=\"608\" height=\"480\"> <param name=\"movie\" value=\"http://armorgames.com/files/games/cactus-mccoy-2-12456.swf\"> <embed src=\"http://armorgames.com/files/games/cactus-mccoy-2-12456.swf\" width=\"608\" height=\"480\"> </embed> </object>'),(58,'Wings Of Genesis','','Set in the same universe with the Original Ge.ne.sis game, Wings of Genesis is a side-scrolling shooting game with a heavy touch of RPG influence. Players can pick one of the 3 main characters to begin the adventure and blast through waves of bosses and enemies! ','1',2,4,'toork_wingsOG.jpg',NULL,NULL,'2012-06-02 20:49:37','<object width=\"700\" height=\"500\"> <param name=\"movie\" value=\"http://external.kongregate-games.com/gamez/0009/4075/live/embeddable_94075.swf\"> <embed src=\"http://external.kongregate-games.com/gamez/0009/4075/live/embeddable_94075.swf\" width=\"700\" height=\"500\"> </embed> </object>'),(59,'Colorful ZUMA','','Zuma classic recreation. quicker Oh! problem is here! Left mouse click on launches the ball, scroll to the track on the end of the marbles sooner than they get rid of the opening with the ball Could get rid of the three colours. The black ball is a different ball, which he hit the ball should disappear.controls: - shoot na - bounce na - movement na','1',38,7,'toork_colorful_zuma.jpg',100,1,'2012-06-05 11:25:38','<embed src=\"http://www.freegaming.de/components/flash/6026587832.swf?affiliate_id=941efa0f97e566c4\" quality=\"high\" bgcolor=\"#e8ffff\" width=\"600\" height=\"450\" name=\"6026587832.swf\" menu=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"></embed>'),(60,'Making Monkeys','','Use your special gone to make monkeys and use your monkey friends to co-operate to claim your caffeine prize, in this quirky puzzle platformer.','1',2,7,'makingmonkey.jpg',100,1,'2012-06-06 12:01:21','<iframe type=\'text/html\' width=\'756\' height=\'600\' src=\'http://www.stencyl.com/game/embed/10632\' frameborder=\'0\' scrolling=\'no\'></iframe>'),(61,'CycloManiacs','','Flash bike racing. \\r\\n20 riders and bikes to unlock, 26 tracks, 70 achievements, and 20 bike horns.\\r\\nArrow keys or AWSD to control the bike, X or SPACE to bunny hop, B to use your horn (if you have one)','1',38,3,'CycloManiacs.JPG',100,1,'2012-06-07 19:00:27','<embed width=\"640\" height=\"480\" base=\"http://external.kongregate-games.com/gamez/0005/3442/live/\" src=\"http://external.kongregate-games.com/gamez/0005/3442/live/embeddable_53442.swf\" type=\"application/x-shockwave-flash\"></embed>'),(62,'Canyon Shooter 2','','Join the adventure once more in the new game Canyon Shooter 2, this time the game is set in a futuristic city. Fight your way through the city, and take out the enemies, before they get you! Use your parachute, jet pack and collect all the available weapons and upgrades to help you to win. Have Fun! Fight your way through the city, and take out the enemies, before they get you! Use your parachute,','1',38,13,'Canyon_Shooter_2.jpg',100,1,'2012-06-07 19:06:14','<iframe src=\"http://www.miniclip.com/games/canyon-shooter-2/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"550\" height=\"650\" scrolling=\"no\"></iframe>'),(63,'Gravity Guy','','Yer&Atilde;&sect;ekiminin h&Atilde;&frac14;k&Atilde;&frac14;mdar&Auml;&plusmn;s&Auml;&plusmn;n&Auml;&plusmn;z! Biti&Aring;Ÿe ula&Aring;Ÿmak amac&Auml;&plusmn;yla &Atilde;&sect;evrenizdeki engelleri kontrol etmek i&Atilde;&sect;in d&Atilde;&frac14;nyan&Auml;&plusmn;n y&Atilde;&para;n&Atilde;&frac14;n&Atilde;&frac14; ters &Atilde;&sect;evirin.','1',38,1,'Gravity_Guy.png',100,1,'2012-06-07 19:15:34','<iframe style=\"border: none;\" src=\"http://www.miniclip.com/games/gravity-guy/en/webgame.php\" frameborder=\"0\" scrolling=\"no\" width=\"640\" height=\"501\"></iframe>'),(64,'Assault Course','','S&Atilde;&frac14;per bir askeri e&Auml;Ÿitim oyunu. Zaman &Atilde;&para;nemli.\\r\\nSuper a military training game. Time is important.','1',38,1,'Assault_Course.jpg',100,1,'2012-06-07 19:25:09','<iframe src=\"http://www.miniclip.com/games/assault-course/en/webgame.php\" frameborder=\"0\" style=\"border:none;\" width=\"590\" height=\"443\" scrolling=\"no\"></iframe>'),(66,'Color Joy','','Help the colored figures reach the teleport and get back home! Solve challenging brain-teasers to complete more than 40 levels by removing blocks and merging objects of the same color. Collect stars, open bonus levels and reach the ultimate goal of opening the secret level!','1',38,7,'Color_Joy.jpg',100,1,'2012-06-07 19:43:09','<embed width=\"640\" height=\"480\" base=\"http://external.kongregate-games.com/gamez/0012/8252/live/\" src=\"http://external.kongregate-games.com/gamez/0012/8252/live/embeddable_128252.swf\" type=\"application/x-shockwave-flash\"></embed>'),(67,'Grand Prix Go','','Fast paced isometric racing game. Race round 12 unique tracks against nine other cars, unlocking 72 achievements as you go. Use advanced car physics and upgrade your car as you battle your way through the different race series. show less.','1',38,3,'Grand_Prix_Go.jpg',NULL,NULL,'2012-06-07 19:46:49','<embed width=\"800\" height=\"600\" base=\"http://external.kongregate-games.com/gamez/0011/5460/live/\" src=\"http://external.kongregate-games.com/gamez/0011/5460/live/embeddable_115460.swf\" type=\"application/x-shockwave-flash\"></embed>'),(68,'Monster Island','','Hold down, aim and release to shoot Cancel a thrown mini Monster thugs are on the loose harassing the inhabitants of the colorful world of Monster Island. Now, it\\\'s up to you and your arsenal of mini-monster bombs to get rid of this plague of unwanted visitors. Can you stand against such mischievous foes?','1',38,1,'Monster_Island.png',100,1,'2012-06-07 19:59:24','<iframe style=\"border: none;\" src=\"http://www.miniclip.com/games/monster-island/en/webgame.php\" frameborder=\"0\" scrolling=\"no\" width=\"608\" height=\"516\"></iframe>'),(69,'Commando Assault','','Commando is your rambo in the jungle. Commando is your contra in the dessert. So keep him alive with all your skills.\\r\\nArrows: Move\\r\\nS: Twice to Jump Down\\r\\nMouse: Aim\\r\\nMouse-Left Button: Shoot\\r\\nMouse-Click Wheel: Change Weapon\\r\\nSpace: Dispatch Troops','1',38,13,'Commando_Assault.gif',NULL,NULL,'2012-06-07 20:23:35','<iframe style=\"border: none;\" src=\"http://www.miniclip.com/games/commando-assault/en/webgame.php\" frameborder=\"0\" scrolling=\"no\" width=\"8000\" height=\"450\"></iframe>'),(70,'Scooby Doo!!!','','Scooby Doo!!! Doing skateboard. Go go go.... ;)','1',38,1,'Scooby_Doo.jpg',100,1,'2012-06-07 20:30:29','<object id=\"9475780591.swf\" width=\"500\" height=\"375\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\"><param name=\"quality\" value=\"high\" /><param name=\"menu\" value=\"false\" /><param name=\"src\" value=\"http://www.freegaming.de/components/flash/9475780591.swf?affiliate_id=941efa0f97e566c4\" /><param name=\"pluginspage\" value=\"http://www.macromedia.com/go/getflashplayer\" /><embed id=\"9475780591.swf\" width=\"800\" height=\"600\" type=\"application/x-shockwave-flash\" src=\"http://www.freegaming.de/components/flash/9475780591.swf?affiliate_id=941efa0f97e566c4\" quality=\"high\" menu=\"false\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" /></object>'),(71,'Batman2','http://www.douchegames.com/mixed/scrabble','Tavuklar&Auml;&plusmn;n yumurta follu&Auml;Ÿunda do&Auml;Ÿuran bir kedi, daha sonra d&Atilde;&frac14;nyada e&Aring;Ÿine az rastlanabilecek bir olay&Auml;&plusmn; ger&Atilde;&sect;ekle&Aring;Ÿtirdi.','1',3,1,'Batman2.jpg',NULL,NULL,'2012-06-07 23:21:17','<embed src=\"http://armorgames.com/files/games/argent-burst-23.swf\" type=\"application/x-shockwave-flash\" width=\"550\" height=\"400\"></embed>');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `malicious`
--

DROP TABLE IF EXISTS `malicious`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `malicious` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users30` (`user_id`),
  KEY `fk_Users_has_Games_Games30` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `malicious`
--

LOCK TABLES `malicious` WRITE;
/*!40000 ALTER TABLE `malicious` DISABLE KEYS */;
/*!40000 ALTER TABLE `malicious` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playcounts`
--

DROP TABLE IF EXISTS `playcounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playcounts` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users2` (`user_id`),
  KEY `fk_Users_has_Games_Games2` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playcounts`
--

LOCK TABLES `playcounts` WRITE;
/*!40000 ALTER TABLE `playcounts` DISABLE KEYS */;
INSERT INTO `playcounts` VALUES (3,2,17,1,'2012-04-13 20:40:49'),(3,3,18,1,'2012-04-13 20:41:14'),(-1,2,19,16,'2012-04-13 23:28:14'),(-1,4,20,13,'2012-04-13 23:33:15'),(2,2,21,5,'2012-04-13 23:45:11'),(2,6,22,2,'2012-04-13 23:45:35'),(5,2,23,1,'2012-04-14 00:22:18'),(2,3,24,10,'2012-04-14 01:34:00'),(2,7,25,5,'2012-04-14 14:51:24'),(-1,7,26,32,'2012-04-14 14:52:34'),(4,7,27,1,'2012-04-14 15:19:09'),(6,10,28,1,'2012-04-14 23:42:01'),(2,8,29,2,'2012-04-15 17:03:23'),(2,10,30,2,'2012-04-15 18:31:36'),(7,11,31,8,'2012-04-16 23:55:50'),(-1,9,32,30,'2012-04-17 23:35:14'),(6,9,33,1,'2012-04-20 19:03:31'),(6,8,34,1,'2012-04-23 23:26:41'),(-1,8,35,20,'2012-04-23 23:27:15'),(-1,10,36,7,'2012-04-23 23:32:31'),(-1,13,37,4,'2012-04-23 23:43:17'),(-1,6,38,3,'2012-04-24 00:02:03'),(6,7,39,1,'2012-04-24 22:23:49'),(-1,12,40,6,'2012-04-24 23:40:41'),(11,10,41,1,'2012-04-24 23:53:42'),(11,9,42,1,'2012-04-24 23:54:27'),(8,14,43,6,'2012-04-25 00:08:19'),(8,4,44,2,'2012-04-25 00:12:40'),(10,15,45,2,'2012-04-25 00:20:52'),(13,13,46,1,'2012-04-25 10:15:35'),(13,10,47,2,'2012-04-25 10:20:34'),(13,15,48,1,'2012-04-25 22:56:26'),(2,15,49,2,'2012-04-28 17:39:51'),(7,13,50,2,'2012-04-29 21:05:12'),(7,12,51,1,'2012-04-30 06:25:15'),(-1,14,52,2,'2012-04-30 17:51:38'),(15,8,53,1,'2012-05-01 06:19:51'),(15,12,54,1,'2012-05-01 06:20:18'),(-1,15,55,10,'2012-05-01 06:30:58'),(2,9,56,8,'2012-05-01 13:12:17'),(2,11,57,1,'2012-05-01 13:12:38'),(2,14,58,1,'2012-05-01 13:13:18'),(2,16,59,8,'2012-05-01 13:17:14'),(4,16,60,1,'2012-05-01 13:20:28'),(7,9,61,2,'2012-05-02 09:40:42'),(-1,11,62,14,'2012-05-02 10:44:31'),(-1,3,63,15,'2012-05-02 10:58:47'),(3,13,64,1,'2012-05-04 19:22:16'),(7,3,65,2,'2012-05-04 19:28:48'),(18,2,66,1,'2012-05-04 20:07:31'),(-1,16,67,8,'2012-05-04 21:10:18'),(21,11,68,2,'2012-05-05 07:28:46'),(21,17,69,9,'2012-05-05 09:43:03'),(21,7,70,3,'2012-05-05 09:51:44'),(2,17,71,6,'2012-05-05 11:36:32'),(-1,17,72,11,'2012-05-05 11:41:56'),(23,18,73,6,'2012-05-05 16:00:09'),(-1,19,74,2,'2012-05-05 18:39:44'),(-1,18,75,5,'2012-05-05 20:42:40'),(7,20,76,4,'2012-05-05 20:49:30'),(23,21,77,6,'2012-05-06 08:31:05'),(21,21,78,3,'2012-05-06 11:56:53'),(21,9,79,1,'2012-05-06 12:00:17'),(-1,20,80,2,'2012-05-06 14:08:27'),(23,4,81,1,'2012-05-06 15:15:12'),(23,7,82,1,'2012-05-06 15:16:06'),(25,9,83,2,'2012-05-07 11:02:19'),(25,22,84,2,'2012-05-07 11:16:28'),(7,22,85,2,'2012-05-07 11:21:48'),(7,17,86,1,'2012-05-07 11:35:30'),(8,22,87,2,'2012-05-07 11:43:10'),(23,12,88,1,'2012-05-07 12:30:58'),(23,24,89,3,'2012-05-07 12:37:04'),(23,26,90,2,'2012-05-07 12:55:19'),(23,23,91,2,'2012-05-07 12:56:37'),(23,25,92,1,'2012-05-07 12:57:38'),(23,27,93,1,'2012-05-07 13:39:07'),(23,17,94,1,'2012-05-07 13:43:03'),(23,19,95,1,'2012-05-07 13:49:32'),(-1,24,96,1,'2012-05-07 14:00:19'),(23,28,97,5,'2012-05-07 14:11:28'),(23,29,98,4,'2012-05-07 14:13:25'),(23,8,99,1,'2012-05-07 15:00:43'),(-1,28,100,5,'2012-05-07 15:23:17'),(-1,21,101,3,'2012-05-08 09:10:01'),(-1,27,102,1,'2012-05-09 20:56:04'),(2,19,103,2,'2012-05-09 21:25:05'),(7,7,104,3,'2012-05-11 10:11:06'),(7,18,105,1,'2012-05-11 15:18:25'),(21,4,106,1,'2012-05-12 19:36:41'),(7,31,107,5,'2012-05-14 09:52:40'),(25,3,108,1,'2012-05-14 10:32:17'),(25,28,109,2,'2012-05-14 10:33:27'),(-1,31,110,2,'2012-05-14 11:09:16'),(5,22,111,1,'2012-05-21 16:39:53'),(5,25,112,1,'2012-05-21 16:40:30'),(5,19,113,1,'2012-05-21 16:41:00'),(5,10,114,1,'2012-05-21 16:42:15'),(5,20,115,1,'2012-05-21 16:42:56'),(5,17,116,1,'2012-05-21 16:43:21'),(5,31,117,1,'2012-05-21 16:44:15'),(7,6,118,1,'2012-05-25 01:43:27'),(7,32,119,1,'2012-05-25 01:58:17'),(-1,32,120,5,'2012-05-25 02:00:06'),(4,32,121,3,'2012-05-25 02:01:07'),(7,2,122,1,'2012-05-25 07:53:01'),(4,15,123,2,'2012-05-25 09:44:53'),(4,4,124,1,'2012-05-25 09:45:57'),(3,4,125,1,'2012-05-25 09:53:13'),(4,33,126,1,'2012-05-25 16:12:59'),(4,9,127,1,'2012-05-25 16:14:06'),(4,14,128,1,'2012-05-25 16:14:23'),(2,29,129,2,'2012-05-25 20:17:43'),(2,32,130,2,'2012-05-25 20:34:35'),(21,34,131,6,'2012-05-26 11:37:00'),(22,35,132,1,'2012-05-26 12:16:39'),(-1,35,133,4,'2012-05-26 13:46:37'),(2,35,134,4,'2012-05-26 21:08:14'),(2,28,135,2,'2012-05-26 21:49:41'),(-1,34,136,1,'2012-05-27 05:46:06'),(15,36,137,2,'2012-05-27 11:01:32'),(15,37,138,5,'2012-05-27 11:22:08'),(-1,37,139,5,'2012-05-27 11:24:28'),(15,38,140,2,'2012-05-27 11:47:04'),(15,39,141,5,'2012-05-27 11:53:38'),(-1,38,142,1,'2012-05-27 20:47:53'),(15,40,143,3,'2012-05-28 06:31:04'),(15,41,144,1,'2012-05-28 08:03:26'),(15,42,145,3,'2012-05-28 08:10:20'),(15,43,146,3,'2012-05-28 08:17:00'),(15,35,147,1,'2012-05-28 08:27:54'),(15,44,148,2,'2012-05-28 08:37:22'),(15,45,149,3,'2012-05-28 08:45:06'),(15,15,150,2,'2012-05-28 09:31:48'),(15,46,151,2,'2012-05-28 09:51:52'),(15,10,152,1,'2012-05-28 09:56:21'),(29,38,153,1,'2012-05-28 11:10:10'),(29,2,154,2,'2012-05-28 11:41:00'),(-1,44,155,2,'2012-05-28 11:43:52'),(15,47,156,1,'2012-05-28 17:18:16'),(2,34,157,1,'2012-05-29 15:14:35'),(2,42,158,1,'2012-05-29 15:21:47'),(15,22,159,1,'2012-05-29 17:07:22'),(-1,45,160,3,'2012-05-29 19:24:12'),(-1,46,161,1,'2012-05-29 19:26:50'),(-1,47,162,1,'2012-05-29 19:27:33'),(33,4,163,1,'2012-05-30 21:49:06'),(33,3,164,2,'2012-05-30 21:49:37'),(33,11,165,1,'2012-05-30 21:52:22'),(15,49,166,2,'2012-05-31 07:40:50'),(29,9,167,1,'2012-05-31 11:53:14'),(-1,25,168,2,'2012-05-31 12:26:52'),(31,48,169,1,'2012-05-31 15:27:32'),(31,6,170,1,'2012-05-31 15:29:42'),(-1,49,171,1,'2012-05-31 18:55:53'),(31,50,172,2,'2012-05-31 22:06:18'),(22,51,173,2,'2012-06-01 08:05:53'),(22,50,174,1,'2012-06-01 08:23:42'),(7,51,175,1,'2012-06-01 08:25:15'),(22,28,176,1,'2012-06-01 08:38:13'),(-1,51,177,5,'2012-06-01 09:20:25'),(25,7,178,1,'2012-06-01 15:47:12'),(25,4,179,1,'2012-06-01 15:47:50'),(25,2,180,1,'2012-06-01 15:49:02'),(2,54,181,1,'2012-06-02 02:29:20'),(22,56,182,1,'2012-06-02 10:18:16'),(2,57,183,2,'2012-06-02 20:35:35'),(2,58,184,2,'2012-06-02 20:49:59'),(2,37,185,1,'2012-06-05 11:10:25'),(38,59,186,3,'2012-06-05 11:26:07'),(33,2,187,1,'2012-06-05 11:39:29'),(33,7,188,1,'2012-06-05 11:40:04'),(2,59,189,2,'2012-06-05 11:41:19'),(33,51,190,1,'2012-06-05 11:50:26'),(-1,59,191,1,'2012-06-06 09:39:59'),(-1,57,192,1,'2012-06-06 09:41:49'),(2,60,193,2,'2012-06-06 12:01:40'),(2,51,194,1,'2012-06-07 00:23:48'),(2,33,195,1,'2012-06-07 02:09:36'),(-1,60,196,2,'2012-06-07 09:30:41'),(4,3,197,1,'2012-06-07 14:10:36'),(4,45,198,1,'2012-06-07 14:17:32'),(4,51,199,1,'2012-06-07 14:18:56'),(38,61,200,2,'2012-06-07 19:00:42'),(38,62,201,1,'2012-06-07 19:06:29'),(38,63,202,1,'2012-06-07 19:15:51'),(38,64,203,2,'2012-06-07 19:25:26'),(38,65,204,2,'2012-06-07 19:38:12'),(38,67,205,1,'2012-06-07 19:47:07'),(38,66,206,1,'2012-06-07 19:48:23'),(38,68,207,1,'2012-06-07 19:59:59'),(38,70,208,1,'2012-06-07 20:30:46'),(38,69,209,1,'2012-06-07 20:32:00'),(2,62,210,1,'2012-06-08 00:06:33'),(2,63,211,1,'2012-06-08 00:09:03'),(2,43,212,1,'2012-06-08 00:09:31'),(-1,63,213,2,'2012-06-08 00:09:54'),(3,71,214,1,'2012-06-08 00:13:47'),(2,70,215,1,'2012-06-08 00:26:18'),(2,61,216,1,'2012-06-08 00:39:07'),(2,71,217,1,'2012-06-08 00:39:45'),(2,66,218,1,'2012-06-08 00:42:14'),(3,61,219,1,'2012-06-08 01:08:58'),(40,15,220,1,'2012-06-08 10:16:19');
/*!40000 ALTER TABLE `playcounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Game_has_User_Game1` (`game_id`),
  KEY `fk_Game_has_User_User1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (2,3,1,5),(4,2,2,5),(6,2,3,4),(3,2,4,5),(7,4,5,5),(2,4,6,4),(4,4,7,4),(3,4,8,5),(9,6,9,5),(8,7,10,4),(7,2,11,5),(11,7,12,5),(10,7,13,1),(8,6,14,5),(12,11,15,5),(9,11,16,5),(14,8,17,1),(15,10,18,5),(13,7,19,3),(9,7,20,5),(2,14,21,3),(7,14,22,4),(8,14,23,4),(12,7,24,2),(16,2,25,5),(16,7,26,5),(16,4,27,5),(3,7,28,5),(17,21,29,5),(18,23,30,5),(20,7,31,5),(21,23,32,5),(4,23,33,5),(7,23,34,5),(12,23,35,5),(23,23,36,5),(24,23,37,5),(26,23,38,5),(25,23,39,5),(27,23,40,5),(28,23,41,5),(29,23,42,5),(31,7,43,5),(28,25,44,5),(7,7,45,5),(6,7,46,5),(32,7,47,5),(32,4,48,5),(34,21,49,5),(35,2,50,5),(38,2,51,5),(37,2,52,5),(39,15,53,5),(37,15,54,5),(40,15,55,5),(41,15,56,5),(42,15,57,5),(43,15,58,5),(44,15,59,5),(45,15,60,5),(46,15,61,5),(47,15,62,5),(48,31,63,5),(49,15,64,5),(50,31,65,5),(51,22,66,5),(51,7,67,5),(51,6,68,5),(51,3,69,5),(4,25,70,5),(59,38,71,5),(60,2,72,5),(15,4,73,5),(62,38,74,5),(61,38,75,5),(63,38,76,5),(64,38,77,5),(66,38,78,5),(68,38,79,5),(70,38,80,5);
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users1` (`user_id`),
  KEY `fk_Users_has_Games_Games1` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_id` int(11) NOT NULL,
  `subscriber_to_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,0,0,'2012-04-12 17:04:29'),(2,0,0,'2012-04-12 17:06:34'),(18,5,3,'2012-04-13 18:20:46'),(19,5,4,'2012-04-13 18:25:37'),(22,5,2,'2012-04-14 00:22:36'),(27,7,8,'2012-04-15 13:39:14'),(28,2,6,'2012-04-15 18:01:27'),(29,2,8,'2012-04-15 18:06:16'),(32,2,3,'2012-04-15 18:06:53'),(34,2,4,'2012-04-21 15:56:50'),(35,2,2,'2012-04-23 13:00:45'),(36,2,11,'2012-04-23 13:03:32'),(37,2,10,'2012-04-23 13:03:50'),(38,6,7,'2012-04-23 23:18:41'),(39,6,9,'2012-04-23 23:18:49'),(40,6,3,'2012-04-23 23:19:00'),(41,6,2,'2012-04-23 23:19:07'),(42,6,6,'2012-04-24 22:23:12'),(43,8,8,'2012-04-28 23:43:37'),(46,7,10,'2012-04-29 00:30:24'),(47,14,6,'2012-04-29 21:19:06'),(48,14,2,'2012-04-29 21:19:28'),(49,7,7,'2012-04-30 06:37:30'),(53,7,2,'2012-05-03 15:34:04'),(54,7,6,'2012-05-03 16:03:18'),(61,4,8,'2012-05-03 19:46:27'),(68,4,4,'2012-05-03 20:10:08'),(69,4,15,'2012-05-03 20:39:23'),(70,4,6,'2012-05-03 20:39:40'),(71,4,2,'2012-05-03 20:39:45'),(72,4,7,'2012-05-03 20:40:01'),(73,4,3,'2012-05-03 20:40:18'),(74,18,6,'2012-05-04 20:07:53'),(75,3,4,'2012-05-04 20:34:42'),(76,19,6,'2012-05-05 06:54:46'),(77,19,2,'2012-05-05 06:55:00'),(78,19,7,'2012-05-05 06:55:10'),(81,21,21,'2012-05-07 10:43:57'),(82,7,25,'2012-05-07 10:57:22'),(83,25,6,'2012-05-07 11:06:36'),(84,25,7,'2012-05-07 11:30:14'),(85,8,25,'2012-05-07 11:38:44'),(86,25,8,'2012-05-07 12:08:29'),(87,23,6,'2012-05-07 14:03:05'),(88,7,23,'2012-05-07 14:03:25'),(89,23,8,'2012-05-07 14:03:30'),(90,23,2,'2012-05-07 14:04:28'),(91,7,21,'2012-05-10 16:52:05'),(92,4,21,'2012-05-10 20:13:01'),(93,7,3,'2012-05-10 20:27:49'),(94,7,4,'2012-05-10 20:28:00'),(95,5,5,'2012-05-21 16:38:37'),(96,2,15,'2012-05-27 12:16:01'),(97,15,15,'2012-05-28 06:39:36'),(98,15,23,'2012-05-28 07:49:55'),(102,31,31,'2012-05-30 23:24:48'),(103,31,15,'2012-05-30 23:39:52'),(104,31,10,'2012-05-30 23:40:04'),(105,31,21,'2012-05-30 23:40:13'),(106,25,25,'2012-06-01 13:42:53'),(107,33,2,'2012-06-05 11:36:59'),(108,2,38,'2012-06-05 11:42:22');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Socialesman','kazim@faros.com.tr','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',1,'1','2012-04-03 23:15:18',30,'1994-10-06','m','<script type=\"text/javascript\"><!--\r\ngoogle_ad_client = \"ca-pub-8631770984631666\";\r\n/* Cici */\r\ngoogle_ad_slot = \"9075184493\";\r\ngoogle_ad_width = 728;\r\ngoogle_ad_height = 90;\r\n//-->\r\n</script>\r\n<script type=\"text/javascript\"\r\nsrc=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\r\n</script>','wO1CD.gif'),(3,'Angry Birds','hoaltan@hotmail.com','3f11a8012cf1525b3c41f65ba3d3bd2073f74b71',1,'1','2012-04-10 01:32:29',1,'2002-05-15','','1','Chrome_Angry_Birds_1_0_1.jpg'),(4,'Zombies','safinaz@hotmail.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-04-11 00:48:13',4,'1993-05-01','f',NULL,'images.jpeg'),(5,'hayribey','haldun@hotmail.com','3f11a8012cf1525b3c41f65ba3d3bd2073f74b71',0,'1','2012-04-13 17:08:12',NULL,NULL,NULL,NULL,NULL),(6,'Miniclip','miniclip@toork.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',2,'1','2012-04-14 23:25:41',1,'2002-07-27','f','<iframe src=\"http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&amp;t=728x90&amp;channel=2&amp;cb=1335227868456\" style=\"width:728px;height:90px;\" frameborder=\"0\" scrolling=\"no\"></iframe>','rsz_miniclip.jpg'),(7,'ArmorGames','armorgames@toork.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',2,'1','2012-04-14 23:27:33',10,'1984-10-06','m','<iframe src=\"http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&amp;t=728x90&amp;channel=2&amp;cb=1335227868456\" style=\"width:728px;height:90px;\" frameborder=\"0\" scrolling=\"no\"></iframe>','Article330142_armor_games_logo.jpg'),(8,'Kongregate','kongregate@amazebuy.com','bf9e8c4a52c72ea9753f9dbe1f96675e2b37c2ba',2,'1','2012-04-14 23:29:38',2,'2002-04-28','m','<iframe src=\"http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&amp;t=728x90&amp;channel=2&amp;cb=1335227868456\" style=\"width:728px;height:90px;\" frameborder=\"0\" scrolling=\"no\"></iframe>','kongregate.png'),(9,'kralOyun','kral@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'0','2012-04-18 21:22:49',NULL,NULL,NULL,NULL,NULL),(10,'Digital Chocolate','taztaz@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-04-19 02:10:33',230,'2002-05-27','',NULL,'di.jpg'),(11,'nihatDogan','nihat@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-04-20 23:40:38',NULL,NULL,NULL,NULL,NULL),(13,'kedikiz','kedikiz@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-04-25 10:02:34',NULL,NULL,NULL,NULL,NULL),(14,'KaraGulle','karagul@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-04-29 21:16:39',4,'1975-01-30','m',NULL,NULL),(15,'GameZidan','ayseakgulzo@hotmail.com','a6583514a7c1e6f1378d5af23c53c4f79afdf8b2',2,'1','2012-05-01 06:11:20',222,'1978-03-10','f','<SCRIPT language=\"Javascript\">\r\nvar cpmstar_rnd=Math.round(Math.random()*999999);\r\nvar cpmstar_pid=32766;\r\ndocument.writeln(\"<SCR\"+\"IPT language=\'Javascript\' src=\'http://server.cpmstar.com/view.aspx?poolid=\"+cpmstar_pid+\"&script=1&rnd=\"+cpmstar_rnd+\"\'></SCR\"+\"IPT>\");\r\n</SCRIPT>','vasat_34.gif'),(16,'gamelara','alaraakgul@gmail.com','c1b18e66e78cba73cad937091338d7ad16717b34',0,'1','2012-05-01 06:15:23',NULL,NULL,NULL,NULL,NULL),(17,'UsturaKemal','ustura@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'0','2012-05-04 19:26:11',NULL,NULL,NULL,NULL,NULL),(18,'Fenerbahce','fener@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-05-04 19:37:06',NULL,NULL,NULL,NULL,NULL),(19,'istanbul','istanbul@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-05-05 06:46:58',1,'1984-05-05','m',NULL,NULL),(20,'Facebook','facebook@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-05-05 06:50:39',NULL,NULL,NULL,NULL,NULL),(21,'Goodgame Studios','fuat@faros.com.tr','607bbdcec4ce762f0eee12ebfc60b6b44335e3ae',2,'1','2012-05-05 07:18:15',1,'2002-05-26','','','1862474_300.jpg'),(22,'Ourworld','fuatakgul@gmail.com','607bbdcec4ce762f0eee12ebfc60b6b44335e3ae',2,'1','2012-05-05 07:44:54',1,'2002-05-26','','',NULL),(23,'NishGame','akgulkenan@gmail.com','2b812787e9e95059cc1e65dea9138510bd605831',2,'1','2012-05-05 15:53:56',222,'1982-12-04','m','<script type=\"text/javascript\">document.write(\"<iframe src=\'http://www.epicgameads.com/ads/banneriframe.php?id=DyNhLiL2VJ&t=728x90&channel=6&cb=\" + (Math.floor(Math.random()*99999) + new Date().getTime()) + \"\' style=\'width:728px;height:90px;\' frameborder=\'0\' scrolling=\'no\'></iframe>\");</script>','th_CharmanderDoll.gif'),(24,'hasanoguzhanaltan','hoaltan1@hotmail.com','ddb5ef7307f06c25228d04a3a57f90371a922edc',0,'0','2012-05-05 18:27:57',NULL,NULL,NULL,NULL,NULL),(25,'crazyapps','fuatm16@gmail.com','1025348b56212119bf33d7580270e1c89daaf566',0,'1','2012-05-07 10:21:38',222,'1985-07-14','m',NULL,'1.jpg'),(26,'Nickelodeon','hyturko@yahoo.com','852bd96ac65b6995c5ce6be30d4663caed4c3828',0,'1','2012-05-07 22:37:29',1,'2002-05-30','',NULL,'10191_nickelodeon.png'),(27,'skymasteraltan','skymasteraltan@gmail.com','852bd96ac65b6995c5ce6be30d4663caed4c3828',0,'1','2012-05-14 22:53:49',NULL,NULL,NULL,NULL,NULL),(28,'kartalsites','kartalsites@gmail.com','e2f7cf5dcbe494829da5cb6a281e5bb3b2254152',0,'0','2012-05-21 22:43:07',NULL,NULL,NULL,NULL,NULL),(29,'specialist','fatma.akgul@faros.com.tr','17cafe1fc8e784520cd75de57669f823bc4d6fd4',0,'1','2012-05-27 11:45:47',NULL,NULL,NULL,NULL,NULL),(30,'BeanGame','seyhmusgokcen@gmail.com','8979b456e9de934860e719c31dfd26b5294aad68',0,'0','2012-05-29 21:43:33',NULL,NULL,NULL,NULL,NULL),(31,'Avangers','avangers@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-05-30 21:26:52',222,'2002-05-30','',NULL,'avengers.jpg'),(32,'Bean_Game','seyhmusgokcen@msn.com','e3361220d281686322948a4bdec5ed651ff3368f',0,'0','2012-05-30 21:30:07',NULL,NULL,NULL,NULL,NULL),(33,'Beangames','seyhmus@amazebuy.com','e3361220d281686322948a4bdec5ed651ff3368f',0,'1','2012-05-30 21:35:16',NULL,NULL,NULL,NULL,NULL),(34,'Marvel','aaayseakgul@gmail.com','a6583514a7c1e6f1378d5af23c53c4f79afdf8b2',0,'0','2012-05-31 09:00:18',NULL,NULL,NULL,NULL,NULL),(35,'Twitter','farosfaruk@gmail.com','888542db3413e5c3ecdcdc6f8578142f702ddb6b',0,'0','2012-05-31 09:08:07',NULL,NULL,NULL,NULL,NULL),(36,'Barcelona','barcelona@amazebuy.com','a6583514a7c1e6f1378d5af23c53c4f79afdf8b2',0,'1','2012-05-31 09:10:28',NULL,NULL,NULL,NULL,NULL),(37,'gamejection','gamejection@gmail.com','bdcfc34dc67af86d30fde1af5f4c9fd63b10ad30',0,'0','2012-06-04 09:29:55',NULL,NULL,NULL,NULL,NULL),(38,'GameRoom','gamejection2@gmail.com','bdcfc34dc67af86d30fde1af5f4c9fd63b10ad30',2,'1','2012-06-04 10:45:29',222,'1983-11-10','m','.','Gameroom3ColrNeon.jpg'),(39,'Bigpoint','fuatakgulchrome@gmail.com','607bbdcec4ce762f0eee12ebfc60b6b44335e3ae',0,'0','2012-06-08 08:38:08',NULL,NULL,NULL,NULL,NULL),(40,'Slider','slider@amazebuy.com','cd356305c53dd1d0c37cb8c25523e749e8a7b48b',0,'1','2012-06-08 10:14:28',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallentries`
--

DROP TABLE IF EXISTS `wallentries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallentries` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Users_has_Games_Users3` (`user_id`),
  KEY `fk_Users_has_Games_Games3` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallentries`
--

LOCK TABLES `wallentries` WRITE;
/*!40000 ALTER TABLE `wallentries` DISABLE KEYS */;
INSERT INTO `wallentries` VALUES (7,2,1,'2012-05-02 23:51:49'),(7,3,2,'2012-05-02 23:51:28');
/*!40000 ALTER TABLE `wallentries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-08 18:15:47
