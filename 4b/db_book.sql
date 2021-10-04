-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 05:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_tb`
--

CREATE TABLE `book_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `publication_year` int(4) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_tb`
--

INSERT INTO `book_tb` (`id`, `name`, `category_id`, `writer_id`, `publication_year`, `img`) VALUES
(7, 'Garis Waktu', 1, 1, 2016, 'gambar1.jpg'),
(8, 'Dilan', 1, 2, 2019, 'gambar2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`id`, `name`) VALUES
(1, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `writer_tb`
--

CREATE TABLE `writer_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writer_tb`
--

INSERT INTO `writer_tb` (`id`, `name`) VALUES
(1, 'Fiersa Besari'),
(2, 'Pidi Baiq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_tb`
--
ALTER TABLE `writer_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_tb`
--
ALTER TABLE `book_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `writer_tb`
--
ALTER TABLE `writer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD CONSTRAINT `book_tb_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`id`),
  ADD CONSTRAINT `book_tb_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `writer_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
