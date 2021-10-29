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

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `blogId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogContent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogView` int(11) NOT NULL,
  `blogDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blogUser` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blogId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

insert  into `blogs`(`blogId`,`blogTitle`,`blogSlug`,`blogContent`,`blogImage`,`blogView`,`blogDate`,`blogUser`,`created_at`,`updated_at`) values 
(2,'Memulai kebiasaan hidup sehat','memulai-kebiasaan-hidup-sehat','<p>Pandemi Covid-19 masih belum berakhir. Hingga saat kini, kasus positif Covid-19 mengalami peningkatan setiap harinya. Untuk melindungi diri dari paparan Covid-19, penting bagi masyarakat untuk menerapkan protokol kesehatan agar terhindar dari paparan virus ini. Selain itu, sangat dianjurkan untuk meningkatkan daya tahan tubuh terutama bagi yang sudah berusia lanjut.</p><p><br></p><p>Salah satu cara yang bisa dilakukan agar tetap terlindungi dari virus ini adalah dengan memulai kebiasaan hidup sehat. Berikut adalah beberapa tips untuk memulai kebiasaan hidup sehat di tengah pandemi Covid-19.</p><p><br></p><p>1. Konsumsi makanan yang bergizi</p><p><br></p><p>Perbanyaklah mengkonsumsi makanan yang bergizi dan seimbang antara sayur dan buah-buahan. Makanan siap saji dan makanan instan sangatlah menggoda. Namun, di saat kondisi seperti ini, sebaiknya tinggalkan terlebih dahulu makanan yang instan dan siap saji tersebut.</p><p><br></p><p>Meminum vitamin merupakan hal yang tidak kalah pentingnya. Karena, vitamin yang kita konsumsi tersebut dapat membuat tubuh kuat sehingga tidak mudah terserang oleh penyakit. Selain itu, usahakan untuk makan secara teratur.</p><p><br></p><p>2. Istirahat secukupnya</p><p><br></p><p>Istirahat sering dikesampingkan karena tingginya beban hidup. Waktu lebih banyak digunakan untuk bekerja dibandingkan untuk istirahat. Padahal istirahat yang cukup adalah hal penting yang tidak boleh dilupakan karena berdampak untuk kesehatan.</p><p><br></p><p>Istirahat yang cukup akan membantu menjaga kesehatan tubuh secara keseluruhan, termasuk meningkatkan sistem kekebalan tubuh. Selain itu istirahat juga dapat menjaga berat badan menjadi ideal,&nbsp; menjaga kesehatan mental, dan sudah pasti menurukan berbagai macam resiko penyakit.</p><p><br></p><p>3. Aktif Bergerak dan Rutin Berolahraga</p><p><br></p><p>Di rumah saja, bukan berarti bisa tidak olahraga sama sekali. Ada beragam manfaat olahraga yang bisa kamu peroleh, mulai dari memelihara fungsi organ hingga meningkatkan stamina dan daya tahan tubuh. Tak hanya bermanfaat untuk kesehatan fisik, olahraga juga baik untuk kesehatan mental kamu.</p><p><br></p><p>4. Jaga Higienitas</p><p><br></p><p>Kebersihan&nbsp; tetap harus diprioritaskan di dalam pandemi Covid-19 ini. Walaupun berada di dalam rumah untuk waktu yang cukup lama, kebersihan diri dan lingkungan sekitar harus tetap diperhatikan. Pastikan mencuci tangan dengan sabun dan air mengalir selama minimal 20 detik secara berkala, seperti sebelum dan setelah makan, setelah dari toilet,&nbsp; dan setelah beraktivitas</p>','tes.png',0,'2021-09-13 10:12:24',1,NULL,NULL);

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
(1,'Organic Express',10000,NULL,NULL);

/*Table structure for table `course_features` */

DROP TABLE IF EXISTS `course_features`;

