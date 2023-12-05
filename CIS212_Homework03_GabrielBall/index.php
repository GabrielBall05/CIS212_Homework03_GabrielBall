<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Click Counter</title>
    <script src="script.js"></script>

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



    ?>

    </head>
    <body onload="fillTextBoxes()">
        <div id="loginBox">
        <form method="post">
            <h1 id="loginH1">Login</h1>
            <p>Username</p>
            <input id="username" name="username" type="text">
            <p>Password</p>
            <input id="password" name="password" type="text">
            <br>
            <button name="loginBtn" id="loginBtn" onclick="clearTextBoxes()">Log in</button>
        </form>
        <?php
            if (isset($_POST['loginBtn']))
            {
                $uname = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM " . $users_table . " WHERE username = '" . $uname . "';";
                $results = $connection->query($sql);
                

                if ($results->num_rows > 0)
                {
                    while($row = $results->fetch_assoc())
                    {
                        $unameResult = $row['username'];
                        $passwordResult = $row['password'];
                    }

                    //CHECK PASSWORD
                    if ($passwordResult == $password)
                    {
                        //LOGIN
                        header('location: game.html');
                    }
                    else
                    {
                        echo "<p class='notExist'>Invalid login. Check your email and password again.</p>";
                    }
                }
                else
                {
                    echo "<p class='notExist'>Invalid login. Check your email and password again.</p>";
                }

                //FOR TESTING
                //  $uname = $_POST['username'];
                //  $sql = "SELECT * FROM " . $users_table . ";";
                //  $results = $connection->query($sql);
                //  if ($results->num_rows > 0)
                //  {
                //     while ($row = $results->fetch_assoc())
                //     {
                //         echo "<p>" . $row['username'] . "," . $row['password'] . "," . $row['firstname'] . "</p>";
                //     }
                //  }
            }
        ?>
        <p>Don't have an account? <a href="register.php">Sign up here!</a></p>
        </div>

   
    </body>
</html>