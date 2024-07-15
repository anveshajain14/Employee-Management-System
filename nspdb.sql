create database company;
use company;
create table employee
(id int primary key,
name varchar(50),
post varchar(20),
salary int);
create table admin
(id int primary key,
name varchar(50),
pass varchar(255),
email varchar(50));
