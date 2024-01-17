<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/todo.css">
    <?php require 'header.php'; ?>
    <?php require 'db-connect.php'; ?>
    <?php
    unset($_SESSION['user']);
    $name = $_POST['nickname'];
    $pass = $_POST['password'];
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $sql = $pdo->prepare("select * from Users where user_name = ?");
        $sql->execute([$name]);

        foreach ($sql as $row) {
            if (password_verify($pass, $row['password'])) {
                $_SESSION['user'] = [
                    'user_id' => $row['user_id'], 'user_name' => $row['user_name'], 'password' => $row['password']
                ];
            }
        }

        if (isset($_SESSION['user'])) {
            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">ログインしました。</p>';
            echo '<a href="./toppage.php" class="locate">';
            echo 'トップページへ';
            echo '</a></div>';
        } else {
            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">ニックネームまたはパスワードが違います。</p>';
            echo '<a href="./login-input.php" class="locate">';
            echo '戻る';
            echo '</a></div>';
        }

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }
    ?>

    <?php require './footer.php'; ?>