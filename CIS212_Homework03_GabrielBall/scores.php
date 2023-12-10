<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onload="initScoresPage()">
    <form method="post">
        <div class="flexDisplay">
            <h1 id="scoresH1">Scores</h1>
            <p>Signed in as:&nbsp;</p><input type="text" name="signedInAs" id="signedInAs">
            <p><a href="index.php">Log out</a></p>
        </div>
        <div class="flexDisplay">
            <div class="radioButtons">
                <div>
                    <button class="scoresSelection" id="yourscores" name="yourscores">All Your Scores (by cps)</button>
                </div>
                <div>
                    <button class="scoresSelection" id="top10" name="top10">Top 10 High Scores of all Time</button>
                </div>
                <div>
                    <button class="scoresSelection" id="allscores" name="allscores">Show ALL Scores (by date)</button>
                </div>
                <div>
                    <button class="scoresSelection" id="backToGame" name="backToGame">Back To Game</button>
                </div>
            </div>
            <div class="scoresDiv">

            <?php
                //Variables
                $servername = "localhost";
                $db_username = "gball";
                $db_password = "password";
                $db_name = "ClickCounterDB";
                $users_table = "users";
                $scores_table = "scores";

                $connection = new mysqli($servername, $db_username, $db_password, $db_name);

                if ($connection->connect_error)
                {
                    die("connection failed: " . $connection->connect_error);
                }
                else {/*echo "<h1> GOOD CONNECTION </h1>";*/}

                //TOP 10 SCORES ALL TIME
                if(isset($_POST['top10']))
                {
                    $sql = "SELECT * FROM " . $scores_table . " ORDER BY cps DESC;";
                    $results = $connection->query($sql);

                    echo "<table id='scoresTable'><td class='tableHeader'>Rank</td><td class='tableHeader'>Username</td><td class='tableHeader'>Total Clicks</td><td class='tableHeader'>CPS</td><td class='tableHeader'>Date Achieved</td>";

                    $i = 1;
                    while ($row = $results->fetch_assoc())
                    {
                        if ($i <= 10)
                        {
                            echo "<tr><td>" . htmlspecialchars($i) . "</td><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['totalclicks']) . "</td><td>" . htmlspecialchars($row['cps']) . "</td><td>" . htmlspecialchars($row['date']) . "</td></tr>";
                            $i++;
                        }
                    }
                    echo "</table>";

                }

                //ALL SCORES
                if(isset($_POST['allscores']))
                {
                    $sql = "SELECT * FROM " . $scores_table . ";";
                    $results = $connection->query($sql);

                    echo "<table id='scoresTable'><td class='tableHeader'>Username</td><td class='tableHeader'>Total Clicks</td><td class='tableHeader'>CPS</td><td class='tableHeader'>Date Achieved</td>";

                    while ($row = $results->fetch_assoc())
                    {
                        echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['totalclicks']) . "</td><td>" . htmlspecialchars($row['cps']) . "</td><td>" . htmlspecialchars($row['date']) . "</td></tr>";
                    }

                    echo "</table>";
                }

                //ALL THE USER'S SCORES
                if(isset($_POST['yourscores']))
                {
                    $uname = $_POST['signedInAs'];
                    $sql = "SELECT * FROM " . $scores_table . " WHERE username = '" . $uname . "' ORDER BY cps DESC;";
                    $results = $connection->query($sql);

                    echo "<table id='scoresTable'><td class='tableHeader'>Rank</td><td class='tableHeader'>Total Clicks</td><td class='tableHeader'>CPS</td><td class='tableHeader'>Date Achieved</td>";

                    $i = 1;
                    while ($row = $results->fetch_assoc())
                    {
                        echo "<tr><td>" . htmlspecialchars($i) . "</td><td>" . htmlspecialchars($row['totalclicks']) . "</td><td>" . htmlspecialchars($row['cps']) . "</td><td>" . htmlspecialchars($row['date']) . "</td></tr>";
                        $i++;
                    }

                    echo "</table>";
                }

                if(isset($_POST['backToGame']))
                {
                    header('location: game.php');
                }
            ?>
            </div>
        </div>
    </form>
    </body>
</html>