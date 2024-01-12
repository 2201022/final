<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログインページ</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <?php 
            echo '<p class="title">ログイン</p>';
            $nickname = $password = '';
            echo '<form action="./login-output.php" method="post" name="loginForm">';
            echo '<table class="table">';
            echo '<tr><td class="subtitle">メールアドレス：</td><td>';
            echo '<input type="text" class="input" name="nickname" id="name" value="', $nickname, '">';
            echo '</td></tr>';
            echo '<tr><td class="subtitle">パスワード：</td><td>';
            echo '<input type="password" class="input" name="password" id="word" value="', $password, '">';
            echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
            echo '</td></tr>';
            echo '</table>';
            echo '<div class="submit" onclick="send()">ログイン</div>';
            echo '</form>';
            echo '<p class="info">アカウントがない方は<a href="signup.php">こちら</a></p>';
            echo '<script src="./js/login.js"></script>';
        ?>
    </body>
</html>
    