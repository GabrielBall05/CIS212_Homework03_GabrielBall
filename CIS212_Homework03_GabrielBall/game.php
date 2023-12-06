<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clicks Per Second Game</title>
        <script src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onload="testDisplay()">
        <h1 id="yourScore">Click as fast as you can inside the box</h1>
        <button id="gameWindow" onclick="clicked()">Click me</button>
        <div class="timeAndClicksDisplay">
            <div class="timeAndClicksDisplay">
                <h2>Clicks:&nbsp;</h2>
                <h2 id="numOfClicks">0</h2>
            </div>
            <div class="timeAndClicksDisplay">
                <h2>Time Left:&nbsp;</h2>
                <h2 id="timeLeft">5</h2>
            </div>
        </div>
        <button id="seeScores" name="seeScores" onclick="window.location.href = 'scores.php';">See Scores</button>
        <div id="addRestartBtn"></div>
        <form method="post"><button name="testBtn">test button</button></form>
        
        <?php
            //Variables
            $servername = "localhost";
            $db_username = "gball";
            $db_password = "password";
            $db_name = "ClickCounterDB";
            $users_table = "users";
            $scores_table = "scores";

            $connection = new mysqli($servername, $db_username, $db_password, $db_name);

            

            if (isset($_POST['testBtn']))
            {
                // $totalClicks = "<script>JSON.parse(sessionStorage.getItem('totalClicks'));</script>";
                // $cps = "<script>JSON.parse(sessionStorage.getItem('cps'));</script>";
                // $date = "<script>JSON.parse(sessionStorage.getItem('date'));</script>";
                // $username = "<script>JSON.parse(sessionStorage.getItem('userUname'));</script>";
                echo "<script src='script.js'>JSON.parse(sessionStorage.getItem('totalClicks'));</script>";


                $sql = "INSERT INTO " . $scores_table . " (username, totalclicks, cps, date) VALUES('<script>JSON.parse(sessionStorage.getItem('userUname'));</script>', <script>JSON.parse(sessionStorage.getItem('totalClicks'));</script>, <script>JSON.parse(sessionStorage.getItem('cps'));</script>, <script>JSON.parse(sessionStorage.getItem('date'));</script>');";
                echo $sql;
            }
        ?>


    </body>
</html>