/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.17-MariaDB : Database - laravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `laravel`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact` */

insert  into `contact`(`id`,`contact_name`,`contact_mobile`,`contact_email`,`contact_message`) values (1,'sdf','sdafas','asfd','sadfasdf'),(2,'sonet khan','01793477145','sonetkhanrkb@gmail.com','Hi everybody whats up!'),(3,'gfsd','sgfsdgfd','gsdgfs','gfsdfgsd'),(4,'dfsg','dsgfsdg','gfsdg','sdgfsdfg');

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `courses` */

insert  into `courses`(`id`,`course_name`,`course_des`,`course_fee`,`course_totalenroll`,`course_totalclass`,`course_link`,`course_img`) values (1,'প্রজেক্ট','আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি ','352487/-','1200','120','http://localhost/phpmyadmin/tbl_change.php?db=laravel&table=courses','http://localhost/images/react.jpg'),(2,'প্রজেক্ট','আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি','352487/-','1200','120','http://localhost/phpmyadmin/tbl_change.php?db=laravel&table=courses','http://localhost/images/android.jpg'),(3,'প্রজেক্ট','আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি ','352487/-','1200','120','http://localhost/phpmyadmin/tbl_change.php?db=laravel&table=courses','http://localhost/images/flutter.png');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2021_05_30_114136_serviecs_table',1),(2,'2021_06_01_173228_course_table',2),(3,'2021_06_02_142552_projct_table',3),(4,'2021_06_03_063557_contact_table',4);

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`project_name`,`project_des`,`project_link`,`project_img`) values (1,'আইটি কোর্স 1','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(2,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(3,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(6,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(7,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(8,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(9,'আইটি কোর্স 1000','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(10,'আইটি কোর্স 500','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(11,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(12,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(13,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(14,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(15,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(16,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg'),(17,'আইটি কোর্স','মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','http://localhost/images/react.jpg','http://localhost/images/poject.jpg');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`service_name`,`service_des`,`service_img`) values (21,'আইটি কোর্স 11','মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','images/knowledge.svg'),(22,'আইটি কোর্স 52345','মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট','images/knowledge.svg'),(30,'mamma mia service','ho ho ho hi ho ho','images/knowledge.svg'),(36,'mamma mia service','ho ho ho hi ho ho','images/knowledge.svg');

/*Table structure for table `visitor` */

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `visitor` */

insert  into `visitor`(`id`,`ip_address`,`visit_time`) values (1,'127.0.0.1','2021-05-30 02:29:44pm'),(2,'127.0.0.1','2021-05-30 04:23:19pm'),(3,'127.0.0.1','2021-05-30 04:23:37pm'),(4,'127.0.0.1','2021-05-30 04:28:01pm'),(5,'127.0.0.1','2021-05-30 04:28:06pm'),(6,'127.0.0.1','2021-05-30 04:28:11pm'),(7,'127.0.0.1','2021-05-30 04:41:05pm'),(8,'127.0.0.1','2021-05-30 04:46:10pm'),(9,'127.0.0.1','2021-05-30 04:46:55pm'),(10,'127.0.0.1','2021-05-30 04:48:38pm'),(11,'127.0.0.1','2021-05-30 07:02:10pm'),(12,'127.0.0.1','2021-05-30 07:04:52pm'),(13,'127.0.0.1','2021-05-30 07:11:15pm'),(14,'127.0.0.1','2021-05-31 08:13:44am'),(15,'127.0.0.1','2021-05-31 08:13:48am'),(16,'127.0.0.1','2021-05-31 09:17:07am'),(17,'127.0.0.1','2021-05-31 09:37:04pm'),(18,'127.0.0.1','2021-06-01 12:23:46am'),(19,'127.0.0.1','2021-06-01 09:52:45am'),(20,'127.0.0.1','2021-06-01 11:43:24am'),(21,'127.0.0.1','2021-06-01 02:10:38pm'),(22,'127.0.0.1','2021-06-01 07:36:24pm'),(23,'127.0.0.1','2021-06-01 10:25:24pm'),(24,'127.0.0.1','2021-06-01 10:51:26pm'),(25,'127.0.0.1','2021-06-01 10:51:35pm'),(26,'127.0.0.1','2021-06-01 10:58:03pm'),(27,'127.0.0.1','2021-06-01 11:27:25pm'),(28,'127.0.0.1','2021-06-02 12:34:03am'),(29,'127.0.0.1','2021-06-02 12:34:59am'),(30,'127.0.0.1','2021-06-02 12:35:54am'),(31,'127.0.0.1','2021-06-02 12:36:50am'),(32,'127.0.0.1','2021-06-02 12:37:16am'),(33,'127.0.0.1','2021-06-02 12:38:42am'),(34,'127.0.0.1','2021-06-02 12:39:17am'),(35,'127.0.0.1','2021-06-02 12:40:14am'),(36,'127.0.0.1','2021-06-02 12:42:50am'),(37,'127.0.0.1','2021-06-02 12:50:24am'),(38,'127.0.0.1','2021-06-02 12:51:34am'),(39,'127.0.0.1','2021-06-02 12:54:07am'),(40,'127.0.0.1','2021-06-02 01:02:24am'),(41,'127.0.0.1','2021-06-02 01:04:43am'),(42,'127.0.0.1','2021-06-02 11:18:31am'),(43,'127.0.0.1','2021-06-02 11:18:35am'),(44,'127.0.0.1','2021-06-02 11:18:56am'),(45,'127.0.0.1','2021-06-02 11:19:40am'),(46,'127.0.0.1','2021-06-02 11:20:42am'),(47,'127.0.0.1','2021-06-02 11:21:17am'),(48,'127.0.0.1','2021-06-02 11:22:49am'),(49,'127.0.0.1','2021-06-02 11:23:12am'),(50,'127.0.0.1','2021-06-02 11:32:37am'),(51,'127.0.0.1','2021-06-02 11:33:08am'),(52,'127.0.0.1','2021-06-02 08:20:00pm'),(53,'127.0.0.1','2021-06-02 09:12:34pm'),(54,'127.0.0.1','2021-06-02 09:13:17pm'),(55,'127.0.0.1','2021-06-03 12:32:37pm'),(56,'127.0.0.1','2021-06-03 01:34:09pm'),(57,'127.0.0.1','2021-06-03 02:43:52pm'),(58,'127.0.0.1','2021-06-03 02:55:38pm'),(59,'127.0.0.1','2021-06-03 02:57:27pm'),(60,'127.0.0.1','2021-06-03 02:59:40pm'),(61,'127.0.0.1','2021-06-03 02:59:56pm'),(62,'127.0.0.1','2021-06-03 03:02:08pm'),(63,'127.0.0.1','2021-06-03 03:07:06pm'),(64,'127.0.0.1','2021-06-03 03:08:20pm'),(65,'127.0.0.1','2021-06-03 03:09:01pm');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
