<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/todo.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header.php' ?>
    <?php
        if(isset($_POST['work']) && isset($_POST['difficult'])){
            $pdo=new PDO($connect,USER,PASS);
            $sql = $pdo->prepare("insert into To_do values(null,?,?,?)");
            $sql->execute([$_POST['work'],$_SESSION['user']['user_id'],$_POST['difficult']]);
            echo '<p>登録が完了しました。</p>';
        }else{
            echo '<p>入力に不備があるようです</p>';
        }
        echo '<a href="toppage.php" class="locate">トップページへ</a>';
    ?>
    <?php require 'footer.php' ?>