<?php
session_start();
$sd = session_id();
if($_SESSION["sid"]!=$sd){
    header("Location: login.php");
}
$yen = 2000;
$yen1 = 5600;
$yen2 = 9000;
$yen3 = 12000;
$yen4 = 20000;

$_SESSION["yenz"] = $_POST["yen"];
$_SESSION["yenz1"] = $_POST["yen1"];
$_SESSION["yenz2"] = $_POST["yen2"];
$_SESSION["yenz3"] = $_POST["yen3"];
$_SESSION["yenz4"] = $_POST["yen4"];
$_SESSION["goukei"] = $_SESSION["goukei"]+$_SESSION["yenz"]+$_SESSION["yenz1"]+$_SESSION["yenz2"]+$_SESSION["yenz3"]+$_SESSION["yenz4"];
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー登録</title>
</head>
<body>
    <center><img src="sale.gif" id="picc" width="600" height="150">
    </center>
    
    <h3><?=$_SESSION["name"];?>さんようこそ！</h3>
    <form method="post" action="kousin_ok.php">
        <input type="submit" value="登録内容の表示または変更">
    </form>
    
    <form method="post" action="log_out.php">
        <input type="submit" value="ログアウト">
    </form>

    <form method="post" action="del.php">
        <input type="submit" value="退会">
    </form>
    <!--##############################################-->

    <div id="kounyu">
        <p id="kounyu1"><?=$_SESSION["goukei"];?></p>
        <div id="k_to"><p>円⬅️合計金額</p></div>
    </div>

    <center>
        <div id="picter">
            <div id="p_1">
                <img src="1.jpg" id="pic"  width="193" height="280">
                <p><?=$yen1;?>円</p>
                <form action="shopping.php" method="post">
                    <input type="hidden" name="yen1" value="<?=$yen1;?>" />
                    <input type="submit" value="購入">
                </form>
            </div>
            <div id="p_2">
                 <img src="2.jpg" id="pic"  width="183" height="280">
                 <p><?=$yen;?>円</p>
                 <form action="shopping.php" method="post">
                     <input type="hidden" name="yen" value="<?=$yen;?>" />
                     <input type="submit" value="購入">
                 </form>
            </div>
            <div id="p_3">
                <img src="3.jpg" id="pic"  width="183" height="280">
                <p><?=$yen3;?>円</p>
                <form action="shopping.php" method="post">
                    <input type="hidden" name="yen3" value="<?=$yen3;?>" />
                    <input type="submit" value="購入">
                </form>
            </div>
         </div>
        <div id="picter1">
            <div id="p_3">
                <img src="4.jpg" id="pic"  width="193" height="250">
                <p><?=$yen4;?>円</p>
                <form action="shopping.php" method="post">
                    <input type="hidden" name="yen4" value="<?=$yen4;?>" />
                    <input type="submit" value="購入">
                </form>
            </div>
            <div id="p_4">
                <img src="5.jpg" id="pic"  width="183" height="250">
                <p><?=$yen4;?>円</p>
                <form action="shopping.php" method="post">
                    <input type="hidden" name="yen4" value="<?=$yen4;?>" />
                    <input type="submit" value="購入">
                </form>
            </div>
            <div id="p_5">
                <img src="6.jpg" id="pic"  width="193" height="250">
                <p><?=$yen2;?>円</p>
                <form action="shopping.php" method="post">
                    <input type="hidden" name="yen2" value="<?=$yen2;?>" />
                    <input type="submit" value="購入">
                </form>
            </div>
        </div>
    </center>




<style>
    #pic{
        border:3px solid #e0ffff;
    }
    #picter{
    }
        #picter1{
    }
    #p_1{
        display: inline-block;
    }
    #p_2{
        display: inline-block;
    }
    #p_3{
        display: inline-block;
    }
    #p_1{
        display: inline-block;
    }
    #p_4{
        display: inline-block;
    }
    #p_5{
        display: inline-block;
    }
    #kounyu{
        display: inline-block;
        top:250px;
        position:absolute;
        right: 330px;
    }
    #kounyu1{
        display: inline-block;
        width:43px;
    }
    #k_to{
        display: inline-block;
    }
    body{

        background-image: url(000.jpg);
        background-size: cover;
    }
</style>
</body>
</html>
