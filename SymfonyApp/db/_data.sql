--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `picture`, `role`, `agency`) VALUES
(1, 'lmolnar', 'Levente Molnar', 'lmolnar@pentalog.com', NULL, 'ROLE_USER', 'CLU'),
(2, 'rmurzea', 'Radu Murzea', 'rmurzea@pentalog.com', NULL, 'ROLE_ADMIN', 'CLU'),
(3, 'sbutnariu', 'Silviu Butnariu', 'sbutnariu@pentalog.com', NULL, 'ROLE_ADMIN', 'CLU'),
(5, 'cnitu', 'Cosmin Nitu', 'cnitu@pentalog.com', NULL, 'ROLE_VALIDATOR', 'CLU'),
(6, 'etobias', 'Elod Tobias', 'etobias@pentalog.com', NULL, 'ROLE_VALIDATOR', 'CLU'),
(7, 'adumitriu', 'Adrian Dumitriu', 'adumitriu@pentalog.com', NULL, 'ROLE_USER', 'BRA'),
(8, 'acocea', 'Adriana Cocea', 'acocea@pentalog.com', NULL, 'ROLE_USER', 'BUC'),
(9, 'amovila', 'Alex Movila', 'amovila@pentalog.com', NULL, 'ROLE_USER', 'CLU'),
(10, 'anegurita', 'Alexandru Negurita', 'anegurita@pentalog.com', NULL, 'ROLE_VALIDATOR', 'BRA'),
(11, 'bchristol', 'Blandine Christol', 'bchristol@pentalog.com', NULL, 'ROLE_USER', 'BRA'),
(12, 'bcojocariu', 'Bogdan Cojocariu', 'bcojocariu@pentalog.com', NULL, 'ROLE_VALIDATOR', 'CLU'),
(13, 'cafilip', 'Calin Filip', 'cafilip@pentalog.com', NULL, 'ROLE_VALIDATOR', 'BUC'),
(14, 'chuzum', 'Catalin Huzum', 'chuzum@pentalog.com', NULL, 'ROLE_USER', 'CLU'),
(15, 'cdad', 'Ciprian Dad', 'cdad@pentalog.com', NULL, 'ROLE_USER', 'CLU'),
(16, 'cbibu', 'Claudia Bibu', 'cbibu@pentalog.com', NULL, 'ROLE_USER', 'CLU'),
(17, 'cteslaru', 'Corina Teslaru', 'cteslaru@pentalog.com', NULL, 'ROLE_USER', 'IAS');

-- --------------------------------------------------------

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'frontend'),
(2, 'javascript'),
(3, 'backend'),
(4, 'php'),
(5, 'databases'),
(6, 'desktop');

-- --------------------------------------------------------

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `picture`) VALUES
(1, 'Symfony 2', 'web/technology_icons/symfony.jpg'),
(2, 'Symfony 3', 'web/technology_icons/symfony.jpg'),
(3, 'AngularJS', 'web/technology_icons/angularjs.png'),
(4, 'PHP', 'web/technology_icons/php.png'),
(5, 'Javascript', 'web/technology_icons/javascript.png'),
(6, 'Java', 'web/technology_icons/java.png'),
(7, 'Python', 'web/technology_icons/python.png'),
(8, 'SQL', 'web/technology_icons/sql.png'),
(9, 'CSS', 'web/technology_icons/css.png'),
(10, '.NET', 'web/technology_icons/dotnet.png');

-- --------------------------------------------------------

--
-- Dumping data for table `current_competences`
--

