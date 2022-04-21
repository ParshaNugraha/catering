-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2022 pada 07.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `Nama`, `username`, `password`) VALUES
(29, 'Pramudya Shaka Nugraha', 'parsha', 'e3739886262b4a18f18cbd6433114ebd'),
(30, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(23, 'Ayam geprek', 'Kategori_Makanan_492.jpg', 'Iya', 'Iya'),
(24, 'Es Boba', 'Kategori_Makanan_813.jpg', 'Iya', 'Iya'),
(25, 'Nasi Goreng', 'Kategori_Makanan_669.jpg', 'Tidak', 'Iya'),
(33, '', '', 'Tidak', 'Iya'),
(38, 'Burger', 'Kategori_Makanan_30.jpg', 'Iya', 'Iya'),
(39, 'Teh', 'Kategori_Makanan_702.jpg', 'Iya', 'Iya'),
(40, 'Pizza', 'Kategori_Makanan_223.jpg', 'Iya', 'Iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `deskripsi`, `harga`, `image_name`, `category_id`, `featured`, `active`) VALUES
(21, 'Beef Burger', 'Burger dengan isian daging sapi', '35.000', 'Nama-Makanan-1263.jpg', 38, 'Tidak', 'Iya'),
(22, 'Chicken Burger', 'Burger dengan isian daging ayam', '25.000', 'Nama-Makanan-2002.jpg', 38, 'Iya', 'Iya'),
(23, 'Fish Burger', 'Burger dengan isian daging ikan', '23.000', 'Nama-Makanan-9657.jpg', 38, 'Tidak', 'Iya'),
(24, 'Ramen Burger', 'Burger dengan roti yang digantikan dengan mie ramen', '18.000', 'Nama-Makanan-967.jpg', 38, 'Iya', 'Iya'),
(25, 'Burger Nasi Isi Telur', 'Burger berbahan nasi yang bikin kenyang', '22.000', 'Nama-Makanan-3832.jpg', 38, 'Iya', 'Iya'),
(26, 'Ayam Geprek Original', 'Ayam geprek dengan sambal merah original', '15.000', 'Nama-Makanan-7676.jpeg', 23, 'Iya', 'Iya'),
(27, 'Ayam Geprek Sambal Campur', 'Ayam geprek dengan berbagai sambal', '20.000', 'Nama-Makanan-5884.jpeg', 23, 'Iya', 'Iya'),
(28, 'Ayam Geprek Sambal Ijo', 'Ayam geprek dengan sambal ijo', '15.000', 'Nama-Makanan-5424.jpeg', 23, 'Iya', 'Iya'),
(29, 'Ayam Geprek Sambal Matah', 'Ayam geprek dengan sambal matah', '18.000', 'Nama-Makanan-9954.jpeg', 23, 'Iya', 'Iya'),
(30, 'Ayam Geprek Keju', 'Ayam geprek dengan campuran keju mozarella', '25.000', 'Nama-Makanan-4784.jpeg', 23, 'Iya', 'Iya'),
(33, 'Taro Boba Milk', 'Boba dengan rasa taro', '10.000', 'Nama-Makanan-2394.jpeg', 24, 'Iya', 'Iya'),
(34, 'Brown Sugar Boba Milk Tea', 'Boba dengan rasa gula merah', '15.000', 'Nama-Makanan-5329.jpeg', 24, 'Iya', 'Iya'),
(35, 'Dalgona Milo Boba', 'Boba dengan coklat dalgona', '13.000', 'Nama-Makanan-6904.jpeg', 24, 'Iya', 'Iya'),
(37, 'Nasi Goreng Mawut', 'Nasi goreng dengan kombinasi mie dan berbagai topping lainnya seperti bakso, sosis, ayam, dan masih banyak lagi', '15.000', 'Nama-Makanan-804.jpg', 25, 'Iya', 'Iya'),
(38, 'Nasi Goreng Kampung', 'Nasi goreng yang memiliki bumbu tambahan yaitu terasi, sehingga rasanya semakin gurih dan nikmat. ', '12.000', 'Nama-Makanan-6801.jpg', 25, 'Iya', 'Iya'),
(39, 'Nasi Goreng Aceh', 'Nasi goreng yangmemiliki cita rasa yang aromatik dan kaya akan rempah bumbu halusnya.', '14.000', 'Nama-Makanan-6262.jpg', 25, 'Iya', 'Iya'),
(40, 'Nasi Goreng Merah Makassar', 'Nasi goreng berwarna merah yang dihasilkan dari saus tomat', '16.000', 'Nama-Makanan-5539.jpg', 25, 'Iya', 'Iya'),
(41, 'Nasi Goreng Resek Malang', 'Nasi goreng yang memiliki berbagai campuran sayuran seperti kecambah, kol, mie, dan suwiran ayam sehingga tampak memiliki porsi yang banyak.', '14.000', 'Nama-Makanan-954.jpg', 25, 'Iya', 'Iya'),
(46, 'Lemon Tea', 'Teh dengan campuran lemon', '5.000', 'Nama-Makanan-2371.jpeg', 39, 'Iya', 'Iya'),
(47, 'Ginger Tea', 'Teh dengan campuran jahe', '7.000', 'Nama-Makanan-6758.jpeg', 39, 'Iya', 'Iya'),
(48, 'Matcha Tea', 'Teh dengan campuran serbuk matcha', '10.000', 'Nama-Makanan-247.jpeg', 39, 'Iya', 'Iya'),
(50, 'Pizza Capricciosa', 'Pizza capricciosa dilapisi dengan keju mozzarella segar, tomat, jamur kancing, artichoke, dan zaitun\r\n', '50.000', 'Nama-Makanan-5769.jpg', 40, 'Iya', 'Iya'),
(51, 'Pizza Sicilia', 'pizza dengan topping mulai dari kacang, telur rebus, seafood, sampai zaitun hijau', '60.000', 'Nama-Makanan-606.jpg', 40, 'Iya', 'Iya'),
(52, 'Pizza Quattro Stagioni', 'Pizza  dengan bahan yang digunakan biasanya artichoke, tumbuhan yang ditanam sebagai makanan dan zaitun\r\n', '55.000', 'Nama-Makanan-7907.jpg', 40, 'Iya', 'Iya'),
(53, 'Pizza Margeritha', 'Pizza yang berisi olesan saus tomat, keju mozzarella, dan daun basil yang dicincang.', '45.000', 'Nama-Makanan-3917.jpg', 40, 'Iya', 'Iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(10) UNSIGNED NOT NULL,
  `makanan` varchar(150) NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `kontak_customer` varchar(20) NOT NULL,
  `email_customer` varchar(150) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `makanan`, `harga`, `total`, `waktu_pesan`, `status`, `nama_customer`, `kontak_customer`, `email_customer`, `alamat_customer`, `qty`) VALUES
(10, 'geprek', '12.000', '24.000', '2022-04-04 08:15:56', 'Terkirim', 'pramudya', '08982936324', 'pramudyashaka27@gmail.com', 'Bangsri', 2),
(11, 'gaega', '35.000', '140.000', '2022-04-04 08:31:56', 'Terkirim', 'sukamti', '67976867', 'safwf@gmail.com', 'safasfasf', 4),
(12, 'test 20', '50.000', '150.000', '2022-04-04 09:12:19', 'Terkirim', 'bejo', '67976867', 'wawopdnw@gmail.com', 'antah berantah', 3),
(13, 'geprek', '12.000', '36.000', '2022-04-16 10:09:21', 'Terkirim', 'wadasd', '67976867', 'pramudyashaka27@gmail.com', 'dxrdxgfxrdx', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
