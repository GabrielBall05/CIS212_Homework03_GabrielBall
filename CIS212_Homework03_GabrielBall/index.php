<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Click Counter</title>
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



    ?>

    </head>
    <body>
        <div id="loginBox">
        <form method="post">
            <h1 id="loginH1">Login</h1>
            <p>Username</p>
            <input id="username" name="username" type="text">
            <p>Password</p>
            <input id="password" name="password" type="text">
            <br>
            <button name="loginBtn" id="loginBtn">Log in</button>
            <button name="test" id="test">test</button>
            <?php
                if (isset($_POST['test']))
                {
                    $sql = "SELECT * FROM " . $users_table;

                    $results = $connection->query($sql);
                    if ($results->num_rows > 0)
                    {
                        while ($row = $results->fetch_assoc())
                        {
                            echo "<p> " . $row['username'] . "     " . $row['firstname'] . "</p>";
                        }
                    }
                }

                if (isset($_POST['loginBtn']))
                {
                    $uname = $_POST['username'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM " . $users_table . " WHERE username = " . $uname;
                    $results = $connection->query($sql);
                    
                    

                    if ($results->num_rows > 0)
                    {
                        while($row = $results->fetch_assoc())
                        {
                            $result = $row['username'];
                        }

                        echo "Account exists";

                    }
                    else
                    {
                        echo "<p id='notExist'>There is no account with that username</p>";
                    }
                }
            ?>
            <p>Don't have an account? <a href="register.php">Sign up here!</a></p>
        </form>
        </div>


        
    </body>
</html>