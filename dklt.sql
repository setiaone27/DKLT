/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - dklt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dklt` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dklt`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` text,
  `agama` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `divisi_id` int(10) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`nama`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`alamat`,`agama`,`pekerjaan`,`divisi_id`,`jabatan`,`foto`) values 
(1,'Iwan Setiawan','Subang','2001-01-27','1','Kp. Rawageni RT04/08 Kota Depok','1','Admin',1,'Programmer','iwan.jpg'),
(3,'Evan Dimas','Bogor','2000-01-02','1','Kota Bogor','1','Programmer',2,'CEO','1580478612617.jpg'),
(4,'Dimas Bayu','Depok','2020-01-08','1','Rawageni Depok','1','Programmer',1,'Ketua','1580625488392.png'),
(5,'Aditya Permana','Bogor','2000-02-25','1','Kota Bogor','1','Programmer',1,'Programmer','1580625609931.jpg'),
(6,'Putri Puji','Depok','2001-02-14','2','Rawageni','1','Mahasiswa',2,'Sekretaris','1580625871130.jpg'),
(7,'Zilah','Bogor','2003-06-10','2','Citayam','1','Siswa',2,'Bendahara','1580626056090.jpg');

/*Table structure for table `divisi` */

DROP TABLE IF EXISTS `divisi`;

CREATE TABLE `divisi` (
  `id_divisi` int(10) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(50) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `divisi` */

insert  into `divisi`(`id_divisi`,`nama_divisi`,`tgl_buat`,`penanggung_jawab`) values 
(1,'Teknologi','2020-02-01','Evan Dimas Darmono'),
(2,'Humas','2020-02-02','Nurlailasari'),
(3,'Keamananan','2020-02-02','Murzal Hazard'),
(6,'Kebersihan','2020-02-11','Wizard COC');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_lengkap`,`username`,`password`,`email`,`foto`) values 
(1,'Iwan Setiawan','admin','21232f297a57a5a743894a0e4a801fc3','siwan2701@gmail.com','iwan.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
