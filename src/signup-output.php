<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/frame22.css">
    <link rel="stylesheet" href="css/frame7.css">

    <?php require './header.php'; ?>
    <?php require './db-connect.php'; ?>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    if(isset($_POST['name']) && isset($_POST['password'])){
        $sql = $pdo->prepare("insert into Users values(null, ?, ?)");
        $sql->execute([$_POST['name'], $_POST['password']]);
    }else{
        echo '<p>登録された内容に不備があります。</p>';
        echo '<p>登録をやりなおしてください。</p>';
        echo '<a href="signup-input.php">新規登録へ</a>';
    }
    ?>

    <?php require './footer.php'; ?>