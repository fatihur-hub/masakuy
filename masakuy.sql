/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : masakuy

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 18/12/2023 03:48:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for artikel
-- ----------------------------
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `artikel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `artikel_author_foreign`(`author` ASC) USING BTREE,
  CONSTRAINT `artikel_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artikel
-- ----------------------------
INSERT INTO `artikel` VALUES (1, 'Resep Sate Padang yang Lezat dan Gurih', 1, 'QRFIfCuBCwqIvKlkMr0KACO5WvdRYbVc17SZRcH5.png', 'asdda', 'resep-sate-padang-yang-lezat-dan-gurih', 0, '2023-12-17 08:41:52', '2023-12-17 08:41:52');
INSERT INTO `artikel` VALUES (3, 'Membuat Smoothie Bowl Buah Segar yang Menyegarkan', 1, 'u1gScIaxcoXdtsNktSdsysfZaUB76s0hYIqdQOtK.png', '<p><span style=\"color: var(--tw-prose-bold);\">Pendahuluan:</span></p><p><span style=\"color: rgb(55, 65, 81);\">Smoothie bowl merupakan alternatif sarapan atau camilan sehat yang mudah disiapkan dan menyegarkan. Kombinasi buah-buahan segar dengan tekstur lembut dan cita rasa manis alami menjadikan smoothie bowl pilihan yang populer. Berikut adalah resep sederhana untuk membuat smoothie bowl buah segar yang nikmat dan menyehatkan.</span></p>', 'membuat-smoothie-bowl-buah-segar-yang-menyegarkan', 0, '2023-12-17 09:49:37', '2023-12-17 09:49:37');

-- ----------------------------
-- Table structure for comment_likes
-- ----------------------------
DROP TABLE IF EXISTS `comment_likes`;
CREATE TABLE `comment_likes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment_likes
-- ----------------------------

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comments_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `comments_parent_id_foreign`(`parent_id` ASC) USING BTREE,
  INDEX `comments_commentable_type_commentable_id_index`(`commentable_type` ASC, `commentable_id` ASC) USING BTREE,
  CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, NULL, 'wah keren', 'App\\Models\\Resep', 25, NULL, '2023-12-17 14:31:19', '2023-12-17 14:31:19');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (4, 'Makanan Utama', '25dbshrbXAxaFrFSciP0p4Lk3R3MHnUYReKjqFSE.jpg', '2023-12-17 11:38:25', '2023-12-17 11:38:25');
INSERT INTO `kategori` VALUES (5, 'Makanan Ringan', 'WxyXvsCxK5osQndIpaZD40ZGeZdImHJM5YRKgEY9.jpg', '2023-12-17 11:38:53', '2023-12-17 11:38:53');
INSERT INTO `kategori` VALUES (6, 'Minuman', '7LKSJ9Fuo8P4x1qe9BNXEvdnYkJT9qWBAqo9pa8b.jpg', '2023-12-17 11:39:27', '2023-12-17 11:39:27');
INSERT INTO `kategori` VALUES (7, 'Jajanan Pasar', 'Wsd5bnbupoGmZDvHXp7stNVCCoScdV3ucM7V9xII.jpg', '2023-12-17 11:39:44', '2023-12-17 11:39:44');
INSERT INTO `kategori` VALUES (8, 'Pencuci Mulut', 'IWehSHFKJDqT8uyBD0QFujz3yKZw40xNaHBIj1U3.jpg', '2023-12-17 11:39:56', '2023-12-17 11:39:56');
INSERT INTO `kategori` VALUES (9, 'Makanan Khas Daerah', '3ieIHQ4LHOq1ZpE84L5c8sZoxveqlTaCFsyIPrf5.jpg', '2023-12-17 11:40:08', '2023-12-17 11:40:08');
INSERT INTO `kategori` VALUES (10, 'Makanan Khas Perayaan', 'zq6cnuNaiXUrpR1S96nN1fKCl9zdvQlJasDYR5P4.jpg', '2023-12-17 11:40:23', '2023-12-17 11:40:23');
INSERT INTO `kategori` VALUES (11, 'Makanan Kesehatan', 'qQ1KkFEZxSNajgrbahlr0i84LPWlw9zUqQhTHnnB.jpg', '2023-12-17 11:40:35', '2023-12-17 11:40:35');
INSERT INTO `kategori` VALUES (12, 'Makanan Anak-anak', 'ImxwrZZJ3V2mEJKuElbwIFqCRuVzZImle65sOPfa.jpg', '2023-12-17 11:40:46', '2023-12-17 11:40:46');

-- ----------------------------
-- Table structure for komen
-- ----------------------------
DROP TABLE IF EXISTS `komen`;
CREATE TABLE `komen`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_resep` bigint UNSIGNED NOT NULL,
  `komen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `komen_id_user_foreign`(`id_user` ASC) USING BTREE,
  INDEX `komen_id_resep_foreign`(`id_resep` ASC) USING BTREE,
  CONSTRAINT `komen_id_resep_foreign` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `komen_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of komen
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_12_15_154627_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_12_15_154635_create_resep_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_12_15_154647_create_artikel_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_12_15_154710_create_komen_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_12_16_014352_add_status_and_slug_to_artikels_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_12_16_025646_add_thumbnail_to_kategori_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_02_24_000000_create_comments_table', 2);
INSERT INTO `migrations` VALUES (13, '2023_03_24_000000_create_comment_likes_table', 2);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for resep
-- ----------------------------
DROP TABLE IF EXISTS `resep`;
CREATE TABLE `resep`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_resep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `asal_kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `durasi` int NOT NULL,
  `kesulitan` enum('mudah','menengah','sulit') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `langkah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `resep_id_user_foreign`(`id_user` ASC) USING BTREE,
  INDEX `resep_id_kategori_foreign`(`id_kategori` ASC) USING BTREE,
  CONSTRAINT `resep_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `resep_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resep
