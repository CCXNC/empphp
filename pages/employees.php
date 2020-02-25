<?php

// Connect to the database
include('../functions/connection.php');

// If there is no submitted last_name input
if(isset($_POST['last_name']))
{
    //$sql = "SELECT * FROM list_register WHERE First_name LIKE '%" . $_POST['First_name'] . "%' ";
    $sql = 'SELECT * FROM employees WHERE last_name LIKE "%' . $_POST['last_name'] . '%"';
}
else
{
    // Make a select all query and store to $sql varaiable
    $sql = "SELECT employees.*, branches.name FROM employees JOIN branches WHERE employees.manager_coor = branches.id";
}

// Execute sql query and store to $result varaiable
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>List of Employees</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <style>
            body
            {
                background:#FFFAF0;

            }

            h1
            {
                color:#000000;
                margin:40px 0 60px 0;
                font-weight:500;
                border: 1px solid;
                font-family: Times, "Times New Roman";
            }

            .our-team-main
            {
                width:100%;
                height:auto;
                border-bottom:5px #323233 solid;
                background:#fff;
                text-align:center;
                border-radius:10px;
                overflow:hidden;
                position:relative;
                transition:0.5s;
                margin-bottom:28px;
            }


            .our-team-main img
            {
                border-radius:50%;
                margin-bottom:20px;
                width: 90px;
            }

            .our-team-main h3
            {
                font-size:20px;
                font-weight:700;
            }

            .our-team-main p
            {
                margin-bottom:0;
            }

            .team-back
            {
                width:100%;
                height:auto;
                position:absolute;
                top:0;
                left:0;
                padding:5px 15px 0 15px;
                text-align:left;
                background:#fff;
                
            }

            .team-front
            {
                width:100%;
                height:auto;
                position:relative;
                z-index:10;
                background:#fff;
                padding:15px;
                bottom:0px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover .team-front
            {
                bottom:-200px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover
            {
                border-color:#777;
                transition:0.5s;
            }

        </style>
    </head>

    <body>
        <?php include('../layout/navbar-pages.php'); ?>
        
        <div class="container">
            <h1 class="text-center">List of Employees</h1>
            <div class="row">
                <?php foreach($result as $employee) : ?>
                    <div class="col-lg-6">
                        <div class="our-team-main">
                            <div class="team-front">
                                <img src="http://placehold.it/110x110/9c27b0/fff?text=Employee" class="img-fluid" />
                                <h3><?php echo $employee['first_name']; ?> <?php echo $employee['last_name']; ?></h3>
                            </div>
                            <div class="team-back">
                                <span>
                                    <?php echo $employee['email']; ?><br>
                                    <?php echo $employee['age']; ?><br>
                                    <?php echo $employee['address']; ?><br>
                                    <?php echo $employee['date_of_birth']; ?><br>
                                    <?php echo $employee['telephone_no']; ?><br>
                                    <?php echo $employee['department']; ?><br>
                                    <?php echo $employee['name']; ?><br>
                                    <?php echo $employee['gender']; ?><br>  
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>

