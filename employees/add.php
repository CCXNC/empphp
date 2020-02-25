<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

include('../functions/connection.php');

// Query to get branches
$sql = "SELECT * FROM branches";

// Execute sql query and store to $result varaiable
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Employee</title>
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
            <h1>Add Employee</h1>
            <form  action="create.php" method="POST">
                <div class="form-group">
                    <label>Id: <span>*</span></label>
                    <!--<input class="form-control" type="text" name="id" readonly="">
                    <br>-->
                    <label>First Name: <span>*</span></label>
                    <input class="form-control" type="text" name="first_name">
                    <br>
                    <label>Last Name: <span>*</span></label>
                    <input class="form-control" type="text" name="last_name">
                    <br>
                    <label>Email: <span>*</span></label>
                    <input class="form-control" type="text" name="email">
                    <br>
                    <label>Age: <span>*</span></label>
                    <input class="form-control" type="text" name="age">
                    <br>
                    <label>Address: <span>*</span></label>
                    <input class="form-control" type="text" name="address">
                    <br>
                    <label>BirthDate: <span>*</span></label>
                    <input class="form-control" type="text" name="date_of_birth">
                    <br>
                    <label>Telephone No: <span>*</span></label>
                    <input class="form-control" type="text" name="telephone_no">
                    <br>
                    <label>Department: <span>*</span></label>
                    <input class="form-control" type="text" name="department">
                    <br>
                    <label>Manager Coor: <span>*</span></label>
                    <select class="form-control" type="text" name="manager_coor">
                        <?php foreach($result as $branch) : ?>
                            <option value="<?php echo $branch['id']; ?>"><?php echo $branch['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label>Gender: <span>*</span></label>
                    <input class="form-control" type="text" name="gender">
                    <br>
                    <p class="text-basic"><span><b>* Required please fill up</b></span></b></p>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>