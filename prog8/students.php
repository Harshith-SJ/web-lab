<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "college";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student records from the 'studentrecords' table
$sql = "SELECT * FROM studentrecords";
$result = $conn->query($sql);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Selection Sort Function
function selectionSort(&$array, $key) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($array[$j][$key] < $array[$minIndex][$key]) {
                $minIndex = $j;
            }
        }
        if ($minIndex != $i) {
            // Swap the elements
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
        }
    }
}

// Sort students by 'marks'
selectionSort($students, 'marks');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        table { margin: 20px auto; border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Sorted Student Records</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['marks']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
