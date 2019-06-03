-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2019 at 11:46 AM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ard`
--

-- --------------------------------------------------------

--
-- Table structure for table `behaviour`
--

CREATE TABLE `behaviour` (
  `id` int(10) UNSIGNED NOT NULL,
  `behaviour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` tinyint(4) NOT NULL COMMENT 'Foreign Key of Question type table',
  `is_behaviour` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `behaviour`
--

INSERT INTO `behaviour` (`id`, `behaviour`, `question_type_id`, `is_behaviour`, `status`) VALUES
(1, 'Emotional Problems', 3, 1, 1),
(2, 'Conduct Problems', 3, 1, 1),
(3, 'Hyperactivity', 3, 1, 1),
(4, 'Peer Problems', 3, 1, 1),
(5, 'Strengths/ Prosocial', 3, 1, 1),
(6, 'Total Difficulties', 3, 0, 1),
(7, 'Panic Disorder or Significant Somatic Symptoms', 4, 1, 1),
(8, 'Generalised Anxiety Disorder', 4, 1, 1),
(9, 'Separation Anxiety', 4, 1, 1),
(10, 'Social Anxiety Disorder', 4, 1, 1),
(11, 'Significant School Avoidance', 4, 1, 1),
(12, 'Total Scale', 4, 0, 1),
(13, 'Well Being', 2, 1, 1),
(14, 'Problems or Symptoms', 2, 1, 1),
(15, 'Functioning', 2, 1, 1),
(16, 'Risk', 2, 1, 1),
(17, 'Total', 2, 0, 1),
(18, 'Total Minus Risk', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `behaviour_scale`
--

CREATE TABLE `behaviour_scale` (
  `id` int(10) UNSIGNED NOT NULL,
  `scale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `behaviour_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Behaviour table',
  `scale_from` tinyint(4) NOT NULL,
  `scale_to` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `behaviour_scale`
--

INSERT INTO `behaviour_scale` (`id`, `scale`, `behaviour_id`, `scale_from`, `scale_to`, `status`) VALUES
(1, 'Close to average', 1, 0, 4, 1),
(2, 'Slightly raised', 1, 5, 5, 1),
(3, 'High', 1, 6, 6, 1),
(4, 'Very high', 1, 7, 10, 1),
(5, 'Close to average', 2, 0, 3, 1),
(6, 'Slightly raised', 2, 4, 4, 1),
(7, 'High', 2, 5, 5, 1),
(8, 'Very high', 2, 6, 10, 1),
(9, 'Close to average', 3, 0, 5, 1),
(10, 'Slightly raised', 3, 6, 6, 1),
(11, 'High', 3, 7, 7, 1),
(12, 'Very high', 3, 8, 10, 1),
(13, 'Close to average', 4, 0, 2, 1),
(14, 'Slightly raised', 4, 3, 3, 1),
(15, 'High', 4, 4, 4, 1),
(16, 'Very high', 4, 5, 10, 1),
(17, 'Close to average', 5, 7, 10, 1),
(18, 'Slightly raised', 5, 6, 6, 1),
(19, 'Low', 5, 5, 5, 1),
(20, 'Very low', 5, 0, 4, 1),
(21, 'Close to average', 6, 0, 14, 1),
(22, 'Slightly raised', 6, 15, 17, 1),
(23, 'High', 6, 18, 19, 1),
(24, 'Very high', 6, 20, 40, 1),
(25, 'Normal Range', 7, 0, 6, 1),
(26, 'Clinical Range', 7, 7, 50, 1),
(27, 'Normal Range', 8, 0, 8, 1),
(28, 'Clinical Range', 8, 9, 50, 1),
(29, 'Normal Range', 9, 0, 4, 1),
(30, 'Clinical Range', 9, 5, 50, 1),
(31, 'Normal Range', 10, 0, 7, 1),
(32, 'Clinical Range', 10, 8, 50, 1),
(33, 'Normal Range', 11, 0, 2, 1),
(34, 'Clinical Range', 11, 3, 50, 1),
(35, 'Normal Range', 12, 0, 24, 1),
(36, 'Clinical Range', 12, 25, 100, 1),
(37, 'Normal Range', 13, 0, 1, 1),
(38, 'Clinical Range', 13, 1, 10, 1),
(39, 'Normal Range', 14, 0, 1, 1),
(40, 'Clinical Range', 14, 1, 10, 1),
(41, 'Normal Range', 15, 0, 1, 1),
(42, 'Clinical Range', 15, 1, 10, 1),
(43, 'Normal Range', 16, 0, 0, 1),
(44, 'Clinical Range', 16, 0, 10, 1),
(45, 'Normal Range', 17, 0, 1, 1),
(46, 'Clinical Range', 17, 1, 10, 1),
(47, 'Normal Range', 18, 0, 1, 1),
(48, 'Clinical Range', 18, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_datetime` datetime NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Published','Draft','InActive','Scheduled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_map_categories`
--

CREATE TABLE `blog_map_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_map_tags`
--

CREATE TABLE `blog_map_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psycological_types_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'psychological_id',
  `dob` date DEFAULT NULL COMMENT 'client date of birth',
  `age` tinyint(127) DEFAULT NULL COMMENT 'client age',
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client name of parent or guardian',
  `contact_address` text COLLATE utf8mb4_unicode_ci COMMENT 'client contact address',
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client telephone number',
  `ok_to_contact` tinyint(4) DEFAULT NULL COMMENT 'client ok to contact',
  `ok_to_write` tinyint(4) DEFAULT NULL COMMENT 'client write to',
  `about_actualise` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'about about actualise',
  `referred_by` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'referred by of client',
  `referred_by_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Refered_by_other_descripion',
  `contact_tel_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'client contact tel no',
  `gp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'name and address of emergency contact pearson',
  `medication_choise` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'medication of client',
  `medication_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Medication YES the description',
  `termes_condition` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Terms and Condition',
  `disclaimer` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Disclaimer',
  `information` tinyint(4) DEFAULT NULL COMMENT 'Schedule Date of Assessment',
  `gdpr` tinyint(4) DEFAULT NULL COMMENT 'Schedule Date of Assessment',
  `research` tinyint(4) DEFAULT NULL COMMENT 'Schedule Date of Assessment',
  `consent_data_collection` tinyint(4) DEFAULT NULL COMMENT 'Schedule Date of Assessment',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'client status for 1:Active,0:Inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Record created by user',
  `updated_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Record updated by user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `client_code`, `psycological_types_id`, `dob`, `age`, `parent`, `contact_address`, `telephone`, `ok_to_contact`, `ok_to_write`, `about_actualise`, `referred_by`, `referred_by_description`, `contact_tel_no`, `gp`, `medication_choise`, `medication_description`, `termes_condition`, `disclaimer`, `information`, `gdpr`, `research`, `consent_data_collection`, `status`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 4, 'JANE01', '1,3', '2016-08-14', 2, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2018-09-05 08:05:23', '2018-10-17 02:50:30', 1, 1),
(2, 5, 'SARMAL', '5', '2015-09-18', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, '2018-09-19 03:38:12', '2018-09-19 03:31:08', '2018-09-19 03:38:12', 2, NULL),
(3, 7, 'MICH01', '3,6', '1987-07-18', 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, '2018-10-09 07:50:03', '2018-09-28 09:15:57', '2018-10-09 07:50:03', 2, 2),
(4, 8, 'NFT1000', '1,2', '1987-07-18', 31, NULL, NULL, NULL, 0, 0, NULL, '1', NULL, '5848930003', 'Dr. Margaret', '1', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, '2018-10-09 07:58:24', '2018-11-14 12:18:19', 2, 2),
(5, 10, 'MICHAEL', '1,5', '1979-06-13', 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, '2018-11-02 06:30:56', '2018-10-15 04:12:31', '2018-11-02 06:30:56', 2, NULL),
(6, 13, 'NF1000', '1', '1979-06-13', 39, 'Miceal Keane', '19D Richmond Gardens etc', '0874113742', 1, 1, 'Friend recommended it', '3,6', NULL, NULL, NULL, '2', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, '2018-11-02 06:36:06', '2018-11-02 06:36:06', 2, NULL),
(7, 16, 'MIKE0001', NULL, '2018-09-05', 0, NULL, NULL, '23232323', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, 1, 1, 1, NULL, '2018-11-19 05:31:44', '2018-12-04 05:13:59', 1, 1),
(8, 17, 'NF1002', NULL, '2017-07-31', 1, 'Tommy Grogan', 'The Moon', '0009998888', 0, 1, 'Online', '5,8', NULL, NULL, NULL, '1', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, '2018-11-19 07:45:05', '2018-11-20 10:27:53', 2, 2),
(9, 18, 'MARK01', NULL, '2018-11-19', 1, NULL, NULL, NULL, 0, 0, NULL, '9', 'ghghgh', NULL, NULL, '1', 'ghghghgh', 0, 0, 1, 1, 1, 0, 1, NULL, '2018-11-27 03:19:21', '2018-12-04 08:31:26', 2, 1),
(10, 19, 'NFT022', '2', '2016-03-23', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-04 03:43:03', '2018-12-04 03:43:03', 1, NULL),
(11, 20, 'CLI00001', '1,2', '1990-12-12', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, '2018-12-14 00:26:54', '2018-12-14 00:23:21', '2018-12-14 00:26:54', 1, 1),
(12, 22, '12098', '1,2,3,4', '2002-06-26', 17, NULL, NULL, NULL, 0, 0, '@', NULL, NULL, 'asdfasdfasdfasdfasdfasdfasdfasdfasdf1321321321321321312sdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfa', NULL, NULL, NULL, 0, 0, 1, 1, 1, 1, 1, NULL, '2019-01-17 02:29:39', '2019-01-21 04:32:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_intervention`
--

CREATE TABLE `client_intervention` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key of table',
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Client table',
  `intervention_type` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Intervention table',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-Pending, 1-Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_intervention`
--

