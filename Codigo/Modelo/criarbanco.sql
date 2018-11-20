CREATE TABLE  adm(
id_adm int auto_increment not null,
username VARCHAR(100) not null,
senha VARCHAR(100) not null,
primary key(id_adm)
);

CREATE TABLE  usuario
(
id_usuario INT not null auto_increment,
senha VARCHAR (60),
nomePróprio VARCHAR(35),
sobrenome VARCHAR(35),
email VARCHAR(255) not null unique,
amigo VARCHAR (35),
datNasc DATE,
sexo INT,
primary key(id_usuario)
);

CREATE TABLE humor
(
	id_humor int auto_increment,
	id_usuario int not null,
	humormanha int not null,
	humortarde int not null,
	humornoite int not null,
	data_humor DATE not null,
	primary key(id_humor),
	FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE categoria
(
	id_categoria int auto_increment not null,
	categoria varchar(100) not null,
	primary key(id_categoria)
);

CREATE TABLE postagem
(
	id_postagem int auto_increment not null,
	data_postagem date not null,
	id_adm int not null unique,
  id_categoria int not null,
  arquivo_postagem varchar(100),
	primary key(id_postagem),
	foreign key (id_adm) references adm(id_adm),
  foreign key (id_categoria) references categoria(id_categoria)
);

CREATE TABLE usuario_postagem
(
	id_usuario int not null,
	id_postagem int not null,
	primary key(id_usuario, id_postagem),
	foreign key (id_usuario) references usuario(id_usuario),
	foreign key(id_postagem) references postagem(id_postagem)
);


CREATE TABLE diario
(
	id_diario int auto_increment not null,
	registrodiario varchar(2000) not null,
	data_diario date not null,
	id_usuario int not null,
	primary key(id_diario),
	foreign key (id_usuario) references usuario(id_usuario)
);
