<?php
// 1. Khai báo các biến thông tin sinh viên
$hoTen = "Dương Hoàng Anh Chương";
$tuoi = 19;
$nganhHoc = "Công nghệ thông tin";
$email = "anhchuongcm2022@example.com";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chào sinh viên</title>
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
        .student-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 350px;
            border-top: 5px solid #007bff;
        }
        .student-card h2 {
            margin-top: 0;
            color: #333;
        }
        .info-group {
            margin-bottom: 10px;
            color: #555;
        }
        .info-label {
            font-weight: bold;
        }
        .status {
            margin-top: 15px;
            padding: 10px;
            background-color: #e2f0d9;
            color: #385723;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="student-card">
        <h2>Thông tin sinh viên</h2>
        <hr>
        <div class="info-group">
            <span class="info-label">Họ và tên:</span> <?php echo $hoTen; ?>
        </div>
        <div class="info-group">
            <span class="info-label">Tuổi:</span> <?php echo $tuoi; ?>
        </div>
        <div class="info-group">
            <span class="info-label">Ngành học:</span> <?php echo $nganhHoc; ?>
        </div>
        <div class="info-group">
            <span class="info-label">Email:</span> <?php echo $email; ?>
        </div>

        <?php if ($tuoi >= 18): ?>
            <div class="status">
                Đủ tuổi học đại học
            </div>
        <?php endif; ?>
    </div>

</body>
</html>