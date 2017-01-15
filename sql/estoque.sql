CREATE TABLE `cliente` (
  `id_cliente` integer NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `insc_estadual` varchar(9) NOT NULL,
  `id_endereco` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `endereco` (
  `id_endereco` integer NOT NULL,
  `rua` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `complemento` varchar(18) NOT NULL,
  `bairro` varchar(18) NOT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `cidade` varchar(18) NOT NULL,
  `uf` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `telefone` (
  `numero_fone` varchar(20) NOT NULL,
  `id_cliente` integer NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `fornecedor` (
  `id_fornecedor` integer NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `insc_estadual` varchar(9) NOT NULL,
  `id_endereco` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `produto` (
  `id_produto` integer NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` numeric NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `venda` (
  `numero_nfe` bigint(50) NOT NULL,
  `data` date NOT NULL,
  `qtd_produto` integer NOT NULL,
  `id_produto` integer NOT NULL,
  `id_cliente` integer NOT NULL,
  `id_usuario` integer NOT NULL,
  `id_fornecedor` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario` (
  `id_usuario` integer NOT NULL,
  `nome` varchar(16) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY (`cnpj`),
  MODIFY `id_cliente` integer NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `FK_endereco_cliente` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),;


ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
    MODIFY `id_endereco` integer NOT NULL AUTO_INCREMENT;

ALTER TABLE `telefone`
  ADD PRIMARY KEY (`numero_fone`,`id_cliente`);


ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  MODIFY `id_produto` integer NOT NULL AUTO_INCREMENT;

ALTER TABLE `venda`
  ADD PRIMARY KEY (`numero_nfe`),
  MODIFY `numero_nfe` integer NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  MODIFY `id_usuario` integer NOT NULL AUTO_INCREMENT;


ALTER TABLE `venda`
  ADD CONSTRAINT `FK_produto_venda` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `FK_cliente_venda` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FK_fornecedor_venda` FOREIGN KEY (`id_fornecedor`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FK_usuario_venda` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

