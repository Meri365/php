<?php
session_start();

/*  – PHP MySQL Connect */
$conn = new mysqli("localhost", "root", "", "shop_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* – PHP Forms ($_POST) */
$username = $_POST['username'];
$password = md5($_POST['password']); 

/* – PHP MySQL SELECT */
$sql = "SELECT * FROM users 
        WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

/*  – mysqli_num_rows equivalent */
if ($result->num_rows == 1) {
    $_SESSION['user'] = $username;
    echo "Login successful";
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
