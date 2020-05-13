<?php
session_start();
unset($_SESSION['login']);
session_destroy();

echo "<script>alert('注销成功');window.location.href='index.php';</script>";