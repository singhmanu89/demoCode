-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 12:50 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addanaccount`
--

CREATE TABLE `addanaccount` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nameOfcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `securityCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingaddress` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `additionalmoveincosts`
--

CREATE TABLE `additionalmoveincosts` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `memo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dueon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `securitydeposit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featuresamenities`
--

CREATE TABLE `featuresamenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `leasetype_id` int(11) NOT NULL,
  `startdatetime` datetime NOT NULL,
  `enddatetime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leasetype`
--

CREATE TABLE `leasetype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leasetype`
--

INSERT INTO `leasetype` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Month-to-month Lease', '2017-06-21 06:17:20', '2017-06-21 06:17:20', NULL),
(2, 'Fixed Term Lease', '2017-06-21 06:17:26', '2017-06-21 06:17:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `propertytype_id` int(11) DEFAULT NULL,
  `bedrooms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_bathroom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `half_bathroom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sq_footage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `petpolicy_id` int(11) DEFAULT NULL,
  `featuresamenities_id` int(11) DEFAULT NULL,
  `any_other_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_rent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security_rent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_month_duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `when_avaliable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `move_in_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screening_credit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_check` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listingphoto`
--

CREATE TABLE `listingphoto` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `listing_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `position`, `menu_type`, `icon`, `name`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'User', 'User', NULL, NULL, NULL),
(2, NULL, 0, NULL, 'Role', 'Role', NULL, NULL, NULL),
(3, 0, 1, 'fa-database', 'PropertyType', 'propertyType', 19, '2017-06-21 06:05:43', '2017-06-22 03:42:10'),
(4, 0, 1, 'fa-database', 'LeaseType', 'leaseType', 19, '2017-06-21 06:07:06', '2017-06-22 03:42:01'),
(5, 0, 1, 'fa-database', 'Property', 'property', 18, '2017-06-21 06:17:05', '2017-06-22 03:40:25'),
(6, 0, 1, 'fa-database', 'Petpolicy', 'Pet Policy', 19, '2017-06-22 03:14:08', '2017-06-22 03:41:32'),
(7, 0, 1, 'fa-database', 'FeaturesAmenities', 'Features and Amenities', 19, '2017-06-22 03:14:50', '2017-06-22 03:41:24'),
(8, 0, 1, 'fa-database', 'Listing', 'Listing', 17, '2017-06-22 03:21:20', '2017-06-22 03:39:01'),
(9, 0, 1, 'fa-database', 'ListingPhoto', 'ListingPhoto', 17, '2017-06-22 03:22:43', '2017-06-22 03:39:11'),
(10, 0, 1, 'fa-database', 'Lease', 'lease', 17, '2017-06-22 03:24:22', '2017-06-22 03:39:06'),
(11, 0, 1, 'fa-database', 'Tenants', 'Tenants', NULL, '2017-06-22 03:25:29', '2017-06-22 03:25:29'),
(12, 0, 1, 'fa-database', 'RecurringRent', 'Recurring Rent', NULL, '2017-06-22 03:26:48', '2017-06-22 03:26:48'),
(13, 0, 1, 'fa-database', 'Security', 'Security', NULL, '2017-06-22 03:33:26', '2017-06-22 03:33:26'),
(14, 0, 1, 'fa-database', 'SecurityDeposit', 'Security Deposit', NULL, '2017-06-22 03:34:34', '2017-06-22 03:34:34'),
(15, 0, 1, 'fa-database', 'AdditionalMoveInCosts', 'Additional Move-in Costs', NULL, '2017-06-22 03:35:35', '2017-06-22 03:35:35'),
(16, 0, 1, 'fa-database', 'AddAnAccount', 'Add an Account', NULL, '2017-06-22 03:37:27', '2017-06-22 03:37:27'),
(17, 0, 2, 'fa-database', 'LeaseFolder', 'Lease', NULL, '2017-06-22 03:38:42', '2017-06-22 03:40:38'),
(18, 0, 2, 'fa-database', 'PropertyFolder', 'Property', NULL, '2017-06-22 03:40:10', '2017-06-22 03:40:43'),
(19, 0, 2, 'fa-database', 'Setting', 'Setting', NULL, '2017-06-22 03:41:12', '2017-06-22 03:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`menu_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_10_10_000000_create_menus_table', 1),
(4, '2015_10_10_000000_create_roles_table', 1),
(5, '2015_10_10_000000_update_users_table', 1),
(6, '2015_12_11_000000_create_users_logs_table', 1),
(7, '2016_03_14_000000_update_menus_table', 1),
(8, '2017_06_21_113543_create_propertytype_table', 2),
(9, '2017_06_21_113706_create_leasetype_table', 3),
(10, '2017_06_21_114705_create_property_table', 4),
(11, '2017_06_22_084408_create_petpolicy_table', 5),
(12, '2017_06_22_084450_create_features_amenities_table', 6),
(13, '2017_06_22_085120_create_listing_table', 7),
(14, '2017_06_22_085243_create_listingphoto_table', 8),
(15, '2017_06_22_085422_create_lease_table', 9),
(16, '2017_06_22_085529_create_tenants_table', 10),
(17, '2017_06_22_085648_create_recurring_rent_table', 11),
(18, '2017_06_22_090326_create_security_table', 12),
(19, '2017_06_22_090434_create_securitydeposit_table', 13),
(20, '2017_06_22_090535_create_additional_move-in_costs_table', 14),
(21, '2017_06_22_090727_create_add_an_account_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petpolicy`
--

CREATE TABLE `petpolicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(10) UNSIGNED NOT NULL,
  `propertytype_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multipleunit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `propertytype_id`, `address`, `street`, `city`, `state`, `zip`, `multipleunit`, `unit_name`, `cover_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '<p>test</p>', '1', '2', '2', '121', '1', 'ds', '1498045842-Hydrangeas.jpg', '2017-06-21 06:20:43', '2017-06-21 06:20:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propertytype`
--

CREATE TABLE `propertytype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `propertytype`
--

INSERT INTO `propertytype` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Apartment', '2017-06-21 06:17:42', '2017-06-21 06:17:42', NULL),
(2, 'Single Family Home', '2017-06-21 06:17:48', '2017-06-21 06:17:48', NULL),
(3, 'Duplex/Triplex/Townhouse', '2017-06-21 06:17:54', '2017-06-21 06:17:54', NULL),
(4, 'Mobile/Manufactured Home', '2017-06-21 06:18:00', '2017-06-21 06:18:00', NULL),
(5, 'Dormitory', '2017-06-21 06:18:19', '2017-06-21 06:18:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recurringrent`
--

CREATE TABLE `recurringrent` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `rentamount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monthduedate` date DEFAULT NULL,
  `FirstpaymentDate` date DEFAULT NULL,
  `proratedamount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2017-06-20 04:07:09', '2017-06-20 04:07:09'),
(2, 'Landlord', '2017-06-20 04:07:09', '2017-06-20 04:08:55'),
(3, 'Renter', '2017-06-20 04:09:03', '2017-06-20 04:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `securitydeposit`
--

CREATE TABLE `securitydeposit` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `security_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dueOn` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `units` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `units`) VALUES
(1, 1, 'cozy', 'admin@gmail.com', '$2y$10$oR4u8dC1NoeLGM.MUfZBGeRdKRni6saSmC/bA09ETQy3x3XvSN9bS', 'u3XEWP8FQUfKO5m7OAJq4b7ysym4F34rH6u1VFjd6X5lsXor0EbCjdSrGNxu', '2017-06-20 04:07:27', '2017-06-20 04:07:27', 0),
(2, 2, 'Land', 'land@gmail.com', '$2y$10$oR4u8dC1NoeLGM.MUfZBGeRdKRni6saSmC/bA09ETQy3x3XvSN9bS', '5O8xxwz8tVmbcijjiqWpldJbLR13EPtkl9EvlSGOo3bhAvVf9LsfpJyskAZr', '2017-06-20 05:01:54', '2017-06-20 05:01:54', 3),
(3, 3, 'rent', 'rent@gmail.com', '$2y$10$oR4u8dC1NoeLGM.MUfZBGeRdKRni6saSmC/bA09ETQy3x3XvSN9bS', NULL, '2017-06-20 05:11:52', '2017-06-20 05:11:52', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'updated', 'users', 1, '2017-06-20 04:17:16', '2017-06-20 04:17:16'),
(2, 2, 'updated', 'users', 2, '2017-06-20 05:18:44', '2017-06-20 05:18:44'),
(3, 1, 'created', 'leasetype', 1, '2017-06-21 06:17:20', '2017-06-21 06:17:20'),
(4, 1, 'created', 'leasetype', 2, '2017-06-21 06:17:26', '2017-06-21 06:17:26'),
(5, 1, 'created', 'propertytype', 1, '2017-06-21 06:17:42', '2017-06-21 06:17:42'),
(6, 1, 'created', 'propertytype', 2, '2017-06-21 06:17:48', '2017-06-21 06:17:48'),
(7, 1, 'created', 'propertytype', 3, '2017-06-21 06:17:54', '2017-06-21 06:17:54'),
(8, 1, 'created', 'propertytype', 4, '2017-06-21 06:18:00', '2017-06-21 06:18:00'),
(9, 1, 'created', 'propertytype', 5, '2017-06-21 06:18:19', '2017-06-21 06:18:19'),
(10, 1, 'created', 'property', 1, '2017-06-21 06:20:43', '2017-06-21 06:20:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addanaccount`
--
ALTER TABLE `addanaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additionalmoveincosts`
--
ALTER TABLE `additionalmoveincosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featuresamenities`
--
ALTER TABLE `featuresamenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leasetype`
--
ALTER TABLE `leasetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listingphoto`
--
ALTER TABLE `listingphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD UNIQUE KEY `menu_role_menu_id_role_id_unique` (`menu_id`,`role_id`),
  ADD KEY `menu_role_menu_id_index` (`menu_id`),
  ADD KEY `menu_role_role_id_index` (`role_id`);

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
-- Indexes for table `petpolicy`
--
ALTER TABLE `petpolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertytype`
--
ALTER TABLE `propertytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recurringrent`
--
ALTER TABLE `recurringrent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `securitydeposit`
--
ALTER TABLE `securitydeposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addanaccount`
--
ALTER TABLE `addanaccount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `additionalmoveincosts`
--
ALTER TABLE `additionalmoveincosts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `featuresamenities`
--
ALTER TABLE `featuresamenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lease`
--
ALTER TABLE `lease`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leasetype`
--
ALTER TABLE `leasetype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `listingphoto`
--
ALTER TABLE `listingphoto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `petpolicy`
--
ALTER TABLE `petpolicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `propertytype`
--
ALTER TABLE `propertytype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recurringrent`
--
ALTER TABLE `recurringrent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `securitydeposit`
--
ALTER TABLE `securitydeposit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
