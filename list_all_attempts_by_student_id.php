<?php

require_once "settings.php";

function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$student_id = sanitise_input($_GET['q']);

$conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
} else {
    if (mysqli_select_db($conn, $DATABASE)) {
        $queryStringDescribeTable = "DESCRIBE attempts;";
        if (!mysqli_query($conn, $queryStringDescribeTable)) {
            $createTableString = "CREATE TABLE attempts(
                            attempt_id INT PRIMARY KEY AUTO_INCREMENT,
                            student_id INT NOT NULL,
                            date_time VARCHAR(20) NOT NULL,
                            first_name VARCHAR(20) NOT NULL,
                            last_name VARCHAR(20) NOT NULL,
                            attempt_number INT NOT NULL,
                            score INT NOT NULL)";
            $result = mysqli_query($conn, $createTableString);
            if (!$result) {
                printf("Error Message: %s\n", mysqli_error($conn));
            }
        }
    } else {
        printf("Error Message: %s\n", mysqli_error($conn));
    }
}

echo "
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Attempt Number</th>
            <th>Score</th>
        </tr>";
$queryString = "SELECT * FROM attempts WHERE student_id = '$student_id';";
$result = mysqli_query($conn, $queryString);
$row = mysqli_fetch_assoc($result);
while ($row) {
    echo "<tr>
                    <td> $row[first_name] $row[last_name] </td>
                    <td> $row[student_id] </td>
                    <td> $row[attempt_number] </td>
                    <td> $row[score] </td>
                    
                  </tr>";
    $row = mysqli_fetch_assoc($result);
}

?>