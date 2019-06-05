/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_garden
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_garden` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_garden`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`username`,`password`) values (1,'Admin Garden','admin@admin.com','admin');

/*Table structure for table `bug` */

DROP TABLE IF EXISTS `bug`;

CREATE TABLE `bug` (
  `id_bug` int(10) NOT NULL,
  `nama_bug` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_bug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bug` */

/*Table structure for table `garden_admin` */

DROP TABLE IF EXISTS `garden_admin`;

CREATE TABLE `garden_admin` (
  `id_admin` int(7) NOT NULL,
  `nama_admin` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `garden_admin` */

/*Table structure for table `kelola_akun` */

DROP TABLE IF EXISTS `kelola_akun`;

CREATE TABLE `kelola_akun` (
  `id_kelola` int(7) NOT NULL,
  `kontak` varchar(24) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_kelola`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelola_akun` */

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

insert  into `kota`(`id_kota`,`nama_kota`) values (1,'Jakarta Utara'),(2,'Jakarta Pusat'),(3,'Jakarta Barat'),(4,'Jakarta Timur'),(5,'Jakarta Selatan'),(6,'Pulai Seribu');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_userfk` int(11) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`id_userfk`,`telpon`,`id_kota`,`alamat`,`create_time`,`edit_date`) values (1,10,'08211235432',2,'Jl. Ragunan Raya No. 17 RT.02/08 Ragunan','00:00:00','0000-00-00'),(2,8,'08827429871',4,'Komplek Kemanggisan Raya Kav.88 Jakarta',NULL,NULL);

/*Table structure for table `riwayat_pesanan` */

DROP TABLE IF EXISTS `riwayat_pesanan`;

