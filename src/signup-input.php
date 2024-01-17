<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <?php include './header2.php' ?>
    <p class="title">新規登録</p>
    <p class="info">※すべて必須項目です</p>
    <?php
    echo '<form action="signup-output.php" method="post">';
    echo '<table class="table">';
    echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
    echo '<input type="text" class="input" name="name" id="name" placeholder="10文字以内">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">パスワード：</td><td>';
    echo '<input type="password" class="input" name="password" id="word" placeholder="半角英数字のみ">';
    echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
    echo '</td></tr>';
    echo '</table>';
    echo '<button class="submit">登録</button>';
    echo '</form>';
    ?>
    <script src="js/signup.js"></script>
    <?php require 'footer.php' ?>