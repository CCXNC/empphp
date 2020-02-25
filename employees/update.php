<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

// Connect to database
include('../functions/connection.php');

// Make an update  query and store to $sql varaiable
$sql = 'UPDATE employees
    SET first_name = "' .  $_POST['first_name'] . '",
        last_name = "' .  $_POST['last_name'] . '",
        email = "' .  $_POST['email'] . '",
        age = "' .  $_POST['age'] . '",
        address = "' .  $_POST['address'] . '",
        date_of_birth = "' .  $_POST['date_of_birth'] . '",
        telephone_no = "' .  $_POST['telephone_no'] . '",
        department="' .  $_POST['department'] . '",
        manager_coor="' .  $_POST['manager_coor'] . '",
        gender="' .  $_POST['gender'] . '"
    WHERE id="' . $_POST['id'] . '"';

$result = mysqli_query($conn, $sql);

// Execute sql query and if successful or TRUE display Record updated successfully
if($result)
{
    $_SESSION['update_msg'] = 'Employee has been updated';
}
else
{
    $_SESSION['update_msg'] = 'Error updating employee';
}

header('Location: index.php');

?>