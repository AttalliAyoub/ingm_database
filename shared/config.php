<?php
$servername = "localhost";
$username = "root";
$password = "Ayo@19982810";
$dbname = "gest_clients";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
  echo "Error creating database: " . $conn->error;
  $conn->close();
  die("Connection failed: " . $conn->connect_error);
}

// $conn->select_db($dbname);
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  address VARCHAR(100),
  birthday DATE,
  NCCP VARCHAR(15),
  TEL VARCHAR(15)
)";


if ($conn->query($sql) === FALSE) {
  echo "Error creating database: " . $conn->error;
  $conn->close();
  die("Connection failed: " . $conn->connect_error);
}

session_start();

?>