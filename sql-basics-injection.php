<?php
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE user = '$username' AND pass = '$password'";

' or "='

SELECT * FROM users WHERE user = 'ram' AND pass = '' or''=''

// protect sql injection
//using prepare function 
$sql = $conn->prepare("SELECT * FROM users WHERE user = ? AND pass = ?");
$sql->bind_param("ss",$username,$password);
$sql->execute();

$sql->close();