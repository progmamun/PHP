<?php
//connection
$db_name = "mysql:host=localhost;dbname=Database;";
$conn = new PDO($db_name, User Name, Password);

//run sql query
$conn->query(SQL Query);
or
$conn->prepare(SQL Query);

//close connection
$conn = null;