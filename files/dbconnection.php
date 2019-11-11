<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'churchill');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Connection Error => '.mysqli_connect_error());