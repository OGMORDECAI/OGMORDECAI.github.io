-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 03:31 PM
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
-- Database: `intamba_auto_dealership`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(30, 'Sedan'),
(52, 'SUV'),
(74, 'Truck'),
(96, 'Hatchback');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
(1, 2, 11, 1, 3000000.00),
(2, 3, 14, 1, 2000000.00),
(3, 1, 14, 1, 2000000.00),
(4, 4, 17, 1, 2272749.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT current_timestamp(),
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`, `TotalAmount`) VALUES
(1, 1, '2024-06-14 23:38:30', 2000000.00),
(2, 4, '2024-06-14 23:38:30', 3000000.00),
(3, 3, '2024-06-14 23:38:30', 2000000.00),
(4, 2, '2024-06-14 23:38:30', 2272749.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Featured` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `CategoryID`, `Image`, `Featured`) VALUES
(8, 'Chevrolet Spark', 'Affordable city car.', 30000.00, 96, 'Chevrolet Spark.jpg', 1),
(9, 'Toyota Corolla', 'Revolutionary fuel economy and high performance.', 40000.00, 30, 'Toyota Corolla.avif', 0),
(10, 'Trackhawk', 'A sturdy muscle car that is well known for its high performance.', 2500000.00, 52, 'Trackhawk.avif', 0),
(11, 'HellCat', 'Weighs over 4,000 lbs and sports a supercharged 6.2-liter Hemi V8 engine capable of delivering 707 hp and 650 lb-ft. of torque.', 3000000.00, 30, 'HellCat.jpg', 1),
(12, 'Ford Wildtrak', 'A very good truck to take with you while going on a hike or vacation', 900000.00, 74, 'Ford Wildtrak.jpg', 1),
(13, 'BMW X5', 'A spacious and powerful SUV for family adventures.', 1500000.00, 52, 'BMW X5.jpg', 1),
(14, 'Mercedes Benz G Wagon', 'A sophisticating and luxurious car for special occasions.', 2000000.00, 52, 'Mercedes Benz G Wagon.jpg', 1),
(15, 'Kia Picanto', 'Compact dimensions combine perfectly with an oversized sense of fun, space and comfort.', 600000.00, 96, 'Kia Picanto.png', 0),
(16, 'Ford Ranger', 'A mean looking 4x4 that is good for the road and off-road trips', 1000000.00, 74, 'Ford Ranger.jpg', 1),
(17, 'BMW M4', 'Twin-turbo inline-six engine with blaring intensity.', 2272749.00, 30, 'BMW M4.jpg', 1),
(18, 'BMW M3 Touring', 'The ultimate BMW 3 Series Touring.', 3500000.00, 96, 'BMW M3 touring.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`) VALUES
(1, 'Eddy', 'waddupPGFNUK', 'Eddy102@gmail.com'),
(2, 'JRmonarch', 'realOppy', 'JRmonarch2@gmail.com'),
(3, 'Leslie', 'summerDaze', 'Leslie5@gmail.com'),
(4, 'OGmordecai', 'tookhertodaO', 'OGmordecai7@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
