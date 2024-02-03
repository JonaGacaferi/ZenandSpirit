<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "person";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Failed to connect!");
}


