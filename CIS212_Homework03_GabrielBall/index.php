<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClickCounterSite</title>
    <script src="script.js"></script>

    <!-- EVERYTHING FOR PHP -->
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

        




        /* $something = "the word something";
        $somethingelse = "somethingelse";

        if (isset($_POST['dosomething']))
        {
            echo $something;
        }

        if (isset($_POST['doanotherthing']))
        {
            echo $somethingelse;
        } */
    ?>

    </head>
    <body>
        <h1>Test</h1>
        <form method="post"><button name="dosomething">say something</button></form>

        <h1>next test</h1>
        <form method="post"><button name="doanotherthing">do another thing</button></form>

        
    </body>
</html>