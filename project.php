<?php
require_once("db.php");
session_start();
if($_SESSION["login"] == false || !(isset($_SESSION["login"]))) {
    echo "<script>alert('无权访问, 请登录!')</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>项目</title>
    <link rel="stylesheet" href="assets/css/style_project.css">
</head>
<body>
    <img src="assets/imgs/xiaohui.png" style="width: 100px;">

    <div class="container">
        <div class="class">
            <div class="title">
                <a href="answer1.php">有问必答</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">争分夺秒</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">绝地反击</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">飞花令</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">线索题</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">别出心裁</a>
            </div>
        </div>
    </div>
</body>
</html>