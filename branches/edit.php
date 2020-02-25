<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

include('../functions/connection.php');

// Make a single row select query with condition of employee id and store to $sql varaiable
$sql = 'SELECT * FROM branches WHERE id=' . $_GET['id'] . '';

// Execute sql query and store to $row variable
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Branches</title>
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
            <h1>Edit Branch</h1>
            <form  action="update.php" method="POST">
                <div class="form-group">
                    <label>Id: <span>*</span></label>
                    <input class="form-control" type="text" name="id" value="<?php echo $row['id']; ?>" readonly="">
                    <br>
                    <label>Name: <span>*</span></label>
                    <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
                    <br>
                    <label>Company Name: <span>*</span></label>
                    <input class="form-control" type="text" name="company_name" value="<?php echo $row['company_name']; ?>">
                    <br>
                    <label>Address: <span>*</span></label>
                    <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>">
                    <br>
                    <label>Telephone No: <span>*</span></label>
                    <input class="form-control" type="text" name="telephone_no" value="<?php echo $row['telephone_no']; ?>">
                    <br>
                    <label>Oic Name: <span>*</span></label>
                    <input class="form-control" type="text" name="oic_name" value="<?php echo $row['oic_name']; ?>">
                    <br>
                    <p class="text-basic"><span><b>* Required please fill up</b></span></b></p>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>