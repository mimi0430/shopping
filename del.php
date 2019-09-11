<?php
session_start();
$sd = session_id();//このページでの切歯音id取得
if($_SESSION["sid"]!=$sd){
    exit("error!");//ここで処理をstop
    header("Location: login.php");
}

?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ユーザー更新</title>
</head>
<body>
    <p><?=$_SESSION["name"];?>さん、本当に退会しますか？</p>
    <form method="post" action="last_del.php">
        <input type="submit" name="sakujo " value="退会">
    </form>
    <form method="post" action="shopping.php">
        <input type="submit" value="戻る">
    </form>

    
</body>
<style>
    body{
        background-image: url(000.jpg);
        background-size: cover;
  
}
</style>
</html>
