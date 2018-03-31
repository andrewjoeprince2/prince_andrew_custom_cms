-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2018 at 01:33 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evilcorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genre`
--

DROP TABLE IF EXISTS `tbl_genre`;
CREATE TABLE IF NOT EXISTS `tbl_genre` (
  `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(200) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`genre_id`, `genre_name`) VALUES
(1, 'Comedy'),
(2, 'Sci-Fi'),
(3, 'Horror'),
(4, 'Action'),
(5, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

DROP TABLE IF EXISTS `tbl_movies`;
CREATE TABLE IF NOT EXISTS `tbl_movies` (
  `movies_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movies_cover` varchar(75) NOT NULL DEFAULT 'cover_default.jpg',
  `movies_title` varchar(125) NOT NULL,
  `movies_year` varchar(5) NOT NULL,
  `movies_runtime` varchar(25) NOT NULL,
  `movies_storyline` text NOT NULL,
  `movies_trailer` varchar(75) NOT NULL DEFAULT 'trailer_default.jpg',
  `movies_release` varchar(125) NOT NULL,
  PRIMARY KEY (`movies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_movies`
--

INSERT INTO `tbl_movies` (`movies_id`, `movies_cover`, `movies_title`, `movies_year`, `movies_runtime`, `movies_storyline`, `movies_trailer`, `movies_release`) VALUES
(22, 'deadpool2.jpg', 'Deadpool 2', '2018', '2h 14min', 'After surviving a near fatal bovine attack, a disfigured cafeteria chef (Wade Wilson) struggles to fulfill his dream of becoming Mayberry\'s hottest bartender while also learning to cope with his lost sense of taste. Searching to regain his spice for life, as well as a flux capacitor, Wade must battle ninjas, the yakuza, and a pack of sexually aggressive canines, as he journeys around the world to discover the importance of family, friendship, and flavor - finding a new taste for adventure and earning the coveted coffee mug title of World\'s Best Lover.', 'dealpool2.mp4', '18 May 2018'),
(23, 'love_simon.jpg', 'Love Simon', '2018', '1h 50min', 'Simon Spier keeps a huge secret from his family, his friends, and all of his classmates: he\'s gay. When that secret is threatened, Simon must face everyone and come to terms with his identity.', 'love_simon.mp4', '16 March 2018'),
(26, 'forrest_gump.jpg', 'Forrest Gump', '1994', '2h 34min', 'The presidencies of Kennedy and Johnson, Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.', 'forrest_gump.mp4', '6 July 1994'),
(27, 'home_alone.jpg', 'Home Alone', '1990', '1h 34min', 'An eight-year-old troublemaker must protect his house from a pair of burglars when he is accidentally left home alone by his family during Christmas vacation.', 'home_alone.mp4', '16 November 1990'),
(28, 'american_pie.jpg', 'American Pie', '1999', '1h 35min', 'Four teenage boys enter a pact to lose their virginity by prom night.', 'american_pie.mp4', '9 July 1999'),
(30, 'inception.jpg', 'Inception', '2010', '2h 28min', 'A thief, who steals corporate secrets through the use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', 'inception.mp4', '16 July 2010'),
(31, 'minority_report.jpg', 'Minority Report', '2002', '2h 25min', 'In a future where a special police unit is able to arrest murderers before they commit their crimes, an officer from that unit is himself accused of a future murder.', 'minoirty_report.mp4', '21 June 2002'),
(32, 'avatar.jpg', 'Avatar', '2009', '2h 42min', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'avatar.mp4', '18 December 2009'),
(33, 'terminator2.jpg', 'Terminator 2', '1991', '2h 18min', 'A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her ten year old son, John Connor, from a more advanced cyborg.', 'terminator2.mp4', '3 July 1991'),
(34, 'the_matrix.jpg', 'The Matrix', '1999', '2h 16min', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'the_matrix.mp4', '31 March 1999'),
(35, 'the_shining.jpg', 'The Shining', '1980', '2h 26min', 'A family heads to an isolated hotel for the winter where an evil spiritual presence influences the father into violence, while his psychic son sees horrific forebodings from the past and of the future.', 'the_shining.mp4', '13 June 1980'),
(36, 'the_exorcist.jpg', 'The Exorcist', '1994', '2h 2min', 'When a teenage girl is possessed by a mysterious entity, her mother seeks the help of two priests to save her daughter.', 'the_exorcist.mp4', '26 December 1973'),
(37, 'rec.jpg', 'Rec', '2007', '1h 18min', 'A television reporter and cameraman follow emergency workers into a dark apartment building and are quickly locked inside with something terrifying.', 'rec.mp4', '23 November 2007'),
(38, 'devils_backbone', 'The Devils Backbone', '2001', '1h 46min', 'After Carlos - a 12-year-old whose father has died in the Spanish Civil War - arrives at an ominous boys\' orphanage, he discovers the school is haunted and has many dark secrets that he must uncover.', 'devils_backbone.mp4', '20 April 2001'),
(39, 'the_descent.jpg', 'The Descent', '2006', '1h 39min', 'A caving expedition goes horribly wrong, as the explorers become trapped and ultimately pursued by a strange breed of predators.', 'the_descent.mp4', '4 August 2006'),
(40, 'gladiator.jpg', 'Gladiator', '2000', '2h 35min', 'When a Roman General is betrayed, and his family murdered by an emperor\'s corrupt son, he comes to Rome as a gladiator to seek revenge.', 'gladiator.mp4', '5 May 2000'),
(41, 'saving.jpg', 'Saving Private Ryan', '1998', '2h 49min', 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.', 'saving.mp4', '24 July 1998'),
(42, 'hot_fuzz.jpg', 'Hot Fuzz', '2007', '2h 34min', 'A skilled London police officer is transferred to a small town that\'s harbouring a dark secret.', 'hot_fuzz.mp4', '20 April 2007'),
(43, 'dark_knight.jpg', 'The Dark Knight', '2008', '2h 34min', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, the Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'dark_knight.mp4', '18 July 2008'),
(44, 'heat.jpg', 'Heat', '1995', '2h 50min', 'A group of professional bank robbers start to feel the heat from police when they unknowingly leave a clue at their latest heist, while both sides attempt to find balance between their personal and professional lives.', 'heat.mp4', '15 December 1995'),
(45, 'titanic.jpg', 'Titanic', '1997', '3h 14min', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'titanic.mp4', '19 December 1997'),
(46, 'crash.jpg', 'Crash', '2005', '1h 52min', 'Los Angeles citizens with vastly separate lives collide in interweaving stories of race, loss and redemption.', 'crash.mp4', '6 May 2005'),
(47, 'the_departed.jpg', 'The Departed', '2006', '2h 31min', 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 'the_departed.mp4', '6 October 2006'),
(48, 'the_godfather.jpg', 'The Godfather', '1972', '2h 55min', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'the_godfather.mp4', '24 March 1972'),
(49, 'pulp_fiction.jpg', 'Pulp Fiction', '1994', '2h 34min', 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'pulp_fiction.jpg', '14 October 1994');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mov_genre`
--

DROP TABLE IF EXISTS `tbl_mov_genre`;
CREATE TABLE IF NOT EXISTS `tbl_mov_genre` (
  `mov_genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL,
  PRIMARY KEY (`mov_genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mov_genre`
--

INSERT INTO `tbl_mov_genre` (`mov_genre_id`, `genre_id`, `movies_id`) VALUES
(1, 1, 22),
(2, 1, 23),
(3, 1, 26),
(4, 1, 27),
(5, 1, 28),
(6, 2, 30),
(7, 2, 31),
(8, 2, 32),
(9, 2, 33),
(10, 2, 34),
(11, 3, 35),
(12, 3, 36),
(13, 3, 37),
(14, 3, 38),
(15, 3, 39),
(16, 4, 40),
(17, 4, 41),
(18, 4, 42),
(19, 4, 43),
(20, 4, 44),
(21, 5, 45),
(22, 5, 46),
(23, 5, 47),
(24, 5, 48),
(25, 5, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(500) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_level` tinyint(3) UNSIGNED NOT NULL,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_last_login` varchar(100) NOT NULL,
  `user_current_login` varchar(100) NOT NULL,
  `user_attempts` tinyint(3) UNSIGNED NOT NULL,
  `user_passtest` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_level`, `user_ip`, `user_last_login`, `user_current_login`, `user_attempts`, `user_passtest`) VALUES
(15, 'Justin', 'jbrunner', '$2y$10$.f9dqWky3RshfWwtkpistutE.1CCklCzmovCQrUXzRxNXJx/QO2Ya', 'jbrunner@evilcorp.com', 2, '::1', '03/30/2018 14:53:11', '03/30/2018 16:49:51', 0, 'mSWUIf9hT8'),
(18, 'Donald', 'dtrump', '$2y$10$KcjgIlyw7bnlI9Wl2k3SrOAZIlMFK7/nR.9bc.CFTcQDAwy0OhBSm', 'dtrump@whitehouse.gov', 2, '::1', '02/27/2018 16:47:16', '02/27/2018 16:50:48', 0, 'SqblfOKP7A'),
(21, 'Vladmir', 'vputin', '$2y$10$RuzPZsCpGcHGRpPBU8J9WOBrNG4taO/35bHpeKpHRM2i93qUB1one', 'vpoutine@gmail.com', 3, 'no', 'Not Set', 'Not set', 0, 'sPMtVlyDQb'),
(22, 'Jesse', 'jpinkman', '$2y$10$l0NveWtUT.EogLVDkU1WL.qqhGT5mQIBc2VOTWS0tydfdFpsmQY4W', 'cptn_cook@chilipowder.ca', 2, 'no', 'Not Set', 'Not set', 0, '21x5WUNSo6'),
(23, 'Walter', 'wwhite', '$2y$10$8rUMXQ1XF5o5ajIHLdnoDeCAr85XBeRJJK2pWwfdSovFBGBqFtxtS', 'walter_h_white@abq.com', 3, 'no', 'Not Set', 'Not set', 0, 'xirz8h7RlB');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
