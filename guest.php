<?php
session_start();
require_once('database.php');
if(isset($_POST['guestnick'])){
$data=[
    'name' => $_POST['guestnick'],
];}else{
    echo'ni ma';
    exit();
}

$_SESSION['zalogowany'] = false;
$_SESSION['name'] = $data['name'];
header('Location: main/home/home.php');






$pdo->query('KILL CONNECTION_ID()');
$pdo = null;
?>