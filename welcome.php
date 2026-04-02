<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập thì đẩy về trang login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chào mừng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="width: 400px; text-align: center;">
        <h2 class="success">Đăng nhập thành công!</h2>
        <p>Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Chào mừng bạn đến với hệ thống.</p>
        <a href="logout.php" class="btn" style="background: #d9534f; margin-top: 15px; display: inline-block; width: auto;">Đăng xuất</a>
    </div>
</body>
</html>