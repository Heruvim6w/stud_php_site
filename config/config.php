<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'travels';

$link = mysqli_connect($host,$user,$pass) or die('connection error');
mysqli_select_db($link, $dbname) or die('DB open error');
mysqli_query($link, "set names 'utf8'");