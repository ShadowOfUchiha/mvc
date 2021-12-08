-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 08 dec 2021 om 07:27
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dunk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status_code` int(11) NOT NULL,
  `payment_method_code` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` int(11) NOT NULL,
  `other_order_details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_order_products`
--

DROP TABLE IF EXISTS `customer_order_products`;
CREATE TABLE IF NOT EXISTS `customer_order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `other_product_details` varchar(40) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
(1, 1, 1, 'Sprinkled', '1.29', '1 pc.'),
(2, 1, 1, 'Chocolate', '1.49', '1 pc.'),
(3, 1, 1, 'Maple', '1.49', '1 pc.'),
(4, 2, 2, 'Dunkaccino', '1.69', 'small'),
(5, 3, 3, 'Steak Long Jim', '2.40', 'Steak Wrap');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`) VALUES
(1, 'Kanter', 'Rosbag'),
(2, 'Kanter', 'Rosbag'),
(3, 'Kanter', 'Rosbag');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
