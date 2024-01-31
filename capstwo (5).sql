-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 03:47 PM
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
  `users_id` int(11) NOT NULL,
  `users_username` varchar(50) NOT NULL,
  `users_password` varchar(200) NOT NULL,
  `users_firstname` varchar(100) NOT NULL,
  `users_lastname` varchar(100) NOT NULL,
  `users_role` varchar(100) NOT NULL,
  `dateregistered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`users_id`, `users_username`, `users_password`, `users_firstname`, `users_lastname`, `users_role`, `dateregistered`) VALUES
(5, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Tim', 'Morales', 'Admin', '2023-12-20 03:53:02'),
(34, 'Developer', '3afdc96b35e60a6c3d98fc06ca8647ad5a106c862503cb64f982d260928c7285', 'Rhondel', 'Pagobo', 'Admin', '2024-01-04 02:14:13'),
(35, 'Cashier1', '0e48a5072300a1dbfe6691f0d56801be3b9f2eac009fc90e6a976a96f6f58ea9', 'Aldril', 'Catigum', 'Staff', '2024-01-04 02:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `aminities`
--

CREATE TABLE `aminities` (
  `aminities_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rates` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aminities`
--

INSERT INTO `aminities` (`aminities_id`, `name`, `rates`, `description`, `image1`, `image2`, `image3`, `dateadded`) VALUES
(3, 'Rubber Table Umbrella', '200', 'Rubber table with umbrella.', '../cottageimgs/a-for-programmers-wallpaper.png', '../cottageimgs/4711385.jpg', '../cottageimgs/code-programming-microsoft-visual-studio-wallpaper-preview.jpg', '2023-12-17 12:55:48'),
(4, 'Orange Small Cottage', '250', 'Small cottage inside with a color orange.', '../cottageimgs/table2.jpg', '../cottageimgs/table1.jpg', '../cottageimgs/Web Development.png', '2023-12-17 13:02:40'),
(7, 'Rubber Tent', '350', 'Rubberized', '../cottageimgs/rubber tent1.png', '../cottageimgs/rubber tent2.png', '../cottageimgs/rubber tent3.png', '2023-12-17 14:15:33'),
(8, 'Not Avail Aminities', '0', 'Not availing any aminities', '../cottageimgs/cereqt.jpg', '../cottageimgs/ceeeryt.jpg', '../cottageimgs/ribbon3.jpg', '2023-12-21 03:31:01');

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
  `payment_id` varchar(200) DEFAULT NULL,
  `checkouturl` varchar(200) NOT NULL,
  `approvedby` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_reservation`
--

INSERT INTO `completed_reservation` (`comres_id`, `reservation_id`, `customer_id`, `transaction_ref`, `modeofpayment`, `status`, `servicefee`, `totalamount`, `checkout_id`, `payment_id`, `checkouturl`, `approvedby`, `dateadded`) VALUES
(7, 61, 10, 'ref7f389e', '50% Downpayment', 'Approved', 0, 10000, 'cs_TfWoXFftCZcH8DeeLfRhB9St', 'pay_pnsnHkXRuXSEsubbErQrGcrP', 'https://checkout.paymongo.com/cs_TfWoXFftCZcH8DeeLfRhB9St_client_kEGDNdKXx28iHd6WAkixj6Jd#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, '2023-12-14 16:56:40'),
(8, 62, 11, 'ref3a05a1', '50% Downpayment', 'Done', 0, 5000, 'cs_1XwxkPpzsf2gCcWLoVopLLx4', 'pay_sY4RQWohd6CGfaXn5jjkWLk6', 'https://checkout.paymongo.com/cs_1XwxkPpzsf2gCcWLoVopLLx4_client_JWh1iRF1EiZ26C7TFFMLERwM#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'admin', '2023-12-14 23:48:52'),
(9, 70, 23, 'refdb3757', '50% Downpayment', 'Done', 0, 2500, 'cs_3h9cZ7n77kwbfuBFqxTsf7HF', 'pay_5VHwZbrLVaP82CUWHHdm7AAy', 'https://checkout.paymongo.com/cs_3h9cZ7n77kwbfuBFqxTsf7HF_client_iXBfHo3CXD29LgkXCmQ4oNUY#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'admin', '2023-12-15 11:26:06'),
(10, 71, 24, 'ref27ca84', '50% Downpayment', 'Approved', 0, 5000, 'cs_ugrkuapesTwiPuofVSaH6Q6R', 'pay_QiceFz7jqBh54kLvFzRkTjpW', 'https://checkout.paymongo.com/cs_ugrkuapesTwiPuofVSaH6Q6R_client_9Yyk6TNDepV6RJ4NG29UogkH#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'admin', '2023-12-15 15:03:15'),
(12, 73, 26, 'refc75e3e', 'Full Payment', 'Approved', 0, 2000, 'cs_LFSZMNjz2sVWSj8s4dFfXTvs', 'pay_4uxt4ybQuQRoDJSEzQv5TagU', 'https://checkout.paymongo.com/cs_LFSZMNjz2sVWSj8s4dFfXTvs_client_rDvd8Y7GHhz6gpVcrrHajrE6#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, '2023-12-17 07:47:09'),
(14, 75, 28, 'ref61b961', 'Full Payment', 'Approved:QR', 0, 425000, 'Via Qr', NULL, 'Via Qr', 'admin', '2023-12-20 21:23:02'),
(17, 77, 30, 'refe971ad', 'Full Payment', 'Approved:QR', 0, 100000, 'Via Qr', NULL, 'Via Qr', 'admin', '2023-12-29 04:14:54'),
(18, 78, 31, 'refdec907', 'Full Payment', 'Pending', 0, 100000, 'Via Qr', NULL, 'Via Qr', NULL, '2023-12-29 09:40:13'),
(19, 79, 32, 'ref5ba9bb', '50% Downpayment', 'Pending', 0, 50000, 'cs_39p1dAR89xnj5N2tpHDtxJCm', NULL, 'https://checkout.paymongo.com/cs_39p1dAR89xnj5N2tpHDtxJCm_client_MJ7A5p2dCrqc35RcnYiSecA9#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, '2023-12-29 09:42:30'),
(20, 79, 32, 'ref99b021', '50% Downpayment', 'Pending', 0, 50000, 'cs_PqyvhbWJDb7KeCNqeyrKPgHj', NULL, 'https://checkout.paymongo.com/cs_PqyvhbWJDb7KeCNqeyrKPgHj_client_ERMwbJXAz4mt3khwVDA9wkj7#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, '2023-12-29 09:44:10'),
(21, 81, 34, 'ref4891a1', 'Full Payment', 'Approved', 0, 2000, 'cs_pt6osJyqVTmS4CNDtWqGzU6p', 'pay_8QMw6gYbLpPvKdZkcb79yo7s', 'https://checkout.paymongo.com/cs_pt6osJyqVTmS4CNDtWqGzU6p_client_CVKJTax2HbKNNn6kCwWjGhKz#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, '2024-01-04 03:06:45');

--
-- Triggers `completed_reservation`
--
DELIMITER $$
CREATE TRIGGER `update_status_trigger` BEFORE INSERT ON `completed_reservation` FOR EACH ROW BEGIN
    DECLARE today_date DATE;
    DECLARE reservation_payment_due_date DATE;
    
    -- Get the current date
    SET today_date = CURDATE();

    -- Fetch the paymentduedate from the reservation table based on reservation_id
    SELECT paymentduedate INTO reservation_payment_due_date
    FROM reservation
    WHERE reservation_id = NEW.reservation_id;

    -- Check if the new row has a status of 'Pending' and the payment due date is today
    IF NEW.status = 'Pending' AND reservation_payment_due_date = today_date THEN
        -- Update the status to 'Failed'
        SET NEW.status = 'Payment Failed';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `control_id` int(11) NOT NULL,
  `entrancefee` varchar(20) NOT NULL,
  `package1_rate` int(20) NOT NULL,
  `package1_imagelink` varchar(500) NOT NULL,
  `package2_rate` int(20) NOT NULL,
  `package2_imagelink` varchar(500) NOT NULL,
  `exclusiverate` int(20) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `instagram` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `eventimage` varchar(500) NOT NULL,
  `announcementimage` varchar(500) NOT NULL,
  `smsapi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`control_id`, `entrancefee`, `package1_rate`, `package1_imagelink`, `package2_rate`, `package2_imagelink`, `exclusiverate`, `facebook`, `instagram`, `phone`, `email`, `eventimage`, `announcementimage`, `smsapi`) VALUES
