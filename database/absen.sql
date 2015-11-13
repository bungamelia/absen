-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 04:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
`id_absen` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_karyawan`, `id_shift`, `waktu`, `status`) VALUES
(1, 1, 4, '2015-09-25 09:08:11', 'masuk'),
(2, 7, 0, '2015-09-25 09:15:31', 'masuk'),
(4, 7, 0, '2015-09-25 05:44:03', 'keluar'),
(26, 7, 0, '2015-09-25 09:00:19', 'masuk'),
(27, 1, 4, '2015-09-25 09:26:13', 'keluar'),
(28, 2, 0, '2015-09-25 12:31:04', 'keluar'),
(31, 1, 4, '2015-09-28 08:49:45', 'masuk'),
(34, 2, 0, '2015-09-28 11:19:01', 'masuk'),
(35, 6, 0, '2015-09-28 11:21:54', 'masuk'),
(36, 8, 0, '2015-09-28 11:28:33', 'masuk'),
(37, 7, 3, '2015-09-28 16:21:04', 'masuk'),
(38, 1, 4, '2015-09-29 09:11:17', 'keluar'),
(39, 1, 4, '2015-09-29 08:45:54', 'masuk'),
(40, 1, 4, '2015-09-30 20:45:21', 'keluar'),
(41, 1, 4, '2015-10-01 09:00:01', 'masuk'),
(44, 1, 4, '2015-10-02 10:47:12', 'keluar'),
(46, 1, 4, '2015-10-05 09:15:16', 'masuk'),
(65, 7, 2, '2015-10-05 15:45:37', 'keluar'),
(66, 7, 2, '2015-10-05 09:16:21', 'masuk'),
(67, 1, 4, '2015-10-06 09:04:07', 'masuk'),
(68, 7, 2, '2015-10-06 08:56:03', 'masuk'),
(85, 7, 2, '2015-10-07 04:26:03', 'keluar'),
(86, 7, 2, '2015-10-07 08:54:43', 'masuk'),
(87, 1, 4, '2015-10-07 03:44:07', 'keluar'),
(88, 1, 4, '2015-10-07 08:28:08', 'masuk'),
(89, 7, 3, '2015-10-08 04:24:43', 'keluar'),
(90, 1, 4, '2015-10-08 04:28:08', 'keluar'),
(91, 13, 0, '2015-10-08 10:32:34', 'masuk'),
(92, 14, 0, '2015-10-08 10:37:51', 'masuk'),
(94, 15, 4, '2015-10-08 10:37:51', 'keluar'),
(95, 15, 4, '2015-10-08 08:33:30', 'masuk'),
(96, 15, 4, '2015-10-09 07:33:30', 'keluar'),
(97, 15, 4, '2015-10-09 09:06:21', 'masuk'),
(98, 7, 3, '2015-10-09 15:32:32', 'masuk'),
(99, 7, 3, '2015-10-10 10:22:32', 'keluar'),
(100, 15, 3, '2015-10-10 04:06:21', 'keluar'),
(101, 15, 3, '2015-10-12 16:02:48', 'masuk'),
(102, 7, 1, '2015-10-12 23:59:45', 'masuk'),
(103, 16, 0, '2015-10-12 10:09:45', 'keluar'),
(104, 16, 0, '2015-10-12 10:54:16', 'masuk'),
(105, 7, 1, '2015-10-13 04:09:45', 'keluar'),
(106, 16, 0, '2015-10-13 04:54:16', 'keluar'),
(107, 15, 3, '2015-10-13 03:21:48', 'keluar'),
(108, 1, 4, '2015-10-13 08:47:55', 'masuk'),
(109, 7, 1, '2015-10-13 00:07:11', 'masuk'),
(110, 1, 4, '2015-10-14 05:27:55', 'keluar'),
(111, 7, 1, '2015-10-14 07:07:11', 'keluar'),
(112, 9, 0, '2015-10-14 07:07:11', 'keluar'),
(114, 9, 0, '2015-10-15 17:24:34', 'masuk'),
(115, 15, 4, '2015-10-20 09:07:28', 'masuk'),
(116, 15, 4, '2015-10-20 14:22:45', 'keluar'),
(117, 1, 4, '2015-10-20 08:26:47', 'masuk'),
(118, 7, 3, '2015-10-20 15:56:31', 'masuk'),
(119, 7, 3, '2015-10-20 14:28:58', 'keluar'),
(120, 1, 4, '2015-10-21 08:26:47', 'keluar'),
(121, 1, 4, '2015-10-21 09:47:01', 'masuk'),
(122, 1, 4, '2015-10-22 03:47:01', 'keluar'),
(123, 15, 2, '2015-10-26 08:29:53', 'masuk'),
(124, 7, 4, '2015-10-27 09:25:23', 'masuk'),
(125, 15, 2, '2015-10-27 12:29:53', 'keluar'),
(126, 7, 4, '2015-10-28 03:25:23', 'keluar'),
(127, 15, 2, '2015-10-28 08:53:52', 'masuk'),
(128, 7, 1, '2015-10-29 13:38:56', 'masuk'),
(129, 15, 2, '2015-10-29 02:53:52', 'keluar'),
(130, 7, 1, '2015-10-30 07:38:56', 'keluar'),
(131, 7, 4, '2015-11-05 16:37:42', 'masuk'),
(132, 7, 4, '2015-11-05 17:03:12', 'keluar'),
(133, 1, 4, '2015-11-06 09:33:43', 'masuk'),
(134, 7, 4, '2015-11-06 10:47:15', 'masuk'),
(135, 7, 4, '2015-11-07 04:47:15', 'keluar'),
(136, 7, 4, '2015-11-09 11:03:15', 'masuk'),
(138, 7, 4, '2015-11-09 11:22:25', 'keluar'),
(141, 1, 4, '2015-11-07 03:33:43', 'keluar'),
(142, 1, 4, '2015-11-09 13:35:27', 'masuk'),
(143, 1, 4, '2015-11-10 07:35:27', 'keluar'),
(144, 7, 4, '2015-11-10 13:24:12', 'masuk'),
(145, 7, 4, '2015-11-11 07:24:12', 'keluar'),
(148, 7, 4, '2015-11-11 08:29:09', 'masuk'),
(149, 7, 4, '2015-11-12 02:29:09', 'keluar'),
(150, 7, 4, '2015-11-13 16:29:42', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'admin'),
(2, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
`id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nama_karyawan` varchar(60) NOT NULL,
  `ttl` varchar(40) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan`, `username`, `nama_karyawan`, `ttl`, `id_jenis_kelamin`, `alamat`, `email`, `password`, `foto`) VALUES
