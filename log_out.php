<?php



session_start();
$_SESSION = array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000,'/');
}

session_destroy();
header("Location: login.php");
exit();

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>