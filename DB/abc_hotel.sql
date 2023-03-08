-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 11:16 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `benefit_id` int(10) UNSIGNED NOT NULL,
  `lunch_offer` int(11) NOT NULL,
  `renthouse_offer` int(11) NOT NULL,
  `traveling_offer` int(11) NOT NULL,
  `social_security` int(11) NOT NULL,
  `withholding_tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`benefit_id`, `lunch_offer`, `renthouse_offer`, `traveling_offer`, `social_security`, `withholding_tax`) VALUES
(1, 1500, 2000, 1500, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT 'Confirm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`booking_id`, `booking_date`, `user_id`, `room_id`, `check_in`, `check_out`, `booking_status`) VALUES
(1, '2022-06-27 03:36:26', 2, 1, '2022-07-04', '2022-07-06', 'Confirm'),
(2, '2022-06-27 15:58:56', 3, 32, '2022-07-09', '2022-07-15', 'Confirm'),
(3, '2022-06-27 16:10:17', 4, 36, '2022-07-09', '2022-07-16', 'Confirm'),
(4, '2022-06-27 16:17:04', 5, 29, '2022-07-10', '2022-07-17', 'Confirm'),
(5, '2022-06-27 16:27:38', 6, 25, '2022-07-09', '2022-07-14', 'Confirm'),
(6, '2022-06-27 16:33:16', 7, 17, '2022-07-09', '2022-07-14', 'Confirm'),
(7, '2022-06-27 16:50:17', 8, 12, '2022-07-11', '2022-07-15', 'Confirm'),
(8, '2022-06-28 15:00:16', 9, 8, '2022-07-08', '2022-07-14', 'Confirm'),
(9, '2022-06-28 15:15:15', 10, 33, '2022-07-09', '2022-07-15', 'Confirm'),
(10, '2022-06-28 15:30:16', 11, 2, '2022-07-04', '2022-07-08', 'Confirm'),
(11, '2022-06-28 15:43:20', 12, 3, '2022-07-04', '2022-07-06', 'Confirm'),
(12, '2022-06-28 15:45:06', 13, 5, '2022-07-04', '2022-07-10', 'Confirm'),
(13, '2022-06-28 16:15:00', 14, 39, '2022-07-05', '2022-07-08', 'Confirm'),
(14, '2022-06-28 16:46:02', 15, 40, '2022-07-07', '2022-07-11', 'Confirm'),
(15, '2022-06-29 03:30:15', 16, 9, '2022-07-03', '2022-07-09', 'Confirm'),
(16, '2022-06-29 03:40:20', 17, 33, '2022-07-16', '2022-07-20', 'Confirm'),
(17, '2022-06-29 03:50:13', 18, 12, '2022-07-17', '2022-07-22', 'Confirm'),
(18, '2022-06-29 04:30:15', 19, 41, '2022-07-06', '2022-07-11', 'Confirm'),
(19, '2022-06-29 05:30:30', 20, 50, '2022-07-15', '2022-07-19', 'Confirm'),
(20, '2022-06-29 06:30:15', 21, 44, '2022-07-15', '2022-07-20', 'Confirm'),
(21, '2022-06-29 07:30:08', 22, 12, '2022-07-04', '2022-07-09', 'Confirm'),
(22, '2022-06-30 02:30:30', 23, 25, '2022-07-15', '2022-07-19', 'Confirm'),
(23, '2022-06-30 02:45:15', 24, 17, '2022-07-19', '2022-07-24', 'Confirm'),
(24, '2022-06-30 03:30:15', 25, 34, '2022-07-08', '2022-07-12', 'Confirm'),
(25, '2022-06-30 03:45:18', 26, 30, '2022-07-07', '2022-07-12', 'Confirm'),
(26, '2022-06-30 04:00:12', 27, 7, '2022-07-08', '2022-07-14', 'Confirm'),
(27, '2022-06-30 04:30:07', 28, 4, '2022-07-06', '2022-07-11', 'Confirm'),
(28, '2022-06-30 04:45:15', 29, 8, '2022-07-16', '2022-07-20', 'Confirm'),
(29, '2022-07-01 06:10:10', 30, 9, '2022-07-10', '2022-07-17', 'Confirm'),
(30, '2022-07-01 07:10:10', 31, 16, '2022-07-08', '2022-07-15', 'Confirm'),
(31, '2022-07-01 08:15:15', 32, 19, '2022-07-07', '2022-07-14', 'Confirm'),
(32, '2022-07-01 09:06:10', 33, 25, '2022-07-20', '2022-07-27', 'Confirm'),
(33, '2022-07-01 10:10:10', 34, 17, '2022-07-20', '2022-07-25', 'Confirm'),
(34, '2022-07-01 11:30:06', 35, 34, '2022-07-15', '2022-07-20', 'Confirm'),
(35, '2022-07-01 12:10:10', 36, 52, '2022-07-12', '2022-07-17', 'Confirm'),
(36, '2022-07-01 18:56:36', 37, 47, '2022-07-09', '2022-07-13', 'Confirm'),
(37, '2022-07-01 18:58:30', 38, 53, '2022-07-24', '2022-07-31', 'Confirm'),
(38, '2022-07-01 19:00:41', 39, 43, '2022-07-27', '2022-07-31', 'Confirm'),
(39, '2022-07-01 19:02:21', 40, 35, '2022-07-23', '2022-07-28', 'Confirm'),
(40, '2022-07-01 19:04:23', 41, 44, '2022-07-25', '2022-07-30', 'Confirm'),
(41, '2022-07-01 19:05:43', 42, 54, '2022-07-26', '2022-07-31', 'Confirm'),
(42, '2022-07-01 19:07:51', 43, 51, '2022-07-29', '2022-08-04', 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `maids`
--

CREATE TABLE `maids` (
  `maid_id` int(10) UNSIGNED NOT NULL,
  `maid_firstname` varchar(255) NOT NULL,
  `maid_lastname` varchar(255) NOT NULL,
  `maid_birthdate` date NOT NULL,
  `maid_gender` varchar(255) NOT NULL,
  `maid_phone` varchar(255) NOT NULL,
  `maid_email` varchar(255) NOT NULL,
  `maid_salary` int(11) NOT NULL,
  `benefit_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maids`
--

INSERT INTO `maids` (`maid_id`, `maid_firstname`, `maid_lastname`, `maid_birthdate`, `maid_gender`, `maid_phone`, `maid_email`, `maid_salary`, `benefit_id`) VALUES
(1, 'Anna', 'Ray', '1983-09-20', 'female', '0899999999', 'annaray@hotmail.com', 12000, 1),
(2, 'Sarah', 'Taylor', '1988-11-17', 'female', '0888888888', 'sarahtaylor@hotmail.com', 12000, 1),
(3, 'Bella', 'Ashley', '1999-06-23', 'female', '0877777777', 'bellaashley@hotmail.com', 12000, 1),
(4, 'Maria', 'Megan', '1984-10-15', 'female', '0879855899', 'mariamegan@hotmail.com', 12000, 1),
(5, 'Jessica', 'Maria', '1997-06-10', 'female', '0814785296', 'jessica.ma@hotmail.coa', 12000, 1),
(6, 'Miranda', 'Morena', '1995-07-25', 'female', '0847080201', 'miranda.mo@hotmail.com', 12000, 1),
(7, 'Lola', 'Milagros', '1997-02-19', 'female', '0811681691', 'lola.mil@hotmail.com', 12000, 1),
(8, 'Kimberly', 'Katia', '1985-06-01', 'female', '0824566549', 'kimberly@hotmail.com', 12000, 1),
(9, 'Malena', 'Diana', '1983-05-16', 'female', '0869632585', 'malena.dia@hotmail.com', 12000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_id` int(10) UNSIGNED NOT NULL,
  `creditcard_number` varchar(255) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `expiry_month` varchar(255) NOT NULL,
  `expiry_year` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`payment_id`, `payment_date`, `booking_id`, `creditcard_number`, `holder_name`, `expiry_month`, `expiry_year`, `payment_status`) VALUES
