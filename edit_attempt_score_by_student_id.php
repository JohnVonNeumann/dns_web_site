<?php

require_once "settings.php";

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$data = sanitise_input($_GET['q']);
$items = explode(" ", $data);
$student_id = $items[0];
$attempt_number = $items[1];
$updated_score = $items[2];

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

$queryString = "UPDATE attempts SET score = '$updated_score' WHERE student_id = '$student_id' AND attempt_number = '$attempt_number';";
if (mysqli_query($conn, $queryString)) {
    echo "Record Updated.";
} else {
    $error = "";
    $error .= mysqli_error($conn);
    echo "Error: $error";
}
