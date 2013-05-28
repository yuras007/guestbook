-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 28 2013 г., 08:08
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `guestbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'SuperAdmin', '2013-05-18 00:00:00', '2013-05-18 00:00:00'),
(2, 'Moderator', '2013-05-19 08:40:27', '2013-05-19 08:40:27'),
(3, 'User', '2013-05-19 00:00:00', '2013-05-19 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `groups_permissions`
--

CREATE TABLE IF NOT EXISTS `groups_permissions` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(5) unsigned NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `groups_permissions`
--

INSERT INTO `groups_permissions` (`id`, `group_id`, `permission_id`) VALUES
(2, 2, 1),
(3, 2, 2),
(4, 3, 3),
(5, 3, 4),
(6, 3, 5),
(7, 2, 7),
(8, 3, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `groups_users`
--

CREATE TABLE IF NOT EXISTS `groups_users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(5) unsigned NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `groups_users`
--

INSERT INTO `groups_users` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 4),
(5, 3, 11),
(6, 3, 12),
(7, 3, 13),
(8, 3, 14),
(10, 3, 16),
(11, 3, 17),
(12, 3, 5),
(13, 3, 6),
(14, 3, 7),
(15, 3, 9),
(16, 3, 10),
(17, 3, 18),
(18, 3, 19),
(19, 3, 20),
(20, 3, 21),
(21, 3, 23),
(22, 3, 24),
(23, 3, 26),
(24, 3, 27),
(25, 3, 28),
(26, 3, 29),
(27, 3, 30),
(28, 3, 31),
(29, 3, 32),
(30, 3, 33),
(31, 3, 34),
(32, 3, 35),
(33, 3, 36),
(34, 3, 37),
(35, 3, 38),
(36, 3, 39),
(37, 3, 40),
(38, 3, 41),
(39, 3, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created`, `modified`) VALUES
(1, '*:*', '2013-05-18 00:00:00', '2013-05-18 00:00:00'),
(2, 'posts:*', '2013-05-19 08:39:56', '2013-05-19 08:39:56'),
(3, 'posts:edit', '2013-05-19 00:00:00', '2013-05-19 00:00:00'),
(4, 'posts:add', '2013-05-19 00:00:00', '2013-05-19 00:00:00'),
(5, 'posts:delete', '2013-05-19 00:00:00', '2013-05-19 00:00:00'),
(6, 'posts:delete', '2013-05-19 00:00:00', '2013-05-19 00:00:00'),
(7, 'tags:*', '2013-05-19 00:00:00', '2013-05-19 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `message`, `created`, `modified`, `user_id`) VALUES
(10, 'fdgfs', 'fdsfw34', 'feds', '2013-05-13 10:48:51', '2013-05-13 10:48:51', 1),
(11, '4324', 'rewf', 'cfds', '2013-05-13 10:49:04', '2013-05-13 10:49:04', 0),
(12, 'dsasdv', 'vsdvd', 'vds', '2013-05-13 11:00:41', '2013-05-13 11:00:41', 1),
(13, '11111111', '11111111', '111111111', '2013-05-13 11:00:52', '2013-05-13 11:00:52', 0),
(15, '333333', '44444433', '33', '2013-05-13 11:01:12', '2013-05-13 11:01:12', 0),
(16, '444', '44', '44', '2013-05-13 11:01:20', '2013-05-13 11:01:20', 0),
(17, '55', '55', '55dew', '2013-05-13 11:01:27', '2013-05-19 11:31:01', 0),
(18, '66', '66', '66', '2013-05-13 11:01:35', '2013-05-13 11:01:35', 2),
(19, '77', '777', '7', '2013-05-13 11:01:42', '2013-05-13 11:01:42', 0),
(20, '88', '88', '88k', '2013-05-13 11:01:49', '2013-05-19 11:43:41', 0),
(22, '00', '76dejhk', '76', '2013-05-13 11:02:04', '2013-05-19 11:43:54', 0),
(23, 'fds', 'fds', 'fds7', '2013-05-13 20:22:22', '2013-05-19 11:25:42', 0),
(24, 'fdsf', 'fdsfds', 'fds', '2013-05-13 23:42:54', '2013-05-13 23:42:54', 4),
(25, 'dasda', 'dasdsa', 'dasda', '2013-05-13 23:53:08', '2013-05-13 23:53:08', 4),
(27, 'ljlkj', 'jlj', 'kj;', '2013-05-19 09:18:30', '2013-05-19 09:18:30', 3),
(29, 'xxx', 'xxx', 'xxx', '2013-05-19 11:16:16', '2013-05-19 11:16:16', 4),
(32, 'sss', 'sfsdfs', 'fsdfsdfsdfdsfds', '2013-05-19 19:14:47', '2013-05-19 19:14:47', 4),
(33, 'ew', 'ew', 'ew', '2013-05-19 19:22:58', '2013-05-19 19:22:58', 4),
(34, 's', 's', 's', '2013-05-19 19:24:20', '2013-05-19 19:24:20', 4),
(35, 'xsa', 'sa', 'sa', '2013-05-19 19:27:33', '2013-05-19 19:27:33', 2),
(36, 'yyy', 'hhgkljlk', 'iui  iiopi ioi[ij k ljj kj;', '2013-05-19 23:46:48', '2013-05-20 00:25:34', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `posts_tags`
--

CREATE TABLE IF NOT EXISTS `posts_tags` (
  `post_id` smallint(5) unsigned NOT NULL,
  `tag_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `token` varchar(80) NOT NULL,
  `confirm_time` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `token`, `confirm_time`, `active`, `created`, `modified`) VALUES
