<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログインページ</title>
        <link rel="stylesheet" href="css/signup.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
        <?php require 'header.php' ?>
        <?php 
            echo '<p class="title">ログイン</p>';
            $nickname = $password = '';
            echo '<form action="./login-output.php" method="post" name="loginForm">';
            echo '<table class="table">';
            echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
            echo '<input type="text" class="input" name="nickname" id="name" value="', $nickname, '">';
            echo '</td></tr>';
            echo '<tr><td class="subtitle">パスワード：</td><td>';
            echo '<input type="password" class="input" name="password" id="word" value="', $password, '">';
            echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
            echo '</td></tr>';
            echo '</table>';
            echo '<button class="submit" onclick="send()">ログイン</button>';
            echo '</form>';
            echo '<p class="info">アカウントがない方は<a href="signup-input.php">こちら</a></p>';
            echo '<script src="./js/login.js"></script>';
        ?>
    </body>
</html>
    