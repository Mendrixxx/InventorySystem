<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername,$username,$password,$dbname);
$conn->query('SET NAMES utf8');

?>