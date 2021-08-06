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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_07_09_234945_create_product_category',2),
(5,'2021_07_10_004050_create_product_categories',3),
(6,'2021_08_02_125747_create_transactions_table',4),
(8,'2021_08_05_165609_create_transaction_details_table',5);

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
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productStore` int(11) DEFAULT NULL,
  `productCategory` int(11) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productStatus` int(1) DEFAULT NULL,
  `productCreatedAt` timestamp NULL DEFAULT NULL,
  `productUpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`productId`,`productName`,`productDescription`,`productStore`,`productCategory`,`productPrice`,`productImage`,`productStatus`,`productCreatedAt`,`productUpdatedAt`) values 
(6,'Pupuk AB 210ml','Murah mantap',1,1,1000,'fc67bbb46dd1f0e6e6683fed96b5be51.jpg',1,'2021-08-06 02:51:22','2021-08-06 02:51:24'),
(7,'Pupuk AB 210ml','Enak segar',2,1,2000,'fc67bbb46dd1f0e6e6683fed96b5be51.jpg',1,'2021-08-06 03:24:39','2021-08-06 03:24:42');

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
  `storeId` int(11) NOT NULL AUTO_INCREMENT,
  `storeName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storePhoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeStreet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeDistrict` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeCity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeProvince` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storeZipCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stores` */

insert  into `stores`(`storeId`,`storeName`,`storeEmail`,`storePhoneNumber`,`storeStreet`,`storeDistrict`,`storeCity`,`storeProvince`,`storeZipCode`) values 
(1,'Toko Agro Jaya','agrojaya18@gmail.com','083190901800','Jl. Cemara A. 12','Koto Tangah','Padang','Sumatera Barat','25171'),
(2,'Toko 3 Saudara','tigasaudara18@gmail.com','083190901800','Jl. Anggrek B. 14','Padang Timur','Padang','Sumatera Barat','25181');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

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
  `transactionName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionPhone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionLocationDetail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionExpiredAt` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

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
  `role` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role`) values 
(1,'Adil Saputra Duha','adilsaputra0101@gmail.com',NULL,'$2y$10$s2Fn4A4d61BdQ0nSEFvHpeeZS.OwojNgDF6Xp3LdAyi7knfs649QO',NULL,'2021-07-11 13:37:40','2021-07-11 13:37:40',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
