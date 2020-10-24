<?php include("header.inc"); ?>

<script>
    function showUser() {
        console.log("lol");
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
</script>

<section id="content">
    <h3>Results</h3>
    <form>
        <button id="listallattempts" onclick="showUser()"> Hello </button>
    </form>
</section>

<?php include("footer.inc"); ?>
