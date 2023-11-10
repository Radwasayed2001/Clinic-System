-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 08:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` mediumtext NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `image`, `bio`, `major_id`) VALUES
(3, 'Ali', '1699568602.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 2),
(4, 'Noha', '1699568618.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 2),
(5, 'Sami', '1699568707.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 2),
(6, 'Mona', '1699568727.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 4),
(7, 'Hesham', '1699568744.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 4),
(8, 'Gamila', '1699568772.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 4),
(9, 'Asem', '1699568796.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 5),
(11, 'Aliaa', '1699569061.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 5),
(12, 'Rahol', '1699569091.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 6),
(13, 'Lami', '1699569105.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 6),
(14, 'Samir', '1699569126.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 6),
(15, 'Yash', '1699569145.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates reiciendis veniam, impedit fugit ratione tempora quisquam, rerum atque, soluta quidem cupiditate. Blanditiis cumque vitae, exercitationem fuga voluptate facere ad odit.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `name`, `image`) VALUES
(2, 'surgery', '1699538514.jpg'),
(4, 'Neurologists', '1699538652.jpg'),
(5, 'children', '1699562059.jpg'),
(6, 'Internal medicine', '1699562088.jpg'),
(7, 'Ear, Nose and Throat', '1699562771.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`) VALUES
(1, 'Admin', 'Admin@gmail.com', '123456', 1, '+201101332094');

-- --------------------------------------------------------

--
-- Table structure for table `user_doctor`
--

CREATE TABLE `user_doctor` (
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_doctor`
--
ALTER TABLE `user_doctor`
  ADD PRIMARY KEY (`user_id`,`doctor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_doctor`
--
ALTER TABLE `user_doctor`
  ADD CONSTRAINT `user_doctor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_doctor_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
