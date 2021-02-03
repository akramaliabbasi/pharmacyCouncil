/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.17-MariaDB : Database - pharmacycouncil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pharmacycouncil` /*!40100 DEFAULT CHARACTER SET utf32 */;

/*Table structure for table `applicants` */

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` enum('Mr.','Mrs.','Miss','Ms.','Dr.') COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` enum('Married','Single','Separated/Divorced','Widowed') COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Female','Male','Other') COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domicile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `religion` enum('Muslim','Non-Muslim') COLLATE utf8_unicode_ci NOT NULL,
  `permission` enum('Approved','Approval Pending','Verification Pending','Issued') COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL,
  `degree_calculation_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicants_user_id_foreign` (`user_id`),
  CONSTRAINT `applicants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `application_forms` */

DROP TABLE IF EXISTS `application_forms`;

CREATE TABLE `application_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `applicants_id` bigint(20) unsigned NOT NULL,
  `contact_information_id` bigint(20) unsigned NOT NULL,
  `qualification_information_id` bigint(20) unsigned NOT NULL,
  `application_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `application_forms_user_id_foreign` (`user_id`),
  KEY `application_forms_applicants_id_foreign` (`applicants_id`),
  KEY `application_forms_contact_information_id_foreign` (`contact_information_id`),
  KEY `application_forms_qualification_information_id_foreign` (`qualification_information_id`),
  CONSTRAINT `application_forms_applicants_id_foreign` FOREIGN KEY (`applicants_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `application_forms_contact_information_id_foreign` FOREIGN KEY (`contact_information_id`) REFERENCES `contact_informations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `application_forms_qualification_information_id_foreign` FOREIGN KEY (`qualification_information_id`) REFERENCES `qualification_informations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `application_forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `contact_informations` */

DROP TABLE IF EXISTS `contact_informations`;

CREATE TABLE `contact_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `type` enum('Permanent','Mailing') COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_informations_user_id_foreign` (`user_id`),
  CONSTRAINT `contact_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `experience_informations` */

DROP TABLE IF EXISTS `experience_informations`;

CREATE TABLE `experience_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `qualification_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_passing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board_university` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `certificate_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_informations_user_id_foreign` (`user_id`),
  CONSTRAINT `experience_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `qualification_informations` */

DROP TABLE IF EXISTS `qualification_informations`;

CREATE TABLE `qualification_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `qualification_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_passing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board_university` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `certificate_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qualification_informations_user_id_foreign` (`user_id`),
  CONSTRAINT `qualification_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cnic_unique` (`cnic`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
