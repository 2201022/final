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
    $sql = $pdo->query("select user_name from Users");
    $count = 0;
    foreach($sql as $loop){
        if($loop['user_name'] === $_POST['name']){
            $count++;
        }
    }
    if($count < 1){
        if(isset($_POST['name']) && isset($_POST['password'])){
            $sql = $pdo->prepare("insert into Users values(null, ?, ?)");
            $sql->execute([$_POST['name'], password_hash($_POST['password'],PASSWORD_DEFAULT)]);
            echo '<p>登録が完了しました</p>';
            echo '<a href="toppage.php">トップページへ</a>';
        }else{
            echo '<p>登録された内容に不備があります。</p>';
            echo '<p>登録をやりなおしてください。</p>';
            echo '<a href="signup-input.php">新規登録へ</a>';
        }
    }else{
        echo '<p>そのユーザーネームはすでに使用されています</p>';
        echo '<p>登録をやりなおしてください。</p>';
        echo '<a href="signup-input.php">新規登録へ</a>';
    }
    ?>

    <?php require './footer.php'; ?>