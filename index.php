<?php 
session_start();
// $act = $_GET['act'] ?? '/';
// if ($act !== 'login' && $act !== 'check-login' && $act !== 'logout') {
//     checkLoginClient(); // chặn quyền truy cập khi đã logout ra
// }
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';



// Route
$act = $_GET['act'] ?? '/';
// if($_GET['act']){
//     $act = $_GET['act'];
// }else{

// }
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route trang chu
    '/'                 => (new HomeController())->home(),

    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'san-pham' => (new HomeController())->sanPham(),
    'lien-he' => (new HomeController())->lienHe(),
    'send-contact' => (new HomeController())->sendContact(),
    'them-binh-luan' => (new HomeController())->themBinhLuan(),
    


    /// route thanh toan
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),




    // route gio hang
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'cap-nhat-gio-hang' => (new HomeController())->capNhatGioHang(),
    'xoa-san-pham' => (new HomeController())->xoaSanPhamGioHang(),




    //  route login
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'dang-ky' => (new HomeController())->dangKy(),
    'tai-khoan' => (new HomeController())->taiKhoanCaNhan(),

   
    

    
};