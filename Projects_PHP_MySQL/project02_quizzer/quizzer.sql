-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/04/2016 às 02:29
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `quizzer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Fazendo dump de dados para tabela `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `text`) VALUES
(1, 1, 1, 'PHP: Hypertext Preprocessor'),
(2, 1, 0, 'PHP: Private Home Page'),
(3, 1, 0, 'PHP: Personal Home Page'),
(4, 1, 0, 'PHP: Personal Hypertext Preprocessor'),
(5, 2, 0, 'Document.Write("Hello World");'),
(6, 2, 0, '"Hello World";'),
(7, 2, 1, 'echo "Hello World";'),
(8, 3, 0, 'ASP'),
(9, 3, 0, 'Ruby'),
(10, 3, 0, 'Python'),
(11, 3, 1, 'PHP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `questions`
--

INSERT INTO `questions` (`question_number`, `text`) VALUES
(1, 'PHP stands for what?'),
(2, 'How do you write "Hello World" in PHP'),
(3, 'What is the best server side language?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
