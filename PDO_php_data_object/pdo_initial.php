<?php
//connection
$db_name = "mysql:host=localhost;dbname=Database;";
$conn = new PDO($db_name, User Name, Password);

//run sql query
$conn->query(SQL Query);
or
$conn->prepare(SQL Query);

$conn->prepare("SELECT * FROM users WHERE user = ? AND pass = ?");
$sql->bindParam(1,$username);
$sql->bindParam(2,$password);
$sql->execute();

//close connection
$conn = null;