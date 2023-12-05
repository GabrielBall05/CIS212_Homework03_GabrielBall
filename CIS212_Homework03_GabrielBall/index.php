<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Click Counter</title>
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

        if ($connection->connect_error)
        {
            die("connection failed: " . $connection->connect_error);
        }
        else {/*echo "<h1> GOOD CONNECTION </h1>";*/}


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
                    $fnameResult = $row['firstname'];
                    $lnameResult = $row['lastname'];
                }

                //CHECK PASSWORD
                if ($passwordResult == $password)
                {
                    //Set session storage variables
                    echo "<script>
                            sessionStorage.setItem('userUname', JSON.stringify('" . $unameResult . "'));
                            sessionStorage.setItem('userPassword', JSON.stringify('" . $passwordResult . "'));
                            sessionStorage.setItem('userFname', JSON.stringify('" . $fnameResult . "'));
                            sessionStorage.setItem('userLname', JSON.stringify('" . $lnameResult . "'));
                         </script>";
                    //Go to game
                    echo "<script>window.location.href = 'game.html';</script>";
                    //header('location: game.html');
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

    </head>
    <body>
        <div id="loginBox">
        <form method="post">
            <h1 id="loginH1">Login</h1>
            <p>Username</p>
            <input id="username" name="username" type="text" value="<?php echo $uname; ?>">
            <p>Password</p>
            <input id="password" name="password" type="text" value="<?php echo $password; ?>">
            <br>
            <button name="loginBtn" id="loginBtn">Log in</button>
        </form>

        <p>Don't have an account? <a href="register.php">Sign up here!</a></p>
        </div>

   
    </body>
</html>