/*	Modelo de base de datos para biblioteca
	ai->auto_increment | nn->not null | pk->primary key
	vc->varchar | c->char | dt->datetime | df->default */
drop schema if exists biblioteca;
create schema if not exists biblioteca;
use biblioteca;

/*
Usuarios
	id int ai pk,
	nombre vc(50) nn,
	apellidos vc(50) nn,
	email vc(200) nn df "sin@correo" */
create table usuarios (
	id int auto_increment,
	nombre varchar(50) not null,
	apellidos varchar(50) not null,
	email varchar(200) not null default "sin@correo",
	primary key (id)
) engine=innodb;

/*
Autores
	id int ai pk,
	nombre vc(50) nn,
	apellidos vc(50) nn,
	email vc(200) nn df "sin@correo" */
create table autores (
	id int auto_increment,
	nombre varchar(50) not null,
	apellidos varchar(50) not null,
	email varchar(200) not null default "sin@correo",
	primary key (id)
) engine=innodb;

/*
Editoriales
	id int ai pk,
	nombre vc(200) nn,
	direccion text nn,
	email vc(200) nn df "sin@correo",
	sitio_web vc(200) nn df "sin.sitio.web" */
create table editoriales (
	id int auto_increment,
	nombre varchar(200) not null,
	direccion text not null,
	email varchar(200) not null default "sin@correo",
	sitio_web varchar(200) not null default "sin.sitio.web",
	primary key (id)
) engine=innodb;

/*
Libros
	id int ai pk,
	titulo vc(200) nn,
	paginas int nn,
	autor_id int nn,
	editorial_id int nn */
create table libros (
	id int auto_increment,
	titulo varchar(200) not null,
	paginas int not null,
	autor_id int not null,
	editorial_id int not null,
	primary key (id),
	constraint fk_libros_autores
		foreign key (autor_id)
		references autores (id)
			on delete restrict
			on update cascade,
	constraint fk_libros_editoriales
		foreign key (editorial_id)
		references editoriales (id)
			on delete restrict
			on update cascade
) engine=innodb;

/*
Prestamos
	id int ai pk,
	usuario_id int nn,
	libro_id int nn,
	fecha_entrega dt nn,
	fecha_recepcion dt nn
*/
create table prestamos (
	id int auto_increment,
	usuario_id int not null,
	libro_id int not null,
	fecha_entrega datetime not null,
	fecha_recepcion datetime not null,
	primary key (id),
	constraint fk_prestamos_usuarios
		foreign key (usuario_id)
		references usuarios (id)
			on delete restrict
			on update cascade,
	constraint fk_prestamos_libros
		foreign key (libro_id)
		references libros (id)
			on delete restrict
			on update cascade
) engine=innodb;