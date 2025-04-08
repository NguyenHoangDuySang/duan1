<?php 
session_start();

require_once './commons/env.php';
require_once './commons/function.php';

// Controllers
require_once './controllers/HomeController.php';

// Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';

// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    '/'                     => (new HomeController())->home(),
    'chi-tiet-san-pham'     => (new HomeController())->chiTietSanPham(),
    'san-pham'              => (new HomeController())->sanPham(),

    // Auth
    'login'                 => (new HomeController())->formLogin(),
    'check-login'           => (new HomeController())->postLogin(),
    'register'              => (new HomeController())->formRegister(),
    'post-register'         => (new HomeController())->postRegister(),

    // Giỏ hàng
    'them-gio-hang'         => (new HomeController())->addGioHang(),
    'gio-hang'              => (new HomeController())->gioHang(),
    'cap-nhat-gio-hang'     => (new HomeController())->capNhatGioHang(),
    'xoa-san-pham'          => (new HomeController())->xoaSanPhamGioHang(),

    // Thanh toán
    'thanh-toan'            => (new HomeController())->thanhToan(),
};
