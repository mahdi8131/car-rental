-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 06:51 AM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Honda Civic', 'Honda', 'Civic', 2020, 'sedan', 45.00, 1, '1746527760_6819e610ee161.jpg', '2025-05-06 02:30:00', '2025-05-14 08:20:44'),
(2, 'Toyota Corolla', 'Toyota', 'Corolla', 2022, 'sedan', 50.00, 1, '1746527773_6819e61d1f057.jpeg', '2025-05-06 02:30:00', '2025-05-14 08:23:15'),
(3, 'BMW X5', 'BMW', 'X5', 2021, 'sedan', 100.00, 1, '1746527785_6819e62933e15.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:31:17'),
(4, 'Tesla Model 3', 'Tesla', 'Model 3', 2023, 'sedan', 130.00, 1, '1746527800_6819e638dbdd8.jpeg', '2025-05-06 02:30:00', '2025-05-06 04:36:40'),
(5, 'Ford Mustang', 'Ford', 'Mustang', 2021, 'sedan', 80.00, 1, '1746527820_6819e64c64810.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:31:25'),
(6, 'Chevrolet Camaro', 'Chevrolet', 'Camaro', 2022, 'sedan', 85.00, 1, '1746527836_6819e65c44b14.jpeg', '2025-05-06 02:30:00', '2025-05-06 04:37:16'),
(7, 'Audi A6', 'Audi', 'A6', 2020, 'sedan', 75.00, 1, '1746527854_6819e66e77cc1.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:31:41'),
(8, 'Mercedes-Benz C-Class', 'Mercedes-Benz', 'C-Class', 2021, 'sedan', 95.00, 1, '1746527878_6819e6864fe7f.jpeg', '2025-05-06 02:30:00', '2025-05-06 04:37:58'),
(9, 'Nissan Altima', 'Nissan', 'Altima', 2021, 'sedan', 60.00, 1, '1746527893_6819e695322ba.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:31:34'),
(10, 'Jeep Wrangler', 'Jeep', 'Wrangler', 2022, 'sedan', 95.00, 1, '1746527910_6819e6a638174.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:30:26'),
(11, 'Hyundai Elantra', 'Hyundai', 'Elantra', 2022, 'sedan', 55.00, 1, '1746632246_681b7e36e559c.jpg', '2025-05-06 02:30:00', '2025-05-07 09:37:26'),
(12, 'Kia Sportage', 'Kia', 'Sportage', 2021, 'sedan', 70.00, 1, '1746632262_681b7e46e4c7f.jpg', '2025-05-06 02:30:00', '2025-05-07 09:37:42'),
(13, 'Mazda CX-5', 'Mazda', 'CX-5', 2020, 'sedan', 85.00, 1, '1746632282_681b7e5a55c63.jpg', '2025-05-06 02:30:00', '2025-05-13 20:32:00'),
(14, 'Chevrolet Tahoe', 'Chevrolet', 'Tahoe', 2022, 'sedan', 95.00, 1, '1746632314_681b7e7aa58bf.jpg', '2025-05-06 02:30:00', '2025-05-07 09:38:34'),
(15, 'Toyota Highlander', 'Toyota', 'Highlander', 2021, 'sedan', 90.00, 1, '1746632341_681b7e95670da.jpg', '2025-05-06 02:30:00', '2025-05-07 09:39:01'),
(16, 'Honda Accord', 'Honda', 'Accord', 2020, 'sedan', 65.00, 1, '1746632391_681b7ec71bd06.jpg', '2025-05-06 02:30:00', '2025-05-13 20:32:14'),
(17, 'Subaru Outback', 'Subaru', 'Outback', 2021, 'sedan', 80.00, 1, '1746632367_681b7eafd5a3b.jpg', '2025-05-06 02:30:00', '2025-05-07 09:39:27'),
(18, 'Ford F-150', 'Ford', 'F-150', 2021, 'sedan', 110.00, 1, '1746632416_681b7ee09f25a.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:40:16'),
(19, 'Ram 1500', 'Ram', '1500', 2021, 'sedan', 120.00, 1, '1746632436_681b7ef4377ce.jpg', '2025-05-06 02:30:00', '2025-05-07 09:40:36'),
(20, 'Tesla Model Y', 'Tesla', 'Model Y', 2022, 'sedan', 140.00, 1, '1746632463_681b7f0f60444.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:29:48'),
(21, 'Jeep Grand Cherokee', 'Jeep', 'Grand Cherokee', 2021, 'sedan', 105.00, 1, '1746632492_681b7f2c09669.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:41:32'),
(22, 'Volkswagen Tiguan', 'Volkswagen', 'Tiguan', 2021, 'sedan', 80.00, 1, '1746632507_681b7f3b7603e.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:41:47'),
(23, 'Nissan Rogue', 'Nissan', 'Rogue', 2022, 'sedan', 75.00, 1, '1746632523_681b7f4b4c3de.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:42:03'),
(24, 'Ford Edge', 'Ford', 'Edge', 2021, 'sedan', 85.00, 1, '1746632542_681b7f5ea3d20.jpg', '2025-05-06 02:30:00', '2025-05-07 09:42:22'),
(25, 'BMW 3 Series', 'BMW', '3 Series', 2022, 'sedan', 100.00, 1, '1746632562_681b7f72ea4bd.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:42:42'),
(26, 'Audi Q5', 'Audi', 'Q5', 2021, 'sedan', 95.00, 1, '1746632593_681b7f91b9eb8.jpg', '2025-05-06 02:30:00', '2025-05-07 09:43:13'),
(27, 'Lexus RX', 'Lexus', 'RX', 2021, 'sedan', 110.00, 1, '1746632615_681b7fa7ba668.jpg', '2025-05-06 02:30:00', '2025-05-07 09:43:35'),
(28, 'Chrysler Pacifica', 'Chrysler', 'Pacifica', 2022, 'sedan', 95.00, 1, '1746632637_681b7fbd5fc54.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:43:57'),
(29, 'Toyota Camry', 'Toyota', 'Camry', 2021, 'sedan', 65.00, 1, '1746632656_681b7fd0a539c.jpeg', '2025-05-06 02:30:00', '2025-05-13 20:30:37'),
(30, 'Kia Forte', 'Kia', 'Forte', 2021, 'sedan', 50.00, 1, '1746632680_681b7fe84e573.jpeg', '2025-05-06 02:30:00', '2025-05-07 09:44:40'),
(32, 'Toyota Corolla', 'Toyota', 'Corolla', 2020, 'sedan', 45.00, 0, '1747235386_6824b23a701be.jpg', '2025-05-14 09:07:09', '2025-05-14 10:21:30'),
(33, 'Honda Civic', 'Honda', 'Civic', 2019, 'sedan', 50.00, 1, '1747235413_6824b25599cca.jpg', '2025-05-14 09:07:09', '2025-05-14 09:10:13'),
(34, 'Ford Mustang', 'Ford', 'Mustang', 2021, 'sedan', 120.00, 1, '1747235433_6824b26933a49.jpg', '2025-05-14 09:07:09', '2025-05-14 09:10:33'),
(35, 'Chevrolet Suburban', 'Chevrolet', 'Suburban', 2022, 'sedan', 95.00, 1, '1747235451_6824b27b782ae.jpeg', '2025-05-14 09:07:09', '2025-05-14 09:10:51'),
(36, 'Tesla Model 3', 'Tesla', 'Model 3', 2023, 'sedan', 100.00, 1, '1747235484_6824b29cb5dae.jpeg', '2025-05-14 09:07:09', '2025-05-14 09:11:24'),
(37, 'Hyundai Tucson', 'Hyundai', 'Tucson', 2020, 'sedan', 60.00, 1, '1747235526_6824b2c6b216f.jpeg', '2025-05-14 09:07:09', '2025-05-14 09:12:07'),
(38, 'Kia Sportage', 'Kia', 'Sportage', 2021, 'sedan', 65.00, 1, '1747235547_6824b2dbdd65e.jpeg', '2025-05-14 09:07:09', '2025-05-14 21:42:47'),
(39, 'Nissan Altima', 'Nissan', 'Altima', 2018, 'sedan', 40.00, 1, '1747235573_6824b2f585bc6.jpeg', '2025-05-14 09:07:09', '2025-05-14 09:12:53'),
(40, 'BMW X5', 'BMW', 'X5', 2022, 'sedan', 110.00, 1, '1747235593_6824b30918bc8.jpg', '2025-05-14 09:07:09', '2025-05-14 09:13:13'),
(41, 'Mercedes-Benz C-Class', 'Mercedes-Benz', 'C-Class', 2021, 'sedan', 115.00, 0, '1747235630_6824b32e0299c.png', '2025-05-14 09:07:09', '2025-05-14 10:46:12');

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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '1db1354b-4c8c-4bf3-9212-495a80f50f7d', 'database', 'default', '{\"uuid\":\"1db1354b-4c8c-4bf3-9212-495a80f50f7d\",\"displayName\":\"App\\\\Notifications\\\\RentalCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:31:\\\"App\\\\Notifications\\\\RentalCreated\\\":3:{s:6:\\\"rental\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Rental\\\";s:2:\\\"id\\\";i:25;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"isAdmin\\\";b:0;s:2:\\\"id\\\";s:36:\\\"6728938d-8d55-4bdb-acf2-b7de67808911\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1747190011,\"delay\":null}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Connection could not be established with host \"smtp.gmail.com:587\": stream_socket_client(): php_network_getaddresses: getaddrinfo for smtp.gmail.com failed: No such host is known.  in D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php:154\nStack trace:\n#0 [internal function]: Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\{closure}(2, \'stream_socket_c...\', \'D:\\\\Ostad\\\\New fo...\', 157)\n#1 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php(157): stream_socket_client(\'smtp.gmail.com:...\', 0, \'\', 60.0, 4, Resource id #942)\n#2 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(279): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->initialize()\n#3 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(211): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#4 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#5 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(138): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#6 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(584): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#7 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(331): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#8 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\MailChannel.php(66): Illuminate\\Mail\\Mailer->send(\'emails.rentals....\', Array, Object(Closure))\n#9 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(159): Illuminate\\Notifications\\Channels\\MailChannel->send(Object(App\\Models\\User), Object(App\\Notifications\\RentalCreated))\n#10 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(116): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\Models\\User), \'583d4a0f-0797-4...\', Object(App\\Notifications\\RentalCreated), \'mail\')\n#11 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#12 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(111): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#13 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\RentalCreated), Array)\n#14 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(118): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\RentalCreated), Array)\n#15 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#16 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#18 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#19 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#20 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Container\\Container->call(Array)\n#21 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#22 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#23 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(136): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(125): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#25 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(169): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#26 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#27 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#29 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#30 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(441): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(391): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#32 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(334): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#35 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#38 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#39 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(754): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#40 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#41 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 D:\\Ostad\\New folder (2)\\car-rental\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 D:\\Ostad\\New folder (2)\\car-rental\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#49 {main}', '2025-05-13 20:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_03_155240_create_cars_table', 1),
(5, '2025_05_03_155241_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(44, 2, 41, '2025-05-15', '2025-05-17', 345.00, 'ongoing', '2025-05-14 09:22:26', '2025-05-14 10:46:12'),
(45, 4, 32, '2025-05-15', '2025-05-16', 45.00, 'ongoing', '2025-05-14 10:16:36', '2025-05-14 10:21:30'),
(46, 4, 33, '2025-05-17', '2025-05-20', 150.00, 'pending', '2025-05-14 10:32:27', '2025-05-14 10:32:27'),
(47, 4, 34, '2025-05-16', '2025-05-17', 120.00, 'pending', '2025-05-14 10:43:10', '2025-05-14 10:43:10'),
(48, 2, 36, '2025-05-16', '2025-05-21', 500.00, 'pending', '2025-05-14 10:47:34', '2025-05-14 10:47:34'),
(49, 2, 38, '2025-05-15', '2025-05-17', 130.00, 'completed', '2025-05-14 11:14:28', '2025-05-14 21:42:47'),
(50, 2, 35, '2025-05-15', '2025-05-16', 95.00, 'pending', '2025-05-14 22:24:10', '2025-05-14 22:24:10'),
(51, 2, 38, '2025-05-19', '2025-05-23', 260.00, 'pending', '2025-05-14 22:40:28', '2025-05-14 22:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pptdg5pwoW4eyOEYLpUccx0TZ8yrzbjBhLeetYi7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2pjczF2RFVCc0tmYkRPWXNTMFB3VUxqYWFySFF6R1JtQVZXNmJITyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1747284665);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahdi Hasan', 'ma.mahadi228@gmail.com', '01772813160', 'Satiyain, Bhudal, Brahmanbaria', NULL, '$2y$12$hgL3yPfcciLc7JaQK9og0efoiYuSqm9ukHfkdU9fgYFYhQqGzI6NC', 'admin', '1747067696_68222330ad9d9.jpg', NULL, '2025-05-06 01:38:04', '2025-05-12 10:34:56'),
(2, 'Mahdi Hasan', 'm.mahadi228@gmail.com', '01772813160', 'Satiyain, Bhudal, Brahmanbaria', NULL, '$2y$12$ubDv9SoaxlocnN2M.hfshOuHTD7wvAd3BroxuRTxezGARq/9kVEaW', 'customer', '1746518070_6819c036903e5.jpg', 'jREZGRctLxVfuqdKJ9LSAjnwgMSRRSdHQeUoe77iFzT0JtZIATJvOxfdZeRg', '2025-05-06 01:38:37', '2025-05-14 21:40:48'),
(3, 'iqbal', 'iqbal@gmail.com', '01772813160', 'Satiyain, Bhudal, Brahmanbaria', NULL, '$2y$12$r2a9EPY9b2oUo3KF1UgaK.ARVRhIX1T9kipG/9jLjLVK6Mvq9VigW', 'customer', '1746527443_iqbal.jpg', NULL, '2025-05-06 04:30:43', '2025-05-14 11:43:07'),
(4, 'Mahdi', 'm.mahadi8131@gmail.com', '01772813160', 'Satiyain, Bhudal, Brahmanbaria', NULL, '$2y$12$b74LjRSpPwumiA1d9ATFTe5jSbCvYJ6oY.dofmUYUxn8ahGXNbcQu', 'customer', NULL, NULL, '2025-05-13 10:22:00', '2025-05-13 20:32:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
