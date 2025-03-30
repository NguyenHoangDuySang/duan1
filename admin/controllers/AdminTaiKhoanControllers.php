<?php
class AdminTaiKhoanControllers{
    public $modelTaiKhoan;

    public function __construct(){
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    // list danh sach 

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

    // sua 

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


}
?>