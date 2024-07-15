<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "Anvesha@14"; 
$dbname = "company"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['Id'];

$sql = "DELETE FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    echo "Employee removed successfully.";
} else {
    echo "Error removing employee: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
