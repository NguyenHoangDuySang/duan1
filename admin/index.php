<?php 

session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/AdminDanhMucControllers.php';
require_once 'controllers/AdminSanPhamControllers.php';
require_once 'controllers/AdminDonHangControllers.php';
require_once 'controllers/AdminDashboardController.php';
require_once 'controllers/AdminTaiKhoanControllers.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards 
    // '/'                 => (new DashboardController())->index(),

    // Route bao cao thong ke => trang chu 
    '/' => (new AdminDashboardController())->home(),

    // Route danh muc 
    'danh-muc' => (new AdminDanhMucControllers())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucControllers())->formAllDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucControllers())->postAllDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucControllers())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucControllers())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucControllers())->deleteDanhMuc(),


    // Route san pham 
     'san-pham' => (new AdminSanPhamControllers())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamControllers())->formAllSanPham(),
    'them-san-pham' => (new AdminSanPhamControllers())->postAllSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamControllers())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamControllers())->postEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamControllers())->postEditAnhSanPham(),
    'xoa-san-pham' => (new AdminSanPhamControllers())->deleteSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamControllers())->detailSanPham(),


     // Route don hang
     'don-hang' => (new AdminDonHangControllers())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangControllers())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangControllers())->postEditDonHang(),
    // 'xoa-don-hang' => (new AdminDonHangControllers())->deleteDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangControllers())->detailDonHang(),


     // Route tai khoan 
       // tai khoan admin 
       'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanControllers())->danhSachAdmin(),
       'form-them-quan-tri' =>(new AdminTaiKhoanControllers())->fromAddQuanTri(),
       'them-quan-tri' =>(new AdminTaiKhoanControllers())->postAddQuanTri(),
       'form-sua-quan-tri' =>(new AdminTaiKhoanControllers())->fromEditQuanTri(),
       'sua-quan-tri' =>(new AdminTaiKhoanControllers())->postEditQuanTri(),




};