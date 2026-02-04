<?php
include("../config/database.php");

$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users(email, password) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashedPassword);

if($stmt->execute()){
    echo "User registered!";
}else{
    echo "Error";
}
?>
