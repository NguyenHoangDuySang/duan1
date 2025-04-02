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
         // dat tai khoan mac dinh    sang2004@
         $password = password_hash('sang2004', PASSWORD_BCRYPT);

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


}
?>