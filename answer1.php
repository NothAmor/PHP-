<?php
require_once("db.php");
session_start();
if ($_SESSION["login"] == false || !(isset($_SESSION["login"]))) {
    echo "<script>alert('无权访问, 请登录!')</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>有问必答</title>
    <link rel="stylesheet" href="assets/css/style_project.css">
</head>

<body>
    <img src="assets/imgs/xiaohui.png" style="width: 100px;">

    <div class="container">
        <div class="class">
            <div class="title">
                <a href="">第一组</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="answer/youwenbida.php?page=1&class=2">第二组</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">第三组</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">第四组</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">第五组</a>
            </div>
        </div>
        <div class="class">
            <div class="title">
                <a href="">第六组</a>
            </div>
        </div>
    </div>
</body>

</html>