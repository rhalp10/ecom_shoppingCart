-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 09:00 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_ID` int(10) UNSIGNED NOT NULL,
  `cat_Name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_ID`, `cat_Name`) VALUES
(1, 'Electronics'),
(2, 'Jewellery'),
(3, 'Shoes'),
(4, 'Clothing'),
(5, 'Kids'),
(6, 'Sports'),
(7, 'Health'),
(8, 'Furniture'),
(9, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_ID` int(11) UNSIGNED NOT NULL,
  `cus_Name` varchar(80) DEFAULT NULL,
  `cus_Email` varchar(80) DEFAULT NULL,
  `cus_Address` varchar(80) DEFAULT NULL,
  `cus_Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_ID`, `cus_Name`, `cus_Email`, `cus_Address`, `cus_Phone`) VALUES
(1, 'asdasdasd', 'asd@gmail.com', 'asdasdasd', '12312312');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `or_ID` int(11) UNSIGNED NOT NULL,
  `cus_ID` int(11) UNSIGNED DEFAULT NULL,
  `prod_ID` int(11) UNSIGNED DEFAULT NULL,
  `or_Qnty` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`or_ID`, `cus_ID`, `prod_ID`, `or_Qnty`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 1, 1, 3),
(4, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_ID` int(11) UNSIGNED NOT NULL,
  `prod_Name` varchar(80) DEFAULT NULL,
  `prod_Description` text,
  `prod_Price` float DEFAULT NULL,
  `prod_Img` longblob,
  `prod_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_ID`, `prod_Name`, `prod_Description`, `prod_Price`, `prod_Img`, `prod_date`) VALUES
(1, 'Friendly Jewelry', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 1177, NULL, '2018-04-18 17:34:47'),
(2, 'Apple Cinema 30\"', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 32, NULL, '2018-04-18 17:53:27'),
(3, '\r\niPad Classic', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 1, NULL, '2018-04-18 17:53:29'),
(4, 'Lotto Sports Shoes', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 221, NULL, '2018-04-18 17:53:48'),
(5, 'Jeep-Casual-Shoes', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 44, NULL, '2018-04-18 17:53:45'),
(6, 'Baso', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 1177, NULL, '2018-04-18 17:35:53'),
(7, 'Plate', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 156, NULL, '2018-04-18 17:53:51'),
(8, 'Wazhing', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 231, NULL, '2018-04-18 17:53:34'),
(9, 'Wazhing', ' <p><strong>Revolutionary multi-touch interface.</strong><br>\r\n            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>\r\n          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>\r\n            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>\r\n          <p><strong>Music downloads straight from iTunes.</strong><br>\r\n            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>\r\n          <p><strong>Surf the web with Wi-Fi.</strong><br>\r\n            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>\r\n            &nbsp;</p>', 132, NULL, '2018-04-18 17:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `scat_ID` int(11) UNSIGNED NOT NULL,
  `scat_Name` varchar(80) DEFAULT NULL,
  `cat_ID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scat_ID`, `scat_Name`, `cat_ID`) VALUES
(1, 'Laptop', 1),
(2, 'Children jewelry', 2),
(3, 'Children shoes', 3),
(4, 'Men', 4),
(5, 'Kids toys', 5),
(6, 'Women watcher', 6),
(7, 'Health', 7),
(8, 'Beadroom Furniture', 8),
(9, 'Audio Book', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`or_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_ID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scat_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scat_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
