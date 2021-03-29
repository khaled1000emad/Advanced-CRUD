<?php
//include 'index.php';
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$stmnt = $pdo->prepare('SELECT * FROM users_table ');
//$stmnt->execute();
//$employees = $stmnt->fetchAll(PDO::FETCH_ASSOC);
if($_SERVER['REQUEST_METHOD'] === 'POST')
{  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $country = $_POST['country'];
    $pdo->exec("INSERT INTO users_table(fname,lname,country)
        VALUES('$fname' , '$lname' , '$country')");
        
}
else{
    
}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet"/>
    <script src="script.js"></script>
</head>
<body>
    <div id='box'>
    <form method='POST' action='#' class='my-form'>
    <div id='header-box'>
    <header id='main-header'>
        <h1 id='main-header-font'>Please Fill This Data</h1>
    </header>
    </div>
    
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
                <div class='done'>
                <p id='text'>Added Succesfully</p>
                </div>
            <?php endif; ?>
            
    <br>
    <br>
    <input type='text'  placeholder='First Name' id='fname' name='fname' required>
    <br>
    <br>
    <input type='text' placeholder='Lastname' id='lname' name='lname' required>
    <br>
    <br>
    <input type='text' placeholder='Country' id='country' name='country' required>
    <br>
    <br>
    <input type ='submit' value='ADD' id='add-button'>
    <br>
    <br>
    <a href='index.php'>Return to home page</a>
    </form>
    </div>
</body>
</html>