<?php
session_start();
require_once "base.php";

date_default_timezone_set('Asia/Jakarta');
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "ruang_cloteh";

//create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn->close();
