-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2019 pada 09.51
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd32`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_dp3`
--

CREATE TABLE `tbl_data_dp3` (
  `id_dp3` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `kesetiaan` varchar(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `tanggung_jawab` varchar(100) NOT NULL,
  `ketaatan` varchar(100) NOT NULL,
  `kejujuran` varchar(100) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `prakarsa` varchar(100) NOT NULL,
  `kepemimpinan` varchar(100) NOT NULL,
  `rata_rata` varchar(100) NOT NULL,
  `pejabat_penilai` varchar(100) NOT NULL,
  `atasan_pejabat_penilai` varchar(100) NOT NULL,
  `mengetahui` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_gaji_pokok`
--

CREATE TABLE `tbl_data_gaji_pokok` (
  `id_gaji_pokok` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_golongan` int(50) NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL,
  `dasar_perubahan` varchar(100) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `masa_kerja` varchar(50) NOT NULL,
  `pejabat_menetapkan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_hukuman`
--

CREATE TABLE `tbl_data_hukuman` (
  `id_hukuman` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_master_hukuman` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `no_sk_pembatalan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_keluarga`
--

CREATE TABLE `tbl_data_keluarga` (
  `id_data_keluarga` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `nama_anggota_keluarga` varchar(150) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `tanggal_nikah` varchar(100) NOT NULL,
  `tanggal_cerai_meninggal` text NOT NULL,
  `tanggal_meninggal` varchar(110) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_kartu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_organisasi`
--

CREATE TABLE `tbl_data_organisasi` (
  `id_organisasi` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pegawai`
--

CREATE TABLE `tbl_data_pegawai` (
  `id_pegawai` int(50) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nip_lama` varchar(100) NOT NULL,
  `no_kartu_pegawai` varchar(100) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `agama` int(11) NOT NULL DEFAULT '1',
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `nomor_kk` varchar(114) NOT NULL,
  `nomor_ktp` varchar(114) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `tanggal_pengangkatan_cpns` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(114) DEFAULT NULL,
  `email` varchar(114) DEFAULT NULL,
  `no_npwp` varchar(75) NOT NULL,
  `kartu_askes_pegawai` varchar(100) NOT NULL,
  `status_pegawai_pangkat` varchar(50) NOT NULL,
  `id_golongan` int(20) DEFAULT NULL,
  `nomor_sk_pangkat` varchar(50) NOT NULL,
  `tanggal_sk_pangkat` varchar(50) NOT NULL,
  `tanggal_mulai_pangkat` varchar(50) NOT NULL,
  `tanggal_selesai_pangkat` varchar(50) NOT NULL,
  `id_status_jabatan` int(20) NOT NULL,
  `id_jabatan` int(20) NOT NULL,
  `id_unit_kerja` int(20) NOT NULL,
  `id_satuan_kerja` int(20) NOT NULL,
  `nomor_sk_jabatan` varchar(50) NOT NULL,
  `tanggal_sk_jabatan` varchar(50) NOT NULL,
  `tanggal_mulai_jabatan` varchar(50) NOT NULL,
  `tanggal_selesai_jabatan` varchar(50) NOT NULL,
  `id_eselon` int(20) NOT NULL,
  `tmt_eselon` varchar(50) NOT NULL,
  `tmt_cpns` varchar(50) NOT NULL,
  `gaji_pokok` varchar(110) NOT NULL,
  `tmt_pns` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'avatar.png',
  `gelar_dpn` varchar(114) DEFAULT NULL,
  `gelar_belakang` varchar(114) DEFAULT NULL,
  `no_rek` varchar(114) NOT NULL DEFAULT 'tidak diisi'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_pegawai`
--

INSERT INTO `tbl_data_pegawai` (`id_pegawai`, `nip`, `nip_lama`, `no_kartu_pegawai`, `nama_pegawai`, `agama`, `tempat_lahir`, `tanggal_lahir`, `nomor_kk`, `nomor_ktp`, `jenis_kelamin`, `usia`, `status_pegawai`, `tanggal_pengangkatan_cpns`, `alamat`, `no_hp`, `email`, `no_npwp`, `kartu_askes_pegawai`, `status_pegawai_pangkat`, `id_golongan`, `nomor_sk_pangkat`, `tanggal_sk_pangkat`, `tanggal_mulai_pangkat`, `tanggal_selesai_pangkat`, `id_status_jabatan`, `id_jabatan`, `id_unit_kerja`, `id_satuan_kerja`, `nomor_sk_jabatan`, `tanggal_sk_jabatan`, `tanggal_mulai_jabatan`, `tanggal_selesai_jabatan`, `id_eselon`, `tmt_eselon`, `tmt_cpns`, `gaji_pokok`, `tmt_pns`, `foto`, `gelar_dpn`, `gelar_belakang`, `no_rek`) VALUES
(1, '19740115 199702 1 002', '', '', 'SAMRIN', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 4, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', 'S.Pd., M.Pd', 'tidak diisi'),
(2, '19660204 199203 1 011', '', '', 'LA ANCE PAULUS', 2, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 5, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '----', '', '--', 'avatar.png', '', 'S.Pd', 'tidak diisi'),
(3, '19721231 200701 1 093', '', '', 'ZAHINUDDIN', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 6, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', 'S.P', 'tidak diisi'),
(4, '19771231 201001 1 053', '', '', 'SARIFUDDIN FANTA', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 6, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', 'S.IP', 'tidak diisi'),
(5, '19760604 201001 1 019', '', '', 'HARJUN HATMA', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 7, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '----', '', '--', 'avatar.png', '', 'SP', 'tidak diisi'),
(6, '19751115 201407 1 001', '', '', 'MUHAMMAD KASIM KAMPO', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 8, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', 'SE', 'tidak diisi'),
(7, '19840713 200701 2 005', '', '', 'ASTUTI AHMAD', 1, '', '', '', '', 'Perempuan', '', '3', '--', '', '', '', '', '', '', 8, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', 'S.Sos', 'tidak diisi'),
(8, '19721206 201212 2 001', '', '', 'SUHARNI', 1, '', '', '', '', 'Perempuan', '', '3', '--', '', '', '', '', '', '', 9, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', '', 'tidak diisi'),
(9, '19851001 201407 1 001', '', '', 'MUHAMMAD SAHRONI', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 9, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', '', 'tidak diisi'),
(10, '19620220 201407 1 001', '', '', 'LA ALIYANA', 1, '', '', '', '', 'Laki-Laki', '', '3', '--', '', '', '', '', '', '', 13, '', '', '', '', 0, 0, 0, 186, '', '', '', '', 0, '', '--', '', '--', 'avatar.png', '', '', 'tidak diisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pelatihan`
--

CREATE TABLE `tbl_data_pelatihan` (
  `id_pelatihan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_master_pelatihan` int(50) NOT NULL,
  `nama_kursus` varchar(114) NOT NULL,
  `lama_kursus` varchar(114) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_sertifikat` varchar(50) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `instansi_penyelenggara` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pendidikan`
--

CREATE TABLE `tbl_data_pendidikan` (
  `id_pendidikan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `tingkat_pendidikan` int(12) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `tempat_sekolah` text NOT NULL,
  `tanggal_lulus` varchar(50) NOT NULL,
  `nomor_ijazah` varchar(114) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_penghargaan`
--

CREATE TABLE `tbl_data_penghargaan` (
  `id_penghargaan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `jenis_penghargaan` varchar(114) NOT NULL,
  `no_keputusan` varchar(114) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_eselon`
--

CREATE TABLE `tbl_data_riwayat_eselon` (
  `id_riwayat_eselon` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `id_jenis_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(114) NOT NULL,
  `nomor_sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_riwayat_eselon`
--

INSERT INTO `tbl_data_riwayat_eselon` (`id_riwayat_eselon`, `id_pegawai`, `id_eselon`, `id_jenis_jabatan`, `nm_jabatan`, `nomor_sk`) VALUES
(1, 5, 29, 1, '', ''),
(2, 2, 27, 1, '', ''),
(3, 6, 29, 1, '', ''),
(4, 1, 26, 1, '', ''),
(5, 4, 28, 1, '', ''),
(6, 3, 28, 1, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_golongan`
--

CREATE TABLE `tbl_data_riwayat_golongan` (
  `id_riwayat_golongan` int(100) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_golongan` int(50) DEFAULT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tanggal_sk` varchar(50) NOT NULL,
  `tmt_golongan` varchar(50) NOT NULL,
  `nomor_bkn` varchar(100) NOT NULL,
  `tanggal_bkn` varchar(50) NOT NULL,
  `masa_kerja` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_riwayat_golongan`
--

INSERT INTO `tbl_data_riwayat_golongan` (`id_riwayat_golongan`, `id_pegawai`, `id_golongan`, `nomor_sk`, `tanggal_sk`, `tmt_golongan`, `nomor_bkn`, `tanggal_bkn`, `masa_kerja`) VALUES
(1, 7, 8, '', '--', '--', '', '--', ''),
(2, 5, 7, '', '----', '----', '', '----', ''),
(3, 10, 13, '', '--', '--', '', '--', ''),
(4, 2, 5, '', '--', '--', '', '--', ''),
(5, 6, 9, '', '--', '--', '', '--', ''),
(6, 9, 9, '', '--', '--', '', '--', ''),
(7, 1, 4, '', '--', '--', '', '--', ''),
(8, 4, 6, '', '----', '----', '', '----', ''),
(9, 8, 9, '', '--', '--', '', '--', ''),
(10, 3, 6, '', '--', '--', '', '--', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_jabatan`
--

CREATE TABLE `tbl_data_riwayat_jabatan` (
  `id_riwayat_jabatan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_jenis_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(114) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `tmt_jabatan_rj` date NOT NULL,
  `tanggal_sk_rj` date NOT NULL,
  `tmt_pelantikan_rj` date DEFAULT NULL,
  `nomor_sk` varchar(114) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_riwayat_jabatan`
--

INSERT INTO `tbl_data_riwayat_jabatan` (`id_riwayat_jabatan`, `id_pegawai`, `id_jenis_jabatan`, `nm_jabatan`, `id_jabatan`, `id_satuan_kerja`, `id_eselon`, `tmt_jabatan_rj`, `tanggal_sk_rj`, `tmt_pelantikan_rj`, `nomor_sk`) VALUES
(1, 5, 1, 'Kasubag Perencanaan dan Keuangan Badan Kepegawaian dan Pengembangan SDM Kabupaten Buton Tengah', 0, 186, 27, '2018-12-12', '2012-12-12', '2017-12-12', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_pangkat`
--

CREATE TABLE `tbl_data_riwayat_pangkat` (
  `id_riwayat_pangkat` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tanggal_sk` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `masa_kerja` varchar(30) NOT NULL,
  `masa_kerja_bulan` int(11) NOT NULL,
  `masa_kerja_tahun` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_riwayat_pangkat`
--

INSERT INTO `tbl_data_riwayat_pangkat` (`id_riwayat_pangkat`, `id_pegawai`, `id_pangkat`, `status`, `nomor_sk`, `tanggal_sk`, `tanggal_mulai`, `tanggal_selesai`, `masa_kerja`, `masa_kerja_bulan`, `masa_kerja_tahun`) VALUES
(2, 5, 7, '', '', '----', '----', '----', '', 0, 0),
(3, 10, 13, '', '', '--', '--', '--', '', 0, 0),
(4, 2, 5, '', '', '--', '--', '--', '', 0, 0),
(5, 6, 8, '', '', '--', '--', '--', '', 0, 0),
(6, 9, 9, '', '', '--', '--', '--', '', 0, 0),
(7, 1, 4, '', '', '--', '--', '--', '', 0, 0),
(8, 4, 6, '', '', '--', '--', '--', '', 0, 0),
(9, 8, 9, '', '', '--', '--', '--', '', 0, 0),
(10, 3, 6, '', '', '--', '--', '--', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_seminar`
--

CREATE TABLE `tbl_data_seminar` (
  `id_seminar` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(34, 'skpd', 'skpd'),
(35, 'honorer', 'honorer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_honorer`
--

CREATE TABLE `tbl_honorer` (
  `id_honorer` int(5) NOT NULL,
  `kode_honorer` varchar(11) DEFAULT NULL,
  `nama` varchar(114) NOT NULL,
  `alamat` varchar(114) NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `id_lokasi_kerja` varchar(50) DEFAULT NULL,
  `tmt` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_honorer`
--

INSERT INTO `tbl_honorer` (`id_honorer`, `kode_honorer`, `nama`, `alamat`, `nomor_sk`, `id_lokasi_kerja`, `tmt`, `no_hp`) VALUES
(27, '0000001', 'ARTHUR', 'BAUBAU', '12345678', '186', '2018-12-12', '085242826445');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info_pt`
--

CREATE TABLE `tbl_info_pt` (
  `id_info_pt` int(11) NOT NULL,
  `nama_info_pt` varchar(114) DEFAULT NULL,
  `alias_pt` varchar(114) DEFAULT NULL,
  `kode_pt` varchar(114) DEFAULT NULL,
  `kontak_1` varchar(50) DEFAULT NULL,
  `kontak_2` varchar(50) DEFAULT NULL,
  `kontak_3` varchar(50) DEFAULT NULL,
  `kontak_4` varchar(114) DEFAULT NULL,
  `header_pt` varchar(114) DEFAULT NULL,
  `alamat_pt` varchar(114) DEFAULT NULL,
  `slogan` varchar(114) DEFAULT NULL,
  `logo_pt` varchar(114) DEFAULT NULL,
  `logo_kecil_pt` varchar(114) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_info_pt`
--

INSERT INTO `tbl_info_pt` (`id_info_pt`, `nama_info_pt`, `alias_pt`, `kode_pt`, `kontak_1`, `kontak_2`, `kontak_3`, `kontak_4`, `header_pt`, `alamat_pt`, `slogan`, `logo_pt`, `logo_kecil_pt`) VALUES
(1, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'SIMPEDA-BERKAH', '000012', '1111-11111-1111', '1111-11111-1111', 'bkpsdm@gmail.com', 'Telp....................../Fax...............Email: bkpsdm@gmail.com', NULL, 'Jl. Gersamata Lakudo', '', 'logo-badan-kepegawaian-dan-pengembangan-sumber-daya-manusia-kabupaten-buton-tengah-20190423-1556033099.png', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jk`
--

CREATE TABLE `tbl_jk` (
  `id_jk` int(11) NOT NULL,
  `kode_jk` varchar(12) NOT NULL,
  `nm_jk` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jk`
--

INSERT INTO `tbl_jk` (`id_jk`, `kode_jk`, `nm_jk`) VALUES
(1, 'l', 'Laki-laki'),
(2, 'p', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login_attempts`
--

CREATE TABLE `tbl_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_agama`
--

CREATE TABLE `tbl_master_agama` (
  `id_agama` int(11) NOT NULL,
  `nm_agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_agama`
--

INSERT INTO `tbl_master_agama` (`id_agama`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha'),
(5, 'Kristen Katolik'),
(6, 'Kristen Portestan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_angkutan`
--

CREATE TABLE `tbl_master_angkutan` (
  `id_angkutan` int(11) NOT NULL,
  `nm_angutan` varchar(114) NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_biaya_harian`
--

CREATE TABLE `tbl_master_biaya_harian` (
  `id_biaya_harian` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_biaya_harian`
--

INSERT INTO `tbl_master_biaya_harian` (`id_biaya_harian`, `id_provinsi`, `id_jabatan`, `biaya`) VALUES
(1, 2, 8, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_biaya_hotel`
--

CREATE TABLE `tbl_master_biaya_hotel` (
  `id_biaya_hotel` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_biaya_hotel`
--

INSERT INTO `tbl_master_biaya_hotel` (`id_biaya_hotel`, `id_provinsi`, `id_jabatan`, `biaya`) VALUES
(1, 2, 8, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_eselon`
--

CREATE TABLE `tbl_master_eselon` (
  `id_eselon` int(50) NOT NULL,
  `nama_eselon` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_eselon`
--

INSERT INTO `tbl_master_eselon` (`id_eselon`, `nama_eselon`, `level`) VALUES
(23, 'I.a', '1'),
(24, 'I.b', '2'),
(25, 'II.a', '3'),
(26, 'II.b', '4'),
(27, 'III.a', '5'),
(28, 'III.b', '6'),
(29, 'IV.a', '7'),
(30, 'IV.b', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_golongan`
--

CREATE TABLE `tbl_master_golongan` (
  `id_golongan` int(50) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_golongan`
--

INSERT INTO `tbl_master_golongan` (`id_golongan`, `golongan`, `uraian`, `level`) VALUES
(10, 'II/d', 'Pengatur Tingkat I', 'd'),
(9, 'III/a', 'Penata Muda', 'a'),
(8, 'III/b', 'Penata Muda Tingkat I', 'b'),
(7, 'III/c', 'Penata', 'c'),
(6, 'III/d', 'Penata Tingkat I', 'd'),
(5, 'IV/a', 'Pembina', 'a'),
(4, 'IV/b', 'Pembina Tingkat I', 'b'),
(3, 'IV/c', 'Pembina Utama Muda', 'c'),
(2, 'IV/d', 'Pembina UtamaMadya', 'd'),
(1, 'IV/e', 'Pembina Utama', 'e'),
(11, 'II/c', 'Pengatur', 'c'),
(12, 'II/b', 'Pengatur Muda Tingkat I', 'b'),
(13, 'II/a', 'Pengatur Muda', 'a'),
(14, 'I/d', 'Juru Tingkat I', 'd'),
(15, 'I/c', 'Juru', 'c'),
(16, 'I/b', 'Juru Muda Tingkat I', 'b'),
(17, 'I/a', 'Juru Muda', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_hukuman`
--

CREATE TABLE `tbl_master_hukuman` (
  `id_hukuman` int(50) NOT NULL,
  `nama_hukuman` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_hukuman`
--

INSERT INTO `tbl_master_hukuman` (`id_hukuman`, `nama_hukuman`) VALUES
(5, 'TEGURAN TERTULIS'),
(6, 'PERNYATAAN TAK PUAS TERTULIS'),
(7, 'PENUNDAAN KGB'),
(8, 'PENUNDAAN Kp'),
(9, 'PENURUNAN PANGKAT'),
(10, 'PEMBEBASAN DARI JABATAN'),
(11, 'PEMBERHENTIAN DENGAN HORMAT TAPS'),
(12, 'PEMBERHENTIAN TIDAK DENGAN HORMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jabatan`
--

CREATE TABLE `tbl_master_jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_jabatan`
--

INSERT INTO `tbl_master_jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(8, 'ESELON II.B, WAKIL KETUA/WAKIL KETUA TP-PKK/DEKRANASDA/BKMT/LASQI', 4),
(7, 'Sekretaris Daerah', 3),
(5, 'Bupati', 1),
(6, 'Wakil Bupati', 2),
(9, 'Eselon III, Tenaga Ahli, Sekretaris PT-PKK/Dekranasda/BKMT/Lasqi/Sekretaris dan Anggota Dharmawanita dan Kepala Desa', 5),
(10, 'Ajudan Bupati, Wakil Bupati dan Ketua DPRD', 6),
(11, 'PNS Gol III', 7),
(12, 'PNS GOl.II/GOl I/Non PNS, Staf Khusus, Perangkat Desa, Perangkat Kelurahan, LPM,BPD dan Tokoh Masyarakat/Adat/Agama', 8),
(13, 'KEPALA BKPSDM', 11),
(14, 'SEKRETARIS BKPSDM', 12),
(15, 'KEPALA BIDANG MUTASI & PENGADAAN', 15),
(16, 'KEPALA BIDANG DIKLAT & PENGEMBANGAN', 16),
(17, 'KASUBAG PERENCANAAN, KEUNGAN DAN PERLENGKAPAN', 17),
(18, 'KASUBBID KEPANGKATAN MUTASI BID.I& PENGADAAN', 20),
(19, 'STAF', 21),
(20, 'BENDAHARA BARANG', 22),
(21, 'BENDAHARA', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jenis_jabatan`
--

CREATE TABLE `tbl_master_jenis_jabatan` (
  `id_jenis_jabatan` int(11) NOT NULL,
  `nama_jenis_jabatan` varchar(114) NOT NULL,
  `kode_jenis_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_jenis_jabatan`
--

INSERT INTO `tbl_master_jenis_jabatan` (`id_jenis_jabatan`, `nama_jenis_jabatan`, `kode_jenis_jabatan`) VALUES
(1, 'Struktural', '1'),
(2, 'Fungsional Umum', '2'),
(3, 'Fungsional Tertentu', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jenis_perjadin`
--

CREATE TABLE `tbl_master_jenis_perjadin` (
  `id_jenis_perjadin` int(11) NOT NULL,
  `jenis_perjadin` varchar(114) NOT NULL,
  `keterangan` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_jenis_perjadin`
--

INSERT INTO `tbl_master_jenis_perjadin` (`id_jenis_perjadin`, `jenis_perjadin`, `keterangan`) VALUES
(1, 'Perjalanan Dinas Dalam Daerah', '1'),
(2, 'Perjalanan Dinas Luar Daerah', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_lokasi_kerja`
--

CREATE TABLE `tbl_master_lokasi_kerja` (
  `id_lokasi_kerja` int(10) NOT NULL,
  `lokasi_kerja` varchar(100) NOT NULL,
  `unit_kerja_induk` varchar(100) DEFAULT NULL,
  `alamat_loker` varchar(114) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_lokasi_kerja`
--

INSERT INTO `tbl_master_lokasi_kerja` (`id_lokasi_kerja`, `lokasi_kerja`, `unit_kerja_induk`, `alamat_loker`) VALUES
(46, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'KABUPATEN BUTON TENGAH', 'Jl. Gersamata No. ……. Labungkari Kec. Lakudo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_lokasi_pelatihan`
--

CREATE TABLE `tbl_master_lokasi_pelatihan` (
  `id_lokasi_pelatihan` int(50) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_lokasi_pelatihan`
--

INSERT INTO `tbl_master_lokasi_pelatihan` (`id_lokasi_pelatihan`, `nama_lokasi`) VALUES
(3, 'BALAI DIKLAT PU WIL I'),
(4, 'BALAI DIKLAT PU WIL II BANDUNG'),
(5, 'BALAI DIKLAT PU WIL III YOGYAKARTA'),
(6, 'BALAI DIKLAT PU WIL IV SURABAYA'),
(7, 'BALAI DIKLAT PU WIL V MAKASAR'),
(8, 'BALAI DIKLAT PU WIL VI JAKARTA'),
(9, 'BALAI DIKLAT PU WIL VII BANJARMASIN'),
(10, 'BALAI DIKLAT PU WIL VIII PALEMBANG'),
(11, 'BALAI DIKLAT PU WIL IX JAYAPURA'),
(12, 'LAN JAKARTA'),
(13, 'LAN SEMARANG'),
(14, 'LAN SURABAYA'),
(15, 'LAN MAKASAR'),
(16, 'LAIN-LAIN'),
(17, 'LOKASI PELATIHAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_mata_anggaran`
--

CREATE TABLE `tbl_master_mata_anggaran` (
  `id_mata_anggaran` int(11) NOT NULL,
  `kode_anggaran` varchar(50) NOT NULL,
  `mata_anggaran` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_mata_anggaran`
--

INSERT INTO `tbl_master_mata_anggaran` (`id_mata_anggaran`, `kode_anggaran`, `mata_anggaran`, `tahun`, `keterangan`) VALUES
(1, '123454', 120000000, 2018, 'ANGGARAN BESAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pangkat`
--

CREATE TABLE `tbl_master_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nm_pangkat` varchar(114) NOT NULL,
  `kode_pangkat` varchar(114) NOT NULL,
  `ket_pangkat` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pangkat`
--

INSERT INTO `tbl_master_pangkat` (`id_pangkat`, `nm_pangkat`, `kode_pangkat`, `ket_pangkat`) VALUES
(1, 'Pembina Utama', 'IV', 'e'),
(2, 'Pembina Utama Madya', 'IV', 'd'),
(3, 'Pembina Utama Muda', 'IV', 'c'),
(4, 'Pembina Tingkat I', 'IV', 'b'),
(5, 'Pembina', 'IV', 'a'),
(6, 'Penata Tingkat I', 'III', 'd'),
(7, 'Penata', 'III', 'c'),
(8, 'Penata Muda Tingkat I', 'III', 'b'),
(9, 'Penata Muda', 'III', 'a'),
(10, 'Pengatur Tingkat I', 'II', 'd'),
(11, 'Pengatur', 'II', 'c'),
(12, 'Pengatur Muda Tingkat I', 'II', 'b'),
(13, 'Pengatur Muda', 'II', 'a'),
(14, 'Juru Tingkat I', 'I', 'd'),
(15, 'Juru', 'I', 'c'),
(16, 'Juru Muda Tingkat I', 'I', 'b'),
(17, 'Juru Muda', 'I', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pelatihan`
--

CREATE TABLE `tbl_master_pelatihan` (
  `id_pelatihan` int(50) NOT NULL,
  `nama_pelatihan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pelatihan`
--

INSERT INTO `tbl_master_pelatihan` (`id_pelatihan`, `nama_pelatihan`, `level`) VALUES
(2, 'SESPA', '2'),
(3, 'SESPASUS', '0'),
(4, 'SESKOAD', '0'),
(5, 'KM-III', '0'),
(6, 'SEPADYA', '3'),
(7, 'KM-IV', '0'),
(8, 'SEPALA', '4'),
(9, 'SEPADA', '0'),
(10, 'SESPUT', '0'),
(11, 'TARPADNAS', '0'),
(12, 'UJIAN DINAS TK I', '0'),
(13, 'UJIAN DINAS TK II', '0'),
(14, 'UJIAN DINAS TK III', '0'),
(15, 'SPATI', '1'),
(16, 'SPAMEN (DIKLATPIM TK.II)', '2'),
(17, 'SPAMA (DIKLATPIM TK.III)', '3'),
(18, 'ADUM (DIKLATPIM TK.IV)', '4'),
(19, 'EVALUASI & PELAPORAN', '0'),
(20, 'PENATARAN P4', '0'),
(21, 'ADMINISTRASI & KEUANGAN', '0'),
(22, 'ANALISA JABATAN', '0'),
(23, 'MATERIAL MANAGEMENT', '0'),
(24, 'NETWORK PLANNING', '0'),
(25, 'PENATARAN ATLAS', '0'),
(26, 'PENGAWASAN MELEKAT', '0'),
(27, 'P.T.K.', '0'),
(28, 'PROCUREMENT', '0'),
(29, 'MANAGEMENT PROYEK', '0'),
(30, 'SCREENING', '0'),
(31, 'PUBLIC ADMINISTRATION', '0'),
(32, 'ADMINISTRASI KEPEGAWAIAN', '0'),
(33, 'ADMINISTRASI PERKANTORAN', '0'),
(34, 'AKUNTANSI', '0'),
(35, 'ADMINISTRASI TEKNIS', '0'),
(36, 'ASPAL BETON', '0'),
(37, 'BAHASA INGGRIS', '0'),
(38, 'BENDAHARAWAN', '0'),
(39, 'BENDAHARAWAN', '0'),
(40, 'BREVET', '0'),
(41, 'BREVET A', '0'),
(42, 'BREVET B', '0'),
(43, 'BREVET C', '0'),
(44, 'DRAFTER REPRODUKSI GRAFIKA', '0'),
(45, 'DRAINASE', '0'),
(46, 'DRIVER', '0'),
(47, 'E & P', '0'),
(48, 'E & P IRIGASI', '0'),
(49, 'ENGINEERING & MANAGEMENT', '0'),
(50, 'GAMBAR', '0'),
(51, 'GROUND WATER MONITORING PROCEDURE', '0'),
(52, 'HIDROMETRI', '0'),
(53, 'INSTRUKTUR DIKLAT KEPENDUDUKAN', '0'),
(54, 'INSTRUKTUR MEKANIK', '0'),
(55, 'INSTRUKTUR MEKANIK & PERALATAN', '0'),
(56, 'INSTRUKTUR OPERATOR', '0'),
(57, 'INSTRUKTUR OPERATOR PERALATAN', '0'),
(58, 'INTERPRET FOTO UDARA', '0'),
(59, 'INVENTARISASI BARANG', '0'),
(60, 'IRIGASI SEDERHANA', '0'),
(61, 'JURU AIR', '0'),
(62, 'JURU UKUR', '0'),
(63, 'KADER TEKNIK TK C (OPSETER)', '0'),
(64, 'KEARSIPAN', '0'),
(65, 'KEINSTRUKTURAN', '0'),
(66, 'KOMPUTER', '0'),
(67, 'KEPROTOKOLAN', '0'),
(68, 'KESELAMATAN & KESEHATAN KERJA', '0'),
(69, 'KETERTIBAN & KEAMANAN', '0'),
(70, 'KOMPUTER BASIC', '0'),
(71, 'KOMPUTER FORTRAN', '0'),
(72, 'KOMPUTER INTRODUCTION', '0'),
(73, 'KOMPUTER PROGRAMMING', '0'),
(74, 'MANAGEMENT LOGISTIK', '0'),
(75, 'MANDOR/FOREMAN', '0'),
(76, 'MEKANIK', '0'),
(77, 'MEKANIK LAPANGAN', '0'),
(78, 'MEKANIK LISTRIK', '0'),
(79, 'MEKANIK UMUM', '0'),
(80, 'OPERATION RESEARCH', '0'),
(81, 'OPERATOR KOMPUTER', '0'),
(82, 'OPERATOR MEKANIK', '0'),
(83, 'PADAT KARYA GAYA BARU', '0'),
(84, 'PEJABAT INTI PROYEK', '0'),
(85, 'PEMADAM KEBAKARAN', '0'),
(86, 'PEMASANGAN BATA & PELESTERAN', '0'),
(87, 'PEMBINAAN HUKUM', '0'),
(88, 'PEMIMPIN PROYEK JALAN (PPJ)', '0'),
(89, 'PENGAMAT BID PENGAIRAN', '0'),
(90, 'PENGAWASAN BANGUNAN', '0'),
(91, 'PENGETAHUAN BARANG', '0'),
(92, 'PENGGUNAAN MESIN TIK IBM', '0'),
(93, 'PENINGKATAN PENGEMUDI', '0'),
(94, 'PENYIMPANAN & PENYALURAN', '0'),
(95, 'IKMN', '0'),
(96, 'PENYUSUNAN ANGGARAN', '0'),
(97, 'PERENC DETAIL KOTA', '0'),
(98, 'PERENC SOSIAL PENGEMBANGAN AREA', '0'),
(99, 'PERENC SOSIAL PENGEMBANGAN KOTA', '0'),
(100, 'PERINTIS PERBAIKAN PERUMAHAN KOTA', '0'),
(101, 'PRATUGAS BID BINA MARGA', '0'),
(102, 'PRATUGAS BID CIPTA KARYA', '0'),
(103, 'PRATUGAS BID PENGAIRAN', '0'),
(104, 'PRATUGAS PENGAWASAN', '0'),
(105, 'PRATUGAS PERENCANAAN', '0'),
(106, 'PROFFESIONAL STAFF', '0'),
(107, 'PROG PENGAWASAN TATA PENGAIRAN', '0'),
(108, 'PROG TEKNIK MENGGAMBAR', '0'),
(109, 'QUALITY CONTROL', '0'),
(110, 'SATPAM', '0'),
(111, 'SEISMOLOGI & TEKNOLOGI GEMPA', '0'),
(112, 'SINDER BID BM', '0'),
(113, 'SISTEM AKUNTANSI', '0'),
(114, 'SURVEY & MAPPING', '0'),
(115, 'TATA KEARSIPAN', '0'),
(116, 'TEKNIS PADAT KARYA GAYA BARU', '0'),
(117, 'TEKNOLOGI BETON', '0'),
(118, 'TEKNOLOGI GEMPA', '0'),
(119, 'TENAGA INTI', '0'),
(120, 'TENAGA PELAKSANA PEMBANGUNAN PERUMAHAN RAKYAT', '0'),
(121, 'UKUR TANAH', '0'),
(122, 'VERIFIKASI', '0'),
(123, 'UKUR TANAH & PEMETAAN', '0'),
(124, 'UKUR TANAH BID KE-AIR-AN', '0'),
(125, 'UKUR TANAH BID KE-BM-AN', '0'),
(126, 'UKUR TANAH BID KE-CK-AN', '0'),
(127, 'UKUR TANAH TK A/B', '0'),
(128, 'HYDROLOGY', '0'),
(129, 'LAND CAPABILITY EVALUATION', '0'),
(130, 'PLANNING & DESIGN', '0'),
(131, 'DESIGN OF SMALL HYDRAULIC STRUCTURES', '0'),
(132, 'IRRIGATION AND DRAINAGE LAYOUT', '0'),
(133, 'OVERVIEW OF PROJECT SELECTION THROUGH TH', '0'),
(134, 'REVIEW OF SSIMP STRUCTURE DESIGNS', '0'),
(135, 'MATHEMATICAL MODEL SIMULATION', '0'),
(136, 'SITE SELECTION-GROUND WATER', '0'),
(137, 'PENGAWASAN & PELAKSANAAN KONSTRUKSI', '0'),
(138, 'CONSTRUCTION SUPERVISION', '0'),
(139, 'WELL DESIGN & WELL CONSTRUCTION', '0'),
(140, 'CONSTRUCTION SUPERVISION TRAINING', '0'),
(141, 'LAB. TECHNICIAN TRAINING', '0'),
(142, 'KERJASAMA TEKNIK ANTAR NEGARA BERKEMBANG', '0'),
(143, 'INSTITUTIONAL DEVELOPMENT', '0'),
(144, 'WOMEN IN DEVELOPMENT', '0'),
(145, 'IRIGASI TAMBAK', '0'),
(146, 'O & M - AIR TANAH', '0'),
(147, 'O & M - IRIGASI', '0'),
(148, 'OPERATION & MAINTENANCE', '0'),
(149, 'WATER OPERATION CENTRE', '0'),
(150, 'OPERATION-ADVANCED OPERATION PROJECT', '0'),
(151, 'OPERATION-BUDGETTING', '0'),
(152, 'OPERATION-INTRODUCTION & MAINTENANCE', '0'),
(153, 'OPERATION-REQUIREMENT & MAINTENANCE', '0'),
(154, 'OPERATION-WATER DISTRIBUTION', '0'),
(155, 'INFORMATION FILM', '0'),
(156, 'KEY FARMERS', '0'),
(157, 'TRAINING IN FARM MACHINERY - OPERATORS', '0'),
(158, 'TRAINING OF ACTION GROUP', '0'),
(159, 'TRAINING OF FIELD GROUPS', '0'),
(160, 'WATER USE MANAGEMENT', '0'),
(161, 'INVENTARISASI LAPANGAN', '0'),
(162, 'PENELITIAN PENGAIRAN (PTGA)', '0'),
(163, 'PENGEMBANGAN POLA SOCIO-TECHNICAL ASSOSI', '0'),
(164, 'AGRICULTURAL DEVELOPMENT', '0'),
(165, 'ENUMERATOR TRAINING', '0'),
(166, 'TRAINING OF SURVEYORS', '0'),
(167, 'AGRO-ECONOMIC ANALYSIS', '0'),
(168, 'TEKNIK PANTAI', '0'),
(169, 'COASTAL ZONE MANAGEMENT', '0'),
(170, 'O & M - RAWA', '0'),
(171, 'KEAMANAN BENDUNGAN', '0'),
(172, 'OVERVIEW OF DAM DESIGN AND CONSTRUCTION', '0'),
(173, 'PERENCANAAN & PEMBUATAN PROGRAM', '0'),
(174, 'MANAJEMEN LALU LINTAS', '0'),
(175, 'KEAMANAN JALAN', '0'),
(176, 'KEBISINGAN LALULINTAS', '0'),
(177, 'KESELAMATAN JALAN RAYA', '0'),
(178, 'PENCEMARAN UDARA', '0'),
(179, 'PARKIR', '0'),
(180, 'PENAKSIRAN CEPAT PERGERAKAN DIPERKOTAAN', '0'),
(181, 'TANAH LEMBEK', '0'),
(182, 'PENINGKATAN KEMAMPUAN TEKNISI LABORATORIUM', '0'),
(183, 'PENGENDALIAN MUTU JALAN & JEMBATAN', '0'),
(184, 'PELAKSANAAN PEKERJAAN KONSTRUKSI JALAN', '0'),
(185, 'PELAKSANAAN PERCOBAAN PENGHAMPARAN ASPAL', '0'),
(186, 'PENANGGULANGAN EROSI LERENG JALAN', '0'),
(187, 'PENGAWAS PELAKSANA KONSTRUKSI JALAN', '0'),
(188, 'OPERATOR PERALATAN JALAN', '0'),
(189, 'PENANGANAN & PERAWATAN ALAT-ALAT KONSTR.', '0'),
(190, 'DRIVING/RIDING TRAINING', '0'),
(191, 'LEGGER JALAN', '0'),
(192, 'TATA CARA PENULISAN LAPORAN', '0'),
(193, 'PEMASYARAKATAN PRODUK HASIL PUSLITBANG', '0'),
(194, 'KOMPUTERISASI INVENTARISASI BAHAN JALAN', '0'),
(195, 'INTEGRASI KOMPUTERISASI LEGER JALAN', '0'),
(196, 'MODEL PROJECT-SEMINAR', '0'),
(197, 'METODOLOGI PENELITIAN', '0'),
(198, 'PENGGUNAAN ALAT FWD', '0'),
(199, 'PENGGUNAAN X-RAY FLOURESCENE', '0'),
(200, 'DAUR ULANG KONSTRUKSI PEKERJAAN JALAN', '0'),
(201, 'PENYEMPURNAAN STANDAR SPESIFIKASI ASPAL', '0'),
(202, 'PEMELIHARAAN RUTIN DAN BERKALA', '0'),
(203, 'PENDATAAN JALAN', '0'),
(204, 'HASIL PENELITIAN ASPAL KARET DILAPANGAN', '0'),
(205, 'DESAIN JEMBATAN', '0'),
(206, 'PERENCANAAN DAN PEMROGRAMAN JEMBATAN', '0'),
(207, 'PROSEDUR UMUM', '0'),
(208, 'GENERAL HIGHWAY COURSE', '0'),
(209, 'BRIDGE PLANNING & PROGRAMMING INSTRUCTOR', '0'),
(210, 'PLANNING & PROGRAMMING WORKSHOP', '0'),
(211, 'KONSTRUKSI EKSPANSION JOINT', '0'),
(212, 'INSPEKSI KONDISI JEMBATAN', '0'),
(213, 'PENGAWASAN PEMBANGUNAN JEMBATAN', '0'),
(214, 'KONSULTAN P3KT', '0'),
(215, 'PERKUATAN JEMBATAN', '0'),
(216, 'BRIDGE ROUTINE INSPECTION', '0'),
(217, 'BRIDGE CONSTRUCTION SUPERVISION', '0'),
(218, 'PEMELIHARAAN JEMBATAN', '0'),
(219, 'PEMELIHARAAN RUTIN & BERKALA JALAN KOTA', '0'),
(220, 'PENATAAN UNTUK TROUBLE SHOOTER', '0'),
(221, 'DESIMINASI KETATABANGUNAN', '0'),
(222, 'PENGELOLAAN & PEMANFAATAN GEDUNG NEGARA', '0'),
(223, 'KEPALA SEKSI BID.PERSAMPAHAN', '0'),
(224, 'TEKNOLOGI BANGUNAN BID PEMUKIMAN', '0'),
(225, 'LAB. BIDANG PENGUJIAN', '0'),
(226, 'MANAJEMEN PEMBANGUANAN KOTA DE', '0'),
(227, 'PEMANTAPAN MATERI TEKNIS PELATIHAN', '0'),
(228, 'PENATAAN RUANG DAERAH', '0'),
(229, 'PENATAAN RUANG', '0'),
(230, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(231, 'PENATAAN RUANG TERBUKA UMUM', '0'),
(232, 'PENGEMBANGAN PROFESI PERENCANA', '0'),
(233, 'PENYIAPAN PROGRAM P3KT', '0'),
(234, 'MANAJEMEN KAWASAN PERKOTAAN', '0'),
(235, 'PENINGKATAN KEMAMPUAN TENAGA PENATAAN', '0'),
(236, 'PENATAAN RUANG KAWASAN PARIWISATA', '0'),
(237, 'LOKAKARYA P3KT BAGI STAF PROFESIONAL', '0'),
(238, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(239, 'PENATAAN RUANG KOTA BARU', '0'),
(240, 'PRE COURSE IUDM', '0'),
(241, 'SISTIM INFORMASI GEOGRAFI', '0'),
(242, 'DESAIN JALAN/JEMBATAN', '0'),
(243, 'TRAINING TEHNIK KOMUNIKASI', '0'),
(244, 'COMUNICATION SAMS', '0'),
(245, 'TATA KEARSIPAN DAN PERSURATAN', '0'),
(246, 'TATALAKSANA ADMINISTRASI', '0'),
(247, 'KESEKRETARIATAN', '0'),
(248, 'PENGELOLAAN ARSIP AKTIF', '0'),
(249, 'PENYEGARAN SATPAM', '0'),
(250, 'MANAJEMEN PERKANTORAN', '0'),
(251, 'INFORMASI & KOMUNIKASI', '0'),
(252, 'KEHUMASAN', '0'),
(253, 'OPERATOR TELEX', '0'),
(254, 'PENINGKATAN KEMAMPUAN BAHASA INGGRIS', '0'),
(255, 'DHARMA WANITA CONVERSATION CLASS', '0'),
(256, 'ENGLISH FOR INKINDO ENGINEERS', '0'),
(257, 'ENGLISH FOR INTERNATIONAL COOPERATION', '0'),
(258, 'ENGLISH LEVEL II', '0'),
(259, 'ENGLISH LEVEL III', '0'),
(260, 'KETERAMPILAN PEGAWAI/ BAHASA INGGRIS', '0'),
(261, 'BPBLAV', '0'),
(262, 'TRAINING OF TRAINERS', '0'),
(263, 'TEKNIK KEINSTRUKTURAN', '0'),
(264, 'INSTRUKTUR', '0'),
(265, 'TEKNIK INSTRUKSIONAL I', '0'),
(266, 'TOT FOR ENGLISH TEACHERS', '0'),
(267, 'PENGEMBANGAN KURIKULUM DAN MEDIA', '0'),
(268, 'CURRICULUM DEVELOPMENT', '0'),
(269, 'AUDIO VISUAL', '0'),
(270, 'MANAJEMEN PELATIHAN', '0'),
(271, 'INDONESIA TRAINING NETWORK (INTN)', '0'),
(272, 'PENYEGARAN PEDIKPROP', '0'),
(273, 'MONITORING DAN EVALUASI DIKLAT', '0'),
(274, 'MANAJEMEN DIKLAT', '0'),
(275, 'RENCANA DIKLAT DAERAH', '0'),
(276, 'MANAJEMEN KOMPUTER', '0'),
(277, 'PERPUSTAKAAN', '0'),
(278, 'MANAGEMENT INFORMATION SYSTEMS', '0'),
(279, 'PENGINDRAAN JAUH & SIST INFO GEOGRAFI', '0'),
(280, 'BENDAHARAWAN PENERIMA', '0'),
(281, 'MANAJEMEN KEUANGAN', '0'),
(282, 'TATA USAHA ADMINISTRASI KEUANGAN', '0'),
(283, 'PEMBUKUAN & PENYUSUNAN LAPORAN KEUANGAN', '0'),
(284, 'FINANCIAL MANAGEMENT', '0'),
(285, 'CARA PENGADAAN KONSULTAN', '0'),
(286, 'PENGADAAN JASA KONSTRUKSI', '0'),
(287, 'PENGADAAN BARANG DAN JASA KONSULTAN', '0'),
(288, 'BIMBINGAN TEKNIS IKMN', '0'),
(289, 'MANAJEMEN PERALATAN', '0'),
(290, 'PENGADAAN BARANG', '0'),
(291, 'MANAJEMEN AUDIT', '0'),
(292, 'ADMINISTRASI BANTUAN LUAR NEGERI', '0'),
(293, 'ABLN', '0'),
(294, 'PENYULUHAN ADM. PINJAMAN LUAR NEGERI', '0'),
(295, 'MANAGEMENT DEVELOPMENT', '0'),
(296, 'PERENCANAAN TENAGA KERJA', '0'),
(297, 'PSYKOLOGI TERAPAN', '0'),
(298, 'SISTEM PENILAIAN PERFORMANCE PEGAWAI', '0'),
(299, 'SIST PEMBGN. KARIER & PENGKAJIAN KINERJA', '0'),
(300, 'KESEHATAN DAN KESELAMATAN KERJA', '0'),
(301, 'MANPOWER PLANNING INFORMATION SYSTEM', '0'),
(302, 'COORDINATION OF PLANNING & PROGRAMMING', '0'),
(303, 'MANAJEMEN PROYEK', '0'),
(304, 'PEMIMPIN PROYEK FISIK/P3F', '0'),
(305, 'TECHNICAL ASPECTS OF PROJECT MANAGEMENT', '0'),
(306, 'MANAJEMEN SKILL DAN DINAMIKA KELOMPOK', '0'),
(307, 'PRAJABATAN UMUM TINGKAT I', '0'),
(308, 'PRAJABATAN UMUM TINGKAT II', '0'),
(309, 'ASPEK HUKUM', '0'),
(310, 'PRAJABATAN UMUM TINGKAT III', '0'),
(311, 'TATA CARA PEMAKAIAN STANDAR BIDANG PU', '0'),
(312, 'INFORMASI TENTANG PTUN', '0'),
(313, 'HUKUM PERBURUHAN', '0'),
(314, 'PENERAPAN HUKUM & PERUNDANG-UNDANGAN', '0'),
(315, 'KOLOKIUM HASIL PENELITIAN & PENGEMBANGAN', '0'),
(316, 'PERENCANAAN PENANGGULANGAN BENCANA ALAM', '0'),
(317, 'PREPARATION OF TENDER DOCUMENTS', '0'),
(318, 'PROSEDUR TENDER', '0'),
(319, 'GAMBAR & ANGGARAN', '0'),
(320, 'GRAFIKA', '0'),
(321, 'TEKNIK GAMBAR & ANGGARAN', '0'),
(322, 'INSTRUKTUR WORKSHOP P3KT', '0'),
(323, 'ASISTEN TEKNISI LABORATORIUM', '0'),
(324, 'TEKNISI LABORATORIUM & REKAYASA', '0'),
(325, 'PENGAWAS LAPANGAN', '0'),
(326, 'TRAINING JOB SITE (OECF)', '0'),
(327, 'VALUE CONTROL', '0'),
(328, 'QUALITY SURVEYOR', '0'),
(329, 'SUPERVISI KONSTRUKSI', '0'),
(330, 'KETERAMPILAN MEKANIK', '0'),
(331, 'KETERAMPILAN OPERATOR', '0'),
(332, 'KETERAMPILAN OPERATOR DUMP TRUCK', '0'),
(333, 'MEKANIK DASAR', '0'),
(334, 'SIMKA', '0'),
(335, 'PENINGKATAN MEKANIK OPERATOR BUMAR WHEEL', '0'),
(336, 'PENINGKATAN MEKANIK STONE CRUSHER', '0'),
(337, 'BAHAN BANGUNAN DAN LABORATORIUM', '0'),
(338, 'PENINGKATAN LABORATORIUM', '0'),
(339, 'PENGUJIAN BAHAN (LABORATORIUM)', '0'),
(340, 'PENANGGULANGAN PENDERITA GAWAT DARURAT', '0'),
(341, 'PAKET STATISTIK', '0'),
(342, 'PENCEGAHAN BAHAYA KEBAKARAN', '0'),
(343, 'ANALISA DAMPAK LINGKUNGAN', '0'),
(344, 'STONE COLOUMN SEBAGAI REDUKSI PENURUNAN', '0'),
(345, 'SIMD UNTUK MANAJER', '0'),
(346, 'SIMD UNTUK OPERATOR', '0'),
(347, 'TRAINING LABORAN', '0'),
(348, 'FUNGSI PENGT.BID.KE-PU-AN', '0'),
(349, 'PENINGK.FUNGSI.PENGAT.BID.KE-PU-AN', '0'),
(350, 'PENGEMBANGAN SISTEM PERENC & KARIER', '0'),
(351, 'BIMBINGAN TEKNIK HUKUM', '0'),
(352, 'TEKNIK PELAKS. PROG. BUDAYA KERJA', '0'),
(353, 'TEKNIK PENYUSUNAN PEDOMAN KERJA', '0'),
(354, 'PEMBINAAN TEKNIS PASCA GEMPA', '0'),
(355, 'PENANGANAN TEKNIS BID.PERSAMPAHAN', '0'),
(356, 'APPLIED ENGINEERING', '0'),
(357, 'TEKNIS PENGT. PENATAAN BANGUNAN', '0'),
(358, 'TEKNIS PENGELOLAAN ADM. LAN', '0'),
(359, 'SINKRONISASI PERENCANAAN DAN PROGRAM', '0'),
(360, 'DESIMINASI TATACARA APLK.KEU.PROYEK', '0'),
(361, 'PENGELOLAAN ADMINISTRASI PROYEK', '0'),
(362, 'MANAJEMEN KONSTRUKSI PENGAIRAN', '0'),
(363, 'INSTRUKTUR TATAGUNA AIR', '0'),
(364, 'PENGAWAS UTAMA', '0'),
(365, 'PROGRAM D.III DALAM NAGERI', '0'),
(366, 'PROGRAM D.IV', '0'),
(367, 'PROGRAM S1 DALAM NEGERI', '0'),
(368, 'PROGRAM S2 DALAM NEGERI', '0'),
(369, 'PROGRAM S3 DALAM NEGERI', '0'),
(370, 'SIM KLN', '0'),
(371, 'PEMERIKSAAN PROGRAM/KOMPREHENSHIF', '0'),
(372, 'STANDARD PENGADAAN BARANG DAN JASA', '0'),
(373, 'PENINGK.FUNGSI PEL.TUGAS BID.KE-PU-AN', '0'),
(374, 'DASAR KEARSIPAN', '0'),
(375, 'MANAJEMEN PERPUSTAKAAN', '0'),
(376, 'APRESIASI PUSDOKINFO', '0'),
(377, 'OVERSEAS TRAINING LUAR NEGERI', '0'),
(378, 'ELECTRICAL INSTALLATION & INSTRUMENT', '0'),
(379, 'WATER SUPPLY MASTER PLANNING', '0'),
(380, 'WATER SUPPLY MANAGEMENT', '0'),
(381, 'WATER TREATMENT FACILITY PLAN & DESIGN', '0'),
(382, 'DISTRIBUTION SYSTEM PLANNING & DESIGN', '0'),
(383, 'WATER PURIFICATION', '0'),
(384, 'MAINTENANCE OF PIPELINE', '0'),
(385, 'LEAKAGE CONTROL', '0'),
(386, 'PENINGKATAN KOORDINASI PERENCANAAN', '0'),
(387, 'SINKRONISASI PROGRAM', '0'),
(388, 'AIR LIMBAH', '0'),
(389, 'MECHANICAL INSTALLATION', '0'),
(390, 'BIDANG PERSAMPAHAN', '0'),
(391, 'ORGANISASI & MANAJEMEN', '0'),
(392, 'PERSYARATAN JABATAN', '0'),
(393, 'TEKNIS KEPEGAWAIAN', '0'),
(394, '-', '-'),
(395, 'TESTING', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pendidikan`
--

CREATE TABLE `tbl_master_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pendidikan`
--

INSERT INTO `tbl_master_pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SD/MI'),
(2, 'SMP/Mts'),
(3, 'SMA/MA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_penghargaan`
--

CREATE TABLE `tbl_master_penghargaan` (
  `id_penghargaan` int(50) NOT NULL,
  `nama_penghargaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_penghargaan`
--

INSERT INTO `tbl_master_penghargaan` (`id_penghargaan`, `nama_penghargaan`) VALUES
(1, 'BINTANG BINTANG DI LANGIT'),
(2, 'BINTANG REPUBLIK INDONESIA ADIPURNA'),
(3, 'BINTANG REPUBLIK INDONESIA ADIPRADANA'),
(4, 'BINTANG REPUBLIK INDONESIA UTAMA'),
(5, 'BINTANG REPUBLIK INDONESIA PRATAMA'),
(6, 'BINTANG REPUBLIK INDONESIA NARARYA'),
(7, 'BINTANG MAHAPUTERA'),
(8, 'BINTANG MAHAPUTERA ADIPURNA'),
(9, 'BINTANG MAHAPUTERA ADIPRADANA'),
(10, 'BINTANG MAHAPUTERA UTAMA'),
(11, 'BINTANG MAHAPUTERA PRATAMA'),
(12, 'BINTANG MAHAPUTERA NARARYA'),
(13, 'BINTANG JASA'),
(14, 'BINTANG JASA UTAMA'),
(15, 'BINTANG JASA PRATAMA'),
(16, 'BINTANG JASA NARARYA'),
(17, 'BINTANG YUDHA DHARMA'),
(18, 'BINTANG YUDHA DHARMA UTAMA'),
(19, 'BINTANG YUDHA DHARMA PRATAMA'),
(20, 'BINTANG YUDHA DHARMA NARARYA'),
(21, 'BINTANG KARTIKA EKA PAKSI'),
(22, 'BINTANG KARTIKA EKA PAKSI UTAMA'),
(23, 'BINTANG KARTIKA EKA PAKSI PRATAMA'),
(24, 'BINTANG KARTIKA EKA PAKSI NARARYA'),
(25, 'BINTANG JALASENA'),
(26, 'BINTANG JALASENA UTAMA'),
(27, 'BINTANG JALASENA PRATAMA'),
(28, 'BINTANG JALASENA NARARYA'),
(29, 'BINTANG SWA BHUWANA PAKSA'),
(30, 'BINTANG SWA BHUWANA PAKSA UTAMA'),
(31, 'BINTANG SWA BHUWANA PAKSA PRATAMA'),
(32, 'BINTANG SWA BHUWANA PAKSA NARARYA'),
(33, 'BINTANG BHAYANGKARA'),
(34, 'BINTANG BHAYANGKARA UTAMA'),
(35, 'BINTANG BHAYANGKARA PRATAMA'),
(36, 'BINTANG BHAYANGKARA NARARYA'),
(37, 'BINTANG GARUDA'),
(38, 'BINTANG SEWINDU ANGKATAN PERANG RI'),
(39, 'SATYALANCANA BHAKTI'),
(40, 'SATYALANCANA TELADAN'),
(41, 'SATYALANCANA KESETIAAN'),
(42, 'SATYALANCANA KESETIAAN 8 TAHUN'),
(43, 'SATYALANCANA KESETIAAN 16 TAHUN'),
(44, 'SATYALANCANA KESETIAAN 24 TAHUN'),
(45, 'SATYALANCANA PERANG KEMERDEKAAN'),
(46, 'SATYALANCANA PERANG KEMERDEKAAN KELAS I'),
(47, 'SATYALANCANA PERANG KEMERDEKAAN KELAS II'),
(48, 'SATYALANCANA SAPTAMARGA'),
(49, 'SATYALANCANA GOM'),
(50, 'SATYALANCANA GOM KELAS I'),
(51, 'SATYALANCANA GOM KELAS II'),
(52, 'SATYALANCANA GOM KELAS III'),
(53, 'SATYALANCANA GOM KELAS IV'),
(54, 'SATYALANCANA GOM KELAS V'),
(55, 'SATYALANCANA GOM KELAS VI'),
(56, 'SATYALANCANA GOM KELAS VII'),
(57, 'SATYALANCANA GOM KELAS VIII'),
(58, 'SATYALANCANA GOM KELAS IX'),
(59, 'SATYALANCANA PERINTIS PERGERAKAN KEMERDEKAAN'),
(60, 'SATYALANCANA PERINGATAN PERJUANGAN KEMERDEKAAN'),
(61, 'SATYALANCANA PEMBANGUNAN'),
(62, 'SATYALANCANA KARYA SATYA'),
(63, 'SATYALANCANA KARYA SATYA KELAS I'),
(64, 'SATYALANCANA KARYA SATYA KELAS II'),
(65, 'SATYALANCANA KARYA SATYA KELAS III'),
(66, 'SATYALANCANA KARYA SATYA KELAS IV'),
(67, 'SATYALANCANA KARYA SATYA KELAS V'),
(68, 'SATYALANCANA KARYA SATYA XXX TAHUN'),
(69, 'SATYALANCANA KARYA SATYA XX TAHUN'),
(70, 'SATYALANCANA KARYA SATYA X TAHUN'),
(71, 'SATYALANCANA KEBAKTIAN SOSIAL'),
(72, 'SATYALANCANA KEBUDAYAAN'),
(73, 'SATYALANCANA JASA DHARMA ANGKATAN LAUT'),
(74, 'SATYALANCANA SATYA DASA WARSA POLRI'),
(75, 'SATYALANCANA JANA UTAMA'),
(76, 'SATYALANCANA KSATRYA TAMTAMA'),
(77, 'SATYALANCANA KARYA BHAKTI'),
(78, 'SATYALANCANA PRASETYA PANCA WARSA'),
(79, 'SATYALANCANA KEAMANAN'),
(80, 'SATYALANCANA WIRA KARYA'),
(81, 'SATYALANCANA SATYA DHARMA'),
(82, 'SATYALANCANA WIRA DHARMA'),
(83, 'SATYALANCANA YUDHA UTAMA KKO-AL'),
(84, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS I'),
(85, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS II'),
(86, 'SATYALANCANA DWIYA SISTHA'),
(87, 'SATYALANCANA PENEGAK'),
(88, 'SATYALANCANA PEPERA'),
(89, 'PIAGAM SATYA KARYA'),
(90, 'PIAGAM SATYA KARYA 20 TAHUN'),
(91, 'PIAGAM SATYA KARYA 30 TAHUN'),
(92, 'PIAGAM PENGHARGAAN ATAS JASA KHUSUS TEK.KEKARYAAN'),
(93, 'PIAGAM PENGHARGAAN TELADAN'),
(94, 'PIAGAM PENGHARGAAN TELADAN KEPEMIMPINAN'),
(95, 'PIAGAM PENGHARGAAN TELADAN KEPEGAWAIAN'),
(96, 'PIAGAM PENGHARGAAN TELADAN PELAK. TUGAS'),
(97, 'PIAGAM PENGHARGAAN ANUMERTA'),
(98, 'PIAGAM PENGHARGAAN KHUSUS'),
(99, 'SATYALANCANA SANTI DHARMA'),
(100, 'SATYALANCANA SEROJA'),
(101, 'SATYALANCANA PENDIDIKAN'),
(102, 'NUGRAHA SAKANTI JANA UTAMA'),
(103, 'NUGRAHA SAKANTI KSATRYA TAMTAMA'),
(104, 'NUGRAHA SAKANTI KARYA BHAKTI'),
(105, 'SAM KARYA NUGRAHA'),
(106, 'PRASAMYA PURNAKARYA NUGRAHA'),
(107, 'BINTANG SAKTI'),
(108, 'BINTANG DHARMA'),
(109, 'BINTANG GERILYA'),
(110, 'BINTANG BUDAYA PARAMA DHARMA'),
(111, 'SATYALANCANA PERISTIWA'),
(112, 'LAIN-LAIN'),
(113, '-'),
(114, 'PENGHARGAAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pengikut`
--

CREATE TABLE `tbl_master_pengikut` (
  `id_pengikut` int(11) NOT NULL,
  `id_sppd` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `lvl` varchar(10) NOT NULL DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pengikut`
--

INSERT INTO `tbl_master_pengikut` (`id_pengikut`, `id_sppd`, `id_pegawai`, `lvl`) VALUES
(2, 8, 39, 'pegawai'),
(3, 8, 5, 'honorer'),
(4, 5, 5, 'honorer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_ppk`
--

CREATE TABLE `tbl_master_ppk` (
  `id_ppk` int(50) NOT NULL,
  `nama_ppk` varchar(150) NOT NULL,
  `parent_satuan_kerja` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_ppk`
--

INSERT INTO `tbl_master_ppk` (`id_ppk`, `nama_ppk`, `parent_satuan_kerja`) VALUES
(32, 'PPK Pelaksanaan Jalan Bebas Hambatan Medan - Kuala Namu', 'PELAKSANAAN JALAN BEBAS HAMBATAN MEDAN - KUALANAMU'),
(33, 'PPK Perencanaan dan Pengawasan Jalan Bebas Hambatan Medan-Kuala Namu', 'PELAKSANAAN JALAN BEBAS HAMBATAN MEDAN - KUALANAMU'),
(34, 'PPK1 (Bts. Sumut - Simpang Kulim)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(35, 'PPK 2 (Simpang Batam - Dumai)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(36, 'PPK 3 (Simpang Palas - Pekanbaru)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(37, 'PPK 4 (Jalan Subrantas Pekanbaru - Rantau Berangin - Batas Sumbar)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(38, 'PPK 5 (Pekanbaru - Batas Kampar - Simpang Lago)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(39, 'PPK 6 (Simpang Lago - Batas Inhu - Simpang Jayapura)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(40, 'PPK 7 (Simpang Jayapura - Siberida - Batas Jambi)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(41, 'PPK 8 (Pematang Reba - Rengat - Kuala Enok)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(42, 'PPK 9 (Batas Kuansing - Taluk Kuantan - Batas Sumbar)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(43, 'PPK Perencanaan Dan Pengawasan Jalan Nasional Prov. Riau', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(44, 'PPK 1 (Pulau Bintan)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(45, 'PPK 2 (Pulau Batam dan Pulau Galang)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(46, 'PPK 3 (Pulau Karimun dan Pulau Kundur)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(47, 'PPK 4 (Pulau Natuna)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(48, 'PPK Perencanaan Dan Pengawasan Jalan Nasional Prov. Kepulauan Riau', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(49, 'PPK 7 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Payakumbuh dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(50, 'PPK 8 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Lubuk Sikaping dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(51, 'PPK 9 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Ujung Gading dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(52, 'PPK 10 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Pariaman dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(53, 'PPK 11 (Pembangunan jembatan kelok)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(54, 'PPK 6 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Padang Panjang dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(55, 'PPK 12 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Solok dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(56, 'PPK 13 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Dharmasraya dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(57, 'PPK 14 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Painan dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(58, 'PPK 15 (Pelaksanaan Preservasi dan Peningkatan Kualitas Kapasitas Jalan dan Jembatan Nasional Indarapura dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(59, 'PPK Perencanaan Dana Pengawasan Jalan Nasional Provinsi Sumatera Barat', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(60, 'PPK. 2 Batas Riau - Batas Kab. Tanjab', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI JAMB'),
(512, 'TESTING', 'TESTING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_provinsi`
--

CREATE TABLE `tbl_master_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nm_provinsi` varchar(114) NOT NULL,
  `kode_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_provinsi`
--

INSERT INTO `tbl_master_provinsi` (`id_provinsi`, `nm_provinsi`, `kode_provinsi`) VALUES
(2, 'LAKUDO', 1),
(3, 'GU ', 2),
(4, 'SANGIAWAMBULU', 3),
(5, 'MAWASANGKA TIMUR', 4),
(6, 'MAWASANGKA TENGAH ', 5),
(7, 'MAWASANGKA', 6),
(8, 'TALAGA RAYA', 7),
(9, 'BAUBAU ', 8),
(10, 'BUTON ', 9),
(11, 'BUTON SELATAN ', 10),
(12, 'WAKATOBI', 11),
(13, 'MUNA', 12),
(14, 'MUNA BARAT', 13),
(15, 'BUTON UTARA', 14),
(16, 'BOMBANA', 15),
(17, 'KONAWE SELATAN ', 16),
(18, 'KONAWE KEPULAUAN ', 17),
(19, 'KOTA KENDARI', 18),
(20, 'KONAWE', 19),
(21, 'KONAWE UTARA', 20),
(22, 'KOLAKA TIMUR', 21),
(23, 'KOLAKA', 22),
(24, 'KOLAKA UTARA', 23),
(25, 'ACEH ', 24),
(26, 'SUMATERA UTARA', 25),
(27, 'RIAU', 26),
(28, 'KEPULAUAN RIAU', 27),
(29, 'JAMBI ', 28),
(30, 'SUMATERA BARAT', 29),
(31, 'SUMATERA SELATAN ', 30),
(32, 'LAMPUNG', 31),
(33, 'BENGKULU ', 32),
(34, 'BANGKA BELITUNG', 33),
(35, 'BANTEN', 34),
(36, 'JAWA BARAT ', 35),
(37, 'DKI. JAKARTA', 36),
(38, 'JAWA TENGAH ', 37),
(39, 'DI. YOGYAKARTA', 38),
(40, 'JAWA TIMUR ', 39),
(41, 'BALI', 40),
(42, 'NUSA TENGGARA BARAT ', 41),
(43, 'NUSA TENGGARA TIMUR', 42),
(44, 'KALIMANTAN BARAT ', 43),
(45, 'KALIMANTAN TENGAH ', 44),
(46, 'KALIMANTAN SELATAN ', 45),
(47, 'KALIMANTAN TIMUR', 46),
(48, 'KALIMANTAN UTARA', 47),
(49, 'SULAWESI UTARA', 48),
(50, 'GORONTALO', 49),
(51, 'SULAWESI BARAT', 50),
(52, 'SULAWESI SELATAN ', 51),
(53, 'SULAWESI TENGAH', 52),
(54, 'MALUKU', 53),
(55, 'MALUKU UTARA', 54),
(56, 'PAPUA ', 55),
(57, 'PAPUA BARAT', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_satuan_kerja`
--

CREATE TABLE `tbl_master_satuan_kerja` (
  `id_satuan_kerja` int(50) NOT NULL,
  `nama_satuan_kerja` varchar(150) NOT NULL,
  `parent_unit` varchar(50) NOT NULL,
  `alamat` varchar(114) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_satuan_kerja`
--

INSERT INTO `tbl_master_satuan_kerja` (`id_satuan_kerja`, `nama_satuan_kerja`, `parent_unit`, `alamat`) VALUES
(186, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA ', '1', 'Jl. Gersamata No. ……. Labungkari Kec. Lakudo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_dalam_keluarga`
--

CREATE TABLE `tbl_master_status_dalam_keluarga` (
  `id` int(11) NOT NULL,
  `status_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_dalam_keluarga`
--

INSERT INTO `tbl_master_status_dalam_keluarga` (`id`, `status_keluarga`) VALUES
(1, 'Suami'),
(2, 'Istri'),
(3, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_jabatan`
--

CREATE TABLE `tbl_master_status_jabatan` (
  `id_status_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_jabatan`
--

INSERT INTO `tbl_master_status_jabatan` (`id_status_jabatan`, `nama_jabatan`) VALUES
(2, 'REGULER'),
(3, 'REGULER PILIHAN (JABATAN STRUKTURAL)'),
(4, 'PILIHAN (JABATAN FUNGSIONAL)'),
(5, 'PILIHAN (PENYESUAIAN IJAZAH)'),
(6, 'GOLONGAN DARI PENGADAAN CPNS/PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_kawin`
--

CREATE TABLE `tbl_master_status_kawin` (
  `id` int(11) NOT NULL,
  `status_kawin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_kawin`
--

INSERT INTO `tbl_master_status_kawin` (`id`, `status_kawin`) VALUES
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Janda'),
(4, 'Duda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_pegawai`
--

CREATE TABLE `tbl_master_status_pegawai` (
  `id_status_pegawai` int(50) NOT NULL,
  `nama_status` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_pegawai`
--

INSERT INTO `tbl_master_status_pegawai` (`id_status_pegawai`, `nama_status`) VALUES
(8, 'PENSIUN'),
(3, 'AKTIF'),
(4, 'MENINGGAL'),
(5, 'PNS AKTIF'),
(6, 'CPNS'),
(7, 'MASA PERSIAPAN PENSIUN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_unit_kerja`
--

CREATE TABLE `tbl_master_unit_kerja` (
  `id_unit_kerja` int(50) NOT NULL,
  `nama_unit_kerja` varchar(150) NOT NULL,
  `eselon` varchar(50) NOT NULL,
  `parent_unit` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mata_anggaran`
--

CREATE TABLE `tbl_mata_anggaran` (
  `id_mata_anggaran` int(11) NOT NULL,
  `mata_anggaran` int(11) NOT NULL,
  `jumlah_anggaran` int(11) NOT NULL,
  `tahun_anggaran` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rincian_biaya`
--

CREATE TABLE `tbl_rincian_biaya` (
  `id_rincian_biaya` int(11) NOT NULL,
  `id_sppd` int(11) NOT NULL,
  `tgl_ta_berangkat` varchar(114) NOT NULL,
  `pesawat_berangkat` varchar(114) NOT NULL,
  `no_tiket_berangkat` varchar(114) NOT NULL,
  `kode_book_berangkat` int(11) NOT NULL,
  `harga_berangkat` int(20) NOT NULL,
  `tgl_ta_kembali` int(11) NOT NULL,
  `pesawat_kembali` varchar(50) NOT NULL,
  `no_tiket_kembali` varchar(50) NOT NULL,
  `kode_book_kembali` varchar(114) NOT NULL,
  `harga_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rincian_biaya`
--

INSERT INTO `tbl_rincian_biaya` (`id_rincian_biaya`, `id_sppd`, `tgl_ta_berangkat`, `pesawat_berangkat`, `no_tiket_berangkat`, `kode_book_berangkat`, `harga_berangkat`, `tgl_ta_kembali`, `pesawat_kembali`, `no_tiket_kembali`, `kode_book_kembali`, `harga_kembali`) VALUES
(1, 3, '2018-01-07', 'WIng', '12345678987654', 12345678, 1200000, 20180107, 'Garuda', '1234567898765432', '2345678765432', 1200000),
(2, 2, '2018-10-10', 'Garuda', '123456787654', 2345678, 1200000, 20180107, 'Wing', '1234567898765432', '12345676543', 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sppd_honorer`
--

CREATE TABLE `tbl_sppd_honorer` (
  `id_sppd_honorer` int(11) NOT NULL,
  `id_jenis_perjadin` int(11) NOT NULL,
  `tgl_sppd` varchar(114) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_honorer` int(11) NOT NULL,
  `no_perjadin` varchar(114) NOT NULL,
  `nomor` varchar(114) NOT NULL,
  `tgl_bukti` varchar(114) NOT NULL,
  `maksud_perjadin` text NOT NULL,
  `tujuan_perjadin` text NOT NULL,
  `kd_anggaran` varchar(114) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tujuan` varchar(114) NOT NULL,
  `tgl_berangkat` varchar(114) NOT NULL,
  `tgl_kembali` varchar(114) NOT NULL,
  `lama_hari` varchar(114) NOT NULL,
  `uang_perhari` int(20) NOT NULL,
  `nama_hotel` varchar(114) NOT NULL,
  `uang_hotel` int(11) NOT NULL,
  `total_uang_hotel` int(11) NOT NULL,
  `total_uang_harian` int(11) NOT NULL,
  `keterangan_anggaran` text NOT NULL,
  `uraian_kas` text NOT NULL,
  `tempat_berangkat` varchar(114) NOT NULL,
  `pejabat_yang_memerintah` varchar(114) NOT NULL,
  `no_rek` varchar(114) NOT NULL,
  `id_pengikut` int(11) NOT NULL,
  `instansi` varchar(114) NOT NULL,
  `id_bendahara` varchar(114) NOT NULL,
  `nip_bendahara` varchar(114) NOT NULL,
  `pejabat_mengetahui` varchar(114) NOT NULL,
  `nip_pejabat_mengetahui` varchar(114) NOT NULL,
  `dasar_pelaksanaan` text NOT NULL,
  `dasar_pelaksanaan_2` text NOT NULL,
  `dasar_pelaksanaan_3` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `alat_angkutan` varchar(114) NOT NULL,
  `biaya_pergi` int(11) NOT NULL,
  `biaya_pulang` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `biaya_akomodasi_hotel` int(11) NOT NULL,
  `biaya_representasi` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  `tgl_ta_berangkat` varchar(114) NOT NULL,
  `pesawat_berangkat` varchar(114) NOT NULL,
  `no_tiket_berangkat` varchar(114) NOT NULL,
  `kode_book_berangkat` varchar(114) NOT NULL,
  `harga_berangkat` int(11) NOT NULL,
  `tgl_ta_kembali` varchar(114) NOT NULL,
  `pesawat_kembali` varchar(114) NOT NULL,
  `no_tiket_kembali` varchar(114) NOT NULL,
  `kode_book_kembali` varchar(114) NOT NULL,
  `harga_kembali` int(11) NOT NULL,
  `jumlah_dibayarkan` int(11) NOT NULL,
  `biaya_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sppd_honorer`
--

INSERT INTO `tbl_sppd_honorer` (`id_sppd_honorer`, `id_jenis_perjadin`, `tgl_sppd`, `tahun`, `id_honorer`, `no_perjadin`, `nomor`, `tgl_bukti`, `maksud_perjadin`, `tujuan_perjadin`, `kd_anggaran`, `id_jabatan`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `lama_hari`, `uang_perhari`, `nama_hotel`, `uang_hotel`, `total_uang_hotel`, `total_uang_harian`, `keterangan_anggaran`, `uraian_kas`, `tempat_berangkat`, `pejabat_yang_memerintah`, `no_rek`, `id_pengikut`, `instansi`, `id_bendahara`, `nip_bendahara`, `pejabat_mengetahui`, `nip_pejabat_mengetahui`, `dasar_pelaksanaan`, `dasar_pelaksanaan_2`, `dasar_pelaksanaan_3`, `isi_laporan`, `alat_angkutan`, `biaya_pergi`, `biaya_pulang`, `biaya_lain`, `biaya_akomodasi_hotel`, `biaya_representasi`, `jumlah_biaya`, `tgl_ta_berangkat`, `pesawat_berangkat`, `no_tiket_berangkat`, `kode_book_berangkat`, `harga_berangkat`, `tgl_ta_kembali`, `pesawat_kembali`, `no_tiket_kembali`, `kode_book_kembali`, `harga_kembali`, `jumlah_dibayarkan`, `biaya_sisa`) VALUES
(1, 2, '2018-12-18', 2018, 5, '090/ 60 /BKPSDM.XII/2017', '', '2018-12-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Kendari', '', 6, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '7', 4000000, 'Calista', 4000000, 28000000, 28000000, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Baubau', 'KEPALA DINAS', '30.03.5.2.2.15.02', 0, 'Kendari', 'LA DEU SAYA', '123123123112312', 'SAMRIN, S.Pd., M.Pd', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, 0, 0, 92000000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 0, 92000000, 0),
(2, 2, '2018-11-25', 2018, 5, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'ASD', 'DSA', '', 6, 'Jakarta / Kendari', '2018-12-12', '2018-12-12', '7', 4000000, 'Zahra Hotel', 4000000, 28000000, 28000000, '', 'UIO', 'Labungkari', 'KEPALA DINAS', '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 'UIO', '', '', 'OP', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, 0, 0, 76370000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 0, 5000000, 71370000),
(3, 1, '2019-04-19', 2019, 26, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'asd', 'asd', NULL, 8, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '2', 300000, 'Zahra Hotel', 300000, 600000, 600000, '', 'ads', 'Labungkari', 'KEPALA DINAS', '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 'asd', '', '', 'asd', 'Mobil - Kapal Laut- Pesawat', 200000, 300000, 0, 0, 0, 1700000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 1000000, 1700000, 0),
(4, 1, '2019-07-12', 2019, 27, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'TES', 'TES', NULL, 8, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '2', 300000, 'Zahra Hotel', 300000, 600000, 600000, '', 'FSDF', 'Labungkari', 'KEPALA DINAS', '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 'TRES', '', '', 'GDGG', 'Mobil - Kapal Laut- Pesawat', 4500000, 4500000, 0, 0, 0, 10200000, '2018-11-21', 'LION AIR', '1233', '12000', 1000000, '2019-05-22', 'WINGS', '123333', '120000', 0, 10200000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sppd_ld`
--

CREATE TABLE `tbl_sppd_ld` (
  `id_sppd_ld` int(11) NOT NULL,
  `id_jenis_perjadin` int(11) NOT NULL,
  `tgl_sppd` varchar(114) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_perjadin` varchar(114) DEFAULT NULL,
  `nomor` varchar(114) NOT NULL,
  `tgl_bukti` varchar(114) DEFAULT NULL,
  `maksud_perjadin` text,
  `tujuan_perjadin` text NOT NULL,
  `kd_anggaran` varchar(114) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `tujuan` varchar(114) DEFAULT NULL,
  `tgl_berangkat` varchar(114) DEFAULT NULL,
  `tgl_kembali` varchar(114) DEFAULT NULL,
  `lama_hari` varchar(114) DEFAULT NULL,
  `uang_perhari` int(20) DEFAULT NULL,
  `nama_hotel` varchar(114) NOT NULL,
  `uang_hotel` int(11) NOT NULL,
  `total_uang_hotel` int(11) NOT NULL,
  `total_uang_harian` int(11) NOT NULL,
  `keterangan_anggaran` text,
  `uraian_kas` text NOT NULL,
  `tempat_berangkat` varchar(114) NOT NULL,
  `pejabat_yang_memerintah` varchar(114) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `no_rek` varchar(114) NOT NULL,
  `id_pengikut` int(11) NOT NULL,
  `instansi` varchar(114) NOT NULL,
  `id_bendahara` varchar(114) NOT NULL,
  `nip_bendahara` varchar(114) NOT NULL,
  `pejabat_mengetahui` varchar(114) NOT NULL,
  `nip_pejabat_mengetahui` varchar(114) NOT NULL,
  `biaya_riil` int(11) NOT NULL,
  `dasar_pelaksanaan` text NOT NULL,
  `dasar_pelaksanaan_2` text,
  `dasar_pelaksanaan_3` text,
  `isi_laporan` text NOT NULL,
  `alat_angkutan` varchar(114) NOT NULL,
  `biaya_pergi` int(11) NOT NULL,
  `biaya_pulang` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `biaya_akomodasi_hotel` int(11) DEFAULT NULL,
  `biaya_representasi` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  `tgl_ta_berangkat` varchar(114) DEFAULT NULL,
  `pesawat_berangkat` varchar(114) DEFAULT NULL,
  `no_tiket_berangkat` varchar(114) DEFAULT NULL,
  `kode_book_berangkat` varchar(114) DEFAULT NULL,
  `harga_berangkat` int(11) DEFAULT NULL,
  `tgl_ta_kembali` varchar(114) DEFAULT NULL,
  `pesawat_kembali` varchar(114) DEFAULT NULL,
  `no_tiket_kembali` varchar(114) DEFAULT NULL,
  `kode_book_kembali` varchar(114) DEFAULT NULL,
  `harga_kembali` int(11) DEFAULT NULL,
  `jumlah_dibayarkan` int(11) DEFAULT NULL,
  `biaya_sisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sppd_ld`
--

INSERT INTO `tbl_sppd_ld` (`id_sppd_ld`, `id_jenis_perjadin`, `tgl_sppd`, `tahun`, `id_pegawai`, `no_perjadin`, `nomor`, `tgl_bukti`, `maksud_perjadin`, `tujuan_perjadin`, `kd_anggaran`, `id_golongan`, `id_jabatan`, `id_pangkat`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `lama_hari`, `uang_perhari`, `nama_hotel`, `uang_hotel`, `total_uang_hotel`, `total_uang_harian`, `keterangan_anggaran`, `uraian_kas`, `tempat_berangkat`, `pejabat_yang_memerintah`, `id_eselon`, `no_rek`, `id_pengikut`, `instansi`, `id_bendahara`, `nip_bendahara`, `pejabat_mengetahui`, `nip_pejabat_mengetahui`, `biaya_riil`, `dasar_pelaksanaan`, `dasar_pelaksanaan_2`, `dasar_pelaksanaan_3`, `isi_laporan`, `alat_angkutan`, `biaya_pergi`, `biaya_pulang`, `biaya_lain`, `biaya_akomodasi_hotel`, `biaya_representasi`, `jumlah_biaya`, `tgl_ta_berangkat`, `pesawat_berangkat`, `no_tiket_berangkat`, `kode_book_berangkat`, `harga_berangkat`, `tgl_ta_kembali`, `pesawat_kembali`, `no_tiket_kembali`, `kode_book_kembali`, `harga_kembali`, `jumlah_dibayarkan`, `biaya_sisa`) VALUES
(5, 2, '2018-11-25', 2018, 35, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'ASD', 'DSA', NULL, 4, 6, 4, 'Jakarta / Kendari', '2018-12-12', '2018-12-12', '7', 4000000, 'Zahra Hotel', 4000000, 28000000, 28000000, NULL, 'UIO', 'Labungkari', 'KEPALA DINAS', 24, '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 120000, 'UIO', 'IOP', 'IOP', 'OP', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, NULL, 0, 76370000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 1000000, 5000000, 71370000),
(6, 1, '2018-11-25', 2018, 35, '', '', '', '', '', NULL, 4, 1, 4, '', '', '', '', 0, '', 0, 0, 0, NULL, '', '', '', 24, '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, NULL, 0, 0, '', '', '', '', 0, '', '', '', '', 0, 0, 0),
(7, 2, '2018-12-17', 2018, 36, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'asd', 'asds', NULL, 7, 6, 1, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '7', 4000000, 'Zahra Hotel', 4000000, 28000000, 28000000, NULL, 'ASDASFHG', 'Labungkari', 'KEPALA DINAS', 23, '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 15750000, 'asdss', 'eweq', 'QW23EEQ', '12312QEWQEQ', 'Mobil - Kapal Laut- Pesawat', 4500000, 4500000, 0, NULL, 0, 80750000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 2000000, 70750000, 10000000),
(8, 2, '2018-12-18', 2018, 39, '090/ 60 /BKPSDM.XII/2017', '', '2018-12-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Kendari', '', 10, 6, 2, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '7', 4000000, 'Calista', 4000000, 28000000, 28000000, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Baubau', 'KEPALA DINAS', 25, '30.03.5.2.2.15.02', 0, 'Kendari', 'LA DEU SAYA', '123123123112312', 'SAMRIN, S.Pd., M.Pd', '', 15750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, NULL, 0, 92000000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 0, 92000000, 0),
(9, 1, '2018-11-21', 2018, 5, '090/171/BKPSDM/XI/2018', '', '2018-11-21', 'Mengikuti Bimbingan Teknis Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP) tanggal 22 - 24 Nopember 2018 di Baubau.', '', '', 7, 9, 7, 'Kota Bau-Bau', '2018-11-21', '2018-11-23', '2', 300000, 'Calista', 300000, 600000, 600000, NULL, 'Belanja perjalanan dinas a.n. HARJUN HATMA,SP ke Baubau  dalam rangka Mengikuti Bimbingan Teknis Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP) tanggal 22 - 24 Nopember 2018 di Baubau., berdasarkan SPPD Nomor 090/171/BKPSDM/XI/2018,Tanggal 21 Nopember 2018., Dan Surat Tugas Nomor 094/61/2018,Tanggal 21 Nopember 2018.  terlampir.', 'Labungkari', 'SAMRIN,SPd.MPd', 29, '05.03.5.2.2.15.02', 0, 'BKPSDM', 'MUHAMMAD SAHRONI', '19851001 201407 1 001', 'SAMRIN,SPd.MPd', '19740115 199702 1002', 300000, 'Dokumen Pelaksanaan Anggaran (DPA-SKPD) Badan Kepegawaian dan Pengembangan Sumberdaya Manusia Kabupaten  Buton Tengah TA. 2018 ', 'Surat Sekretaris Daerah Kabupaten Buton Tengah Nomor 005/1113/2018 tanggal   19 Nopember  2018', '-', 'Kegiatan dimulai dengan Sosialisasi sistim perencanaan pembangunan berdasarkan Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2013 tentang Pedoman Penyusunan, Pengendalian dan Evaluasi Rencana Kerja Pembangunan Daerah Tahun 2014 dan Peraturan Presiden Nomor 2 Tahun 2015 tentang RPJMN Tahun 2015-2019 oleh Sekretaris Bapedda Propinsi Sulawesi Tenggara', 'Mobil - Kapal Laut/Speed', 200000, 300000, 0, NULL, 0, 2000000, '2018-11-21', '-', '-', '-', 0, '2018-11-23', '-', '-', '-', 0, 2000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_mhs_pt` int(11) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(114) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `lvl` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hostname` varchar(20) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `userfeeder` varchar(114) DEFAULT NULL,
  `passfeeder` varchar(114) DEFAULT NULL,
  `jabatan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `profile` varchar(114) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_mhs_pt`, `ip_address`, `username`, `password`, `repassword`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `lvl`, `phone`, `hostname`, `port`, `userfeeder`, `passfeeder`, `jabatan`, `id_pegawai`, `profile`) VALUES
(1, NULL, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'password', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1558143413, 1, 'Admin', 'istrator', 'ADMIN', 0, '08239566666', 'localhost', '8082', '091006', 'palagimatA', 3, NULL, 'avatar.jpg'),
(21, NULL, '::1', '19740115 199702 1 002', '$2y$08$xUVhrI19mQbdVTySKoSOlu9SuIhI47g1c61VNAvyfSbl517pv31ma', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714664, NULL, 1, 'SAMRIN', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 1, 'avatar.jpg'),
(22, NULL, '::1', '19660204 199203 1 011', '$2y$08$DDKB0yUi0aGI5Kvv.6AroOVnheAcPrSFLWbbV/5y89alZ5SS25Ijq', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714714, 1545742121, 1, 'LA ANCE PAULUS', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 2, 'avatar.jpg'),
(23, NULL, '::1', '19721231 200701 1 093', '$2y$08$aDYQ6AfmZP0ePcashsx3AuUqD7V35ZbKeNCc.J6fZKqOu8QwODPfK', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714755, NULL, 1, 'ZAHINUDDIN', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 3, 'avatar.jpg'),
(24, NULL, '::1', '19771231 201001 1 053', '$2y$08$pf0xg1cjQ8gbf5Hmxp5y/O79oVgjExLnZU32p4Ha4VSoRDb/qNJxC', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714792, NULL, 1, 'SARIFUDDIN FANTA', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 4, 'avatar.jpg'),
(25, NULL, '::1', '19760604 201001 1 019', '$2y$08$x8zYPC2POFCreDkgmzrGQOOjkJoIGHRDddJkB3VqHE6SOECVHcuKq', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714821, NULL, 1, 'HARJUN HATMA', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 5, 'avatar.jpg'),
(26, NULL, '::1', '19751115 201407 1 001', '$2y$08$JSxKVlISMO.RZHW3uo.LKujPaGrdQhFHFkxH8bLX9xTTz140BBj0C', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714854, NULL, 1, 'MUHAMMAD KASIM KAMPO', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 6, 'avatar.jpg'),
(27, NULL, '::1', '19840713 200701 2 005', '$2y$08$52d/EcS6dj1Lihyuk57ZaeDbkg1S6.bgLEaf1m3RvGsDMDb5KW49S', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714887, NULL, 1, 'ASTUTI AHMAD', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 7, 'avatar.jpg'),
(28, NULL, '::1', '19721206 201212 2 001', '$2y$08$mf11CYh/T4gf.G3oUK8tl.BD.N7MWt6ajUR7szTj69JI1umU4ZTd2', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714929, NULL, 1, 'SUHARNI', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 8, 'avatar.jpg'),
(29, NULL, '::1', '19851001 201407 1 001', '$2y$08$xMavV0./0Y35tAjRD0A28e.XAOM9AaQMnqZytdXtlLa6evmfvzzoS', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545714984, NULL, 1, 'MUHAMMAD SAHRONI', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 9, 'avatar.jpg'),
(30, NULL, '::1', '19620220 201407 1 001', '$2y$08$tANMQ63VF/yC4pEY08/D4.R6NGYiVCdxvG3cU0kIAj9sDbKkFrQ0O', 'password', NULL, '', NULL, NULL, NULL, NULL, 1545715015, NULL, 1, 'LA ALIYANA', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 0, '123456789', NULL, NULL, NULL, NULL, 0, 10, 'avatar.jpg'),
(31, NULL, '::1', '0000002', '$2y$08$Pq.M3lqNH4kD7MadttqKkuYoL9PQMtPzYskPNKKvIF0VVd4XdlUzW', 'x2vpc', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715764, NULL, 1, 'ABDUL MALIK, S.T.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 2, 'avatar.jpg'),
(32, NULL, '::1', '0000003', '$2y$08$Lf2QaM9w.owDk9OTRvfkbOshFol7vgjGw29fJsUoAo4lizrTILUD6', 'vpcaf', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715777, NULL, 1, 'HASAN SAFEI, S.E.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 3, 'avatar.jpg'),
(33, NULL, '::1', '0000004', '$2y$08$CjmL9hd2B.agqBqCYVfOR.7bgonWCH6xdwjrjFPe7P2CJb00spmse', '4rp8t', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715782, NULL, 1, 'RAJIMAN, S.H., M.H.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 4, 'avatar.jpg'),
(34, NULL, '::1', '0000005', '$2y$08$PdLaSWLpvtVrP1.QiEvKeeOQEOPGQ6xRUh7Iy8m4cLmxieUceBVXG', 'd4f1x', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715790, NULL, 1, 'HASNAWATI, S.T.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 5, 'avatar.jpg'),
(35, NULL, '::1', '0000006', '$2y$08$tCxO/9SHoFkybKLJH.TzV.VmhwaFuKP8e72C671brDlFjCVfjUnsW', 'gkhu7', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715797, NULL, 1, 'SYARIFUDDIN , A.Md. Kom.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 6, 'avatar.jpg'),
(36, NULL, '::1', '0000007', '$2y$08$yWiAmSwyncOEoLm/XohdqO9gaVdnCizwHtTa83UAMHLThdkGuBb3W', 'tdxbp', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715805, NULL, 1, 'SARMINA BAAKI, S.E.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 7, 'avatar.jpg'),
(37, NULL, '::1', '0000008', '$2y$08$E2g6Ooz0h5xfJGWDLH6yBuEzZkMSazS1RsCPXEUBNKW76BcCMriWO', 'gj9dw', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715813, NULL, 1, 'SARTINI', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 8, 'avatar.jpg'),
(38, NULL, '::1', '0000009', '$2y$08$SB/Y0HvUDcf7qxwsHSJ5VOUOu.Lv2Os9uqWCZmDVk9SuzzbI5q2TO', 'i1dh7', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715821, NULL, 1, 'SILSIUS EDI, S.Pd.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 9, 'avatar.jpg'),
(39, NULL, '::1', '0000010', '$2y$08$XHP1uTjZC1vr30U6pZzBOurvEDcrbgZfVNxuwZGSNDQYKChheKqr.', '3tdfd', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715829, NULL, 1, 'MUHLIS DARMANTO, S.Psi.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 10, 'avatar.jpg'),
(40, NULL, '::1', '0000011', '$2y$08$AImUQNxQPbKd1m5j2aGsGOdDvFZKGiwmHhYnEPQFZchzN1cNDN3jG', 'abjdw', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715837, NULL, 1, 'NURAIDA, S.Si.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 11, 'avatar.jpg'),
(41, NULL, '::1', '0000012', '$2y$08$xs2xs8hY/98CiXppm5aOhuivCAh4O/kMCL1GSlsdaY6S5QAYuMOry', 'if39o', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715844, NULL, 1, 'ARIFUDDIN, S.S.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 12, 'avatar.jpg'),
(42, NULL, '::1', '0000013', '$2y$08$9UGMzXG2UQU038Op3QOh9.rwB125Ske1XEZWMuLr/xLlpD7Pdnjlq', 'dwe29', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545715943, NULL, 1, 'NURAIDA, S.Si.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 13, 'avatar.jpg'),
(43, NULL, '::1', '0000014', '$2y$08$qwNkY2W.3s/X4P2VdCpiiOMG/ReIDYQFLDmNJ.SMCMWxJQe5xThdC', 'vydfg', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716095, NULL, 1, 'SYARIFUDDIN , A.Md. Kom.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 14, 'avatar.jpg'),
(44, NULL, '::1', '0000015', '$2y$08$q3peZ.kuXlZsy1rCYGxa2ud8Xvdw2Qs8iN1NHfyNlYtTU8P.WtUrO', '2tok8', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716104, NULL, 1, 'ARIFUDDIN, S.S.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 15, 'avatar.jpg'),
(45, NULL, '::1', '0000016', '$2y$08$nP54A.aeP/PM.WqLPO/H3ujashD6VILlrpgmOivWGV4ypBwKMompK', '4eqlh', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716114, NULL, 1, 'JAMALUDDIN, S.E.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 16, 'avatar.jpg'),
(46, NULL, '::1', '0000017', '$2y$08$FSaWEbgqrsklPeYoJvzY8OdITji77HZI3UGF7HMnGOr35bjFyKVvO', 'gvqn4', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716123, NULL, 1, 'LA MALA, S.Sos.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 17, 'avatar.jpg'),
(47, NULL, '::1', '0000018', '$2y$08$rSyWt.me5u7UWN3FUt9JHO3OvaJzcbsHRnCkvhPdf5X0T8TJ7v6li', 'iruak', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716132, 1545742024, 1, 'ANWAR, S.E.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 18, 'avatar.jpg'),
(48, NULL, '::1', '0000019', '$2y$08$k3XeK97AexhzrmUCuXot7etZuYuWk1pLkJQKq2JefgMwjC.zCqPAm', 'araid', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716201, NULL, 1, 'IRAWATI, S.H.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 19, 'avatar.jpg'),
(49, NULL, '::1', '0000020', '$2y$08$r0hy8OibIbToKR2saO0zfu/MmOoWkDTo4MJjtxtmGyE41AH2WHRtW', 'mycl6', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716216, NULL, 1, 'ADITYA PURWANTO SADIF, S.Kom.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 20, 'avatar.jpg'),
(50, NULL, '::1', '0000021', '$2y$08$Cqfh.wAmojgSoyuxwXCFEuYovARZj8OHAALNNlW8QEYBI0OpKLaYK', 'nj4l8', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716254, NULL, 1, 'WIWIN, S.Kep.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 21, 'avatar.jpg'),
(51, NULL, '::1', '0000022', '$2y$08$19YQwrj8nRRcJmUhWIhm9.G/j5Qz85LeQdVFt0DjPObl6rtr7Dd..', 'zgmza', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716262, NULL, 1, 'JAMIL', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 22, 'avatar.jpg'),
(52, NULL, '::1', '0000023', '$2y$08$LfHC02rah2uVEWG18c2YWuryeZt8Bn9corepmLb77Sn9fmoVvx3qC', 'qhtak', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716269, NULL, 1, 'MUHLISA', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 23, 'avatar.jpg'),
(53, NULL, '::1', '0000024', '$2y$08$sqI1xDyDRMrufVZZC0TKxe6Pof0eb87obOW/wT6K.xS4t2SqUHl4C', '12ixp', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1545716609, NULL, 1, 'ARIFUDDIN, S.S.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 24, 'avatar.jpg'),
(54, NULL, '::1', '0000026', '$2y$08$HnfF3bEAtWFzucrlEkcEdeql477xQcVfmRf54Hy85xgb55xn79nQa', 'gcnbl', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1546523311, NULL, 1, 'ERNI UDDIN, A.Md. Kom.', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '', NULL, NULL, NULL, NULL, 0, 26, 'avatar.jpg'),
(55, NULL, '::1', '0000001', '$2y$08$2F6fNKIgnDm0NScYu3X.te5eC0kXpZJNMwip7GKXvkr/icQTY1gVO', 'f1mib', NULL, 'honorer@gmail.com', NULL, NULL, NULL, NULL, 1558143767, NULL, 1, 'ARTHUR', 'Badan Kepegawaian dan Pengembangan Sumber Daya Man', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 2, '085242826445', NULL, NULL, NULL, NULL, 0, 27, 'avatar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users_groups`
--

CREATE TABLE `tbl_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users_groups`
--

INSERT INTO `tbl_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(63, 21, 2),
(64, 22, 2),
(65, 23, 2),
(66, 24, 2),
(67, 25, 2),
(68, 26, 2),
(69, 27, 2),
(70, 28, 2),
(71, 29, 2),
(72, 30, 2),
(73, 31, 35),
(74, 32, 35),
(75, 33, 35),
(76, 34, 35),
(77, 35, 35),
(78, 36, 35),
(79, 37, 35),
(80, 38, 35),
(81, 39, 35),
(82, 40, 35),
(83, 41, 35),
(84, 42, 35),
(85, 43, 35),
(86, 44, 35),
(87, 45, 35),
(88, 46, 35),
(89, 47, 35),
(90, 48, 35),
(91, 49, 35),
(92, 50, 35),
(93, 51, 35),
(94, 52, 35),
(95, 53, 35),
(96, 54, 35),
(97, 55, 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `id_user_login` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `stts` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id_user_login`, `username`, `password`, `nama_lengkap`, `stts`) VALUES
(1, 'admin', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 'Administrator', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_dp3`
--
ALTER TABLE `tbl_data_dp3`
  ADD PRIMARY KEY (`id_dp3`);

--
-- Indexes for table `tbl_data_gaji_pokok`
--
ALTER TABLE `tbl_data_gaji_pokok`
  ADD PRIMARY KEY (`id_gaji_pokok`);

--
-- Indexes for table `tbl_data_hukuman`
--
ALTER TABLE `tbl_data_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indexes for table `tbl_data_keluarga`
--
ALTER TABLE `tbl_data_keluarga`
  ADD PRIMARY KEY (`id_data_keluarga`);

--
-- Indexes for table `tbl_data_organisasi`
--
ALTER TABLE `tbl_data_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_data_pelatihan`
--
ALTER TABLE `tbl_data_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_data_pendidikan`
--
ALTER TABLE `tbl_data_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_data_penghargaan`
--
ALTER TABLE `tbl_data_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `tbl_data_riwayat_eselon`
--
ALTER TABLE `tbl_data_riwayat_eselon`
  ADD PRIMARY KEY (`id_riwayat_eselon`);

--
-- Indexes for table `tbl_data_riwayat_golongan`
--
ALTER TABLE `tbl_data_riwayat_golongan`
  ADD PRIMARY KEY (`id_riwayat_golongan`);

--
-- Indexes for table `tbl_data_riwayat_jabatan`
--
ALTER TABLE `tbl_data_riwayat_jabatan`
  ADD PRIMARY KEY (`id_riwayat_jabatan`);

--
-- Indexes for table `tbl_data_riwayat_pangkat`
--
ALTER TABLE `tbl_data_riwayat_pangkat`
  ADD PRIMARY KEY (`id_riwayat_pangkat`);

--
-- Indexes for table `tbl_data_seminar`
--
ALTER TABLE `tbl_data_seminar`
  ADD PRIMARY KEY (`id_seminar`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_honorer`
--
ALTER TABLE `tbl_honorer`
  ADD PRIMARY KEY (`id_honorer`);

--
-- Indexes for table `tbl_info_pt`
--
ALTER TABLE `tbl_info_pt`
  ADD PRIMARY KEY (`id_info_pt`);

--
-- Indexes for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_agama`
--
ALTER TABLE `tbl_master_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_master_angkutan`
--
ALTER TABLE `tbl_master_angkutan`
  ADD PRIMARY KEY (`id_angkutan`);

--
-- Indexes for table `tbl_master_biaya_harian`
--
ALTER TABLE `tbl_master_biaya_harian`
  ADD PRIMARY KEY (`id_biaya_harian`);

--
-- Indexes for table `tbl_master_biaya_hotel`
--
ALTER TABLE `tbl_master_biaya_hotel`
  ADD PRIMARY KEY (`id_biaya_hotel`);

--
-- Indexes for table `tbl_master_eselon`
--
ALTER TABLE `tbl_master_eselon`
  ADD PRIMARY KEY (`id_eselon`);

--
-- Indexes for table `tbl_master_golongan`
--
ALTER TABLE `tbl_master_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tbl_master_hukuman`
--
ALTER TABLE `tbl_master_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indexes for table `tbl_master_jabatan`
--
ALTER TABLE `tbl_master_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_master_jenis_jabatan`
--
ALTER TABLE `tbl_master_jenis_jabatan`
  ADD PRIMARY KEY (`id_jenis_jabatan`);

--
-- Indexes for table `tbl_master_jenis_perjadin`
--
ALTER TABLE `tbl_master_jenis_perjadin`
  ADD PRIMARY KEY (`id_jenis_perjadin`);

--
-- Indexes for table `tbl_master_lokasi_kerja`
--
ALTER TABLE `tbl_master_lokasi_kerja`
  ADD PRIMARY KEY (`id_lokasi_kerja`);

--
-- Indexes for table `tbl_master_lokasi_pelatihan`
--
ALTER TABLE `tbl_master_lokasi_pelatihan`
  ADD PRIMARY KEY (`id_lokasi_pelatihan`);

--
-- Indexes for table `tbl_master_mata_anggaran`
--
ALTER TABLE `tbl_master_mata_anggaran`
  ADD PRIMARY KEY (`id_mata_anggaran`);

--
-- Indexes for table `tbl_master_pangkat`
--
ALTER TABLE `tbl_master_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `tbl_master_pelatihan`
--
ALTER TABLE `tbl_master_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_master_pendidikan`
--
ALTER TABLE `tbl_master_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_penghargaan`
--
ALTER TABLE `tbl_master_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `tbl_master_pengikut`
--
ALTER TABLE `tbl_master_pengikut`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `tbl_master_ppk`
--
ALTER TABLE `tbl_master_ppk`
  ADD PRIMARY KEY (`id_ppk`);

--
-- Indexes for table `tbl_master_provinsi`
--
ALTER TABLE `tbl_master_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tbl_master_satuan_kerja`
--
ALTER TABLE `tbl_master_satuan_kerja`
  ADD PRIMARY KEY (`id_satuan_kerja`);

--
-- Indexes for table `tbl_master_status_dalam_keluarga`
--
ALTER TABLE `tbl_master_status_dalam_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_status_jabatan`
--
ALTER TABLE `tbl_master_status_jabatan`
  ADD PRIMARY KEY (`id_status_jabatan`);

--
-- Indexes for table `tbl_master_status_kawin`
--
ALTER TABLE `tbl_master_status_kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_status_pegawai`
--
ALTER TABLE `tbl_master_status_pegawai`
  ADD PRIMARY KEY (`id_status_pegawai`);

--
-- Indexes for table `tbl_master_unit_kerja`
--
ALTER TABLE `tbl_master_unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indexes for table `tbl_mata_anggaran`
--
ALTER TABLE `tbl_mata_anggaran`
  ADD PRIMARY KEY (`id_mata_anggaran`);

--
-- Indexes for table `tbl_rincian_biaya`
--
ALTER TABLE `tbl_rincian_biaya`
  ADD PRIMARY KEY (`id_rincian_biaya`);

--
-- Indexes for table `tbl_sppd_honorer`
--
ALTER TABLE `tbl_sppd_honorer`
  ADD PRIMARY KEY (`id_sppd_honorer`);

--
-- Indexes for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  ADD PRIMARY KEY (`id_sppd_ld`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`id_user_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_dp3`
--
ALTER TABLE `tbl_data_dp3`
  MODIFY `id_dp3` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_gaji_pokok`
--
ALTER TABLE `tbl_data_gaji_pokok`
  MODIFY `id_gaji_pokok` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_hukuman`
--
ALTER TABLE `tbl_data_hukuman`
  MODIFY `id_hukuman` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_keluarga`
--
ALTER TABLE `tbl_data_keluarga`
  MODIFY `id_data_keluarga` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_organisasi`
--
ALTER TABLE `tbl_data_organisasi`
  MODIFY `id_organisasi` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_data_pelatihan`
--
ALTER TABLE `tbl_data_pelatihan`
  MODIFY `id_pelatihan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pendidikan`
--
ALTER TABLE `tbl_data_pendidikan`
  MODIFY `id_pendidikan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_penghargaan`
--
ALTER TABLE `tbl_data_penghargaan`
  MODIFY `id_penghargaan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_eselon`
--
ALTER TABLE `tbl_data_riwayat_eselon`
  MODIFY `id_riwayat_eselon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_golongan`
--
ALTER TABLE `tbl_data_riwayat_golongan`
  MODIFY `id_riwayat_golongan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_jabatan`
--
ALTER TABLE `tbl_data_riwayat_jabatan`
  MODIFY `id_riwayat_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_pangkat`
--
ALTER TABLE `tbl_data_riwayat_pangkat`
  MODIFY `id_riwayat_pangkat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_data_seminar`
--
ALTER TABLE `tbl_data_seminar`
  MODIFY `id_seminar` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_honorer`
--
ALTER TABLE `tbl_honorer`
  MODIFY `id_honorer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_info_pt`
--
ALTER TABLE `tbl_info_pt`
  MODIFY `id_info_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_master_agama`
--
ALTER TABLE `tbl_master_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_master_angkutan`
--
ALTER TABLE `tbl_master_angkutan`
  MODIFY `id_angkutan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_master_biaya_harian`
--
ALTER TABLE `tbl_master_biaya_harian`
  MODIFY `id_biaya_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_master_biaya_hotel`
--
ALTER TABLE `tbl_master_biaya_hotel`
  MODIFY `id_biaya_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_master_eselon`
--
ALTER TABLE `tbl_master_eselon`
  MODIFY `id_eselon` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_master_golongan`
--
ALTER TABLE `tbl_master_golongan`
  MODIFY `id_golongan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_master_hukuman`
--
ALTER TABLE `tbl_master_hukuman`
  MODIFY `id_hukuman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_master_jabatan`
--
ALTER TABLE `tbl_master_jabatan`
  MODIFY `id_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_master_jenis_jabatan`
--
ALTER TABLE `tbl_master_jenis_jabatan`
  MODIFY `id_jenis_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_master_jenis_perjadin`
--
ALTER TABLE `tbl_master_jenis_perjadin`
  MODIFY `id_jenis_perjadin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_master_lokasi_kerja`
--
ALTER TABLE `tbl_master_lokasi_kerja`
  MODIFY `id_lokasi_kerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_master_lokasi_pelatihan`
--
ALTER TABLE `tbl_master_lokasi_pelatihan`
  MODIFY `id_lokasi_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_master_mata_anggaran`
--
ALTER TABLE `tbl_master_mata_anggaran`
  MODIFY `id_mata_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_master_pangkat`
--
ALTER TABLE `tbl_master_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_master_pelatihan`
--
ALTER TABLE `tbl_master_pelatihan`
  MODIFY `id_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;
--
-- AUTO_INCREMENT for table `tbl_master_pendidikan`
--
ALTER TABLE `tbl_master_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_master_penghargaan`
--
ALTER TABLE `tbl_master_penghargaan`
  MODIFY `id_penghargaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tbl_master_pengikut`
--
ALTER TABLE `tbl_master_pengikut`
  MODIFY `id_pengikut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_master_ppk`
--
ALTER TABLE `tbl_master_ppk`
  MODIFY `id_ppk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
--
-- AUTO_INCREMENT for table `tbl_master_provinsi`
--
ALTER TABLE `tbl_master_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_master_satuan_kerja`
--
ALTER TABLE `tbl_master_satuan_kerja`
  MODIFY `id_satuan_kerja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `tbl_master_status_dalam_keluarga`
--
ALTER TABLE `tbl_master_status_dalam_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_master_status_jabatan`
--
ALTER TABLE `tbl_master_status_jabatan`
  MODIFY `id_status_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_master_status_kawin`
--
ALTER TABLE `tbl_master_status_kawin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_master_status_pegawai`
--
ALTER TABLE `tbl_master_status_pegawai`
  MODIFY `id_status_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_master_unit_kerja`
--
ALTER TABLE `tbl_master_unit_kerja`
  MODIFY `id_unit_kerja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `tbl_mata_anggaran`
--
ALTER TABLE `tbl_mata_anggaran`
  MODIFY `id_mata_anggaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_rincian_biaya`
--
ALTER TABLE `tbl_rincian_biaya`
  MODIFY `id_rincian_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sppd_honorer`
--
ALTER TABLE `tbl_sppd_honorer`
  MODIFY `id_sppd_honorer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  MODIFY `id_sppd_ld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `id_user_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
