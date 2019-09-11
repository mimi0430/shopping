<?php
session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    exit("error!");
}
try {
    echo'aaa';
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST["name"];
    $num = $_POST["num"];
    $email = $_POST["email"];
    $seibetu = $_POST["seibetu"];
    $age = $_POST["age"];
    $auth = $_POST["auth"];
    $pw =$_POST["pw"];
    $yumi = "   ゆみサイト登録内容".date("Y/m/d/H:i")."\n". $name ."||".$num ."||".$email ."||".$seibetu ."||".$age ."||".$auth ."||".$pw ;
    echo'aahgfa';

    $file = 'memo.txt';
        if(!(file_exists($file))) { // ファイルの存在確認
    // 作成するファイル名の指定
            $file = 'memo.txt';
            touch($file);
            file_put_contents($file , $yumi);
    }else{

     $a = fopen("memo.txt", "w");
     fwrite($a, $yumi);
     fclose($a);
    //            echo "上書き";
    }
    // そもそもidとnameでは使われる用途が違います。idはCSSやJavaScriptでそのタグを指定する際に使われるものですが、nameはPHPで入力された値を送信する際に使われるものです。
        //３．SQL文作成
    $stmt = $db->prepare('INSERT INTO users(name,email,seibetu,age,auth,indate,pw,num)VALUES(:name,:email,:seibetu,:age,:auth,datetime(),:pw,:num)');
    echo'aa9999a';
    //４．SQL文の値へPOST値を渡す
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":seibetu", $seibetu);
    $stmt->bindValue(":age", $age);
    $stmt->bindValue(":auth", $auth);
    $stmt->bindValue(":pw", $pw);
    $stmt->bindValue(":num", $num);
    $stmt->execute();
    echo'-1111111111';
    $stmt = $db->prepare('SELECT * FROM users WHERE id=:id');
    echo'aaa-------09';
    //SQL文を用意WHERE name=:name AND num=:num
    $stmt->bindValue(":id", $id);
    echo'aaa-------0';
    $row = $stmt->fetch();
    $_SESSION["id"] = $row["id"]; //name
    $_SESSION["name"] = $row["name"];  //name
    $_SESSION["email"] = $row["email"];  //name
    $_SESSION["seibetu"] = $row["seibetu"];  //name
    $_SESSION["age"] = $row["age"];  //name
    $_SESSION["auth"] = $row["auth"];  //name
    $_SESSION["pw"] = $row["pw"];  //name
    $_SESSION["num"] = $row["num"];  //name
    echo'aaajgjvkjjkhgf999999';
    $view = '登録完了しました ↓ <br>';
    $view .= '<a href="shopping.php">洋服サイトはこちら</a>';

} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
    echo'aaa';
}
//ini_set('session.bug_compat_warn', 0); ini_set('session.bug_compat_42', 0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ユーザー登録結果</title>
</head>


<body>
   <div id="center1">
        <p>登録情報をmemo.txtに保存しました。
        </p>
        <p>memo.txtの中身を確認してください</p>
        <?php echo $view;?>
    </div>
</body>
<style>
    body{
        background-image: url(000.jpg);
        background-size: cover;
    }
    #center1{
        top:250px;
        left: 500px;
    }

</style>
</html>