<?php
session_start();

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'landprop');

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

require_once 'functions.php';

// if ($link) {
// 	echo "Connection succesful";
// } else {
// 	echo "Connection Failed";
// }