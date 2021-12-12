-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thekolaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`emp_id`) VALUES
('ACC-000'),
('ACC-001');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emp_id`) VALUES
('ADM-000');

-- --------------------------------------------------------

--
-- Table structure for table `advance_request`
--

CREATE TABLE `advance_request` (
  `request_id` int(11) NOT NULL,
  `amount_rs` decimal(11,0) NOT NULL,
  `payment_day` date DEFAULT current_timestamp(),
  `acc_id` varchar(11) NOT NULL,
  `agent_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advance_request`
--

INSERT INTO `advance_request` (`request_id`, `amount_rs`, `payment_day`, `acc_id`, `agent_id`) VALUES
(1, '4000', '2021-10-27', 'ACC-000', 'AGN-000');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `emp_id` varchar(11) NOT NULL,
  `route_no` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`emp_id`, `route_no`, `availability`) VALUES
('AGN-000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(11) NOT NULL,
  `buyer_id` varchar(11) NOT NULL,
  `sold_price` decimal(11,0) NOT NULL,
  `sold_amount` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`date`, `product_id`, `buyer_id`, `sold_price`, `sold_amount`, `emp_id`) VALUES
('2021-10-09 00:00:00', 'P001', 'B-000', '120', '1000', 'PM-000'),
('2021-10-09 21:25:35', 'P001', 'B-000', '120', '450', 'PM-000'),
('2021-10-20 09:05:09', 'P004', 'B-008', '23', '100', 'PM-000'),
('2021-10-20 09:05:22', 'P004', 'B-007', '453', '100', 'PM-000'),
('2021-10-20 09:21:06', 'P006', 'B-001', '45', '1000', 'PM-000'),
('2021-10-20 09:31:54', 'P005', 'B-000', '4', '4', 'PM-000'),
('2021-10-21 07:07:32', 'P004', 'B-007', '67', '999', 'PM-000'),
('2021-10-21 07:07:46', 'P006', 'B-000', '98', '100', 'PM-000'),
('2021-10-21 07:07:54', 'P007', 'B-004', '232', '10054', 'PM-000'),
('2021-10-21 07:08:13', 'P008', 'B-003', '45', '567', 'PM-000'),
('2021-10-21 07:08:37', 'P008', 'B-006', '6765', '4', 'PM-000'),
('2021-10-22 10:46:26', 'P009', 'B-004', '98', '100', 'PM-000'),
('2021-10-23 03:53:30', 'P005', 'B-000', '232', '657', 'PM-000'),
('2021-10-23 05:05:38', 'P001', 'B-001', '12', '2500', 'PM-000'),
('2021-10-24 04:00:09', 'P005', 'B-005', '232', '100', 'PM-000'),
('2021-10-24 04:32:28', 'P006', 'B-005', '67', '100', 'PM-000'),
('2021-10-24 12:51:12', 'P006', 'B-003', '98', '100445', 'PM-000'),
('2021-10-24 12:52:27', 'P005', 'B-006', '46', '100', 'PM-000'),
('2021-10-25 10:16:29', 'P005', 'B-006', '45', '100', 'PM-000'),
('2021-10-25 10:22:00', 'P006', 'B-003', '45', '100', 'PM-000'),
('2021-10-25 10:28:16', 'P004', 'B-006', '5', '1100', 'PM-000'),
('2021-10-25 10:53:38', 'P006', 'B-005', '35', '354', 'PM-000'),
('2021-10-25 11:27:54', 'P005', 'B-003', '35', '100', 'PM-000'),
('2021-10-26 04:04:37', 'P006', 'B-004', '98', '100', 'PM-000'),
('2021-10-26 04:46:16', 'P004', 'B-003', '89', '1100', 'PM-000'),
('2021-10-26 06:18:04', 'P005', 'B-005', '98', '1000', 'PM-000'),
('2021-10-26 07:16:11', 'P005', 'B-008', '46', '446', 'PM-000'),
('2021-10-27 02:14:12', 'P005', 'B-001', '22', '100', 'PM-000'),
('2021-10-27 04:20:10', 'P006', 'B-003', '657', '100', 'PM-000'),
('2021-10-27 04:47:24', 'P003', 'B-006', '35', '1000', 'PM-000'),
('2021-10-27 05:10:12', 'P006', 'B-005', '24', '2500', 'PM-000'),
('2021-10-28 02:34:46', 'P004', 'B-003', '35', '100', 'PM-000'),
('2021-10-28 03:50:50', 'P003', 'B-004', '46', '100', 'PM-000'),
('2021-10-28 11:14:17', 'P006', 'B-005', '35', '45', 'PM-000'),
('2021-10-28 11:24:29', 'P005', 'B-003', '98', '100', 'PM-000'),
('2021-10-28 11:49:25', 'P004', 'B-007', '35', '1100', 'PM-000'),
('2021-11-23 17:53:50', 'P004', 'B-000', '98', '55', 'PM-000'),
('2021-11-23 17:54:15', 'P005', 'B-000', '67', '100', 'PM-000'),
('2021-11-24 17:48:55', 'P005', 'B-000', '78', '1100', 'PM-000'),
('2021-11-24 19:39:11', 'P001', 'B-000', '24', '300', 'PM-000'),
('2021-11-24 19:39:59', 'P001', 'B-000', '24', '40', 'PM-000'),
('2021-11-24 21:13:58', 'P001', 'B-000', '98', '5', 'PM-000'),
('2021-11-24 21:14:10', 'P001', 'B-000', '24', '1', 'PM-000'),
('2021-11-24 21:26:36', 'P006', 'B-000', '24', '12', 'PM-000'),
('2021-11-24 23:11:14', 'P001', 'B-000', '24', '2', 'PM-000'),
('2021-11-24 23:31:06', 'P001', 'B-000', '98', '1', 'PM-000'),
('2021-11-24 23:34:09', 'P004', 'B-008', '24', '2000', 'PM-000');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` varchar(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `contact_no`, `name`) VALUES
('B-000', 116789877, 'John Keells Holdings PLC'),
('B-001', 1123456782, 'Akbar Brothers (Pvt)'),
('B-003', 116785671, 'Amazon Trading (Pvt)'),
('B-004', 116789352, 'CHAPLON TEA PVT LTD'),
('B-005', 116354728, 'EMPIRE TEAS PVT LTD'),
('B-006', 1123456999, 'DILMAH CEYLON TEA PLC'),
('B-007', 116785445, 'VAN REES CEYLON LTD'),
('B-008', 1123455678, 'MABROC TEAS PVT LTD');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_message`
--

CREATE TABLE `emergency_message` (
  `notification_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receiver_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` varchar(11) NOT NULL,
  `employee_type` enum('agent','accountant','admin','manager','supervisor','product_manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_request`
