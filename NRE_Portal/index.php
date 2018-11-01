<?php

require_once 'routing.php';

/*
const DB_USERNAME = 'root';
const DB_PASSWORD = '';



// my modification (Fabien)
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
*/