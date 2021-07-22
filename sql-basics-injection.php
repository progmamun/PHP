<?php
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE user = '$username' AND pass = '$password'";

' or "='

SELECT * FROM users WHERE user = 'ram' AND pass = '' or''=''