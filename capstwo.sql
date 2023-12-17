-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 08:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin'),
(2, 'Rhondel Pagobo', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `dateadded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `dateadded`) VALUES
(70, 'SNACKS', '2023-08-21'),
(81, 'DRINKS', '2023-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `completed_reservation`
--

CREATE TABLE `completed_reservation` (
  `comres_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_ref` varchar(20) NOT NULL,
  `modeofpayment` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `servicefee` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `checkout_id` varchar(200) NOT NULL,
  `checkouturl` varchar(200) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_reservation`
--

INSERT INTO `completed_reservation` (`comres_id`, `reservation_id`, `customer_id`, `transaction_ref`, `modeofpayment`, `status`, `servicefee`, `totalamount`, `checkout_id`, `checkouturl`, `dateadded`) VALUES
(7, 61, 10, 'ref7f389e', '50% Downpayment', 'Approved', 0, 10000, 'cs_TfWoXFftCZcH8DeeLfRhB9St', 'https://checkout.paymongo.com/cs_TfWoXFftCZcH8DeeLfRhB9St_client_kEGDNdKXx28iHd6WAkixj6Jd#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', '2023-12-14 16:56:40'),
(8, 62, 11, 'ref3a05a1', '50% Downpayment', 'Approved', 0, 5000, 'cs_1XwxkPpzsf2gCcWLoVopLLx4', 'https://checkout.paymongo.com/cs_1XwxkPpzsf2gCcWLoVopLLx4_client_JWh1iRF1EiZ26C7TFFMLERwM#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', '2023-12-14 23:48:52'),
(9, 70, 23, 'refdb3757', '50% Downpayment', 'Approved', 0, 2500, 'cs_3h9cZ7n77kwbfuBFqxTsf7HF', 'https://checkout.paymongo.com/cs_3h9cZ7n77kwbfuBFqxTsf7HF_client_iXBfHo3CXD29LgkXCmQ4oNUY#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', '2023-12-15 11:26:06'),
(10, 71, 24, 'ref27ca84', '50% Downpayment', 'Approved', 0, 5000, 'cs_ugrkuapesTwiPuofVSaH6Q6R', 'https://checkout.paymongo.com/cs_ugrkuapesTwiPuofVSaH6Q6R_client_9Yyk6TNDepV6RJ4NG29UogkH#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', '2023-12-15 15:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_inserted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `reservation_id`, `firstname`, `lastname`, `email_address`, `phone_number`, `date_inserted`) VALUES
(8, 59, 'Aldril', 'Catigum', 'aldril.catigum@nmsc.edu.ph', '+639506587329', '2023-12-12 20:47:14'),
(9, 60, 'Daryel', 'Amores', 'daryel.amores@nmsc.edu.ph', '+639517371966', '2023-12-14 10:29:13'),
(10, 61, 'Jeyla', 'Maglasang', 'jeyla.maglasang@nmsc.edu.ph', '+639506587329', '2023-12-14 16:46:47'),
(11, 62, 'Rhondel', 'Pagobo', 'rhonde.pagobo@nmsc.edu.ph', '+639506587329', '2023-12-14 23:40:08'),
(16, 67, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:44:19'),
(17, 68, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:50:53'),
(18, 68, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:51:40'),
(19, 68, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:51:46'),
(20, 68, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:52:21'),
(21, 68, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:53:00'),
(22, 69, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 10:54:03'),
(23, 70, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 11:13:49'),
(24, 71, 'Deff', 'Jansol', 'deff.jansol@nmsc.edu.ph', '+639093290132', '2023-12-15 14:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `exclusiveview`
--

CREATE TABLE `exclusiveview` (
  `id` int(11) NOT NULL,
  `checkout_id` varchar(200) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_reference` varchar(20) NOT NULL,
  `checkout_url` varchar(200) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `payment_recieved` int(11) NOT NULL,
  `current_balanced` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exclusiveview`
--

INSERT INTO `exclusiveview` (`id`, `checkout_id`, `reservation_id`, `customer_id`, `transaction_reference`, `checkout_url`, `mode_of_payment`, `payment_recieved`, `current_balanced`, `status`, `date_added`) VALUES
(1, 'https://checkout.paymongo.com/cs_251TyYawMyPtAHq3HwtgC2JF_client_Zqg3u6hv92T8aUbXvsM7xm9D#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 1, 1, 'Ref-1222', 'https://checkout.paymongo.com/cs_251TyYawMyPtAHq3HwtgC2JF_client_Zqg3u6hv92T8aUbXvsM7xm9D#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', '50%', 100, 100, 'Approved', '2023-10-19 13:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `payviaqr`
--

CREATE TABLE `payviaqr` (
  `payviaqr_id` int(11) NOT NULL,
  `transaction_ref` varchar(15) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `gcash_name` varchar(100) NOT NULL,
  `gcash_number` varchar(20) NOT NULL,
  `mode_of_payment` varchar(30) NOT NULL,
  `receipt_img` varchar(255) NOT NULL,
  `dateqradded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payviaqr`
--

INSERT INTO `payviaqr` (`payviaqr_id`, `transaction_ref`, `reservation_id`, `customer_id`, `status`, `gcash_name`, `gcash_number`, `mode_of_payment`, `receipt_img`, `dateqradded`) VALUES
(8, 'ref639161', 59, 8, 'Approved', 'Aldril R. Catigum', '09506587329', 'Full Payment', '../uploads/share-poster-1684363785997.jpg', '2023-12-13 01:05:26'),
(11, 'ref2e7abe', 70, 23, 'Declined', 'RHONDEL PAGOBO', '09506587329', '50% Downpayment', '../uploads/ea52953033a005854762886d58e4f217.jpg', '2023-12-15 11:22:26'),
(12, 'ref9aa950', 71, 24, 'Approved', 'Deff Jansol', '09093290132', '50% Downpayment', '../uploads/400179783_309794615255048_7021635700716896259_n.jpg', '2023-12-15 15:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `dateadded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `price`, `status`, `categoryid`, `dateadded`) VALUES
(10, 'Tanduay', 150, 'Available', 70, '2023-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `reservationdate` varchar(20) NOT NULL,
  `paymentduedate` varchar(20) NOT NULL,
  `rates` int(50) NOT NULL,
  `datetimeadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `type`, `eventname`, `reservationdate`, `paymentduedate`, `rates`, `datetimeadded`) VALUES
(59, 'Exclusive', 'Womens Day Party', '2023-12-29', '2023-12-26', 100, '2023-12-12 20:39:07'),
(60, 'Exclusive', 'Family Bonding', '2024-01-27', '2024-01-24', 200, '2023-12-14 10:28:28'),
(61, 'Exclusive', 'Unwind', '2024-01-20', '2024-01-17', 200, '2023-12-14 16:46:14'),
(62, 'Exclusive', 'GRADUATION PARTY', '2024-01-05', '2024-01-02', 100, '2023-12-14 23:39:40'),
(66, 'Package 2', 'Rave Party', '2024-01-19', '2024-01-16', 8500, '2023-12-15 10:11:52'),
(67, 'Package1', 'Rave Party', '2023-12-28', '2023-12-25', 5500, '2023-12-15 10:44:15'),
(68, 'Package1', 'Rave Party', '2024-01-09', '2024-01-06', 5500, '2023-12-15 10:50:49'),
(69, 'Package1', 'FRATERNITY PARTY', '2024-01-03', '2023-12-31', 5500, '2023-12-15 10:53:56'),
(70, 'Package1', 'Rave Party', '2024-03-29', '2024-03-26', 50, '2023-12-15 11:13:39'),
(71, 'Exclusive', 'GRADUATION PARTY', '2024-02-23', '2024-02-20', 100, '2023-12-15 14:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorsid` int(11) NOT NULL,
  `count_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `completed_reservation`
--
ALTER TABLE `completed_reservation`
  ADD PRIMARY KEY (`comres_id`),
  ADD KEY `ressid` (`reservation_id`),
  ADD KEY `cussid` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `res_fk` (`reservation_id`);

--
-- Indexes for table `exclusiveview`
--
ALTER TABLE `exclusiveview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payviaqr`
--
ALTER TABLE `payviaqr`
  ADD PRIMARY KEY (`payviaqr_id`),
  ADD KEY `csid` (`customer_id`),
  ADD KEY `resfid` (`reservation_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `categoryFK` (`categoryid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitorsid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `completed_reservation`
--
ALTER TABLE `completed_reservation`
  MODIFY `comres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `exclusiveview`
--
ALTER TABLE `exclusiveview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payviaqr`
--
ALTER TABLE `payviaqr`
  MODIFY `payviaqr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completed_reservation`
--
ALTER TABLE `completed_reservation`
  ADD CONSTRAINT `cussid` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ressid` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `res_fk` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payviaqr`
--
ALTER TABLE `payviaqr`
  ADD CONSTRAINT `csid` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resfid` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoryFK` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
