-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 01:09 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fizjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `graduates` varchar(100) NOT NULL,
  `expertise` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` enum('admin','user','','') NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `photo_profile`, `email`, `gender`, `graduates`, `expertise`, `username`, `password`, `type`, `date_of_birth`) VALUES
(2, 'Romadhan Edy Prasetyo', 'WhatsApp Image 2018-11-25 at 3.04.01 PM.jpeg', 'romadhanedy@outlook.com', 'Laki-laki', 'SMK Negeri 10 Jakarta', 'Computer Science/Information Technology', 'romadhan', 'a08568777z', 'user', '2002-11-17'),
(3, 'Fizjobs Admin', 'user-man.png', 'admin@fizjobs.ga', 'Laki-laki', 'SMK Negeri 10 Jakarta', 'Computer Science/Information Technology', 'admin', 'a08568777z', 'admin', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `answer_test`
--

CREATE TABLE `answer_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `account_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application_file`
--

CREATE TABLE `application_file` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `self_promotion` text NOT NULL,
  `application_file` varchar(255) NOT NULL,
  `test_token` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `companys_name` varchar(255) NOT NULL,
  `date_of_applying` date NOT NULL,
  `day_of_applying` varchar(50) NOT NULL,
  `graduates` varchar(100) NOT NULL,
  `expertise` varchar(100) NOT NULL,
  `website` text NOT NULL,
  `office_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_file`
--

INSERT INTO `application_file` (`id`, `account_id`, `job_type`, `full_name`, `email`, `gender`, `date_of_birth`, `self_promotion`, `application_file`, `test_token`, `status`, `companys_name`, `date_of_applying`, `day_of_applying`, `graduates`, `expertise`, `website`, `office_address`) VALUES
(2, 2, 'Recruitment Specialist', 'Romadhan Edy Prasetyo', 'romadhanedy@outlook.com', 'Laki-laki', '2002-11-17', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do', 'UAS_Laravel-master.zip', '07c879c6', 'Di proses Admin (Melamar)', 'Fizdev Mitra Karya', '2018-12-02', 'Sunday', 'SMK Negeri 10 Jakarta', 'Computer Science/Information Technology', '', 'Jalan Kenangan');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `salary` bigint(20) NOT NULL,
  `slot` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `companys_name` varchar(255) NOT NULL,
  `date_upload` date NOT NULL,
  `office_address` text NOT NULL,
  `website` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_type`, `description`, `salary`, `slot`, `status`, `companys_name`, `date_upload`, `office_address`, `website`) VALUES
(2, 'IT Consultant', 'Konsultan IT adalah profesi yang berkaitan dengan teknologi informasi atau sistem informasi dan komputer seperti software, hardware, jaringan (network).', 99, 4, 'Tersedia', 'Buka Lapak', '2018-12-02', 'Bukalapak', 'https://www.bukalapak.com/'),
(3, 'Web Developer', '-', 99, 4, 'Tersedia', 'Buka Lapak', '2018-12-02', 'Bukalapak', 'https://www.bukalapak.com/'),
(4, 'Recruitment Specialist', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 7, 'Tersedia', 'Fizdev Mitra Karya', '2018-12-02', 'Jalan Kenangan', 'https://www.fizdev.id/'),
(5, 'Desain Grafis', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 5, 'Tersedia', 'Nippon Paint Indonesia', '2018-12-02', 'Nippon Paint Indonesia', 'http://www.nipponpaint-indonesia.com/'),
(6, 'Programmer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 8, 'Tersedia', 'Indomie Seleraku', '2018-12-02', 'Indomie Seleraku', 'http://www.indomie.com/'),
(7, 'Web Developer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 20, 'Tersedia', 'Telkom Indonesia', '2018-12-02', 'Telkom Indonesia', 'https://telkom.co.id'),
(8, 'IT Support', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 5, 'Tersedia', 'Samsung', '2018-12-02', 'Samsung', 'https://www.samsung.com'),
(9, 'Web Desainer', 'Web designer adalah seseorang yang bekerja dengan unsur-unsur visual pada suatu halaman web. Dia adalah orang yang membuat wajah halaman web tampak begitu â€œcantikâ€. Para web design mengintegrasikan komponen seperti gambar, file flash, atau multimedia ke dalam halaman web untuk menambah pengalaman visual user, atau untuk melengkapi content page.', 99, 3, 'Tersedia', 'Pertamina', '2018-12-02', 'Pertamina', 'https://www.pertamina.com'),
(10, 'Programmer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 4, 'Tersedia', 'Indomie Seleraku', '2018-12-02', 'Indomie Seleraku', 'http://www.indomie.com/'),
(11, 'IT Consultant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3000000, 5, 'Tersedia', 'Honda Internusa', '2018-12-02', 'Honda Internusa', 'https://honda-indonesia.com/');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `companys_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` text NOT NULL,
  `office_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `companys_name`, `logo`, `website`, `office_address`) VALUES
(1, 'Fizdev Mitra Karya', 'logo.png', 'https://www.fizdev.id/', 'Jalan Kenangan'),
(2, 'Buka Lapak', 'masirwin-logo-bukalapak.png', 'https://www.bukalapak.com/', 'Bukalapak'),
(3, 'Nippon Paint Indonesia', 'nippon-paint.png', 'http://www.nipponpaint-indonesia.com/', 'Nippon Paint Indonesia'),
(4, 'Honda Internusa', 'honda.png', 'https://honda-indonesia.com/', 'Honda Internusa'),
(5, 'Indomie Seleraku', 'Logo_Indomie.png', 'http://www.indomie.com/', 'Indomie Seleraku'),
(6, 'Carrefour', 'logo_sans_carrefour.jpg', 'http://www.carrefour.co.id/', 'Carrefour'),
(7, 'Axa-Mandiri', 'mandiri.png', 'https://www.axa-mandiri.co.id/', 'Axa-Mandiri'),
(8, 'Telkom Indonesia', '1200px-Telkom_Indonesia_2013.svg.png', 'https://telkom.co.id', 'Telkom Indonesia'),
(9, 'Adhimic Precast Indonesia', 'adhimic-precast-indonesia.png', 'http://retail.adhimix.co.id/', 'Adhimic Precast Indonesia'),
(10, 'Indomaret', 'indomaret.png', 'http://indomaret.co.id/', 'Indomaret'),
(11, 'Samsung', 'samsung-electronics-indonesia-pt6.png', 'https://www.samsung.com', 'Samsung'),
(12, 'Pertamina', 'pertamina.png', 'https://www.pertamina.com', 'Pertamina');

-- --------------------------------------------------------

--
-- Table structure for table `question_test`
--

CREATE TABLE `question_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `companys_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_test`
--
ALTER TABLE `answer_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_file`
--
ALTER TABLE `application_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_test`
--
ALTER TABLE `question_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answer_test`
--
ALTER TABLE `answer_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_file`
--
ALTER TABLE `application_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question_test`
--
ALTER TABLE `question_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
