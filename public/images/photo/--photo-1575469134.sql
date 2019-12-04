# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: techynaf-aws-db.cvdbjba9ub30.ap-southeast-1.rds.amazonaws.com (MySQL 5.7.22)
# Database: drb-staging
# Generation Time: 2019-12-04 09:38:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table announcments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `announcments`;

CREATE TABLE `announcments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `announcments` WRITE;
/*!40000 ALTER TABLE `announcments` DISABLE KEYS */;

INSERT INTO `announcments` (`id`, `deleted_at`, `text`, `is_published`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'We are launching our website soon!',0,'2019-11-16 03:24:17','2019-11-16 05:42:46'),
	(2,'2019-11-28 05:40:25','New Recipes Available!!!',1,'2019-11-19 10:38:00','2019-11-28 05:40:25'),
	(3,NULL,'Find the latest quarterlies!',1,'2019-11-28 05:51:26','2019-11-28 05:51:26');

/*!40000 ALTER TABLE `announcments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `deleted_at`, `name`, `ticker`, `sector_id`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Advent Pharma','ADVENT',1,'2019-11-24 09:35:49','2019-11-24 09:35:49'),
	(2,NULL,'ACI Formulations Limited','ACIFORMULA',1,'2019-11-27 17:47:29','2019-11-27 17:47:29'),
	(3,NULL,'GrameenPhone','GP',3,'2019-11-27 18:28:21','2019-11-27 18:28:21'),
	(4,NULL,'Marico Bangladesh Limited','MARICO',1,'2019-11-28 05:27:00','2019-11-28 05:27:00'),
	(5,NULL,'Al- Arafah Islami Bank Ltd.','ALARABANK',2,'2019-11-30 16:08:50','2019-11-30 16:08:50'),
	(6,NULL,'Bank Asia Ltd.','BANKASIA',2,'2019-11-30 16:12:07','2019-11-30 16:12:07'),
	(7,NULL,'Dhaka Bank Ltd.','DHAKABANK',2,'2019-11-30 16:29:42','2019-11-30 16:29:42'),
	(8,NULL,'BRAC Bank Ltd.','BRACBANK',2,'2019-12-01 08:12:18','2019-12-01 08:12:18'),
	(9,NULL,'Berger Paints Bangladesh Ltd.','BERGERPBL',11,'2019-12-01 08:16:41','2019-12-01 08:16:41'),
	(10,NULL,'Marico Bangladesh Limited','MARICO',1,'2019-12-01 08:23:32','2019-12-01 08:23:32'),
	(11,NULL,'Esquire Knit Composite Ltd.','ESQUIRENIT',14,'2019-12-01 08:27:05','2019-12-01 08:27:05'),
	(12,NULL,'Ifad Autos Ltd.','IFADAUTOS',6,'2019-12-01 08:30:30','2019-12-01 08:30:30'),
	(13,NULL,'Renata Ltd.','RENATA',1,'2019-12-01 08:35:48','2019-12-01 08:35:48'),
	(14,NULL,'IDLC Finance Ltd.','IDLC',7,'2019-12-01 08:39:07','2019-12-01 08:39:07'),
	(15,NULL,'Summit Power Ltd','SUMITPOWER',9,'2019-12-01 08:48:54','2019-12-01 08:48:54'),
	(16,NULL,'Singer Bangladesh Ltd.','SINGER',6,'2019-12-01 08:57:49','2019-12-01 08:57:49'),
	(17,NULL,'Bata Shoe Company (Bangladesh) Limited','BATASHOE',13,'2019-12-01 08:59:00','2019-12-01 08:59:00'),
	(18,NULL,'Olympic Industries Ltd.','OLYMPIC',8,'2019-12-01 09:02:29','2019-12-01 09:02:29'),
	(19,NULL,'Recitt Benckiser (BD) Ltd','RECKITBEN',1,'2019-12-01 09:05:48','2019-12-01 09:05:48'),
	(20,NULL,'Unique Hotel & Resorts Ltd.','UNIQUEHRL',15,'2019-12-01 16:37:00','2019-12-01 16:37:00'),
	(21,NULL,'Anlimayarn Dyeing Ltd.','ANLIMAYARN',14,'2019-12-01 16:52:35','2019-12-01 16:52:35'),
	(22,NULL,'Shasha Denims Limited','SHASHADNIM',14,'2019-12-01 17:04:13','2019-12-01 17:04:13'),
	(23,NULL,'Apex Spinning & Knitting Mills Ltd.','APEXSPINN',14,'2019-12-01 17:09:24','2019-12-01 17:09:24'),
	(24,NULL,'Dragon Sweater and Spinning Ltd.','DSSL',14,'2019-12-01 17:21:13','2019-12-01 17:21:13'),
	(25,NULL,'Evince Textiles Limited','ETL',14,'2019-12-01 17:26:03','2019-12-01 17:26:03'),
	(26,NULL,'Hamid Fabrics Ltd.','HFL',14,'2019-12-01 17:47:18','2019-12-01 17:47:18'),
	(27,NULL,'Hwa Well Textiles (BD) Limited','HWAWELLTEX',14,'2019-12-01 17:51:49','2019-12-01 17:51:49'),
	(28,NULL,'Malek Spinning Mills Ltd.','MALEKSPIN',14,'2019-12-01 17:59:59','2019-12-01 17:59:59'),
	(29,NULL,'Malek Spinning Mills Ltd.','MALEKSPIN',14,'2019-12-01 18:03:45','2019-12-01 18:03:45'),
	(30,NULL,'Matin Spinning Mills Ltd.','MATINSPINN',14,'2019-12-01 18:12:22','2019-12-01 18:12:22'),
	(31,NULL,'M.L. Dyeing Limited','MLDYEING',14,'2019-12-01 18:22:56','2019-12-01 18:22:56'),
	(32,NULL,'Nurani Dyeing & Sweater Ltd.','NURANI',14,'2019-12-01 18:29:45','2019-12-01 18:29:45'),
	(33,NULL,'Regent Textile Mills Ltd','REGENTTEX',14,'2019-12-01 18:33:18','2019-12-01 18:33:18'),
	(34,NULL,'Advanced Chemical Industries Ltd.','ACI',1,'2019-12-01 18:38:58','2019-12-01 18:38:58'),
	(35,NULL,'Zaheen Spinning Ltd.','ZAHEENSPIN',14,'2019-12-02 04:02:16','2019-12-02 04:02:16'),
	(36,NULL,'Uttara Finance and Investments Ltd.','UTTARAFIN',7,'2019-12-02 04:05:49','2019-12-02 04:05:49'),
	(37,NULL,'United Finance Ltd.','UNITEDFIN',7,'2019-12-02 04:12:05','2019-12-02 04:12:05'),
	(38,NULL,'Union Capital Ltd.','UNIONCAP',7,'2019-12-02 04:24:09','2019-12-02 04:24:09'),
	(39,NULL,'British American Tobacco Bangladesh Ltd.','BATBC',8,'2019-12-02 16:36:37','2019-12-02 16:36:37'),
	(40,NULL,'Fine Foods Ltd','FINEFOODS',8,'2019-12-02 16:43:59','2019-12-02 16:43:59'),
	(41,NULL,'Olympic Industries Ltd','OLYMPIC',8,'2019-12-02 17:01:30','2019-12-02 17:01:30'),
	(42,NULL,'Dhaka Electric Supply Company Ltd.','DESCO',9,'2019-12-02 17:18:21','2019-12-02 17:18:21'),
	(43,NULL,'National Tea Company Ltd.','NTC',8,'2019-12-02 17:31:00','2019-12-02 17:31:00'),
	(44,NULL,'Khulna Power Company Ltd.','KPCL',9,'2019-12-02 17:37:10','2019-12-02 17:37:10'),
	(45,NULL,'Linde Bangladesh Ltd.','LINDEBD',9,'2019-12-02 17:41:23','2019-12-02 17:41:23'),
	(46,NULL,'Shahjibazar Power Company Ltd.','SPCL',9,'2019-12-02 17:48:33','2019-12-02 17:48:33'),
	(47,NULL,'Daffodil Computers Ltd.','DAFODILCOM',10,'2019-12-02 17:58:55','2019-12-02 17:58:55'),
	(48,NULL,'BDCOM Online Ltd.','BDCOM',10,'2019-12-02 18:04:31','2019-12-02 18:04:31'),
	(49,NULL,'National Feed Mill Limited','NFML',11,'2019-12-02 18:23:34','2019-12-02 18:23:34'),
	(50,NULL,'GlaxoSmithkline Bangladesh Limited','Glaxosmith',1,'2019-12-02 18:29:38','2019-12-02 18:29:38'),
	(51,NULL,'Square Pharmaceuticals Ltd.','SQURPHARMA',1,'2019-12-02 18:34:32','2019-12-02 18:34:32'),
	(52,NULL,'Eastern Housing Limited','EHL',12,'2019-12-02 18:37:14','2019-12-02 18:37:14'),
	(53,NULL,'Dhaka Bank Ltd.','DHAKABANK',2,'2019-12-02 18:40:06','2019-12-02 18:40:06'),
	(54,NULL,'Dutch Bangla Bank Ltd.','DUTCHBANGL',2,'2019-12-02 18:41:17','2019-12-02 18:41:17'),
	(55,NULL,'Eastern Bank Limited','EBL',2,'2019-12-02 18:43:31','2019-12-02 18:43:31'),
	(56,NULL,'IFIC Bank Ltd.','IFIC',2,'2019-12-02 18:45:24','2019-12-02 18:45:24'),
	(57,NULL,'Confidence Cement Ltd.','CONFIDCEM',4,'2019-12-02 18:48:58','2019-12-02 18:48:58'),
	(58,NULL,'Standard Ceramic Industry Ltd.','STANCERAM',5,'2019-12-02 18:56:02','2019-12-02 18:56:02'),
	(59,NULL,'BBS Cables Ltd.','BBSCABLES',6,'2019-12-02 18:59:36','2019-12-02 18:59:36'),
	(60,NULL,'Bangladesh Lamps Ltd.','BDLAMPS',6,'2019-12-02 19:04:18','2019-12-02 19:04:18'),
	(61,NULL,'Deshbandhu Polymar Ltd.','DESHBANDHU',6,'2019-12-02 19:06:43','2019-12-02 19:06:43'),
	(62,NULL,'GPH ISPAT LTD.','GPHISPAT',6,'2019-12-02 19:09:55','2019-12-02 19:09:55'),
	(63,NULL,'Navana CNG Ltd.','NAVANACNG',6,'2019-12-02 19:12:47','2019-12-02 19:12:47'),
	(64,NULL,'SS STEEL Ltd.','SSSTEEL',6,'2019-12-02 19:15:43','2019-12-02 19:15:43'),
	(65,NULL,'Western Marine Shipyard Ltd.','WMSHIPYARD',6,'2019-12-02 19:20:16','2019-12-02 19:20:16');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table finance_infos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `finance_infos`;

CREATE TABLE `finance_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) NOT NULL,
  `year` int(11) NOT NULL,
  `annual_excel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_1_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_2_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_3_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_4_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_5_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1__pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1_excel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2__pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2_excel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3__pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3_excel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4__pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4_excel_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_excel_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_1_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_2_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_3_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_4_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_pdf_5_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1__pdf_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1_excel_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2__pdf_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2_excel_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3__pdf_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3_excel_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4__pdf_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4_excel_download_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `finance_infos` WRITE;
