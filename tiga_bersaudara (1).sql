-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2021 pada 16.36
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiga_bersaudara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(20, 'Display'),
(21, 'Kebutuhan Promosi'),
(34, 'Suvenir'),
(35, 'Textile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `desain` varchar(255) NOT NULL,
  `ket_pemesanan` text NOT NULL,
  `pembayaran` text NOT NULL,
  `status_pemesanan` varchar(20) NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_user`, `id_produk`, `desain`, `ket_pemesanan`, `pembayaran`, `status_pemesanan`, `status_pembayaran`, `bukti_pembayaran`, `tgl`) VALUES
(96, 14, 89, '', '25000 x 1= 25000 - Ukuran = 100cm x 100cm - ', 'COD', 'Sudah Selesai', 'Sudah Dibayar', '1612964999_90c6a5f2defc7f4078de.jpg', '2021-02-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `no_wa` int(12) NOT NULL,
  `tgl` date NOT NULL,
  `hak_akses` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama_lengkap`, `email`, `password`, `no_hp`, `no_wa`, `tgl`, `hak_akses`) VALUES
(14, 'ardi', 'ardi@gmail.com', '$2y$10$O2EggMuOg9qnDmwLmmR3OO4zuazcFrJT9ZekgUc1Dvpe7ZHYeODNW', 12121, 12121, '2021-01-28', 'user'),
(15, 'ang', 'ang@gmail.com', '$2y$10$oQTpQ1KsIMmTBJ8qIkxtyuxSRZrR4ttzjIMe.PHGiD8qB2/qY/bFS', 12121, 12121, '2021-01-28', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `estimasi_waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `gambar`, `harga`, `keterangan`, `estimasi_waktu`) VALUES
(89, 20, 'Spanduk', '1611421900_8932a19255a1d1d1830e.jpg', '25000', 'Spanduk adalah alat pemasaran favorit untuk kebutuhan berbagai promosi. Dengan harga cetak yang cukup murah, Anda sudah dapat mempromosikan berbagai hal pada spanduk yang terpasang di area publik.', '1 hari'),
(90, 35, 'Baju', '1610579880_b5c1d23f2513e07889f9.jpeg', '85000', 'Kini kamu bisa membuat baju custom satuan yang unik dengan gambar photo, tulisan, dan warna design yang bisa kamu edit suka-suka kamu sendiri dengan mudah. Tersedia berbagai jenis baju custom print untuk laki-laki, perempuan, dan anak-anak. ', '1 hari'),
(95, 34, 'Mug', '1610578344_0d134470a496d3910d44.jpg', '35000', 'Kini kamu bisa membuat mug custom satuan yang unik dengan gambar photo, tulisan, dan warna desain yang bisa diedit suka-suka kamu sendiri dengan mudah.', '1 hari'),
(96, 21, 'Kartu Nama', '1610578905_6b84032b72791745c4c4.png', '50000', 'Kartu nama bukan sekadar tanda pengenal, dalam dunia bisnis penggunaan kartu nama sangat penting untuk menambah koneksi dan relasi.', '1 hari'),
(112, 34, 'Pin', '1611853840_49c6f9c0fb946a43c8b8.jpg', '5000', 'Pin dapat Anda manfaatkan sebagai aksesoris menarik yang dapat dikenakan oleh orang banyak, saat melakukan kegiatan promosi perusahaan/instansi.', '1 hari'),
(113, 21, 'Id Card', '1611871928_06b7c863054cb69fa981.jpg', '30000', 'Kartu identitas atau ID Card adalah hal penting yang menandakan bahwa Anda adalah bagian dari suatu perusahaan atau institusi. Dengan menggunakan ID Card, Anda telah menunjukan sikap profesional pada klien atau rekan bisnis.', '1 hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_produk`
--

CREATE TABLE `template_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title_template` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `template_produk`
--

INSERT INTO `template_produk` (`id`, `id_produk`, `img`, `title_template`) VALUES
(18, 89, '1611501330_e2861259ecabe1fe5d6a.jpg', 'contoh 1'),
(19, 89, '1611501447_e843f0b62e443ee45d81.jpg', 'contoh 2'),
(21, 90, '1611552118_2135eff4d9398a084c32.jpeg', 'contoh 1'),
(22, 90, '1611552131_e7b3e85a5e9c65b429ae.jpeg', 'contoh 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id`, `produk_id`, `ukuran`, `harga`) VALUES
(18, 89, '100cm x 100cm', '25000'),
(19, 89, '100cm x 200cm', '37500'),
(20, 89, '100cm x 300cm', '50000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `template_produk`
--
ALTER TABLE `template_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`produk_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `template_produk`
--
ALTER TABLE `template_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `template_produk`
--
ALTER TABLE `template_produk`
  ADD CONSTRAINT `template_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD CONSTRAINT `ukuran_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
