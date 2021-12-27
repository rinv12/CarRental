-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 02:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Vehicle_ID` int(11) NOT NULL,
  `Model` varchar(25) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Daily_Rate` int(11) NOT NULL,
  `Weekly_Rate` int(11) NOT NULL,
  `Time_Period` date NOT NULL,
  `Status` varchar(11) NOT NULL,
  `Type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Vehicle_ID`, `Model`, `Year`, `Daily_Rate`, `Weekly_Rate`, `Time_Period`, `Status`, `Type`) VALUES
(1001, 'Honda Fit', '2020', 20, 140, '0000-00-00', 'Unavailable', 'Compact'),
(1002, 'Volkswagen GTI', '2020', 20, 140, '0000-00-00', 'Available', 'Compact'),
(1003, 'Mazda 3', '2020', 20, 140, '0000-00-00', 'Unavailable', 'Compact'),
(1004, 'Mini Cooper', '2020', 20, 140, '0000-00-00', 'Available', 'Compact'),
(1005, 'Kia Optima', '2020', 25, 175, '0000-00-00', 'Available', 'Medium'),
(1006, 'Toyota Camry', '2020', 25, 175, '0000-00-00', 'Unavailable', 'Medium'),
(1007, 'Honda Accord', '2020', 25, 175, '0000-00-00', 'Available', 'Medium'),
(1008, 'Mazda 6', '2020', 25, 175, '0000-00-00', 'Available', 'Medium'),
(1009, 'Kia Cadenza', '2019', 30, 210, '0000-00-00', 'Unavailable', 'Large'),
(1010, 'Toyota Avalon', '2020', 30, 210, '0000-00-00', 'Available', 'Large'),
(1011, 'Dodge Charger', '2020', 30, 210, '0000-00-00', 'Available', 'Large'),
(1012, 'Chrysler 300', '2020', 30, 210, '0000-00-00', 'Unavailable', 'Large'),
(1013, 'Honda CR-V', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1014, 'Toyota RAV4', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1015, 'Ford Explorer', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1016, 'Toyota Highlander', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1017, 'Ford F-150', '2020', 45, 315, '0000-00-00', 'Available', 'Truck'),
(1018, 'Toyota Tacoma', '2020', 45, 315, '0000-00-00', 'Available', 'Truck'),
(1019, 'Chevrolet Express', '2020', 55, 385, '0000-00-00', 'Unavailable', 'Van'),
(1020, 'GMC Savana', '2020', 55, 385, '0000-00-00', 'Available', 'Van'),
(1021, 'Honda Odyssey', '2019', 55, 385, '0000-00-00', 'Available', 'Van'),
(1022, 'Toyota Camry', '2019', 20, 140, '0000-00-00', 'Available', 'compact'),
(1023, 'Mitsubishi Lancer', '2019', 25, 175, '0000-00-00', 'Available', 'Medium'),
(1024, 'Mitsubishi Evo', '2010', 25, 175, '0000-00-00', 'Available', 'Medium'),
(1025, 'Ford Escape', '2015', 30, 210, '0000-00-00', 'Available', 'Large'),
(1026, 'Toyota Camry', '2020', 20, 140, '0000-00-00', 'Available', 'Compact'),
(1027, 'Mazda 3', '2020', 20, 140, '0000-00-00', 'Available', 'Compact'),
(1028, 'Kia Soul', '2020', 20, 140, '0000-00-00', 'Available', 'Compact'),
(1029, 'GMC Yukon', '2020', 35, 210, '0000-00-00', 'Available', 'SUV'),
(1030, 'GMC  Terrain', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1031, 'GMC  Acadia', '2020', 35, 245, '0000-00-00', 'Available', 'SUV'),
(1032, 'GMC Canyon', '2020', 45, 315, '0000-00-00', 'Available', 'Truck');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_No` int(11) NOT NULL,
  `Last_Name` varchar(24) NOT NULL,
  `FN_Initial` varchar(2) NOT NULL,
  `Phone_No` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_No`, `Last_Name`, `FN_Initial`, `Phone_No`) VALUES
