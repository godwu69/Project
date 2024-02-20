create database PrimeFitness
use PrimeFitness

create table members(
id int auto_increment primary key,
name varchar(200),
email varchar(200),
phone int(20)
);

select * from members m 