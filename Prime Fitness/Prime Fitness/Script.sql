create database PrimeFitness
use PrimeFitness

create table members(
id int auto_increment primary key,
name varchar(200),
email varchar(200),
phone int(20)
);

create table admin(
id int auto_increment primary key,
username varchar(200),
password varchar(200)
);

insert into admin (username,password) values ('admin','admin123')
