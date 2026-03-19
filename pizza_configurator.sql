-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 10:36 PM
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
-- Database: `pizza_configurator`
--

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pizza_name` varchar(100) DEFAULT 'Meine Pizza',
  `size` varchar(50) NOT NULL,
  `dough` varchar(50) NOT NULL,
  `toppings` text NOT NULL,
  `extras` text DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `discount_percent` decimal(5,2) DEFAULT 0.00,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `preset_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `user_id`, `pizza_name`, `size`, `dough`, `toppings`, `extras`, `coupon_code`, `discount_percent`, `total_price`, `created_at`, `preset_name`) VALUES
(1, 1, 'Meine Pizza', 'Groß', 'Vollkornteig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Cheddar\",\"price\":0.8},{\"name\":\"Tomaten\",\"price\":0.8}]', '[{\"name\":\"Extra K\\u00e4se\",\"price\":1}]', '', 0.00, 14.90, '2026-03-12 10:36:57', NULL),
(2, 1, 'Meine Pizza', 'Mittel', 'Vollkornteig', '[{\"name\":\"Schinken\",\"price\":0.8},{\"name\":\"Paprika\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Mais\",\"price\":0.8},{\"name\":\"Champignons\",\"price\":0.8}]', '[{\"name\":\"Knoblauchrand\",\"price\":1}]', '', 0.00, 14.50, '2026-03-12 11:12:23', NULL),
(3, 1, 'Meine Pizza', 'Groß', 'Klassischer Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Thunfisch\",\"price\":1.5},{\"name\":\"Zwiebeln\",\"price\":0.8}]', '[]', '', 0.00, 13.10, '2026-03-12 11:17:34', NULL),
(4, 1, 'Meine Pizza', 'Groß', 'Dünner Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Rucola\",\"price\":0.8},{\"name\":\"Ananas\",\"price\":0.8},{\"name\":\"Brokkoli\",\"price\":0.8}]', '[{\"name\":\"Scharfe So\\u00dfe\",\"price\":0.5}]', '', 0.00, 16.30, '2026-03-12 11:18:19', NULL),
(5, 1, 'Meine Pizza', 'Groß', 'Dünner Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8}]', '[]', '', 0.00, 12.60, '2026-03-12 11:33:16', NULL),
(6, 1, 'Meine individuelle Pizza', 'Groß', 'Dünner Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8}]', '[]', '', 0.00, 12.60, '2026-03-12 11:36:30', NULL),
(7, 1, 'Salami Pizza', 'Groß', 'Dünner Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8}]', '[]', '', 0.00, 12.60, '2026-03-12 11:49:01', 'salami'),
(8, 1, 'Salami Pizza', 'Mittel', 'Vollkornteig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Champignons\",\"price\":0.8},{\"name\":\"Ananas\",\"price\":0.8}]', '[{\"name\":\"Knoblauchrand\",\"price\":1}]', '', 0.00, 14.50, '2026-03-12 13:50:43', 'salami'),
(9, 1, 'Salami Pizza', 'Mittel', 'Vollkornteig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Champignons\",\"price\":0.8},{\"name\":\"Ananas\",\"price\":0.8}]', '[{\"name\":\"Knoblauchrand\",\"price\":1}]', '', 0.00, 14.50, '2026-03-12 13:50:45', 'salami'),
(10, 1, 'Thunfisch Pizza', 'Mittel', 'Vollkornteig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Thunfisch\",\"price\":1.5},{\"name\":\"Zwiebeln\",\"price\":0.8},{\"name\":\"Knoblauch\",\"price\":0.5}]', '[]', '', 0.00, 13.10, '2026-03-17 15:08:23', 'thunfisch'),
(11, 1, 'Thunfisch Pizza', 'Familie', 'Klassischer Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Cheddar\",\"price\":0.8},{\"name\":\"Parmesan\",\"price\":1.2},{\"name\":\"Schinken\",\"price\":0.8},{\"name\":\"Salami\",\"price\":0.8},{\"name\":\"H\\u00e4hnchen\",\"price\":1.5},{\"name\":\"Thunfisch\",\"price\":1.5},{\"name\":\"Hackfleisch\",\"price\":1.2},{\"name\":\"Zwiebeln\",\"price\":0.8},{\"name\":\"Paprika\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Champignons\",\"price\":0.8},{\"name\":\"Rucola\",\"price\":0.8},{\"name\":\"Ananas\",\"price\":0.8},{\"name\":\"Brokkoli\",\"price\":0.8},{\"name\":\"Jalape\\u00f1os\",\"price\":0.8},{\"name\":\"Knoblauch\",\"price\":0.5}]', '[{\"name\":\"Extra K\\u00e4se\",\"price\":1},{\"name\":\"Extra So\\u00dfe\",\"price\":0.5},{\"name\":\"Scharfe So\\u00dfe\",\"price\":0.5},{\"name\":\"Knoblauchrand\",\"price\":1}]', '', 0.00, 31.50, '2026-03-17 15:21:30', 'thunfisch'),
(12, 1, 'Vegetarische Pizza', 'Mittel', 'Vollkornteig', '[{\"name\":\"Paprika\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Mais\",\"price\":0.8},{\"name\":\"Champignons\",\"price\":0.8}]', '[]', '', 0.00, 12.70, '2026-03-17 15:21:55', 'veggie'),
(13, 1, 'Thunfisch Pizza', 'Groß', 'Klassischer Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Thunfisch\",\"price\":1.5},{\"name\":\"Zwiebeln\",\"price\":0.8}]', '[]', '', 0.00, 13.10, '2026-03-17 15:23:49', 'thunfisch'),
(14, 1, 'Thunfisch Pizza', 'Familie', 'Klassischer Teig', '[{\"name\":\"Mozzarella\",\"price\":0.8},{\"name\":\"Schinken\",\"price\":0.8},{\"name\":\"H\\u00e4hnchen\",\"price\":1.5},{\"name\":\"Thunfisch\",\"price\":1.5},{\"name\":\"Zwiebeln\",\"price\":0.8},{\"name\":\"Paprika\",\"price\":0.8},{\"name\":\"Oliven\",\"price\":0.8},{\"name\":\"Feta\",\"price\":1}]', '[{\"name\":\"Extra So\\u00dfe\",\"price\":0.5},{\"name\":\"Scharfe So\\u00dfe\",\"price\":0.5},{\"name\":\"Knoblauchrand\",\"price\":1}]', '', 0.00, 23.00, '2026-03-17 15:33:40', 'thunfisch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `password`, `created_at`) VALUES
(1, 'firas', 'houmti', 'test1@gmail.com', '$2y$10$4u2vOti4nnRBTtTWagPgO..Cm4guWQA8ga/4gxsB4rifrtW3SlDUi', '2026-03-12 10:36:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `configurations`
--
ALTER TABLE `configurations`
  ADD CONSTRAINT `configurations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
