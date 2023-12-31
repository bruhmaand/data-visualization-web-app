<?php
$dbHost = 'scorewall.me';
$dbUser = 'root';
$dbPass = '';
$dbName = 'database_name';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM name_new";
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['student_name'] = $row['student_name'];
        $row['subjects'] = $row['subjects'];
        $row['internal'] = (int)$row['internal'];
        $row['practical'] = (int)$row['practical'];
        $row['theory'] = (int)$row['theory'];
        $row['CGPA'] = (float)$row['CGPA'];
        $row['semester'] = $row['semester'];

        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
