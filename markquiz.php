<?php include("header.inc"); ?>

<?php

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $score = 0;

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
    }
    if (isset($_POST["question_1"])) {
        $question_1 = sanitise_input($_POST["question_1"]);
    }
    if (isset($_POST["question_2_answer"]) && $_POST["question_2_answer"] == "It allows hosts to dynamically resolve IP addresses to IPv4 hosts.") {
        $score += 1;
    }
    $tourArray = [];

    if (isset($_POST["1day"])) {
        $tourArray[] = "One-day";
    }
    if (isset($_POST["4day"])) {
        $tourArray[] = "Four-day";
    }
    if (isset($_POST["10day"])) {
        $tourArray[] = "Ten-day";
    }
    $tour = "";
    $tourCount = count($tourArray);
    if ($tourCount != 0) {
        for ($count = 0; $count < $tourCount; $count++) {
            $tour .= $tourArray[$count];
        }
    }

    $errMsg = "";

    if (($first_name == "") || ($last_name == "")) {
        $errMsg .= "<p> You must enter your first and last name. </p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
        $errMsg .= "<p> Only alpha letters allowed in your first name. </p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
        $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
    }

    if (is_numeric($student_number)) {
        if (($student_number < 10 ) || ($student_number > 10000)) {
            $errMsg .= "<p> Your student_number must be between 10 and 10000 years old. </p>";
        }
    }

    if ($errMsg != "") {
        echo "<p> $errMsg </p>";
    } else {
        echo "<p> Welcome: $first_name $last_name </p>";
        echo "<p> Student Number: $student_number </p>";
        echo "<p> Question 1 Answer: $question_1 </p>";
        echo "<p> Score: $score </p>";
    }


?>
<?php include("footer.inc"); ?>
