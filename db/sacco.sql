-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 02:48 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sacco`
--
CREATE DATABASE IF NOT EXISTS `sacco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sacco`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `marital` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `county` varchar(200) NOT NULL,
  `limit_checker` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`customer_id`, `fname`, `sname`, `lname`, `mobile`, `dob`, `gender`, `marital`, `id`, `occupation`, `email`, `address`, `county`, `limit_checker`) VALUES
(1, 'Luxury House', 'df', 'ew', '0704445453', '2021-10-12', 'Male', 'dsd', '43434', 'sd', 'cecilia@gmail.com', 'zxsd', 'Nairobi', 0),
(2, 'Fred ', 'Omondi', 'Lec', '0802323', '2021-10-28', 'Male', 'married', '223233223', 'Lecture', 'lec@omondi.co.ke', 'kcau', 'Nairobi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE IF NOT EXISTS `counties` (
  `countyid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`countyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`countyid`, `name`) VALUES
(1, 'Nairobi'),
(2, 'Mombasa');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `genderid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`genderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderid`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `loan_application_details`
--

CREATE TABLE IF NOT EXISTS `loan_application_details` (
  `application_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `tbl_loansapplication_id` int(11) NOT NULL,
  `loan_status` varchar(200) NOT NULL,
  PRIMARY KEY (`application_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `loan_application_details`
--

INSERT INTO `loan_application_details` (`application_details_id`, `loan_id`, `tbl_loansapplication_id`, `loan_status`) VALUES
(12, 1, 13, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

CREATE TABLE IF NOT EXISTS `tbl_loans` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `loanName` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `loansAvailable` int(11) NOT NULL,
  `isActive` varchar(200) NOT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_loans`
--

INSERT INTO `tbl_loans` (`loan_id`, `loanName`, `duration`, `price`, `loansAvailable`, `isActive`) VALUES
(1, 'SHort Loan', '1 Month', 500, 16, 'Y'),
(3, 'Standard Loan', '1 Month', 3000, 14, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loansapplication`
--

CREATE TABLE IF NOT EXISTS `tbl_loansapplication` (
  `tbl_loansapplication_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date_requested` varchar(200) NOT NULL,
  `due_date` varchar(200) NOT NULL,
  `date_canceled` varchar(200) NOT NULL,
  PRIMARY KEY (`tbl_loansapplication_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_loansapplication`
--

INSERT INTO `tbl_loansapplication` (`tbl_loansapplication_id`, `customer_id`, `loan_id`, `date_requested`, `due_date`, `date_canceled`) VALUES
(13, 2, 1, 'Wed Oct 2021', 'Fri 11 2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_savings`
--

CREATE TABLE IF NOT EXISTS `tbl_savings` (
  `tbl_savings_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_contributed` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`tbl_savings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_savings`
--

INSERT INTO `tbl_savings` (`tbl_savings_id`, `customer_id`, `amount`, `date_contributed`, `status`) VALUES
(4, 1, 50000, 'Wed Oct 2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
