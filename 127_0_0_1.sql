-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 02:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--
CREATE DATABASE IF NOT EXISTS `furniture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `furniture`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(50) NOT NULL,
  `Customername` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phNo` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateofBirth` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Customername`, `address`, `phNo`, `gender`, `email`, `dateofBirth`, `username`, `password`) VALUES
('C_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', 'Female', 'nyeinyadanartun2001@gmail.com', '2001-04-17', 'Nyein Yadanar Tun', '1234'),
('C_0000000002', 'Nyi Htun', 'Yangon', '0945345343', 'Male', 'nyi@gmail.com', '2020-08-05', 'nyi htun', '12345'),
('C_0000000003', 'Zin Htun', 'erw', '0923432423', 'Female', 'zin@gmail.com', '2020-08-03', 'zin', '123534');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryID` varchar(150) NOT NULL,
  `DeliveryDate` varchar(150) NOT NULL,
  `DeliveryAgentID` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryagent`
--

CREATE TABLE `deliveryagent` (
  `AgentID` varchar(50) NOT NULL,
  `AgentName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryagent`
--

INSERT INTO `deliveryagent` (`AgentID`, `AgentName`, `Address`, `Phone`, `Email`) VALUES
('D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09432423322', 'nyeinyadanartun2001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `FurnitureID` varchar(50) NOT NULL,
  `FurnitureName` varchar(50) NOT NULL,
  `FurnitureTypeID` varchar(200) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`FurnitureID`, `FurnitureName`, `FurnitureTypeID`, `Price`, `size`, `quantity`, `description`, `image`) VALUES
('FU_0000000002', 'ComfortDesk', 'FT_0000000002', '324', '21', '198', 'ewfw', 'data/desk1.jpg'),
('FU_0000000004', 'LuxuryBed', 'FT_0000000001', '453', '45', '199', 'Excellent', 'data/bed1.jpg'),
('FU_0000000007', 'ChineseMade', 'FT_0000000001', '67', '45', '66', 'Good', 'data/desk2.jpg'),
('FU_0000000008', 'JanpanseseChoice', 'FT_0000000001', '67', '45', '60', 'Good', 'data/desk3.jpg'),
('FU_0000000009', 'EuropeExport', 'FT_0000000001', '67', '45', '62', 'Good', 'data/desk4.jpg'),
('FU_0000000010', 'ComfortBurmese', 'FT_0000000001', '67', '45', '60', 'Good', 'data/desk5.jpg'),
('FU_0000000011', 'SeoulPerfect', 'FT_0000000001', '67', '45', '60', 'Good', 'data/desk6.jpg'),
('FU_0000000012', 'SingaproeMade', 'FT_0000000001', '67', '45', '66', 'Good', 'data/desk7.jpg'),
('FU_0000000013', 'LuxuryDesk', 'FT_0000000001', '67', '45', '54', 'Good', 'data/desk8.jpg'),
('FU_0000000015', 'EuropeStyle', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed2.jpg'),
('FU_0000000016', 'BangkokMade', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed3.jpg'),
('FU_0000000017', 'DubaiMade', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed4.jpg'),
('FU_0000000018', 'EuropeMade', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed5.jpg'),
('FU_0000000019', 'Typical', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed6.jpg'),
('FU_0000000020', 'LuxuryBed', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed7.jpg'),
('FU_0000000021', 'Bed', 'FT_0000000002', '324', '45', '60', 'Good', 'data/bed8.jpg'),
('FU_0000000022', 'DiningBangkok', 'FT_0000000002', '453', '45', '60', 'Good', 'data/dining1.jpg'),
('FU_0000000023', 'DiningAsia', 'FT_0000000003', '453', '45', '60', 'Good', 'data/dining2.jpg'),
('FU_0000000024', 'JanpanseseChoice', 'FT_0000000003', '453', '45', '60', 'Good', 'data/dining3.jpg'),
('FU_0000000025', 'ChinaMade', 'FT_0000000003', '453', '45', '60', 'Good', 'data/dining4.jpg'),
('FU_0000000026', 'Turky', 'FT_0000000003', '324', '45', '60', 'Good', 'data/dining5.jpg'),
('FU_0000000027', 'Typical', 'FT_0000000003', '324', '45', '60', 'Good', 'data/dining6.jpg'),
('FU_0000000028', 'SeoulMade', 'FT_0000000003', '324', '45', '60', 'Good', 'data/dining7.jpg'),
('FU_0000000029', 'AsiaMade', 'FT_0000000003', '453', '45', '62', 'Good', 'data/dining8.jpg'),
('FU_0000000030', 'BangkokMade', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair1.jpg'),
('FU_0000000031', 'AsiaChoice', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair2.jpg'),
('FU_0000000032', 'DubaiStyle', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair3.jpg'),
('FU_0000000033', 'Kartar', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair4.jpg'),
('FU_0000000034', 'Computer', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair5.jpg'),
('FU_0000000035', 'SeoulPerfect', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair6.jpg'),
('FU_0000000036', 'EuropeExport', 'FT_0000000004', '89', '45', '60', 'Good', 'data/chair7.jpg'),
('FU_0000000037', 'LuxuryChoice', 'FT_0000000004', '89', '45', '50', 'Good', 'data/chair8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `furnituretype`
--

CREATE TABLE `furnituretype` (
  `FurnitureTypeID` varchar(50) NOT NULL,
  `Typename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furnituretype`
--

INSERT INTO `furnituretype` (`FurnitureTypeID`, `Typename`) VALUES
('FT_0000000001', 'Desk'),
('FT_0000000002', 'Bed'),
('FT_0000000003', 'Dining'),
('FT_0000000004', 'Chair');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderNo` varchar(50) NOT NULL,
  `FurnitureID` varchar(150) NOT NULL,
  `Quantity` varchar(150) NOT NULL,
  `Price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderNo`, `FurnitureID`, `Quantity`, `Price`) VALUES
('OR_0000000001', 'FU_0000000013', '1', '67'),
('OR_0000000002', 'FU_0000000013', '1', '67'),
('OR_0000000003', 'FU_0000000013', '1', '67'),
('OR_0000000004', 'FU_0000000013', '1', '67'),
('OR_0000000005', 'FU_0000000013', '1', '67'),
('OR_0000000006', 'FU_0000000013', '1', '67'),
('OR_0000000007', 'FU_0000000013', '1', '67'),
('OR_0000000008', 'FU_0000000002', '1', '324'),
('OR_0000000009', 'FU_0000000002', '1', '324'),
('OR_0000000010', 'FU_0000000002', '1', '324'),
('OR_0000000011', 'FU_0000000002', '1', '324'),
('OR_0000000012', 'FU_0000000002', '1', '324'),
('OR_0000000013', 'FU_0000000002', '1', '324'),
('OR_0000000014', 'FU_0000000002', '1', '324'),
('OR_0000000015', 'FU_0000000002', '1', '324'),
('OR_0000000016', 'FU_0000000002', '1', '324'),
('OR_0000000017', 'FU_0000000002', '1', '324'),
('OR_0000000018', 'FU_0000000022', '1', '453'),
('OR_0000000019', 'FU_0000000037', '1', '89'),
('OR_0000000020', 'FU_0000000037', '1', '89'),
('OR_0000000021', 'FU_0000000037', '1', '89'),
('OR_0000000022', '', '0', '0'),
('OR_0000000023', '', '0', '0'),
('OR_0000000024', 'FU_0000000002', '1', '324'),
('OR_0000000025', 'FU_0000000037', '1', '89'),
('OR_0000000026', 'FU_0000000002', '1', '324'),
('OR_0000000027', 'FU_0000000013', '1', '67'),
('OR_0000000028', 'FU_0000000037', '1', '89');

-- --------------------------------------------------------

--
-- Table structure for table `orderfurniture`
--

CREATE TABLE `orderfurniture` (
  `OrderNo` varchar(50) NOT NULL,
  `OrderDate` varchar(150) NOT NULL,
  `CustomerID` varchar(150) NOT NULL,
  `DeliveryID` varchar(150) NOT NULL,
  `CustomerName` varchar(150) NOT NULL,
  `DeliveryAddress` varchar(250) NOT NULL,
  `PhoneNo` varchar(200) NOT NULL,
  `CreditcardNo` varchar(200) NOT NULL,
  `CardExpiryMonth` varchar(150) NOT NULL,
  `CardExpiryYear` varchar(150) NOT NULL,
  `CBCNO` varchar(150) NOT NULL,
  `TotalAmount` varchar(150) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderfurniture`
--

INSERT INTO `orderfurniture` (`OrderNo`, `OrderDate`, `CustomerID`, `DeliveryID`, `CustomerName`, `DeliveryAddress`, `PhoneNo`, `CreditcardNo`, `CardExpiryMonth`, `CardExpiryYear`, `CBCNO`, `TotalAmount`, `Status`) VALUES
('OR_0000000008', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000009', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000010', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000011', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000012', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000013', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000014', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000015', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000016', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000017', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000018', '2020-08-05', 'C_0000000001', 'D_0000000001', 'Nyi Htun', 'Shwe Pyi Thar', '09425472782', '123456', '-', '-', '1111', '542', '-'),
('OR_0000000019', '2020-08-07', 'C_0000000001', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09425472782', '123456', '-', '-', '1111', '413', '-'),
('OR_0000000020', '2020-08-07', 'C_0000000001', 'D_0000000001', 'Mya Mya', 'Yangon', '09425472782', '123456', '-', '-', '1111', '542', '-'),
('OR_0000000021', '2020-08-10', 'C_0000000004', 'D_0000000001', 'Mya Mya', 'gree', '0932423422', '123456', '-', '-', '1111', '89', '-'),
('OR_0000000022', '2020-08-10', 'C_0000000004', 'D_0000000001', 'Mya Mya', '3232', '0932423422', '123456', '-', '-', '1111', '777', '-'),
('OR_0000000023', '2020-08-10', 'C_0000000004', 'D_0000000001', 'Mya Mya', 'ewrew', '0932423422', '123456', '-', '-', '1111', '777', '-'),
('OR_0000000024', '2020-08-10', 'C_0000000005', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09432342432', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000025', '2020-08-13', 'C_0000000005', 'D_0000000001', 'Nyein Yadanar Tun', 'qew', '09645634534', '123456', '-', '-', '1111', '89', '-'),
('OR_0000000026', '2020-08-13', 'C_0000000002', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangon', '0945345343', '123456', '-', '-', '1111', '324', '-'),
('OR_0000000027', '2020-08-13', 'C_0000000002', 'D_0000000001', 'Nyein Yadanar Tun', 'Yangn', '0945345343', '123456', '-', '-', '1111', '67', '-'),
('OR_0000000028', '2020-08-14', 'C_0000000002', 'D_0000000001', 'Nyein Yadanar Tun', '            Yangon', '0945345343', '123456', '-', '-', '1111', '89', '-');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(150) NOT NULL,
  `PaymentReceiveDate` varchar(150) NOT NULL,
  `OrderNo` varchar(150) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` varchar(150) NOT NULL,
  `SupplierID` varchar(150) NOT NULL,
  `Date` varchar(150) NOT NULL,
  `TotalAmount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `SupplierID`, `Date`, `TotalAmount`) VALUES
('PU_0000000001', 'SP_0000000001', '2020-07-26', '777'),
('PU_0000000002', 'SP_0000000001', '2020-07-26', '3693'),
('PU_0000000003', 'SP_0000000001', '2020-07-26', '1230'),
('PU_0000000004', 'SP_0000000001', '2020-07-26', '777'),
('PU_0000000005', 'SP_0000000001', '2020-07-27', '324'),
('PU_0000000006', 'SP_0000000001', '2020-07-28', '1425'),
('PU_0000000007', 'SP_0000000001', '2020-07-29', ''),
('PU_0000000008', 'SP_0000000001', '2020-07-29', '648'),
('PU_0000000009', 'SP_0000000001', '2020-07-29', '906'),
('PU_0000000010', 'SP_0000000001', '2020-08-04', '245'),
('PU_0000000011', 'SP_0000000001', '2020-08-05', '324'),
('PU_0000000012', 'SP_0000000001', '2020-08-05', '245'),
('PU_0000000013', 'SP_0000000001', '2020-08-05', '547'),
('PU_0000000014', 'SP_0000000001', '2020-08-12', '402'),
('PU_0000000015', 'SP_0000000001', '2020-08-13', '0'),
('PU_0000000016', 'SP_0000000001', '2020-08-13', '453'),
('PU_0000000017', 'SP_0000000001', '2020-08-14', '402');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `PurchaseID` varchar(150) NOT NULL,
  `FurnitureID` varchar(150) NOT NULL,
  `Qty` varchar(150) NOT NULL,
  `Price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasedetail`
--

INSERT INTO `purchasedetail` (`PurchaseID`, `FurnitureID`, `Qty`, `Price`) VALUES
('PU_0000000001', 'FU_0000000002', '1', '324'),
('PU_0000000001', 'FU_0000000004', '1', '453'),
('PU_0000000001', 'FU_0000000002', '1', '324'),
('PU_0000000001', 'FU_0000000004', '1', '453'),
('PU_0000000002', 'FU_0000000002', '10', '324'),
('PU_0000000002', 'FU_0000000004', '1', '453'),
('PU_0000000002', 'FU_0000000002', '10', '324'),
('PU_0000000002', 'FU_0000000004', '1', '453'),
('PU_0000000002', 'FU_0000000002', '10', '324'),
('PU_0000000002', 'FU_0000000004', '1', '453'),
('PU_0000000002', 'FU_0000000002', '10', '324'),
('PU_0000000002', 'FU_0000000004', '1', '453'),
('PU_0000000003', 'FU_0000000002', '1', '324'),
('PU_0000000003', 'FU_0000000004', '2', '453'),
('PU_0000000003', 'FU_0000000002', '1', '324'),
('PU_0000000003', 'FU_0000000004', '2', '453'),
('PU_0000000004', 'FU_0000000002', '1', '324'),
('PU_0000000004', 'FU_0000000004', '1', '453'),
('PU_0000000005', 'FU_0000000002', '1', '324'),
('PU_0000000006', 'FU_0000000002', '3', '324'),
('PU_0000000006', 'FU_0000000004', '1', '453'),
('PU_0000000007', 'FU_0000000002', '146', '324'),
('PU_0000000007', 'FU_0000000004', '198', '453'),
('PU_0000000008', 'FU_0000000002', '2', '324'),
('PU_0000000008', 'FU_0000000002', '2', '324'),
('PU_0000000009', 'FU_0000000004', '2', '453'),
('PU_0000000010', 'FU_0000000013', '1', '67'),
('PU_0000000010', 'FU_0000000037', '2', '89'),
('PU_0000000010', 'FU_0000000013', '1', '67'),
('PU_0000000010', 'FU_0000000037', '2', '89'),
('PU_0000000011', 'FU_0000000002', '1', '324'),
('PU_0000000011', 'FU_0000000002', '1', '324'),
('PU_0000000011', 'FU_0000000002', '1', '324'),
('PU_0000000012', 'FU_0000000013', '1', '67'),
('PU_0000000012', 'FU_0000000037', '2', '89'),
('PU_0000000012', 'FU_0000000013', '1', '67'),
('PU_0000000012', 'FU_0000000037', '2', '89'),
('PU_0000000012', 'FU_0000000013', '1', '67'),
('PU_0000000012', 'FU_0000000037', '2', '89'),
('PU_0000000012', 'FU_0000000013', '1', '67'),
('PU_0000000012', 'FU_0000000037', '2', '89'),
('PU_0000000012', 'FU_0000000013', '1', '67'),
('PU_0000000012', 'FU_0000000037', '2', '89'),
('PU_0000000013', 'FU_0000000037', '1', '89'),
('PU_0000000013', 'FU_0000000009', '2', '67'),
('PU_0000000013', 'FU_0000000002', '1', '324'),
('PU_0000000014', 'FU_0000000007', '6', '67'),
('PU_0000000016', 'FU_0000000004', '1', '453'),
('PU_0000000017', 'FU_0000000012', '6', '67');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(150) NOT NULL,
  `StaffName` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `Username`, `Password`) VALUES
('S_0000000001', 'Admin', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` varchar(50) NOT NULL,
  `Suppliername` varchar(50) NOT NULL,
  `supplieraddress` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `Suppliername`, `supplieraddress`, `phone`, `email`) VALUES
('SP_0000000001', 'Nyein Yadanar Tun', 'Yangon', '09435223423', 'nyeinyadanartun@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryID`),
  ADD KEY `DeliveryAgentID` (`DeliveryAgentID`);

--
-- Indexes for table `deliveryagent`
--
ALTER TABLE `deliveryagent`
  ADD PRIMARY KEY (`AgentID`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`FurnitureID`),
  ADD KEY `FurnitureTypeID` (`FurnitureTypeID`);

--
-- Indexes for table `furnituretype`
--
ALTER TABLE `furnituretype`
  ADD PRIMARY KEY (`FurnitureTypeID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderNo`);

--
-- Indexes for table `orderfurniture`
--
ALTER TABLE `orderfurniture`
  ADD PRIMARY KEY (`OrderNo`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderNo` (`OrderNo`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD KEY `PurchaseID` (`PurchaseID`),
  ADD KEY `FurnitureID` (`FurnitureID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`DeliveryAgentID`) REFERENCES `deliveryagent` (`AgentID`);

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `furniture_ibfk_1` FOREIGN KEY (`FurnitureTypeID`) REFERENCES `furnituretype` (`FurnitureTypeID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderNo`) REFERENCES `orderdetail` (`OrderNo`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`supplierID`);

--
-- Constraints for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD CONSTRAINT `purchasedetail_ibfk_1` FOREIGN KEY (`PurchaseID`) REFERENCES `purchase` (`PurchaseID`),
  ADD CONSTRAINT `purchasedetail_ibfk_2` FOREIGN KEY (`FurnitureID`) REFERENCES `furniture` (`FurnitureID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
