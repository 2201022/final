<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/todo.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header.php' ?>
    <?php
        $id = $_GET['id'];
        $pdo=new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("select * from To_do where to_do_id = ?");
        $sql->execute([$id]);
        foreach($sql as $row){
            $difficult = $row['difficult_id'];
        }
        $sql = $pdo->prepare("insert into Clear values(null,?,?,?)");
        $sql->execute([$_SESSION['user']['user_id'],$difficult,$id]);
        echo '<p>達成おめでとうございます！</p>';
        echo '<a href="toppage.php" class="locate">トップページへ</a>';
    ?>
    <?php require 'footer.php' ?>