CREATE TABLE `course_features` (
  `courseFeatureId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseFeatureName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`courseFeatureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `course_features` */

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `courseId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseDuration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coursePrice` int(11) NOT NULL,
  `courseFeature` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `courses` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customerId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customerId`),
  UNIQUE KEY `customers_customeremail_unique` (`customerEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customers` */

insert  into `customers`(`customerId`,`customerName`,`customerEmail`,`customerPhoneNumber`,`customerPassword`,`customerImage`,`created_at`,`updated_at`) values 
(1,'Adil Saputra Duha','adilsaputra0101@gmail.com','082171538531','$2y$10$AHcDkc8q.9s/qdlv9KR2eezX5Jetn6I.GwToaVeIKPGgijSeKgHhO','default.png',NULL,NULL);

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

/*Table structure for table `kotas` */

DROP TABLE IF EXISTS `kotas`;

CREATE TABLE `kotas` (
  `kotaId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kotaKode` int(11) NOT NULL,
  `kotaName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kotaId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kotas` */

insert  into `kotas`(`kotaId`,`kotaKode`,`kotaName`,`created_at`,`updated_at`) values 
(1,1371,'Kota Padang',NULL,NULL),
(2,1377,'Kota Pariaman',NULL,NULL),
(3,1375,'Kota Bukittinggi',NULL,NULL),
(4,1372,'Kota Solok',NULL,NULL),
(5,1376,'Kota Payakumbuh',NULL,NULL);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `memberId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `memberName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberGender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberStatus` int(11) NOT NULL,
  `memberCourse` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `members` */

insert  into `members`(`memberId`,`memberName`,`memberEmail`,`memberPhone`,`memberGender`,`memberAddress`,`memberStatus`,`memberCourse`,`created_at`,`updated_at`) values 
(5,'Anonymous','adilsaputra0101@gmail.com','082171538531','Laki-laki','Perumahan Jabal Rahmah Blok G 12',0,1,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_08_02_125747_create_transactions_table',1),
(5,'2021_08_05_165609_create_transaction_details_table',1),
(6,'2021_08_10_025337_create_products_table',1),
(7,'2021_08_12_110117_create_couriers_table',1),
(8,'2021_08_17_075500_create_stores_table',1),
(9,'2021_08_28_092402_create_courses_table',1),
(10,'2021_08_29_110140_create_reviews_table',1),
(11,'2021_08_29_132852_create_course_features_table',1),
(12,'2021_09_01_121552_create_product_categories_table',1),
(13,'2021_09_01_122927_create_customers_table',1),
(14,'2021_09_01_123653_create_roles_table',1),
(15,'2021_09_11_093510_create_members_table',2),
(16,'2021_09_11_230840_create_testimonial_courses_table',3),
(17,'2021_09_12_030055_add_role_to_users',4),
(18,'2021_09_12_091521_create_blogs_table',5),
(19,'2021_09_25_094950_add_store_to_transaction',6),
(20,'2021_09_29_092329_add_courier_detail',7),
(21,'2021_09_30_111609_add_password_to_store',8),
(22,'2021_10_04_043046_add_berat_to_product',9),
(25,'2021_10_05_125143_add_satuan_to_product',10),
(26,'2021_10_19_094247_create_kotas_table',10),
(27,'2021_10_20_205456_add_reason_to_transaction',11);

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
  `productCategoryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productCategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCategoryImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`productCategoryId`,`productCategoryName`,`productCategoryImage`,`created_at`,`updated_at`) values 
(1,'Pupuk','',NULL,NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `productId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productStore` int(10) unsigned NOT NULL,
  `productCategory` int(10) unsigned NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productStock` int(11) NOT NULL,
  `productRating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productStatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `productWeight` int(11) DEFAULT NULL,
  `productLength` int(11) DEFAULT NULL,
  `productWide` int(11) DEFAULT NULL,
  `productHigh` int(11) DEFAULT NULL,
  `productPromo` int(11) DEFAULT NULL,
  `productSatuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`productId`,`productName`,`productDescription`,`productStore`,`productCategory`,`productPrice`,`productStock`,`productRating`,`productSold`,`productImage`,`productStatus`,`created_at`,`updated_at`,`productWeight`,`productLength`,`productWide`,`productHigh`,`productPromo`,`productSatuan`) values 
(10,'Telur Ayam Organik','Telur ayam organik adalah telur yang diperoleh dari unggas yang diberi pakan khusus yang tentunya berasal dari organik. Sehingga memberikan manfaat yang baik bagi tubuh.',1,1,2000,10,'5','1','102021060108961_20210921_133659.jpg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'Tes','Tes',1,1,10000,100,'5','0','tes.png',1,'2021-10-11 03:40:09','2021-10-11 03:40:09',10,10,10,NULL,NULL,NULL);

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `reviewId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reviewDate` date NOT NULL,
  `reviewProduct` int(11) NOT NULL,
  `reviewUser` int(11) NOT NULL,
  `reviewStar` int(11) NOT NULL,
  `reviewMessage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reviewId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roleId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`roleId`,`roleName`,`created_at`,`updated_at`) values 
(1,'Super Admin',NULL,NULL),
(2,'Admin',NULL,NULL),
(4,'Owner',NULL,NULL);

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
  `storePassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storeJoin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stores` */

/*Table structure for table `testimonial_courses` */

DROP TABLE IF EXISTS `testimonial_courses`;

CREATE TABLE `testimonial_courses` (
  `testimonialId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `testimonialMember` int(11) NOT NULL,
  `testimonialMessage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonialImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`testimonialId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonial_courses` */

insert  into `testimonial_courses`(`testimonialId`,`testimonialMember`,`testimonialMessage`,`testimonialImage`,`created_at`,`updated_at`) values 
(1,5,'Sangat bermanfaat, materi yang diberikan sangat detail dan pelayanannya memuaskan.','default.png',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`detailId`,`detailTransactionId`,`detailProductId`,`detailTotalItem`,`detailTotalPrice`,`detailNote`,`created_at`,`updated_at`) values 
(1,1,10,1,150000,'Catatan','2021-09-02 14:31:24','2021-09-02 14:31:24'),
(2,2,10,1,150000,'Catatan','2021-09-03 00:18:37','2021-09-03 00:18:37'),
(3,3,10,1,100000,'Catatan','2021-09-05 00:41:59','2021-09-05 00:41:59'),
(4,4,10,1,100000,'Catatan','2021-09-05 00:43:49','2021-09-05 00:43:49'),
(5,5,10,1,100000,'Catatan','2021-09-08 08:19:54','2021-09-08 08:19:54'),
(6,5,10,1,150000,'Catatan','2021-09-08 08:19:54','2021-09-08 08:19:54');

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
  `transactionCreatedAt` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transactionStore` int(11) NOT NULL,
  `transactionDeliveryDetail` int(11) NOT NULL,
  `transactionCancelReason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`transactionId`,`transactionUserId`,`transactionPaymentCode`,`transactionCode`,`transactionTotalItem`,`transactionTotalPrice`,`transactionUniqueCode`,`transactionStatus`,`transactionReceipt`,`transactionCourier`,`transactionCostShipping`,`transactionTotalTransfer`,`transactionBank`,`transactionName`,`transactionPhone`,`transactionLocationDetail`,`transactionDescription`,`transactionMethod`,`transactionExpiredAt`,`transactionCreatedAt`,`created_at`,`updated_at`,`transactionStore`,`transactionDeliveryDetail`,`transactionCancelReason`) values 
(1,1,'INV-PYM-20210902-988','INV-PYM-20210902-205',1,150000,810,'SELESAI',NULL,'1',10000,160000,'Bank BCA','Adil Saputra Duha','082171538531','Jl. Mawar No. 18, Kecamatan Koto Tangah, Kota Padang, Provinsi Sumatera Barat - 25171',NULL,'Transfer Bank','2021-09-03 14:31:24','2021-09-02 14:31:24','2021-09-02 14:31:24','2021-09-02 14:31:24',1,1,NULL),
(2,1,'INV-PYM-20210903-210','INV-PYM-20210903-772',1,150000,984,'BELUM BAYAR',NULL,'1',10000,160000,'Bank Mandiri','Adil Saputra Duha','082171538531','Jl. Mawar No. 18, Kecamatan Koto Tangah, Kota Padang, Provinsi Sumatera Barat - 25171',NULL,'Transfer Bank','2021-09-04 00:18:37','2021-09-03 00:18:37','2021-09-03 00:18:37','2021-09-03 00:18:37',1,0,NULL),
(3,1,'INV-PYM-20210905-678','INV-PYM-20210905-349',1,100000,405,'BELUM BAYAR',NULL,'1',10000,110000,'Bank Mandiri','Adil Saputra Duha','082171538531','Jl. Mawar No. 18, Kecamatan Koto Tangah, Kota Padang, Provinsi Sumatera Barat - 25171',NULL,'Transfer Bank','2021-09-06 00:41:59','2021-09-05 00:41:59','2021-09-05 00:41:59','2021-09-05 00:41:59',1,0,NULL),
(4,1,'INV-PYM-20210905-483','INV-PYM-20210905-270',1,100000,245,'DIPROSES',NULL,'1',10000,110000,NULL,'Adil Saputra Duha','082171538531','Jl. Mawar No. 18, Kecamatan Koto Tangah, Kota Padang, Provinsi Sumatera Barat - 25171',NULL,'COD','2021-09-06 00:43:49','2021-09-05 00:43:49','2021-09-05 00:43:49','2021-09-05 00:43:49',1,0,NULL),
(5,1,'INV-PYM-20210908-776','INV-PYM-20210908-209',2,250000,374,'DIKIRIM',NULL,'1',10000,260000,'Bank Mandiri','Adil Saputra Duha','082171538531','Jl. Mawar No. 18, Kecamatan Koto Tangah, Kota Padang, Provinsi Sumatera Barat - 25171',NULL,'Transfer Bank','2021-09-09 08:19:54','2021-09-08 08:19:54','2021-09-08 08:19:54','2021-09-08 08:19:54',1,0,NULL);

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
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role`) values 
(1,'Adil Saputra Duha','adilsaputra0101@gmail.com',NULL,'$2y$10$wjcM5oPdRBLdOgWpB7QmP.xbcqLVRCVthQrhXhLykP6PXLmC2TWXS',NULL,'2021-09-02 12:57:08','2021-09-12 11:45:38',1),
(5,'Admin Satu','adminsatu@gmail.com',NULL,'$2y$10$w2.MHLAF0JGXnZanUbYDB.L6Jq1lGfH5TXBiMoYSL2fZKigi563Y6',NULL,'2021-09-12 09:52:28',NULL,2),
(6,'Admin Dua','admindua@gmail.com',NULL,'$2y$10$mQDQT/KgImU6W/EjEN5ETOUBOhbFHI.O/UdSc5leN4EVfU85/9Y1i',NULL,'2021-09-12 09:52:52','2021-09-12 10:41:02',2),
(8,'Admin Tiga','admintiga@gmail.com',NULL,'$2y$10$Ga6gBFt9qX5N/7nOsVRgB.QrnGdlcN4NKgp0.6iQF4frH0laXYjaW',NULL,'2021-09-12 11:45:11','2021-09-12 11:45:27',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