INSERT INTO `current_competences` (`user_id`, `technology_id`, `level`) VALUES
(1, 2, 7),
(1, 4, 8),
(1, 5, 2),
(1, 8, 6),
(1, 9, 3),
(2, 1, 7),
(2, 2, 5),
(2, 4, 8),
(2, 5, 2),
(2, 6, 4),
(2, 8, 7),
(2, 9, 3),
(2, 10, 1),
(3, 1, 7),
(3, 2, 4),
(3, 3, 1),
(3, 4, 7),
(3, 5, 2),
(3, 6, 5),
(3, 8, 6),
(3, 9, 4),
(5, 1, 4),
(5, 4, 9),
(5, 5, 6),
(5, 6, 5),
(5, 8, 3),
(5, 9, 1),
(5, 10, 7),
(6, 2, 3),
(6, 4, 5),
(6, 5, 8),
(6, 6, 2),
(6, 7, 6),
(6, 8, 7),
(6, 9, 4),
(6, 10, 1),
(7, 1, 4),
(7, 2, 7),
(7, 3, 8),
(7, 5, 2),
(7, 6, 5),
(7, 7, 7),
(7, 8, 8),
(7, 9, 3),
(7, 10, 6),
(8, 3, 5),
(8, 5, 7),
(8, 7, 8),
(8, 8, 3),
(8, 9, 4),
(8, 10, 4),
(9, 1, 7),
(9, 2, 8),
(9, 3, 3),
(9, 4, 5),
(9, 7, 7),
(9, 8, 7),
(9, 9, 6),
(10, 1, 5),
(10, 3, 7),
(10, 4, 10),
(10, 5, 6),
(10, 6, 7),
(10, 7, 5),
(10, 8, 5),
(10, 9, 8),
(10, 10, 4),
(11, 2, 7),
(11, 3, 7),
(11, 4, 6),
(11, 7, 5),
(11, 8, 4),
(11, 9, 8),
(11, 10, 7),
(12, 1, 3),
(12, 2, 3),
(12, 3, 8),
(12, 4, 5),
(12, 6, 1),
(12, 8, 3),
(12, 9, 4),
(12, 10, 9),
(13, 1, 5),
(13, 2, 6),
(13, 3, 7),
(13, 4, 10),
(13, 7, 2),
(13, 9, 3),
(13, 10, 8),
(14, 1, 5),
(14, 2, 4),
(14, 4, 6),
(14, 7, 8),
(14, 8, 2),
(14, 9, 6),
(14, 10, 9),
(15, 3, 5),
(15, 5, 5),
(15, 6, 6),
(15, 7, 8),
(15, 8, 4),
(15, 9, 2),
(15, 10, 1),
(16, 4, 2),
(16, 6, 5),
(16, 7, 6),
(16, 9, 2),
(16, 10, 3),
(17, 2, 3),
(17, 4, 6),
(17, 7, 3),
(17, 9, 9);

-- --------------------------------------------------------

--
-- Dumping data for table `history_competences`
--

