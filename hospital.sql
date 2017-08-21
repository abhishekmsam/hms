-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 01:57 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `lname`, `address`, `dob`, `gender`, `designation`, `doj`, `contact`, `email`, `specialisation`, `password`, `status`) VALUES
(1, 'Parvathy', 'R Krishnan', 'Edathala North PO', '1996-10-28', 'female', 'receptionist', '2001-10-28', '9495661468', 'paru@gmail.com', 'Gastro', 'test', 'active'),
(2, 'Sangeeth', 'Nandakumar', 'Edathala North PO', '1996-10-28', 'male', 'doctor', '2001-10-28', '9495661468', 'sangi@gmail.com', 'ENT', 'test', 'active'),
(3, 'Abishek', 'M S', 'Edathala North PO', '1996-10-28', 'male', 'pharmasist', '2001-10-28', '9495661468', 'bahu@gmail.com', 'Physitian', 'test', 'active'),
(4, 'Naveen', 'Jose', 'Edathala North PO', '1996-10-28', 'male', 'admin', '2001-10-28', '9495661468', 'jose@gmail.com', 'Physitian', 'test', 'active'),
(8, 'Amrutha', 'Sudhakaran', 'Munnar', '28-10-1996', 'female', 'nurse', '29-10-1996', '9495661468', 'ammu@gmail.com', 'Gynacology', 'test', 'active'),
(10, 'Afnan', 'Ashraf', 'Aluva', '28/10/1996', 'male', 'admin', '29/10/1996', '9495661468', 'afnan@gmail.com', 'physitian', 'test', 'active'),
(21, 'Navaneeth', 'Nandakumar', 'Chithramalika, Edathala North PO Aluva', '29/9/3', 'male', 'doctor', '29/9/3', '9495661468', 'navu@gmail.com', 'physitian', 'test', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `name` varchar(25) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`name`, `value`) VALUES
('app_name', 'Hospital Management System'),
('app_version', 'v1.0.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
