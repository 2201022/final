<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php require 'header.php' ?>
    <h1>登録済To-Do一覧</h1>
    <?php
        echo '<table class="table table-bordered">';
        echo '<thead class="table-light">';
        echo '<tr>';
        echo '<th scope="col" class="th">To-Doの内容</th>';
        echo '<th scope="col" class="th">難易度</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from To_Do where user_id = ?');
        $sql->execute([$_SESSION['Users']['user_id']]);
        echo '<tr>';
        foreach($sql as $row){
            echo '<td class="td">', $row['to_do_name'], '</td>';
            if($row['difficult_id'] == 1){
                echo '<td class="td">簡単</td>';
            }else if($row['difficult_id'] == 2){
                echo '<td class="td">普通</td>';
            }else{
                echo '<td class="td">難しい</td>';
            }
        }
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
    ?>
    <?php require 'footer.php' ?>