-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `memorial2014`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_g`
--

CREATE TABLE IF NOT EXISTS `galeria_g` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_ctg_id` smallint(4) DEFAULT '0',
  `g_descricao` varchar(100) NOT NULL,
  `g_imagem` varchar(100) NOT NULL,
  `g_destaque` smallint(1) NOT NULL DEFAULT '0',
  `g_data` date NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `galeria_g`
--

INSERT INTO `galeria_g` (`g_id`, `g_ctg_id`, `g_descricao`, `g_imagem`, `g_destaque`, `g_data`) VALUES
(9, 0, 'GALERIA 2015', '9.JPG', 1, '1515-09-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instalacoes_fotos_if`
--

CREATE TABLE IF NOT EXISTS `instalacoes_fotos_if` (
  `if_id` int(4) NOT NULL AUTO_INCREMENT,
  `if_i_id` smallint(2) NOT NULL,
  `if_titulo` varchar(100) DEFAULT NULL,
  `if_texto` text,
  `if_imagem` varchar(70) DEFAULT NULL,
  `if_img_capa` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`if_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `instalacoes_fotos_if`
--

INSERT INTO `instalacoes_fotos_if` (`if_id`, `if_i_id`, `if_titulo`, `if_texto`, `if_imagem`, `if_img_capa`) VALUES
(7, 2, 'BerÃ§Ã¡rio', 'EspaÃ§o criteriosamente planejado e projetado para atender alunos de 4 meses a 01 ano de idade. Local amplo e moderno com rigoroso padrÃ£o de higiene e seguranÃ§a, permitindo o acesso exclusivamente Ã  CoordenaÃ§Ã£o e BerÃ§aristas.', '7.jpg', 0),
(8, 2, 'Cantina RefeitÃ³rio', 'espaÃ§o exclusivo para os alunos da EducaÃ§Ã£o Infantil, oferece uma alimentaÃ§Ã£o natural e saudÃ¡vel.', '8.jpg', 0),
(9, 2, 'Cozinha', 'projetada para o tamanho fÃ­sico das crianÃ§as da EducaÃ§Ã£o Infantil, Ã© um espaÃ§o com grande oferta de aprendizado, possibilitando o desenvolvimento de diversas atividades passando por culinÃ¡ria, pesos e medidas, Ã³rgÃ£os dos sentidos etc.', '9.jpg', 0),
(10, 2, 'FraudÃ¡rio', 'espaÃ§o destinado a banhos e trocas dos alunos do BerÃ§Ã¡rio, com elevado padrÃ£o de higiene e seguranÃ§a.', '10.jpg', 0),
(11, 2, 'Horta', 'EspaÃ§o planejado como complemento pedagÃ³gico, onde o aluno plantarÃ¡ e acompanharÃ¡ o desenvolvimento de hortaliÃ§as atÃ© a colheita, utilizando os produtos e criando receitas na Cozinha Experimental.', '11.jpg', 1),
(12, 2, 'LaboratÃ³rio de InformÃ¡tica', 'com mobiliÃ¡rio especialmente projetado para a EducaÃ§Ã£o Infantil, Ã© equipado com mÃ¡quinas ligadas em rede e conectadas Ã  Internet de alta velocidade.', '12.jpg', 0),
(13, 2, 'piscina', 'espaÃ§o cuidadosamente planejado para atender os alunos do Maternal Ã  1a. sÃ©rie do Fundamental, destinado Ã  recreaÃ§Ã£o, atividades pedagÃ³gicas planejadas pelas Professoras e um riquÃ­ssimo recurso para estimulaÃ§Ã£o e desenvolvimento de coordenaÃ§Ã£o motora global no meio lÃ­quido.', '13.jpg', 0),
(19, 2, 'Quadra poliesportiva', 'proporcional ao desenvolvimento fÃ­sico da crianÃ§a, sendo destinada aos alunos de maternal a Classe de AlfabetizaÃ§Ã£o, para prÃ¡tica de atividades recreativas direcionadas, planejadas pela Professora de EducaÃ§Ã£o FÃ­sica, servindo tambÃ©m como um local de apoio para as demais atividades pedagÃ³gicas.', '19.jpg', 0),
(20, 2, 'Sala descanso', 'espaÃ§o projetado para as crianÃ§as acima de 2 anos que necessitem de pequenos perÃ­odos de descanso no decorrer das atividades, sem necessidade de utilizaÃ§Ã£o do dormitÃ³rio.', '20.jpg', 0),
(21, 2, 'Solarium', 'local agradÃ¡vel, ao ar livre para o salutar banho de sol das crianÃ§as, onde tambÃ©m podem ser desenvolvidas atividades de lazer e entretenimento, permitindo que se movimentem com liberdade e independÃªncia e total seguranÃ§a.', '21.jpg', 0),
(25, 3, 'Artes Marciais', NULL, '25.jpg', 0),
(26, 3, 'Artes', NULL, '26.JPG', 0),
(27, 3, 'DanÃ§a', NULL, '27.jpg', 0),
(28, 3, 'Jardim', NULL, '28.JPG', 0),
(29, 3, 'PÃ¡tio', NULL, '29.jpg', 0),
(30, 3, 'Piscina', NULL, '30.jpg', 0),
(31, 3, 'Quadra', NULL, '31.jpg', 0),
(32, 3, 'Sala Squash', NULL, '32.jpg', 0),
(33, 3, 'Vivencia', NULL, '33.jpg', 1),
(34, 4, 'Biblioteca', NULL, '34.jpg', 0),
(35, 4, 'LaboratÃ³rio de InformÃ¡tica', NULL, '35.jpg', 0),
(36, 4, 'LaboratÃ³rio de QuÃ­mica', NULL, '36.JPG', 1),
(37, 4, 'PÃ¡tio', NULL, '37.jpg', 0),
(38, 4, 'Restaurante / Lanchonete', NULL, '38.JPG', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `intalacoes_i`
--

CREATE TABLE IF NOT EXISTS `intalacoes_i` (
  `i_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `i_titulo` varchar(100) NOT NULL,
  `i_imagem` text,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `intalacoes_i`
--

INSERT INTO `intalacoes_i` (`i_id`, `i_titulo`, `i_imagem`) VALUES
(2, 'EducaÃ§Ã£o Infantil', '2.JPG'),
(3, 'Ensino Fundamental', '3.jpg'),
(4, 'Ensino Medio', '4.JPG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_p`
--

CREATE TABLE IF NOT EXISTS `paginas_p` (
  `p_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `p_titulo` varchar(100) DEFAULT NULL,
  `p_texto` text,
  `p_data` date DEFAULT NULL,
  `p_situacao` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `paginas_p`
--

INSERT INTO `paginas_p` (`p_id`, `p_titulo`, `p_texto`, `p_data`, `p_situacao`) VALUES
(1, 'SERVI&Ccedil;OS', '<p><strong>Coordenador pedag&oacute;gico</strong></p>\r\n\r\n<p>O Col&eacute;gio Memorial oferece os seguintes cursos: Educa&ccedil;&atilde;o Infantil &ndash; crian&ccedil;as a partir do Ber&ccedil;&aacute;rio at&eacute; o pr&eacute;-fundamental, com 5 anos de idade. Ensino Fundamental &ndash; do 1&ordm;. ao 9&ordm;. ano Ensino M&eacute;dio &ndash; curso com foco na prepara&ccedil;&atilde;o para os vestibulares mais concorridos. A 3&ordf;. s&eacute;rie tem aulas em per&iacute;odo integral duas vezes por semana.&nbsp;</p>\r\n\r\n<p><strong>Servi&ccedil;o de Psicologia</strong></p>\r\n\r\n<p>Este departamento tem por objetivo promover o bem estar e o desenvolvimento das rela&ccedil;&otilde;es entre as pessoas que fazem parte do processo educacional (todos os Colaboradores do Col&eacute;gio, alunos e seus familiares), buscando um clima de harmonia dentro da escola para a implementa&ccedil;&atilde;o do processo ensino-aprendizagem. As atividades desenvolvidas compreendem a facilita&ccedil;&atilde;o nas inter-rela&ccedil;&otilde;es e acolhimento do aluno e da sua fam&iacute;lia na adapta&ccedil;&atilde;o ao Col&eacute;gio, al&eacute;m de orienta&ccedil;&atilde;o a estes para o conv&iacute;vio com a equipe multidisciplinar. No Col&eacute;gio Memorial, o Servi&ccedil;o de Psicologia age como mentor dos adolescentes, em suas d&uacute;vidas e questionamentos, pr&oacute;prios de sua fase de desenvolvimento pessoal, assim como em suas dificuldades no per&iacute;odo de decis&atilde;o profissional (orienta&ccedil;&atilde;o profissional). Esse servi&ccedil;o tamb&eacute;m organiza palestras para pais, alunos e demais profissionais do Col&eacute;gio com temas sempre de interesse dessa comunidade, agindo como agente facilitador das rela&ccedil;&otilde;es humanas.</p>\r\n\r\n<p><strong>Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional</strong></p>\r\n\r\n<p>O SOE &ndash; Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional &ndash; tem como objetivo promover o bem estar do aluno no ambiente escolar e sua principal ferramenta de trabalho &eacute; o di&aacute;logo.<br />\r\nDesenvolve um trabalho multiprofissional, aperfei&ccedil;oando as rela&ccedil;&otilde;es professor x aluno, aluno x aluno, fam&iacute;lia x escola, coordena&ccedil;&atilde;o pedag&oacute;gica x aluno, aluno x servi&ccedil;o de psicologia.<br />\r\nEsse Servi&ccedil;o constitui-se em um espa&ccedil;o aberto ao estudante, onde ele pode falar, ouvir e ser ouvido, refletir e opinar a respeito de todos os aspectos de sua vida, sejam eles pessoais, educacionais, sociais ou morais. A fam&iacute;lia tamb&eacute;m pode utiliz&aacute;-lo para informar-se sobre a Proposta do Col&eacute;gio no tocante &agrave; postura disciplinar. Os Professores tamb&eacute;m s&atilde;o parceiros do SOE, visto que muitas atitudes s&atilde;o percebidas em sala de aula, cabendo-lhe auxili&aacute;-los em como agir, conforme a situa&ccedil;&atilde;o exige, respeitando as necessidades e diferen&ccedil;as individuais dos alunos.<br />\r\nOs estudantes recebem assist&ecirc;ncia do SOE desde a sua chegada at&eacute; o encerramento do per&iacute;odo, zelando pela boa qualidade das suas rela&ccedil;&otilde;es sociais no &acirc;mbito escolar, promovendo atividades que favore&ccedil;am a adapta&ccedil;&atilde;o, socializa&ccedil;&atilde;o, integra&ccedil;&atilde;o, trabalho em equipe e conv&iacute;vio harmonioso e saud&aacute;vel. Suas a&ccedil;&otilde;es visam integrar os alunos rec&eacute;m chegados com os veteranos, orientando-os quanto &agrave;s normas do Col&eacute;gio. S&atilde;o tamb&eacute;m realizadas interven&ccedil;&otilde;es quando observada alguma conduta de indisciplina, conduzindo o aluno a refletir sobre tal comportamento, buscando, juntos, a melhor solu&ccedil;&atilde;o ou aplicando a conseq&uuml;ente san&ccedil;&atilde;o disciplinar, se for o caso. As palavras chave do SOE s&atilde;o: orienta&ccedil;&atilde;o, an&aacute;lise, direcionamento, solu&ccedil;&atilde;o adequada, argumenta&ccedil;&atilde;o, comunica&ccedil;&atilde;o e di&aacute;logo.</p>\r\n', '1616-03-09', 1),
(2, 'ESPA&Ccedil;OS', '<p><strong>Instala&ccedil;&otilde;es:</strong> Clique na imagem para ver as instala&ccedil;&otilde;es de cada unidade.</p>\r\n', '1616-03-09', 1),
(3, 'OBJETIVOS', '<h3><strong>Miss&atilde;o</strong></h3>\r\n\r\n<p>Formar e instrumentalizar os estudantes do Col&eacute;gio Memorial para que, atrav&eacute;s dos estudos realizados na escola, possam produzir conhecimentos que os dote de capacidade para aplic&aacute;-los, visando a solu&ccedil;&atilde;o de diferentes situa&ccedil;&otilde;es que lhes surgirem no cotidiano.<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Filosofia</strong></h3>\r\n\r\n<p>A busca por uma pedagogia e seu aperfei&ccedil;oamento cont&iacute;nuo, que possibilitem ao aluno entender a import&acirc;ncia do conhecimento e, atrav&eacute;s dele, construir a sua pr&oacute;pria autonomia.<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Objetivos</strong></h3>\r\n\r\n<p>S&atilde;o metas do Col&eacute;gio Memorial: - Oferecer um ensino de qualidade, valorizando o conte&uacute;do e a habilidade para a sua aplica&ccedil;&atilde;o, despertando o desejo de praticar o bem, a vontade de evoluir, o sentimento de Deus (sem sectarismo) e a seguran&ccedil;a do caminho a seguir. - Construir uma escola progressista, propiciando aos alunos o dom&iacute;nio de conhecimentos, habilidades e capacidades para que possam interpretar sua realidade e defender seus interesses de classe social. - Promover a constitui&ccedil;&atilde;o e integra&ccedil;&atilde;o do grupo de educadores e das turmas de alunos. - Promover o trabalho coletivo e o esp&iacute;rito de equipe. - Proporcionar um ambiente prazeroso, participativo e democr&aacute;tico, de respeito e valoriza&ccedil;&atilde;o do indiv&iacute;duo e rela&ccedil;&otilde;es harm&ocirc;nicas entre todos os seguimentos do processo educativo. - Promover a participa&ccedil;&atilde;o efetiva dos pais na vida escolar.</p>\r\n', '1616-03-04', 1),
(4, 'RENDIMENTO ESCOLAR', '<p>Os resultados do desempenho escolar no Ensino Fundamental e M&eacute;dio s&atilde;o expressos em notas de 0 (zero) a 10 (dez), graduadas de 1 (um) em 1 (um) d&eacute;cimo. Os resultados das avalia&ccedil;&otilde;es s&atilde;o sintetizados em quatro Notas Bimestrais e M&eacute;dia Final, em cada componente curricular. O aluno ser&aacute; promovido de uma S&eacute;rie para outra, ao final do ano letivo, quando apresentar, em cada componente curricular, notas bimestrais iguais ou superiores a 6,0 e freq&uuml;&ecirc;ncia bimestral igual ou superior a 75%. Se, ao final de cada bimestre, ele n&atilde;o obtiver a nota 6,0 e freq&uuml;&ecirc;ncia m&iacute;nima de 75%, ser&aacute; encaminhado a estudos de Recupera&ccedil;&atilde;o Intensiva Bimestral. O aluno poder&aacute; ser encaminhado aos seguintes tipos de Estudos de Recupera&ccedil;&atilde;o: &bull; Recupera&ccedil;&atilde;o cont&iacute;nua &bull; Recupera&ccedil;&atilde;o intensiva bimestral &bull; Recupera&ccedil;&atilde;o paralela &bull; Recupera&ccedil;&atilde;o intensiva final Veja detalhes do quadro &ldquo;Recupera&ccedil;&atilde;o&rdquo;, abaixo. O aluno ser&aacute; retido, sem direito a Estudos de Recupera&ccedil;&atilde;o Final Intensiva quando a sua M&eacute;dia Final for inferior a 5,0 (cinco inteiros) em mais de dois componentes curriculares. Da mesma forma o aluno ser&aacute; automaticamente retido caso n&atilde;o compare&ccedil;a &agrave;s aulas de Recupera&ccedil;&atilde;o Final Intensiva.</p>\r\n', '1616-03-04', 1),
(5, 'PROJETOS', '<p>O Col&eacute;gio Memorial mant&eacute;m v&aacute;rios projetos, simultaneamente, o quais variam a cada ano, de acordo com o planejamento elaborado para o ano letivo.</p>\r\n', '1616-03-07', 1),
(6, 'ATIVIDADES', '<p><strong>&bull; Agitamemo &ndash; gincana esportiva, filantr&oacute;pica e cultural:</strong></p>\r\n\r\n<p>Realizada em todos os anos, a gincana &quot;Agitamemo&quot; proporciona aos alunos a possibilidade de vivenciar uma atividade integrada de coopera&ccedil;&atilde;o e um efetivo exerc&iacute;cio de cidadania. A participa&ccedil;&atilde;o coletiva nas atividades esportivas, culturais e beneficentes estimula a integra&ccedil;&atilde;o, o trabalho em equipe, a competi&ccedil;&atilde;o sadia e a solidariedade entre os alunos. Est&atilde;o presentes ainda a divers&atilde;o, o encontro de todos os estudantes, Professores, dire&ccedil;&atilde;o e demais funcion&aacute;rios nos diferentes per&iacute;odos e dias e, muito mais que isso, a amizade entre todos que, embora estejam participando de uma disputa, desenvolvem o forte sentimento de amizade e ajudam-se mutuamente. Parte importante da Agitamemo &eacute; a visita&ccedil;&atilde;o, pelos alunos, a entidades assistenciais da cidade para levantamento das suas necessidades quanto a alimentos e produtos de higiene pessoal e limpeza, com posterior arrecada&ccedil;&atilde;o desses g&ecirc;neros e doa&ccedil;&atilde;o &agrave;s referidas entidades da cidade. Divers&atilde;o e contribui&ccedil;&atilde;o social fazem desta Gincana um dos eventos mais aguardados pelos alunos.</p>\r\n\r\n<p><br />\r\n<strong>&bull; Apresenta&ccedil;&atilde;o Art&iacute;stico-cultural:</strong></p>\r\n\r\n<p>Realizada uma vez por ano no Teatro Polytheama, com casa lotada, &eacute; um evento em que os alunos apresentam m&uacute;ltiplas atividades art&iacute;sticas entre dan&ccedil;as, cantos, representa&ccedil;&otilde;es etc. H&aacute; intensa participa&ccedil;&atilde;o de familiares e toda a equipe do Col&eacute;gio.<br />\r\n&bull; Feira Cient&iacute;fico-cultural:</p>\r\n\r\n<p>Atividade desenvolvida pelos alunos da Educa&ccedil;&atilde;o Infantil ao Ensino M&eacute;dio, tendo como subs&iacute;dio os conte&uacute;dos estudados em sala de aula. Os temas variam ano-a-ano e os estudantes se superam a cada evento, sempre com muita criatividade.</p>\r\n\r\n<p><br />\r\n<strong>&bull; Feira de Profiss&otilde;es:</strong></p>\r\n\r\n<p>Promovida pelo Servi&ccedil;o de Psicologia do Col&eacute;gio Memorial, visa a levantar, dentre os alunos dos 3&ordm;s anos do Ensino M&eacute;dio, as &aacute;reas em que pretendem ingressar na universidade para, ent&atilde;o, serem convidados profissionais bem sucedidos em cada uma delas para proferir palestras para os estudantes, visando a dar-lhes subs&iacute;dios e informa&ccedil;&otilde;es para as suas escolhas profissionais, sempre precedido de testes vocacionais.<br />\r\n&bull; Noite dos Sonhos:</p>\r\n\r\n<p>Evento voltado para os alunos da Educa&ccedil;&atilde;o Infantil &agrave; 5&ordf; . s&eacute;rie, &eacute; realizado no in&iacute;cio do 3&ordm; bimestre de cada ano. Ocorre sempre em uma sexta-feira, Iniciando &agrave;s 20h e encerrando-se &agrave;s 8h do s&aacute;bado. Nesse dia os alunos trazem seus pijamas, roupas de cama, pantufas e lanternas para as diversas brincadeiras que v&atilde;o at&eacute; altas horas da madrugada, sempre com muita seguran&ccedil;a e acompanhados por professores e monitores. S&atilde;o servidos um lanche na chegada, a ceia e o caf&eacute; da manh&atilde;, antes do regresso ao lar. &Eacute; um acontecimento muito aguardado pelos alunos, com quase 100% de ades&atilde;o.</p>\r\n\r\n<p><br />\r\n<strong>&bull; Datas comemorativas:</strong></p>\r\n\r\n<p>Durante o ano letivo, est&atilde;o inseridas no planejamento algumas datas significativas que s&atilde;o comemoradas ou apenas lembradas, dentro do contexto pedag&oacute;gico, como: Carnaval, Dia do Idoso, Dia Internacional da Mulher, Dia da Escola, In&iacute;cio do Outono, Dia da &Aacute;gua, Dia Nacional do Livro Infantil, Dia da Inconfid&ecirc;ncia Mineira e Dia de Tiradentes, Aventura do Descobrimento, Dia do Trabalho, Escravid&atilde;o, In&iacute;cio do Inverno, Dia do Meio Ambiente, Combate &agrave;s Drogas, Dia do Estudante, Folclore, Dia do Soldado, In&iacute;cio da Primavera, Dia da &Aacute;rvore, Semana do Tr&acirc;nsito, Dia das Crian&ccedil;as, Semana do Aviador, Proclama&ccedil;&atilde;o da Rep&uacute;blica, Dia da Bandeira etc.</p>\r\n\r\n<p><br />\r\n<strong>&bull; Campeonatos interclasses:</strong></p>\r\n\r\n<p>Atividades esportivas desenvolvidas pelos Professores de Educa&ccedil;&atilde;o F&iacute;sica, no primeiro e no segundo semestre, com disputas, por faixa et&aacute;ria, de v&aacute;rias modalidades esportivas. As equipes colocadas nos tr&ecirc;s primeiros lugares s&atilde;o premiadas com medalhas de ouro, prata e bronze e a campe&atilde; leva o trof&eacute;u.</p>\r\n\r\n<p><br />\r\n<strong>&bull; Atividades complementares:</strong></p>\r\n\r\n<p>Desenvolvidas em hor&aacute;rio diverso ao das aulas, o Col&eacute;gio Memorial oferece diversas atividades como capoeira, carat&ecirc;, ballet, jazz, nata&ccedil;&atilde;o, escolinha de futebol etc, com aulas ministradas por Professores expoentes em suas &aacute;reas.</p>\r\n', '1616-03-07', 1),
(7, 'ENSINO', '<p><strong>Acompanhamento do Processo:</strong></p>\r\n\r\n<p>Como suporte ao processo de ensino-aprendizagem, o Col&eacute;gio Memorial disp&otilde;e de servi&ccedil;o t&eacute;cnico especializado, que compreende Coordena&ccedil;&atilde;o Pedag&oacute;gica, Servi&ccedil;o de Psicologia e Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional, que juntos visam:</p>\r\n\r\n<p>&bull; Assistir ao aluno no seu processo de desenvolvimento, para que possa ter uma melhor compreens&atilde;o de suas caracter&iacute;sticas, potencialidades e limita&ccedil;&otilde;es, realizando um processo de sondagem de interesses, aptid&otilde;es e habilidades;</p>\r\n\r\n<p>&bull; Promover atrav&eacute;s de procedimentos adequados, a orienta&ccedil;&atilde;o vocacional do aluno, no conjunto de experi&ecirc;ncias oferecidas pela escola, desenvolvendo o processo de aconselhamento;</p>\r\n\r\n<p>&bull; Sistematizar o processo de acompanhamento dos alunos, encaminhando a outros especialistas, aqueles que exigirem assist&ecirc;ncia especial.</p>\r\n\r\n<p><br />\r\n<strong>Realizam ainda:</strong></p>\r\n\r\n<p><strong>Reuni&otilde;es Pedag&oacute;gicas</strong> &ndash; visando a integra&ccedil;&atilde;o do corpo docente atrav&eacute;s de discuss&atilde;o e reflex&atilde;o sobre a pr&aacute;tica de sala de aula e o direcionamento das a&ccedil;&otilde;es para a consecu&ccedil;&atilde;o da proposta pedag&oacute;gica.</p>\r\n\r\n<p><strong>Conselho de Classe e S&eacute;rie</strong> &ndash; espa&ccedil;o privilegiado para estudar conjuntamente os resultados do rendimento escolar de cada aluno e tamb&eacute;m redirecionar os programas de ensino ou a programa&ccedil;&atilde;o de atividades das disciplinas que revelarem distor&ccedil;&otilde;es de aprendizagem.</p>\r\n\r\n<p><strong>Reuni&atilde;o de Pais</strong> &ndash; encontro bimestral dos Professores com os pais para informa&ccedil;&atilde;o e reflex&atilde;o sobre o desenvolvimento do processo de aprendizagem do aluno.</p>\r\n\r\n<p><strong>Chamamento aos pais</strong> &ndash; encontros espec&iacute;ficos com os pais, por chamado da Coordena&ccedil;&atilde;o Pedag&oacute;gica, Servi&ccedil;o de Psicologia ou Servi&ccedil;o de Orienta&ccedil;&atilde;o Educacional (SOE), quando ser&atilde;o tratados assuntos espec&iacute;ficos do aluno.</p>\r\n', '1616-03-07', 1),
(8, 'MATR&Iacute;CULA', '<p>Ser&aacute; uma alegria receber os seus filhos como nossos alunos. Para matricul&aacute;-los, compare&ccedil;a pessoalmente a uma de nossas unidades, conforme a idade deles:</p>\r\n\r\n<p><strong>Educa&ccedil;&atilde;o Infantil</strong> &ndash; de 4 meses (Ber&ccedil;&aacute;rio) a 5 anos</p>\r\n\r\n<p>Unidade exclusiva para a Educa&ccedil;&atilde;o Infantil: Avenida Padre Angelo Cremonti, 88 &ndash; Ponte S&atilde;o Jo&atilde;o (esquina com a Rua Carlos Gomes). CEP: 13.216-080 &ndash; Jundia&iacute; &ndash; SP &ndash; Telefone: (11) 4526-2322</p>\r\n\r\n<p><strong>Ensino Fundamental</strong> (1&ordm;. ao 9&ordm;. ano) e Ensino M&eacute;dio</p>\r\n\r\n<p>Unidade exclusiva para essas s&eacute;ries: Rua Carlos Gomes, 240 &ndash; Ponte S&atilde;o Jo&atilde;o CEP: 13.218-005 &ndash; Jundia&iacute; &ndash; SP &ndash; Fone: (11) 4526-2322</p>\r\n\r\n<p><strong>Documentos originais do aluno:</strong></p>\r\n\r\n<p>- 2 fotografias 3x4 recentes; - Declara&ccedil;&atilde;o de transfer&ecirc;ncia da escola de origem; - Hist&oacute;rico Escolar; - Declara&ccedil;&atilde;o de Quita&ccedil;&atilde;o Anual de D&eacute;bito da escola de origem &ndash; Lei no. 12.007/2009.</p>\r\n\r\n<p><strong>Documentos do pai, m&atilde;e ou respons&aacute;vel:</strong></p>\r\n\r\n<p>- Fotoc&oacute;pia de: CPF e RG do pai e da m&atilde;e (necess&aacute;rio dos dois), ou do respons&aacute;vel; - Fotoc&oacute;pia do comprovante de resid&ecirc;ncia.</p>\r\n', '1616-03-09', 1),
(9, 'CONCURSO DE BOLSA', '<p>O Col&eacute;gio Memorial oferece os seguintes cursos: Educa&ccedil;&atilde;o Infantil &ndash; crian&ccedil;as a partir do Ber&ccedil;&aacute;rio at&eacute; o pr&eacute;-fundamental, com 5 anos de idade. Ensino Fundamental &ndash; do 1&ordm;. ao 9&ordm;. ano Ensino M&eacute;dio &ndash; curso com foco na prepara&ccedil;&atilde;o para os vestibulares mais concorridos. A 3&ordf;. s&eacute;rie tem aulas em per&iacute;odo integral duas vezes por semana.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&bull; CONCURSO DE BOLSA 2015</strong><br />\r\n<a href="concurso_inscricao.php">Clique aqui para inscrever-se.</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href="#">Se voc&ecirc; j&aacute; fez a prova, clique aqui e saiba o seu resultado!</a></p>\r\n', '1616-03-07', 1),
(10, 'ATIV. COMPLEMENTARES', '<p><strong>Modalidades oferecidas</strong><br />\r\n<br />\r\nDesenvolvidas em hor&aacute;rio diverso ao das aulas, o Col&eacute;gio Memorial oferece atividades complementares como carat&ecirc;, capoeira, ballet, nata&ccedil;&atilde;o e escolinha de futebol, todas ministradas por Professores expoentes em suas &aacute;reas.</p>\r\n', '1616-03-09', 1),
(11, 'CONTATO', '<p><strong>UNIDADE DE EDUCA&Ccedil;&Atilde;O INFANTIL: </strong></p>\r\n\r\n<p><strong>Correspond&ecirc;ncia:</strong> Col&eacute;gio Memorial - Avenida Padre Angelo Cremonti, 132 &ndash; Ponte S&atilde;o Jo&atilde;o - Cep 13.216-080 &ndash; Jundia&iacute; - SP</p>\r\n\r\n<p><strong>Telefone:</strong> (11) <strong>4526-2322</strong></p>\r\n\r\n<p><strong>E-mails: </strong><a href="contatos_infantil.html" onclick="window.open(this.href, ''infantil'', ''resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=650,height=350''); return false;"><strong>Clique aqui para enviar e-mail para o setor desejado</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>UNIDADE DE ENSINO FUNDAMENTAL (1a . a 9a . s&eacute;rie) E ENSINO M&Eacute;DIO:</strong></p>\r\n\r\n<p><strong>Correspond&ecirc;ncia:</strong> Col&eacute;gio Memorial - Rua Carlos Gomes, 240 &ndash; Ponte S&atilde;o Jo&atilde;o - Cep 13.218-005 &ndash; Jundia&iacute; - SP</p>\r\n\r\n<p><strong>Telefone:</strong> (11) <strong>4526-2322 </strong></p>\r\n\r\n<p><strong>E-mails:</strong> <a href="contatos_fundamental.html" onclick="window.open(this.href, ''fundamental'', ''resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=750,height=350''); return false;"><strong>Clique aqui para enviar e-mail para o setor desejado</strong></a></p>\r\n\r\n<p><strong>Professores:</strong> informe-se com cada um deles</p>\r\n', '1616-03-10', 1),
(12, 'A ESCOLA', '<p>O Col&eacute;gio Memorial foi fundado em 1998, com a miss&atilde;o de proporcionar aos alunos uma educa&ccedil;&atilde;o de qualidade, preparando-os para um futuro de sucesso na vida pessoal e profissional.<br />\r\n<br />\r\n<strong>S&atilde;o duas unidades no munic&iacute;pio de Jundia&iacute;:</strong><br />\r\nA <strong>unidade I</strong> est&aacute; instalada na rua Carlos Gomes, 240 &ndash; Ponte S&atilde;o Jo&atilde;o &ndash; telefone 11 4526-2322, onde encontram&ndash;se em funcionamento os cursos de Ensino Fundamental (1&ordm;. ao 9&ordm;. ano) e de Ensino M&eacute;dio.<br />\r\nNa <strong>unidade II</strong>, na rua Padre Angelo Cremonti, 132 (esquina com a rua Carlos Gomes) &ndash; Ponte S&atilde;o Jo&atilde;o, telefone 11 4526-2322, funciona o curso de Educa&ccedil;&atilde;o Infantil, com Ber&ccedil;&aacute;rio para crian&ccedil;as a partir de 4 meses, atendendo alunos at&eacute; a idade pr&eacute;-fundamental, com 5 anos de idade.<br />\r\nA Educa&ccedil;&atilde;o Infantil e Ensino Fundamental, do 1&ordm; ao 5&ordm; ano, funcionam nos per&iacute;odos manh&atilde;, tarde e integral. Do 6&ordm; ao 9&ordm; ano e o Ensino M&eacute;dio s&atilde;o oferecidos no per&iacute;odo da manh&atilde;. A 3&ordf; s&eacute;rie do Ensino M&eacute;dio tem dois dias de aulas em per&iacute;odo integral, porque o foco &eacute; preparar o aluno para os vestibulares mais concorridos.</p>\r\n', '1616-03-10', 1),
(13, 'CURSOS', '<p>O Col&eacute;gio Memorial oferece os seguintes cursos: Educa&ccedil;&atilde;o Infantil &ndash; crian&ccedil;as a partir do Ber&ccedil;&aacute;rio at&eacute; o pr&eacute;-fundamental, com 5 anos de idade. Ensino Fundamental &ndash; do 1&ordm;. ao 9&ordm;. ano Ensino M&eacute;dio &ndash; curso com foco na prepara&ccedil;&atilde;o para os vestibulares mais concorridos. A 3&ordf;. s&eacute;rie tem aulas em per&iacute;odo integral duas vezes por semana.</p>\r\n', '1616-03-10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinadores_ptr`
--

CREATE TABLE IF NOT EXISTS `patrocinadores_ptr` (
  `ptr_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ptr_img` varchar(100) NOT NULL,
  `ptr_link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ptr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `patrocinadores_ptr`
--

INSERT INTO `patrocinadores_ptr` (`ptr_id`, `ptr_img`, `ptr_link`) VALUES
(1, '1.jpg', NULL),
(2, '2.jpg', NULL),
(3, '3.jpg', NULL),
(4, '4.png', NULL),
(5, '5.jpg', NULL),
(6, '6.jpg', NULL),
(7, '7.jpg', NULL),
(8, '8.jpg', NULL),
(9, '9.gif', NULL),
(10, '10.jpg', NULL),
(11, '11.jpeg', NULL),
(12, '12.jpg', NULL),
(13, '13.jpg', NULL),
(14, '14.png', NULL),
(15, '15.jpg', NULL),
(16, '16.jpg', NULL),
(17, '17.jpg', NULL),
(18, '18.png', NULL),
(19, '19.png', NULL),
(20, '20.jpg', NULL),
(21, '21.jpeg', NULL),
(22, '22.JPG', NULL),
(23, '23.png', NULL),
(24, '24.png', NULL),
(25, '25.png', NULL),
(26, '26.jpg', NULL),
(27, '27.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `qub3_queries_que`
--

CREATE TABLE IF NOT EXISTS `qub3_queries_que` (
  `name_que` varchar(50) NOT NULL,
  `query_que` longtext NOT NULL,
  `desc_que` longtext NOT NULL,
  `tables_que` longtext NOT NULL,
  `version_que` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `qub3_queries_que`
--

INSERT INTO `qub3_queries_que` (`name_que`, `query_que`, `desc_que`, `tables_que`, `version_que`) VALUES
('espacos', 'SELECT%20instalacoes_fotos_if.if_imagem%2C%20instalacoes_fotos_if.if_img_capa%2C%20intalacoes_i.i_titulo%2C%20intalacoes_i.i_id%0AFROM%20%28intalacoes_i%0ALEFT%20JOIN%20instalacoes_fotos_if%20ON%20instalacoes_fotos_if.if_i_id%3Dintalacoes_i.i_id%29%0A', '/*%20Created%20with%20Query%20Builder%20%28QuB%29%20-%20version%20%5B1.0.1%5D.*/var%20z%20%3D%20new%20SQLQuery%28%22espacos%22%29%3Bvar%20ret%20%3D%20z%3Bz.version%20%3D%20%221.0.1%22%3Bz.date_creation%20%3D%20new%20Date%28%29.objdeserialize%28%2220160209142748%22%29%3Bz.date_modified%20%3D%20new%20Date%28%29.objdeserialize%28%2220160209142748%22%29%3Bz.distinct%20%3D%20false%3Bvar%20tmp%20%3D%20z.new_table%28%22intalacoes_i%22%2C%20%22intalacoes_i%22%29%3Btmp.table_name%20%3D%20%22intalacoes_i%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22intalacoes_i%22%2C30%2C30%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22i_id%22%2C%20%22i_id%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%203%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22i_titulo%22%2C%20%22i_titulo%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%202%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22i_imagem%22%2C%20%22i_imagem%22%29%3Bvar%20tmp%20%3D%20z.new_table%28%22instalacoes_fotos_if%22%2C%20%22instalacoes_fotos_if%22%29%3Btmp.table_name%20%3D%20%22instalacoes_fotos_if%22%3Btmp.select_all%20%3D%20false%3Btmp.ui%20%3D%20new%20UIObject%28%22instalacoes_fotos_if%22%2C258%2C82%2Cfalse%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22*%22%2C%20%22*%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_id%22%2C%20%22if_id%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_i_id%22%2C%20%22if_i_id%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_titulo%22%2C%20%22if_titulo%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_texto%22%2C%20%22if_texto%22%29%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_imagem%22%2C%20%22if_imagem%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%200%3Bvar%20tmp2%20%3D%20tmp.new_column%28%22if_img_capa%22%2C%20%22if_img_capa%22%29%3Btmp2.checked%20%3D%20true%3Btmp2.output%20%3D%20true%3B%0D%0Atmp2.cindex%20%3D%201%3Bvar%20tmp%20%3D%20z.new_relation%28%22iaktuid_7568_5_%22%29%3Btmp.table1%20%3D%20%22intalacoes_i%22%3Btmp.table2%20%3D%20%22instalacoes_fotos_if%22%3Btmp.field1%20%3D%20%22i_id%22%3Btmp.field2%20%3D%20%22if_i_id%22%3Btmp.card1%20%3D%20%221%22%3Btmp.card2%20%3D%20%22n%22%3Btmp.restrict%20%3D%20%22no%22%3Btmp.ui%20%3D%20%7BrelLeft%3A220%2C%20relTop1%3A45%2C%20relTop2%3A61%7D%3B', ' ', '1.2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qub3_relations_rel`
--

CREATE TABLE IF NOT EXISTS `qub3_relations_rel` (
  `table1_rel` varchar(100) NOT NULL,
  `table2_rel` varchar(100) NOT NULL,
  `t1id_rel` varchar(100) NOT NULL,
  `t2id_rel` varchar(100) NOT NULL,
  `type_rel` varchar(10) NOT NULL,
  `restrict_rel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `qub3_relations_rel`
--

INSERT INTO `qub3_relations_rel` (`table1_rel`, `table2_rel`, `t1id_rel`, `t2id_rel`, `type_rel`, `restrict_rel`) VALUES
('intalacoes_i', 'instalacoes_fotos_if', 'i_id', 'if_i_id', '1-n', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `qub3_settings_set`
--

CREATE TABLE IF NOT EXISTS `qub3_settings_set` (
  `setting_name_set` varchar(32) NOT NULL,
  `setting_value_set` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `qub3_settings_set`
--

INSERT INTO `qub3_settings_set` (`setting_name_set`, `setting_value_set`) VALUES
('dateseparator', ''''),
('notequals', '!='),
('use_asname', 'true');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_u`
--

CREATE TABLE IF NOT EXISTS `usuario_u` (
  `u_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `u_login` varchar(50) NOT NULL,
  `u_senha` varchar(32) NOT NULL,
  `u_email` varchar(70) NOT NULL,
  `u_data` date NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario_u`
--

INSERT INTO `usuario_u` (`u_id`, `u_login`, `u_senha`, `u_email`, `u_data`) VALUES
(1, 'eliezer', 'b63f5fb52b0d6b5bc0784499766d3bfd', 'eliezer@laserpress.net', '2014-09-11'),
(2, 'admin', '4ffd441848ce410c0132ea33a180ea4e', 'eliezer@laserpress.net', '2016-03-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
