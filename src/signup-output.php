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
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $name = $_POST['name'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insertSql = $pdo->prepare("insert into Users values(null, ?, ?)");
        $insertSql->execute([$name, $pass]);

        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">お客様情報を登録しました。</p>';
        echo '<a href="./alcoholQue.php">';
        echo 'トップページへ';
        echo '</a></div>';

        $userId = $pdo->lastInsertId();

        $selectSql = $pdo->prepare("select * from user where id = ?");
        $selectSql->execute([$userId]);

        foreach ($selectSql as $row) {
            $_SESSION['Users'] = [
                'user_id' => $row['user_id'], 'user_name' => $row['user_name'], 'password' => $row['password']
            ];
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

    <?php include './footer.php'; ?>