SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `current_competences`
--

CREATE TABLE `current_competences` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `technology_id` int(10) UNSIGNED NOT NULL,
  `level` smallint(6) NOT NULL,
  `since` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_competences`
--

CREATE TABLE `history_competences` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `technology_id` int(10) UNSIGNED DEFAULT NULL,
  `handled_by` int(10) UNSIGNED DEFAULT NULL,
  `level` smallint(6) NOT NULL,
  `type` enum('rejected','validated') COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:enum_history_type)',
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_competences`
--

CREATE TABLE `pending_competences` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `technology_id` int(10) UNSIGNED NOT NULL,
  `level` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technology_tags`
--

CREATE TABLE `technology_tags` (
  `technology_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technology_validators`
--

CREATE TABLE `technology_validators` (
  `technology_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` longtext COLLATE utf8_unicode_ci,
  `role` enum('ROLE_ADMIN','ROLE_MANAGER','ROLE_VALIDATOR','ROLE_USER') COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:enum_role_type)',
  `agency` enum('BRA','BUC','CLU','IAS') COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:enum_agency_type)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_competences`
--
ALTER TABLE `current_competences`
  ADD PRIMARY KEY (`user_id`,`technology_id`),
  ADD KEY `IDX_65F4DC17A76ED395` (`user_id`),
  ADD KEY `IDX_65F4DC174235D463` (`technology_id`);

--
-- Indexes for table `history_competences`
--
ALTER TABLE `history_competences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `IDX_450A70A7A76ED395` (`user_id`),
  ADD KEY `IDX_450A70A74235D463` (`technology_id`),
  ADD KEY `IDX_450A70A753689D12` (`handled_by`);

--
-- Indexes for table `pending_competences`
--
ALTER TABLE `pending_competences`
  ADD PRIMARY KEY (`user_id`,`technology_id`),
  ADD KEY `IDX_8084F80AA76ED395` (`user_id`),
  ADD KEY `IDX_8084F80A4235D463` (`technology_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `technology_tags`
--
ALTER TABLE `technology_tags`
  ADD PRIMARY KEY (`technology_id`,`tag_id`),
  ADD KEY `IDX_C9BFEE2C4235D463` (`technology_id`),
  ADD KEY `IDX_C9BFEE2CBAD26311` (`tag_id`);

--
-- Indexes for table `technology_validators`
--
ALTER TABLE `technology_validators`
  ADD PRIMARY KEY (`technology_id`,`user_id`),
  ADD KEY `IDX_53F2722D4235D463` (`technology_id`),
  ADD KEY `IDX_53F2722DA76ED395` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E95F37A13B` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_competences`
--
ALTER TABLE `history_competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `current_competences`
--
ALTER TABLE `current_competences`
  ADD CONSTRAINT `FK_65F4DC174235D463` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`),
  ADD CONSTRAINT `FK_65F4DC17A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `history_competences`
--
ALTER TABLE `history_competences`
  ADD CONSTRAINT `FK_450A70A74235D463` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`),
  ADD CONSTRAINT `FK_450A70A753689D12` FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_450A70A7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pending_competences`
--
ALTER TABLE `pending_competences`
  ADD CONSTRAINT `FK_8084F80A4235D463` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`),
  ADD CONSTRAINT `FK_8084F80AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `technology_tags`
--
ALTER TABLE `technology_tags`
  ADD CONSTRAINT `FK_C9BFEE2C4235D463` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`),
  ADD CONSTRAINT `FK_C9BFEE2CBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `technology_validators`
--
ALTER TABLE `technology_validators`
  ADD CONSTRAINT `FK_53F2722D4235D463` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`),
  ADD CONSTRAINT `FK_53F2722DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
