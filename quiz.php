<!DOCTYPE html>
<html lang="en">

<head>
    <title> DNS - Quiz </title>
    <meta charset="UTF-8">
    <meta name="description" content="DNS Web Site - Quiz">
    <meta name="keywords" content="dns, quiz">
    <meta name="author" content="JohnVonNeumann">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <script src="scripts/quiz.js"></script>
</head>

<body>

    <header>
        <nav class="menu">
            <ul>
                <li class="menu-items">
                    <a id="index-link" href="index.php"> Home </a>
                </li>
                <li class="menu-items">
                    <a id="topic-link" href="topic.php"> Topic </a>
                </li>
                <li class="menu-items">
                    <a id="enhancements" href="enhancements.html"> Enhancements </a>
                </li>
                <li class="menu-items">
                    <a id="quiz-link" href="quiz.php"> Quiz </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <form id="quiz" method="post" action="results.html" novalidate="novalidate">
            <fieldset>
                <legend>
                    <h2>Personal Details: </h2>
                </legend>
                <p>
                    <label for="first_name"> First name: </label>
                    <input type="text" name="first_name" id="first_name" required="required" />
                </p>
                <p>
                    <label for="last_name"> Last name: </label>
                    <input type="text" name="last_name" id="last_name" required="required" />
                </p>
                <p>
                    <label for="student_number"> Student ID Number: </label>
                    <!-- https://stackoverflow.com/questions/39566125/html5-form-pattern-for-7-or-10-numbers-only -->
                    <input type="text" name="student_number" id="student_number" required="required" />
                </p>
            </fieldset>
            <fieldset>
                <legend>
                    <h2> Quiz: </h2>
                </legend>
                <fieldset>
                    <legend>
                        <h3> Question 1: What does DNS stand for? </h3>
                    </legend>
                    <p>
                        <label for="question_1"> Answer: </label>
                        <input type="text" name="question_1" id="question_1" required/>
                    </p>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3> Question 2: What is the purpose of DNS? </h3>
                    </legend>
                    <p>
                        <label for="question_2_answer_1"> It routes packets from one host to another. </label>
                        <input type="radio" id="question_2_answer_1" name="question_2_answer" value="It routes packets from one host to another." required="required" /> <br>

                        <label for="question_2_answer_2"> It is an implementation of the POGGERS protocol that was summarised by the IETF in RFC 1337 </label>
                        <input type="radio" id="question_2_answer_2" name="question_2_answer" value="It is an implemenation of the POGGERS protocol that was summarised by the IETF in RFC 1337." required="required" /> <br>

                        <label for="question_2_answer_3"> It allows hosts to dynamically resolve IP addresses to IPv4 hosts. </label>
                        <input type="radio" id="question_2_answer_3" name="question_2_answer" value="It allows hosts to dynamically resolve IP addresses to IPv4 hosts." required="required" />
                    </p>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3> Question 3: Which two IETF RFC's first introduced DNS? </h3>
                    </legend>
                    <p>
                        <label for="question_3_answer_1"> RFC 1034 </label>
                        <input type="checkbox" id="question_3_answer_1" name="question_3_answer_1" value="RFC 1034" /><br>
                        <label for="question_3_answer_2"> RFC 1035 </label>
                        <input type="checkbox" id="question_3_answer_2" name="question_3_answer_2" value="RFC 1035" /><br>
                        <label for="question_3_answer_3"> RFC 1036 </label>
                        <input type="checkbox" id="question_3_answer_3" name="question_3_answer_3" value="RFC 1036" />
                    </p>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3> Question 4: Are DNS requests encrypted by default? </h3>
                    </legend>
                    <p>
                        <label for="question_4"> Answer: </label>
                        <select id="question_4" name="question_4" required>
                                                        <option value=""> Please Select </option>
                                                        <option value="true"> True </option>
                                                        <option value="false"> False </option>
                                                </select>
                    </p>
                </fieldset>
                <fieldset>
                    <legend>
                        <h3> Question 5: What month and year was the first RFC on DNS published?</h3>
                    </legend>
                    <p>
                        <label for="question_5"> Date: </label>
                        <input type="date" id="question_5" name="question_4" required="required" />
                    </p>
                </fieldset>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </main>

        <footer>
                <!-- TODO: replace with legit email address -->
                <p><a href="mailto:yourmum@yournan.lol.meme">yourmum@yournan.lol.meme</a></p>
        </footer>
</body>

</html>