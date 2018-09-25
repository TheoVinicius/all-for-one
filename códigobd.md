JA FOI EXECUTADO

CREATE TABLE  adm(
	id_adm
username VARCHAR(100) not null,
senha        VARCHAR(100) not nul
primary key(id_adm)
);

CREATE TABLE  usuario 
(
id_usuario INT not null autoincrement,
senha VARCHAR (60),
nomePróprio VARCHAR(35),
sobrenome VARCHAR(35),
email VARCHAR(255),
amigo VARCHAR (35),
datNasc DATE,
sexo INT,
primary key(id_usuario)
 );




MODIFICAR ESTA PARTE



CREATE TABLE humor 
(
	id_humor int auto_increment,
	humormanha int not null, 
	humortarde int not null, 
	humornoite int not null, 
	data_humor DATE not null, 
	primary key(id_humor)
);

CREATE TABLE postagem 
(
	id_postagem int auto_increment,
	data_postagem date not null, 
username_adm varchar(100) not null,
	primary key(id_postagem),
	foreing key (username_adm) references adm(username)
	
);

CREATE TABLE usuario-postagem
(
	id_usuario int not null, 
	id_postagem int not null,
	primary key(id_usuario, id_postagem),
	foreign key (id_usuario) references usuario(id_usuario),
	foreign key(id_adm) references adm(id_adm),
);

CREATE TABLE categoria
(
	id_categoria int auto_increment not null,
	categoria int not null, 
	primary key(id_categoria)
);

CREATE TABLE postagem-categoria
(
	id_postagem int not null,
	id_categoria int  not null,
	primary key(id_postagem, id_categoria),
	foreign key (id_postagem) references postagem(id_postagem),
	foreign key (id_categoria) references categoria(id_categoria),
);

CREATE TABLE diario
(
	id_diario int auto_increment not null,
	registrodiario int not null, 
data_diario date not null, 
id_usuario int not null,
	primary key(id_diario),
	foreign key (id_usuario) references usuario(id_usuario),
);


