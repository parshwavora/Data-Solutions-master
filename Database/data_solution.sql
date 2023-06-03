-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 06:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login_ip` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_login_time`, `last_login_ip`) VALUES
(1, 'Nimit', 'nimitkansagra@outlook.com', '$2y$10$fV0YpilCs0sUiSHWsLW5HOCaw9fvBV25wD2qmWcxU4mtbqcv7kFRa', '2020-06-18 05:15:39', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dvr`
--

CREATE TABLE `dvr` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 2000,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_login`
--

CREATE TABLE `failed_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harddisk`
--

CREATE TABLE `harddisk` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `serial_no` varchar(64) NOT NULL,
  `firmware_no` varchar(64) NOT NULL,
  `wwn_no` varchar(64) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ssd_type` varchar(3) NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 2000,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `model_no` varchar(64) NOT NULL,
  `with_adapter` tinyint(4) NOT NULL,
  `with_battery` tinyint(4) NOT NULL,
  `with_harddisk` tinyint(4) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 1500,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `memorycard`
--

CREATE TABLE `memorycard` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 2000,
  `problem` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `with_ram` tinyint(4) NOT NULL,
  `with_cpu` tinyint(4) NOT NULL,
  `with_fan` tinyint(4) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 350,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendrive`
--

CREATE TABLE `pendrive` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL DEFAULT 2000,
  `status` text NOT NULL DEFAULT 'Waiting for action',
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Waiting for action'),
(2, 'In progress'),
(3, 'Recovery completed'),
(4, 'Remote session completed'),
(5, 'In transit'),
(6, 'Data delivered'),
(7, 'Rejected'),
(8, 'Closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dvr`
--
ALTER TABLE `dvr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `failed_login`
--
ALTER TABLE `failed_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `harddisk`
--
ALTER TABLE `harddisk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `memorycard`
--
ALTER TABLE `memorycard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pendrive`
--
ALTER TABLE `pendrive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dvr`
--
ALTER TABLE `dvr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_login`
--
ALTER TABLE `failed_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harddisk`
--
ALTER TABLE `harddisk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memorycard`
--
ALTER TABLE `memorycard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendrive`
--
ALTER TABLE `pendrive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dvr`
--
ALTER TABLE `dvr`
  ADD CONSTRAINT `dvr_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `failed_login`
--
ALTER TABLE `failed_login`
  ADD CONSTRAINT `failed_login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `admin` (`email`);

--
-- Constraints for table `harddisk`
--
ALTER TABLE `harddisk`
  ADD CONSTRAINT `harddisk_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `memorycard`
--
ALTER TABLE `memorycard`
  ADD CONSTRAINT `memorycard_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `pendrive`
--
ALTER TABLE `pendrive`
  ADD CONSTRAINT `pendrive_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
