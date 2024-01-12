<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/frame22.css">
    <link rel="stylesheet" href="css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    unset($_SESSION['Users']);
    if(isset($_POST['name']) && isset($_POST['password'])){
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare("insert into Users values(null, ?, ?)");
        $sql->execute([$_POST['name'], $_POST['password']]);
    }else{
        echo '<p>登録された内容に不備があります。</p>';
        echo '<p>登録をやりなおしてください。</p>';
        echo '<a href="signup-input.php">新規登録へ</a>';
    }
    ?>

    <?php include './footer.php'; ?>