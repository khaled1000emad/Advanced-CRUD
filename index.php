<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmnt = $pdo->prepare('SELECT * FROM users_table ');
$stmnt->execute();
$employees = $stmnt->fetchAll(PDO::FETCH_ASSOC); //by this line i stored the $_post array as an associative array in employees



?>




<!doctype html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet"/>
    <title>Employees CRUD</title>
</head>
<body>
<h1>Employees CRUD</h1>

<p>
    <a href="create.php" type="button" class="btn btn-sm btn-success">Add Employee</a>
</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Country</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($employees as $i => $employee) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $employee['fname'] ?></td>
            <td><?php echo $employee['lname'] ?></td>
            <td><?php echo $employee['country'] ?></td>
            <td>
                <a href="update.php?id=<?php echo $employee['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="post" action="delete.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $employee['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>