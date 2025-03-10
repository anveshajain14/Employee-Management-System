<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Anvesha@14";
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, post, salary FROM employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Display Employees</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgb(202, 244, 240);
      background: linear-gradient(90deg, rgba(202, 244, 240, 1) 20%, rgba(253, 236, 254, 1) 79%);
      text-align: center;
      margin: 0;
      padding: 0;
    }

    h1 {
      background-color: #3498db;
      color: #fff;
      padding: 20px;
      margin: 0;
    }

    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    table th {
      background-color: #3498db;
      color: #fff;
      padding: 10px;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    a {
      text-decoration: none;
      color: #3498db;
    }

    a:hover {
      text-decoration: underline;
    }

    .center {
      text-align: center;
      margin: 20px;
    }
  </style>
</head>

<body>
  <h1>Display Employees</h1>
  <table border="1">
    <tr>
      <th>Employee ID</th>
      <th>Employee Name</th>
      <th>Employee Post</th>
      <th>Employee Salary</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["post"] . "</td><td>" . $row["salary"] . "</td></tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No employees found</td></tr>";
    }
    $conn->close();
    ?>
  </table>
  <center>
    <br>
    <a href="admin.html">Go Back</a>
  </center>
</body>

</html>