<?php
require_once("../db.php");
session_start();
if($_SESSION["login"] == false || !(isset($_SESSION["login"]))) {
    echo "<script>alert('无权访问, 请登录!')</script>";
    echo "<script>window.location.href='index.php'</script>";
}

$all = mysqli_num_rows(mysqli_query($con,"select * from $db_name"));
$class = $_GET["class"];

$length=1;                             //每页显示的数量
@$page=$_GET['page']?$_GET['page']:1;    //当前页
$offset=($page-1)*$length;              //每页起始行编号
$all_page = ceil($all/$length);            //所有的页数-总数页
$pre_page=$page-1;                       //上一页       
if($page==1){
    $pre_page=1;
    }
$next_page=$page+1;
if($page==$all_page){
    $next_page=$all_page;
    }
$sql="select * from questions where class_id in($class) order by id ASC limit {$offset},{$length}";
$rest=mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($rest)) {
        $id = $row["id"];
        $title = $row["title"];
        $A = $row["answer_a"];
        $B = $row["answer_b"];
        $C = $row["answer_c"];
        $D = $row["answer_d"];
        $true_answer = $row["true_answer"];
        $score = $row["score"];
    }

if($page == 1) {
    $score = 0;
} else {
    $score = $_GET['score'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>有问必答-第二组</title>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style_must_answer.css">
</head>
<body onload="Answer.timing()">

    <div class="container">

        <div class="team">
            <h2>第二队</h2>
        </div>

        <div class="point">
            <h3>分数:<?php echo $score; ?></h3>
        </div>

        <div class="question">
            <h1>第<?php echo $class; ?>组第<?php echo $page; ?>题</h1>
            <h1><?php echo $title; ?></h1>

            <div class="answer">
                <form id="question" action="check.php" method="GET">
                    <div class="list-group">
                        <label class="radio-inline">
                            <input type="radio"  value="A" name="answer">
                            <li class="list-group-item">
                                A.<?php echo $A; ?>
                            </li>
                        </label> <br /><br />
                        <label class="radio-inline">
                            <input type="radio"  value="B" name="answer">
                            <li class="list-group-item">
                                B.<?php echo $B; ?>
                            </li>
                        </label> <br /><br />
                        <label class="radio-inline">
                            <input type="radio"  value="C" name="answer">
                            <li class="list-group-item">
                                C.<?php echo $C; ?>
                            </li>
                        </label> <br /><br />
                        <label class="radio-inline">
                            <input type="radio"  value="D" name="answer">
                            <li class="list-group-item">
                                D.<?php echo $D; ?>
                            </li>
                        </label> <br /><br />
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="page" value="<?php echo $page;?>">
                        <input type="hidden" name="class" value="<?php echo $class;?>">
                        <input type="hidden" name="score" value="<?php echo $score;?>">
                    </div>

                    <input type="submit" class="btn btn-default btn-success" style="margin-left: 25%; width: 200px;">
                </form>
            </div>
        </div>

        <div class="time">
            <h1 id="time" style="font-size: 100px;"></h1>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/must_answer.js"></script>
</body>
</html>