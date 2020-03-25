CREATE DATABASE users;
USE users;
create table users(id int(10) NOT NULL, username varchar(32) NOT NULL, password varchar(16) NOT NULL, PRIMARY KEY(id));
-- default record --
insert into users(username, password) values ('admin', 'admin');