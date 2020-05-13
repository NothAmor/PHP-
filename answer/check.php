<?php
header("Content-type:text/html;charset=utf-8");
require_once("../db.php");
session_start();
$answer = $_GET["answer"];
$score = $_GET["score"];
$id = $_GET["id"];
$page = $_GET["page"];
$class = $_GET["class"];
$username = $_SESSION["username"];
if (empty($answer)) {
    $score -= 10;
    echo "<script>alert('未选择答案! 扣10分!');location.href='youwenbida.php?page=$next_id&class=$class&score=$score';</script>";
} else {
    $result = mysqli_query($con, "SELECT * FROM questions WHERE id =" . $id);
    while ($row = mysqli_fetch_array($result)) {
        $true = $row["true_answer"];
        $next_id = $id + 1;

        if ($page == 3 && $answer == $true) {
            $score += 10;



            $search = mysqli_query($con, "SELECT team_score FROM users WHERE username='$username'");
            $eee = mysqli_fetch_row($search);
            $old_score = $eee[0];
            $new_score = $old_score + $score;
            mysqli_query($con, "UPDATE users SET team_score=$new_score WHERE username='$username'");


            echo "<script>alert('正确！得10分！答题结束, 得到分数:$score, 总分数:$new_score');location.href='../home.php';</script>";
        } else if ($page == 3 && $answer != $true) {
            $score -= 10;

            $search = mysqli_query($con, "SELECT team_score FROM users WHERE username='$username'");
            $eee = mysqli_fetch_row($search);
            $old_score = $eee[0];
            $new_score = $old_score + $score;
            mysqli_query($con, "UPDATE users SET team_score=$new_score WHERE username='$username'");


            echo "<script>alert('错了！扣10分！答题结束, 总分数:$score');location.href='../home.php';</script>";
        } else if ($answer == $true) {
            $score += 10;
            echo "<script>alert('正确！得10分！');location.href='youwenbida.php?page=$next_id&class=$class&score=$score';</script>";
        } else {
            $score -= 10;
            echo "<script>alert('错了！扣10分！');location.href='youwenbida.php?page=$next_id&class=$class&score=$score';</script>";
        }
    }
}
