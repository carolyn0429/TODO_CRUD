<?php

$host="localhost";
$database="task";
$user="root";
$pwd = "123123";

$mysqli = new mysqli($host, $user, $pwd, $database);

if ($mysqli->connect_error){
	printf("Connect failed: %s\n", $mysqli->connect_error;
		exit();
}