<?php 
class AdminDanhMucControllers{
    public $modelDanhMuc;
    public function __construct(){

        $this->modelDanhMuc=new AdminDanhMuc();
    }
    // list
    public function danhSachDanhMuc(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        
        require_once './views/danhmuc/listDanhMuc.php';
    }

    // add  
    public function formAllDanhMuc(){
        // ham nay dung de hien thi form nhap 
        // var_dump('form them');
        require_once './views/danhmuc/addDanhMuc.php';

    }

    public function postAllDanhMuc(){
        // ham nay dung de su ly them du lieu 
        // var_dump('sssform them');
        // kiem tra xem du lieu co phai duoc submit len khong 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu 
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tao 1 mang trong de chua du lieu 
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // nếu không có lỗi thì tiến hành thêm danh mục  
            if (empty($errors)) {
                // neu khong co loi thi tien hanh them danh muc 
                // var_dump('okko');
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else {
                // tra ve form loi 
                require_once './views/danhmuc/addDanhMuc.php';

            }
        }

    }

    // sua 

    public function formEditDanhMuc(){
        // ham nay dung de hien thi form nhap 
        // lay ra thong tin cua danh muc can sua 
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        
       if($danhMuc){
        require_once './views/danhmuc/editDanhMuc.php';
       }else{
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
       }

    }

    public function postEditDanhMuc(){
        // ham nay dung de su ly them du lieu 
        // var_dump('sssform them');
        // kiem tra xem du lieu co phai duoc submit len khong 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu 
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tao 1 mang trong de chua du lieu 
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // nếu không có lỗi thì tiến hành sua danh mục  
            if (empty($errors)) {
                // neu khong co loi thi tien hanh sua danh muc 
                // var_dump('okko');
                $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else {
                // tra ve form loi 
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';

            }
        }

    }
    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
       
        
    }
}
