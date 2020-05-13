<?php
require_once("db.php");
session_start();
$name = $_POST['username'];
$pwd = md5($_POST['password']);

if($name == "root") {
    $sql = "select * from admin where username='$name' and password='$pwd'";
} else {
    $sql = "select * from users where username='$name' and password='$pwd'";
}

$result = mysqli_query($con,$sql);
$row = mysqli_num_rows($result);

if($row) {
    $_SESSION["login"] = true;
    $_SESSION["username"] = $name;
    echo "<script>alert('登陆成功!');</script>";
}
if($_SESSION["login"] == true) {
    echo "<script>alert('你已经登陆了, 正在为你跳转到首页')</script>";
    echo "<script>window.location.href='home.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统登录</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="box">
        <img src="assets/imgs/xiaohui.png">
        <form action="" method="POST">
            <h1>登录</h1>
            <div class="input-group" style="margin-top: 40px; margin-bottom: 10px;">
                <span class="input-group-addon" id="basic-addon1">名字:</span>
                <input type="text" class="form-control" placeholder="输入用户名" aria-describedby="basic-addon1" id="username" name="username" required>
            </div>
            <div class="input-group" style="margin-bottom: 20px;">
                <span class="input-group-addon" id="basic-addon1">密码:</span>
                <input type="password" class="form-control" placeholder="输入密码" aria-describedby="basic-addon1" id="password"  name="password" required>
            </div>
            <input type="submit" class="btn btn-success" id="login" value="登录" style="margin-bottom: 5em;">
            <p>Made with ❤ By : 方一力</p>
        </form>
    </div>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>