(1, '2022-06-27 03:45:18', 1, '8523697411235852', 'Linda Logan', '12', '24', 'Paid'),
(2, '2022-06-27 16:05:18', 2, '7412589511472585', 'Alexandra Sydney', '11', '26', 'Paid'),
(3, '2022-06-27 16:15:02', 3, '9632587411236544', 'An Nguyen', '12', '26', 'Paid'),
(4, '2022-06-27 16:25:05', 4, '4561239877412586', 'Dang Tran', '10', '24', 'Paid'),
(5, '2022-06-27 16:35:35', 5, '7411478522587899', 'Hien Hoang', '12', '23', 'Paid'),
(6, '2022-06-27 16:40:38', 6, '3692581478523699', 'Le Phan', '12', '25', 'Paid'),
(7, '2022-06-27 16:55:18', 7, '2135468799631477', 'Chau Phan', '12', '24', 'Paid'),
(8, '2022-06-28 15:10:05', 8, '8523697415468888', 'Lan Pham', '11', '25', 'Paid'),
(9, '2022-06-28 15:20:10', 9, '6547893211236547', 'Lan Tran', '12', '24', 'Paid'),
(10, '2022-06-28 15:35:10', 10, '1478523699874566', 'Ping Vo', '12', '26', 'Paid'),
(11, '2022-06-28 15:48:20', 11, '5649871233215555', 'Tuyen Vo', '12', '25', 'Paid'),
(12, '2022-06-28 15:50:34', 12, '8522587411477899', 'Ping Le', '10', '25', 'Paid'),
(13, '2022-06-28 16:20:03', 13, '9874125899871455', 'Balagtas Manahan', '12', '24', 'Paid'),
(14, '2022-06-28 16:51:03', 14, '3699512478523699', 'Angelo Manahan', '10', '26', 'Paid'),
(15, '2022-06-29 03:35:12', 15, '7536987412588888', 'Baron Azul', '09', '25', 'Paid'),
(16, '2022-06-29 05:35:04', 16, '6544569873212222', 'Bayanai Andre', '09', '26', 'Paid'),
(17, '2022-06-29 03:55:07', 17, '7896541233321455', 'Alejandro Amado', '12', '26', 'Paid'),
(18, '2022-06-29 04:35:15', 18, '5639821475320458', 'Alfonso Amadeus', '08', '24', 'Paid'),
(19, '2022-06-29 05:35:30', 19, '5823697413214569', 'Emerson	Richman', '11', '25', 'Paid'),
(20, '2022-06-29 06:35:15', 20, '5467893215193755', 'Wei Zhang', '11', '25', 'Paid'),
(21, '2022-06-29 07:35:08', 21, '6547893215493755', 'Fang Wang', '11', '26', 'Paid'),
(22, '2022-06-30 02:35:30', 22, '5732159874132166', 'Bi Eun', '08', '24', 'Paid'),
(23, '2022-06-30 02:50:20', 23, '5736987410214587', 'Hyuk Eun', '08', '24', 'Paid'),
(24, '2022-06-30 03:35:50', 24, '5823574125885233', 'Emaan Raj', '12', '26', 'Paid'),
(25, '2022-06-30 03:50:17', 25, '5896325632563256', 'Evelyn Eamon', '11', '25', 'Paid'),
(26, '2022-06-30 04:05:05', 26, '6589652325412854', 'Einosuke Nakamura', '12', '25', 'Paid'),
(27, '2022-06-30 04:35:07', 27, '5874521456985523', 'Naruto Yamamoto', '12', '26', 'Paid'),
(28, '2022-06-30 04:50:02', 28, '6325874569514755', 'Zaki Watanabe', '11', '23', 'Paid'),
(29, '2022-07-01 06:15:10', 29, '6321456987753951', 'James William', '12', '24', 'Paid'),
(30, '2022-07-01 07:15:02', 30, '4587741236985233', 'Masahiro Tanaka', '11', '25', 'Paid'),
(31, '2022-07-01 08:20:15', 31, '5214785236987456', 'Enable Energy', '11', '24', 'Paid'),
(32, '2022-07-01 09:11:05', 32, '4785693256985478', 'Eastern Eddy', '12', '25', 'Paid'),
(33, '2022-07-01 10:15:10', 33, '7658932541287458', 'Erin Elland', '12', '26', 'Paid'),
(34, '2022-07-01 11:35:11', 34, '5874596521452365', 'Amber Ivane', '12', '24', 'Paid'),
(35, '2022-07-01 12:15:15', 35, '5825852369874122', 'Emma Watson', '11', '26', 'Paid'),
(36, '2022-07-01 19:00:20', 36, '5825471369852145', 'Erika Edie', '11', '25', 'Paid'),
(37, '2022-07-01 19:03:30', 37, '5254755559852145', 'Seong Eun', '10', '25', 'Paid'),
(38, '2022-07-01 19:05:50', 38, '5147523698523698', 'Haruhi Tanaka', '11', '26', 'Paid'),
(39, '2022-07-01 19:07:21', 39, '5896326986325847', 'Yuzi Lin', '11', '24', 'Paid'),
(40, '2022-07-01 19:09:15', 40, '5698547852369852', 'Binbin Lin', '10', '23', 'Paid'),
(41, '2022-07-01 19:10:39', 41, '5458741236985215', 'Weiyi Lin', '12', '25', 'Paid'),
(42, '2022-07-01 19:12:51', 42, '5247963258753357', 'Lucas Benjamin', '12', '23', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_name_id` int(10) UNSIGNED DEFAULT NULL,
  `room_type_id` int(10) UNSIGNED DEFAULT NULL,
  `room_status_id` int(10) UNSIGNED DEFAULT NULL,
  `clean_date` date NOT NULL,
  `maid_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`room_id`, `room_number`, `room_name_id`, `room_type_id`, `room_status_id`, `clean_date`, `maid_id`) VALUES
