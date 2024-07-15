<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Anvesha@14"; 
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Id'];
    $name = $_POST['Name'];
    $post = $_POST['Post'];
    $salary = $_POST['Salary'];

        $stmt = $conn->prepare("INSERT INTO employee (id, name, post, salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $name, $post, $salary);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
