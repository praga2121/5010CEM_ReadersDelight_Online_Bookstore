-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 09:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
ALTER TABLE `products` ADD `author` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `name`;  


--
-- Dumping data for table `products`
--

UPDATE products SET author='Lucy Score' WHERE id=34;
UPDATE products SET author='Emily Henry' WHERE id=35;
UPDATE products SET author='Ali Hazelwood' WHERE id=36;
UPDATE products SET author='Tessa Bailey' WHERE id=37;
UPDATE products SET author='Taylor Jenkins Reid' WHERE id=38;
UPDATE products SET author='Ta-Nehisi Coates' WHERE id=39;
UPDATE products SET author='Madeline Miller' WHERE id=40;
UPDATE products SET author='Leigh Bardugo' WHERE id=41;
UPDATE products SET author='Erin Morgenstern' WHERE id=42;
UPDATE products SET author='Amber Sparks' WHERE id=43;
UPDATE products SET author='Maggie Shipstead' WHERE id=44;
UPDATE products SET author='Dan Brown' WHERE id=45;
UPDATE products SET author='Anthony Horowitz' WHERE id=46;
UPDATE products SET author='Dan Brown' WHERE id=47;
UPDATE products SET author='Mark Bowden' WHERE id=48;
UPDATE products SET author='Gillian Flynn' WHERE id=49;
UPDATE products SET author='James Patterson' WHERE id=50;
UPDATE products SET author='John Grisham' WHERE id=51;
UPDATE products SET author='Camilla Bruce' WHERE id=52;
UPDATE products SET author='Clay McLeod Chapman' WHERE id=53;
UPDATE products SET author='Laura Dave' WHERE id=54;
UPDATE products SET author='Alex Michaelides' WHERE id=55;
UPDATE products SET author='Colleen Hoover' WHERE id=56;
UPDATE products SET author='David Baldacci' WHERE id=57;
UPDATE products SET author='Eliza Jane Brazier' WHERE id=58;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
