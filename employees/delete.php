<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

// Connect to database
include('../functions/connection.php');

// Make a delete query with condition of employee id and store to $sql varaiable
$sql = 'DELETE FROM employees WHERE id=' . $_GET['employee_id'] . '';
// Execute sql query and store to $result varaiable
$result = mysqli_query($conn, $sql);

if($result) // If result has successfuly deleted data this condition will return True -->
{
    $_SESSION['delete_msg'] = 'Employee has been deleted';
}
else
{
    $_SESSION['delete_msg'] = 'Error deleting employee';
}

header('Location: index.php');

?>