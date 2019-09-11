<?php
session_start();
$sd = session_id();
$_SESSION["sid"]=$sd;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>LOGIN画面</title>
<style>
body{
        background-image: url(000.jpg);
        background-size: cover;
}
#log{
    border-radius: 20px;      /* 角丸の指定 */
}
#form_login{
	position:absolute;
	top:100px;
	left:200px;
	border:3px solid #e0ffff;
	width:500px;
	padding:80px;
    border-radius: 20px;      /* 角丸の指定 */
}
#sinki{
    position:absolute;
    top:340px;
    left:590px;
    border:3px solid #e0ffff;
    width:250px;
    height:80px;
	padding:1px;
    border-radius: 20px;      /* 角丸の指定 */
    margin: 1px;
}
</style>
</head>
<body>
<!--
        <form method="post" action="log_out.php">
      
            <input type="submit" value="ログイン"style="border:2px #e0ffff solid;">
        
        </form>
-->
<center>
    <form method="post" action="login_act.php">
        <div id = "form_login">
            <div id = "login">
                <p id = "log">ログイン</p>
            </div>
            <p>
                <input type="text" name="num" placeholder="電話番号"style="border:2px #e0ffff solid;">
            </p>
            <p>
                <input type="text" name="pw"placeholder="パスワード" style="border:2px #e0ffff solid;">
            </p>
            <p>
                <input type="submit" value="ログイン"style="border:2px #e0ffff solid;">
            </p>
        </div>
    </form>

    <div id="sinki">
        <form mathod = "post" action="users.html">
            <p>アカウントをお持ちでない場合
                <input type="submit" value="アカウント作成"style="border:2px #e0ffff solid ;">
            </p>
        </form>
    </div>

</center>
</body>
</html>