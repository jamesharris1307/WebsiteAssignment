-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 02:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdesigndatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `caravan`
--

CREATE TABLE `caravan` (
  `caravanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `make` varchar(128) NOT NULL,
  `model` varchar(128) NOT NULL,
  `bodytype` varchar(255) NOT NULL,
  `fuelType` varchar(128) NOT NULL,
  `mileage` varchar(128) NOT NULL,
  `location` varchar(255) NOT NULL,
  `year` varchar(5) NOT NULL,
  `numDoors` int(2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caravan`
--

INSERT INTO `caravan` (`caravanID`, `userID`, `make`, `model`, `bodytype`, `fuelType`, `mileage`, `location`, `year`, `numDoors`, `image`) VALUES
(32, 72, 'Airstream', 'Basecamp', 'Travel Trailer', 'Gas', '6k', 'United States', '2022', 2, 'https://www.practicalcaravan.com/wp-content/uploads/2020/04/6225797-scaled-1.jpg'),
(33, 72, 'Jayco', 'Jay Flight', 'Travel Trailer', 'Electricity', '8k', 'Canada', '2023', 1, 'https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1652783970/autoexpress/2022/05/Coachman-Lusso-caravan_tsf39e.jpg'),
(34, 72, 'Winnebago', 'Minnie', 'Travel Trailer', 'Gas', '7k', 'Australia', '2021', 2, 'https://www.regalfurnishings.co.uk/wp-content/uploads/2018/11/Caravan.jpg'),
(35, 73, 'Forest River', 'Grey Wolf', 'Fifth Wheel', 'Electricity', '3k', 'United Kingdom', '2022', 3, 'https://upload.wikimedia.org/wikipedia/commons/c/c8/Caravan.jpg'),
(36, 73, 'Dutchmen', 'Aspen Trail', 'Travel Trailer', 'Electricity', '9k', 'Germany', '2023', 2, 'https://www.caravantimes.co.uk/wp-content/uploads/2021/01/cnphoto_0_0_0_0_14106431_1200.jpg'),
(37, 73, 'Keystone', 'Passport', 'Travel Trailer', 'Gas', '5k', 'France', '2024', 1, 'https://i.ytimg.com/vi/IPVV1uHlYSg/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `dateBirth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `dateBirth`, `email`, `username`, `password_hash`) VALUES
(72, 'TestUser1FirstName', 'TestUser2LastName', '2024-04-24', 'testUser@example.com', 'TestUser1', 'Secret123'),
(73, 'TestUser2FirstName', 'TestUser2LastName', '2024-04-25', 'testUser2@example.com', 'TestUser2', 'Secret123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caravan`
--
ALTER TABLE `caravan`
  ADD PRIMARY KEY (`caravanID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caravan`
--
ALTER TABLE `caravan`
  MODIFY `caravanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
