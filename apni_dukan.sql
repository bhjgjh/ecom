-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 03:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apni_dukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `session_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `product_id`, `session_id`, `product_name`, `quantity`, `rate`) VALUES
(9, 14, 421606, 'jwellry', 2, '40000'),
(10, 19, 445538, 'cloths', 2, '250'),
(29, 10, 95170, 'cloths', 7, '250'),
(31, 20, 95170, 'jwellry', 5, '40000'),
(32, 13, 146135, 'cloths', 2, '250'),
(33, 25, 80444, 'cloths', 1, '250'),
(35, 11, 82575, 'jwellry', 1, '40000'),
(36, 10, 82575, 'cloths', 1, '250'),
(47, 25, 165151, 'cloths', 1, '250'),
(48, 14, 524953, 'jwellry', 1, '40000'),
(51, 28, 685200, 'bag', 2, '2000'),
(52, 45, 593224, 'Speaker', 1, '1000'),
(53, 38, 179572, 'Pendant', 1, '40000');

-- --------------------------------------------------------

--
-- Table structure for table `ms_admin`
--

CREATE TABLE `ms_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_admin`
--

INSERT INTO `ms_admin` (`id`, `username`, `password`, `fullname`, `login_date`) VALUES
(1, 'admin', 'admin', 'Ganesh', '2022-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `ms_temp_address`
--

CREATE TABLE `ms_temp_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `my_categories`
--

CREATE TABLE `my_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `count_products` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_categories`
--

