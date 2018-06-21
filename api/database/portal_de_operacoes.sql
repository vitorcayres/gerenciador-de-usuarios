-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2018 às 15:17
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_de_operacoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_user`
--

CREATE TABLE `log_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `entity` varchar(20) NOT NULL,
  `action` varchar(45) NOT NULL,
  `before_act` text,
  `after_act` text,
  `remote_addr` varchar(25) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `http_x_forwarded_for` varchar(255) DEFAULT NULL,
  `http_referer` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission`
--

CREATE TABLE `permission` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission`
--

INSERT INTO `permission` (`id`, `description`, `name`, `create_date`, `updated_at`) VALUES
(1, 'ADM | List User', 'adm-list-user', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(2, 'ADM | New User', 'adm-new-user', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(3, 'ADM | Administrative', 'adm-admin', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(4, 'ADM | List Workplaces', 'adm-list-workplace', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(5, 'ADM | New Workplaces', 'adm-new-workplace', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(6, 'ADM | List Perfis', 'adm-list-perfil', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(7, 'ADM | New Perfil', 'adm-new-perfil', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(8, 'ADM | List Permissions', 'adm-list-permission', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(9, 'ADM | New Permission', 'adm-new-permission', '2015-07-27 22:46:48', '2018-06-21 12:20:37'),
(10, 'ADM | Index', 'adm-admin-index', '2015-08-13 20:20:45', '2018-06-21 12:20:37'),
(11, 'ADM | Remove Perfil', 'adm-remove-perfil', '2015-08-17 18:19:56', '2018-06-21 12:20:37'),
(12, 'ADM | Modify Perfil', 'adm-modify-perfil', '2015-08-17 18:20:04', '2018-06-21 12:20:37'),
(13, 'ADM | Modify Workplace', 'adm-modify-workplace', '2015-08-17 18:33:08', '2018-06-21 12:20:37'),
(14, 'ADM | Remove Workplace', 'adm-remove-workplace', '2015-08-17 18:33:16', '2018-06-21 12:20:37'),
(15, 'ADM | Remove Permission', 'adm-remove-permission', '2015-08-17 18:33:24', '2018-06-21 12:20:37'),
(16, 'ADM | Modify Permission', 'adm-modify-permission', '2015-08-17 18:33:34', '2018-06-21 12:20:37'),
(17, 'General | Change Password', 'change-password', '2015-08-18 14:46:23', '2018-06-21 12:20:37'),
(18, 'ADM | Change Password', 'adm-change-password', '2015-08-18 15:02:31', '2018-06-21 12:20:37'),
(19, 'ADM | Modify User', 'adm-modify-user', '2015-08-18 21:36:03', '2018-06-21 12:20:37'),
(20, 'ADM | Remove User', 'adm-remove-user', '2015-08-18 21:36:10', '2018-06-21 12:20:37'),
(21, 'ADM | List Customer Service', 'adm-list-customer-service', '2017-02-13 10:33:23', '2018-06-21 12:20:37'),
(24, 'ADM | New Customer Service', 'adm-new-customer-service', '2017-02-13 10:51:49', '2018-06-21 12:20:37'),
(27, 'ADM | Modify Customer Service', 'adm-modify-customer-service', '2017-02-13 10:52:25', '2018-06-21 12:20:37'),
(30, 'ADM | Remove Customer Service', 'adm-remove-customer-service', '2017-02-13 10:52:53', '2018-06-21 12:20:37'),
(55, 'ADM | List Consultation Report', 'adm-list-consultation-report', '2017-02-14 11:17:17', '2018-06-21 12:20:37'),
(58, 'ADM | New Consultation Report', 'adm-new-consultation-report', '2017-02-14 11:17:41', '2018-06-21 12:20:37'),
(61, 'ADM | Modify Consultation Report', 'adm-modify-consultation-report', '2017-02-14 11:47:34', '2018-06-21 12:20:37'),
(64, 'ADM | Remove Consultation Report', 'adm-remove-consultation-report', '2017-02-14 11:48:14', '2018-06-21 12:20:37'),
(65, 'ADM | List Consultation Report', 'adm-list-report-consultation', '2017-02-15 23:20:43', '2018-06-21 12:20:37'),
(66, 'ADM | List Complaint', 'adm-list-complaint', '2017-04-13 16:51:03', '2018-06-21 12:20:37'),
(69, 'ADM | Upload Complaint', 'adm-upload-complaint', '2017-04-13 17:48:12', '2018-06-21 12:20:37'),
(70, 'ADM | Modify Complaint', 'adm-modify-complaint', '2017-04-17 19:02:20', '2018-06-21 12:20:37'),
(73, 'ADM | Remove Complaint', 'adm-remove-complaint', '2017-04-17 19:02:34', '2018-06-21 12:20:37'),
(76, 'ADM | New Complaint', 'adm-new-complaint', '2017-04-17 19:02:56', '2018-06-21 12:20:37'),
(77, 'ADM | Export Complaint', 'adm-export-complaint', '2017-04-17 19:44:19', '2018-06-21 12:20:37'),
(78, 'ADM | Logger', 'adm-logger', '2017-06-30 17:26:53', '2018-06-21 12:20:37'),
(79, 'ADM | Backup Complaint', 'adm-backup-complaint', '2017-07-19 12:03:04', '2018-06-21 12:20:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '-1',
  `force_pass_change` tinyint(1) NOT NULL DEFAULT '-1',
  `password` varchar(255) NOT NULL,
  `usergroup_id` bigint(20) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `name` varchar(150) NOT NULL,
  `superuser` tinyint(4) DEFAULT '-1',
  `workplace_id` int(11) UNSIGNED DEFAULT NULL,
  `last_change_password` timestamp NULL DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `enabled`, `force_pass_change`, `password`, `usergroup_id`, `username`, `name`, `superuser`, `workplace_id`, `last_change_password`, `create_date`, `updated_at`) VALUES
(180, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'vitor.cayres', 'Vitor Cayres', 1, 1, NULL, '2018-06-19 17:43:37', '2018-06-19 17:43:37'),
(182, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'teste', 'Vitor Cayres', 1, 1, NULL, '2018-06-20 14:58:48', '2018-06-20 14:58:48'),
(185, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'roberto.carlos', 'Roberto Carlos', 1, 1, NULL, '2018-06-20 15:01:46', '2018-06-20 15:01:46'),
(186, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'paula.ferreira', 'Paula Ferreira', 1, 1, NULL, '2018-06-20 15:15:10', '2018-06-20 15:15:10'),
(188, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'neymar.santos', 'Neymar Santos', 1, 1, NULL, '2018-06-20 15:15:37', '2018-06-20 15:15:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroup`
--

CREATE TABLE `usergroup` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usergroup`
--

INSERT INTO `usergroup` (`id`, `description`, `name`, `create_date`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2015-10-16 17:53:31', '2018-06-21 12:27:48'),
(4, 'Teste', 'Testando', '2018-06-21 12:29:09', '2018-06-21 12:29:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroup_has_permission`
--

CREATE TABLE `usergroup_has_permission` (
  `usergroup_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usergroup_has_permission`
--

INSERT INTO `usergroup_has_permission` (`usergroup_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 24),
(1, 27),
(1, 30),
(1, 55),
(1, 58),
(1, 61),
(1, 64),
(1, 65),
(1, 66),
(1, 69),
(1, 70),
(1, 73),
(1, 76),
(1, 77),
(1, 78),
(1, 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `workplace`
--

CREATE TABLE `workplace` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(155) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `workplace`
--

INSERT INTO `workplace` (`id`, `name`, `create_date`, `updated_at`) VALUES
(2, 'Tim', '2018-06-20 18:58:23', '2018-06-20 19:13:39'),
(3, 'Vivo', '2018-06-20 19:00:46', '2018-06-20 19:13:39'),
(4, 'Claro', '2018-06-20 19:04:06', '2018-06-20 19:13:39'),
(5, 'Claro', '2018-06-21 10:56:53', '2018-06-21 10:56:53'),
(6, 'Claro', '2018-06-21 12:17:39', '2018-06-21 12:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_log_user_action_date` (`action`,`create_date`),
  ADD KEY `fk_log_user_user_idx` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `FK_user_usergroup_id` (`usergroup_id`),
  ADD KEY `FK_user_workplace_id_idx` (`workplace_id`),
  ADD KEY `last_change_password` (`last_change_password`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `usergroup_has_permission`
--
ALTER TABLE `usergroup_has_permission`
  ADD PRIMARY KEY (`usergroup_id`,`permission_id`),
  ADD KEY `FK_usergroup_has_permission_permission_id` (`permission_id`);

--
-- Indexes for table `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `log_user`
--
ALTER TABLE `log_user`
  ADD CONSTRAINT `fk_log_user_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_usergroup_id` FOREIGN KEY (`usergroup_id`) REFERENCES `usergroup` (`id`);

--
-- Limitadores para a tabela `usergroup_has_permission`
--
ALTER TABLE `usergroup_has_permission`
  ADD CONSTRAINT `FK_usergroup_has_permission_idpermission` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `FK_usergroup_has_permission_usergroup_id` FOREIGN KEY (`usergroup_id`) REFERENCES `usergroup` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
