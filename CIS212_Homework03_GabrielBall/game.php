<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clicks Per Second Game</title>
        <script src="script.js"></script>
        <link rel="stylesheet" href="styles.css">

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

                $sql = "INSERT INTO " . $scores_table . " (username, totalclicks, cps, date) VALUES('" . $uname . "', " . $totalClicks . ", " . $cps . ", '" . $date . "');";
                $connection->query($sql);
            }

            if (isset($_POST['seeScores']))
            {
                //echo "<script>window.location.href = 'scores.php';</script>";
                header('location: scores.php');
            }
        ?>



    </head>
    <body onload="init()">
        <h1>Click as fast as you can inside the box</h1>
        <button id="gameWindow" onclick="clicked()">Click me</button>
        <form method="post">
        <div class="flexDisplay">
            <div class="flexDisplay">
                <h2>Time Left:&nbsp;</h2>
                <input type="text" name="timeLeft" id="timeLeft" value="5">
            </div>
            <div class="flexDisplay">
                <h2>Clicks:&nbsp;</h2>
                <input type="text" name="numOfClicks" id="numOfClicks" value="0">
            </div>
            <div class="flexDisplay">
                <h2>Clicks per second:&nbsp;</h2>
                <input type="text" name="clicksPerSecond" id="clicksPerSecond">
            </div>
            <div class="flexDisplay">
                <h2>Date Achieved:&nbsp;</h2>
                <input type="text" name="dateAchieved" id="dateAchieved">
            </div>
            <div class="flexDisplay">
                <h2>Save for:&nbsp;</h2>
                <input type="text" name="saveFor" id="saveFor">
            </div>
        </div>
        <div class="flexDisplay">
            <button id="saveScoreBtn" name="saveScoreBtn">Save Score & Restart</button>
            <button id="seeScores" name="seeScores">See Scores</button>
        </div>
        </form>
    </body>
</html>