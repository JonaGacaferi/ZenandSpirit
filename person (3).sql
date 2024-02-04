-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 09:15 AM
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
-- Database: `person`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`ID`, `name`, `email`, `note`) VALUES
(0, 'jonagacaferi', 'jonua.gacaferri@gmail.com', 'dsbvjuoivinvsk esdpoifubjefvoiesbevodurhvnjs');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`) VALUES
(1, 'yogatool', 0, 0x70726f64756374322e6a7067),
(2, 'yogatool', 0, 0x70726f64756374322e6a7067),
(3, 'yogatoolsss', 0, 0x796f6761746f6f6c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(11, 'Seniha', 'seniha.et@gmail.com', '$2y$10$TKfoQxDpfYHJ4smwtVauJOhvLT8nnc7YtZoyARjUmGP/9xC6IFM0C', 'admin'),
(12, 'Bleona', 'bleona.h@gmail.com', '$2y$10$85Dxko3O85QhfdpCO9XHpOfnFgEYVVX9oDDmryWS0KoRcjzEpW1s6', 'user'),
(14, 'rrona', 'rronag@gmail.com', '$2y$10$VfpG2qM08J7amvoiwvFL0OHLkMYTMfGH6vzewY5dM4gmCJOexeu9e', 'admin'),
(20, 'jonag', 'gg@gmail.com', '12345', 'user'),
(22, 'jonagacaferi', 'jonua.gacaferri@gmail.com', '$2y$10$g4ONfL57r2JuFQNrp1g4HukzCxdSM4x8ZZvL4s6umLwDCBheTCd/G', 'admin'),
(23, 'jonagg', 'gj@gmail.com', '123456789', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
