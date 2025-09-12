<?php

session_start();

$servername = "localhost";
$db_username = "loginer";
$db_password = "0pjO6N11CVFl";
$db_name = "MEDICAL_DB";
$secret = "";
// 正式環境需隱藏

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "connection failed:" . $e->getMessage();
}

$username = $_POST['username'];
$password = $_POST['password'];
$passwordHash = hash('sha256', $password . $secret);

$sql = "SELECT * FROM Accounts WHERE userName = ? AND passwordHash = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([$username, $passwordHash]);
$result = $stmt->fetch(PDO::FETCH_OBJ);

if ($result) {
    echo "登入成功，3秒後自動跳轉首頁...";
    $_SESSION["id"] = $result->id;
    $_SESSION["userName"] = $result->userName;
    $_SESSION["isStaff"] = $result->isStaff;
    $_SESSION["defaultPassword"] = $result->defaultPassword;
    echo '<script>
        setTimeout(function(){
            window.location.href = "/index.php"
        }, 3000);
    </script>';
} else {
    echo "登入失敗<br>";
    echo "<a href='/index.php'>回首頁</a>";
}
