-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 03:58 PM
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
(10, 'Jomar\'s Special Batil Patung Panciteria', '39922731_958739284333983_3144450328833818624_n2.jpg', 'Gomez St, Tuguegarao, Cagayan, Philippines', '17.6140238', '121.7294296', '07:00:00', '19:30:00'),
(11, 'Jeff\'s Panciteria', '20914290_1129006110566692_6365512219928040838_n.jpg', 'Bartolome St, Tuguegarao, Cagayan, Philippines', '17.63362', '121.74267639999994', '07:00:00', '06:00:00'),
(12, 'New Life', 'sample1.jpg', 'Pan-Philippine Hwy, Peñablanca, Cagayan, Philippines', '17.637219', '121.76662980000003', '07:00:00', '18:01:00'),
(13, 'celia\'s Panciteria', 'pancit3.jpg', 'Peñablanca, Cagayan, Philippines', '17.6400946', '121.79771529999994', '07:00:00', '17:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pcomment`
--

CREATE TABLE `tbl_pcomment` (
  `pc_id` int(4) NOT NULL,
  `pc_content` longtext NOT NULL,
  `p_id` int(4) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `pc_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pcomment`
--

INSERT INTO `tbl_pcomment` (`pc_id`, `pc_content`, `p_id`, `user_name`, `pc_date`) VALUES
(3, 'test', 10, 'john', '2018-09-23 20:36:44'),
(4, 'test 2', 10, 'john', '2018-09-23 22:36:27'),
(5, 'test 3', 10, 'john', '2018-09-23 22:37:46'),
(6, 'test 4', 10, 'john', '2018-09-23 22:38:58'),
(7, 'ajax test 1', 10, 'john', '2018-09-23 23:11:51'),
(8, 'ajax test 1', 10, 'john', '2018-09-23 23:12:16'),
(9, 'ajax test 1', 10, 'john', '2018-09-23 23:12:21'),
(10, 'ajax test 2', 10, 'john', '2018-09-23 23:20:09'),
(11, 'ajax test 3', 10, 'john', '2018-09-23 23:22:28'),
(12, 'ajax test 4', 10, 'john', '2018-09-23 23:23:04'),
(13, 'ajax test 5', 10, 'john', '2018-09-23 23:23:52'),
(14, 'ajax test 6', 10, 'john', '2018-09-23 23:25:56'),
(15, 'ajax test 7', 10, 'john', '2018-09-23 23:27:30'),
(16, 'ajax test 8', 10, 'john', '2018-09-23 23:39:25'),
(17, 'ajax test 9', 10, 'john', '2018-09-24 00:37:43'),
(18, 'bill ajax test 1', 8, 'john', '2018-09-24 00:39:55'),
(19, 'ajax test 10', 10, 'john', '2018-09-24 01:01:28'),
(20, 'billy ajax 2', 8, 'john', '2018-09-24 01:04:32'),
(21, '3', 8, 'john', '2018-09-24 01:04:44'),
(22, 'billy ajax 3', 8, 'john', '2018-09-24 01:10:00'),
(23, 'billy ajax 4', 8, 'john', '2018-09-24 01:10:56'),
(24, 'billy ajax 5', 8, 'john', '2018-09-24 01:11:40'),
(25, 'naimas', 8, 'john', '2018-09-24 01:28:35'),
(26, 'another ajax comment trial', 8, 'john', '2018-09-24 02:50:44'),
(27, 'pansit', 8, 'john', '2018-09-25 14:03:23'),
(28, 'john pansit', 8, 'rocelynmira25', '2018-09-25 14:04:22'),
(29, 'need pansit buddy now', 8, 'john', '2018-09-25 14:06:00'),
(30, 'G!', 8, 'rocelynmira25', '2018-09-25 14:06:22'),
(31, 'ang alat', 8, 'nikks93c', '2018-09-25 14:13:52'),
(32, 'nakakasuya ang daming gulay!!!!', 11, 'nikks93c', '2018-09-25 14:19:49');

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
(14, '70', 'chorizo, liver', 10),
(15, '70', 'giniling, liver', 11),
(16, '80', 'chorizo, liver, giniling, karahay', 11),
(17, '80', 'giniling, liver', 12),
(18, '90', 'chorizo, liver, giniling, karahay', 12),
(19, '100', 'dila, igado, balut, isaw, puso', 12),
(20, '80', 'giniling, liver', 13),
(21, '100', 'chorizo, liver, giniling, karahay', 13);

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
(1, 'admin', '$2y$10$VU/Wl3h3UE59vNDHVbW.lu/VewJDjjFY1maLPL9sxRjhtygZ1KOlu', 1, 1, 1),
(2, 'john', '$2y$12$yOtBTkZrMc5rY3QfhF2j1OEW5oF1F/3oEoC.9dIGGRTROrqkxAoR.', 2, 2, 0),
(3, 'rocelynmira25', '$2y$12$h9ezvZ6eDUJ0vPG618J8Yelr8IX4JijiI0wpp9cT/eDoLBnnHAKs2', 2, 3, 0),
(4, 'nikks93c', '$2y$12$H3kgKHgAuXt9XUFzpd0eh.BW7Gt.Rqf1AetyvgVSXITo/fPx/Suf6', 2, 4, 0);

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
(1, 'Lozano', 'Dakila', 'xadf327@gmail.com', '2018-09-03 21:13:09', '2018-09-03 21:13:09'),
(2, 'Dayag', 'John', 'avikdayag@gmail.com', '2018-09-19 02:58:30', '0000-00-00 00:00:00'),
(3, 'Chesca', 'Mira', 'rocelyncabalza25@gmail.com', '2018-09-25 13:47:44', '0000-00-00 00:00:00'),
(4, 'collado', 'nikks', 'nikko93collado@gmail.com', '2018-09-25 14:02:19', '0000-00-00 00:00:00');

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
-- Indexes for table `tbl_pcomment`
--
ALTER TABLE `tbl_pcomment`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `tbl_pcomment_ibfk_1` (`p_id`),
  ADD KEY `user_name` (`user_name`);

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
  ADD KEY `up_id` (`up_id`),
  ADD KEY `user_name` (`user_name`);

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
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pcomment`
--
ALTER TABLE `tbl_pcomment`
  MODIFY `pc_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pprice`
--
ALTER TABLE `tbl_pprice`
  MODIFY `pp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_userlogin`
--
ALTER TABLE `tbl_userlogin`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_userprofile`
--
ALTER TABLE `tbl_userprofile`
  MODIFY `up_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pcomment`
--
ALTER TABLE `tbl_pcomment`
  ADD CONSTRAINT `tbl_pcomment_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tbl_pancit` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pcomment_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `tbl_userlogin` (`user_name`);

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
