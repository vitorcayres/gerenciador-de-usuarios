-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Ago-2018 às 14:45
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
(1, 'Dashboard', 'dashboard', '2018-07-19 12:39:50', '2018-07-19 12:39:50'),
(2, 'Configurações | Listar Empresas', 'listar-empresa', '2018-07-19 12:40:23', '2018-07-19 12:40:23'),
(3, 'Configurações | Adicionar Empresa', 'inserir-empresa', '2018-07-19 12:40:36', '2018-07-19 12:40:36'),
(4, 'Configurações | Editar Empresa', 'editar-empresa', '2018-07-19 12:40:44', '2018-07-19 12:40:44'),
(5, 'Configurações | Remover Empresa', 'remover-empresa', '2018-07-19 12:40:54', '2018-07-19 12:40:54'),
(6, 'Configurações | Listar Usuário', 'listar-usuario', '2018-07-19 12:41:16', '2018-07-19 12:41:16'),
(7, 'Configurações | Adicionar Usuário', 'inserir-usuario', '2018-07-19 12:41:34', '2018-07-19 12:41:34'),
(8, 'Configurações | Editar Usuário', 'editar-usuario', '2018-07-19 12:41:47', '2018-07-19 12:41:47'),
(9, 'Configurações | Remover Usuário', 'remover-usuario', '2018-07-19 12:42:15', '2018-07-19 12:42:15'),
(10, 'Configurações | Listar Perfil', 'listar-perfil', '2018-07-19 12:43:55', '2018-07-19 12:43:55'),
(11, 'Configurações | Adicionar Perfil', 'inserir-perfil', '2018-07-19 12:44:08', '2018-07-19 12:44:08'),
(12, 'Configurações | Editar Perfil', 'editar-perfil', '2018-07-19 12:44:23', '2018-07-19 12:44:23'),
(13, 'Configurações | Remover Perfil', 'remover-perfil', '2018-07-19 12:44:38', '2018-07-19 12:44:38'),
(14, 'Configurações | Listar Permissão', 'listar-permissao', '2018-07-19 12:45:22', '2018-07-19 12:45:22'),
(15, 'Configurações | Adicionar Permissão', 'inserir-permissao', '2018-07-19 12:45:43', '2018-07-19 12:45:43'),
(16, 'Configurações | Editar Permissão', 'editar-permissao', '2018-07-19 12:46:07', '2018-07-19 12:46:07'),
(17, 'Configurações | Remover Permissão', 'remover-permissao', '2018-07-19 12:46:27', '2018-07-19 12:46:27'),
(18, 'Configurações | Alterar Senha Usuário', 'alterar-senha', '2018-07-19 18:23:51', '2018-07-19 23:24:01'),
(19, 'Interatividade | Listar Parceiro', 'listar-parceiro', '2018-08-01 17:35:54', '2018-08-01 17:35:54'),
(20, 'Interatividade | Inserir Parceiro', 'inserir-parceiro', '2018-08-01 17:36:10', '2018-08-01 17:36:10'),
(21, 'Interatividade | Editar Parceiro', 'editar-parceiro', '2018-08-01 17:36:30', '2018-08-01 17:36:30'),
(22, 'Interatividade | Remover Parceiro', 'remover-parceiro', '2018-08-01 17:36:48', '2018-08-01 17:36:48'),
(23, 'Interatividade | Inserir Oferta', 'inserir-oferta', '2018-08-01 19:14:11', '2018-08-01 19:14:11'),
(24, 'Interatividade | Editar Oferta', 'editar-oferta', '2018-08-01 19:14:25', '2018-08-01 19:14:25'),
(25, 'Interatividade | Listar Oferta', 'listar-oferta', '2018-08-01 19:14:42', '2018-08-01 19:14:42'),
(26, 'Interatividade | Remover Oferta', 'remover-oferta', '2018-08-01 19:14:57', '2018-08-01 19:14:57'),
(27, 'Interatividade | Listar Canal', 'listar-canal', '2018-08-02 11:16:53', '2018-08-02 11:16:53'),
(28, 'Interatividade | Inserir Canal', 'inserir-canal', '2018-08-02 11:17:11', '2018-08-02 11:17:11'),
(29, 'Interatividade | Editar Canal', 'editar-canal', '2018-08-02 11:31:17', '2018-08-02 11:31:17'),
(30, 'Interatividade | Remover Canal', 'remover-canal', '2018-08-02 11:31:29', '2018-08-02 11:31:29'),
(31, 'Interatividade | Listar Notícia', 'listar-noticia', '2018-08-02 12:25:31', '2018-08-02 12:25:31'),
(32, 'Interatividade | Inserir Notícia', 'inserir-noticia', '2018-08-02 12:25:48', '2018-08-02 12:25:48'),
(33, 'Interatividade | Editar Notícia', 'editar-noticia', '2018-08-02 12:26:01', '2018-08-02 12:26:01'),
(34, 'Interatividade | Remover Notícia', 'remover-noticia', '2018-08-02 12:26:14', '2018-08-02 12:26:14'),
(35, 'Interatividade | Listar Produto', 'listar-produto', '2018-08-02 13:28:10', '2018-08-02 13:28:10'),
(36, 'Interatividade | Inserir Produto', 'inserir-produto', '2018-08-02 13:28:24', '2018-08-02 13:28:24'),
(37, 'Interatividade | Editar Produto', 'editar-produto', '2018-08-02 13:28:52', '2018-08-02 13:28:52'),
(38, 'Interatividade | Remover Produto', 'remover-produto', '2018-08-02 13:29:19', '2018-08-02 13:29:19'),
(39, 'Interatividade | Listar Luckynumber', 'listar-luckynumber', '2018-08-02 13:30:14', '2018-08-02 13:30:14'),
(40, 'Interatividade | Inserir Luckynumber', 'inserir-luckynumber', '2018-08-02 13:30:34', '2018-08-02 13:30:34'),
(41, 'Interatividade | Editar Luckynumber', 'editar-luckynumber', '2018-08-02 13:30:46', '2018-08-02 13:30:46'),
(42, 'Interatividade | Remover Luckynumber', 'remover-luckynumber', '2018-08-02 13:30:58', '2018-08-02 13:30:58'),
(43, 'Interatividade | Listar Fraseologia', 'listar-fraseologia', '2018-08-02 13:31:15', '2018-08-02 13:31:15'),
(44, 'Interatividade | Inserir Fraseologia', 'inserir-fraseologia', '2018-08-02 13:31:31', '2018-08-02 13:31:31'),
(45, 'Interatividade | Editar Fraseologia', 'editar-fraseologia', '2018-08-02 13:31:47', '2018-08-02 13:31:47'),
(46, 'Interatividade | Remover Fraseologia', 'remover-fraseologia', '2018-08-02 13:32:12', '2018-08-02 13:32:12'),
(47, 'Interatividade | Detalhe Produto', 'detalhe-produto', '2018-08-02 13:43:54', '2018-08-02 13:43:54'),
(48, 'Interatividade | Publicar Fraseologia', 'publicar-fraseologia', '2018-08-07 19:46:35', '2018-08-07 19:46:35');

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
  `workplace_id` int(11) UNSIGNED DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `enabled`, `force_pass_change`, `password`, `usergroup_id`, `username`, `name`, `workplace_id`, `create_date`, `updated_at`) VALUES
(1, 1, -1, 'e1b2adc0185d40dc70e2b4c9d814bbf4', 1, 'administrador', 'Administrador | FS', 1, '2018-07-19 13:40:29', '2018-07-23 19:41:14');

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
(1, 'Administrador', 'administrador', '2018-07-19 12:48:03', '2018-07-19 12:48:03');

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
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48);

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
(1, 'FS', '2018-07-19 12:48:17', '2018-07-19 12:48:17');

--
-- Indexes for dumped tables
--

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
  ADD KEY `FK_user_workplace_id_idx` (`workplace_id`);

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
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