(1, 1, 'admin', 'Admin Dua', 'Jogjakarta, 13-05-1991', 1, 'Jl. Pasar Besar', 'admin@yahoo.com', 'admin', '2290-photo11.jpg'),
(2, 2, 'abcd', 'Aaaaa Bbbb', 'Surabaya, 08-06-1993', 1, 'jl. alumunium', 'abcd@yahoo.com', '1234', ''),
(6, 2, 'karyawan', 'Admin Admin', 'Jakarta, 17-12-1988', 1, 'Jl. Jalaaaannn', 'admin@gmail.com', 'karyawan', ''),
(7, 2, 'user', 'User karyawan', 'Malang, 30-12-1991', 2, 'Jl. Jalan Raya', 'user@gmail.com', '1234', '82809-photo6.jpg'),
(8, 2, 'qwerty', 'Karyawan', 'Surabaya, 10-06-1989', 2, 'Jalan raya', 'qwerty@gmail.com', 'qwerty', ''),
(9, 2, 'budi', 'Budi Budi', 'Surabaya, 10-06-1989', 1, '', 'budi@gmail.com', 'budi', ''),
(10, 2, 'ani', 'Ani Ani', 'Surabaya, 10-06-1989', 2, '', 'ani@gmail.com', 'aniani', ''),
(11, 2, 'anton ', 'Anton Anton', 'Surabaya, 10-06-1989', 1, '', 'anton@gmail.com', 'anton', ''),
(12, 2, 'taylor', 'Taylor Swift', 'Surabaya, 10-06-1989', 2, '', 'taylor@swift.com', 'taylor', ''),
(13, 2, 'sarah', 'Sarah Sarah', 'Surabaya, 08-10-1990', 2, 'Jalan Rumah', 'sarah@gmail.com', 'sarah', ''),
(14, 2, 'rafi', 'Raffi Rafi', 'Jakarta, 23-01-1991', 1, 'Jalan Rumah', 'rafi@gmail.com', 'rafi', ''),
(15, 2, 'mcleod', 'Noble Johnson', 'New York, 1992-01-20', 1, 'P.O. Box 369, 2561 Neque Av.', 'cursus.diam@faucibusut.edu', '1234', '89698-avatar.jpg'),
(16, 2, 'nunez', 'Otto Morris', '1984-08-13', 2, 'Ap #518-6894 Mauris St.', 'at.pede.Cras@velnisl.co.uk', '1234', ''),
(17, 2, 'prince', 'Lamar Neal', '1985-03-04', 1, '350-4694 Facilisis Av.', 'Sed.eu.nibh@sagittisNullam.net', '1234', ''),
(18, 2, 'rogers', 'Leonard Hendrix', '1995-11-16', 1, '540-2492 Laoreet St.', 'magna.Cras@bibendumullamcorper.co.uk', '1234', ''),
(19, 2, 'Cherry', 'Noah Potts', '1986-03-26', 1, '254-5352 Ornare. Street', 'eleifend@rhoncus.org', '1234', ''),
(20, 2, 'Robles', 'Yuli Hill', '1984-01-30', 1, 'Ap #349-544 Fusce Road', 'sem.elit.pharetra@elitelitfermentum.net', '1234', ''),
(21, 2, 'Steele', 'Griffin Dennis', '1986-08-16', 2, 'Ap #108-6604 Integer Avenue', 'elementum@dolor.ca', '1234', ''),
(22, 2, 'Callahan', 'Elliott Herrera', '1994-12-06', 2, '7596 Ac St.', 'lectus.quis.massa@dis.ca', '1234', ''),
(23, 2, 'Burks', 'Demetrius Sanford', '1992-04-09', 2, 'P.O. Box 435, 5549 Volutpat Road', 'in.tempus.eu@ridiculus.net', '1234', ''),
(24, 1, 'Grimes', 'Magee Nixon', '1993-03-13', 2, '449-689 Nisl. Street', 'ipsum@Donecnibhenim.net', '1234', ''),
(25, 2, 'Pugh', 'Tyrone Guthrie', '1992-07-20', 1, '3549 Morbi Rd.', 'pede.Cum@facilisiSedneque.org', '1234', ''),
(26, 2, 'Olsen', 'David Mathis', '1989-02-02', 2, 'P.O. Box 863, 8813 Amet, Rd.', 'egestas@etrutrumnon.ca', '1234', ''),
(27, 2, 'Copeland', 'Kato Savage', '1993-09-26', 1, '6850 Mus. Avenue', 'mattis.Cras.eget@orci.com', '1234', ''),
(28, 1, 'Sims', 'Dustin Mcmillan', '1992-04-15', 1, '200-1312 Leo, Rd.', 'aliquet.sem.ut@risusodio.ca', '1234', ''),
(29, 1, 'Goff', 'Aquila English', '1990-11-21', 2, '2563 Tincidunt St.', 'arcu.ac.orci@Donec.edu', '1234', ''),
(30, 1, 'Lyons', 'Aristotle Holloway', '1989-06-09', 1, '2797 Purus, Street', 'Nam.tempor.diam@ipsumnunc.edu', '1234', ''),
(31, 1, 'Gallagher', 'Yasir Rojas', '1983-03-24', 1, '458-7835 Nisi Ave', 'Aliquam.tincidunt@sagittisfelisDonec.com', '1234', ''),
(32, 2, 'Mckenzie', 'Barclay Chen', '1985-11-03', 1, 'Ap #422-774 Ad St.', 'ante.dictum@Namconsequat.net', '1234', ''),
(33, 2, 'Montgomery', 'Carter Wilson', '1987-10-02', 1, 'Ap #686-2819 Eu, St.', 'fames.ac.turpis@consequatdolor.com', '1234', ''),
(34, 2, 'Spencer', 'Stephen Pennington', '1988-10-18', 2, '3259 Lorem Av.', 'convallis.dolor@maurisaliquameu.org', '1234', ''),
(35, 2, 'Madden', 'Rafael Bradford', '1992-09-20', 2, '5363 Nullam Avenue', 'Pellentesque.habitant@dolor.ca', '1234', ''),
(36, 2, 'Hanson', 'Dexter Dixon', '1988-08-28', 1, 'Ap #475-1853 Gravida Rd.', 'orci.lobortis.augue@odio.org', '1234', ''),
(37, 1, 'Mcmillan', 'Porter Haynes', '1992-06-15', 2, '579-2278 Augue Rd.', 'Sed.eu.eros@semNulla.edu', '1234', ''),
(38, 2, 'Reid', 'Caldwell Wiggins', '1992-12-10', 1, 'Ap #939-4528 Quisque Rd.', 'egestas@tellus.org', '1234', ''),
(39, 1, 'Moreno', 'Lance Chapman', '1987-09-10', 1, 'P.O. Box 503, 8744 Felis. Av.', 'leo.in.lobortis@Maecenas.com', '1234', ''),
(40, 1, 'Craft', 'Brandon Vazquez', '1994-11-18', 1, 'Ap #764-3022 Hendrerit. Road', 'bibendum@molestiein.edu', '1234', ''),
(41, 2, 'Warner', 'Wyatt Glenn', '1990-03-19', 2, 'Ap #625-8764 Etiam Rd.', 'commodo.ipsum@commodohendrerit.edu', '1234', ''),
(42, 1, 'Vazquez', 'Dante Henson', '1992-09-16', 1, '794-8613 Et Street', 'faucibus.Morbi.vehicula@cursus.ca', '1234', ''),
(43, 1, 'Collins', 'Damon Harmon', '1990-07-21', 2, '6596 Convallis St.', 'nec.orci@FuscemollisDuis.com', '1234', ''),
(44, 2, 'Carroll', 'Rafael Nguyen', '1988-08-14', 2, '844 Consequat, Av.', 'tempus.non.lacinia@risusDonecegestas.com', '1234', ''),
(45, 1, 'Durham', 'Wade Tillman', '1995-02-21', 1, 'Ap #384-1130 Non, Ave', 'Vivamus.non.lorem@SuspendissesagittisNul', '1234', ''),
(46, 2, 'Morrow', 'Nigel Hogan', '1995-02-25', 2, '2142 Donec St.', 'elementum.purus@vehiculaPellentesquetinc', '1234', ''),
(47, 1, 'Sawyer', 'Chandler Burks', '1982-11-01', 1, '501-5359 A Rd.', 'porttitor@nonleoVivamus.org', '1234', ''),
(48, 1, 'Brock', 'Randall Gaines', '1988-12-25', 2, '143-5372 Nunc St.', 'velit@eu.ca', '1234', ''),
(49, 2, 'Douglas', 'Amal Durham', '1986-09-25', 2, 'Ap #537-8128 Quis Ave', 'ridiculus@erosNamconsequat.co.uk', '1234', ''),
(50, 2, 'Serrano', 'Geoffrey Whitehead', '1995-01-29', 1, 'P.O. Box 828, 6113 Pharetra. Avenue', 'pede@Cumsociisnatoque.com', '1234', ''),
(51, 1, 'Tyson', 'Castor Malone', '1993-12-30', 2, '8958 Odio Avenue', 'mauris.aliquam@nonummyutmolestie.edu', '1234', ''),
(52, 1, 'Franklin', 'Aladdin Guerra', '1985-11-20', 2, 'P.O. Box 131, 6765 Tortor. Road', 'sapien.Cras.dolor@at.net', '1234', ''),
(53, 1, 'Berry', 'Zeph Morales', '1991-11-12', 1, '7097 Nonummy Rd.', 'risus@eleifendnuncrisus.edu', '1234', ''),
(54, 1, 'Baldwin', 'Calvin Rivers', '1987-01-13', 2, '495-6687 Feugiat Avenue', 'lobortis@conubianostraper.edu', '1234', ''),
(55, 1, 'Sharpe', 'Carl Beach', '1987-08-08', 1, '748-7003 Placerat, Av.', 'dui@estmauris.co.uk', '1234', ''),
(56, 1, 'Wright', 'William Whitehead', '1987-07-28', 1, '4102 Aliquet Ave', 'non.egestas.a@nostraper.ca', '1234', ''),
(57, 2, 'Melendez', 'Abdul Alvarez', '1993-11-02', 1, 'P.O. Box 736, 128 Urna. Avenue', 'dictum.eleifend@Seddiam.com', '1234', ''),
(58, 1, 'Haynes', 'Leroy Roberson', '1991-02-17', 1, 'P.O. Box 127, 4004 Est. Av.', 'molestie.Sed@auctorodio.com', '1234', ''),
(59, 1, 'Dean', 'Wayne Bean', '1988-07-09', 1, 'P.O. Box 331, 9160 Sed Ave', 'arcu.Nunc.mauris@cubilia.ca', '1234', ''),
(60, 2, 'Dawson', 'Cairo Ford', '1985-03-17', 2, 'P.O. Box 767, 2814 Phasellus Road', 'Etiam.vestibulum.massa@leoinlobortis.edu', '1234', ''),
(61, 1, 'Yang', 'Blaze Mann', '1992-11-15', 2, 'P.O. Box 902, 7936 Vivamus St.', 'eget.dictum@Phasellusin.co.uk', '1234', ''),
(62, 2, 'Cantu', 'Gil William', '1986-12-14', 1, 'P.O. Box 894, 993 Ut Road', 'ultrices.posuere@Nuncmauris.edu', '1234', ''),
(63, 1, 'Oneil', 'Knox Langley', '1982-08-07', 1, '328-8061 Aliquet Road', 'velit.eu.sem@aliquet.com', '1234', ''),
(64, 2, 'Perkins', 'Rogan Moran', '1995-04-14', 1, 'Ap #723-9849 Feugiat Rd.', 'lacus@Etiamvestibulum.net', '1234', ''),
(65, 1, 'Dalton', 'Oliver Gutierrez', '1987-06-28', 2, 'P.O. Box 634, 7406 Libero Avenue', 'orci@Cum.org', '1234', ''),
(66, 1, 'Riggs', 'Lars Cote', '1987-12-10', 1, 'P.O. Box 763, 493 Lobortis. Av.', 'ac@dictumplacerat.org', '1234', ''),
(67, 1, 'Christensen', 'Charles Peterson', '1993-11-08', 1, '236 Morbi Road', 'commodo.hendrerit.Donec@dolorsit.edu', '1234', ''),
(68, 2, 'Caldwell', 'Melvin Carlson', '1985-10-20', 2, '911 A, Avenue', 'Cum.sociis.natoque@euismod.net', '1234', ''),
(69, 1, 'Blanchard', 'Barrett Rosa', '1982-06-03', 2, '613-4386 Dapibus Avenue', 'elit.Nulla@famesac.edu', '1234', ''),
(70, 2, 'Key', 'Nissim Gray', '1994-03-11', 2, '449-5905 Aliquet Av.', 'adipiscing@nectempus.co.uk', '1234', ''),
(71, 2, 'Goodman', 'Isaac Waller', '1995-10-24', 2, '9763 Erat Ave', 'litora.torquent.per@Nullamut.net', '1234', ''),
(72, 2, 'Blackburn', 'Zahir Fletcher', '1993-09-20', 2, '9718 Erat Avenue', 'purus@NulladignissimMaecenas.edu', '1234', ''),
(73, 1, 'Lloyd', 'Elton Ellison', '1982-07-13', 2, '2418 Malesuada. Rd.', 'eget.metus.In@Crasegetnisi.org', '1234', ''),
(74, 1, 'Gonzales', 'Kennan Chan', '1994-05-15', 2, '2158 Mauris Road', 'magna.Suspendisse@pellentesque.edu', '1234', ''),
(75, 2, 'Waller', 'Duncan Newton', '1985-06-18', 2, '5415 Semper Rd.', 'nisi.Cum@adipiscingelitAliquam.com', '1234', ''),
(76, 1, 'Ballard', 'David Little', '1993-05-18', 2, '841-936 Magna. Avenue', 'semper.egestas.urna@adipiscingelitEtiam.', '1234', ''),
(77, 2, 'Hammond', 'Basil Bray', '1989-05-11', 1, 'Ap #226-3242 Duis Rd.', 'dolor@tristiquepellentesque.net', '1234', ''),
(78, 2, 'Mcguire', 'Nash Goff', '1994-07-11', 1, '3529 Erat St.', 'nec.euismod.in@Donec.edu', '1234', ''),
(79, 2, 'Sparks', 'Ulric Nichols', '1985-10-21', 2, 'Ap #925-9672 Sem Rd.', 'Vivamus.euismod.urna@volutpat.org', '1234', ''),
(80, 1, 'Henry', 'Yasir Shaffer', '1993-01-24', 1, 'Ap #560-5365 Eu Rd.', 'interdum.Curabitur@vehiculaPellentesque.', '1234', ''),
(81, 1, 'Conner', 'Harrison Becker', '1984-02-04', 2, 'Ap #529-4578 Fusce St.', 'et.magnis.dis@massaSuspendisse.com', '1234', ''),
(82, 1, 'Middleton', 'Odysseus Shelton', '1993-10-14', 2, '374-2661 Eu, Rd.', 'sodales@morbi.net', '1234', ''),
(83, 1, 'Peterson', 'Jared Park', '1986-01-06', 2, '7887 Integer Ave', 'eu.accumsan@senectus.org', '1234', ''),
(84, 1, 'Sampson', 'Ulysses Fischer', '1994-02-20', 2, 'Ap #742-2822 Quisque Road', 'tellus@Duisvolutpat.co.uk', '1234', ''),
(85, 1, 'Gill', 'Rooney Marks', '1993-03-12', 1, '1327 Bibendum Street', 'Ut@Suspendisse.net', '1234', ''),
(86, 2, 'Clark', 'Quentin Mcfadden', '1993-06-29', 2, '734-9693 Tristique St.', 'amet@Maurisblanditenim.edu', '1234', ''),
(87, 2, 'Leblanc', 'Ulric Webster', '1992-10-04', 2, 'P.O. Box 303, 8231 Pede. St.', 'egestas.Duis@lorem.org', '1234', ''),
(88, 2, 'Knox', 'Benjamin Wilcox', '1993-04-11', 1, '9054 Phasellus St.', 'vehicula.risus@gravidaAliquam.org', '1234', ''),
(89, 2, 'Valencia', 'Yuli Rivas', '1988-01-21', 2, 'Ap #794-5457 Vestibulum, Rd.', 'Aliquam@Quisqueaclibero.org', '1234', ''),
(90, 1, 'Wiggins', 'Drew Hart', '1982-09-30', 2, '5526 Adipiscing Street', 'mauris.rhoncus@convallis.org', '1234', ''),
(91, 2, 'Tanner', 'Brent Whitley', '1995-08-10', 1, 'P.O. Box 148, 3995 Scelerisque St.', 'arcu.Vivamus@amet.com', '1234', ''),
(92, 2, 'Wynn', 'Alvin Rice', '1989-02-11', 1, '458-9378 Nunc Avenue', 'egestas@vulputate.com', '1234', ''),
(93, 1, 'Hughes', 'Nehru Blackwell', '1992-05-29', 2, '1412 Nulla Avenue', 'neque@diam.org', '1234', ''),
(94, 2, 'Kelley', 'Theodore Estes', '1995-09-25', 2, '577-4101 Quis Avenue', 'gravida@ridiculus.edu', '1234', ''),
(95, 2, 'Keller', 'Bevis Franklin', '1985-04-14', 1, '353-2259 Facilisis. Avenue', 'Sed.eget@tempor.co.uk', '1234', ''),
(96, 2, 'Conley', 'Zane King', '1988-11-22', 2, '261-1132 Aenean Rd.', 'a.felis@aliquam.edu', '1234', ''),
(97, 2, 'Mcleod', 'Robert Pena', '1992-01-22', 1, '2490 Feugiat St.', 'Nam.nulla@arcu.ca', '1234', ''),
(98, 2, 'Le', 'Justin Wynn', '1984-03-28', 2, 'P.O. Box 582, 1892 Nulla Street', 'risus@Aliquamfringillacursus.net', '1234', ''),
(99, 1, 'Howe', 'Dexter Dillon', '1985-06-02', 1, '9639 Tristique Ave', 'arcu@dictumProineget.ca', '1234', ''),
(100, 2, 'Bailey', 'Basil Hahn', '1988-04-18', 2, '5386 Aliquet St.', 'enim@erat.co.uk', '1234', ''),
(101, 1, 'Martin', 'Xander Golden', '1994-04-02', 1, '540-1544 Nascetur Rd.', 'nulla@lacus.ca', '1234', ''),
(102, 2, 'Ferguson', 'Len Holden', '1990-09-07', 2, '7233 Purus. Ave', 'dignissim.Maecenas@Aliquam.ca', '1234', ''),
(103, 1, 'Palmer', 'Ryder Rhodes', '1993-04-21', 1, 'Ap #995-3438 Vivamus St.', 'vehicula@ullamcorper.ca', '1234', ''),
(104, 2, 'Winters', 'Zachary William', '1990-01-23', 1, '549-1324 Erat. St.', 'consectetuer.adipiscing.elit@Maurisut.or', '1234', ''),
(105, 1, 'Morrison', 'Uriel Wells', '1984-07-02', 1, 'P.O. Box 842, 8168 Urna Rd.', 'Phasellus.fermentum@scelerisqueloremipsu', '1234', ''),
(106, 2, 'Jensen', 'Byron Cantu', '1985-09-28', 2, '820-7514 Non, Street', 'adipiscing.fringilla@pedeultrices.co.uk', '1234', ''),
(107, 2, 'Gaines', 'Ira Oneil', '1993-01-04', 1, 'P.O. Box 930, 4317 Non Rd.', 'Aenean.massa@utdolordapibus.net', '1234', ''),
(108, 2, 'Juarez', 'Byron Oliver', '1991-03-07', 2, 'Ap #872-8985 Orci. St.', 'sem.Pellentesque@mi.edu', '1234', ''),
(109, 1, 'Contreras', 'Preston Higgins', '1988-09-17', 2, '188-3413 Eget St.', 'nunc@ipsumdolor.net', '1234', ''),
(110, 1, 'Small', 'Christian Mcpherson', '1992-08-18', 1, 'P.O. Box 437, 143 Semper, Road', 'tellus@SeddictumProin.ca', '1234', ''),
(111, 2, 'Mays', 'Blaze Sosa', '1994-07-17', 1, 'Ap #183-5414 In Road', 'at.augue.id@Duis.edu', '1234', ''),
(112, 1, 'Love', 'Tyrone Owens', '1988-04-26', 1, '7076 Sociis St.', 'vitae.sodales.at@Nullamenim.org', '1234', ''),
(113, 1, 'Morse', 'Quinlan Dickson', '1982-10-08', 2, '8486 Per Avenue', 'turpis.nec.mauris@ultricessitamet.org', '1234', ''),
(114, 1, 'Kent', 'Chadwick Frederick', '1985-07-09', 2, 'Ap #697-2187 Duis Rd.', 'nisl.sem@interdum.co.uk', '1234', ''),
(115, 2, 'gewor', 'Angga', 'Jakarta, 01-11-2015', 1, 'gffdgd', 'gewor@gmail.com', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
`id_laporan` int(11) unsigned NOT NULL,
  `id_karyawan` int(11) unsigned NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `subject` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `state` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_karyawan`, `id_jabatan`, `create_date`, `modify_date`, `subject`, `content`, `state`) VALUES
(2, 2, 2, '2015-08-05 11:59:07', '2015-08-06 11:59:07', '', '<p style="margin: 0px 0px 6px; color: #141823; font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 19.3199996948242px;">Bang, ane mau tanya, biar tanggal ini nantinya saat di input ke mysql dan formatnya bisa benar (YYYY/ MM/ DD) Gimana ya ? Mohon pencerahannya&nbsp;<em class="_4-k1 img sp_fM-mz8spZ1b sx_d55a98" style="vertical-align: -3px; display: inline-block; height: 16px; width: 16px; background-image: url(''https://fbstatic-a.akamaihd.net/rsrc.php/v2/yx/r/pimRBh7B6ER.png''); background-size: auto; background-position: 0px -119px; background-repeat: no-repeat;"><u style="left: -999999px; position: absolute;">frown emotikon</u></em>&nbsp;Kalo Saya Input mesti di databasenya jadi 0000-00-00</p>\r\n<p>&nbsp;</p>\r\n<p style="margin: 6px 0px 0px; display: inline; color: #141823; font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 19.3199996948242px;">Terima Kasih</p>', 'draft'),
(4, 6, 2, '2015-08-06 14:53:40', '2015-08-06 16:50:03', 'Laporan A', '<h1 style="box-sizing: border-box; margin: 0px 0px 10px; color: #6b6b6b; font-family: ''Open Sans''; font-size: 14px; line-height: 23.7999992370605px;"><strong>halo kakaks PUBLISH</strong></h1>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #6b6b6b; font-family: ''Open Sans''; font-size: 14px; line-height: 23.7999992370605px;">Hai selamat berjumpa kembali, dalam tutorial php kali ini saya akan menjelaskan cara membuat format tanggal Indonesia dengan php, ini merupakan bagian dari tutorial sebelumnya yaitu&nbsp;<a style="box-sizing: border-box; color: #da4453; text-decoration: none; transition: all 0.3s; background-color: transparent;" href="http://abdrahmatika.com/format-tanggal-dan-waktu-pada-php/">format tanggal dan waktu pada PHP</a>.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #6b6b6b; font-family: ''Open Sans''; font-size: 14px; line-height: 23.7999992370605px;">Dalam tutorial ini kita akan menggunakan beberapa fungsi (function) . Jadi kita akan menggunakan function tersebut untuk menampilkan tanggal format bahasa Indonesia.<span id="more-442" style="box-sizing: border-box;"></span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #6b6b6b; font-family: ''Open Sans''; font-size: 14px; line-height: 23.7999992370605px;">Function yang akan kita gunakan ada dua, yaitu function untuk menampilkan tanggalnya dan function yang akan mengambil nama bulan dalam bahasa Indonesia.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #6b6b6b; font-family: ''Open Sans''; font-size: 14px; line-height: 23.7999992370605px;">Fungsi ini dibuat oleh pengembang cms lokomedia, jadi jika anda mendownload cms lokomedia anda akan menemukan script functionnya. Berikut kodenya:</p>', 'publish'),
(14, 1, 1, '2015-08-17 00:10:23', '2015-08-17 02:06:16', '', '<h3><em>Content style</em></h3>\r\n<p>These settings allow you to modify the styles that are applied to content inside the editor. Custom CSS can be loaded into the editor through the use of the content_css setting.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:body_id">body_id</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:body_class">body_class</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:content_css">content_css</a></li>\r\n</ul>\r\n<h3>Visual aids</h3>\r\n<p>These settings apply to the content of the editor while it is being edited. An example of a visual aid that is available is the light grey, dotted border that is applied to tables when the border property is set to "0". These settings can change the classes that are applied to visual aids in addition to determining whether they appear at all.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:visual">visual</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:visual_table_class">visual_table_class</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:visual_anchor_class">visual_anchor_class</a></li>\r\n</ul>\r\n<h3>Undo/Redo</h3>\r\n<p>These settings change the behaviour of undo and redo.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:custom_undo_redo_levels">custom_undo_redo_levels</a></li>\r\n</ul>\r\n<h3>User interface</h3>\r\n<p>These settings affect the user interface. Settings that control toolbars, menus, buttons and more are available here.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:elementpath">elementpath</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:max_height">max_height</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:max_width">max_width</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:min_height">min_height</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:min_width">min_width</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:toolbar">toolbar</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:toolbar%3CN%3E">toolbar&lt;N&gt;</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:menubar">menubar</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:menu">menu</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:statusbar">statusbar</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:resize">resize</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:width">width</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:height">height</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:preview_styles">preview_styles</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:fixed_toolbar_container">fixed_toolbar_container</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:event_root">event_root</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:removed_menuitems">removed_menuitems</a></li>\r\n</ul>\r\n<h3>URL</h3>\r\n<p>These settings affect the way URLs are handled by the editor.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:convert_urls">convert_urls</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:relative_urls">relative_urls</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:remove_script_host">remove_script_host</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:document_base_url">document_base_url</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:allow_script_urls">allow_script_urls</a></li>\r\n</ul>\r\n<h3>Callbacks</h3>\r\n<p>These settings allow the execution of callbacks after specific events have occurred in the editor.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:file_browser_callback">file_browser_callback</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:file_browser_callback_types">file_browser_callback_types</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:file_picker_callback">file_picker_callback</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:file_picker_types">file_picker_types</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:color_picker_callback">color_picker_callback</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:init_instance_callback">init_instance_callback</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:setup">setup</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:urlconverter_callback">urlconverter_callback</a></li>\r\n</ul>\r\n<h3>Image upload</h3>\r\n<p>These settings affect the image upload facility of the editor. The location, path and credentials of the image uploader can be set here.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:images_upload_url">images_upload_url</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:images_upload_base_path">images_upload_base_path</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:images_upload_credentials">images_upload_credentials</a></li>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:images_upload_handler">images_upload_handler</a></li>\r\n</ul>\r\n<h3>Security</h3>\r\n<p>This setting affects the security features of TinyMCE. The content security policy for the editor''s iframe may be set here.</p>\r\n<ul>\r\n<li><a href="http://www.tinymce.com/wiki.php/Configuration:content_security_policy">content_security_policy</a></li>\r\n</ul>', 'publish'),
(16, 1, 1, '2015-08-18 15:32:36', '2015-08-19 12:04:40', '', '<p><strong>Gibraltar -</strong> Pasti sebal kalau berfoto saat traveling, lalu ada objek yang mengganggu di dalam foto. Turis cantik asal Inggris bermaksud foto dengan latar tebing Gibraltar, tiba-tiba seekor monyet ikut menimbrung dalam gambar. Jepret! Photobom yang dilakukan oleh monyet ini pun menjadi viral dan sempat diberitakan beberapa media Inggris seperti Mirror dan Telegraph. Ditelusuri detikTravel Kamis (11/6/2015), traveler cantik ini juga tidak menyangka ada monyet yang ikut berfoto bersamanya. Cerita bermula ketika Asleigh Frank, gadis berusia 23 tahun asal Kent, Inggris berlibur ke Gibraltar. Gibraltar merupakan destinasi favorit bagi warga Inggris karena pemandangan pantai dan alamnya yang cantik. Asleigh bermaksud mengunjungi sepupunya yang tinggal di Gibraltar. Untuk mengabadikan kunjungannya di pulau cantik yang berada di Laut Mediterania itu, Asleigh meminta sepupunya memfoto dirinya di sebuah puncak bukit berbatu. Tak disangka, saat dia hendak selfie, tiba-tiba muncul seekor monyet yang tanpa berdosa duduk tepat di sampingnya. Jepret! Si monyet pun ikutan foto bersama Ashleigh dan merusak foto liburannya. Sebenarnya, si monyet juga tak bermaksud nimbrung di foto Asleigh. Dia terlihat bingung bercampur penasaran melihat apa yang dilakukan Asleigh dan sepupunya. Si monyet tampak polos sekali ekspresinya. Ekspresi polos si monyet itu berbanding terbalik dengan mimik muka yang ditunjukkan Ashleigh. Dia tampak terkejut kenapa tiba-tiba ada monyet duduk di sampingnya. Namun akhirnya di foto kedua, Asleigh bisa tersenyum saat berfoto dengan si monyet. Ada-ada saja!</p>', 'publish'),
(17, 8, 2, '2015-08-18 19:30:08', '2015-08-19 13:53:36', '', '<h4>Always add labels</h4>\r\n<p>Screen readers will have trouble with your forms if you don''t include a label for every input. For these inline forms, you can hide the labels using the <code>.sr-only</code> class. There are further alternative methods of providing a label for assistive technologies, such as the <code>aria-label</code>, <code>aria-labelledby</code> or <code>title</code> attribute. If none of these is present, screen readers may resort to using the <code>placeholder</code> attribute, if present, but note that use of <code>placeholder</code> as a replacement for other labelling methods is not advised.</p>', 'publish'),
(18, 1, 1, '2015-08-19 17:38:49', '2015-08-19 17:39:17', 'Report', '<h2 id="tables-example">Basic example</h2>\r\n<p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we''ve opted to isolate our custom table styles.</p>\r\n<h2 id="tables-example">Basic example</h2>\r\n<p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we''ve opted to isolate our custom table styles.</p>\r\n<h2 id="tables-example">Basic example</h2>\r\n<p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we''ve opted to isolate our custom table styles.</p>\r\n<h2 id="tables-example">Basic example</h2>\r\n<p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we''ve opted to isolate our custom table styles.</p>\r\n<h2 id="tables-example">Basic example</h2>\r\n<p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we''ve opted to isolate our custom table styles.</p>', 'publish'),
(19, 8, 2, '2015-08-20 12:43:08', '2015-08-20 17:23:41', 'Laporan', '<table style="height: 312px;" border="0" width="788" cellspacing="0"><colgroup span="4" width="85"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td align="center" bgcolor="#A9A9A9" height="17">asdasd</td>\r\n<td align="center" bgcolor="#A9A9A9">asdasd</td>\r\n<td align="center" bgcolor="#A9A9A9">asdasd</td>\r\n<td align="center" bgcolor="#A9A9A9">asdasd</td>\r\n</tr>\r\n<tr>\r\n<td align="left" height="17">asdad</td>\r\n<td align="left">asdad</td>\r\n<td align="left">asdad</td>\r\n<td align="left">asdad</td>\r\n</tr>\r\n<tr>\r\n<td align="left" height="17">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n</tr>\r\n<tr>\r\n<td align="left" height="17">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n</tr>\r\n<tr>\r\n<td align="left" height="17">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n</tr>\r\n<tr>\r\n<td align="left" height="17">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n<td align="left">asdasd</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'publish'),
(20, 1, 1, '2015-08-22 22:17:01', '2015-08-22 22:21:23', 'Tugas 1', '<p style="padding-left: 30px;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><em><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</em></p>\r\n<p><em><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</em></p>\r\n<p style="text-align: center;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style="text-align: center;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'publish'),
(21, 1, 1, '2015-09-22 11:37:48', '2015-09-22 11:58:37', 'Subject', 'dsjj iojdis wfe xxxxx', ''),
(22, 1, 1, '2015-09-23 04:37:39', '2015-09-23 06:00:09', 'ZzzZ', 'fddd ojds iweihw jkngorf0894', 'publish'),
(23, 6, 2, '2015-09-23 06:52:26', '2015-09-23 06:52:42', 'Tugas 1', 'jkfhkjsfh iojwiej o209u niiieepo', 'publish'),
(24, 6, 2, '2015-09-23 08:15:48', '2015-09-23 08:21:23', 'ythtrhrt', 'trtrre rff', 'publish'),
(27, 7, 2, '2015-10-13 17:13:22', '2015-10-13 17:18:38', 'Asdfg', 'dsfdsg yhtoiupit weqw tetgr ewed rp2rrme', 'publish'),
(28, 7, 2, '2015-11-05 16:39:29', '2015-11-05 16:39:44', 'Assdf', 'tfyhfg yftf jbhjb', 'publish'),
(29, 7, 2, '2015-11-09 16:40:20', '2015-11-09 11:22:25', 'ftytf', 'drtrtry rdtdr cobaaaaa', 'publish'),
(32, 7, 2, '2015-11-13 16:46:46', '2015-11-13 16:46:46', 'Dnnsnfs', 'jdfndsj ednoisn dfskl', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
`id_notice` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id_notice`, `id_karyawan`, `tanggal`, `isi`) VALUES
(1, 7, '2015-09-25', 'kljkljik'),
(2, 2, '2015-09-25', 'nhgnfgbf'),
(3, 7, '2015-09-25', 'ggllikhjmgn'),
(4, 7, '2015-09-28', 'Lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
`id_shift` int(11) NOT NULL,
  `nama_shift` varchar(40) NOT NULL,
  `start_shift` time NOT NULL,
  `end_shift` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id_shift`, `nama_shift`, `start_shift`, `end_shift`) VALUES
(1, 'Shift  1', '00:00:00', '09:00:00'),
(2, 'Shift 2', '09:00:00', '18:00:00'),
(3, 'Shift 3', '16:00:00', '01:00:00'),
(4, 'Non Shift', '09:00:00', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `shift_line`
--

CREATE TABLE IF NOT EXISTS `shift_line` (
`id_shiftline` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_shift` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_line`
--

INSERT INTO `shift_line` (`id_shiftline`, `id_shift`, `id_karyawan`, `tanggal_shift`) VALUES
(1, 1, 12, '2015-09-28'),
(2, 1, 12, '2015-09-29'),
(3, 1, 12, '2015-09-30'),
(4, 3, 12, '2015-10-03'),
(5, 3, 12, '2015-10-04'),
(6, 2, 15, '2015-09-28'),
(7, 2, 15, '2015-09-29'),
(8, 2, 15, '2015-09-30'),
(9, 3, 15, '2015-10-01'),
(10, 3, 15, '2015-10-02'),
(11, 3, 9, '2015-09-28'),
(12, 3, 9, '2015-09-29'),
(13, 3, 9, '2015-09-30'),
(14, 1, 9, '2015-10-03'),
(15, 1, 9, '2015-10-04'),
(16, 3, 7, '2015-09-28'),
(17, 1, 7, '2015-10-01'),
(18, 1, 7, '2015-10-02'),
(19, 2, 7, '2015-10-03'),
(20, 2, 7, '2015-10-04'),
(21, 1, 15, '2015-10-05'),
(22, 1, 15, '2015-10-06'),
(23, 1, 15, '2015-10-07'),
(24, 3, 15, '2015-10-10'),
(25, 3, 15, '2015-10-11'),
(26, 2, 7, '2015-10-05'),
(27, 2, 7, '2015-10-06'),
(28, 2, 7, '2015-10-07'),
(29, 3, 7, '2015-10-08'),
(30, 3, 7, '2015-10-09'),
(31, 3, 9, '2015-10-05'),
(32, 1, 9, '2015-10-08'),
(33, 1, 9, '2015-10-09'),
(34, 2, 9, '2015-10-10'),
(35, 2, 9, '2015-10-11'),
(36, 3, 12, '2015-10-05'),
(37, 3, 12, '2015-10-06'),
(38, 3, 12, '2015-10-07'),
(39, 1, 12, '2015-10-10'),
(40, 1, 12, '2015-10-11'),
(41, 1, 7, '2015-10-12'),
(42, 1, 7, '2015-10-13'),
(43, 1, 7, '2015-10-14'),
(44, 3, 7, '2015-10-17'),
(45, 3, 7, '2015-10-18'),
(46, 2, 9, '2015-10-12'),
(47, 2, 9, '2015-10-13'),
(48, 2, 9, '2015-10-14'),
(49, 3, 9, '2015-10-15'),
(50, 3, 9, '2015-10-16'),
(51, 3, 12, '2015-10-12'),
(52, 1, 12, '2015-10-15'),
(53, 1, 12, '2015-10-16'),
(54, 2, 12, '2015-10-17'),
(55, 1, 12, '2015-10-18'),
(56, 3, 15, '2015-10-12'),
(57, 3, 15, '2015-10-13'),
(58, 3, 15, '2015-10-14'),
(59, 1, 15, '2015-10-17'),
(60, 1, 15, '2015-10-18'),
(61, 1, 9, '2015-10-19'),
(62, 1, 9, '2015-10-20'),
(63, 1, 9, '2015-10-21'),
(64, 3, 9, '2015-10-24'),
(65, 3, 9, '2015-10-25'),
(66, 2, 12, '2015-10-19'),
(67, 2, 12, '2015-10-20'),
(68, 2, 12, '2015-10-21'),
(69, 3, 12, '2015-10-22'),
(70, 3, 12, '2015-10-23'),
(71, 3, 15, '2015-10-19'),
(72, 1, 15, '2015-10-22'),
(73, 1, 15, '2015-10-23'),
(74, 1, 15, '2015-10-24'),
(75, 1, 15, '2015-10-25'),
(76, 3, 7, '2015-10-19'),
(77, 3, 7, '2015-10-20'),
(78, 3, 7, '2015-10-21'),
(79, 2, 7, '2015-10-24'),
(80, 2, 7, '2015-10-25'),
(81, 1, 12, '2015-10-26'),
(82, 1, 12, '2015-10-27'),
(83, 1, 12, '2015-10-28'),
(84, 3, 12, '2015-10-31'),
(85, 3, 12, '2015-11-01'),
(86, 2, 15, '2015-10-26'),
(87, 2, 15, '2015-10-27'),
(88, 2, 15, '2015-10-28'),
(89, 3, 15, '2015-10-29'),
(90, 3, 15, '2015-10-30'),
(91, 3, 9, '2015-10-26'),
(92, 3, 9, '2015-10-27'),
(93, 3, 9, '2015-10-28'),
(94, 1, 9, '2015-10-31'),
(95, 1, 9, '2015-11-01'),
(96, 3, 7, '2015-10-26'),
(97, 1, 7, '2015-10-29'),
(98, 1, 7, '2015-10-30'),
(99, 2, 7, '2015-10-31'),
(100, 2, 7, '2015-11-01'),
(106, 2, 12, '2015-11-01'),
(107, 2, 12, '2015-11-02'),
(108, 2, 12, '2015-11-03'),
(109, 1, 115, '2015-11-08'),
(110, 1, 115, '2015-11-09'),
(111, 1, 115, '2015-11-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
 ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
 ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
 ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`id_notice`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
 ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `shift_line`
--
ALTER TABLE `shift_line`
 ADD PRIMARY KEY (`id_shiftline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
MODIFY `id_laporan` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `id_notice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shift_line`
--
ALTER TABLE `shift_line`
MODIFY `id_shiftline` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
