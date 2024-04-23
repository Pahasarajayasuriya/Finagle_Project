-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 06:22 PM
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
(7, 'one .png', 'this is a new one', '2024-02-02'),
(9, 'uploads/Screenshot (16).png', 'test', '2024-04-06'),
(10, 'uploads/Screenshot (39).png', 'dd', '2024-04-17');

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
  `deliver_id` int(11) DEFAULT NULL,
  `delivery_address` varchar(100) DEFAULT NULL,
  `pickup_location` varchar(100) DEFAULT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'order placed',
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `total_cost` decimal(10,0) NOT NULL,
  `is_gift` varchar(5) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `customer_id`, `name`, `email`, `phone_number`, `delivery_or_pickup`, `deliver_id`, `delivery_address`, `pickup_location`, `order_time`, `latitude`, `longitude`, `order_status`, `delivery_date`, `delivery_time`, `total_cost`, `is_gift`, `payment_method`, `note`) VALUES
(51, 1, 'Pahasara Nimnath', 'Pahasarajayasuriya@gmail.com', '0772815328', 'pickup', NULL, '', 'Pelawatta', '2024-04-08 22:00:40', 0, 0, 'order placed', '2024-04-08', '21:59:00', 450, 'no', 'cash', ''),
(52, 1, 'test', 'test@gmail.com', '0772815328', 'pickup', NULL, '', 'Borella', '2024-04-08 22:44:33', 0, 0, 'order placed', '2024-04-09', '12:44:00', 7350, 'yes', 'cash', 'test'),
(157, 1, 'Pahasara', 'admin@gmail.com', '0772815328', 'pickup', NULL, '', 'Pelawatta', '2024-04-10 12:18:17', 0, 0, 'order placed', '2024-04-10', '12:11:00', 13500, 'no', 'cash', ''),
(170, 1, 'Pahasara Nimnath', 'Pahasarajayasuriya@gmail.com', '0772815328', 'delivery', NULL, 'Mattakkuliya, Colombo, Sri Lanka', NULL, '2024-04-14 21:17:07', 6.84196, 79.9277, 'order placed', '2024-04-14', '21:16:00', 700, 'no', 'cash', ''),
(176, 1, 'Pahasara Nimnath', 'Pahasarajayasuriya@gmail.com', '0772815328', 'delivery', NULL, 'Jaffna, Sri Lanka', NULL, '2024-04-14 21:36:19', 9.6615, 80.0255, 'order placed', '2024-04-14', '21:36:00', 750, 'yes', 'cash', '');

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
(7, 'lumbini', 767979888, 'babieshackout1@gmail.com', 'fgf'),
(8, 'Pahasara Nimnath test', 772815328, 'Pahasarajayasuriya@gmail.com', 'test test test');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_id`, `product_id`, `quantity`) VALUES
(157, 15, 2),
(157, 16, 3),
(157, 17, 1),
(157, 18, 5),
(170, 18, 1),
(176, 17, 1);

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
(14, 'Hot Dog Bun', 'The ideal quick solution fix to satisfy hunger pangs of adults as well as kids. Enjoy with your favourite sausage and sauce.', 'Bread & Buns', 350, 4, 'uploads/hotdog.jpg', NULL, NULL),
(15, 'Crust Top Bread', 'The crust on top to give you the authentic taste of the traditional product. Our equivalent of “Kade Paan”.', 'Bread & Buns', 400, 8, 'uploads/crust-top-bread.jpg', NULL, NULL),
(16, 'Black forest gateau', 'To be so named, Kirsch, the specialty liquor distilled from sour cherries sourced from the black forest region of Germany must be included in the recipe.', 'Cakes', 3400, 17, 'uploads/black-forest-cake.jpg', NULL, NULL),
(17, 'Chicken Bun', 'Chicken cooked with vegetables, spiced, wrapped in dough and baked to a golden brown.', 'Frozen Foods', 500, 15, 'uploads/chicken_bun.jpg', NULL, NULL),
(18, 'Burger Bun', 'Soft full sized Finagle burger buns to make a quick, perfect burger with your favourite fillings. Helps to make a quick but delicious fix to satisfy your hunger, or an easy meal for kids.', 'Bread & Buns', 450, 16, 'uploads/burger-bun.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `review` varchar(500) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userName`, `image`, `rating`, `review`, `datetime`) VALUES
(1, 'Mithun Weerasinghe', 'https://i.pinimg.com/474x/61/23/72/612372dba970fe25663857c585e8d56e.jpg', 5, 'Super and excellent productions. And my favorite product was roller cake.', '2024-04-12 17:49:19'),
(2, 'Pahasara Jayasuriya', 'https://i.pinimg.com/474x/01/cb/08/01cb089df6c94483423dc52f63cf7762.jpg', 5, 'Tasty soft buns for burgers and submarines. Quality is great, love it', '2024-04-12 17:49:42'),
(3, 'Senuri Hettiarachchi', 'https://i.pinimg.com/474x/6b/03/09/6b030941295661a780641ea0922d09c6.jpg', 5, 'Love the bread and bakery items produced by them. Top quality❤️❤️', '2024-04-12 17:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `image`, `email`, `password`, `teleno`, `role`, `address`, `branch`, `joined_date`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'pahaxara.j', '', 'Pahasarajayasuriya@gmail.com', '$2y$10$LSD3omeYEe.DR6iOnMZuROw5bTw3o4M7YNRhX5k0ryrvbzNMaW8je', '0772815328', 'customer', NULL, NULL, NULL, NULL, NULL),
(2, 'Malki yashodara', '', 'malki@gmail.com', '$2y$10$CmLAN5J/5y/PUqubZ1TqIeEH0pJvg/AUi0GJ/9tmfqchPc.N.LmTK', '0767979888', 'customer', '', NULL, NULL, NULL, NULL),
(3, 'Dinithi', '', 'dinithi@gmail.com', '$2y$10$d2EZWb4TxXAL.3WqOk4NG.UQvnEyH3nhBNAAKevB.TM2o34O/BDf2', '0778956999', 'customer', NULL, NULL, NULL, NULL, NULL),
(4, 'Admin', '', 'admin@gmail.com', '$2y$10$Ruv7i0UxtleJt3wM1m/8nudotPZedVjpGtYJ5clqZ6h96hCjnLU0m', '0112236976', 'admin', '', NULL, NULL, NULL, NULL),
(5, 'Yowin', '', 'yowin@gmail.com', '$2y$10$KBl6dIIeKMbxhsFNV87re./42UvqP2llmU.vDHkScsezlduS.0CHa', '0745648988', 'employee', NULL, 'Borella', '2024-04-01', NULL, NULL),
(6, 'sahan', '', 'sahan@gmail.com', '$2y$10$IsAD296WgVRxo6X21xvH1uG.KhznhiEeIkIEF.04rX6ckF.50dtYW', '0765627896', 'employee', NULL, 'Borella', '2024-01-11', NULL, NULL),
(7, 'Mithun', 'mithun.jpg', 'mithun@gmail.com', '$2y$10$0d0LTalCrSQxjomI77GoO.Ngr5JP7tn.ZJ4wpstoRoKgWeWK8NPXq', '0756541238', 'deliverer', NULL, 'Borella', '2024-02-11', NULL, NULL),
(8, 'Shevin', '', 'shevin@gmail.com', '', '', 'deliverer', NULL, 'Borella', '2020-04-15', NULL, NULL);

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
  ADD PRIMARY KEY (`name`),
  ADD KEY `name` (`name`);

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
  ADD KEY `deliver_id` (`deliver_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `user_id` (`user_name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `branch` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_deliver_id` FOREIGN KEY (`deliver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branch` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