(1, 101, 1, 1, 1, '2022-06-19', 1),
(2, 102, 1, 1, 1, '2022-06-19', 1),
(3, 103, 1, 1, 1, '2022-06-19', 1),
(4, 104, 1, 1, 1, '2022-06-19', 1),
(5, 105, 1, 1, 1, '2022-06-19', 1),
(6, 106, 1, 1, 1, '2022-06-19', 1),
(7, 107, 1, 2, 1, '2022-06-19', 2),
(8, 108, 1, 2, 1, '2022-06-19', 2),
(9, 109, 1, 2, 1, '2022-06-19', 2),
(10, 110, 1, 2, 1, '2022-06-19', 2),
(11, 111, 1, 2, 1, '2022-06-19', 2),
(12, 112, 1, 2, 1, '2022-06-19', 2),
(13, 113, 1, 3, 1, '2022-06-19', 3),
(14, 114, 1, 3, 1, '2022-06-19', 3),
(15, 115, 1, 3, 1, '2022-06-19', 3),
(16, 116, 1, 3, 1, '2022-06-19', 3),
(17, 117, 1, 3, 1, '2022-06-19', 3),
(18, 118, 1, 3, 1, '2022-06-19', 3),
(19, 201, 2, 1, 1, '2022-06-19', 4),
(20, 202, 2, 1, 1, '2022-06-19', 4),
(21, 203, 2, 1, 1, '2022-06-19', 4),
(22, 204, 2, 1, 1, '2022-06-19', 4),
(23, 205, 2, 1, 1, '2022-06-19', 4),
(24, 206, 2, 1, 1, '2022-06-19', 4),
(25, 207, 2, 2, 1, '2022-06-19', 5),
(26, 208, 2, 2, 1, '2022-06-19', 5),
(27, 209, 2, 2, 1, '2022-06-19', 5),
(28, 210, 2, 2, 1, '2022-06-19', 5),
(29, 211, 2, 2, 1, '2022-06-19', 5),
(30, 212, 2, 2, 1, '2022-06-19', 5),
(31, 213, 2, 3, 1, '2022-06-19', 6),
(32, 214, 2, 3, 1, '2022-06-19', 6),
(33, 215, 2, 3, 1, '2022-06-19', 6),
(34, 216, 2, 3, 1, '2022-06-19', 6),
(35, 217, 2, 3, 1, '2022-06-19', 6),
(36, 218, 2, 3, 1, '2022-06-19', 6),
(37, 301, 3, 1, 1, '2022-06-19', 7),
(38, 302, 3, 1, 1, '2022-06-19', 7),
(39, 303, 3, 1, 1, '2022-06-19', 7),
(40, 304, 3, 1, 1, '2022-06-19', 7),
(41, 305, 3, 1, 1, '2022-06-19', 7),
(42, 306, 3, 1, 1, '2022-06-19', 7),
(43, 307, 3, 2, 1, '2022-06-19', 8),
(44, 308, 3, 2, 1, '2022-06-19', 8),
(45, 309, 3, 2, 1, '2022-06-19', 8),
(46, 310, 3, 2, 1, '2022-06-19', 8),
(47, 311, 3, 2, 1, '2022-06-19', 8),
(48, 312, 3, 2, 1, '2022-06-19', 8),
(49, 313, 3, 3, 1, '2022-06-19', 9),
(50, 314, 3, 3, 1, '2022-06-19', 9),
(51, 315, 3, 3, 1, '2022-06-19', 9),
(52, 316, 3, 3, 1, '2022-06-19', 9),
(53, 317, 3, 3, 1, '2022-06-19', 9),
(54, 318, 3, 3, 1, '2022-06-19', 9);

