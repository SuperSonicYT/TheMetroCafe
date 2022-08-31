-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2022 at 03:46 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15976475_themetrocafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_items` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_items`) VALUES
(1, 'Breakfast', 4),
(2, 'Entrees', 0),
(3, 'Sides', 0),
(4, 'Deserts', 0),
(5, 'Beverages', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `colorcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_id`, `dish_name`, `category`, `description`, `price`, `colorcode`) VALUES
(101, ' The Full Monty Breakfast', 'Breakfast', 'The heart of the full breakfast is chicken patty, fried eggs, sausages(also called bangers), mini taters, toasted butter bun infused with hot sauce.', 179, 'red'),
(102, 'All American Breakfast', 'Breakfast', 'A breakfast that includes most or all of the following: one egg\\n(fried), sausages, toasted butter bread, pancakes with syrup, and more.', 189, 'red'),
(103, 'Breakfast Burrito', 'Breakfast', 'Breakfast Burrito is sometimes referred to as a breakfast wrap outside of the\\nAmerican ... Course is infused with chicken patty, fried eggs, mini taters, tortilla. Rise and Shine.', 139, 'red'),
(104, 'Fresh Coleslaw Sandwich', 'Breakfast', 'A comfort veg sandwich loaded with cabbage, carrots layered between delicious brown-bread slices. Enjoy this anytime of the day.\r\n\r\n', 85, 'green'),
(100023, 'Biryani', 'Entrees', 'description\r\ndescription\r\ndescriptiondescription\r\ndescription\r\n', 200, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `name`, `password`) VALUES
(10000, 'akash98', 'Akash Soni', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dish_id`),
  ADD UNIQUE KEY `dish_name` (`dish_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
