<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

include('../functions/connection.php');

$sql = "SELECT * FROM branches";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Branch</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        body
        {
            font-family: 'Open Sans' , sans-serif;
            /*background-color: #FFD3F8*/
        }

        span {
            color: #c74767;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Add Branch</h1>
            <form  action="create.php" method="POST">
                <div class="form-group">
                    <label>Name: <span>*</span></label>
                    <input class="form-control" type="text" name="name">
                    <br>
                    <label>Company Name: <span>*</span></label>
                    <input class="form-control" type="text" name="company_name">
                    <br>
                    <label>Oic Name: <span>*</span></label>
                    <input class="form-control" type="text" name="oic_name">
                    <br>
                    <label> Address: <span>*</span></label>
                    <input class="form-control" type="text" name="address">
                    <br>
                    <label>Telephone No.: <span>*</span></label>
                    <input class="form-control" type="text" name="telephone_no">
                    <br>
                    <p class="text-basic"><span><b>* Required please fill up</b></span></b></p>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>