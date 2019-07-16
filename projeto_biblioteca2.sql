-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 10:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_biblioteca`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaPadraoInt` (IN `nome_tabela` CHAR(60), IN `atributo_tabela` CHAR(60), IN `valor` INTEGER)  BEGIN
    SET @sql = CONCAT('SELECT * FROM ',nome_tabela, ' WHERE ', atributo_tabela,' = "',valor,'"');
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaPadraoString` (IN `nome_tabela` CHAR(60), IN `atributo_tabela` CHAR(60), IN `valor` CHAR(60))  BEGIN
    SET @sql = CONCAT('SELECT * FROM ',nome_tabela, ' WHERE ', atributo_tabela,' = "',valor,'"');
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaTotal` (IN `nome_tabela` CHAR(60))  BEGIN
    SET @sql = CONCAT('SELECT * FROM ',nome_tabela);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE `emprestimo` (
  `emp_id` int(11) NOT NULL,
  `emp_usuario_id` int(11) DEFAULT NULL,
  `emp_locatario_id` int(11) DEFAULT NULL,
  `emp_livro_id` int(11) DEFAULT NULL,
  `emp_dt_locacao` date DEFAULT NULL,
  `emp_dt_devolucao` date DEFAULT NULL,
  `emp_dt_entrega` date NOT NULL,
  `emp_status` varchar(14) DEFAULT NULL,
  `emp_multa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `livro_id` int(11) NOT NULL,
  `livro_isbn` varchar(13) DEFAULT NULL,
  `livro_nome` varchar(255) DEFAULT NULL,
  `livro_autor` varchar(255) DEFAULT NULL,
  `livro_categoria` varchar(32) DEFAULT NULL,
  `livro_quantidade` int(11) DEFAULT NULL,
  `livro_quantidadeAlugada` int(11) NOT NULL,
  `livro_editora` varchar(32) NOT NULL,
  `livro_descricao` text NOT NULL,
  `livro_ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livro`
--

INSERT INTO `livro` (`livro_id`, `livro_isbn`, `livro_nome`, `livro_autor`, `livro_categoria`, `livro_quantidade`, `livro_quantidadeAlugada`, `livro_editora`, `livro_descricao`, `livro_ano`) VALUES
(1, '3040', 'Jornada no Ceu de Areia', 'JÃºlio, o Careca', 'Aventura', 15, 0, '', '', 0),
(2, '9788551001714', 'A Profecia Das Sombras', 'Riordan, Rick', 'Aventura', 3, 0, 'Intrinseca', 'No segundo volume da sÃ©rie As provaÃ§Ãµes de Apolo, o ex-deus olimpiano terÃ¡ que libertar um orÃ¡culo assustador das mÃ£os de um velho conhecido NÃ£o basta ter perdido os poderes divinos e ter sido enviado para a terra na forma de um adolescente espinhe', 0),
(3, '9788535920932', 'GetÃºlio 1882 - 1930 - Dos Anos de FormaÃ§Ã£o Ã€ Conquista do Poder', 'Neto, Lira', 'Biografia', 1, 0, 'Companhia Das Letras', 'â€œEm uma das pÃ¡ginas de seu DiÃ¡rio, escrito entre 1930 e 1942, GetÃºlio Vargas anotou: â€˜gosto mais de ser interpretado do que de me explicarâ€™. Essa observaÃ§Ã£o parece ser um desafio irÃ´nico para quem buscasse entendÃª-lo, em vida ou ao longo da histÃ³ria. Lira Neto estÃ¡ entre os autores que aceitaram o desafio. Seu livro contribui significativamente para a compreensÃ£o do personagem que, para bem ou para mal, foi a maior figura polÃ­tica do Brasil, no sÃ©culo XX. Este primeiro volume da trilogia GetÃºlio vai do nascimento de Vargas Ã  sua ascensÃ£o ao poder, no bojo da revoluÃ§Ã£o de 1930. O estilo jornalÃ­stico do autor resulta num texto fluente, que evita, ao mesmo tempo, os recursos fÃ¡ceis e a banalidade. Com base numa impressionante pesquisa, Lira Neto narra, com brilho e riqueza de detalhes, a histÃ³ria da vida pessoal e da vida pÃºblica de GetÃºlio, dos tempos do Rio Grande do Sul Ã  entrada na cena polÃ­tica da Capital da RepÃºblica.â€ Boris Fausto ', 0),
(4, '9788574786858', 'Dado Villa-Lobos - MemÃ³rias de Um LegionÃ¡rio', 'Villa-Lobos, Dado / Demier, Felipe / Mattos ,Romulo', 'Biografia', 2, 0, 'Mauad', '', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `locatario`
--

CREATE TABLE `locatario` (
  `locatario_id` int(11) NOT NULL,
  `locatario_nome` varchar(255) DEFAULT NULL,
  `locatario_matricula` int(11) DEFAULT NULL,
  `locatario_tipo` varchar(10) DEFAULT NULL,
  `locatario_telefone` varchar(20) DEFAULT NULL,
  `locatario_sexo` char(1) NOT NULL,
  `locatario_endereco` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locatario`
--

INSERT INTO `locatario` (`locatario_id`, `locatario_nome`, `locatario_matricula`, `locatario_tipo`, `locatario_telefone`, `locatario_sexo`, `locatario_endereco`) VALUES
(1, 'Lucas Costa', 3956, 'A', '(37) 9148-7666', 'M', 'Rua Palmital, 467, Bairro SÃ£o JoÃ£o'),
(2, 'Lucas Costa de Faria', 1060, 'P', '(37) 9148-7666', 'M', 'Rua Palmital, 467, Bairro SÃ£o JoÃ£o');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cpf` varchar(14) DEFAULT NULL,
  `usuario_senha` varchar(32) DEFAULT NULL,
  `usuario_nome` varchar(255) DEFAULT NULL,
  `usuario_telefone` varchar(20) DEFAULT NULL,
  `usuario_endereco` varchar(255) DEFAULT NULL,
  `usuario_sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_cpf`, `usuario_senha`, `usuario_nome`, `usuario_telefone`, `usuario_endereco`, `usuario_sexo`) VALUES
(1, '124.881.736-22', 'e10adc3949ba59abbe56e057f20f883e', 'Edvaldo Nunes', '(37) 9999-9999', 'Rua Alferes Tavares, 29, Bairro Cidade de Deus', 'M'),
(2, '118.553.866-66', 'e10adc3949ba59abbe56e057f20f883e', 'Leslye', '(37) 9713-0355', 'Rua Cabo Jota de Oliveira, 40, Bairro Diamante', 'F'),
(4, '118.153.866-66', '96e79218965eb72c92a549dd5a330112', 'teste', 'teste', 'teste', 'M'),
(5, '111.111.111-11', 'e10adc3949ba59abbe56e057f20f883e', 'Lucas Costa de Faria', '(99) 9999-9965', 'Rua Cabo Jota de Oliveira, 40, Bairro Diamante', 'M'),
(6, '133.333.333-33', '96e79218965eb72c92a549dd5a330112', 'JoÃ£o', '(33) 1313-3313', 'Rua Cabo Jota de Oliveira, 40, Bairro Diamante', 'M'),
(7, '714.344.886-91', '2e7c43d83c80e8ab6e8b5a4aff5c8ba2', 'Maria Eunice Costa de Faria', '(11) 4002-8922', 'Rua Vereador JoÃ£o Mariano', 'M'),
(9, '157.845.666-62', '70b439f43dabc6cea647237375fbb6b1', 'Welton Fellipe GonÃ§alves', '(38) 9111-1111', 'Rua Vereador JoÃ£o Mariano, 36, Bairro Novo Rio', 'M'),
(10, '895.555.554-75', 'c33367701511b4f6020ec61ded352059', 'Mateus Augusto de Faria', '(37) 9114-8756', 'Rua Tiradentes, 24, Bairro SÃ£o JoÃ£o', 'M'),
(11, '111.975.936-67', 'b53b3a3d6ab90ce0268229151c9bde11', 'Mateus Santos', '(88) 8888-8888', 'Rua Tiradentes, 24, Bairro SÃ£o JoÃ£o', 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emprestimo_usuario_id` (`emp_usuario_id`),
  ADD KEY `emprestimo_locatario_id` (`emp_locatario_id`),
  ADD KEY `emprestimo_livro_id` (`emp_livro_id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`livro_id`);

--
-- Indexes for table `locatario`
--
ALTER TABLE `locatario`
  ADD PRIMARY KEY (`locatario_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `livro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `locatario`
--
ALTER TABLE `locatario`
  MODIFY `locatario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`emp_usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`emp_locatario_id`) REFERENCES `locatario` (`locatario_id`),
  ADD CONSTRAINT `emprestimo_ibfk_3` FOREIGN KEY (`emp_livro_id`) REFERENCES `livro` (`livro_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
