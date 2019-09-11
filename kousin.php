<?php
session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    exit("error!");//ここで処理をstop
}
try {

    $id = $_SESSION["id"];
    $name = $_POST["name"];
    $num = $_POST["num"];
    $email = $_POST["email"];
    $seibetu = $_POST["seibetu"];
    $age = $_POST["age"];
    $auth = $_POST["auth"];
    $pw =$_POST["pw"];
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
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt = $db->prepare('UPDATE users SET name=:name, email=:email, seibetu=:seibetu, age=:age, auth=:auth, pw=:pw, num=:num WHERE id=:id');
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":seibetu", $seibetu);
    $stmt->bindValue(":age", $age);
    $stmt->bindValue(":auth", $auth);
    $stmt->bindValue(":pw", $pw);
    $stmt->bindValue(":num", $num);
    $stmt->execute();
    
    $stmt = $db->prepare('SELECT * FROM users '); //SQL
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch();
    
    echo $row['name']."|".$row['email']."|".$row['seibetu']."|".$row['age']."|".$row['auth']."|".$row['pw']."|".$row['num'];




} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}
?>
