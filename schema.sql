create database releasix;
use releasix; 

create table user (
	id int not null auto_increment primary key,
	username varchar(50),
	name varchar(50),
	lastname varchar(50),
	email varchar(255),
	password varchar(60),
	is_active boolean not null default 1,
	kind int not null default 1,
	created_at datetime
);

insert into user (username,password,kind,created_at) value ("admin",sha1(md5("admin")),1,NOW());



create table status(
	id int not null auto_increment primary key,
	name varchar(200),
	color varchar(200)
);

insert into status (name,color) value ('Pendiente','warning');
insert into status (name,color) value ('En desarrollo','success');
insert into status (name,color) value ('Finalizado','primary');
insert into status (name,color) value ('Cancelado','danger');

create table project (
	id int not null auto_increment primary key,
	name varchar(200),
	start_at date,
	finish_at date,
	status_id int,
	description text,
	kind int default 1 /* 1. publico, 2. privado */
	);




create table license (
	id int not null auto_increment primary key,
	date_at date,
	project_id int,
	user_id int not null,
	is_active boolean default 0,
	created_at datetime,
	foreign key (project_id) references project(id),
	foreign key (user_id) references user(id)
);

create table rel (
	id int not null auto_increment primary key,
	date_at date,
	tag varchar(255),
	title varchar(255),
	downloadlink varchar(255),
	changelog varchar(255),
	project_id int,
	user_id int not null,
	is_active boolean default 0,
	created_at datetime,
	foreign key (project_id) references project(id),
	foreign key (user_id) references user(id)
);

