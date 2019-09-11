<?php

session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    exit("error!");//ここで処理をstop
}

//POSTを受信
$num = $_POST["num"];
$pw = $_POST["pw"];

try {
    //１．DB接続
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT * FROM users'); 
    //３．データ取得１レコードしか帰ってこない場合は以下の一行で取得可能。
    $stmt->execute();//これがないとこの先動かないので重要
    $row = $stmt->fetch();
//    echo $num;
//    echo $row["num"];
    var_dump($row);


    if( $row["id"] != "" ){//1レコードデータがあればidにはデータがはいっています要クッキーidを入れる
//        $_SESSION["id"] = $row["id"];  //name
//        $_SESSION["name"] = $row["name"];  //name
//        $_SESSION["email"] = $row["email"];  //name
//        $_SESSION["seibetu"] = $row["seibetu"];  //name
//        $_SESSION["age"] = $row["age"];  //name
//        $_SESSION["auth"] = $row["auth"];  //name
//        $row["pw"];  //name
//        $row["num"];  //name
echo'aaa-------0';
        if($row["num"]==$num && $row["pw"]==$pw){
                $_SESSION["pw"] = $row["pw"];  //name
                $_SESSION["num"] = $row["num"];  //name
                header("Location: shopping.php");

        }else{
            echo'aaa---vfbvbnbvb----0';
//            header("Location: login.php");
        }
    }else{
//        header("Location: login.php");
    }
} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}
?>
