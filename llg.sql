-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2025 at 11:42 PM
-- Server version: 8.0.39
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'Relationships'),
(2, 'Me'),
(3, 'Pets'),
(4, 'Animals'),
(5, 'Currency'),
(6, 'Food'),
(7, 'Numbers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  `account` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `hash`, `account`) VALUES
(30, 'Emikra', 'admin123', 'amanda.saterr@gmail.com', '95', 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `word_id` int NOT NULL,
  `word` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `translation` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`word_id`, `word`, `translation`) VALUES
(1, 'mama', 'mother'),
(2, 'aš', 'I'),
(3, 'tėtis', 'father'),
(4, 'sesuo', 'sister'),
(5, 'brolis', 'brother'),
(6, 'šuo', 'dog'),
(7, 'katė', 'cat (female)'),
(8, 'katinas', 'cat (male)'),
(9, 'žuvytė', 'fish'),
(10, 'triušis', 'rabbit'),
(11, 'žiurkėnas', 'hamster'),
(12, 'sūnus', 'son'),
(13, 'dukra', 'daughter'),
(14, 'mano', 'my'),
(15, 'man', 'to me'),
(16, 'man', 'for me'),
(17, 'manę', 'me'),
(18, 'dėdė', 'uncle'),
(19, 'teta', 'aunt'),
(20, 'senelė', 'grandma'),
(21, 'senelis', 'grandpa'),
(22, 'pusbrolis', 'cousin (male)'),
(23, 'pusseserė', 'cousin (female)'),
(24, 'doleris', 'dollar'),
(25, 'euras', 'euro'),
(26, 'svaras', 'pound'),
(27, 'grivina', 'hryvnia'),
(28, 'rublis', 'ruble'),
(29, 'jena', 'yen'),
(30, 'juanis', 'yuan'),
(31, 'zlotas', 'złoty'),
(32, 'vaisiai', 'fruits'),
(33, 'daržovės', 'vegetables'),
(34, 'vištiena', 'chicken'),
(35, 'kiauliena', 'pork'),
(36, 'jautiena', 'beef'),
(37, 'vienas', 'one'),
(38, 'du', 'two'),
(39, 'trys', 'three'),
(40, 'keturi', 'four'),
(41, 'penki', 'five'),
(42, 'šeši', 'six'),
(43, 'septyni', 'seven'),
(44, 'aštuoni', 'eight'),
(45, 'devyni', 'nine'),
(46, 'dešim', 'ten');

-- --------------------------------------------------------

--
-- Table structure for table `word_tags`
--

CREATE TABLE `word_tags` (
  `word_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `word_tags`
--

INSERT INTO `word_tags` (`word_id`, `tag_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(12, 1),
(13, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(2, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(6, 4),
(7, 4),
(8, 4),
(10, 4),
(11, 4),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(41, 7),
(42, 7),
(43, 7),
(44, 7),
(45, 7),
(46, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_id` (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`word_id`),
  ADD UNIQUE KEY `word_id` (`word_id`);

--
-- Indexes for table `word_tags`
--
ALTER TABLE `word_tags`
  ADD PRIMARY KEY (`word_id`,`tag_id`),
  ADD KEY `t_id` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `word_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `word_tags`
--
ALTER TABLE `word_tags`
  ADD CONSTRAINT `word_tags_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `words` (`word_id`),
  ADD CONSTRAINT `word_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
