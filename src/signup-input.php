<!DOCTYPE html>
<html lang="ja">
<head>
    <?php require 'header.php' ?>
    <p class="title">新規登録</p>
    <p class="info">※すべて必須項目です</p>
    <?php
    $name = $password = '';
    echo '<form action="signup-output.php" method="post" name="form22">';
    echo '<table class="table">';
    echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
    echo '<input type="text" class="input" name="name" id="name" placeholder="10文字以内" value="', $name, '">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">パスワード：</td><td>';
    echo '<input type="password" class="input" name="password" id="word" placeholder="半角英数字のみ" value="', $password, '">';
    echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
    echo '</td></tr>';
    echo '</table>';
    echo '<div class="submit" onclick="send()">登録</div>';
    echo '</form>';
    ?>
    <script src="js/signup.js"></script>
    <?php require 'footer.php' ?>