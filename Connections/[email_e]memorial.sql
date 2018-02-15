-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Jan-2017 às 13:28
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `memorial2014`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails_e`
--

CREATE TABLE IF NOT EXISTS `emails_e` (
  `e_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `e_titulo` varchar(150) NOT NULL,
  `e_texto` text NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `emails_e`
--

INSERT INTO `emails_e` (`e_id`, `e_titulo`, `e_texto`) VALUES
(1, 'Contatos Ensino Fundamental', '<p><!--StartFragment--><strong>Dire&ccedil;&atilde;o Geral: </strong><a href="mailto:luizcosta@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''luizcosta@colegiomemorial.com.br'',this)">luizcosta@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Dire&ccedil;&atilde;o Administrativo-Finaceira: </strong><a href="mailto:neia@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''neia@colegiomemorial.com.br'',this)">neia@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Assistente de Dire&ccedil;&atilde;o Pedag&oacute;gica: </strong><a href="mailto:silvanafroes@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''silvanafroes@colegiomemorial.com.br'',this)">silvanafroes@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Coord. Pedag&oacute;gica - Ensino Fundamental I (1&ordm;. ao 5&ordm;. ano):</strong><a href="mailto:ariane@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''ariane@colegiomemorial.com.br'',this)"> ariane@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Coord. Pedag&oacute;gica - Ensino Fundamental II (6&ordm;. ao 9&ordm;. ano): </strong><a href="mailto:luciane@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''luciane@colegiomemorial.com.br'',this)">luciane@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Coordena&ccedil;&atilde;o Pedag&oacute;gica - Ensino M&eacute;dio:</strong><a href="mailto:caue@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''caue@colegiomemorial.com.br'',this)"> caue@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional &ndash; SOE:</strong><a href="mailto:fabianarossi@colegiomemorial,com.br" onclick="return rcmail.command(''compose'',''fabianarossi@colegiomemorial,com.br'',this)"> fabianarossi@colegiomemorial,com.br</a><br />\r\n<!--StartFragment--><strong>Departamento de Psicologia: </strong><a href="mailto:psico.memorial@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''Psico.memorial@colegiomemorial.com.br'',this)">psico.memorial@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Assistente de Ger&ecirc;ncia: </strong><a href="mailto:eduardo@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''eduardo@colegeiomemorial.com.br'',this)">eduardo@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Recursos Humanos &ndash; RH:</strong> <a href="mailto:patricia@colegiomemorial.com.br" target="_blank">patri</a><a href="mailto:cia@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''cia@colegiomemorial.com.br'',this)">cia@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Secretaria dos Ensinos Fundamental e M&eacute;dio:</strong> <a href="mailto:secretaria@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''secretaria@colegiomemorial.com.br'',this)">secretaria@colegiomemorial.com.br</a><!--EndFragment--></p>\r\n\r\n<p><!--StartFragment--><strong>Professores: informe-se com cada um deles</strong><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--></p>\r\n'),
(2, 'Contatos Infantil', '<p><!--StartFragment--><strong>Dire&ccedil;&atilde;o Geral: </strong><a href="mailto:luizcosta@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''luizcosta@colegiomemorial.com.br'',this)">luizcosta@colegiomemorial.com.br</a><!--EndFragment--><br />\r\n<!--StartFragment--><strong>Dire&ccedil;&atilde;o Administrativo-Financeira: </strong><a href="mailto:neia@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''neia@colegiomemorial.com.br'',this)">neia@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Assistente de Dire&ccedil;&atilde;o Pedag&oacute;gica: </strong><a href="mailto:silvanafroes@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''silvanafroes@colegiomemorial.com.br'',this)">silvanafroes@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Coordena&ccedil;&atilde;o Pedag&oacute;gica: </strong><a href="mailto:nidien@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''nidien@colegiomemorial.com.br'',this)">nidien@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Assistente de Coordena&ccedil;&atilde;o Pedag&oacute;gica: </strong><a href="mailto:fernanda@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''fernanda@colegiomemorial.com.br'',this)">fernanda@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional &ndash; SOE: </strong><a href="mailto:fabianarossi@colegiomemorial,com.br" onclick="return rcmail.command(''compose'',''fabianarossi@colegiomemorial,com.br'',this)">fabianarossi@colegiomemorial,com.br</a><br />\r\n<!--StartFragment--><strong>Departamento de Psicologia: </strong><a href="mailto:Psico.memorial@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''Psico.memorial@colegiomemorial.com.br'',this)">Psico.memorial@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Assistente de Ger&ecirc;ncia: </strong><a href="mailto:eduardo@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''eduardo@colegiomemorial.com.br'',this)">eduardo@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Recursos Humanos &ndash; RH:</strong> <a href="mailto:patr%C3%ADcia@colegiomemorial.com.br" target="_blank">patri</a><a href="mailto:cia@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''cia@colegiomemorial.com.br'',this)">cia@colegiomemorial.com.br</a><br />\r\n<!--StartFragment--><strong>Secretaria do Infantil: </strong><a href="mailto:secretariainfantil@colegiomemorial.com.br" onclick="return rcmail.command(''compose'',''secretariainfantil@colegiomemorial.com.br'',this)">secretariainfantil@colegiomemorial.com.br</a><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--><!--EndFragment--></p>\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
