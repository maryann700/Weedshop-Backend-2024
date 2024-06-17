-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 06:38 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_date`, `status`) VALUES
(1, 'Mech Statham', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', '0123456789', 'Lorem Ipsume text,\r\nLorem Ipsum,\r\nLorem - 9900.\r\nLorem.', 'Admin', '2017-03-24 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Cannabis', 'Active'),
(2, 'Concentrates', 'Active'),
(3, 'Dabbing', 'Active'),
(4, 'Edibles', 'Active'),
(5, 'Growing', 'Active'),
(6, 'Natural Health', 'Active'),
(7, 'Smoking', 'Active'),
(8, 'Vaping', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `driver_id` int(10) NOT NULL,
  `delivery_address` text NOT NULL,
  `sub_total` double(12,2) DEFAULT NULL,
  `delivery_charge` double(10,2) DEFAULT NULL,
  `final_total` double(12,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` enum('Pending','Inprocess','Completed','Cancel') DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `attribute_description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `store_id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `name`, `category_id`, `type_id`, `image`, `price`, `quantity`, `description`, `status`, `created_date`) VALUES
(1, 1, 'Product1', 1, 1, '', '10', 7, 'test', 'Active', '2017-03-21 00:00:00'),
(2, 1, 'Product2', 1, 1, '', '20', 10, 'test', 'Active', '2017-03-21 00:00:00'),
(3, 1, 'Product3', 1, 1, '', '20', 5, 'Test description', 'Active', '2017-03-11 00:00:00'),
(16, 1, 'Product12', 1, 1, '', '40', 3, 'Test description', 'Active', '2017-03-19 00:00:00'),
(15, 1, 'Product11', 1, 1, '', '33', 22, 'Test description', 'Active', '2017-03-01 00:00:00'),
(6, 1, 'Product4', 1, 1, '', '10', 7, 'Test description', 'Active', '2017-03-20 00:00:00'),
(14, 1, 'Product10', 1, 1, '', '10', 7, 'Test description', 'Active', '2017-03-20 00:00:00'),
(13, 1, 'Product9', 1, 1, '', '20', 5, 'Test description', 'Active', '2017-03-20 00:00:00'),
(9, 1, 'Product5', 1, 1, '', '33', 22, 'Test description', 'Active', '2017-03-20 00:00:00'),
(10, 1, 'Product6', 1, 1, '', '40', 3, 'Test description', 'Active', '2017-03-20 00:00:00'),
(11, 1, 'Product7', 1, 1, '', '30', 1, 'Test description', 'Active', '2017-03-20 00:00:00'),
(12, 1, 'Product8', 1, 1, '', '20', 17, 'Test description', 'Active', '2017-03-20 00:00:00'),
(17, 1, 'Product13', 1, 1, '', '30', 1, 'Test description', 'Active', '2017-03-20 00:00:00'),
(18, 1, 'Product14', 1, 1, '', '20', 17, 'Test description', 'Active', '2017-03-20 00:00:00'),
(19, 1, 'Product15', 1, 1, '', '20', 5, 'Test description', 'Active', '2017-03-20 00:00:00'),
(20, 1, 'Product16', 1, 1, '', '10', 7, 'Test description', 'Active', '2017-03-20 00:00:00'),
(21, 1, 'Product17', 1, 1, '', '33', 22, 'Test description', 'Active', '2017-03-20 00:00:00'),
(22, 1, 'Product18', 1, 1, '', '40', 3, 'Test description', 'Active', '2017-03-20 00:00:00'),
(23, 1, 'Product19', 1, 1, '', '30', 1, 'Test description', 'Active', '2017-03-20 00:00:00'),
(24, 1, 'Product20', 1, 1, '', '20', 17, 'Test description', 'Active', '2017-03-20 00:00:00'),
(25, 1, 'Product21', 1, 1, '', '20', 5, 'Test description', 'Active', '2017-03-20 00:00:00'),
(26, 1, 'Product22', 1, 1, '', '10', 7, 'Test description', 'Active', '2017-03-20 00:00:00'),
(27, 1, 'Product23', 1, 1, '', '33', 22, 'Test description', 'Active', '2017-03-20 00:00:00'),
(28, 1, 'Product24', 1, 1, '', '40', 3, 'Test description', 'Active', '2017-03-20 00:00:00'),
(29, 1, 'King’s Kush (AA)', 2, 1, 'pr_1490249384555.png', '23.22', 5, 'King’s Kush (AA)', 'Active', '2017-03-22 10:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `attribute_id` int(10) NOT NULL,
  `attribute_text` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(24, 29, 'pr_14902493688.png'),
(3, 35, 'pr_14902465693.png'),
(4, 35, 'pr_14902465691.png'),
(21, 29, 'pr_1490249368917.png'),
(22, 29, 'pr_1490249368674.png'),
(23, 29, 'pr_1490249368183.png');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `status`) VALUES
(1, 'Las Vegas', 'Active'),
(2, 'Dallas', 'Active'),
(3, 'Northern California', 'Active'),
(4, 'Pacific Northwest', 'Active'),
(5, 'South Texas', 'Active'),
(6, 'Southern California', 'Active'),
(7, 'Midwest', 'Active'),
(8, 'Tri-State South', 'Active'),
(9, 'Valley', 'Active'),
(10, 'North Carolina - GC', 'Active'),
(11, 'Central California', 'Active'),
(12, 'Arizona', 'Active'),
(13, 'Southeast', 'Active'),
(14, 'Tri-State North', 'Active'),
(15, 'West Texas', 'Active'),
(16, 'Great Lakes East', 'Active'),
(17, 'Missouri', 'Active'),
(18, 'Tarragon', 'Active'),
(19, 'South Carolina', 'Active'),
(20, 'Florida South', 'Active'),
(21, 'New England', 'Active'),
(22, 'Evergreen', 'Active'),
(23, 'North Carolina West', 'Active'),
(24, 'Iowa', 'Active'),
(25, 'Florida North', 'Active'),
(26, 'Canyons', 'Active'),
(27, 'Peoria', 'Active'),
(28, 'El Paso', 'Active'),
(29, 'Nashville', 'Active'),
(30, 'Milwaukee', 'Active'),
(31, 'Southwest', 'Active'),
(32, 'Eco Fry', 'Active'),
(33, 'NorCal', 'Active'),
(34, 'American', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `region` text NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `reset_code` text NOT NULL,
  `reset_date` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `owner`, `email`, `password`, `image`, `logo`, `description`, `phone`, `address`, `region`, `zipcode`, `latitude`, `longitude`, `reset_code`, `reset_date`, `status`) VALUES
