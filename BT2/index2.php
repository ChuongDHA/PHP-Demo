<?php
// 1. Tạo mảng khóa học (Mảng chỉ số)
$khoaHoc = ["HTML", "CSS", "JavaScript", "PHP"];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            padding: 40px;
        }
        .box-khoa-hoc {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            margin-top: 0;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #444;
        }
        .dang-hoc {
            color: #ff9800;
            font-weight: bold;
            font-style: italic;
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <div class="box-khoa-hoc">
        <h2>Danh sách khóa học</h2>
        
        <<ul>
            <?php foreach ($khoaHoc as $tenKhoaHoc): ?>
                <li>
                    <?php 
                    echo $tenKhoaHoc; 

                    // 3. Nếu tên khóa học là PHP, thêm chữ "Đang học"
                    if ($tenKhoaHoc === "PHP") {
                        echo '<span class="dang-hoc"> - (Đang học)</span>';
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>
</html>