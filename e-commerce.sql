-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 25 jun 2020 kl 12:59
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `e-commerce`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `total_price` int(6) NOT NULL,
  `billing_full_name` varchar(150) NOT NULL,
  `billing_street` varchar(150) NOT NULL,
  `billing_postal_code` varchar(20) NOT NULL,
  `billing_city` varchar(90) NOT NULL,
  `billing_country` varchar(90) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `billing_full_name`, `billing_street`, `billing_postal_code`, `billing_city`, `billing_country`, `created_at`) VALUES
(1, 4, 20, 'Mattias Källström', 'Gustavavägen 19', 'Stockholm', '179 60', 'SE', '2020-06-25 09:38:37'),
(2, 4, 420, 'Mattias Källström', 'Gustavavägen 19', 'Ekerö', '178 31', 'SE', '2020-06-25 11:21:24'),
(3, 6, 106, 'Tobias ', 'Gustavavägen 19', 'Ekerö', '178 31', 'SE', '2020-06-25 11:35:33');

-- --------------------------------------------------------

--
-- Tabellstruktur `order_items`
--

CREATE TABLE `order_items` (
  `id` int(9) NOT NULL,
  `order_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `unit_price` int(9) NOT NULL,
  `product_title` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `product_title`, `created_at`) VALUES
(1, 1, 298, 1, 20, 'Is it a plane is it a bird?', '2020-06-25 09:38:37'),
(2, 2, 300, 1, 420, 'Super deluxe spongebob', '2020-06-25 11:21:24'),
(3, 3, 298, 2, 20, 'Is it a plane is it a bird?', '2020-06-25 11:35:33'),
(4, 3, 299, 1, 66, 'Star trek cd-rom', '2020-06-25 11:35:34');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `price` int(9) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `img_url`) VALUES
(298, 'Is it a plane is it a bird?', 'It\'s batman', 20, 'https://lh3.googleusercontent.com/tkGZ47Nz5vuLzPDS4ZuDptgvAaBQM1CW1DjiSyFnlDBqHZXwlkoQSN3dt5RkzDsD1Zx4tceLEIMVQ1MUcJ4ZD0Y=e14-w700-h700-l80-nu'),
(299, 'Star trek cd-rom', 'Only a few scratches, should work alright.', 66, 'https://www.discshop.se/img/front_large/157108/sagan_om_ringen_harskarringen_theatrical_cut_blu_ray.jpg'),
(300, 'Super deluxe spongebob', 'This new incredible spongebob squarepants figurine, in mint condition!', 420, 'https://w7.pngwing.com/pngs/258/854/png-transparent-spongebob-squarepants-patrick-star-youtube-sandy-cheeks-drawing-spongebob-squarepants-spongebob-food-vehicle-desktop-wallpaper.png'),
(321, 'asdhejhej', 'asd', 24, ''),
(322, 'asd', 'asd', 2332, '');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(90) NOT NULL,
  `country` varchar(90) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `street`, `postal_code`, `city`, `country`, `register_date`) VALUES
(5, 'Simon', 'Dahlberg', 'mattias-kallstrom@cmeducations.se', '$2y$10$PT4dWiWioEYmuqdOHrp2iOU3hyPilM6dBU9BuztQfoGejpc8UDrii', '0739335103', 'Gustavavägen 19', '178 31', 'Ekerö', 'Sverige', '2020-06-25 09:22:28'),
(6, 'Mattias', 'Källström', 'mattias-kallstrom@hotmail.com', '$2y$10$lt5WrRvhvlGINRaJAXRKDecC7h/JEveFednHitFT7LUx3YG6BX8w6', '0739335103', 'Gustavavägen 19', '178 31', 'Ekerö', 'Sverige', '2020-06-25 09:32:57'),
(7, 'Mattias', 'Källström', 'mattias-kallstrom@hotmail.com', '$2y$10$K40J1mIN188C8dCSmG7O3O5ECwqXJEcb2rwO3ifvADguebwQLPhMK', '0739335103', 'Gustavavägen 19', '178 31', 'Ekerö', 'Sverige', '2020-06-25 09:33:32');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
