<?php

session_start();
$_SESSION['user_id']=1;
$db = new PDO("mysql:dbname=task;host=localhost", "root","123123");

if (!isset($_SESSION['user_id'])){
	die("you are not signed in");
}