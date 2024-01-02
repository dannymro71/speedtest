<?php

require_once 'telemetry_settings.php';

$conn = mysqli_connect($MySql_hostname, $MySql_username, $MySql_password, $MySql_databasename);

// Check connection

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}



/*
$MySql_username
$MySql_password
$MySql_hostname
$MySql_databasename
*/

?>