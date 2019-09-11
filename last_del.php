<?php
session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    exit("error!");//ここで処理をstop
    header("Location: login.php");
}
try {
    $id = $_SESSION["id"];
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //上記接続エラーの場合エラーを表示
    $stmt = $db->prepare('DELETE FROM users WHERE id=:id');
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    echo $_SESSION["name"].'さん、退会が完了しました。';
    
} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form method="post" action="log_out.php">
        <input type="submit" value="ログインページに戻る">
    </form>
</body>
<style>
    body{
        background-image: url(000.jpg);
        background-size: cover;
}
</style>
</html>
