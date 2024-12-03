<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=notes_db','root','');
$name = $_POST['name'];
$amount = $_POST['amount'];

if(!empty($name) && !empty($amount)){
    $query = $pdo->prepare('INSERT INTO `expense_calculator` (`name`, `amount`) VALUES (:name, :amount)');
    $query -> execute([
        'name'=>$name,
        'amount'=>$amount
    ]);
    $_SESSION['success'] = 'Действие выполнено успешно.';

    header('location:/cost_calc/cost_calculator.php');
}else{
    $_SESSION['error'] = 'Ошибка.';
    header('location:/cost_calc/cost_calculator.php');
}

