CREATE USER lairton;
SET PASSWORD FOR 'lairton' = PASSWORD('210399');
GRANT ALL PRIVILEGIES ON LAprodcol TO lairton;

CREATE TABLE terreno(
	codt INTEGER NOT NULL AUTO_INCREMENT,
	local VARCHAR(30) NOT NULL,
	propr VARCHAR(30),
	area FLOAT NOT NULL,
	CONSTRAINT PK_terr PRIMARY KEY (codt)
);

CREATE TABLE funcionario(
	codf INTEGER NOT NULL AUTO_INCREMENT,
	cpf BIGINT NOT NULL,
	nome VARCHAR(30) NOT NULL,
	nro_cart BIGINT NOT NULL,
	carga_hor VARCHAR(15) NOT NULL,
	sal FLOAT NOT NULL,
  	ultima_alt timestamp,
	ultimo_usuario varchar(50),
	CONSTRAINT PK_func PRIMARY KEY (codf)
);

CREATE TABLE cliente(
	codc INTEGER NOT NULL AUTO_INCREMENT,
	cnpj varchar(20) NOT NULL,
	name VARCHAR(30) NOT NULL,
	address VARCHAR(50) NOT NULL,
	email VARCHAR(30),
	phones VARCHAR(15),
	contact_name VARCHAR(30),
	CONSTRAINT PK_dist PRIMARY KEY (codc)
);

CREATE TABLE produto(
	codp INTEGER NOT NULL AUTO_INCREMENT,
	embalagem VARCHAR(15),
	valor FLOAT,
	CONSTRAINT PK_PRODUTO PRIMARY KEY (codp)
);

CREATE TABLE lote(
	codl INTEGER NOT NULL AUTO_INCREMENT,
	nro INTEGER NOT NULL,
	qtd_cax INTEGER NOT NULL,
	qtd_pac INTEGER NOT NULL,
	data_emb DATE NOT NULL,
	data_val DATE NOT NULL,
	CONSTRAINT PK_lote PRIMARY KEY (codl)
);

CREATE TABLE compra(
	codc INTEGER NOT NULL AUTO_INCREMENT,
	nota INTEGER NOT NULL,
	cnpj_dist INTEGER NOT NULL,
	nro_lote INTEGER NOT NULL,
	emb INTEGER NOT NULL,
	qtd_emb INTEGER NOT NULL,
	valor_comp FLOAT,
	data DATE,
	CONSTRAINT PK_comp PRIMARY KEY (codc),
	CONSTRAINT FK_cliente_COMPRA FOREIGN KEY (cnpj_dist) REFERENCES cliente(codc),
	CONSTRAINT FK_LOTE_COMPRA FOREIGN KEY (nro_lote) REFERENCES lote(codl),
	CONSTRAINT FK_EMBALAGEM_COMPRA FOREIGN KEY (emb) REFERENCES produto(codp)
);

CREATE TABLE embala(
	code INTEGER NOT NULL AUTO_INCREMENT,
	cpf INTEGER NOT NULL,
	nro INTEGER NOT NULL,
	CONSTRAINT PK_emba PRIMARY KEY (code),
	CONSTRAINT FK_emba_func FOREIGN KEY (cpf) REFERENCES funcionario(codf),
	CONSTRAINT FK_emba_lote FOREIGN KEY (nro) REFERENCES lote(codl)
);

CREATE TABLE trabalha(
	codtr INTEGER NOT NULL AUTO_INCREMENT,
	dia DATE NOT NULL,
	tipo_serv VARCHAR(10) NOT NULL,
	local INTEGER NOT NULL,
	cpf INTEGER NOT NULL,
	CONSTRAINT PK_trab PRIMARY KEY (codtr),
	CONSTRAINT FK_trab_terr FOREIGN KEY (local) REFERENCES terreno(codt),
	CONSTRAINT FK_trab_func FOREIGN KEY (cpf) REFERENCES funcionario(codf)
);

CREATE TABLE colheita(
	codcl INTEGER NOT NULL AUTO_INCREMENT,
	data DATE,
	local INTEGER NOT NULL,
	cpf INTEGER NOT NULL,
	qtd_caixas INTEGER NOT NULL,
	resi INTEGER,
	rend INTEGER,
	CONSTRAINT PK_colh PRIMARY KEY (codcl),
	CONSTRAINT FK_colh_terr FOREIGN KEY (local) REFERENCES terreno(codt),
	CONSTRAINT FK_colh_func FOREIGN KEY (cpf) REFERENCES funcionario(codf)
);
