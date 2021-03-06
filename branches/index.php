<!--<body background ="image/design4.jpg">-->
<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
    header('Location: ../login.php');
}

// Connect to the database
include('../functions/connection.php');

//compute_loan(1, 2);

// If there is no submitted last_name input
if(isset($_POST['name']))
{
    //$sql = "SELECT * FROM list_register WHERE First_name LIKE '%" . $_POST['First_name'] . "%' ";
    $sql = 'SELECT * FROM branches WHERE name LIKE "%' . $_POST['name'] . '%"';
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
        <title>Branches</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Branch List</h1>

                <form method="POST">
                    <form class="Search" action="index.php">
                        <input type="text" name="name"  class="form-control" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="Enter Name">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>
                </form>

                <a class="btn btn-primary pull-right" href="../logout.php">Logout</a>
                <br><br>

                <?php if(isset($_SESSION['create_msg'])) : ?>
                    <p class="alert alert-success"><?php echo $_SESSION['create_msg']; ?></p>
                <?php endif; ?>
                <?php if(isset($_SESSION['update_msg'])) : ?>
                    <p class="alert alert-success"><?php echo $_SESSION['update_msg']; ?></p>
                <?php endif; ?>
                <?php if(isset($_SESSION['delete_msg'])) : ?>
                    <p class="alert alert-danger"><?php echo $_SESSION['delete_msg']; ?></p>
                <?php endif; ?>

                <a href="add.php" class="btn btn-primary">Add</a>
                <?php if($result) : ?><!-- If result has retrieved data/s this condition will return True and display the table -->
                    <table class="table table-bordered striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Telephone No</th>
                                <th>Oic Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $branches) : ?>
                                <tr>
                                    <td><?php echo $branches['name']; ?></td>
                                    <td><?php echo $branches['company_name']; ?></td>
                                    <td><?php echo $branches['address']; ?></td>
                                    <td><?php echo $branches['telephone_no']; ?></td>
                                    <td><?php echo $branches['oic_name']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $branches['id']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="delete.php?id=<?php echo $branches['id']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
<?php

$_SESSION['create_msg'] = NULL;
$_SESSION['update_msg'] = NULL;
$_SESSION['delete_msg'] = NULL;

?>