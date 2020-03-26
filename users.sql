CREATE DATABASE IF NOT EXISTS users;

USE users;

create table IF NOT EXISTS users
(
	id int(10) NOT NULL AUTO_INCREMENT, 
	username varchar(32) NOT NULL, 
	email varchar(32) NOT NULL, 
	password varchar(16) NOT NULL, 
	PRIMARY KEY(id)
);

-- default record --

insert into users(username, email, password) values ('admin', 'admin23@gmail.com', 'admin');