(1, 'House of Dunk', 'Mech Statham', 'store@store.com', '0192023a7bbd73250516f069df18b500', '1490090640img_1.png', '1490089137logo_1.png', 'House of Dunk is downtown Seattle\'s high-end recreational cannabis store, open to everyone 21 and over. We offer a wide variety of premium marijuana strains, concentrates and edibles.', ' 91 999 8888 123', 'Southern California', 'Southern California', '3620', '34.94570', '-116.68306', '', '2017-03-01 00:00:00', 'Active'),
(2, 'John', 'John', 'store1@store.com', '0192023a7bbd73250516f069df18b500', '', '', '', '', '', '', '', '', '', 'eXfJeOFBZf', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `status`) VALUES
(1, 'Sativa', 'Active'),
(2, 'Hybrid', 'Active'),
(3, 'Indica', 'Active'),
(4, 'CBD', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `verification_code` varchar(150) DEFAULT NULL,
  `identification_id` varchar(100) DEFAULT NULL,
  `identification_photo` varchar(250) DEFAULT NULL,
  `recommendation_photo` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `region` varchar(250) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `country` int(10) NOT NULL,
  `state` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_device`
--

CREATE TABLE `user_device` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `device_id` varchar(250) NOT NULL,
  `device_token` varchar(300) NOT NULL,
  `device_type` varchar(250) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_device`
--
ALTER TABLE `user_device`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_device`
--
ALTER TABLE `user_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
