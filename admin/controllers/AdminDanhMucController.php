<?php

class AdminDanhMucController{
    public $modelDanhMuc;
    public function __construct(){
        $this ->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this -> modelDanhMuc ->getAllDanhMuc();
       require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
        // ham nay dung de hien thi form nhap
        // var_dump('Form them');
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc(){
        // ham nay dung de xu ly them du lieu

        // kiem tra xem du lieu  co phai duoc submit len  khong
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lay ra du lieu 
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $Mo_ta = $_POST['Mo_ta'];
            // tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // neu khong co loi thi tien hanh them danh muc
            if (empty($errors)) {
                // neu khong co loi thi tien hanh them danh muc
                //
                $this ->modelDanhMuc ->insertDanhMuc($ten_danh_muc, $Mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                // tra form va loi
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }

    public function formEditDanhMuc(){
        // ham nay dung de hien thi form nhap
       // lay ra thong tin cua danh muc can sua
       $id = $_GET['id_danh_muc'];
       $danhMuc = $this -> modelDanhMuc -> getDetailDanhMuc($id);
       if ($danhMuc) {
        require_once './views/danhmuc/editDanhMuc.php';
       
       } else{
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
       }
        
    }
    public function postEditDanhMuc(){
        // ham nay dung de xu ly them du lieu

        // kiem tra xem du lieu  co phai duoc submit len  khong
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lay ra du lieu 
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $Mo_ta = $_POST['Mo_ta'];
            // tao 1 mang trong de chua du lieu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            // neu khong co loi thi tien hanh sua danh muc
            if (empty($errors)) {
                // neu khong co loi thi tien hanh sua danh muc
                //
                $this ->modelDanhMuc ->updateDanhMuc($id, $ten_danh_muc, $Mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                // tra form va loi
                $danhMuc = ['id' => $id ,'ten_danh_muc' => $ten_danh_muc , 'Mo_ta' => $Mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }
    // ham xoa danh muc
    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this -> modelDanhMuc -> getDetailDanhMuc($id);
        if ($danhMuc) {
            $this ->modelDanhMuc ->destroyDanhMuc($id);
           
           }
           header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
           exit();
    }
}