/*!40000 ALTER TABLE `finance_infos` DISABLE KEYS */;

INSERT INTO `finance_infos` (`id`, `deleted_at`, `company_id`, `year`, `annual_excel_url`, `annual_pdf_1_url`, `annual_pdf_2_url`, `annual_pdf_3_url`, `annual_pdf_4_url`, `annual_pdf_5_url`, `q1__pdf_url`, `q1_excel_url`, `q2__pdf_url`, `q2_excel_url`, `q3__pdf_url`, `q3_excel_url`, `q4__pdf_url`, `q4_excel_url`, `annual_excel_download_count`, `annual_pdf_1_download_count`, `annual_pdf_2_download_count`, `annual_pdf_3_download_count`, `annual_pdf_4_download_count`, `annual_pdf_5_download_count`, `q1__pdf_download_count`, `q1_excel_download_count`, `q2__pdf_download_count`, `q2_excel_download_count`, `q3__pdf_download_count`, `q3_excel_download_count`, `q4__pdf_download_count`, `q4_excel_download_count`, `created_at`, `updated_at`)
VALUES
	(1,'2019-11-24 09:36:57',1,5,'#','#','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-24 09:36:42','2019-11-24 09:36:57'),
	(2,NULL,1,2018,'local/financial-info/1/excel/xyml7MwwmrYlEZ9aoSAwVljMtgzxbnOoYDmEHwYh.xlsx','local/financial-info/1/pdf/PAN0u3q2Km9wCd9wWAXMzy3FIkkZRfwFAUxredvu.pdf','local/financial-info/1/pdf/EpjyckAKRlNhnHRBsPtBhet51KHT8UkJsdsogcgG.pdf','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-24 09:37:01','2019-11-24 09:39:08'),
	(3,NULL,2,2018,'local/financial-info/2/excel/BpR3SChmSTNBU4khQ2Ck2boD7ahsJxpdyLEfk8nE.xlsx','local/financial-info/2/pdf/9UjyX9MQcGEc621zNQaIkNj95tH0qpn1XiooRuDx.pdf','local/financial-info/2/pdf/VFkTdPlnIhC4JSdXe41iHABkQvUC70phlQpWKqPf.pdf','local/financial-info/2/pdf/xjJPjJ3r5tuJlEyTPeV9fWi8XdZdKQ3QH2fPROF0.pdf','local/financial-info/2/pdf/gUAgbaq7NBakUTPx2clNDEG4X7IQGVjLdstaCNeE.pdf','local/financial-info/2/pdf/RrfMB3s7aMfnZSeUt9dvE1MNnv6M0sNEHbLecojO.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-27 17:47:41','2019-11-30 14:31:36'),
	(4,NULL,3,2019,'#','#','#','#','#','#','#','#','local/financial-info/3/pdf/rdH1nUbeP6ZwfL5qvN3gtYZB7QgQLB7kCTnedH3v.pdf','local/financial-info/3/excel/TiUoOVyUrdlAYP8U14LI8Ju0QVy3ED2QzZPgnTcU.xlsx','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-27 18:28:37','2019-11-30 15:45:07'),
	(5,NULL,4,2019,'local/financial-info/4/excel/FQxtKroXc8VLttbXCtxashQzhI8CaIoTYnxGjjEP.xlsx','local/financial-info/4/pdf/FhaZIT81EMJ81APbYIoKbuO6PMPdIM5Xuz2PVMGb.pdf','local/financial-info/4/pdf/d4vbRzwNVtgpwqivVmQG9ZQIZ719LsjBF4Pl5s54.pdf','local/financial-info/4/pdf/bK0zNqfo3Lf22DDnmUMAFmIH16SwFFwmy7qPLLTX.pdf','local/financial-info/4/pdf/E0dRrQVPVG80IoGQjwn6yqPxCKS3AemEChuf0Yy6.pdf','local/financial-info/4/pdf/fvvWCSBNpPapnl7ucURfZiuXPW1sVCaNBJ3TdWHJ.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-28 05:34:42','2019-12-01 08:25:18'),
	(6,NULL,5,2018,'local/financial-info/5/excel/kVbIMkF5JOUW1haCUBzWKtnzGcIPCfalw1qvlzOz.xlsx','local/financial-info/5/pdf/wADEbGkQeVM4RY3LDL1PaHcF4JWbwdpQ30xpzE5L.pdf','local/financial-info/5/pdf/iz2yLU1upJWTb2FVk6Ck0bihWC5t2zP67TfX77LO.pdf','local/financial-info/5/pdf/SParmAHEHZTgMApHp5pOwgmAvWJKg7oeCVkHgWsj.pdf','local/financial-info/5/pdf/DOa8B4rmUhlQFeFR8BpNNSXRdcr6LBpcGGq8vj8l.pdf','local/financial-info/5/pdf/mf5EP0kFsjc4Nuzynl6Ast9B6wiDNZBSgPZUwYp8.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-30 16:09:00','2019-11-30 16:10:34'),
	(7,NULL,6,2018,'local/financial-info/6/excel/EwwxSzEXXVpBfiNkgmPlLfIm3e2MmiM5gKJZlTSr.xlsx','local/financial-info/6/pdf/GXGArSsxB79SJg5Kf0X1l29IZ36EDNG9UqVVP1cx.pdf','local/financial-info/6/pdf/h7aSAt2ZSyS3q2zZvLD47uC1uP755OzzfSRHI7A4.pdf','local/financial-info/6/pdf/vrPYbPUvJuCGq3HLAGynZCzdlwz76ricQ1bpQiAP.pdf','local/financial-info/6/pdf/8y10DH9srPBtl6D3qaOxscSjBGN2fiYEvV9nzJzy.pdf','local/financial-info/6/pdf/3RlME9ecjKxmCdIjzC23vQvII5ldJ6jjhlpBF89Y.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-30 16:12:15','2019-11-30 16:17:02'),
	(8,NULL,7,2018,'local/financial-info/7/excel/k4FyMMbj4FvcATwsw9b8UwNf5Q5qIogIoSbBggOg.xlsx','local/financial-info/7/pdf/DKR0gGtjZx8a1tUqEg9bEXtFKAOK6wcCXP8EBVjZ.pdf','local/financial-info/7/pdf/4HQqY4UXeUZXP9FN0qH5Il1rXLD37ZRu8odzpDxX.pdf','local/financial-info/7/pdf/HGk8YUEapkhhdF90GMClymsNuuHCWEvIFRF3VHXq.pdf','local/financial-info/7/pdf/4Zr2MH2nYfPi5f46Bb5O2NTzyOS083FtRD1OYZmc.pdf','local/financial-info/7/pdf/4SNnK0oIGgprr8665U3CbQLdmhL3oJavLMySOZK9.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-11-30 16:29:49','2019-11-30 16:31:12'),
	(9,NULL,3,2018,'local/financial-info/3/excel/Zcq4KjwuFoyiEMApJv76QwgukK6dojva5sE7OmvW.xlsx','#','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 06:54:12','2019-12-01 08:07:44'),
	(10,NULL,8,2018,'#','local/financial-info/8/pdf/jhKsMYukou0vhc3Umnf1xdVEGJQGWBKxEUBW0P7e.pdf','local/financial-info/8/pdf/KqU5HaDDt7tnP07m0oy88v4D0yIOYm7Be3EcXyqF.pdf','local/financial-info/8/pdf/hDtgLLCpDZuzLreXBUUYb5CxRdvGGCSdFwpB08a4.pdf','local/financial-info/8/pdf/vLEzNwqCyZZs1zN7GB3WvTpJv7kgGurNjdAC5aLj.pdf','local/financial-info/8/pdf/mCrBNTsdbCix9jl0xSXWCZKDY5cWcaO5pqfPUwDQ.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:12:28','2019-12-01 08:13:23'),
	(11,'2019-12-02 17:55:56',9,2018,'local/financial-info/9/excel/DxvhslcHztM4Uv9lk5cD922HFSGVEGLsVPuP4KWF.xlsx','local/financial-info/9/pdf/ZlDEoriTyJ4QnmPhbHEI1UeqGenKh1UtuQaOf8Sv.pdf','local/financial-info/9/pdf/8unyywcBfzvAvyfoFQOzbqbfHAFRyN2HXzwgAILv.pdf','local/financial-info/9/pdf/zNMlNQCNMw2bvZUtXJhpUVII3pcYYMzU9h3qZJtn.pdf','local/financial-info/9/pdf/SPUSi6YCtu4eDxZZ6z9unv4q2uNAJCpx50XJGkJj.pdf','local/financial-info/9/pdf/Fa5YEOGrH3nu2z2pw78LNlcSOsAvb9PbveWgyO1j.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:20:45','2019-12-02 17:55:56'),
	(12,'2019-12-01 08:24:16',4,2018,'#','#','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:23:45','2019-12-01 08:24:16'),
	(13,'2019-12-01 08:27:31',11,2019,'#','#','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:27:19','2019-12-01 08:27:31'),
	(14,NULL,11,2018,'local/financial-info/11/excel/DoXCXHeMDjeyyIQPtfJrJoyF5em8wj9i3aCiYeku.xlsx','local/financial-info/11/pdf/HCB8O7cRtdN6mf1MPA4T29lYWeR2jBpZwalaLTgz.pdf','local/financial-info/11/pdf/Ykq1trGMkK6K9b3EIaB5lgRsTtf61i9FyuPad4Cj.pdf','local/financial-info/11/pdf/JwLMdtYaA38PDMsTXAGJXSV7cvrWd6u3oqx4yvkx.pdf','local/financial-info/11/pdf/HcGbAMg7LauE6Ves2tJEYph8KiZgi3pB91TLvTrC.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:27:26','2019-12-01 08:28:21'),
	(15,NULL,12,2018,'local/financial-info/12/excel/0AAZ6sjFYilDaBMNK0jMM9i4lAFZouMZrbfWbDum.xlsx','local/financial-info/12/pdf/8EGvmTrUOGer5Vd5wLx4HGYSPew7d1jvZDUvWoGv.pdf','local/financial-info/12/pdf/kYf9fBh1nwQW4hyJ19igwurtbL1wIWWzpNRlCtGl.pdf','local/financial-info/12/pdf/sLJg9Ef3Nc7yzGcBoXqSQ5EW2ZQiIix33srPtnON.pdf','local/financial-info/12/pdf/4bhdZDmgJGg7hPdZbxJ8pvDsf3AYxF5O8quZhVRD.pdf','local/financial-info/12/pdf/Np7YHlZJF0jMsDG2hUkQKUAHV4mQzRCqFYisOPvr.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:30:54','2019-12-01 08:32:19'),
	(16,NULL,13,2019,'local/financial-info/13/excel/75N3u2BnvKbxAi05gvERUFGLzM7WaZsf3W95WFvg.xlsx','local/financial-info/13/pdf/kOrxx9GJVkAfc7SO0Yiom7Pjx4FKxBrbhoZaSY5h.pdf','local/financial-info/13/pdf/AnezTJA4AdiNxoNzrElHG2cbzd9Qj10Hai7nJHUK.pdf','local/financial-info/13/pdf/9Pzg0EqVtYVpe7QG0AQd1SZi2yT2VWRaZL5KLTJJ.pdf','local/financial-info/13/pdf/csLBNJAss9PET4xaJkjfwPat522tvTR7sEW6YJhD.pdf','local/financial-info/13/pdf/wc5ah9FoKkd5OrnzBFtgneknsoXSImjULnnwb3LP.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:36:09','2019-12-02 18:26:05'),
	(17,NULL,14,2018,'local/financial-info/14/excel/FiSKId7SIQXUcVHQx1KGB0KrZzInwwHrr5aWU0J2.xlsx','local/financial-info/14/pdf/P0YaNcYNEkdxRoFhgbzrLgTwKeGmg7zi6reZY1rC.pdf','local/financial-info/14/pdf/ZvEUkhh1Btw0euJlqKuMhKXUmtWjqsHbjtWeJXR3.pdf','local/financial-info/14/pdf/38IQsujn60myQihcbOpGYuPKr7INiRYHnDQlFgbh.pdf','local/financial-info/14/pdf/Jzxo3oyodylpKSRzLVtpbifw2hy98mZtZBXeqWza.pdf','local/financial-info/14/pdf/JsiMKbx2f6OzEIOEXQjWU52Cu3VjeGGnJ27nlf3M.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:39:38','2019-12-01 08:46:50'),
	(18,NULL,15,2018,'local/financial-info/15/excel/FhFf16Yr0AAN6sekfIGT3K8M5i7mqZgyxGoeJWzs.xlsx','local/financial-info/15/pdf/wRbsERgkLc0q9Y1JmkUxyU5Zmk60yEIgL736MV2x.pdf','local/financial-info/15/pdf/PyDDILlOi32D7NEjhyiUxg7HHB8bHBjx3GjEqEkC.pdf','local/financial-info/15/pdf/PtqeobJ5HAWHVOPX1tPwGdXdsBCIkb3rL2aLv18J.pdf','local/financial-info/15/pdf/x3t6UJ9qUKCdUdV7f9rPSBG5MV5FHxoCl9r2UuY0.pdf','local/financial-info/15/pdf/59MgF87u1vIKkBuljs21gB1ia8iHG3N6va0Re2ke.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:49:08','2019-12-01 08:50:02'),
	(19,NULL,16,2018,'local/financial-info/16/excel/ClI48wX3k5U3UJglTUvjmjfvScbQWa8mNYvfz6LN.xlsx','local/financial-info/16/pdf/MaTDcpw22pIweetMhw0PAnZ9SHoBW44Cf9oUS4qs.pdf','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:58:00','2019-12-01 08:58:35'),
	(20,NULL,17,2018,'local/financial-info/17/excel/EL7r0HlsBImueaGXwMFUyxRbVncSYjlLGlPkfNqd.xlsx','local/financial-info/17/pdf/1lnZHVXsx5YFrInI7PNtEbur6ZLLayVsVRoMDMRb.pdf','local/financial-info/17/pdf/uNnl8zNNXE4QP1XSVeoK0Ii3LrUoIQ0Bk2QEi4UY.pdf','local/financial-info/17/pdf/vyVxrs5r76wj2mNHpLqw0FWUjgxbZlu5F6IIjLrr.pdf','local/financial-info/17/pdf/XJ3dn1r8ZufEICSgwrPGL1Hg9ywgb2asW2x7HSz1.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 08:59:15','2019-12-01 08:59:52'),
	(21,'2019-12-02 17:02:30',18,2019,'#','local/financial-info/18/pdf/ynIo8GKVwRtPhecb1RSXwkCzQX7U8QQO9YW61lGp.pdf','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 09:02:44','2019-12-02 17:02:30'),
	(22,NULL,19,2018,'local/financial-info/19/excel/GIPynWEUKbtYTBc66p5IyR4BHbk5XAKnLM6a0mAQ.xlsx','local/financial-info/19/pdf/j2w6uPLYZJQYyWiN9RVJOJzj4N6oEoZdA8EMNG1w.pdf','local/financial-info/19/pdf/Tuw0GNeIbcPh1nyqzXBTyhRcbrwsxwU9eTdD9fZd.pdf','local/financial-info/19/pdf/ToYRIRUf01nQEBZ5pQi9v6mwT5w8rrKG9QV57eaK.pdf','local/financial-info/19/pdf/mqsjXEKRf0KpBaddLqzaxSP0VjDYMXMJ9AG1x5BR.pdf','local/financial-info/19/pdf/pRi4rwTc4Sk67kbHFzSvwfWVsRYJ1HYfl2xuOIgX.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 09:06:12','2019-12-01 09:06:53'),
	(23,NULL,20,2019,'local/financial-info/20/excel/Xg9jccZYw8Dka8MXNOLlRujHdv0LDN2eC9vyBjeE.xlsx','local/financial-info/20/pdf/b6lotj7nkfTTclVr46U3yq9o9J9YllPRQ1lGwkaN.pdf','local/financial-info/20/pdf/jewjeTnu3Gtrm0cACTfykAEbM7Pn3nAaxAReIFEA.pdf','local/financial-info/20/pdf/ktLgSXLY6U6nNW2Y3POazmHHrdvsFtSqPrhKu79p.pdf','local/financial-info/20/pdf/HqXz8zkI2LlDth91dX3GUfGH6Q0k2Bsi7p1AaCRB.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 16:37:17','2019-12-01 16:40:52'),
	(24,NULL,20,2018,'local/financial-info/20/excel/J8gEFuZRYBrSa9ntJqHIuRwZXRqTfYms1N7Doqc9.xlsx','local/financial-info/20/pdf/TphSBSjqG8U1fnNeHgp1nRKk9eF4Zy7awHrCBFD1.pdf','local/financial-info/20/pdf/vDe64C45UdDhwCZqJUZwKm4jwU9V17he5dArMmZO.pdf','local/financial-info/20/pdf/aiqS3XpXkNyEn8v2PQmuxbTUVRo7Ug01NqmoXgOw.pdf','local/financial-info/20/pdf/QfVVThpkYdXFeQ4UPasIPS3i9h8CzpRfCNsDEFWl.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 16:41:30','2019-12-01 16:44:40'),
	(25,NULL,21,2018,'local/financial-info/21/excel/Q3r1dcpVjxac4BM5sL8Dv7ZwXxAmVVvMNo0GNxBB.xlsx','local/financial-info/21/pdf/7jeylp1xMn6w9zM4nY2YavoyKq5NCwZCGG1x9uMV.pdf','local/financial-info/21/pdf/NK94bcNB2GxVNkt4A0IT2xTKTw9wD89Dd7zlplyx.pdf','local/financial-info/21/pdf/TGrr0SFPPziJSOJFpCYQgS7byhwbM4yEmvHQNpfi.pdf','local/financial-info/21/pdf/rxMdZxuQlv4sXwi0ZcY1meAZricJEDvI2iUp0jhv.pdf','local/financial-info/21/pdf/kkmKdf6X7seXLc21yglq4NQpeqZZCN0r9ESKFBZR.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 16:52:58','2019-12-01 16:57:50'),
	(26,NULL,22,2018,'local/financial-info/22/excel/ASTxvhHaoxB8NxdrR4azZvwAa9q6s6nYtuOru1dl.xlsx','local/financial-info/22/pdf/hiCpmdE4uUeNSyHuRObjJfQKHQ20M0DgxgWgjHsO.pdf','local/financial-info/22/pdf/nyPdvWtmnKyswRdrUgCCkoLtL11gsTSoiT7EF6bP.pdf','local/financial-info/22/pdf/NC1SAq1OKW9GmRturuRmsZOhurBX7DSpplN1c431.pdf','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:04:42','2019-12-01 17:06:40'),
	(27,NULL,23,2018,'local/financial-info/23/excel/No73sw5eQIUxTFMr0sVOJS7mgufJrkrdap9MTpvy.xlsx','local/financial-info/23/pdf/4HpaFE34ps6hSKSI6zwPSFqvEglgEJs6Qm7YMBsp.pdf','local/financial-info/23/pdf/p8N0IhIagVIVeZaYe05772n7XcaEHZklnizBOtWN.pdf','local/financial-info/23/pdf/NCRYmE6UgxlfDAtnVtFXRgUBjJfl4QwPNJ0U2HQ5.pdf','local/financial-info/23/pdf/vL1RlULt51gV236AW8tYYNNpVbBW5LTWwtHbmYxT.pdf','local/financial-info/23/pdf/WfnRaIFkpuV7Xmhx5G95BAVpr2Ms888sQxycVzFI.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:09:38','2019-12-01 17:16:47'),
	(28,NULL,24,2018,'local/financial-info/24/excel/SdIXau7QsD6U3MC69ea887orWOCpP3OyJOojdrQC.xlsx','local/financial-info/24/pdf/OyKwhDpVOGMzkjwETAhGEOFyVPMNKNmRoCuxfVEO.pdf','local/financial-info/24/pdf/6OnhPJa8IsEtHGI0UKpEKF5DXAXQcQpqy5sMg1s2.pdf','local/financial-info/24/pdf/sr7NNHLT4XUFXaA1kacrZ6uVZPnHEaPvI7b0Z67c.pdf','local/financial-info/24/pdf/1bPw7vFF76JPeRqLBDL6yEsbTfj3OBIB8eACryfO.pdf','local/financial-info/24/pdf/fcfud4eX7ZG1B314jq1WNs9BZ9f6qhgT6uxwtT16.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:21:41','2019-12-01 17:22:47'),
	(29,NULL,25,2018,'local/financial-info/25/excel/rlHibgZ0R4lpEmuykrkub1sZqJnRjWMizBTa76Ji.xlsx','local/financial-info/25/pdf/WBALq3X1WZyN2h7RYR5lw1iURja6LHsCNCqhZmiV.pdf','local/financial-info/25/pdf/plxpbJvlrOh7bDA3kU9kPklQRkmCS5j3m9GRpKSK.pdf','local/financial-info/25/pdf/W9tS92i8lNIA4VkPfTwsq6XWu6CfSC7oDXCqd5ex.pdf','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:26:30','2019-12-01 17:38:41'),
	(30,NULL,25,2019,'local/financial-info/25/excel/mZr2V5tb0KS9IJsWyQ1IrJGEafO6YulVhxRxlFuQ.xlsx','local/financial-info/25/pdf/JeIm1RpSv1Wsj99M6n9DLflPj0Wrv4mmTG7it1Dd.pdf','local/financial-info/25/pdf/tp36S7CkEWxplZMrzmQ2bZRSYuv5rriewRmCWVws.pdf','local/financial-info/25/pdf/t0C2qAQMMrwKxl6z32pTzYy32AGyXJ4QTvOhKEHW.pdf','local/financial-info/25/pdf/tVftszyxLFHEGzVujnVS0pzo15FqGQ6ZCiF0M4kl.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:39:36','2019-12-01 17:41:13'),
	(31,NULL,22,2019,'local/financial-info/22/excel/GZzYvSpHLedU82jHkGCzg14KmaULs0IWwZJPwsyb.xlsx','local/financial-info/22/pdf/SrB0LAZIIqtWb1T2dRRmIWOH6erWnvk84MFLaTqX.pdf','local/financial-info/22/pdf/cBrOp794TdVM6MLFC18vmAE1BZx3cqQxMt6Iqw7L.pdf','local/financial-info/22/pdf/GxUaLFjuEzxr9P7zxu2bkgYNtC0Bi75zLhwD6W5A.pdf','local/financial-info/22/pdf/8QcgDesXAS6OjTLr8321IUorn3YsUhGEBT0PuIVl.pdf','local/financial-info/22/pdf/U0IW7hcmIWVcGJQEK1t7sLfmKoSrY386rUhVpldd.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:41:44','2019-12-01 17:44:04'),
	(32,NULL,26,2018,'local/financial-info/26/excel/HoBBxPqYkTD0HlTSxwD5lk0Xjfr1lbqL1lgqsZAs.xlsx','local/financial-info/26/pdf/35B7OG3fa7To5ZIBv9us6SlcELFsOOS6jrwsmmoW.pdf','local/financial-info/26/pdf/75MvFecJ91bkU0EwmM3QcidU9FY9ZyL7Jt90rSZw.pdf','local/financial-info/26/pdf/zyzRPg0guFYTKqU8FUdKbrf93be03Ygja9sJwOxj.pdf','local/financial-info/26/pdf/mcsq5rRxaoc26dvZG03rsEwXfVQlFYiIHWHqTMZc.pdf','local/financial-info/26/pdf/dgCGpqk1sScZiHt6jV57zs0CDGaRR27ErW1y7mJR.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:47:47','2019-12-01 17:50:19'),
	(33,NULL,27,2018,'local/financial-info/27/excel/bMAKaLDUnIG0FTzrbS3XaoiOo626V6MXcWKtJ4fX.xlsx','local/financial-info/27/pdf/HFwxKU5JDIHNtMN04aJ6W9bEc3mYOswGvHDSsQZC.pdf','local/financial-info/27/pdf/miMhGU0zn5rEg41XOTfvSBkD54MjoUONIx7OJH3i.pdf','local/financial-info/27/pdf/GNpKTx3RDuGDcyfrWKmFh3xozYmKBdkweXQsXIux.pdf','local/financial-info/27/pdf/k7gm4FraKdQxEE9xXihLlN5NxV9qnXkKLkMb7UlX.pdf','local/financial-info/27/pdf/UOnzn1xLnrDAsMmcM7MkWFWdCX33eksJDNtD2xnd.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 17:52:03','2019-12-01 17:53:31'),
	(34,NULL,28,2018,'local/financial-info/28/excel/mr08Dbe063gj8xjpcRmb300P6nIAHueCLeO1yGtt.xlsx','local/financial-info/28/pdf/DANHbxRzcrjAMHPskZUNOJ41YpRzhgrbillD1fZP.pdf','local/financial-info/28/pdf/cT4T476gSrYexOb5TXovwXj96q3GKnkzWk6AA7Pe.pdf','local/financial-info/28/pdf/WsNWHqNVBfzMleBoeBWUEAa1QQk4Qd5ayzpocnWx.pdf','local/financial-info/28/pdf/y4uFUvPRlmSTcLIMy0UDeQBpC2Nwl8SsTGNJ3P01.pdf','local/financial-info/28/pdf/JDgJhHgukieQH1ZjjNcMS8faPhqxvSIvZ4LyNJYp.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:04:08','2019-12-01 18:05:03'),
	(35,NULL,30,2018,'local/financial-info/30/excel/03IEsDc3qpN9rGjTayGTReh4u3PO18xe7OeGsAze.xlsx','local/financial-info/30/pdf/0EyrCkdpibA7WxgLNZDqmk68DmyS15YDsv54oEoZ.pdf','local/financial-info/30/pdf/YTpbYfNeimFsvygnKj0DOCq7rPNYs0ExX3hylcRS.pdf','local/financial-info/30/pdf/hvaTKdfUF9gxdYlDkid1tCrJGGRaLu9WQqJpNei4.pdf','local/financial-info/30/pdf/VXksF8BSCwnIo7jQQVe4ukFhVBXlje7oxi80kljX.pdf','local/financial-info/30/pdf/L2aXw4FuTbbINFYrHuMIM5SfjH47Ol3PSKbiDK6Q.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:13:00','2019-12-01 18:16:21'),
	(36,NULL,31,2017,'local/financial-info/31/excel/PBipo0bXxMowoSCojgq6ERkYhSDRikNlHjXX5q01.xlsx','local/financial-info/31/pdf/aGgJMxs278LcI1BJw60UWtVPzP0nBeP7JTI3PipF.pdf','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:23:07','2019-12-01 18:23:48'),
	(37,NULL,32,2018,'local/financial-info/32/excel/Qgci7IyNzZwHgIfWAW5hA2vOzTHwdIpzr0hJ62XW.xlsx','local/financial-info/32/pdf/6YPgspV0VjLdGPxAxoomQZETVk80v6wsJAp0oXpN.pdf','local/financial-info/32/pdf/Yx6TZuY0IaIL5J8MS5xrqyqq7qiOLeY1JAUa7pps.pdf','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:29:57','2019-12-01 18:31:42'),
	(38,NULL,33,2018,'local/financial-info/33/excel/4fqJk9jL5GhAVtbaxwPw3cePOGfszTQ9FLKKkr5I.xlsx','local/financial-info/33/pdf/p3MwI4jlotHsWXl26JkAa3iQefhcgX99wVqPwZFK.pdf','local/financial-info/33/pdf/HV49bqIFh9ywEV6On5wyDTm8nqH8tS8Lorei2vhS.pdf','local/financial-info/33/pdf/FAc1fBtfWch5CwwQIkWiIE4sgvhpEBo3b7OSCcIs.pdf','local/financial-info/33/pdf/n36vryxPcObAYoYN76i3TUgrH1gOINNKe4AHgSgw.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:33:31','2019-12-01 18:34:52'),
	(39,NULL,34,2018,'local/financial-info/34/excel/LuABSBoyCIKXcXiX0iApwVchrusmHNQfeM3azzcT.xlsx','local/financial-info/34/pdf/xgpP7QE28M1guWQALkTfGfR6SyRpUPyAexsJOz0h.pdf','local/financial-info/34/pdf/pF5ocQeBo0Je6uH25iMrs12uQZ57sC2Q3tUB2Bjr.pdf','local/financial-info/34/pdf/jUmIK1qanmvCMT5N4LWucr24BB0HKiykeb2hWFiA.pdf','local/financial-info/34/pdf/jSx6E9zTwt8BkG24kxEVHlRNI7LwMUeSkuFPVCHa.pdf','local/financial-info/34/pdf/RYjaVw5EUZwlKW7jCnV4T7cNxDFnMU4thg9t3Uvl.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-01 18:41:59','2019-12-01 18:44:30'),
	(40,NULL,35,2018,'local/financial-info/35/excel/DBRLAvRL5wipWpxbnKals74Rs2KppOTA02FS3uGC.xlsx','local/financial-info/35/pdf/XVgJoYoQSHfovho9nePgrh1qfyQWALIR5mZdW7uE.pdf','local/financial-info/35/pdf/J8qLydJS5KXLaLWVHN7t1oRhJHxYZB5PiHJIy0V2.pdf','local/financial-info/35/pdf/6VaxTLQ8RK2ix3AKqY1kR7diegP1r3vqxR1BDHrM.pdf','local/financial-info/35/pdf/H7AsTHdx2TCBbVix8oTPLNbk4cBnkyQmN1LEfwjG.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 04:02:43','2019-12-02 04:03:36'),
	(41,NULL,36,2018,'local/financial-info/36/excel/XGRLoZbhkiTWtPmlzcEMZf8lMtYHlrWBNRwseV8M.xlsx','local/financial-info/36/pdf/QAXCHJ2Z1a8w6ZCMvdHtabrrzCTjoeu7QpvqJTEA.pdf','local/financial-info/36/pdf/7l9yQhS0UcY12wN5wHwCp1rE5Rreu8gDLUGxQ2NQ.pdf','local/financial-info/36/pdf/M2TVBkbad0OuSpcLDQnDaeHfPvruHrkvfOs7uOXL.pdf','local/financial-info/36/pdf/i3v3reGeH1eoOlsH2149HATbgZpxU85PBij5wlAY.pdf','local/financial-info/36/pdf/WZrKAxIbax0fhc7ILMG38JyTxcunh9pK3zEXUYgD.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 04:06:02','2019-12-02 04:10:51'),
	(42,NULL,37,2018,'local/financial-info/37/excel/EA701WhibZE6b3iJz1DP2uLdXyA8pksm7GBeFOSe.xlsx','local/financial-info/37/pdf/ILmeKU38Yo8ZHMCHGRQJ86yorr1XZOp9fCCXJ92V.pdf','local/financial-info/37/pdf/OcopUoy4jXmLJ4mFoBZXjdeputLekARNyHF7AoCk.pdf','local/financial-info/37/pdf/CYtWl49QiEHuBxjQ8vLg2u3eKyzfSUtPhIfUzML7.pdf','local/financial-info/37/pdf/OhzaSS9gX5D6QGEVV0Q7J1pfyvF9CbK9fav1GZU6.pdf','local/financial-info/37/pdf/AITeiUabJdW6pDLY2VuIlCjvaO44LXhSlvnj23K8.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 04:12:26','2019-12-02 04:17:53'),
	(43,NULL,38,2018,'local/financial-info/38/excel/cH4plr4YLC3p9A4AuzUVwE2xcmxbpG6h3rSSKnk7.xlsx','local/financial-info/38/pdf/TOHUUM19ldzCz42hd0Eh1ePzF2Gg4exBGRl4MqK4.pdf','local/financial-info/38/pdf/MvXws9hmacQepk0e9V9Pct3YELMAseIlue4lI51g.pdf','local/financial-info/38/pdf/x627LD1CmDNu9UwaNNPQJrE8c9rpi6a5UG7rjLFh.pdf','local/financial-info/38/pdf/7G4EMzSD03vsR6D82VemimTID4KudMoOLzgN0TFJ.pdf','local/financial-info/38/pdf/LE8A0hZ7141Oz0J06dnaoiVIAbWa5LyqkoLVkuz9.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 04:24:26','2019-12-02 04:31:40'),
	(44,NULL,39,2018,'local/financial-info/39/excel/41oBbrAvxAMYRG1st30I6phG9NR6wnhO2m3i8AqF.xlsx','local/financial-info/39/pdf/FdcmvSloRot47qjr5JM3y3GrT92eh0OLKO09mhH8.pdf','local/financial-info/39/pdf/vVFy2tLu0dNYum15QACGVZhYQowgedKC8uQ9bxwE.pdf','local/financial-info/39/pdf/M5lkLD8Fj2pZmqeMJlTaBTyyHdbE2ANQec9TNU0b.pdf','local/financial-info/39/pdf/mZsThEWS6x82kUgzbJRtOJptUdq07iP71KXqLRXf.pdf','local/financial-info/39/pdf/ucSa3zEVOD97aIL9Mi1heHuOkMGGR5ErL6L4aGbp.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 16:36:58','2019-12-02 16:39:30'),
	(45,'2019-12-02 16:48:28',40,2018,'local/financial-info/40/excel/tAu1rFouSD7RVDEp62V8IbRSOmNM7ryVfry7WcXo.xlsx','local/financial-info/40/pdf/5u79knZfN4iQF3Ua4Hz972yXv7ArKn4ZikVoJ7nL.pdf','local/financial-info/40/pdf/HjcySj083DLjSVk2GjeT0WiizVjCO5rdzOrLpq7y.pdf','local/financial-info/40/pdf/bydcwiSQUuHRay3i31e8arE0jzm4ZPDiU5MXxweL.pdf','local/financial-info/40/pdf/xjTcAaRmFehgVNiz3qsaVwkWnXVsbCe5jEAaM7F5.pdf','local/financial-info/40/pdf/czZrKknpzpH66wPvjsCYuyNwMLRkphzcomubJQq0.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 16:44:24','2019-12-02 16:48:28'),
	(46,NULL,40,2018,'local/financial-info/40/excel/IejjibJUoHvM2e5fWwxIsMl06pVpVPyBWURWhPf4.xlsx','local/financial-info/40/pdf/jHu24DGFLjL3TAuDio17pK37950zoeSYmLTcq69d.pdf','local/financial-info/40/pdf/cY4O2gbkh1kPmuGGsWcxN9F9TVdggH4E89in3Vbx.pdf','local/financial-info/40/pdf/A98SyKwACf4lsH9iq1de2ciV7928imaAvGKWoyMA.pdf','local/financial-info/40/pdf/2zR4J8ZwMHh2Dq5y8lVv5I9lNvFmuxcTlyp3o8cY.pdf','local/financial-info/40/pdf/BEf7JeCP9ZBYiOy7FQS9rs1h1cHYq2kfnofXTnbM.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 16:48:37','2019-12-02 16:50:43'),
	(47,NULL,18,2018,'local/financial-info/18/excel/63JBQwInvOL3s2qK1Jr6LmlBwPgU9IlcKEk7SKBw.xlsx','local/financial-info/18/pdf/9kb5T4jvleLKHEy5SjFQjdRcWLxu1neqeM8mFdy1.pdf','local/financial-info/18/pdf/8QrKAYeCMDqyd0m1EAlYeEMomqaZpDWssYMdEG3D.pdf','local/financial-info/18/pdf/m2UGgA0jYtWZHJRpmmKv1rdfGYH6BBbB4dIzeGv0.pdf','local/financial-info/18/pdf/LoHX485SkqNs7rTJzsLvOCXt3ENpPnAK1gBcXZFG.pdf','local/financial-info/18/pdf/M1pKcJ3DVFMGkLdi5GSVpMILsHE6vBNs6cEIPFIZ.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:02:09','2019-12-02 17:03:48'),
	(48,NULL,42,2018,'local/financial-info/42/excel/AqDybF8D0x7CT4QFLf2s1kqSDul6iWQhtvHiBW6t.xlsx','local/financial-info/42/pdf/WD8HitMWJEaiNMMfmGP0RDmiJ25MKAhVCE0ZQY9X.pdf','local/financial-info/42/pdf/5TulxXErqHlam4xZSXUx3wMun6lh5xFw0oSN21ns.pdf','local/financial-info/42/pdf/UdJ2tBAWn8Kw2T3px9Cfgcis3kgCkNivH17cL4uA.pdf','local/financial-info/42/pdf/XLED7AnJ4ruXzdTL0vIx9VXbfns2EXbFfZQaTJpe.pdf','local/financial-info/42/pdf/SYbony7ww6HqDpneVUsrg6yddvICxL1xqDvqT1wt.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:18:45','2019-12-02 17:20:00'),
	(49,NULL,43,2018,'local/financial-info/43/excel/O3rhux3RqpIODtiBVOeG4iufm9iZD5mwtblASXl1.xlsx','local/financial-info/43/pdf/zGv9cTtKQmiSOoUspFoKxMzdzdBg0mSTlmfdzb0N.pdf','local/financial-info/43/pdf/nHrwdb6KKh49PGuKRHMQTdL5wyvMB1ktfrU8DxOp.pdf','local/financial-info/43/pdf/5RxKa9lDSzj0WJsSN1ztmOxSlDX9zuosgcXWOpvh.pdf','local/financial-info/43/pdf/1wJQX2FForNGoiRvJriPDjorXLpO7K5EjrjmnMq5.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:31:18','2019-12-02 17:33:08'),
	(50,NULL,44,2018,'local/financial-info/44/excel/zf70FGjltBH4bonjoxC6af9qCpzGBMsUtVqfpxhy.xlsx','local/financial-info/44/pdf/a8cY0aR4kaleNVy4U3FroauluX5gnbEj3nXMOC6X.pdf','local/financial-info/44/pdf/WhLWDECM7LEaWHJSvQ5qI9EaK0modCchWIHHmDDx.pdf','local/financial-info/44/pdf/hoTXqumd2WteA9PV9N1vJgifqgjNavzgSk5yE6BH.pdf','local/financial-info/44/pdf/S5Wuzp1uuuGAcdnGqzG3j1iBF1Gvl1XKFCDlC2eV.pdf','local/financial-info/44/pdf/AWXCHyWjj51bQUqRR83DLAsD6Xo6Is4IAn8cqtIQ.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:37:36','2019-12-02 17:38:38'),
	(51,NULL,45,2018,'local/financial-info/45/excel/jOMcQXLQRfTtP9tKOfHk8sOdxnOFxKE5CgCbUYOm.xlsx','local/financial-info/45/pdf/nXO6nIQI2HulbqyYi0Q1CeSQWNGapL7sHEZ4F0zm.pdf','local/financial-info/45/pdf/iaceJIJf8yCzY7nYlvVCabuqEg9Hvt8jFsvXG9AI.pdf','local/financial-info/45/pdf/qsIyf90s8ZmdYF0h3z9WmkWQSlDVoNABGxlgICDi.pdf','local/financial-info/45/pdf/lcvHXRTKV41ZlqO3RJn0tVzJu42YBX8BGSIoaMe5.pdf','local/financial-info/45/pdf/lI6yt3P0ouEQs0wKNi2NNaNlqcfInKQbPUhi3HEp.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:42:02','2019-12-02 17:43:21'),
	(52,NULL,46,2018,'local/financial-info/46/excel/MWb9jE4sTT9lfwGEvzraluI5hpI8MzZBfUPIPXpU.xlsx','local/financial-info/46/pdf/A5iK7wXH5NyjINZ7oqOjKETOdmfsIZFdGTLUeN7a.pdf','local/financial-info/46/pdf/NgCwSP8t28US4WNC2KJ6TDVpbjYz8cQhVXkVWlbC.pdf','local/financial-info/46/pdf/jFyXUHWqwCCzYKcdrW68CohxzX7U2ML9paPodn6U.pdf','local/financial-info/46/pdf/FlKR3QEuuxId3wXJw5I0Q9rFqU0FRPmx1ubrTW32.pdf','local/financial-info/46/pdf/3DYVcjeiyUwJBqg7e1HTE6Na2XQuHaDLR5UwcoZq.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:48:51','2019-12-02 17:50:12'),
	(53,NULL,9,2019,'local/financial-info/9/excel/vQzk0Oj2eV5oaLyr8kJhDLEH58PL03uEv1luLBhb.xlsx','local/financial-info/9/pdf/f264z8k825KV2yce1ane7Q2STxF7gW7AtUCvCrmX.pdf','local/financial-info/9/pdf/ZH4QQsgR7UYoa0kzxVXgwu2yDIz5kTp1vi9DF4pl.pdf','local/financial-info/9/pdf/BJIB0l799AAixo82aWR6UgHB6wrCIs0Ves8AIC9Y.pdf','local/financial-info/9/pdf/rn1eTzyBBBpcWynXQqyMOojQPHYLpyKa01oHMjSU.pdf','local/financial-info/9/pdf/dgLZtQsGXM5Y2TH7JgiIOxOlkCiDX3SReVDOTDjA.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:56:00','2019-12-02 17:57:15'),
	(54,NULL,47,2018,'local/financial-info/47/excel/JA1QTY6uYcpb64zjE7hAZEDGdmcIIyderzgykmVJ.xlsx','local/financial-info/47/pdf/iUcWybf0xnuQcX6ckgze4gRrmU6P56cWCdJ9DFRD.pdf','local/financial-info/47/pdf/7yCg2683VMgtvR7cnR7zThGeL7lf2uU4LNzAZlYF.pdf','local/financial-info/47/pdf/ZER6OuOYblgooxbq6DMJlcHq2QlYoaNoGDIachKl.pdf','local/financial-info/47/pdf/3PCRda125w3bd3BBrOAU3MTc0FYzr9k4BQH9jJRY.pdf','local/financial-info/47/pdf/TbuESURY8lFEaJBrP0VV4kUXpMtrxXYTJ24WhoGA.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 17:59:12','2019-12-02 18:00:27'),
	(55,NULL,48,2018,'local/financial-info/48/excel/RNeHS9xGbxTIIb1cxHblaz26uRuSxGMOUHUgygKH.xlsx','local/financial-info/48/pdf/jPzsPYBSHJMRmuX9KfC48he6mW17Eb8K5j1Dk4Qs.pdf','local/financial-info/48/pdf/aQxE79xW463n05NYgnOZn6lHqhHvIXR1yTm2NyyF.pdf','local/financial-info/48/pdf/dV1pxFWD6itvAcVMGfF96wZdm2HBd2tLAzJN5V4m.pdf','local/financial-info/48/pdf/ChbG0FrfV619CECN0C66upsN6c3gwYd4zjvzUyti.pdf','local/financial-info/48/pdf/jfabrIyyK9hAaG8x0jIQTSht5cD1jpllQ9nBm2AZ.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:04:43','2019-12-02 18:06:03'),
	(56,NULL,49,2018,'local/financial-info/49/excel/9oOK3kagWkZKyubILQUXo3RFsZo2liMtgKLdGP0p.xlsx','local/financial-info/49/pdf/GDAnyplVWWmlIgqjvvktUVp1meRzsFSImr3OdYgu.pdf','local/financial-info/49/pdf/HwkgeDz3LL4at9Bgl6iOQotNBSwQEpbDPel18i0J.pdf','local/financial-info/49/pdf/WMgZfZrfm96tDsHQdAjVHwxONviz5hWyAfhZEsxN.pdf','local/financial-info/49/pdf/ACwPPJYmZfi1AfeOq8xQQovDg8eahXHHvxHvSYVQ.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:23:47','2019-12-02 18:24:46'),
	(57,NULL,50,2018,'local/financial-info/50/excel/fCyEKH03R4fifiCKLtYR3DPNGIBSJHxw92CcRPlU.xlsx','local/financial-info/50/pdf/fQJ5bsEpB67KcPGKDcwN4ZxBOOmVbS7cRDpKX1S4.pdf','local/financial-info/50/pdf/H3LkoUuki579QZc2Cmnh6ewjUR7tr1Eu03GNou8u.pdf','local/financial-info/50/pdf/fdl9tLcOYXRsy7IHQAJXR0lMRgg1oDGjwXNCiqZX.pdf','local/financial-info/50/pdf/BHwc21qfJFydT8qO2Dq0Jb9mKperEKEfA31NQI5m.pdf','local/financial-info/50/pdf/AOnC1mMqXdYBm4FIzQqv6qOZwlP5mYwG7X62j3bT.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:29:57','2019-12-02 18:30:56'),
	(58,NULL,51,2018,'local/financial-info/51/excel/yf7zoQMsXgG5zu1FXaxCYXCFX4u4y5VUgChzqJUf.xlsx','local/financial-info/51/pdf/mYYGoOxM18UyrDo5UyMOzeBZx36OUcnGBtcFufta.pdf','local/financial-info/51/pdf/3HO7X8owsRPC0TeWH3JFt8Dwz3Ja0RN2MYYctepx.pdf','local/financial-info/51/pdf/rfjesX6sPvTY60vh82g07CPqLvRuWJh4HzpsscBN.pdf','local/financial-info/51/pdf/uVjXsTrOG4ve8xDxj5zTBM4gY1FFjeU2ugtUVHp8.pdf','local/financial-info/51/pdf/pkwOYcXBqd0f33X1LkSsX8dFXZeApcaW7ftjo6l0.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:34:42','2019-12-02 18:35:51'),
	(59,NULL,52,2018,'local/financial-info/52/excel/8PwoO0JfAiWYhzjegAecA5hY5LC7mGYwSfTqOY5R.xlsx','local/financial-info/52/pdf/laDWUaCJKUsWX3ZPVHtGMK2Hgv4wcgFtd6hVfYwv.pdf','local/financial-info/52/pdf/A9S6io7CfqzmYcbNfNXwJh6lIHSokldf1Ajf2wCL.pdf','local/financial-info/52/pdf/CzR4XT1hBFtV9lLK5l0y0tSFaODAghM90UDJdy2K.pdf','local/financial-info/52/pdf/qJOW6zqOYutdTYgqh8oG5tp9Blw2I2R3cR0jfKQM.pdf','local/financial-info/52/pdf/42fe9ga3eVH9lvoHPcZZUcFEuZNbK4qmvEnS73Qt.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:37:26','2019-12-02 18:38:25'),
	(60,NULL,54,2018,'local/financial-info/54/excel/DgDg1PGsUzIIdiPQg0jozUUN5Rbr9p3fysla5DVB.xlsx','local/financial-info/54/pdf/NR9UkAQEfhMyz21g78cjyX1BmitaEEEKhulzyEw5.pdf','local/financial-info/54/pdf/3BOd77YQOPf1KSx5LZgjbnJQMO8HLGKO7VhuF5VN.pdf','local/financial-info/54/pdf/Ewm5scW9zddmjTacaqNx03W70g0lcbRBEXpG15wM.pdf','local/financial-info/54/pdf/6L3NLuwjWlq2ddagLzRSsQKDwbaAoB5mIVOCavvp.pdf','local/financial-info/54/pdf/VQEmR1Isz3PdMPF9k1vQSlvEl2J9lO9r80DSF56n.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:41:27','2019-12-02 18:42:53'),
	(61,NULL,55,2018,'local/financial-info/55/excel/Lj8Neq2WW1dph4hL2xZm96RioLI7SLsCShZQfvc3.xlsx','local/financial-info/55/pdf/IshREPuLpv4m8EZMxHe1SxprfrnLxrL42uRtQXhA.pdf','local/financial-info/55/pdf/XA8hg8fiqxBq4M4JqWMeYghz7pn71qU2mhuwE9Vj.pdf','local/financial-info/55/pdf/tH1xNQOCzEZTSR9T6Sxe39pRsPtHCxsDBdCOa9HS.pdf','local/financial-info/55/pdf/l1wJQPdfA2R7GH6KEUlZJlDZfJmq2op5WRoM16ET.pdf','local/financial-info/55/pdf/cfOGAXWk6zLJBz6gwxYzxDAlkK9BenuJoOv0QYw6.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:43:41','2019-12-02 18:44:44'),
	(62,NULL,56,2018,'local/financial-info/56/excel/TJBk2DKXm6HckYnIhOBFBpw3zNSTfrpnT62ZuvY6.xlsx','local/financial-info/56/pdf/ZSJmySokJLmQMbEilEVA4AljMoSwT5nrRIDORZvF.pdf','local/financial-info/56/pdf/Nbdf7HUIIFwNidMNzAEKfzz7dixpldiJ1mfH79NE.pdf','local/financial-info/56/pdf/CoMJsIdMbEB7NzYSDX0ibxkIw2Y7eWZMYwj6MJb6.pdf','local/financial-info/56/pdf/PdR5xqx7JtQpEykNY3tU6OZTJT6EDsWAnc3xCrH9.pdf','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:45:34','2019-12-02 18:48:02'),
	(63,NULL,57,2018,'local/financial-info/57/excel/gxnGm48i1h2oHJuNFc4OGv4ErixO6Dd8Uq7wFA6h.xlsx','local/financial-info/57/pdf/HKRlbDgslj5xH5Msh7R1qvkg7HIJtT4Auo8B6cNE.pdf','local/financial-info/57/pdf/nlkqfg7ylQ3HrCVaq3WEnZexHAHKX89C0iJnzXyi.pdf','local/financial-info/57/pdf/BQtbSUyyTQvEC7A2te0slbl4MQjc7Xo1nk0Vm7OG.pdf','local/financial-info/57/pdf/uQTWf86acZlruuXrK0C3zBTRpVbJWYtQ4rXifpMj.pdf','local/financial-info/57/pdf/7UiJFnHQPM6apw4s7M0cSdk1OQKydyexjh0l0v6s.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:49:13','2019-12-02 18:50:51'),
	(64,NULL,58,2018,'local/financial-info/58/excel/UEJ3TgtYV3OBaw0CX35gyz0fCvSJ2Q1651ZW0sk5.xlsx','local/financial-info/58/pdf/CTRFMDXexnAqEfrfDB6hLthh5zEdsToTs4aFHVzT.pdf','local/financial-info/58/pdf/nysbiYKrIo8ljLs4uGD0UbS60xhcAoyf2eanGFBJ.pdf','local/financial-info/58/pdf/duZOPZx7qKvMsXWO8wcPffyKe09V7JmbMlzWLUqz.pdf','local/financial-info/58/pdf/sDIIlwWOGqe7seTGwgmxl2eY9yFBtszKIpSf6Xfm.pdf','local/financial-info/58/pdf/5b9egwdyHv2fzJxYBOIAZJVxoDkxL0TSOp5JdPwB.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 18:56:18','2019-12-02 18:57:25'),
	(65,NULL,59,2018,'local/financial-info/59/excel/tTY44DT9j5iLumn6IlXkcJfFUIdgSRrnaz5aLhpW.xlsx','local/financial-info/59/pdf/H2Cy2jUDmz1DEeFnS2U2YMRGwyaDqy8GO23l0fHR.pdf','local/financial-info/59/pdf/2I1hPezDPiLRNpix02PSulH7ICkSMWTvMf2wgStK.pdf','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:00:00','2019-12-02 19:02:14'),
	(66,NULL,60,2018,'local/financial-info/60/excel/DWhjBcP8oUjAFxsrdHQvvaKSeXWT7mHT4Be8w94A.xlsx','local/financial-info/60/pdf/5iDfRfCtbZbhkECmpxfaIhqlJ0oRt7XWehCnyehk.pdf','local/financial-info/60/pdf/GMX11wXZi8x3aQxg4xpkkl3lnZrHYcEibdyLBu6r.pdf','local/financial-info/60/pdf/1CQ5oGoN8o3t1p3JtTklr4iEskOCtjhe8jRaJsUQ.pdf','local/financial-info/60/pdf/B8D4A21HLY2hRlOorqmsnTbJjlAWl0Zn7XOOWXMT.pdf','local/financial-info/60/pdf/DW1kZeR562BvA7Z9AWFRDGeRhlGWZUNodTbkWMr7.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:04:27','2019-12-02 19:05:55'),
	(67,NULL,61,2018,'local/financial-info/61/excel/D4kyqzQkWgiGLLVh0Rt0sgOY7sEOpJK2WWUlOrZu.xlsx','local/financial-info/61/pdf/k0OxR4CbzBLORkzKMmsTuufaSIq6GABmYGu1IOzV.pdf','local/financial-info/61/pdf/VnlgdrIW3KjI9BAdMvwTbxdOxv5GL57D5Sjbl42L.pdf','local/financial-info/61/pdf/lUNpHQJzZa4F5pjC8rOPmF3uTiL43pvoMqRP6dTP.pdf','local/financial-info/61/pdf/owuM0oAYWOmwXt1N16pvJ9IUvQRiaYnSqvldRxKj.pdf','local/financial-info/61/pdf/4MY5WMktUA4RZdMDofYNC8ORVXO9pvwRKvNE0XjB.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:07:11','2019-12-02 19:09:19'),
	(68,NULL,62,2018,'local/financial-info/62/excel/gc3RPLxL3iMEnIFxgixpNxyqIthzLRkxEk8u5Ux1.xlsx','local/financial-info/62/pdf/ryruyrDx8AYpEoUOQLBzEbkhRM3EIX3z3RuVHU2G.pdf','local/financial-info/62/pdf/c658uJe2a7tsNrhqNoxixwLu0XwAFWLN91x2w3oE.pdf','local/financial-info/62/pdf/lxRxYMpC4e9AfSX7toI99V4Web8eQ7LdcFiqdJeH.pdf','local/financial-info/62/pdf/pQwHudHq3ifIFqNU3LZOZ0BPH9wvKsnTfKIaSLRm.pdf','local/financial-info/62/pdf/ed4lfRIN1wuRop3FT1JoETJR0gzKwBAPJReLt5CK.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:10:05','2019-12-02 19:11:33'),
	(69,NULL,63,2018,'local/financial-info/63/excel/vYZaKqAroKtitDHl3DHaTNzPQKgOFdD26yJ5RQfF.xlsx','local/financial-info/63/pdf/eux02EgLyGX8yrlrpng4d66GnopQJzr0VUg4Cqvv.pdf','local/financial-info/63/pdf/WF59a7okxXrwTtXKUBEwBdfPrBd5A6hoZEnvhhAZ.pdf','local/financial-info/63/pdf/oKeZDOEDQPIwp3cf29xwIMfH2SPtlCVQDZ58gZow.pdf','local/financial-info/63/pdf/Bkpab8w7pDuwKzxJakGgPreOwJLO6b8N5m9wCKIS.pdf','local/financial-info/63/pdf/iRsPZQzSEM411J5pICsWfZWG4n6LN0cGkZchjIqV.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:13:00','2019-12-02 19:14:23'),
	(70,NULL,64,2017,'local/financial-info/64/excel/hb40BU0GQgSGNUweP2wkJWfOn3ytgPhaFfTeEh49.xlsx','local/financial-info/64/pdf/4WMwJDhQSQ26PWloHpZlLm6zfDheLHUrxbaH0WxS.pdf','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:15:57','2019-12-02 19:17:08'),
	(71,NULL,65,2018,'local/financial-info/65/excel/IqPkkeJKBAYpbvOsQllfmpDYWMWeY7MBdHADQ4ys.xlsx','local/financial-info/65/pdf/DOinvMrUb2H4OiEPtrICDgeTycCAc0DYpcu4PmaE.pdf','local/financial-info/65/pdf/X5jq6UbqDx603z78PJTNubkn1kRiVyFvEUQH7AyA.pdf','local/financial-info/65/pdf/aHqecuA8zh3CaogC5wWFzY3d1ix7QdYBv8k4iHOg.pdf','local/financial-info/65/pdf/vFOuDaFI4IWkx5CfogUDdmSPiifG25iUk3fyshpg.pdf','local/financial-info/65/pdf/HiHP21gvK4IwNEGO38IUA20Az5Y5zGWqEHnDezHD.pdf','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-02 19:20:46','2019-12-02 19:22:09'),
	(72,'2019-12-03 13:04:33',5,2017,'#','#','#','#','#','#','#','#','#','#','#','#','#','#','0','0','0','0','0','0','0','0','0','0','0','0','0','0','2019-12-03 13:04:12','2019-12-03 13:04:33');

