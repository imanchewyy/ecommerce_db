-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2026 at 11:36 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Fashion'),
(3, 'Accessories'),
(4, 'Fitness');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created`) VALUES
(2, 6, 5098.00, 'completed', '2026-05-23 02:00:47'),
(3, 6, 299.00, 'completed', '2026-05-23 02:15:18'),
(4, 8, 458.60, 'completed', '2026-05-24 02:13:59'),
(5, 9, 239.80, 'Completed', '2026-05-24 04:26:47'),
(6, 10, 199.80, 'Completed', '2026-05-24 07:18:20'),
(7, 8, 29.90, 'Completed', '2026-05-24 08:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(3, 2, 1, 1, 4999.00),
(4, 2, 3, 1, 99.00),
(5, 3, 2, 1, 299.00),
(6, 4, 4, 1, 129.90),
(7, 4, 7, 1, 89.90),
(8, 4, 3, 1, 99.00),
(9, 4, 9, 1, 79.90),
(10, 4, 12, 1, 59.90),
(11, 5, 5, 1, 199.90),
(12, 5, 8, 1, 39.90),
(13, 6, 11, 1, 149.90),
(14, 6, 14, 1, 49.90),
(15, 7, 13, 1, 29.90);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `quantity` int DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `specification` text,
  `material` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `created`, `modified`, `specification`, `material`, `category_id`) VALUES
(1, 'iPhone 15', 'Latest Apple phone', 4999.00, 10, NULL, '2026-05-23 08:23:14', '2026-05-24 09:49:47', '6.1 inch display, A15 chip, Dual camera', 'Aluminium & Glass', 1),
(2, 'Mechanical Keyboard', 'RGB gaming keyboard', 299.00, 20, NULL, '2026-05-23 08:23:14', '2026-05-24 09:46:42', 'RGB Lighting, Blue Switch, Wired USB', 'ABS Plastic + Metal Plate', 1),
(3, 'Wireless Mouse', 'Logitech mouse', 99.00, 50, NULL, '2026-05-23 08:23:14', '2026-05-24 09:46:42', '2.4GHz Wireless, 1600 DPI, USB Receiver', 'Plastic Matte Finish', 3),
(4, 'Wireless Bluetooth Headphones', 'High quality wireless headphones with noise cancellation and long battery life.', 129.90, 20, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Bluetooth 5.0, Battery: 20 hours, Range: 10m', 'Plastic & Metal', 1),
(5, 'Gaming Mechanical Keyboard', 'RGB mechanical keyboard perfect for gaming with fast response switches.', 199.90, 15, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Switch Type: Blue Switch, RGB Lighting, USB Wired', 'ABS Plastic', 3),
(6, 'Smart Watch Series 8', 'Smart watch with health tracking, heart rate monitor and notifications.', 299.00, 10, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Display: 1.8 inch, Battery: 2 days, Waterproof', 'Aluminium Alloy', 1),
(7, 'Portable Power Bank 20000mAh', 'High capacity power bank suitable for travel and daily use.', 89.90, 30, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Capacity: 20000mAh, Output: 2 USB ports', 'Plastic', 1),
(8, 'Men Casual T-Shirt', 'Comfortable casual t-shirt suitable for daily wear.', 39.90, 50, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Sizes: S, M, L, XL, Breathable fabric', 'Cotton', 2),
(9, 'Women Handbag Fashion', 'Stylish handbag suitable for work and casual outings.', 79.90, 25, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Compartments: 3, Strap adjustable', 'PU Leather', 2),
(10, 'Laptop Backpack Waterproof', 'Durable waterproof backpack with laptop compartment.', 69.90, 18, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Fits up to 15.6 inch laptop, Multi-pocket design', 'Polyester', 2),
(11, 'Sports Running Shoes', 'Lightweight running shoes with comfortable cushioning.', 149.90, 22, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Sizes: 40-45, Anti-slip sole', 'Mesh Fabric & Rubber', 2),
(12, 'LED Desk Lamp Touch Control', 'Modern LED desk lamp with touch control and adjustable brightness.', 59.90, 35, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', '3 Brightness levels, USB powered', 'Plastic & Metal', 3),
(13, 'Stainless Steel Water Bottle', 'Reusable water bottle that keeps drinks hot or cold.', 29.90, 40, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Capacity: 750ml, Thermal insulation', 'Stainless Steel', 4),
(14, 'Wireless Mouse Ergonomic', 'Ergonomic wireless mouse for comfortable long usage.', 49.90, 28, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', '2.4GHz Wireless, DPI adjustable', 'Plastic', 3),
(15, 'Bluetooth Speaker Portable', 'Portable speaker with powerful bass and long battery life.', 99.90, 16, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Battery: 10 hours, Bluetooth 5.0', 'Plastic', 4),
(16, 'Gaming Chair Adjustable', 'Comfortable gaming chair with adjustable height and recline.', 499.00, 5, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Max load: 120kg, Recline up to 135°', 'PU Leather & Metal', 3),
(17, '4K Ultra HD Monitor 27 inch', 'High resolution monitor suitable for work and gaming.', 899.00, 7, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', 'Resolution: 3840x2160, IPS Panel', 'Plastic & Metal', 1),
(18, 'Fitness Resistance Band Set', 'Set of resistance bands for home workout and fitness training.', 39.90, 45, NULL, '2026-05-23 10:30:14', '2026-05-24 09:09:54', '5 Levels resistance, Portable', 'Latex Rubber', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`, `email`, `phone`) VALUES
(5, 'akmalz', '$2y$10$h0eZHDUiCObKomauW33hEuHuiNkAOIE9RjLiw2K5ZVm4wymBLARVW', '2026-05-23 01:15:57', '2026-05-23 01:15:57', NULL, NULL),
(6, 'manjiqq', '$2y$10$OqTf5TkDe/SL6yZPNuQbEuig040UWW58hvz0.MOj6GuBJDIhdlqwO', '2026-05-23 01:55:05', '2026-05-23 03:02:36', NULL, NULL),
(7, 'akmalzakri', '$2y$10$4Itesg1j/3YCt51VZ/RacePfdppja.NQdcIoQbarK5/phVK6z14Gi', '2026-05-23 03:12:50', '2026-05-23 03:15:44', 'akmalzakri09@gmail.com', '0176748442'),
(8, 'fitrah hanim', '$2y$10$b3vznDBozNoXZMEy3xQBcudJpCBa10H/g8JNADvu55R8IKj3LFkN2', '2026-05-23 12:31:10', '2026-05-23 12:31:10', 'fitrahhanim12@gmail.com', '0194024564'),
(9, 'raziq ', '$2y$10$qyhIviDlI61uU4RTTFItZuty1EZu2cUtKwGgOr6MFnmp8r1bjcry6', '2026-05-24 04:11:31', '2026-05-24 04:11:31', 'raziq19@gmail.com', '0124411441'),
(10, 'tony ifrit', '$2y$10$K0tw0nrm.x6cQKlPnNC/ae4y8kKlR1kTvLs8e5QW4Iez3Dq/uP9iW', '2026-05-24 07:17:36', '2026-05-24 07:17:36', 'tony69@gmail.com', '0128871447'),
(11, 'harith', '$2y$10$WdFR2UcTt45iBDlp5Ncx.ub//FGpGB5E0txPGNDpnVH33KJS4ADWO', '2026-05-24 08:21:59', '2026-05-24 08:21:59', 'harithperd@gmail.com', '0114142325');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
