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
if(isset($_POST['last_name']))
{
    //$sql = "SELECT * FROM list_register WHERE First_name LIKE '%" . $_POST['First_name'] . "%' ";
    $sql = 'SELECT * FROM employees WHERE last_name LIKE "%' . $_POST['last_name'] . '%"';
}
else
{
    // Make a select all query and store to $sql varaiable
    $sql = "SELECT employees.*, branches.name, branches.oic_name FROM employees JOIN branches WHERE employees.manager_coor = branches.id";
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
        <title>Employees</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Employee List</h1>

                <form method="POST">
                    <form class="Search" action="index.php">
                        <input type="text" name="last_name"  class="form-control" value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; } ?>" placeholder="Enter Last Name">
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Telephone No</th>
                                <th>Department</th>
                                <th>Manager Coor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $employee) : ?>
                                <tr>
                                    <td><?php echo $employee['first_name']; ?></td>
                                    <td><?php echo $employee['last_name']; ?></td>
                                    <td><?php echo $employee['email']; ?></td>
                                    <td><?php echo $employee['address']; ?></td>
                                    <td><?php echo $employee['telephone_no']; ?></td>
                                    <td><?php echo $employee['department']; ?></td>
                                    <td><?php echo $employee['name']; ?> <?php echo $employee['oic_name']; ?></td>
                                    <td>
                                        <a href="edit.php?employee_id=<?php echo $employee['id']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="delete.php?employee_id=<?php echo $employee['id']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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