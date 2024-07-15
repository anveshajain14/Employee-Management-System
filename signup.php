<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "Anvesha@14"; 
$dbname = "company"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO admin (id, name, email, pass) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $id, $name, $email, $pass);

$id = intval($_POST['Id']);
$name = $_POST['Name'];
$email = $_POST['Email'];
$pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT); 

if ($stmt->execute()) {
    header("Location: admin.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
