<?php
class AdminTaiKhoanControllers{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct(){
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    // list danh sach admin

    public function danhSachAdmin(){
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    // add quan tri

    public function fromAddQuanTri(){
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
        
    }

    //  
    
    public function postAddQuanTri(){
        // ham nay dung de su ly them du lieu 
        // var_dump('sssform them');
        // kiem tra xem du lieu co phai duoc submit len khong 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu 
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];

            // tao 1 mang trong de chua du lieu 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ và tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            
            $_SESSION['error'] = $errors;
            // nếu không có lỗi thì tiến hành thêm tai khoan  
            if (empty($errors)) {
                // neu khong co loi thi tien hanh them tai khoan
                // var_dump('okko');

                // dat tai khoan mac dinh    sang2004@
                $password = password_hash('sang2004', PASSWORD_BCRYPT);

                // khai bao chuc vu 
                $chuc_vu_id = 1; 
                //  var_dump($password);die;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $so_dien_thoai, $password, $chuc_vu_id);

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            }else {
                // tra ve form loi 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();

            }
        }

    }

    // sua admin 

    public function fromEditQuanTri(){
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        // var_dump($quanTri);die;
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    /// 

    public function postEditQuanTri(){
        // ham nay dung de su ly them du lieu 
        // var_dump('sssform them');
        // kiem tra xem du lieu co phai duoc submit len khong 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu 
            // lay ra du lieu cu cua san pham 
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
          
    
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
           
    
            // tao 1 mang trong de chua du lieu 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
           
            $_SESSION['error'] = $errors;
            //logic sua anh 
           
    
            // nếu không có lỗi thì tiến hành thêm san pham 
            if (empty($errors)) {
                // neu khong co loi thi tien hanh sua
                // var_dump('okko');
               $this->modelTaiKhoan->updateTaiKhoan(  $quan_tri_id,
                                                    $ho_ten,
                                                    $email,
                                                    $so_dien_thoai,
                                                    $trang_thai
                                                    
                                                  
                                                );
            
               
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            }else {
                // tra ve form loi 
                // dat chi thi xoa session sau khi hien thi form 
    
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
    
            }
        }
    
    }

    /// resetPassword 

    public function resetPassword(){
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
         // dat tai khoan mac dinh    Sang2004
         $password = password_hash('Sang2004', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if ($status && $tai_khoan['chuc_vu_id'] == 1 ) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }elseif($status && $tai_khoan['chuc_vu_id'] == 2 ){
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        }else {
            var_dump('Lỗi khi reset tai khoan');die;
        }
    }

    // list danh sach client

    public function danhSachKhachHang(){
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }


    // sua admin 

    public function fromEditKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die;
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }

    /// 
     /// 

     public function postEditKhachHang(){
        // ham nay dung de su ly them du lieu 
        // var_dump('sssform them');
        // kiem tra xem du lieu co phai duoc submit len khong 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu 
            // lay ra du lieu cu cua san pham 
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
          
    
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
           
    
            // tao 1 mang trong de chua du lieu 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
           
            $_SESSION['error'] = $errors;
            //logic sua anh 
           
    
            // nếu không có lỗi thì tiến hành thêm san pham 
            if (empty($errors)) {
                // neu khong co loi thi tien hanh sua
                // var_dump('okko');
               $this->modelTaiKhoan->updateKhachHang(  $khach_hang_id,
                                                    $ho_ten,
                                                    $email,
                                                    $so_dien_thoai,
                                                    $ngay_sinh,
                                                    $gioi_tinh,
                                                    $dia_chi,
                                                    $trang_thai
                                                      
                                                );
            
               
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            }else {
                // tra ve form loi 
                // dat chi thi xoa session sau khi hien thi form 
    
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
    
            }
        }
    
    }

    /// chi tiet khach hang detailKhachHang

    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    /// login 
    public function formLogin(){
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }

    ///
    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // lay email va mat khau gui len tu form 
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email); die;
            // xu ly kiem tra thong tin dang nhap 
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) {  /// dang nhap thanh cong 
                // luu thong tin vao session
                $_SESSION['user_admin']  = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                // neu ma loi thi luu loi vao session 
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;
                
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();

            }

        }
    }

    /// logout  adnin

    public function logout(){
            if(isset($_SESSION['user_admin'])){
                unset($_SESSION['user_admin']);
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
        public function formEditCaNhanQuanTri(){
            $email=$_SESSION['user_admin'];
            $thongTin=$this->modelTaiKhoan->getTaiKhoanFromEmail($email);
            require_once './views/taikhoan/canhan/editCaNhan.php';
            deleteSessionError();
        }

        public function postEditMatKhauCaNhan(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $old_pass=$_POST['old_pass'];
                $new_pass=$_POST['new_pass'];
                $confirm_pass=$_POST['confirm_pass'];


                $user=$this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
                $checkPass=password_verify($old_pass, $user['mat_khau']);
                $errors=[];

                if (!$checkPass) {
                    $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
                }
                
                if ($new_pass !== $confirm_pass) {
                    $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
                }
                
                if (empty($old_pass)) {
                    $errors['old_pass'] = 'Vui lòng điền trường dữ liệu này';
                }
                
                if (empty($new_pass)) {
                    $errors['new_pass'] = 'Vui lòng điền trường dữ liệu này';
                }
                
                if (empty($confirm_pass)) {
                    $errors['confirm_pass'] = 'Vui lòng điền trường dữ liệu này';
                }
                
                $_SESSION['error'] = $errors;
                
                if (!$errors) {
                    // Thực hiện đổi mật khẩu
                    $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                    $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                    if ($status) {
                        $_SESSION['success'] = 'Đã đổi mật khẩu thành công';
                        $_SESSION['flash'] = true;
                        header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                    } else {
                        // Lỗi thì lưu vào session
                        $_SESSION['flash'] = true;
                        header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                        exit();
                    }
                } else {
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                }                
            }
        }
        public function dangKy(){
            require_once './views/auth/formLogin.php';
        }


        ////

       
public function baoCaoThongKe() {
    // Doanh thu
    $totalRevenue = $this->modelDonHang->getTongDoanhThu();

    // Tổng đơn hàng
    $totalOrders = $this->modelDonHang->getTongSoDonHang();

    // Đơn hàng thành công
    $completedOrders = $this->modelDonHang->getTongDonHangTheoTrangThai(9);

    // Đơn hàng bị hủy
    $completedOrdersCancelled = $this->modelDonHang->getTongDonHangTheoTrangThai(11);

    // Số khách hàng đã mua hàng
    $countUniqueBuyers = $this->modelDonHang->getSoLuongKhachHangMuaHang();

    // Top sản phẩm bán chạy
    $topProducts = $this->modelSanPham->getTopSanPhamBanChay(5);

    // Load view
    require_once './views/home.php';
}



}
?>