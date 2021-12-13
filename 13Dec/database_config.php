<?php

$server = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

$connection = new mysqli($server, $username, $password, $database);

if(!$connection){
    die('Connection Failed: '. $connection->connect_error);
}
