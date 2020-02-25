<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

// Connect to database
include('../functions/connection.php');

// Make an update  query and store to $sql varaiable
$sql = 'UPDATE branches
    SET name = "' .  $_POST['name'] . '",
        company_name = "' .  $_POST['company_name'] . '",
        address = "' .  $_POST['address'] . '",
        telephone_no = "' .  $_POST['telephone_no'] . '",
        oic_name ="' .  $_POST['oic_name'] . '"
    WHERE id="' . $_POST['id'] . '"';

$result = mysqli_query($conn, $sql);

// Execute sql query and if successful or TRUE display Record updated successfully
if($result)
{
    $_SESSION['update_msg'] = 'Branch has been updated';
}
else
{
    $_SESSION['update_msg'] = 'Error updating branch';
}

header('Location: index.php');

?>