<?php

session_start();

// Connect to database
include('../functions/connection.php');

if($_POST['name'] != '' && $_POST['company_name'] != '' && $_POST['address'] != '' && $_POST['telephone_no'] != '' && $_POST['oic_name'] != '')
{
    // Make an update  query and store to $sql varaiable
    $sql = 'INSERT INTO branches 
        (

            name,
            company_name,
            address,
            telephone_no,
            oic_name
        
        )
        VALUES 
        (
            "' .  $_POST['name'] . '",
            "' .  $_POST['company_name'] . '",
            "' .  $_POST['address'] . '",
            "' .  $_POST['telephone_no'] . '",
            "' .  $_POST['oic_name'] . '"
        )';

    $result = mysqli_query($conn, $sql);


    // Execute sql query and if successful or TRUE display Record updated successfully
    if($result)
    {
        $_SESSION['create_msg'] = 'Branch has been created';
    }
    else
    {
        $_SESSION['create_msg'] = 'Error creating branch';
    }
}
else
{
    $_SESSION['create_msg'] = 'Error all fields are required';
}

header('Location: index.php');

?>