
<?php

const DB_USERNAME = 'root';
const DB_PASSWORD = '';




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

// my SUPER comment (Fabien)
//Comment jauf
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style>
    body {
        background-image: url("NREPortal/loginBackground.png");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center bottom;
        background-size: 550px;
        background-color: #61737C;
        font-family: Trebuchet MS;
        color: white;
    }
    h1{
        margin-top: 30px;
        text-align: center;

    }
    .buttonSubmit{
        text-align: center;
    }
    .form{
        margin-top: 8px;
        margin-right:13px;
        background-color: #7D9C1F;
        padding-top: 10px;
        padding-right: 15px;
        padding-bottom: 15px;
        padding-left: 15px;
        border-radius: 8px;
    }
    #button{
        background-color: #325908;
        border: #325908;
        box-shadow: 0 0 7px 2px #6aa818;

        margin-top: 165px;
        margin-right:13px;
        border-radius: 20px;

    }


</style>
<h1>Welcome to NRE Portal</h1>
<div class="container">
    <div class="row justify-content-center" >
        <button class="btn btn-primary" id="button">See basic statistics</button>
    </div>
    <div class="row justify-content-center">
        <form action="" method="POST" class="form">
            Login for windmachine statistics
            <div class="form-group" style="margin-top: 5px">
                <input type="text" class="form-control" placeholder="Username" name="username" style="border-radius: 20px;">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" style="border-radius: 20px;">
            </div>
            <div class= buttonSubmit>
                <button type="submit" class="btn btn-primary" style="background-color: #325908; border: #325908; border-radius: 20px;">Login</button>
            </div>
        </form>
    </div>
</div>