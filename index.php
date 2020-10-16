<!---
This page should contain:
•An appropriate title
•A background graphic(use CSS to do this)
•A menu that links to the other pages on your Web site.
	This menu should appear on every page of your website.
•A header containing appropriate content.
	This header should appear on every page of your website.
•A footer that includes an email hyperlink to your student email address.
	This footer should appear on every page of your website
-->
<!DOCTYPE html>
<html lang="en">
<head>
        <title> DNS - Welcome</title>
        <meta charset="UTF-8">
		<meta name="description" content="DNS Web Site - Index">
		<meta name="keywords" content="DNS">
		<meta name="author" content="JohnVonNeumann">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/style.css" rel="stylesheet">
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
                                        <a id="quiz" href="quiz.php"> Quiz </a>
                                </li>
                        </ul>
                </nav>
        </header>

        <main>
                <article>
                        <h1> DNS </h1>
                        <h2> Introduction to DNS </h2>

                        <p> DNS is the phone book of the internet, it allows computers to find IP addresses for hostnames, it is a human focused application layer protocol, designed to make it easier for humans to use the internet. </p>

                        <p> To highlight this, what is easier to remember? </p>

                        <ol>
                                <li> 142.250.67.14 </li>
                                <li> google.com </li>
                        </ol>

                        <p> If you answered number one, then: </p>

                        <p> 01001001 00100000 01100110 01101111 01110010 00100000 01101111 01101110 01100101 00101100 00100000 01110111 01100101 01101100 01100011 01101111 01101101 01100101 00100000 01101111 01110101 01110010 00100000 01101110 01100101 01110111 00100000 01110010 01101111 01100010 01101111 01110100 00100000 01101111 01110110 01100101 01110010 01101100 01101111 01110010 01100100 01110011 00100001 </p>

                        <p> However, if you answered number 2, then you are a human, and you now understand why we use DNS. </p>
                </article>

        </main>

        <footer>
                <!-- TODO: replace with legit email address -->
                <p><a href="mailto:yourmum@yournan.lol.meme">yourmum@yournan.lol.meme</a></p>
        </footer>

</body>
</html>
