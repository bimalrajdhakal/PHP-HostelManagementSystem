-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 05:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_cycle`
--

CREATE TABLE `bill_cycle` (
  `trn_id` bigint(15) NOT NULL,
  `hostel_id` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  `bill_cycle` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='BILL CYCLE TABLE';

--
-- Dumping data for table `bill_cycle`
--

INSERT INTO `bill_cycle` (`trn_id`, `hostel_id`, `month`, `year`, `bill_cycle`, `date`, `status`) VALUES
(2, '7777700000', 'Sep', '2017', 'Sep-2017', '2017-09-16', 'Generated'),
(3, '7777700002', 'Sep', '2017', 'Sep-2017', '2017-09-16', 'Generated'),
(4, '7777700001', 'Sep', '2017', 'Sep-2017', '2017-09-16', 'Generated'),
(7, '7777700000', 'Feb', '2017', 'Feb-2017', '2017-09-19', 'Generated'),
(8, '7777700000', 'Jan', '2017', 'Jan-2017', '2017-09-19', 'Generated');

-- --------------------------------------------------------

--
-- Table structure for table `bill_factor`
--

CREATE TABLE `bill_factor` (
  `id` int(30) NOT NULL,
  `hostelid` bigint(30) NOT NULL,
  `roomrent` int(30) NOT NULL,
  `watercharge` int(30) NOT NULL,
  `electricitycharge` int(30) NOT NULL,
  `maintinancecharge` int(30) NOT NULL,
  `misccharge` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MANAGE BILL FACTOR TABLE ';

--
-- Dumping data for table `bill_factor`
--

INSERT INTO `bill_factor` (`id`, `hostelid`, `roomrent`, `watercharge`, `electricitycharge`, `maintinancecharge`, `misccharge`) VALUES
(100, 7777700000, 800, 60, 80, 20, 15),
(101, 7777700001, 650, 70, 50, 50, 20),
(102, 7777700002, 700, 100, 80, 20, 10),
(104, 7777700004, 750, 50, 30, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bill_master_table`
--

