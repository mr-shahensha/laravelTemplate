-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 07:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task-lara2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `custId` varchar(255) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custNumber` varchar(255) NOT NULL,
  `custKycNo` varchar(255) DEFAULT NULL,
  `custKycDtl` varchar(255) DEFAULT NULL,
  `custAdress` varchar(255) DEFAULT NULL,
  `custCompany` varchar(255) DEFAULT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) DEFAULT NULL,
  `edtm` varchar(255) DEFAULT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `created_at`, `updated_at`, `custId`, `custName`, `custNumber`, `custKycNo`, `custKycDtl`, `custAdress`, `custCompany`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(1, '2024-06-23 23:06:42', '2024-06-23 23:06:42', 'ONS240624548', 'Mahi Da', '95185203690', NULL, NULL, NULL, NULL, '0', '2024-06-24', '2024-06-24 04:36:42 AM', 'admin', NULL, NULL, NULL),
(2, '2024-06-23 23:25:28', '2024-06-23 23:25:28', 'ONSC240624868', 'Nitin Gatkare', '78185203694', NULL, NULL, NULL, NULL, '0', '2024-06-24', '2024-06-24 04:55:28 AM', 'admin', NULL, NULL, NULL),
(3, '2024-06-23 23:27:17', '2024-06-23 23:27:17', 'ONSC240624783', 'Mohua Dutta', '88185203677', NULL, NULL, NULL, NULL, '0', '2024-06-24', '2024-06-24 04:57:17 AM', 'admin', NULL, NULL, NULL),
(4, '2024-07-12 00:01:55', '2024-07-12 04:59:09', 'ONSC2407123', 'xsdfsdf', '95185203690', NULL, NULL, NULL, NULL, '1', '2024-07-12', '2024-07-12 05:31:55 AM', 'admin', '2024-07-12', '2024-07-12 10:29:09 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deptNm` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `created_at`, `updated_at`, `deptNm`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(1, '2024-06-07 11:59:54', '2024-06-10 11:59:59', 'Android', '0', '2024-06-07', '2024-06-07 11:59:54 AM', 'admin', '2024-06-10', '2024-06-10 11:59:59 AM', 'admin'),
(2, '2024-06-07 11:59:54', '2024-06-11 10:05:55', 'Web', '0', '2024-06-07', '2024-06-07 11:59:54 AM', 'admin', '2024-06-11', '2024-06-11 10:05:55 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deptNm` varchar(255) NOT NULL,
  `desigNm` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `created_at`, `updated_at`, `deptNm`, `desigNm`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(1, '2024-06-07 06:30:08', '2024-07-02 23:27:11', '1', 'Senior Android Developer', '0', '2024-06-07', '2024-06-07 12:00:08 PM', 'admin', '2024-07-03', '2024-07-03 04:57:11 AM', 'admin'),
(2, '2024-06-07 06:30:08', '2024-06-07 06:30:08', '2', 'Senior WEB Developer', '0', '2024-06-07', '2024-06-07 12:00:08 PM', 'admin', NULL, NULL, NULL),
(3, '2024-06-08 05:35:03', '2024-06-08 06:19:26', '1', 'Android Intern', '0', '2024-06-08', '2024-06-08 11:05:03 AM', 'admin', '2024-06-08', '2024-06-08 11:49:26 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_interaction`
--

CREATE TABLE `main_interaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qryid` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `consultant` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `projectDtls` varchar(255) NOT NULL,
  `projectNote` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) DEFAULT NULL,
  `edtm` varchar(255) DEFAULT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_interaction`
--

INSERT INTO `main_interaction` (`id`, `created_at`, `updated_at`, `qryid`, `dt`, `consultant`, `cost`, `projectDtls`, `projectNote`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(7, '2024-07-11 23:30:29', '2024-07-11 23:30:29', 'ONSQ2407120', '2024-07-12', 'fdgfdg', 'fg', 'fghf', 'fgfghfg', '0', NULL, NULL, NULL, '2024-07-12', '2024-07-12 05:00:29 AM', 'admin'),
(8, '2024-07-11 23:30:51', '2024-07-11 23:30:51', 'ONSQ2407120', '2024-07-12', 'fgh', 'hgj', 'gh', 'gh', '0', NULL, NULL, NULL, '2024-07-12', '2024-07-12 05:00:51 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menuName` varchar(255) NOT NULL,
  `pageUrl` varchar(255) DEFAULT NULL,
  `rootOrder` varchar(255) NOT NULL,
  `menuOrder` varchar(255) NOT NULL DEFAULT '0',
  `user` varchar(255) DEFAULT NULL,
  `isAll` varchar(255) NOT NULL DEFAULT '0' COMMENT '0=all , 1=selected',
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) DEFAULT NULL,
  `edtm` varchar(255) DEFAULT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `created_at`, `updated_at`, `menuName`, `pageUrl`, `rootOrder`, `menuOrder`, `user`, `isAll`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(0, NULL, NULL, 'Root', NULL, '', '0', NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(1, '2024-05-28 06:20:29', '2024-06-06 23:54:03', 'Setup', NULL, '0', '0', NULL, '0', '0', '2024-05-28', '2024-05-28 11:50:29 AM', 'admin', '2024-06-07', '2024-06-07 05:24:03 AM', 'admin'),
(2, '2024-05-28 06:31:53', '2024-06-06 23:54:31', 'Department', 'department', '1', '1', NULL, '0', '0', '2024-05-28', '2024-05-28 12:01:53 PM', 'admin', '2024-06-07', '2024-06-07 05:24:31 AM', 'admin'),
(3, '2024-05-28 06:59:24', '2024-07-12 00:17:39', 'Config', NULL, '0', '40', NULL, '0', '0', '2024-05-28', '2024-05-28 12:29:24 PM', 'admin', '2024-07-12', '2024-07-12 05:47:39 AM', 'admin'),
(6, '2024-05-29 01:35:34', '2024-07-12 00:03:29', 'Menu Setup', 'menuSetup', '3', '0', NULL, '0', '0', '2024-05-29', '2024-05-29 07:05:34 AM', 'admin', '2024-07-12', '2024-07-12 05:33:29 AM', 'admin'),
(7, '2024-05-29 01:36:15', '2024-05-29 01:36:15', 'Designation', 'designation', '1', '2', NULL, '0', '0', '2024-05-29', '2024-05-29 07:06:15 AM', 'admin', NULL, NULL, NULL),
(18, '2024-06-06 04:31:11', '2024-06-06 23:54:53', 'User Setup', 'userSetup', '1', '3', NULL, '0', '0', '2024-06-06', '2024-06-06 10:01:11 AM', 'admin', '2024-06-07', '2024-06-07 05:24:53 AM', 'admin'),
(21, '2024-06-10 03:43:40', '2024-06-11 04:59:11', 'Query', 'query', '1', '4', NULL, '0', '0', '2024-06-10', '2024-06-10 09:13:40 AM', 'admin', '2024-06-11', '2024-06-11 10:29:11 AM', 'admin'),
(22, '2024-06-11 04:57:35', '2024-06-11 04:57:35', 'Action', NULL, '0', '0', NULL, '0', '0', '2024-06-11', '2024-06-11 10:27:35 AM', 'admin', NULL, NULL, NULL),
(23, '2024-06-11 04:59:33', '2024-06-11 04:59:48', 'Interaction History', 'interactionHisotry', '22', '0', NULL, '0', '0', '2024-06-11', '2024-06-11 10:29:33 AM', 'admin', '2024-06-11', '2024-06-11 10:29:48 AM', 'admin'),
(26, '2024-07-12 00:02:58', '2024-07-12 00:03:47', 'VIew', NULL, '0', '2', NULL, '0', '0', '2024-07-12', '2024-07-12 05:32:58 AM', 'admin', '2024-07-12', '2024-07-12 05:33:47 AM', 'admin'),
(27, '2024-07-12 00:27:18', '2024-07-12 00:27:39', 'Customer List', 'customer', '26', '1', NULL, '0', '0', '2024-07-12', '2024-07-12 05:57:18 AM', 'admin', '2024-07-12', '2024-07-12 05:57:39 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_query`
--

CREATE TABLE `main_query` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qryid` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `consultant` varchar(255) NOT NULL,
  `exstCust` varchar(255) DEFAULT '0' COMMENT '0=new customer 1=old custoemr',
  `custId` varchar(255) DEFAULT NULL,
  `custNm` varchar(255) NOT NULL,
  `custNo` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `projectTyp` varchar(255) NOT NULL,
  `projectDtls` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0' COMMENT '0=Pending 1=Accept -1= Reject',
  `edt` varchar(255) DEFAULT NULL,
  `edtm` varchar(255) DEFAULT NULL,
  `eby` varchar(255) DEFAULT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_query`
--

INSERT INTO `main_query` (`id`, `created_at`, `updated_at`, `qryid`, `source`, `consultant`, `exstCust`, `custId`, `custNm`, `custNo`, `dt`, `projectTyp`, `projectDtls`, `cost`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(27, '2024-07-12 04:47:09', '2024-07-12 00:01:55', 'ONSQ2407120', 'dsfsdf', 'dsfsdfd', '0', 'ONS240624548', 'xsdfsdf', '95185203690', '2024-07-12', 'gdfg', 'dfgdf', '506', '1', '2024-07-12', '2024-07-12 10:17:09 AM', 'admin', '2024-07-12', '2024-07-12 05:31:55 AM', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_signup`
--

CREATE TABLE `main_signup` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mob` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `actnum` varchar(255) DEFAULT NULL,
  `userlevel` varchar(255) NOT NULL,
  `signupdate` varchar(255) DEFAULT NULL,
  `lastlogin` varchar(255) DEFAULT NULL,
  `lastloginfail` varchar(255) DEFAULT NULL,
  `numloginfail` varchar(255) DEFAULT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL,
  `eby` varchar(255) NOT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_signup`
--

INSERT INTO `main_signup` (`id`, `created_at`, `updated_at`, `username`, `password`, `pass`, `name`, `mob`, `mail`, `address`, `actnum`, `userlevel`, `signupdate`, `lastlogin`, `lastloginfail`, `numloginfail`, `stat`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`) VALUES
(1, NULL, '2024-07-23 23:50:13', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '1234567890', '', '', '0', '-1', '', '2024-07-24 05:20:13 AM', '2024-06-25 06:55:28 AM', '0', '0', '', '', '', '', '', ''),
(8, '2024-06-08 04:39:33', '2024-06-10 03:42:47', 'e080620244085', 'e080620244085', '36abfa95cab8ccf3f0aa386b0d351641', 'Ayan Das', NULL, NULL, NULL, NULL, '2', '2024-06-08', NULL, NULL, NULL, '0', '2024-06-08', '2024-06-08 10:09:33 AM', 'admin', '2024-06-10', '2024-06-10 09:12:47 AM', 'admin'),
(9, '2024-06-11 04:35:08', '2024-06-11 04:35:08', 'e110620247049', 'e110620247049', '6aca2acda52bb15002010f60d18f71fe', 'Sourav Das', NULL, NULL, NULL, NULL, '2', '2024-06-11', NULL, NULL, NULL, '0', '2024-06-11', '2024-06-11 10:05:08 AM', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_user_type`
--

CREATE TABLE `main_user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `typ` varchar(255) NOT NULL,
  `lvl` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_user_type`
--

INSERT INTO `main_user_type` (`id`, `created_at`, `updated_at`, `typ`, `lvl`, `stat`) VALUES
(1, NULL, NULL, 'admin', '-1', '0'),
(2, NULL, NULL, 'user', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2024_05_23_054957_create_table_main_menu', 1),
(34, '2024_05_23_123558_add_root_order_to_main_menu', 3),
(35, '2024_05_23_123817_add_root_order_to_main_menu', 4),
(54, '2014_10_12_000000_create_users_table', 5),
(60, '2024_05_24_100231_add_is_all_to_main_menu', 6),
(72, '2014_10_12_100000_create_password_resets_table', 7),
(73, '2019_08_19_000000_create_failed_jobs_table', 7),
(74, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(75, '2024_05_23_061148_create_main_menu_table', 7),
(76, '2024_05_23_092549_create_main_signup_table', 7),
(77, '2024_05_28_051500_add_is_all_to_main_menu_table', 7),
(78, '2024_05_28_064246_create_department_table', 7),
(79, '2024_05_29_063238_create_designation_table', 7),
(80, '2024_06_07_113026_create_users_table', 7),
(81, '2024_06_10_042528_create_main_user_type_table', 8),
(82, '2024_06_10_103832_create_main_query_table', 9),
(83, '2024_06_19_123900_create_main_interaction_table', 10),
(84, '2024_06_21_093538_create_main_interaction_table', 11),
(85, '2024_06_22_120307_create_main_customer_table', 12),
(86, '2024_06_22_120927_create_customer_table', 13),
(87, '2024_06_22_123650_create_customer_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `deptNm` varchar(255) NOT NULL,
  `desigNm` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL,
  `eby` varchar(255) NOT NULL,
  `udt` varchar(255) DEFAULT NULL,
  `udtm` varchar(255) DEFAULT NULL,
  `uby` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stat` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `deptNm`, `desigNm`, `name`, `email`, `email_verified_at`, `password`, `edt`, `edtm`, `eby`, `udt`, `udtm`, `uby`, `remember_token`, `created_at`, `updated_at`, `stat`) VALUES
(6, 'e080620244085', '1', '1', 'Ayan Das', NULL, NULL, NULL, '2024-06-08', '2024-06-08 10:09:33 AM', 'admin', '2024-06-10', '2024-06-10 09:12:47 AM', 'admin', NULL, '2024-06-08 04:39:33', '2024-06-10 03:42:47', '0'),
(7, 'e110620247049', '2', '2', 'Sourav Das', NULL, NULL, NULL, '2024-06-11', '2024-06-11 10:05:08 AM', 'admin', NULL, NULL, NULL, NULL, '2024-06-11 04:35:08', '2024-06-11 04:35:08', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `main_interaction`
--
ALTER TABLE `main_interaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_query`
--
ALTER TABLE `main_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_signup`
--
ALTER TABLE `main_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_user_type`
--
ALTER TABLE `main_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_interaction`
--
ALTER TABLE `main_interaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `main_query`
--
ALTER TABLE `main_query`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `main_signup`
--
ALTER TABLE `main_signup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `main_user_type`
--
ALTER TABLE `main_user_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
