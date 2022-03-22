-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 01:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_task_imran`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `timestamp`) VALUES
(1, 'Product1', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 12:15:40'),
(2, 'Product2', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 11:51:35'),
(3, 'Product3', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 11:51:37'),
(4, 'Product4', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 11:51:39'),
(5, 'Product5', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 11:51:41'),
(6, 'Product6', '128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor', 'https://i.imgur.com/KFojDGa.jpg', 1, '2022-03-22 11:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `created_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `status`, `is_verified`, `is_deleted`) VALUES
(1, 'vaibhav', 'vaibhavsharma3070@gmail.com', '$2y$10$oGd0cXKwmB/alwgEAoWJ5uGQuxmx3j8dC3RZATPrtOpewJ6NRfOES', 2, NULL, 1, 0, 0),
(2, 'Admin', 'admin@gmail.com', '$2y$10$oGd0cXKwmB/alwgEAoWJ5uGQuxmx3j8dC3RZATPrtOpewJ6NRfOES', 1, '2022-03-17 12:18:43', 1, 0, 0),
(3, 'test', 'test@gmail.com', '$2y$10$GCI2IDa/CztxVuyY5C3ime1bNluK92oZx7HlzNYvSlAf9ffxqFO26', 2, NULL, 1, 0, 0),
(4, 'Test User2', 'test2@gmail.com', '$2y$10$BCM4rbEfUnCZgBJbXmMYaOyJTHkd2a9y2cGfl8L/MxYAWO8AdF.oG', 2, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `user_id`, `product_id`, `quantity`, `price`, `added_on`) VALUES
(1, 3, 1, 12, 123, '2022-03-22 06:07:11'),
(2, 3, 5, 3, 432, '2022-03-22 06:14:09'),
(6, 1, 1, 12, 2000, '2022-03-22 06:35:09'),
(7, 1, 6, 3, 300, '2022-03-22 06:35:27'),
(8, 1, 3, 2, 100, '2022-03-22 12:10:41'),
(9, 1, 5, 2, 12, '2022-03-22 12:18:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
