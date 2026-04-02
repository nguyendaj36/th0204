<?php
require 'db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Băm mật khẩu bằng BCRYPT
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $message = "<div class='message success'>Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a></div>";
    } else {
        $message = "<div class='message'>Tên người dùng đã tồn tại!</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng Ký</h2>
        <?php echo $message; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Tên người dùng</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
        </form>
        <a href="login.php" class="link">Đã có tài khoản? Đăng nhập</a>
    </div>
</body>
</html>