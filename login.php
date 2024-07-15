<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "Anvesha@14";
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['Name'];
$id = $_POST['Id'];
$pass = $_POST['Pass'];

$sql = "SELECT * FROM admin WHERE id = ? AND name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $id, $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['pass'])) {
        $_SESSION['Name'] = $name;
        $_SESSION['Id'] = $id;
        header("Location: admin.html");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    // No user found
    echo "Invalid user details";
}

$stmt->close();
$conn->close();
?>