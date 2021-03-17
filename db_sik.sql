-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 12:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sik`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_template`
--

CREATE TABLE `doc_template` (
  `id` int(11) NOT NULL,
  `template_desc` varchar(256) NOT NULL,
  `file_name` varchar(256) NOT NULL,
  `upload_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_template`
--

INSERT INTO `doc_template` (`id`, `template_desc`, `file_name`, `upload_date`) VALUES
(6, 'template dokumen', 'ini_template.docx', 1613813474);

-- --------------------------------------------------------

--
-- Table structure for table `naskah`
--

CREATE TABLE `naskah` (
  `id` int(11) NOT NULL,
  `tgl_regis` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `tperkembangan_id` int(11) NOT NULL,
  `tgl_naskah` int(11) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `nomor_agenda` varchar(128) DEFAULT NULL,
  `hal` varchar(256) NOT NULL,
  `urgensi_id` int(11) NOT NULL,
  `sifat_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `taksespublik_id` int(11) NOT NULL,
  `pengirim` varchar(10) NOT NULL,
  `instansi_pengirim` varchar(256) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `jabatan_pengirim` varchar(128) NOT NULL,
  `penerima` varchar(128) NOT NULL,
  `tembusan` varchar(256) DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `bahasa_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tesaurus` varchar(150) NOT NULL,
  `statusvital_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuanjumlah_id` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah`
--

INSERT INTO `naskah` (`id`, `tgl_regis`, `role_id`, `jenis_id`, `tperkembangan_id`, `tgl_naskah`, `nomor`, `nomor_agenda`, `hal`, `urgensi_id`, `sifat_id`, `kategori_id`, `taksespublik_id`, `pengirim`, `instansi_pengirim`, `nama_pengirim`, `jabatan_pengirim`, `penerima`, `tembusan`, `media_id`, `bahasa_id`, `isi`, `tesaurus`, `statusvital_id`, `jumlah`, `satuanjumlah_id`, `tipe`) VALUES
(2, 1613798953, 1, 2, 1, 1613430000, '170/003366/x/2021', '464/diskarpus/2019', 'Undangan FGD', 1, 1, 2, 1, 'external', 'Walikota Palembang', 'H.Harnojoyo', 'Walikota Palembang', 'Ir.H.Gunawan,M.T.P', 'tembusannya', 1, 1, 'Undangan FGD Optimalisasi Pendapatan Asli Daerah.', 'Sub Bag Umum dan Kepegawaian', 2, 3, 3, 'inbox');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_bahasa`
--

CREATE TABLE `naskah_bahasa` (
  `id` int(11) NOT NULL,
  `bahasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_bahasa`
--

INSERT INTO `naskah_bahasa` (`id`, `bahasa`) VALUES
(1, 'Indonesia'),
(2, 'Inggris'),
(3, 'Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_files`
--

CREATE TABLE `naskah_files` (
  `id` int(11) NOT NULL,
  `naskah_id` int(11) NOT NULL,
  `file_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_files`
--

INSERT INTO `naskah_files` (`id`, `naskah_id`, `file_name`) VALUES
(4, 2, '2608033.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `naskah_full`
-- (See below for the actual view)
--
CREATE TABLE `naskah_full` (
`id` int(11)
,`tgl_regis` int(11)
,`role_id` int(11)
,`jenis_id` int(11)
,`tperkembangan_id` int(11)
,`tgl_naskah` int(11)
,`nomor` varchar(128)
,`nomor_agenda` varchar(128)
,`hal` varchar(256)
,`urgensi_id` int(11)
,`sifat_id` int(11)
,`kategori_id` int(11)
,`taksespublik_id` int(11)
,`pengirim` varchar(10)
,`instansi_pengirim` varchar(256)
,`nama_pengirim` varchar(128)
,`jabatan_pengirim` varchar(128)
,`penerima` varchar(128)
,`tembusan` varchar(256)
,`media_id` int(11)
,`bahasa_id` int(11)
,`isi` text
,`tesaurus` varchar(150)
,`statusvital_id` int(11)
,`jumlah` int(11)
,`satuanjumlah_id` int(11)
,`tipe` varchar(10)
,`jenis` varchar(128)
,`tp` varchar(128)
,`urgensi` varchar(128)
,`sifat` varchar(128)
,`kategori` varchar(128)
,`tap` varchar(128)
,`media` varchar(128)
,`bahasa` varchar(128)
,`statusvital` varchar(128)
,`sj` varchar(50)
,`filesum` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `naskah_jenis`
--

CREATE TABLE `naskah_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_jenis`
--

INSERT INTO `naskah_jenis` (`id`, `jenis`) VALUES
(1, 'Peraturan'),
(2, 'Surat Perjanjian'),
(3, 'Surat Kuasa'),
(4, 'Berita Acara'),
(5, 'Surat Keterangan'),
(6, 'Surat Pengantar'),
(7, 'Pengumuman'),
(8, 'Telaah Staff'),
(9, 'Formulir'),
(10, 'MOU'),
(11, 'Pedoman'),
(12, 'Media Release'),
(13, 'Catatan Rapat'),
(14, 'Surat Dinas'),
(15, 'Metadata');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_kategori`
--

CREATE TABLE `naskah_kategori` (
  `id` int(11) NOT NULL,
  `kategoriarsip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_kategori`
--

INSERT INTO `naskah_kategori` (`id`, `kategoriarsip`) VALUES
(1, 'Terjaga'),
(2, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_media`
--

CREATE TABLE `naskah_media` (
  `id` int(11) NOT NULL,
  `media_arsip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_media`
--

INSERT INTO `naskah_media` (`id`, `media_arsip`) VALUES
(1, 'Cakram Padat (CD/DVD)');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_satuanjumlah`
--

CREATE TABLE `naskah_satuanjumlah` (
  `id` int(11) NOT NULL,
  `satuanjumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_satuanjumlah`
--

INSERT INTO `naskah_satuanjumlah` (`id`, `satuanjumlah`) VALUES
(1, 'Kopi/Jilid'),
(2, 'Halaman'),
(3, 'Lembar'),
(4, 'Bab'),
(5, 'Bundel'),
(6, 'cm (tebal)');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_sifat`
--

CREATE TABLE `naskah_sifat` (
  `id` int(11) NOT NULL,
  `sifat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_sifat`
--

INSERT INTO `naskah_sifat` (`id`, `sifat`) VALUES
(1, 'Biasa'),
(2, 'Rahasia Terbatas'),
(3, 'Rahasia'),
(4, 'Sangat Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_statusvital`
--

CREATE TABLE `naskah_statusvital` (
  `id` int(11) NOT NULL,
  `statusvital` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_statusvital`
--

INSERT INTO `naskah_statusvital` (`id`, `statusvital`) VALUES
(1, 'Vital'),
(2, 'Bernilai Guna'),
(3, 'Penting'),
(4, 'Tidak Vital');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_taksespublik`
--

CREATE TABLE `naskah_taksespublik` (
  `id` int(11) NOT NULL,
  `taksespublik` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_taksespublik`
--

INSERT INTO `naskah_taksespublik` (`id`, `taksespublik`) VALUES
(1, 'Tertutup'),
(2, 'Terbuka');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_tperkembangan`
--

CREATE TABLE `naskah_tperkembangan` (
  `id` int(11) NOT NULL,
  `tperkembangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_tperkembangan`
--

INSERT INTO `naskah_tperkembangan` (`id`, `tperkembangan`) VALUES
(1, 'Asli'),
(2, 'Tembusan'),
(3, 'Pertinggal'),
(4, 'Kopi Autentik'),
(5, 'Kopi Biasa'),
(6, 'Draft'),
(7, 'Kutipan'),
(8, 'Petikan'),
(9, 'Salinan');

-- --------------------------------------------------------

--
-- Table structure for table `naskah_urgensi`
--

CREATE TABLE `naskah_urgensi` (
  `id` int(11) NOT NULL,
  `urgensi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `naskah_urgensi`
--

INSERT INTO `naskah_urgensi` (`id`, `urgensi`) VALUES
(1, 'Biasa'),
(3, 'Segera'),
(4, 'Amat Segera');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_naskah`
--

CREATE TABLE `pengaturan_naskah` (
  `id` int(11) NOT NULL,
  `menu` varchar(256) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan_naskah`
--

INSERT INTO `pengaturan_naskah` (`id`, `menu`, `url`) VALUES
(1, 'Pengaturan Bahasa', 'adminpusat/naskahbahasa'),
(2, 'Pengaturan Jenis Naskah', 'adminpusat/jenisnaskah'),
(3, 'Pengaturan Media Arsip', 'adminpusat/mediaarsip'),
(4, 'Pengaturan Sifat Naskah', 'adminpusat/sifatnaskah'),
(5, 'Pengaturan Tingkat Perkembangan', 'adminpusat/tperkembangan'),
(6, 'Pengaturan Tingkat Urgensi', 'adminpusat/urgensi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jabatan`, `username`, `password`, `role_id`, `date_created`) VALUES
(5, 'Ednagea Almira', 'Administrator', 'ednagealmira', '$2y$10$PSeL1L.VGTQgFu/4qj8CkuJxUcuNg78LBwCgwKOc77SiaYOyaUw4S', 1, 1611368862),
(6, 'Nadine Andriani', 'Sekdin', 'nadineand', '$2y$10$uvz89teGB9Cp8F.9RlFhdO9ekeEHdoreMkagIW8Apioos3nuJ/4E.', 3, 1611391379),
(7, 'Aldi Anugra Pratama', 'Kadin', 'aldijele', '$2y$10$K7o5aCKFe0cAohlaGW25d.yLhK31pNDhpLXTBxlX9NUHTKWIsoYLK', 4, 1611414352),
(8, 'Danang Hardiansyah', 'Ka.Sub.Bag. Keuangan', 'dananghar', '$2y$10$gaXVtw3nrR6Qc5Jj4WcMxeOnIxkfz4XAhEHTzADFzInt6P7/MIfcq', 4, 1611559949),
(10, 'Zulaikha Asyraf', 'Sekbid', 'zulaikhasy', '$2y$10$PvSaXXyvuSQsz7eml.buLeMTvaxf8ZimVusovt3YFKKXrc0wVcNiS', 3, 1611668626);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(6, 1, 3),
(8, 2, 2),
(13, 2, 3),
(14, 3, 3),
(15, 4, 4),
(16, 1, 5),
(17, 2, 5),
(18, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'AdminPusat'),
(2, 'Admin'),
(3, 'User'),
(4, 'Inactiveuser'),
(5, 'Profil');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin Pusat'),
(2, 'Administrator Satuan Organisasi'),
(3, 'Pengguna Biasa'),
(4, 'Inactive Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 5, 'Profil Saya', 'profil', 'fas fa-fw fa-user', 1),
(3, 5, 'Edit Profil', 'profil/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'Role', 'admin/role', 'fas fa-fw fa-user-tag', 1),
(5, 5, 'Ubah Password', 'profil/changepassword', 'fas fa-fw fa-key', 1),
(6, 4, 'Home', 'inactiveuser', 'fas fa-fw fa-home', 1),
(7, 2, 'Pengaturan Pengguna', 'admin/usermanagement', 'fas fa-fw fa-user-cog', 1),
(8, 1, 'Pengaturan Umum', 'adminpusat', 'fas fa-fw fa-cogs', 1),
(9, 1, 'Template Dokumen', 'adminpusat/templatedoc', 'fas fa-fw fa-upload', 1),
(11, 3, 'Registrasi Naskah', 'user/registrasinaskahmenu', 'fas fa-fw fa-file-upload', 1),
(12, 3, 'Download Template', 'user/downloadtemplate', 'fas fa-fw fa-download', 1),
(13, 3, 'Log Naskah', 'user/lognaskah', 'fas fa-fw fa-archive', 1);

-- --------------------------------------------------------

--
-- Structure for view `naskah_full`
--
DROP TABLE IF EXISTS `naskah_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `naskah_full`  AS  select `n`.`id` AS `id`,`n`.`tgl_regis` AS `tgl_regis`,`n`.`role_id` AS `role_id`,`n`.`jenis_id` AS `jenis_id`,`n`.`tperkembangan_id` AS `tperkembangan_id`,`n`.`tgl_naskah` AS `tgl_naskah`,`n`.`nomor` AS `nomor`,`n`.`nomor_agenda` AS `nomor_agenda`,`n`.`hal` AS `hal`,`n`.`urgensi_id` AS `urgensi_id`,`n`.`sifat_id` AS `sifat_id`,`n`.`kategori_id` AS `kategori_id`,`n`.`taksespublik_id` AS `taksespublik_id`,`n`.`pengirim` AS `pengirim`,`n`.`instansi_pengirim` AS `instansi_pengirim`,`n`.`nama_pengirim` AS `nama_pengirim`,`n`.`jabatan_pengirim` AS `jabatan_pengirim`,`n`.`penerima` AS `penerima`,`n`.`tembusan` AS `tembusan`,`n`.`media_id` AS `media_id`,`n`.`bahasa_id` AS `bahasa_id`,`n`.`isi` AS `isi`,`n`.`tesaurus` AS `tesaurus`,`n`.`statusvital_id` AS `statusvital_id`,`n`.`jumlah` AS `jumlah`,`n`.`satuanjumlah_id` AS `satuanjumlah_id`,`n`.`tipe` AS `tipe`,`j`.`jenis` AS `jenis`,`tp`.`tperkembangan` AS `tp`,`u`.`urgensi` AS `urgensi`,`s`.`sifat` AS `sifat`,`k`.`kategoriarsip` AS `kategori`,`tap`.`taksespublik` AS `tap`,`m`.`media_arsip` AS `media`,`b`.`bahasa` AS `bahasa`,`sv`.`statusvital` AS `statusvital`,`sj`.`satuanjumlah` AS `sj`,count(`f`.`naskah_id`) AS `filesum` from (((((((((((`naskah` `n` join `naskah_jenis` `j` on(`n`.`jenis_id` = `j`.`id`)) join `naskah_tperkembangan` `tp` on(`n`.`tperkembangan_id` = `tp`.`id`)) join `naskah_urgensi` `u` on(`n`.`urgensi_id` = `u`.`id`)) join `naskah_sifat` `s` on(`n`.`sifat_id` = `s`.`id`)) join `naskah_kategori` `k` on(`n`.`kategori_id` = `k`.`id`)) join `naskah_taksespublik` `tap` on(`n`.`kategori_id` = `tap`.`id`)) join `naskah_media` `m` on(`n`.`media_id` = `m`.`id`)) join `naskah_bahasa` `b` on(`n`.`bahasa_id` = `b`.`id`)) join `naskah_statusvital` `sv` on(`n`.`statusvital_id` = `sv`.`id`)) join `naskah_satuanjumlah` `sj` on(`n`.`satuanjumlah_id` = `sj`.`id`)) join `naskah_files` `f` on(`n`.`id` = `f`.`naskah_id`)) group by `n`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_template`
--
ALTER TABLE `doc_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah`
--
ALTER TABLE `naskah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_bahasa`
--
ALTER TABLE `naskah_bahasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_files`
--
ALTER TABLE `naskah_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_jenis`
--
ALTER TABLE `naskah_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_kategori`
--
ALTER TABLE `naskah_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_media`
--
ALTER TABLE `naskah_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_satuanjumlah`
--
ALTER TABLE `naskah_satuanjumlah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_sifat`
--
ALTER TABLE `naskah_sifat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_statusvital`
--
ALTER TABLE `naskah_statusvital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_taksespublik`
--
ALTER TABLE `naskah_taksespublik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_tperkembangan`
--
ALTER TABLE `naskah_tperkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naskah_urgensi`
--
ALTER TABLE `naskah_urgensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_naskah`
--
ALTER TABLE `pengaturan_naskah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_template`
--
ALTER TABLE `doc_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `naskah`
--
ALTER TABLE `naskah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `naskah_bahasa`
--
ALTER TABLE `naskah_bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `naskah_files`
--
ALTER TABLE `naskah_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `naskah_jenis`
--
ALTER TABLE `naskah_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `naskah_kategori`
--
ALTER TABLE `naskah_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `naskah_media`
--
ALTER TABLE `naskah_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `naskah_satuanjumlah`
--
ALTER TABLE `naskah_satuanjumlah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `naskah_sifat`
--
ALTER TABLE `naskah_sifat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `naskah_statusvital`
--
ALTER TABLE `naskah_statusvital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `naskah_taksespublik`
--
ALTER TABLE `naskah_taksespublik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `naskah_tperkembangan`
--
ALTER TABLE `naskah_tperkembangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `naskah_urgensi`
--
ALTER TABLE `naskah_urgensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaturan_naskah`
--
ALTER TABLE `pengaturan_naskah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
