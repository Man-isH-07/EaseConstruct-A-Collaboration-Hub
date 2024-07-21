-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 05:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easeconstruct`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `cat_id` int(100) NOT NULL,
  `cat_mail` varchar(100) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_desc` varchar(800) NOT NULL,
  `cat_amt` varchar(100) NOT NULL,
  `cat_copy` varchar(800) NOT NULL,
  `cat_thumb` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`cat_id`, `cat_mail`, `cat_name`, `cat_desc`, `cat_amt`, `cat_copy`, `cat_thumb`) VALUES
(2, 'manish@gmail.com', 'MyDesign', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet unde est qui vel autem labore? Delectus modi vero aut illum voluptas, est aliquid, expedita labore eos error accusantium repellat laborum?', '10k - 50k', '1150-DT20234631754_Application.pdf', '3480-pexels-rodrigo-souza-2531709.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `owner_mail` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `owner_mail`, `file_name`, `uploaded_on`) VALUES
(1, 'manish@gmail.com', 'Architecture_PastWork/VS-03.jpg', '2024-04-20 07:41:49'),
(2, 'manish@gmail.com', 'Architecture_PastWork/kids-room-interior-designs.jpg', '2024-04-20 07:41:49'),
(3, 'manish@gmail.com', 'Architecture_PastWork/vs-56.jpg', '2024-04-20 07:41:49'),
(4, 'manish@gmail.com', 'Architecture_PastWork/home-design.jpg', '2024-04-20 07:41:49'),
(5, 'manish@gmail.com', 'Architecture_PastWork/VS-06.jpg', '2024-04-20 07:41:49'),
(6, 'manish@gmail.com', 'Architecture_PastWork/vs-000.jpg', '2024-04-20 07:41:49'),
(7, 'manish@gmail.com', 'Architecture_PastWork/vs-9.jpg', '2024-04-20 07:41:49'),
(8, 'manish@gmail.com', 'Architecture_PastWork/vs-5.jpg', '2024-04-20 07:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `registered_architecture`
--

CREATE TABLE `registered_architecture` (
  `arch_id` int(100) NOT NULL,
  `arch_name` varchar(100) NOT NULL,
  `arch_mobile` text NOT NULL,
  `arch_dob` date NOT NULL,
  `arch_mail` varchar(100) NOT NULL,
  `arch_pass` varchar(100) NOT NULL,
  `arch_c_pass` varchar(100) NOT NULL,
  `arch_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_architecture`
--

INSERT INTO `registered_architecture` (`arch_id`, `arch_name`, `arch_mobile`, `arch_dob`, `arch_mail`, `arch_pass`, `arch_c_pass`, `arch_photo`) VALUES
(1, 'Manish Prakashrao Dhaye', '22222', '2024-03-13', 'manish@gmail.com', '11', '11', 'user.png'),
(3, 'Mandar', '1234567', '2024-05-01', 'mandar@gmail.com', '1111', '1111', '4911-Vpract5a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

CREATE TABLE `registered_customer` (
  `cus_id` int(100) NOT NULL,
  `cus_name` varchar(1000) NOT NULL,
  `cus_mobile` text NOT NULL,
  `cus_dob` date NOT NULL,
  `cus_mail` varchar(100) NOT NULL,
  `cus_pass` varchar(100) NOT NULL,
  `cus_c_pass` varchar(100) NOT NULL,
  `cus_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_customer`
--

INSERT INTO `registered_customer` (`cus_id`, `cus_name`, `cus_mobile`, `cus_dob`, `cus_mail`, `cus_pass`, `cus_c_pass`, `cus_photo`) VALUES
(26, 'manish', '7757063698', '2024-02-27', 'manish@gmail.com', '1111', '1111', 'user.png'),
(29, 'Mandar', '1234', '2024-05-01', 'mandar@gmail.com', '1234', '1234', '4053-UseCaseDiagram1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_architecture`
--
ALTER TABLE `registered_architecture`
  ADD PRIMARY KEY (`arch_id`);

--
-- Indexes for table `registered_customer`
--
ALTER TABLE `registered_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registered_architecture`
--
ALTER TABLE `registered_architecture`
  MODIFY `arch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registered_customer`
--
ALTER TABLE `registered_customer`
  MODIFY `cus_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
