<?php include("header.inc"); ?>

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
                if (! $result) {
                    printf("Error Message: %s\n", mysqli_error($conn));
                }
            }
        } else {
            printf("Error Message: %s\n", mysqli_error($conn));
        }
    }

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $score = 0;
    $errMsg = "";

    if (isset($_POST["first_name"])) {
        $first_name = sanitise_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-]{1,25}$/", $first_name)) {
            $errMsg .= "<p> Your first name can only contain alpha characters, hyphens and must be between 1 and 25 characters. </p>";
        }
    } else {
        header ("location: register.html");
    }

    if (isset($_POST["last_name"])) {
        $last_name = sanitise_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z-]{1,25}$/", $last_name)) {
            $errMsg .= "<p> Your last name can only contain alpha characters, hyphens and must be between 1 and 25 characters. </p>";
        }
    }

    if (isset($_POST["student_number"])) {
        $student_number = sanitise_input($_POST["student_number"]);
        if (is_numeric($student_number)) {
            if (!preg_match("/^([0-9]{7})$|^([0-9]{10})$/", $student_number)) {
                $errMsg .= "<p> Your student_number must be either 7 or 10 digits long. </p>";
            }
        } else {
            $errMsg .= "<p> Your student number must only be digits. </p>";
        }
    }

    if (isset($_POST["question_1"])) {
        $question_1 = sanitise_input($_POST["question_1"]);
        if ($question_1 == "") {
            $errMsg .= "<p> You must provide an answer for question one. </p>";
        } else if ($question_1 == "Domain Name System") {
            $score += 1;
        }
    }
    if (isset($_POST["question_2_answer"])) {
        if ($_POST["question_2_answer"] == "It allows hosts to dynamically resolve IP addresses to IPv4 hosts.") {
            $score += 1;
        }
    } else {
        $errMsg .= "<p> You must provide an answer for question two. </p>";
    }

    if (isset($_POST["question_3_answer_1"]) || isset($_POST["question_3_answer_2"]) || isset($_POST["question_3_answer_3"])) {
        if (isset($_POST["question_3_answer_1"]) && isset($_POST["question_3_answer_2"])) {
            $score += 1;
        }
    } else {
        $errMsg .= "<p> You must provide an answer for question three. </p>";
    }

    if (isset($_POST["question_4"])) {
        if ($_POST["question_4"] == "") {
            $errMsg .= "<p> You must provide an answer for question four. </p>";
        } else if ($_POST["question_4"] == "false") {
            $score += 1;
        }
    }

    if (isset($_POST["question_5"])) {
        $question_5 = $_POST["question_5"];
        // the !== false is a weird edge case, it makes for ugly double negation code but
        // strpos doesnt work without it
        // https://stackoverflow.com/a/4366748
        if (strpos($question_5, '1987-11') !== false) {
            $score += 1;
        }
    }

    function getAttemptCountById($conn, $student_number) {
        $queryString = "SELECT * FROM attempts WHERE student_id = $student_number;";
        $result = mysqli_query($conn, $queryString);
        return mysqli_num_rows($result);
    }

    function createAttempt($conn, $student_number, $first_name, $last_name, $score) {
        $success = false;
        $dateTime = "" . date("Y-m-d") . date("H-i-s");
        $attempt_number = getAttemptCountById($conn, $student_number);
        if ($attempt_number < 3) {
            $attempt_number += 1;
            $queryString = "INSERT INTO 
            attempts(attempt_id, student_id, date_time, first_name, last_name, attempt_number, score)
            VALUES (NULL, $student_number, '$dateTime', '$first_name', '$last_name', $attempt_number, $score);";
            $result = mysqli_query($conn, $queryString);
            if (! $result) {
                printf("Error Message: %s\n", mysqli_error($conn));
            }
            $success = true;
        }
        return $success;
    }

    function getAttemptDataById($conn, $student_number) {
        $queryString = "SELECT * FROM attempts WHERE student_id = $student_number ORDER BY attempt_number DESC LIMIT 1;";
        $result = mysqli_query($conn, $queryString);
        $row = mysqli_fetch_assoc($result);
        echo $row["attempt_number"];
        if (! $result) {
            printf("error message: %s\n", mysqli_error($conn));
        }
        return $row;
    }


    if (createAttempt($conn, $student_number, $first_name, $last_name, $score) == false) {
        $errMsg .= "<p> You have no more attempts remaining! </p>";
    }

    if ($errMsg != "") {
        echo "<section>
                <h3>  Uh-Oh! </h3>
                <p> $errMsg </p>
              </section>";
    } else {
        $userData = getAttemptDataById($conn, $student_number);
        echo "<section>
                <h3>Results</h3>
                <table id='results'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Score</th>
                            <th>Attempts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='table-data-name'> $userData[first_name] $userData[last_name] </td>
                            <td id='table-data-student-id'> $userData[student_id] </td>
                            <td id='table-data-score'> $userData[score] </td>
                            <td id='table-data-attempts'> $userData[attempt_number] </td>
                        </tr>
                    </tbody>
                </table>
                <p id='quiz-reattempt'><a href='quiz.php'>Reattempt Quiz!</a></p>
            </section>";
    }


?>
<?php include("footer.inc"); ?>
