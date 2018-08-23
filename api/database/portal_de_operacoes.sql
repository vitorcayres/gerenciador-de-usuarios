-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2018 às 14:14
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
  `name` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission`
--

INSERT INTO `permission` (`id`, `name`, `system`, `uri`, `create_date`, `updated_at`) VALUES
(1, 'dashboard', 'dashboard', 'dashboard', '2018-07-19 12:39:50', '2018-08-21 19:58:37'),
(2, 'listar-empresa', 'configuracoes', 'empresas', '2018-07-19 12:40:23', '2018-08-21 19:11:36'),
(3, 'inserir-empresa', 'configuracoes', 'empresas', '2018-07-19 12:40:36', '2018-08-21 19:11:39'),
(4, 'editar-empresa', 'configuracoes', 'empresas', '2018-07-19 12:40:44', '2018-08-21 19:11:42'),
(5, 'remover-empresa', 'configuracoes', 'empresas', '2018-07-19 12:40:54', '2018-08-21 19:11:44'),
(6, 'listar-usuario', 'configuracoes', 'usuarios', '2018-07-19 12:41:16', '2018-08-21 19:11:50'),
(7, 'inserir-usuario', 'configuracoes', 'usuarios', '2018-07-19 12:41:34', '2018-08-21 19:11:52'),
(8, 'editar-usuario', 'configuracoes', 'usuarios', '2018-07-19 12:41:47', '2018-08-21 19:11:54'),
(9, 'remover-usuario', 'configuracoes', 'usuarios', '2018-07-19 12:42:15', '2018-08-21 19:11:56'),
(10, 'listar-perfil', 'configuracoes', 'perfil', '2018-07-19 12:43:55', '2018-08-21 19:12:03'),
(11, 'inserir-perfil', 'configuracoes', 'perfil', '2018-07-19 12:44:08', '2018-08-21 19:12:05'),
(12, 'editar-perfil', 'configuracoes', 'perfil', '2018-07-19 12:44:23', '2018-08-21 19:12:06'),
(13, 'remover-perfil', 'configuracoes', 'perfil', '2018-07-19 12:44:38', '2018-08-21 19:12:08'),
(14, 'listar-permissao', 'configuracoes', 'permissoes', '2018-07-19 12:45:22', '2018-08-21 19:12:22'),
(15, 'inserir-permissao', 'configuracoes', 'permissoes', '2018-07-19 12:45:43', '2018-08-21 19:12:26'),
(16, 'editar-permissao', 'configuracoes', 'permissoes', '2018-07-19 12:46:07', '2018-08-21 19:12:29'),
(17, 'remover-permissao', 'configuracoes', 'permissoes', '2018-07-19 12:46:27', '2018-08-21 19:12:31'),
(18, 'alterar-senha', 'configuracoes', 'usuarios', '2018-07-19 18:23:51', '2018-08-21 19:12:35'),
(19, 'listar-parceiro', 'interatividade', 'parceiros', '2018-08-01 17:35:54', '2018-08-21 19:14:54'),
(20, 'inserir-parceiro', 'interatividade', 'parceiros', '2018-08-01 17:36:10', '2018-08-21 19:14:58'),
(21, 'editar-parceiro', 'interatividade', 'parceiros', '2018-08-01 17:36:30', '2018-08-21 19:15:00'),
(22, 'remover-parceiro', 'interatividade', 'parceiros', '2018-08-01 17:36:48', '2018-08-21 19:15:02'),
(23, 'inserir-oferta', 'interatividade', 'ofertas', '2018-08-01 19:14:11', '2018-08-21 19:15:07'),
(24, 'editar-oferta', 'interatividade', 'ofertas', '2018-08-01 19:14:25', '2018-08-21 19:15:10'),
(25, 'listar-oferta', 'interatividade', 'ofertas', '2018-08-01 19:14:42', '2018-08-21 19:15:12'),
(26, 'remover-oferta', 'interatividade', 'ofertas', '2018-08-01 19:14:57', '2018-08-21 19:15:13'),
(27, 'listar-canal', 'interatividade', 'canais', '2018-08-02 11:16:53', '2018-08-21 19:15:17'),
(28, 'inserir-canal', 'interatividade', 'canais', '2018-08-02 11:17:11', '2018-08-21 19:15:22'),
(29, 'editar-canal', 'interatividade', 'canais', '2018-08-02 11:31:17', '2018-08-21 19:15:24'),
(30, 'remover-canal', 'interatividade', 'canais', '2018-08-02 11:31:29', '2018-08-21 19:15:27'),
(31, 'listar-noticia', 'interatividade', 'noticias', '2018-08-02 12:25:31', '2018-08-21 19:15:36'),
(32, 'inserir-noticia', 'interatividade', 'noticias', '2018-08-02 12:25:48', '2018-08-21 19:15:38'),
(33, 'editar-noticia', 'interatividade', 'noticias', '2018-08-02 12:26:01', '2018-08-21 19:15:40'),
(34, 'remover-noticia', 'interatividade', 'noticias', '2018-08-02 12:26:14', '2018-08-21 19:15:43'),
(35, 'listar-produto', 'interatividade', 'produtos', '2018-08-02 13:28:10', '2018-08-21 19:15:48'),
(36, 'inserir-produto', 'interatividade', 'produtos', '2018-08-02 13:28:24', '2018-08-21 19:15:50'),
(37, 'editar-produto', 'interatividade', 'produtos', '2018-08-02 13:28:52', '2018-08-21 19:15:52'),
(38, 'remover-produto', 'interatividade', 'produtos', '2018-08-02 13:29:19', '2018-08-21 19:15:54'),
(39, 'listar-luckynumber', 'interatividade', 'luckynumber', '2018-08-02 13:30:14', '2018-08-21 19:16:02'),
(40, 'inserir-luckynumber', 'interatividade', 'luckynumber', '2018-08-02 13:30:34', '2018-08-21 19:16:05'),
(41, 'editar-luckynumber', 'interatividade', 'luckynumber', '2018-08-02 13:30:46', '2018-08-21 19:16:07'),
(42, 'remover-luckynumber', 'interatividade', 'luckynumber', '2018-08-02 13:30:58', '2018-08-21 19:16:09'),
(43, 'listar-fraseologia', 'interatividade', 'fraseologias', '2018-08-02 13:31:15', '2018-08-21 19:16:15'),
(44, 'inserir-fraseologia', 'interatividade', 'fraseologias', '2018-08-02 13:31:31', '2018-08-21 19:16:17'),
(45, 'editar-fraseologia', 'interatividade', 'fraseologias', '2018-08-02 13:31:47', '2018-08-21 19:16:19'),
(46, 'remover-fraseologia', 'interatividade', 'fraseologias', '2018-08-02 13:32:12', '2018-08-21 19:16:21'),
(47, 'detalhe-produto', 'interatividade', 'produtos', '2018-08-02 13:43:54', '2018-08-21 19:16:27'),
(48, 'publicar-fraseologia', 'interatividade', 'fraseologias', '2018-08-07 19:46:35', '2018-08-21 19:16:31'),
(49, 'importar-noticia', 'interatividade', 'noticias', '2018-08-17 19:21:16', '2018-08-21 19:16:36'),
(50, 'listar-consumer', 'campanhas', 'consumers', '2018-08-20 17:42:00', '2018-08-21 19:16:43'),
(51, 'inserir-consumer', 'campanhas', 'consumers', '2018-08-20 17:42:29', '2018-08-21 19:17:23'),
(52, 'editar-consumer', 'campanhas', 'consumers', '2018-08-20 17:42:54', '2018-08-21 19:17:26'),
(53, 'remover-consumer', 'campanhas', 'consumers', '2018-08-20 17:43:23', '2018-08-21 19:17:27'),
(54, 'listar-acao', 'campanhas', 'acoes', '2018-08-21 13:19:29', '2018-08-21 19:17:36'),
(55, 'inserir-acao', 'campanhas', 'acoes', '2018-08-21 13:19:43', '2018-08-21 19:17:38'),
(56, 'editar-acao', 'campanhas', 'acoes', '2018-08-21 13:20:06', '2018-08-21 19:17:40'),
(57, 'remover-acao', 'campanhas', 'acoes', '2018-08-21 13:20:29', '2018-08-21 19:17:42');

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
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57);

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
  ADD KEY `name_2` (`name`),
  ADD KEY `name_3` (`name`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
