<?php 

class HomeController
{

    public $modelSanPham;
    public function __construct(){
      $this->modelSanPham = new SanPham();
    }

    public function home() {
        echo "Nguyen Hoang Duy Sang dự án 1";
    }
    public function trangChu(){
        echo "day la trang chu ok";
    }
    public function danhSachSanPham(){
        // echo "danh sach san pham ok";
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/listProduct.php';
    }
}