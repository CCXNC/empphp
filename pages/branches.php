<?php

// Connect to the database
include('../functions/connection.php');

// If there is no submitted last_name input
if(isset($_POST['oic_name']))
{
    //$sql = "SELECT * FROM list_register WHERE First_name LIKE '%" . $_POST['First_name'] . "%' ";
    $sql = 'SELECT * FROM branches WHERE oic_name LIKE "%' . $_POST['oic_name'] . '%"';
}
else
{
    // Make a select all query and store to $sql varaiable
    $sql = "SELECT * FROM branches";
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
        <title>List of Branch</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <style>
            .mb-60 
            {
                margin-bottom: 60px;
            }
            .services-inner 
            {
                border: 2px solid #48c7ec;
                margin-left: 35px;
                transition: .3s;
            }
            .our-services-img 
            {
                float: left;
                margin-left: -36px;
                margin-right: 22px;
                margin-top: 28px;
            }
            .our-services-text 
            {
                padding-right: 10px;
            }
            .our-services-text 
            {
                overflow: hidden;
                padding: 28px 0 25px;
            }
            .our-services-text h4 
            {
                color: #222222;
                font-size: 18px;
                font-weight: 700;
                letter-spacing: 1px;
                margin-bottom: 4px;
                padding-bottom: 10px;
                position: relative;
                text-transform: uppercase;
            }
            .our-services-text h4::before 
            {
                background: #ec6d48 none repeat scroll 0 0;
                bottom: 0;
                content: "";
                height: 1px;
                position: absolute;
                width: 100px;
            }
            .our-services-wrapper:hover .services-inner 
            {
                background: #fff none repeat scroll 0 0;
                border: 2px solid transparent;
                box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);
            }
            .our-services-text p 
            {
                margin-bottom: 0;
            }
            p 
            {
                font-size: 14px;
                font-weight: 400;
                line-height: 26px;
                color: #666;
                margin-bottom: 15px;
            }
            body
            {
                background:#FFFAF0;

            }

            h1
            {
                color:#000000;
                margin: auto;
                font-weight:500;
                font-family: Times, "Times New Roman";
            }
            .center
            {
                text-align: center;
            }

        </style>

    </head>

    <body>

        <?php include('../layout/navbar-pages.php'); ?>
            
        <!--<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">NHFC Branch</a>
                </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="branches.php">Branch</a></li>
                <li><a href="employees.php">Employees</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>Back</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            </div>
        </nav>-->
       
        <div class="container">
            <h1>List of Branch</h1>
	        <div class="row"><br>
                <?php foreach($result as $branches) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="our-services-wrapper mb-60">
                            <div class="services-inner">
                                <div class="our-services-img">
                                    <img src="https://www.orioninfosolutions.com/assets/img/icon/Agricultural-activities.png" width="68px" alt="">
                                </div>
                                <div class="our-services-text">
                                    <div class="center">
                                        <h4><?php echo $branches['name']; ?></h4>
                                        <p>
                                            <?php echo $branches['company_name']; ?><br>
                                            <?php echo $branches['address']; ?><br>
                                            <?php echo $branches['telephone_no']; ?><br>
                                            <?php echo $branches['oic_name']; ?><br>
                                        </p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
	        </div>
        </div>
    </body>
</html>