-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07.05.2015 klo 15:37
-- Palvelimen versio: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chatdb`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `status` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=6 ;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `status`, `timestamp`) VALUES
(1, 'testiasd', '$2y$10$fQlBVimj/1uUoyaAHClAuuAhM2YxyZXcvi5N51b07S9QYQGn0ga5C', 'test@test.fi', 'offline', '2015-05-07 10:15:18'),
(2, 'Mango', '$2y$10$lbV4946yv1czh.TgD8Ba4.Qymny3Dw9UEOzetHfUqC9wtO8mZSDke', 'mikael_92@msn.com', 'offline', '2015-05-07 10:15:18'),
(4, 'Jispa', '$2y$10$GbMAar3mhND6rNc.H9E3Ye4A.QpE1A7vfGn2Di6oH4QSbFBOL.Z8m', 'jispa.rannanoja@student.hamk.fi', 'offline', '2015-05-07 10:57:03'),
(5, 'KESTIZ', '$2y$10$gpVB.YXr9P2wewf0/r3kK.pbpFOm5fej5/B6u6zjzgUPdmYJpv1nm', 'jussi.papinkivi@gmail.com', 'offline', '2015-05-07 11:50:41');

-- --------------------------------------------------------

--
-- Rakenne taululle `webchat_chat`
--

CREATE TABLE IF NOT EXISTS `webchat_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(16) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ts` (`ts`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=151 ;

--
-- Vedos taulusta `webchat_chat`
--

INSERT INTO `webchat_chat` (`id`, `author`, `message`, `type`, `ts`) VALUES
(55, 'Mango', 'e sitten', '', '2015-04-23 14:28:49'),
(54, 'Mango', 'aijjaa', '', '2015-04-23 14:28:47'),
(53, 'Mango', 'rivi', '', '2015-04-23 14:28:45'),
(52, 'Mango', 'uusi', '', '2015-04-23 14:28:43'),
(50, 'Mango', 'ei uutta riviÃ¤', '', '2015-04-23 14:27:48'),
(49, 'Mango', 'tosin', '', '2015-04-23 14:27:41'),
(48, 'Mango', 'yes', '', '2015-04-23 14:27:38'),
(47, 'Mango', 'uuden rivin', '', '2015-04-23 14:27:05'),
(46, 'Mango', 'testi testaaja', '', '2015-04-23 14:26:21'),
(44, 'Mango', 'asd', '', '2015-04-23 14:25:42'),
(45, 'Mango', 'testi', '', '2015-04-23 14:26:17'),
(42, 'Anon', 'LOLLOL', '', '2015-04-23 13:58:25'),
(41, 'Mango', 'viestin', '', '2015-04-23 13:55:16'),
(40, 'Mango', 'qweqweqwe', '', '2015-04-23 13:51:37'),
(39, 'Mango', 'ok toimiiko', '', '2015-04-23 13:50:44'),
(38, 'testiasd', 'asd', '', '2015-04-23 13:50:03'),
(37, 'testiasd', 'mmhmm', '', '2015-04-23 13:48:51'),
(36, 'testiasd', 'nyt tÃ¤Ã¤ on tyhjÃ¤', '', '2015-04-23 13:48:47'),
(57, 'Mango', 'asd', '', '2015-04-23 14:30:31'),
(58, 'Mango', 'asdasd', '', '2015-04-23 14:30:33'),
(59, 'Mango', 'kato hei', '', '2015-04-23 14:30:35'),
(60, 'Mango', 'aha', '', '2015-04-23 14:30:53'),
(61, 'Mango', 'asd', '', '2015-04-23 14:32:42'),
(62, 'Mango', 'asdasd', '', '2015-04-23 14:32:43'),
(63, 'Mango', '', '', '2015-04-23 14:32:47'),
(64, 'Mango', 'asd', '', '2015-04-23 14:32:53'),
(65, 'Mango', 'tÃ¤Ã¤ ei', '', '2015-04-23 14:32:55'),
(66, 'Mango', 'vaan', '', '2015-04-23 14:32:57'),
(67, 'Mango', 'laita tÃ¤tÃ¤ alas', '', '2015-04-23 14:32:58'),
(68, 'Mango', 'kokeillaas', '', '2015-04-23 14:33:33'),
(69, 'Mango', 'tÃ¤tÃ¤', '', '2015-04-23 14:33:34'),
(70, 'testiasd', 'mitÃ¤s jos mÃ¤ kirjotan jotain', '', '2015-05-07 09:24:34'),
(71, 'testiasd', 'meneekÃ¶ se noikn', '', '2015-05-07 09:24:40'),
(72, 'testiasd', 'sdf', '', '2015-05-07 09:25:02'),
(73, 'testiasd', 'on siellÃ¤', '', '2015-05-07 09:25:03'),
(74, 'testiasd', 'sellaine funtion', '', '2015-05-07 09:25:06'),
(75, 'Mango', 'viesti 1', '', '2015-05-07 09:30:28'),
(76, 'testiasd', 'viesti 2', '', '2015-05-07 09:30:34'),
(77, 'Mango', 'sehÃ¤n jopa toimnii', '', '2015-05-07 09:30:57'),
(78, 'testiasd', 'niinpÃ¤ nÃ¤yttÃ¤s tekevÃ¤n', '', '2015-05-07 09:31:06'),
(79, 'testiasd', 'asdasd1', '', '2015-05-07 09:32:03'),
(80, 'Mango', 'asdasd2', '', '2015-05-07 09:32:03'),
(81, 'testiasd', '', '', '2015-05-07 09:32:21'),
(82, 'Mango', 'viesti', '', '2015-05-07 09:39:22'),
(83, 'Mango', 'viesti 2', '', '2015-05-07 09:40:24'),
(84, 'Mango', 'tÃ¤Ã¤ toimii', '', '2015-05-07 09:42:41'),
(85, 'Mango', 'hmm', '', '2015-05-07 09:44:20'),
(86, 'Mango', 'elikkÃ¤s', '', '2015-05-07 09:47:32'),
(87, 'Mango', 'asdasd', '', '2015-05-07 09:50:31'),
(88, 'Mango', 'jos mÃ¤ nyt', '', '2015-05-07 09:50:38'),
(89, 'Mango', 'latinasdpgn tÃ¤Ã¤n nÃ¤in', '', '2015-05-07 09:50:46'),
(90, 'Mango', 'siis niinkun', '', '2015-05-07 09:50:55'),
(91, 'Mango', 'nÃ¤in', '', '2015-05-07 09:51:01'),
(92, 'Mango', 'tÃ¤Ã¤ tulee nopeesti', '', '2015-05-07 09:51:18'),
(93, 'Mango', 'tÃ¤Ã¤ tulÃ¶ee hitaasti', '', '2015-05-07 09:51:26'),
(94, 'Mango', 'asdasdasd', '', '2015-05-07 09:53:28'),
(95, 'Mango', 'toimmiko tÃ¤Ã¤ bvielÃ¤', '', '2015-05-07 09:57:47'),
(96, 'Mango', 'hetkonen', '', '2015-05-07 09:57:53'),
(125, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'text', '2015-05-07 12:24:46'),
(99, 'Mango', 'yesses', '', '2015-05-07 10:45:48'),
(100, 'Mango', 'jÃ¶sses', '', '2015-05-07 10:45:51'),
(101, 'Mango', 'ensin tekstiÃ¤', 'text', '2015-05-07 11:24:37'),
(102, 'Mango', 'http://i.imgur.com/WlE5a2e.png', 'img', '2015-05-07 11:24:40'),
(103, 'Jispa', 'hieno kuva', 'text', '2015-05-07 11:25:06'),
(104, 'Jispa', 'oikeesti', 'text', '2015-05-07 11:27:14'),
(105, 'Mango', 'http://i.imgur.com/WlE5a2e.png', 'img', '2015-05-07 11:27:46'),
(128, 'Mango', 'asd', 'text', '2015-05-07 12:33:51'),
(124, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 12:24:15'),
(112, 'KESTIZ', 'en', 'text', '2015-05-07 11:51:31'),
(114, 'KESTIZ', 'http://i.imgur.com/LajZ2nO.png', 'img', '2015-05-07 11:52:33'),
(115, 'KESTIZ', 'http://i.imgur.com/LajZ2nO.png', 'text', '2015-05-07 11:52:42'),
(122, 'Mango', 'tekstiÃ¤', 'text', '2015-05-07 12:23:07'),
(123, 'Jispa', 'kyllÃ¤ vain', 'text', '2015-05-07 12:23:18'),
(118, 'Mango', 'http://i.imgur.com/WlE5a2e.png', 'img', '2015-05-07 12:03:38'),
(127, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 12:26:29'),
(129, 'Mango', 'asd', 'text', '2015-05-07 12:33:51'),
(130, 'Mango', 'asd', 'text', '2015-05-07 12:33:52'),
(134, 'Mango', 'asd', 'text', '2015-05-07 12:33:54'),
(137, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 12:43:47'),
(143, 'Mango', 'http://i.imgur.com/7NQkrdN.jpgasagwf', 'img', '2015-05-07 13:08:25'),
(140, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 12:47:15'),
(141, 'Mango', 'viestit', 'text', '2015-05-07 13:02:14'),
(142, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 13:07:38'),
(146, 'Mango', 'http://i.imgur.com/7NQkrdN.jpg', 'img', '2015-05-07 13:09:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
