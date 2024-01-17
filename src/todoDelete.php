<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/todo.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("delete from To_do where to_do_id = ?");
        $sql->execute([$_GET['id']]);
        echo '<p>削除が完了しました。</p>';
        echo '<a href="toppage.php" class="locate">トップページへ</a>';
    ?>
    <?php require 'footer.php' ?>