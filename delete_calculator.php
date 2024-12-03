<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=notes_db','root','');
$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=== 'GET'){
    $query = $pdo->prepare('DELETE FROM `expense_calculator` WHERE id=:id');
    $query->execute([
        'id'=>$id,
    ]);
    $_SESSION['success'] = 'Расход успешно удален!';
    header('location: /cost_calc/cost_calculator.php');
    exit;
}else{
    $_SESSION['error'] = 'Ошибка при удалении расхода!';
    header('location: /cost_calc/cost_calculator.php');
    exit;   
}


