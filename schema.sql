/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.7.24 : Database - formbuilder
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`formbuilder` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `formbuilder`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 NOT NULL,
  `username` varchar(60) CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `token` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text CHARACTER SET latin1 NOT NULL,
  `role` text CHARACTER SET latin1 NOT NULL,
  `encrypted` text CHARACTER SET latin1 NOT NULL,
  `send_count` int(11) NOT NULL,
  `send_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`name`,`username`,`password`,`token`,`status`,`stat`,`date`,`time`,`role`,`encrypted`,`send_count`,`send_limit`) values (1,'Brandon Chong','brandonccy1982','abccy1982','b7bdef7ce75cbe3c1967214b12fa541b',0,0,'2020-11-22','5:38 PM','superadmin','644e8dd2e88e02e47fbf2fc725997e38',-3,0),(2,'Brandon Chong','phototix','abccy1982','63d40395c2aa46c7f2b481b4ff8afadd',0,0,'2020-11-23','1:55 AM','','a40df6bf5bec69a6b669f018ae339dba',4,0);

/*Table structure for table `db_forms` */

DROP TABLE IF EXISTS `db_forms`;

CREATE TABLE `db_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` text CHARACTER SET latin1 NOT NULL,
  `column_name` text CHARACTER SET latin1 NOT NULL,
  `column_type` text CHARACTER SET latin1 NOT NULL,
  `column_css` text CHARACTER SET latin1 NOT NULL,
  `stat` int(11) NOT NULL,
  `token` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `required` int(11) NOT NULL,
  `select_addon` text CHARACTER SET latin1 NOT NULL,
  `select_table` text CHARACTER SET latin1 NOT NULL,
  `sort` int(11) NOT NULL,
  `label` text CHARACTER SET latin1 NOT NULL,
  `placeholder` text CHARACTER SET latin1 NOT NULL,
  `short_desc` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `db_forms` */

insert  into `db_forms`(`id`,`table_name`,`column_name`,`column_type`,`column_css`,`stat`,`token`,`status`,`required`,`select_addon`,`select_table`,`sort`,`label`,`placeholder`,`short_desc`) values (1,'update_password','current_password','password','',0,'2ce97fb29a8a',0,0,'','',0,'Current Password','',''),(2,'update_password','new_password','password','',0,'2ce97fb29a8a',0,0,'','',0,'New Password','',''),(3,'update_password','confirm_new_password','password','',0,'2ce97fb29a8a',0,0,'','',0,'Confirm New Password','','');

/*Table structure for table `db_forms_selects` */

DROP TABLE IF EXISTS `db_forms_selects`;

CREATE TABLE `db_forms_selects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `form_column_name` text CHARACTER SET latin1 NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `value` text CHARACTER SET latin1 NOT NULL,
  `stat` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `token` text CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `time` text CHARACTER SET latin1 NOT NULL,
  `u_date` date NOT NULL,
  `u_time` text CHARACTER SET latin1 NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `db_forms_selects` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
