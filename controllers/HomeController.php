<?php 

class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public function __construct(){
      $this->modelSanPham = new SanPham();
      $this->modelTaiKhoan = new TaiKhoan();
      $this->modelGioHang = new GioHang();
    }

    public function home() {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
   /// chi tiet san pham client
   public function chiTietSanPham(){
            $id = $_GET['id_san_pham'];

            $sanPham= $this->modelSanPham->getDetailSanPham($id);

            $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

            $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

            $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

            // var_dump($listSanPhamCungDanhMuc);die;
            
            
        if($sanPham){
            require_once './views/detailSanPham.php';
        
        }else{
            header("Location: " . BASE_URL );
            exit();
        }

   }

   ///

   /// login 
   public function formLogin(){
    require_once './views/auth/formLogin.php';
    deleteSessionError();
}

///
public function postLogin(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // lay email va mat khau gui len tu form 
        $email = $_POST['email'];
        $password = $_POST['password'];

        // var_dump($email); die;
        // xu ly kiem tra thong tin dang nhap 
        $user = $this->modelTaiKhoan->checkLogin($email, $password);

        if ($user == $email) {  /// dang nhap thanh cong 
            // luu thong tin vao session
            $_SESSION['user_client']  = $user;
            header("Location: " . BASE_URL );
            exit();
        } else {
            // neu ma loi thi luu loi vao session 
            $_SESSION['error'] = $user;

            $_SESSION['flash'] = true;
            
            header("Location: " . BASE_URL . '?act=login');
            exit();

        }

    }
}

/// logout  adnin

public function addGioHang(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // lay du lieu gio hang cua nguoi dung 
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id'=>$gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];

            $checkSanPham = false;
            foreach($chiTietGioHang as $detail){
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                    break;
                }
            }
            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }

            header("Location: " . BASE_URL . '?act=gio-hang');
            exit();

        }else{
            var_dump('chua dang nhap');die;
        }
       
       
    }
}


////

public function gioHang(){
    if (isset($_SESSION['user_client'])) {
        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        // lay du lieu gio hang cua nguoi dung 
        // var_dump($mail['id']);die;
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if (!$gioHang) {
            $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
            $gioHang = ['id'=>$gioHangId];
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

        }else{
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }
        // var_dump($chiTietGioHang);die;

        require_once './views/gioHang.php';

    }else{
        var_dump('chua dang nhap');die;
    }
   
}

// cap nhat gio hang 
public function capNhatGioHang() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            $soLuongs = $_POST['so_luong'] ?? [];

            foreach ($soLuongs as $sanPhamId => $soLuong) {
                if ($soLuong <= 0) {
                    // Xóa sản phẩm khỏi giỏ nếu số lượng <= 0
                    $this->modelGioHang->xoaSanPham($gioHang['id'], $sanPhamId);
                } else {
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $sanPhamId, $soLuong);
                }
            }

            header("Location: " . BASE_URL . "?act=gio-hang");
            exit();
        }
    }
}

////

public function xoaSanPhamGioHang() {
    if (isset($_SESSION['user_client'])) {
        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        $san_pham_id = $_GET['san_pham_id'];
        $this->modelGioHang->xoaSanPham($gioHang['id'], $san_pham_id);

        header("Location: " . BASE_URL . "?act=gio-hang");
        exit();
    }
}



/////
public function sanPham() {
    $listSanPham = $this->modelSanPham->getAllSanPham(); // Get all products
    require_once './views/sanPham.php'; // Load the product page view
}



   
}