-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 07:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emd`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `medicine` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `medicine`, `quantity`, `total`) VALUES
(1, 23767223, 'Acetaminophen', 1, '350.00'),
(2, 23767223, ' amoxicillin', 1, '200.00'),
(3, 44054295, 'Acetaminophen', 2, '700.00'),
(4, 44054295, ' amoxicillin', 2, '400.00'),
(5, 53338190, 'Acetaminophen', 2, '700.00'),
(6, 53338190, ' amoxicillin', 1, '200.00'),
(7, 20995957, 'oseltamivir phosphate', 1, '1000.00'),
(8, 20995957, 'Acetaminophen', 3, '1050.00'),
(9, 20995957, 'Imodium', 1, '13.50'),
(10, 20995957, 'Mefloquine', 2, '600.00'),
(11, 48352623, 'Streptomycin', 10, '100.00'),
(12, 48352623, 'zanamivir', 1, '100.00'),
(13, 48352623, 'Terbutaline', 2, '80.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
