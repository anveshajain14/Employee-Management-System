<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "Anvesha@14"; 
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$employeeId = $_POST['Id'];
$salaryIncrease = $_POST['Amount'];

$sql = "SELECT salary FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentSalary = $row['salary'];
    $newSalary = $currentSalary + $salaryIncrease;

    $updateSql = "UPDATE employee SET salary = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ii", $newSalary, $employeeId);
    if ($updateStmt->execute()) {
        echo "Salary updated successfully.";
    } else {
        echo "Error updating salary: " . $conn->error;
    }
} else {
    echo "Employee not found.";
}

$conn->close();
?>
