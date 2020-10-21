<?php include("header.inc"); ?>

<?php
    require_once "settings.php";

    $conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    if ($conn) {
        echo "connected";
        if (mysqli_select_db($conn, $DATABASE)) {
            $createTableString = "CREATE TABLE attempts(
                student_id INT PRIMARY KEY)";
            $result = mysqli_query($conn, $createTableString);
            if ($result) {
                echo "table created";
            } else {
                echo "table creation failed";
            }
        } else {
            echo "couldnt select db";
        }
        $query = "SELECT * FROM attempts;";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo $result;
        } else {
            echo "didnt work";
        }
    } else {
        echo "not connected";
    }

    $createTableString = "CREATE TABLES attempts(
        student_id PRIMARY_KEY )";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $conn->prepare("SELECT * FROM mysql;");
    $stmt->execute();

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
    } else {
        header ("location: register.html");
    }
    if (isset($_POST["last_name"])) {
        $last_name = sanitise_input($_POST["last_name"]);
    }
    if (isset($_POST["student_number"])) {
        $student_number = sanitise_input($_POST["student_number"]);
        if (is_numeric($student_number)) {
            if (($student_number < 10 ) || ($student_number > 10000)) {
                $errMsg .= "<p> Your student_number must be between 10 and 10000 years old. </p>";
            }
        }
    }
    if (isset($_POST["question_1"])) {
        $question_1 = sanitise_input($_POST["question_1"]);
        if ($question_1 == "Domain Name System") {
            $score += 1;
        }
    }
    if (isset($_POST["question_2_answer"]) && $_POST["question_2_answer"] == "It allows hosts to dynamically resolve IP addresses to IPv4 hosts.") {
        $score += 1;
    }

    if (isset($_POST["question_3_answer_1"]) || isset($_POST["question_3_answer_2"]) || isset($_POST["question_3_answer_3"])) {
        if (isset($_POST["question_3_answer_1"]) && isset($_POST["question_3_answer_2"])) {
            $score += 1;
        }
    }

    if (isset($_POST["question_4"]) && ($_POST["question_4"] == "false"))  {
        $score += 1;
    }

    if (isset($_POST["question_5"])) {
        $question_5 = $_POST["question_5"];
        echo $question_5;
        // the !== false is a weird edge case, it makes for ugly double negation code but
        // strpos doesnt work without it
        // https://stackoverflow.com/a/4366748
        if (strpos($question_5, '1987-11') !== false) {
            $score += 1;
        }
    }


    if (($first_name == "") || ($last_name == "")) {
        $errMsg .= "<p> You must enter your first and last name. </p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
        $errMsg .= "<p> Only alpha letters allowed in your first name. </p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
        $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
    }


    if ($errMsg != "") {
        echo "<p> $errMsg </p>";
    } else {
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
                            <td id='table-data-name'> </td>
                            <td id='table-data-student-id'> </td>
                            <td id='table-data-score'> </td>
                            <td id='table-data-attempts'> </td>
                        </tr>
                    </tbody>
                </table>
                <p id='quiz-reattempt'><a href='quiz.php'>Reattempt Quiz!</a></p>
            </section>";
        echo "<p> Welcome: $first_name $last_name </p>";
        echo "<p> Student Number: $student_number </p>";
        echo "<p> Question 1 Answer: $question_1 </p>";
        echo "<p> Score: $score </p>";
    }


?>
<?php include("footer.inc"); ?>
