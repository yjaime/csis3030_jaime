<?php

$connection = mysqli_connect("localhost","root","root","ecommerce");
session_start();

/*

create table categories (
	id int auto_increment not null primary key,
	category_name varchar(200) not null
);

create table products (
	id int auto_increment not null primary key,
	category_id int not null,
	product_name varchar(200) not null,
	price decimal(6,2) not null,
	quantity_remaining int not null,
	description text not null,
	image varchar(200) not null
);

create table cart (
	id int auto_increment not null primary key,
	session_id varchar(200) not null,
	product_id int not null,
	quantity int not null
);

*/

?> 