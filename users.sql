-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2016 at 11:37 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahsec_hrmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/avatar.png',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mumu J', 'Kalita', 'admin', '$2y$10$QmiQEAdkisDOrQ4a8/Ozi.igdBjdFulCyxsfn0u3aPEEksruX/igW', '1', '/img/avatar.png', 'ZpX2SEq527DkDFxnd2o7GUzkGMxt6uPkNWgSszRIhBYHYLcKpCtk2JFSsBJ2', '2016-11-07 02:08:03', '2016-11-24 04:09:41'),
(2, 'Dhruwa M', 'Kalita', 'dhruwajyoti', '$2y$10$QmiQEAdkisDOrQ4a8/Ozi.igdBjdFulCyxsfn0u3aPEEksruX/igW', '2', '/img/avatar.png', 'bDlCKYkiCck0h29kLR79N04zkl3P9LtNJFYXQL52AWZByZ7dVfOUvOfjvWpf', '2016-11-07 02:13:55', '2016-11-24 04:23:03'),
(4, 'Demo ', 'user', 'employee', '$2y$10$GDHJNTuID8BFoB.9ABasSebxNHa4gJY7ixkhXa0p2cZ5VZmyPJyGy', '5', '/img/avatar.png', 'qz3l4z5gYRO1upjLOuKmP0BKRbuKOIfalz1Vlm3NJ24iwSIsEizX3BI9G5aG', '2016-11-16 23:41:46', '2016-11-24 06:07:02'),
(6, 'Deepjyoti ', 'Kalita', 'deepjyoti', '$2y$10$u/mn4UZszMzGil2YpkTuUOOlGkWnvTIOPCNDtE0cAxw3D7krwka2q', '5', '/img/avatar.png', NULL, '2016-11-17 03:55:20', '2016-11-17 03:55:20'),
(7, 'Test', 'Demo', 'test', '$2y$10$Lu5IlcLvsQ0hHRhYir6GvOlzeiXs5w/1Y29.XjokgbEctCR22nbSG', '3', '/img/avatar.png', 'yHDjB7gRKLEEgcxC1oRpEAycFDWYe9fx4iPamy3naflfmiYlfCjsz8rlAGXX', '2016-11-17 04:17:35', '2016-11-24 05:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
