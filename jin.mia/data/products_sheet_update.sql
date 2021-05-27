-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2021 at 02:58 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mia_wnm608`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(13) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(64) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `quantity` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `image`, `date_create`, `date_modify`, `quantity`) VALUES
(1, 'Deep Hydration Moisturizer', 'Smooth & Softens', 'skincare', 45.00, 'img/product1.jpg', '2021-04-19 22:37:42', '2021-04-19 22:37:42', '100'),
(2, 'Green Tea Skincare Set', 'Value of $168', 'skincare', 119.00, 'img/product2.jpg', '2021-04-19 22:43:29', '2021-04-19 22:43:29', '200'),
(15, 'Honey  Face Mask', 'Calm your skin', 'skincare', 30.00, 'img/product5.jpg', '2021-05-19 17:14:33', '2021-05-21 20:46:59', '300'),
(4, 'Black Tea Face Oil', 'Brighten your skin', 'skincare', 30.00, 'img/product4.jpg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '400'),
(5, 'Daisy Face Oil', 'Moister your skin', 'skincare', 30.00, 'img/product5.jpg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '500'),
(6, 'Butter Sleeping Mask', 'Calm your skin', 'skincare', 30.00, 'img/product6.jpg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '600'),
(7, 'Volcanic Mud Face Mask', 'Clean your skin', 'skincare', 30.00, 'img/product7.jpg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '800'),
(8, 'Brown Sugar Sleeping Mask', 'Recover skin overnight', 'skincare', 30.00, 'img/product8.jpg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '700'),
(9, 'Olive Oil Eye Serum', 'Minimize eye bags', 'eyecare', 109.00, 'img/product9.jpeg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '900'),
(10, 'Orange Eye Serum', 'Nourish & firm', 'eyecare', 69.00, 'img/product10.png', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '600'),
(11, 'Honey & Oat Eye Serum', 'Reduce wrinkles & dark circles', 'eyecare', 69.00, 'img/product11.jpeg', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '200'),
(12, 'Cucumber Eye Serum', 'Hydrate, quench & cool', 'eyecare', 59.00, 'img/product12.png', '2021-04-19 22:50:25', '2021-04-19 22:50:25', '500'),
(16, 'Aloe Clean Set', 'Hydrate & balance', 'skincare', 99.00, 'img/product13.jpg', '2021-05-27 14:51:28', '2021-05-27 14:51:55', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
