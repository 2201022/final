<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/todo.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("update To_do set to_do_name = ?,difficult_id = ? where to_do_id = ?");
        $sql->execute([$_POST['work'],$_POST['difficult'],$_GET['id']]);
        echo '<p>更新が完了しました。</p>';
        echo '<a href="toppage.php" class="locate">トップページへ</a>';
    ?>
    <?php require 'footer.php' ?>