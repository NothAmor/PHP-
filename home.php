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
    <title>主页</title>
    <link rel="stylesheet" href="assets/css/style_home.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <img src="assets/imgs/xiaohui.png" style="width: 90px;">

    <div class="main">
        <div class="title">
            <a href="project.php">诗词大赛</a>
        </div>
        <img src="assets/imgs/ink.png" class="ink">
    </div>
</body>

</html>