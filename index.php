<?php 
session_start();
// $act = $_GET['act'] ?? '/';
// if ($act !== 'login' && $act !== 'check-login' && $act !== 'logout') {
//     checkLoginAdmin(); // chặn quyền truy cập khi đã logout ra
// }
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';


// Route
$act = $_GET['act'] ?? '/';
if($_GET['act']){
    $act = $_GET['act'];
}else{

}
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route trang chu
    '/'                 => (new HomeController())->home(),

    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    //  route 
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    

    
};