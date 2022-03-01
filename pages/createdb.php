<?php

include_once('../config/config.php');

$countries = 'create table countries(
id int not null auto_increment primary key, 
country varchar(64) unique
)default charset="utf8"';

$cities = 'create table cities(
id int not null auto_increment primary key, 
city varchar(64), 
countryid int, 
foreign key(countryid) references countries(id) 
on delete cascade,
ucity varchar(128),
unique index ucity(city, countryid))default charset="utf8"';

$hotels = 'create table hotels(
id int not null auto_increment primary key, 
hotel varchar(64), 
cityid int, 
foreign key(cityid) references cities(id) on delete cascade, 
countryid int, 
foreign key(countryid) references countries(id) on delete cascade, 
stars int, 
cost int,
info varchar(1024))default charset="utf8"';

$images = 'create table images(
	id int not null auto_increment primary key,
	imagepath varchar(255),
	hotelid int, 
	foreign key(hotelid) references hotels(id) on delete cascade)
	default charset="utf8"';

$roles = 'create table roles(
	id int not null auto_increment primary key,
	role varchar(32))default charset="utf8"';

$users = 'create table users(
	id int not null auto_increment primary key,
	login varchar(32) unique,
	pass varchar(128),
	email varchar(128),
	discount int,
	roleid int, 
	foreign key(roleid) references roles(id) on delete cascade,
	avatar mediumblob
	)default charset="utf8"';

mysqli_query($link, $countries);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 1:' . $err . '<br>';
    exit();
}

mysqli_query($link, $cities);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 2:' . $err . '<br>';
    exit();
}

mysqli_query($link, $hotels);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 3:' . $err . '<br>';
    exit();
}

mysqli_query($link, $images);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 4:' . $err . '<br>';
    exit();
}

mysqli_query($link, $roles);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 5:' . $err . '<br>';
    exit();
}

mysqli_query($link, $users);
$err = mysqli_errno($link);
if ($err) {
    echo 'Error code 6:' . $err . '<br>';
    exit();
}