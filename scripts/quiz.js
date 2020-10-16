/*
 * quiz.js
 * Copyright (C) 2020 lw
 *
 * Distributed under terms of the MIT license.
 */
'use strict';

function init() {
    // handle both the quiz.php and results.html
    var quizForm;
    if (quizForm = document.getElementById("quiz")) {
        quizForm.onsubmit = validate;
    }
    var answersP;
    if (answersP = document.getElementById("answers")) {
        answersP.onload = displayUserData();
    }
}

function setUsernameByID(id, firstname, lastname) {
    var username = firstname + " " + lastname;
    var storage_key = "username_"
    var storage_key = storage_key.concat(id);
    sessionStorage.setItem(storage_key, username);
}

function getUsernameByID(id) {
    // retrieve the id input by the user and from local storage
    var storage_key = "username_";
    var storage_key = storage_key.concat(id);
    var username = sessionStorage.getItem(storage_key);
    return username;
}

function setAttemptsById(id) {
    // sets/increments the number of attempts made by an ID
    // max attempts is 3
    // return error if function attempts to increment higher than 3
    var attempts_remaining = assertAttemptsRemaining(id);
    if (attempts_remaining) {
        var storage_key = "attempts_";
        var storage_key = storage_key.concat(id);
        var attempts = sessionStorage.getItem(storage_key);
        if (attempts != null) {
            attempts = Number(attempts) + 1;
            sessionStorage.setItem(storage_key, attempts);
        } else {
            sessionStorage.setItem(storage_key, 1);
        }
    }
}

function getAttemptsById(id) {
    // gets the number of attempts made by an ID
    // returns integer
    var storage_key = "attempts_";
    var storage_key = storage_key.concat(id);
    var attempts = sessionStorage.getItem(storage_key);
    if (attempts != null) {
        return attempts;
    } else {
        return 3;
    }
}

function assertAttemptsRemaining(id) {
    // gets the number of attempts made by an ID
    // returns integer
    var storage_key = "attempts_";
    var storage_key = storage_key.concat(id);
    var attempts = sessionStorage.getItem(storage_key);
    if (attempts >= 3) {
        return false;
    } else {
        return true;
    }
}

function setQuizScoreById(score, id) {
    // when a user completes the quiz, take the score computed by the validation 
    //      function and set it in local storage 
    if (score != 0) {
        var storage_key = "score_";
        var storage_key = storage_key.concat(id);
        sessionStorage.setItem(storage_key, score)
    }
}

function getQuizScoreById(id) {
    // when a user completes the quiz, take the score computed by the validation 
    //      function and set it in local storage 
    var storage_key = "score_";
    var storage_key = storage_key.concat(id);
    var score = sessionStorage.getItem(storage_key);
    return score;
}

function setMostRecentQuizCompleter(id) {
    var storage_key = "most_recent";
    sessionStorage.setItem(storage_key, id);
}

function quizVisibilityToggle() {
    // turns off the visibility of div/p showing a link back to the quiz if attempts <=3 
    // shows a div instead stating that the id has used up all their attempts
}

function validateForm() {
    // all inclusive form validation algorithm that posts all relevant data and validates 
}


function scoreQuestion1(answer) {
    // validate the question 2 radio button and ensure it's correct
    if (answer.toLowerCase() == "domain name system") {
        return true;
    } else {
        return false;
    }
}

function scoreQuestion2(answer) {
    // validate the question 2 radio button and ensure it's correct
    if (answer == true) {
        return true;
    } else {
        return false;
    }
}

function scoreQuestion3(answer) {
    // validate the question 2 radio button and ensure it's correct
    if ((answer[0].checked) && (answer[1].checked)) {
        return true;
    } else {
        return false;
    }
}

function scoreQuestion4(answer) {
    // validate the question 2 radio button and ensure it's correct
    // https://stackoverflow.com/questions/1085801/get-selected-value-in-dropdown-list-using-javascript
    // ensure that answer = false
    // if answer is false, give a score of 1, if not, 0
    if (answer == "false") {
        return true;
    } else {
        return false;
    }
}

function scoreQuestion5(answer) {
    // validate the question 2 radio button and ensure it's correct
    if (answer.includes("1987-11")) {
        return true;
    } else {
        return false;
    }
}

function displayUserData() {
    var studentIDElement = document.getElementById("table-data-student-id");
    var attemptsElement = document.getElementById("table-data-attempts");
    var scoreElement = document.getElementById("table-data-score");
    var nameElement = document.getElementById("table-data-name");
    var quizReattemptElement = document.getElementById("quiz-reattempt");
    // get attempts data from session storage and the other items too
    var id = sessionStorage.getItem("most_recent");
    var attempts = getAttemptsById(id);
    var score = getQuizScoreById(id);
    var username = getUsernameByID(id);
    if (Number(attempts) >= 3) {
        quizReattemptElement.style.display = "none";
    }
    nameElement.innerHTML = username;
    studentIDElement.innerHTML = id;
    attemptsElement.innerHTML = attempts;
    scoreElement.innerHTML = score;
}

function validate() {
    var errMsg = "";
    var result = true;
    var score = 0;
    var firstname = document.getElementById("first_name").value;
    var lastname = document.getElementById("last_name").value;
    var student_number = document.getElementById("student_number").value;
    var question1 = document.getElementById("question_1").value;
    var question2 = document.getElementsByName("question_2_answer");
    // semi dirty hack as we only need to assert the existence of one radio button for correct answer
    var question_2_correct = document.getElementById("question_2_answer_3").checked;
    // https://stackoverflow.com/questions/4275071/getelementbyid-wildcard
    var question3 = document.querySelectorAll('[name^=question_3_answer_');
    var question4 = document.getElementById("question_4").value;
    var question5 = document.getElementById("question_5").value;

    var attempts_remaining = assertAttemptsRemaining(student_number);
    if (!attempts_remaining) {
        errMsg = errMsg + "You have no quiz attempts remaining.\n"
        result = false;
    }

    // validation rules here

    if ((firstname.length > 25) || (lastname.length > 25)) {
        errMsg = errMsg + "Your first and last name cannot be more than 25 characters.\n"
        result = false;
    }

    if (!firstname.match(/^([a-zA-Z]{1,25})+/)) {
        errMsg = errMsg + "Your first name must only contain alpha characters.\n";
        result = false;
    }

    if ((firstname == "") || (lastname == "")) {
        errMsg = errMsg + "The first name and last name fields cannot be empty.\n";
        result = false;
    }

    if (!lastname.match(/^[a-zA-Z-]{1,25}/)) {
        errMsg = errMsg + "Your last name must only contain alpha characters and hyphens.\n";
        result = false;
    }

    if (!student_number.match(/^([0-9]{7})$|^([0-9]{10})$/)) {
        errMsg = errMsg + "Your student number must be either 7 or 10 digits long.\n"
        result = false;
    }

    if (errMsg != "") {
        alert(errMsg);
    }

    if (scoreQuestion1(question1) == true) {
        score++;
    }

    if (scoreQuestion2(question_2_correct) == true) {
        score++;
    }

    if (scoreQuestion3(question3) == true) {
        score++;
    }

    if (scoreQuestion4(question4) == true) {
        score++;
    }

    if (scoreQuestion5(question5) == true) {
        score++;
    }

    if (score != 0) {
        setUsernameByID(student_number, firstname, lastname);
        setMostRecentQuizCompleter(student_number);
        setAttemptsById(student_number);
        setQuizScoreById(score, student_number);
    } else {
        alert("You should try again! Scores of 0 don't count!");
        result = false;
    }

    return result;
}

window.onload = init;