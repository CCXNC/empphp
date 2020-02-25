<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .navbar {
                margin-bottom: 0;
                border-bottom: 0;
            }

            .jumbotron {
                background-image: url('image/background.jpg');
                background-size: cover;
                background-position: bottom;
                height: 70vh;
                background-repeat: no-repeat;
            }

            h1, p {
                color: #efefef !important;
            }
        </style>
    </head>
    <body>
        <?php include('layout/navbar.php'); ?>

        <div class="jumbotron">
            <div class="container">
                <h1>Employee System</h1>
                <p>This is the employee system</p>
            </div>
        </div>
    </body>
</html>