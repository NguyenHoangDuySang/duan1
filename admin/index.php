<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/AdminDanhMucControllers.php';
// require_once 'controllers/AdminSanPhamControllers.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
// require_once './models/AdminSanPham.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    // '/'                 => (new DashboardController())->index(),
    // Route danh muc 
    'danh-muc' => (new AdminDanhMucControllers())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucControllers())->formAllDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucControllers())->postAllDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucControllers())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucControllers())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucControllers())->deleteDanhMuc(),
    
};