INSERT INTO `client_intervention` (`id`, `client_id`, `intervention_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 3, 1, NULL, NULL),
(3, 2, 7, 0, NULL, NULL),
(4, 3, 1, 0, NULL, NULL),
(5, 4, 1, 1, NULL, NULL),
(6, 5, 1, 0, NULL, NULL),
(7, 6, 1, 0, NULL, NULL),
(8, 7, 2, 0, NULL, NULL),
(9, 7, 6, 0, NULL, NULL),
(10, 7, 7, 1, NULL, NULL),
(11, 8, 1, 1, NULL, NULL),
(12, 9, 2, 0, NULL, NULL),
(13, 9, 3, 1, NULL, NULL),
(14, 10, 4, 0, NULL, NULL),
(15, 10, 6, 0, NULL, NULL),
(16, 11, 1, 0, NULL, NULL),
(17, 11, 2, 0, NULL, NULL),
(18, 11, 3, 0, NULL, NULL),
(19, 12, 1, 1, NULL, NULL),
(20, 12, 3, 1, NULL, NULL),
(21, 12, 4, 1, NULL, NULL),
(22, 12, 5, 1, NULL, NULL),
(23, 12, 6, 1, NULL, NULL),
(24, 12, 8, 1, NULL, NULL),
(25, 12, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_knowledge`
--

CREATE TABLE `client_knowledge` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key of Table',
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Client Table',
  `knowledge_bases_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of knowledge Base Table',
  `ratings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ratings of knowledge',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_knowledge`
--

INSERT INTO `client_knowledge` (`id`, `client_id`, `knowledge_bases_id`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '5', NULL, '2018-09-19 03:40:21'),
(2, 1, 2, '4.5', NULL, '2018-09-14 04:45:04'),
(3, 1, 3, '3.5', NULL, '2018-10-05 04:34:35'),
(4, 3, 3, '3.5', NULL, '2018-09-28 10:00:12'),
(5, 1, 3, NULL, NULL, NULL),
(6, 3, 3, NULL, NULL, NULL),
(7, 4, 4, '5', NULL, '2018-10-09 08:11:39'),
(8, 4, 5, NULL, NULL, NULL),
(9, 4, 6, NULL, NULL, NULL),
(10, 4, 6, NULL, NULL, NULL),
(11, 1, 6, NULL, NULL, NULL),
(12, 1, 6, NULL, NULL, NULL),
(13, 1, 6, NULL, NULL, NULL),
(14, 8, 6, NULL, NULL, NULL),
(15, 9, 6, '4', NULL, '2018-11-27 07:54:43'),
(16, 9, 5, '3', NULL, '2018-12-14 04:01:05'),
(17, 12, 10, NULL, NULL, NULL),
(18, 12, 9, '3.5', NULL, '2019-03-26 09:20:12'),
(19, 12, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinicalservices_details`
--

CREATE TABLE `clinicalservices_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `clinical_service_id` smallint(5) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinicalservices_details`
--

INSERT INTO `clinicalservices_details` (`id`, `client_id`, `clinical_service_id`, `created_by`, `created_at`, `updated_at`) VALUES
(31, 1, 1, 1, NULL, NULL),
(32, 1, 2, 1, NULL, NULL),
(33, 6, 1, 2, NULL, NULL),
(35, 4, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_question`
--

CREATE TABLE `custom_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Client Table',
  `question_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Question Name',
  `is_submited_by` int(11) DEFAULT NULL COMMENT '1:Client submit the goals,0:Admin Submit the goals',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_question`
--

INSERT INTO `custom_question` (`id`, `client_id`, `question_name`, `is_submited_by`, `created_by`, `created_at`, `updated_at`) VALUES
(9, 1, 'Anxiety (Cleaning, hate being late, panic attacks)', NULL, 2, NULL, NULL),
(10, 1, 'Short-term memory', NULL, 2, NULL, NULL),
(11, 1, 'Focus (Difficulty switching focus)', NULL, 2, NULL, NULL),
(12, 1, 'Busy brain (Walk fast, racing thoughts, talk fast, can’t switch off)', NULL, 2, NULL, NULL),
(13, 1, 'Need to please (Taking on too much at work)', NULL, 2, NULL, NULL),
(14, 1, 'Details focussed (Need for order and structure)', NULL, 2, NULL, NULL),
(19, 3, 'Better mood at work', NULL, 2, NULL, NULL),
(20, 3, 'Happier with family', NULL, 2, NULL, NULL),
(21, 3, 'Anxiety with Dixie', NULL, 2, NULL, NULL),
(22, 3, 'Stop biting my nails', NULL, 2, NULL, NULL),
(23, 7, 'Anxiety', NULL, 1, NULL, NULL),
(24, 7, 'Thinking too much', NULL, 1, NULL, NULL),
(30, 8, 'Better attention in classroom', NULL, 2, NULL, NULL),
(31, 8, 'I need to be able to sit still', NULL, 2, NULL, NULL),
(32, 8, 'Low mood is a big issue', NULL, 2, NULL, NULL),
(33, 8, 'Get homework done quicker', NULL, 2, NULL, NULL),
(34, 8, 'Stop fighting with sister', NULL, 2, NULL, NULL),
(35, 8, 'Clean up in his bedroom', NULL, 2, NULL, NULL),
(36, 9, 'sdsd', NULL, 1, NULL, NULL),
(37, 9, 'sdssdsd', NULL, 1, NULL, NULL),
(38, 9, 'gfg', 1, 18, NULL, NULL),
(39, 12, 'subjective goal -1', 1, 22, NULL, NULL),
(40, 12, 'subjective goal -6', 1, 22, NULL, NULL),
(41, 12, 'subjective goal -2', 1, 22, NULL, NULL),
(42, 12, 'subjective goal -3', 1, 22, NULL, NULL),
(43, 12, 'subjective goal -4', 1, 22, NULL, NULL),
(44, 12, 'subjective goal -5', 1, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type_id`, `title`, `subject`, `body`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'User Registration', 'Actualise: User Registration', '<center>\n<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">\n<tbody>\n<tr>\n<td id="bodyCell" align="center" valign="top">\n<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="center">\n<tbody>\n<tr>\n<td align="left" valign="top">\n<table id="templateBody" border="0" width="600" cellspacing="0" cellpadding="0">\n<tbody>\n<tr>\n<td class="bodyContainer" style="padding-top: 9px; padding-bottom: 9px;" valign="top">\n<table class="mcnBoxedTextBlock" border="0" width="100%" cellspacing="0" cellpadding="0">\n<tbody class="mcnBoxedTextBlockOuter">\n<tr>\n<td class="mcnBoxedTextBlockInner" valign="top">\n<table class="mcnBoxedTextContentContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="left">\n<tbody>\n<tr>\n<td style="padding: 9px 18px 9px 18px;">\n<table class="mcnTextContentContainer" style="background-color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="18">\n<tbody>\n<tr>\n<td class="mcnTextContent" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;" valign="top">\n<div style="text-align: left; word-wrap: break-word;">Thank you for joining [app_name]! To finish signing up, you just need to confirm your account. <br /> <br />To confirm your email, please click this link:&nbsp;\n[confirmation_link] <br /> <br />Thanks! <br />The [app_name] Team\n<div class="footer" style="font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;">&copy;\n [app_name]</div>\n</div>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- // END BODY --></td>\n</tr>\n</tbody>\n</table>\n<!-- // END TEMPLATE --></td>\n</tr>\n</tbody>\n</table>\n</center>', 0, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(2, 2, 'Create User', 'Actualise: New Account', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [user],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Congratulations, you have been registered as backend user for Actualise Online Platform. Please keep this email for your records.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Your login details are:\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Email Address: [email]\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Password: [password]\n                                          </p>\n                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                            Please click on the link below to log in.\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                              [login_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br /> The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(3, 3, 'Activate / Deactivate User', 'Actualise: Account [status]', '<center>\n<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">\n<tbody>\n<tr>\n<td id="bodyCell" align="center" valign="top">\n<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="center">\n<tbody>\n<tr>\n<td align="left" valign="top">\n<table id="templateBody" border="0" width="600" cellspacing="0" cellpadding="0">\n<tbody>\n<tr>\n<td class="bodyContainer" style="padding-top: 9px; padding-bottom: 9px;" valign="top">\n<table class="mcnBoxedTextBlock" border="0" width="100%" cellspacing="0" cellpadding="0">\n<tbody class="mcnBoxedTextBlockOuter">\n<tr>\n<td class="mcnBoxedTextBlockInner" valign="top">\n<table class="mcnBoxedTextContentContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="left">\n<tbody>\n<tr>\n<td style="padding: 9px 18px 9px 18px;">\n<table class="mcnTextContentContainer" style="background-color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="18">\n<tbody>\n<tr>\n<td class="mcnTextContent" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;" valign="top">\n<div style="text-align: left; word-wrap: break-word;">Your account has been [status].<br /> <br />Thanks! <br />The [app_name] Team\n<div class="footer" style="font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;">&copy;\n [app_name]</div>\n</div>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- // END BODY --></td>\n</tr>\n</tbody>\n</table>\n<!-- // END TEMPLATE --></td>\n</tr>\n</tbody>\n</table>\n</center>', 0, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(4, 4, 'Change Password', 'Actualise: Password Changed', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Your password has been changed successfully.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           New password: [password]\n                                          </p>\n                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                            Please click on the link below to log in with your new password.\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                              [login_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br /> The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(5, 5, 'Create Client', 'Actualise: New Account', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Congratulations, your account has been created with Actualise Online Platform successfully. Please keep this email for your records.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Your login details are:\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Email Address: [email]\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Password: [password]\n                                          </p>\n                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                            Please click on the link below to log in.\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                              [login_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br /> The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(6, 6, 'Questionnaires', 'Actualise: New Action For You', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             A new action has been created for you by the Actualise Team. Please click on the link below to respond to this action.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Assessment Title: [title]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Action Link: [session_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>\n', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(7, 7, 'New Resource', 'Actualise: New Resource', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             We are sending you a resource for your reveiw. Please login and check for more details.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Resource Title: [title]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Resource Link: [link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>\n', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(8, 8, 'Answers Submitted by Client', 'Actualise: Answers Submitted by Client', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [users],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                            Your client has submitted answers to the questions. [session_link] to review.\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                            Assessment Title: [title]\n                                          </p>\n                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                              Assessment Date : [session_date]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                               Clinic Service : [intervention]\n                                          </p>\n                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                               Question Pattern: [question_type]\n                                          </p>\n                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Submitted On : [submited_date]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>\n', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL);
INSERT INTO `email_templates` (`id`, `type_id`, `title`, `subject`, `body`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 9, 'Cinic Service - Completed', 'Actualise: Cinic Service Completed', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             It looks like your time with us at Actualise has hit a big milestone! Clinic service - [intervention_service] is completed now. Could you spare a few moments to give us some feedback; your comments are very valuable to us.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Feedback: [feedback_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Testimonial: [testimonial_link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br /> The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(10, 10, 'Resend Resource', 'Actualise: Resend Resource', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [client],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             We are re-sending you a resource. Please login and check for more details.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Resource Title: [title]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Resource Link: [link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(11, 11, 'Subjective Goals Submitted by Client', 'Actualise: Subjective Goals Submitted by Client', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [users],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Your client has submitted subjective goals. Please click on the link below to review.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Client ID: [client_id]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          Subjective Goals: [link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(12, 12, 'Emergency protocol required', 'Actualise: Emergency Protocol Required', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [users],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Client Id - [client_id] has selected answer as [answer] in the BDI. Enact the <b>emergency protocol</b> immediately and contact your supervisor.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           Client Information - [link]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                           <b>Emergency Protocol</b> - [emergency_protocol]\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL),
(13, 13, 'Threshold Plateaued', 'Actualise: Threshold Plateaued', '<!DOCTYPE html>\n<html>\n\n<head>\n    <meta name="viewport" content="width=device-width, initial-scale=1.0" />\n    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\n\n    <style type="text/css" rel="stylesheet" media="all">\n     /* Layout ------------------------------ */\n    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}\n    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}\n    /* Masthead ----------------------- */\n    .email-masthead{padding: 25px 0; text-align: center;}\n    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}\n    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}\n    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}\n    .email-body_cell{padding: 35px;}\n    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}\n    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}\n    /* Body ------------------------------ */\n    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}\n    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}\n    /* Type ------------------------------ */\n\n    anchor => color: #3869D4;,\n    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}\n    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}\n    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}\n    .paragraph-center{text-align: center;}\n    /* Buttons ------------------------------ */\n    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;\n                 background-color: #3869D4;\n border-radius: 3px;\n color: #ffffff;\n font-size: 15px;\n line-height: 25px;\n                 text-align: center;\n text-decoration: none;\n -webkit-text-size-adjust: none;\n}\n\n    .button--green {background-color: #22BC66;}\n    .button--red {background-color: #dc4d2f;}\n    .button--blue {background-color: #3869D4;}\n    .textfont {\n        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;\n    }\n        /* Media Queries */\n        @media only screen and (max-width: 500px) {\n            .button {\n                width: 100% !important;\n            }\n        }\n    </style>\n</head>\n<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">\n    <table width="100%" cellpadding="0" cellspacing="0">\n        <tr>\n            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">\n                <table width="100%" cellpadding="0" cellspacing="0">\n                    <!-- Logo -->\n                    <tr>\n                        <td style="padding: 25px 0; text-align: center;">\n                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">\n                               [app_name]\n                            </div>\n                        </td>\n                    </tr>\n                  <!-- Email Body -->\n\n                    <tr>\n                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">\n                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">\n                                <tr>\n                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">\n                                         <!-- Greeting -->\n                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">\n                                           Hello [users],\n                                          </h1>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                          </p>\n                                            <!-- Intro -->\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Threshold have plateaued for Client Id - [client_id]. Please take appropriate actions or contact your supervisor to discuss.\n                                          </p>\n                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">\n                                             Thanks! <br />The [app_name] Team\n                                          </p>\n                                      </td>\n                                  </tr>\n                                    <!-- Footer -->\n                                  <tr>\n                                    <td>\n                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">\n                                          <tr>\n                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">\n                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">\n                                                      &copy;2018\n                                                      <a style="color:#3869D4;">[app_name]</a>.\n                                                     All Rights Reserved.\n                                                  </p>\n                                                </td>\n                                          </tr>\n                                      </table>\n                                    </td>\n                                  </tr>\n                              </table>\n                          </td>\n                      </tr>\n                  </table>\n              </td>\n          </tr>\n      </table>\n  </body>\n  </html>', 1, 1, NULL, '2018-12-14 03:16:47', '2018-12-14 03:16:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_template_placeholders`
--

CREATE TABLE `email_template_placeholders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_placeholders`
--

INSERT INTO `email_template_placeholders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'app_name', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(2, 'name', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(3, 'email', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(4, 'password', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(5, 'contact-details', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(6, 'confirmation_link', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(7, 'password_reset_link', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(8, 'header_logo', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(9, 'footer_logo', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(10, 'unscribe_link', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(11, 'status', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(12, 'feedback_link', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(13, 'testimonial_link', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(14, 'intervention_service', '2018-10-25 01:30:42', '2018-10-25 01:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_types`
--

CREATE TABLE `email_template_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_types`
--

INSERT INTO `email_template_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(2, 'Create User', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(3, 'Acivate / Deactivate User', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(4, 'Change Password', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(5, 'Send to Client', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(6, 'Session Management', '2018-10-25 01:30:42', '2018-10-25 01:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Client Table',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ratings of feedbacks',
  `intervention_type` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Intervention Type Table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `client_id`, `comment`, `ratings`, `intervention_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Please add morning sessions too.', '4.5', 1, NULL, NULL),
(2, 1, 'my comments', '5', 3, NULL, NULL),
(3, 8, 'I found the sessions to be ABC - and there was also this other thing that happened.', '5', 1, NULL, NULL),
(4, 12, 'test', '3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `type_id`, `user_id`, `entity_id`, `icon`, `class`, `text`, `assets`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'save', 'bg-aqua', 'trans("history.backend.users.updated") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","Admin Actualise",2]}', '2018-10-29 04:13:58', '2018-10-29 04:13:58'),
(2, 1, 22, 22, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","john carter",22]}', '2019-01-17 02:46:35', '2019-01-17 02:46:35'),
(3, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 20:42:17', '2019-05-22 20:42:17'),
(4, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:06:21', '2019-05-22 21:06:21'),
(5, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:15:04', '2019-05-22 21:15:04'),
(6, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:15:40', '2019-05-22 21:15:40'),
(7, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:16:09', '2019-05-22 21:16:09'),
(8, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:18:52', '2019-05-22 21:18:52'),
(9, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:19:56', '2019-05-22 21:19:56'),
(10, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:24:09', '2019-05-22 21:24:09'),
(11, 1, 1, 1, 'lock', 'bg-blue', 'trans("history.backend.users.changed_password") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","chirag khatri",1]}', '2019-05-22 21:26:09', '2019-05-22 21:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `history_types`
--

CREATE TABLE `history_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_types`
--

INSERT INTO `history_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(2, 'Role', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(3, 'Permission', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(4, 'CMSPage', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(5, 'EmailTemplate', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(6, 'BlogTag', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(7, 'BlogCategory', '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(8, 'Blog', '2018-10-25 01:30:42', '2018-10-25 01:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `interventions_type`
--

CREATE TABLE `interventions_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key of table',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of Interventions',
  `status` tinyint(4) DEFAULT NULL COMMENT '1-Active,0-Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interventions_type`
--

INSERT INTO `interventions_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Neurofeedback Training', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(2, 'Clinical Assessment (child ADHD)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(3, 'Clinical Assessment (adolescent ADHD)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(4, 'Clinical Assessment (adult ADHD)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(5, 'Clinical Assessment (other)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(6, 'Educational Assessment', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(7, 'Autism Spectrum Disorder Assessment', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(8, 'QEEG assessment only', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(9, 'Clinical Psychology (therapy)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(10, 'Clinical Psychology (other)', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42'),
(11, 'Positive Behavior Support', 1, '2018-10-25 01:30:42', '2018-10-25 01:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_bases`
--

CREATE TABLE `knowledge_bases` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `average_rating` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'knowledge base status for 1:Active,0:Inactive',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge_bases`
--

INSERT INTO `knowledge_bases` (`id`, `title`, `description`, `file`, `rating`, `average_rating`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Base study 1', 'Base study 1 is meant for anxiety disorder.', '["professional.jpg"]', 0.00, '5.00', 1, 1, '2018-09-05 08:06:32', '2018-10-09 08:12:46', '2018-10-09 08:12:46'),
(2, 'Record 1', 'Record 1 with description', '["logo-p.png","book1.jpg"]', 0.00, '4.50', 1, 2, '2018-09-14 04:41:23', '2018-10-09 08:12:40', '2018-10-09 08:12:40'),
(3, 'Pesky gNATs', 'Descriptions in here', '["000ad126-642.jpg"]', 0.00, '3.50', 1, 2, '2018-09-28 09:33:36', '2018-10-09 08:12:36', '2018-10-09 08:12:36'),
(4, 'Pre-consultation Pack', 'Dear Actualise Client,\r\n\r\nWe are looking forward to seeing you at the clinic. Before you come, here are some useful documents which you should look at, including:\r\n- A map of the campus, with information on parking\r\n- Our policies \r\n- Informed consent\r\n\r\nSee you soon!\r\nThe Actualise Team', '["DCU Alpha Campus Information.pdf","Goal Sheets - Adult.pdf","Informed consent form.docx","Policies 2018.pdf"]', 0.00, '5.00', 1, 2, '2018-10-09 08:08:10', '2018-10-09 08:21:45', '2018-10-09 08:21:45'),
(5, 'Map and Policies (A)', 'Dear Actualise Client,\r\n\r\nWe are looking forward to welcoming you to the Actualise Clinic. In advance of that, please find attached:\r\n\r\n- A map of the DCU Alpha campus. Please note, we are NOT in the DCU Main Campus, but in the DCU Alpha campus. This link will get you close to our clinic: https://goo.gl/maps/ms9kThQcAxB2. From here, just use the attached map to find parking\r\n\r\n- Our policies. Please read our policies ahead of your visit.\r\n\r\n- A goal sheet. This is a sample sheet which we will discuss with you at your consultation. It helps us think about goals you have in mind for your time with us.\r\n\r\nWe look forward to welcoming you to our clinic.\r\nThe Actualise Team', '{"3":"DCU Alpha Campus Information.pdf","4":"Goal Sheets - Adult.pdf","5":"Policies 2018.pdf"}', 0.00, '3.00', 1, 2, '2018-10-09 08:34:21', '2018-12-14 04:01:05', NULL),
(6, 'Map and Policies (C)', 'Dear Actualise Client,\r\n\r\nWe are looking forward to welcoming you to the Actualise Clinic. In advance of that, please find attached:\r\n\r\n- A map of the DCU Alpha campus. Please note, we are NOT in the DCU Main Campus, but in the DCU Alpha campus. This link will get you close to our clinic: https://goo.gl/maps/ms9kThQcAxB2. From here, just use the attached map to find parking\r\n\r\n- Our policies. Please read our policies ahead of your visit.\r\n\r\n- A goal sheet. This is a sample sheet which we will discuss with you at your consultation. It helps us think about goals you have in mind for your time with us.\r\n\r\nWe look forward to welcoming you to our clinic.\r\nThe Actualise Team', '["DCU Alpha Campus Information.pdf","Goal Sheets - Child.pdf","Policies 2018.pdf"]', 0.00, '4.00', 1, 2, '2018-10-09 08:35:12', '2018-11-27 07:54:43', NULL),
(7, 'Teachers Resources 1', 'r', '["Ikigai.jpeg"]', 0.00, '0.00', 1, 2, '2018-11-02 07:31:01', '2018-11-02 07:31:11', '2018-11-02 07:31:11'),
(8, 'Teachers Resources 3', 'Max Size File', '["Canada-17MB.jpg","Airbus_Pleiades_41MB.jpg","Actualise Academy Resources #3.pdf"]', 0.00, '0.00', 1, 1, '2018-12-03 02:07:12', '2018-12-10 03:57:56', NULL),
(9, 'NFT presentation', 'arg', '["NFT info presentation.pptx"]', 0.00, '3.50', 1, 2, '2018-12-10 04:01:41', '2019-03-26 09:20:12', NULL),
(10, 'User Manual', 'desc', '["download.jpg"]', 0.00, '0.00', 1, 1, '2019-01-17 02:47:54', '2019-01-17 02:48:14', NULL),
(11, 'ooo', 'ooooo', '["Shayona Shikhar.pdf"]', 0.00, '0.00', 1, 1, '2019-01-21 08:25:34', '2019-01-21 08:25:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managesessions`
--

CREATE TABLE `managesessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Client Table',
  `question_type_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Question Type Table',
  `custom_question_id` int(11) DEFAULT NULL COMMENT '1:Subjective_question,2:No_question,0:Objective_question',
  `intervention_type` int(11) NOT NULL COMMENT 'Foreign Key of Intervention Type table',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Session Title',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'description of session',
  `threshold_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Session Threshold value',
  `threshold_end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'threshold_end',
  `insert_note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'insert_note',
  `session_date` date DEFAULT NULL COMMENT 'Session Date',
  `session_visit` tinyint(4) DEFAULT NULL COMMENT 'Session visit 1:Yes,0:No',
  `schedule_date` date DEFAULT NULL COMMENT 'Schedule Date of Assessment',
  `schedule_flag` tinyint(4) DEFAULT NULL COMMENT '1:For Shedule Assessment today,NULL:Shedule for other day',
  `show_tile_card` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:Not Show,1:Show Tile Card Client Side',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Session status for 1:Submited,0:Pending',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `updated_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Record updated by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managesessions`
--

INSERT INTO `managesessions` (`id`, `client_id`, `question_type_id`, `custom_question_id`, `intervention_type`, `title`, `description`, `threshold_start`, `threshold_end`, `insert_note`, `session_date`, `session_visit`, `schedule_date`, `schedule_flag`, `show_tile_card`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, 0, 'ABC', NULL, '0', '0', '0', NULL, 0, NULL, NULL, 0, 1, 1, NULL, '2018-08-10 05:57:28', '2018-09-06 07:49:37', '2018-09-06 07:49:37'),
(2, 1, 0, 1, 1, 'Session 1', 'Session 1 taken for learning', '0', '0', '0', '2018-08-07', 0, NULL, NULL, 0, 1, 2, NULL, '2018-09-06 07:50:11', '2018-10-05 04:37:47', NULL),
(3, 1, 1, 0, 1, 'Session 2', 'Session 2 with objective set of questions', '0', '0', '0', '2018-08-14', 0, NULL, NULL, 0, 1, 2, NULL, '2018-09-06 07:53:15', '2018-10-05 04:35:16', NULL),
(4, 1, 1, 0, 1, 'Session 5', 'some details for this session', '8', '0', '0', '2018-08-30', 0, NULL, NULL, 0, 1, 2, NULL, '2018-09-14 04:26:13', '2018-10-05 04:37:41', NULL),
(5, 1, 0, 1, 1, 'Session 6', NULL, '7.5', '0', '0', '2018-09-01', 0, NULL, NULL, 0, 1, 2, NULL, '2018-09-14 04:34:06', '2018-10-05 04:42:34', NULL),
(6, 1, 3, 0, 3, 'SDQ 1', 'SDQ 1 session with full details', '6.9', '0', '0', '2018-09-18', 0, NULL, NULL, 0, 1, 2, NULL, '2018-09-19 03:43:49', '2018-10-05 04:46:19', NULL),
(7, 1, 2, 0, 1, 'SDQ 2', 'SDQ 2', '7', '0', '0', '2018-09-11', 0, NULL, NULL, 0, 1, 2, 1, '2018-09-28 06:23:31', '2018-10-05 06:31:06', NULL),
(8, 3, 0, 1, 1, 'Not sure', 'This is the description box', '0', '0', '0', '2018-10-03', 0, NULL, NULL, 0, 0, 2, NULL, '2018-09-28 09:25:51', '2018-09-28 09:25:51', NULL),
(9, 3, 0, 0, 1, 'Session 10', 'Objective q description box', '0', '0', '0', '2018-10-02', 0, NULL, NULL, 0, 0, 2, 1, '2018-09-28 09:30:54', '2018-10-05 06:16:45', NULL),
(10, 1, 0, 2, 3, 'xxxx 1', 'xxxx 1', '0', '0', '0', '2018-10-11', 0, NULL, NULL, 0, 0, 1, NULL, '2018-10-05 04:39:44', '2018-10-05 04:39:44', NULL),
(11, 1, 0, 2, 1, 'first', 'first session with no questions', '0', '0', '0', '2018-10-25', 0, NULL, NULL, 0, 2, 1, NULL, '2018-10-05 04:49:27', '2018-10-05 04:49:27', NULL),
(12, 1, 2, 0, 1, 'core 1', 'core 1', '0', '0', '0', '2018-10-11', 0, NULL, NULL, 0, 1, 1, NULL, '2018-10-05 04:59:34', '2018-10-05 05:00:42', NULL),
(13, 1, 4, 0, 1, 'Scared 1', 'Scared 1', '0', '0', '0', '2018-10-25', 1, NULL, NULL, 0, 0, 1, 1, '2018-10-05 05:01:58', '2018-10-29 04:14:42', NULL),
(14, 1, 0, 2, 1, 'subjective', 'subjective 1', '4', '1', '0', '2018-10-08', 1, NULL, NULL, 0, 0, 1, 1, '2018-10-05 05:07:49', '2019-01-21 00:25:49', NULL),
(15, 4, 1, 0, 1, 'Questionnaire (BDI)', 'Please complete this questionnaire before your consultation.\r\nThanks,\r\nThe Actualise Team', '0', '0', '0', '2018-10-11', 0, NULL, NULL, 0, 1, 2, NULL, '2018-10-09 08:54:02', '2018-10-09 09:15:49', NULL),
(16, 4, 1, 0, 1, 'bdi', NULL, '4', '0', '0', '2018-10-10', 0, NULL, NULL, 0, 1, 2, NULL, '2018-10-09 09:20:21', '2018-10-16 07:36:37', NULL),
(17, 4, 3, 0, 1, 'sdq', 'ddd', '0', '0', '0', '2018-10-10', 0, NULL, NULL, 0, 1, 2, NULL, '2018-10-09 09:23:15', '2018-11-23 07:08:33', NULL),
(18, 5, 0, 2, 1, 'NFT visit', NULL, '0', '0', '0', '2018-10-15', 0, NULL, NULL, 0, 2, 2, NULL, '2018-10-15 04:55:26', '2018-10-15 04:55:26', NULL),
(19, 4, 0, 2, 1, 'NF12', 'Oceans Feedbackdfbwerbsb\r\nsdvowehf\r\nousdgfoiwhf\r\nufoiehfpoe', '0', '0', '0', '2018-10-16', 0, NULL, NULL, 0, 0, 2, 2, '2018-10-16 07:44:40', '2018-10-16 08:00:41', NULL),
(20, 4, 0, 2, 1, 'NF10', 'Oceans Feedback 2', '0', '0', '0', '2018-10-19', 0, NULL, NULL, 0, 2, 2, NULL, '2018-10-16 08:01:36', '2018-10-16 08:01:36', NULL),
(21, 4, 1, 0, 1, '`sdb', NULL, '0', '0', '0', '2018-10-16', 0, NULL, NULL, 0, 0, 2, NULL, '2018-10-16 08:03:23', '2018-10-16 08:03:23', NULL),
(22, 4, 1, 0, 1, '`sdb', NULL, '0', '0', '0', '2018-10-16', 0, NULL, NULL, 0, 0, 2, NULL, '2018-10-16 08:03:28', '2018-10-16 09:03:28', '2018-10-16 09:03:28'),
(23, 4, 2, 0, 1, 'NF12', NULL, '0', '0', '0', '2018-10-23', 0, NULL, NULL, 0, 0, 2, NULL, '2018-10-23 09:13:27', '2018-10-23 09:13:27', NULL),
(24, 4, 0, 2, 1, 'NFT3', 'Michelle forgot her diary today\nFilled out SDQs\nWatched Zootopia P1', '1', '1', '0', '2018-11-02', 1, NULL, NULL, 0, 0, 2, 2, '2018-11-02 06:47:51', '2018-12-14 03:26:08', NULL),
(25, 4, 0, 2, 1, 'NFT4', '3Michelle did ABC today', '1', '1', '0', '2018-11-01', 1, NULL, NULL, 0, 2, 2, NULL, '2018-11-02 06:54:37', '2018-12-14 03:26:08', NULL),
(26, 4, 0, 2, 1, 'NF3', NULL, '0', '0', '0', '2018-11-16', 1, NULL, NULL, 0, 2, 2, NULL, '2018-11-14 12:01:50', '2018-11-14 12:02:33', '2018-11-14 12:02:33'),
(27, 4, 0, 1, 1, 'NF3', 'qojpqf', '0', '0', '0', '2018-11-16', 0, NULL, NULL, 0, 0, 2, NULL, '2018-11-14 12:02:56', '2018-11-14 12:02:56', NULL),
(28, 4, 5, 0, 1, 'Please complete', NULL, '0', '0', '0', '2018-11-16', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-14 12:09:36', '2018-11-14 12:12:13', NULL),
(29, 4, 1, 0, 1, 'For session 10', NULL, '0', '0', '0', '2018-11-15', 0, NULL, NULL, 0, 0, 2, NULL, '2018-11-14 12:15:37', '2018-11-14 12:15:37', NULL),
(30, 7, 0, 2, 7, 'session with no ques', 'session with no questuionsss', '0', '0', '0', '2018-11-01', 0, NULL, NULL, 0, 2, 1, NULL, '2018-11-19 05:35:33', '2018-11-19 05:35:33', NULL),
(31, 7, 0, 1, 7, 'subjective session', 'subjective session', '0', '0', '0', '2018-11-13', 1, NULL, NULL, 0, 1, 1, NULL, '2018-11-19 05:36:35', '2018-11-19 05:38:53', NULL),
(32, 7, 3, 0, 2, 'Objective 1', 'Objective 1', '0', '0', '0', '2018-11-06', 0, NULL, NULL, 0, 1, 1, NULL, '2018-11-19 05:40:10', '2018-11-19 05:52:43', NULL),
(33, 8, 0, 1, 1, 'NFT1 - Goals', 'Goals for Tom\'s first visit', '0', '0', '0', '2018-11-20', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-20 08:40:44', '2018-11-20 08:54:46', NULL),
(34, 8, 1, 0, 1, 'BDI - Time 1', 'This is Tom\'s first BDI to score', '0', '0', '0', '2018-11-20', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-20 08:55:57', '2018-11-20 08:59:26', NULL),
(35, 8, 0, 1, 1, 'NFT1 - updated goals', 'These are Tom\'s updated goals since he was here for consultation.', '0', '0', '0', '2018-11-21', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-20 09:19:22', '2018-11-20 09:20:31', NULL),
(36, 8, 0, 1, 1, 'NFT1 - updated goals', 'Dear Tom, these are some new instructions for you.\r\nThanks,\r\nThe Actualise Team', '0', '0', '0', '2018-11-20', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-20 09:34:15', '2018-11-20 09:36:25', NULL),
(37, 8, 0, 2, 1, 'NFT Session 1', 'Session 1 notes\r\n\r\nPut in more notes from Tom\'s session here. During and after the sessions notes\r\n1\r\n2\r\n3\r\n4\r\n5', '10', '9', '0', '2018-11-21', 1, NULL, NULL, 0, 0, 2, 2, '2018-11-20 09:49:34', '2018-11-20 09:55:41', NULL),
(38, 8, 0, 2, 1, 'NFT Session 2', 'Session 2 notes\r\n\r\nMore notes here\r\n\r\nSeparated by lines', '8', '7', '0', '2018-11-23', 1, NULL, NULL, 0, 0, 2, 2, '2018-11-20 09:56:12', '2018-11-20 09:56:55', NULL),
(39, 8, 0, 1, 1, 'Goals - Week 2', 'Goals for week two should be detailed in here', '0', '0', '0', '2018-11-23', 0, NULL, NULL, 0, 1, 2, NULL, '2018-11-20 09:59:09', '2018-11-20 10:04:07', NULL),
(40, 8, 0, 2, 1, 'NFT Session 3', 'Session 3 notes written in this text box. What movie, etc he watched.', '9', '8', '0', '2018-11-22', 1, NULL, NULL, 0, 2, 2, NULL, '2018-11-20 10:10:56', '2018-11-20 10:17:37', NULL),
(41, 8, 0, 2, 1, 'NFT Session 4', 'Session 4 notes etc', '7', '4', '0', '2018-11-24', 1, NULL, NULL, 0, 0, 2, 2, '2018-11-20 10:15:28', '2018-11-20 10:22:15', NULL),
(42, 9, 0, 2, 2, 'xxxx', 'xxxx', '0', '0', '0', '2018-12-03', 1, NULL, NULL, 1, 2, 1, NULL, '2018-12-04 02:56:09', '2018-12-04 02:56:09', NULL),
(43, 7, 0, 2, 2, 'no', 'no', '0', '0', '0', '2018-12-19', 1, NULL, NULL, 0, 2, 1, NULL, '2018-12-04 02:57:18', '2018-12-04 02:57:18', NULL),
(44, 7, 0, 2, 2, 'simple1', 'simple1', '0', '0', '0', '2018-12-06', 0, NULL, NULL, 1, 0, 1, 1, '2018-12-04 02:58:03', '2018-12-04 03:00:34', NULL),
(45, 9, 0, 1, 2, 'sdsd', 'sdsdsd', '0', '0', '0', '2018-12-19', 0, NULL, NULL, 1, 1, 1, NULL, '2018-12-04 03:39:19', '2018-12-04 03:47:43', NULL),
(46, 9, 3, 0, 2, 'mp', 'mp', '0', '0', '0', '2018-12-02', 0, NULL, NULL, 1, 1, 1, NULL, '2018-12-04 05:08:06', '2018-12-04 05:08:30', NULL),
(47, 9, 0, 1, 2, 'uuuuu', 'uuu', '0', '0', '0', '2018-12-28', 0, NULL, NULL, 1, 1, 1, NULL, '2018-12-04 05:09:32', '2018-12-04 05:09:48', NULL),
(48, 9, 5, 0, 3, 'sdsdsd', 'sdsdsd', '0', '0', '0', '2018-12-11', 1, NULL, NULL, 0, 0, 1, NULL, '2018-12-04 05:18:47', '2018-12-04 05:18:47', NULL),
(49, 9, 0, 2, 2, 'xp', NULL, '0', '0', '0', '2018-12-26', 1, NULL, NULL, 1, 0, 1, 1, '2018-12-04 08:27:53', '2018-12-04 08:28:11', NULL),
(50, 9, 0, 1, 3, 'ffff', 'ddd', '0', '0', '0', '2018-12-25', 1, '2018-12-14', 1, 1, 0, 1, 1, '2018-12-04 08:29:57', '2018-12-14 04:01:46', NULL),
(51, 9, 1, 0, 2, 'This is BDI question', 'notes about it', '0', '0', '0', '2019-01-25', 0, '2019-01-17', 1, 1, 0, 1, NULL, '2019-01-17 02:19:30', '2019-01-17 02:19:30', NULL),
(52, 9, 0, 2, 3, 'Session 1', 'notes goes here', '0', '0', '0', '2019-01-17', 1, '2019-01-17', 1, 0, 0, 1, 1, '2019-01-17 02:21:35', '2019-01-17 02:23:42', NULL),
(53, 12, 3, 2, 1, 'NoQuestion Assessmen', 'Notes', '0', '0', '0', '2019-01-25', 1, '2019-01-17', 1, 1, 2, 1, NULL, '2019-01-17 02:33:55', '2019-01-17 02:33:55', NULL),
(54, 12, 3, 2, 1, 'Subjection Assessmen', 'Notes goes here', '0', '0', '0', '2019-01-18', 1, '2019-01-17', 1, 1, 1, 1, NULL, '2019-01-17 02:34:40', '2019-01-17 04:15:38', NULL),
(55, 12, 4, 2, 1, 'BDI type questions', 'Please answer all questions', '0', '0', '0', '2019-01-18', 1, '2019-01-17', 1, 1, 1, 1, NULL, '2019-01-17 02:36:00', '2019-01-17 02:39:48', NULL),
(56, 12, 4, 2, 1, 'CORE questions', NULL, '0', '0', '0', '2019-01-25', 1, '2019-01-21', 1, 1, 1, 1, 1, '2019-01-17 02:37:04', '2019-01-21 04:36:29', NULL),
(57, 12, 4, 2, 1, 'test', 'desc', '0', '0', '0', '2019-01-18', 1, '2019-01-21', 1, 1, 1, 1, 1, '2019-01-18 05:04:57', '2019-01-21 04:36:38', NULL),
(58, 12, 0, 2, 1, 'dddd', 'ddd', '0', '0', '0', '2019-01-18', 1, '2019-01-18', 1, 1, 0, 1, NULL, '2019-01-18 05:08:04', '2019-01-18 05:08:04', NULL),
(59, 12, 3, 2, 1, 'SCARED SESSION', 'asa', '0', '0', '0', '2019-01-21', 1, '2019-01-21', 1, 0, 0, 1, 1, '2019-01-21 04:27:36', '2019-01-21 04:48:46', NULL),
(60, 12, 3, 2, 1, 'SDQ SESSION', 'sads', '0', '0', '0', '2019-01-21', 1, '2019-01-21', 1, 1, 1, 1, NULL, '2019-01-21 04:28:07', '2019-01-21 04:36:07', NULL),
(61, 12, 3, 2, 1, 'SDQ SESSION', 'asasa', '0', '0', '0', '2019-01-21', 1, '2019-01-21', 1, 1, 0, 1, NULL, '2019-01-21 04:47:29', '2019-01-21 04:47:29', NULL),
(62, 12, 1, 0, 1, 'Demo title', 'Demo notes', '0', '0', '0', '2019-01-21', 1, '2019-01-21', 1, 1, 0, 1, NULL, '2019-01-21 08:22:04', '2019-01-21 08:22:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('backend','frontend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `name`, `items`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'backend', 'Backend Sidebar Menu', '[\r\n  {\r\n    "view_permission_id": "view-access-management",\r\n    "icon": "fa-users",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "",\r\n    "name": "User Access",\r\n    "id": 11,\r\n    "content": "User Access",\r\n    "children": [\r\n      {\r\n        "view_permission_id": "view-user-management",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.access.user.index",\r\n        "name": "User Management",\r\n        "id": 12,\r\n        "content": "User Management"\r\n      },\r\n      {\r\n        "view_permission_id": "view-role-management",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.access.role.index",\r\n        "name": "Role Management",\r\n        "id": 13,\r\n        "content": "Role Management"\r\n      },\r\n      {\r\n        "view_permission_id": "view-permission-management",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.access.permission.index",\r\n        "name": "Permission Management",\r\n        "id": 14,\r\n        "content": "Permission Management"\r\n      }\r\n    ]\r\n  },\r\n  {\r\n    "view_permission_id": "view-module",\r\n    "icon": "fa-wrench",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "admin.modules.index",\r\n    "name": "Module",\r\n    "id": 1,\r\n    "content": "Module"\r\n  },\r\n  {\r\n    "view_permission_id": "manage-client",\r\n    "icon": "fa-users",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "admin.clients.index",\r\n    "name": "Clients",\r\n    "id": 20,\r\n    "content": "Clients"\r\n  },\r\n\r\n  {\r\n    "view_permission_id": "manage-managesession",\r\n    "icon": "fa fa-user-md ",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "admin.managesessions.index",\r\n    "name": "Assessments",\r\n    "id": 24,\r\n    "content": "Sessions"\r\n  },\r\n  {\r\n    "id": 25,\r\n    "name": "Resources",\r\n    "url": "admin.knowledgebases.index",\r\n    "url_type": "route",\r\n    "open_in_new_tab": 0,\r\n    "icon": "fa-book ",\r\n    "view_permission_id": "manage-knowledgebase",\r\n    "content": "Knowledge Bases"\r\n  },\r\n\r\n  {\r\n    "view_permission_id": "view-report-permission",\r\n    "icon": "fa-bar-chart",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "static",\r\n    "url": "",\r\n    "name": "Reports",\r\n    "id": 27,\r\n    "content": "Reports",\r\n    "children": [\r\n      {\r\n        "view_permission_id": "intervention-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.charts",\r\n        "name": "Client Session Progress",\r\n        "id": 26,\r\n        "content": "Intervention"\r\n      },\r\n      {\r\n        "view_permission_id": "threshold-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.staff.threshold",\r\n        "name": "Client Threshold",\r\n        "id": 1,\r\n        "content": "Staff Threshold"\r\n      },\r\n      {\r\n        "view_permission_id": "progress-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.progress",\r\n        "name": "Goal Progress",\r\n        "id": 26,\r\n        "content": "Goal Progress"\r\n      },\r\n      {\r\n        "view_permission_id": "sdq-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.sdq",\r\n        "name": "SDQ Status ",\r\n        "id": 26,\r\n        "content": "SDQ Status"\r\n      },\r\n      {\r\n        "view_permission_id": "scared-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.scared",\r\n        "name": "SCARED Status ",\r\n        "id": 26,\r\n        "content": "SCARED Status"\r\n      },\r\n      {\r\n        "view_permission_id": "core-report",\r\n        "icon": "",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.reports.core",\r\n        "name": "CORE Status ",\r\n        "id": 26,\r\n        "content": "CORE Status"\r\n      }\r\n    ]\r\n  }\r\n  ,\r\n  {\r\n    "view_permission_id": "manage-feedback",\r\n    "icon": "fa fa-commenting ",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "admin.feedback.index",\r\n    "name": "Feedback",\r\n    "id": 26,\r\n    "content": "Feedbacks"\r\n  },\r\n  {\r\n    "view_permission_id": "manage-testimonial",\r\n    "icon": "fa fa-quote-left",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "route",\r\n    "url": "admin.testimonials.index",\r\n    "name": "Testimonials",\r\n    "id": 28,\r\n    "content": "Testimonials"\r\n  },\r\n\r\n  {\r\n    "view_permission_id": "view-masters",\r\n    "icon": "fa fa-cogs",\r\n    "open_in_new_tab": 0,\r\n    "url_type": "static",\r\n    "url": "",\r\n    "name": "Master Management",\r\n    "id": 28,\r\n    "content": "Master",\r\n    "children": [\r\n      {\r\n        "id": 21,\r\n        "name": "Clinic Services",\r\n        "url": "admin.clinicalservices.index",\r\n        "url_type": "route",\r\n        "open_in_new_tab": 0,\r\n        "view_permission_id": "manage-clinicalservice",\r\n        "content": "Clinic Services"\r\n      },\r\n      {\r\n        "id": 23,\r\n        "name": "Psychological Conditions",\r\n        "url": "admin.psycologicalconditiontypes.index",\r\n        "url_type": "route",\r\n        "open_in_new_tab": 0,\r\n        "view_permission_id": "manage-psycologicalconditiontype",\r\n        "content": "Psychological Conditions"\r\n      },\r\n      {\r\n          "view_permission_id":"manage-questiontype",\r\n          "open_in_new_tab":0,\r\n          "url_type":"route",\r\n          "url":"admin.questiontypes.index",\r\n          "name":"Questionnaires",\r\n          "id":1,\r\n          "content":"Questionnaires"\r\n       },\r\n      {\r\n        "id": 22,\r\n        "name": "Questions",\r\n        "url": "admin.questionbanks.index",\r\n        "url_type": "route",\r\n        "open_in_new_tab": 0,\r\n        "view_permission_id": "manage-questionbank",\r\n        "content": "Question Banks"\r\n      },\r\n      {\r\n        "view_permission_id": "edit-settings",\r\n        "open_in_new_tab": 0,\r\n        "url_type": "route",\r\n        "url": "admin.settings.edit?id=1",\r\n        "name": "Settings",\r\n        "id": 9,\r\n        "content": "Settings"\r\n      }\r\n    ]\r\n  }\r\n]', 1, NULL, '2018-10-25 01:30:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_02_060149_create_blog_categories_table', 1),
(2, '2017_11_02_060149_create_blog_map_categories_table', 1),
(3, '2017_11_02_060149_create_blog_map_tags_table', 1),
(4, '2017_11_02_060149_create_blog_tags_table', 1),
(5, '2017_11_02_060149_create_blogs_table', 1),
(6, '2017_11_02_060149_create_email_template_placeholders_table', 1),
(7, '2017_11_02_060149_create_email_template_types_table', 1),
(8, '2017_11_02_060149_create_email_templates_table', 1),
(9, '2017_11_02_060149_create_faqs_table', 1),
(10, '2017_11_02_060149_create_history_table', 1),
(11, '2017_11_02_060149_create_history_types_table', 1),
(12, '2017_11_02_060149_create_modules_table', 1),
(13, '2017_11_02_060149_create_notifications_table', 1),
(14, '2017_11_02_060149_create_pages_table', 1),
(15, '2017_11_02_060149_create_password_resets_table', 1),
(16, '2017_11_02_060149_create_permission_role_table', 1),
(17, '2017_11_02_060149_create_permission_user_table', 1),
(18, '2017_11_02_060149_create_permissions_table', 1),
(19, '2017_11_02_060149_create_role_user_table', 1),
(20, '2017_11_02_060149_create_roles_table', 1),
(21, '2017_11_02_060149_create_sessions_table', 1),
(22, '2017_11_02_060149_create_settings_table', 1),
(23, '2017_11_02_060149_create_social_logins_table', 1),
(24, '2017_11_02_060149_create_users_table', 1),
(25, '2017_11_02_060152_add_foreign_keys_to_history_table', 1),
(26, '2017_11_02_060152_add_foreign_keys_to_notifications_table', 1),
(27, '2017_11_02_060152_add_foreign_keys_to_permission_role_table', 1),
(28, '2017_11_02_060152_add_foreign_keys_to_permission_user_table', 1),
(29, '2017_11_02_060152_add_foreign_keys_to_role_user_table', 1),
(30, '2017_11_02_060152_add_foreign_keys_to_social_logins_table', 1),
(31, '2017_12_10_122555_create_menus_table', 1),
(32, '2017_12_24_042039_add_null_constraint_on_created_by_on_user_table', 1),
(33, '2017_12_28_005822_add_null_constraint_on_created_by_on_role_table', 1),
(34, '2017_12_28_010952_add_null_constraint_on_created_by_on_permission_table', 1),
(35, '2018_07_30_121806_create_psycologicalconditiontypes_table', 1),
(36, '2018_07_31_083726_create_clinicalservices_table', 1),
(37, '2018_07_31_111627_create_clients_table', 1),
(38, '2018_07_31_120211_add_foreign_keys_client_table', 1),
(39, '2018_08_02_053025_create_questions_table', 1),
(40, '2018_08_03_090425_create_question_type_table', 1),
(41, '2018_08_03_095700_create_clinicalservicesdetails_table', 1),
(42, '2018_08_03_101425_update_clients_table', 1),
(43, '2018_08_07_055856_create_managesessions_table', 1),
(44, '2018_08_07_061120_add_foreign_key_managesessions_table', 1),
(45, '2018_08_07_124637_create_custom_question_table', 1),
(46, '2018_08_07_124858_create_addkey_custom_question_table', 1),
(47, '2018_08_08_092535_rename_clinicalservices_table', 1),
(48, '2018_08_08_105106_rename_psycologicalconditiontypes_table', 1),
(49, '2018_08_10_060436_rename_column_clients_table', 2),
(50, '2018_08_10_063152_update_managesession_table', 2),
(51, '2018_08_10_065619_alter_age_clients_table', 2),
(52, '2018_08_10_104639_add_foregin_key_psychological_table', 2),
(53, '2018_08_10_104852_add_foreign_key_services_table', 2),
(54, '2018_08_10_112341_create_question_option_table', 2),
(55, '2018_08_10_112950_add_foreign_key_question_option_table', 2),
(56, '2018_08_14_062001_create_knowledge_bases_table', 2),
(57, '2018_08_17_085931_add_foreign_key_knowledge_bases_table', 2),
(58, '2018_08_17_091408_create_client_knowledge_table', 2),
(59, '2018_08_17_092032_add_foreign_key_to_client_knowledge_table', 2),
(60, '2018_08_17_092609_create_question_submit_table', 2),
(61, '2018_08_17_093409_create_subjective_question_save_table', 2),
(62, '2018_08_17_093620_add_foreign_key_to_question_submit_table', 2),
(63, '2018_08_17_093711_add_foreign_key_to_subjective_question_save_table', 2),
(64, '2018_08_24_140153_add_columns_managesession_table', 2),
(65, '2018_08_27_062759_create_interventions_type_table', 2),
(66, '2018_08_27_094428_change_managesessions_table', 2),
(67, '2018_08_28_081614_create_client_intervention_table', 2),
(68, '2018_08_28_142425_create_reports_table', 2),
(69, '2018_08_29_110351_create_feedbacks_table', 2),
(70, '2018_09_03_061311_add_foregin_key_feedbacks_table', 2),
(71, '2018_09_03_065647_add_status_client_intervention', 2),
(72, '2018_09_03_072718_change_question_type_table_id', 2),
(73, '2018_09_05_060405_remove_filed_to_managesessions_table', 3),
(74, '2018_09_05_061144_create_testimonials_table', 4),
(75, '2018_09_05_121510_add_foregin_key_testimonial_table', 4),
(76, '2018_09_06_130451_change_knowledge_bases_table', 4),
(77, '2018_09_07_090402_add_status_to_question_type_table', 5),
(78, '2018_09_10_074649_remove_field_to_custom_question_table', 6),
(79, '2018_09_10_134817_remove_field_subjective_question_save_table', 6),
(80, '2018_09_11_113041_update_session_table_to_managesessions_table', 6),
(81, '2018_09_11_125711_create_behaviour_table', 6),
(82, '2018_09_11_131957_create_scales_table', 6),
(83, '2018_09_12_053158_add_forgin_key_scales_table', 6),
(84, '2018_09_12_101147_add_forgin_key_behaviour_table', 6),
(85, '2018_09_13_070514_add_behaviour_id_to_question_table', 6),
(86, '2018_09_13_070955_add_foregin_key_behaviour_to_questions_table', 6),
(87, '2018_10_01_074140_create_questiontypes_table', 7),
(88, '2018_10_03_060605_add_soft_delete_to_question_type_table', 7),
(89, '2018_10_16_140108_update_session_table_add_visit_field', 8),
(90, '2018_10_17_054437_add_client_code_to_clients_table', 8),
(91, '2018_10_17_095619_rename_column_session_threshold_value', 8),
(92, '2018_10_17_095907_add_column_session_threshold_value_end', 8),
(93, '2018_10_22_130410_add_new_filed_clients_table', 8),
(94, '2018_10_25_074244_update_session_visit_to_managesession_table', 9),
(95, '2018_11_30_071730_update_session_table', 10),
(96, '2018_12_04_072947_remove_is_send_filed_client_knowledge_base', 11),
(97, '2018_12_11_151916_update_custom_question_table', 12),
(98, '2018_12_11_151944_update_manage_session_table', 12),
(99, '2018_12_12_111001_add_client_table_field', 12),
(100, '2018_12_13_073615_add_client_new_fiel', 12),
(101, '2018_12_13_115935_change_comment_schedule_flag_session_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `view_permission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'view_route',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `view_permission_id`, `name`, `url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'view-access-management', 'Access Management', NULL, 1, NULL, '2018-10-25 01:30:42', NULL),
(2, 'view-user-management', 'User Management', 'admin.access.user.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(3, 'view-role-management', 'Role Management', 'admin.access.role.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(4, 'view-permission-management', 'Permission Management', 'admin.access.permission.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(5, 'view-menu', 'Menus', 'admin.menus.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(6, 'view-module', 'Module', 'admin.modules.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(7, 'view-page', 'Pages', 'admin.pages.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(8, 'view-email-template', 'Email Templates', 'admin.emailtemplates.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(9, 'edit-settings', 'Settings', 'admin.settings.edit', 1, NULL, '2018-10-25 01:30:42', NULL),
(10, 'view-blog', 'Blog Management', NULL, 1, NULL, '2018-10-25 01:30:42', NULL),
(11, 'view-blog-category', 'Blog Category Management', 'admin.blogcategories.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(12, 'view-blog-tag', 'Blog Tag Management', 'admin.blogtags.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(13, 'view-blog', 'Blog Management', 'admin.blogs.index', 1, NULL, '2018-10-25 01:30:42', NULL),
(14, 'view-faq', 'Faq Management', 'admin.faqs.index', 1, NULL, '2018-10-25 01:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Dashboard , 2 - Email , 3 - Both',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `user_id`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'User Logged In: Admin', 1, 1, 0, '2018-08-09 08:41:22', NULL),
(2, 'User Logged In: Admin', 1, 1, 0, '2018-08-09 09:03:31', NULL),
(3, 'User Logged In: Superadmin', 1, 1, 0, '2018-08-10 05:20:53', NULL),
(4, 'User Logged In: Admin', 1, 1, 0, '2018-08-10 10:12:24', NULL),
(5, 'User Logged In: Admin', 1, 1, 0, '2018-08-14 03:46:37', NULL),
(6, 'User Logged In: Superadmin', 1, 1, 0, '2018-08-16 04:11:50', NULL),
(7, 'User Logged In: Admin', 1, 1, 0, '2018-08-16 04:19:57', NULL),
(8, 'User Logged In: Superadmin', 1, 1, 0, '2018-08-16 07:16:33', NULL),
(9, 'User Logged In: Superadmin', 1, 1, 0, '2018-08-20 00:57:54', NULL),
(10, 'User Logged In: Superadmin', 1, 1, 0, '2018-08-23 00:20:52', NULL),
(11, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-05 02:02:44', NULL),
(12, 'User Logged In: Admin', 1, 1, 0, '2018-09-05 02:03:38', NULL),
(13, 'User Logged In: Admin', 1, 1, 0, '2018-09-05 03:10:20', NULL),
(14, 'User Logged In: Admin', 1, 1, 0, '2018-09-05 06:19:13', NULL),
(15, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-05 07:30:40', NULL),
(16, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-05 08:07:27', NULL),
(17, 'User Logged In: Admin', 1, 1, 0, '2018-09-06 05:43:01', NULL),
(18, 'User Logged In: Jane', 1, 1, 0, '2018-09-06 05:45:57', NULL),
(19, 'User Logged In: Admin', 1, 1, 0, '2018-09-06 07:49:05', NULL),
(20, 'User Logged In: Jane', 1, 1, 0, '2018-09-06 07:52:13', NULL),
(21, 'User Logged In: Admin', 1, 1, 0, '2018-09-06 08:02:40', NULL),
(22, 'User Logged In: Jane', 1, 1, 0, '2018-09-07 00:56:46', NULL),
(23, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-07 01:00:31', NULL),
(24, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-07 03:24:13', NULL),
(25, 'User Logged In: Admin', 1, 1, 0, '2018-09-07 03:24:22', NULL),
(26, 'User Logged In: Admin', 1, 1, 0, '2018-09-07 03:57:01', NULL),
(27, 'User Logged In: Jane', 1, 1, 0, '2018-09-07 03:57:10', NULL),
(28, 'User Logged In: Admin', 1, 1, 0, '2018-09-12 09:30:56', NULL),
(29, 'User Logged In: Jane', 1, 1, 0, '2018-09-12 09:32:03', NULL),
(30, 'User Logged In: Admin', 1, 1, 0, '2018-09-14 03:55:46', NULL),
(31, 'User Logged In: Admin', 1, 1, 0, '2018-09-14 04:09:32', NULL),
(32, 'User Logged In: Jane', 1, 1, 0, '2018-09-14 04:27:03', NULL),
(33, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-14 05:14:03', NULL),
(34, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-19 03:20:27', NULL),
(35, 'User Logged In: Admin', 1, 1, 0, '2018-09-19 03:24:08', NULL),
(36, 'User Logged In: Jane', 1, 1, 0, '2018-09-19 03:29:12', NULL),
(37, 'User Logged In: Sarah', 1, 1, 0, '2018-09-19 03:31:37', NULL),
(38, 'User Logged In: Jane', 1, 1, 0, '2018-09-19 03:40:06', NULL),
(39, 'User Logged In: Jane', 1, 1, 0, '2018-09-21 02:00:50', NULL),
(40, 'User Logged In: Admin', 1, 1, 0, '2018-09-21 02:01:06', NULL),
(41, 'User Logged In: Admin', 1, 1, 0, '2018-09-21 04:31:35', NULL),
(42, 'User Logged In: Admin', 1, 1, 0, '2018-09-21 04:50:11', NULL),
(43, 'User Logged In: Admin', 1, 1, 0, '2018-09-28 05:54:05', NULL),
(44, 'User Logged In: Superadmin', 1, 1, 0, '2018-09-28 05:55:02', NULL),
(45, 'User Logged In: Admin', 1, 1, 0, '2018-09-28 06:01:46', NULL),
(46, 'User Logged In: Admin', 1, 1, 0, '2018-09-28 06:09:02', NULL),
(47, 'User Logged In: Jane', 1, 1, 0, '2018-09-28 06:09:30', NULL),
(48, 'User Logged In: Jane', 1, 1, 0, '2018-09-28 09:07:24', NULL),
(49, 'User Logged In: Admin', 1, 1, 0, '2018-09-28 09:08:22', NULL),
(50, 'User Logged In: Franca', 1, 1, 0, '2018-09-28 09:59:33', NULL),
(51, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-05 04:22:26', NULL),
(52, 'User Logged In: Jane', 1, 1, 0, '2018-10-05 04:34:06', NULL),
(53, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-05 04:35:20', NULL),
(54, 'User Logged In: Admin', 1, 1, 0, '2018-10-05 07:05:28', NULL),
(55, 'User Logged In: Jane', 1, 1, 0, '2018-10-05 07:07:26', NULL),
(56, 'User Logged In: Admin', 1, 1, 0, '2018-10-09 07:49:37', NULL),
(57, 'User Logged In: Franca', 1, 1, 0, '2018-10-09 08:01:36', NULL),
(58, 'User Logged In: Franca', 1, 1, 0, '2018-10-09 08:09:29', NULL),
(59, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-10 07:51:20', NULL),
(60, 'User Logged In: Jane', 1, 1, 0, '2018-10-10 08:10:37', NULL),
(61, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-10 08:32:41', NULL),
(62, 'User Logged In: Jane', 1, 1, 0, '2018-10-10 08:33:03', NULL),
(63, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-10 08:33:27', NULL),
(64, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-11 01:03:23', NULL),
(65, 'User Logged In: Admin', 1, 1, 0, '2018-10-11 01:03:34', NULL),
(66, 'User Logged In: Admin', 1, 1, 0, '2018-10-15 02:41:43', NULL),
(67, 'User Logged In: Admin', 1, 1, 0, '2018-10-15 08:54:41', NULL),
(68, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-16 04:11:14', NULL),
(69, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-16 06:35:08', NULL),
(70, 'User Logged In: Admin', 1, 1, 0, '2018-10-16 07:26:23', NULL),
(71, 'User Logged In: Franca', 1, 1, 0, '2018-10-17 02:08:34', NULL),
(72, 'User Logged In: Franca', 1, 1, 0, '2018-10-17 02:29:46', NULL),
(73, 'User Logged In: Admin', 1, 1, 0, '2018-10-17 02:30:42', NULL),
(74, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-17 02:49:43', NULL),
(75, 'User Logged In: Admin', 1, 1, 0, '2018-10-17 04:00:46', NULL),
(76, 'User Logged In: Admin', 1, 1, 0, '2018-10-17 04:09:25', NULL),
(77, 'User Logged In: Franca', 1, 1, 0, '2018-10-17 04:10:27', NULL),
(78, 'User Logged In: Admin', 1, 1, 0, '2018-10-17 04:39:45', NULL),
(79, 'User Logged In: Admin', 1, 1, 0, '2018-10-18 11:46:00', NULL),
(80, 'User Logged In: Franca', 1, 1, 0, '2018-10-19 05:36:27', NULL),
(81, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-22 00:15:36', NULL),
(82, 'User Logged In: Admin', 1, 1, 0, '2018-10-22 08:16:41', NULL),
(83, 'User Logged In: Admin', 1, 1, 0, '2018-10-23 02:50:42', NULL),
(84, 'User Logged In: Admin', 1, 1, 0, '2018-10-23 08:08:11', NULL),
(85, 'User Logged In: Franca', 1, 1, 0, '2018-10-23 09:03:38', NULL),
(86, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-25 01:30:52', NULL),
(87, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-25 07:54:20', NULL),
(88, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-29 04:10:13', NULL),
(89, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-29 04:47:22', NULL),
(90, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-29 04:48:57', NULL),
(91, 'User Logged In: Admin', 1, 1, 0, '2018-10-29 04:51:40', NULL),
(92, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-29 07:44:09', NULL),
(93, 'User Logged In: Superadmin', 1, 1, 0, '2018-10-30 23:04:46', NULL),
(94, 'User Logged In: Admin', 1, 1, 0, '2018-11-01 08:10:56', NULL),
(95, 'User Logged In: Admin', 1, 1, 0, '2018-11-02 06:30:28', NULL),
(96, 'User Logged In: Michael', 1, 1, 0, '2018-11-02 07:12:01', NULL),
(97, 'User Logged In: Admin', 1, 1, 0, '2018-11-12 06:30:23', NULL),
(98, 'User Logged In: Admin', 1, 1, 0, '2018-11-14 11:57:34', NULL),
(99, 'User Logged In: Franca', 1, 1, 0, '2018-11-14 12:10:41', NULL),
(100, 'User Logged In: Admin', 1, 1, 0, '2018-11-17 07:34:45', NULL),
(101, 'User Logged In: Superadmin', 1, 1, 0, '2018-11-19 05:15:38', NULL),
(102, 'User Logged In: Mike', 1, 1, 0, '2018-11-19 05:33:08', NULL),
(103, 'User Logged In: Admin', 1, 1, 0, '2018-11-19 07:40:06', NULL),
(104, 'User Logged In: Admin', 1, 1, 0, '2018-11-20 04:13:07', NULL),
(105, 'User Logged In: Tom', 1, 1, 0, '2018-11-20 05:01:36', NULL),
(106, 'User Logged In: Admin', 1, 1, 0, '2018-11-20 08:32:13', NULL),
(107, 'User Logged In: Franca', 1, 1, 0, '2018-11-23 04:52:41', NULL),
(108, 'User Logged In: Admin', 1, 1, 0, '2018-11-27 02:50:50', NULL),
(109, 'User Logged In: Admin', 1, 1, 0, '2018-11-27 03:00:22', NULL),
(110, 'User Logged In: Mark', 1, 1, 0, '2018-11-27 03:19:38', NULL),
(111, 'User Logged In: Admin', 1, 1, 0, '2018-11-27 07:41:00', NULL),
(112, 'User Logged In: Mark', 1, 1, 0, '2018-11-27 07:47:31', NULL),
(113, 'User Logged In: Admin', 1, 1, 0, '2018-11-27 08:11:18', NULL),
(114, 'User Logged In: Admin', 1, 1, 0, '2018-11-29 05:12:30', NULL),
(115, 'User Logged In: Admin', 1, 1, 0, '2018-11-29 05:12:49', NULL),
(116, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-03 01:46:28', NULL),
(117, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-04 02:03:29', NULL),
(118, 'User Logged In: Mark', 1, 1, 0, '2018-12-04 02:49:39', NULL),
(119, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-04 08:24:32', NULL),
(120, 'User Logged In: Mark', 1, 1, 0, '2018-12-04 08:27:05', NULL),
(121, 'User Logged In: Franca', 1, 1, 0, '2018-12-05 08:59:37', NULL),
(122, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-10 01:40:47', NULL),
(123, 'User Logged In: Admin', 1, 1, 0, '2018-12-10 03:56:57', NULL),
(124, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-12 08:08:37', NULL),
(125, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-14 00:09:59', NULL),
(126, 'User Logged In: Admin', 1, 1, 0, '2018-12-14 00:11:53', NULL),
(127, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-14 00:18:57', NULL),
(128, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-14 03:17:59', NULL),
(129, 'User Logged In: Mark', 1, 1, 0, '2018-12-14 03:23:14', NULL),
(130, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-14 03:32:35', NULL),
(131, 'User Logged In: Superadmin', 1, 1, 0, '2018-12-14 03:57:05', NULL),
(132, 'User Logged In: Mark', 1, 1, 0, '2018-12-14 03:59:16', NULL),
(133, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-15 02:29:18', NULL),
(134, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-15 05:44:41', NULL),
(135, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-17 01:28:27', NULL),
(136, 'User Logged In: Sahil', 1, 1, 0, '2019-01-17 01:32:19', NULL),
(137, 'User Logged In: Tom', 1, 1, 0, '2019-01-17 02:13:31', NULL),
(138, 'User Logged In: Mark', 1, 1, 0, '2019-01-17 02:17:11', NULL),
(139, 'User Logged In: john', 1, 1, 0, '2019-01-17 02:32:33', NULL),
(140, 'User Logged In: john', 1, 1, 0, '2019-01-17 02:47:05', NULL),
(141, 'User Logged In: john', 1, 1, 0, '2019-01-17 03:46:08', NULL),
(142, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-17 04:28:03', NULL),
(143, 'User Logged In: john', 1, 1, 0, '2019-01-17 04:28:37', NULL),
(144, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-18 04:30:49', NULL),
(145, 'User Logged In: john', 1, 1, 0, '2019-01-18 04:31:25', NULL),
(146, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-18 04:42:53', NULL),
(147, 'User Logged In: john', 1, 1, 0, '2019-01-18 04:43:26', NULL),
(148, 'User Logged In: john', 1, 1, 0, '2019-01-18 04:46:58', NULL),
(149, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 00:18:57', NULL),
(150, 'User Logged In: Mark', 1, 1, 0, '2019-01-21 00:21:35', NULL),
(151, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 00:27:09', NULL),
(152, 'User Logged In: john', 1, 1, 0, '2019-01-21 00:28:09', NULL),
(153, 'User Logged In: john', 1, 1, 0, '2019-01-21 00:31:38', NULL),
(154, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 01:15:44', NULL),
(155, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 03:29:53', NULL),
(156, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 04:17:13', NULL),
(157, 'User Logged In: john', 1, 1, 0, '2019-01-21 04:29:00', NULL),
(158, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 08:17:33', NULL),
(159, 'User Logged In: Superadmin', 1, 1, 0, '2019-01-21 08:20:01', NULL),
(160, 'User Logged In: john', 1, 1, 0, '2019-01-21 08:20:32', NULL),
(161, 'User Logged In: john', 1, 1, 0, '2019-01-22 01:39:30', NULL),
(162, 'User Logged In: john', 1, 1, 0, '2019-01-22 01:41:33', NULL),
(163, 'User Logged In: john', 1, 1, 0, '2019-01-22 09:09:17', NULL),
(164, 'User Logged In: john', 1, 1, 0, '2019-01-30 04:31:48', NULL),
(165, 'User Logged In: john', 1, 1, 0, '2019-01-30 04:39:51', NULL),
(166, 'User Logged In: Superadmin', 1, 1, 0, '2019-03-14 00:59:13', NULL),
(167, 'User Logged In: john', 1, 1, 0, '2019-03-22 03:04:51', NULL),
(168, 'User Logged In: john', 1, 1, 0, '2019-03-26 09:18:36', NULL),
(169, 'User Logged In: Superadmin', 1, 1, 0, '2019-03-28 09:23:31', NULL),
(170, 'User Logged In: john', 1, 1, 0, '2019-03-28 09:25:05', NULL),
(171, 'User Logged In: john', 1, 1, 0, '2019-03-28 09:37:22', NULL),
(172, 'User Logged In: john', 1, 1, 0, '2019-04-01 08:24:44', NULL),
(173, 'User Logged In: Superadmin', 1, 1, 0, '2019-04-04 01:55:55', NULL),
(174, 'User Logged In: Superadmin', 1, 1, 0, '2019-04-04 02:00:19', NULL),
(175, 'User Logged In: Superadmin', 1, 1, 0, '2019-04-08 02:47:42', NULL),
(176, 'User Logged In: Superadmin', 1, 1, 0, '2019-04-08 03:17:25', NULL),
(177, 'User Logged In: Superadmin', 1, 1, 0, '2019-04-08 04:07:57', NULL),
(178, 'User Logged In: Superadmin', 1, 1, 0, '2019-05-22 20:40:25', NULL),
(179, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:14:07', NULL),
(180, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:18:21', NULL),
(181, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:19:24', NULL),
(182, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:23:29', NULL),
(183, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:25:26', NULL),
(184, 'User Logged In: chirag', 1, 1, 0, '2019-05-22 21:26:28', NULL),
(185, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 01:41:45', NULL),
(186, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 02:02:17', NULL),
(187, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 02:09:01', NULL),
(188, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 03:36:38', NULL),
(189, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 04:07:24', NULL),
(190, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 04:24:30', NULL),
(191, 'User Logged In: chirag', 1, 1, 0, '2019-05-25 04:46:44', NULL),
(192, 'User Logged In: chirag', 1, 1, 0, '2019-05-29 21:20:20', NULL),
(193, 'User Logged In: chirag', 1, 1, 0, '2019-05-29 23:56:15', NULL),
(194, 'User Logged In: chirag', 1, 1, 0, '2019-05-30 19:48:42', NULL),
(195, 'User Logged In: chirag', 1, 1, 0, '2019-05-31 00:43:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `page_slug`, `description`, `cannonical_link`, `seo_title`, `seo_keyword`, `seo_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Terms and conditions', 'terms-and-conditions', '<div class="col-12 col-md-9 content">\r\n\r\n        <p>The following terms and conditions were put together to help users better understand how their use of this website associated with the domain name bootstrapbay.com (the “Website”) will be governed.</p>\r\n\r\n        <p>The Website is owned and operated by Conacel Elena-Cristina PFA, an entity registered and functioning according to Romanian laws, with its headquarters in Cândești Village, Cândești commune, Buzău county, Romania, registered with the Trade Registry under no. F10/617/2017, fiscal identification code 38568939 (“Bootstrapbay”).</p><p>\r\n\r\n        </p><p>Your use and access of this Website indicates you understand and accept these Terms and Conditions. If you are unsure about the meaning and/or effects of any clause containted in these Terms and Conditions, please <a href="/contact-support" target="_blank">reach out to us</a>.</p>\r\n\r\n        <h4> 1. Ownership and Property Rights</h4>\r\n\r\n        <p>Using this Website does not grant you any ownership or interest in any content, visual interfaces, graphics, design, compilation, information, computer code, products, software, services and all other elements you may access from the Website.</p>\r\n\r\n        <p>You are authorized to download a single copy of purchased content contained on the website for your personal, non-commercial uses, provided that you maintain the copyright and other notices contained in that content. This excludes products available with premium licenses. Please consult our \r\nlicenses \r\npage for more information.</p>\r\n\r\n        <h4>2. Personal data about you</h4>\r\n\r\n        <p>In the course of your use of the Website, you may be asked for personally identifiable information (“Personal Data”) or such data may be collected from you indirectly, while you are using the Website. Our <a href="/privacy" target="_blank">Privacy Policy</a> provides the type of data we collect and process, for what purpose and for how long, as well as who can access such data (including third-parties) and how you can exercise your rights, according to provisions of European personal data laws in force. You are solely responsible for the accuracy and content of this user information. There are different types of personal data that is collected about you, based on your use of the Website as a visitor or a registered user.</p>\r\n\r\n        <h4>3. Third Party websites</h4>\r\n        <p>In the course of your use of the Website, you may be re-directed to third party websites. We have no responsibility for the content or information provided by or through third party websites even if they are affiliates of ours.</p>\r\n\r\n        <p>Linking to third party websites does not imply our endorsement of that web website. We disclaim any liability for links to another website.</p>\r\n\r\n        <h4>4. Creators’ liability</h4>\r\n\r\n        <p>The Website may contain content created by third-party designers, contracted by Bootstrapbay for this purpose. If you are such a third-party designer, you are liable to abide by, apart from these Terms and Conditions, the Data Processing Addendum made available by Bootstrapbay to you whenever you have signed an agreement for design creation with Bootstrapbay.</p>\r\n\r\n        <h4>5. Limitation of Liability</h4>\r\n\r\n        <p>\r\n            You agree to indemnify and hold harmless BootstrapBay and its parent, subsidiaries, affiliates or any related companies, licensors and suppliers, and their respective directors, officers, employees, agents, representatives, and contractors, from all damages, injuries, liabilities, costs, fees and expenses (including, but not limited to, legal and accounting fees) arising from or in any way related to:\r\n            </p><ul class="list-unstyled">\r\n                <li>(i) your use or misuse of the website (including your use or misuse of Third Party Content); </li>\r\n                <li>(ii) your breach or other violation of these Terms including any representations, warranties and covenants herein; </li>\r\n                <li>(iii) your violation of the rights of any other person or entity, including, but not limited to claims that any User Content infringes or violates any third party intellectual property rights.</li>\r\n            </ul>\r\n        <p></p>\r\n\r\n        <h4>6. Exclusion of Warranties</h4>\r\n\r\n        <p>The BootstrapBay content, or any other product, service or information provided by BootstrapBay, user content, third-party content, and any other software, services or applications made available in conjunction with or through the website, are provided on an "as is", "as available", "with all faults" basis without representations or warranties of any kind, either express, implied, or statutory, including, but not limited to, in terms of correctness, accuracy, reliability, or otherwise.</p>\r\n\r\n        <p>To the fullest extent permissible by applicable law, BootstrapBay hereby disclaims all warranties of any kind, either express or implied, including, any warranty of merchantability, fitness for a particular purpose, non-infringement, or arising from a course of dealing, with respect to the products or services provided by BootstrapBay.</p>\r\n\r\n        <h4>7. Notices</h4>\r\n\r\n        <p>BootstrapBay may provide you with notices by e-mail related to your activity and/or your account. Additionally, you may opt-in to receive a newsletter with updates about new products available in the Website. You can opt-out of our newsletter at any time, by following the steps described in the footer of any e-mail you receive from us as a result of you subscribing to the newsletter.</p>\r\n\r\n        <h4>8. Refunds</h4>\r\n\r\n        <p>Refunds will only be administered if products are deemed to be faulty or not as described on the product page. To request a refund, please \r\ncontact support \r\nand specify exactly what the issue is with the product. The support team will then investigate to determine whether or not the product was faulty and not as described.</p>\r\n\r\n        <p>Unfortunately, due to the nature of digital goods, refunds cannot be processed until it has been determined that the product is faulty.</p>\r\n\r\n        <h4>9. Governing Law</h4>\r\n\r\n        <p>This agreement, and any dispute, controversy, proceedings or claim of whatever nature arising out of or in any way relating to these Terms & Conditions or its formation shall be governed by and construed in accordance with Romanian law.</p>\r\n\r\n        <h4>10. Modification of the Terms</h4>\r\n\r\n        <p>BootstrapBay reserves the right to update or modify the Terms & Conditions at any time without prior notice, and such changes will be effective immediately upon being posted on the website. These Terms will identify the date of the last update. In the case of material changes to the Terms, BootstrapBay will make reasonable efforts to notify you of the change, such as through sending an email to any address you may have used to register for an account, through a pop-up window on the website, or other similar mechanism.</p>\r\n\r\n        <p>These terms were last updated on July 30, 2018.</p>\r\n\r\n    </div>', NULL, NULL, NULL, NULL, 1, 1, 1, '2018-12-14 03:16:35', '2019-05-25 04:28:00', '2019-05-25 04:28:00'),
(2, 'Disclaimer', 'disclaimer', '<p>Disclaimer</p><ol type="a">\n    <li>The materials on Bootstrapious website are provided on an as is basis. Bootstrapious makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>\n    <li>Further, Bootstrapious does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>\n</ol>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-12-14 03:16:35', '2019-05-25 02:09:30', '2019-05-25 02:09:30'),
(3, 'Terms of service', 'terms_of_service', '<p align="justify">Neurofeedback Training (NFT), sometimes referred to as EEG biofeedback, is being offered to me (or my child) as a form of treatment that offers potential benefits in the area of difficulty for which I/we are seeking help.</p>\n<p align="justify"><strong>WHAT IS NEUROFEEDBACK TRAINING (NFT)?</strong></p>\n<p align="justify">NFT is a non-medical, general training that takes advantage of the brain&rsquo;\ns ability to self-regulate. Non-invasive sensors called &lsquo;\nelectrodes&rsquo;\n are placed on specific sites on the surface of the head using an EEG cap. The sensors enable brain activity patterns to be picked up and displayed on a computer screen. The techniques used to attach the electrodes have been used at clinics and research institutions all over the world for many years and no deleterious side effects have been reported. It is a universally used procedure for the recording of EEG, and a necessary tool for the evaluation of brain function in various parts of the brain. The computer produces feedback about whether brain activity is desirable or not. The feedback allows the brain to learn to produce more efficient patterns more frequently.</p>\n<p align="justify">I understand that NFT requires the placement of surface electrodes on my scalp and conductive gel used for the purpose of recording my EEG and uses this signal to provide feedback in the form of video display or games. While there are few risks associated with this procedure, there is a remote possibility of skin irritation from the electrode gel that is used to attach electrodes. I understand that I can ask to have the electrodes removed at any time if I so desire. There is no risk of electric shock from this procedure.</p>\n<p align="justify">I have been informed that, although there is a growing research evidence base for the efficacy of NFT, it is still considered an experimental treatment in some contexts. The extent to which any benefits will be obtained or will be long-lasting is not fully proven. NFT often produces very beneficial and lasting changes; however, sometimes this may not be the case. We generally expect a positive response within the first 12 sessions, if there is to be one. If no improvement is achieved in that time, we can then discuss suspending treatment.</p>\n<p align="justify">In the majority of cases where there is improvement in function, it then becomes the client&rsquo;s own responsibility to monitor progress and to continue training as long as it is perceived to be of benefit. <strong>While there are often improvements in the first few sessions, NFT usually requires at least 15-20 sessions with a small number of follow-up reinforcement sessions for lasting change to take place.</strong></p>\n<p align="justify"><strong>LIMITATIONS OF TRAINING AND POTENTIAL RISKS</strong></p>\n<p align="justify">It is important to understand that a NFT assessment is NOT the same as a &ldquo;\nclinical EEG&rdquo;\n. NFT is not designed, and we do not try, to use it to diagnose medical conditions.</p>\n<p align="justify">In terms of the NFT itself, only rarely have significant side effects been reported. Occasionally someone may feel tired, spacey, anxious, experience a headache, have difficulty falling asleep, or feel agitated or irritable. <strong>In some instances, it has been reported that symptoms have gotten worse before they get better. This is to be expected in some cases, and we appreciate your patience as you work through these issues. </strong>Many of these feelings are transient and pass within a short time following the training session. If they do not, you should report this at your next session.</p>\n<p align="justify">You may feel an increased need to sleep during the first few weeks of training. This can be due to a variety of factors, but in general is considered to be normal and a sign that the brain is renormalising between sessions. Please make allowances for the increased need to sleep.</p>\n<p align="justify"><strong>MEDICATIONS AND CONSULTATION WITH YOUR PHYSICIAN</strong></p>\n<p align="justify">NFT may affect medications and/or change the dosage requirements for some medications. Therefore, it is very important that the physician monitoring your medication be made aware that you are using NFT. <strong>Do not stop or alter your medications without consulting with your physician</strong>. I accept that it is my responsibility to inform my GP/other health care provider and Dr. Michael Keane regarding changes in symptoms or development of new symptoms. NFT is not a substitute for effective standard medical treatment.</p>\n<p align="justify">NFT can substantially affect your glucose level as your brain works very hard when you train. Please have a meal or snack before coming to appointments, and let us know if you are diabetic or hypoglycaemic. You may find that you are hungry after sessions, so please allow time to have a snack if required. In addition <u><strong>it is very important for us to know if you have or have ever had epileptic seizures</strong></u><strong>.</strong></p>\n<p align="justify"><strong>CONFIDENTIALITY</strong></p>\n<p align="justify">Information shared in sessions is kept confidential and will not be disclosed without your written permission, except in cases of:</p>\n<p align="justify">1) Situations in which you are deemed to be a danger to yourself or others (i.e. threats of homicide or suicide) and</p>\n<p align="justify">2) Situations in which children are endangered or have been abused.</p>\n<p align="justify"><strong>FEES AND MISSED APPOINTMENTS</strong></p>\n<p align="justify">Sessions are typically scheduled for at least once a week, but generally twice a week where possible, and are billed at &euro;\n120 per session. Payment is due at time of service. Clients will be charged &euro;\n40 for cancellations not made more than 24 hours in advance. Exceptions to this policy will be considered on a case by case basis.</p>\n<p align="justify"><strong>VOLUNTARY PARTICIPATION AND CONSENT TO EEG NEUROFEEDBACK</strong></p>\n<p align="justify">I voluntarily, knowingly, and willingly give my consent to the use of NFT. I understand the principles set forth here with regard to benefits and risks of NFT, medication effects, expectations as to length of training, policies regarding payment and missed appointments. Furthermore, by signing this form I waive any claim of damages due to NFT, including claimed side effects, or the failure to see changes during training.</p>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-12-14 03:16:35', '2019-05-25 02:09:34', '2019-05-25 02:09:34'),
(4, 'Research Activity', 'research', '<p align="justify">At the Actualise Neurofeedback Training Clinic, we may store data for potential future research projects. All data entered into this store is anonymised, so that it cannot be linked to the client from whom the data came. As such, data will never be identifiable &ndash; identity is protected at all times.</p>\n<p align="justify">Furthermore, any research projects which we will carry out will be subject to full ethical approval from the Dublin City University Research Ethics Committee.</p>\n<p align="justify">If you are happy to have your data included in this data store, please tick the box below and print and sign your name. <strong>Remember, you are under no obligation to do so. Your decision in no way affects the services provided to you at the clinic.</strong></p>\n<p align="justify"><br /><br /></p>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-12-14 03:16:35', '2019-05-25 02:09:19', '2019-05-25 02:09:19'),
(5, 'GDPR', 'gdpr', '<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Actualise Psychological Services collects and processes sensitive, healthcare related personal data on the basis of your explicit consent, and in order to form an opinion about, and/or to diagnose your presenting condition. Your personal data will not be used for any other purpose. </span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your data will be processed in a fair manner and retained by Actualise Psychological Services for a period of 7 years after your last attendance. &nbsp;\nYour data will be stored securely and protected during this time as set out in our Data Protection Policy which is available to you if you wish to have it.</span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your personal data may be shared with the person who referred you to us, with your family doctor (GP), with a medical consultant or other specialist practitioners. &nbsp;\nOther examples of people with whom your data may be shared, subject to your prior agreement, include your Legal Advisors, employers, Insurers, team/club medical staff and management in order to facilitate your return to normal activities. Your data will not be shared with any other third party outside of the Clinic without getting your permission to do so. </span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your data will not be subjected to automated processing by this clinic. &nbsp;\n</span></span></p>\n<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">You have a number of rights in relation to your personal data held at this clinic. These include</span></span></p>\n<ol type="a">\n<ul type="a">\n<li>the right to request from us<span style="font-family: Calibri, serif;"> access to and rectification or erasure of your personal data,</span></li>\n</ul>\n</ol>\n<ol type="a">\n<ul type="a">\n<li>the right to restrict processing, object to processing as well as in certain circumstances the right to data portability</li>\n</ul>\n</ol>\n<ol type="a">\n<ul type="a">\n<li>the right to withdraw your consent for the processing of your data (in certain circumstances) at any time which will not affect the lawfulness of the processing before your consent was withdrawn.</li>\n</ul>\n</ol>\n<ol type="a">\n<ul type="a">\n<li>the right to lodge a complaint to the Data Commissioner&rsquo;\ns Office if you believe that we have not complied with the requirements of the GDPR or DPA&nbsp;\nwith regard to your personal data.</li>\n</ul>\n</ol>\n<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">The Data Controller and the Data Protection Officer is the Clinic Manager, Dr. Michael Keane</span></span></p>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-12-14 03:16:35', '2019-05-25 02:09:11', '2019-05-25 02:09:11'),
(6, 'Privacy Policy', 'privacy-policy', '<h1><strong>Privacy Policy</strong></h1>\r\n<p>Your use and access of this Website indicates you understand and accept these Terms and Conditions. If you are unsure about the meaning and/or effects of any clause containted in these Terms and Conditions,&nbsp;</p>\r\n<h4>1. Ownership and Property Rights</h4>\r\n<p>Using this Website does not grant you any ownership or interest in any content, visual interfaces, graphics, design, compilation, information, computer code, products, software, services and all other elements you may access from the Website.</p>\r\n<p>You are authorized to download a single copy of purchased content contained on the website for your personal, non-commercial uses, provided that you maintain the copyright and other notices contained in that content. This excludes products available with premium licenses. Please consult our&nbsp;<br />licenses&nbsp;<br />page for more information.</p>\r\n<h4>2. Personal data about you</h4>\r\n<p>In the course of your use of the Website, you may be asked for personally identifiable information (&ldquo;Personal Data&rdquo;) or such data may be collected from you indirectly, while you are using the Website. provides the type of data we collect and process, for what purpose and for how long, as well as who can access such data (including third-parties) and how you can exercise your rights, according to provisions of European personal data laws in force. You are solely responsible for the accuracy and content of this user information. There are different types of personal data that is collected about you, based on your use of the Website as a visitor or a registered user.</p>\r\n<h4>3. Third Party websites</h4>\r\n<p>&nbsp;</p>\r\n<p>In the course of your use of the Website, you may be re-directed to third party websites. We have no responsibility for the content or information provided by or through third party websites even if they are affiliates of ours.</p>\r\n<p>Linking to third party websites does not imply our endorsement of that web website. We disclaim any liability for links to another website.</p>\r\n<h4>4. Creators&rsquo; liability</h4>\r\n<p>The Website may contain content created by third-party designers, contracted by Bootstrapbay for this purpose. If you are such a third-party designer, you are liable to abide by, apart from these Terms and Conditions, the Data Processing Addendum made available by Bootstrapbay to you whenever you have signed an agreement for design creation with Bootstrapbay.</p>\r\n<h4>5. Limitation of Liability</h4>\r\n<p><br />You agree to indemnify and hold harmless BootstrapBay and its parent, subsidiaries, affiliates or any related companies, licensors and suppliers, and their respective directors, officers, employees, agents, representatives, and contractors, from all damages, injuries, liabilities, costs, fees and expenses (including, but not limited to, legal and accounting fees) arising from or in any way related to:</p>\r\n<p>&nbsp;</p>\r\n<ul class="list-unstyled">\r\n<ul class="list-unstyled">\r\n<li>(i) your use or misuse of the website (including your use or misuse of Third Party Content);</li>\r\n</ul>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul class="list-unstyled">\r\n<ul class="list-unstyled">\r\n<li>(ii) your breach or other violation of these Terms including any representations, warranties and covenants herein;</li>\r\n</ul>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul class="list-unstyled">\r\n<ul class="list-unstyled">\r\n<li>(iii) your violation of the rights of any other person or entity, including, but not limited to claims that any User Content infringes or violates any third party intellectual property rights.</li>\r\n</ul>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h4>6. Exclusion of Warranties</h4>\r\n<p>The BootstrapBay content, or any other product, service or information provided by BootstrapBay, user content, third-party content, and any other software, services or applications made available in conjunction with or through the website, are provided on an "as is", "as available", "with all faults" basis without representations or warranties of any kind, either express, implied, or statutory, including, but not limited to, in terms of correctness, accuracy, reliability, or otherwise.</p>\r\n<p>To the fullest extent permissible by applicable law, BootstrapBay hereby disclaims all warranties of any kind, either express or implied, including, any warranty of merchantability, fitness for a particular purpose, non-infringement, or arising from a course of dealing, with respect to the products or services provided by BootstrapBay.</p>\r\n<h4>7. Notices</h4>\r\n<p>BootstrapBay may provide you with notices by e-mail related to your activity and/or your account. Additionally, you may opt-in to receive a newsletter with updates about new products available in the Website. You can opt-out of our newsletter at any time, by following the steps described in the footer of any e-mail you receive from us as a result of you subscribing to the newsletter.</p>\r\n<h4>8. Refunds</h4>\r\n<p>Refunds will only be administered if products are deemed to be faulty or not as described on the product page. To request a refund, please&nbsp;<br />contact support&nbsp;<br />and specify exactly what the issue is with the product. The support team will then investigate to determine whether or not the product was faulty and not as described.</p>\r\n<p>Unfortunately, due to the nature of digital goods, refunds cannot be processed until it has been determined that the product is faulty.</p>\r\n<h4>9. Governing Law</h4>\r\n<p>This agreement, and any dispute, controversy, proceedings or claim of whatever nature arising out of or in any way relating to these Terms &amp; Conditions or its formation shall be governed by and construed in accordance with Romanian law.</p>\r\n<h4>10. Modification of the Terms</h4>\r\n<p>BootstrapBay reserves the right to update or modify the Terms &amp; Conditions at any time without prior notice, and such changes will be effective immediately upon being posted on the website. These Terms will identify the date of the last update. In the case of material changes to the Terms, BootstrapBay will make reasonable efforts to notify you of the change, such as through sending an email to any address you may have used to register for an account, through a pop-up window on the website, or other similar mechanism.</p>\r\n<p>These terms were last updated on July 30, 2018.</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, 1, 1, 1, '2019-04-08 02:49:09', '2019-05-25 02:09:23', '2019-05-25 02:09:23'),
(7, 'about_us', 'about-us', '<section class="about-seaction">\r\n  <div class="container">\r\n        <div class="row">\r\n          <div class="about-b-content col-md-12">\r\n            <h2>About Us</h2>\r\n            <div class="social-icons">share\r\n              <a href="#"><i class="fab fa-facebook-f"></i></a>\r\n              <a href="#"><i class="fab fa-twitter"></i></a>\r\n            </div>\r\n\r\n            <p>Stones by Rander is a place where people come to create gorgeous and luxurious environments for themselves and their loved ones. Whether it’s a house or an office, a gallery or a banquet room, we believe all our spaces reflect who we really are. We want to make incredibly exotic surface materials and stylish made to order products for interiors and construction accessible for everyone. Our mission is to enrich your homes with the highest quality products coupled with best value and service in the industry.  Being a family owned business we undertake long-term relationships with all our clients. Our goal is for our customers to have fun and have a great experience while making their dreams a reality.</p>\r\n          </div>\r\n\r\n        </div>\r\n\r\n\r\n      <div class="row mb-4 about-data-wrapper">\r\n        <div class="col bg">\r\n          <h3>Everything started in British ruled India</h3>\r\n          <p>In 1940, while India was fighting for freedom, Mr. Aziz Rander was a mineworker in the princely state of Rajasthan, a stone rich Indian state. After years of hard work, desire and planning, he managed to open a rather humble shop called “Rander Marbles”. With the mission to make accessible high quality surfaces & blocks at affordable prices to everyone, he soon made a name for himself locally.</p>\r\n        </div>\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img1.jpg" class="w-100" >\r\n        </div>\r\n      </div>\r\n\r\n      <div class="row mb-4 about-data-wrapper">\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img2.jpg" class="w-100" >\r\n        </div>\r\n        <div class="col bg">\r\n          <h3>We started getting involved in our client’s projects</h3>\r\n          <p>In 1970, Mr. Shoqat Rander took over the family business that already had a strong foundation from which to grow. He wanted the company to get more involved and help customers create beautiful spaces. He studied hard and honed his skills and created an installation company and named it Rander Marble Finishes in 1980. <br>\r\nIn the following decades, the company gained reputation with interior designers and architects for our excellent services. Among our more than 50+ recurring customers, there were famed businesses like Hinduja Group and Growel India.</p>\r\n        </div>\r\n      </div>\r\n\r\n\r\n      <div class="row mb-4 about-data-wrapper">\r\n        <div class="col bg">\r\n          <h3>Shoqat’s quest for quality</h3>\r\n          <p>We were proud of our reputation for delivering high quality product and services, and Mr. Shoqat wanted more. In the 90’s, he seized the impulse that was pushing the organization forward, and so with the intention of improving their customer service and product quality, Mr. Shoqat Rander made significant investments in marble & sandstone quarries. This one swift move gave us more operational control and allowed us to exclusively work with some materials of the highest quality.</p>\r\n        </div>\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img3.jpg" class="w-100" >\r\n        </div>\r\n      </div>\r\n\r\n      <div class="row mb-4 about-data-wrapper">\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img4.jpg" class="w-100" >\r\n        </div>\r\n        <div class="col bg">\r\n          <h3>The third generation took over</h3>\r\n          <p>Aabid Rander unified the family owned business under a single brand and called it Stones by Rander in 2011. The second successor to the family business graduated from Eckerd College, St. Petersburg, Florida with a degree in Management and from IADT, Tampa, Florida with a degree in Interior Design. He had the pleasure of assisting James Rixner, a famed New York City interior designer and also working with Gal Nauer of GNArchitects on the remodeling project of the historical The <br> Plaza Hotel, New York in 2007. His years of education and exposure abroad learning about famous architects and interior designers, visiting museums & galleries and places such as DCOTA, FL & D&D, NY gave Aabid a deeper insight into the world of design and architecture.</p>\r\n        </div>\r\n      </div>\r\n\r\n\r\n      <div class="row mb-4 about-data-wrapper">\r\n        <div class="col bg">\r\n          <h3>International success</h3>\r\n          <p>Aabid took the company to another level and Stones by Rander started offering luxury surfaces and stylish custom made products for interior design projects. The company started collaborating with high-end interior designers and project management companies on premium projects around the world. <br>\r\nThrough various luxurious residential and hospitality projects, the company started serving clients such as Hilton Group, Taj Group of hotels, and many more in India, Italy, Romania, Tunisia, Saudi Arabia, Turkey and United States.</p>\r\n        </div>\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img5.jpg" class="w-100" >\r\n        </div>\r\n      </div>\r\n\r\n      <div class="row mb-5 about-data-wrapper">\r\n        <div class="col">\r\n          <img src="http://127.0.0.1:8000/css/project/images/about-block-img6.jpg" class="w-100" >\r\n        </div>\r\n        <div class="col bg">\r\n          <h3>Great comfort and extravagant designs</h3>\r\n          <p> The Randers’ expertise in the area has been growing throughout three generations. They have optimized processes, included new technology, diversified their range of products and fields of operation and more importantly promoted human labor in workforce rich India. <br>\r\nAlways a visionary, Aabid Rander saw an opportunity and opened a new furniture-manufacturing unit in 2018 to blend their exotic surface materials with kitchen cabinetry and exclusive furniture pieces and home accessories. This move allowed the company more control over the production process and in helping their clients transform the ordinary into extra ordinary.</p>\r\n        </div>\r\n      </div>\r\n\r\n      <div class="text-center ml-4 mr-4">\r\n        <p>Stone by Randers has now more than 100 employees, and since day one, we have maintained values of cooperation and social commitment.\r\n  We condemn child labor and promote healthy and safe environments for our collaborators. Our employees are a key factor in our success.\r\n  Quality is our business plan, customer satisfaction is our goal, and innovation and teamwork is the path we choose every day. <p>\r\n      <p class="text-uppercase">Are you ready to bring your vision to life?</p>\r\n      <a href="#">Learn about Stones by Rander’s collections <i class="fas fa-chevron-right"></i><a>\r\n      </div>\r\n\r\n  </div>\r\n<section>', NULL, NULL, NULL, NULL, 0, 1, 1, '2019-05-25 02:42:00', '2019-05-25 04:44:54', NULL),
(8, 'collection', 'collection', '<section class="about-seaction">\r\n<h1><b>Comming Soon</b></h1>\r\n<selection/>', NULL, NULL, NULL, NULL, 0, 1, 1, '2019-05-25 04:47:16', '2019-05-25 05:01:29', NULL),
(9, 'production', 'production', '<section class="about-seaction">\r\n<h1><b>Comming Soon</b></h1>\r\n<selection/>', NULL, NULL, NULL, NULL, 0, 1, 1, '2019-05-25 04:48:54', '2019-05-25 05:02:42', NULL),
(10, 'stone_talk', 'stone-talk', '<section class="about-seaction">\r\n<h1><b>Comming Soon</b></h1>\r\n<selection/>', NULL, NULL, NULL, NULL, 0, 1, 1, '2019-05-25 04:49:19', '2019-05-25 05:02:53', NULL),
(11, 'contact', 'contact', '<section class="about-seaction">\r\n<h1><b>Comming Soon</b></h1>\r\n<selection/>', NULL, NULL, NULL, NULL, 0, 1, 1, '2019-05-25 04:49:47', '2019-05-25 05:03:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'view-backend', 'View Backend', 1, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(2, 'view-frontend', 'View Frontend', 2, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', '2018-10-25 01:30:40'),
(3, 'view-access-management', 'View Access Management', 3, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(4, 'view-user-management', 'View User Management', 4, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(5, 'view-active-user', 'View Active User', 5, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(6, 'view-deactive-user', 'View Deactive User', 6, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(7, 'view-deleted-user', 'View Deleted User', 7, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(8, 'show-user', 'Show User Details', 8, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(9, 'create-user', 'Create User', 9, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(10, 'edit-user', 'Edit User', 9, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(11, 'delete-user', 'Delete User', 10, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(12, 'activate-user', 'Activate User', 11, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(13, 'deactivate-user', 'Deactivate User', 12, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(14, 'login-as-user', 'Login As User', 13, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', '2018-10-25 01:30:40'),
(15, 'clear-user-session', 'Clear User Session', 14, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', '2018-10-25 01:30:40'),
(16, 'view-role-management', 'View Role Management', 15, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', '2018-10-25 01:30:40'),
(17, 'create-role', 'Create Role', 16, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(18, 'edit-role', 'Edit Role', 17, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(19, 'delete-role', 'Delete Role', 18, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(20, 'view-permission-management', 'View Permission Management', 19, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(21, 'create-permission', 'Create Permission', 20, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(22, 'edit-permission', 'Edit Permission', 21, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(23, 'delete-permission', 'Delete Permission', 22, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(24, 'view-page', 'View Page', 23, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(25, 'create-page', 'Create Page', 24, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(26, 'edit-page', 'Edit Page', 25, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(27, 'delete-page', 'Delete Page', 26, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(28, 'view-email-template', 'View Email Templates', 27, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(29, 'create-email-template', 'Create Email Templates', 28, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(30, 'edit-email-template', 'Edit Email Templates', 29, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(31, 'delete-email-template', 'Delete Email Templates', 30, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(32, 'edit-settings', 'Edit Settings', 31, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(33, 'view-blog-category', 'View Blog Categories Management', 32, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(34, 'create-blog-category', 'Create Blog Category', 33, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(35, 'edit-blog-category', 'Edit Blog Category', 34, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(36, 'delete-blog-category', 'Delete Blog Category', 35, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(37, 'view-blog-tag', 'View Blog Tags Management', 36, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(38, 'create-blog-tag', 'Create Blog Tag', 37, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(39, 'edit-blog-tag', 'Edit Blog Tag', 38, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(40, 'delete-blog-tag', 'Delete Blog Tag', 39, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(41, 'view-blog', 'View Blogs Management', 40, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(42, 'create-blog', 'Create Blog', 41, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(43, 'edit-blog', 'Edit Blog', 42, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(44, 'delete-blog', 'Delete Blog', 43, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(45, 'view-faq', 'View FAQ Management', 44, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(46, 'create-faq', 'Create FAQ', 45, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(47, 'edit-faq', 'Edit FAQ', 46, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(48, 'delete-faq', 'Delete FAQ', 47, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', '2018-10-25 01:30:41'),
(49, 'manage-client', 'Clients', 48, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(50, 'create-client', 'Create Client', 49, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(51, 'edit-client', 'Edit Client', 50, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(52, 'delete-client', 'Delete Client', 53, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(53, 'manage-managesession', 'Sessions', 54, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(54, 'create-managesession', 'Create Session', 55, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(55, 'edit-managesession', 'Edit Session', 57, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(56, 'delete-managesession', 'Delete Session', 59, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(57, 'manage-clinicalservice', 'Clinic Services', 60, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(58, 'create-clinicalservice', 'Create Clinic Service', 61, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(59, 'edit-clinicalservice', 'Edit Clinic Service', 62, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(60, 'manage-psycologicalconditiontype', 'Psychological Conditions', 63, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(61, 'create-psycologicalconditiontype', 'Create Psychological Condition', 64, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(62, 'edit-psycologicalconditiontype', 'Edit Psychological Condition', 65, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(63, 'create-knowledgebase', 'Create Knowledge Base', 66, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(64, 'edit-knowledgebase', 'Edit Knowledge Base', 68, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(65, 'delete-knowledgebase', 'Delete Knowledge Base', 70, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(66, 'manage-knowledgebase', 'Knowledge Bases', 71, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(67, 'change-password', 'Change Password', 72, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(68, 'manage-feedback', 'Feedbacks', 73, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(69, 'manage-questionbank', 'Question Bank', 60, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(70, 'create-questionbank', 'Create Question', 61, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(71, 'edit-questionbank', 'Edit Question', 62, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(72, 'delete-questionbank', 'Delete Question', 63, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(73, 'manage-testimonial', 'Testimonials', 75, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(74, 'view-report-permission', 'Reports', 76, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(75, 'intervention-report', 'Intervention', 77, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(76, 'progress-report', 'Goal Progress', 78, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(77, 'threshold-report', 'Threshold Progress', 78, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(78, 'sdq-report', 'SDQ Status', 78, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(79, 'scared-report', 'SCARED Status', 78, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(80, 'core-report', 'CORE Status', 78, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(81, 'view-masters', 'Master Management', 4, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(82, 'manage-questiontype', 'Manage Question Type', 79, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(83, 'create-questiontype', 'Create Question Type', 80, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL),
(84, 'edit-questiontype', 'Edit Question Type', 81, 1, 1, NULL, '2018-10-25 01:30:41', '2018-10-25 01:30:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 4, 2),
(4, 5, 2),
(5, 6, 2),
(6, 7, 2),
(7, 8, 2),
(8, 9, 2),
(9, 10, 2),
(10, 11, 2),
(11, 12, 2),
(12, 13, 2),
(13, 14, 2),
(14, 67, 2),
(15, 49, 2),
(16, 50, 2),
(17, 51, 2),
(18, 52, 2),
(19, 53, 2),
(20, 54, 2),
(21, 55, 2),
(22, 56, 2),
(23, 57, 2),
(24, 58, 2),
(25, 59, 2),
(26, 60, 2),
(27, 61, 2),
(28, 62, 2),
(29, 63, 2),
(30, 64, 2),
(31, 65, 2),
(32, 66, 2),
(33, 68, 2),
(34, 69, 2),
(35, 70, 2),
(36, 71, 2),
(37, 72, 2),
(38, 73, 2),
(39, 74, 2),
(40, 75, 2),
(41, 76, 2),
(42, 77, 2),
(43, 78, 2),
(44, 79, 2),
(45, 80, 2),
(46, 81, 2),
(47, 82, 2),
(48, 83, 2),
(49, 84, 2),
(50, 2, 3),
(51, 70, 3),
(52, 1, 4),
(53, 67, 4),
(54, 53, 4),
(55, 66, 4),
(56, 68, 4),
(57, 73, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`) VALUES
(46, 2, 3),
(47, 70, 3),
(48, 1, 4),
(49, 67, 4),
(50, 53, 4),
(51, 66, 4),
(52, 68, 4),
(53, 73, 4),
(54, 1, 7),
(55, 67, 7),
(56, 53, 7),
(57, 66, 7),
(58, 68, 7),
(59, 73, 7),
(60, 1, 8),
(61, 67, 8),
(62, 53, 8),
(63, 66, 8),
(64, 68, 8),
(65, 73, 8),
(78, 14, 2),
(115, 1, 9),
(116, 3, 9),
(117, 4, 9),
(118, 5, 9),
(119, 6, 9),
(120, 7, 9),
(121, 8, 9),
(122, 9, 9),
(123, 10, 9),
(124, 11, 9),
(125, 12, 9),
(126, 13, 9),
(127, 14, 9),
(128, 15, 9),
(129, 16, 9),
(130, 17, 9),
(131, 18, 9),
(132, 19, 9),
(133, 20, 9),
(134, 21, 9),
(135, 22, 9),
(136, 23, 9),
(137, 24, 9),
(138, 25, 9),
(139, 26, 9),
(140, 27, 9),
(141, 28, 9),
(142, 29, 9),
(143, 30, 9),
(144, 31, 9),
(145, 32, 9),
(146, 33, 9),
(147, 34, 9),
(148, 35, 9),
(149, 36, 9),
(150, 37, 9),
(151, 38, 9),
(152, 39, 9),
(153, 40, 9),
(154, 41, 9),
(155, 42, 9),
(156, 43, 9),
(157, 44, 9),
(158, 45, 9),
(159, 46, 9),
(160, 47, 9),
(161, 48, 9),
(162, 49, 9),
(163, 50, 9),
(164, 51, 9),
(165, 52, 9),
(166, 53, 9),
(167, 54, 9),
(168, 55, 9),
(169, 56, 9),
(170, 57, 9),
(171, 58, 9),
(172, 59, 9),
(173, 60, 9),
(174, 61, 9),
(175, 62, 9),
(176, 63, 9),
(177, 64, 9),
(178, 65, 9),
(179, 66, 9),
(180, 67, 9),
(181, 68, 9),
(182, 69, 9),
(183, 70, 9),
(184, 71, 9),
(185, 72, 9),
(186, 73, 9),
(187, 74, 9),
(188, 75, 9),
(189, 76, 9),
(190, 77, 9),
(191, 78, 9),
(192, 79, 9),
(193, 80, 9),
(194, 81, 9),
(195, 82, 9),
(196, 83, 9),
(197, 84, 9),
(198, 1, 10),
(199, 67, 10),
(200, 53, 10),
(201, 66, 10),
(202, 68, 10),
(203, 73, 10),
(204, 1, 2),
(205, 3, 2),
(206, 4, 2),
(207, 5, 2),
(208, 6, 2),
(209, 7, 2),
(210, 8, 2),
(211, 9, 2),
(212, 10, 2),
(213, 11, 2),
(214, 12, 2),
(215, 13, 2),
(216, 49, 2),
(217, 50, 2),
(218, 51, 2),
(219, 52, 2),
(220, 53, 2),
(221, 54, 2),
(222, 55, 2),
(223, 56, 2),
(224, 57, 2),
(225, 58, 2),
(226, 59, 2),
(227, 60, 2),
(228, 61, 2),
(229, 62, 2),
(230, 63, 2),
(231, 64, 2),
(232, 65, 2),
(233, 66, 2),
(234, 67, 2),
(235, 68, 2),
(236, 69, 2),
(237, 70, 2),
(238, 71, 2),
(239, 72, 2),
(240, 73, 2),
(241, 74, 2),
(242, 75, 2),
(243, 76, 2),
(244, 77, 2),
(245, 78, 2),
(246, 79, 2),
(247, 80, 2),
(248, 81, 2),
(249, 82, 2),
(250, 83, 2),
(251, 84, 2),
(252, 1, 13),
(253, 67, 13),
(254, 53, 13),
(255, 66, 13),
(256, 68, 13),
(257, 73, 13),
(258, 1, 16),
(259, 67, 16),
(260, 53, 16),
(261, 66, 16),
(262, 68, 16),
(263, 73, 16),
(264, 1, 17),
(265, 67, 17),
(266, 53, 17),
(267, 66, 17),
(268, 68, 17),
(269, 73, 17),
(270, 1, 18),
(271, 67, 18),
(272, 53, 18),
(273, 66, 18),
(274, 68, 18),
(275, 73, 18),
(276, 1, 19),
(277, 67, 19),
(278, 53, 19),
(279, 66, 19),
(280, 68, 19),
(281, 73, 19),
(282, 1, 20),
(283, 67, 20),
(284, 53, 20),
(285, 66, 20),
(286, 68, 20),
(287, 73, 20),
(288, 1, 22),
(289, 67, 22),
(290, 53, 22),
(291, 66, 22),
(292, 68, 22),
(293, 73, 22);

-- --------------------------------------------------------

--
-- Table structure for table `psycological_types`
--

CREATE TABLE `psycological_types` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psycological_types`
--

INSERT INTO `psycological_types` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Anxiety', 1, 0, NULL, NULL, NULL),
(2, 'Panic Disorder', 1, 0, NULL, NULL, NULL),
(3, 'Depression', 1, 0, NULL, NULL, NULL),
(4, 'Learning Issues', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  `behaviour_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Foreign Key of Behaviour table',
  `question` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type_id`, `behaviour_id`, `question`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'Sadness', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(2, 1, 0, 'Pessimism', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(3, 1, 0, 'Past Failure', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(4, 1, 0, 'Loss of Pleasure', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(5, 1, 0, 'Guilty Feelings', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(6, 1, 0, 'Punishmnet Feelings', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(7, 1, 0, 'Self-Dislike', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(8, 1, 0, 'Self-Criticalness', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(9, 1, 0, 'Suicidal Thoughts or Wishes', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(10, 1, 0, 'Crying', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(11, 1, 0, 'Agitation', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(12, 1, 0, 'Loss of Intrest', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(13, 1, 0, 'Indecisiveness', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(14, 1, 0, 'Worthlessness', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(15, 1, 0, 'Loss of Energy', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(16, 1, 0, 'Change in Sleeping Pattern', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(17, 1, 0, 'Irritability', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(18, 1, 0, 'Change in Appetite', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(19, 1, 0, 'Concentartion Difficulty', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(20, 1, 0, 'Tiredness of Fatigue', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(21, 1, 0, 'Loss of Intrest in Sex', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(22, 2, 15, 'I have felt terribly alone and isolated', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(23, 2, 14, 'I have felt tense, anxious or nervous', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(24, 2, 15, 'I have felt I have someone to turn to for support when needed', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(25, 2, 13, 'I have felt OK about myself', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(26, 2, 14, 'I have felt totally lacking in energy and enthusiasm', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(27, 2, 16, 'I have been physically violent to others', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(28, 2, 15, 'I have felt able to cope when things go wrong', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(29, 2, 14, 'I have been troubled by aches, pains or other physical problems', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(30, 2, 16, 'I have thought of hurting myself', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(31, 2, 15, 'Talking to people has felt too much for me', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(32, 2, 14, 'Tension and anxiety have prevented me doing important things', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(33, 2, 15, 'I have been happy with the things I have done', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(34, 2, 14, 'I have been disturbed by unwanted thoughts and feelings', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(35, 2, 13, 'I have felt like crying', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(36, 2, 14, 'I have felt panic or terror', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(37, 2, 16, 'I made plans to end my life', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(38, 2, 13, 'I have felt overwhelmed by my problems', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(39, 2, 14, 'I have had difficulty getting to sleep or staying asleep', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(40, 2, 15, 'I have felt warmth or affection for someone', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(41, 2, 14, 'My problems have been impossible to put to one side', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(42, 2, 15, 'I have been able to do most things I needed to', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(43, 2, 16, 'I have threatened or intimidated another person', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(44, 2, 14, 'I have felt despairing or hopeless', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(45, 2, 16, 'I have thought it would be better if I were dead', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(46, 2, 15, 'I have felt criticised by other people', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(47, 2, 15, 'I have thought I have no friends', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(48, 2, 14, 'I have felt unhappy', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(49, 2, 14, 'Unwanted images or memories have been distressing me', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(50, 2, 15, 'I have been irritable when with other people', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(51, 2, 14, 'I have thought I am to blame for my problems and difficulties', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(52, 2, 13, 'I have felt optimistic about my future', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(53, 2, 15, 'I have achieved the things I wanted to', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(54, 2, 15, 'I have felt humiliated or shamed by other people', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(55, 2, 16, 'I have hurt myself physically or taken dangerous risks with my health', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(56, 3, 5, 'I try to be nice to other people, I care about their feelings', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(57, 3, 3, 'I am restless, I cannot stay still for long', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(58, 3, 1, 'I ususally do as I am told', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(59, 3, 5, 'I get lot of headaches,stomach-aches,or sickness', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(60, 3, 2, 'I ususally share with others,for example CDs,games,food', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(61, 3, 4, 'I get very angry and often lose my temper', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(62, 3, 4, 'I would rather be alone than with people of my age', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(63, 3, 2, 'I ususally do as i am told', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(64, 3, 1, 'I worry a lot', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(65, 3, 5, 'I am helpful if someone is hurt, apset or feeling ill', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(66, 3, 3, 'I am constantly fidgeting or squirming', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(67, 3, 4, 'I have one good friend or more', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(68, 3, 2, 'I fight a lot. I can make other people do what I want', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(69, 3, 1, 'I am often unhappy,depressed or tearful', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(70, 3, 4, 'Other people my age generally like me ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(71, 3, 3, 'I am esaily distracted, I find difficult to concentrate ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(72, 3, 1, 'I am nervous in new situations. I easily lose confidence ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(73, 3, 5, 'I am kind to younger children ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(74, 3, 2, 'I am often accused of lying and cheating  ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(75, 3, 4, 'Other children or younger people pick on me or bully me ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(76, 3, 5, 'I often volunteer to help othera (parents,teachers,children) ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(77, 3, 3, 'I think before I do things ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(78, 3, 2, 'I take things that are not mine frome home, school or elsewhere ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(79, 3, 4, 'I get along better with adults than with people of my own age ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(80, 3, 1, 'I have many fears , I am easily scared ', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(81, 3, 3, 'I finish the work I\'m doing. My attension is good', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(82, 4, 7, 'When I feel frightened, it is hard to breathe', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(83, 4, 11, 'I get headaches when I am at school', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(84, 4, 10, 'I don’t like to be with people I don’t know well', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(85, 4, 9, 'I get scared if I sleep away from home', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(86, 4, 8, 'I worry about other people liking me', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(87, 4, 7, 'When I get frightened, I feel like passing out', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(88, 4, 8, 'I am nervous', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(89, 4, 9, 'I follow my mother or father wherever they go', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(90, 4, 7, 'People tell me that I look nervous', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(91, 4, 10, 'I feel nervous with people I don’t know well', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(92, 4, 11, 'I get stomachaches at school', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(93, 4, 7, 'When I get frightened, I feel like I am going crazy', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(94, 4, 9, 'I worry about sleeping alone', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(95, 4, 8, 'I worry about being as good as other kids', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(96, 4, 7, 'When I get frightened, I feel like things are not real', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(97, 4, 9, 'I have nightmares about something bad happening to my parents', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(98, 4, 11, 'I worry about going to school', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(99, 4, 7, 'When I get frightened, my heart beats fast', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(100, 4, 7, 'I get shaky', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(101, 4, 9, 'I have nightmares about something bad happening to me', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(102, 4, 8, 'I worry about things working out for me', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(103, 4, 7, 'When I get frightened, I sweat a lot', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(104, 4, 8, 'I am a worrier', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(105, 4, 7, 'I get really frightened for no reason at all', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(106, 4, 9, 'I am afraid to be alone in the house', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(107, 4, 10, 'It is hard for me to talk with people I don’t know well', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(108, 4, 7, 'When I get frightened, I feel like I am choking', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(109, 4, 8, 'People tell me that I worry too much', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(110, 4, 9, 'I don’t like to be away from my family', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(111, 4, 7, 'I am afraid of having anxiety (or panic) attacks', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(112, 4, 9, 'I worry that something bad might happen to my parents', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(113, 4, 10, 'I feel shy with people I don’t know well', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(114, 4, 8, 'I worry about what is going to happen in the future', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(115, 4, 7, 'When I get frightened, I feel like throwing up', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(116, 4, 8, 'I worry about how well I do things', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(117, 4, 11, 'I am scared to go to school', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(118, 4, 8, 'I worry about things that have already happened', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(119, 4, 7, 'When I get frightened, I feel dizzy', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(120, 4, 10, 'I feel nervous when I am with other children or adults and I have to do\n                    something while they watch me (for example: read aloud, speak, play a\n                    game, play a sport)', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(121, 4, 10, 'I feel nervous when I am going to parties, dances, or any place where there\n                    will be people that I don’t know well', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(122, 4, 10, 'I am shy', 1, 0, NULL, '2018-10-25 01:30:42', '2018-10-25 01:30:42', NULL),
(123, 5, NULL, 'Questions 1', 1, 0, NULL, '2018-11-14 12:08:09', '2018-11-14 12:08:09', NULL),
(124, 5, NULL, 'Question 2', 1, 0, NULL, '2018-11-14 12:08:33', '2018-11-14 12:08:33', NULL),
(125, 2, 15, 'this is q', 1, 0, NULL, '2019-01-18 05:00:24', '2019-01-18 05:00:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questiontypes`
--

CREATE TABLE `questiontypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary key of table',
  `question_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Question Table',
  `option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Question Option',
  `marks` tinyint(4) DEFAULT NULL COMMENT 'Question Marks',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`id`, `question_id`, `option`, `marks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'I do not feel sad.', 0, NULL, NULL, NULL),
(2, 1, 'I feel sad much of the time.', 1, NULL, NULL, NULL),
(3, 1, 'I am sad all the time.', 2, NULL, NULL, NULL),
(4, 1, 'I am so sad or unhappy that i can\'t stand it.', 3, NULL, NULL, NULL),
(5, 2, 'I am not discouraged about my future.', 0, NULL, NULL, NULL),
(6, 2, 'I feel more discouraged about my future that I used to be.', 1, NULL, NULL, NULL),
(7, 2, 'I do not expect things to work out for me.', 2, NULL, NULL, NULL),
(8, 2, 'I feel my future is hopeless and will only get worse.', 3, NULL, NULL, NULL),
(9, 3, 'I do not feel like a failure', 0, NULL, NULL, NULL),
(10, 3, 'I have failed more than I should have', 1, NULL, NULL, NULL),
(11, 3, 'As I look back, I see a lot of failures', 2, NULL, NULL, NULL),
(12, 3, 'I feel I am a total failure as a person', 3, NULL, NULL, NULL),
(13, 4, 'I get as much Pleasure as I ever did from the things I enjoy', 0, NULL, NULL, NULL),
(14, 4, 'I don’t enjoy things as much as I used to', 1, NULL, NULL, NULL),
(15, 4, 'I get very little pleasure from the things I used to enjoy', 2, NULL, NULL, NULL),
(16, 4, 'I can\'t get any pleasure from the things I used to enjoy', 3, NULL, NULL, NULL),
(17, 5, 'Not at all', 0, NULL, NULL, NULL),
(18, 5, 'Only Occasionally', 1, NULL, NULL, NULL),
(19, 5, 'Sometimes', 2, NULL, NULL, NULL),
(20, 5, 'Often', 3, NULL, NULL, NULL),
(21, 6, 'I don’t feel I am being punished', 0, NULL, NULL, NULL),
(22, 6, 'I feel I may be punished', 1, NULL, NULL, NULL),
(23, 6, 'I expect to be punished', 2, NULL, NULL, NULL),
(24, 6, 'I feel I am being punished', 3, NULL, NULL, NULL),
(25, 7, 'I feel the same about myself as ever', 0, NULL, NULL, NULL),
(26, 7, 'I have lost confidence in myself', 1, NULL, NULL, NULL),
(27, 7, 'I am disappointed in myself', 2, NULL, NULL, NULL),
(28, 7, 'I dislike myself', 3, NULL, NULL, NULL),
(29, 8, 'I don’t criticize or blame myself more than usual', 0, NULL, NULL, NULL),
(30, 8, 'I am more critical of myself than I used to be', 1, NULL, NULL, NULL),
(31, 8, 'I criticize myself for all my faults', 2, NULL, NULL, NULL),
(32, 8, 'I blame myself for everything bad that happens', 3, NULL, NULL, NULL),
(33, 9, 'I don’t have any thoughts of killing myself', 0, NULL, NULL, NULL),
(34, 9, 'I have thoughts of killing myself, but I would not carry them out', 1, NULL, NULL, NULL),
(35, 9, 'I would like to kill myself', 2, NULL, NULL, NULL),
(36, 9, 'I would kill myself if I had the chance', 3, NULL, NULL, NULL),
(37, 10, 'I don’t cry anymore than I used to', 0, NULL, NULL, NULL),
(38, 10, 'I cry more than I used to', 1, NULL, NULL, NULL),
(39, 10, 'I cry over very little things', 2, NULL, NULL, NULL),
(40, 10, 'I feel like crying,but i can\'t', 3, NULL, NULL, NULL),
(41, 11, 'I am no more restless or wound up than usual', 0, NULL, NULL, NULL),
(42, 11, 'I am so restless or aginated that it\'s hard to stay still ', 1, NULL, NULL, NULL),
(43, 11, 'I am so restless or aginated that I have to keep moving or doing something', 2, NULL, NULL, NULL),
(44, 12, 'I have not lost interest in other people or activities', 0, NULL, NULL, NULL),
(45, 12, 'I am less interested in other people or things than before', 1, NULL, NULL, NULL),
(46, 12, 'I have lost most of my interest in other people or things', 2, NULL, NULL, NULL),
(47, 12, 'It\'s hard to get interested in anything.', 3, NULL, NULL, NULL),
(48, 13, 'I make decisions about as well as ever', 0, NULL, NULL, NULL),
(49, 13, 'I fint it more difficult to make decision than usual', 1, NULL, NULL, NULL),
(50, 13, 'I have much grater difficulty in making decisions than I used to', 2, NULL, NULL, NULL),
(51, 13, 'I have trouble making any decisions', 3, NULL, NULL, NULL),
(52, 14, 'I do not feel I am worthless', 0, NULL, NULL, NULL),
(53, 14, 'I don\'t consider myself as worthwhile ans useful as I used to', 1, NULL, NULL, NULL),
(54, 14, 'I feel more worthless as comapred to other people', 2, NULL, NULL, NULL),
(55, 14, 'I feel utterly worthless', 3, NULL, NULL, NULL),
(56, 15, 'I have as much enery as ever', 0, NULL, NULL, NULL),
(57, 15, 'I have less enery than I used to have', 1, NULL, NULL, NULL),
(58, 15, 'I don\'t have enough enery to do very much ', 2, NULL, NULL, NULL),
(59, 15, 'I don\'t have enough eneryto do anything', 3, NULL, NULL, NULL),
(60, 16, 'I have not experienced anu change in my sleeping pattern', 0, NULL, NULL, NULL),
(61, 16, 'I sleep somwhat more than usual ', 1, NULL, NULL, NULL),
(62, 16, 'I sleep somwhat less than usual ', 1, NULL, NULL, NULL),
(63, 16, 'I sleep a lot more than usual ', 2, NULL, NULL, NULL),
(64, 16, 'I sleep a lot less than usual ', 2, NULL, NULL, NULL),
(65, 16, 'I sleep most of the day ', 3, NULL, NULL, NULL),
(66, 16, 'I wake up 1-2 hours early and can\'t get back to sleep ', 1, NULL, NULL, NULL),
(67, 17, 'I am no more irritable than usual ', 0, NULL, NULL, NULL),
(68, 17, 'I am more irritable than usual', 1, NULL, NULL, NULL),
(69, 17, 'I am much more irritable than usual ', 2, NULL, NULL, NULL),
(70, 17, 'I am irritable all the time', 3, NULL, NULL, NULL),
(71, 18, 'I have not experienced anu change in my appetite', 0, NULL, NULL, NULL),
(72, 18, 'My appetite is somwhat less than usual ', 1, NULL, NULL, NULL),
(73, 18, 'My appetite is somwhat grater than usual ', 1, NULL, NULL, NULL),
(74, 18, 'My appetite is much less than before ', 2, NULL, NULL, NULL),
(75, 18, 'My appetite is much grater than usual  ', 2, NULL, NULL, NULL),
(76, 18, 'I have no appetite at all ', 3, NULL, NULL, NULL),
(77, 18, 'I crave food all the time ', 1, NULL, NULL, NULL),
(78, 19, 'I can concentrate as well as ever ', 0, NULL, NULL, NULL),
(79, 19, 'I can\'t concentrate as well as usual ', 1, NULL, NULL, NULL),
(80, 19, 'It\'s hard to keep my ming on anything for very long ', 2, NULL, NULL, NULL),
(81, 19, 'I find i can\'t concentrate on anything', 3, NULL, NULL, NULL),
(82, 20, 'I am no more tired or fatigued than usual ', 0, NULL, NULL, NULL),
(83, 20, 'I get more tired or fatigued more easily than usual ', 1, NULL, NULL, NULL),
(84, 20, 'I am too tired or fatigued to do a lot of things I used to do', 2, NULL, NULL, NULL),
(85, 20, 'I am too tired or fatigued to do most of the things I used to do', 3, NULL, NULL, NULL),
(86, 21, 'I have not noticed ay recent changes in my interest in sex ', 0, NULL, NULL, NULL),
(87, 21, 'I am less interest in sex than I used to be', 1, NULL, NULL, NULL),
(88, 21, 'I am much less interest in sex now', 2, NULL, NULL, NULL),
(89, 21, 'I have lost interest in sex completely', 3, NULL, NULL, NULL),
(90, 22, 'Not at all', 0, NULL, NULL, NULL),
(91, 22, 'Only Occasionally', 1, NULL, NULL, NULL),
(92, 22, 'Sometimes', 2, NULL, NULL, NULL),
(93, 22, 'Often', 3, NULL, NULL, NULL),
(94, 22, 'Most or all the time', 4, NULL, NULL, NULL),
(95, 23, 'Not at all', 0, NULL, NULL, NULL),
(96, 23, 'Only Occasionally', 1, NULL, NULL, NULL),
(97, 23, 'Sometimes', 2, NULL, NULL, NULL),
(98, 23, 'Often', 3, NULL, NULL, NULL),
(99, 23, 'Most or all the time', 4, NULL, NULL, NULL),
(100, 24, 'Not at all', 4, NULL, NULL, NULL),
(101, 24, 'Only Occasionally', 3, NULL, NULL, NULL),
(102, 24, 'Sometimes', 2, NULL, NULL, NULL),
(103, 24, 'Often', 1, NULL, NULL, NULL),
(104, 24, 'Most or all the time', 0, NULL, NULL, NULL),
(105, 25, 'Not at all', 4, NULL, NULL, NULL),
(106, 25, 'Only Occasionally', 3, NULL, NULL, NULL),
(107, 25, 'Sometimes', 2, NULL, NULL, NULL),
(108, 25, 'Often', 1, NULL, NULL, NULL),
(109, 25, 'Most or all the time', 0, NULL, NULL, NULL),
(110, 26, 'Not at all', 0, NULL, NULL, NULL),
(111, 26, 'Only Occasionally', 1, NULL, NULL, NULL),
(112, 26, 'Sometimes', 2, NULL, NULL, NULL),
(113, 26, 'Often', 3, NULL, NULL, NULL),
(114, 26, 'Most or all the time', 4, NULL, NULL, NULL),
(115, 26, 'Not at all', 0, NULL, NULL, NULL),
(116, 27, 'Only Occasionally', 1, NULL, NULL, NULL),
(117, 27, 'Sometimes', 2, NULL, NULL, NULL),
(118, 27, 'Often', 3, NULL, NULL, NULL),
(119, 27, 'Most or all the time', 4, NULL, NULL, NULL),
(120, 28, 'Not at all', 4, NULL, NULL, NULL),
(121, 28, 'Only Occasionally', 3, NULL, NULL, NULL),
(122, 28, 'Sometimes', 2, NULL, NULL, NULL),
(123, 28, 'Often', 1, NULL, NULL, NULL),
(124, 28, 'Most or all the time', 0, NULL, NULL, NULL),
(125, 29, 'Not at all', 0, NULL, NULL, NULL),
(126, 29, 'Only Occasionally', 1, NULL, NULL, NULL),
(127, 29, 'Sometimes', 2, NULL, NULL, NULL),
(128, 29, 'Often', 3, NULL, NULL, NULL),
(129, 29, 'Most or all the time', 4, NULL, NULL, NULL),
(130, 30, 'Not at all', 0, NULL, NULL, NULL),
(131, 30, 'Only Occasionally', 1, NULL, NULL, NULL),
(132, 30, 'Sometimes', 2, NULL, NULL, NULL),
(133, 30, 'Often', 3, NULL, NULL, NULL),
(134, 30, 'Most or all the time', 4, NULL, NULL, NULL),
(135, 31, 'Not at all', 0, NULL, NULL, NULL),
(136, 31, 'Only Occasionally', 1, NULL, NULL, NULL),
(137, 31, 'Sometimes', 2, NULL, NULL, NULL),
(138, 31, 'Often', 3, NULL, NULL, NULL),
(139, 31, 'Most or all the time', 4, NULL, NULL, NULL),
(140, 32, 'Not at all', 0, NULL, NULL, NULL),
(141, 32, 'Only Occasionally', 1, NULL, NULL, NULL),
(142, 32, 'Sometimes', 2, NULL, NULL, NULL),
(143, 32, 'Often', 3, NULL, NULL, NULL),
(144, 32, 'Most or all the time', 4, NULL, NULL, NULL),
(145, 33, 'Not at all', 4, NULL, NULL, NULL),
(146, 33, 'Only Occasionally', 3, NULL, NULL, NULL),
(147, 33, 'Sometimes', 2, NULL, NULL, NULL),
(148, 33, 'Often', 1, NULL, NULL, NULL),
(149, 33, 'Most or all the time', 0, NULL, NULL, NULL),
(150, 34, 'Not at all', 0, NULL, NULL, NULL),
(151, 34, 'Only Occasionally', 1, NULL, NULL, NULL),
(152, 34, 'Sometimes', 2, NULL, NULL, NULL),
(153, 34, 'Often', 3, NULL, NULL, NULL),
(154, 34, 'Most or all the time', 4, NULL, NULL, NULL),
(155, 35, 'Not at all', 0, NULL, NULL, NULL),
(156, 35, 'Only Occasionally', 1, NULL, NULL, NULL),
(157, 35, 'Sometimes', 2, NULL, NULL, NULL),
(158, 35, 'Often', 3, NULL, NULL, NULL),
(159, 35, 'Most or all the time', 4, NULL, NULL, NULL),
(160, 36, 'Not at all', 0, NULL, NULL, NULL),
(161, 36, 'Only Occasionally', 1, NULL, NULL, NULL),
(162, 36, 'Sometimes', 2, NULL, NULL, NULL),
(163, 36, 'Often', 3, NULL, NULL, NULL),
(164, 36, 'Most or all the time', 4, NULL, NULL, NULL),
(165, 37, 'Not at all', 0, NULL, NULL, NULL),
(166, 37, 'Only Occasionally', 1, NULL, NULL, NULL),
(167, 37, 'Sometimes', 2, NULL, NULL, NULL),
(168, 37, 'Often', 3, NULL, NULL, NULL),
(169, 37, 'Most or all the time', 4, NULL, NULL, NULL),
(170, 38, 'Not at all', 0, NULL, NULL, NULL),
(171, 38, 'Only Occasionally', 1, NULL, NULL, NULL),
(172, 38, 'Sometimes', 2, NULL, NULL, NULL),
(173, 38, 'Often', 3, NULL, NULL, NULL),
(174, 38, 'Most or all the time', 4, NULL, NULL, NULL),
(175, 39, 'Not at all', 0, NULL, NULL, NULL),
(176, 39, 'Only Occasionally', 1, NULL, NULL, NULL),
(177, 39, 'Sometimes', 2, NULL, NULL, NULL),
(178, 39, 'Often', 3, NULL, NULL, NULL),
(179, 39, 'Most or all the time', 4, NULL, NULL, NULL),
(180, 40, 'Not at all', 4, NULL, NULL, NULL),
(181, 40, 'Only Occasionally', 3, NULL, NULL, NULL),
(182, 40, 'Sometimes', 2, NULL, NULL, NULL),
(183, 40, 'Often', 1, NULL, NULL, NULL),
(184, 40, 'Most or all the time', 0, NULL, NULL, NULL),
(185, 41, 'Not at all', 0, NULL, NULL, NULL),
(186, 41, 'Only Occasionally', 1, NULL, NULL, NULL),
(187, 41, 'Sometimes', 2, NULL, NULL, NULL),
(188, 41, 'Often', 3, NULL, NULL, NULL),
(189, 41, 'Most or all the time', 4, NULL, NULL, NULL),
(190, 42, 'Not at all', 4, NULL, NULL, NULL),
(191, 42, 'Only Occasionally', 3, NULL, NULL, NULL),
(192, 42, 'Sometimes', 2, NULL, NULL, NULL),
(193, 42, 'Often', 1, NULL, NULL, NULL),
(194, 42, 'Most or all the time', 0, NULL, NULL, NULL),
(195, 43, 'Not at all', 0, NULL, NULL, NULL),
(196, 43, 'Only Occasionally', 1, NULL, NULL, NULL),
(197, 43, 'Sometimes', 2, NULL, NULL, NULL),
(198, 43, 'Often', 3, NULL, NULL, NULL),
(199, 43, 'Most or all the time', 4, NULL, NULL, NULL),
(200, 44, 'Not at all', 0, NULL, NULL, NULL),
(201, 44, 'Only Occasionally', 1, NULL, NULL, NULL),
(202, 44, 'Sometimes', 2, NULL, NULL, NULL),
(203, 44, 'Often', 3, NULL, NULL, NULL),
(204, 44, 'Most or all the time', 4, NULL, NULL, NULL),
(205, 45, 'Not at all', 0, NULL, NULL, NULL),
(206, 45, 'Only Occasionally', 1, NULL, NULL, NULL),
(207, 45, 'Sometimes', 2, NULL, NULL, NULL),
(208, 45, 'Often', 3, NULL, NULL, NULL),
(209, 45, 'Most or all the time', 4, NULL, NULL, NULL),
(210, 46, 'Not at all', 0, NULL, NULL, NULL),
(211, 46, 'Only Occasionally', 1, NULL, NULL, NULL),
(212, 46, 'Sometimes', 2, NULL, NULL, NULL),
(213, 46, 'Often', 3, NULL, NULL, NULL),
(214, 46, 'Most or all the time', 4, NULL, NULL, NULL),
(215, 47, 'Not at all', 0, NULL, NULL, NULL),
(216, 47, 'Only Occasionally', 1, NULL, NULL, NULL),
(217, 47, 'Sometimes', 2, NULL, NULL, NULL),
(218, 47, 'Often', 3, NULL, NULL, NULL),
(219, 47, 'Most or all the time', 4, NULL, NULL, NULL),
(220, 48, 'Not at all', 0, NULL, NULL, NULL),
(221, 48, 'Only Occasionally', 1, NULL, NULL, NULL),
(222, 48, 'Sometimes', 2, NULL, NULL, NULL),
(223, 48, 'Often', 3, NULL, NULL, NULL),
(224, 48, 'Most or all the time', 4, NULL, NULL, NULL),
(225, 49, 'Not at all', 0, NULL, NULL, NULL),
(226, 49, 'Only Occasionally', 1, NULL, NULL, NULL),
(227, 49, 'Sometimes', 2, NULL, NULL, NULL),
(228, 49, 'Often', 3, NULL, NULL, NULL),
(229, 49, 'Most or all the time', 4, NULL, NULL, NULL),
(230, 50, 'Not at all', 0, NULL, NULL, NULL),
(231, 50, 'Only Occasionally', 1, NULL, NULL, NULL),
(232, 50, 'Sometimes', 2, NULL, NULL, NULL),
(233, 50, 'Often', 3, NULL, NULL, NULL),
(234, 50, 'Most or all the time', 4, NULL, NULL, NULL),
(235, 51, 'Not at all', 0, NULL, NULL, NULL),
(236, 51, 'Only Occasionally', 1, NULL, NULL, NULL),
(237, 51, 'Sometimes', 2, NULL, NULL, NULL),
(238, 51, 'Often', 3, NULL, NULL, NULL),
(239, 51, 'Most or all the time', 4, NULL, NULL, NULL),
(240, 52, 'Not at all', 4, NULL, NULL, NULL),
(241, 52, 'Only Occasionally', 3, NULL, NULL, NULL),
(242, 52, 'Sometimes', 2, NULL, NULL, NULL),
(243, 52, 'Often', 1, NULL, NULL, NULL),
(244, 52, 'Most or all the time', 0, NULL, NULL, NULL),
(245, 53, 'Not at all', 4, NULL, NULL, NULL),
(246, 53, 'Only Occasionally', 3, NULL, NULL, NULL),
(247, 53, 'Sometimes', 2, NULL, NULL, NULL),
(248, 53, 'Often', 1, NULL, NULL, NULL),
(249, 53, 'Most or all the time', 0, NULL, NULL, NULL),
(250, 54, 'Not at all', 0, NULL, NULL, NULL),
(251, 54, 'Only Occasionally', 1, NULL, NULL, NULL),
(252, 54, 'Sometimes', 2, NULL, NULL, NULL),
(253, 54, 'Often', 3, NULL, NULL, NULL),
(254, 54, 'Most or all the time', 4, NULL, NULL, NULL),
(255, 55, 'Not at all', 0, NULL, NULL, NULL),
(256, 55, 'Only Occasionally', 1, NULL, NULL, NULL),
(257, 55, 'Sometimes', 2, NULL, NULL, NULL),
(258, 55, 'Often', 3, NULL, NULL, NULL),
(259, 55, 'Most or all the time', 4, NULL, NULL, NULL),
(260, 56, 'Not True', 0, NULL, NULL, NULL),
(261, 56, 'Somewhat True', 1, NULL, NULL, NULL),
(262, 56, 'Certainly True', 2, NULL, NULL, NULL),
(263, 57, 'Not True', 0, NULL, NULL, NULL),
(264, 57, 'Somewhat True', 1, NULL, NULL, NULL),
(265, 57, 'Certainly True', 2, NULL, NULL, NULL),
(266, 58, 'Not True', 0, NULL, NULL, NULL),
(267, 58, 'Somewhat True', 1, NULL, NULL, NULL),
(268, 58, 'Certainly True', 2, NULL, NULL, NULL),
(269, 59, 'Not True', 0, NULL, NULL, NULL),
(270, 59, 'Somewhat True', 1, NULL, NULL, NULL),
(271, 59, 'Certainly True', 2, NULL, NULL, NULL),
(272, 60, 'Not True', 0, NULL, NULL, NULL),
(273, 60, 'Somewhat True', 1, NULL, NULL, NULL),
(274, 60, 'Certainly True', 2, NULL, NULL, NULL),
(275, 61, 'Not True', 0, NULL, NULL, NULL),
(276, 61, 'Somewhat True', 1, NULL, NULL, NULL),
(277, 61, 'Certainly True', 2, NULL, NULL, NULL),
(278, 62, 'Not True', 0, NULL, NULL, NULL),
(279, 62, 'Somewhat True', 1, NULL, NULL, NULL),
(280, 62, 'Certainly True', 2, NULL, NULL, NULL),
(281, 63, 'Not True', 0, NULL, NULL, NULL),
(282, 63, 'Somewhat True', 1, NULL, NULL, NULL),
(283, 63, 'Certainly True', 2, NULL, NULL, NULL),
(284, 64, 'Not True', 0, NULL, NULL, NULL),
(285, 64, 'Somewhat True', 1, NULL, NULL, NULL),
(286, 64, 'Certainly True', 2, NULL, NULL, NULL),
(287, 65, 'Not True', 0, NULL, NULL, NULL),
(288, 65, 'Somewhat True', 1, NULL, NULL, NULL),
(289, 65, 'Certainly True', 2, NULL, NULL, NULL),
(290, 66, 'Not True', 0, NULL, NULL, NULL),
(291, 66, 'Somewhat True', 1, NULL, NULL, NULL),
(292, 66, 'Certainly True', 2, NULL, NULL, NULL),
(293, 67, 'Not True', 0, NULL, NULL, NULL),
(294, 67, 'Somewhat True', 1, NULL, NULL, NULL),
(295, 67, 'Certainly True', 2, NULL, NULL, NULL),
(296, 68, 'Not True', 0, NULL, NULL, NULL),
(297, 68, 'Somewhat True', 1, NULL, NULL, NULL),
(298, 68, 'Certainly True', 2, NULL, NULL, NULL),
(299, 69, 'Not True', 0, NULL, NULL, NULL),
(300, 69, 'Somewhat True', 1, NULL, NULL, NULL),
(301, 69, 'Certainly True', 2, NULL, NULL, NULL),
(302, 70, 'Not True', 0, NULL, NULL, NULL),
(303, 70, 'Somewhat True', 1, NULL, NULL, NULL),
(304, 70, 'Certainly True', 2, NULL, NULL, NULL),
(305, 71, 'Not True', 0, NULL, NULL, NULL),
(306, 71, 'Somewhat True', 1, NULL, NULL, NULL),
(307, 71, 'Certainly True', 2, NULL, NULL, NULL),
(308, 72, 'Not True', 0, NULL, NULL, NULL),
(309, 72, 'Somewhat True', 1, NULL, NULL, NULL),
(310, 72, 'Certainly True', 2, NULL, NULL, NULL),
(311, 73, 'Not True', 0, NULL, NULL, NULL),
(312, 73, 'Somewhat True', 1, NULL, NULL, NULL),
(313, 73, 'Certainly True', 2, NULL, NULL, NULL),
(314, 74, 'Not True', 0, NULL, NULL, NULL),
(315, 74, 'Somewhat True', 1, NULL, NULL, NULL),
(316, 74, 'Certainly True', 2, NULL, NULL, NULL),
(317, 75, 'Not True', 0, NULL, NULL, NULL),
(318, 75, 'Somewhat True', 1, NULL, NULL, NULL),
(319, 75, 'Certainly True', 2, NULL, NULL, NULL),
(320, 76, 'Not True', 0, NULL, NULL, NULL),
(321, 76, 'Somewhat True', 1, NULL, NULL, NULL),
(322, 76, 'Certainly True', 2, NULL, NULL, NULL),
(323, 77, 'Not True', 0, NULL, NULL, NULL),
(324, 77, 'Somewhat True', 1, NULL, NULL, NULL),
(325, 77, 'Certainly True', 2, NULL, NULL, NULL),
(326, 78, 'Not True', 0, NULL, NULL, NULL),
(327, 78, 'Somewhat True', 1, NULL, NULL, NULL),
(328, 78, 'Certainly True', 2, NULL, NULL, NULL),
(329, 79, 'Not True', 0, NULL, NULL, NULL),
(330, 79, 'Somewhat True', 1, NULL, NULL, NULL),
(331, 79, 'Certainly True', 2, NULL, NULL, NULL),
(332, 80, 'Not True', 0, NULL, NULL, NULL),
(333, 80, 'Somewhat True', 1, NULL, NULL, NULL),
(334, 80, 'Certainly True', 2, NULL, NULL, NULL),
(335, 81, 'Not True', 0, NULL, NULL, NULL),
(336, 81, 'Somewhat True', 1, NULL, NULL, NULL),
(337, 81, 'Certainly True', 2, NULL, NULL, NULL),
(338, 82, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(339, 82, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(340, 82, 'Very True of Often True', 2, NULL, NULL, NULL),
(341, 83, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(342, 83, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(343, 83, 'Very True of Often True', 2, NULL, NULL, NULL),
(344, 84, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(345, 84, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(346, 84, 'Very True of Often True', 2, NULL, NULL, NULL),
(347, 85, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(348, 85, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(349, 85, 'Very True of Often True', 2, NULL, NULL, NULL),
(350, 86, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(351, 86, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(352, 86, 'Very True of Often True', 2, NULL, NULL, NULL),
(353, 87, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(354, 87, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(355, 87, 'Very True of Often True', 2, NULL, NULL, NULL),
(356, 88, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(357, 88, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(358, 88, 'Very True of Often True', 2, NULL, NULL, NULL),
(359, 89, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(360, 89, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(361, 89, 'Very True of Often True', 2, NULL, NULL, NULL),
(362, 90, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(363, 90, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(364, 90, 'Very True of Often True', 2, NULL, NULL, NULL),
(365, 91, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(366, 91, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(367, 91, 'Very True of Often True', 2, NULL, NULL, NULL),
(368, 92, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(369, 92, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(370, 92, 'Very True of Often True', 2, NULL, NULL, NULL),
(371, 93, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(372, 93, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(373, 93, 'Very True of Often True', 2, NULL, NULL, NULL),
(374, 94, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(375, 94, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(376, 94, 'Very True of Often True', 2, NULL, NULL, NULL),
(377, 95, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(378, 95, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(379, 95, 'Very True of Often True', 2, NULL, NULL, NULL),
(380, 96, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(381, 96, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(382, 96, 'Very True of Often True', 2, NULL, NULL, NULL),
(383, 97, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(384, 97, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(385, 97, 'Very True of Often True', 2, NULL, NULL, NULL),
(386, 98, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(387, 98, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(388, 98, 'Very True of Often True', 2, NULL, NULL, NULL),
(389, 99, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(390, 99, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(391, 99, 'Very True of Often True', 2, NULL, NULL, NULL),
(392, 100, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(393, 100, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(394, 100, 'Very True of Often True', 2, NULL, NULL, NULL),
(395, 101, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(396, 101, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(397, 101, 'Very True of Often True', 2, NULL, NULL, NULL),
(398, 102, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(399, 102, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(400, 102, 'Very True of Often True', 2, NULL, NULL, NULL),
(401, 103, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(402, 103, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(403, 103, 'Very True of Often True', 2, NULL, NULL, NULL),
(404, 104, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(405, 104, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(406, 104, 'Very True of Often True', 2, NULL, NULL, NULL),
(407, 105, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(408, 105, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(409, 105, 'Very True of Often True', 2, NULL, NULL, NULL),
(410, 106, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(411, 106, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(412, 106, 'Very True of Often True', 2, NULL, NULL, NULL),
(413, 107, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(414, 107, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(415, 107, 'Very True of Often True', 2, NULL, NULL, NULL),
(416, 108, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(417, 108, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(418, 108, 'Very True of Often True', 2, NULL, NULL, NULL),
(419, 109, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(420, 109, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(421, 109, 'Very True of Often True', 2, NULL, NULL, NULL),
(422, 110, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(423, 110, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(424, 110, 'Very True of Often True', 2, NULL, NULL, NULL),
(425, 111, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(426, 111, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(427, 111, 'Very True of Often True', 2, NULL, NULL, NULL),
(428, 112, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(429, 112, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(430, 112, 'Very True of Often True', 2, NULL, NULL, NULL),
(431, 113, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(432, 113, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(433, 113, 'Very True of Often True', 2, NULL, NULL, NULL),
(434, 114, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(435, 114, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(436, 114, 'Very True of Often True', 2, NULL, NULL, NULL),
(437, 115, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(438, 115, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(439, 115, 'Very True of Often True', 2, NULL, NULL, NULL),
(440, 116, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(441, 116, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(442, 116, 'Very True of Often True', 2, NULL, NULL, NULL),
(443, 117, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(444, 117, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(445, 117, 'Very True of Often True', 2, NULL, NULL, NULL),
(446, 118, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(447, 118, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(448, 118, 'Very True of Often True', 2, NULL, NULL, NULL),
(449, 119, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(450, 119, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(451, 119, 'Very True of Often True', 2, NULL, NULL, NULL),
(452, 120, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(453, 120, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(454, 120, 'Very True of Often True', 2, NULL, NULL, NULL),
(455, 121, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(456, 121, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(457, 121, 'Very True of Often True', 2, NULL, NULL, NULL),
(458, 122, 'Not True or Hardly Ever True', 0, NULL, NULL, NULL),
(459, 122, 'Somewhat True or Sometimes True', 1, NULL, NULL, NULL),
(460, 122, 'Very True of Often True', 2, NULL, NULL, NULL),
(461, 123, 'psojdfop', 3, NULL, NULL, NULL),
(462, 123, 'asdf', 2, NULL, NULL, NULL),
(463, 124, 'ddd', 2, NULL, NULL, NULL),
(464, 124, '000', 1, NULL, NULL, NULL),
(465, 125, 'opt1', 2, NULL, NULL, NULL),
(466, 125, 'opy', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_submit`
--

CREATE TABLE `question_submit` (
  `id` int(10) UNSIGNED NOT NULL,
  `manage_session_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Manage Session Table',
  `question_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Question table',
  `option_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Option Table',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_submit`
--

INSERT INTO `question_submit` (`id`, `manage_session_id`, `question_id`, `option_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4, 4, NULL, NULL),
(2, 3, 2, 8, 4, NULL, NULL),
(3, 3, 3, 12, 4, NULL, NULL),
(4, 3, 4, 16, 4, NULL, NULL),
(5, 3, 5, 20, 4, NULL, NULL),
(6, 3, 6, 24, 4, NULL, NULL),
(7, 3, 7, 28, 4, NULL, NULL),
(8, 3, 8, 32, 4, NULL, NULL),
(9, 3, 9, 36, 4, NULL, NULL),
(10, 3, 10, 40, 4, NULL, NULL),
(11, 3, 11, 43, 4, NULL, NULL),
(12, 3, 12, 47, 4, NULL, NULL),
(13, 3, 13, 51, 4, NULL, NULL),
(14, 3, 14, 55, 4, NULL, NULL),
(15, 3, 15, 59, 4, NULL, NULL),
(16, 3, 16, 64, 4, NULL, NULL),
(17, 3, 17, 67, 4, NULL, NULL),
(18, 3, 18, 71, 4, NULL, NULL),
(19, 3, 19, 79, 4, NULL, NULL),
(20, 3, 20, 83, 4, NULL, NULL),
(21, 3, 21, 88, 4, NULL, NULL),
(22, 4, 1, 1, 4, NULL, NULL),
(23, 4, 2, 8, 4, NULL, NULL),
(24, 4, 3, 9, 4, NULL, NULL),
(25, 4, 4, 13, 4, NULL, NULL),
(26, 4, 5, 18, 4, NULL, NULL),
(27, 4, 6, 24, 4, NULL, NULL),
(28, 4, 7, 28, 4, NULL, NULL),
(29, 4, 8, 30, 4, NULL, NULL),
(30, 4, 9, 34, 4, NULL, NULL),
(31, 4, 10, 38, 4, NULL, NULL),
(32, 4, 11, 42, 4, NULL, NULL),
(33, 4, 12, 45, 4, NULL, NULL),
(34, 4, 13, 51, 4, NULL, NULL),
(35, 4, 14, 53, 4, NULL, NULL),
(36, 4, 15, 59, 4, NULL, NULL),
(37, 4, 16, 61, 4, NULL, NULL),
(38, 4, 17, 68, 4, NULL, NULL),
(39, 4, 18, 77, 4, NULL, NULL),
(40, 4, 19, 79, 4, NULL, NULL),
(41, 4, 20, 85, 4, NULL, NULL),
(42, 4, 21, 87, 4, NULL, NULL),
(43, 7, 56, 262, 4, NULL, NULL),
(44, 7, 57, 265, 4, NULL, NULL),
(45, 7, 58, 268, 4, NULL, NULL),
(46, 7, 59, 270, 4, NULL, NULL),
(47, 7, 60, 274, 4, NULL, NULL),
(48, 7, 61, 275, 4, NULL, NULL),
(49, 7, 62, 280, 4, NULL, NULL),
(50, 7, 63, 283, 4, NULL, NULL),
(51, 7, 64, 285, 4, NULL, NULL),
(52, 7, 65, 288, 4, NULL, NULL),
(53, 7, 66, 292, 4, NULL, NULL),
(54, 7, 67, 293, 4, NULL, NULL),
(55, 7, 68, 296, 4, NULL, NULL),
(56, 7, 69, 299, 4, NULL, NULL),
(57, 7, 70, 304, 4, NULL, NULL),
(58, 7, 71, 306, 4, NULL, NULL),
(59, 7, 72, 309, 4, NULL, NULL),
(60, 7, 73, 313, 4, NULL, NULL),
(61, 7, 74, 315, 4, NULL, NULL),
(62, 7, 75, 318, 4, NULL, NULL),
(63, 7, 76, 322, 4, NULL, NULL),
(64, 7, 77, 325, 4, NULL, NULL),
(65, 7, 78, 326, 4, NULL, NULL),
(66, 7, 79, 330, 4, NULL, NULL),
(67, 7, 80, 334, 4, NULL, NULL),
(68, 7, 81, 337, 4, NULL, NULL),
(69, 6, 56, 262, 4, NULL, NULL),
(70, 6, 57, 263, 4, NULL, NULL),
(71, 6, 58, 268, 4, NULL, NULL),
(72, 6, 59, 271, 4, NULL, NULL),
(73, 6, 60, 272, 4, NULL, NULL),
(74, 6, 61, 276, 4, NULL, NULL),
(75, 6, 62, 280, 4, NULL, NULL),
(76, 6, 63, 283, 4, NULL, NULL),
(77, 6, 64, 285, 4, NULL, NULL),
(78, 6, 65, 288, 4, NULL, NULL),
(79, 6, 66, 292, 4, NULL, NULL),
(80, 6, 67, 295, 4, NULL, NULL),
(81, 6, 68, 298, 4, NULL, NULL),
(82, 6, 69, 301, 4, NULL, NULL),
(83, 6, 70, 304, 4, NULL, NULL),
(84, 6, 71, 307, 4, NULL, NULL),
(85, 6, 72, 310, 4, NULL, NULL),
(86, 6, 73, 313, 4, NULL, NULL),
(87, 6, 74, 316, 4, NULL, NULL),
(88, 6, 75, 318, 4, NULL, NULL),
(89, 6, 76, 321, 4, NULL, NULL),
(90, 6, 77, 325, 4, NULL, NULL),
(91, 6, 78, 328, 4, NULL, NULL),
(92, 6, 79, 331, 4, NULL, NULL),
(93, 6, 80, 333, 4, NULL, NULL),
(94, 6, 81, 336, 4, NULL, NULL),
(95, 12, 22, 94, 4, NULL, NULL),
(96, 12, 23, 99, 4, NULL, NULL),
(97, 12, 24, 104, 4, NULL, NULL),
(98, 12, 25, 109, 4, NULL, NULL),
(99, 12, 26, 115, 4, NULL, NULL),
(100, 12, 27, 119, 4, NULL, NULL),
(101, 12, 28, 124, 4, NULL, NULL),
(102, 12, 29, 129, 4, NULL, NULL),
(103, 12, 30, 134, 4, NULL, NULL),
(104, 12, 31, 139, 4, NULL, NULL),
(105, 12, 32, 144, 4, NULL, NULL),
(106, 12, 33, 149, 4, NULL, NULL),
(107, 12, 34, 154, 4, NULL, NULL),
(108, 12, 35, 159, 4, NULL, NULL),
(109, 12, 36, 164, 4, NULL, NULL),
(110, 12, 37, 169, 4, NULL, NULL),
(111, 12, 38, 174, 4, NULL, NULL),
(112, 12, 39, 179, 4, NULL, NULL),
(113, 12, 40, 184, 4, NULL, NULL),
(114, 12, 41, 189, 4, NULL, NULL),
(115, 12, 42, 194, 4, NULL, NULL),
(116, 12, 43, 199, 4, NULL, NULL),
(117, 12, 44, 204, 4, NULL, NULL),
(118, 12, 45, 209, 4, NULL, NULL),
(119, 12, 46, 214, 4, NULL, NULL),
(120, 12, 47, 219, 4, NULL, NULL),
(121, 12, 48, 224, 4, NULL, NULL),
(122, 12, 49, 229, 4, NULL, NULL),
(123, 12, 50, 234, 4, NULL, NULL),
(124, 12, 51, 239, 4, NULL, NULL),
(125, 12, 52, 240, 4, NULL, NULL),
(126, 12, 53, 249, 4, NULL, NULL),
(127, 12, 54, 254, 4, NULL, NULL),
(128, 12, 55, 259, 4, NULL, NULL),
(129, 13, 82, 338, 4, NULL, NULL),
(130, 13, 83, 343, 4, NULL, NULL),
(131, 13, 84, 346, 4, NULL, NULL),
(132, 13, 85, 349, 4, NULL, NULL),
(133, 13, 86, 352, 4, NULL, NULL),
(134, 13, 87, 354, 4, NULL, NULL),
(135, 13, 88, 358, 4, NULL, NULL),
(136, 13, 89, 361, 4, NULL, NULL),
(137, 13, 90, 364, 4, NULL, NULL),
(138, 13, 91, 367, 4, NULL, NULL),
(139, 13, 92, 370, 4, NULL, NULL),
(140, 13, 93, 373, 4, NULL, NULL),
(141, 13, 94, 376, 4, NULL, NULL),
(142, 13, 95, 379, 4, NULL, NULL),
(143, 13, 96, 382, 4, NULL, NULL),
(144, 13, 97, 385, 4, NULL, NULL),
(145, 13, 98, 388, 4, NULL, NULL),
(146, 13, 99, 391, 4, NULL, NULL),
(147, 13, 100, 394, 4, NULL, NULL),
(148, 13, 101, 397, 4, NULL, NULL),
(149, 13, 102, 400, 4, NULL, NULL),
(150, 13, 103, 403, 4, NULL, NULL),
(151, 13, 104, 406, 4, NULL, NULL),
(152, 13, 105, 409, 4, NULL, NULL),
(153, 13, 106, 412, 4, NULL, NULL),
(154, 13, 107, 415, 4, NULL, NULL),
(155, 13, 108, 418, 4, NULL, NULL),
(156, 13, 109, 421, 4, NULL, NULL),
(157, 13, 110, 424, 4, NULL, NULL),
(158, 13, 111, 427, 4, NULL, NULL),
(159, 13, 112, 430, 4, NULL, NULL),
(160, 13, 113, 433, 4, NULL, NULL),
(161, 13, 114, 436, 4, NULL, NULL),
(162, 13, 115, 439, 4, NULL, NULL),
(163, 13, 116, 442, 4, NULL, NULL),
(164, 13, 117, 445, 4, NULL, NULL),
(165, 13, 118, 448, 4, NULL, NULL),
(166, 13, 119, 451, 4, NULL, NULL),
(167, 13, 120, 454, 4, NULL, NULL),
(168, 13, 121, 457, 4, NULL, NULL),
(169, 13, 122, 460, 4, NULL, NULL),
(191, 15, 1, 2, 8, NULL, NULL),
(192, 15, 2, 6, 8, NULL, NULL),
(193, 15, 3, 10, 8, NULL, NULL),
(194, 15, 4, 13, 8, NULL, NULL),
(195, 15, 5, 19, 8, NULL, NULL),
(196, 15, 6, 22, 8, NULL, NULL),
(197, 15, 7, 25, 8, NULL, NULL),
(198, 15, 8, 29, 8, NULL, NULL),
(199, 15, 9, 34, 8, NULL, NULL),
(200, 15, 10, 38, 8, NULL, NULL),
(201, 15, 11, 42, 8, NULL, NULL),
(202, 15, 12, 44, 8, NULL, NULL),
(203, 15, 13, 50, 8, NULL, NULL),
(204, 15, 14, 52, 8, NULL, NULL),
(205, 15, 15, 58, 8, NULL, NULL),
(206, 15, 16, 65, 8, NULL, NULL),
(207, 15, 17, 69, 8, NULL, NULL),
(208, 15, 18, 72, 8, NULL, NULL),
(209, 15, 19, 80, 8, NULL, NULL),
(210, 15, 20, 82, 8, NULL, NULL),
(211, 15, 21, 87, 8, NULL, NULL),
(212, 16, 1, 1, 8, NULL, NULL),
(213, 16, 2, 8, 8, NULL, NULL),
(214, 16, 3, 10, 8, NULL, NULL),
(215, 16, 4, 14, 8, NULL, NULL),
(216, 16, 5, 19, 8, NULL, NULL),
(217, 16, 6, 24, 8, NULL, NULL),
(218, 16, 7, 28, 8, NULL, NULL),
(219, 16, 8, 32, 8, NULL, NULL),
(220, 16, 9, 36, 8, NULL, NULL),
(221, 16, 10, 40, 8, NULL, NULL),
(222, 16, 11, 43, 8, NULL, NULL),
(223, 16, 12, 47, 8, NULL, NULL),
(224, 16, 13, 51, 8, NULL, NULL),
(225, 16, 14, 55, 8, NULL, NULL),
(226, 16, 15, 59, 8, NULL, NULL),
(227, 16, 16, 66, 8, NULL, NULL),
(228, 16, 17, 70, 8, NULL, NULL),
(229, 16, 18, 77, 8, NULL, NULL),
(230, 16, 19, 81, 8, NULL, NULL),
(231, 16, 20, 85, 8, NULL, NULL),
(232, 16, 21, 89, 8, NULL, NULL),
(233, 28, 123, 461, 8, NULL, NULL),
(234, 28, 124, 463, 8, NULL, NULL),
(235, 32, 56, 260, 16, NULL, NULL),
(236, 32, 57, 265, 16, NULL, NULL),
(237, 32, 58, 267, 16, NULL, NULL),
(238, 32, 59, 271, 16, NULL, NULL),
(239, 32, 60, 274, 16, NULL, NULL),
(240, 32, 61, 277, 16, NULL, NULL),
(241, 32, 62, 280, 16, NULL, NULL),
(242, 32, 63, 283, 16, NULL, NULL),
(243, 32, 64, 286, 16, NULL, NULL),
(244, 32, 65, 289, 16, NULL, NULL),
(245, 32, 66, 292, 16, NULL, NULL),
(246, 32, 67, 295, 16, NULL, NULL),
(247, 32, 68, 298, 16, NULL, NULL),
(248, 32, 69, 301, 16, NULL, NULL),
(249, 32, 70, 304, 16, NULL, NULL),
(250, 32, 71, 307, 16, NULL, NULL),
(251, 32, 72, 310, 16, NULL, NULL),
(252, 32, 73, 313, 16, NULL, NULL),
(253, 32, 74, 316, 16, NULL, NULL),
(254, 32, 75, 319, 16, NULL, NULL),
(255, 32, 76, 322, 16, NULL, NULL),
(256, 32, 77, 325, 16, NULL, NULL),
(257, 32, 78, 328, 16, NULL, NULL),
(258, 32, 79, 331, 16, NULL, NULL),
(259, 32, 80, 333, 16, NULL, NULL),
(260, 32, 81, 336, 16, NULL, NULL),
(261, 34, 1, 2, 17, NULL, NULL),
(262, 34, 2, 7, 17, NULL, NULL),
(263, 34, 3, 11, 17, NULL, NULL),
(264, 34, 4, 15, 17, NULL, NULL),
(265, 34, 5, 20, 17, NULL, NULL),
(266, 34, 6, 22, 17, NULL, NULL),
(267, 34, 7, 28, 17, NULL, NULL),
(268, 34, 8, 32, 17, NULL, NULL),
(269, 34, 9, 35, 17, NULL, NULL),
(270, 34, 10, 40, 17, NULL, NULL),
(271, 34, 11, 43, 17, NULL, NULL),
(272, 34, 12, 47, 17, NULL, NULL),
(273, 34, 13, 50, 17, NULL, NULL),
(274, 34, 14, 55, 17, NULL, NULL),
(275, 34, 15, 59, 17, NULL, NULL),
(276, 34, 16, 66, 17, NULL, NULL),
(277, 34, 17, 70, 17, NULL, NULL),
(278, 34, 18, 73, 17, NULL, NULL),
(279, 34, 19, 80, 17, NULL, NULL),
(280, 34, 20, 85, 17, NULL, NULL),
(281, 34, 21, 89, 17, NULL, NULL),
(282, 17, 56, 262, 8, NULL, NULL),
(283, 17, 57, 265, 8, NULL, NULL),
(284, 17, 58, 268, 8, NULL, NULL),
(285, 17, 59, 271, 8, NULL, NULL),
(286, 17, 60, 274, 8, NULL, NULL),
(287, 17, 61, 277, 8, NULL, NULL),
(288, 17, 62, 280, 8, NULL, NULL),
(289, 17, 63, 283, 8, NULL, NULL),
(290, 17, 64, 286, 8, NULL, NULL),
(291, 17, 65, 289, 8, NULL, NULL),
(292, 17, 66, 292, 8, NULL, NULL),
(293, 17, 67, 295, 8, NULL, NULL),
(294, 17, 68, 298, 8, NULL, NULL),
(295, 17, 69, 301, 8, NULL, NULL),
(296, 17, 70, 304, 8, NULL, NULL),
(297, 17, 71, 307, 8, NULL, NULL),
(298, 17, 72, 310, 8, NULL, NULL),
(299, 17, 73, 313, 8, NULL, NULL),
(300, 17, 74, 316, 8, NULL, NULL),
(301, 17, 75, 319, 8, NULL, NULL),
(302, 17, 76, 322, 8, NULL, NULL),
(303, 17, 77, 325, 8, NULL, NULL),
(304, 17, 78, 328, 8, NULL, NULL),
(305, 17, 79, 331, 8, NULL, NULL),
(306, 17, 80, 334, 8, NULL, NULL),
(307, 17, 81, 337, 8, NULL, NULL),
(308, 46, 56, 261, 18, NULL, NULL),
(309, 46, 57, 265, 18, NULL, NULL),
(310, 46, 58, 268, 18, NULL, NULL),
(311, 46, 59, 271, 18, NULL, NULL),
(312, 46, 60, 274, 18, NULL, NULL),
(313, 46, 61, 277, 18, NULL, NULL),
(314, 46, 62, 280, 18, NULL, NULL),
(315, 46, 63, 283, 18, NULL, NULL),
(316, 46, 64, 286, 18, NULL, NULL),
(317, 46, 65, 289, 18, NULL, NULL),
(318, 46, 66, 292, 18, NULL, NULL),
(319, 46, 67, 295, 18, NULL, NULL),
(320, 46, 68, 298, 18, NULL, NULL),
(321, 46, 69, 301, 18, NULL, NULL),
(322, 46, 70, 304, 18, NULL, NULL),
(323, 46, 71, 307, 18, NULL, NULL),
(324, 46, 72, 310, 18, NULL, NULL),
(325, 46, 73, 313, 18, NULL, NULL),
(326, 46, 74, 316, 18, NULL, NULL),
(327, 46, 75, 319, 18, NULL, NULL),
(328, 46, 76, 322, 18, NULL, NULL),
(329, 46, 77, 325, 18, NULL, NULL),
(330, 46, 78, 328, 18, NULL, NULL),
(331, 46, 79, 331, 18, NULL, NULL),
(332, 46, 80, 334, 18, NULL, NULL),
(333, 46, 81, 337, 18, NULL, NULL),
(334, 55, 1, 2, 22, NULL, NULL),
(335, 55, 2, 7, 22, NULL, NULL),
(336, 55, 3, 11, 22, NULL, NULL),
(337, 55, 4, 16, 22, NULL, NULL),
(338, 55, 5, 20, 22, NULL, NULL),
(339, 55, 6, 24, 22, NULL, NULL),
(340, 55, 7, 28, 22, NULL, NULL),
(341, 55, 8, 32, 22, NULL, NULL),
(342, 55, 9, 36, 22, NULL, NULL),
(343, 55, 10, 40, 22, NULL, NULL),
(344, 55, 11, 43, 22, NULL, NULL),
(345, 55, 12, 47, 22, NULL, NULL),
(346, 55, 13, 51, 22, NULL, NULL),
(347, 55, 14, 55, 22, NULL, NULL),
(348, 55, 15, 59, 22, NULL, NULL),
(349, 55, 16, 66, 22, NULL, NULL),
(350, 55, 17, 70, 22, NULL, NULL),
(351, 55, 18, 77, 22, NULL, NULL),
(352, 55, 19, 81, 22, NULL, NULL),
(353, 55, 20, 85, 22, NULL, NULL),
(354, 55, 21, 89, 22, NULL, NULL),
(389, 59, 82, 338, 22, NULL, NULL),
(390, 59, 83, 341, 22, NULL, NULL),
(391, 59, 84, 346, 22, NULL, NULL),
(392, 59, 85, 349, 22, NULL, NULL),
(393, 59, 86, 352, 22, NULL, NULL),
(394, 59, 87, 355, 22, NULL, NULL),
(395, 59, 88, 358, 22, NULL, NULL),
(396, 59, 89, 361, 22, NULL, NULL),
(397, 59, 90, 364, 22, NULL, NULL),
(398, 59, 91, 367, 22, NULL, NULL),
(399, 59, 92, 370, 22, NULL, NULL),
(400, 59, 93, 373, 22, NULL, NULL),
(401, 59, 94, 376, 22, NULL, NULL),
(402, 59, 95, 379, 22, NULL, NULL),
(403, 59, 96, 382, 22, NULL, NULL),
(404, 59, 97, 385, 22, NULL, NULL),
(405, 59, 98, 388, 22, NULL, NULL),
(406, 59, 99, 391, 22, NULL, NULL),
(407, 59, 100, 394, 22, NULL, NULL),
(408, 59, 101, 397, 22, NULL, NULL),
(409, 59, 102, 400, 22, NULL, NULL),
(410, 59, 103, 403, 22, NULL, NULL),
(411, 59, 104, 406, 22, NULL, NULL),
(412, 59, 105, 409, 22, NULL, NULL),
(413, 59, 106, 412, 22, NULL, NULL),
(414, 59, 107, 415, 22, NULL, NULL),
(415, 59, 108, 418, 22, NULL, NULL),
(416, 59, 109, 421, 22, NULL, NULL),
(417, 59, 110, 424, 22, NULL, NULL),
(418, 59, 111, 427, 22, NULL, NULL),
(419, 59, 112, 430, 22, NULL, NULL),
(420, 59, 113, 433, 22, NULL, NULL),
(421, 59, 114, 436, 22, NULL, NULL),
(422, 59, 115, 439, 22, NULL, NULL),
(423, 59, 116, 442, 22, NULL, NULL),
(424, 59, 117, 445, 22, NULL, NULL),
(425, 59, 118, 448, 22, NULL, NULL),
(426, 59, 119, 451, 22, NULL, NULL),
(427, 59, 120, 454, 22, NULL, NULL),
(428, 59, 121, 457, 22, NULL, NULL),
(429, 59, 122, 460, 22, NULL, NULL),
(430, 60, 56, 261, 22, NULL, NULL),
(431, 60, 57, 263, 22, NULL, NULL),
(432, 60, 58, 266, 22, NULL, NULL),
(433, 60, 59, 271, 22, NULL, NULL),
(434, 60, 60, 274, 22, NULL, NULL),
(435, 60, 61, 277, 22, NULL, NULL),
(436, 60, 62, 280, 22, NULL, NULL),
(437, 60, 63, 283, 22, NULL, NULL),
(438, 60, 64, 286, 22, NULL, NULL),
(439, 60, 65, 287, 22, NULL, NULL),
(440, 60, 66, 292, 22, NULL, NULL),
(441, 60, 67, 295, 22, NULL, NULL),
(442, 60, 68, 298, 22, NULL, NULL),
(443, 60, 69, 301, 22, NULL, NULL),
(444, 60, 70, 304, 22, NULL, NULL),
(445, 60, 71, 307, 22, NULL, NULL),
(446, 60, 72, 310, 22, NULL, NULL),
(447, 60, 73, 313, 22, NULL, NULL),
(448, 60, 74, 316, 22, NULL, NULL),
(449, 60, 75, 319, 22, NULL, NULL),
(450, 60, 76, 322, 22, NULL, NULL),
(451, 60, 77, 325, 22, NULL, NULL),
(452, 60, 78, 328, 22, NULL, NULL),
(453, 60, 79, 331, 22, NULL, NULL),
(454, 60, 80, 334, 22, NULL, NULL),
(455, 60, 81, 337, 22, NULL, NULL),
(456, 56, 82, 338, 22, NULL, NULL),
(457, 56, 83, 341, 22, NULL, NULL),
(458, 57, 82, 340, 22, NULL, NULL),
(459, 57, 83, 343, 22, NULL, NULL),
(460, 57, 84, 346, 22, NULL, NULL),
(461, 57, 85, 349, 22, NULL, NULL),
(462, 57, 86, 352, 22, NULL, NULL),
(463, 57, 87, 355, 22, NULL, NULL),
(464, 57, 88, 358, 22, NULL, NULL),
(465, 57, 89, 361, 22, NULL, NULL),
(466, 57, 90, 364, 22, NULL, NULL),
(467, 57, 91, 367, 22, NULL, NULL),
(468, 57, 92, 370, 22, NULL, NULL),
(469, 57, 93, 373, 22, NULL, NULL),
(470, 57, 94, 376, 22, NULL, NULL),
(471, 57, 95, 379, 22, NULL, NULL),
(472, 57, 96, 382, 22, NULL, NULL),
(473, 57, 97, 385, 22, NULL, NULL),
(474, 57, 98, 388, 22, NULL, NULL),
(475, 57, 99, 391, 22, NULL, NULL),
(476, 57, 100, 394, 22, NULL, NULL),
(477, 57, 101, 397, 22, NULL, NULL),
(478, 57, 102, 400, 22, NULL, NULL),
(479, 57, 103, 403, 22, NULL, NULL),
(480, 57, 104, 406, 22, NULL, NULL),
(481, 57, 105, 409, 22, NULL, NULL),
(482, 57, 106, 412, 22, NULL, NULL),
(483, 57, 107, 415, 22, NULL, NULL),
(484, 57, 108, 418, 22, NULL, NULL),
(485, 57, 109, 421, 22, NULL, NULL),
(486, 57, 110, 424, 22, NULL, NULL),
(487, 57, 111, 427, 22, NULL, NULL),
(488, 57, 112, 430, 22, NULL, NULL),
(489, 57, 113, 433, 22, NULL, NULL),
(490, 57, 114, 436, 22, NULL, NULL),
(491, 57, 115, 439, 22, NULL, NULL),
(492, 57, 116, 442, 22, NULL, NULL),
(493, 57, 117, 445, 22, NULL, NULL),
(494, 57, 118, 448, 22, NULL, NULL),
(495, 57, 119, 451, 22, NULL, NULL),
(496, 57, 120, 454, 22, NULL, NULL),
(497, 57, 121, 457, 22, NULL, NULL),
(498, 57, 122, 460, 22, NULL, NULL),
(499, 62, 1, 1, 22, NULL, NULL),
(500, 62, 2, 7, 22, NULL, NULL),
(501, 62, 3, 12, 22, NULL, NULL),
(502, 62, 4, 13, 22, NULL, NULL),
(503, 62, 5, 19, 22, NULL, NULL),
(504, 62, 6, 22, 22, NULL, NULL),
(505, 62, 7, 26, 22, NULL, NULL),
(506, 62, 8, 30, 22, NULL, NULL),
(507, 62, 9, 34, 22, NULL, NULL),
(508, 62, 10, 38, 22, NULL, NULL),
(509, 62, 11, 42, 22, NULL, NULL),
(510, 62, 12, 45, 22, NULL, NULL),
(511, 62, 13, 49, 22, NULL, NULL),
(512, 62, 14, 53, 22, NULL, NULL),
(513, 62, 15, 57, 22, NULL, NULL),
(514, 62, 16, 61, 22, NULL, NULL),
(515, 62, 17, 70, 22, NULL, NULL),
(516, 62, 18, 77, 22, NULL, NULL),
(517, 62, 19, 81, 22, NULL, NULL),
(518, 62, 20, 85, 22, NULL, NULL),
(519, 62, 21, 89, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` tinyint(4) NOT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1-Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `question_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beck Depression Inventory (BDI)', 1, NULL, NULL, NULL),
(2, 'Clinical Outcomes in Routine Evaluation (CORE)', 1, NULL, NULL, NULL),
(3, 'Strengths and Difficulties Questionnaire (SDQ)', 1, NULL, NULL, NULL),
(4, 'Screen for Child Anxiety Related Disorders (SCARED)', 1, NULL, NULL, NULL),
(5, 'MK questionnaire', 1, '2018-11-14 12:07:40', '2018-11-14 12:07:40', NULL),
(6, 'first', 1, '2019-01-17 04:07:17', '2019-01-17 04:07:17', NULL),
(7, 'test1', 1, '2019-01-18 05:01:07', '2019-01-18 05:01:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `all`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Developer', 1, 1, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(2, 'Admin', 0, 2, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(3, 'Sub-Admin', 0, 3, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL),
(4, 'Client', 0, 4, 1, 1, NULL, '2018-10-25 01:30:40', '2018-10-25 01:30:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(3, 3, 3),
(4, 4, 4),
(8, 5, 4),
(9, 7, 4),
(10, 8, 4),
(12, 9, 1),
(13, 10, 4),
(14, 2, 2),
(15, 13, 4),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Clinical Psychology', 1, 0, NULL, NULL, NULL),
(2, 'Positive Behaviour', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `company_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `disclaimer` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `home_video1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_video2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_video3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_video4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explanation1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explanation2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explanation3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explanation4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `seo_title`, `seo_keyword`, `seo_description`, `company_contact`, `company_address`, `from_name`, `from_email`, `facebook`, `linkedin`, `twitter`, `google`, `copyright_text`, `footer_text`, `terms`, `disclaimer`, `google_analytics`, `home_video1`, `home_video2`, `home_video3`, `home_video4`, `explanation1`, `explanation2`, `explanation3`, `explanation4`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Actualise', NULL, NULL, NULL, NULL, 'Super Admin', 'sadmin-actualise@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-14 00:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stone_collection`
--

CREATE TABLE `stone_collection` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `average_rating` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'knowledge base status for 1:Active,0:Inactive',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stone_collection`
--

INSERT INTO `stone_collection` (`id`, `title`, `description`, `file`, `rating`, `average_rating`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Base study 1', 'Base study 1 is meant for anxiety disorder.', '["professional.jpg"]', 0.00, '5.00', 1, 1, '2018-09-05 08:06:32', '2018-10-09 08:12:46', '2018-10-09 08:12:46'),
(2, 'Record 1', 'Record 1 with description', '["logo-p.png","book1.jpg"]', 0.00, '4.50', 1, 2, '2018-09-14 04:41:23', '2018-10-09 08:12:40', '2018-10-09 08:12:40'),
(3, 'Pesky gNATs', 'Descriptions in here', '["000ad126-642.jpg"]', 0.00, '3.50', 1, 2, '2018-09-28 09:33:36', '2018-10-09 08:12:36', '2018-10-09 08:12:36'),
(4, 'Pre-consultation Pack', 'Dear Actualise Client,\r\n\r\nWe are looking forward to seeing you at the clinic. Before you come, here are some useful documents which you should look at, including:\r\n- A map of the campus, with information on parking\r\n- Our policies \r\n- Informed consent\r\n\r\nSee you soon!\r\nThe Actualise Team', '["DCU Alpha Campus Information.pdf","Goal Sheets - Adult.pdf","Informed consent form.docx","Policies 2018.pdf"]', 0.00, '5.00', 1, 2, '2018-10-09 08:08:10', '2018-10-09 08:21:45', '2018-10-09 08:21:45'),
(5, 'Map and Policies (A)', 'Dear Actualise Client,\r\n\r\nWe are looking forward to welcoming you to the Actualise Clinic. In advance of that, please find attached:\r\n\r\n- A map of the DCU Alpha campus. Please note, we are NOT in the DCU Main Campus, but in the DCU Alpha campus. This link will get you close to our clinic: https://goo.gl/maps/ms9kThQcAxB2. From here, just use the attached map to find parking\r\n\r\n- Our policies. Please read our policies ahead of your visit.\r\n\r\n- A goal sheet. This is a sample sheet which we will discuss with you at your consultation. It helps us think about goals you have in mind for your time with us.\r\n\r\nWe look forward to welcoming you to our clinic.\r\nThe Actualise Team', '{"3":"DCU Alpha Campus Information.pdf","4":"Goal Sheets - Adult.pdf","5":"Policies 2018.pdf"}', 0.00, '3.00', 1, 2, '2018-10-09 08:34:21', '2018-12-14 04:01:05', NULL),
(6, 'Map and Policies (C)', 'Dear Actualise Client,\r\n\r\nWe are looking forward to welcoming you to the Actualise Clinic. In advance of that, please find attached:\r\n\r\n- A map of the DCU Alpha campus. Please note, we are NOT in the DCU Main Campus, but in the DCU Alpha campus. This link will get you close to our clinic: https://goo.gl/maps/ms9kThQcAxB2. From here, just use the attached map to find parking\r\n\r\n- Our policies. Please read our policies ahead of your visit.\r\n\r\n- A goal sheet. This is a sample sheet which we will discuss with you at your consultation. It helps us think about goals you have in mind for your time with us.\r\n\r\nWe look forward to welcoming you to our clinic.\r\nThe Actualise Team', '["DCU Alpha Campus Information.pdf","Goal Sheets - Child.pdf","Policies 2018.pdf"]', 0.00, '4.00', 1, 2, '2018-10-09 08:35:12', '2018-11-27 07:54:43', NULL),
(7, 'Teachers Resources 1', 'r', '["Ikigai.jpeg"]', 0.00, '0.00', 1, 2, '2018-11-02 07:31:01', '2018-11-02 07:31:11', '2018-11-02 07:31:11'),
(8, 'Teachers Resources 3', 'Max Size File', '["Canada-17MB.jpg","Airbus_Pleiades_41MB.jpg","Actualise Academy Resources #3.pdf"]', 0.00, '0.00', 1, 1, '2018-12-03 02:07:12', '2018-12-10 03:57:56', NULL),
(9, 'NFT presentation', 'arg', '["NFT info presentation.pptx"]', 0.00, '3.50', 1, 2, '2018-12-10 04:01:41', '2019-03-26 09:20:12', NULL),
(10, 'User Manual', 'desc', '["download.jpg"]', 0.00, '0.00', 1, 1, '2019-01-17 02:47:54', '2019-01-17 02:48:14', NULL),
(11, 'ooo', 'ooooo', '["Shayona Shikhar.pdf"]', 0.00, '0.00', 1, 1, '2019-01-21 08:25:34', '2019-01-21 08:25:35', NULL),
(12, 'asd', 'asd', '', 0.00, '0.00', 1, 1, '2019-05-30 22:33:16', '2019-05-30 22:33:16', NULL),
(13, 'asd', 'asd', '["1.png"]', 0.00, '0.00', 1, 1, '2019-05-30 22:34:07', '2019-05-30 22:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjective_question_save`
--

CREATE TABLE `subjective_question_save` (
  `id` int(10) UNSIGNED NOT NULL,
  `manage_session_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Manage Session Table',
  `question_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign Key of Custom Question table',
  `options` tinyint(4) NOT NULL COMMENT 'Option of Subjective Questions',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Record created by user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjective_question_save`
--

INSERT INTO `subjective_question_save` (`id`, `manage_session_id`, `question_id`, `options`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 3, 4, NULL, NULL),
(2, 2, 10, 0, 4, NULL, NULL),
(3, 2, 11, 6, 4, NULL, NULL),
(4, 2, 12, 0, 4, NULL, NULL),
(5, 2, 13, -4, 4, NULL, NULL),
(6, 2, 14, 6, 4, NULL, NULL),
(7, 5, 9, 6, 4, NULL, NULL),
(8, 5, 10, 0, 4, NULL, NULL),
(9, 5, 11, -7, 4, NULL, NULL),
(10, 5, 12, 2, 4, NULL, NULL),
(11, 5, 13, -5, 4, NULL, NULL),
(12, 5, 14, 6, 4, NULL, NULL),
(13, 31, 23, 6, 16, NULL, NULL),
(14, 31, 24, -8, 16, NULL, NULL),
(20, 35, 30, 9, 17, NULL, NULL),
(21, 35, 31, 5, 17, NULL, NULL),
(22, 35, 32, -5, 17, NULL, NULL),
(23, 35, 33, -6, 17, NULL, NULL),
(24, 35, 34, -6, 17, NULL, NULL),
(25, 35, 35, 5, 17, NULL, NULL),
(26, 36, 30, 9, 17, NULL, NULL),
(27, 36, 31, 9, 17, NULL, NULL),
(28, 36, 32, -9, 17, NULL, NULL),
(29, 36, 33, -8, 17, NULL, NULL),
(30, 36, 34, -8, 17, NULL, NULL),
(31, 36, 35, -8, 17, NULL, NULL),
(32, 39, 30, 10, 17, NULL, NULL),
(33, 39, 31, 10, 17, NULL, NULL),
(34, 39, 32, -10, 17, NULL, NULL),
(35, 39, 33, -10, 17, NULL, NULL),
(36, 39, 34, 10, 17, NULL, NULL),
(37, 39, 35, 10, 17, NULL, NULL),
(38, 45, 36, 10, 18, NULL, NULL),
(39, 45, 37, -6, 18, NULL, NULL),
(40, 47, 36, 4, 18, NULL, NULL),
(41, 47, 37, -4, 18, NULL, NULL),
(42, 50, 36, 7, 1, NULL, NULL),
(43, 50, 37, -6, 1, NULL, NULL),
(44, 54, 39, 0, 22, NULL, NULL),
(45, 54, 40, 0, 22, NULL, NULL),
(46, 54, 41, 0, 22, NULL, NULL),
(47, 54, 42, 0, 22, NULL, NULL),
(48, 54, 43, 0, 22, NULL, NULL),
(49, 54, 44, 0, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Client Table',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intervention_type` int(10) UNSIGNED NOT NULL COMMENT 'Foreign key of Intervention Type Table',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_id`, `comment`, `intervention_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'I am doing better now, thanks.', 1, NULL, NULL),
(2, 1, 'good experience', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_term_accept` tinyint(1) NOT NULL DEFAULT '0' COMMENT ' 0 = not accepted,1 = accepted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `confirmation_code`, `confirmed`, `is_term_accept`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'chirag', 'khatri', 'admin@yopmail.com', '$2y$10$iQRk4W8HYx95ryOpW39hFegtB32esfZEjpyJkwxvKvjFO5zWbCJp2', 1, 'ffcfa3d58b37f80b150c90e7373a2841', 1, 0, '4RdD0gajxW7ZKIkDfKGRgKdeU7mfHQxCNUqfj4G93Oa4Qk46H6UrcVU7ZQTq', 1, 1, '2018-09-05 03:10:44', '2019-05-22 21:26:09', NULL),
(2, 'Admin', 'Actualise', 'admin-actualise@yopmail.com', '$2y$10$1H8RDjuD9kd6/eJ0HroBu.Nktr4fCMB0ZcBpSmLnFMszNMsU75Om.', 1, '56e2d40e371fc7ddcc5491c8e166810e', 1, 0, 'lTagSscWGYU4iAWwuiRBG268C8hbYdZURPRLkeXBxFLo6BvopRAPdT8FSCVA', 1, NULL, '2018-09-05 03:10:44', '2018-09-05 03:10:44', NULL),
(3, 'Subadmin', 'Actualise', 'subadmin-actualise@yopmail.com', '$2y$10$wCNQOQK86TS0buTLOBRmHeBdilNbZJ3FEG6EwQol7WttrY5VTVhKa', 1, '5ccc6cae0af816dc99c34c9e1376f56f', 1, 0, NULL, 1, NULL, '2018-09-05 03:10:44', '2018-10-11 01:09:42', NULL),
(4, 'Jane', 'Doe', 'jane.doe@yopmail.com', '$2y$10$/ISkt7gMxbfJe7LgMlf0Vei40I55PgBgpL9ugCuLgjFaXPf835.gq', 0, NULL, 1, 0, 'ktSZHxUiq947TCjdWrRloy6eh8kd0pjICjT9aFhbNP6ypN4IDvLx2rdBu9Ih', 1, NULL, '2018-09-05 08:05:23', '2018-10-17 02:50:30', NULL),
(5, 'Sarah', 'Malley', 'sarah.malley@yopmail.com', '$2y$10$DMGNubClD5KeaGPPGNTN/OxpotjPX0.4Ru.XU3Z4GPPhnkfpVIzcq', 1, NULL, 1, 0, NULL, 2, NULL, '2018-09-19 03:31:08', '2018-09-19 03:38:12', '2018-09-19 03:38:12'),
(7, 'Franca', 'Michelle', 'michelle.franca@actualise.ie', '$2y$10$4G7x9vdUIT/f1FXuTOrYX.sR/aJwE5PYonInTshmkkv07ybww2eCG', 1, NULL, 1, 0, NULL, 2, NULL, '2018-09-28 09:15:57', '2018-10-09 07:50:02', '2018-10-09 07:50:02'),
(8, 'Franca', 'Michelle', 'michelledemattos@hotmail.com', '$2y$10$32jPmVjVzlZX3bmxYcynm.dO3qVoXYsv33c.CMBd4pJoV24t88KZ2', 1, NULL, 1, 0, 'JZQUAQEm0UnsiLhdUkr1GcEbUfF9T1MUNEAoNPZadhZWsIKxo9vSGHguhnoS', 2, NULL, '2018-10-09 07:58:24', '2018-11-14 12:18:19', NULL),
(9, 'Rosemary', 'Keane', 'rosemary.keane@actualise.ie', '$2y$10$q05GI8vSSLZLMaj1EVZFMO/8fq5rBmLgmEiVtd6POsYoUAFZEeCTm', 1, 'b91888b61cb05aa118ba6080f2d9f1fd', 1, 0, NULL, 2, NULL, '2018-10-15 04:00:09', '2018-10-15 04:00:09', NULL),
(10, 'Michael', 'Keane', 'mikeakeane@gmail.com', '$2y$10$H/wKAjIhPiYTc.Bw2JfdteTDPzyHYDfzepQZsPXtDTzRlv93k9.ES', 1, NULL, 1, 0, NULL, 2, NULL, '2018-10-15 04:12:31', '2018-11-02 06:30:56', '2018-11-02 06:30:56'),
(13, 'Michael', 'Keane', 'michael@cognifyx.com', '$2y$10$qEmXVaDSLd2KQsDFTqvonOQi39jFC6Z.mteqXdzV7POblPmhy3FjS', 1, NULL, 1, 0, 'iAETqUG9xHLFfHJUqs7X6tvcAeeZIp6I3fLs5w6cxS80jp94ad7vrrPSU9gF', 2, NULL, '2018-11-02 06:36:06', '2018-11-02 06:36:06', NULL),
(16, 'Mike', 'Tyson', 'mike0001@yopmail.com', '$2y$10$.ihjV69cRHKfzOlMIPrmku/DkrTubJds2NA1Y9SP4/fxZ6ZqPLCrW', 1, NULL, 1, 0, 'Cwa45CNeG5E1RF2Yib8r2muxQslOUe4SNjr0osjOPNBgdY2t5MUeuFGKtDoE', 1, NULL, '2018-11-19 05:31:44', '2018-12-14 00:24:41', NULL),
(17, 'Tom', 'Keane', 'info@actualise.ie', '$2y$10$Ifv9H8GmHlGVmQnVeHVED.2frwlEMpnvH5e.BswLjjKo38tLWD3iS', 1, NULL, 1, 0, '5gBFbEFQxGgSeb8rBcroR2FJiXL1zLpW5fNpSbGQgmBQh13PrpWHbSqu4qxA', 2, NULL, '2018-11-19 07:45:05', '2018-11-20 10:27:53', NULL),
(18, 'Mark', 'Set', 'mark.01@yopmail.com', '$2y$10$iQRk4W8HYx95ryOpW39hFegtB32esfZEjpyJkwxvKvjFO5zWbCJp2', 1, NULL, 1, 0, 'EDe9cN8WdG2e9gX1lQYsQOf0CykRr3e5KHzhjsuf9eVyXMxHcJOOiRVXoEFv', 2, NULL, '2018-11-27 03:19:21', '2018-12-04 08:31:26', NULL),
(19, 'Sahil', 'Dutt', 'sahil.dutt12@yopmail.com', '$2y$10$iQRk4W8HYx95ryOpW39hFegtB32esfZEjpyJkwxvKvjFO5zWbCJp2', 1, NULL, 1, 0, '0Uw0Z4UHl9yUmLKsIAhtCWypvaz785rTNO3fcysqo4DU0EqXCxabit8wT0Zt', 1, NULL, '2018-12-04 03:43:03', '2018-12-04 03:43:03', NULL),
(20, 'test_client', 'test_client', 'test_client@yopmail.com', '$2y$10$iQRk4W8HYx95ryOpW39hFegtB32esfZEjpyJkwxvKvjFO5zWbCJp2', 1, NULL, 1, 0, NULL, 1, NULL, '2018-12-14 00:23:21', '2018-12-14 00:26:54', '2018-12-14 00:26:54'),
(22, 'john', 'carter', 'cygnet.ardedaniya@gmail.com', '$2y$10$iQRk4W8HYx95ryOpW39hFegtB32esfZEjpyJkwxvKvjFO5zWbCJp2', 1, NULL, 1, 0, 'as5Wz28mXIPtrlTnqI0AITsj6gJj6xH41pgceBwDuIQqwjoyqYJtMbPC6Ekv', 1, NULL, '2019-01-17 02:29:39', '2019-01-21 04:32:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `behaviour`
--
ALTER TABLE `behaviour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_type_id_foreing` (`question_type_id`);

--
-- Indexes for table `behaviour_scale`
--
ALTER TABLE `behaviour_scale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `behaviour_id_foreing` (`behaviour_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_map_categories`
--
ALTER TABLE `blog_map_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_map_categories_blog_id_index` (`blog_id`),
  ADD KEY `blog_map_categories_category_id_index` (`category_id`);

--
-- Indexes for table `blog_map_tags`
--
ALTER TABLE `blog_map_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_map_tags_blog_id_index` (`blog_id`),
  ADD KEY `blog_map_tags_tag_id_index` (`tag_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `client_intervention`
--
ALTER TABLE `client_intervention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_foreing` (`client_id`),
  ADD KEY `intervention_type_foreing` (`intervention_type`);

--
-- Indexes for table `client_knowledge`
--
ALTER TABLE `client_knowledge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `knowledge_bases_id_foreign` (`knowledge_bases_id`);

--
-- Indexes for table `clinicalservices_details`
--
ALTER TABLE `clinicalservices_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `clinical_service_id_foreign` (`clinical_service_id`);

--
-- Indexes for table `custom_question`
--
ALTER TABLE `custom_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `users_id_foreign` (`created_by`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_type_id_index` (`type_id`);

--
-- Indexes for table `email_template_placeholders`
--
ALTER TABLE `email_template_placeholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_types`
--
ALTER TABLE `email_template_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `intervention_type_id_foreing` (`intervention_type`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_type_id_foreign` (`type_id`),
  ADD KEY `history_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_types`
--
ALTER TABLE `history_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interventions_type`
--
ALTER TABLE `interventions_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knowledge_bases_created_by_index` (`created_by`);

--
-- Indexes for table `managesessions`
--
ALTER TABLE `managesessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `question_type_id_foreign` (`question_type_id`),
  ADD KEY `users_id_foreign` (`created_by`),
  ADD KEY `update_users_id_foreign` (`updated_by`),
  ADD KEY `intervention_type_id_foreing` (`intervention_type`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_page_slug_unique` (`page_slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `psycological_types`
--
ALTER TABLE `psycological_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `psycological_types_created_by_foreign` (`created_by`),
  ADD KEY `psycological_types_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `behaviour_id_foreing` (`behaviour_id`);

--
-- Indexes for table `questiontypes`
--
ALTER TABLE `questiontypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id_foreign` (`question_id`);

--
-- Indexes for table `question_submit`
--
ALTER TABLE `question_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manage_session_id_foreign` (`manage_session_id`),
  ADD KEY `question_id_foreing` (`question_id`),
  ADD KEY `option_id_foreign` (`option_id`),
  ADD KEY `question_submit_created_by_index` (`created_by`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_created_by_foreign` (`created_by`),
  ADD KEY `services_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `stone_collection`
--
ALTER TABLE `stone_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knowledge_bases_created_by_index` (`created_by`);

--
-- Indexes for table `subjective_question_save`
--
ALTER TABLE `subjective_question_save`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manage_session_id_foreign` (`manage_session_id`),
  ADD KEY `question_id_foreing` (`question_id`),
  ADD KEY `subjective_question_save_created_by_index` (`created_by`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_foreign` (`client_id`),
  ADD KEY `intervention_type_id_foreing` (`intervention_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `behaviour`
--
ALTER TABLE `behaviour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `behaviour_scale`
--
ALTER TABLE `behaviour_scale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_map_categories`
--
ALTER TABLE `blog_map_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_map_tags`
--
ALTER TABLE `blog_map_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `client_intervention`
--
ALTER TABLE `client_intervention`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key of table', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `client_knowledge`
--
ALTER TABLE `client_knowledge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key of Table', AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `clinicalservices_details`
--
ALTER TABLE `clinicalservices_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `custom_question`
--
ALTER TABLE `custom_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `email_template_placeholders`
--
ALTER TABLE `email_template_placeholders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `email_template_types`
--
ALTER TABLE `email_template_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `history_types`
--
ALTER TABLE `history_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `interventions_type`
--
ALTER TABLE `interventions_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key of table', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `managesessions`
--
ALTER TABLE `managesessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;
--
-- AUTO_INCREMENT for table `psycological_types`
--
ALTER TABLE `psycological_types`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `questiontypes`
--
ALTER TABLE `questiontypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key of table', AUTO_INCREMENT=467;
--
-- AUTO_INCREMENT for table `question_submit`
--
ALTER TABLE `question_submit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;
--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stone_collection`
--
ALTER TABLE `stone_collection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subjective_question_save`
--
ALTER TABLE `subjective_question_save`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `behaviour`
--
ALTER TABLE `behaviour`
  ADD CONSTRAINT `behaviour_question_type_id_foreign` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `behaviour_scale`
--
ALTER TABLE `behaviour_scale`
  ADD CONSTRAINT `behaviour_scale_behaviour_id_foreign` FOREIGN KEY (`behaviour_id`) REFERENCES `behaviour` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_intervention`
--
ALTER TABLE `client_intervention`
  ADD CONSTRAINT `client_intervention_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `client_intervention_intervention_type_foreign` FOREIGN KEY (`intervention_type`) REFERENCES `interventions_type` (`id`);

--
-- Constraints for table `client_knowledge`
--
ALTER TABLE `client_knowledge`
  ADD CONSTRAINT `client_knowledge_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_knowledge_knowledge_bases_id_foreign` FOREIGN KEY (`knowledge_bases_id`) REFERENCES `knowledge_bases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clinicalservices_details`
--
ALTER TABLE `clinicalservices_details`
  ADD CONSTRAINT `clinicalservices_details_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clinicalservices_details_clinical_service_id_foreign` FOREIGN KEY (`clinical_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `custom_question`
--
ALTER TABLE `custom_question`
  ADD CONSTRAINT `custom_question_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custom_question_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_intervention_type_foreign` FOREIGN KEY (`intervention_type`) REFERENCES `interventions_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD CONSTRAINT `knowledge_bases_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `managesessions`
--
ALTER TABLE `managesessions`
  ADD CONSTRAINT `managesessions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `managesessions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `managesessions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `psycological_types`
--
ALTER TABLE `psycological_types`
  ADD CONSTRAINT `psycological_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `psycological_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_behaviour_id_foreign` FOREIGN KEY (`behaviour_id`) REFERENCES `behaviour` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_option`
--
ALTER TABLE `question_option`
  ADD CONSTRAINT `question_option_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_submit`
--
ALTER TABLE `question_submit`
  ADD CONSTRAINT `question_submit_manage_session_id_foreign` FOREIGN KEY (`manage_session_id`) REFERENCES `managesessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_submit_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `question_option` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_submit_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjective_question_save`
--
ALTER TABLE `subjective_question_save`
  ADD CONSTRAINT `subjective_question_save_manage_session_id_foreign` FOREIGN KEY (`manage_session_id`) REFERENCES `managesessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjective_question_save_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `custom_question` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonials_intervention_type_foreign` FOREIGN KEY (`intervention_type`) REFERENCES `interventions_type` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