-- --------------------------------------------------------

--
-- Table structure for table `room_names`
--

CREATE TABLE `room_names` (
  `room_name_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_name_point` int(11) NOT NULL,
  `room_name_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_names`
--

INSERT INTO `room_names` (`room_name_id`, `room_name`, `room_name_point`, `room_name_price`) VALUES
(1, 'Superior room', 20, 1500),
(2, 'Deluxe room', 25, 2000),
(3, 'VIP room', 30, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `room_status`
--

CREATE TABLE `room_status` (
  `room_status_id` int(10) UNSIGNED NOT NULL,
  `room_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_status`
--

INSERT INTO `room_status` (`room_status_id`, `room_status_name`) VALUES
(2, 'clean up'),
(3, 'dirty'),
(1, 'ready'),
(4, 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `room_type_name` varchar(255) NOT NULL,
  `room_type_point` int(11) NOT NULL,
  `room_type_price` int(11) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `breakfast_option` varchar(255) NOT NULL,
  `smoke_option` varchar(255) NOT NULL,
  `pickup_option` varchar(255) NOT NULL,
  `refund_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `room_type_name`, `room_type_point`, `room_type_price`, `max_capacity`, `breakfast_option`, `smoke_option`, `pickup_option`, `refund_option`) VALUES
(1, 'Twin standard', 10, 1000, 2, 'No', 'No', 'No', 'No'),
(2, 'Queen standard', 15, 1500, 2, 'Yes', 'No', 'No', 'No'),
(3, 'King standard', 20, 2000, 2, 'Yes', 'Yes', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriber_id`, `user_id`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_image`, `username`, `password`, `firstname`, `lastname`, `birthdate`, `gender`, `phone_number`, `email`) VALUES
(1, 'none.png', 'admin', '123', 'Natasha', 'Scarlet', '1990-10-05', 'Female', '0812345678', 'kankanis.cha@mail.kmutt.ac.th'),
(2, 'none.png', 'linda1412', '029188827', 'Linda', 'Logan', '1994-05-24', 'Female', '0987654321', 'inc.index@hotmail.com'),
(3, 'none.png', 'mygrace', 'ruby555', 'Alexandra', 'Sydney', '1996-06-12', 'Female', '0866666666', 'kankanis.cha@hotmail.com'),
(4, 'none.png', 'nguyenan', 'nguyenan001', 'An', 'Nguyen', '1989-10-16', 'Male', '0832323232', 'nguyenan@hotmail.com'),
(5, 'none.png', 'trandang88', 'trandang', 'Dang', 'Tran', '1994-02-15', 'Male', '0821212121', 'trandang88@hotmail.com'),
(6, 'none.png', 'hoanghien55', 'hoanghien', 'Hien', 'Hoang', '1997-05-18', 'Male', '0841414141', 'hoanghien55@hotmail.com'),
(7, 'none.png', 'phanle001', 'phanle001', 'Le', 'Phan', '1995-08-11', 'Male', '0851515151', 'phanle001@hotmail.com'),
(8, 'none.png', 'phanchau', 'phanchau', 'Chau', 'Phan', '1996-07-11', 'Female', '0875465456', 'phanchau@hotmail.com'),
(9, 'none.png', 'phamlan', 'phamlan', 'Lan', 'Pham', '1995-05-15', 'Female', '0847899878', 'phamlan@hotmail.com'),
(10, 'none.png', 'tranlan', 'tranlan', 'Lan', 'Tran', '1992-09-21', 'Female', '0879898989', 'tranlan@hotmail.com'),
(11, 'none.png', 'voping', 'voping', 'Ping', 'Vo', '1989-04-21', 'Female', '0811010101', 'voping@hotmail.com'),
(12, 'none.png', 'votuyen', 'votuyen', 'Tuyen', 'Vo', '1997-06-18', 'Female', '0896325871', 'votuyen@hotmail.com'),
(13, 'none.png', 'leping', 'leping', 'Ping', 'Le', '1990-05-24', 'Female', '0856969696', 'leping@hotmail.com'),
(14, 'none.png', 'balagtasmanahan', 'balagtasmanahan', 'Balagtas', 'Manahan', '1994-10-11', 'Male', '0845614444', 'balagtas@hotmail.com'),
(15, 'none.png', 'angelo', 'angelo', 'Angelo', 'Manahan', '1995-07-12', 'Male', '0896336996', 'angelo@hotmail.com'),
(16, 'none.png', 'baronazul', 'baronazul', 'Baron', 'Azul', '1996-06-11', 'Male', '0869325874', 'baronazul@hotmail.com'),
(17, 'none.png', 'bayanaiandre', 'bayanaiandre', 'Bayanai', 'Andre', '1995-10-08', 'Male', '0847080002', 'bayanaiandre@hotmail.com'),
(18, 'none.png', 'alejandro', 'alejandro', 'Alejandro', 'Amado', '1990-05-15', 'Male', '0834567890', 'alejandro@hotmail.com'),
(19, 'none.png', 'alfonso', 'alfonso', 'Alfonso', 'Amadeus', '1989-07-20', 'Male', '0878989898', 'alfonso@hotmail.com'),
(20, 'none.png', 'emerson91', '12345678', 'Emerson', 'Richman', '1991-10-29', 'Male', '0811111111', 'emerson91@hotmail.com'),
(21, 'none.png', 'zhangwei', 'zhangwei', 'Wei', 'Zhang', '1996-01-15', 'Male', '0829060788', 'zhangwei@hotmail.com'),
(22, 'none.png', 'wangfang', 'wangfang', 'Fang', 'Wang', '1995-06-12', 'Female', '0872682685', 'wangfang@hotmail.com'),
(23, 'none.png', 'eunbi1991', '12345678', 'Bi', 'Eun', '1991-11-14', 'Female', '0854563699', 'eunbi1991@hotmail.com'),
(24, 'none.png', 'eunhyuk88', 'eunhyuk88', 'Hyuk', 'Eun', '1998-09-29', 'Male', '0811233456', 'eunhyuk88@hotmail.com'),
(25, 'none.png', 'emaan555', '55555555', 'Emaan', 'Raj', '1988-05-02', 'Male', '0857412589', 'emaan555@hotmail.com'),
(26, 'none.png', 'evelyn1412', 'evelyn1412', 'Evelyn', 'Eamon', '1997-02-03', 'Female', '0827412589', 'evelyn.ea@hotmail.com'),
(27, 'none.png', 'einosuke55', 'einosuke55', 'Einosuke', 'Nakamura', '1997-06-30', 'Male', '0825466547', 'einosuke.nak@hotmail.com'),
(28, 'none.png', 'naruto888', 'naruto888', 'Naruto', 'Yamamoto', '2000-01-01', 'Male', '0857412586', 'naruto.yama@hotmail.com'),
(29, 'none.png', 'zakijang', 'zaki1412', 'Zaki', 'Watanabe', '1999-06-27', 'Female', '0814756982', 'zakijang@gmail.com'),
(30, 'none.png', 'jameswill', 'jameswill55', 'James', 'William', '1999-03-01', 'Male', '0854123698', 'jameswill@hotmail.com'),
(31, 'none.png', 'tanakakk', 'tanaka55', 'Masahiro', 'Tanaka', '1999-07-01', 'Male', '0833333333', 'mas.tana@hotmail.com'),
(32, 'none.png', 'enable99', 'enable99', 'Enable', 'Energy', '1998-07-06', 'Female', '0822564714', 'enable.en@hotmail.com'),
(33, 'none.png', 'easterter', 'easterter88', 'Easter', 'Eddy', '1994-02-06', 'Male', '0822222222', 'easter.ed@hotmail.com'),
(34, 'none.png', 'erin001', 'erin001', 'Erin', 'Elland', '1992-07-30', 'Female', '0824708000', 'erin001@hotmail.com'),
(35, 'none.png', 'amberjang', 'amber555', 'Amber', 'Ivane', '1991-07-06', 'Female', '0815555555', 'amber.ivane@hotmail.com'),
(36, 'none.png', 'emmawatson', 'watsonshop', 'Emma', 'Watson', '1997-05-26', 'Female', '0856666666', 'emmawatson@hotmail.com'),
(37, 'none.png', 'erikaedie', 'erikaedie', 'Erika', 'Edie', '1989-10-24', 'Female', '0874444444', 'erikaedie@hotmail.com'),
(38, 'none.png', 'eunseong001', 'eunseong', 'Seong', 'Eun', '1997-05-19', 'Female', '0869999999', 'eunseong001@hotmail.com'),
(39, 'none.png', 'haruhi999', 'haruhi999', 'Haruhi', 'Tanaka', '1998-02-28', 'Female', '0853333333', 'haruhi999@hotmail.com'),
(40, 'none.png', 'linyuzi007', 'linyuzi007', 'Yuzi', 'Lin', '1993-06-15', 'Male', '0851111111', 'linyuzi007@hotmail.com'),
(41, 'none.png', 'linbinbinjang', 'linbinbin', 'Binbin', 'Lin', '1995-07-10', 'Male', '0875757575', 'linbinbinjang@hotmail.com'),
(42, 'none.png', 'linweiyi88', 'linweiyi', 'Weiyi', 'Lin', '1997-02-28', 'Male', '0854789321', 'linweiyi88@hotmail.com'),
(43, 'none.png', 'lucasbenjamin', 'lucasbenjamin', 'Lucas', 'Benjamin', '1995-07-19', 'Male', '0869333333', 'lucasbenjamin@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`benefit_id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_list_fk_1` (`user_id`),
  ADD KEY `booking_list_fk_2` (`room_id`);

--
-- Indexes for table `maids`
--
ALTER TABLE `maids`
  ADD PRIMARY KEY (`maid_id`),
  ADD UNIQUE KEY `maids_uk_1` (`maid_phone`),
  ADD UNIQUE KEY `maids_uk_2` (`maid_email`),
  ADD KEY `maids_fk_1` (`benefit_id`);

--
-- Indexes for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `payment_list_uk_1` (`booking_id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_list_uk_1` (`room_number`),
  ADD KEY `room_list_fk_1` (`room_name_id`),
  ADD KEY `room_list_fk_2` (`room_type_id`),
  ADD KEY `room_list_fk_3` (`room_status_id`),
  ADD KEY `room_list_fk_4` (`maid_id`);

--
-- Indexes for table `room_names`
--
ALTER TABLE `room_names`
  ADD PRIMARY KEY (`room_name_id`),
  ADD UNIQUE KEY `room_names_uk_1` (`room_name`);

--
-- Indexes for table `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`room_status_id`),
  ADD UNIQUE KEY `room_status_uk_1` (`room_status_name`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`room_type_id`),
  ADD UNIQUE KEY `room_types_uk_1` (`room_type_name`) USING BTREE;

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `subscribers_uk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_uk_1` (`username`),
  ADD UNIQUE KEY `users_uk_2` (`phone_number`),
  ADD UNIQUE KEY `users_uk_3` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `benefit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `maids`
--
ALTER TABLE `maids`
  MODIFY `maid_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `room_names`
--
ALTER TABLE `room_names`
  MODIFY `room_name_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_status`
--
ALTER TABLE `room_status`
  MODIFY `room_status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `room_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriber_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `booking_list_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_list_fk_2` FOREIGN KEY (`room_id`) REFERENCES `room_list` (`room_id`) ON DELETE CASCADE;

--
-- Constraints for table `maids`
--
ALTER TABLE `maids`
  ADD CONSTRAINT `maids_fk_1` FOREIGN KEY (`benefit_id`) REFERENCES `benefits` (`benefit_id`) ON DELETE SET NULL;

--
-- Constraints for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD CONSTRAINT `payment_list_fk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_list` (`booking_id`) ON DELETE CASCADE;

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `room_list_fk_1` FOREIGN KEY (`room_name_id`) REFERENCES `room_names` (`room_name_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `room_list_fk_2` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`room_type_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `room_list_fk_3` FOREIGN KEY (`room_status_id`) REFERENCES `room_status` (`room_status_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `room_list_fk_4` FOREIGN KEY (`maid_id`) REFERENCES `maids` (`maid_id`) ON DELETE SET NULL;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
