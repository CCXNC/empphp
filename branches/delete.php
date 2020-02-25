<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

// Connect to database
include('../functions/connection.php');

// Make a delete query with condition of employee id and store to $sql varaiable
$sql = 'DELETE FROM branches WHERE id=' . $_GET['id'] . '';
// Execute sql query and store to $result varaiable
$result = mysqli_query($conn, $sql);

if($result) // If result has successfuly deleted data this condition will return True -->
{
    $_SESSION['delete_msg'] = 'Branch has been deleted';
}
else
{
    $_SESSION['delete_msg'] = 'Error deleting branch';
}

header('Location: index.php');

?>