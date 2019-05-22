-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 10:12 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `parkspots`
--

CREATE TABLE `parkspots` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `motorbikecount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkspots`
--

INSERT INTO `parkspots` (`id`, `name`, `status`, `motorbikecount`) VALUES
(1, 'park1', 0, 0),
(2, 'park2', 1, 0),
(3, 'park3', 1, 0),
(4, 'park4', 0, 0),
(5, 'park5', 1, 0),
(6, 'park6', 1, 0),
(7, 'park7', 1, 0),
(8, 'park8', 0, 0),
(9, 'park9', 1, 0),
(10, 'park10', 0, 0),
(11, 'park11', 0, 0),
(12, 'park12', 0, 0),
(13, 'park13', 1, 0),
(14, 'park14', 1, 0),
(15, 'park15', 1, 0),
(16, 'park16', 0, 0),
(17, 'park17', 1, 0),
(18, 'park18', 0, 0),
(19, 'park19', 0, 0),
(20, 'park20', 0, 0),
(21, 'park21', 0, 0),
(22, 'park22', 0, 0),
(23, 'park23', 0, 0),
(24, 'park24', 0, 0),
(25, 'park25', 0, 0),
(26, 'park26', 0, 0),
(27, 'park27', 0, 0),
(28, 'park28', 0, 0),
(29, 'park29', 0, 0),
(30, 'park30', 0, 0),
(31, 'park31', 0, 0),
(32, 'park32', 0, 0),
(33, 'park33', 0, 0),
(34, 'park34', 0, 0),
(35, 'park35', 0, 0),
(36, 'park36', 0, 0),
(37, 'park37', 0, 0),
(38, 'park38', 0, 0),
(39, 'park39', 0, 0),
(40, 'park40', 0, 0),
(41, 'park41', 0, 0),
(42, 'park42', 0, 0),
(43, 'park43', 0, 0),
(44, 'park44', 0, 0),
(45, 'park45', 0, 0),
(46, 'park46', 0, 0),
(47, 'park47', 0, 0),
(48, 'park48', 0, 0),
(49, 'park49', 0, 0),
(50, 'park50', 0, 0),
(51, 'park51', 0, 0),
(52, 'park52', 0, 0),
(53, 'park53', 0, 0),
(54, 'park54', 0, 0),
(55, 'park55', 0, 0),
(56, 'park56', 0, 0),
(57, 'park57', 0, 0),
(58, 'park58', 0, 0),
(59, 'park59', 0, 0),
(60, 'park60', 0, 0),
(61, 'park61', 0, 0),
(62, 'park62', 0, 0),
(63, 'park63', 0, 0),
(64, 'park64', 0, 0),
(65, 'park65', 0, 0),
(66, 'park66', 0, 0),
(67, 'park67', 0, 0),
(68, 'park68', 0, 0),
(69, 'park69', 0, 0),
(70, 'park70', 0, 0),
(71, 'park71', 0, 0),
(72, 'park72', 0, 0),
(73, 'park73', 0, 0),
(74, 'park74', 0, 0),
(75, 'park75', 0, 0),
(76, 'park76', 0, 0),
(77, 'park77', 0, 0),
(78, 'park78', 0, 0),
(79, 'park79', 0, 0),
(80, 'park80', 0, 0),
(81, 'park81', 0, 0),
(82, 'park82', 0, 0),
(83, 'park83', 0, 0),
(84, 'park84', 0, 0),
(85, 'park85', 0, 0),
(86, 'park86', 0, 0),
(87, 'park87', 0, 0),
(88, 'park88', 0, 0),
(89, 'park89', 0, 0),
(90, 'park90', 0, 0),
(91, 'park91', 0, 0),
(92, 'park92', 0, 0),
(93, 'park93', 0, 0),
(94, 'park94', 0, 0),
(95, 'park95', 0, 0),
(96, 'park96', 0, 0),
(97, 'park97', 0, 0),
(98, 'park98', 0, 0),
(99, 'park99', 0, 0),
(100, 'park100', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parkspots`
--
ALTER TABLE `parkspots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parkspots`
--
ALTER TABLE `parkspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
