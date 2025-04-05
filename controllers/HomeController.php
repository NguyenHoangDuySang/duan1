<?php 

class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public function __construct(){
      $this->modelSanPham = new SanPham();
      $this->modelTaiKhoan = new TaiKhoan();
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
   
}