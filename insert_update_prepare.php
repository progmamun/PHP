<?php
//insert
$sql = $conn->prepare("INSERT INTO users(user,password)VALUES(?,?)");
$sql->bind_param("ss", $_POST['username'], $_POST['password']);
$sql->execute();
$sql->close();

//Update
$sql = $conn->prepare("UPDATE users SET password = ? WHERE uid = ?");
$sql->bind_param("si", $_POST['password'], $_POST['id']);
$sql->execute();
if ($sql->affected_rows === 0) {
    exit('No rows updated');
}

$sql->close();
//Deleted
$sql = $conn->prepare("DELETE users SET password = ? WHERE uid = ?");
$sql->bind_param("si", $_POST['password'], $_POST['id']);
$sql->execute();
if ($sql->affected_rows === 0) {
    exit('No rows deleted');
}

$sql->close();

//multiple insert with prepare()
$sql = $conn->prepare("INSERT INTO myTable (firstname, lastname) VALUES(?,?)");
$sql->bind_param("ss", $firstname, $lastname);

$firstname = "Mamun";
$lastname = "Khan";
$sql->execute();

$firstname = "Yahoo";
$lastname = "Baba";
$sql->execute();

$sql->close();
$conn->close();