/*!40000 ALTER TABLE `finance_infos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_menu_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `deleted_at`, `parent_menu_id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'2019-11-29 06:58:39',1,'Monthly Commodity Price','2019-11-24 09:23:32','2019-11-29 06:58:39'),
	(2,'2019-11-29 06:58:24',1,'Commodity','2019-11-24 09:26:27','2019-11-29 06:58:24'),
	(3,'2019-11-29 06:58:27',NULL,'COMMODITY','2019-11-24 11:51:07','2019-11-29 06:58:27'),
	(4,'2019-11-30 14:45:38',NULL,'MACRO','2019-11-27 18:15:25','2019-11-30 14:45:38'),
	(5,NULL,NULL,'COMMODITY','2019-11-29 07:06:42','2019-11-29 07:06:42'),
	(6,NULL,NULL,'RESEARCH','2019-11-30 14:35:56','2019-11-30 14:35:56'),
	(7,NULL,NULL,'PUBLICATION','2019-11-30 14:36:04','2019-11-30 14:36:04'),
	(8,'2019-11-30 14:45:28',4,'Electricity Data','2019-11-30 14:39:30','2019-11-30 14:45:28'),
	(9,NULL,4,'Demographic Data','2019-11-30 14:40:04','2019-11-30 14:40:04'),
	(10,NULL,4,'Internet Subscriber','2019-11-30 14:42:34','2019-11-30 14:42:34'),
	(11,NULL,NULL,'MACRO','2019-11-30 14:46:34','2019-11-30 14:51:52'),
	(12,NULL,11,'Internet Subscriber','2019-11-30 14:48:27','2019-11-30 14:48:27'),
	(13,NULL,11,'Mobile Subscriber','2019-11-30 14:58:14','2019-11-30 14:58:14'),
	(14,NULL,11,'Registered Vehicle','2019-12-01 06:35:30','2019-12-01 06:35:30'),
	(15,NULL,11,'Monthly Macro Update','2019-12-01 06:37:28','2019-12-01 06:37:28');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(127,'2014_10_12_000000_create_users_table',1),
	(128,'2014_10_12_100000_create_password_resets_table',1),
	(129,'2019_08_19_000000_create_failed_jobs_table',1),
	(130,'2019_10_25_151615_create_menus_table',1),
	(131,'2019_10_25_151629_create_pages_table',1),
	(132,'2019_10_25_151640_create_page_items_table',1),
	(133,'2019_10_25_151653_create_companies_table',1),
	(134,'2019_10_25_151707_create_announcments_table',1),
	(135,'2019_10_25_151718_create_surveys_table',1),
	(136,'2019_10_25_151735_create_survey_questions_table',1),
	(137,'2019_10_25_151749_create_survey_answer_options_table',1),
	(138,'2019_10_25_151900_create_survey_hits_table',1),
	(139,'2019_10_25_151913_create_transactions_table',1),
	(140,'2019_10_25_151926_create_static_contents_table',1),
	(141,'2019_10_25_151939_create_finance_infos_table',1),
	(142,'2019_10_25_151950_create_searches_table',1),
	(143,'2019_10_25_151959_create_sectors_table',1),
	(144,'2019_10_25_152010_create_subscription_plans_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table page_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page_items`;

CREATE TABLE `page_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excel_file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excel_file_url_download_count` int(11) NOT NULL,
  `pdf_file_url_download_count` int(11) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `page_items` WRITE;
/*!40000 ALTER TABLE `page_items` DISABLE KEYS */;

