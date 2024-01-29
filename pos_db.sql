-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 03:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `description`, `quantity`, `amount`, `image`, `user_id`, `date`, `views`) VALUES
(5, '5226500768', 'Chocolate', 1, '20.00', 'uploads/b93ca065b752941937d85a4c91b1b660f9d7b86c_3899.png', '1', '2024-01-14 07:46:51', 42),
(6, '3878636404', 'White chocolate', 1, '20.00', 'uploads/5e1c9a9b39e4d8bbc8bac0fd71648f78879289ec_7298.png', '2', '2024-01-14 07:51:45', 21),
(11, '5337188607', 'Strawberry', 1, '20.00', 'uploads/361e3dbad2c6f3985694ab73d7eb1a1a795f9495_5730.png', 'Unknown', '2024-01-16 00:37:18', 42),
(15, '4203961172', 'test product1', 1, '34.00', 'uploads/1997eb411bce505db40a22fa3dfb351feeee7238_9984.png', '2', '2024-01-16 08:09:37', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `barcode`, `receipt_no`, `description`, `quantity`, `amount`, `total`, `date`, `user_id`) VALUES
(4, '5337188607', 1, 'Strawberry', 1, '20.00', '20.00', '2024-01-14 11:14:33', '7'),
(5, '5226500768', 1, 'Chocolate', 2, '20.00', '40.00', '2024-01-14 11:16:36', '7'),
(6, '3878636404', 1, 'White chocolate', 3, '20.00', '60.00', '2024-01-14 11:16:48', '7'),
(7, '5226500768', 2, 'Chocolate', 2, '20.00', '40.00', '2024-01-16 11:16:57', '7'),
(8, '5337188607', 2, 'Strawberry', 2, '20.00', '40.00', '2024-01-16 11:18:14', '7'),
(9, '3878636404', 3, 'White chocolate', 2, '20.00', '40.00', '2024-01-19 11:14:49', '7'),
(10, '4203961172', 3, 'test product1', 2, '34.00', '68.00', '2024-01-19 11:14:49', '7'),
(11, '5337188607', 4, 'Strawberry', 8, '20.00', '160.00', '2024-01-19 11:15:53', '7'),
(12, '5226500768', 4, 'Chocolate', 4, '20.00', '80.00', '2024-01-19 11:15:53', '7'),
(13, '3878636404', 4, 'White chocolate', 4, '20.00', '80.00', '2024-01-19 11:15:53', '7'),
(14, '4203961172', 4, 'test product1', 4, '34.00', '136.00', '2024-01-19 11:15:53', '7'),
(15, '5226500768', 5, 'Chocolate', 6, '20.00', '120.00', '2024-01-19 15:57:44', '7'),
(16, '5337188607', 5, 'Strawberry', 4, '20.00', '80.00', '2024-01-19 15:57:44', '7'),
(17, '3878636404', 5, 'White chocolate', 10, '20.00', '200.00', '2024-01-19 15:57:44', '7'),
(18, '5337188607', 6, 'Strawberry', 4, '20.00', '80.00', '2024-01-19 22:14:46', '8'),
(19, '5226500768', 6, 'Chocolate', 1, '20.00', '20.00', '2024-01-19 22:14:46', '8'),
(20, '5337188607', 7, 'Strawberry', 12, '20.00', '240.00', '2024-01-21 00:22:39', '7'),
(21, '5226500768', 8, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:07:39', '7'),
(22, '5337188607', 8, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:07:39', '7'),
(23, '5226500768', 9, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:10:32', '7'),
(24, '5226500768', 10, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:10:58', '7'),
(25, '5337188607', 11, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:18:07', '7'),
(26, '5226500768', 12, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:18:44', '7'),
(27, '5226500768', 13, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:19:06', '7'),
(28, '5337188607', 14, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:23:02', '7'),
(29, '5337188607', 15, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:31:31', '7'),
(30, '5226500768', 16, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:32:14', '7'),
(31, '5337188607', 17, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:32:51', '7'),
(32, '5226500768', 18, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:33:55', '7'),
(33, '5337188607', 19, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:36:55', '7'),
(34, '5226500768', 20, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:39:47', '7'),
(35, '5337188607', 21, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:41:47', '7'),
(36, '5226500768', 22, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:42:15', '7'),
(37, '5337188607', 23, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:43:55', '7'),
(38, '5337188607', 24, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:44:21', '7'),
(39, '5226500768', 25, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:50:26', '7'),
(40, '5337188607', 25, 'Strawberry', 4, '20.00', '80.00', '2024-01-21 01:50:26', '7'),
(41, '3878636404', 25, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 01:50:26', '7'),
(42, '5226500768', 26, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:52:35', '7'),
(43, '5337188607', 26, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 01:52:35', '7'),
(44, '3878636404', 26, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 01:52:35', '7'),
(45, '4203961172', 26, 'test product1', 1, '34.00', '34.00', '2024-01-21 01:52:35', '7'),
(46, '5226500768', 27, 'Chocolate', 4, '20.00', '80.00', '2024-01-21 01:54:42', '7'),
(47, '5337188607', 27, 'Strawberry', 5, '20.00', '100.00', '2024-01-21 01:54:42', '7'),
(48, '3878636404', 27, 'White chocolate', 2, '20.00', '40.00', '2024-01-21 01:54:42', '7'),
(49, '5226500768', 28, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 01:56:24', '7'),
(50, '5226500768', 29, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:26:29', '7'),
(51, '5337188607', 29, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:26:29', '7'),
(52, '5226500768', 30, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:29:04', '7'),
(53, '5337188607', 31, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:31:34', '7'),
(54, '5226500768', 31, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:31:34', '7'),
(55, '3878636404', 31, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 02:31:34', '7'),
(56, '5337188607', 32, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:33:06', '7'),
(57, '5337188607', 33, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:33:55', '7'),
(58, '5226500768', 33, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:33:55', '7'),
(59, '5226500768', 34, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:39:45', '7'),
(60, '5337188607', 34, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:39:45', '7'),
(61, '5226500768', 35, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:41:02', '7'),
(62, '5337188607', 35, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:41:02', '7'),
(63, '3878636404', 35, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 02:41:02', '7'),
(64, '4203961172', 35, 'test product1', 1, '34.00', '34.00', '2024-01-21 02:41:02', '7'),
(65, '5226500768', 36, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:41:41', '7'),
(66, '5337188607', 36, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:41:41', '7'),
(67, '3878636404', 36, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 02:41:41', '7'),
(68, '5226500768', 37, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:42:42', '7'),
(69, '5337188607', 37, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:42:42', '7'),
(70, '3878636404', 37, 'White chocolate', 1, '20.00', '20.00', '2024-01-21 02:42:42', '7'),
(71, '4203961172', 37, 'test product1', 1, '34.00', '34.00', '2024-01-21 02:42:42', '7'),
(72, '5226500768', 38, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:45:19', '7'),
(73, '5337188607', 38, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:45:19', '7'),
(74, '5337188607', 39, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:46:31', '7'),
(75, '5226500768', 39, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:46:31', '7'),
(76, '5226500768', 40, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:47:35', '7'),
(77, '5337188607', 41, 'Strawberry', 1, '20.00', '20.00', '2024-01-21 02:50:48', '7'),
(78, '5226500768', 41, 'Chocolate', 1, '20.00', '20.00', '2024-01-21 02:50:48', '7'),
(79, '3878636404', 41, 'White chocolate', 400, '20.00', '8000.00', '2024-01-21 02:50:48', '7'),
(80, '3878636404', 42, 'White chocolate', 15, '20.00', '300.00', '2024-01-21 02:51:35', '7'),
(81, '5226500768', 43, 'Chocolate', 2, '20.00', '40.00', '2024-01-21 02:54:03', '7'),
(82, '5337188607', 43, 'Strawberry', 2, '20.00', '40.00', '2024-01-21 02:54:03', '7'),
(83, '5226500768', 44, 'Chocolate', 1, '20.00', '20.00', '2024-01-22 09:23:53', '7'),
(84, '3878636404', 44, 'White chocolate', 2, '20.00', '40.00', '2024-01-22 09:23:53', '7'),
(87, '4203961172', 45, 'test product1', 1, '34.00', '34.00', '2024-01-22 09:30:30', '6'),
(88, '5337188607', 46, 'Strawberry', 2, '20.00', '40.00', '2024-01-22 10:35:15', '7'),
(90, '3878636404', 47, 'White chocolate', 1, '20.00', '20.00', '2024-01-24 15:32:51', '7'),
(91, '5337188607', 47, 'Strawberry', 1, '20.00', '20.00', '2024-01-24 15:32:51', '7'),
(92, '5226500768', 47, 'Chocolate', 1, '20.00', '20.00', '2024-01-24 15:32:51', '7'),
(93, '5226500768', 48, 'Chocolate', 2, '20.00', '40.00', '2024-01-24 15:36:39', '7'),
(94, '5337188607', 48, 'Strawberry', 1, '20.00', '20.00', '2024-01-24 15:36:39', '7'),
(95, '3878636404', 48, 'White chocolate', 4, '20.00', '80.00', '2024-01-24 15:36:39', '7'),
(96, '3878636404', 49, 'White chocolate', 1, '20.00', '20.00', '2024-01-25 11:31:19', '7'),
(97, '5337188607', 50, 'Strawberry', 1, '20.00', '20.00', '2024-01-29 15:35:23', '7'),
(98, '5226500768', 51, 'Chocolate', 2, '20.00', '40.00', '2024-01-29 15:35:53', '7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `date`, `image`) VALUES
(6, 'test', 'hhh@gmail.com', '$2y$10$6Hq.E1br0FawxPCOygUmgOWrtP8Wo6SnHKCd7MtU8SZq4RslQHnYe', 'cashier', '2024-01-14 06:27:37', 'uploads/user/23c61886e7fc6e741f9fd52456fa20b0bc9c1497_8985.jpg'),
(7, 'admin', 'eric@gmail.com', '$2y$10$0ANIA.KGglMrKt0cZSAevO9tmupTJCb23o3aNJTNLh.O5ca2Letri', 'admin', '2024-01-17 08:04:41', 'uploads/user/b705d963f13539106309e183d7afc66e3075d7f1_2999.jpg'),
(8, 'testaa', 'werty@cvsu.edu.ph', '$2y$10$o2hMPBsCaSgHhZLGG2JkUOYEE6Dnc0HPcmbUJfKACwFrmpoJnd13S', 'cashier', '2024-01-17 17:49:32', 'uploads/user/8090e075b5302a819e44aad69c300954b6380069_8065.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
