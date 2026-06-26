<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Nhiều Trang - PHP Include</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 40px 30px;
            flex: 1;
        }
        footer {
            background-color: #343a40;
            color: #ccc;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">MyWebsite 🚀</div>
        <nav>
            <a href="index4.php">Trang chủ</a>
            <a href="about4.php">Giới thiệu</a>
        </nav>
    </header>

    <div class="content">