INSERT INTO `page_items` (`id`, `deleted_at`, `particular`, `excel_file_url`, `pdf_file_url`, `excel_file_url_download_count`, `pdf_file_url_download_count`, `page_id`, `created_at`, `updated_at`)
VALUES
	(1,'2019-11-24 09:25:50','Monthly Commodity Price','#','#',0,0,1,'2019-11-24 09:25:42','2019-11-24 09:25:50'),
	(2,NULL,'Monthly Commodity Price','local/1/excel/mKO1AEazEw3Oo20vpvhDJirK3MGBYmQEdGUybAAr.xlsx','#',0,0,1,'2019-11-24 09:25:59','2019-11-24 09:25:59'),
	(3,NULL,'Monthly Commodity Price','local/2/excel/vGtQLS0OEvpmLa7oTwbEzrh93xz92h4JpkxgL34w.xlsx','#',0,0,2,'2019-11-24 11:59:49','2019-11-24 11:59:49'),
	(4,NULL,'Internet Subscriber_Oct 2019','local/3/excel/hCOQ4SYdcqXmRLzghomeymVrthfhGWtzF7SEfCHK.xlsx','#',0,0,3,'2019-11-27 18:18:56','2019-11-27 18:18:56'),
	(5,NULL,'Mobile Subscriber_Oct 2019','local/4/excel/zDo1F6019qQB6b9tQ8xFtoBe3z3XFTwAsFiIWdAY.xlsx','#',0,0,4,'2019-11-27 18:23:52','2019-11-27 18:23:52'),
	(6,'2019-11-30 14:19:15','Test','#','local/5/pdf/erOMzBO2MbpN24t7tymB0W7zwceqT7J2PmaETxLX.pdf',0,0,5,'2019-11-30 14:18:56','2019-11-30 14:19:15'),
	(7,'2019-11-30 14:20:17','Test','local/5/excel/F5pzsnSVz7PflW86uWPkE8ZObXBMbKQFK72rgaeg.xlsx','local/5/pdf/k4OFkJmUxuZVPXklLQKeCaIfzYY6bsBT4PsVlW3c.pdf',0,0,5,'2019-11-30 14:19:38','2019-11-30 14:20:17'),
	(8,'2019-11-30 16:00:45','Monthly Macro Update January 2019','local/5/excel/1YfHrlnCaY3yDwyzLmTQKzA70MY0pwwkkA6MDcN8.xlsx','local/5/pdf/iHJ0dreREvHcrbxMnKC3qG5cF6urw3J87v56nRaZ.pdf',0,0,5,'2019-11-30 14:21:11','2019-11-30 16:00:45'),
	(9,NULL,'Monthly Commodity Price_Oct 2019','local/5/excel/7l6ebpauHvwW5sgsn0nvyC031bSTir8VxYEuSAXG.xlsx','#',0,0,5,'2019-11-30 14:25:16','2019-11-30 14:25:16'),
	(10,NULL,'Country Overview: Bangladesh_GSMA','#','local/6/pdf/WOzJxLOntnRcnk70FMe702hPKAFzSPEbfRyCPs4y.pdf',0,0,6,'2019-11-30 14:40:15','2019-11-30 14:40:15'),
	(11,NULL,'Monthly Macro Update January 2019','local/7/excel/LvIftYPQmZ82z9XpzEaw1ggQrkzO7lA9dBh4BxGa.xlsx','local/7/pdf/dTY3uNZfSlOvE8xt7Qm9qVbXcrFLYcbRDsRmY5QP.pdf',0,0,7,'2019-11-30 14:41:53','2019-11-30 14:41:53'),
	(12,NULL,'Internet Subscriber_Oct 2019','local/8/excel/SbZqmLYkBIeTOL6gFHjANrfMnZnkhAuXb41DvHbE.xlsx','#',0,0,8,'2019-11-30 14:50:58','2019-11-30 14:50:58'),
	(13,NULL,'Mobile Subscriber_Oct 2019','local/9/excel/Lvy6aMb37xUwHwucQo63UzmpVs1YJ7YZrn1JDRsm.xlsx','#',0,0,9,'2019-11-30 15:13:14','2019-11-30 15:13:14'),
	(14,NULL,'Asian Development Outlook 2019 Update_ADB','#','local/6/pdf/OIm36Ne8FLWWE3JTlEqUYzI5lyHuqxVTpCh45g0Z.pdf',0,0,6,'2019-11-30 15:55:44','2019-11-30 15:55:44'),
	(15,NULL,'International Journal of SME Development_SME Foundation','#','local/6/pdf/UBf0yPHtX4n3DUWydu8kd5jXVwtwoY6pG2JqvWZO.pdf',0,0,6,'2019-11-30 18:41:10','2019-11-30 18:41:10'),
	(16,NULL,'Study on Future Direction of SMEs in Bangladesh_Ministry of Planning (GOB)','#','local/6/pdf/nOApoXF8bzOMkYihirsWuSjcXluyevEcBdZkOqGr.pdf',0,0,6,'2019-11-30 18:55:02','2019-11-30 18:55:02'),
	(17,'2019-12-01 06:17:02','Number of Registered Vehicle_Oct 2019','#','#',0,0,10,'2019-12-01 06:16:55','2019-12-01 06:17:02'),
	(18,NULL,'Number of Registered Vehicle_Oct 2019','local/10/excel/CpN2fYTQZWVaJPJ5kkMSIRqe23hY5AYE5bgpWjUk.xlsx','#',0,0,10,'2019-12-01 06:33:31','2019-12-01 06:33:31'),
	(19,NULL,'Monthly Macro Update_Oct 2019','local/11/excel/jBKBw2COMYWbCLofvGKMkILStEYQPVXifJNLtJLR.xlsx','#',0,0,11,'2019-12-01 06:38:26','2019-12-01 06:38:26'),
	(20,NULL,'Monthly Commodity Price_Nov 2019','local/5/excel/Q17JAMh0QLz07nYjCldGLV8KUDqfDEThiz6FNysK.xlsx','#',0,0,5,'2019-12-03 04:27:58','2019-12-03 04:27:58'),
	(21,NULL,'Bank Interest Rate_Oct 2019','local/12/excel/aA3xCV0168dpb4qExhXwnX0Xqu7GMPkikG27QPGx.xlsx','#',0,0,12,'2019-12-03 07:58:40','2019-12-03 07:58:40');

