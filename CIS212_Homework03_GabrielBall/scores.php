<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="script.js"></script>
        <link rel="stylesheet" href="styles.css">




    </head>
    <body>
    <form method="post"></form>    
        <h1 id="scoresH1">Scores</h1>
        <div class="flexDisplay">
            <div class="radioButtons">
                <div>
                    <form method="post"><button class="scoresSelection" id="top10" name="top10">Top 10 High Scores of all Time</button></form>
                </div>
                <div>
                    <form method="post"><button class="scoresSelection" id="yourtop10" name="yourtop10">Your Top 10 High Scores</button></form>
                </div>
                <div>
                    <form method="post"><button class="scoresSelection" id="lowestscores" name="lowestscores">Lowest 10 Scores of all Time</button> </form>
                </div>
                <div>
                    <form method="post"><button class="scoresSelection" id="allscores" name="allscores">Show ALL Scores</button></form>
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


                if(isset($_POST['allscores']))
                {
                    $sql = "SELECT * FROM " . $scores_table . ";";
                    echo $sql;
                    $results = $connection->query($sql);

                    echo "<table id='scoresTable'><td class='tableHeader'>Username</td><td class='tableHeader'>Total Clicks</td><td class='tableHeader'>CPS</td><td class='tableHeader'>Date Achieved</td>";

                    while ($row = $results->fetch_assoc())
                    {
                        echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['totalclicks']) . "</td><td>" . htmlspecialchars($row['cps']) . "</td><td>" . htmlspecialchars($row['date']) . "</td></tr>";
                    }

                    echo "</table>";
                }

                if(isset($_POST['yourtop10']))
                {
                    //========================================================CHANGE TO THE CURRENT USER
                    $sql = "SELECT * FROM " . $scores_table . " WHERE username = " . "'speedfinger';";
                    echo $sql;
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
            ?>
                <!-- <table class="scoresTable">
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>TotalClicks</th>
                        <th>Clicks Per Second</th>
                        <th>Date Achieved</th>
                    </tr>
                    <tr>
                        <td>testusername</td>
                        <td>testfname</td>
                        <td>testlname</td>
                        <td>testtotalclicks</td>
                        <td>testcps</td>
                        <td>testdate</td>
                    </tr>

                </table> -->
            </div>





        </div>
    </form>
    </body>
</html>