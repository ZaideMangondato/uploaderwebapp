-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2019 at 10:27 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8664062_wp_326d4377135899a6fd7f17bdca445d22`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `firstname` varchar(99) NOT NULL,
  `lastname` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `phone_num` varchar(99) NOT NULL,
  `company` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`firstname`, `lastname`, `username`, `email`, `phone_num`, `company`, `pass`) VALUES
('joel', 'ragay', '20paskull', 'joelr914@gmail.com', '09267386045', 'cu', '20paskull'),
('Zaide', 'Mangondato', 'admin', 'zaide77alternative@gmail.com', '09268070114', 'none', 'itrustallah1996'),
('Zaide', 'Mangondato', 'aki', 'zaide77alternative@gmail.com', '09268070114', 'none', 'itrustallah1996'),
('Bill', 'Gates', 'billgates', 'billgates@gmail.com', '000', 'Microsoft Corporation', 'billgates'),
('dao ming', 'su', 'daomingsu', 'dao@ming.su', 'number ni?', 'tribu wakwak', 'daomingsu'),
('EJ', 'Mangondato', 'ej123', 'ej@gmail.com', '3530165464', 'none', 'ej123'),
('Loloy', 'Brits', 'loybrits', 'loloy@gmail.com', '05646684654', 'sm', 'loybrits'),
('ruth', 'mangondato', 'ruth123', 'ruth@gmail.com', '09268070114', 'deped', 'ruth123'),
('Senie', 'Mangondato', 'senie123', 'seniemangondato@gmail.com', '09185807303', 'Zaide\'s Grocers', 'senie123'),
('Zaide', 'Mangondato', 'zaide123', 'zaide77alternative@gmail.com', '09268070114', 'No Company', 'zaide123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
