-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 06:19 PM
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
-- Database: `gamestop`
--

-- --------------------------------------------------------

--
-- Table structure for table `helpline`
--

CREATE TABLE `helpline` (
  `helplineid` int(11) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  `reciverid` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helpline`
--

INSERT INTO `helpline` (`helplineid`, `senderid`, `reciverid`, `message`) VALUES
(1, 'tanvirhasan6199@gmail.com', 'helpline.gamestop@gmail.com', 'Allah Vorosha\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productowner` int(11) NOT NULL,
  `purchasequantity` varchar(100) NOT NULL,
  `purchaseprice` varchar(100) NOT NULL,
  `orderstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`orderid`, `userid`, `productid`, `productowner`, `purchasequantity`, `purchaseprice`, `orderstatus`) VALUES
(1, 2, 1, 1, '3', '900', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `paymentid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `purchasequantity` varchar(100) NOT NULL,
  `purchaseprice` varchar(100) NOT NULL,
  `paymentdate` varchar(100) NOT NULL,
  `paymentstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`paymentid`, `buyerid`, `sellerid`, `productid`, `purchasequantity`, `purchaseprice`, `paymentdate`, `paymentstatus`) VALUES
(2, 2, 1, 1, '3', '900', '10-05-2024', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `productinfo`
--

CREATE TABLE `productinfo` (
  `productid` int(11) NOT NULL,
  `productowner` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productdescription` varchar(500) NOT NULL,
  `productcategory` varchar(100) NOT NULL,
  `productpic` varchar(100) NOT NULL,
  `productprice` varchar(100) NOT NULL,
  `productquantity` varchar(100) NOT NULL,
  `productstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productinfo`
--

INSERT INTO `productinfo` (`productid`, `productowner`, `productname`, `productdescription`, `productcategory`, `productpic`, `productprice`, `productquantity`, `productstatus`) VALUES
(1, 1, 'Fantech T533 Wired Premium Office Mouse', 'Model: T533\r\nDurable and Smooth Click up to 3 Million\r\nPremium Grade Sensor 1200 DPI\r\nResponsive cursor control\r\nUSB 1.8m cable and Soft scroll', 'Mouse', 'Uploads/Products/product.jpg', '300', '5', 'Active'),
(2, 1, 'Rapoo N100 Wired Optical Mouse', 'Key Features\r\nModel: Rapoo N100\r\n1600 DPI\r\nUSB Interface\r\nColor- Black', 'Mouse', 'Uploads/Products/n100-500x500.jpg', '350', '21', 'Active'),
(3, 1, 'PROLiNK PMC1007 USB Optical Mouse', 'Key Features\r\nMPN: PMC1007-BLU\r\nModel: PMC1007\r\nNumber of buttons: 3\r\nDPI Resolution: 1200 DPI\r\nInterface: USB\r\nAmbidextrous design', 'Mouse', 'Uploads/Products/pmc1007-dark-blue-01-500x500.jpg', '390', '11', 'Active'),
(4, 1, 'Fantech Zeus X5S Macro Programmable Gaming Mouse', 'Key Features\r\nModel: Fantech Zeus X5S\r\n10,000,000 Click lifetime\r\nTracking Method: Optical\r\nInterface: USB\r\nNon- slip side', 'Mouse', 'Uploads/Products/x5s-zeus-1-500x500.jpg', '1200', '45', 'Active'),
(5, 1, 'Logitech M240 Silent Bluetooth mouse', 'Key Features\r\nMPN: 910007122\r\nModel: M240\r\nDPI range: 400-4000\r\nNumber of Buttons: 3 (Left/Right-click, Middle-click)\r\nSilentTouch Technology\r\nBattery life: 18 months', 'Mouse', 'Uploads/Products/m240-02-500x500.jpg', '1750', '32', 'Inactive'),
(6, 1, 'Havit HV-MP838 Gaming Mouse Pad', 'Key Features\r\nModel: Havit HV-MP838\r\nSize: 25x21x0.2cm\r\nDimensions: 250 x 210 x 2mm\r\nErgonomic Design\r\nSurging rubber and cloth', 'Mouse Pad', 'Uploads/Products/hv-mp838-500x500.jpg', '150', '54', 'Active'),
(7, 1, 'Fantech MP256 Gaming Mouse Pad', 'Key Features\r\nModel: MP256\r\nEdge Stitching\r\nAnti-slip base\r\nSmooth Surface\r\nSize: 250 x 210 x 2mm', 'Mouse Pad', 'Uploads/Products/mp256-01-500x500.jpg', '170', '64', 'Active'),
(8, 1, 'GIGABYTE AMP900 Extended Gaming Mouse Pad', 'Key Features\r\nModel: AMP900\r\nSpill Resistant\r\nHigh-Density Rubber Base\r\nMicro Pattern Ensures Precise Tracking\r\nDimension: (L)900x(W)360x(H)3 mm', 'Mouse Pad', 'Uploads/Products/amp900-500x500.jpg', '1150', '25', 'Active'),
(9, 1, 'X-raypad Aqua Control', 'Key Features\r\nModel: Aqua Control II Sakura Night\r\nSurface : Non Coating Rougher Amundsen Fabric\r\nType: Speed and Control\r\n4mm thickness-comfortable and stable\r\nSuitable for sweaty hands', 'Mouse Pad', 'Uploads/Products/aqua-control-ii-sakura-night-01-500x500.jpg', '2650', '7', 'Active'),
(10, 1, 'Fantech ZERO-G MPC450 Gaming Mouse Pad', 'Key Features\r\nModel: ZERO-G MPC450\r\nCORDURA Surface + Anti-slip Rubber Base\r\nEdge Stitching\r\nAnti-slip base\r\nSize: 450 x 400 x 3mm', 'Mouse Pad', 'Uploads/Products/zero-g-mpc450-01-500x500.jpg', '1350', '85', 'Inactive'),
(11, 1, 'Horizon Apex-BG Ergonomic Gaming Chair', 'Key Features\r\nModel: Apex-BG\r\nRelaxing tilt mechanism with lock & tension adjuster\r\nLumbar Support & Neck Support\r\nAdjustable 3D armrest\r\nWeight Capacity: 140 kg', 'Gaming Chair', 'Uploads/Products/apex-bg-01-500x500.jpg', '17000', '5', 'Active'),
(12, 1, 'GIGABYTE AORUS AGC310 Gaming Chair', 'Key Features\r\nModel: AORUS AGC310\r\nAll-Steel Frame & Base\r\n2D Adjustable Armrest\r\n160º Max Tilting Angle\r\nCLASS 4 Certified Gas Lift', 'Gaming Chair', 'Uploads/Products/aorus-agc310-1-500x500.jpg', '25000', '9', 'Active'),
(13, 1, 'Havit HV-GC932 Gamenote Gaming Chair Red', 'Key Features\r\nModel: Havit HV-GC932\r\nMaterial: Normal Sponge (back), shaping sponge (seat)\r\nPVC leather. Nylon feet\r\nIron Frame: 1.2mm thickness\r\n2D heightened gaming armrest', 'Gaming Chair', 'Uploads/Products/hv-gc932-red-500x500.jpg', '19800', '27', 'Active'),
(14, 1, ' Corsair T3 Rush Gaming Chair Gray/Charcoal', 'Key Features\r\nMPN: CF-9010031-WW\r\nModel: T3 Rush\r\nSeat Frame Construction: Metal\r\nChair Base Material: Nylon\r\nWeight Capacity: 120 Kg\r\n4D Armrest', 'Gaming Chair', 'Uploads/Products/t3-rush-gray-charcoal-500x500.jpg', '54000', '4', 'Active'),
(15, 1, 'Razer Enki Quartz Gaming Chair', 'Key Features\r\nMPN: RZ38-03720200-R3U1\r\nModel: Enki\r\nDual-Textured, Eco Sustainable Synthetic Leather\r\nOptimized Cushion Density, Reactive Seat Tilt\r\nBuilt-In Lumbar Arch, Up to 152° Recline\r\nDesigned for All-Day Comfort', 'Gaming Chair', 'Uploads/Products/enki-quartz-01-500x500.jpg', '40000', '20', 'Inactive'),
(16, 1, 'Logitech Wave Keys Wireless Ergonomic Keyboard', 'Key Features\r\nMPN: 920-011898\r\nModel: Wave Keys\r\nConnection Type: 2.4 GHz RF, Bluetooth\r\nBattery life: up to 36 months\r\nMulti-device pairing (up to 3 devices)\r\nCustomizable Fn shortcut keys with Logi Options+', 'Keyboard', 'Uploads/Products/wave-keys-01-500x500.jpg', '75000', '65', 'Active'),
(17, 1, 'Logitech G813 LIGHTSYNC RGB Mechanical Gaming Keyboard', 'Key Features\r\nMPN: 920-009011\r\nModel: G813\r\nSwitch Type: GL Linear Switch\r\nBacklit: LIGHTSYNC RGB Lighting\r\nUltra Thin Ergonomic Design\r\nProgrammable Micro G Keys', 'Keyboard', 'Uploads/Products/g813-01-500x500.jpg', '17700', '21', 'Active'),
(18, 1, 'Logitech G PRO Tenkeyless RGB Mechanical Gaming Keyboard', 'Key Features\r\nMPN: 920-009396\r\nModel: G PRO Tenkeyless\r\nPro-inspired tenkeyless design\r\nGX Blue Clicky mechanical switches\r\n1.8 m detachable cable\r\n12 programmable F-keys, 1 ms report rate', 'Keyboard', 'Uploads/Products/g-pro-01-500x500.jpg', '11900', '10', 'Active'),
(19, 1, 'Logitech MK215 Wireless Keyboard & Mouse Combo', 'Key Features\r\nMPN: 920-007444\r\nModel: Logitech MK215\r\nReliable wireless (up to 10 m)\r\nCompact, space-saving layout\r\n24-month keyboard battery life\r\nSmooth, responsive cursor control', 'Keyboard', 'Uploads/Products/mk215-keyboard-mouse-500x500.jpg', '2000', '30', 'Active'),
(20, 1, 'Logitech K120 Usb Keyboard With Bangla Black', 'Key Features\r\nModel: Logitech K120\r\nType :USB\r\nCable Length 150cm Approx\r\nWeight: 1.21 pounds', 'Keyboard', 'Uploads/Products/K120-500x500.jpg', '1500', '45', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `reviewinfo`
--

CREATE TABLE `reviewinfo` (
  `reviewid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `reviewstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewinfo`
--

INSERT INTO `reviewinfo` (`reviewid`, `userid`, `username`, `productid`, `review`, `reviewstatus`) VALUES
(1, 1, 'kakon103', 1, 'Product ta valo \r\n', 'Active'),
(2, 1, 'tanvirh103', 1, 'Product ta kajer jinish ', 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `fullname`, `username`, `phone`, `email`, `password`, `profilepic`, `role`, `status`) VALUES
(1, 'MD Moinul Hossain Dipu', 'dipu103', '01736456832', 'dipu@gmail.com', '1', 'Uploads/Images/default.jpg', 'Business Client', 'Active'),
(2, 'Hossain Al Arik', 'arik103', '01736456832', 'arik@gmail.com', '1', 'Uploads/Images/default.jpg', 'Manager', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helpline`
--
ALTER TABLE `helpline`
  ADD PRIMARY KEY (`helplineid`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `reviewinfo`
--
ALTER TABLE `reviewinfo`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helpline`
--
ALTER TABLE `helpline`
  MODIFY `helplineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productinfo`
--
ALTER TABLE `productinfo`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviewinfo`
--
ALTER TABLE `reviewinfo`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
