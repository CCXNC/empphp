
<?php
    
    include('functions/connection.php');

    if($_POST['username'] != '' && $_POST['password'] != '' && $_POST['first_name'] != '' && $_POST['last_name'] != '' && $_POST['email'] != '')
    {
        $sql = "INSERT INTO users
        (
            username,
            password,
            first_name, 
            last_name, 
            email
            
        ) VALUES 

        ('". $_POST['username'] . "', 
        '" . md5($_POST['password']) . "',
        '" . $_POST['first_name'] . "',
        '" . $_POST['last_name'] . "', 
        '" . $_POST['email'] . "')"; 
        
        // Execute sql query and if successful or TRUE display New Employee Created Successfully
        if($conn->query($sql) === TRUE)
            { 
                echo "You have registered successfully";
            }
        else
            {
                echo "Error: Problem in registration. Try Again! ";
            }
    }
    else
    {
        $_SESSION[''] = 'Error all fields are required';
    }

    // Close Connection to the Database
    $conn->close();

    echo ' <a href="login.php"> Back </a>';
    
?>

