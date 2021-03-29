<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];
if(!$id)
{
    header('location: index.php');
    exit;
}

$query = $pdo->prepare('DELETE FROM users_table WHERE id = ?');
$query->execute([$id]);

header('location: index.php');
?>

