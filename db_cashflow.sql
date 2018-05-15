/*
SQLyog Community v13.0.0 (32 bit)
MySQL - 10.1.9-MariaDB : Database - db_cashflow
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_cashflow` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_cashflow`;

/*Table structure for table `dokumen` */

DROP TABLE IF EXISTS `dokumen`;

CREATE TABLE `dokumen` (
  `id_doc` varchar(10) NOT NULL,
  `dari` varchar(191) NOT NULL,
  `kepada` varchar(191) NOT NULL,
  `nama_file` varchar(191) NOT NULL,
  `ket` varchar(191) DEFAULT NULL,
  `dibaca` int(10) DEFAULT NULL,
  `didownload` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

/*Table structure for table `mako` */

DROP TABLE IF EXISTS `mako`;

CREATE TABLE `mako` (
  `id_mako` varchar(10) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `komandan` varchar(191) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mako`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mako` */

insert  into `mako`(`id_mako`,`nama`,`alamat`,`komandan`,`status`,`created_at`,`updated_at`) values 
('MKO-0001','AAA','Aaa','Aaa',1,'2018-04-27 13:28:42','2018-04-27 16:56:20');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(191) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(191) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(191) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(191) COLLATE latin1_general_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`name`,`email`,`password`,`foto`,`level`,`status`,`remember_token`,`created_at`,`updated_at`) values 
('USR-0001','Fitri Ariyanto','sinux3r@gmail.com','$2y$10$x0NQnJqJL83Sc.6SP8PfauhBdhpq1YMyRoBfQZhOTRiR3Q7GAwaPO','fotouserUSR-0001.png',1,1,'SxaY7BvHsjC7iEORvivSELjxQohtH6a8UKK8jaFpWcGxW2daljSlhQGsd6RM',NULL,'2018-03-17 22:32:24'),
('USR-0002','Mako','mako@mabes.com','$2y$10$10CMNPWZ3RPNOmahK3g/Q.lxY0IGgtF23XiJrt1krdlW/7A7sZjYG','user.png',2,0,NULL,'2018-04-26 22:55:16','2018-04-27 16:55:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
