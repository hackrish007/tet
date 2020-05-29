-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2019 at 10:36 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stndss`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `nro_files` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `nro_files`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'B. Ed.', '5da078ff40ab1.pdf', 1, '2019-10-11 12:43:43', NULL, NULL),
(2, 'D. El. Ed.', '5da0790652c4d.pdf', 1, '2019-10-11 12:43:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `academic_qualification` varchar(20) NOT NULL,
  `prof_qualification` varchar(20) NOT NULL,
  `teaching_exp` varchar(20) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `course_name`, `designation`, `father_name`, `address`, `dob`, `academic_qualification`, `prof_qualification`, `teaching_exp`, `profile_image`, `created_at`, `updated_at`, `deleted_At`) VALUES
(1, 'sarita gupta', '1', 'abc', 'S R Gupta', 'dfghf', '2019-10-11 04:59:01', 'diploma', 'xyz', '5 ', '5d9f355fa4c8b_1570714975_download.jpg', '2019-10-10 12:44:56', '2019-10-10 13:42:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_category` varchar(20) DEFAULT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_category`, `image_name`, `image_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'labs', '5da05b20dc6a1.jpg', 'http://localhost/stndss/upload/gallery/5da05b20dc6a1.jpg', '2019-10-11 10:37:20', NULL, '2019-10-11 10:37:20'),
(2, 'labs', '5da05b9e52b3e.jpg', 'http://localhost/stndss/upload/gallery/5da05b9e52b3e.jpg', '2019-10-11 10:38:22', NULL, NULL),
(3, 'labs', '5da05b9e5fbab.jpg', 'http://localhost/stndss/upload/gallery/5da05b9e5fbab.jpg', '2019-10-11 10:38:22', NULL, NULL),
(4, 'campus', '5da079811296a.jpg', 'http://localhost/stndss/upload/gallery/5da079811296a.jpg', '2019-10-11 12:45:53', NULL, NULL),
(5, 'library', '5da0798c236ad.jpg', 'http://localhost/stndss/upload/gallery/5da0798c236ad.jpg', '2019-10-11 12:46:04', NULL, NULL),
(6, 'classroom', '5da0799a9b2b1.jpg', 'http://localhost/stndss/upload/gallery/5da0799a9b2b1.jpg', '2019-10-11 12:46:18', NULL, NULL),
(7, 'principals_desk', '5da079a3ba7f7.jpg', 'http://localhost/stndss/upload/gallery/5da079a3ba7f7.jpg', '2019-10-11 12:46:27', NULL, NULL),
(8, 'yoga_divas', '5da079b638ea5.jpg', 'http://localhost/stndss/upload/gallery/5da079b638ea5.jpg', '2019-10-11 12:46:46', NULL, NULL),
(9, 'saraswati_puja', '5da079c1435a7.jpg', 'http://localhost/stndss/upload/gallery/5da079c1435a7.jpg', '2019-10-11 12:46:57', NULL, NULL),
(10, 'food_festival', '5da079cdcb205.jpg', 'http://localhost/stndss/upload/gallery/5da079cdcb205.jpg', '2019-10-11 12:47:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

CREATE TABLE `image_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_category`
--

INSERT INTO `image_category` (`id`, `category_name`, `created_at`, `deleted_at`) VALUES
(1, 'labs', NULL, NULL),
(2, 'campus', NULL, NULL),
(3, 'library', NULL, NULL),
(4, 'classroom', NULL, NULL),
(5, 'principals_desk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-10-09 13:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `image_1` varchar(200) DEFAULT NULL,
  `image_2` varchar(200) DEFAULT NULL,
  `image_3` varchar(200) DEFAULT NULL,
  `image_4` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_year` varchar(20) NOT NULL,
  `student_pdf` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `course_name`, `course_year`, `student_pdf`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2016-18', '5d9f064709e83_1570702919_B-Ed-2016-18.pdf', '2019-10-10 11:30:26', '0000-00-00 00:00:00', NULL),
(2, '1', '2016-18', '5d9f066551c3e_1570702949_B-Ed-2017-19.pdf', '2019-10-10 10:22:29', NULL, NULL),
(4, '1', '2017-19', '5d9f06cd35d39_1570703053_D-El-Ed-2018-20.pdf', '2019-10-10 11:23:42', '0000-00-00 00:00:00', NULL),
(5, '2', '2016-18', '5d9f06df875a3_1570703071_D-El-Ed-2017-19.pdf', '2019-10-10 10:24:31', NULL, NULL),
(6, '2', '2016-18', '5d9f06f79f5b4_1570703095_D-El-Ed-2018-20.pdf', '2019-10-10 10:24:55', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_category`
--
ALTER TABLE `image_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `image_category`
--
ALTER TABLE `image_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