(1, 'Price', 'V.', '999-333-2000'),
(2, 'Shimura', 'N.', '000-111-3023'),
(3, 'Higikata', 'J.', '122-435-2123'),
(4, 'Inu', 'S.', '923-334-2311'),
(5, 'Ara', 'A.', '346-123-1234'),
(6, 'Cheez', 'I.', '231-233-3543'),
(7, 'Snowman', 'F.', '123-342-3541'),
(8, 'Bakugo', 'K.', '145-768-4567'),
(9, 'Bond', 'J.', '543-126-5763'),
(10, 'Speedwagon', 'R.', '456-347-7858'),
(11, 'Spiegel', 'S.', '782-345-2234'),
(18, 'Spiegel', 'S.', '782-345-2234'),
(19, 'lname', 'fn', 'phone'),
(20, '', '', ''),
(21, 'viloria', 'l', '1230231489'),
(22, 'Doe', 'J', '111-111-1111'),
(23, 'Aang', 'N', '222-222-2222'),
(24, 'Spiegel', 'S.', '782-345-2234'),
(25, 'Spiegel', 'S.', '782-345-2234'),
(26, 'Spiegel', 'S.', '782-345-2234'),
(27, 'Collins', 'M', '344-222-3333'),
(28, 'Inu', 'A', '999-344-6666'),
(29, 'Stalone', 'S', '333-444-5555'),
(30, 'Chan', 'J', '888-444-3333'),
(31, 'Prime', 'A', '888-333-5555'),
(32, 'Spiegel', 'S.', '782-345-2234'),
(33, '', '', ''),
(34, '', '', ''),
(35, 'Valer', 'R', '444-222-5555'),
(36, 'Ashirogi', 'M', '666-444-9999'),
(37, 'Shiro', 'T', '999-444-5555'),
(38, '', '', ''),
(39, 'Mis', 'J', '455-444-2222'),
(40, '', '', ''),
(41, 'Miura', 'J', '555-333-2222'),
(42, '', '', ''),
(43, 'Sterling', 'S', '999-333-2222'),
(44, '', '', ''),
(45, 'Azuki', 'A', '333-444-7777'),
(46, '', '', ''),
(47, 'Pino', 'P', '403-232-1234'),
(48, 'Sing', 'J', '433-223-4444'),
(49, '', '', ''),
(50, 'Leno', 'J', '555-334-2342'),
(51, '', '', ''),
(52, 'Pines', 'J', '304-234-3424'),
(53, 'Pine', 'L', '219-231-1233'),
(54, '', '', ''),
(55, 'Payne', 'C', '342-342-1231'),
(56, '', '', ''),
(57, 'Pan', 'J', '123-234-2312'),
(58, 'Pass', 'J', '342-546-1232'),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, 'Pas', 'J', '234-453-1231'),
(63, 'Mann', 'B', '344-657-3234');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `Vehicle_ID` int(11) NOT NULL,
  `ID_No` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `Return_Date` date NOT NULL,
  `No_Days` int(11) NOT NULL,
  `Amount_Due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`Vehicle_ID`, `ID_No`, `Start_Date`, `Return_Date`, `No_Days`, `Amount_Due`) VALUES
(1001, 1, '2020-04-25', '2020-04-28', 3, 60),
(1003, 2, '2020-04-26', '2020-04-30', 4, 80),
(1007, 3, '2020-04-28', '2020-04-30', 2, 50),
(1009, 7, '2020-04-29', '2020-05-02', 3, 90),
(1012, 9, '2020-04-30', '2020-05-06', 6, 180),
(1019, 8, '2020-04-28', '2020-05-02', 4, 200),
(1004, 43, '2020-05-05', '2020-05-08', 3, 0),
(1002, 48, '2020-05-04', '2020-05-05', 1, 0),
(1010, 53, '2020-05-04', '2020-05-07', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE `weekly` (
  `Vehicle_ID` int(11) NOT NULL,
  `ID_No` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `Return_Date` date NOT NULL,
  `No_Weeks` int(11) NOT NULL,
  `Amount_Due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekly`
--

INSERT INTO `weekly` (`Vehicle_ID`, `ID_No`, `Start_Date`, `Return_Date`, `No_Weeks`, `Amount_Due`) VALUES
(1004, 4, '2020-04-26', '2020-05-03', 7, 140),
(1007, 6, '2020-04-27', '2020-05-04', 7, 175),
(1016, 5, '2020-04-29', '2020-05-06', 7, 245),
(1014, 10, '2020-04-30', '2020-05-07', 7, 245);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD UNIQUE KEY `Vehicle_ID` (`Vehicle_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `ID_No` (`ID_No`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD KEY `ID_No_Const_Daily` (`ID_No`),
  ADD KEY `Vehicle_ID_Const_Daily` (`Vehicle_ID`);

--
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
  ADD KEY `ID_No_Const_Weekly` (`ID_No`),
  ADD KEY `Vehicle_ID_Const_Weekly` (`Vehicle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Vehicle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily`
--
ALTER TABLE `daily`
  ADD CONSTRAINT `ID_No_Const_Daily` FOREIGN KEY (`ID_No`) REFERENCES `customer` (`ID_No`),
  ADD CONSTRAINT `Vehicle_ID_Const_Daily` FOREIGN KEY (`Vehicle_ID`) REFERENCES `car` (`Vehicle_ID`);

--
-- Constraints for table `weekly`
--
ALTER TABLE `weekly`
  ADD CONSTRAINT `ID_No_Const_Weekly` FOREIGN KEY (`ID_No`) REFERENCES `customer` (`ID_No`),
  ADD CONSTRAINT `Vehicle_ID_Const_Weekly` FOREIGN KEY (`Vehicle_ID`) REFERENCES `car` (`Vehicle_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
