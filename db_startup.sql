/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_startup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_startup` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_startup`;

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `courierId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courierPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`courierId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`courierId`,`courierName`,`courierPrice`,`created_at`,`updated_at`) values 
(1,'Organic EXPRESS',10000,'2021-08-12 23:52:54','2021-08-12 23:52:57');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(4,'2021_07_09_234945_create_product_category',2),
(5,'2021_07_10_004050_create_product_categories',3),
(12,'2014_10_12_000000_create_users_table',4),
(13,'2014_10_12_100000_create_password_resets_table',4),
(14,'2019_08_19_000000_create_failed_jobs_table',4),
(15,'2021_08_02_125747_create_transactions_table',4),
(16,'2021_08_05_165609_create_transaction_details_table',4),
(17,'2021_08_10_025337_create_products_table',4),
(18,'2021_08_12_110117_create_couriers_table',4),
(19,'2021_08_17_075500_create_stores_table',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `productCategoryId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `productCategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCategoryCreatedAt` timestamp NULL DEFAULT NULL,
  `productCategoryUpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`productCategoryId`,`productCategoryName`,`productCategoryCreatedAt`,`productCategoryUpdatedAt`) values 
(1,'Pupuk Organik','2021-07-11 06:36:08','2021-07-11 06:36:11'),
(2,'Beras Organik','2021-07-11 06:41:58','2021-07-11 06:42:01'),
(3,'Sayur Organik','2021-07-11 06:52:17','2021-07-11 06:52:19');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `productId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productStore` int(10) unsigned NOT NULL,
  `productCategory` int(10) unsigned NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productStatus` int(11) NOT NULL,
  `productCreatedAt` timestamp NULL DEFAULT NULL,
  `productUpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`productId`,`productName`,`productDescription`,`productStore`,`productCategory`,`productPrice`,`productImage`,`productStatus`,`productCreatedAt`,`productUpdatedAt`) values 
(1,'Pupuk Organik Petroganik 10Kg','Pupuk organik yang kaya akan nutrisi sehingga dapat membuat tanaman anda tumbuh subur dan tentunya sehat',1,1,100000,'082021121740625_images.jpg',1,'2021-08-13 00:05:40',NULL),
(2,'Pupuk Organik Dinosaurus','Baik dan cocok untuk semua tanaman',1,1,90000,'082021121739268_1602eddf1c4fad9a798c87e91587c065.jpg',1,'2021-08-13 00:07:39',NULL),
(3,'Pupuk Organik Bio Cipt','Serbaguna, cepat, sehat, berhasil dan ramah',1,1,110000,'082021121736547_images_(1).jpg',1,'2021-08-13 00:09:36',NULL),
(4,'Pupuk Organik Bumi Makmur','Pupuk murah, sehat, dapat menjaga keseimbangan tanah',1,1,130000,'082021121729433_pg_pupuk-petroganik.jpg',1,'2021-08-13 00:11:29',NULL),
(5,'Pupuk Organik 210ml','Pupuk organik buatan anak bangsa, sehat, murah, dan serbaguna',1,1,80000,'08202112172537_fc67bbb46dd1f0e6e6683fed96b5be51.jpg',1,'2021-08-13 00:12:25',NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roleCreatedAt` timestamp NULL DEFAULT NULL,
  `roleUpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`roleId`,`roleName`,`roleCreatedAt`,`roleUpdatedAt`) values 
(1,'Admin','2021-07-12 11:29:33','2021-07-12 11:29:37'),
(2,'Super Admin','2021-07-12 11:29:41','2021-07-12 11:36:05'),
(3,'User','2021-07-12 11:36:09','2021-07-14 07:14:23');

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `storeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `storeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storePhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeStreet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeDistrict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeProvince` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeZipCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stores` */

insert  into `stores`(`storeId`,`storeName`,`storeEmail`,`storePhoneNumber`,`storeStreet`,`storeDistrict`,`storeCity`,`storeProvince`,`storeZipCode`,`created_at`,`updated_at`) values 
(1,'Toko Organic Jaya','organicjaya@gmai.com','081234342123','Jalan Perkutut No. 3 RT 03 RW 05','Koto Tangah','Padang','Sumatera Barat','25171','2021-08-17 15:00:35','2021-08-17 15:00:37');

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `detailId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `detailTransactionId` bigint(20) unsigned NOT NULL,
  `detailProductId` int(10) unsigned NOT NULL,
  `detailTotalItem` int(10) unsigned NOT NULL,
  `detailTotalPrice` bigint(20) unsigned NOT NULL,
  `detailNote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`detailId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`detailId`,`detailTransactionId`,`detailProductId`,`detailTotalItem`,`detailTotalPrice`,`detailNote`,`created_at`,`updated_at`) values 
(21,14,1,1,100000,'Catatan','2021-08-19 08:04:25','2021-08-19 08:04:25'),
(22,15,1,1,100000,'Catatan','2021-08-19 08:06:51','2021-08-19 08:06:51'),
(23,16,2,1,90000,'Catatan','2021-08-19 08:08:22','2021-08-19 08:08:22'),
(24,17,1,1,100000,'Catatan','2021-08-19 18:32:47','2021-08-19 18:32:47'),
(25,18,1,1,100000,'Catatan','2021-08-20 01:36:40','2021-08-20 01:36:40');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transactionId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transactionUserId` int(10) unsigned NOT NULL,
  `transactionPaymentCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionTotalItem` int(10) unsigned NOT NULL,
  `transactionTotalPrice` bigint(20) unsigned NOT NULL,
  `transactionUniqueCode` int(10) unsigned NOT NULL,
  `transactionStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionReceipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionCourier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionCostShipping` int(11) NOT NULL,
  `transactionTotalTransfer` bigint(20) NOT NULL,
  `transactionBank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionPhone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionLocationDetail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionExpiredAt` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`transactionId`,`transactionUserId`,`transactionPaymentCode`,`transactionCode`,`transactionTotalItem`,`transactionTotalPrice`,`transactionUniqueCode`,`transactionStatus`,`transactionReceipt`,`transactionCourier`,`transactionCostShipping`,`transactionTotalTransfer`,`transactionBank`,`transactionName`,`transactionPhone`,`transactionLocationDetail`,`transactionDescription`,`transactionMethod`,`transactionExpiredAt`,`created_at`,`updated_at`) values 
(17,1,'INV-PYM-20210819-170','INV-PYM-20210819-309',1,100000,267,'BATAL',NULL,'1',10000,110000,NULL,'Adil Saputra Duha','082171538531','Komp. Parupuk Raya Blok H.6 RT 05 RW 15, Kecamatan , Padang, Provinsi Sumatera Barat - 25112',NULL,'COD','2021-08-20 18:32:47','2021-08-19 18:32:47','2021-08-19 18:32:47'),
(18,1,'INV-PYM-20210820-316','INV-PYM-20210820-865',1,100000,835,'DIPROSES',NULL,'1',10000,110000,'Bank Mandiri','Adil Saputra Duha','082171538531','Komp. Parupuk Raya Blok H.6 RT 05 RW 15, Kecamatan , Padang, Provinsi Sumatera Barat - 25112',NULL,'Transfer Bank','2021-08-21 01:36:40','2021-08-20 01:36:40','2021-08-20 01:36:40');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Adil Saputra Duha','adilsaputra0101@gmail.com',NULL,'$2y$10$MjPtA6rkMAhR.AyE/LhivucqHZSlukWfKqqexwTjTOkUQVquv3ke6',NULL,'2021-08-12 16:54:36','2021-08-12 16:54:36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
