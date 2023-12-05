<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register For Click Counter</title>
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
        

        if (isset($_POST['registerBtn']))
        {
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $uname = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM " . $users_table . " WHERE username = '" . $uname . "';";

            $results = $connection->query($sql);
            if ($results->num_rows > 0)
            {
                echo "<p class='alreadyExists'>This username already exists. Please choose another.</p>";
            }
            else
            {
                $sql = "INSERT INTO " . $users_table . " VALUES('" . $uname . "','" . $fname . "','" . $lname . "','" . $password . "');";
                $connection->query($sql);
                //LOGIN
                header('location: game.html');
            }
        }

    ?>
    </head>
    <body>
        <div id="registerBox">
        <form method="post">
            <h1 id="registerH1">Register</h1>
            <p>First Name</p>
            <input id="firstname" name="firstname" type="text">
            <p>Last Name</p>
            <input id="lastname" name="lastname" type="text">
            <p>Username</p>
            <input id="username" name="username" type="text">
            <p>Password</p>
            <input id="password" name="password" type="text">
            <button name="registerBtn" id="registerBtn">Register</button>
            <p>Already have an account? <a href="index.php">Login here!</a></p>
        </form>
        </div>
    </body>
</html>