/*!40000 ALTER TABLE `page_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `deleted_at`, `title`, `menu_id`, `description`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'2019-11-29 07:00:03','Commodity',1,NULL,'Commodity','2019-11-24 09:25:01','2019-11-29 07:00:03'),
	(2,'2019-11-28 06:05:22','Commodity',3,NULL,'A','2019-11-24 11:59:30','2019-11-28 06:05:22'),
	(3,'2019-11-30 15:11:45','Internet Subscriber',4,NULL,'Internet_Subscriber','2019-11-27 18:17:33','2019-11-30 15:11:45'),
	(4,'2019-11-30 15:11:48','Mobile Subscriber',4,NULL,'Mobile_Subscriber','2019-11-27 18:22:55','2019-11-30 15:11:48'),
	(5,NULL,'Monthly Commodity Price',5,'It includes commodities like oil, gold, clinker, copra, wheat, sugar, aluminium, iron ore and copper.','Commodity_Price','2019-11-29 11:27:58','2019-12-03 12:16:33'),
	(6,NULL,'Publication',7,NULL,'Publication','2019-11-30 14:36:53','2019-11-30 14:36:53'),
	(7,'2019-11-30 15:11:34','Electricity Data',8,NULL,'ed','2019-11-30 14:41:26','2019-11-30 15:11:34'),
	(8,NULL,'Internet Subscriber',11,NULL,'Internet subscriber','2019-11-30 14:50:08','2019-11-30 14:50:08'),
	(9,NULL,'Mobile Subscriber',11,NULL,'Mobile Subscriber','2019-11-30 15:12:33','2019-11-30 15:12:33'),
	(10,NULL,'Registered Vehicle',11,NULL,'Registered Vehicle','2019-12-01 06:16:12','2019-12-01 06:16:12'),
	(11,NULL,'Monthly Macro Update',11,NULL,'Monthly Macro','2019-12-01 06:37:49','2019-12-01 06:37:49'),
	(12,NULL,'Bank Interest Rate',11,NULL,'Interest Rate','2019-12-03 07:57:47','2019-12-03 07:57:47');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table searches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `searches`;

CREATE TABLE `searches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `search_term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sectors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sectors`;

CREATE TABLE `sectors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;

INSERT INTO `sectors` (`id`, `deleted_at`, `name`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Pharmaceuticals','2019-11-24 09:35:20','2019-11-24 09:35:20'),
	(2,NULL,'Bank','2019-11-27 18:21:55','2019-11-29 06:54:56'),
	(3,NULL,'Telecommunication','2019-11-27 18:27:50','2019-11-27 18:27:50'),
	(4,NULL,'Cement','2019-11-29 06:55:19','2019-11-29 06:55:19'),
	(5,NULL,'Ceramics Sector','2019-11-29 06:55:34','2019-11-29 06:55:34'),
	(6,NULL,'Engineering','2019-11-29 06:55:47','2019-11-29 06:55:47'),
	(7,NULL,'Financial Institutions','2019-11-29 06:55:57','2019-11-29 06:55:57'),
	(8,NULL,'Food & Allied','2019-11-29 06:56:09','2019-11-29 06:56:09'),
	(9,NULL,'Fuel & Power','2019-11-29 06:56:19','2019-11-29 06:56:19'),
	(10,NULL,'IT','2019-11-29 06:56:34','2019-11-29 06:56:34'),
	(11,NULL,'Miscellaneous','2019-11-29 06:56:49','2019-11-29 06:56:49'),
	(12,NULL,'Services & Real Estate','2019-11-29 06:57:11','2019-11-29 06:57:11'),
	(13,NULL,'Tannery Industries','2019-11-29 06:57:21','2019-11-29 06:57:21'),
	(14,NULL,'Textile','2019-11-29 06:57:30','2019-11-29 06:57:30'),
	(15,NULL,'Travel & Leisure','2019-11-29 06:57:42','2019-11-29 06:57:42');

/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table static_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `static_contents`;

CREATE TABLE `static_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `static_contents` WRITE;
/*!40000 ALTER TABLE `static_contents` DISABLE KEYS */;

