-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2019 at 02:23 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr_laravelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', '2019-11-27 04:56:49', '2019-11-27 04:56:49'),
(2, 'Kesehatan', 'kesehatan', '2019-11-27 04:56:57', '2019-11-27 04:56:57'),
(3, 'Tekhnologi', 'tekhnologi', '2019-11-27 04:57:43', '2019-11-27 04:57:43'),
(4, 'Politik', 'politik', '2019-11-27 04:58:09', '2019-11-27 04:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `isPublished` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `photo`, `title`, `slug`, `body`, `isPublished`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'undraw_walk_in_the_city_1ma6.png', 'Menjaga kesehatan mental', 'menjaga-kesehatan-mental', '<p>Tulisan diambil dari <a href=\"/admin/post/hilman.space\">hilman.space</a>&nbsp;</p>\r\n<p><strong>Beberapa tips menjaga kesehatan mental</strong></p>\r\n<p><strong>1. Harga diri sendiri, </strong></p>\r\n<p>jangan mudah menghakimi gagal hanya karena satu kesalahan. Belajar memaafkan diri sendiri. Tidak ada yang sempurna.. tidak ada. Jangan terlena dengan orang lain yang terlihat sempurna. Tidak ada yang sempurna.</p>\r\n<p><strong>2. Ngobrol sama teman yang kamu nyaman (bukan teman di sosialmedia, tapi dunia nyata)</strong></p>\r\n<p>Yang kamu ngga malu kentut dekat dia. (Poinnya tentu saja kamu kentut dekat dia terus, tapi menandakan tidak ada yang kamu rahasiakan). Telfon jika sudah jarang bertemu, memang agak aneh saat di awal.</p>\r\n<p><strong>3. Punya aktivitas yang asyik</strong></p>\r\n<p>Waktu bangun kamu jangan sampai 100% hanya untuk kerja. Apa hobi kamu, apa olahraga yang kamu suka, sediakan waktu untuk itu.</p>\r\n<p>Setelah mengerjakan tugas berat, traktir diri kamu sendiri, beri hadiah yang mengembalikan&nbsp;<em>mood</em>&nbsp;dan semangat. Hadiahnya tidak selalu fisik. Bisa jadi jalan ke taman atau bentuk lainnya yang kamu suka.</p>\r\n<p>Sediakan waktu untuk berpikir, apa yang bisa kamu perbaiki, siapa yang bisa kamu hubungi, dan pertanyaan-pertanyaan penting lainnya. Terus sibuk dari satu hal ke hal lain tanpa waktu kosong diri sendiri juga tidak baik.</p>\r\n<p>Sediakan waktu dan lebih aktif bertanya saat temanmu terlihat berbeda dari biasanya. Orang lebih cenderung menyimpan sakit mental sendiri.</p>\r\n<p>Yang terakhir dan sebenarnya pertama, kamu punya Tuhan, Tuhan yang menciptakan semuanya, setiap hari berusaha mendekat denganNya, jangan malu dan takut, Dia tahu semuanya. Masalah kamu akan diselesaikan, meskipun semuanya terlihat sulit dan tidak mungkin.</p>\r\n<p><strong>Apakah ini hal memalukan?</strong></p>\r\n<p>Kalau kamu merasa sudah banyak uang dan sudah populer, sayangnya justru kita banyak mendengar kabar bunuh diri dari kalangan ini. Hal-hal duniawi sama sekali bukan jaminan kamu bisa terbebas dari masalah penyakit mental ini.</p>\r\n<p>Pernyakit mental adalah hal yang umum yang setiap dari kita bisa rasakan. Menjaga kesehatan mental bukanlah hal yang memalukan. Jangan malu meminta bantuan dan bertanya seputar tema ini. Bikin hal ini menjadi lazim untuk diobrolkan.</p>', 1, '2019-11-27 05:11:03', '2019-11-27 05:11:12'),
(2, 2, 3, 'undraw_walk_in_the_city_1ma6.png', 'Mendapatkan uang tanpa keluar rumah', 'mendapatkan-uang-tanpa-keluar-rumah', '<p>Jutaan orang bahkan tidak menyadari, bahwa mereka bisa mendapatkan $1000 perhari tanpa meninggalkan rumah dan Anda adalah salah satunya</p>\r\n<p>Dengan bekerja sebagai freelancer, Anda tentunya bisa mendapatkan uang tanpa meninggalkan rumah, asalkan Anda tahu caranya. Disini saya akan membagikan beberapa situs website untuk Anda supaya bisa bekerja sebagai freelancer.</p>\r\n<p>Sebelum bekerja sebagai freelancer, Anda tentunya harus mempunyai skills yang memupuni skill yang banyak orang lain cari atau butuhkan, beberapa skill yang banyak dibutuhkan orang saat ini diantaranya adalah&nbsp; design, coding, entry data, translate, dan lain-lain.</p>\r\n<p><strong>Beberapa situs Anda dapat mendapat clients :&nbsp;</strong></p>\r\n<h4>1. Sribulancer</h4>\r\n<p>Yang pertama ini ada <a href=\"/admin/post/Sribulancer.com\">Sribulancer.com</a>, Sribulancer adalah salah satu website freelance yang popular di Indonesia. Disini, Anda bisa menemukan pekerjaan seperti yang berhubungan dengan jasa pembuatan website, graphic design, penulisan artikel, penerjemah, sampai dengan social media marketing. Anda tidak perlu khawatir karena Sribulancer bisa dibilang lebih lokal dari website freelance lainnya. Mereka menerima pembayaran melalui transfer bank. Tentunya ini menjadi nilai plus karena kebanyakan orang Indonesia tidak memiliki kartu kredit.</p>\r\n<h4>2. Upwork</h4>\r\n<p><a href=\"https://www.upwork.com/\" target=\"_blank\" rel=\"noopener\">Upwork</a> adalah situs freelance luar negeri, jadi Anda harus siap dengan skill bahasa inggris Anda untuk bisa mencari client di situs ini, kabar baiknya sekarang ada google translate yang siap membantu Anda. Website ini bisa digunakan oleh bisnis dari berbagai ukuran dan freelancer dengan tingkat keterampilan yang berbeda. Upwork memungkinkan Anda untuk menyaring daftar pekerjaan yang tersedia sesuai dengan keterampilan Anda. Selain itu, UpWork juga memiliki fitur yang membantu mendeteksi apakah klien yang mendaftarkan pekerjaan itu palsu atau tidak. UpWork sering disebut sebagai website freelance terbaik karena mereka menyediakan layanan yang berkualitas tinggi.</p>\r\n<p><strong>3. Fiverr</strong></p>\r\n<p><a href=\"/admin/post/fiverr.com\">Fiverr</a> adalah situs dimana freelancer bisa menawarkan keahliannya, menawarkan jasanya di berbagai bidang baik itu design, programmin, dan masih banyak lainnya. Fiverr adalah situs yang sangat menarik menurut Saya, karena situs ini berbeda dengan situs freelancer lainnya. Anda bisa mencobanya sendiri jika ingin merasakan perbedaannya.</p>', 1, '2019-11-27 06:09:54', '2019-11-27 06:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `skill_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achieved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `media_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'website', 'website', '2019-11-27 04:58:14', '2019-11-27 04:58:14'),
(2, 'mobile app', 'mobile-app', '2019-11-27 04:58:24', '2019-11-27 04:58:24'),
(3, 'bahasa pemrograman', 'bahasa-pemrograman', '2019-11-27 04:58:40', '2019-11-27 04:58:40'),
(4, 'psikologi', 'psikologi', '2019-11-27 04:59:07', '2019-11-27 04:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tag_post`
--

CREATE TABLE `tag_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag_post`
--

INSERT INTO `tag_post` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Teguh Ahmad', 'guh@mail.com', NULL, '$2y$10$Wce0Lq9yr/zlcW7xWwLZF.DMCkVFKYCZXGYTZXw7CJgreTmrYzu9C', NULL, '2019-11-27 04:56:37', '2019-11-27 04:56:37'),
(2, 'Jhoni Capitalisme', 'admin@mail.com', NULL, '$2y$10$KOs6yqBAh8DHeDIAbdvKG.nbTJxxc49uYV0BlwqtFRXl1yQJMe9t6', NULL, '2019-11-27 05:49:55', '2019-11-27 05:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_media_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_post`
--
ALTER TABLE `tag_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_post_post_id_foreign` (`post_id`),
  ADD KEY `tag_post_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_media`
--
ALTER TABLE `social_media`
  ADD CONSTRAINT `social_media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_post`
--
ALTER TABLE `tag_post`
  ADD CONSTRAINT `tag_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_post_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
