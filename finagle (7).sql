-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 08:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finagle`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `description`, `end_date`) VALUES
(1, 'assests/img/ad2.png', 'its the new deal', '2024-01-10'),
(5, 'asdfsf', 'asas', '2024-01-05'),
(7, 'one .png', 'this is a new one', '2024-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `address`, `contact_number`, `open_time`, `close_time`) VALUES
(13, 'Borella', '104/2, Main road, Borella', '077-1045678', '00:00:00', '00:00:00'),
(20, 'kahawatta', 'no 180 main road', '0885353', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Bread & Buns'),
(3, 'Cakes'),
(2, 'Frozen Foods');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `delivery_or_pickup` varchar(20) NOT NULL,
  `deliver_id` int(11) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `pickup_location` varchar(100) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT '''order placed''',
  `delivery_date` date DEFAULT NULL,
  `delivery_time` date DEFAULT NULL,
  `total_cost` decimal(10,0) NOT NULL,
  `is_gift` varchar(5) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  `formatted_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `customer_id`, `name`, `email`, `phone_number`, `delivery_or_pickup`, `deliver_id`, `delivery_address`, `pickup_location`, `order_time`, `latitude`, `longitude`, `order_status`, `delivery_date`, `delivery_time`, `total_cost`, `is_gift`, `payment_method`, `note`, `formatted_address`) VALUES
(1, 2, 'Malki yasodhara', 'malki@gmail.com', '0712345678', 'delivery', 1, 'dikkumbura,Galle', '', '2024-04-05 22:54:12', 0, 0, 'ready', NULL, NULL, 0, 'yes', 'card', '', ''),
(2, 2, 'Dilum', 'dilum@gmail.com', '0779998772', 'delivery', 1, 'School lane,dehiwala', '', '2024-04-05 22:54:12', 45, 80, 'ready', '2024-04-17', NULL, 5000, 'no', 'cash', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teleno` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `complaint` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `teleno`, `email`, `complaint`) VALUES
(1, 'Pahasara Nimnath', 772815328, 'Pahasarajayasuriya@gmail.com', 'test'),
(2, 'Pahasara Nimnath', 772815328, 'lecturer@example.com', '14'),
(3, 'Pahasara Nimnath jayasuriya', 767979888, 'malki@gmail.com', 'not good'),
(4, 'Pahasara Nimnath', 767979888, 'ilippunuburideyyo@gmail.com', '5555'),
(5, 'malki', 772815328, 'malki@gmail.com', ';lkkk'),
(6, 'induwara', 767979888, 'lecturer@example.com', 'efdg'),
(7, 'lumbini', 767979888, 'babieshackout1@gmail.com', 'fgf');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `image` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`image`, `id`, `name`, `username`, `email`, `contact_no`, `address`) VALUES
('malki.jpg', 1, 'Malki', 'Malki01', 'malki@gmail.com', '0779998772', '24/5,Temple Road,Galle'),
('dilum.jpg', 2, 'Dilum', 'Dilum02', 'dilum@gmail.com', '0771516454', '5/D,Main road,Borella'),
('pahasara.jpg\r\n', 3, 'Pahasara ', 'Pahasara03', 'pahasara@gmail.com', '0774567893', '22/5,School Lane,Matara');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `joined_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `username`, `password`, `email`, `contact_number`, `branch`, `DOB`, `joined_date`) VALUES
(1, 'thisen', 'sarath', '123', 'sarath@gmail.com', '0775698456', 'colombo 03', '2023-11-07', '2023-11-15'),
(3, 'pabasara', 'pahaxara.j', '12345', 'babieshackout1@gmail.com', '0779845328', 'mathara', '2023-10-30', '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `Joined_Date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `branch`, `image`, `email`, `username`, `password`, `branch_id`, `Joined_Date`) VALUES
(2, 'Borella', 'Malki002.jpg', 'malkiyasodhara@gmail.com', 'Malki002', '2348', 13, '2024-01-05 21:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `joined_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `username`, `password`, `email`, `contact_number`, `branch`, `DOB`, `joined_date`) VALUES
(16, 'alaka', 'pahaxara.j', '1234567', 'Pahasarajayasuriya@gmail.com', '0112783530', 'ja ela', '2023-11-25', '2023-11-16'),
(17, 'akalanka', 'pahaxara.j', '1234', 'Pahasarajayasuriya@gmail.com', '0779845328', 'mathara', '2023-11-11', '2023-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `order-status`
--

CREATE TABLE `order-status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order-status`
--

INSERT INTO `order-status` (`status_id`, `status`) VALUES
(1, 'Completed'),
(2, 'Pending'),
(3, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `image` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_of_order` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`image`, `order_id`, `username`, `date_of_order`, `status`) VALUES
('yowin.jpg', 1, 'John Doe', '2021-01-11', 'Completed'),
('Malki002.jpg', 2, 'Malki Yash', '2021-01-27', 'Pending'),
('Dilum001.jpg', 3, 'Dilum IR', '2024-01-03', 'Processing'),
('dilum.jpg', 4, 'Thushabnka01', '2021-01-20', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_name`, `description`, `category`, `price`, `quantity`, `image`, `date`, `slug`) VALUES
(14, 'Hot Dog Bun', 'test description 1', 'Bread & Buns', 350, 28, 'hotdog.jpg', NULL, NULL),
(15, 'Crust Top Bread', 'test description 2', 'Bread & Buns', 400, 22, 'delicious-bread.jpg', NULL, NULL),
(16, 'Black Forest Cake', 'test description 3', 'Cakes', 3400, 26, 'black-forest-cake.jpg', NULL, NULL),
(17, 'Chicken Bun', NULL, 'Frozen Foods', 500, 18, 'chicken_bun.jpg', NULL, NULL),
(18, 'Burger Bun', NULL, 'Bread & Buns', 450, 21, 'burger-bun.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `teleno` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `reset_token_hash` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `teleno`, `role`, `address`, `branch`, `joined_date`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'pahaxara.j', 'Pahasarajayasuriya@gmail.com', '$2y$10$LSD3omeYEe.DR6iOnMZuROw5bTw3o4M7YNRhX5k0ryrvbzNMaW8je', '0772815328', 'customer', NULL, NULL, NULL, NULL, NULL),
(2, 'Malki yashodara', 'malki@gmail.com', '$2y$10$CmLAN5J/5y/PUqubZ1TqIeEH0pJvg/AUi0GJ/9tmfqchPc.N.LmTK', '0767979888', 'customer', '', NULL, NULL, NULL, NULL),
(3, 'Dinithi', 'dinithi@gmail.com', '$2y$10$d2EZWb4TxXAL.3WqOk4NG.UQvnEyH3nhBNAAKevB.TM2o34O/BDf2', '0778956999', 'customer', NULL, NULL, NULL, NULL, NULL),
(4, 'Admin', 'admin@gmail.com', '$2y$10$Ruv7i0UxtleJt3wM1m/8nudotPZedVjpGtYJ5clqZ6h96hCjnLU0m', '0112236976', 'admin', '', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deliver_id` (`deliver_id`),
  ADD KEY `fk_user_id` (`customer_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_Key` (`branch_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order-status`
--
ALTER TABLE `order-status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `user_id` (`user_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_deliver_id` FOREIGN KEY (`deliver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Foreign_Key` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `order-status` (`status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
