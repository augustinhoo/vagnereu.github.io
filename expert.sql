-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2018 às 04:13
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expert`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `cod_cidade` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`cod_cidade`, `nome`, `uf`, `estado`) VALUES
(66, 'manaus', 'AM', 'AMAZÔNIA'),
(59, 'CIANORTE', 'PR', 'PARANÁ'),
(64, 'céu azul', 'MG', 'MINAS GERAIS'),
(65, 'terra boa', 'PR', 'PARANÁ'),
(67, 'jussara', 'PR', 'PARANÁ'),
(68, 'brasília', 'DF', 'DISTRITO FEDERAL'),
(69, 'moreira sales', 'PR', 'PARANÁ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cond_pgto`
--

CREATE TABLE `cond_pgto` (
  `cod_cond` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `num_parc` int(11) NOT NULL,
  `forma_pgto` varchar(20) NOT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cond_pgto`
--

INSERT INTO `cond_pgto` (`cod_cond`, `tipo`, `num_parc`, `forma_pgto`, `situacao`) VALUES
(3, 'À vista', 3, 'Boleto', 'Ativo'),
(2, 'À vista', 1, 'Boleto', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `cod_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `carga_horaria` int(5) NOT NULL,
  `preco` double NOT NULL,
  `qtde_aulas` int(11) NOT NULL,
  `qtde_material` int(11) DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `nome_curso`, `carga_horaria`, `preco`, `qtde_aulas`, `qtde_material`, `situacao`) VALUES
