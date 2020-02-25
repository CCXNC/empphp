<?php

// Start session to be able to create $_SESSION variable
session_start();

// Get connection function
include('functions/connection.php');

// Check if a username and password is submitted for logging in
if(isset($_POST['username']) && isset($_POST['password']))
{
    $password = md5($_POST['password']); // Convert password to md5 string

    $sql = 'SELECT * FROM users WHERE username="' . $_POST['username'] . '" AND password="' . $password . '"';
    $result = mysqli_query($conn, $sql);

    print_r($result);

    // If query returns a greater than 1 result it means that a username with password submitted exists then create the logged in session variable
    if($result->num_rows > 0)
    {
        $_SESSION['logged_in'] = TRUE;
    }
}

if(isset($_SESSION['logged_in']))
{
    header('Location: employees');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
        <style>
            .main
            {
                margin-top: 50px;
            }

            .main-content 
            {
            /*    background-color:#009edf;*/
                border: 2px solid #009edf;
                margin: 0 auto;
                max-width: 500px;
                padding: 20px 40px;
                color: #ccc;
                text-shadow: none;
            }

            .input-group
            {
                margin: 20px 0px;
            }

            .input-group-addon 
            {
                color: #009edf ;
                font-size: 17px;
            }

            .login-button
            {
                margin: 0px auto;
                max-width: 200px;;
                font-weight: bold;
                font-family: Times, "Times New Roman", serif
            }

            .form-header
            {
                max-width: 500px;
                margin: 0 auto;
                background-color: #009edf;
                color: #fff;
                width: 100% ;
                padding: 20px 0px;
                border-top-right-radius:10px ;
                border-top-left-radius:10px 
            }

            .remember
            {
                color: black;
                font-weight: bold;
                font-family: Georgia, serif;   
            }
        </style>
    </head>

    <body>
        <?php include('layout/navbar.php'); ?>

        <section class="login-info">
            <div class="container">
                <div class="row main">
                    <div class="form-header">
                        <h1 class="text-center ">Login form </h1>
                    </div>
                    <form action="login.php" method="post">
                        <div class="main-content">
                                
                            <div class="input-group ">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                                <input id="username" type="text" class="form-control" name="username" placeholder="Enter your Username">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password">
                            </div>
                            
                            <div class="checkbox">
                                <label class="remember">
                                    <input name="remember" type="checkbox" > <a href="register.php"> Register </a>
                                </label>
                            </div>
                            
                            <div class="form-group ">
                                <input class="btn btn-danger btn-lg btn-block login-button" type="submit" value="Login">
                                <!--<a href="login.php" type="button"  class="btn btn-danger btn-lg btn-block login-button">Login</a>-->
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </section>  
    </body>

</html>