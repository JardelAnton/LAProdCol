CREATE TABLE telefone(
	numero varchar(20) NOT NULL,
	identifica INTEGER NOT NULL,
	CONSTRAINT PK_PHONE PRIMARY KEY (numero,identifica)
);

CREATE TABLE cliente(
	codcli INTEGER NOT NULL AUTO_INCREMENT,
	cnpj varchar(20) NOT NULL,
	nome VARCHAR(50) NOT NULL,
	CONSTRAINT PK_dist PRIMARY KEY (codcli)
);

CREATE TABLE pessoa(
	idpessoa INTEGER NOT NULL AUTO_INCREMENT,
	representa INTEGER,
	nome varchar(50) NOT NULL,
	email varchar(30) NOT NULL,
	CONSTRAINT PK_PESSOA PRIMARY KEY (idpessoa),
	CONSTRAINT FK_CLIENTE_PESSOA FOREIGN KEY (representa) REFERENCES cliente(codcli)	
);

CREATE TABLE endereco(
	address INTEGER NOT NULL AUTO_INCREMENT,
	identifica INTEGER,
	uf varchar(2) NOT NULL,
	cidade varchar(30) NOT NULL,
	cep varchar(9) NOT NULL,
	bairro varchar(30) NOT NULL,
	logradouro varchar(30) NOT NULL,
	CONSTRAINT PK_ENDERECO PRIMARY KEY (address)
);

CREATE TABLE produto(
	codpro INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	valor double,
	validade INTEGER NOT NULL,
	CONSTRAINT PK_PRODUTO PRIMARY KEY (codpro)
);

CREATE TABLE lote(
	codlote INTEGER NOT NULL AUTO_INCREMENT,
	produto INTEGER NOT NULL,
	quantia INTEGER NOT NULL,
	data_hora DATE NOT NULL,
	CONSTRAINT PK_lote PRIMARY KEY (codlote),
	CONSTRAINT FK_LOTE_PRODUTO FOREIGN KEY (produto) REFERENCES produto(codpro)
);

CREATE TABLE compra(
	nota INTEGER NOT NULL AUTO_INCREMENT,
	pessoa INTEGER NOT NULL,
	nro_lote INTEGER NOT NULL,
	quantia INTEGER NOT NULL,
	valor_comp double NOT NULL,
	data_hora DATE NOT NULL,
	status INTEGER NOT NULL,
	CONSTRAINT PK_comp PRIMARY KEY (nota),
	CONSTRAINT FK_PESSOA_COMPRA FOREIGN KEY (pessoa) REFERENCES pessoa(idpessoa),
	CONSTRAINT FK_LOTE_COMPRA FOREIGN KEY (nro_lote) REFERENCES lote(codlote)
);

CREATE TABLE entrega(
	nota INTEGER NOT NULL,
	data DATE NOT NULL,
	hora timestamp NOT NULL,
	CONSTRAINT PK_ENTREGA PRIMARY KEY (nota),
	CONSTRAINT FK_COMPRA_ENTREGA FOREIGN KEY (nota) REFERENCES compra(nota)
);