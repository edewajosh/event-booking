-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 06:33 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchill`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `username`, `password`, `email`) VALUES
(1, 'edewa', '$2y$10$R8UXuF6C2IEhPhbiiEDUouWj2o5HdXuuO6OdlLUDcF0J9vZbptDIm', 'wycliffeomare@gmail.com'),
(2, 'edewa', '$2y$10$lzjY2OxUNp/PeKQNHy9AcO4Lw2xlm4yJFx0TfK0/xiATnbImiYLIy', 'joshedewa@gmail.com'),
(3, 'edewa', '$2y$10$5m/lmddCLHV4lwQ94ARK4e6wbEF5mv0tRqc5qh4PakJhmFKdjdpuq', 'joshuaedewa@gmail.com'),
(4, 'josh', '$2y$10$ekFJxnA2CpiUstduP.eAmOTE/hoIc/U/uTt4UKsO02/eB/Q49hkeS', 'johndoe@test.com'),
(5, 'janedoe@example.com', '$2y$10$vkSmwLDQxtLBBZwqTig3Uu8PXc1r0hglpWeN8NhG2wuewRulWLxsS', 'janedoe@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` int(15) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `tickets` int(15) UNSIGNED NOT NULL,
  `booked_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `email`, `phone`, `event_name`, `ticket_type`, `tickets`, `booked_at`, `event_id`) VALUES
(1, 'wycliffeomare@gmail.com', 727762849, 'Churchill Coming to Nanyuki', 'bronze', 5, '2019-11-13 17:06:34.024782', NULL),
(2, 'joshedewa@gmail.com', 718368592, 'Churchill Coming to Nanyuki', 'silver', 9, '2019-11-13 17:08:22.797948', NULL),
(3, '', 0, 'Churchill Coming to Nanyuki', 'bronze', 0, '2019-11-13 17:29:12.237012', NULL),
(4, 'joshuaedewa@gmail.com', 712563985, 'Churchill Coming to Nanyuki', 'silver', 8, '2019-11-14 09:31:02.323809', NULL),
(5, 'joshuaedewa@gmail.com', 712563985, 'Churchill Coming to Nanyuki', 'silver', 8, '2019-11-14 09:33:37.390668', NULL),
(6, 'wycliffeomare@gmail.com', 727762849, 'Churchill Coming to Nanyuki', 'bronze', 5, '2019-11-14 11:45:41.289600', NULL),
(7, 'gitau@test.com', 712456789, 'Turkana Are you Ready', 'bronze', 4, '2019-11-14 20:08:03.753469', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `gold` decimal(7,2) DEFAULT NULL,
  `silver` decimal(7,2) DEFAULT NULL,
  `bronze` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `description`, `date`, `gold`, `silver`, `bronze`) VALUES
(12, 'Churchill Coming to Juja', '2019-12-28', '999.99', '500.00', NULL),
(13, 'Churchill Coming to Kilifi', '2019-12-28', '999.99', '500.00', NULL),
(15, 'Churchill is coming to Bungoma', '2019-11-29', '999.99', '500.00', NULL),
(16, 'Churchill coming to Kigali', '2020-01-03', '600.00', '800.00', NULL),
(17, 'Africa Laugh Industry at Carnivore', '0000-00-00', '2000.00', '1000.00', NULL),
(18, 'Stand-Up comedy', '2019-12-27', '1500.00', '500.00', NULL),
(19, 'One Night Laugh', '2019-12-27', '2500.00', '1000.00', NULL),
(20, 'Churchill Coming to Nanyuki', '2019-12-13', '2000.00', '1500.00', '500.00'),
(21, 'Turkana Are you Ready', '2019-11-29', '2000.00', '1500.00', '500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticketing_bookings_event_id_b724b945_fk_ticketing_event_id` (`event_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `ticketing_bookings_event_id_b724b945_fk_ticketing_event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
