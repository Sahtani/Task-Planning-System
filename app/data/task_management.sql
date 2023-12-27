-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 07:50 PM
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
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `idproject` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `name`, `start_date`, `end_date`, `user_id`) VALUES
(33, 'Bre', '2023-12-04', '2023-12-29', 8),
(42, 'Dahlia Hancock', '2023-11-28', '2023-12-04', 8),
(43, 'Nolan Guy', '2023-11-29', '2023-11-28', 7),
(44, 'Camille Mcbride', '2023-12-11', '2023-12-29', 12);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `archive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `title`, `description`, `status`, `deadline`, `user_id`, `id_project`, `archive`) VALUES
(31, 'ayoub', 'Aliqua Quo harum it', 'to do', '2020-08-07', 8, 33, 1),
(32, 'Et magnam laborum er', 'Pariatur Obcaecati', 'done', '1995-03-19', 8, 33, NULL),
(33, 'Cillum sint quo haru', 'Perferendis corrupti', 'in progress', '1984-07-05', 8, 33, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `lastname`, `firstname`, `email`, `password`) VALUES
(7, 'Barrett', 'Jonah', 'gacikag@mailinator.com', '$2y$10$C3jD8lm4nzH38Egcf91MJegCC625xZzy/v1.U4srPinhjyAJ2TMvu'),
(8, 'Robbins', 'Thane', 'mohamed@gmail.com', '$2y$10$QtiugnuoLFA3zhr.ckjcXO5CCMHkP4CFuhQxhNlpvNWvN2tNR5Zi.'),
(9, 'Howard', 'Tobias', 'rogejeqo@mailinator.com', '$2y$10$FgyjHwcshcyZXFEbdNMJvubjZECIyC29V72ISvgdBrskwC0xoF40q'),
(11, 'Myers', 'Drew', 'girem@mailinator.com', '$2y$10$lSp4zsD7YqgDq3NE42RB6O3QP0..BEaAJ/pAU/JsrwIXX0ctyic52'),
(12, 'Mccormick', 'ayoub', 'ayoub@gmail.com', '$2y$10$sj1GwXdqt.fmMuvlZOlYxuMbSL3HSaOK9w9/2BEjYamy4wv.pRh3K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`idproject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
