<?php

$dbHost = 'localhost';
$dbUsername = '86897';
$dbPassword = 'Rotterdam100';
$dbName = 'energie';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die('connection failed: ' . mysqli_connect_error());
}