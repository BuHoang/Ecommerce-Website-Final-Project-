-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 10:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_image` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_country` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_about` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `admin_job` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_country`, `admin_about`, `admin_phone`, `admin_job`) VALUES
(2, 'Boss Hoang', 'hoangbvgch17056@fpt.edu.vn', '123456', 'admin4.jpg', 'Vietnam', '<p>I am the 1st Admin</p>', '0974-555-666', 'Tester'),
(3, 'Admin Duong', 'duong123@gmail.com', '123456', 'admin.jpg', 'Vietnam', '<p>I am the 2th Admin</p>', '0933-777-888', 'Web Developer'),
(4, 'Admin Viet Hoang', 'hoang1835@gmail.com', 'hoangpzo123', 'admin1.jpg', 'Vietnam', '<p><span style=\"color: #444444; font-family: sans-serif; font-size: 13.12px;\">I am the creator of this website</span></p>', '0962-379-888', 'Programmer'),
(6, 'Admin Dat', 'dat123@gmail.com', '123456', 'admin5.jpg', 'Vietnam', 'I am the 3th Admin', '0977-666-111', 'Coder');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text CHARACTER SET utf8mb4 NOT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_desc`) VALUES
(1, 'Prada', 'This is the brand related to Prada company. This brand has been edited'),
(2, 'Canifa', 'This is the brand related to Canifa company'),
(3, 'H&M', 'This is the brand related to H&M company'),
(4, 'Zara', 'This is the brand related to Zara company'),
(5, 'Other', 'This is the brand related to Other');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(8, '::1', 2, 'Medium'),
(9, '::1', 3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text CHARACTER SET utf8mb4 NOT NULL,
  `cat_desc` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Vest', 'This is the category including with all Vest shirts and Vest suits. It is suitable for both men and women'),
(2, 'Jacket', 'This is the category including with all Jacket'),
(3, 'T-shirt', 'This is the category including with all T-shirt.  It is suitable for both men and women'),
(4, 'Sport', 'This is the category including with all Sport suits'),
(5, 'Coat', 'This is the category including with all Coat');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_phone`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Robert Downey Jr', 'RobertDowney123@yahoo.com', '123456', 'USA', 'California', '0866-555-888', 'Arrow Highway', 'c2.jpg', '::1'),
(2, 'Hoang V', 'goddragon703@gmail.com', 'hoangpzo123', 'Vietnam', 'Ha Noi', '0962-379-888', 'FPT Greenwich university', 'myimage.jpg', '::1'),
(3, 'Steve rogers', 'SteveRoger@gmail.com', '123456', 'USA', 'New York', '0856-444-666', 'Broadway', 'c3.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 2, 210, 93551031, 3, 'Small', '2020-07-08', 'Completed'),
(2, 2, 170, 93551031, 2, 'Medium', '2020-07-08', 'Pending'),
(3, 2, 74, 93551031, 1, 'Large', '2020-07-08', 'Pending'),
(4, 1, 168, 41895869, 3, 'Medium', '2020-07-08', 'Completed'),
(5, 1, 96, 41895869, 2, 'Large', '2020-07-08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount_send` int(100) NOT NULL,
  `payment_method` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount_send`, `payment_method`, `ref_no`, `payment_date`) VALUES
(1, 93551031, 210, 'PayPal', 5210, '07/07/2020'),
(2, 41895869, 168, 'Credit Card', 3420, '07/07/2020');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 2, 93551031, 2, 3, 'Small', 'Completed'),
(2, 2, 93551031, 8, 2, 'Medium', 'Pending'),
(3, 2, 93551031, 9, 1, 'Large', 'Pending'),
(4, 1, 41895869, 1, 3, 'Medium', 'Completed'),
(5, 1, 41895869, 4, 2, 'Large', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `procloth`
--

CREATE TABLE `procloth` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procloth`
--

INSERT INTO `procloth` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 2, 1, '2020-07-07 18:16:12', 'Slim Fit Solid Men Bomber Jacket', 'jacket-1.jpg', 'jacket-1.1.jpg', 'jacket-1.2.jpg', 56, 'This is a slim jacket for men with durable material and made in China', 'Bomber'),
(2, 3, 2, '2020-07-07 18:26:03', 'Summer T-shirt Three Types For Men', 't-shirt.jpg', 't-shirt-1.jpg', 't-shirt-2.jpg', 70, 'This is a summer T-shirt with three types for men accompanied by high quality and reasonable price', 'Summer T-shirt'),
(3, 1, 2, '2020-07-07 18:26:03', 'Men Fitness Hoodies Tank Tops Vest', 'vest.jpg', 'vest-1.jpg', 'vest-2.jpg', 45, 'This is a Men Fitness Hoodies Vest with three types for men accompanied by high quality and reasonable price', 'Tank Tops'),
(4, 5, 2, '2020-07-07 18:26:03', 'Mens Overcoat Fashion Autumn Winter Button', 'coat.jpg', 'coat-1.jpg', 'coat-2.jpg', 48, 'This is a Men Overcoat Fashion Autumn Winter Button with three types for men accompanied by high quality and reasonable price', 'Overcoat'),
(5, 5, 4, '2020-07-07 18:26:03', 'Winter Coat Women Work Solid Vintage', 'Winter-Coat-Women.jpg', 'Winter-Coat-Women-1.jpg', 'Winter-Coat-Women-2.jpg', 80, 'This is a Winter Coat Women with three types for women accompanied by high quality and reasonable price', 'Winter Coat'),
(6, 1, 3, '2020-07-07 18:26:03', 'Women Vest Cotton Hooded', 'Vest-Cotton.jpg', 'Vest-Cotton-1.jpg', 'Vest-Cotton-2.jpg', 100, 'This is a Vest Cotton Hooded with three types for women accompanied by high quality and reasonable price', 'Vest Cotton'),
(7, 3, 2, '2020-07-07 18:26:03', 'T-Shirts Women Fashion Graphic Print', 'T Shirts-Women.jpg', 'T Shirts-Women-1.jpg', 'T Shirts-Women-2.jpg', 110, 'This is a T-Shirt Women Fashion Graphic Print with three types for women accompanied by high quality and reasonable price', 'Graphic Print'),
(8, 3, 3, '2020-07-07 18:29:44', '3D printed Image Men T-shirt', '3D printed t-shirt-new-1.jpg', '3D printed t-shirt-new-2.jpg', '3D printed t-shirt-new-3.jpg', 85, '3D printed Image T-shirt for men with three types accompanied by high quality and reasonable price', '3D printed'),
(9, 3, 4, '2020-07-07 18:29:44', '3D printed Image Clow Men T-shirt', '3D clow printed t-shirt-1.jpg', '3D clow printed t-shirt-2.jpg', '3D clow printed t-shirt-3.jpg', 74, 'This is the 3D printed Image Clow Men T-shirt with three types I have for you', 'Clow');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'ad3.jpg'),
(2, 'Slide number 2', 'ad5.jpg'),
(3, 'Slide number 3', 'ad4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `procloth`
--
ALTER TABLE `procloth`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `procloth`
--
ALTER TABLE `procloth`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
