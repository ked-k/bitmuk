-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 03:45 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrio`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_fields`
--

CREATE TABLE `account_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_fields`
--

INSERT INTO `account_fields` (`id`, `account_type_id`, `field_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paypal_email', '2022-02-28 21:12:35', '2022-02-28 21:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `account_type`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', '2022-02-28 20:29:05', '2022-02-28 20:29:05'),
(2, 'Prefect Money', '2022-02-28 20:29:42', '2022-02-28 20:29:42'),
(3, 'Paystack', '2022-02-28 20:30:01', '2022-02-28 20:30:01'),
(4, 'Mobile Money', '2022-02-28 20:30:14', '2022-02-28 20:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `acfs`
--

CREATE TABLE `acfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acfs`
--

INSERT INTO `acfs` (`id`, `key`, `value`, `model_type`, `model_id`) VALUES
(12, 'mobile', '01547855636', 'App\\Models\\WithdrawAccount', 7),
(13, 'email', 'test@email.com', 'App\\Models\\WithdrawAccount', 7),
(14, 'description', 'test', 'App\\Models\\WithdrawAccount', 7),
(20, 'mobile', '126654488', 'App\\Models\\WithdrawAccount', 11),
(21, 'email', 'fchjg@hdf.co', 'App\\Models\\WithdrawAccount', 11),
(22, 'description', 'dfgsdfgdsf', 'App\\Models\\WithdrawAccount', 11),
(23, 'mobile', '01631262589', 'App\\Models\\WithdrawAccount', 13),
(24, 'email', 'script@gmail.com', 'App\\Models\\WithdrawAccount', 13),
(25, 'description', '', 'App\\Models\\WithdrawAccount', 13),
(29, 'Email', 'myaus@paypal.com', 'App\\Models\\WithdrawAccount', 15),
(30, 'Name', 'auspay', 'App\\Models\\WithdrawAccount', 15),
(31, 'Description(Optional)', '', 'App\\Models\\WithdrawAccount', 15),
(32, 'Wallet_Address', 'sdhfdgsfdgvdfvdfvdf', 'App\\Models\\WithdrawAccount', 16),
(33, 'Email', 'efsd@dgfgv.gf', 'App\\Models\\WithdrawAccount', 16);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `type`, `remember_token`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@circlecodes.com', 'admin', NULL, '$2y$10$p9rgrOaLAGZ30Fs2lnYmKOBGBD58SiDCt82JjWeXcgrNfjibaPTU2', '2022-02-27 04:37:12', '2022-03-15 00:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_secret` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `user_id`, `name`, `type`, `api_key`, `api_secret`, `created_at`, `updated_at`) VALUES
(66, 12, 'merchant', 'SANDBOX', 'sk2v4l11sciBj3I1cC5FeAGoIMH6UywIu8fiGgzGlTUId0lCahWSyWfjSwOa', '50LTUSPd3NT6Le70F1Va1q2NyuuBMQybHgC2htSN3gYgFyFg4i', '2022-03-30 13:41:09', '2022-03-30 13:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `wallet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `wallet_name`, `amount`, `created_at`, `updated_at`) VALUES
(9, 1, 'US Dollar', 311.6, '2022-03-15 14:00:46', '2022-03-30 08:14:10'),
(10, 2, 'US Dollar', 805, '2022-03-15 14:27:07', '2022-03-28 11:25:55'),
(11, 12, 'US Dollar', 7.15, '2022-03-15 14:39:09', '2022-03-16 17:09:14'),
(12, 11, 'US Dollar', 3, '2022-03-16 06:26:56', '2022-03-16 16:31:15'),
(13, 11, 'Ghanaian Cedi', 100, '2022-03-16 06:36:17', '2022-03-16 06:36:17'),
(14, 4, 'US Dollar', 50, '2022-03-16 14:51:01', '2022-03-16 14:51:01'),
(17, 1, 'Ghanaian Cedi', 5000, '2022-03-30 05:40:44', '2022-03-30 05:40:44'),
(18, 1, 'Nigerian Naira', 9489, '2022-03-30 05:41:28', '2022-03-30 05:41:45'),
(19, 1, 'Euro', 1000, '2022-03-30 06:43:10', '2022-03-30 06:43:10'),
(20, 13, 'US Dollar', 100, '2022-03-30 08:13:32', '2022-03-30 08:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `best_users`
--

CREATE TABLE `best_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `best_users`
--

INSERT INTO `best_users` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Devid Harison', '1646057854621cd97e130ad.jpg', '2022-02-28 20:17:34', '2022-02-28 20:17:34'),
(2, 'Terence Morgan', '1646057918621cd9be6c6dd.png', '2022-02-28 20:18:38', '2022-02-28 20:18:38'),
(3, 'Maria Cox', '1646057927621cd9c789a30.jpg', '2022-02-28 20:18:47', '2022-02-28 20:18:47'),
(4, 'Lloyd Gregory', '1646057940621cd9d445ed1.jpg', '2022-02-28 20:19:00', '2022-02-28 20:19:00'),
(5, 'Aubrey Pierce', '1646057955621cd9e39422e.jpg', '2022-02-28 20:19:15', '2022-02-28 20:19:15'),
(6, 'Dolores Rodriquez', '1646057971621cd9f35cefb.jpg', '2022-02-28 20:19:31', '2022-02-28 20:19:31'),
(7, 'Ed Lawson', '1646057982621cd9fec0a2f.jpg', '2022-02-28 20:19:42', '2022-02-28 20:19:42'),
(8, 'Alexandra Potter', '1646057993621cda0904c9b.jpg', '2022-02-28 20:19:53', '2022-02-28 20:19:53'),
(9, 'Joe Munoz', '1646058004621cda1422795.jpg', '2022-02-28 20:20:04', '2022-02-28 20:20:04'),
(10, 'Robin Fitzgerald ', '1646058013621cda1d58334.jpg', '2022-02-28 20:20:13', '2022-03-23 13:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `details`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Making the Transaction free and secure', '1648628883624414931ebab.jpg', '<p>    Eagerness it delighted pronounce repulsive furniture no. Excuse few the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused pi</p><p>qued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.Learn how will you win easilyFew the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.vsdfgv Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret int<b>erest. </b></p><p><b>Off tears are day blind smile alone had.dfgdg  </b></p>   dsdsdd', 'transaction,wallet,send money,Deposit', '2022-02-28 20:54:25', '2022-03-30 08:28:03'),
(4, 'How to Transfer User to User', '164862899862441506e7985.jpg', '<div>Eagerness it delighted pronounce repulsive furniture no. Excuse few the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused pi</div><div><br></div><div>qued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.Learn how will you win easilyFew the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.vsdfgv Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest.</div>', 'transfer', '2022-03-28 06:20:04', '2022-03-30 08:29:58'),
(5, 'How this is working as a Merchant API?', '1648629167624415af99b95.jpg', '<div>Eagerness it delighted pronounce repulsive furniture no. Excuse few the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused pi</div><div><br></div><div>qued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.Learn how will you win easilyFew the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest.vsdfgv Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest.</div>', 'Merchant', '2022-03-30 08:32:47', '2022-03-30 08:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `coinbase_webhook_calls`
--

CREATE TABLE `coinbase_webhook_calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci,
  `exception` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `final_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','fail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_category_id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to Send?', 'Deleniti dolorem nisi. Aperiam dolore dolor enim id architecto inventore, cum pariatur iste, reiciendis, quaerat neque.\r\n', '2022-02-28 21:03:29', '2022-03-23 14:31:26'),
(2, 2, 'How to Deposit', 'Deleniti dolorem nisi. Aperiam dolore dolor enim id architecto inventore, cum pariatur iste, reiciendis, quaerat neque', '2022-02-28 21:06:32', '2022-02-28 21:06:32'),
(3, 3, 'What is the payment?', 'Deleniti dolorem nisi. Aperiam dolore dolor enim id architecto inventore, cum pariatur iste, reiciendis, quaerat', '2022-02-28 21:16:15', '2022-03-24 05:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Essentials ', '2022-02-28 21:02:28', '2022-03-23 14:27:32'),
(2, 'Recommended', '2022-02-28 21:02:47', '2022-02-28 21:02:47'),
(3, 'Important', '2022-02-28 21:02:54', '2022-02-28 21:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gateway_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_currency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `gateway_code`, `name`, `logo`, `credentials`, `supported_currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'Paypal', 'assets/images/gateway/paypal.png', '{\"client_id\":\"\",\"client_secret\":\"\",\"app_id\":\"APP-80W284485P519543T\",\"mode\":\"sandbox\"}', '[\"AUD\",\"BRL\",\"CAD\",\"CZK\",\"DKK\",\"EUR\",\"HKD\",\"HUF\",\"INR\",\"ILS\",\"JPY\",\"MYR\",\"MXN\",\"TWD\",\"NZD\",\"NOK\",\"PHP\",\"PLN\",\"GBP\",\"RUB\",\"SGD\",\"SEK\",\"CHF\",\"THB\",\"USD\"]', 1, NULL, NULL),
(2, 'stripe', 'Stripe', 'assets/images/gateway/stripe.png', '{\"stripe_key\":\"pk_test_51KHQhKAmfDlh6wQq4srkOEY3FkivTCXmRSb7bJqr90q3ZkVWAR2AkRWfKBnegpmKAHea5cNVAToiy7yoa3Q075mR00jlhXsZTO\",\"stripe_secret\":\"sk_test_51KHQhKAmfDlh6wQqXfg4ZScnTRahxbdXV0mKw30nOI4f8gtB2v5rho7IyJtZqkf8SwwuNgLTO2WPGFyk9vnFl8gO00MhSe8Kbj\"}', '[\"USD\",\"AUD\",\"BRL\",\"CAD\",\"CHF\",\"DKK\",\"EUR\",\"GBP\",\"HKD\",\"INR\",\"JPY\",\"MXN\",\"MYR\",\"NOK\",\"NZD\",\"PLN\",\"SEK\",\"SGD\"]', 1, NULL, NULL),
(3, 'mollie', 'Mollie', 'assets/images/gateway/mollie.png', '{\"api_key\":\"test_intSTCDEBaDSu28D6DUpn5wnQhTnzB\"}', '[\"USD\",\"EUR\"]', 1, NULL, NULL),
(4, 'perfectmoney', 'Perfect Money', 'assets/images/gateway/perfectmoney.png', '{\"PM_ACCOUNTID\":96793260,\"PM_PASSPHRASE\":\"77887848a\",\"PM_MARCHANTID\":\"U36928259\",\"PM_MARCHANT_NAME\":\"tdevs\"}', '[\"USD\",\"EUR\"]', 1, NULL, NULL),
(5, 'coinbase', 'Coinbase', 'assets/images/gateway/coinbase.png', '{\"PM_ACCOUNTID\":96793260,\"PM_PASSPHRASE\":\"77887848a\",\"PM_MARCHANTID\":\"U36928259\",\"PM_MARCHANT_NAME\":\"tdevs\"}', '[\"USD\",\"EUR\"]', 1, NULL, NULL),
(6, 'paystack', 'Paystack', 'assets/images/gateway/paystack.png', '{\"public_key\":\"pk_test_8e60e513e47ba5619ac0888c9fac99f2853641fa\",\"secret_key\":\"sk_test_e521a3c6d1c37897092868e02e0ddba8c3f0aa01\",\"merchant_email\":\"learn2222earn@gmail.com\"}', '[\"GHS\"]', 1, NULL, '2022-02-27 12:00:25'),
(7, 'voguepay', 'Voguepay', 'assets/images/gateway/voguepay.png', '{\"merchant_id\":\"sandbox_760e43f202878f651659820234cad9\"}', '[\"NGN\"]', 1, NULL, '2022-02-28 08:49:39'),
(9, 'manual', 'Paypal', 'img/16466473256225d81d28d95.png', '{\"Email\":\"paypal@email.com\",\"Mobile\":\"4256365879\"}', '[\"BDT\"]', 1, '2022-03-07 10:02:05', '2022-03-30 12:48:03'),
(11, 'manual', 'paytm', 'img/1647413732623189e4d02f6.png', '{\"mobile\":\"+919417975203\"}', '[\"BDT\"]', 1, '2022-03-16 06:55:32', '2022-03-16 06:55:32'),
(12, 'manual', 'Mobile Money', 'img/164863192762442077bfe08.png', '{\"Email\":\"dgkjfv@gsdkljn.bg\",\"Mobile\":\"2542987986\"}', '[\"BDT\"]', 1, '2022-03-30 09:18:47', '2022-03-30 12:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `sort`, `name`, `content`, `background_color`, `blade`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'banner_section', '{\"span\":\"Best\",\"span_title\":\"Wallet System over the world\",\"title\":\"THE LOWEST 1.55% FEE WALLET\",\"line\":[\"Deposit Instantly and Use\",\"Transfer to your friend\",\"Get paid from the eCommerce\",\"Share user referral link to earn commission\"],\"button_text\":\"Account\",\"button_link\":\"\\/login\",\"foreground_image\":\"img\\/1648124880623c63d0b4a74.png\",\"background_image\":\"img\\/1648124880623c63d0d2375.jpg\"}', 'blue-bg', '__hero_area', 1, NULL, '2022-03-24 06:28:00'),
(3, 3, 'special_section', '{\"span\":\"NEW\",\"span_title\":\"Why Choose us\",\"title\":\"We\'re Special\"}', 'blue-bg', '__why_choose_us', 1, NULL, NULL),
(4, 4, 'about_section', '{\"span\":\"Find\",\"span_title\":\"What we do?\",\"title\":\"There Is What We Do\",\"image\":\"front-assets\\/images\\/about.jpg\",\"video_link\":\"https:\\/\\/www.youtube.com\\/watch?v=DJyxwIGdl8Y\",\"content\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, veniam. Quisquam dicta, atque nemo error impedit necessitatibus, incidunt rem architecto optio facilis aut illo labore numquam et soluta quo. Ratione! Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem aliquam amet nulla eius voluptates rem numquam ipsa, dolores ratione soluta quo tempora, quis sit. Amet fugit autem nobis officiis eius.\",\"paragraph_title_1\":\"Mission\",\"paragraph_content_1\":\"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, velit. Facere pariatur iste cupiditate ea, animi nihil dolor iusto amet error libero aut deleniti quas laboriosam accusamus, unde quisquam dolorem. Lorem ipsum, dolor sit amet consectetur adipisicing elit\",\"paragraph_title_2\":\"Vission\",\"paragraph_content_2\":\"Inventore? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, inventore quae laudantium accusamus adipisci sequi veritatis saepe aspernatur libero fuga illo voluptas nihil. Sequi, quis aspernatur! Deserunt pariatur quas reiciendis!\",\"button_text\":\"CONTINUE READING\",\"button_link\":\"\\/page\\/about\"}', 'blue-bg', '__about_area', 1, NULL, '2022-03-30 08:47:20'),
(5, 5, 'solution', '{\"span\":\"Our App\",\"span_title\":\"Anyone can use\",\"title\":\"Solutions For\"}', 'blue-bg', '__solution_section', 1, NULL, '2022-03-30 08:46:57'),
(6, 6, 'steps', '{\"span\":\"Features\",\"span_title\":\"What we\'re doing?\",\"title\":\"Follow This Stepts\"}', 'blue-bg', '__what_we_do', 1, NULL, '2022-03-30 08:46:40'),
(7, 7, 'referral_commission', '{\"title\":\"Get the bonus up to\",\"up_bonus\":\"$199\",\"button_text\":\"SIGNUP NOW\",\"button_link\":\"#\",\"title_2\":\"Lastest bonus winners\"}', 'blue-bg', '__call_to_action', 1, NULL, NULL),
(8, 8, 'best_user', '{\"span\":\"Our\",\"span_title\":\"Top Users\",\"title\":\"Best Users\",\"button_text\":\"SIGNUP NOW\",\"button_link\":\"register\"}', 'blue-bg', '__new_user_area', 1, NULL, '2022-03-30 08:44:49'),
(9, 9, 'counter', '{\"background_image\":\"img\\/1648124880623c63d0d2375.jpg\"}', 'blue-bg', '__counter_area', 1, NULL, NULL),
(10, 10, 'testimonial', '{\"span\":\"Testimonials\",\"span_title\":\"What users say about us\",\"title\":\"You Will Get Confident To Start Using Us\"}', 'blue-bg', '__testimonials', 1, NULL, '2022-03-30 08:44:06'),
(11, 11, 'mobile_feature', '{\"span\":\"Get\",\"span_title\":\"Mobile app\",\"title\":\"Get Your Mobile Now\",\"image\":\"front-assets\\/images\\/mobile.png\",\"image_2\":\"front-assets\\/images\\/mobile-2.png\",\"image_3\":\"front-assets\\/images\\/mobile-3.png\",\"image_4\":\"front-assets\\/images\\/mobile-4.png\",\"image_5\":\"front-assets\\/images\\/mobile-5.png\"}', 'blue-bg', '__mobile_app', 1, NULL, '2022-03-30 08:44:24'),
(12, 12, 'team', '{\"span\":\"Progressive\",\"span_title\":\"Team\",\"title\":\"Our Team\"}', 'blue-bg', '__team_section', 1, NULL, '2022-03-30 08:22:32'),
(13, 13, 'blog', '{\"span\":\"Our\",\"span_title\":\"Blog section\",\"title\":\"Latest News\"}', 'blue-bg', '__blog_section', 1, NULL, '2022-03-30 08:21:56'),
(14, 14, 'payment_gateway', '[{\"image\":\"front-assets\\/images\\/payments\\/1.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/2.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/3.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/4.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/5.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/1.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/1.png\",\"link\":\"#\"},{\"image\":\"front-assets\\/images\\/payments\\/6.png\",\"link\":\"#\"}]', 'blue-bg', '__payment_area', 1, NULL, NULL),
(15, 15, 'subscribe', '{\"span\":\"Newsletter\",\"span_title\":\"Stay updated\",\"button_text\":\"SUBSCRIBE\"}', 'blue-bg', '__newsletter', 1, NULL, '2022-03-30 08:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_counters`
--

CREATE TABLE `home_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_counters`
--

INSERT INTO `home_counters` (`id`, `icon`, `value`, `title`, `created_at`, `updated_at`) VALUES
(1, 'flaticon-011-share', '5246', 'Total Deposit', '2022-02-28 20:31:44', '2022-02-28 20:31:44'),
(2, 'flaticon-028-coins', '5246', 'Total Users', '2022-02-28 20:36:19', '2022-02-28 20:36:19'),
(3, 'flaticon-026-hierarchy', '524', 'Total Referral', '2022-02-28 20:38:24', '2022-02-28 20:38:24'),
(4, 'flaticon-2991877', '65486', 'Daily Transaction', '2022-02-28 20:39:25', '2022-02-28 20:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_features`
--

CREATE TABLE `home_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_features`
--

INSERT INTO `home_features` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Use to pay bill', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-27 04:40:53', '2022-02-28 20:42:24'),
(2, 'Easy to manage', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-27 04:41:03', '2022-02-28 20:42:36'),
(3, 'Monitor live', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 20:42:47', '2022-02-28 20:42:47'),
(4, 'See Statistics', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 20:43:00', '2022-02-28 20:43:00'),
(5, 'Instantly Transaction', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 21:37:07', '2022-02-28 21:37:07'),
(6, 'Use to pay bill', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 21:37:19', '2022-02-28 21:37:19'),
(7, 'Reliability', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 21:37:33', '2022-02-28 21:37:33'),
(8, 'Use to pay bill', 'Necessitatibus iure eum temporibus quo expedita officiis, amet, distinctio accusantium tempora saepe', '2022-02-28 21:37:42', '2022-02-28 21:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `home_gateways`
--

CREATE TABLE `home_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_gateways`
--

INSERT INTO `home_gateways` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, '1646060335621ce32f389d4.png', 'https://paypal.com', '2022-02-28 20:58:39', '2022-02-28 20:58:55'),
(2, '1646060433621ce3919c005.png', 'https://paypal.com', '2022-02-28 21:00:33', '2022-02-28 21:00:33'),
(3, '1646060443621ce39bb2986.png', 'https://paypal.com', '2022-02-28 21:00:43', '2022-02-28 21:00:43'),
(4, '1646060458621ce3aa19a27.png', 'https://paypal.com', '2022-02-28 21:00:58', '2022-02-28 21:00:58'),
(5, '1646060466621ce3b21ef5c.png', 'https://paypal.com', '2022-02-28 21:01:06', '2022-02-28 21:01:06'),
(6, '1646060473621ce3b9187a6.png', 'https://paypal.com', '2022-02-28 21:01:13', '2022-02-28 21:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `home_referrals`
--

CREATE TABLE `home_referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_referrals`
--

INSERT INTO `home_referrals` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Devid Luis', '150', '2022-02-28 20:12:38', '2022-02-28 20:12:38'),
(2, 'Kiral Fuli', '259', '2022-02-28 20:14:20', '2022-02-28 20:14:20'),
(3, 'Kevin won', '250', '2022-02-28 20:15:21', '2022-02-28 20:15:21'),
(4, 'Potrik won', '654', '2022-02-28 20:15:31', '2022-02-28 20:15:31'),
(5, 'York won', '652', '2022-02-28 20:15:44', '2022-02-28 20:15:44'),
(6, 'Rick won', '214', '2022-02-28 20:15:57', '2022-02-28 20:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `home_solutions`
--

CREATE TABLE `home_solutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_solutions`
--

INSERT INTO `home_solutions` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '1646056736621cd520a0231.jpg', 'eCommerce', 'Dolorem accusamus maiores hic assumenda illum perferendis', '2022-02-28 09:09:39', '2022-02-28 19:58:56'),
(2, '1646056969621cd609a516d.jpg', 'Internet Retailer', 'Dolorem accusamus maiores hic assumenda illum perferendis', '2022-02-28 20:02:49', '2022-02-28 20:02:49'),
(3, '1646057001621cd6298b21f.jpg', 'Affiliate Marketer', 'Dolorem accusamus maiores hic assumenda illum perferendis', '2022-02-28 20:03:21', '2022-02-28 20:03:21'),
(4, '1646057036621cd64c89148.jpg', 'Online Professional', 'Dolorem accusamus maiores hic assumenda illum perferendis', '2022-02-28 20:03:56', '2022-02-28 20:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `home_specials`
--

CREATE TABLE `home_specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_specials`
--

INSERT INTO `home_specials` (`id`, `icon`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'flaticon-007-user', 'Stable Usability', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 09:11:44', '2022-02-28 13:18:07'),
(2, 'flaticon-006-wallet', 'Different Wallet', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 13:18:38', '2022-02-28 13:18:38'),
(3, 'flaticon-2991852', 'Multiple Currency', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 13:20:00', '2022-02-28 13:20:00'),
(4, 'flaticon-2991872', 'Low Rate', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 19:20:20', '2022-02-28 19:20:20'),
(5, 'flaticon-2991871', 'Different Wallet', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 19:20:49', '2022-02-28 19:20:49'),
(6, 'flaticon-023-line-chart', 'Multiple Currency', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 19:21:17', '2022-02-28 19:21:17'),
(7, 'flaticon-030-carrier', 'Low Rate', 'Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui', '2022-02-28 19:21:35', '2022-02-28 19:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `home_steps`
--

CREATE TABLE `home_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_steps`
--

INSERT INTO `home_steps` (`id`, `icon`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'ti-ruler-pencil', 'Send Money', 'Quae omnis et alias quisquam quod? Laborum accusamus sed exercitationem quod', '2022-02-28 20:05:17', '2022-03-05 23:06:35'),
(2, 'ti-package', 'Currency Exchange', 'Quae omnis et alias quisquam quod? Laborum accusamus sed exercitationem quod', '2022-02-28 20:10:50', '2022-03-05 23:05:46'),
(3, 'ti-cup', 'Deposit', 'Quae omnis et alias quisquam quod? Laborum accusamus sed exercitationem quod', '2022-02-28 20:11:04', '2022-03-05 23:05:31'),
(4, 'ti-layout', 'Withdraw', 'Quae omnis et alias quisquam quod? Laborum accusamus sed exercitationem quod', '2022-02-28 20:11:32', '2022-03-05 23:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `home_testimonials`
--

CREATE TABLE `home_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_testimonials`
--

INSERT INTO `home_testimonials` (`id`, `title`, `image`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Marketer', '1646059252621cdef4e3ac1.png', 'Leo Paris', 'Rerum vitae commodi dicta error quaerat debitis magnam numquam earum! In vel dolorum repudiandae aspernatur praesentium incidunt molestias enim quis sapiente perspiciatis', '2022-02-28 20:40:52', '2022-02-28 20:40:52'),
(2, 'Online Professional', '1646059294621cdf1e7e886.jpg', 'Harison', 'Rerum vitae commodi dicta error quaerat debitis magnam numquam earum! In vel dolorum repudiandae aspernatur praesentium incidunt molestias enim quis sapiente perspiciatis', '2022-02-28 20:41:34', '2022-02-28 20:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'flaticon-009-percentage', 'Deposit Money', 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat', '2022-03-16 01:30:26', '2022-03-16 14:14:45'),
(3, 'flaticon-034-bank ', 'Send Money', 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat', '2022-03-16 14:15:57', '2022-03-23 14:26:21'),
(4, 'flaticon-034-bank', 'Withdraw Money', 'Nobis, quasi porro eligendi eos inventore dignissimos, velit necessitatibus quaerat', '2022-03-28 05:45:49', '2022-03-28 05:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kycs`
--

CREATE TABLE `kycs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `selfe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_or_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('approved','rejected','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kycs`
--

INSERT INTO `kycs` (`id`, `user_id`, `selfe`, `driving_or_passport`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, '1646215836621f429ca4cd5.jpg', '1646215836621f429ca7c77.jpg', 'approved', '2022-03-02 16:10:36', '2022-03-02 16:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_details`
--

CREATE TABLE `language_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', '2022-02-27 04:38:17', '2022-02-27 04:38:17'),
(2, 'Footer Menu', '2022-02-27 04:38:27', '2022-02-27 04:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` enum('_self','_blank') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `label`, `link`, `icon`, `parent`, `sort`, `class`, `target`, `menu`, `depth`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Home', '/', '', 0, 0, '', '_self', 1, 1, '2022-02-28 11:09:41', '2022-03-23 13:42:33', 0),
(2, 'About', '/page/about', '', 0, 2, '', '_self', 1, 1, '2022-02-28 11:10:10', '2022-03-23 13:42:33', 0),
(3, 'Contact ', '/page/contact', '', 0, 4, '', '_self', 1, 1, '2022-02-28 11:10:10', '2022-03-24 13:06:44', 0),
(8, 'About', '/page/about', NULL, 0, 1, NULL, '_self', 2, 0, '2022-02-28 21:01:37', '2022-02-28 21:01:37', 0),
(9, 'Contact', '/page/contact', NULL, 0, 2, NULL, '_self', 2, 0, '2022-02-28 21:01:37', '2022-02-28 21:01:37', 0),
(11, 'Privacy Policy', '/page/privacy-policy', NULL, 0, 4, NULL, '_self', 2, 0, '2022-02-28 21:01:37', '2022-02-28 21:01:37', 0),
(12, 'FAQ', '/page/faq', NULL, 0, 5, NULL, '_self', 2, 0, '2022-02-28 21:01:37', '2022-02-28 21:01:37', 0),
(13, 'Blog', '/blog', '', 0, 3, '', '_self', 1, 1, '2022-03-08 06:35:40', '2022-03-23 13:42:33', 0),
(17, 'How it works', '/page/how-it-works', '', 0, 1, '', '_self', 1, 1, '2022-03-16 06:10:20', '2022-03-23 13:42:33', 0),
(25, 'Api Documentation', '/api-documentation', '', 0, 5, '', '_self', 1, 1, '2022-03-27 11:51:22', '2022-03-27 15:18:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_payments`
--

CREATE TABLE `merchant_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipn_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2017_08_11_073824_create_menus_wp_table', 1),
(5, '2017_08_11_074006_create_menu_items_wp_table', 1),
(6, '2019_01_01_000000_create_api_keys_table', 1),
(7, '2019_01_05_293551_add-role-id-to-menu-items-table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_01_01_103301_create_admins_table', 1),
(11, '2022_01_03_090904_create_tickets_table', 1),
(12, '2022_01_03_095812_create_scategories_table', 1),
(13, '2022_01_04_084415_create_ticket_comments_table', 1),
(14, '2022_01_05_053002_create_activity_log_table', 1),
(15, '2022_01_06_071408_create_languages_table', 1),
(16, '2022_01_06_084500_create_language_details_table', 1),
(17, '2022_01_09_051544_create_settings_table', 1),
(18, '2022_01_11_042545_create_deposits_table', 1),
(19, '2022_01_11_043526_create_transactions_table', 1),
(20, '2022_01_11_064610_create_wallets_table', 1),
(21, '2022_01_11_100941_create_balances_table', 1),
(22, '2022_01_12_015314_create_gateways_table', 1),
(23, '2022_01_15_095309_create_withdraw_accounts_table', 1),
(24, '2022_01_16_042515_create_withdraws_table', 1),
(25, '2022_01_17_051417_create_acfs_table', 1),
(26, '2022_01_17_070922_create_account_types_table', 1),
(27, '2022_01_17_071104_create_account_fields_table', 1),
(28, '2022_01_19_043642_create_referral_programs_table', 1),
(29, '2022_01_19_044054_create_referral_links_table', 1),
(30, '2022_01_19_044652_create_referral_relationships_table', 1),
(31, '2022_02_06_064425_create_pages_table', 1),
(32, '2022_02_07_050543_create_homes_table', 1),
(33, '2022_02_08_055333_create_blogs_table', 1),
(34, '2022_02_09_055132_create_best_users_table', 1),
(35, '2022_02_09_060233_create_teams_table', 1),
(36, '2022_02_09_060836_create_subscribes_table', 1),
(37, '2022_02_09_061651_create_faq_categories_table', 1),
(38, '2022_02_09_061813_create_faqs_table', 1),
(39, '2022_02_14_070647_create_coinbase_webhook_calls_table', 1),
(40, '2022_02_22_113030_create_kycs_table', 1),
(41, '2022_02_25_212218_create_home_specials_table', 1),
(42, '2022_02_25_225530_create_home_solutions_table', 1),
(43, '2022_02_26_043721_create_home_referrals_table', 1),
(44, '2022_02_26_051347_create_home_counters_table', 1),
(45, '2022_02_26_052506_create_home_testimonials_table', 1),
(46, '2022_02_26_054938_create_home_features_table', 1),
(47, '2022_02_26_055210_create_home_gateways_table', 1),
(48, '2022_02_26_103138_create_home_steps_table', 1),
(49, '2022_03_06_114333_create_trix_rich_texts_table', 2),
(51, '2022_03_07_051020_create_withdraw_methods_table', 3),
(53, '2022_03_12_092514_create_verification_codes_table', 4),
(55, '2022_03_12_094901_create_merchant_payments_table', 5),
(56, '2022_03_13_103348_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('static','dynamic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dynamic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `label`, `url`, `component`, `type`, `created_at`, `updated_at`) VALUES
(1, 'About', '/page/about', '{\"breadcrumb_image\":\"164844662462414ca0e14c7.jpg\",\"breadcrumb_title\":\"About Us\",\"section_title\":\"About us\",\"section_span\":\"best\",\"section_big_title\":\"Explore Us, Know About Us\",\"content\":\"Sit amet consectetur adipisicing elit. Doloremque, similique! Magni ullam quas deleniti et fugit cumque animi praesentium. Eum eos alias facere recusandae, quidem culpa magni officiis. Nisi, ullam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum voluptate  Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quo deleniti non enim possimus unde ex sed odio rerum expedita aliquam corporis reiciendis architecto inventore assumenda obcaecati fuga, dolorum ea Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit vero consequuntur minus dolorem blanditiis laborum nemo. Error, quo aliquam reiciendis voluptatibus vero quam nostrum minima qui doloremque soluta officiis iusto? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod sed sit adipisci harum, facere consequatur cumque commodi, quaerat mollitia maiores libero est alias tempora odit dignissimos quo quas laboriosam\",\"cover_image\":\"164741897362319e5d70d82.png\",\"main_content\":\"yertet&nbsp;Sit amet consectetur adipisicing elit. Doloremque, similique! Magni ullam quas deleniti et fugit cumque animi praesentium. Eum eos alias facere recusandae, quidem culpa magni officiis. Nisi, ullam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum voluptate Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quo deleniti non enim possimus unde ex sed odio rerum expedita aliquam corporis reiciendis architecto inventore assumenda obcaecati fuga, dolorum ea Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit vero consequuntur minus dolorem blanditiis laborum nemo. Error, quo aliquam reiciendis voluptatibus vero quam nostrum minima qui doloremque soluta officiis iusto? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod sed sit adipisci harum, facere consequatur cumque commodi, quaerat mollitia maiores libero est alias tempora odit dignissimos quo quas laboriosam<br><br>Sit amet consectetur adipisicing elit. Doloremque, similique! Magni ullam quas deleniti et fugit cumque animi praesentium. Eum eos alias facere recusandae, quidem culpa magni officiis. Nisi, ullam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum voluptate Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quo deleniti non enim possimus unde ex sed odio rerum expedita aliquam corporis reiciendis architecto inventore assumenda obcaecati fuga, dolorum ea Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit vero consequuntur minus dolorem blanditiis laborum nemo. Error, quo aliquam reiciendis voluptatibus vero quam nostrum minima qui doloremque soluta officiis iusto? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod sed sit adipisci harum, facere consequatur cumque commodi, quaerat mollitia maiores libero est alias tempora odit dignissimos quo quas laboriosam<br>\"}', 'static', NULL, '2022-03-28 05:51:11'),
(2, 'Contact', '/page/contact', '{\"breadcrumb_image\":\"164844670562414cf11964e.jpg\",\"breadcrumb_title\":\"Message Us\",\"section_title\":\"Any query?\",\"section_span\":\"NEW\"}', 'static', NULL, '2022-03-28 05:51:45'),
(3, 'How it works', '/page/how-it-works', '{\"breadcrumb_image\":\"164839291562407ad3b75d9.jpg\",\"breadcrumb_title\":\"How it works\",\"section_title\":\"Any query?\",\"section_span\":\"NEW\",\"section_big_title\":\"How Affiliate Works\"}', 'static', NULL, '2022-03-27 14:55:15'),
(4, 'Privacy Policy', '/page/privacy-policy', '{\"breadcrumb_image\":\"1648448203624152cb2d6f1.jpg\",\"breadcrumb_title\":\"Privacy Policy\",\"section_title\":\"Rules & Policy\",\"section_span\":\"NEW\",\"main_content\":\"<p class=\\\"\\\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque perferendis autem placeat magnam voluptas, aliquid eius distinctio nulla fuga at dolor dolorum rem corrupti assumenda repellat commodi voluptatem modi omnis? Tristique tristique, odio ullamcorper aspernatur praesent, vestibulum egestas vestibulum enim blandit non, placerat pellentesque dolor ut. Conntum blandit. Velit erat sit, consectetuer tincidunt, dictum fermentum eu a lacinia. Mauris suscipit sit hymenaeos cras molestie purus, integer pede est ac, ultricies euismod habitasse lorem lorem ut. Ante sollicitudin nec et donec. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad explicabo vero ipsa placeat, quo in consequatur et, quae distinctio, sequi expedita dolores libero accusamus delectus itaque debitis quas excepturi voluptatum!<\\/p><h5 class=\\\"\\\">Regulation 1:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 2:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 3:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 4:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 5:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 6:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><h5 class=\\\"\\\">Regulation 7:<\\/h5><p class=\\\"\\\">Ad recusandae magni maiores, pariatur, perspiciatis autem impedit voluptates fugit inventore hic quo sunt asperiores aliquam cumque laboriosam officiis vitae temporibus corrupti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, repudiandae eligendi rerum sit, eius porro dolorum in autem totam repellat tempora eveniet nam doloremque asperiores suscipit dicta, ullam voluptatum. Lorem, ipsum dolor sit amet consectetur adipisicing elit<\\/p><p class=\\\"\\\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque perferendis autem placeat magnam voluptas, aliquid eius distinctio nulla fuga at dolor dolorum rem corrupti assumenda repellat commodi voluptatem modi omnis? Tristique tristique, odio ullamcorper aspernatur praesent, vestibulum egestas vestibulum enim blandit non, placerat pellentesque dolor ut. Conntum blandit. Velit erat sit, consectetuer tincidunt, dictum fermentum eu a lacinia. Mauris suscipit sit hymenaeos cras molestie purus, integer pede est ac, ultricies euismod habitasse lorem lorem ut. Ante sollicitudin nec et donec. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad explicabo vero ipsa placeat, quo in consequatur et, quae distinctio, sequi expedita dolores libero accusamus delectus itaque debitis quas excepturi voluptatum!<\\/p><p><\\/p>\"}', 'static', NULL, '2022-03-28 06:16:43'),
(5, 'FAQ', '/page/faq', '{\"breadcrumb_image\":\"164844676662414d2e760d4.jpg\",\"breadcrumb_title\":\"Find Questions\",\"section_title\":\"Any asking?\",\"section_span\":\"NEW\",\"button-text\":\"STILL ASKING?\"}', 'static', NULL, '2022-03-28 05:52:46'),
(9, 'Blog', '/blog', '{\"breadcrumb_image\":\"16486216676243f86338902.jpg\",\"breadcrumb_title\":\"Blog\",\"section_title\":\"Lastest articles\"}', 'static', NULL, '2022-03-28 05:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_links`
--

CREATE TABLE `referral_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `referral_program_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_links`
--

INSERT INTO `referral_links` (`id`, `user_id`, `referral_program_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'da8c05d6-97b9-11ec-a766-8c89a5c35cea', '2022-02-27 04:41:43', '2022-02-27 04:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `referral_programs`
--

CREATE TABLE `referral_programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lifetime_minutes` int(11) NOT NULL DEFAULT '10080',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_programs`
--

INSERT INTO `referral_programs` (`id`, `name`, `uri`, `lifetime_minutes`, `created_at`, `updated_at`) VALUES
(1, 'Deposit', 'register', 10080, '2022-02-27 04:37:13', '2022-02-27 04:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `referral_relationships`
--

CREATE TABLE `referral_relationships` (
  `id` int(10) UNSIGNED NOT NULL,
  `referral_link_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scategories`
--

CREATE TABLE `scategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Payrio', '2022-02-27 04:37:12', '2022-03-30 07:58:51'),
(2, 'site_copyright', 'Copyright 2022 Payrio.', '2022-02-27 04:37:12', '2022-03-30 07:58:51'),
(3, 'logo', '1648126912623c6bc0298c8.png', '2022-02-27 04:37:12', '2022-03-24 13:01:52'),
(4, 'favicon', '1648126912623c6bc02c6c0.png', '2022-02-27 04:37:12', '2022-03-24 13:01:52'),
(5, 'site_color_scheme', 'green', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(6, 'currency', 'usd', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(7, 'user_registration', '1', '2022-02-27 04:37:12', '2022-03-08 06:02:54'),
(8, 'email_verification', '1', '2022-02-27 04:37:12', '2022-03-30 07:58:51'),
(9, 'send_money_fee', '2', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(10, 'referral', '{\"percentage\":0,\"commission\":10,\"wallet\":\"US Dollar\"}', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(11, 'facebook_link', '#', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(12, 'instagram_link', '#', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(13, 'twitter_link', '#', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(14, 'pinterest_link', '#', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(15, 'gdpr_cookie', '{\"status\":\"on\",\"description\":\"Please allow us to collect data about how you use our website. We will use it to improve our website, make your browsing experience and our business decisions better. Learn more,\",\"url\":\"\\/privacy-policy\",\"url_level\":\"Privacy Policy\"}', '2022-02-27 04:37:12', '2022-03-23 19:26:13'),
(16, 'home_page', '1', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(17, 'tawk_chat', '{\"status\":1,\"description\":\"test description\"}', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(18, 'google_recaptcha', '{\"status\":1,\"description\":\"test description\"}', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(19, 'google_analytics', '{\"status\":1,\"description\":\"test description\"}', '2022-02-27 04:37:12', '2022-02-27 04:37:12'),
(20, 'facebook_analytics', '{\"status\":1,\"description\":\"test description\"}', '2022-02-27 04:37:12', '2022-02-27 04:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `title`, `image`, `social`, `created_at`, `updated_at`) VALUES
(1, 'Robin Fitzgerald', 'CEO and Founder', '1648629651624417936f4ec.jpg', '{\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\",\"pinterest\":\"#\",\"linkedin\":\"#\"}', '2022-02-28 20:45:37', '2022-03-30 08:40:51'),
(2, 'Joe Munoz', 'CTO', '1648629694624417be00140.jpg', '{\"facebook\":\"\",\"twitter\":\"\",\"instagram\":\"\",\"pinterest\":\"\",\"linkedin\":\"\"}', '2022-02-28 20:50:42', '2022-03-30 08:41:34'),
(3, 'Maria Cox', 'Marketing', '1648629684624417b45b588.jpg', '{\"facebook\":\"#\",\"twitter\":\"\",\"instagram\":\"\",\"pinterest\":\"#\",\"linkedin\":\"#\"}', '2022-02-28 20:51:14', '2022-03-30 08:41:24'),
(4, 'Aubrey Pierce', 'HR Admin', '1648629734624417e6586dd.jpg', '{\"facebook\":\"\",\"twitter\":\"#\",\"instagram\":\"\",\"pinterest\":\"\",\"linkedin\":\"\"}', '2022-02-28 20:51:41', '2022-03-30 08:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `scategory_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `trxid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('deposit','manual_deposit','send_money','referral','withdraw','receive_money','payment','make_payment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `final_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','fail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','merchant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `2fa` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `email`, `phone`, `avatar`, `address`, `city`, `state`, `zip`, `country`, `merchant_name`, `merchant_email`, `merchant_address`, `merchant_proof`, `status`, `2fa`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'last', 'user', 'user@circlecodes.com', '55645896355666', '16484487836241550f98758.png', 'gabtoli', '', 'dhaka', '1600', 'Andorra', 'Rhiannon Richardson', 'mokaje@mailinator.com', 'susycyri@mailinator.com', 'xyzisoj@mailinator.com', 1, 0, '2022-02-27 04:37:14', '$2y$10$9JV.odT5/QK23BTxpDHrC.F8zIZBQVRJVRU3eB/u0/FSRX3ZWwJti', NULL, NULL, NULL, '2022-02-27 04:37:14', '2022-03-28 11:39:10'),
(12, 'mr.', 'merchantt', 'merchant', 'merchant@circlecodes.com', '+20 1458745245', '16485382296242b275549d3.jpg', '', '', '', '', 'Egypt', 'merchant', 'merchant@tdevs.co', 'merchant', 'merchant', 1, 0, '2022-03-29 15:13:16', '$2y$10$KvMPbn0dtYpoLuz55qkD1OMFxhALBYApPQutjzks040qbJmgn6w.m', NULL, NULL, NULL, '2022-02-28 22:28:41', '2022-03-30 08:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifiable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `name`, `currency`, `symbol`, `created_at`, `updated_at`) VALUES
(2, 'US Dollar', 'USD', '$', NULL, '2022-03-09 16:07:08'),
(3, 'Ghanaian Cedi', 'GHS', 'GH¢', '2022-02-27 04:56:39', '2022-03-10 04:28:20'),
(4, 'Nigerian Naira', 'NGN', '₦', '2022-02-28 08:19:50', '2022-03-10 05:05:35'),
(7, 'Euro', 'EUR', '€', '2022-03-27 12:31:16', '2022-03-27 12:31:16'),
(8, 'Australian Dollar', 'AUD', '$', '2022-03-30 06:59:36', '2022-03-30 06:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `balance_id` int(10) UNSIGNED NOT NULL,
  `withdraw_account_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','fail') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_accounts`
--

CREATE TABLE `withdraw_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `withdraw_method_id` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_accounts`
--

INSERT INTO `withdraw_accounts` (`id`, `user_id`, `withdraw_method_id`, `created_at`, `updated_at`) VALUES
(7, 12, 9, '2022-03-08 08:29:03', '2022-03-08 08:29:03'),
(11, 11, 9, '2022-03-16 07:12:59', '2022-03-16 07:12:59'),
(13, 1, 9, '2022-03-24 13:03:44', '2022-03-24 13:03:44'),
(15, 1, 13, '2022-03-30 08:16:28', '2022-03-30 08:16:28'),
(16, 1, 10, '2022-03-30 09:15:29', '2022-03-30 09:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee%` int(11) NOT NULL DEFAULT '0',
  `fee` int(11) NOT NULL DEFAULT '0',
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `currency`, `fee%`, `fee`, `min`, `max`, `fields`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Paypal', 'USD', 1, 1, 1, 500, '{\"1\":{\"name\":\"Paypal\",\"field_type\":\"email\",\"field_required\":\"required\"},\"2\":{\"name\":\"Trx\",\"field_type\":\"text\",\"field_required\":\"required\"},\"3\":{\"name\":\"Mobile\",\"field_type\":\"text\",\"field_required\":\"required\"}}', 1, '2022-03-08 05:43:32', '2022-03-30 12:51:39'),
(10, 'Mobile Money', 'EUR', 2, 1, 50, 1000, '{\"1\":{\"name\":\"Wallet Address\",\"field_type\":\"text\",\"field_required\":\"required\"},\"2\":{\"name\":\"Email\",\"field_type\":\"email\",\"field_required\":\"required\"}}', 1, '2022-03-10 06:24:09', '2022-03-30 09:15:06'),
(11, 'MTN Money', 'NGN', 1, 1, 5, 5000, '{\"1\":{\"name\":\"Name\",\"field_type\":\"text\",\"field_required\":\"required\"},\"2\":{\"name\":\"Email\",\"field_type\":\"email\",\"field_required\":\"required\"},\"3\":{\"name\":\"Description\",\"field_type\":\"text\"}}', 1, '2022-03-30 08:09:16', '2022-03-30 08:10:42'),
(12, 'Xendpay', 'GHS', 1, 1, 5, 5000, '[{\"name\":\"Email\",\"field_type\":\"email\",\"field_required\":\"required\"},{\"name\":\"Description\",\"field_type\":\"text\",\"field_required\":\"required\"}]', 1, '2022-03-30 08:13:13', '2022-03-30 08:13:13'),
(13, 'AUS Paypal', 'AUD', 1, 1, 5, 5000, '{\"1\":{\"name\":\"Email\",\"field_type\":\"email\",\"field_required\":\"required\"},\"2\":{\"name\":\"Name\",\"field_type\":\"text\",\"field_required\":\"required\"},\"3\":{\"name\":\"Description(Optional)\",\"field_type\":\"text\"}}', 1, '2022-03-30 08:14:56', '2022-03-30 08:15:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_fields`
--
ALTER TABLE `account_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acfs`
--
ALTER TABLE `acfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_keys_api_key_unique` (`api_key`),
  ADD UNIQUE KEY `api_secret` (`api_secret`),
  ADD KEY `api_keys_user_id_index` (`user_id`),
  ADD KEY `api_secret_2` (`api_secret`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_users`
--
ALTER TABLE `best_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinbase_webhook_calls`
--
ALTER TABLE `coinbase_webhook_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_counters`
--
ALTER TABLE `home_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_features`
--
ALTER TABLE `home_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_gateways`
--
ALTER TABLE `home_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_referrals`
--
ALTER TABLE `home_referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_solutions`
--
ALTER TABLE `home_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_specials`
--
ALTER TABLE `home_specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_steps`
--
ALTER TABLE `home_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_details`
--
ALTER TABLE `language_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_details_language_id_foreign` (`language_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `merchant_payments`
--
ALTER TABLE `merchant_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchant_payments_payment_id_unique` (`payment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_url_unique` (`url`);

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
-- Indexes for table `referral_links`
--
ALTER TABLE `referral_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referral_links_referral_program_id_user_id_unique` (`referral_program_id`,`user_id`),
  ADD KEY `referral_links_code_index` (`code`);

--
-- Indexes for table `referral_programs`
--
ALTER TABLE `referral_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_relationships`
--
ALTER TABLE `referral_relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scategories`
--
ALTER TABLE `scategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_trxid_unique` (`trxid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_accounts`
--
ALTER TABLE `withdraw_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_fields`
--
ALTER TABLE `account_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acfs`
--
ALTER TABLE `acfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `best_users`
--
ALTER TABLE `best_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coinbase_webhook_calls`
--
ALTER TABLE `coinbase_webhook_calls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `home_counters`
--
ALTER TABLE `home_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_features`
--
ALTER TABLE `home_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_gateways`
--
ALTER TABLE `home_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_referrals`
--
ALTER TABLE `home_referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_solutions`
--
ALTER TABLE `home_solutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_specials`
--
ALTER TABLE `home_specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_steps`
--
ALTER TABLE `home_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kycs`
--
ALTER TABLE `kycs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_details`
--
ALTER TABLE `language_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `merchant_payments`
--
ALTER TABLE `merchant_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_links`
--
ALTER TABLE `referral_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `referral_programs`
--
ALTER TABLE `referral_programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral_relationships`
--
ALTER TABLE `referral_relationships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `withdraw_accounts`
--
ALTER TABLE `withdraw_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `language_details`
--
ALTER TABLE `language_details`
  ADD CONSTRAINT `language_details_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
