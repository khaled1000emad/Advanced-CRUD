<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'] ?? null;
if(!$id)
{
    header('location: index.php');
}
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $fName = $_POST['fname'] ?? null;
    $lName = $_POST['lname'] ?? null;
    $Country = $_POST['country'] ?? null;

if($fName)
{
    $sql = $pdo->prepare("UPDATE users_table SET fname = ? WHERE id = $id");
    $sql->execute([$fName]);
}
if($lName)
{
    $sql = $pdo->prepare("UPDATE users_table SET lname = ? WHERE id = $id");
    $sql->execute([$lName]);
}
if($Country)
{
    $sql = $pdo->prepare("UPDATE users_table SET country = ? WHERE id = $id");
    $sql->execute([$Country]);
}
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style2.css" rel="stylesheet"/>
    <script src="script.js"></script>
</head>
<body>
    <div id='box'>
    <form method='POST' action='#' class='my-form'>
    <div id='header-box'>
    <header id='main-header'>
        <h1 id='main-header-font'>Update Your Data</h1>
    </header>
    </div>
    
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
                <div class='done'>
                <p id='text'>Updated Succesfully</p>
                </div>
            <?php endif; ?>
            
    <br>
    <br>
    <input type='text'  placeholder='First Name' id='fname' name='fname' >
    <br>
    <br>
    <input type='text' placeholder='Last Name' id='lname' name='lname' >
    <br>
    <br>
    <input type='text' placeholder='Country' id='country' name='country' >
    <br>
    <br>
    <input type ='submit' value='UPDATE' id='add-button'>
    <br>
    <br>
    <a href='index.php'>Return to home page</a>
    </form>
    </div>
</body>
</html>