INSERT INTO `history_competences` (`id`, `user_id`, `technology_id`, `handled_by`, `level`, `type`, `event_date`) VALUES
(1, 1, 2, 5, 7, 'validated', '2017-08-30 15:34:26'),
(2, 1, 2, 5, 7, 'validated', '2017-08-30 15:34:26'),
(3, 1, 4, 5, 8, 'validated', '2017-08-30 15:38:22'),
(4, 1, 5, 6, 2, 'validated', '2017-08-30 15:39:47'),
(5, 1, 8, 5, 6, 'validated', '2017-08-30 15:40:55'),
(6, 1, 9, 6, 3, 'validated', '2017-08-30 15:41:30'),
(7, 2, 1, 5, 7, 'validated', '2017-09-01 10:14:44'),
(8, 2, 2, 5, 5, 'validated', '2017-09-01 10:16:41'),
(9, 2, 4, 5, 8, 'validated', '2017-09-01 10:17:26'),
(10, 2, 5, 6, 2, 'validated', '2017-09-01 10:19:04'),
(11, 2, 6, 5, 4, 'validated', '2017-09-01 10:20:10'),
(12, 2, 8, 5, 7, 'validated', '2017-09-01 10:20:44'),
(13, 2, 9, 6, 3, 'validated', '2017-09-01 10:21:55'),
(14, 2, 10, 5, 1, 'validated', '2017-09-01 10:22:17'),
(15, 3, 1, 5, 7, 'validated', '2017-09-01 10:22:17'),
(16, 3, 2, 5, 4, 'validated', '2017-09-01 20:51:49'),
(17, 3, 3, 6, 1, 'validated', '2017-09-01 20:52:17'),
(18, 3, 4, 5, 7, 'validated', '2017-09-01 20:52:58'),
(19, 3, 5, 6, 2, 'validated', '2017-09-01 20:54:13'),
(20, 3, 8, 5, 6, 'validated', '2017-09-01 20:55:22'),
(21, 3, 9, 6, 4, 'validated', '2017-09-01 20:57:01'),
(22, 5, 1, 5, 4, 'validated', '2017-09-02 15:34:26'),
(23, 5, 4, 5, 9, 'validated', '2017-09-02 15:34:26'),
(24, 5, 5, 6, 6, 'validated', '2017-09-02 15:38:22'),
(25, 5, 6, 5, 5, 'validated', '2017-09-02 15:39:47'),
(26, 5, 8, 5, 3, 'validated', '2017-09-02 15:40:55'),
(27, 5, 9, 6, 1, 'validated', '2017-09-02 15:41:30'),
(28, 6, 2, 5, 3, 'validated', '2017-09-03 10:14:44'),
(29, 6, 4, 5, 5, 'validated', '2017-09-03 10:16:41'),
(30, 6, 5, 6, 8, 'validated', '2017-09-03 10:17:26'),
(31, 6, 6, 5, 2, 'validated', '2017-09-03 10:19:04'),
(32, 6, 7, 6, 6, 'validated', '2017-09-03 10:20:10'),
(33, 6, 8, 5, 7, 'validated', '2017-09-03 10:20:44'),
(34, 6, 9, 6, 4, 'validated', '2017-09-03 10:21:55'),
(35, 6, 10, 5, 1, 'validated', '2017-09-03 10:22:17'),
(36, 7, 1, 5, 4, 'validated', '2017-09-03 10:22:17'),
(37, 7, 2, 5, 7, 'validated', '2017-09-03 20:51:49'),
(39, 7, 3, 6, 8, 'validated', '2017-09-03 20:51:49'),
(40, 7, 5, 6, 2, 'validated', '2017-09-03 20:52:58'),
(41, 7, 6, 5, 5, 'validated', '2017-09-03 20:54:13'),
(42, 7, 7, 6, 7, 'validated', '2017-09-03 20:55:22'),
(43, 7, 8, 5, 8, 'validated', '2017-09-03 20:57:01'),
(44, 7, 9, 6, 3, 'validated', '2017-09-04 15:34:26'),
(45, 7, 10, 5, 6, 'validated', '2017-09-04 15:34:26'),
(46, 8, 3, 6, 5, 'validated', '2017-09-04 15:38:22'),
(47, 8, 5, 6, 7, 'validated', '2017-09-04 15:39:47'),
(48, 8, 7, 6, 8, 'validated', '2017-09-04 15:40:55'),
(49, 8, 8, 5, 3, 'validated', '2017-09-04 15:41:30'),
(50, 8, 9, 6, 4, 'validated', '2017-09-05 10:14:44'),
(51, 8, 10, 5, 4, 'validated', '2017-09-05 10:16:41'),
(52, 9, 1, 5, 7, 'validated', '2017-09-05 10:17:26'),
(53, 9, 2, 5, 8, 'validated', '2017-09-05 10:19:04'),
(54, 9, 3, 6, 3, 'validated', '2017-09-05 10:20:10'),
(55, 9, 4, 5, 5, 'validated', '2017-09-05 10:20:44'),
(56, 9, 7, 6, 7, 'validated', '2017-09-05 10:21:55'),
(57, 9, 8, 5, 7, 'validated', '2017-09-05 10:22:17'),
(58, 9, 9, 6, 6, 'validated', '2017-09-05 10:22:17'),
(59, 10, 1, 5, 5, 'validated', '2017-09-05 20:51:49'),
(60, 10, 3, 6, 7, 'validated', '2017-09-05 20:51:49'),
(61, 10, 4, 5, 10, 'validated', '2017-09-05 20:52:58'),
(62, 10, 5, 6, 6, 'validated', '2017-09-05 20:54:13'),
(63, 10, 6, 5, 7, 'validated', '2017-09-05 20:55:22'),
(64, 10, 7, 6, 5, 'validated', '2017-09-05 20:57:01'),
(65, 10, 8, 5, 5, 'validated', '2017-09-06 10:14:44'),
(66, 10, 9, 6, 8, 'validated', '2017-09-06 10:16:41'),
(67, 10, 10, 5, 4, 'validated', '2017-09-06 10:17:26'),
(68, 11, 2, 5, 7, 'validated', '2017-09-06 10:19:04'),
(69, 11, 3, 6, 7, 'validated', '2017-09-06 10:20:10'),
(70, 11, 4, 5, 6, 'validated', '2017-09-06 10:20:44'),
(71, 11, 7, 6, 5, 'validated', '2017-09-06 10:21:55'),
(72, 11, 8, 5, 4, 'validated', '2017-09-06 10:22:17'),
(73, 11, 9, 6, 8, 'validated', '2017-09-06 20:51:49'),
(74, 11, 10, 5, 7, 'validated', '2017-09-06 20:52:58'),
(75, 12, 1, 5, 3, 'validated', '2017-09-06 20:54:13'),
(76, 12, 2, 5, 3, 'validated', '2017-09-06 20:55:22'),
(77, 12, 3, 6, 8, 'validated', '2017-09-06 20:57:01'),
(78, 12, 4, 5, 5, 'validated', '2017-09-07 10:14:44'),
(79, 12, 6, 5, 1, 'validated', '2017-09-07 10:16:41'),
(80, 12, 8, 5, 3, 'validated', '2017-09-07 10:17:26'),
(81, 12, 9, 6, 4, 'validated', '2017-09-07 10:19:04'),
(82, 12, 10, 5, 9, 'validated', '2017-09-07 10:20:10'),
(83, 13, 1, 5, 5, 'validated', '2017-09-07 10:20:44'),
(84, 13, 2, 5, 6, 'validated', '2017-09-07 10:21:55'),
(85, 13, 3, 6, 7, 'validated', '2017-09-07 10:22:17'),
(86, 13, 4, 5, 10, 'validated', '2017-09-07 15:34:26'),
(87, 13, 7, 6, 2, 'validated', '2017-09-07 15:38:22'),
(88, 13, 9, 6, 3, 'validated', '2017-09-07 15:39:47'),
(89, 13, 10, 5, 8, 'validated', '2017-09-07 15:40:55'),
(90, 14, 1, 5, 5, 'validated', '2017-09-07 15:41:30'),
(91, 14, 2, 5, 4, 'validated', '2017-09-07 20:51:49'),
(92, 14, 4, 5, 6, 'validated', '2017-09-07 20:52:58'),
(93, 14, 7, 6, 8, 'validated', '2017-09-07 20:54:13'),
(94, 14, 8, 5, 2, 'validated', '2017-09-07 20:55:22'),
(95, 14, 9, 6, 6, 'validated', '2017-09-01 10:14:44'),
(96, 14, 10, 5, 9, 'validated', '2017-09-01 10:16:41'),
(97, 15, 3, 6, 5, 'validated', '2017-09-01 10:17:26'),
(98, 15, 5, 6, 5, 'validated', '2017-09-01 10:19:04'),
(99, 15, 6, 5, 6, 'validated', '2017-09-01 10:20:10'),
(100, 15, 7, 6, 8, 'validated', '2017-09-01 10:20:44'),
(101, 15, 8, 5, 4, 'validated', '2017-09-01 10:21:55'),
(102, 15, 9, 6, 2, 'validated', '2017-09-01 10:22:17'),
(103, 15, 10, 5, 1, 'validated', '2017-09-01 15:34:26'),
(104, 16, 4, 5, 2, 'validated', '2017-09-01 15:38:22'),
(105, 16, 6, 5, 5, 'validated', '2017-09-01 15:39:47'),
(106, 16, 7, 6, 6, 'validated', '2017-09-01 15:40:55'),
(107, 16, 9, 6, 2, 'validated', '2017-09-01 15:41:30'),
(108, 16, 10, 5, 3, 'validated', '2017-09-01 20:51:49'),
(109, 17, 2, 5, 3, 'validated', '2017-09-01 20:52:58'),
(110, 17, 4, 5, 6, 'validated', '2017-09-01 20:54:13'),
(111, 17, 7, 6, 3, 'validated', '2017-09-01 20:55:22'),
(112, 17, 9, 6, 9, 'validated', '2017-09-01 20:57:01');

-- --------------------------------------------------------

--
-- Dumping data for table `pending_competences`
--

INSERT INTO `pending_competences` (`user_id`, `technology_id`, `level`) VALUES
(1, 5, 4),
(1, 9, 6),
(2, 4, 9),
(3, 7, 3);

-- --------------------------------------------------------

--
-- Dumping data for table `technology_tags`
--

INSERT INTO `technology_tags` (`technology_id`, `tag_id`) VALUES
(1, 3),
(1, 4),
(3, 1),
(3, 2),
(4, 4),
(5, 2),
(6, 6),
(7, 3),
(8, 3),
(8, 5),
(9, 1),
(10, 6);

-- --------------------------------------------------------

--
-- Dumping data for table `technology_validators`
--

INSERT INTO `technology_validators` (`technology_id`, `user_id`) VALUES
(1, 5),
(2, 5),
(3, 6),
(4, 5),
(5, 6),
(6, 5),
(7, 6),
(8, 5),
(9, 6),
(10, 5);
