<?php
session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    exit("error!");
}

$_SESSION["id"] ;
$_SESSION["name"] ;
$_SESSION["email"] ;
$_SESSION["seibetu"] ;
$_SESSION["age"] ;
$_SESSION["auth"] ;
$_SESSION["pw"] ;
$_SESSION["num"];

if($_SESSION["seibetu"] == 1){
    $sei = '<option value="1">女性</option>';
}else{
    $sei = '<option value="0">男性</option>';
}

if($_SESSION["auth"] == 1){
    $auth = '<option value="1">管理者</option>';
}else{
    $auth = '<option value="0">一般</option>';
}

?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー登録</title>
</head>
<style>
    body{
        background-image: url(123.jpg);
        background-size: cover;
    }
</style>
<body>
    <h3><?=$_SESSION["name"];?>さんの情報🔽</h3>
    <form method="post" action="kousin.php">

        <p>お名前:<input type="text" name="name" size="20" placeholder="大妻 花子" value="<?=$_SESSION["name"];?>">
        </p>
        <p>パスワード：<input type="password" name="pw" value="<?=$_SESSION["pw"];?>">
        </p>

        <p>電話番号:<input type="tel" name="num" size="40" maxlength="100" placeholder="ハイフンなし" value="<?=$_SESSION["num"];?>">
        </p>

        <p>MAIL:<input type="text" name="email" size="20" value="<?=$_SESSION["email"];?>">
        </p>

        <p>性別:
          <select name="seibetu" id="seibetu">
          <?=$sei?>
          </select>
        </p>

        <p>年齢:<input type="text" name="age" size="3" maxlength="3" placeholder="20" value="<?=$_SESSION["age"];?>">
        </p>

        <p>権限：
          <select name="auth" id="auth">
            <?=$auth?>
          </select>
        </p>
        <p><input type="submit" value="更新"></p>
        <form method="post" action="shopping.php">
            <input type="submit" value="戻る">
        </form>

    </form>
</body>

<style>
    body{
        background-image: url(000.jpg);
        background-size: cover;
}
</style>
</html>
