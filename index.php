<?php

const DB_USERNAME = 'root';
const DB_PASSWORD = '';


var_dump($_POST);



if ( isset($_POST['username']))
{
    try{
        $conn = new PDO("mysql:host=127.0.0.1;dbname=db_nre", DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";

        $result = $conn->query($sql);

        if ($result->rowCount() == 1)
        {
            echo "right password!";
        }
        else
        {
            echo "wrong password";
        }
    }

    catch( PDOException $e) {
        echo 'Connection error';
    }
}


?>
<h1>Login</h1>
<form action="" method="POST">
    <label>Username: <input type="text" name="username" required></label>
    <br>
    <label>Password:<input type="password" name="password" required></label>
    <br>
    <br>
    <input type="submit" value="Send">
</form>