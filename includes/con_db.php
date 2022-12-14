<?php
session_start();

$hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "web_inc";
  $koneksi = mysqli_connect($hostname, $username, $password, $database);

  if (!$koneksi) {
    die("connection failed: " . mysqli_connect_error());
  }

?>
