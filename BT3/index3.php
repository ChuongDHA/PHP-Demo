<?php
// Khởi tạo các biến chứa thông báo lỗi và thành công
$error = "";
$success = "";

// Kiểm tra nếu người dùng nhấn nút gửi dữ liệu (Gửi dữ liệu bằng POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Lấy dữ liệu từ form và cắt bỏ khoảng trắng thừa
    $hoTen = isset($_POST['hoTen']) ? trim($_POST['hoTen']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $matKhau = isset($_POST['matKhau']) ? $_POST['matKhau'] : '';

    // --- KIỂM TRA ĐIỀU KIỆN (VALIDATE) ---
    if (empty($hoTen)) {
        $error = "Họ tên không được để trống!";
    } 
    // Kiểm tra định dạng email hợp lệ
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không đúng định dạng hợp lệ!";
    } 
    // Kiểm tra mật khẩu ít nhất 6 ký tự
    elseif (strlen($matKhau) < 6) {
        $error = "Mật khẩu phải có ít nhất 6 ký tự!";
    } 
    // Nếu tất cả đều hợp lệ
    else {
        // Khi hiển thị dữ liệu người dùng, sử dụng htmlspecialchars để bảo mật chống XSS
        $hoTenSafe = htmlspecialchars($hoTen);
        $emailSafe = htmlspecialchars($email);
        
        $success = "Đăng ký thành công!<br>Chào mừng thành viên: <strong>$hoTenSafe</strong> ($emailSafe)";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký Cơ Bản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #218838;
        }
        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Đăng Ký Hệ Thống</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="hoTen">Họ và tên</label>
                <input type="text" id="hoTen" name="hoTen" value="<?php echo isset($hoTen) ? htmlspecialchars($hoTen) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="matKhau">Mật khẩu</label>
                <input type="password" id="matKhau" name="matKhau">
            </div>

            <button type="submit">Đăng ký</button>
        </form>
    </div>

</body>
</html>