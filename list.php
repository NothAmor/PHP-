<?php
require_once("db.php");
session_start();
if($_SESSION["login"] == false || !(isset($_SESSION["login"]))) {
    echo "<script>alert('无权访问, 请登录!')</script>";
    echo "<script>window.location.href='index.php'</script>";
}

$sql = "SELECT * FROM users ORDER BY team_score DESC";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>排行榜</title>
    <link rel="stylesheet" href="assets/css/style_list.css">
</head>
<body>

    <div class="list">
        <img src="assets/imgs/xiaohui.png">

        <h1>排行榜</h1>
        <?php
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
                $team_name = $row["username"];
                $team_score = $row["team_score"];
                echo "<h2>第".$i."名:".$team_name."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp总分数:".$team_score."分</h2>";
                $i++;
            }
        ?>
    </div>
</body>
</html>