INSERT INTO `static_contents` (`id`, `deleted_at`, `key`, `value`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'phone','+880 1720 227189',NULL,NULL),
	(2,NULL,'email','info@dataresources-bd.com',NULL,NULL),
	(3,NULL,'website','www.dataresourcebd.com',NULL,NULL),
	(4,NULL,'who_we_are','DRB aims to provide accurate and workable data to help you make e best investment decision. All the data are collected from secondary source.',NULL,NULL),
	(5,NULL,'title','Bangladesh\'s First Aggregate Data Platform',NULL,NULL),
	(6,NULL,'subtitle','More than 1000 Contents',NULL,NULL);

/*!40000 ALTER TABLE `static_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscription_plans
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscription_plans`;

CREATE TABLE `subscription_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `duration_in_days` int(11) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table survey_answer_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `survey_answer_options`;

CREATE TABLE `survey_answer_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `survey_question_id` bigint(20) NOT NULL,
  `answer_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit_count` int(11) NOT NULL DEFAULT '0',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yellow',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `survey_answer_options` WRITE;
/*!40000 ALTER TABLE `survey_answer_options` DISABLE KEYS */;

INSERT INTO `survey_answer_options` (`id`, `deleted_at`, `survey_question_id`, `answer_option`, `hit_count`, `color`, `created_at`, `updated_at`)
VALUES
	(1,NULL,1,'Government',3,'yellow','2019-11-16 03:26:25','2019-11-16 03:29:20'),
	(2,NULL,1,'Farmer',4,'yellow','2019-11-16 03:26:29','2019-11-16 03:26:29'),
	(3,NULL,1,'Other Nations',6,'yellow','2019-11-16 03:26:37','2019-11-16 03:26:37'),
	(4,NULL,3,'Google',2,'#001e85','2019-11-16 05:40:20','2019-12-03 10:47:29'),
	(5,NULL,3,'Yahoo',1,'#ffc000','2019-11-16 05:40:24','2019-11-30 16:21:24'),
	(6,NULL,3,'Zoho',0,'#a6a6a6','2019-11-16 05:40:30','2019-11-30 16:21:46'),
	(7,NULL,2,'Facebook',2,'yellow','2019-11-16 05:40:44','2019-11-27 14:50:04'),
	(8,NULL,2,'Twitter',0,'yellow','2019-11-16 05:40:48','2019-11-16 05:40:48'),
	(9,NULL,4,'Yes',1,'yellow','2019-11-27 15:12:42','2019-11-30 12:24:01'),
	(10,NULL,4,'No',1,'yellow','2019-11-27 15:12:45','2019-11-27 17:32:11'),
	(11,NULL,4,'May be',0,'yellow','2019-11-27 15:13:02','2019-11-27 15:13:02'),
	(12,NULL,5,'Lack of competitiveness',0,'yellow','2019-11-28 05:54:40','2019-11-28 05:54:40'),
	(13,NULL,5,'Low devaluation than competitors',0,'yellow','2019-11-28 05:56:09','2019-11-28 05:56:09'),
	(14,NULL,5,'Both',0,'yellow','2019-11-28 05:56:19','2019-11-28 05:56:19'),
	(15,NULL,6,'Lack of competitiveness',0,'yellow','2019-11-28 05:58:15','2019-11-28 05:58:15'),
	(16,NULL,6,'Lower currency devaluation than competitors',1,'yellow','2019-11-28 05:58:18','2019-11-28 05:58:47'),
	(17,NULL,6,'Both',0,'yellow','2019-11-28 05:58:30','2019-11-28 05:58:30');

