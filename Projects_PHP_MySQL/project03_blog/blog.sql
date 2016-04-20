-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/04/2016 às 02:30
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'News'),
(2, 'PHP Events'),
(3, 'Tutorials'),
(4, 'Misc');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`) VALUES
(1, 2, 'International PHP conference 2016', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus est eget dapibus eleifend. \r\n        Duis risus ligula, elementum eget dui ac, aliquet maximus quam. Quisque quis commodo ipsum. Sed mattis tempus arcu, \r\n        in varius sapien dictum id. Pellentesque consequat placerat purus euismod volutpat. Fusce ut sodales tortor. \r\n        Sed tellus erat, semper posuere viverra eleifend, vestibulum quis purus. Proin in velit ligula. \r\n        Mauris rutrum erat sit amet elementum condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n        Maecenas consequat pellentesque tristique. \r\n        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus est eget dapibus eleifend. \r\n        Duis risus ligula, elementum eget dui ac, aliquet maximus quam. Quisque quis commodo ipsum. Sed mattis tempus arcu, \r\n        in varius sapien dictum id. Pellentesque consequat placerat purus euismod volutpat. Fusce ut sodales tortor. \r\n        Sed tellus erat, semper posuere viverra eleifend, vestibulum quis purus. Proin in velit ligula. \r\n        Mauris rutrum erat sit amet elementum condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n        Maecenas consequat pellentesque tristique. ', 'Paulo R. Menezes', 'php, news, php events', '2016-04-19 18:46:46'),
(2, 1, 'PHP 7.0beta Released', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus est eget dapibus eleifend. \r\n        Duis risus ligula, elementum eget dui ac, aliquet maximus quam. Quisque quis commodo ipsum. Sed mattis tempus arcu, \r\n        in varius sapien dictum id. Pellentesque consequat placerat purus euismod volutpat. Fusce ut sodales tortor. \r\n        Sed tellus erat, semper posuere viverra eleifend, vestibulum quis purus. Proin in velit ligula. \r\n        Mauris rutrum erat sit amet elementum condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n        Maecenas consequat pellentesque tristique. ', 'Sadam Hussein', 'php, php release', '2016-04-19 18:46:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
