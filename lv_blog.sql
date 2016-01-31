-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2016 at 12:06 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lv_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_25_092824_create_users_table', 1),
('2016_01_25_093904_create_roles_table', 1),
('2016_01_25_094136_create_role_user_table', 1),
('2016_01_25_094205_create_posts_table', 1),
('2016_01_25_094306_create_tags_table', 1),
('2016_01_25_094320_create_post_tag_table', 1),
('2016_01_25_101420_create_comments_table', 1),
('2016_01_26_110017_create_role_user_trigger', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `attachment`, `approved`, `created_at`, `updated_at`) VALUES
(1, 0, 'safgdsag', 'sdgasdg', 'posts-14541384487557.png', 1, '2016-01-30 01:20:48', '2016-01-30 04:40:51'),
(12, 2, 'hey man whats up!', 'jdhgajdsbjkbvdskajgbdskjghajk', 'posts-14541417932252.jpg', 1, '2016-01-30 02:16:33', '2016-01-30 04:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(2, 1),
(18, 1),
(19, 2),
(20, 2),
(2, 2),
(2, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Web Design'),
(2, 'Graphic Design'),
(3, 'SEO'),
(4, 'AutoCAD'),
(5, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'jnahian', 'Julkar Naen', 'Nahian', 'info@jnahian.com', '$2y$10$4tekBpaaySGjWL/LW6rcV.ZFi1sZNBRS/qzRsePOmzFgbMLhVm2xC', '2vBkH5vd1KEzwOonRt3vDUbzvdXHpeAsYEYbwhPzsxM20s94v9xlILtFbE5E', '2016-01-26 01:09:06', '2016-01-30 05:06:41'),
(3, 'ahabib', 'Ahsan', 'Habib', 'habib@gmail.com', '$2y$10$J.1QOfGfIvAr0zdzJjG16.5oqscDIufh4Fd/64JDHlbH6Vm8HZCz6', '36ZlRRQDs79iUgMyXJpepZSkzAhe4IcfYALsB7ii', '2016-01-26 01:10:11', '2016-01-26 01:10:11'),
(5, 'abs_uzzal', 'Abu Bakkar', 'Siddik', 'abs@gmail.com', '$2y$10$mLX7951s0DwU.iW4CqeLXuWXm4yI8WAGr0Q8Cq21Iv/mj/amUhKcO', 'STXeDOfn7XuyKolHFF8boReKQ0nEOIEenws2wn9l', '2016-01-26 02:12:11', '2016-01-26 02:12:11'),
(6, 'mmkjony', 'Md. Mostafa', 'Kamal', 'mmkjony@gmail.com', '$2y$10$kmcbNaQ2wH05P1RYiVvyJ.f3p095hb77RxsowsjanLA8k63r2wgd6', 'STXeDOfn7XuyKolHFF8boReKQ0nEOIEenws2wn9l', '2016-01-26 05:03:16', '2016-01-26 05:03:16'),
(7, 'partha-roy', 'Partha Protim', 'Roy', 'partha_roy@gmail.com', '$2y$10$Nl5crSmz.AfBcmKEe5JdSevNTR8nSyD0OmqMRVM5Kr9jyCgDFicAq', 'STXeDOfn7XuyKolHFF8boReKQ0nEOIEenws2wn9l', '2016-01-26 05:05:40', '2016-01-26 05:05:40'),
(8, 'jfvbsagfvbasjk', 'asasjkgajk', 'jkfsakjfvb', 'sajfgbvasjk@ajkfaskj.askjfb', '$2y$10$0yfx95dkCsZ3Swfh1UxZG.dxqw9Gecp9PXCsfX/LehDj5tXg3gvrq', 'YvdHQqS4z2u5uWmJJ6NYpn0qrC87aygvw8M5htNz', '2016-01-26 22:31:49', '2016-01-26 22:31:49'),
(9, 'safsafsaf', 'Nayeem', 'Shaheb', 'asfas@fsaf.fasf', '$2y$10$43T25wTGur13dEN33MH3LuZfBVias.I75FwxW2eXc9cKBHuiJCfUW', 'YvdHQqS4z2u5uWmJJ6NYpn0qrC87aygvw8M5htNz', '2016-01-26 22:45:25', '2016-01-29 04:22:31'),
(18, 'n_khan', 'Nahian', 'Khan', 'nkhan@yahoo.com', '$2y$10$8Oyf1BQfzBMCVmVjMWTjceyzq.tfTtW4LCmfPPMWJQQd4qCBb2FYe', 'YvdHQqS4z2u5uWmJJ6NYpn0qrC87aygvw8M5htNz', '2016-01-26 23:00:20', '2016-01-26 23:00:20'),
(19, 'partharaj', 'Partharaj', 'Deb', 'partharaj@yahoo.com', '$2y$10$Mk/1.OAMCGJzNskUHshP7O.4oA5nNwRAF5lw1aLnolO0Kvz7dOAEq', 'YvdHQqS4z2u5uWmJJ6NYpn0qrC87aygvw8M5htNz', '2016-01-26 23:08:20', '2016-01-26 23:08:20'),
(20, 'tshuvo', 'Taiful Hasan', 'Shuvo', 'tshuvo@yahoo.com', '$2y$10$VGh9r20Hu6GqiAHVmJJlWuZPB.3CsgsRPFSiBaZqphAMJze0vDk4C', 'YvdHQqS4z2u5uWmJJ6NYpn0qrC87aygvw8M5htNz', '2016-01-26 23:10:54', '2016-01-26 23:10:54');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `tr_User_Default_Member_Role` AFTER INSERT ON `users`
 FOR EACH ROW BEGIN
                       INSERT INTO role_user (`role_id`, `user_id`) VALUES (2, NEW.id);
                   END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `comments_post_id_foreign` (`post_id`), ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_tag_post_id_foreign` (`post_id`), ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
