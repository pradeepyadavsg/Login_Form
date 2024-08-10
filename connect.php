<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'signupforms';

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die(mysqli_error($con));
}