/*!40000 ALTER TABLE `survey_answer_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table survey_hits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `survey_hits`;

CREATE TABLE `survey_hits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `survey_question_id` bigint(20) NOT NULL,
  `survey_answer_option_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `survey_hits` WRITE;
/*!40000 ALTER TABLE `survey_hits` DISABLE KEYS */;

INSERT INTO `survey_hits` (`id`, `deleted_at`, `user_id`, `survey_question_id`, `survey_answer_option_id`, `created_at`, `updated_at`)
VALUES
	(1,NULL,1,1,1,'2019-11-16 03:29:20','2019-11-16 03:29:20'),
	(2,NULL,2,2,7,'2019-11-22 17:17:17','2019-11-22 17:17:17'),
	(3,NULL,2,3,5,'2019-11-22 17:17:43','2019-11-22 17:17:43'),
	(4,NULL,1,2,7,'2019-11-27 14:50:04','2019-11-27 14:50:04'),
	(5,NULL,1,3,4,'2019-11-27 15:58:17','2019-11-27 15:58:17'),
	(6,NULL,1,4,10,'2019-11-27 17:32:11','2019-11-27 17:32:11'),
	(7,NULL,2,6,16,'2019-11-28 05:58:47','2019-11-28 05:58:47'),
	(8,NULL,2,4,9,'2019-11-30 12:24:01','2019-11-30 12:24:01'),
	(9,NULL,3,3,4,'2019-12-03 10:47:29','2019-12-03 10:47:29');

