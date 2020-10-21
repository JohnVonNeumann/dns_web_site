<?php include("header.inc"); ?>

    <?php

        if (isset($_POST["first_name"])) {
            $first_name = $_POST["first_name"];
            echo "<p> This is a test: Your first name is $firstname </p>";
        } else {
            echo "<p> Error: Enter data in the <a href='quiz.php'>form</a></p>";
        }
        if (isset($_POST["lastname"])) {
            $lastname = $_POST["lastname"];
            echo "<p> This is a test: Your last name is $lastname </p>";
        } else {
            echo "<p> Error: Enter data in the <a href='quiz.php'>form</a></p>";
        }
        if (isset($_POST["age"])) {
            $age = $_POST["age"];
            echo "<p> This is a test: Your age is $age </p>";
        } else {
            echo "<p> Error: Enter data in the <a href='quiz.php'>form</a></p>";
        }
        if (isset($_POST["food"])) {
            $food = $_POST["food"];
            echo "<p> This is a test: Your food is $food </p>";
        } else {
            echo "<p> Error: Enter data in the <a href='quiz.php'>form</a></p>";
        }
        if (isset($_POST["partySize"])) {
            $partySize = $_POST["partySize"];
            echo "<p> This is a test: Your party size is $partySize </p>";
        } else {
            echo "<p> Error: Enter data in the <a href='quiz.php'>form</a></p>";
        }
        if (isset($_POST["species"])) {
            $species = $_POST["species"];
        } else {
            $species = "Unknown species";
        }
        $tour = "";
        if (isset($_post["1day"])) {
            $tour = $tour. "One-day tour";
        }
        if (isset($_post["4day"])) {
            $tour = $tour. "Four-day tour";
        }
        if (isset($_post["10day"])) {
            $tour = $tour. "Ten-day tour";
        }
        $menu = "";
        if (isset($_post["10day"])) {
            $tour = $tour. "Ten-day tour";
        }

        echo "<p> Welcome: $first_name $lastname </p>";
        echo "<p> Your are now booked on the $tour</p>";
        echo "<p> Species: $species </p>";
        echo "<p> Age: $age </p>";
        echo "<p> Meal Preference: $food </p>";
        echo "<p> Number of Travellers: $partySize </p>";
    ?>
<?php include("footer.inc"); ?>