--

CREATE TABLE `fertilizer_request` (
  `request_id` int(11) NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `date_delivered` date DEFAULT current_timestamp(),
  `sup_id` varchar(11) NOT NULL,
  `agent_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fertilizer_request`
--

INSERT INTO `fertilizer_request` (`request_id`, `amount`, `date_delivered`, `sup_id`, `agent_id`) VALUES
(1, '224', '2021-10-27', 'SUP-000', 'AGN-000'),
(2, '36', '2021-10-27', 'SUP-000', 'AGN-000');

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `in_date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `price_per_unit` decimal(11,0) NOT NULL,
  `price_for_amount` decimal(11,0) NOT NULL,
  `in_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_stock`
--

INSERT INTO `in_stock` (`in_date`, `type`, `price_per_unit`, `price_for_amount`, `in_quantity`, `emp_id`) VALUES
('2021-10-26 00:00:00', 'firewood', '223', '54412', '244', 'SUP-000'),
('2021-10-26 16:15:35', 'firewood', '244', '16104', '66', 'SUP-000'),
('2021-10-26 16:15:45', 'firewood', '11', '121', '11', 'SUP-000'),
('2021-10-26 16:16:29', 'fertilizer', '353', '2067874', '5858', 'SUP-000'),
('2021-10-27 15:53:56', 'firewood', '4555', '13665', '3', 'SUP-000'),
('2021-10-27 15:54:43', 'firewood', '100', '50000', '500', 'SUP-000'),
('2021-10-27 22:03:15', 'firewood', '23', '5359', '233', 'SUP-000');

-- --------------------------------------------------------

--
-- Table structure for table `landowner`
--

CREATE TABLE `landowner` (
  `user_id` varchar(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `landowner_type` enum('indirect_landowner','direct_landowner') NOT NULL,
  `tea_availability` tinyint(1) DEFAULT NULL,
  `no_of_estimated_containers` int(11) NOT NULL,
  `route_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landowner`
--

INSERT INTO `landowner` (`user_id`, `contact_number`, `landowner_type`, `tea_availability`, `no_of_estimated_containers`, `route_no`) VALUES
('LAN-000', 771292250, 'indirect_landowner', 1, 0, 0),
('LAN-001', 771292251, 'indirect_landowner', 1, 5, 0),
('LAN-003', 777500601, 'indirect_landowner', 1, 6, 0),
('LAN-004', 768687030, 'indirect_landowner', NULL, 0, 0),
('LAN-005', 768687032, 'indirect_landowner', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`emp_id`) VALUES
('MAN-000');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payment`
--

CREATE TABLE `monthly_payment` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_date` date NOT NULL,
  `fertilizer_expenses` decimal(11,0) NOT NULL,
  `advance_expenses` decimal(11,0) NOT NULL,
  `income` decimal(11,0) NOT NULL,
  `final_payment` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL,
  `lid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_profit`
--

CREATE TABLE `monthly_profit` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `profit` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_tea_price`
--

CREATE TABLE `monthly_tea_price` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_tea_price`
--

INSERT INTO `monthly_tea_price` (`date`, `price`, `emp_id`) VALUES
('2021-03-16', 129, 'ACC-000'),
('2021-04-08', 546, 'ACC-000'),
('2021-05-30', 143, 'ACC-000'),
('2021-08-17', 230, 'ACC-000'),
('2021-09-29', 143, 'ACC-000'),
('2021-10-29', 22, 'ACC-000');

-- --------------------------------------------------------

--
-- Table structure for table `notofication`
--

CREATE TABLE `notofication` (
  `notification_id` tinyint(11) NOT NULL,
  `read_unread` tinyint(1) NOT NULL,
  `seen_not_seen` tinyint(1) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reciever_type` enum('Admin','Accountant','Agent','Manager','ProductManager','Landowner','Supervisor') NOT NULL,
  `notification_type` enum('warning','request','','') NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `recieve_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `out_stock`
--

CREATE TABLE `out_stock` (
  `out_date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `out_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_stock`
--

INSERT INTO `out_stock` (`out_date`, `type`, `out_quantity`, `emp_id`) VALUES
('2021-10-26 00:00:00', 'firewood', '355', 'SUP-000'),
('2021-10-26 16:16:17', 'firewood', '35', 'SUP-000'),
('2021-10-27 15:53:16', 'firewood', '1000', 'SUP-000'),
('2021-10-27 15:53:31', 'firewood', '3000', 'SUP-000'),
('2021-10-27 22:03:26', 'firewood', '100', 'SUP-000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `stock` decimal(10,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `stock`, `emp_id`) VALUES
('P001', 'Green Tea', '2', 'PM-000'),
('P003', 'White Tea', '230', 'PM-000'),
('P004', 'B-100 Black Tea', '1189', 'PM-000'),
('P005', 'N Black Tea', '54', 'PM-000'),
('P006', 'Early Black Tea', '121', 'PM-000'),
('P007', 'Masala Chai', '689', 'PM-000'),
('P008', 'Matcha Tea', '311', 'PM-000'),
('P009', 'Oolang Tea', '122', 'PM-000'),
('P010', 'Sencha Tea', '244', 'PM-000');

-- --------------------------------------------------------

--
-- Table structure for table `products_in`
--

CREATE TABLE `products_in` (
  `products_id` varchar(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_in`
--

INSERT INTO `products_in` (`products_id`, `date`, `amount`) VALUES
('P001', '2021-11-23 18:40:36', '345.00'),
('P005', '2021-11-23 18:40:36', '357.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_manager`
--

CREATE TABLE `product_manager` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_manager`
--

INSERT INTO `product_manager` (`emp_id`) VALUES
('PM-000');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `confirm_date` date DEFAULT NULL,
  `response_status` enum('receive','accept','decline') NOT NULL,
  `complete_status` tinyint(1) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `request_type` enum('fertilizer','advance') NOT NULL,
  `lid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_date`, `confirm_date`, `response_status`, `complete_status`, `comments`, `request_type`, `lid`) VALUES
(1, '2021-10-27 22:01:10', '2021-10-30', 'receive', 0, NULL, 'fertilizer', 'LAN-003'),
(2, '2021-10-27 22:01:10', '2021-10-30', 'receive', 0, NULL, 'fertilizer', 'LAN-000'),
(3, '2021-10-27 22:01:10', '2021-10-30', 'receive', 0, NULL, 'advance', 'LAN-000'),
(4, '2021-10-27 22:01:10', '2021-10-30', 'receive', 0, NULL, 'advance', 'LAN-000');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `type` enum('fertilizer','firewood') NOT NULL,
  `full_stock` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`type`, `full_stock`, `emp_id`) VALUES
('fertilizer', 5858, 'SUP-000'),
('firewood', 10633, 'SUP-000');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`emp_id`) VALUES
('SUP-000');

-- --------------------------------------------------------

--
-- Table structure for table `tea`
--

CREATE TABLE `tea` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `lid` varchar(11) NOT NULL,
  `initial_weight_agent` decimal(11,0) NOT NULL,
  `initial_weight_sup` decimal(11,0) NOT NULL,
  `water_precentage` decimal(11,0) NOT NULL,
  `container_precentage` decimal(11,0) NOT NULL,
  `matured_precentage` decimal(11,0) NOT NULL,
  `net_weight` decimal(11,0) NOT NULL,
  `sup_id` varchar(11) NOT NULL,
  `agent_id` varchar(11) NOT NULL,
  `quality` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tea`
--

INSERT INTO `tea` (`date`, `lid`, `initial_weight_agent`, `initial_weight_sup`, `water_precentage`, `container_precentage`, `matured_precentage`, `net_weight`, `sup_id`, `agent_id`, `quality`) VALUES
('2021-10-27', 'LAN-001', '35', '0', '0', '0', '0', '0', 'SUP-000', 'AGN-000', '0'),
('2021-10-27', 'LAN-003', '78', '0', '0', '0', '0', '0', 'SUP-000', 'AGN-000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `user_type` enum('Agent','Accountant','Admin','Land_Owner','Manager','Product_Manager','Supervisor') NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `address`, `contact_number`, `user_type`, `password`, `verify`, `created_at`) VALUES
('ACC-000', 'Pasindu Melaka', 'Galle', 773158043, 'Accountant', '$2y$10$FvZcwodDo.aXjeQlpqFM1eP9Xo33fzZp4OcgQgz9.i.et5PT5iI9q', 1, '2021-10-02 00:00:00'),
('ACC-001', 'Melaka 3', 'Galle', 773158045, 'Accountant', '$2y$10$dbGbqa8aJAclxYcQSlWsF.4wPtQ6AF0Eq50dSqOBNm4hgMdiuV6kO', 1, '2021-10-13 00:00:00'),
('ADM-000', 'Sasindu Dias', 'Galle', 768687025, 'Admin', '$2y$10$GyWhOFKFHdif87.h89Aq1eU/jq1QSXjV6cZULqcaMiB5.Fw9lOBTi', 1, '2021-10-02 00:00:00'),
('AGN-000', 'Roneki Manamperi', 'Matara', 777816920, 'Agent', '$2y$10$LcGSnYgDo9Rr4zy6Ah4WnO/c5j3YMBBj.ITPC4Ph7A6t1QoTTSHv.', 1, '2021-10-02 00:00:00'),
('LAN-000', 'Pasindu Lakmal', 'Galle', 771292250, 'Land_Owner', '$2y$10$VkaJi7aD3Oek4EiNexDNVOkpWBqOH3KX0CEjoPJGHvHIIQTehzMm.', 1, '2021-10-02 00:00:00'),
('LAN-001', 'Pasindu Lakmal', 'Galle', 771292251, 'Land_Owner', '$2y$10$LurcpYHOgIX7ElJtXu4skeo9asgbx7wYjJXF9Zn4Ysberr1xVdYdO', 1, '2021-10-02 00:00:00'),
('LAN-003', 'Pasindu3', 'galle', 777500601, 'Land_Owner', '$2y$10$ryDIewGTjyPM5Y9QXXQ4fe83wnz7uwTFdHcEeXgKYyfJlXsc1gZ92', 1, '2021-10-27 22:18:07'),
('LAN-004', 'g', 'sg', 768687030, 'Land_Owner', '$2y$10$PUUOKspiUwjS1zWY3.Xeie6QeuAnhR6hdN9LrmjC5BBqOiyfP0/w.', 1, '2021-10-28 10:51:25'),
('LAN-005', 'ff', 'g', 768687032, 'Land_Owner', '$2y$10$kPW1ZbTW5KoeSNT96e/TL.FHL7iKLnJHewA/FF9VzfC.ASyV6RNn2', 1, '2021-10-28 10:57:43'),
('MAN-000', 'Sasindu Dias', 'Galle', 768687026, 'Manager', '$2y$10$ni90VPBri5TdH/CeRJy8bOSyazFKTB/CRqv884hJ38gCsSD8H//uO', 1, '2021-10-02 00:00:00'),
('MAN-001', 'aa', '', 771190216, 'Manager', '', 0, '2021-10-26 16:19:54'),
('MAN-002', 'aaa', '', 768687111, 'Manager', '', 0, '2021-10-26 16:21:42'),
('PM-000', 'Pasindu Melaka', 'Galle', 773158044, 'Product_Manager', '$2y$10$gVvBbjH.Om9UcM0To0qOd.6v8F1.5ZM7xIhR0vhIjcZdeTq5S3q1W', 1, '2021-10-02 00:00:00'),
('SUP-000', 'Kumud perera', 'Kalutara, Matugama', 769372530, 'Supervisor', '$2y$10$0FyR3MJY0cQYEowrWS0yEOPH.W8Wtnl6wbTGCJ2gDLGkTd/DI.JOC', 1, '2021-10-03 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `advance_request`
--
ALTER TABLE `advance_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `accountant_manage_advance` (`acc_id`),
  ADD KEY `agent_deliver_advance` (`agent_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`date`,`product_id`),
  ADD KEY `product_manager_manges_products` (`emp_id`),
  ADD KEY `buyer_buys_product` (`buyer_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `emergency_message`
--
ALTER TABLE `emergency_message`
  ADD PRIMARY KEY (`notification_id`,`message_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fertilizer_request`
--
ALTER TABLE `fertilizer_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `supervisor_handle_fertilizer` (`sup_id`),
  ADD KEY `agent_delivers_fertilizer` (`agent_id`);

--
-- Indexes for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD PRIMARY KEY (`in_date`,`type`),
  ADD KEY `in_stock_derives_stock` (`type`);

--
-- Indexes for table `landowner`
--
ALTER TABLE `landowner`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `monthly_payment`
--
ALTER TABLE `monthly_payment`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `monthly_profit`
--
ALTER TABLE `monthly_profit`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `monthly_tea_price`
--
ALTER TABLE `monthly_tea_price`
  ADD PRIMARY KEY (`date`),
  ADD KEY `accountant_updates_monthly_tea` (`emp_id`);

--
-- Indexes for table `notofication`
--
ALTER TABLE `notofication`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD PRIMARY KEY (`out_date`,`type`),
  ADD KEY `out_stock_derives_stock` (`type`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `productmanager_updates_products` (`emp_id`);

--
-- Indexes for table `products_in`
--
ALTER TABLE `products_in`
  ADD PRIMARY KEY (`products_id`,`date`),
  ADD KEY `product_manager_enters_products_In` (`products_id`);

--
-- Indexes for table `product_manager`
--
ALTER TABLE `product_manager`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `landowner_makes_request` (`lid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`type`),
  ADD KEY `supervisor_manges_stock` (`emp_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tea`
--
ALTER TABLE `tea`
  ADD PRIMARY KEY (`date`,`lid`),
  ADD KEY `landowner_gives_tea` (`lid`),
  ADD KEY `agent_collects_tea` (`agent_id`),
  ADD KEY `supervisor_measures_tea` (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_message`
--
ALTER TABLE `emergency_message`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notofication`
--
ALTER TABLE `notofication`
  MODIFY `notification_id` tinyint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountant`
--
ALTER TABLE `accountant`
  ADD CONSTRAINT `accountant_is_a_user` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin_is_a_User` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advance_request`
--
ALTER TABLE `advance_request`
  ADD CONSTRAINT `accountant_manage_advance` FOREIGN KEY (`acc_id`) REFERENCES `accountant` (`emp_id`),
  ADD CONSTRAINT `advance_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `agent_deliver_advance` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`emp_id`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_is_a_user` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employees_are_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fertilizer_request`
--
ALTER TABLE `fertilizer_request`
  ADD CONSTRAINT `agent_delivers_fertilizer` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`emp_id`),
  ADD CONSTRAINT `fertilizer_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `supervisor_handle_fertilizer` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`emp_id`);

--
-- Constraints for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD CONSTRAINT `in_stock_derives_stock` FOREIGN KEY (`type`) REFERENCES `stock` (`type`);

--
-- Constraints for table `landowner`
--
ALTER TABLE `landowner`
  ADD CONSTRAINT `Landowner_is_a_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_is_a_user` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monthly_tea_price`
--
ALTER TABLE `monthly_tea_price`
  ADD CONSTRAINT `accountant_updates_monthly_tea` FOREIGN KEY (`emp_id`) REFERENCES `accountant` (`emp_id`);

--
-- Constraints for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD CONSTRAINT `out_stock_derives_stock` FOREIGN KEY (`type`) REFERENCES `stock` (`type`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productmanager_updates_products` FOREIGN KEY (`emp_id`) REFERENCES `product_manager` (`emp_id`);

--
-- Constraints for table `products_in`
--
ALTER TABLE `products_in`
  ADD CONSTRAINT `product_manager_enters_products_In` FOREIGN KEY (`products_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_manager`
--
ALTER TABLE `product_manager`
  ADD CONSTRAINT `Product_Manager_is_a_user` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `landowner_makes_request` FOREIGN KEY (`lid`) REFERENCES `landowner` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `supervisor_manges_stock` FOREIGN KEY (`emp_id`) REFERENCES `supervisor` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_is_a_user` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tea`
--
ALTER TABLE `tea`
  ADD CONSTRAINT `agent_collects_tea` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`emp_id`),
  ADD CONSTRAINT `landowner_gives_tea` FOREIGN KEY (`lid`) REFERENCES `landowner` (`user_id`),
  ADD CONSTRAINT `supervisor_measures_tea` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