/*!40000 ALTER TABLE `survey_hits` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table survey_questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `survey_questions`;

CREATE TABLE `survey_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `survey_id` bigint(20) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `survey_questions` WRITE;
/*!40000 ALTER TABLE `survey_questions` DISABLE KEYS */;

INSERT INTO `survey_questions` (`id`, `deleted_at`, `survey_id`, `question`, `created_at`, `updated_at`)
VALUES
	(1,NULL,1,'Who do you think is responsible for high price of onion?','2019-11-16 03:26:09','2019-11-16 03:26:14'),
	(2,'2019-11-27 15:12:18',2,'What is your favorite social media?','2019-11-16 05:39:59','2019-11-27 15:12:18'),
	(3,NULL,2,'What is your favorite email client?','2019-11-16 05:40:12','2019-11-16 05:40:12'),
	(4,'2019-11-30 16:22:55',2,'What is your favorite social media?','2019-11-27 15:12:20','2019-11-30 16:22:55'),
	(5,'2019-11-28 05:57:23',3,'Why do you think export growth is slowing down?','2019-11-28 05:54:20','2019-11-28 05:57:23'),
	(6,NULL,5,'Why do you think export growth is slowing down?','2019-11-28 05:58:09','2019-11-28 05:58:09');

/*!40000 ALTER TABLE `survey_questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table surveys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surveys`;

CREATE TABLE `surveys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `is_accepting_answer` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;

INSERT INTO `surveys` (`id`, `deleted_at`, `title`, `description`, `is_published`, `is_accepting_answer`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Onion Price','We shall evaluate the price hike of onion in Bangladesh',0,0,'2019-11-16 03:25:09','2019-11-27 15:10:47'),
	(2,NULL,'Customer','Understand customer behavior',1,1,'2019-11-16 05:39:40','2019-11-27 15:16:03'),
	(3,'2019-11-28 05:57:32','Export','Why do you think export is slowing down?',0,0,'2019-11-28 05:53:39','2019-11-28 05:57:32'),
	(4,'2019-11-28 05:57:37','Export','Why do you think export is slowing down?',0,0,'2019-11-28 05:57:10','2019-11-28 05:57:37'),
	(5,NULL,'Export','Why do you think export is slowing down?',0,1,'2019-11-28 05:58:01','2019-11-28 05:58:01');

/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `subscription_plan_id` bigint(20) NOT NULL,
  `subscription_starts_at` date NOT NULL,
  `subscription_ends_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visitor',
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `deleted_at`, `full_name`, `contact_number`, `profession`, `institution`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Raihan Farhad','01747201159','Software Engineer','Techynaf','admin','bdraihan71@gmail.com','2019-11-30 15:20:49','$2y$10$9.5uGYyrLYvwugRjqdrnTuxFCY/RsyMz8nQ5AL0zgtaLcTbNIMHbq',NULL,NULL,NULL),
	(2,NULL,'Anika Maifz','01720227189','Consultant','International Financial Corporation','admin','anika.mafiz@gmail.com',NULL,'$2y$10$DKgWaBboWUQmCQBSGc8/e.lH2Q23e1Zco232MT0/C5haflT3lLfLS','R8Lov04BzzhOcdNNSafwonGqUQSJxAZaNjWDkfiJhviklSVOCPIDjFlID5wG','2019-11-22 16:10:00','2019-11-22 17:53:22'),
	(3,NULL,'Itrat','01730374551','Analyst','IDLC','visitor','hossain.itrat@gmail.com',NULL,'$2y$10$EUzGjP/Ipq7Oc5qr/fbkje0E/4OL1lFkgEsK2uXdVxPCVaWa/yTiK','s5ZQ9Kt0pEWZT1yc0MoHZLBMfqT4KtOJQ1oemZV7iLXYW844ghpHWiUf9e3f','2019-11-30 16:23:15','2019-11-30 16:23:15'),
	(4,NULL,'Md. Nazmus Sakib','01674583806','Sell Side Analyst','UCB Capital Management Limited','visitor','nazmussakib88@gmail.com',NULL,'$2y$10$uHX0fuS9MAJZhuxxdyGaUOJnUv/YtRTwfJfLt4zbqSK9jN2hLGM1u',NULL,'2019-12-01 06:06:43','2019-12-01 06:06:43'),
	(5,NULL,'Md. Tareq Ibrahim','01730359027','Fund Manager','CWT Asset Management Company Ltd.','visitor','tareqibrahim@gmail.com',NULL,'$2y$10$UaKygf9AN5OIfBWFvUIcu.Mfq9ZfBCd1yloXsSotsOg5jm1w3svMq',NULL,'2019-12-03 12:45:56','2019-12-03 12:45:56');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