-- ----------------------------
INSERT INTO `resep` VALUES (24, 'MzZkw0rdYf3te0BTOUy2wi5LbbUN1ir6uvGRKW0X.jpg', 'Sate Kambing', 1, 'Madura', 4, 45, 'menengah', '<h4>Untuk Bumbu Marinade:</h4><ul><li>500 gram daging kambing, potong dadu kecil</li><li>3 sendok makan kecap manis</li><li>2 sendok makan minyak goreng</li><li>2 sendok teh ketumbar bubuk</li><li>1 sendok teh jintan bubuk</li><li>4 siung bawang putih, haluskan</li><li>2 cm jahe, parut</li><li>Garam dan merica secukupnya</li></ul><h4>Untuk Saus Kacang:</h4><ul><li>200 gram kacang tanah, sangrai dan haluskan</li><li>2 sendok makan kecap manis</li><li>1 sendok makan kecap asin</li><li>1 sendok makan air asam jawa</li><li>1 sendok teh gula merah, serut halus</li><li>2 siung bawang putih, haluskan</li><li>1/2 sendok teh garam</li><li>500 ml air</li></ul><h4>Bahan Pelengkap:</h4><ul><li>Bawang merah, iris tipis</li><li>Bawang putih, iris tipis</li><li>Cabai merah, iris serong</li><li>Tomat, potong-potong</li></ul><p><br></p>', '<h4>Untuk Bumbu Marinade:</h4><ul><li>500 gram daging kambing, potong dadu kecil</li><li>3 sendok makan kecap manis</li><li>2 sendok makan minyak goreng</li><li>2 sendok teh ketumbar bubuk</li><li>1 sendok teh jintan bubuk</li><li>4 siung bawang putih, haluskan</li><li>2 cm jahe, parut</li><li>Garam dan merica secukupnya</li></ul><h4>Untuk Saus Kacang:</h4><ul><li>200 gram kacang tanah, sangrai dan haluskan</li><li>2 sendok makan kecap manis</li><li>1 sendok makan kecap asin</li><li>1 sendok makan air asam jawa</li><li>1 sendok teh gula merah, serut halus</li><li>2 siung bawang putih, haluskan</li><li>1/2 sendok teh garam</li><li>500 ml air</li></ul><h4>Bahan Pelengkap:</h4><ul><li>Bawang merah, iris tipis</li><li>Bawang putih, iris tipis</li><li>Cabai merah, iris serong</li><li>Tomat, potong-potong</li></ul><p><br></p>', 1, '2023-12-17 11:44:48', '2023-12-17 11:45:51');
INSERT INTO `resep` VALUES (25, 'ruW0lXog9wn7sj88NS79k1VfvLrIqNamKMSjYY8q.jpg', 'Risoles', 1, 'Jawa', 5, 30, 'mudah', '<h3>Bahan Kulit:</h3><ul><li>200 gram tepung terigu</li><li>400 ml air</li><li>2 telur</li><li>1/4 sendok teh garam</li><li>1 sendok makan mentega, cairkan</li><li>Minyak untuk menggoreng</li></ul><h3>Bahan Isi:</h3><ul><li>250 gram daging ayam, rebus dan suwir halus</li><li>100 gram wortel, potong dadu kecil dan rebus sebentar</li><li>100 gram kacang polong, rebus sebentar</li><li>2 sendok makan mentega</li><li>2 sendok makan tepung terigu</li><li>300 ml susu cair</li><li>Garam dan merica secukupnya</li><li>Bawang putih, cincang halus</li></ul><h3>Bahan Pelapis:</h3><ul><li>2 telur, kocok lepas</li><li>Tepung roti secukupnya</li></ul><p><br></p>', '<h3>Bahan Kulit:</h3><ul><li>200 gram tepung terigu</li><li>400 ml air</li><li>2 telur</li><li>1/4 sendok teh garam</li><li>1 sendok makan mentega, cairkan</li><li>Minyak untuk menggoreng</li></ul><h3>Bahan Isi:</h3><ul><li>250 gram daging ayam, rebus dan suwir halus</li><li>100 gram wortel, potong dadu kecil dan rebus sebentar</li><li>100 gram kacang polong, rebus sebentar</li><li>2 sendok makan mentega</li><li>2 sendok makan tepung terigu</li><li>300 ml susu cair</li><li>Garam dan merica secukupnya</li><li>Bawang putih, cincang halus</li></ul><h3>Bahan Pelapis:</h3><ul><li>2 telur, kocok lepas</li><li>Tepung roti secukupnya</li></ul><p><br></p>', 1, '2023-12-17 11:59:03', '2023-12-17 11:59:11');
INSERT INTO `resep` VALUES (26, 'KjOVI943XMbXezLfC16t6mqD0qYiuM3IMGQ56wTx.jpg', 'Es Cendol', 2, 'Jawa Barat', 8, 10, 'mudah', '<h4>Untuk Cendol:</h4><ol><li>150 gram tepung beras</li><li>2 sendok makan tepung hunkwe (tepung beras ketan)</li><li>200 ml air pandan suji (air daun pandan yang diblender dan disaring)</li><li>Sejumput garam</li><li>Air secukupnya (untuk merebus cendol)</li></ol><h4>Untuk Gula Merah Santan:</h4><ol><li>200 gram gula merah, serut halus</li><li>200 ml air</li><li>300 ml santan dari 1 butir kelapa</li><li>Sejumput garam</li></ol><h4>Penyajian:</h4><ol><li>Es serut secukupnya</li><li>Sirup vanila (opsional)</li><li>Cincau (opsional)</li></ol><p><br></p>', '<h4>Untuk Cendol:</h4><ol><li>150 gram tepung beras</li><li>2 sendok makan tepung hunkwe (tepung beras ketan)</li><li>200 ml air pandan suji (air daun pandan yang diblender dan disaring)</li><li>Sejumput garam</li><li>Air secukupnya (untuk merebus cendol)</li></ol><h4>Untuk Gula Merah Santan:</h4><ol><li>200 gram gula merah, serut halus</li><li>200 ml air</li><li>300 ml santan dari 1 butir kelapa</li><li>Sejumput garam</li></ol><h4>Penyajian:</h4><ol><li>Es serut secukupnya</li><li>Sirup vanila (opsional)</li><li>Cincau (opsional)</li></ol><p><br></p>', 0, '2023-12-17 19:26:56', '2023-12-17 19:26:56');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@admin.com', NULL, '$2y$12$8Q.9CoWoOYONLXDicFOVnO94ocaBSBuFnxmYeH0ADAw9eGVy6YbsC', 'admin', NULL, '2023-12-16 10:40:04', '2023-12-16 10:40:04');
INSERT INTO `users` VALUES (2, 'User', 'user@user.com', NULL, '$2y$12$mxEoyFL6dMU092R46VPk.esiXHdxGgh4YnJ8zOD/5GoChW0/xXXMC', 'user', NULL, '2023-12-16 10:40:04', '2023-12-16 10:40:04');

SET FOREIGN_KEY_CHECKS = 1;
