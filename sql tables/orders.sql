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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `pincode` text NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `payStatus` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`name`, `email`, `contact`, `address`, `pincode`, `totalAmount`, `payStatus`, `order_id`) VALUES
('', '', '', '', '', '550.00', 0, 17863587),
('Sanjay George', 'sanjaygeorge16@gmail.com', '9558661237', 'Svnit, Surat', '395007', '2663.50', 1, 20995957),
('', '', '', '', '', '550.00', 0, 23767223),
('', '', '', '', '', '1100.00', 0, 44054295),
('', '', '', '', '', '550.00', 0, 44243024),
('John Doe', 'john@gmail.com', '9586778823', 'Bhutan', '778988', '280.00', 1, 48352623),
('', '', '', '', '', '900.00', 0, 53338190),
('', '', '', '', '', '550.00', 0, 55674894),
('', '', '', '', '', '550.00', 0, 66908701),
('', '', '', '', '', '2200.00', 0, 67412152),
('', '', '', '', '', '1250.00', 0, 74154479),
('', '', '', '', '', '550.00', 0, 85980074),
('', '', '', '', '', '1200.00', 0, 92971602);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
