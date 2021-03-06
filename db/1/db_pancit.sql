-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 11:37 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pancit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(2) NOT NULL,
  `admin_uname` varchar(50) NOT NULL,
  `admin_pwd` varchar(256) NOT NULL,
  `admin_aname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `admin_uname`, `admin_pwd`, `admin_aname`) VALUES
(1, 'admin', '$2y$10$HuofgNt7PUyQqD0YghczV.SEgGJSjX3FxUlZGBqTsSyEV6jG9zpPC', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pancit`
--

CREATE TABLE `tbl_pancit` (
  `p_id` int(4) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_imgLoc` varchar(256) NOT NULL,
  `p_loc` varchar(256) NOT NULL,
  `p_lat` varchar(256) NOT NULL,
  `p_lng` varchar(256) NOT NULL,
  `p_oTime` time NOT NULL,
  `p_cTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pancit`
--

INSERT INTO `tbl_pancit` (`p_id`, `p_name`, `p_imgLoc`, `p_loc`, `p_lat`, `p_lng`, `p_oTime`, `p_cTime`) VALUES
(8, 'Billy Jack\'s Panciteria', '35229039_10216418502914115_7341335539754205184_o9.jpg', 'Santiago - Tuguegarao Rd, Tuguegarao, Cagayan, Philippines', '17.6135832', '121.69990849999999', '08:00:00', '22:00:00'),
(10, 'Jomar\'s Special Batil Patung Panciteria', '39922731_958739284333983_3144450328833818624_n2.jpg', 'Gomez St, Tuguegarao, Cagayan, Philippines', '17.6140238', '121.7294296', '07:00:00', '19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pprice`
--

CREATE TABLE `tbl_pprice` (
  `pp_id` int(4) NOT NULL,
  `pp_price` varchar(5) NOT NULL,
  `pp_topps` longtext NOT NULL,
  `p_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pprice`
--

INSERT INTO `tbl_pprice` (`pp_id`, `pp_price`, `pp_topps`, `p_id`) VALUES
(7, '60', 'giniling, liver', 8),
(8, '70', 'giniling, liver, gulay, krak-krak', 8),
(9, '80', 'giniling, liver, gulay, krak-krak, karahay', 8),
(12, '90', 'chorizo, liver, giniling, karahay', 10),
(13, '80', 'chorizo, liver, giniling', 10),
(14, '70', 'chorizo, liver', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogin`
--

CREATE TABLE `tbl_userlogin` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_lvl` int(1) NOT NULL,
  `up_id` int(4) NOT NULL,
  `isApproved` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlogin`
--

INSERT INTO `tbl_userlogin` (`user_id`, `user_name`, `user_pass`, `user_lvl`, `up_id`, `isApproved`) VALUES
(1, 'admin', '$2y$10$VU/Wl3h3UE59vNDHVbW.lu/VewJDjjFY1maLPL9sxRjhtygZ1KOlu', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userprofile`
--

CREATE TABLE `tbl_userprofile` (
  `up_id` int(4) NOT NULL,
  `up_lname` varchar(256) NOT NULL,
  `up_fname` varchar(256) NOT NULL,
  `up_email` varchar(256) NOT NULL,
  `up_dateReg` datetime NOT NULL,
  `up_dateApproved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userprofile`
--

INSERT INTO `tbl_userprofile` (`up_id`, `up_lname`, `up_fname`, `up_email`, `up_dateReg`, `up_dateApproved`) VALUES
(1, 'Lozano', 'Dakila', 'xadf327@gmail.com', '2018-09-03 21:13:09', '2018-09-03 21:13:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pancit`
--
ALTER TABLE `tbl_pancit`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_pprice`
--
ALTER TABLE `tbl_pprice`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `up_id` (`up_id`);

--
-- Indexes for table `tbl_userprofile`
--
ALTER TABLE `tbl_userprofile`
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pancit`
--
ALTER TABLE `tbl_pancit`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pprice`
--
ALTER TABLE `tbl_pprice`
  MODIFY `pp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_userprofile`
--
ALTER TABLE `tbl_userprofile`
  MODIFY `up_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pprice`
--
ALTER TABLE `tbl_pprice`
  ADD CONSTRAINT `tbl_pprice_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tbl_pancit` (`p_id`);

--
-- Constraints for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  ADD CONSTRAINT `tbl_userlogin_ibfk_1` FOREIGN KEY (`up_id`) REFERENCES `tbl_userprofile` (`up_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
