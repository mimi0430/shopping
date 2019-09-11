<?php

 session_start();
 $sd = session_id();//このページでの切歯音id取得
 if($_SESSION["sid"]!=$sd){
     exit("error!");//ここで処理をstop
 }

try {
    //１．DB接続
  $db = new PDO('sqlite:php.db');
  echo 'ssss';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //上記接続エラーの場合エラーを表示
    echo 'sssddds';
    //２．SQL実行（usersテーブル）
    $stmt = $db->prepare('SELECT * FROM users'); //SQL文を用意
    $stmt->execute();

    //３．データ取得と表示文字作成
    $view = "";
    while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
        $view .= '<div>';
        $view .= '<a href="users_detail.php?id='.$row["id"].'">';
        $view .= $row["id"].'|'.$row["name"].'|'.$row["pw"].'|'.$row["num"];
        $view .= '</a>';
        $view .= '</div>';
    }

} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート：表示画面</title>
</head>
<body>
<a href="input.php">ユーザー新規登録</a>　
<a href="users_select.php">ユーザー 一覧</a>　
<a href="logout.php">ログアウト</a>
<h1>USERSテーブル一覧</h1>
<?php
    echo $view;
?>
</body>
</html>
