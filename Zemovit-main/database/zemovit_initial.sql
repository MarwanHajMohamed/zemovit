/*M!999999\- enable the sandbox mode */ 

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `about_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `subtitle2` varchar(500) DEFAULT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `about_translations_locale_about_id_unique` (`locale`,`about_id`),
  KEY `about_translations_about_id_foreign` (`about_id`),
  KEY `about_translations_locale_index` (`locale`),
  CONSTRAINT `about_translations_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `about_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `about_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(500) DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'no-image',
  `admin_type` tinyint(4) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'admin','500000000','admin@admin.com',NULL,'$2y$10$yh20lqIyzt7XiG6NN3vkC.ib26wHAaHGK7QzrqrQqS8ZdMw.WF0rO','no-image',2,NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(2,'developer','500000000','dev@nami.com',NULL,'$2y$10$KSM2doxj1t7OsFgSSy1uVONhn6QLVTkhOXrBtiwRZ81uwooaqYleu','no-image',1,NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
DROP TABLE IF EXISTS `backups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `backups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `backup_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `backups_backup_date_unique` (`backup_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
/*!40000 ALTER TABLE `backups` ENABLE KEYS */;
DROP TABLE IF EXISTS `banner_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `banner_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banner_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banner_translations_locale_banner_id_unique` (`locale`,`banner_id`),
  KEY `banner_translations_banner_id_foreign` (`banner_id`),
  KEY `banner_translations_locale_index` (`locale`),
  CONSTRAINT `banner_translations_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `banner_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `btn_link` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
DROP TABLE IF EXISTS `blog_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned NOT NULL,
  `type` varchar(500) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_images_blog_id_foreign` (`blog_id`),
  KEY `blog_images_type_index` (`type`),
  CONSTRAINT `blog_images_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `blog_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_images` ENABLE KEYS */;
DROP TABLE IF EXISTS `blog_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_translations_blog_id_locale_unique` (`blog_id`,`locale`),
  KEY `blog_translations_locale_index` (`locale`),
  CONSTRAINT `blog_translations_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `blog_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
DROP TABLE IF EXISTS `commands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `commands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `commands` DISABLE KEYS */;
INSERT INTO `commands` VALUES
(1,'php artisan migrate','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(2,'php artisan migrate --seed','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(3,'php artisan migrate:fresh --seed','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(4,'php artisan db:seed','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(5,'php artisan db:seed --class=LaratrustSeeder','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(6,'php artisan db:seed --class=LaratrustSeeder --force','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(7,'php artisan storage:link','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(8,'php artisan cache:clear','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(9,'php artisan optimize:clear','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(10,'php artisan route:cache','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(11,'php artisan config:cache','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(12,'php artisan view:clear','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(13,'php artisan key:generate','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(14,'php artisan jwt:secret','2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `commands` ENABLE KEYS */;
DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `massage` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(500) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
DROP TABLE IF EXISTS `faq_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faq_translations_locale_faq_id_unique` (`locale`,`faq_id`),
  KEY `faq_translations_faq_id_foreign` (`faq_id`),
  KEY `faq_translations_locale_index` (`locale`),
  CONSTRAINT `faq_translations_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `faq_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
DROP TABLE IF EXISTS `home_setting_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_setting_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `home_setting_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `subtitle2` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `home_setting_translations_home_setting_id_locale_unique` (`home_setting_id`,`locale`),
  KEY `home_setting_translations_locale_index` (`locale`),
  CONSTRAINT `home_setting_translations_home_setting_id_foreign` FOREIGN KEY (`home_setting_id`) REFERENCES `home_settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `home_setting_translations` DISABLE KEYS */;
INSERT INTO `home_setting_translations` VALUES
(1,1,'en','Therapeutic Areas','Specialized Healthcare Solutions','Targeted Treatments','Explore our comprehensive therapeutic areas including energy metabolism, immunity support, bone health, and specialized care for all life stages.','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(2,2,'en','Banner','Banner','Banner','Banner','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(3,3,'en','Our Products','Trusted Formulations','Science-Backed Solutions','Discover our range of high-quality pharmaceutical products and supplements, each developed with clinical research and third-party testing.','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(4,4,'en','Latest Blogs','Insights & Updates','Stay Informed','Read our latest blogs about health, wellness, and pharmaceutical industry updates.','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(5,5,'en','Why Choose Us','The Zemovit Difference','Excellence in Pharma','We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(6,6,'en','All Products','Browse our complete range of high-quality supplements','Products','We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.','2026-09-28 11:44:31','2026-09-28 11:44:31'),
(7,7,'en','Contact us','Let’s Talk','goals','We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.','2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `home_setting_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `home_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_name` enum('banner','therapeutic_area','feature_products','why_choose_us','all_products','contact','blog','latest_blogs') NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `home_settings` DISABLE KEYS */;
INSERT INTO `home_settings` VALUES
(1,'therapeutic_area','img/therapeutic.jpg',1,3,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(2,'banner','img/therapeutic.jpg',1,3,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(3,'feature_products','img/products.jpg',1,5,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(4,'latest_blogs','img/blogs.jpg',1,6,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(5,'why_choose_us','img/why.jpg',1,4,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(6,'all_products','img/why.jpg',1,5,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(7,'contact','img/why.jpg',1,5,'2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `home_settings` ENABLE KEYS */;
DROP TABLE IF EXISTS `main_setting_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_setting_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main_setting_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `sidebar_text` varchar(500) NOT NULL,
  `copyright_text` varchar(500) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_setting_translations_main_setting_id_foreign` (`main_setting_id`),
  KEY `main_setting_translations_locale_index` (`locale`),
  CONSTRAINT `main_setting_translations_main_setting_id_foreign` FOREIGN KEY (`main_setting_id`) REFERENCES `main_settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `main_setting_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_setting_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `main_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loading_background_color` varchar(500) NOT NULL,
  `footer_logo` varchar(500) DEFAULT NULL,
  `copyright_link` varchar(500) DEFAULT NULL,
  `link` varchar(500) NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `main_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_settings` ENABLE KEYS */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(500) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2024_05_19_133554_create_admins_table',1),
(6,'2024_05_19_142747_laratrust_setup_tables',1),
(7,'2024_05_20_105639_create_settings_table',1),
(8,'2024_05_20_105706_create_settings_translations_table',1),
(9,'2024_07_28_094000_create_commands_table',1),
(10,'2024_09_10_145714_create_main_settings_table',1),
(11,'2024_09_10_145805_create_main_setting_translations_table',1),
(12,'2024_12_16_135821_add_column_description_ar_to_permissions',1),
(13,'2024_12_17_101159_add_columns_to_main_settings_table',1),
(14,'2025_03_18_134137_create_backups_table',1),
(15,'2025_07_29_102712_create_banners_table',1),
(16,'2025_07_29_102725_create_abouts_table',1),
(17,'2025_07_29_102814_create_therapeutic_areas_table',1),
(18,'2025_07_29_102842_create_faqs_table',1),
(19,'2025_07_29_102906_create_contacts_table',1),
(20,'2025_07_29_102915_create_products_table',1),
(21,'2025_07_29_103106_create_product_details_table',1),
(22,'2025_07_29_103124_create_product_benefits_table',1),
(23,'2025_07_29_103346_create_banner_translations_table',1),
(24,'2025_07_29_103426_create_product_translations_table',1),
(25,'2025_07_29_103734_create_therapeutic_area_translations_table',1),
(26,'2025_07_29_103833_create_product_detail_translations_table',1),
(27,'2025_07_29_103845_create_product_benfite_translations_table',1),
(28,'2025_07_29_103900_create_product_warnings_table',1),
(29,'2025_07_29_103906_create_product_waring_translations_table',1),
(30,'2025_07_29_104420_create_about_translations_table',1),
(31,'2025_07_29_104701_create_faq_translations_table',1),
(32,'2025_07_29_110822_create_why_choose_us_table',1),
(33,'2025_07_29_110835_create_why_choose_us_translations_table',1),
(34,'2025_07_29_123352_create_add_image_to_banners_table',1),
(35,'2025_07_29_132945_create_add_image_to_products_table',1),
(36,'2025_07_29_154943_create_page_names_table',1),
(37,'2025_07_29_155009_create_seo_settings_table',1),
(38,'2025_07_29_155102_create_home_settings_table',1),
(39,'2025_07_29_155953_create_home_setting_translations_table',1),
(40,'2025_07_29_160150_create_seo_setting_translations_table',1),
(41,'2025_07_29_160214_create_page_name_translations_table',1),
(42,'2025_07_30_145538_create_add_sub_title_2_to_about_translations_table',1),
(43,'2025_07_31_093500_create_add_titktok_to_settings_table',1),
(44,'2025_07_31_101902_create_add_sub_title_to_home_setting_translations_table',1),
(45,'2025_07_31_153906_create_page_views_table',1),
(46,'2025_08_03_091743_create_change_image_to_nullable_table',1),
(47,'2025_08_03_093657_create_slug_totherapeutic_area_translations_table',1),
(48,'2025_08_28_091053_create_product_therapeutic_areas_table',1),
(49,'2025_09_14_102122_create_visions_table',1),
(50,'2025_09_14_102136_create_missions_table',1),
(51,'2025_09_14_102414_create_mission_translations_table',1),
(52,'2025_09_14_102426_create_vision_translations_table',1),
(53,'2025_09_14_115407_create_blog_table',1),
(54,'2025_09_14_115408_create_blog_translations_table',1),
(55,'2025_09_14_115810_create_blog_images_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
DROP TABLE IF EXISTS `mission_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `mission_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mission_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `sub_title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mission_translations_mission_id_locale_unique` (`mission_id`,`locale`),
  KEY `mission_translations_locale_index` (`locale`),
  CONSTRAINT `mission_translations_mission_id_foreign` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `mission_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `mission_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `missions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;
DROP TABLE IF EXISTS `page_name_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_name_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `page_name_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_name_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `page_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_names` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` enum('home','about_us','products','contact','blog') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `page_names` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_names` ENABLE KEYS */;
DROP TABLE IF EXISTS `page_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_link` varchar(500) NOT NULL,
  `views` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `page_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_views` ENABLE KEYS */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(13,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(22,1),
(23,1),
(24,1),
(25,1),
(26,1),
(27,1),
(28,1),
(29,1),
(30,1),
(31,1),
(32,1),
(33,1),
(34,1),
(35,1),
(36,1),
(37,1),
(38,1),
(39,1),
(40,1),
(41,1),
(42,1),
(43,1),
(44,1),
(45,1),
(46,1),
(47,1),
(48,1),
(49,1),
(50,1),
(51,1),
(52,1),
(53,1),
(54,1),
(55,1),
(56,1),
(57,1),
(58,1),
(59,1),
(60,1),
(61,1),
(62,1),
(63,1),
(64,1),
(65,1),
(66,1),
(67,1),
(68,1),
(69,1),
(70,1),
(71,1),
(72,1),
(73,1),
(74,1),
(75,1),
(76,1),
(77,1),
(78,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
INSERT INTO `permission_user` VALUES
(1,1,'App\\Models\\Nami\\Admin'),
(2,1,'App\\Models\\Nami\\Admin'),
(3,1,'App\\Models\\Nami\\Admin'),
(4,1,'App\\Models\\Nami\\Admin'),
(5,1,'App\\Models\\Nami\\Admin'),
(6,1,'App\\Models\\Nami\\Admin'),
(7,1,'App\\Models\\Nami\\Admin'),
(8,1,'App\\Models\\Nami\\Admin'),
(9,1,'App\\Models\\Nami\\Admin'),
(10,1,'App\\Models\\Nami\\Admin'),
(11,1,'App\\Models\\Nami\\Admin'),
(12,1,'App\\Models\\Nami\\Admin'),
(13,1,'App\\Models\\Nami\\Admin'),
(14,1,'App\\Models\\Nami\\Admin'),
(15,1,'App\\Models\\Nami\\Admin'),
(16,1,'App\\Models\\Nami\\Admin'),
(17,1,'App\\Models\\Nami\\Admin'),
(18,1,'App\\Models\\Nami\\Admin'),
(19,1,'App\\Models\\Nami\\Admin'),
(20,1,'App\\Models\\Nami\\Admin'),
(21,1,'App\\Models\\Nami\\Admin'),
(22,1,'App\\Models\\Nami\\Admin'),
(23,1,'App\\Models\\Nami\\Admin'),
(24,1,'App\\Models\\Nami\\Admin'),
(25,1,'App\\Models\\Nami\\Admin'),
(26,1,'App\\Models\\Nami\\Admin'),
(27,1,'App\\Models\\Nami\\Admin'),
(28,1,'App\\Models\\Nami\\Admin'),
(29,1,'App\\Models\\Nami\\Admin'),
(30,1,'App\\Models\\Nami\\Admin'),
(31,1,'App\\Models\\Nami\\Admin'),
(32,1,'App\\Models\\Nami\\Admin'),
(33,1,'App\\Models\\Nami\\Admin'),
(34,1,'App\\Models\\Nami\\Admin'),
(35,1,'App\\Models\\Nami\\Admin'),
(36,1,'App\\Models\\Nami\\Admin'),
(37,1,'App\\Models\\Nami\\Admin'),
(38,1,'App\\Models\\Nami\\Admin'),
(39,1,'App\\Models\\Nami\\Admin'),
(40,1,'App\\Models\\Nami\\Admin'),
(41,1,'App\\Models\\Nami\\Admin'),
(42,1,'App\\Models\\Nami\\Admin'),
(43,1,'App\\Models\\Nami\\Admin'),
(44,1,'App\\Models\\Nami\\Admin'),
(45,1,'App\\Models\\Nami\\Admin'),
(46,1,'App\\Models\\Nami\\Admin'),
(47,1,'App\\Models\\Nami\\Admin'),
(48,1,'App\\Models\\Nami\\Admin'),
(49,1,'App\\Models\\Nami\\Admin'),
(50,1,'App\\Models\\Nami\\Admin'),
(51,1,'App\\Models\\Nami\\Admin'),
(52,1,'App\\Models\\Nami\\Admin'),
(53,1,'App\\Models\\Nami\\Admin'),
(54,1,'App\\Models\\Nami\\Admin'),
(55,1,'App\\Models\\Nami\\Admin'),
(56,1,'App\\Models\\Nami\\Admin'),
(57,1,'App\\Models\\Nami\\Admin'),
(58,1,'App\\Models\\Nami\\Admin'),
(59,1,'App\\Models\\Nami\\Admin'),
(60,1,'App\\Models\\Nami\\Admin'),
(61,1,'App\\Models\\Nami\\Admin'),
(62,1,'App\\Models\\Nami\\Admin'),
(63,1,'App\\Models\\Nami\\Admin'),
(64,1,'App\\Models\\Nami\\Admin'),
(65,1,'App\\Models\\Nami\\Admin'),
(66,1,'App\\Models\\Nami\\Admin'),
(67,1,'App\\Models\\Nami\\Admin'),
(68,1,'App\\Models\\Nami\\Admin'),
(69,1,'App\\Models\\Nami\\Admin'),
(70,1,'App\\Models\\Nami\\Admin'),
(71,1,'App\\Models\\Nami\\Admin'),
(72,1,'App\\Models\\Nami\\Admin'),
(73,1,'App\\Models\\Nami\\Admin'),
(74,1,'App\\Models\\Nami\\Admin'),
(75,1,'App\\Models\\Nami\\Admin'),
(76,1,'App\\Models\\Nami\\Admin'),
(77,1,'App\\Models\\Nami\\Admin'),
(78,1,'App\\Models\\Nami\\Admin'),
(1,2,'App\\Models\\Nami\\Admin'),
(2,2,'App\\Models\\Nami\\Admin'),
(3,2,'App\\Models\\Nami\\Admin'),
(4,2,'App\\Models\\Nami\\Admin'),
(5,2,'App\\Models\\Nami\\Admin'),
(6,2,'App\\Models\\Nami\\Admin'),
(7,2,'App\\Models\\Nami\\Admin'),
(8,2,'App\\Models\\Nami\\Admin'),
(9,2,'App\\Models\\Nami\\Admin'),
(10,2,'App\\Models\\Nami\\Admin'),
(11,2,'App\\Models\\Nami\\Admin'),
(12,2,'App\\Models\\Nami\\Admin'),
(13,2,'App\\Models\\Nami\\Admin'),
(14,2,'App\\Models\\Nami\\Admin'),
(15,2,'App\\Models\\Nami\\Admin'),
(16,2,'App\\Models\\Nami\\Admin'),
(17,2,'App\\Models\\Nami\\Admin'),
(18,2,'App\\Models\\Nami\\Admin'),
(19,2,'App\\Models\\Nami\\Admin'),
(20,2,'App\\Models\\Nami\\Admin'),
(21,2,'App\\Models\\Nami\\Admin'),
(22,2,'App\\Models\\Nami\\Admin'),
(23,2,'App\\Models\\Nami\\Admin'),
(24,2,'App\\Models\\Nami\\Admin'),
(25,2,'App\\Models\\Nami\\Admin'),
(26,2,'App\\Models\\Nami\\Admin'),
(27,2,'App\\Models\\Nami\\Admin'),
(28,2,'App\\Models\\Nami\\Admin'),
(29,2,'App\\Models\\Nami\\Admin'),
(30,2,'App\\Models\\Nami\\Admin'),
(31,2,'App\\Models\\Nami\\Admin'),
(32,2,'App\\Models\\Nami\\Admin'),
(33,2,'App\\Models\\Nami\\Admin'),
(34,2,'App\\Models\\Nami\\Admin'),
(35,2,'App\\Models\\Nami\\Admin'),
(36,2,'App\\Models\\Nami\\Admin'),
(37,2,'App\\Models\\Nami\\Admin'),
(38,2,'App\\Models\\Nami\\Admin'),
(39,2,'App\\Models\\Nami\\Admin'),
(40,2,'App\\Models\\Nami\\Admin'),
(41,2,'App\\Models\\Nami\\Admin'),
(42,2,'App\\Models\\Nami\\Admin'),
(43,2,'App\\Models\\Nami\\Admin'),
(44,2,'App\\Models\\Nami\\Admin'),
(45,2,'App\\Models\\Nami\\Admin'),
(46,2,'App\\Models\\Nami\\Admin'),
(47,2,'App\\Models\\Nami\\Admin'),
(48,2,'App\\Models\\Nami\\Admin'),
(49,2,'App\\Models\\Nami\\Admin'),
(50,2,'App\\Models\\Nami\\Admin'),
(51,2,'App\\Models\\Nami\\Admin'),
(52,2,'App\\Models\\Nami\\Admin'),
(53,2,'App\\Models\\Nami\\Admin'),
(54,2,'App\\Models\\Nami\\Admin'),
(55,2,'App\\Models\\Nami\\Admin'),
(56,2,'App\\Models\\Nami\\Admin'),
(57,2,'App\\Models\\Nami\\Admin'),
(58,2,'App\\Models\\Nami\\Admin'),
(59,2,'App\\Models\\Nami\\Admin'),
(60,2,'App\\Models\\Nami\\Admin'),
(61,2,'App\\Models\\Nami\\Admin'),
(62,2,'App\\Models\\Nami\\Admin'),
(63,2,'App\\Models\\Nami\\Admin'),
(64,2,'App\\Models\\Nami\\Admin'),
(65,2,'App\\Models\\Nami\\Admin'),
(66,2,'App\\Models\\Nami\\Admin'),
(67,2,'App\\Models\\Nami\\Admin'),
(68,2,'App\\Models\\Nami\\Admin'),
(69,2,'App\\Models\\Nami\\Admin'),
(70,2,'App\\Models\\Nami\\Admin'),
(71,2,'App\\Models\\Nami\\Admin'),
(72,2,'App\\Models\\Nami\\Admin'),
(73,2,'App\\Models\\Nami\\Admin'),
(74,2,'App\\Models\\Nami\\Admin'),
(75,2,'App\\Models\\Nami\\Admin'),
(76,2,'App\\Models\\Nami\\Admin'),
(77,2,'App\\Models\\Nami\\Admin'),
(78,2,'App\\Models\\Nami\\Admin');
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `display_name` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `description_ar` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'admins-create','Create Admins','Create Admins',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(2,'admins-read','Read Admins','Read Admins',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(3,'admins-update','Update Admins','Update Admins',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(4,'admins-delete','Delete Admins','Delete Admins',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(5,'roles-create','Create Roles','Create Roles',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(6,'roles-read','Read Roles','Read Roles',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(7,'roles-update','Update Roles','Update Roles',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(8,'roles-delete','Delete Roles','Delete Roles',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(9,'settings-create','Create Settings','Create Settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(10,'settings-read','Read Settings','Read Settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(11,'settings-update','Update Settings','Update Settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(12,'settings-delete','Delete Settings','Delete Settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(13,'profile-read','Read Profile','Read Profile',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(14,'profile-update','Update Profile','Update Profile',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(15,'change-password-read','Read Change-password','Read Change-password',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(16,'change-password-update','Update Change-password','Update Change-password',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(17,'seo-settings-create','Create Seo-settings','Create Seo-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(18,'seo-settings-read','Read Seo-settings','Read Seo-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(19,'seo-settings-update','Update Seo-settings','Update Seo-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(20,'seo-settings-delete','Delete Seo-settings','Delete Seo-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(21,'home-settings-create','Create Home-settings','Create Home-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(22,'home-settings-read','Read Home-settings','Read Home-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(23,'home-settings-update','Update Home-settings','Update Home-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(24,'home-settings-delete','Delete Home-settings','Delete Home-settings',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(25,'arrangements-create','Create Arrangements','Create Arrangements',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(26,'arrangements-read','Read Arrangements','Read Arrangements',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(27,'arrangements-update','Update Arrangements','Update Arrangements',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(28,'arrangements-delete','Delete Arrangements','Delete Arrangements',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(29,'banners-create','Create Banners','Create Banners',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(30,'banners-read','Read Banners','Read Banners',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(31,'banners-update','Update Banners','Update Banners',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(32,'banners-delete','Delete Banners','Delete Banners',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(33,'abouts-create','Create Abouts','Create Abouts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(34,'abouts-read','Read Abouts','Read Abouts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(35,'abouts-update','Update Abouts','Update Abouts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(36,'abouts-delete','Delete Abouts','Delete Abouts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(37,'why-choose-us-create','Create Why-choose-us','Create Why-choose-us',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(38,'why-choose-us-read','Read Why-choose-us','Read Why-choose-us',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(39,'why-choose-us-update','Update Why-choose-us','Update Why-choose-us',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(40,'why-choose-us-delete','Delete Why-choose-us','Delete Why-choose-us',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(41,'therapeutic_areas-create','Create Therapeutic_areas','Create Therapeutic_areas',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(42,'therapeutic_areas-read','Read Therapeutic_areas','Read Therapeutic_areas',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(43,'therapeutic_areas-update','Update Therapeutic_areas','Update Therapeutic_areas',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(44,'therapeutic_areas-delete','Delete Therapeutic_areas','Delete Therapeutic_areas',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(45,'products-benefits-create','Create Products-benefits','Create Products-benefits',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(46,'products-benefits-read','Read Products-benefits','Read Products-benefits',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(47,'products-benefits-update','Update Products-benefits','Update Products-benefits',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(48,'products-benefits-delete','Delete Products-benefits','Delete Products-benefits',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(49,'products-details-create','Create Products-details','Create Products-details',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(50,'products-details-read','Read Products-details','Read Products-details',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(51,'products-details-update','Update Products-details','Update Products-details',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(52,'products-details-delete','Delete Products-details','Delete Products-details',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(53,'features-create','Create Features','Create Features',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(54,'features-read','Read Features','Read Features',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(55,'features-update','Update Features','Update Features',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(56,'features-delete','Delete Features','Delete Features',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(57,'products-create','Create Products','Create Products',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(58,'products-read','Read Products','Read Products',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(59,'products-update','Update Products','Update Products',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(60,'products-delete','Delete Products','Delete Products',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(61,'contacts-read','Read Contacts','Read Contacts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(62,'contacts-delete','Delete Contacts','Delete Contacts',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(63,'missions-create','Create Missions','Create Missions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(64,'missions-read','Read Missions','Read Missions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(65,'missions-update','Update Missions','Update Missions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(66,'missions-delete','Delete Missions','Delete Missions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(67,'visions-create','Create Visions','Create Visions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(68,'visions-read','Read Visions','Read Visions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(69,'visions-update','Update Visions','Update Visions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(70,'visions-delete','Delete Visions','Delete Visions',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(71,'blogs-create','Create Blogs','Create Blogs',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(72,'blogs-read','Read Blogs','Read Blogs',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(73,'blogs-update','Update Blogs','Update Blogs',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(74,'blogs-delete','Delete Blogs','Delete Blogs',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(75,'blogs-images-create','Create Blogs-images','Create Blogs-images',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(76,'blogs-images-read','Read Blogs-images','Read Blogs-images',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(77,'blogs-images-update','Update Blogs-images','Update Blogs-images',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31'),
(78,'blogs-images-delete','Delete Blogs-images','Delete Blogs-images',NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(500) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(500) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_benefit_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_benefit_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_benefit_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_benefit_translations_product_benefit_id_locale_unique` (`product_benefit_id`,`locale`),
  KEY `product_benefit_translations_locale_index` (`locale`),
  CONSTRAINT `product_benefit_translations_product_benefit_id_foreign` FOREIGN KEY (`product_benefit_id`) REFERENCES `product_benefits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_benefit_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_benefit_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_benefits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_benefits` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_benefits` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_detail_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_detail_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_detail_id` bigint(20) unsigned NOT NULL,
  `label` varchar(500) NOT NULL,
  `value` varchar(500) NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_detail_translations_product_detail_id_locale_unique` (`product_detail_id`,`locale`),
  KEY `product_detail_translations_locale_index` (`locale`),
  CONSTRAINT `product_detail_translations_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_detail_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_detail_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_therapeutic_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_therapeutic_areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `therapeutic_area_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_therapeutic_areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_therapeutic_areas` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  KEY `product_translations_locale_index` (`locale`),
  CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_waring_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_waring_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_warning_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_waring_translations_product_warning_id_locale_unique` (`product_warning_id`,`locale`),
  KEY `product_waring_translations_locale_index` (`locale`),
  CONSTRAINT `product_waring_translations_product_warning_id_foreign` FOREIGN KEY (`product_warning_id`) REFERENCES `product_warnings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_waring_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_waring_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `product_warnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_warnings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `product_warnings` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_warnings` ENABLE KEYS */;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `therapeutic_area_id` bigint(20) unsigned DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES
(1,1,'App\\Models\\Nami\\Admin');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `display_name` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'superadministrator',NULL,NULL,'2026-09-28 11:44:31','2026-09-28 11:44:31');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
DROP TABLE IF EXISTS `seo_setting_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo_setting_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seo_setting_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seo_setting_translations_locale_seo_setting_id_unique` (`locale`,`seo_setting_id`),
  KEY `seo_setting_translations_seo_setting_id_foreign` (`seo_setting_id`),
  KEY `seo_setting_translations_locale_index` (`locale`),
  CONSTRAINT `seo_setting_translations_seo_setting_id_foreign` FOREIGN KEY (`seo_setting_id`) REFERENCES `seo_settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `seo_setting_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `seo_setting_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `seo_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(500) DEFAULT NULL,
  `page_name_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seo_settings_page_name_id_foreign` (`page_name_id`),
  CONSTRAINT `seo_settings_page_name_id_foreign` FOREIGN KEY (`page_name_id`) REFERENCES `page_names` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `seo_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `seo_settings` ENABLE KEYS */;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo_header` varchar(500) NOT NULL DEFAULT 'logo_header.png',
  `logo_footer` varchar(500) NOT NULL DEFAULT 'logo_footer.png',
  `favicon` varchar(500) NOT NULL DEFAULT 'favicon.png',
  `twitter` varchar(500) NOT NULL DEFAULT '#',
  `facebook` varchar(500) NOT NULL DEFAULT '#',
  `instagram` varchar(500) NOT NULL DEFAULT '#',
  `snapchat` varchar(500) NOT NULL DEFAULT '#',
  `linkedin` varchar(500) NOT NULL DEFAULT '#',
  `youtube` varchar(500) NOT NULL DEFAULT '#',
  `whatsapp` varchar(500) NOT NULL DEFAULT '#',
  `email` varchar(500) NOT NULL DEFAULT '#',
  `phone` varchar(500) NOT NULL DEFAULT '#',
  `other_phone` varchar(500) NOT NULL DEFAULT '#',
  `fax_number` varchar(500) NOT NULL DEFAULT '#',
  `default_lang` varchar(500) NOT NULL DEFAULT 'en',
  `map_link` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tiktok` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
DROP TABLE IF EXISTS `settings_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL DEFAULT 'no location',
  `website_name` varchar(500) NOT NULL DEFAULT 'my project',
  `copyright` varchar(500) NOT NULL DEFAULT 'copyright',
  `footer_text` varchar(1000) NOT NULL DEFAULT 'footer_text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `settings_translations_locale_index` (`locale`),
  CONSTRAINT `settings_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `settings_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `therapeutic_area_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `therapeutic_area_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `therapeutic_area_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `title2` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `therapeutic_area_translations_locale_therapeutic_area_id_unique` (`locale`,`therapeutic_area_id`),
  KEY `therapeutic_area_translations_therapeutic_area_id_foreign` (`therapeutic_area_id`),
  KEY `therapeutic_area_translations_locale_index` (`locale`),
  CONSTRAINT `therapeutic_area_translations_therapeutic_area_id_foreign` FOREIGN KEY (`therapeutic_area_id`) REFERENCES `therapeutic_areas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `therapeutic_area_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `therapeutic_area_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `therapeutic_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `therapeutic_areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `therapeutic_areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `therapeutic_areas` ENABLE KEYS */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
DROP TABLE IF EXISTS `vision_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vision_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vision_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `sub_title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vision_translations_vision_id_locale_unique` (`vision_id`,`locale`),
  KEY `vision_translations_locale_index` (`locale`),
  CONSTRAINT `vision_translations_vision_id_foreign` FOREIGN KEY (`vision_id`) REFERENCES `visions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `vision_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `vision_translations` ENABLE KEYS */;
DROP TABLE IF EXISTS `visions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `visions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `visions` DISABLE KEYS */;
/*!40000 ALTER TABLE `visions` ENABLE KEYS */;
DROP TABLE IF EXISTS `why_choose_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `why_choose_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `why_choose_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `why_choose_us` ENABLE KEYS */;
DROP TABLE IF EXISTS `why_choose_us_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `why_choose_us_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `why_choose_us_id` bigint(20) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `locale` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `why_choose_us_translations_why_choose_us_id_locale_unique` (`why_choose_us_id`,`locale`),
  KEY `why_choose_us_translations_locale_index` (`locale`),
  CONSTRAINT `why_choose_us_translations_why_choose_us_id_foreign` FOREIGN KEY (`why_choose_us_id`) REFERENCES `why_choose_us` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `why_choose_us_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `why_choose_us_translations` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