INSERT INTO `my_categories` (`id`, `category_name`, `image`, `date`, `status`, `count_products`) VALUES
(16, 'Cloths', 'clothes.jpg', '2022-03-12', 0, 0),
(17, 'Grocery', 'grocery.jpg', '2022-03-12', 0, 0),
(18, 'Home & Kitchen', 'home_kitchen.jpg', '2022-03-12', 0, 0),
(19, 'Electronics', 'eclectronics.jpg', '2022-03-12', 0, 0),
(20, 'Jewellery', 'jewellery.jpg', '2022-03-12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `rate`) VALUES
(2, 3, 19, 'cloths', '1', '250'),
(3, 2, 13, 'cloths', '2', '250'),
(23, 25, 13, 'cloths', '2', '250'),
(24, 25, 28, 'bag', '2', '2000'),
(25, 26, 28, 'bag', '1', '2000'),
(26, 27, 22, 'cloths', '1', '250'),
(27, 28, 19, 'cloths', '1', '250'),
(28, 29, 22, 'cloths', '1', '250'),
(29, 29, 28, 'bag', '1', '2000'),
(30, 30, 22, 'cloths', '1', '250'),
(31, 30, 25, 'cloths', '1', '250'),
(32, 31, 35, 'Earring', '1', '15000'),
(33, 32, 58, 'Patanjali Ghee', '1', '510'),
(34, 32, 38, 'Pendant', '1', '40000'),
(35, 32, 44, 'Headphone', '1', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `total_quantity` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `delivered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `user_name`, `total_quantity`, `total_amount`, `order_date`, `shipping_address`, `order_status`, `delivered_date`) VALUES
(26, 2, 'ganesh', '1', '2000', '2022-04-02', 'rohini', 'Packed', '0000-00-00'),
(27, 2, 'ganesh', '1', '250', '2022-04-04', 'delhi', 'Delivered', '0000-00-00'),
(28, 2, 'ganesh', '1', '250', '2022-04-03', 'nangloi', 'pending', '0000-00-00'),
(29, 2, 'ganesh', '2', '2250', '2022-04-08', 'delhi rohini', 'Delivered', '0000-00-00'),
(30, 2, 'ganesh', '2', '500', '2022-05-03', 'ffhjfjfjf', 'Delivered', '0000-00-00'),
(31, 2, 'ganesh', '1', '15000', '2022-05-14', 'jhjhjhjhjhjh', 'pending', '0000-00-00'),
(32, 2, 'ganesh', '3', '42510', '2022-05-22', 'kjccjckc', 'pending', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `id` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` int(1) NOT NULL,
  `upload_date` date NOT NULL,
  `count_sales` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `product_title`, `category_id`, `image`, `short_description`, `color`, `weight`, `price`, `status`, `upload_date`, `count_sales`) VALUES
(31, 'Necklaces.', 20, 'jwellery.jpg', 'Best Handmade Necklaces. In India ', 'Gold', '20gm', '40000', 0, '2022-05-08', '0'),
(32, 'Ring', 20, 'ring1.jpg', 'Best Handmade Ring. In India', 'Platinum', '10gm', '20000', 0, '2022-05-08', '0'),
(35, 'Earring', 20, 'Gold_Earring.jpg', 'Best Gold Earring in Best Price', 'Gold', '10gm', '15000', 0, '2022-05-08', '0'),
(36, 'Banggle', 20, 'Gold_Banggle.jpg', 'Pure Gold ', 'Gold', '20gm', '55000', 0, '2022-05-08', '0'),
(37, 'Chain', 20, 'chain.jpg', 'Diamong Chian ', 'Diamond', '30gm', '100000', 0, '2022-05-08', '0'),
(38, 'Pendant', 20, 'Pendant.jpg', 'Handmade Pendant', 'Gold', '20gm', '40000', 0, '2022-05-08', '0'),
(39, 'Nose Pin', 20, 'Nose_Pin.jpg', 'Nose Pin', 'Gold', '5gm', '10000', 0, '2022-05-08', '0'),
(40, 'Printer', 19, 'Printer.jpg', 'Printer', 'Black', '1.5kg', '25000', 0, '2022-05-08', '0'),
(41, 'Camera', 19, 'Camera.jpg', 'sony camera', 'Black', '500gm', '30000', 0, '2022-05-08', '0'),
(42, 'Laptop', 19, 'laptop.jpeg', 'Best gaming laptop', 'Black', '1kg', '45000', 0, '2022-05-08', '0'),
(43, 'Mobile', 19, 'mobile.jpg', 'Redmi mobile', 'Blue', '200gm', '15000', 0, '2022-05-08', '0'),
(44, 'Headphone', 19, 'Headphone.jpg', 'Headphone ', 'Black', '100gm', '2000', 0, '2022-05-08', '0'),
(45, 'Speaker', 19, 'Speaker.jpg', 'Blutooth Headphone', 'BLack', '200gm', '1000', 0, '2022-05-08', '0'),
(46, 'chakla', 18, 'chakla.jpeg', 'chakla belan', 'wooden', '80gm', '150', 0, '2022-05-08', '0'),
(48, 'Nonstick Cookware Set, Marine Blue', 18, 'Nonstick_Cookware_Set,_Marine_Blue.jpg', 'Best Nonstick Cookware Set, Marine Blue', 'Marine Blue', '500gm', '680', 0, '2022-05-13', '0'),
(49, 'for Corporate Gifting', 18, 'Drink_Utility.jpg', 'for Corporate Gifting', 'Blue', '200gm', '500', 0, '2022-05-13', '0'),
(50, 'Dinner Set ', 18, 'Dinner_Set.jpg', 'Dinner Set ', 'White', '200gm', '1200', 0, '2022-05-13', '0'),
(51, 'Egg boiler', 18, 'Egg_boiler.jpg', 'Egg boiler', 'Trans', '200gm', '500', 0, '2022-05-13', '0'),
(52, 'rod', 18, 'rod.jpg', 'rod', 'steel', '50gm', '350', 0, '2022-05-13', '0'),
(53, 'Aashirvaad Atta', 17, 'tttttt.jpg', 'Aashirvaad Atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite. It is carefully ground using modern \'chakki - grinding\' process ...\r\n\r\n   ', 'white', '5Kg', '130', 0, '2022-05-13', '0'),
(54, 'Indian pulses', 17, 'daal.jpg', 'Indian pulses', 'All ', '500gm', '120', 0, '2022-05-13', '0'),
(55, 'Horlicks', 17, 'horlicks.jpg', 'Horlicks, made from Milk, Wheat and 27 vital nutrients,', 'Choklate', '500gm', '300', 0, '2022-05-13', '0'),
(56, 'Rice', 17, 'india_gate.jpg', 'India Gate Basmati Rice', 'white', '10kg', '600', 0, '2022-05-13', '0'),
(57, 'madhur sugar', 17, 'madhur.jpg', 'sugar', 'white', '500gm', '100', 0, '2022-05-13', '0'),
(58, 'Patanjali Ghee', 17, 'Patanjali_Ghee.jpeg', 'Patanjali Cow Ghee is full of nutritive properties and an ideal diet. Cow ghee increases memory, intellect, the power of digestion, Ojas, Kapha and fat.', 'white', '1kg', '510', 0, '2022-05-13', '0'),
(59, 'Shirt', 16, 'Dress_Shirt.jpg', ' IndiaMART Men\'s Cotton Formal Shirt, Full Or Long Sleeves', 'blue,red,white,black', '100gm', '450', 0, '2022-05-13', '0'),
(60, 'Track pants ', 16, 'Men_Lower.jpg', 'Track pants are ideal workout wear for men with their versatile features. ... These comfortable lowers may be worn with T-shirts and sneakers as casual ...', 'white', '200gm', '300', 0, '2022-05-13', '0'),
(61, 'Women Cloths', 16, 'Women_Cloth.jpg', 'Here you get to lay your hands on the women clothes shopping online, be it indian or western wear, tops or skirts, bags or belts, and a lot more in few simple ... ', 'green', '100gm', '650', 0, '2022-05-13', '0'),
(62, 'Men Tshirt', 16, 'Men_Tshirt.jpg', 'Wearing the simplest outfits like jeans and a new style t shirt for men can bring ...', 'black', '100gm', '150', 0, '2022-05-13', '0'),
(63, 'Mask', 16, 'mask.jpg', 'Mask', 'black', '30gm', '100', 0, '2022-05-13', '0'),
(64, 'Gents Coat Pant', 16, 'Gents_Coat_Pant.jpg', 'Gents Coat Pant ', 'black', '500gm', '4000', 0, '2022-05-13', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_products`
--

INSERT INTO `sold_products` (`id`, `product_id`) VALUES
(1, 22),
(2, 22),
(3, 22),
(4, 22),
(5, 28),
(6, 22),
(7, 25),
(8, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` decimal(10,0) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `fullname`, `email`, `mobile_no`, `password`, `address`, `register_date`) VALUES
(2, 'ganesh', 'ganeshmishra1997@gmail.com', '8802931278', '12345678', 'Delhi', '2022-03-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_admin`
--
ALTER TABLE `ms_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_temp_address`
--
ALTER TABLE `ms_temp_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_categories`
--
ALTER TABLE `my_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ms_admin`
--
ALTER TABLE `ms_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_temp_address`
--
ALTER TABLE `ms_temp_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `my_categories`
--
ALTER TABLE `my_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
