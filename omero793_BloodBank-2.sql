-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2017 at 10:34 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omero793_BloodBank`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`omero793`@`localhost` PROCEDURE `b_blood_count` ()  BEGIN
	SELECT COUNT(*) FROM Blood_Donations WHERE blood_type = 'B+' ;
END$$

CREATE DEFINER=`omero793`@`localhost` PROCEDURE `b_count` ()  BEGIN
	SELECT COUNT(*) FROM Blood_Donations;
END$$

CREATE DEFINER=`omero793`@`localhost` PROCEDURE `o_negative_count` ()  begin 
	SELECT count(*) FROM Blood_Donations WHERE blood_type = 'o-';
END$$

--
-- Functions
--
CREATE DEFINER=`omero793`@`localhost` FUNCTION `more_don` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN
if (SELECT COUNT(*) FROM Blood_Donations) < 20 THEN
    RETURN "Need more donations"; 
end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `accreport`
-- (See below for the actual view)
--
CREATE TABLE `accreport` (
`f_name` varchar(255)
,`l_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `Blood_Donations`
--

CREATE TABLE `Blood_Donations` (
  `donor_id` int(11) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `donation_id` int(11) NOT NULL,
  `is_blood_valid` varchar(5) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Blood_Donations`
--

INSERT INTO `Blood_Donations` (`donor_id`, `blood_type`, `donation_id`, `is_blood_valid`, `f_name`, `l_name`) VALUES
(1, 'B+', 12, ' yes', ' Omer ', ' Omer'),
(1, ' B+', 13, ' Yes', ' Omer ', ' Omer'),
(99, 'AB-', 42, 'no', 'Clark ', 'Kent'),
(99, 'O-', 324, 'yes', 'Mike', 'Mike'),
(99, 'O-', 1234, 'yes', 'Tom', 'Bob'),
(87, 'B-', 21345, 'no', 'Mike', 'JO');

--
-- Triggers `Blood_Donations`
--
DELIMITER $$
CREATE TRIGGER `badbood` AFTER INSERT ON `Blood_Donations` FOR EACH ROW BEGIN 
	if new.is_blood_valid = 'no' then 
    INSERT into Invalid_blood (donation_id) VALUES (new.donation_id);
  end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Blood_inventory`
--

CREATE TABLE `Blood_inventory` (
  `donation_id` int(11) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Blood_inventory`
--

INSERT INTO `Blood_inventory` (`donation_id`, `blood_type`) VALUES
(12, ' B+'),
(12, ' A+'),
(12, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `Donor`
--

CREATE TABLE `Donor` (
  `donor_id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Donor`
--

INSERT INTO `Donor` (`donor_id`, `f_name`, `l_name`) VALUES
(1, ' OMER ', ' Omer '),
(36, 'Tom', ' BO'),
(76, ' Tom  ', ' Moe'),
(87, 'Harry ', 'Man'),
(99, ' Joe  ', ' MAMA');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ereport`
-- (See below for the actual view)
--
CREATE TABLE `ereport` (
`f_name` varchar(255)
,`l_name` varchar(255)
,`accident_type` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `find_omer`
-- (See below for the actual view)
--
CREATE TABLE `find_omer` (
`donor_id` int(11)
,`blood_type` varchar(255)
,`donation_id` int(11)
,`is_blood_valid` varchar(5)
,`f_name` varchar(255)
,`l_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`name`, `city`, `state`) VALUES
(' GMH', ' Greenville ', ' SC'),
(' MUSC', ' CHS ', ' SC');

-- --------------------------------------------------------

--
-- Table structure for table `Invalid_blood`
--

CREATE TABLE `Invalid_blood` (
  `donation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Invalid_blood`
--

INSERT INTO `Invalid_blood` (`donation_id`) VALUES
(21345),
(231),
(42);

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `patient_id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`patient_id`, `f_name`, `l_name`) VALUES
(1, ' Omer ', ' Omer'),
(10, ' Leo ', ' Messi'),
(14, ' Jane ', ' Lane'),
(43, ' Sam  ', 'downs'),
(65, ' Mike ', ' Woe');

-- --------------------------------------------------------

--
-- Table structure for table `Patient_Accident`
--

CREATE TABLE `Patient_Accident` (
  `patient_id` int(11) DEFAULT NULL,
  `accident_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient_Accident`
--

INSERT INTO `Patient_Accident` (`patient_id`, `accident_type`) VALUES
(1, ' Auto'),
(10, ' Bike'),
(43, ' Shark');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `accident_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`f_name`, `l_name`, `accident_type`) VALUES
(' Omer ', ' Omer', ' Auto'),
(' Leo ', ' Messi', ' Bike');

-- --------------------------------------------------------

--
-- Structure for view `accreport`
--
DROP TABLE IF EXISTS `accreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`omero793`@`localhost` SQL SECURITY DEFINER VIEW `accreport`  AS  select `Patient`.`f_name` AS `f_name`,`Patient`.`l_name` AS `l_name` from (`Patient` join `Patient_Accident` on((`Patient_Accident`.`patient_id` = `Patient`.`patient_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `ereport`
--
DROP TABLE IF EXISTS `ereport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`omero793`@`localhost` SQL SECURITY DEFINER VIEW `ereport`  AS  select `Patient`.`f_name` AS `f_name`,`Patient`.`l_name` AS `l_name`,`Patient_Accident`.`accident_type` AS `accident_type` from (`Patient` join `Patient_Accident` on((`Patient`.`patient_id` = `Patient_Accident`.`patient_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `find_omer`
--
DROP TABLE IF EXISTS `find_omer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`omero793`@`localhost` SQL SECURITY DEFINER VIEW `find_omer`  AS  select `Blood_Donations`.`donor_id` AS `donor_id`,`Blood_Donations`.`blood_type` AS `blood_type`,`Blood_Donations`.`donation_id` AS `donation_id`,`Blood_Donations`.`is_blood_valid` AS `is_blood_valid`,`Blood_Donations`.`f_name` AS `f_name`,`Blood_Donations`.`l_name` AS `l_name` from `Blood_Donations` where (`Blood_Donations`.`f_name` = 'Omer') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Blood_Donations`
--
ALTER TABLE `Blood_Donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `Blood_Donations` (`donor_id`);

--
-- Indexes for table `Blood_inventory`
--
ALTER TABLE `Blood_inventory`
  ADD KEY `Blood_inventory_key` (`donation_id`);

--
-- Indexes for table `Donor`
--
ALTER TABLE `Donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `Hospital`
--
ALTER TABLE `Hospital`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `Patient_Accident`
--
ALTER TABLE `Patient_Accident`
  ADD KEY `Patient_Accident_id` (`patient_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Blood_Donations`
--
ALTER TABLE `Blood_Donations`
  ADD CONSTRAINT `Blood_Donations` FOREIGN KEY (`donor_id`) REFERENCES `Donor` (`donor_id`);

--
-- Constraints for table `Blood_inventory`
--
ALTER TABLE `Blood_inventory`
  ADD CONSTRAINT `Blood_inventory_key` FOREIGN KEY (`donation_id`) REFERENCES `Blood_Donations` (`donation_id`);

--
-- Constraints for table `Patient_Accident`
--
ALTER TABLE `Patient_Accident`
  ADD CONSTRAINT `Patient_Accident_id` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
