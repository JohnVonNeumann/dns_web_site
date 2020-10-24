<?php include("header.inc"); ?>

<script>
    function listAllAttempts() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "list_all_attempts.php", false);
        xhttp.send();
    }

    function listAllFirstAttempts100Percent() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "list_all_first_attempts_100_percent.php", false);
        xhttp.send();
    }


    function listAllThirdAttemptLessThan50Percent() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "list_all_third_attempt_50_percent.php", false);
        xhttp.send();
    }

    function listAllAttemptsByStudentID(student_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "list_all_attempts_by_student_id.php?q="+student_id, false);
        xhttp.send();
    }

    function listAllAttemptsByName(student_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "list_all_attempts_by_student_name.php?q="+student_name, false);
        xhttp.send();
    }
</script>

<section>
    <h3>Results</h3>
    <button id="listallattempts" onclick="listAllAttempts()"> List All Attempts </button>
    <button id="listallfirstattempts100percent" onclick="listAllFirstAttempts100Percent()"> List All First Attempts with 100% </button>
    <button id="listallthirdattempt50percent" onclick="listAllThirdAttemptLessThan50Percent()"> List All Third Attempts with less than 50% </button>
    <p>
        <label for="student_id"> Student ID: </label>
        <input type="text" name="student_id" id="student_id" />
        <button id="listattemptbystudentid" onclick="listAllAttemptsByStudentID(document.getElementById('student_id').value)"> All attempts by Student ID </button>
    </p>
    <p>
        <label for="student_name"> Student Name: </label>
        <input type="text" name="student_name" id="student_name" />
        <button id="listattemptbystudentname" onclick="listAllAttemptsByName(document.getElementById('student_name').value)"> All attempts by Student Name </button>
    </p>
    <table id="content"></table>
</section>

<?php include("footer.inc"); ?>
