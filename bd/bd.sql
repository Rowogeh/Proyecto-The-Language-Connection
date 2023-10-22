drop database if exists academia;
create database academia;
use academia;

/*Tablas*/

create table usuario(
	usu  varchar(15) not null,
	unique(usu),
	pass varchar(90) not null,
	nom	 varchar(30) not null,
	ape  varchar(30) not null,
	pre  varchar(30) not null,
	res  varchar(30) not null,
	lvl int not null,
	primary key(usu)
) engine = InnoDB default character set = 'utf8';

insert into usuario values
('academia', md5('academia'),'nom','ape','pre','res', 1);

create table representante(
	id    int auto_increment not null,
	ci    varchar(14) not null,
	unique(ci),
	nom   varchar(60) not null,
	ape   varchar(60) not null,
	par   varchar(60) not null,
	telm  varchar(15) not null,
	telf  varchar(15) not null,
    ci_est varchar(14) not null,
    foreign key(ci_est) references estudiante(ci) on delete no action on update cascade,
	primary key(id)
) engine = InnoDB default character set = 'utf8';

create table cursos(
	id  int auto_increment not null,
	cod varchar(20) not null,
	unique(cod),
	nom varchar(15) not null,
    unique(nom),
	primary key(id)
) engine = InnoDB default character set = 'utf8';

create table estudiante(
	id    int auto_increment not null,
	curso  varchar(20) not null,
	insc  date        not null,
	nom   varchar(60) not null,
	ape   varchar(60) not null,
 	ci    varchar(14) not null,
 	unique(ci),
 	gen   varchar(14) not null,
 	fnac  date        not null,
 	lnac  varchar(60) not null,
 	dir   varchar(90) not null,
 	telm  varchar(15) not null,
 	telf  varchar(15) not null,
    cod_nom  varchar(15) not null, 
 	foreign key(curso) references cursos(cod) on delete no action on update cascade,
 	primary key(id)
) engine = InnoDB default character set = 'utf8';

create table notas(
	id int auto_increment not null,
	curso varchar(20) not null,
	nom_cur varchar(30) not null,
	rep varchar(14) not null,
	nom_est varchar(30) not null,
	nota varchar(30) not null,
    foreign key(curso) references cursos(cod) on delete no action on update cascade,
    foreign key(rep) references estudiante(ci) on delete no action on update cascade,
	primary key(id)
) engine = InnoDB default character set = 'utf8';

create table oficina(
	id int auto_increment not null,
	nom varchar(15) not null,
	mar varchar(30) not null,
	mdl varchar(30) not null,
	ser varchar(30) not null,
	cod varchar(30) not null,
	des varchar(90) null,
	primary key(id)
) engine = InnoDB default character set = 'utf8';

create table horarios(
	id int auto_increment not null,
	curso1 varchar(15) not null,
    foreign key(curso1) references cursos(nom) on delete no action on update cascade,
	primary key(id)
) engine = InnoDB default character set = 'utf8';

/*Datos*/

insert into representante values(
	null,
	'V-09.030.013',
	'Nuevo',
	'Sosa',
	'Padre',
	'Tecnico Electricista',
	'(0426)-604-3333',
	'(0275)-808-4372',
	'(0000)-000-3433'
);

insert into instrumento values(
	null,
	'032434635',
	'Guitarra',
	'Bestler',
	'1/2',
	''
);

insert into estudiante values(
	null,
	'V-09.030.013',
	'032434635',
	'2020/08/31',
	'César Antonio',
	'Sosa García',
	'V-24.584.962',
	'Masculino',
	'1995/12/26',
	'Caracas',
	'La Arboleda Apt 32-3',
	'(0414)-176-7918',
	'(0275)-808-4372',
	'Profesor Musica',
	'Viento',
	'Aprobada',
	'Aprobada',
	'Aprobada',
	'Cursando',
	'UPTM',
	'Bailadores',
	'Eduardo Espinoza',
	'(0000)-000-0000'
);

insert into nucleo values(
	null,
	'Silla',
	'Marca',
	'Modelo',
	'Serial',
	'Codigo',
	'Descripcion'
);

insert into oficina values(
	null,
	'Nombre',
	'Marca',
	'Modelo',
	'Serial',
	'Codigo',
	'Descripcion'
);

/*Consultas*/

select cod,nom from instrumento where cod='0324346345';

select nom from estudiante inner join representante;

select ocu, representante.nom as nomrep, representante.ape as nomape, estudiante.nom as estudiante, instrumento.nom as instrumento
from representante 
inner join estudiante on estudiante.rep = representante.ci 
inner join instrumento on estudiante.inst = instrumento.cod where estudiante.ci = 'V-24.584.962';

select estudiante.nom, representante.nom, instrumento.nom from estudiante 
inner join representante inner join instrumento
where representante.ci='V-09.030.013' and estudiante.rep='V-09.030.013' and instrumento.cod='032434635'; 

select * from estudiante inner join representante inner join instrumento
where representante.ci='V-09.030.013' and estudiante.rep='V-09.030.013' and instrumento.cod='032434635';

select estudiante.nom,estudiante.ape,estudiante.ci,estudiante.pro,estudiante.prog from estudiante 
inner join representante
inner join instrumento
where representante.ci='V-09.030.013' and estudiante.rep='V-09.030.013' and instrumento.cod='032434635'; 

select estudiante.nom,estudiante.ape,estudiante.ci,estudiante.pro,estudiante.prog from estudiante 
inner join representante
inner join instrumento;

/*Actualizar*/

/*Eliminar*/

delete from representante where ci ='e-12.312.312';

delete from instrumento where cod='123';

delete from estudiante where ci='v-25.584.962';

update estudiante set 