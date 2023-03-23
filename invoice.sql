-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 01:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `client_email` varchar(20) NOT NULL,
  `client_password` text NOT NULL,
  `client_gst_no` varchar(15) NOT NULL,
  `client_address` text NOT NULL,
  `client_city` varchar(20) NOT NULL,
  `client_state` varchar(20) NOT NULL,
  `client_contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_email`, `client_password`, `client_gst_no`, `client_address`, `client_city`, `client_state`, `client_contact_no`) VALUES
(1, 'mukul', 'mukul@gmail.com', 'mukul', '12345678912345', 'Thapar University', 'ludhiana', 'ludhiana', 1234567895),
(2, 'm', 'g@gmail.com', 'g', 'g', 'nlk', 'kjnn', 'nkj', 789),
(3, 'kl', 'k@gmail.com', 'k', '46464', '546', '4515', '454', 5445),
(4, 'k', 'lknn@gmail.com', 'n', 'nkn', 'n', 'kn', 'kjn', 0),
(5, 'hello', 'hello@gmail.com', '', '465413', '46546', '1651', '6515', 156),
(6, 'j jlklk', 'lk@gmail.com', '', 'nlk', 'nkln', 'kln', 'lkn', 0),
(7, 'aarushi', 'singhalaarushi@gmail', '123456', '2552626', '1463 sec9 ambala', 'ambala city', 'haryana', 2147483647),
(8, 'sam', 'sam@gmail.com', 'sam', '1234567890', 'sector 9', 'delhi', 'delhi', 2147483647),
(10, 'Deepak', 'deepakagg@gmail.com', 'deepak', '8528', 'pratap nagar', 'kotkapura', 'punjab', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `client` varchar(30) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_email` varchar(20) NOT NULL,
  `customer_gst_no` int(20) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_state` text NOT NULL,
  `customer_contact_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `client`, `customer_name`, `customer_email`, `customer_gst_no`, `customer_address`, `customer_city`, `customer_state`, `customer_contact_no`) VALUES
(5, 'deepakagg@gmail.com', 'Hanish', 'hanish@gmail.com', 12345, 'patiala', 'patiala', 'punjab', 1234567898),
(6, 'deepakagg@gmail.com', 'Daksh Sharma', 'daksh0702@gmail.com', 70215, 'Unknown', 'ludhiana', 'Punjab', 2147483647),
(7, 'deepakagg@gmail.com', 'Mahajan', 'Mahajan@gmail.com', 854215, 'Ludhiana', 'Ludhiana', 'Punjab', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `Dates` date DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `sgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `total_gst` float DEFAULT NULL,
  `vechile_no` varchar(255) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `Dates`, `cgst`, `sgst`, `igst`, `total_gst`, `vechile_no`, `driver_name`, `net_amount`, `client_id`, `customer_id`) VALUES
(9874, '2019-04-26', 2, 1, 4, 7, '457', 'klajsfd', 2140, 10, 7),
(12345, '2019-04-26', 2, 2, 2, 6, '23', 'Lokesh', 212, 10, 6),
(123456, '2019-04-26', 1, 1, 1, 3, '123', 'Lokesh', 206, 10, 6),
(879452, '2019-04-26', 1, 1, 1, 3, '5845', 'Lokesh', 412, 10, 6),
(879522, '2019-04-26', 4, 1, 2, 7, '12589', 'Loeksh', 2140, 10, 7),
(1234567, '2019-04-26', 1, 1, 1, 3, '1', 'jklj', 206, 10, 6),
(12345678, '0000-00-00', 2, 1, 1, 4, '123', 'Lokesh', 208, 10, 5),
(86453120, '2019-04-26', 1, 1, 1, 3, '145', 'lhjkln', 412, 10, 5),
(98563152, '0000-00-00', 4, 1, 3, 8, '988203', 'Lokesh', 864, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `client` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `hsn_no` int(10) NOT NULL,
  `image` text NOT NULL,
  `gst` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `client`, `name`, `description`, `hsn_no`, `image`, `gst`) VALUES
(51, 'deepakagg@gmail.com', 'Pens', 'stationary', 784521, 'pen.jpeg', 4),
(52, 'deepakagg@gmail.com', 'HC verma', 'BOOK', 987451, '741', 5),
(53, 'deepakagg@gmail.com', 'Registe', 'rough work', 874523, 'notebook.jpeg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `items_for_invoice`
--

CREATE TABLE `items_for_invoice` (
  `invoice_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `units` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `gst_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_for_invoice`
--

INSERT INTO `items_for_invoice` (`invoice_no`, `item_id`, `units`, `price`, `amount`, `gst_amount`) VALUES
(9874, 51, 10, 200, 2140, 7),
(9874, 52, 2, 200, 412, 3),
(879452, 52, 2, 200, 412, 3),
(879522, 52, 10, 200, 2140, 7),
(1234567, 52, 1, 200, 206, 3),
(12345678, 51, 10, 200, 2060, 3),
(12345678, 52, 1, 200, 208, 4),
(12345678, 53, 2, 50, 104, 4),
(86453120, 52, 2, 200, 412, 3),
(98563152, 52, 4, 200, 864, 8);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `client_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `units` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`client_id`, `item_id`, `units`, `price`) VALUES
(10, 51, 10, 200),
(10, 52, 400, 200),
(10, 53, 40, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_for_invoice`
--
ALTER TABLE `items_for_invoice`
  ADD PRIMARY KEY (`invoice_no`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`client_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `items_for_invoice`
--
ALTER TABLE `items_for_invoice`
  ADD CONSTRAINT `items_for_invoice_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`),
  ADD CONSTRAINT `items_for_invoice_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
