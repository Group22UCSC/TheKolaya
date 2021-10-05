-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 09:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
('ACC-000');

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
  `amount` int(11) NOT NULL,
  `payment_day` date NOT NULL DEFAULT current_timestamp(),
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `full_income` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auction_bid`
--

CREATE TABLE `auction_bid` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(11) NOT NULL,
  `buyer_id` varchar(11) NOT NULL,
  `sold_price` decimal(11,0) NOT NULL,
  `sold_amount` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` varchar(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `amount(kg)` int(11) NOT NULL,
  `date_delivered` date NOT NULL DEFAULT current_timestamp(),
  `emp_id(sup)` varchar(11) NOT NULL,
  `emp_id(agent)` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `in_date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `price_per_unit` decimal(11,0) NOT NULL,
  `price_for_amount` decimal(11,0) NOT NULL,
  `in_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('LAN-000', 771292250, 'direct_landowner', NULL, 0, 0),
('LAN-001', 771292251, 'indirect_landowner', NULL, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `read_unread` tinyint(1) NOT NULL,
  `receiver_id` varchar(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receive_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `out_stock`
--

CREATE TABLE `out_stock` (
  `out_date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `out_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `confirm_date` date NOT NULL DEFAULT current_timestamp(),
  `response_status` tinyint(1) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `request_type` enum('fertilizer','advance') NOT NULL,
  `lid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `type` enum('fertilizer','firewood') NOT NULL,
  `full_stock` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `initial_weight(agent)` decimal(11,0) NOT NULL,
  `initial_weight(supervisor)` decimal(11,0) NOT NULL,
  `water_precentage` decimal(11,0) NOT NULL,
  `container_precentage` decimal(11,0) NOT NULL,
  `matured_precentage` decimal(11,0) NOT NULL,
  `net_weight` decimal(11,0) NOT NULL,
  `emp_id(sup)` varchar(11) NOT NULL,
  `emp_id(agent)` varchar(11) NOT NULL,
  `quality` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `address`, `contact_number`, `user_type`, `password`, `verify`, `created_at`) VALUES
('ACC-000', 'Pasindu Melaka', 'Galle', 773158043, 'Accountant', '$2y$10$ibz6HkDx2UgbvpcDMkFnXeUdkE4X1pY.r0mErxVVi55JQTuiRJMLu', 1, '2021-10-02'),
('ADM-000', 'Sasindu Dias', 'Galle', 768687025, 'Admin', '$2y$10$GyWhOFKFHdif87.h89Aq1eU/jq1QSXjV6cZULqcaMiB5.Fw9lOBTi', 1, '2021-10-02'),
('AGN-000', 'Roneki Manamperi', 'Matara', 777816920, 'Agent', '$2y$10$LcGSnYgDo9Rr4zy6Ah4WnO/c5j3YMBBj.ITPC4Ph7A6t1QoTTSHv.', 1, '2021-10-02'),
('LAN-000', 'Pasindu Lakmal', 'Galle', 771292250, 'Land_Owner', '$2y$10$VkaJi7aD3Oek4EiNexDNVOkpWBqOH3KX0CEjoPJGHvHIIQTehzMm.', 1, '2021-10-02'),
('LAN-001', 'Pasindu Lakmal', 'Galle', 771292251, 'Land_Owner', '$2y$10$LurcpYHOgIX7ElJtXu4skeo9asgbx7wYjJXF9Zn4Ysberr1xVdYdO', 1, '2021-10-02'),
('MAN-000', 'Sasindu Dias', 'Galle', 768687026, 'Manager', '$2y$10$ni90VPBri5TdH/CeRJy8bOSyazFKTB/CRqv884hJ38gCsSD8H//uO', 1, '2021-10-02'),
('PM-000', 'Pasindu Melaka', 'Galle', 773158044, 'Product_Manager', '$2y$10$gVvBbjH.Om9UcM0To0qOd.6v8F1.5ZM7xIhR0vhIjcZdeTq5S3q1W', 1, '2021-10-02'),
('SUP-000', 'Kumud perera', 'Kalutara, Matugama', 769372530, 'Supervisor', '$2y$10$0FyR3MJY0cQYEowrWS0yEOPH.W8Wtnl6wbTGCJ2gDLGkTd/DI.JOC', 1, '2021-10-03');

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
  ADD KEY `accountant_manage_advance` (`emp_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `auction_bid`
--
ALTER TABLE `auction_bid`
  ADD PRIMARY KEY (`date`,`product_id`);

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
  ADD KEY `supervisor_handle_fertilizer` (`emp_id(sup)`),
  ADD KEY `agent_delivers_fertilizer` (`emp_id(agent)`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
  ADD PRIMARY KEY (`date`,`product_id`);

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
  ADD KEY `agent_collects_tea` (`emp_id(agent)`),
  ADD KEY `supervisor_measures_tea` (`emp_id(sup)`);

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
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `accountant_manage_advance` FOREIGN KEY (`emp_id`) REFERENCES `accountant` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advance_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`);

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
  ADD CONSTRAINT `agent_delivers_fertilizer` FOREIGN KEY (`emp_id(agent)`) REFERENCES `agent` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fertilizer_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `supervisor_handle_fertilizer` FOREIGN KEY (`emp_id(sup)`) REFERENCES `supervisor` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `agent_collects_tea` FOREIGN KEY (`emp_id(agent)`) REFERENCES `agent` (`emp_id`),
  ADD CONSTRAINT `landowner_gives_tea` FOREIGN KEY (`lid`) REFERENCES `landowner` (`user_id`),
  ADD CONSTRAINT `supervisor_measures_tea` FOREIGN KEY (`emp_id(sup)`) REFERENCES `supervisor` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