(13, 'curso de power point', 26, 300.69, 14, 6, 'Ativo'),
(11, 'curso de excel', 20, 699.15, 10, 1, 'Ativo'),
(12, 'curso de word', 16, 100.6, 8, 1, 'Ativo'),
(14, 'corel draw x9', 30, 19.63, 15, 2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `cod_despesa` int(11) NOT NULL,
  `cod_fornec` int(11) NOT NULL,
  `cod_cond` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor_despesa` float NOT NULL,
  `data_despesa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregamateriais`
--

CREATE TABLE `entregamateriais` (
  `cod_entrega` int(11) NOT NULL,
  `cod_matricula` int(11) NOT NULL,
  `cod_material` int(11) NOT NULL,
  `data_entrega` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estorno_parcela_despesas`
--

CREATE TABLE `estorno_parcela_despesas` (
  `cod_estorno` int(11) NOT NULL,
  `cod_parc` int(11) NOT NULL,
  `valo_juros` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `data_pgto` date DEFAULT NULL,
  `valor_pgto` float DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estorno_parcela_matriculas`
--

CREATE TABLE `estorno_parcela_matriculas` (
  `cod_estorno` int(11) NOT NULL,
  `cod_parc` int(11) NOT NULL,
  `valor_juros` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `data_pgto` date DEFAULT NULL,
  `valor_pgto` float DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cod_fornec` int(11) NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `cod_frequencia` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `cod_matricula` int(11) NOT NULL,
  `data_aula` date NOT NULL,
  `presente` char(1) DEFAULT NULL,
  `reposicao` char(1) DEFAULT NULL,
  `total_frequencia` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `cod_material` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` float DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`cod_material`, `nome`, `preco`, `situacao`) VALUES
(1, 'APOSTILA MICROSOFT WORD 2010', 119.9, 'Atual'),
(2, 'APOSTILAS MICROSOFT EXCEL 2010', 89.9, 'Atual'),
(3, 'APOSTILA POWER POINT 2010', 89.9, 'Atual'),
(5, 'apostila internet edge explorer', 129.91, 'Descartado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `cod_matricula` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL,
  `cod_cond` int(11) NOT NULL,
  `data_matricula` date NOT NULL,
  `valor_matricula` float NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `entrada` float DEFAULT NULL,
  `certificado` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `cod_nota` int(11) NOT NULL,
  `cod_matricula` int(11) NOT NULL,
  `desc_avaliacao` varchar(100) NOT NULL,
  `nota` float NOT NULL,
  `data_prova` date NOT NULL,
  `media` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelamatriculas`
--

CREATE TABLE `parcelamatriculas` (
  `cod_parc` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_matricula` int(11) NOT NULL,
  `n_parc` int(11) NOT NULL,
  `valor_parc` float NOT NULL,
  `data_vcto` date NOT NULL,
  `valor_juros` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `data_pgto` date DEFAULT NULL,
  `valor_pago` float DEFAULT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcela_despesas`
--

CREATE TABLE `parcela_despesas` (
  `cod_parcela` int(11) NOT NULL,
  `cod_despesa` int(11) NOT NULL,
  `cod_fornec` int(11) NOT NULL,
  `n_parc` int(11) NOT NULL,
  `valor_parc` float NOT NULL,
  `data_vcto` date NOT NULL,
  `valor_juros` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `data_pgto` date DEFAULT NULL,
  `valor_pgto` float DEFAULT NULL,
  `situacao` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `cod_pessoa` int(11) NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `funcao_aluno` varchar(20) DEFAULT NULL,
  `funcao_prof` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `num_resid` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fone` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `celular2` varchar(20) DEFAULT NULL,
  `cod_cidade_resp` int(11) DEFAULT NULL,
  `nome_resp` varchar(100) DEFAULT NULL,
  `rg_resp` varchar(20) DEFAULT NULL,
  `cpf_resp` varchar(20) DEFAULT NULL,
  `data_nasc_resp` date DEFAULT NULL,
  `endereco_resp` varchar(100) DEFAULT NULL,
  `num_resid_resp` varchar(20) DEFAULT NULL,
  `bairro_resp` varchar(100) DEFAULT NULL,
  `complemento_resp` varchar(100) DEFAULT NULL,
  `cep_resp` varchar(8) DEFAULT NULL,
  `email_resp` varchar(100) DEFAULT NULL,
  `fone_resp` varchar(20) DEFAULT NULL,
  `celular_resp` varchar(20) DEFAULT NULL,
  `celular2_resp` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `cod_turma` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `data_criacao_turma` date NOT NULL,
  `nome_turma` varchar(100) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `vagas` int(11) NOT NULL,
  `dia_curso` varchar(20) NOT NULL,
  `hora_inicio` varchar(5) DEFAULT NULL,
  `hora_fim` varchar(5) DEFAULT NULL,
  `situacao` varchar(20) NOT NULL,
  `obsevacao` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `situacao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nome`, `login`, `senha`, `perfil`, `situacao`) VALUES
(1, 'vagner', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', 'Admin', 'Ativo'),
(4, 'Catia', 'catia@catia.com', '202cb962ac59075b964b07152d234b70', 'Admin', 'Inativo'),
(5, 'Julia', 'julia@julia.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'Admin', 'Ativo'),
(7, 'kassandra', 'ka@ka.com', '202cb962ac59075b964b07152d234b70', 'Professor(a)', 'Ativo'),
(8, 'paula', 'paula@paula.com', '202cb962ac59075b964b07152d234b70', 'Professor(a)', 'Inativo'),
(9, 'augustinho', 'augustinho@augustinho.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Admin', 'Inativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`cod_cidade`);

--
-- Indexes for table `cond_pgto`
--
ALTER TABLE `cond_pgto`
  ADD PRIMARY KEY (`cod_cond`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`cod_despesa`),
  ADD KEY `condicao_e_despesas` (`cod_cond`),
  ADD KEY `fornecedor_e_despesas` (`cod_fornec`);

--
-- Indexes for table `entregamateriais`
--
ALTER TABLE `entregamateriais`
  ADD PRIMARY KEY (`cod_entrega`),
  ADD KEY `matricula_e_materiasentregue` (`cod_matricula`),
  ADD KEY `materiais_e_entrega_materiais` (`cod_material`);

--
-- Indexes for table `estorno_parcela_despesas`
--
ALTER TABLE `estorno_parcela_despesas`
  ADD PRIMARY KEY (`cod_estorno`),
  ADD KEY `parcDespesas_e_estorno` (`cod_parc`);

--
-- Indexes for table `estorno_parcela_matriculas`
--
ALTER TABLE `estorno_parcela_matriculas`
  ADD PRIMARY KEY (`cod_estorno`),
  ADD KEY `parcMatricula_e_estorno` (`cod_parc`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cod_fornec`),
  ADD KEY `cidade_e_fornecedor` (`cod_cidade`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`cod_frequencia`),
  ADD KEY `matricula_e_frequencia` (`cod_matricula`),
  ADD KEY `cursos_e_frequencia` (`cod_curso`),
  ADD KEY `turmas_e_frequencia` (`cod_turma`);

--
-- Indexes for table `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`cod_material`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cod_matricula`),
  ADD KEY `turmas_e_matriculas` (`cod_turma`),
  ADD KEY `pessoas_e_matriculas` (`cod_pessoa`),
  ADD KEY `condicao_e_matricula` (`cod_cond`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`cod_nota`),
  ADD KEY `matricula_e_notas` (`cod_matricula`);

--
-- Indexes for table `parcelamatriculas`
--
ALTER TABLE `parcelamatriculas`
  ADD PRIMARY KEY (`cod_parc`),
  ADD KEY `pessoas_e_parcelas` (`cod_pessoa`),
  ADD KEY `matricula_e_parcela` (`cod_matricula`);

--
-- Indexes for table `parcela_despesas`
--
ALTER TABLE `parcela_despesas`
  ADD PRIMARY KEY (`cod_parcela`),
  ADD KEY `despesas_e_parcelas` (`cod_despesa`),
  ADD KEY `fornecedor_e_parcelas_despesas` (`cod_fornec`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`cod_pessoa`),
  ADD KEY `cidades_e_pessoas` (`cod_cidade`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `cursos_e_turmas` (`cod_curso`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `cod_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cond_pgto`
--
ALTER TABLE `cond_pgto`
  MODIFY `cod_cond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materiais`
--
ALTER TABLE `materiais`
  MODIFY `cod_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
