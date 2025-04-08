<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập người dùng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .back-home {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .back-home:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .login-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #5a67d8;
        }

        .login-container .form-group {
            margin-bottom: 20px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 15px;
            background-color: #f0f4ff;
        }

        .login-container input:focus {
            border-color: #5a67d8;
            outline: none;
            box-shadow: 0 0 10px rgba(90, 103, 216, 0.2);
        }

        .login-container .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .login-container .btn:hover {
            background: linear-gradient(to right, #5a67d8, #6b46c1);
            box-shadow: 0 8px 20px rgba(90, 103, 216, 0.3);
        }

        .login-container .extra {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container .extra a {
            color: #764ba2;
            text-decoration: none;
        }

        .social-login {
            margin-top: 30px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: white;
        }

        .btn-facebook:hover {
            background-color: #2d4373;
        }

        .btn-google {
            background-color: #dd4b39;
            color: white;
        }

        .btn-google:hover {
            background-color: #c23321;
        }

        .social-btn i {
            font-size: 18px;
        }
    </style>
</head>
<body>

<a class="back-home" href="<?= BASE_URL ?>">← Quay lại trang chủ</a>

<div class="login-container">
    <h2>Đăng nhập người dùng</h2>
    <h5 class="text-center text-muted mb-3">Chào mừng trở lại!</h5>

    <?php if (isset($_SESSION['error'])) { ?>
        <div class="text-danger text-center"><?= $_SESSION['error'] ?></div>
    <?php } else { ?>
        <div class="text-center mb-3 text-muted">Vui lòng đăng nhập để tiếp tục!</div>
    <?php } ?>

    <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
        <div class="form-group">
            <input type="email" placeholder="Email của bạn" name="email" required />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Mật khẩu" name="password" required />
        </div>
        <button class="btn" type="submit">Đăng nhập</button>
    </form>

    <div class="extra">
        <a href="#">Quên mật khẩu?</a>
    </div>

    <div class="social-login">
        <p class="text-center mt-4 mb-2">Hoặc đăng nhập bằng</p>
        <button class="social-btn btn-facebook"><i class="fab fa-facebook-f"></i> Đăng nhập bằng Facebook</button>
        <button class="social-btn btn-google"><i class="fab fa-google-plus-g"></i> Đăng nhập bằng Google</button>
    </div>
</div>

</body>
</html>
