-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2026 at 07:35 AM
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
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$ruCTN6NXs4.A8hAYLA4OdOKFsZzZqdu1FHLbFY9J3j.bvJSXR7M4i');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `tech_stack` varchar(150) DEFAULT NULL,
  `long_description` text,
  `image` varchar(150) DEFAULT NULL,
  `demo_link` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `tech_stack`, `long_description`, `image`, `demo_link`, `created_at`) VALUES
(1, 'Sistem Informasi Perpustakaan', 'Aplikasi web berbasis PHP & MySQL untuk manajemen peminjaman buku.', 'PHP, MySQL, HTML, CSS, JavaScript', 'Project ini dibuat untuk mengatasi masalah pencatatan peminjaman buku yang masih manual. Sistem ini memungkinkan admin mengelola data buku, pemustaka, dan transaksi peminjaman secara terkomputerisasi.', 'perpustakaan.jpg', 'https://perpusKids.page.gd', '2026-02-08 06:53:48'),
(2, 'Website CoffeShop', 'Website Menampilkan Menu CoffeShop Berbasis HTML, CSS & JS', 'HTML, CSS, JavaScript', 'Project ini dibuat untuk memasarkan CofeeShop kearah modern yang mana menampilkan keunggulan CoffeShop dan menu', 'CoffeShop.jpg', 'https://demo-link-kamu.com', '2026-02-08 06:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `icon`, `level`) VALUES
(1, 'HTML', NULL, 'Advanced'),
(2, 'CSS', NULL, 'Advanced'),
(3, 'JavaScript', NULL, 'Intermediate'),
(4, 'PHP', NULL, 'Intermediate'),
(5, 'Python', NULL, 'Intermediate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
