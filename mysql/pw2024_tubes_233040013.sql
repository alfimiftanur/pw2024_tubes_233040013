-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 05:23 PM
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
(19, 'pepe', 'pepe@gmail.com', 'pepe pump'),
(20, 'bbbb', 'test@gmail.com', '123455'),
(21, 'test', 'test@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_images` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_images`, `image_path`, `title`, `description`, `uploaded_at`, `id_role`) VALUES
(61, '../uploads/bromo.jpg', 'Bromo', 'bromo', '2024-06-09 13:43:53', 1),
(62, '../uploads/flores.jpeg', 'Flores', 'flores', '2024-06-09 13:58:54', 1),
(63, '../uploads/Pantai Pangandaran - Indonesia.jpeg', 'Pangandaran', 'pnd', '2024-06-09 14:08:23', 1),
(65, '../uploads/bali.jpg', 'Bali', 'bali', '2024-06-10 05:46:00', 1),
(66, '../uploads/jakarta.jpg', 'Jakarta', 'jakarta', '2024-06-10 05:52:03', 1),
(67, '../uploads/bandung.jpg', 'Bandung', 'bandung', '2024-06-10 05:52:29', 1);

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
(2, '../uploads/admin-icon.png', 'admin', 'admin@gmail.com', '$2y$10$lMAL5Zfmf1qlSzi4n0GNGOIEGW0HODa0OlaPFhRbjwFwxa28YvPza', 1),
(96, '../uploads/admin-icon.png', 'alfi', 'alfi@gmail.com', '$2y$10$DNFFL1.2CbmmHVfTGmeWcetmNd2YwDJmEvOXMVReZ1OaqYuY/0Laa', 1),
(100, '../uploads/𝒕𝒉𝒆 𝒘𝒊𝒏𝒅 𝒓𝒊𝒔𝒆𝒔.jpeg', 'test', 'test@gmail.com', '$2y$10$fR1rh9LQ0.fZT0aDmq2fxeV8YpY4jadsiH/OP6SJL9fUwujXzfDMa', 2),
(102, '../assets/img/default.jpg', 'mamat', 'mamat@gmail.com', '$2y$10$D1RDudMY4c32ax/fcluymeNcAdw4axUBGDfVGdkgP1MVqmd0UylIS', 2),
(103, '../assets/img/default.jpg', 'mifta', 'mifta@gmail.com', '$2y$10$2CRybEDCAuf/TPd.CoPe/eYT0V0zJpm5UeQ3udOyEfMjX8CBrvNyG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id_sessions` int NOT NULL,
  `id` int DEFAULT NULL,
  `session_start` datetime DEFAULT NULL,
  `session_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id_sessions`, `id`, `session_start`, `session_end`) VALUES
(15, 96, '2024-06-09 20:16:01', '2024-06-10 15:31:40'),
(18, 100, '2024-06-10 09:25:54', '2024-06-10 09:30:04'),
(19, 102, '2024-06-10 09:30:12', NULL),
(20, 2, '2024-06-10 15:31:56', '2024-06-10 23:55:46'),
(21, 103, '2024-06-10 21:22:03', '2024-06-10 21:22:12'),
(22, 96, '2024-06-10 23:58:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`),
  ADD KEY `images_ibfk_1` (`id_role`);

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
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id_sessions`),
  ADD KEY `fk_user_sessions_user_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id_sessions` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `fk_user_sessions_user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
