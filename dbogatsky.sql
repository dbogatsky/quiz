-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.13 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных dbogatsky
DROP DATABASE IF EXISTS `dbogatsky`;
CREATE DATABASE IF NOT EXISTS `dbogatsky` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbogatsky`;


-- Дамп структуры для таблица dbogatsky.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `is_right` tinyint(1) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_id_idx` (`question_id`),
  CONSTRAINT `question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.answers: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.contact: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `name`, `email`, `comment`, `created_on`, `deleted`) VALUES
	(1, 'dsadadas', 'dsdas@mail.ru', 'dsadas', '2013-10-26 08:54:32', 0),
	(2, 'dsadadas', 'dsdas@mail.ru', 'dsadas', '2013-10-26 08:55:28', 0),
	(3, 'sfsf', '32@mail.ru', 'dasdasds', '2013-10-26 08:55:54', 0),
	(4, 'dasdasda', 'eqwe@mail.ru', 'fsfsdfsd', '2013-10-26 08:57:55', 0),
	(5, 'dasdasda', 'eqwe@mail.ru', 'fsfsdfsd', '2013-10-26 09:01:21', 0),
	(6, 'fsdfsdfsd', 'fsfs@mail.ru', 'dfsfsdfsdf', '2013-10-26 09:26:33', 0);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.games
DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` enum('football_quiz') NOT NULL DEFAULT 'football_quiz',
  `topic_id` int(10) unsigned NOT NULL,
  `question_amount` int(2) unsigned NOT NULL DEFAULT '1',
  `player_id` int(11) unsigned NOT NULL,
  `is_winner` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stoped_on` datetime DEFAULT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `player_id_idx` (`player_id`),
  KEY `topic_id_idx` (`topic_id`),
  CONSTRAINT `player_id` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.games: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` (`id`, `name`, `topic_id`, `question_amount`, `player_id`, `is_winner`, `created_on`, `stoped_on`, `deleted`) VALUES
	(1, 'football_quiz', 3, 1, 7, 0, '2013-10-31 23:41:22', NULL, 0),
	(2, 'football_quiz', 3, 1, 7, 0, '2013-10-31 23:45:01', NULL, 0),
	(3, 'football_quiz', 3, 1, 7, 0, '2013-10-31 23:45:44', NULL, 0),
	(4, 'football_quiz', 3, 1, 7, 0, '2013-10-31 23:46:46', NULL, 0),
	(5, 'football_quiz', 2, 1, 7, 0, '2013-10-31 23:49:04', NULL, 0),
	(6, 'football_quiz', 2, 1, 7, 0, '2013-11-01 21:43:36', NULL, 0);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.game_statistics
