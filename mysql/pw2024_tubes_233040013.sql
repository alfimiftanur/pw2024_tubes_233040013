-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 11:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040013`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'test', 'zfasfas@gmail.com', 'sdagds'),
(2, 'test', 'zfasfas@gmail.com', 'sdagds'),
(3, 'sdafsd', 'asdsda@gmail.com', 'esgs'),
(4, 'sdafsd', 'asdsda@gmail.com', 'esgs'),
(5, 'admin', 'maman@gmail.com', 'kaksl'),
(6, 'admin', 'maman@gmail.com', 'kaksl'),
(7, 'test', 'zfasfas@gmail.com', 'ioio'),
(12, 'test', '', 'test'),
(13, '', '', 'test'),
(14, '', '', 'test\r\n'),
(15, '', '', '1234'),
(16, '', '', '12345'),
(17, '', '', '1234'),
(18, 'test', 'test@gmail.com', '1234'),
(19, 'pepe', 'pepe@gmail.com', 'pepe pump');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `gambar`, `username`, `email`, `password`, `id_role`) VALUES
(1, '../uploads/admin-icon.png', 'alfi', 'alfi@gmail.com', '$2y$10$Va/Z9YCUFgjGm.JtUefiMOj7oNzj/GADJotAhcJ9MKwCStSgH5x5a', 1),
(2, '../uploads/admin-icon.png', 'admin', 'admin@gmail.com', '$2y$10$lMAL5Zfmf1qlSzi4n0GNGOIEGW0HODa0OlaPFhRbjwFwxa28YvPza', 1),
(42, '../uploads/test-profile.jpg', 'nana', 'nana@gmail.com', '$2y$10$jcTsPXEt0IKGMQ/Sjqf4aOB0Hu8M5n5Q3TU5sab76jXAbZWnBq2Yi', 2),
(43, '../uploads/test-profile.jpg', 'masum', 'masum@gmail.com', '$2y$10$3WckOsw8a60MYNJuCPF.ueoIOj3Sa9TTUVgFpkvYr.T6OHjmlJ6AW', 2),
(45, '../uploads/test-profile.jpg', 'maman', 'maman@gmail.com', '$2y$10$w96cl6pA1LL9rkgUCmNdK.PxT239j05BiUOe2zL5R7AX4uMbrgmmm', 2),
(55, '../uploads/sad-pepe.jpg', 'sad pepe', 'pepe@gmail.com', '$2y$10$qar4dtfUe720s5S..YKXTOrx0gxvt8/B7DiNxmCNh2gs56kfXS29S', 2),
(59, '../uploads/test-profile.jpg', 'andy', 'andy@gmail.com', '$2y$10$Y207VvnhvS4Kj/yU0a0Ege9bU63df.J16JiEkLkUsfv3S67vIjxV.', 2),
(60, '../uploads/test-image.jpg', 'rio', 'rio@gmail.com', '$2y$10$n0vpXTmLJnwzCCq1asD6zePQ/.dcWoOhFjJgdkBFmBdCBnpK52vzq', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
