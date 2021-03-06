<?php

    require_once "settings.php";

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
        </tr>";
    $queryString = "SELECT * FROM attempts WHERE attempt_number = 1 AND score = 5;";
    $result = mysqli_query($conn, $queryString);
    $row = mysqli_fetch_assoc($result);
    while ($row) {
        echo "<tr>
                    <td> $row[first_name] $row[last_name] </td>
                    <td> $row[student_id] </td>
                    
                  </tr>";
        $row = mysqli_fetch_assoc($result);
    }

?>