CREATE TABLE `bill_master_table` (
  `trn_id` bigint(15) NOT NULL,
  `sinvno` varchar(15) NOT NULL,
  `student_id` bigint(15) NOT NULL,
  `hostel_id` bigint(15) NOT NULL,
  `bill_cycle` varchar(50) NOT NULL,
  `billing_date` date NOT NULL,
  `room_rent` int(15) NOT NULL,
  `water_charge` int(15) NOT NULL,
  `elec_charge` int(15) NOT NULL,
  `main_charge` int(15) NOT NULL,
  `misc_charge` int(15) NOT NULL,
  `mess_charge` int(15) DEFAULT '0',
  `laundry_charge` int(15) DEFAULT '0',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_master_table`
--

INSERT INTO `bill_master_table` (`trn_id`, `sinvno`, `student_id`, `hostel_id`, `bill_cycle`, `billing_date`, `room_rent`, `water_charge`, `elec_charge`, `main_charge`, `misc_charge`, `mess_charge`, `laundry_charge`, `status`) VALUES
(1, 'H-6XKJMU00C4', 1110000001, 7777700000, 'Sep-2017', '2017-09-28', 800, 60, 80, 20, 10, 68, 30, 'Paid'),
(2, 'H-FRJNOSK350', 1110000002, 7777700000, 'Sep-2017', '2017-09-28', 800, 60, 80, 20, 10, 575, 20, 'Unpaid'),
(3, 'H-WUPH4BQZ5C', 1110000023, 7777700000, 'Sep-2017', '2017-09-28', 800, 60, 80, 20, 10, NULL, NULL, 'Paid'),
(4, 'H-F6NOZQVGWB', 1110000021, 7777700001, 'Sep-2017', '2017-09-28', 1100, 70, 50, 50, 20, NULL, NULL, 'Unpaid'),
(5, 'H-XW33POHLEP', 1110000012, 7777700001, 'Sep-2017', '2017-09-28', 1100, 70, 50, 50, 20, NULL, NULL, 'Unpaid'),
(6, 'H-DH3D6YA1HZ', 1110000025, 7777700001, 'Sep-2017', '2017-09-28', 1100, 70, 50, 50, 20, NULL, NULL, 'Unpaid'),
(7, 'H-FUY6KNRXR0', 1110000008, 7777700002, 'Sep-2017', '2017-09-28', 1500, 100, 80, 20, 10, NULL, NULL, 'Unpaid'),
(8, 'H-3PR62JWP35', 1110000007, 7777700002, 'Sep-2017', '2017-09-28', 1500, 100, 80, 20, 10, NULL, NULL, 'Unpaid'),
(9, 'H-Y5TP5ZV1GI', 1110000010, 7777700002, 'Sep-2017', '2017-09-28', 1500, 100, 80, 20, 10, NULL, NULL, 'Unpaid'),
(10, 'H-IFRQ0JEWJD', 1110000009, 7777700002, 'Sep-2017', '2017-09-28', 1500, 100, 80, 20, 10, NULL, NULL, 'Unpaid'),
(11, 'H-NBSGORDNWQ', 1110000024, 7777700002, 'Sep-2017', '2017-09-28', 1500, 100, 80, 20, 10, NULL, NULL, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `messageid` bigint(20) NOT NULL,
  `sendername` varchar(50) NOT NULL,
  `senderemailid` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='CONTACT_US TABLE';

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`messageid`, `sendername`, `senderemailid`, `contactno`, `subject`, `message`, `status`) VALUES
(101010000003, 'anjali pp', 'veenanjali116@gmail.com', '9746897108', 'no subject', 'read carefully....!!', 'Read'),
(101010000004, 'jijin ek', 'ekjijin@gmail.com', '7907069308', 'no subject', 'read carefully', 'Unread'),
(101010000005, 'adheena a', 'adheenaad15@gmail.com', '8289878378', 'no subject', 'read it', 'Unread'),
(101010000006, 'Reshma ck', 'reshmashraj@gmail.com', '9048930882', 'no subject', 'read it', 'Unread'),
(101010000007, 'YYYYY', 'G@G', '8957879218', 'JJJJ', 'jjjjjjjjjjj', 'Unread'),
(101010000008, 'cfhhh', 'b@gmail.com', '897879218', 'vbmbn', 'b,.n.nm', 'Read'),
(101010000009, 'gvbm', 'b@gmail.com', '897879218', 'xfhcfv', 'fkhvmlbnkkn;nkbkmk.l', 'Read'),
(101010000011, 'JJ', 'EKJIJIN@GMAIL.COM', '8606124944', 'NOSUB', 'HIB IHI\r\n', 'Read'),
(101010000012, 'NBX', 'b@gmail.com', '1234567890', 'DFHJCNJVHJLM', 'FDCVKBVKBN MN ', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `event_entry_table`
--

CREATE TABLE `event_entry_table` (
  `id` int(35) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(15) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='EVENT ENTRY TABLE';

--
-- Dumping data for table `event_entry_table`
--

INSERT INTO `event_entry_table` (`id`, `subject`, `event_date`, `event_time`, `description`) VALUES
(3, 'sdfsf', '2017-09-17', '04:51', 'sdfsdfsfsdfs""'),
(4, 'sjjzgf', '2014-02-01', '13:05', 'nnnvcnvnvn'),
(6, 'CVB', '2017-09-29', '14:01', 'CHV NMB N,M B  GBV B'),
(10, 'fcjjbn, ', '2017-04-12', '14:45', 'gjghk');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_details`
--

CREATE TABLE `hostel_details` (
  `hostel_id` bigint(30) NOT NULL,
  `hostel_name` varchar(255) NOT NULL,
  `addressline1` varchar(255) NOT NULL,
  `addressline2` varchar(255) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `noofroom` int(10) NOT NULL,
  `hosteltype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Hostel Details ';

--
-- Dumping data for table `hostel_details`
--

INSERT INTO `hostel_details` (`hostel_id`, `hostel_name`, `addressline1`, `addressline2`, `district`, `state`, `pincode`, `contactno`, `noofroom`, `hosteltype`) VALUES
(7777700000, 'Kirans Girl\'s Hostel Kurunthodi', 'Mandarathoor ', 'kurunthodi', 'kozhikode', 'Kerala', 673105, 1234567885, 50, 'Girl\'s'),
(7777700001, 'Green Valley Girl\'s Hostel Thussery', 'Thurssery Mukka', 'Maniyoor', 'kozhikode', 'Kerala', 564534, 1234567890, 50, 'Girl\'s'),
(7777700002, 'CEV Men\'s Hostel Vatakara', 'J.T. ROAD', 'VATAKARA', 'kozhikode', 'Kerala', 589874, 1234567890, 50, 'Boy\'s'),
(7777700004, 'CEV Girl\'s Hostel Vatakara', 'J.T ROAD', 'VADAKARA', 'KOZHIKODE', 'Kerala', 123123, 1234567890, 50, 'Girl\'s');

-- --------------------------------------------------------

--
-- Table structure for table `laundaryentry`
--

CREATE TABLE `laundaryentry` (
  `laundaryid` bigint(10) NOT NULL,
  `laundaryitem` varchar(50) NOT NULL,
  `price` bigint(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='LAUNDARY ENTRY TABLE';

--
-- Dumping data for table `laundaryentry`
--

INSERT INTO `laundaryentry` (`laundaryid`, `laundaryitem`, `price`, `description`) VALUES
(2220, 'UNIFORM', 20, 'UNIFORM'),
(2221, 'COAT', 10, 'COAT'),
(2222, 'JEANS', 10, 'JEANS'),
(2223, 'T-SHIRT', 10, 'T-SHIRT'),
(2224, 'SHIRT', 5, 'SHIRT'),
(2225, 'PANT', 5, 'PANT');

-- --------------------------------------------------------

--
-- Table structure for table `laundary_service`
--

CREATE TABLE `laundary_service` (
  `serviceid` bigint(30) NOT NULL,
  `partyid` varchar(30) NOT NULL,
  `laundary_item` varchar(30) NOT NULL,
  `service_date` date NOT NULL,
  `exp_delidate` date NOT NULL,
  `act_delidate` date DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='LAUNDARY SERVICE TABLE';

--
-- Dumping data for table `laundary_service`
--

INSERT INTO `laundary_service` (`serviceid`, `partyid`, `laundary_item`, `service_date`, `exp_delidate`, `act_delidate`, `status`) VALUES
(1, '1110000002', '2220', '2017-09-04', '2017-09-04', NULL, 'Not Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_invoice`
--

CREATE TABLE `laundry_invoice` (
  `trn_id` bigint(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `amount` bigint(15) NOT NULL,
  `date` date NOT NULL,
  `bill_cycle` varchar(15) NOT NULL,
  `exp_delidate` date NOT NULL,
  `act_delidate` date DEFAULT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MESS INVOICE TABLE';

--
-- Dumping data for table `laundry_invoice`
--

INSERT INTO `laundry_invoice` (`trn_id`, `customer_id`, `invoice_no`, `amount`, `date`, `bill_cycle`, `exp_delidate`, `act_delidate`, `status`) VALUES
(2, '1110000001', 'L-G3F3CPKPFZ', 20, '2017-09-01', 'Sep-2017', '2017-09-16', NULL, 'Not Delivered'),
(3, '1110000001', 'L-20H0TWMBND', 10, '2017-09-16', 'Sep-2017', '2017-09-22', NULL, 'Not Delivered'),
(4, '1110000002', 'L-U5TMXEAEN1', 20, '2017-09-27', 'Sep-2017', '2017-09-28', '2017-09-27', 'Delivered'),
(5, '1110000002', 'L-AUYW5OMEOI', 10, '2017-09-28', 'Sep-2017', '2017-09-29', NULL, 'Not Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order`
--

CREATE TABLE `laundry_order` (
  `trn_id` bigint(15) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `laundry_item` varchar(15) NOT NULL,
  `price` bigint(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `amount` bigint(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MESS ORDER TABLE';

--
-- Dumping data for table `laundry_order`
--

INSERT INTO `laundry_order` (`trn_id`, `invoice_no`, `laundry_item`, `price`, `qty`, `amount`, `date`) VALUES
(1, 'L-36JQJHVA6A', 'UNIFORM', 20, 1, 20, '2017-09-16'),
(2, 'L-G3F3CPKPFZ', 'UNIFORM', 20, 1, 20, '2017-09-16'),
(3, 'L-20H0TWMBND', 'JEANS', 10, 1, 10, '2017-09-16'),
(4, 'L-U5TMXEAEN1', 'UNIFORM', 20, 1, 20, '2017-09-27'),
(5, 'L-AUYW5OMEOI', 'COAT', 10, 1, 10, '2017-09-28'),
(6, 'L-XKGUDVTZKL', 'T-SHIRT', 5, 1, 5, '2017-09-28'),
(7, 'L-GWREB2SA54', 'T-SHIRT', 10, 1, 10, '2017-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `messentry`
--

CREATE TABLE `messentry` (
  `foodid` bigint(10) NOT NULL,
  `fooditem` varchar(30) NOT NULL,
  `price` bigint(10) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MESS ENTRY TABLE';

--
-- Dumping data for table `messentry`
--

INSERT INTO `messentry` (`foodid`, `fooditem`, `price`, `description`) VALUES
(55000, 'PATHTHAL', 10, 'PATHTHAL'),
(55001, 'RICE', 60, 'PLAIN RICE , SAMBAR PICKLE'),
(55002, 'THALI', 60, 'RICE,2 CHAPPATHI, SABZI'),
(55003, 'PUTTU', 10, 'PUTTU'),
(55004, 'KADALA CURRY', 15, 'KADALA CURRY'),
(55005, 'VEGETABLE CURRY', 15, 'VEGETABLE CURRY'),
(55006, 'CHANA MASALA', 30, 'CHANA MASALA'),
(55007, 'SADHYA', 60, 'SADHYA');

-- --------------------------------------------------------

--
-- Table structure for table `mess_invoice`
--

CREATE TABLE `mess_invoice` (
  `tran_id` bigint(15) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `amount` bigint(15) NOT NULL,
  `date` date NOT NULL,
  `bill_cycle` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MESS INVOICE TABLE';

--
-- Dumping data for table `mess_invoice`
--

INSERT INTO `mess_invoice` (`tran_id`, `invoice_no`, `customer_id`, `amount`, `date`, `bill_cycle`) VALUES
(2, 'M-MT6KDFYMGS', '1110000001', 8, '2017-09-01', 'Sep-2017'),
(3, 'M-SNE1BWV3HH', '1110000002', 60, '2017-09-16', 'Sep-2017'),
(4, 'M-PAQCRVTZR5', '1110000001', 60, '2017-09-18', 'Sep-2017'),
(5, 'M-HYISYK3PI1', '1110000002', 170, '2017-09-19', 'Sep-2017'),
(6, 'M-0KXMHMZIRK', '1110000002', 310, '2017-09-22', 'Sep-2017'),
(7, 'M-JU1AFQ2UHK', '1110000002', 20, '2017-09-24', 'Sep-2017'),
(8, 'M-MRBWVQRPD5', '1110000002', 15, '2017-09-27', 'Sep-2017'),
(9, 'M-JG1QAJWF5W', '1110000001', 165, '2017-09-28', 'Sep-2017'),
(10, 'M-PBLG0UW2G4', '1110000001', 100, '2017-09-28', 'Sep-2017');

-- --------------------------------------------------------

--
-- Table structure for table `mess_order`
--

CREATE TABLE `mess_order` (
  `trn_id` bigint(15) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `food_item` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(15) NOT NULL,
  `amount` bigint(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='MESS ORDER TABLE';

--
-- Dumping data for table `mess_order`
--

INSERT INTO `mess_order` (`trn_id`, `invoice_no`, `food_item`, `price`, `qty`, `amount`, `date`) VALUES
(2, 'M-MT6KDFYMGS', 'PATTAL', 8, 1, 8, '2017-09-16'),
(3, 'M-SNE1BWV3HH', 'RICE', 60, 1, 60, '2017-09-16'),
(4, 'M-PAQCRVTZR5', 'RICE', 60, 1, 60, '2017-09-18'),
(5, 'M-HYISYK3PI1', 'PATHTHAL', 10, 1, 10, '2017-09-19'),
(6, 'M-HYISYK3PI1', 'RICE', 60, 1, 60, '2017-09-19'),
(7, 'M-HYISYK3PI1', 'THALI', 60, 1, 60, '2017-09-19'),
(8, 'M-HYISYK3PI1', 'PUTTU', 10, 1, 10, '2017-09-19'),
(9, 'M-HYISYK3PI1', 'KADALA CURRY', 15, 1, 15, '2017-09-19'),
(10, 'M-HYISYK3PI1', 'GREEN CURRY', 15, 1, 15, '2017-09-19'),
(14, 'M-1G5FMG6055', 'PATHTHAL', 10, 1, 10, '2017-09-20'),
(15, 'M-GK5WU5D4OR', 'PATHTHAL', 10, 1, 10, '2017-09-20'),
(17, 'M-KJYD61MVTQ', 'PATHTHAL', 10, 1, 10, '2017-09-21'),
(18, 'M-0KXMHMZIRK', 'PATHTHAL', 10, 1, 10, '2017-09-22'),
(19, 'M-0KXMHMZIRK', 'RICE', 60, 2, 120, '2017-09-22'),
(20, 'M-0KXMHMZIRK', 'THALI', 60, 3, 180, '2017-09-22'),
(21, 'M-JU1AFQ2UHK', 'PATHTHAL', 10, 1, 10, '2017-09-24'),
(22, 'M-JU1AFQ2UHK', 'PUTTU', 10, 1, 10, '2017-09-24'),
(23, 'M-MRBWVQRPD5', 'KADALA CURRY', 15, 1, 15, '2017-09-27'),
(24, 'M-JG1QAJWF5W', 'THALI', 60, 1, 60, '2017-09-28'),
(25, 'M-JG1QAJWF5W', 'KADALA CURRY', 15, 1, 15, '2017-09-28'),
(26, 'M-JG1QAJWF5W', 'CHANA MASALA', 30, 1, 30, '2017-09-28'),
(27, 'M-JG1QAJWF5W', 'SADHYA', 60, 1, 60, '2017-09-28'),
(28, 'M-PBLG0UW2G4', 'PATHTHAL', 10, 1, 10, '2017-09-28'),
(29, 'M-PBLG0UW2G4', 'RICE', 60, 1, 60, '2017-09-28'),
(30, 'M-PBLG0UW2G4', 'CHANA MASALA', 30, 1, 30, '2017-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `news_entry_table`
--

CREATE TABLE `news_entry_table` (
  `id` int(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(15) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='NEWS ENTRY TABLE ';

--
-- Dumping data for table `news_entry_table`
--

INSERT INTO `news_entry_table` (`id`, `subject`, `date`, `time`, `description`) VALUES
(1, 'due clearance of hostel bill ', '2014-09-17', '18:00', 'vbmcxcmvm skjgh,jgjhgk'),
(2, 'ntihdgasdf', '2017-09-17', '02:45', 'sdfsdfsadfhasdfasdfsa"'),
(3, 'sdfsf', '2017-09-17', '04:51', 'sdfsdfsfsdfs"'),
(4, 'fcjvcb ', '2017-04-12', '12:34', 'cxhvnbmn ');

-- --------------------------------------------------------

--
-- Table structure for table `parents_details`
--

CREATE TABLE `parents_details` (
  `parents_id` bigint(100) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `student_id` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='PARENTS DETAILS TABLE STUDENT_ID IS FK FROM STUDENT TABLE';

--
-- Dumping data for table `parents_details`
--

INSERT INTO `parents_details` (`parents_id`, `fname`, `lname`, `emailid`, `contactno`, `student_id`) VALUES
(2220000001, 'ARUNAN ', 'E K', 'arunanek@gmail.com', '8606132494', 1110000001),
(2220000002, 'Mohanan ', 'pp', 'mohananpp555@gmail.com', '8606132494', 1110000002),
(2220000003, 'babu', 'pp', 'babupp@gmail.com', '8547598674', 1110000003),
(2220000004, 'OM PRAKASH', 'DHAKAL', 'om@gmail.com', '8957879218', 1110000004),
(2220000005, 'SOME ', 'NAME', 'some@gmail.com', '1245678910', 1110000005),
(2220000006, 'ABC', 'EFG', 'EFG@GMAIL.COM', '1245678901', 1110000006),
(2220000007, 'ROHIT', 'DHAKAL', 'rohit@gmail.com', '8957879218', 1110000007),
(2220000008, 'sghdfkg', 'jdgskj', 'ggggg@gmail.com', '1245678910', 1110000008),
(2220000009, 'gdh', 'hhh', 'ggg@gmail.com', '1234567890', 1110000009),
(2220000010, 'GXHH', 'GDHXCH', 'SDHFXN@GMAIL.COM', '1234567890', 1110000010),
(2220000011, 'hdjh', '', 'DG@GMAIL.COM', '1234567890', 1110000011),
(2220000012, 'sd', 'ch', 'ch@gmil.com', '3245678976', 1110000012),
(2220000013, 'er', 'tr', 'd@gmail.com', '43456', 1110000013),
(2220000014, 'safhn', '', 'DG@GMAIL.COM', '4455611111', 1110000014),
(2220000015, 'rsr', 'rte', 'SDHFXN@GMAIL.COM', '12345', 1110000015),
(2220000018, 'tttttt', '', 'DG@GMAIL.COM', '12345', 1110000018),
(2220000019, 'fsdc', 'sdgg', 'DG@GMAIL.COM', '1234512345', 1110000019),
(2220000020, 'xzfhb', '', 'DG@GMAIL.COM', '12345', 1110000020),
(2220000021, 'gdsvc', '', 'DG@GMAIL.COM', '1234567890', 1110000021),
(2220000022, 'gdsvc', '', 'DG@GMAIL.COM', '1234567890', 1110000022),
(2220000023, 'single ', 'kj', 'kjksksjks@gmail.com', '854767', 1110000023),
(2220000024, 'abhi', 'DZGJKCJL', 'abhi@gmail.com', '1234567890', 1110000024),
(2220000025, 'babu', 'mp', 'babump@gmail.com', '1234567890', 1110000025);

-- --------------------------------------------------------

--
-- Table structure for table `publicfeed`
--

CREATE TABLE `publicfeed` (
  `feedbackid` bigint(10) NOT NULL,
  `feed_concern` varchar(25) NOT NULL,
  `hostel` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `addline1` varchar(50) NOT NULL,
  `addline2` varchar(50) NOT NULL,
  `addline3` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `complain` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='PUBLIC FEEDBACK TABLE';

--
-- Dumping data for table `publicfeed`
--

INSERT INTO `publicfeed` (`feedbackid`, `feed_concern`, `hostel`, `fname`, `lname`, `addline1`, `addline2`, `addline3`, `emailid`, `contactno`, `complain`) VALUES
(1, 'hostel', '7777700000', 'zdxn', 'xn', 'cxn', 'cm', 'cm', 'b@gmail.com', '897879218', 'djcmvm'),
(2, 'hostel', '7777700000', 'JIJ', 'JJ', 'R', 'R', 'RYR', 'ADA@GMAIL.COM', '8606124944', 'ZDDSFGFFDDDFFDGDGDFDFDFDF');

-- --------------------------------------------------------

--
-- Table structure for table `room_allotment`
--

CREATE TABLE `room_allotment` (
  `id` int(10) NOT NULL,
  `hostel_id` bigint(30) NOT NULL,
  `allocatee_id` bigint(30) NOT NULL,
  `room_no` int(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ROOM ALLOTMENT DETAILS TABLE';

--
-- Dumping data for table `room_allotment`
--

INSERT INTO `room_allotment` (`id`, `hostel_id`, `allocatee_id`, `room_no`, `from_date`, `to_date`, `status`) VALUES
(110, 7777700000, 1110000001, 701, '2017-09-13', NULL, 'Alloted'),
(111, 7777700000, 1110000002, 102, '2017-05-15', NULL, 'Alloted'),
(112, 7777700002, 1110000008, 205, '2017-07-12', NULL, 'Alloted'),
(113, 7777700002, 1110000007, 301, '2017-09-14', NULL, 'Alloted'),
(114, 7777700002, 1110000010, 601, '2017-09-14', NULL, 'Alloted'),
(115, 7777700001, 1110000021, 501, '2017-09-16', NULL, 'Alloted'),
(116, 7777700002, 1110000009, 501, '2017-09-18', NULL, 'Alloted'),
(117, 7777700000, 1110000023, 74, '2017-09-19', NULL, 'Alloted'),
(118, 7777700002, 1110000024, 601, '2017-09-19', NULL, 'Alloted'),
(133, 7777700001, 1110000012, 301, '2017-09-22', NULL, 'Alloted'),
(134, 7777700001, 1110000025, 501, '2017-09-22', NULL, 'Alloted'),
(135, 7777700000, 1110000020, 301, '2017-09-28', NULL, 'Alloted');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `Staff_id` bigint(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `stafftype` varchar(15) NOT NULL,
  `hostelid` bigint(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Staff Details Table ';

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`Staff_id`, `fname`, `lname`, `addressline1`, `addressline2`, `district`, `state`, `pincode`, `mobileno`, `emailid`, `stafftype`, `hostelid`) VALUES
(3333300002, 'athul', 'gfvbjcb', 'fhkm', 'oklk', 'Kottayam', 'Kerala', 857496, 1234567890, 'athulkv@gmail.com', 'WRDN', 7777700004),
(3333300008, 'BIMAL', 'DHAKAL', 'J.T ROAD', 'VADAKARA', 'Malappuram', 'Kerala', 123456, 1234567888, 'bimal.raj496@gmail.com', 'ADMN', 7777700000);

-- --------------------------------------------------------

--
-- Table structure for table `stdrequest`
--

CREATE TABLE `stdrequest` (
  `requestno` varchar(20) NOT NULL,
  `stdudent_id` bigint(100) NOT NULL,
  `req_date` date NOT NULL,
  `req_status` varchar(25) NOT NULL,
  `hostelid` varchar(30) DEFAULT NULL,
  `rejection` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT REQUEST TABLE';

--
-- Dumping data for table `stdrequest`
--

INSERT INTO `stdrequest` (`requestno`, `stdudent_id`, `req_date`, `req_status`, `hostelid`, `rejection`) VALUES
('STD-08062017115453', 1110000007, '2017-06-08', 'Accepted', '7777700002', NULL),
('STD-12072017043010', 1110000008, '2017-07-12', 'Accepted', '7777700002', NULL),
('STD-13092017021308', 1110000009, '2017-09-13', 'Accepted', '7777700002', NULL),
('STD-14092017074639', 1110000010, '2017-09-14', 'Accepted', '7777700002', NULL),
('STD-15052017063205', 1110000001, '2017-05-15', 'Accepted', '7777700000', NULL),
('STD-15052017063835', 1110000002, '2017-05-15', 'Accepted', '7777700000', NULL),
('STD-15052017064326', 1110000003, '2017-05-15', 'Rejected', NULL, 'Room Not Available'),
('STD-15092017021144', 1110000020, '2017-09-15', 'Accepted', '7777700000', NULL),
('STD-15092017021307', 1110000021, '2017-09-15', 'Accepted', '7777700001', NULL),
('STD-15092017021719', 1110000022, '2017-09-15', 'Forwarded', '7777700000', NULL),
('STD-15092017074711', 1110000011, '2017-09-15', 'Forwarded', '7777700000', NULL),
('STD-15092017075006', 1110000012, '2017-09-15', 'Accepted', '7777700001', NULL),
('STD-15092017075153', 1110000013, '2017-09-15', 'Rejected', NULL, 'Not elegible as hostel norms'),
('STD-15092017080216', 1110000014, '2017-09-15', 'Forwarded', '7777700002', NULL),
('STD-15092017083819', 1110000015, '2017-09-15', 'NEW', NULL, NULL),
('STD-15092017084228', 1110000016, '2017-09-15', 'NEW', NULL, NULL),
('STD-15092017090143', 1110000018, '2017-09-15', 'NEW', NULL, NULL),
('STD-15092017090407', 1110000019, '2017-09-15', 'NEW', NULL, NULL),
('STD-16052017010032', 1110000005, '2017-05-16', 'Forwarded', '7777700002', NULL),
('STD-16052017010250', 1110000006, '2017-05-16', 'Forwarded', '7777700001', NULL),
('STD-16052017125811', 1110000004, '2017-05-16', 'Rejected', NULL, 'Not elegible as hostel norms'),
('STD-19092017043447', 1110000024, '2017-09-19', 'Accepted', '7777700002', NULL),
('STD-19092017044006', 1110000023, '2017-09-19', 'Accepted', '7777700000', NULL),
('STD-22092017094016', 1110000025, '2017-09-22', 'Accepted', '7777700001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `std_inout_entry`
--

CREATE TABLE `std_inout_entry` (
  `id` int(10) NOT NULL,
  `student_id` bigint(30) NOT NULL,
  `out_date` date NOT NULL,
  `out_time` varchar(20) NOT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` varchar(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT IN OUT ENTRY';

--
-- Dumping data for table `std_inout_entry`
--

INSERT INTO `std_inout_entry` (`id`, `student_id`, `out_date`, `out_time`, `in_date`, `in_time`, `status`) VALUES
(1, 1110000001, '2017-09-13', '15:18', NULL, NULL, 'OUT'),
(2, 1110000001, '2017-09-28', '14:58', NULL, NULL, 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` bigint(30) NOT NULL,
  `admnregno` varchar(15) NOT NULL,
  `admnregdate` date NOT NULL,
  `branch` varchar(10) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `religon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT DETAILS TABLE ';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `admnregno`, `admnregdate`, `branch`, `semester`, `fname`, `lname`, `dob`, `gender`, `emailid`, `mobno`, `addressline1`, `addressline2`, `state`, `district`, `pincode`, `caste`, `religon`) VALUES
(1110000001, '95515100', '2017-07-15', 'MCA', 'S1', 'JIJIN ', 'EK', '1995-10-18', 'Male', 'ekjijin@gmail.com', '7907069308', 'vadakara', 'near ksrtc', 'Kerala', 'Kozhikode', '673105', 'OBC', 'Hindu'),
(1110000002, '95515101', '2017-07-15', 'Civil', 'S1', 'Anjali ', 'pp', '1995-02-24', 'Female', 'veenanjali116@gmail.com', '9746897108', 'kozhikode', 'near police stn', 'Kerala', 'Kozhikode', '673103', 'OBC', 'Muslim'),
(1110000003, '95515102', '2017-07-15', 'EEE', 'S1', 'Adheena ', 'A', '1995-04-15', 'Female', 'adheenaad15@gmail.com', '8946908152', 'pokran', 'near sarovaram', 'Kerala', 'Kozhikode', '562142', 'OBC', 'Christian'),
(1110000004, 'M009/15', '2015-06-15', 'MCA', 'S1', 'BIMAL ', 'DHAKAL', '1992-04-10', 'Male', 'bimal@gmail.com', '8957879218', 'VATAKARA', 'J.T. ROAD ', 'Kerala', 'Kozhikode', '673015', 'General', 'Hindu'),
(1110000005, 'M009/16', '2015-06-15', 'MCA', 'S2', 'RESHMA', 'C.K.', '1995-05-10', 'Female', 'reshma@gmail.com', '1245678901', 'MANIYOOR', 'VATAKARA', 'Kerala', 'Kozhikode', '673015', 'OBC', 'Hindu'),
(1110000006, 'M009/17', '2016-05-01', 'EEE', 'S3', 'ABC', 'EFG', '2017-05-10', 'Male', 'ABC@GMAIL.COM', '1245678901', 'J.T. ROAD', 'VATAKARA', 'Kerala', 'Kozhikode', '674015', 'OBC', 'Muslim'),
(1110000007, '11788', '2017-06-09', 'MCA', 'S1', 'BIMAL ', 'DHAKAL', '1992-04-10', 'Male', 'bimal@gmail.com', '8957879218', 'J.T. ROAD', 'VATAKARA', 'Kerala', 'Kozhikode', '673015', 'General', 'Hindu'),
(1110000008, 'M009/64', '2015-06-15', 'MCA', 'S1', 'MUSHTAQ ', 'MMM', '1992-05-10', 'Male', 'maq@gmail.com', '1245678900', 'mukkam', 'bus stand', 'Kerala', 'Kozhikode', '127891', 'General', 'Muslim'),
(1110000009, '12345', '2017-09-05', 'MCA', 'S1', 'fff', 'ffff', '2017-09-20', 'Male', 'gg@gmail.com', '8957879218', 'vcg', 'hf', 'Meghalaya', 'Malappuram', '123456', 'General', 'Hindu'),
(1110000010, '112224', '2017-09-15', 'MCA', 'S1', 'FXHCGKVFG', 'XXCXCC', '2017-09-15', 'Male', 'FFF@GMAIL.COM', '1234567890', 'HFXN', 'CXJMV, ', 'Kerala', 'Malappuram', '123456', 'General', 'Hindu'),
(1110000011, 'bfdgj55', '2017-09-15', 'MCA', 'S4', 'ehdxt', '', '2017-09-05', 'Male', 'anju@gmail.com', '1234567890', 'fgg', 'gghh', 'Maharashtra', 'Thiruvananthapuram', '123456', 'General', 'Hindu'),
(1110000012, 'varadha', '2017-09-14', 'MCA', 'S5', 'varadha', 'ci', '2017-09-12', 'Female', 'bimal.raj496@gmail.com', '2345678987', 'kkd', 'kkd', 'Jammu & Kashmir', 'Kollam', '234564', 'General', 'Hindu'),
(1110000013, 'ach134', '2017-09-06', 'MCA', 'S3', 'vf', 'df', '2017-09-13', 'Male', 'v@gmial.com', '2345676876', 'vd', 'vd', 'Meghalaya', 'Kozhikode', '324567', 'General', 'Muslim'),
(1110000014, 'ere11', '2017-09-15', 'MCA', 'S1', 'dhx', '', '2017-09-15', 'Male', 'anju@gmail.com', '1234411111', 'safdhb', 'dfhsnc', 'Madhya Pradesh', 'Palakkad', '123422', 'General', 'Hindu'),
(1110000015, '23456', '2017-09-15', 'MCA', 'S6', 'ee', '', '2017-09-16', 'Male', 'B@GMAIL.COM', '12345', 'www', 'ddd', 'Mizoram', 'Kozhikode', '123456', 'OBC', 'Hindu'),
(1110000016, '2266tt', '2017-09-15', 'CS', 'S4', 'reyy', '', '2017-09-16', 'Male', 'FFF@GMAIL.COM', '1234567890', 'srhn', 'dfh', 'Mizoram', 'Wayanadu', '123456', 'General', 'Hindu'),
(1110000018, 'eeee', '2017-09-16', 'MCA', 'S1', 'ttttttt', '', '2017-09-16', 'Male', 'gg@gmail.com', '1234512345', 'jgh', 'hlkhgl', 'Mizoram', 'Wayanadu', '123123', 'General', 'Hindu'),
(1110000019, 'tttt', '2017-09-15', 'MCA', 'S6', 'bmhg', '', '2017-09-22', 'Male', 'anju@gmail.com', '12345', 'tttttt', 'tttttt', 'Mizoram', 'Kannur', '234', 'General', 'Hindu'),
(1110000020, 'errrr', '2017-09-15', 'MCA', 'S1', 'trdhxfg', '', '2017-09-16', 'Male', 'bimal.raj496@gmail.com', '4444444444', 'zvxchbn ', 'xfcgv bn', 'Mizoram', 'Thiruvananthapuram', '123123', 'General', 'Hindu'),
(1110000021, 'etgaer', '2017-09-15', 'MCA', 'S1', 'esg', '', '2017-09-15', 'Male', 'anju@gmail.com', '1234', 'zbv', 'cbfv', 'Arunachal Pradesh', 'Thiruvananthapuram', '123456', 'General', 'Hindu'),
(1110000022, 'etgaer', '2017-09-15', 'MCA', 'S1', 'esg', '', '2017-09-15', 'Male', 'anju@gmail.com', '1234', 'zbv', 'cbfv', 'Arunachal Pradesh', 'Thiruvananthapuram', '123456', 'General', 'Hindu'),
(1110000023, '15M061/17', '2017-01-01', 'MCA', 'S1', 'MEGA STAR', 'EV', '1996-05-18', 'Male', 'megastar@gmail.com', '7541626352', 'asd', 'asdw', 'Kerala', 'Kozhikode', '854762', 'OBC', 'Hindu'),
(1110000024, '23456', '2017-09-19', 'MCA', 'S1', 'hdfhd', 'sg', '2017-09-19', 'Male', 'anju@gmail.com', '1234567890', 'kkd', 'RRRR', 'Maharashtra', 'Thiruvananthapuram', '123456', 'General', 'Hindu'),
(1110000025, 'm-031/2015', '2017-09-15', 'MCA', 'S1', 'BAJILNA ', 'PM', '1995-05-12', 'Female', 'bajilnapm@gmail.com', '8113873363', 'bajilna', 'baji', 'Kerala', 'Kozhikode', '673102', 'OBC', 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `student_bill_payment_master`
--

CREATE TABLE `student_bill_payment_master` (
  `tran_id` bigint(15) NOT NULL,
  `sinvno` varchar(15) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `hostel_id` varchar(15) NOT NULL,
  `bill_cycle` varchar(15) NOT NULL,
  `billing_date` date NOT NULL,
  `hostel_charge` bigint(20) NOT NULL,
  `mess_charge` bigint(20) DEFAULT '0',
  `laundry_charge` bigint(20) DEFAULT '0',
  `total_amount` bigint(20) NOT NULL,
  `payment_date` date NOT NULL,
  `paid_bill_amount` bigint(15) NOT NULL,
  `balance_amount` bigint(15) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT BILL PAYMENT MASTER';

--
-- Dumping data for table `student_bill_payment_master`
--

INSERT INTO `student_bill_payment_master` (`tran_id`, `sinvno`, `student_id`, `hostel_id`, `bill_cycle`, `billing_date`, `hostel_charge`, `mess_charge`, `laundry_charge`, `total_amount`, `payment_date`, `paid_bill_amount`, `balance_amount`, `status`) VALUES
(1, 'H-WUPH4BQZ5C', '1110000023', '7777700000', 'Sep-2017', '2017-09-28', 970, NULL, NULL, 970, '2017-09-28', 970, 0, 'Paid'),
(2, 'H-6XKJMU00C4', '1110000001', '7777700000', 'Sep-2017', '2017-09-28', 970, 68, 30, 1068, '2017-09-28', 1068, 0, 'Paid'),
(3, 'H-FRJNOSK350', '1110000002', '7777700000', 'Sep-2017', '2017-09-28', 970, 575, 20, 1565, '2017-09-28', 1565, 0, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `student_complaints`
--

CREATE TABLE `student_complaints` (
  `complaints_no` bigint(30) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaints_concern` varchar(255) NOT NULL,
  `hostel_id` bigint(30) NOT NULL,
  `roomno` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `complaint_by` bigint(30) NOT NULL,
  `complaint_status` varchar(50) NOT NULL,
  `attended_date` date DEFAULT NULL,
  `action_taken` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT COMPLAINTS TABLE';

--
-- Dumping data for table `student_complaints`
--

INSERT INTO `student_complaints` (`complaints_no`, `complaint_date`, `complaints_concern`, `hostel_id`, `roomno`, `description`, `complaint_by`, `complaint_status`, `attended_date`, `action_taken`) VALUES
(4092017050424, '2017-09-04', 'Electrical/Electricity Complaints', 7777700000, '201', 'HHHHH', 1110000001, 'Rectified', '2017-09-23', 'nvnvmnvm'),
(5092017115244, '2017-09-05', 'Electrical/Electricity Complaints', 7777700000, '201', 'NOT WORKING', 1110000001, 'Rectified', '2017-09-05', 'bmcxzbmvxn'),
(5092017124711, '2017-09-05', 'Others', 7777700000, '201', 'UUUUUUU', 1110000001, 'Rectified', '2017-09-05', 'hhhhhh'),
(5092017124743, '2017-09-05', 'Others', 7777700002, '201', 'YYYYYYYYYY', 1110000001, 'Rectified', '2017-09-05', 'fmnbzmvxnb'),
(13092017032819, '2017-09-13', 'Electrical/Electricity Complaints', 7777700000, '205', 'HHJGJCVNXB.LBN', 1110000001, 'Rectified', '2017-09-13', 'N,FDSMBJVC,CVBMCXVBMCXVNBMCVXNB'),
(22092017024112, '2017-09-22', 'Electrical/Electricity Complaints', 7777700001, '205', 'xcchvvmbn m', 1110000002, 'NEW', NULL, NULL),
(22092017030102, '2017-09-22', 'Water Supply Complaints', 7777700000, '502', 'jjjjj', 1110000007, 'NEW', NULL, NULL),
(22092017032803, '2017-09-22', 'Telephone and WiFi Complaints', 7777700001, '501', 'defegg', 1110000025, 'NEW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_hstlvacate_request`
--

CREATE TABLE `student_hstlvacate_request` (
  `requestno` bigint(30) NOT NULL,
  `request_date` date NOT NULL,
  `student_id` bigint(30) NOT NULL,
  `hostel_id` bigint(30) NOT NULL,
  `roomno` int(20) NOT NULL,
  `vacatedate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `req_granted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT HOSTEL VACATE REQUEST';

--
-- Dumping data for table `student_hstlvacate_request`
--

INSERT INTO `student_hstlvacate_request` (`requestno`, `request_date`, `student_id`, `hostel_id`, `roomno`, `vacatedate`, `status`, `req_granted_date`) VALUES
(4092017050522, '2017-09-04', 1110000001, 7777700000, 789, '2017-09-05', 'Approved', '2017-09-04'),
(13092017032733, '2017-09-13', 1110000001, 7777700000, 205, '2017-09-14', 'Approved', '2017-09-13'),
(22092017024038, '2017-09-22', 1110000002, 7777700000, 205, '2017-09-23', 'NEW', NULL),
(22092017025939, '2017-09-22', 1110000007, 7777700002, 205, '2017-09-28', 'NEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_request`
--

CREATE TABLE `student_leave_request` (
  `requestno` bigint(30) NOT NULL,
  `request_date` date NOT NULL,
  `student_id` bigint(30) NOT NULL,
  `hostel_id` bigint(30) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `req_granted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT LEAVE REQUEST TABLE ';

--
-- Dumping data for table `student_leave_request`
--

INSERT INTO `student_leave_request` (`requestno`, `request_date`, `student_id`, `hostel_id`, `from_date`, `to_date`, `reason`, `status`, `req_granted_date`) VALUES
(4092017050543, '2017-09-04', 1110000001, 7777700000, '2017-09-06', '2017-09-14', 'HFHFHGHG', 'Approved', '2017-09-04'),
(13092017032633, '2017-09-13', 1110000001, 7777700000, '2017-09-14', '2017-09-16', 'MY BROTHER\'S MARRIAGE ', 'Approved', '2017-09-13'),
(13092017033159, '2017-09-13', 1110000001, 7777700000, '2017-09-15', '2017-09-22', 'XFHCVN M VBH', 'Approved', '2017-09-13'),
(15052017010315, '2017-05-15', 1110000001, 7777700000, '2017-04-15', '2017-04-16', 'fdxfxdghg', 'Approved', '2017-09-13'),
(22092017023307, '2017-09-22', 1110000001, 7777700000, '2017-09-23', '2017-09-30', 'bvc nvgb ', 'NEW', NULL),
(22092017024004, '2017-09-22', 1110000002, 7777700000, '2017-09-23', '2017-09-30', 'fxhchn ', 'NEW', NULL),
(22092017025739, '2017-09-22', 1110000007, 7777700002, '2017-09-23', '2017-09-30', 'for my marage', 'NEW', NULL),
(22092017033053, '2017-09-22', 1110000025, 7777700001, '2017-09-22', '2017-09-25', 'wetuuiojmn', 'NEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_room_change_request`
--

CREATE TABLE `student_room_change_request` (
  `requestno` bigint(30) NOT NULL,
  `request_date` date NOT NULL,
  `student_id` bigint(30) NOT NULL,
  `hostel_id` bigint(30) NOT NULL,
  `currentroomno` varchar(20) NOT NULL,
  `willingroomno` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `req_granted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SRUDENT  ROOM CHANGE REQUEST';

--
-- Dumping data for table `student_room_change_request`
--

INSERT INTO `student_room_change_request` (`requestno`, `request_date`, `student_id`, `hostel_id`, `currentroomno`, `willingroomno`, `reason`, `status`, `req_granted_date`) VALUES
(4092017050607, '2017-09-04', 1110000001, 7777700000, '401', '701', 'FJHFJFH', 'Approved', '2017-09-04'),
(13092017032918, '2017-09-13', 1110000001, 7777700000, '205', '701', 'FNCXVM BV ', 'Approved', '2017-09-13'),
(22092017024138, '2017-09-22', 1110000002, 7777700000, '205', '701', 'dfhjncv ', 'NEW', NULL),
(22092017030203, '2017-09-22', 1110000007, 7777700002, '701', '601', 'nnmn', 'NEW', NULL),
(22092017030314, '2017-09-22', 1110000007, 7777700002, '701', '501', 'adfg', 'NEW', NULL),
(22092017032833, '2017-09-22', 1110000025, 7777700001, '501', '701', 'ereghki', 'NEW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userid` bigint(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user_flag` varchar(5) NOT NULL,
  `student_staff_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='USER LOGIN ';

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userid`, `username`, `password`, `user_flag`, `student_staff_id`) VALUES
(1313000000, 'HMSDEV', 'HMSDEV', 'DEV', 0),
(1313000001, 'hmsdev', 'hmsdev', 'DEV', 0),
(1313000002, 'OTHSTAFF', 'OTHSTAFF', 'OTHS', 0),
(1313000004, 'WARDEN', 'WARDEN', 'WRDN', 0),
(1313000005, 'warden', 'warden', 'WRDN', 0),
(1313000007, 'STUDENT', 'STUDENT', 'STDU', 1110000001),
(1313000008, 'veenanjali116@gmail.com', '9746897108', 'STDU', 1110000002),
(1313000009, 'maq@gmail.com', '1245678900', 'STDU', 1110000008),
(1313000010, 'bimal@gmail.com', '8957879218', 'STDU', 1110000007),
(1313000011, 'FFF@GMAIL.COM', '1234567890', 'STDU', 1110000010),
(1313000013, 'anju@gmail.com', '1234', 'STDU', 1110000021),
(1313000014, 'gg@gmail.com', '8957879218', 'STDU', 1110000009),
(1313000015, 'megastar@gmail.com', '7541626352', 'STDU', 1110000023),
(1313000016, 'athulkv@gmail.com', '1234567890', 'WRDN', 3333300002),
(1313000017, 'anju@gmail.com', '1234567890', 'STDU', 1110000024),
(1313000033, 'bajilnapm@gmail.com', '8113873363', 'STDU', 1110000025),
(1313000040, 'bimal.raj496@gmail.com', '1234567888', 'ADMN', 3333300008);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_details`
--

CREATE TABLE `visitor_details` (
  `visitorid` bigint(10) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `wardid` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='VISITOR DETAILS TABLE';

--
-- Dumping data for table `visitor_details`
--

INSERT INTO `visitor_details` (`visitorid`, `purpose`, `wardid`, `fname`, `lname`, `dob`, `gender`, `email`, `contactno`, `addressline1`, `addressline2`, `state`, `district`, `pincode`) VALUES
(9999900000, 'College Guest', '', 'ABC', 'EFG', '2017-05-10', 'Male', 'ABC@GMAIL.COM', '1245678910', 'J.T. ROAD', 'VATAKARA', 'Kerala', 'Kozhikode', '674015'),
(9999900001, 'To Meet Ward', '1110000004', 'XYZ', 'ABC', '1992-04-10', 'Male', 'XYZ@GMAIL.COM', '8957879218', 'J.T. ROAD', 'VATAKARA', 'Kerala', 'Kannur', '789456'),
(9999900002, 'College Guest', '', 'FFF', 'GGG', '1992-05-10', 'Female', 'FFF@GMAIL.COM', '8957879218', 'J.T. ROAD', 'VATAKARA', 'Kerala', 'Kozhikode', '678954'),
(9999900003, 'To Meet Ward', '1110000001', 'ADG', 'DSY', '2017-09-24', 'Male', 'B@GMAIL.COM', '1234567890', 'SRH', 'DFH', 'Karnataka', 'Thrissur', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_room`
--

CREATE TABLE `visitor_room` (
  `id` int(10) NOT NULL,
  `hostelid` bigint(30) NOT NULL,
  `allocatee_id` bigint(10) NOT NULL,
  `room_no` int(10) NOT NULL,
  `reqgrantdate` date NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='VISITOR ROOM TABLE';

-- --------------------------------------------------------

--
-- Table structure for table `vstrrequest`
--

CREATE TABLE `vstrrequest` (
  `vstreqno` varchar(30) NOT NULL,
  `visitorid` bigint(10) NOT NULL,
  `vstrreqdate` date NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `vstreqstatus` varchar(30) DEFAULT NULL,
  `hostelid` bigint(30) DEFAULT NULL,
  `rejection` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='VISITOR REQUEST TABLE';

--
-- Dumping data for table `vstrrequest`
--

INSERT INTO `vstrrequest` (`vstreqno`, `visitorid`, `vstrreqdate`, `checkindate`, `checkoutdate`, `vstreqstatus`, `hostelid`, `rejection`) VALUES
('VST-16052017010435', 9999900000, '2017-05-16', '2017-01-01', '2017-02-01', 'Forwarded', 7777700000, NULL),
('VST-16052017010646', 9999900001, '2017-05-16', '2017-05-16', '2017-05-17', 'Rejected', NULL, 'Not elegible as hostel norms'),
('VST-16052017010757', 9999900002, '2017-05-16', '2017-05-10', '2017-05-11', 'Forwarded', 7777700004, NULL),
('VST-24092017041520', 9999900003, '2017-09-24', '2017-09-24', '2017-09-26', 'NEW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vstr_inout_entry`
--

CREATE TABLE `vstr_inout_entry` (
  `token_no` bigint(30) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `student_id` bigint(30) NOT NULL,
  `in_date` date NOT NULL,
  `in_time` varchar(20) NOT NULL,
  `out_date` date DEFAULT NULL,
  `out_time` varchar(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='VISITOR IN OUT ENTRY TABLE';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_cycle`
--
ALTER TABLE `bill_cycle`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `bill_factor`
--
ALTER TABLE `bill_factor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostelid` (`hostelid`);

--
-- Indexes for table `bill_master_table`
--
ALTER TABLE `bill_master_table`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `event_entry_table`
--
ALTER TABLE `event_entry_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_details`
--
ALTER TABLE `hostel_details`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `laundaryentry`
--
ALTER TABLE `laundaryentry`
  ADD PRIMARY KEY (`laundaryid`);

--
-- Indexes for table `laundary_service`
--
ALTER TABLE `laundary_service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `laundry_invoice`
--
ALTER TABLE `laundry_invoice`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `laundry_order`
--
ALTER TABLE `laundry_order`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `messentry`
--
ALTER TABLE `messentry`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `mess_invoice`
--
ALTER TABLE `mess_invoice`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `mess_order`
--
ALTER TABLE `mess_order`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `news_entry_table`
--
ALTER TABLE `news_entry_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_details`
--
ALTER TABLE `parents_details`
  ADD PRIMARY KEY (`parents_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `publicfeed`
--
ALTER TABLE `publicfeed`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `room_allotment`
--
ALTER TABLE `room_allotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_id` (`hostel_id`),
  ADD KEY `allocatee_id` (`allocatee_id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`Staff_id`),
  ADD KEY `hostelid` (`hostelid`);

--
-- Indexes for table `stdrequest`
--
ALTER TABLE `stdrequest`
  ADD PRIMARY KEY (`requestno`),
  ADD UNIQUE KEY `requestno` (`requestno`),
  ADD KEY `stdudent_id` (`stdudent_id`);

--
-- Indexes for table `std_inout_entry`
--
ALTER TABLE `std_inout_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `student_bill_payment_master`
--
ALTER TABLE `student_bill_payment_master`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `student_complaints`
--
ALTER TABLE `student_complaints`
  ADD PRIMARY KEY (`complaints_no`),
  ADD KEY `complaint_by` (`complaint_by`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `student_hstlvacate_request`
--
ALTER TABLE `student_hstlvacate_request`
  ADD PRIMARY KEY (`requestno`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `student_leave_request`
--
ALTER TABLE `student_leave_request`
  ADD PRIMARY KEY (`requestno`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `student_room_change_request`
--
ALTER TABLE `student_room_change_request`
  ADD PRIMARY KEY (`requestno`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `student_staff_id` (`student_staff_id`);

--
-- Indexes for table `visitor_details`
--
ALTER TABLE `visitor_details`
  ADD PRIMARY KEY (`visitorid`);

--
-- Indexes for table `visitor_room`
--
ALTER TABLE `visitor_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostelid` (`hostelid`),
  ADD KEY `hostelid_2` (`hostelid`),
  ADD KEY `allocatee_id` (`allocatee_id`);

--
-- Indexes for table `vstrrequest`
--
ALTER TABLE `vstrrequest`
  ADD UNIQUE KEY `vstreqno` (`vstreqno`),
  ADD KEY `visitorid` (`visitorid`),
  ADD KEY `hostelid` (`hostelid`);

--
-- Indexes for table `vstr_inout_entry`
--
ALTER TABLE `vstr_inout_entry`
  ADD PRIMARY KEY (`token_no`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_cycle`
--
ALTER TABLE `bill_cycle`
  MODIFY `trn_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bill_factor`
--
ALTER TABLE `bill_factor`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `bill_master_table`
--
ALTER TABLE `bill_master_table`
  MODIFY `trn_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `messageid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `event_entry_table`
--
ALTER TABLE `event_entry_table`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hostel_details`
--
ALTER TABLE `hostel_details`
  MODIFY `hostel_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `laundaryentry`
--
ALTER TABLE `laundaryentry`
  MODIFY `laundaryid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2226;
--
-- AUTO_INCREMENT for table `laundary_service`
--
ALTER TABLE `laundary_service`
  MODIFY `serviceid` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laundry_invoice`
--
ALTER TABLE `laundry_invoice`
  MODIFY `trn_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laundry_order`
--
ALTER TABLE `laundry_order`
  MODIFY `trn_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `messentry`
--
ALTER TABLE `messentry`
  MODIFY `foodid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55008;
--
-- AUTO_INCREMENT for table `mess_invoice`
--
ALTER TABLE `mess_invoice`
  MODIFY `tran_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mess_order`
--
ALTER TABLE `mess_order`
  MODIFY `trn_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news_entry_table`
--
ALTER TABLE `news_entry_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parents_details`
--
ALTER TABLE `parents_details`
  MODIFY `parents_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `publicfeed`
--
ALTER TABLE `publicfeed`
  MODIFY `feedbackid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_allotment`
--
ALTER TABLE `room_allotment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `Staff_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `std_inout_entry`
--
ALTER TABLE `std_inout_entry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110000026;
--
-- AUTO_INCREMENT for table `student_bill_payment_master`
--
ALTER TABLE `student_bill_payment_master`
  MODIFY `tran_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userid` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313000041;
--
-- AUTO_INCREMENT for table `visitor_details`
--
ALTER TABLE `visitor_details`
  MODIFY `visitorid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `visitor_room`
--
ALTER TABLE `visitor_room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vstr_inout_entry`
--
ALTER TABLE `vstr_inout_entry`
  MODIFY `token_no` bigint(30) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_factor`
--
ALTER TABLE `bill_factor`
  ADD CONSTRAINT `bill_factor_ibfk_1` FOREIGN KEY (`hostelid`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents_details`
--
ALTER TABLE `parents_details`
  ADD CONSTRAINT `parents_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_allotment`
--
ALTER TABLE `room_allotment`
  ADD CONSTRAINT `room_allotment_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allotment_ibfk_2` FOREIGN KEY (`allocatee_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD CONSTRAINT `staff_details_ibfk_1` FOREIGN KEY (`hostelid`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stdrequest`
--
ALTER TABLE `stdrequest`
  ADD CONSTRAINT `stdrequest_ibfk_1` FOREIGN KEY (`stdudent_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_inout_entry`
--
ALTER TABLE `std_inout_entry`
  ADD CONSTRAINT `std_inout_entry_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_complaints`
--
ALTER TABLE `student_complaints`
  ADD CONSTRAINT `student_complaints_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_complaints_ibfk_2` FOREIGN KEY (`complaint_by`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_hstlvacate_request`
--
ALTER TABLE `student_hstlvacate_request`
  ADD CONSTRAINT `student_hstlvacate_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_hstlvacate_request_ibfk_2` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_leave_request`
--
ALTER TABLE `student_leave_request`
  ADD CONSTRAINT `student_leave_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_leave_request_ibfk_2` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_room_change_request`
--
ALTER TABLE `student_room_change_request`
  ADD CONSTRAINT `student_room_change_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_room_change_request_ibfk_2` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_room`
--
ALTER TABLE `visitor_room`
  ADD CONSTRAINT `visitor_room_ibfk_1` FOREIGN KEY (`hostelid`) REFERENCES `hostel_details` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_room_ibfk_2` FOREIGN KEY (`allocatee_id`) REFERENCES `visitor_details` (`visitorid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_room_ibfk_3` FOREIGN KEY (`allocatee_id`) REFERENCES `vstrrequest` (`visitorid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vstrrequest`
--
ALTER TABLE `vstrrequest`
  ADD CONSTRAINT `vstrrequest_ibfk_1` FOREIGN KEY (`visitorid`) REFERENCES `visitor_details` (`visitorid`);

--
-- Constraints for table `vstr_inout_entry`
--
ALTER TABLE `vstr_inout_entry`
  ADD CONSTRAINT `vstr_inout_entry_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
