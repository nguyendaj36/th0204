<?php
session_start();
require 'db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        
        // So sánh mật khẩu đã nhập với mật khẩu băm trong DB
        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            $message = "<div class='message'>Đăng nhập thất bại: Sai mật khẩu!</div>";
        }
    } else {
        $message = "<div class='message'>Đăng nhập thất bại: Tài khoản không tồn tại!</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng Nhập</h2>
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
            <button type="submit" class="btn">Đăng Nhập</button>
        </form>
        <a href="register.php" class="link">Chưa có tài khoản? Đăng ký ngay</a>
    </div>
</body>
</html>