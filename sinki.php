<?php
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    header("Location: login.php");
    exit("error!");
    header("Location: login.php");
$email = $_POST["num"]; //email
$pw = $_POST["pw"]; //pw
echo $email;
try {
    //１．DB接続
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //上記接続エラーの場合エラーを表示

    //２．SQL実行(usersテーブル: email AND pwを参照)
    $stmt = $db->prepare('SELECT * FROM users WHERE id=:id'); //SQL文を用意
    $stmt->bindValue(":id", $id);
//    $stmt->bindValue(":pw", $pw);
    $stmt->execute();

    //３．データ取得１レコードしか帰ってこない場合は以下の一行で取得可能。
    $val = $stmt->fetch();  //$row["id"],$row["name"],$row["email"]....
    $val
} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}



//認証処理POST値と変数$set_id,$set_pwが同じであればtrue
if( $val["id"] != "" ){//1レコードデータがあればidにはデータがはいっています

  //【 入力箇所 】
  //2.認証OKならSESSION変数にsid, name, auth へ代入
    $_SESSION["sid"] = session_id(); //"sid"へ代入LOGINちぇくに必要クッキーidを入れる
    $_SESSION["name"] = $val["name"];  //name
    $_SESSION["auth"] = $val["auth"];  //auth


  //【 ワーク 】
  //3.処理完了後 login_ok.php へリダイレクト
header("Location: users_select.php");



}else{
  //認証NGならログインフォーム画面へリダイレクト
  header("Location: login.php");

    
}




//処理終了
exit;
?>