CREATE TABLE `riwayat_pesanan` (
  `id_riwayat` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `createBy` varchar(128) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `buktiBayar` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_riwayat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riwayat_pesanan` */

/*Table structure for table `status_akun` */

DROP TABLE IF EXISTS `status_akun`;

CREATE TABLE `status_akun` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_akun` */

insert  into `status_akun`(`id_status`,`nama_status`) values (1,'Aktif'),(2,'Tidak Aktif');

/*Table structure for table `status_transaksi` */

DROP TABLE IF EXISTS `status_transaksi`;

CREATE TABLE `status_transaksi` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_transaksi` */

insert  into `status_transaksi`(`id_status`,`nama_status`) values (1,'Menunggu Konfirmasi'),(2,'Menunggu Pembayaran'),(3,'Konfirmasi Pembayaran'),(4,'Sukses'),(5,'Gagal');

/*Table structure for table `trx-konfirmasi-pesanan` */

DROP TABLE IF EXISTS `trx-konfirmasi-pesanan`;

CREATE TABLE `trx-konfirmasi-pesanan` (
  `id_konfir-pesan` int(7) NOT NULL,
  `id_pesanan` int(7) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_konfir-pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx-konfirmasi-pesanan` */

/*Table structure for table `trx_bukti_bayar` */

DROP TABLE IF EXISTS `trx_bukti_bayar`;

CREATE TABLE `trx_bukti_bayar` (
  `id_bayar` int(7) NOT NULL,
  `id_pesanan` int(7) DEFAULT NULL COMMENT 'FK pesanan',
  `upload` varchar(255) DEFAULT NULL,
  `keterangan_bayar` varchar(255) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_bukti_bayar` */

insert  into `trx_bukti_bayar`(`id_bayar`,`id_pesanan`,`upload`,`keterangan_bayar`,`id_status`) values (1,1,'(nanti berupa gambar)','Sudah dibayarkan untuk pembayaran pengerjaan tanaman hias',3);

/*Table structure for table `trx_nego` */

DROP TABLE IF EXISTS `trx_nego`;

CREATE TABLE `trx_nego` (
  `id_nego` int(7) NOT NULL,
  `id_pesanan` int(7) DEFAULT NULL COMMENT 'FK trx-pesanan',
  `id_user` int(7) DEFAULT NULL COMMENT 'FK user',
  `id_vendor` int(7) DEFAULT NULL COMMENT 'FK vendor',
  `pesan` varchar(255) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_nego`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_nego` */

insert  into `trx_nego`(`id_nego`,`id_pesanan`,`id_user`,`id_vendor`,`pesan`,`type`) values (1,1,NULL,NULL,'saya ingin menanyakan harga untuk pengerjaan taman seluas 30x30 meter. Trima kasih',NULL);

/*Table structure for table `trx_pesanan` */

DROP TABLE IF EXISTS `trx_pesanan`;

CREATE TABLE `trx_pesanan` (
  `id_pesanan` int(7) NOT NULL,
  `id_user` int(7) DEFAULT NULL COMMENT 'FK user',
  `id_vendor` int(7) DEFAULT NULL COMMENT 'FK vendor',
  `id_status` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `tanggal_pengerjaan` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_pesanan` */

insert  into `trx_pesanan`(`id_pesanan`,`id_user`,`id_vendor`,`id_status`,`nama_pemesan`,`email`,`telpon`,`tanggal_pengerjaan`,`alamat`,`keterangan`,`gambar`,`harga`,`create_date`) values (1,1,1,3,'Bambang','lenovo.thinkpad@mail.com','082112398281','2019-05-20','Jl. Kemanggisan Utara No.17 RT.02/RW.08','Saya ingin memesan dekorasi tanaman hias untuk keperluan acara wedding adik saya pada tahun depan, namun saya ingin mendekornya dari sekarang untuk kepentingan penghabisan budget tahunan ini. trima kasih',NULL,4700000,'2019-05-02 16:30:53'),(2,NULL,2,2,'Budi','gagrsg@rglar.com','021042102102','2019-06-05','Jl. semsmekasek akeoa eo aeknfo afne oa','orkajgoar gjkroa kr oake oga oega oegj eoa',NULL,NULL,'2019-05-30 17:30:16');

/*Table structure for table `trx_testimoni` */

DROP TABLE IF EXISTS `trx_testimoni`;

CREATE TABLE `trx_testimoni` (
  `id_testimoni` int(7) NOT NULL,
  `id_pesanan` int(7) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `testimoni` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_testimoni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trx_testimoni` */

insert  into `trx_testimoni`(`id_testimoni`,`id_pesanan`,`id_pelanggan`,`id_vendor`,`testimoni`) values (1,1,1,1,'Pengerjaan taman yang dikerjaan sangat memuaskan, saya dapat bersenang senang dengan keluarga dengan taman dirumah saya. Trima kasih ');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`name`,`email`,`image`,`password`,`role_id`,`is_active`,`date_created`) values (5,'Caesario','caesar@gmail.com','default.jpg','$2y$10$wR0H77RGqS6dAtjoG4Zc3uLodHigeIFjkkaB4Sd60oFe246rLlXX2',2,1,1556123835),(6,'Admin Test','admin@admin.com','default.jpg','$2y$10$O0EloruT8Uyj8GWDDiAPpOMqHj37DNvV5R.x.T8ghvnXck8zQrFiK',3,1,1556460443),(7,'Wahyu Arisandi','why@why.com','default.jpg','$2y$10$xh.sh8LXoAZibHw00cnmHOxbKJhgQtnn2CRh4L4OLDRCtEUJ6UdOK',2,0,1556546327),(8,'Caesario','caesar@caesar.com','default.jpg','$2y$10$v22Ivr9UN6kRKxs5cVZlyOn1FW/nqUWmn9dQEfdNXXzUNfCHXSc2a',2,1,1556704771),(9,'Test Vendor','vendor@vendor.com','default.jpg','$2y$10$aTqTEti3jzcRc6NP1hyB0eD9t2o8.hqzVFUMBlVl7HePUW/nxW32O',1,1,1556908030),(10,'User Test','user@user.com','default.jpg','$2y$10$DANSgKELn7LrD4jKLhPdeu7LELDVGtAvBK6ewTG.NGtNIhT4o4dfm',2,1,1556908069);

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,2,2),(6,1,4),(10,3,6),(11,3,5),(12,3,3),(13,3,7),(14,3,8);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`) values (1,'Vendor'),(2,'User'),(3,'Admin'),(4,'Transaksi'),(5,'Kelola Menu'),(6,'Kelola User'),(7,'Report'),(8,'Kelola Akun');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role_id`) values (1,'Vendor'),(2,'Member'),(3,'Admin');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values (1,1,'Dashboard','vendor_admin','fas fa-fw fa-tachometer-alt',1),(2,2,'My Profile','user','fas fa-fw fa-user',1),(3,2,'Lihat Profile','user/edit','fas fa-fw fa-user-edit',1),(6,1,'Lihat Profile','vendor_admin/profil','fas fa-sw fa-user-edit',1),(7,4,'Pesanan',NULL,'far fa-sw fa-comment-dots',1),(8,4,'Pesanan Tertunda',NULL,'fab fa-sw fa-buffer',1),(9,4,'Riwayat Transaksi',NULL,'fas fa-sw fa-history',1),(10,3,'Dasboard','admin','fas fa-fw fa-tachometer-alt',1),(11,5,'Menu Management','menu','fas fa-tasks',1),(12,5,'Submenu Management','menu/submenu','fas fa-fw fa-folder-open',1),(13,6,'Verifikasi User','admin/verif','fas fa-user-check',1),(14,8,'Lihat Profil','admin/profil','fas fa-id-card-alt',1),(16,7,'Pesanan','report/pesanan','fab fa-first-order',1),(17,7,'Riwayat Pesanan','report/riwayat_pesanan','fas fa-history',1),(18,7,'Bukti Bayar','report/buktibayar','fas fa-file-invoice',1),(19,8,'Wilayah','admin/wilayah','fas fa-globe-americas',1),(20,7,'Testimoni','report/testimoni','fas fa-id-card-alt',1),(25,7,'Data Pelanggan','report/data_pelanggan','fas fa-user-cog',1),(26,7,'Data Vendor','report/data_vendor','fas fa-users-cog',1);

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `id_userfk` int(11) DEFAULT NULL,
  `nama_vendor` varchar(128) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `info_vendor` varchar(255) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

insert  into `vendor`(`id_vendor`,`id_userfk`,`nama_vendor`,`id_kota`,`alamat`,`telpon`,`logo`,`info_vendor`,`id_status`,`createTime`) values (0,6,'Layson Garden',3,'Jl. Cipete Raya No.9','088771288482',NULL,'Menyediakan jasa pembuatan tanaman hias',1,NULL),(1,9,'Caesar Garden',2,'Jl. Meruya Selatan No.17','082112941123',NULL,'Menyediakan jasa dekor nanaman hias dan acara weding untuk keperluan mendadak sekali. Berpengalaman selama 10 Tahun dalam bidang dekor tanaman hias.',1,NULL),(2,NULL,'Mendari Flower',6,'Jl. Pramuka No.129','087721488212',NULL,'Hiasan bunga untuk acara wisuda dll',1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