(1, '50', 20, 'https%3A%2F%2Fscontent-mnl1-1.xx.fbcdn.net%2Fv%2Ft39.30808-6%2F401057666_747277797417591_489731415847655148_n.jpg%3F_nc_cat%3D103%26ccb%3D1-7%26_nc_sid%3Ddd5e9f%26_nc_ohc%3DjgKfaZEeqNIAX8fg-vW%26_nc_zt%3D23%26_nc_ht%3Dscontent-mnl1-1.xx%26oh%3D00_AfDvgnc2g9f_D8GNhinQ8v3SnDcSMTuRb73VjSwqcosVQQ%26oe%3D659850E9', 8500, 'https%3A%2F%2Fscontent-mnl1-1.xx.fbcdn.net%2Fv%2Ft39.30808-6%2F399731928_747277807417590_3041490705263958323_n.jpg%3F_nc_cat%3D103%26ccb%3D1-7%26_nc_sid%3Ddd5e9f%26_nc_ohc%3DV9EwtDLPaYQAX8pHeow%26_nc_oc%3DAQmRB_JA7A3UPd3_7rhApVIRZqROTu-I8bHJTu86xaFcb078tRx6uenwfzh6SMFuhkI%26_nc_zt%3D23%26_nc_ht%3Dscontent-mnl1-1.xx%26oh%3D00_AfA395Jza451JAwFRpQV7LLKgG86shtx5opgOh9D72OFzg%26oe%3D659854CE', 1000, 'https://www.facebook.com/DegarsResort/   ', 'rdegarsmanor', '0968 856 1015', 'mdegars@yahoo.com', 'https://scontent.fmnl9-3.fna.fbcdn.net/v/t39.30808-6/411181463_767311775414193_8484090469457759714_n.jpg?stp=dst-jpg_p843x403&_nc_cat=100&ccb=1-7&_nc_sid=a73e89&_nc_eui2=AeEfYn3P-87UILhDXWOsHUhKggR2aFXRcnKCBHZoVdFycmx_MuU61iIbMYINdp8mE_7Wm26cVLvyszam9BZbyJDi&_nc_ohc=yli3qPO8doMAX83WqIS&_nc_zt=23&_nc_ht=scontent.fmnl9-3.fna&oh=00_AfCr-FgP1OzFlB29a2o33pXK7nk3W4JZKWz9slW7d27Hqg&oe=6598A805', 'https://scontent.fmnl25-2.fna.fbcdn.net/v/t39.30808-6/416128925_777932661018771_6476018955039649151_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=dd5e9f&_nc_ohc=aEy_0yT_zh4AX-LSSfE&_nc_zt=23&_nc_ht=scontent.fmnl25-2.fna&oh=00_AfCKsgSRuMyFIE5Ss9ugA1ZjAHzZIRMpRqObtexzikLWxg&oe=6598DB19', '71a0b82e7b5fbd2fb958fcf22d844280');

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
(10, 61, 'Jeyla', 'Maglasang', 'jeyla.maglasang@nmsc.edu.ph', '+639506587329', '2023-12-14 16:46:47'),
(11, 62, 'Rhondel', 'Pagobo', 'rhonde.pagobo@nmsc.edu.ph', '+639506587329', '2023-12-14 23:40:08'),
(23, 70, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-15 11:13:49'),
(24, 71, 'Deff', 'Jansol', 'deff.jansol@nmsc.edu.ph', '+639093290132', '2023-12-15 14:59:07'),
(26, 73, 'Kent', 'Rabago', 'kent.rabago@nmsc.edu.ph', '9508029797', '2023-12-17 07:46:48'),
(28, 75, 'Wilgie', 'Liwagon', 'wilgie.liwagon@nmsc.edu.ph', '09508029797', '2023-12-20 21:20:28'),
(30, 77, 'Rhondel', 'Pagobo', 'rhondel.pagobo@nmsc.edu.ph', '9506587329', '2023-12-29 03:13:41'),
(31, 78, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-29 09:35:37'),
(32, 79, 'Rhondel', 'Pagobo', 'rhondelpagobo99@gmail.com', '09506587329', '2023-12-29 09:42:23'),
(34, 81, 'aldril', 'catigum', 'aldril.catigum@nmsc.edu.ph', '+639950076122', '2024-01-04 03:06:22');

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Rhondel M. Pagobo', 'rhondelpagobo99@gmail.com', 'Good day! Degars Resort. Mangutana unta ko kung pwede ba ko makatukod ug gamay nga snackhub dra sa Degars maubang lang. Call me if interested.09506587329', '2024-01-04 11:41:35'),
(2, 'Aldril R. Catigum', 'aldril.catigum@nmsc.edu.ph', 'Gwapo ba ko?', '2024-01-04 11:57:03'),
(3, 'RONALD T. SARDUAL', 'ronald.sardual@nmsc.edu.ph', 'Hello this Ronald Ive just want to ask', '2024-01-04 13:28:44'),
(4, 'Virgie Mae Bucar', 'virgiemae@example.com', 'disdyufigfigasf', '2024-01-06 11:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `listofrefunded`
--

CREATE TABLE `listofrefunded` (
  `id` int(11) NOT NULL,
  `refund_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `status` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listofrefunded`
--

INSERT INTO `listofrefunded` (`id`, `refund_id`, `amount`, `currency`, `status`, `notes`, `created_at`) VALUES
(1, 'ref_cCHuPDEUQBUG3YtGNzELjgdy', '2300.00', 'PHP', 'pending', 'Reason: I want to request a refund and cancel my reservation.(refdb3757)', '2023-12-16 19:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_rate` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_rate`, `image_name`) VALUES
(1, 'Package 1', 5500, 'package1.jpg'),
(2, 'Package 2', 8500, 'package2.jpg'),
(4, 'Package 4', 15000, '8.png');

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
  `approvedby` varchar(50) DEFAULT NULL,
  `dateqradded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payviaqr`
--

INSERT INTO `payviaqr` (`payviaqr_id`, `transaction_ref`, `reservation_id`, `customer_id`, `status`, `gcash_name`, `gcash_number`, `mode_of_payment`, `receipt_img`, `approvedby`, `dateqradded`) VALUES
(11, 'ref2e7abe', 70, 23, 'Declined', 'RHONDEL PAGOBO', '09506587329', '50% Downpayment', '../uploads/ea52953033a005854762886d58e4f217.jpg', 'admin', '2023-12-15 11:22:26'),
(12, 'ref9aa950', 71, 24, 'Approved', 'Deff Jansol', '09093290132', '50% Downpayment', '../uploads/400179783_309794615255048_7021635700716896259_n.jpg', 'admin', '2023-12-15 15:00:25'),
(14, 'ref61b961', 75, 28, 'Approved', 'Wilgie Liwagon', '09508029797', 'Fully Payment', '../uploads/3701ab4d685e7ccc686bef3714b80275.png', 'admin', '2023-12-20 21:23:02'),
(17, 'refe971ad', 77, 30, 'Approved', 'RHONDEL PAGOBO', '09506587329', 'Full Payment', '../uploads/sampleres.png', 'admin', '2023-12-29 04:14:54'),
(18, 'refdec907', 78, 31, 'Pending', 'RHONDEL PAGOBO', '09506587329', 'Full Payment', '../uploads/sampleres.png', NULL, '2023-12-29 09:40:13');

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
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(11) NOT NULL,
  `comres_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `transaction_ref` varchar(50) NOT NULL,
  `refundedamount` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approvedby` varchar(50) DEFAULT NULL,
  `requestdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `comres_id`, `customer_id`, `reservation_id`, `payment_id`, `transaction_ref`, `refundedamount`, `reason`, `status`, `approvedby`, `requestdate`) VALUES
(3, 9, 23, 70, 'pay_5VHwZbrLVaP82CUWHHdm7AAy', 'refdb3757', 23, 'I want to request a refund and cancel my reservation.', 'Refunded', 'admin', '2023-12-17 03:39:55'),
(4, 8, 11, 62, 'pay_sY4RQWohd6CGfaXn5jjkWLk6', 'ref3a05a1', 42, 'I want to cancel my reservation and to request refund for the transaction I have made. Thank you!', 'Pending', NULL, '2023-12-17 08:26:28');

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
(61, 'Exclusive', 'Unwind', '2024-01-20', '2024-01-17', 200, '2023-12-14 16:46:14'),
(62, 'Exclusive', 'GRADUATION PARTY', '2024-01-05', '2024-01-02', 100, '2023-12-14 23:39:40'),
(70, 'Package1', 'Rave Party', '2024-03-29', '2024-03-26', 50, '2023-12-15 11:13:39'),
(71, 'Exclusive', 'GRADUATION PARTY', '2024-02-23', '2024-02-20', 100, '2023-12-15 14:58:29'),
(72, 'Exclusive', 'Womens Day Party', '2024-03-28', '2024-03-25', 100, '2023-12-16 21:24:11'),
(73, 'Package2', 'Fraternity Party', '2024-03-19', '2024-03-16', 20, '2023-12-17 07:45:24'),
(75, 'Package2', 'Ligo lang gud', '2024-01-12', '2024-01-09', 8500, '2023-12-20 21:19:38'),
(77, 'Exclusive', 'Birthday Party', '2024-01-27', '2024-01-24', 1000, '2023-12-29 03:11:53'),
(78, 'Exclusive', 'FRATERNITY PARTY', '2024-01-13', '2024-01-10', 1000, '2023-12-29 09:35:31'),
(79, 'Exclusive', 'GRADUATION PARTY', '2024-02-08', '2024-02-05', 1000, '2023-12-29 09:42:18'),
(81, 'Package1', 'GRADUATION PARTY', '2024-01-25', '2024-01-22', 20, '2024-01-04 03:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `room_aminities`
--

CREATE TABLE `room_aminities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rates` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_aminities`
--

INSERT INTO `room_aminities` (`id`, `name`, `rates`, `description`, `image1`, `image2`, `image3`) VALUES
(1, 'Deluxe Double Room', '800', 'Good for 2 person', '../roomimgs/nissan-gtr-hd-1080p-windows-wallpaper-preview.jpg', '../roomimgs/table1.jpg', '../roomimgs/MS-PowerPoint-Slide-Layout.png'),
(2, 'Twin Deluxe Room', '800', 'Good for 2 person', '../roomimgs/blinking morning.gif', '../roomimgs/images.png', '../roomimgs/6aOk.gif'),
(3, 'Family Room', '1000', 'Good for 4 pax', '../roomimgs/batman-logo-clip-art-best-batman-logo.jpg', '../roomimgs/g.png', '../roomimgs/hj.jpg'),
(4, 'Barkadahan Room', '1,200', 'Good for  6 pax', '../roomimgs/cereqt.jpg', '../roomimgs/ceeeryt.jpg', '../roomimgs/certrrrr.png');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rule_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `rules` text NOT NULL,
  `rulesadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rule_id`, `type`, `rules`, `rulesadded`) VALUES
(2, 'Reservation', '8% of the total amount will be deducted on refund', '2023-12-21 02:09:30'),
(3, 'Resort', 'Keep your personal belongings secure, whether in your room or by the pool', '2023-12-21 02:23:32'),
(4, 'Reservation', 'No refund for Walk-In transaction.', '2023-12-21 03:38:44'),
(7, 'Reservation', 'Make sure to have exact amount from your e-wallets or e-cards before checkout	', '2024-01-02 23:57:41'),
(8, 'Reservation', 'Payment via scanning QR Code in Walk-In is not available.', '2024-01-03 00:10:22'),
(9, 'Resort', 'Sample Rulesssss', '2024-01-06 19:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorsid` int(11) NOT NULL,
  `count_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `walkin`
--

CREATE TABLE `walkin` (
  `walkin_id` int(11) NOT NULL,
  `entrancefee` varchar(50) NOT NULL,
  `walkindate` varchar(20) NOT NULL,
  `numberofheads` varchar(50) NOT NULL,
  `aminities_id` int(11) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walkin`
--

INSERT INTO `walkin` (`walkin_id`, `entrancefee`, `numberofheads`, `aminities_id`, `dateadded`) VALUES
(1, '60.00', '3', 3, '2023-12-18 14:04:19'),
(17, '20 ', '1', 8, '2023-12-22 22:14:12'),
(24, '30', '1', 8, '2024-01-04 02:46:51'),
(25, '30', '1', 8, '2024-01-04 04:34:33'),
(26, '50', '3', 8, '2024-01-06 19:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `walkincustomer`
--

CREATE TABLE `walkincustomer` (
  `wcustomer_id` int(11) NOT NULL,
  `walkin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `datetimeadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walkincustomer`
--

INSERT INTO `walkincustomer` (`wcustomer_id`, `walkin_id`, `firstname`, `lastname`, `email_address`, `phone_number`, `datetimeadded`) VALUES
(4, 1, 'Pedro', 'Pagobo', 'pedro.pagobo@gmail.com', '09506587329', '2023-12-18 17:42:39'),
(7, 17, 'Wilgie', 'Liwagon', 'wilgie.liwagon@nmsc.edu.ph', '09508029797', '2023-12-22 22:14:53'),
(10, 24, 'ronald', 'sardual', 'rsardual38@gmail.com', '9126488990', '2024-01-04 02:47:32'),
(11, 25, 'Maylen', 'Lebrino', 'maylen.lebrino@nmsc.edu.ph', '9506587329', '2024-01-04 04:35:56'),
(12, 26, 'Virgie Mae', 'Bucar', 'virgiemae@sample.com', '09506587329', '2024-01-06 19:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_transac`
--

CREATE TABLE `walkin_transac` (
  `wtransac_id` int(11) NOT NULL,
  `transaction_ref` varchar(20) NOT NULL,
  `walkin_id` int(11) NOT NULL,
  `wcustomer_id` int(11) NOT NULL,
  `aminities_id` int(11) NOT NULL,
  `totalentrancefee` varchar(50) NOT NULL,
  `totalamount` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `checkout_id` varchar(300) NOT NULL,
  `checkouturl` varchar(300) NOT NULL,
  `payment_id` varchar(300) DEFAULT NULL,
  `approvedby` varchar(50) DEFAULT NULL,
  `datewadded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walkin_transac`
--

INSERT INTO `walkin_transac` (`wtransac_id`, `transaction_ref`, `walkin_id`, `wcustomer_id`, `aminities_id`, `totalentrancefee`, `totalamount`, `status`, `checkout_id`, `checkouturl`, `payment_id`, `approvedby`, `datewadded`) VALUES
(2, 'wref098493', 1, 4, 3, '180.00', '38000', 'Pending', 'cs_sxCL9HboZTJt4LByARd2WNKq', 'https://checkout.paymongo.com/cs_sxCL9HboZTJt4LByARd2WNKq_client_DroRa9iThCDvqLRBmrrHhrL9#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'No payment id provided status not paid', 'admin', '2023-12-19 21:08:49'),
(3, 'wref82878c', 17, 7, 8, '20.00', '2000', 'Approved', 'cs_qu5cCMsbJwzqz7ga6HzuEBcg', 'https://checkout.paymongo.com/cs_qu5cCMsbJwzqz7ga6HzuEBcg_client_EwEwawwk5wAeZwGu7qWAJJ1a#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'No payment id provided status not paid', 'admin', '2023-12-22 22:15:04'),
(4, 'wref1b31d6', 24, 10, 8, '30.00', '3000', 'Approved', 'cs_SLyNkxGy617fWFdG36xW1PBY', 'https://checkout.paymongo.com/cs_SLyNkxGy617fWFdG36xW1PBY_client_AUBt2NMkdyRByr1Tcd111RwE#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', 'pay_fckYsY7czkpjis4xdzaVUj5U', NULL, '2024-01-04 02:47:46'),
(5, 'wrefebd0ef', 25, 11, 8, '30.00', '3000', 'Pending', 'cs_o2oAh5k1a7xk6PVw7vozMni4', 'https://checkout.paymongo.com/cs_o2oAh5k1a7xk6PVw7vozMni4_client_2zWKFSiL1EnqgbPrB3qw78Ch#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, NULL, '2024-01-04 04:36:15'),
(6, 'wrefc883cc', 26, 12, 8, '150.00', '15000', 'Pending', 'cs_dYyQAe1jJK5jBwDYoK1vmGzZ', 'https://checkout.paymongo.com/cs_dYyQAe1jJK5jBwDYoK1vmGzZ_client_2daJaJotgUnuSYGdJrVtmGbd#cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=', NULL, NULL, '2024-01-06 19:14:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `aminities`
--
ALTER TABLE `aminities`
  ADD PRIMARY KEY (`aminities_id`);

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
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`control_id`);

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
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listofrefunded`
--
ALTER TABLE `listofrefunded`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_refund_id` (`refund_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`),
  ADD KEY `comid` (`comres_id`),
  ADD KEY `residd` (`reservation_id`),
  ADD KEY `gtyu` (`customer_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `room_aminities`
--
ALTER TABLE `room_aminities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitorsid`);

--
-- Indexes for table `walkin`
--
ALTER TABLE `walkin`
  ADD PRIMARY KEY (`walkin_id`),
  ADD KEY `hifdh` (`aminities_id`);

--
-- Indexes for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  ADD PRIMARY KEY (`wcustomer_id`),
  ADD KEY `wcustwalkid` (`walkin_id`);

--
-- Indexes for table `walkin_transac`
--
ALTER TABLE `walkin_transac`
  ADD PRIMARY KEY (`wtransac_id`),
  ADD KEY `ammm` (`aminities_id`),
  ADD KEY `walkkk` (`walkin_id`),
  ADD KEY `wcys` (`wcustomer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `aminities`
--
ALTER TABLE `aminities`
  MODIFY `aminities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `completed_reservation`
--
ALTER TABLE `completed_reservation`
  MODIFY `comres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `control_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `exclusiveview`
--
ALTER TABLE `exclusiveview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listofrefunded`
--
ALTER TABLE `listofrefunded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payviaqr`
--
ALTER TABLE `payviaqr`
  MODIFY `payviaqr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `room_aminities`
--
ALTER TABLE `room_aminities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `walkin`
--
ALTER TABLE `walkin`
  MODIFY `walkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  MODIFY `wcustomer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `walkin_transac`
--
ALTER TABLE `walkin_transac`
  MODIFY `wtransac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `comid` FOREIGN KEY (`comres_id`) REFERENCES `completed_reservation` (`comres_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gtyu` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `residd` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walkin`
--
ALTER TABLE `walkin`
  ADD CONSTRAINT `hifdh` FOREIGN KEY (`aminities_id`) REFERENCES `aminities` (`aminities_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  ADD CONSTRAINT `wcustwalkid` FOREIGN KEY (`walkin_id`) REFERENCES `walkin` (`walkin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walkin_transac`
--
ALTER TABLE `walkin_transac`
  ADD CONSTRAINT `ammm` FOREIGN KEY (`aminities_id`) REFERENCES `aminities` (`aminities_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `walkkk` FOREIGN KEY (`walkin_id`) REFERENCES `walkin` (`walkin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wcys` FOREIGN KEY (`wcustomer_id`) REFERENCES `walkincustomer` (`wcustomer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
