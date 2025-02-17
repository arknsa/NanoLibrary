-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nanolib_dw`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_buku`
--

CREATE TABLE `dim_buku` (
  `sk_buku` int(11) DEFAULT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Penerbit` varchar(255) DEFAULT NULL,
  `Bahasa` varchar(255) DEFAULT NULL,
  `Kategori` varchar(255) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Akses` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_buku`
--

INSERT INTO `dim_buku` (`sk_buku`, `Judul`, `Author`, `Penerbit`, `Bahasa`, `Kategori`, `Stok`, `Akses`) VALUES
(11, 'Applied Multivariate Statistical Analysis 5th Edition', 'Richard Arnold Johnson, Dean W. Wichern', 'Pearson College Div', 'Inggris', 'Statistika', 3, 'Dapat dipinjam'),
(12, 'Multivariate Data Analysis (8th Edition)', 'Joseph F Hair, Barry J. Babin, Rolph E. Anderson, William C. Black', 'Cengage Learning', 'Inggris', 'Statistika', 1, 'Dapat dipinjam'),
(13, 'Concise Guide to Databases: A Practical Introduction (Undergraduate Topics in Computer Science) 2nd edition', 'Konstantinos Domdouzis, Peter Lake, Paul Crowther', 'Springer', 'Inggris', 'Pemrograman', 0, 'Dapat dipinjam'),
(14, 'Data Mining: Practical Machine Learning Tools and Techniques (The Morgan Kaufmann Series in Data Management Systems) 3rd Edition', 'Ian H. Witten, Eibe Frank, Mark A. Hall', 'Morgan Kaufmann', 'Inggris', 'Pemrograman', 1, 'Dapat dipinjam'),
(15, 'Natural Language Processing with Python', 'Steven Bird, Ewan Klein, Edward Loper', 'O\'Reilly Media', 'Inggris', 'Pemrograman', 1, 'Dapat dipinjam'),
(16, 'Elements of Applied Stochastic Processes', 'U. Narayan Bhat, Gregory K. Miller', 'Wiley-Interscience', 'Inggris', 'Statistika', 1, 'Dapat dipinjam'),
(17, 'Physics for Scientists & Engineers with Modern Physics 4th Edition', 'Douglas Giancoli', 'Pearson', 'Inggris', 'Sains', 1, 'Dapat dipinjam'),
(18, 'Expedita non.', 'Myrtle Jacobson', 'Kilback-Mraz', 'ht', 'vel', 27, 'Dapat dipinjam'),
(19, 'Delectus harum unde ullam.', 'Rey Hintz', 'Heidenreich, Larson and Heidenreich', 'kv', 'voluptates', 18, 'Dapat dipinjam'),
(20, 'Architecto nostrum facilis.', 'Ellie Feil', 'Cassin, Leuschke and Russel', 'mk', 'dicta', 57, 'Baca di tempat'),
(21, 'Esse unde nihil delectus.', 'Ms. Claire Wiza', 'Rodriguez-Grant', 've', 'dolorum', 62, 'Dapat dipinjam'),
(22, 'Qui culpa aspernatur sit.', 'Madeline Hamill', 'Mraz Inc', 'eu', 'cum', 89, 'Baca di tempat'),
(23, 'Veniam consequatur deleniti dolore.', 'Keshaun Braun', 'Wuckert, Ferry and Cummings', 'ik', 'ullam', 35, 'Dapat dipinjam'),
(24, 'Fugiat minima.', 'Glen Moore', 'Collins-Reichert', 'bg', 'tempore', 89, 'Baca di tempat'),
(25, 'Eos ea dolorem debitis.', 'Dr. Vanessa Halvorson', 'Hane Inc', 'et', 'accusantium', 39, 'Dapat dipinjam'),
(26, 'Totam fuga et nemo.', 'Mrs. Jolie Willms', 'Powlowski PLC', 'ae', 'qui', 54, 'Baca di tempat'),
(27, 'Consequatur saepe assumenda.', 'Stanley Kirlin', 'Mayer, Connelly and Bode', 'vo', 'fugiat', 77, 'Dapat dipinjam'),
(28, 'Perferendis et quibusdam.', 'Elyssa Gerhold', 'Hirthe-Terry', 'dz', 'quis', 36, 'Dapat dipinjam'),
(29, 'Et nulla aut.', 'Brandyn Greenfelder PhD', 'Hill, Jast and Konopelski', 'sq', 'et', 51, 'Baca di tempat'),
(30, 'Repudiandae ut repellendus.', 'Esta Larkin', 'Connelly, Abbott and Leannon', 'ii', 'soluta', 69, 'Dapat dipinjam'),
(31, 'Voluptatum commodi nemo.', 'Mr. Bernardo Daniel', 'Gerlach, Wisozk and Swaniawski', 'be', 'commodi', 78, 'Dapat dipinjam'),
(32, 'Odio reiciendis ullam.', 'Miss Sally Heller Sr.', 'Mayert and Sons', 'mk', 'voluptatum', 81, 'Dapat dipinjam'),
(33, 'Nam est debitis deserunt.', 'Marie Block', 'Kunde-Hessel', 'kv', 'ullam', 43, 'Dapat dipinjam'),
(34, 'Minima quasi ut.', 'Cara Trantow IV', 'Koch, Watsica and Kutch', 'bs', 'veniam', 70, 'Baca di tempat'),
(35, 'Quis provident.', 'Halle Waelchi', 'Monahan LLC', 'hu', 'nisi', 32, 'Dapat dipinjam'),
(36, 'At repellendus omnis.', 'Kennedy Schulist', 'Gleason Ltd', 'pi', 'ut', 20, 'Dapat dipinjam'),
(37, 'Ut labore quas et qui.', 'Aurelia Stanton IV', 'Keeling LLC', 'my', 'saepe', 85, 'Dapat dipinjam'),
(38, 'Ullam alias.', 'Augustus Littel I', 'Hermiston, Bradtke and Hermann', 'hu', 'quo', 74, 'Dapat dipinjam'),
(39, 'Id sed.', 'Ursula Haag', 'Ferry, Ledner and Schuster', 'ho', 'quam', 98, 'Dapat dipinjam'),
(40, 'Dolorum laborum ipsam qui.', 'Dameon Moore', 'Reynolds and Sons', 'st', 'est', 80, 'Dapat dipinjam'),
(41, 'Dolorum id voluptatem tempora.', 'Hettie Rohan', 'Boyer and Sons', 'th', 'voluptatem', 65, 'Baca di tempat'),
(42, 'Asperiores recusandae odit qui.', 'Elliott McDermott V', 'Wuckert, Trantow and Herman', 'ff', 'voluptates', 47, 'Dapat dipinjam'),
(43, 'Delectus autem cupiditate.', 'Mr. Omer Champlin Jr.', 'Quitzon-Stark', 'ng', 'quas', 90, 'Baca di tempat'),
(44, 'Similique quae et.', 'Nichole Klocko', 'Koepp, Ledner and Vandervort', 'nd', 'illum', 7, 'Baca di tempat'),
(45, 'Vel sit et aut.', 'Meagan Hackett', 'Carroll and Sons', 'bo', 'tenetur', 77, 'Baca di tempat'),
(46, 'Ut consequatur.', 'Vivianne Huels', 'Windler, Ruecker and Senger', 'os', 'consequatur', 82, 'Dapat dipinjam'),
(47, 'Natus eos eveniet voluptas.', 'Ethelyn Stamm', 'Watsica, Kuhn and Cole', 'ga', 'autem', 41, 'Baca di tempat'),
(48, 'Ea maxime qui.', 'Linnie Champlin', 'McCullough-Block', 'bo', 'consequatur', 23, 'Baca di tempat'),
(49, 'Dolore quas est in minima.', 'Fannie Greenholt V', 'Hill, Pouros and Stehr', 'ky', 'ad', 41, 'Baca di tempat'),
(50, 'Labore cum optio.', 'Ms. Kenyatta Nolan', 'Schoen, Brekke and Barton', 'ru', 'quae', 16, 'Dapat dipinjam'),
(51, 'Sit voluptas ut numquam.', 'Rafaela Bernhard V', 'Schimmel, Considine and Mayert', 'cu', 'dolore', 4, 'Dapat dipinjam'),
(52, 'Voluptas aut.', 'Ofelia Boehm DDS', 'Gusikowski LLC', 'nb', 'qui', 75, 'Dapat dipinjam'),
(53, 'Voluptas atque qui consequatur.', 'Ms. Meagan Will II', 'Trantow Ltd', 'mk', 'neque', 39, 'Baca di tempat'),
(54, 'Maiores atque est facilis.', 'Gordon Rodriguez', 'Turner-Erdman', 'ga', 'laudantium', 84, 'Dapat dipinjam'),
(55, 'Est optio sit eligendi.', 'Dr. Corine Thompson MD', 'Cruickshank Inc', 'kl', 'qui', 79, 'Dapat dipinjam'),
(56, 'Culpa ad officiis nobis.', 'May Wyman', 'Lemke LLC', 'bm', 'enim', 18, 'Baca di tempat'),
(57, 'Odit quia doloribus pariatur.', 'Clotilde Rau', 'Casper-Sawayn', 'os', 'velit', 97, 'Dapat dipinjam'),
(58, 'Debitis ipsum rerum dolores.', 'Dr. Ebony D\'Amore III', 'Beer-Braun', 'id', 'nam', 1, 'Baca di tempat'),
(59, 'Neque vero sequi.', 'Verda Frami', 'Romaguera-Cronin', 'ba', 'beatae', 46, 'Dapat dipinjam'),
(60, 'Sit quo.', 'Aniya Kunde', 'Feest Group', 'ja', 'numquam', 74, 'Baca di tempat'),
(61, 'Vel quis ipsa.', 'Prof. Duane Grimes I', 'Bartell Group', 'it', 'esse', 95, 'Baca di tempat'),
(62, 'Labore praesentium quo qui.', 'Clemens Kerluke V', 'Volkman Ltd', 'mr', 'dolor', 47, 'Dapat dipinjam'),
(63, 'Reprehenderit expedita officiis quia.', 'Miss Daija Kozey', 'Ullrich-Anderson', 'sd', 'perspiciatis', 33, 'Baca di tempat'),
(64, 'Ratione alias delectus unde aliquam.', 'Antonette Kassulke', 'Crooks-King', 'kj', 'voluptatem', 60, 'Baca di tempat'),
(65, 'Id quos culpa animi aliquid.', 'Macie Reinger', 'Little-Kutch', 'lt', 'perspiciatis', 63, 'Baca di tempat'),
(66, 'Totam libero.', 'Kian Mayert', 'O\'Connell and Sons', 'ar', 'et', 91, 'Dapat dipinjam'),
(67, 'In mollitia et sint.', 'Eloy Dickens IV', 'Bradtke Inc', 'bi', 'et', 90, 'Dapat dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `dim_user`
--

CREATE TABLE `dim_user` (
  `sk_user` int(11) DEFAULT NULL,
  `NIM` varchar(12) DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Angkatan` int(11) DEFAULT NULL,
  `Program_Studi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `sk_waktu` bigint(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `hari` tinytext DEFAULT NULL,
  `bulan` tinytext DEFAULT NULL,
  `kuartal` tinytext DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_peminjaman`
--

CREATE TABLE `fact_peminjaman` (
  `sk_peminjaman` int(11) DEFAULT NULL,
  `Tanggal_Peminjaman` datetime DEFAULT NULL,
  `Tenggat_Pengembalian` datetime DEFAULT NULL,
  `sisa_durasi_pinjam` int(11) DEFAULT NULL,
  `sk_buku` int(11) DEFAULT NULL,
  `sk_waktu` bigint(20) DEFAULT NULL,
  `sk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_pengembalian`
--

CREATE TABLE `fact_pengembalian` (
  `sk_pengembalian` int(11) DEFAULT NULL,
  `Tanggal_Pengembalian` datetime DEFAULT NULL,
  `Tanggal_Peminjaman` datetime DEFAULT NULL,
  `Tenggat_Pengembalian` datetime DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `status` tinytext DEFAULT NULL,
  `sk_user` int(11) DEFAULT NULL,
  `sk_buku` int(11) DEFAULT NULL,
  `sk_waktu` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_visit`
--

CREATE TABLE `fact_visit` (
  `sk_kunjungan` int(11) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  `exit_time` datetime DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `sk_waktu` bigint(20) DEFAULT NULL,
  `sk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
