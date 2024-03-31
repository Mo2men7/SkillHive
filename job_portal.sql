-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 02:25 PM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id_app` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `app_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id_app`, `fname`, `lname`, `user_name`, `date_of_birth`, `gender`, `email`, `password`, `country`, `app_pic`) VALUES
(1, 'Alice', 'Johnson', 'alicej87', '1995-08-22', 'f', 'alice.johnson@example.com', 'pass123', 'United States', ''),
(2, 'Michael', 'Smith', 'mikesmith', '1992-04-10', 'm', 'michael.smith@example.com', 'abcd456', 'Canada', ''),
(3, 'Emily', 'Brown', 'emilyb', '1990-11-05', 'f', 'emily.brown@example.com', 'qwerty789', 'United Kingdom', ''),
(4, 'David', 'Lee', 'dlee', '1988-07-15', 'm', 'david.lee@example.com', 'davidpass', 'Australia', ''),
(5, 'Sarah', 'Clark', 'sarahc', '1993-03-30', 'f', 'sarah.clark@example.com', 'pass789', 'United States', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Data Science'),
(2, 'Writing'),
(3, 'Sales'),
(4, 'Customer Support'),
(5, 'Project Management'),
(6, 'Data Analysis');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `job_description` text NOT NULL,
  `org_id` int(11) NOT NULL,
  `publish_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `job_status` enum('c','o') DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `job_title`, `job_description`, `org_id`, `publish_date`, `expire_date`, `job_status`, `salary`, `id_category`) VALUES
(1, 'data scientist', 'Seeking a skilled data analyst to analyze large datasets and provide insights for decision-making.', 1, '2024-03-10', '2024-04-10', 'o', 500, 3),
(2, 'Content Writer', 'Looking for talented content writers to create engaging articles and blog posts.', 1, '2024-03-05', '2024-04-05', 'o', 300, 2),
(3, 'Sales Representative', 'Hiring energetic sales representatives to generate leads and close deals.', 3, '2024-03-12', '2024-04-12', 'o', 1000, 1),
(4, 'Customer Service Specialist', 'Join our team as a customer service specialist to assist customers and resolve inquiries.', 4, '2024-03-08', '2024-04-08', 'o', 50, 2),
(5, 'Project Manager', 'Seeking experienced project managers to oversee and coordinate project activities.', 5, '2024-03-15', '2024-04-15', 'o', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_app`
--

CREATE TABLE `job_app` (
  `id_app` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `app_status` enum('a','p','s','r') DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_app`
--

INSERT INTO `job_app` (`id_app`, `id_job`, `app_status`, `app_date`, `cv_path`, `phone`) VALUES
(1, 1, 's', '2024-03-14', 'cv/cv1.pdf', '01210992991'),
(2, 1, 'a', '2024-03-12', 'cv/cv2.pdf', '01210992992'),
(2, 2, 'r', '2024-03-09', 'cv/cv2.pdf', '01210992992'),
(3, 1, 'p', '2024-03-06', 'cv/cv3.pdf', '01210992993'),
(5, 5, 'a', '2024-03-17', 'cv/cv5.pdf', '01210992995');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id_org` int(11) NOT NULL,
  `org_name` varchar(40) NOT NULL,
  `date_of_est` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `org_description` text NOT NULL,
  `location` text NOT NULL,
  `org_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id_org`, `org_name`, `date_of_est`, `email`, `password`, `org_description`, `location`, `org_pic`) VALUES
(1, 'Tech Innovations Ltd.', '2005-10-15', 'info@techinnovations.com', 'techpass123', 'Cutting-edge technology company focusing on AI and machine learning.', 'San Francisco, USA', ''),
(2, 'Marketing Pro Inc.', '1998-05-20', 'info@marketingpro.com', 'market456', 'Leading marketing agency providing digital marketing solutions.', 'London, UK', ''),
(3, 'Finance Solutions LLC', '2003-03-08', 'info@financesolutions.com', 'financepass', 'Financial services company offering consulting and advisory services.', 'New York, USA', ''),
(4, 'Creative Solutions Agency', '2010-09-12', 'info@creativesolutions.com', 'creative789', 'Creative agency specializing in branding and design.', 'Sydney, Australia', ''),
(5, 'Healthcare Innovations Ltd.', '2008-12-30', 'info@healthcareinnovations.com', 'health123', 'Healthcare technology company developing innovative solutions for patient care.', 'Toronto, Canada', ''),
(25, 'sasxa', '2024-03-22', 'xasxaxs@gmaixsax', '12@AwM3451193', 'xasx', 'axsax', ''),
(27, 'saxsxas', '2024-03-19', 'xsxa@asx', '12@AwM3451193', 'saxax', 'xsaxas', '27.jpg'),
(28, 'xasxa', '2024-03-05', 'xxax@xasxsa', '12@AwM3451193', 'xas', 'xsax', '28.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id_app`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `ref_org` (`org_id`),
  ADD KEY `FK_jobs_cat` (`id_category`);

--
-- Indexes for table `job_app`
--
ALTER TABLE `job_app`
  ADD PRIMARY KEY (`id_app`,`id_job`),
  ADD KEY `ref_job` (`id_job`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id_org`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id_org` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_jobs_cat` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `ref_org` FOREIGN KEY (`org_id`) REFERENCES `organization` (`id_org`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_app`
--
ALTER TABLE `job_app`
  ADD CONSTRAINT `ref_app` FOREIGN KEY (`id_app`) REFERENCES `applicant` (`id_app`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_job` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
