-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2026 pada 05.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_focuspatch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daillygoalpatch`
--

CREATE TABLE `daillygoalpatch` (
  `goal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_target` varchar(255) NOT NULL,
  `status_done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `focustimerpatch`
--

CREATE TABLE `focustimerpatch` (
  `timer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `durasi_menit` int(11) NOT NULL,
  `is_productive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roadmappatch`
--

CREATE TABLE `roadmappatch` (
  `roadmap_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `step_name` varchar(100) NOT NULL,
  `status` enum('todo','in_progress','done','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `selfreflectionpatch`
--

CREATE TABLE `selfreflectionpatch` (
  `reflection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mood_score` tinyint(1) NOT NULL DEFAULT 3,
  `isi_perasaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'belva imut', 'keishazivanna21@gmail.com', '$2y$10$rxD2Kn9owb4mpuHcIcdS1uquxHe4wVVmCKafsVMXDGLkg8UHNXvD2', '2026-04-18 12:23:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daillygoalpatch`
--
ALTER TABLE `daillygoalpatch`
  ADD PRIMARY KEY (`goal_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `focustimerpatch`
--
ALTER TABLE `focustimerpatch`
  ADD PRIMARY KEY (`timer_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `roadmappatch`
--
ALTER TABLE `roadmappatch`
  ADD PRIMARY KEY (`roadmap_id`),
  ADD KEY `fk_user_roadmap` (`user_id`);

--
-- Indeks untuk tabel `selfreflectionpatch`
--
ALTER TABLE `selfreflectionpatch`
  ADD PRIMARY KEY (`reflection_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daillygoalpatch`
--
ALTER TABLE `daillygoalpatch`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `focustimerpatch`
--
ALTER TABLE `focustimerpatch`
  MODIFY `timer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roadmappatch`
--
ALTER TABLE `roadmappatch`
  MODIFY `roadmap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `selfreflectionpatch`
--
ALTER TABLE `selfreflectionpatch`
  MODIFY `reflection_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daillygoalpatch`
--
ALTER TABLE `daillygoalpatch`
  ADD CONSTRAINT `daillygoalpatch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `focustimerpatch`
--
ALTER TABLE `focustimerpatch`
  ADD CONSTRAINT `focustimerpatch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `roadmappatch`
--
ALTER TABLE `roadmappatch`
  ADD CONSTRAINT `roadmappatch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `selfreflectionpatch`
--
ALTER TABLE `selfreflectionpatch`
  ADD CONSTRAINT `selfreflectionpatch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