(2, 'kopuzja', 'kopuzja', 'kopuzja@ukr.net', '9cbd040c2c19c27a600ccc952b160692e1147af6', '', 0, 1, '2013-05-19 08:22:41', '2013-05-19 08:22:41'),
(3, 'moderator', 'moderator', 'moderator@ukr.net', 'c22b6f00d4b1b61149818b9925cf6198beec67a9', '', 0, 1, '2013-05-19 09:14:09', '2013-05-19 09:14:09'),
(4, 'user', 'user', 'user@ukr.net', '3d6521db3a001b659dfc96dd2278535b5634afde', '', 0, 1, '2013-05-19 09:16:32', '2013-05-19 09:16:32'),
(5, 'yura', 'savchuk', 'test@if.ua', 'd48b7fbbde73490b0c1f3d0832a9050f7538d282', '', 0, 1, '2013-05-27 15:24:26', '2013-05-27 15:24:26'),
(6, 'qwerty', 'uiopasdf', 'qwerty@ukr.net', 'c05eb7c1dea502c93190849a327eef6b9d92254b', '', 0, 0, '2013-05-27 16:55:01', '2013-05-27 16:55:01'),
(7, 'dsdas', 'dgerfewf', 'www@www.www', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 16:58:01', '2013-05-27 16:58:01'),
(9, '21321', '213213', 'cw@if.ua', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:40:58', '2013-05-27 17:40:58'),
(10, 'asdf', 'asdfghj', 'q@if.ua', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:45:01', '2013-05-27 17:45:01'),
(11, 'das', 'dewewf', 'a@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:45:52', '2013-05-27 17:45:52'),
(12, 'sa', 'dsds', 'e@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:55:21', '2013-05-27 17:55:21'),
(13, 'dsa', 'dsassa', 'q@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:56:50', '2013-05-27 17:56:50'),
(14, 'dasd', 'dsa', 'qw@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 17:58:35', '2013-05-27 17:58:35'),
(15, 'zzz', 'aaa', 'z@zzz.zzz', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 18:11:26', '2013-05-27 18:11:26'),
(16, 'sa', 'dsad', 'x@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '', 0, 0, '2013-05-27 18:12:50', '2013-05-27 18:12:50'),
(17, 'aaa', 'zzz', 'zzz@zzz.zzz', 'ecece490bbf47618e754b591f6dd05eb58698a81', '81f06542781ebdb8a515aa5e3939705f8003900f', 0, 0, '2013-05-27 18:19:01', '2013-05-27 18:19:01'),
(18, 'fdff', 'eerferfef', 'qqq@q.qq', 'ecece490bbf47618e754b591f6dd05eb58698a81', '3a6518e314188c5f04096b7eaafe845d8a8a0779', 0, 0, '2013-05-27 18:41:45', '2013-05-27 18:41:45'),
(19, 'gfgf', 'fsdsdfsdfsdf', 'a@a.aa', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a39b74-3358-49af-972c-098cf421fc1a', 0, 0, '2013-05-27 20:44:21', '2013-05-27 20:44:21'),
(20, 'dasd', 'dsaddas', 'wqwe@dwqd.das', '0a46e08bb93f826625a5152eb49ecbd533e8e890', '51a39d1b-5e38-42e8-b5e3-098cf421fc1a', 0, 0, '2013-05-27 20:51:23', '2013-05-27 20:51:23'),
(21, 'dsaf', 'fdsfsdfdsf', 'yuras@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3a208-6410-452f-9b8b-098cf421fc1a', 0, 0, '2013-05-27 21:12:24', '2013-05-27 21:12:24'),
(23, 'eeeeeeeeeeee', 'dddddddddd', 'qqqqqq@qqqq.dsds', '2c7f3ceab59f1d91da4f6840c9fe3b69666c0610', '51a3a2b0-6b18-4cd1-9551-098cf421fc1a', 0, 1, '2013-05-27 21:15:12', '2013-05-27 21:15:12'),
(24, 'ffdff', 'dfdfdfdfd', 'ff@ff.ff', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3a63b-4404-4d79-adc7-098cf421fc1a', 0, 1, '2013-05-27 21:30:19', '2013-05-27 21:30:19'),
(26, 'vanja', 'xxxxx', 'qa@if.ua', 'c221f8a4de8efaa549be850e5c2891743d86195c', '51a3a6ff-bee4-41e4-b990-098cf421fc1a', 0, 0, '2013-05-27 21:33:35', '2013-05-27 21:33:35'),
(27, 'qqq', 'wwww', 'a@ukr.ua', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3a778-9f84-4b5e-af9d-098cf421fc1a', 0, 0, '2013-05-27 21:35:36', '2013-05-27 21:35:36'),
(28, 'fssdf', 'fdsfsdfds', 'sss@ff.fd', '0a46e08bb93f826625a5152eb49ecbd533e8e890', '51a3c040-6718-4bab-8aa5-098cf421fc1a', 0, 0, '2013-05-27 23:21:21', '2013-05-27 23:21:21'),
(29, 'ddd', 'dsadad', 'kkk@kk.jj', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3c0ea-5068-4c52-a486-098cf421fc1a', 0, 0, '2013-05-27 23:24:10', '2013-05-27 23:24:10'),
(30, 'ee', 'eeeee', 'e@ee.ee', 'e247bc7b248db0e51909a8075cf90e536009ce04', '51a3c437-2124-44a0-8d65-098cf421fc1a', 0, 0, '2013-05-27 23:38:15', '2013-05-27 23:38:15'),
(31, '213', '213d', 'e@ee.eee', '0a46e08bb93f826625a5152eb49ecbd533e8e890', '51a3c474-5e10-4766-8784-098cf421fc1a', 0, 0, '2013-05-27 23:39:16', '2013-05-27 23:39:16'),
(32, 'ewew', 'dssdsdfsd', 'k@lj.gd', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3c978-6e94-49b5-bd8a-098cf421fc1a', 0, 0, '2013-05-28 00:00:40', '2013-05-28 00:00:40'),
(33, 'dsdds', 'fsdfsd', 'rr@rr.rr', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3c9f5-57a0-47a5-850f-098cf421fc1a', 0, 0, '2013-05-28 00:02:45', '2013-05-28 00:02:45'),
(34, 'fdsfds', 'gfdghfhd', 'ii@i.hh', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3ca28-164c-4a6d-9ed8-098cf421fc1a', 0, 0, '2013-05-28 00:03:36', '2013-05-28 00:03:36'),
(35, 'fssfs', 'fsdfsdfsd', 'yy@gf.gf', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3ca8c-2338-4196-8f51-098cf421fc1a', 0, 0, '2013-05-28 00:05:16', '2013-05-28 00:05:16'),
(36, 'gvfdh', 'jjjjjjjjjj', 'dd@gg.gg', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a3cec3-9018-439b-9ee9-098cf421fc1a', 0, 0, '2013-05-28 00:23:16', '2013-05-28 00:23:16'),
(37, 'ddd', 'nnn', 'hhh@ukr.net', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a424c4-a67c-4381-b6dd-1334f421fc1a', 0, 0, '2013-05-28 06:30:12', '2013-05-28 06:30:12'),
(38, 'gtrg', 'nvbnb', 'vvv@hh.gg', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a42532-f510-4694-99bc-1334f421fc1a', 0, 0, '2013-05-28 06:32:02', '2013-05-28 06:32:02'),
(39, 'fdsfd', 'fdfds', 'lll@ukr.net', 'e247bc7b248db0e51909a8075cf90e536009ce04', '51a432ac-063c-48da-a90d-1334f421fc1a', 0, 0, '2013-05-28 07:29:32', '2013-05-28 07:29:32'),
(40, 'vfdfg', 'fdsfsdfdsf', 'rr@rr.rrr', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a434ff-1250-4a5b-b72b-1334f421fc1a', 0, 0, '2013-05-28 07:39:27', '2013-05-28 07:39:27'),
(41, 'fdsfsdf', 'fsdghgfhgf', 'ggg@gg.gg', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a43524-e09c-4904-84fa-1334f421fc1a', 0, 0, '2013-05-28 07:40:04', '2013-05-28 07:40:04'),
(42, 'fbvdv', 'fdsfsdfdsfsdf', 'll@kk.tt', 'ecece490bbf47618e754b591f6dd05eb58698a81', '51a436cd-4540-41d6-9429-1334f421fc1a', 0, 0, '2013-05-28 07:47:09', '2013-05-28 07:47:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
