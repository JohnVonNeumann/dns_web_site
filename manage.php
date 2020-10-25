<?php include("header.inc"); ?>

<script>
    function listAllAttempts() {
        // https://www.w3schools.com/php/php_ajax_database.asp
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

    function deleteAllAttemptsById(student_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "delete_all_attempts_by_student_id.php?q="+student_id, false);
        xhttp.send();
    }

    function editScoreOfAttemptById(student_id, attempt_number, updated_score) {
        var data = student_id + " " + attempt_number + " " + updated_score;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Action to be performed when the document is read;
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "edit_attempt_score_by_student_id.php?q="+data, false);
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
    <p>
        <label for="student_id_delete"> Student ID: </label>
        <input type="text" name="student_id_delete" id="student_id_delete" />
        <button id="deleteattemptsbystudentid" onclick="deleteAllAttemptsById(document.getElementById('student_id_delete').value)"> Delete All attempts by Student ID </button>
    </p>
    <p>
        <label for="student_id_modify"> Student ID: </label>
        <input type="text" name="student_id_modify" id="student_id_modify" />
        <label for="attempt_number"> Attempt Number: </label>
        <input type="text" name="attempt_number" id="attempt_number" />
        <label for="updated_score"> Updated Score: </label>
        <input type="text" name="updated_score" id="updated_score" />
        <button id="modifyattemptsbystudentid" onclick="editScoreOfAttemptById(document.getElementById('student_id_modify').value, document.getElementById('attempt_number').value, document.getElementById('updated_score').value)"> Update attempt score by Student ID </button>
    </p>
    <table id="content"></table>
</section>

<?php include("footer.inc"); ?>
