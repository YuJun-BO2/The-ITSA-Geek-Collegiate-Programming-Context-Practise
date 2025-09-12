<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["userName"])) {
    if ($_SESSION["defaultPassword"]) {
        echo "<a href='/changePassword'>請點此前往更改您的預設密碼<a>";
    } else {
        echo "<h1>歡迎您，" . $_SESSION['userName'] . "</h1>";
        echo "<a class='btn' href='#'>登出</a>
            <a class='btn' href='#'>變更密碼</a><br>";
        echo "<h2>功能列表</h2>";
        if ($_SESSION["isStaff"]) {
            echo "<a class='btn' href='#'>管理人員名冊</a>
            <a class='btn' href='#'>管理醫檢項目</a>
            <a class='btn' href='#'>管理檢查結果</a>
            ";
        }
    }
} else {
    echo "您尚未登入<br>";
    echo "<a href='/login'>按此前往登入</a>";
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>健康度量管理系統</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- <a href="/login">前往登入</a> -->
</body>

</html>