DROP TABLE IF EXISTS `game_statistics`;
CREATE TABLE IF NOT EXISTS `game_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `answer_id` int(10) unsigned NOT NULL,
  `spent_time` int(3) unsigned NOT NULL COMMENT 'spent_time - in sec',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `game_id_idx` (`game_id`),
  KEY `question_id_idx` (`question_id`),
  KEY `answer_id_idx` (`answer_id`),
  CONSTRAINT `answer_id` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `question_id_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.game_statistics: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `game_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_statistics` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `friendly_url` varchar(45) NOT NULL,
  `title_en` varchar(45) NOT NULL,
  `title_ru` varchar(45) NOT NULL,
  `text_en` longtext NOT NULL,
  `text_ru` longtext NOT NULL,
  `key_words_en` varchar(45) NOT NULL,
  `meta_title_en` varchar(45) NOT NULL,
  `key_words_ru` varchar(45) NOT NULL,
  `meta_title_ru` varchar(45) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.pages: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `friendly_url`, `title_en`, `title_ru`, `text_en`, `text_ru`, `key_words_en`, `meta_title_en`, `key_words_ru`, `meta_title_ru`, `created_on`, `deleted`) VALUES
	(1, 'home', 'Home page', '', '<h3>This is index view!</h3>', '', 'Web development', 'Web development', '', '', '2013-10-22 22:38:30', 0),
	(2, 'game', 'Game page', 'Игра', '<h3>Play Game</h3> Vasya', 'Привет. я Вася.das ad ad a', 'Footbal quiz', 'Footbal quiz', 'Текст', 'Текст', '2013-10-24 00:13:06', 0),
	(3, 'profile', 'Profile', '', '<h3>My Profile page</h3> <p>Please select one of the points.</p>', '', 'Profile', 'Profile', '', '', '2013-10-24 01:59:39', 0),
	(4, 'technologies', 'Technologies', '', '<h3>Technologies</h3> <p>I know a lot of technologies.</p>', '', 'Technologies', 'Technologies', '', '', '2013-10-24 02:01:58', 0),
	(5, 'projects', 'Projects', 'asdasdasd', '<h3>\r\n	Projects</h3>\r\n<p>\r\n	I had a lot of projects.</p>\r\n', '<p>\r\n	Dllo</p>\r\n', 'Projects', 'Projects', 'dasasddsa', 'dasdsa', '2013-10-24 02:01:58', 0),
	(6, 'about', 'Ablout me', '', '<h3>About me</h3> <p>There is some info about me and my life.</p>\r\ndasdsadas\r\ndas\r\n\r\nвы\r\nв\r\nas\r\nв\r\nsaasd', '', 'Ablout me', 'Ablout me', '', '', '2013-10-24 02:01:58', 0),
	(10, 'new', 'new', 'new', 'dasfsdfsdfsd', 'dadasdasd', 'new', 'new', 'new', 'new', '2013-10-27 21:28:51', 1),
	(11, 'new', 'new', 'new', 'dasfsdfsdfsd', 'dadasdasd', 'new', 'new', 'new', 'new', '2013-10-27 21:29:20', 1),
	(12, 'hi', 'fsdfsdf', 'fsdf', 'dsfdsfsd', 'fsdfsd', 'fsd', 'fds', 'fsd', 'fdsfsd', '2013-10-27 21:29:48', 1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.players
DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `games_amount` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.players: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` (`id`, `email`, `name`, `games_amount`, `created_on`, `deleted`) VALUES
	(2, 'dsfsdf@gmail.com', 'ffsf', 0, '2013-10-31 01:08:39', 0),
	(3, 'dsf@gmail.com', 'ffsf', 0, '2013-10-31 01:08:48', 0),
	(4, 'df@gmail.com', 'ffsf', 0, '2013-10-31 01:09:42', 0),
	(5, 'dsaddf@gmail.com', 'ffsf', 0, '2013-10-31 01:10:34', 0),
	(6, 'eqeq@gmail.com', 'ffsf', 0, '2013-10-31 01:11:28', 0),
	(7, 'dbogatsky@gmail.com', 'Dmitry', 0, '2013-10-31 01:16:21', 0),
	(8, 'toto@mail.ru', 'dasd', 0, '2013-10-31 01:57:19', 0),
	(9, 'tes@mail.ru', 'Вася', 0, '2013-10-31 02:12:44', 0);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.player_questions
DROP TABLE IF EXISTS `player_questions`;
CREATE TABLE IF NOT EXISTS `player_questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.player_questions: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `player_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_questions` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.priority
DROP TABLE IF EXISTS `priority`;
CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `question_numbers` varchar(6) NOT NULL,
  `time_limit` int(3) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.priority: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `priority` DISABLE KEYS */;
INSERT INTO `priority` (`id`, `name`, `question_numbers`, `time_limit`, `created_on`, `deleted`) VALUES
	(1, 'low', '1-5', 120, '2013-11-01 22:40:08', 0),
	(2, 'medium', '6-10', 240, '2013-11-01 22:40:08', 0),
	(3, 'high', '11-13', 300, '2013-11-01 22:40:08', 0),
	(4, 'super', '14-15', 300, '2013-11-01 22:40:08', 0);
/*!40000 ALTER TABLE `priority` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_en` text NOT NULL,
  `text_ru` text NOT NULL,
  `priority_id` int(10) unsigned NOT NULL,
  `asked_amount` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `priority_id_idx` (`priority_id`),
  CONSTRAINT `priority_id` FOREIGN KEY (`id`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.questions: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `text_en`, `text_ru`, `priority_id`, `asked_amount`, `created_on`, `deleted`) VALUES
	(1, 'What is football?', 'Что такое футбол?', 1, 0, '2013-11-01 22:49:20', 0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.question_topics
DROP TABLE IF EXISTS `question_topics`;
CREATE TABLE IF NOT EXISTS `question_topics` (
  `question_id` int(10) unsigned NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_id`,`topic_id`),
  KEY `topic_id_idx` (`topic_id`),
  KEY `question_id_idx` (`question_id`),
  CONSTRAINT `question_id_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `topic_id_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.question_topics: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `question_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_topics` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.topics
DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.topics: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `name`, `created_on`, `deleted`) VALUES
	(1, 'England', '2013-10-31 23:22:54', 0),
	(2, 'Russian', '2013-10-31 23:22:54', 0),
	(3, 'Italian', '2013-10-31 23:22:54', 0),
	(4, 'General', '2013-10-31 23:22:54', 0);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;


-- Дамп структуры для таблица dbogatsky.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbogatsky.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_on`, `deleted`) VALUES
	(1, 'Dmitry', 'dbogatsky@gmail.com', '5a3afc149c0fd79612fb968325d79332ee230fd5', 1, '2013-10-29 00:08:28', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
