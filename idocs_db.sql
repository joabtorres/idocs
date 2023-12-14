-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/12/2023 às 23:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `idocs_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `fullname`, `cnpj`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'IFPA - CAMPUS CASTANHAL', '11.284.470/0001-55', 'TV. AMAPA Q E1, LOTE 4, IMPERADOR, CASTANHAL-PA', '(91) 3518-5252', 'castanhal@ifpa.edu.gov.br', '2023-12-14 22:27:39', '2023-12-14 22:28:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docs`
--

CREATE TABLE `docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `docs_types_id` int(10) UNSIGNED NOT NULL,
  `docs_status_id` int(10) UNSIGNED NOT NULL,
  `addressee` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `docs_anexos`
--

CREATE TABLE `docs_anexos` (
  `id` int(10) UNSIGNED NOT NULL,
  `docs_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `docs_historical`
--

CREATE TABLE `docs_historical` (
  `id` int(10) UNSIGNED NOT NULL,
  `docs_id` int(10) UNSIGNED NOT NULL,
  `docs_status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `docs_status`
--

CREATE TABLE `docs_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_color` varchar(255) DEFAULT NULL,
  `companies_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `docs_types`
--

CREATE TABLE `docs_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `companies_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sectors`
--

CREATE TABLE `sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(40) DEFAULT NULL,
  `companies_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `abbreviation`, `companies_id`, `created_at`, `updated_at`) VALUES
(1, 'Coordenação de Informática', 'CTI', 1, '2023-12-14 22:44:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sectors_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docs_users1_idx` (`users_id`),
  ADD KEY `fk_docs_docs_types1_idx` (`docs_types_id`),
  ADD KEY `fk_docs_docs_status1_idx` (`docs_status_id`);

--
-- Índices de tabela `docs_anexos`
--
ALTER TABLE `docs_anexos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docs_anexos_docs1_idx` (`docs_id`),
  ADD KEY `fk_docs_anexos_users1_idx` (`users_id`);

--
-- Índices de tabela `docs_historical`
--
ALTER TABLE `docs_historical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docs_historical_docs1_idx` (`docs_id`),
  ADD KEY `fk_docs_historical_docs_status1_idx` (`docs_status_id`);

--
-- Índices de tabela `docs_status`
--
ALTER TABLE `docs_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docs_status_companies1_idx` (`companies_id`);

--
-- Índices de tabela `docs_types`
--
ALTER TABLE `docs_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docs_types_companies1_idx` (`companies_id`);

--
-- Índices de tabela `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sectors_companies_idx` (`companies_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_sectors1_idx` (`sectors_id`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `docs_anexos`
--
ALTER TABLE `docs_anexos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `docs_historical`
--
ALTER TABLE `docs_historical`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `docs_status`
--
ALTER TABLE `docs_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `docs_types`
--
ALTER TABLE `docs_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `fk_docs_docs_status1` FOREIGN KEY (`docs_status_id`) REFERENCES `docs_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docs_docs_types1` FOREIGN KEY (`docs_types_id`) REFERENCES `docs_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docs_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `docs_anexos`
--
ALTER TABLE `docs_anexos`
  ADD CONSTRAINT `fk_docs_anexos_docs1` FOREIGN KEY (`docs_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docs_anexos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `docs_historical`
--
ALTER TABLE `docs_historical`
  ADD CONSTRAINT `fk_docs_historical_docs1` FOREIGN KEY (`docs_id`) REFERENCES `docs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docs_historical_docs_status1` FOREIGN KEY (`docs_status_id`) REFERENCES `docs_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `docs_status`
--
ALTER TABLE `docs_status`
  ADD CONSTRAINT `fk_docs_status_companies1` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `docs_types`
--
ALTER TABLE `docs_types`
  ADD CONSTRAINT `fk_docs_types_companies1` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `fk_sectors_companies` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_sectors1` FOREIGN KEY (`sectors_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
