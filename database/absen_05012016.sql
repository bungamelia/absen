-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `absen`;
CREATE DATABASE `absen` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `absen`;

DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `id_shift` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `absen` (`id_absen`, `id_karyawan`, `id_shift`, `created_at`, `updated_at`, `status`) VALUES
(1,	1,	1,	'2016-01-02 19:49:47',	'2016-01-02 19:49:47',	'masuk');

DROP TABLE IF EXISTS `catatan`;
CREATE TABLE `catatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `catatan` (`id`, `id_karyawan`, `content`, `created_at`, `updated_at`) VALUES
(1,	7,	'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore aliqua, dolor sit amet</p>\r\n',	'2015-11-20 03:08:50',	'2015-12-04 14:28:15');

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_divisi` varchar(40) NOT NULL,
  `nama_divisi` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `divisi` (`id`, `kode_divisi`, `nama_divisi`) VALUES
(1,	'SYA',	'Sys Admin'),
(2,	'DEV',	'Developer'),
(3,	'MKT',	'Marketing'),
(4,	'CPW',	'Copywriter'),
(5,	'FIN',	'Finance');

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(40) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jabatan` (`id_jabatan`, `kode_jabatan`, `nama_jabatan`) VALUES
(1,	'ADM',	'Admin'),
(2,	'SPV',	'Supervisor'),
(3,	'SPP',	'Support'),
(4,	'SLS',	'Sales'),
(5,	'MKT',	'Marketing'),
(6,	'JPGR',	'Junior Programmer'),
(7,	'PGR',	'Programmer'),
(8,	'SPGR',	'Senior Programmer');

DROP TABLE IF EXISTS `jenis_kelamin`;
CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1,	'Laki-laki'),
(2,	'Perempuan');

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nama_karyawan` varchar(60) NOT NULL,
  `ttl` varchar(40) NOT NULL,
  `id_jkelamin` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `karyawan` (`id_karyawan`, `id_divisi`, `id_jabatan`, `username`, `nama_karyawan`, `ttl`, `id_jkelamin`, `alamat`, `email`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	0,	0,	'admin',	'Admin',	'Jogjakarta, 13-05-1991',	1,	'Jl. Pasar Besar',	'admin@yahoo.com',	'$2y$10$rXJ4g4Z.n2YribipHdZ45OscakbwV1xh4MoxlDOF5lyfZkXbVTk4O',	'2290-photo11.jpg',	'UaYJNyvgTI34iE6326lVXE7BguDYjp2u3qcgbmTHYMgUHPk8V0XXMSlngxko',	'2016-01-02 17:39:53',	'2016-01-02 17:39:53'),
(2,	1,	2,	'abcd',	'Aaaaa Bbbb',	'Surabaya, 08-06-1993',	1,	'jl. alumunium',	'abcd@yahoo.com',	'1234',	'',	'',	'2015-11-26 07:08:54',	'0000-00-00 00:00:00'),
(6,	1,	2,	'karyawan',	'Admin Admin',	'Jakarta, 17-12-1988',	1,	'Jl. Jalaaaannn',	'admin@gmail.com',	'karyawan',	'',	'',	'2015-11-26 07:09:07',	'0000-00-00 00:00:00'),
(7,	3,	5,	'user',	'Bunga Amelia R',	'Malang, 27-11-1993',	2,	' Jl. Jalan Raya ',	'bunga@gmail.com',	'$2y$10$rXJ4g4Z.n2YribipHdZ45OscakbwV1xh4MoxlDOF5lyfZkXbVTk4O',	'82809-photo6.jpg',	'BQfmtrTgcKqcsTtDB3hNPRPrXlFxaGGQcWI1BKMw7WDLnGk1FmQpZQWSxi6z',	'2016-01-02 09:38:46',	'2016-01-02 09:38:46');

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id_laporan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) unsigned NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `content` text NOT NULL,
  `tanggal` date NOT NULL,
  `state` longtext NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `logs` (`id`, `id_karyawan`, `content`, `created_at`, `updated_at`) VALUES
