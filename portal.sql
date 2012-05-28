-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2012 at 11:08 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `ID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `CampaignName` varchar(100) NOT NULL,
  `CampaignDescription` varchar(200) NOT NULL,
  `Status` varchar(10) NOT NULL,
  UNIQUE KEY `UNIQUE` (`CampaignName`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`ID`, `CampaignName`, `CampaignDescription`, `Status`) VALUES
(4, 'ADMIN', 'Campaign used for Admins', 'Live'),
(2, 'Energy', 'Energy campaign', 'Live'),
(1, 'FFG', 'FFG Description', 'Live'),
(3, 'Retirement', 'Retirement', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `ffg-campaign`
--

CREATE TABLE IF NOT EXISTS `ffg-campaign` (
  `ID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `PhoneNumber` varchar(12) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(15) NOT NULL,
  `ZIPCode` varchar(12) NOT NULL,
  `Working` varchar(15) NOT NULL,
  `AgeGroup` varchar(10) NOT NULL,
  `IncomeGroup` varchar(10) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `DAppointment` varchar(25) NOT NULL,
  `TAppointment` varchar(25) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ffg-campaign`
--

INSERT INTO `ffg-campaign` (`ID`, `PhoneNumber`, `FirstName`, `MiddleName`, `LastName`, `CompanyName`, `Address`, `City`, `State`, `ZIPCode`, `Working`, `AgeGroup`, `IncomeGroup`, `Email`, `DAppointment`, `TAppointment`, `Comments`) VALUES
(1, '1234567899', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Full Time', '18-24', '29-39', 'asd@gmail.com', '06-20-2012', '09:00pm', 'comment change test on 1234567899'),
(2, '9999999999', 'Suspendisse g asdasd', 'Suspendisse asd', 'Suspendisasdse ', 'Suspendisse asd', 'Suspendisse asd', 'Suspendisse ', 'Suspendisse ', 'Suspendisse ', 'Full Time', '18-24', '29-39', 'asd@gmail.com', '06-20-2012', '09:00pm', 'agasdaggasdasdfasd'),
(3, '5555555555', 'Rachel ', 'B', 'Beroin', 'ICC', 'TGU', 'CEBu', 'Cebu', '6000', 'Full Time', '24-30', '200k', 'rachel@insta-payment.com', 'Tommorrow', 'Noon', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Campaign` varchar(100) NOT NULL,
  `Level` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  UNIQUE KEY `UNIQUE` (`UserName`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `Name`, `Password`, `Campaign`, `Level`, `Status`) VALUES
(1, 'Marion', 'Marion Peter', '$2a$08$nDicTZa35OeGN.CqqEF8wOEFU/eV9FF3Q/cp7l/GwD6lLTt/oighS', 'FFG', 'Agent', 'enabled'),
(2, 'MarionAdmin', 'Marion Serenio', '$2a$08$8DMlDdTG1AchSwMYqZpj8eZKlcoho/X5049IzKXnOz4auOG4Fksp2', 'Retirement', 'Admin', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
