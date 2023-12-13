-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 06:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_password`, `admin_id`) VALUES
('adminas@gmail.com', 'adminas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `booked_time` varchar(50) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `status`, `invoice_no`, `feedback`, `booked_time`, `created_date`) VALUES
(10, 1, 102, NULL, '', '', '2:00-2:30', '2023-04-26'),
(13, 1, 109, NULL, '', '', '1:30-2:00', '2023-11-23'),
(11, 1, 110, NULL, '', '', '2:30-3:00', '2023-04-26'),
(9, 2, 101, NULL, '', '', '2:00-2:30', '2023-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_info`
--

CREATE TABLE `doctors_info` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `doctor_specialization` varchar(30) NOT NULL,
  `doctor_phone` varchar(10) NOT NULL,
  `doctor_email` varchar(30) NOT NULL,
  `doctor_available` varchar(30) NOT NULL,
  `doctor_availability` varchar(30) NOT NULL,
  `doctor_password` varchar(30) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_info`
--

INSERT INTO `doctors_info` (`doctor_id`, `doctor_name`, `doctor_specialization`, `doctor_phone`, `doctor_email`, `doctor_available`, `doctor_availability`, `doctor_password`, `photo`) VALUES
(101, 'A', 'general medicine', '9801029384', 'doctor1@gmail.com', 'mon-fri ', '10am -3pm ', 'doctor1', ''),
(102, 'B', 'general medicine', '9809287457', 'doctor2@gmail.com', 'mon-fri ', '11am -3pm', 'doctor2', ''),
(103, 'C', 'neurology', '9812345678', 'doctor3@gmail.com', 'sun-thurs ', '10am -3pm', 'doctor3', ''),
(104, 'D', 'cardiology', '9876890321', 'doctor4@gmail.com', 'sun-fri ', '10am -2pm', 'doctor4', ''),
(105, 'E', 'cardiology', '9809890675', 'doctor5@gmail.com', 'mon-sat ', '10am -4pm', 'doctor5', ''),
(106, 'F', 'cardiology', '9800908909', 'doctor6@gmail.com', 'tues-sat ', '10am -3pm', 'doctor6', ''),
(107, 'G', 'general medicine', '9801029384', 'doctor7@gmail.com', 'mon-sat ', '10am -3pm', 'doctor7', ''),
(108, 'H', 'neurology', '9801091234', 'doctor8@gmail.com', 'mon-sat ', '11am -4pm', 'doctor8', ''),
(109, 'I', 'dermatology', '9018902345', 'doctor9@gmail.com', 'sun-thurs', '10am-4pm', 'doctor9', ''),
(110, 'J', 'dermatology', '9018902345', 'doctor10@gmail.com', 'mon-sat', '10am-3pm', 'doctor10', ''),
(111, 'K', 'dental', '9809123456', 'doctor11@gmail.com', 'sun-thurs', '10am-4pm', 'doctor11', ''),
(112, 'L', 'dental', '989990099', 'doctor13@gmail.com', 'mon-sat', '10am-3pm', 'doctor13', ''),
(113, 'M', 'ent', '9809123456', 'doctor14gmail.com', 'sun-thurs', '10am-4pm', 'doctor14', ''),
(114, 'N', 'ent', '9809003456', 'doctor15gmail.com', 'mon-sat', '11am-4pm', 'doctor15', ''),
(116, 'O', 'gynaecology', '989990099', 'doctor16@gmail.com', 'mon-sat', '10am-3pm', 'doctor16', ''),
(117, 'P', 'gynaecology', '9809123400', 'doctor17@gmail.com', 'sun-thurs', '10am-4pm', 'doctor17', ''),
(118, 'Q', 'neurology', '9809003411', 'doctor18@gmail.com', 'mon-sat', '11am-4pm', 'doctor18', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients_info`
--

CREATE TABLE `patients_info` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_phone` varchar(10) NOT NULL,
  `patient_address` varchar(30) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `patient_gender` varchar(6) NOT NULL,
  `patient_email` varchar(30) NOT NULL,
  `patient_password` varchar(30) NOT NULL,
  `patient_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_info`
--

INSERT INTO `patients_info` (`patient_id`, `patient_name`, `patient_phone`, `patient_address`, `patient_age`, `patient_gender`, `patient_email`, `patient_password`, `patient_dob`) VALUES
(1, 'Sarishma Ghale', '9909098175', 'kathmandu', 20, 'female', 'patient1@gmail.com', 'patient1', '2002-07-25'),
(2, 'patient2', '9012345678', 'jgmodifjg', 32, 'Male', 'patient2@gmail.com', 'patient2', '0000-00-00'),
(3, 'patient3', '9023459867', 'kjshdu', 16, 'Other', 'patient3@gmail.com', 'patient3', '0000-00-00'),
(4, 'patient4', '9012389456', 'iuhuyg', 15, 'male', 'patient4@gmail.com', 'patient4', '0000-00-00'),
(5, 'patient5', '9012987563', 'dvdzxvf', 16, 'female', 'patient5@gmail.com', 'patient5', '0000-00-00'),
(6, 'Aayusha Ghimire', '9811000000', 'Rampur', 16, 'Other', 'patient6@gmail.com', 'patient6', '0000-00-00'),
(7, 'patient7', '9010948726', 'jhcuksydgvfd', 17, 'Other', 'patient7@gmail.com', 'patient7', '0000-00-00'),
(8, 'patient8', '9019034990', 'bxckhgsvc', 18, 'female', 'patient8@gmail.com', 'patient8', '0000-00-00'),
(10, 'patient9', '9801290478', 'sihdfoyasd', 17, 'male', 'patient9@gmail.com', 'patient9', '0000-00-00'),
(11, 'patient10', '9010099223', 'dfnisuyg', 17, 'female', 'patient10@gmail.com', 'patient10', '0000-00-00'),
(12, 'patient11', '9800001111', 'sdfsdfa', 20, 'female', 'patient11@gmail.com', 'patient11', '0000-00-00'),
(16, 'mm', '9000000000', 'mm', 22, 'female', 'mm@gmail.com', 'mm', '0000-00-00'),
(19, '@the_real_safal', '9865206654', 'Jamunapur, Ratananager-12, Chi', 22, 'male', 'irakihda.lafas@gmail.com', '@safaladhikari1234567890', '0000-00-00'),
(20, 'Aryan', '9801092834', 'Kathmandu', 19, 'male', 'aryan@gmail.com', 'aryan', '2002-07-25'),
(21, 'Kripa Sapkota', '9810203040', 'Bharatpur-12', 22, 'female', 'kripa@gmail.com', 'kripa', '0000-00-00'),
(22, 'Pallavi Pandeya', '9809089192', 'Bharatpur', 22, 'female', 'pallavi@gmail.com', 'pallavi', '0000-00-00'),
(26, 'mark prin', '9800000000', 'thailand', 32, 'male', 'mark@gmail.com', 'mark', '1990-02-01'),
(27, 'Saurab Sapkota', '9801129834', 'Bharatpur', 32, 'male', 'saurab@gmail.com', 'saurab', '1990-04-01'),
(28, 'Shubham Shahi', '9801092845', 'Pokhara', 16, 'male', 'shubham@gmail.com', 'shubham', '2006-12-01'),
(29, 'Aayusha Ghimire', '9000000000', 'Bharatpur', 17, 'female', 'aayusha12@gmail.com', 'aayusha12', '2005-05-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`patient_id`,`doctor_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patients_info`
--
ALTER TABLE `patients_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors_info`
--
ALTER TABLE `doctors_info`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `patients_info`
--
ALTER TABLE `patients_info`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
