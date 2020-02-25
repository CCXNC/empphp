<?php

session_start();

// Connect to database
include('../functions/connection.php');

// Make an update  query and store to $sql varaiable
$sql = 'INSERT INTO employees (
        first_name,
        last_name,
        email,
        age,
        address,
        date_of_birth,
        telephone_no,
        department,
        manager_coor,
        gender
    )
    VALUES (
        "' .  $_POST['first_name'] . '",
        "' .  $_POST['last_name'] . '",
        "' .  $_POST['email'] . '",
        "' .  $_POST['age'] . '",
        "' .  $_POST['address'] . '",
        "' .  $_POST['date_of_birth'] . '",
        "' .  $_POST['telephone_no'] . '",
        "' .  $_POST['department'] . '",
        "' .  $_POST['manager_coor'] . '",
        "' .  $_POST['gender'] . '"
    )';

$result = mysqli_query($conn, $sql);

// Execute sql query and if successful or TRUE display Record updated successfully
if($result)
{
    $_SESSION['create_msg'] = 'Employee has been created';
}
else
{
    $_SESSION['create_msg'] = 'Error creating employee';
}

header('Location: index.php');

?>