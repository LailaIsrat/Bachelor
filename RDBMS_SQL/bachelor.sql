-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 06:32 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bachelor`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_order`
--

CREATE TABLE `b_order` (
  `Lunch_Amount` int(10) DEFAULT NULL,
  `Guest_Lunch_Amount` int(10) DEFAULT NULL,
  `Dinner_amount` int(10) DEFAULT NULL,
  `Guest_Dinner_Amount` int(10) DEFAULT NULL,
  `Total_Lunch` int(10) DEFAULT NULL,
  `Total_Dinner` int(10) DEFAULT NULL,
  `Total_Meal` int(10) DEFAULT NULL,
  `Total_cost` int(20) DEFAULT NULL,
  `Meal_Rate` int(20) DEFAULT NULL,
  `To_Pay` int(10) DEFAULT NULL,
  `Paid_Amount` int(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `User_ID` int(17) DEFAULT NULL,
  `Order_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Local_Guardians_Name` varchar(100) NOT NULL,
  `Guardians_Mobile_No` varchar(100) NOT NULL,
  `Birth_Certificate_NO` int(27) DEFAULT NULL,
  `National_ID_Card_No` int(27) DEFAULT NULL,
  `University_Name` varchar(100) DEFAULT NULL,
  `University_ID` int(70) DEFAULT NULL,
  `Company_Name` varchar(100) DEFAULT NULL,
  `Employ_ID` int(70) DEFAULT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `Password` varchar(13) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `House` varchar(100) NOT NULL,
  `Flat` varchar(100) DEFAULT NULL,
  `Road` varchar(100) DEFAULT NULL,
  `User_ID` int(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_order`
--
ALTER TABLE `b_order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_order`
--
ALTER TABLE `b_order`
  MODIFY `Order_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `b_order`
--
ALTER TABLE `b_order`
  ADD CONSTRAINT `b_order_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_info` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
