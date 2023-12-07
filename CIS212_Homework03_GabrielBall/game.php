<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clicks Per Second Game</title>
        <script src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onload="init()">
        <h1>Click as fast as you can inside the box</h1>
        <button id="gameWindow" onclick="clicked()">Click me</button>
        <div class="flexDisplay">
            <div class="flexDisplay">
                <h2>Time Left:&nbsp;</h2>
                <form method="post"><h2 id="timeLeft">5</h2></form>
            </div>
            <div class="flexDisplay">
                <h2>Clicks:&nbsp;</h2>
                <form method="post"><h2 name="numOfClicks" id="numOfClicks">0</h2></form>
            </div>
            <div class="flexDisplay">
                <h2>Clicks per second:&nbsp;</h2>
                <form method="post"><h2 name="clicksPerSecond" id="clicksPerSecond"></h2></form>
            </div>
            <div class="flexDisplay">
                <h2>Date Achieved:&nbsp;</h2>
                <form method="post"><h2 name="dateAchieved" id="dateAchieved">date</h2></form>
            </div>
            <div class="flexDisplay">
                <h2>Save for:&nbsp;</h2>
                <form method="post"><h2 name="saveFor" id="saveFor">user</h2></form>
            </div>
        </div>
        <div class="flexDisplay">
            <form method="post"><button id="saveScoreBtn" name="saveScoreBtn">Save Score</button></form>
            <button id="seeScores" name="seeScores" onclick="window.location.href = 'scores.php';">See Scores</button>
            <div id="addRestartBtn"></div>
        </div>


        
        <?php
            //Variables
            $servername = "localhost";
            $db_username = "gball";
            $db_password = "password";
            $db_name = "ClickCounterDB";
            $users_table = "users";
            $scores_table = "scores";

            $connection = new mysqli($servername, $db_username, $db_password, $db_name);

            

            if (isset($_POST['saveScoreBtn']))
            {
                $uname = $_POST['saveFor'];
                $totalClicks = $_POST['numOfClicks'];
                $cps = $_POST['clicksPerSecond'];
                $date = $_POST['dateAchieved'];

                //$sql = "INSERT INTO " . $scores_table . " (username, totalclicks, cps, date) VALUES('<script>JSON.parse(sessionStorage.getItem('userUname'));</script>', <script>JSON.parse(sessionStorage.getItem('totalClicks'));</script>, <script>JSON.parse(sessionStorage.getItem('cps'));</script>, <script>JSON.parse(sessionStorage.getItem('date'));</script>');";
                $sql = "INSERT INTO " . $scores_table . " (username, totalclicks, cps, date) VALUES('" . $uname . "', " . $totalClicks . ", " . $cps . ", '" . $date . "');";
                echo $sql;
            }
        ?>


    </body>
</html>