(109,	7,	'user melakukan login',	'2015-12-23 20:38:03',	'2015-12-23 20:38:03'),
(110,	7,	'user akses halaman dashboard',	'2015-12-23 20:38:04',	'2015-12-23 20:38:04'),
(111,	7,	'user akses halaman daftar shift',	'2015-12-23 20:49:24',	'2015-12-23 20:49:24'),
(112,	7,	'user input data laporan hari ini',	'2015-12-23 20:50:21',	'2015-12-23 20:50:21'),
(113,	7,	'user akses halaman daftar laporan',	'2015-12-23 20:50:21',	'2015-12-23 20:50:21'),
(114,	7,	'user melakukan login',	'2015-12-23 20:52:22',	'2015-12-23 20:52:22'),
(115,	7,	'user melakukan login',	'2015-12-23 20:53:59',	'2015-12-23 20:53:59'),
(116,	7,	'user melakukan login',	'2015-12-23 23:38:19',	'2015-12-23 23:38:19'),
(117,	7,	'user melakukan login',	'2015-12-29 21:27:28',	'2015-12-29 21:27:28'),
(118,	7,	'user akses halaman daftar laporan',	'2015-12-29 21:52:52',	'2015-12-29 21:52:52'),
(119,	7,	'user akses halaman daftar pengumuman',	'2015-12-29 21:52:54',	'2015-12-29 21:52:54'),
(120,	7,	'user akses halaman daftar pengumuman',	'2015-12-29 21:53:25',	'2015-12-29 21:53:25'),
(121,	7,	'user akses halaman daftar shift',	'2015-12-29 21:53:28',	'2015-12-29 21:53:28'),
(122,	7,	'user akses halaman pengaturan',	'2015-12-29 21:53:31',	'2015-12-29 21:53:31'),
(123,	7,	'user akses halaman daftar shift',	'2015-12-29 21:55:31',	'2015-12-29 21:55:31'),
(124,	7,	'user akses halaman daftar shift',	'2015-12-29 21:57:40',	'2015-12-29 21:57:40'),
(125,	7,	'user akses halaman pengaturan',	'2015-12-29 21:58:05',	'2015-12-29 21:58:05'),
(126,	7,	'user melakukan login',	'2015-12-29 21:58:26',	'2015-12-29 21:58:26'),
(127,	7,	'user melakukan login',	'2015-12-30 10:17:17',	'2015-12-30 10:17:17'),
(128,	7,	'user akses halaman pengaturan',	'2015-12-30 10:17:30',	'2015-12-30 10:17:30'),
(129,	7,	'user akses halaman daftar laporan',	'2015-12-30 10:17:33',	'2015-12-30 10:17:33'),
(130,	7,	'user akses halaman daftar shift',	'2015-12-30 10:54:52',	'2015-12-30 10:54:52'),
(131,	7,	'user melakukan login',	'2015-12-30 13:32:58',	'2015-12-30 13:32:58'),
(132,	7,	'user akses halaman daftar shift',	'2015-12-30 13:36:26',	'2015-12-30 13:36:26'),
(133,	7,	'user melakukan login',	'2016-01-02 14:31:17',	'2016-01-02 14:31:17'),
(134,	7,	'user akses halaman daftar shift',	'2016-01-02 16:24:59',	'2016-01-02 16:24:59'),
(135,	7,	'user akses halaman daftar shift',	'2016-01-02 16:28:23',	'2016-01-02 16:28:23'),
(136,	7,	'user akses halaman pengaturan',	'2016-01-02 16:29:20',	'2016-01-02 16:29:20'),
(137,	7,	'user akses halaman daftar shift',	'2016-01-02 16:29:22',	'2016-01-02 16:29:22'),
(138,	7,	'user akses halaman daftar pengumuman',	'2016-01-02 16:29:25',	'2016-01-02 16:29:25'),
(139,	7,	'user akses halaman daftar laporan',	'2016-01-02 16:29:28',	'2016-01-02 16:29:28'),
(140,	7,	'user akses halaman daftar laporan',	'2016-01-02 16:36:35',	'2016-01-02 16:36:35'),
(141,	7,	'user akses halaman daftar pengumuman',	'2016-01-02 16:38:18',	'2016-01-02 16:38:18'),
(142,	7,	'user akses halaman daftar laporan',	'2016-01-03 00:59:55',	'2016-01-03 00:59:55'),
(143,	7,	'user akses halaman daftar pengumuman',	'2016-01-03 00:59:57',	'2016-01-03 00:59:57'),
(144,	7,	'user akses halaman daftar shift',	'2016-01-03 00:59:59',	'2016-01-03 00:59:59'),
(145,	7,	'user akses halaman daftar laporan',	'2016-01-03 01:01:07',	'2016-01-03 01:01:07'),
(146,	7,	'user akses halaman daftar shift',	'2016-01-03 01:01:26',	'2016-01-03 01:01:26');

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id_notice` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_notice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `shift_lama` varchar(50) NOT NULL,
  `shift_baru` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `shift`;
CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL AUTO_INCREMENT,
  `nama_shift` varchar(40) NOT NULL,
  `start_shift` time NOT NULL,
  `end_shift` time NOT NULL,
  PRIMARY KEY (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `shift` (`id_shift`, `nama_shift`, `start_shift`, `end_shift`) VALUES
(1,	'Shift 1',	'00:00:00',	'09:00:00'),
(2,	'Shift 2',	'09:00:00',	'18:00:00'),
(3,	'Shift 3',	'16:00:00',	'01:00:00'),
(4,	'Non Shift',	'09:00:00',	'18:30:00');

DROP TABLE IF EXISTS `shift_line`;
CREATE TABLE `shift_line` (
  `id_shiftline` int(11) NOT NULL AUTO_INCREMENT,
  `id_shift` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_shift` date NOT NULL,
  PRIMARY KEY (`id_shiftline`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2016-01-05 07:47:53
