<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

include('../functions/connection.php');

// Make a single row select query with condition of employee id and store to $sql varaiable
$sql = 'SELECT * FROM employees WHERE id=' . $_GET['employee_id'] . '';

// Execute sql query and store to $row variable
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edited employee</title>
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
            <h1>Edit Employee</h1>
            <form  action="update.php" method="POST">
                <div class="form-group">
                    <label>Id: <span>*</span></label>
                    <input class="form-control" type="text" name="id" value="<?php echo $row['id']; ?>" readonly="">
                    <br>
                    <label>First Name: <span>*</span></label>
                    <input class="form-control" type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
                    <br>
                    <label>Last Name: <span>*</span></label>
                    <input class="form-control" type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
                    <br>
                    <label>Email: <span>*</span></label>
                    <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>">
                    <br>
                    <label>Age: <span>*</span></label>
                    <input class="form-control" type="text" name="age" value="<?php echo $row['age']; ?>">
                    <br>
                    <label>Address: <span>*</span></label>
                    <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>">
                    <br>
                    <label>BirthDate: <span>*</span></label>
                    <input class="form-control" type="text" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>">
                    <br>
                    <label>Telephone No: <span>*</span></label>
                    <input class="form-control" type="text" name="telephone_no" value="<?php echo $row['telephone_no']; ?>">
                    <br>
                    <label>Department: <span>*</span></label>
                    <input class="form-control" type="text" name="department" value="<?php echo $row['department']; ?>">
                    <br>
                    <label>Manager Coor: <span>*</span></label>
                    <input class="form-control" type="text" name="manager_coor" value="<?php echo $row['manager_coor']; ?>">
                    <br>
                    <label>Gender: <span>*</span></label>
                    <input class="form-control" type="text" name="gender" value="<?php echo $row['gender']; ?>">
                    <br>
                    <p class="text-basic"><span><b>* Required please fill up</b></span></b></p>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>