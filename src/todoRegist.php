<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/regist.css">
    <?php require 'header.php' ?>
    <h1 class="title">To-Do新規登録</h1>
    <?php
        echo '<form action="todoRegistEsc.php" method="post">';
        echo '<p>To-Doの内容：</p>';
        echo '<p><input type="text" class="input" name="work" id="work"></p>';
        echo '<div class="dif">';
        echo '<p>難易度を選択してください</p>';
        echo '<p><input type="radio" name="difficult" id="easy" value=1>簡単</p>';
        echo '<p><input type="radio" name="difficult" id="normal" value=2>普通</p>';
        echo '<p><input type="radio" name="difficult" id="hard" value=3>難しい</p>';
        echo '</div>';
        echo '<p><button type="submit" class="button">登録する</button></p>';
        echo '</form>';
    ?>
    <?php require 'footer.php' ?>