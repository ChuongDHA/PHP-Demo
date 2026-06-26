<?php
// Khởi tạo các biến lỗi và mảng lưu dữ liệu profile
$error = "";
$profile = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu và loại bỏ khoảng trắng thừa
    $hoTen = isset($_POST['hoTen']) ? trim($_POST['hoTen']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $nganhHoc = isset($_POST['nganhHoc']) ? trim($_POST['nganhHoc']) : '';
    $kyNangChuoi = isset($_POST['kyNang']) ? trim($_POST['kyNang']) : '';

    // --- VALIDATE DỮ LIỆU ---
    if (empty($hoTen) || empty($nganhHoc) || empty($kyNangChuoi)) {
        $error = "Vui lòng nhập đầy đủ tất cả các trường thông tin!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không đúng định dạng hợp lệ!";
    } else {
        // --- XỬ LÝ CHUỖI THÀNH MẢNG BẰNG EXPLODE ---
        // Dùng explode để tách chuỗi kỹ năng theo dấu phẩy
$mangKyNangRaw = explode(",", $kyNangChuoi);

// Loại bỏ khoảng trắng thừa ở đầu/cuối của từng kỹ năng trong mảng
$mangKyNang = array_map('trim', $mangKyNangRaw);
        // Lọc bỏ các phần tử rỗng nếu người dùng gõ dư dấu phẩy (ví dụ: PHP, CSS, )
        $mangKyNang = array_filter($mangKyNang); 

        // Lưu thông tin hợp lệ vào mảng profile để sẵn sàng hiển thị
        $profile = [
            'hoTen' => $hoTen,
            'email' => $email,
            'nganhHoc' => $nganhHoc,
            'kyNang' => $mangKyNang
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Profile App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }
        .container {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 400px;
            box-sizing: border-box;
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
        .form-group input, .form-group placeholder {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .note {
            font-size: 12px;
            color: #777;
            margin-top: 3px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }
        /* Style cho Profile Card */
        .profile-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
            width: 400px;
            box-sizing: border-box;
        }
        .profile-card h3 {
            margin-top: 0;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
            text-align: center;
        }
        .profile-info {
            margin: 12px 0;
            font-size: 15px;
        }
        .profile-info strong {
            color: #f8f9fa;
        }
        .badge-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }
        .badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tạo Mini Profile</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="hoTen" value="<?php echo isset($hoTen) ? htmlspecialchars($hoTen) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Ngành học</label>
                <input type="text" name="nganhHoc" value="<?php echo isset($nganhHoc) ? htmlspecialchars($nganhHoc) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Kỹ năng</label>
                <input type="text" name="kyNang" placeholder="Ví dụ: HTML, CSS, PHP, Git" value="<?php echo isset($kyNangChuoi) ? htmlspecialchars($kyNangChuoi) : ''; ?>">
                <div class="note">* Phân tách các kỹ năng bằng dấu phẩy (,)</div>
            </div>
            <button type="submit">Xuất Profile Card</button>
        </form>
    </div>

    <?php if ($profile !== null): ?>
        <div class="profile-card">
            <h3>💳 MEMBER PROFILE CARD</h3>
            <div class="profile-info">
                <strong>Họ tên:</strong> <?php echo htmlspecialchars($profile['hoTen']); ?>
            </div>
            <div class="profile-info">
                <strong>Email:</strong> <?php echo htmlspecialchars($profile['email']); ?>
            </div>
            <div class="profile-info">
                <strong>Ngành học:</strong> <?php echo htmlspecialchars($profile['nganhHoc']); ?>
            </div>
            <div class="profile-info">
                <strong>Kỹ năng chuyên môn:</strong>
                <div class="badge-container">
                    <?php foreach ($profile['kyNang'] as $skill): ?>
                        <span class="badge"><?php echo htmlspecialchars($skill); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>