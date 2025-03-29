<?php 
class AdminDonHangControllers{
    public $modelDonHang;
   
    public function __construct(){

        $this->modelDonHang=new AdminDonHang();
       
    }
    // list
    public function danhSachDonHang(){

        $listDonHang = $this->modelDonHang->getAllDonHang();
        
        require_once './views/donhang/listDonHang.php';
    }

    // detai don hang 

    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];
        
        // lay thong tin don hang o bang don hang 
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // lay danh sach san pham da dat cua don hang o chi tiet don hang 
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        
        require_once './views/donhang/detailDonHang.php';

    }

   

//     // // sua 

    public function formEditDonHang(){
        // ham nay dung de hien thi form nhap 
        // lay ra thong tin cua san pham can sua 
        $id = $_GET['id_don_hang'];
        $donHang= $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
       if($donHang){
        require_once './views/donhang/editDonHang.php';
        deleteSessionError();
       }else{
        header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
        exit();
       }

    }


//    //  sua 
   public function postEditDonHang(){
    // ham nay dung de su ly them du lieu 
    // var_dump('sssform them');
    // kiem tra xem du lieu co phai duoc submit len khong 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // lay ra du lieu 
        // lay ra du lieu cu cua san pham 
        $don_hang_id = $_POST['don_hang_id'] ?? '';
      

        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
        $ghi_chu = $_POST['ghi_chu'] ?? '';
        $trang_thai_id = $_POST['trang_thai_id'] ?? '';
       

        // tao 1 mang trong de chua du lieu 
        $errors = [];
        if (empty($ten_nguoi_nhan)) {
            $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
        }
        if (empty($sdt_nguoi_nhan)) {
            $errors['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được để trống';
        }
        if (empty($email_nguoi_nhan)) {
            $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
        }
        if (empty($dia_chi_nguoi_nhan)) {
            $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
        }
        if (empty($trang_thai_id)) {
            $errors['trang_thai_id'] = 'Trạng thái người nhận phải chọn';
        }
       
        $_SESSION['error'] = $errors;
        //logic sua anh 
       

        // nếu không có lỗi thì tiến hành thêm san pham 
        if (empty($errors)) {
            // neu khong co loi thi tien hanh sua
            // var_dump('okko');
           $this->modelDonHang->updateDonHang(  $don_hang_id,
                                                $ten_nguoi_nhan,
                                                $sdt_nguoi_nhan,
                                                $email_nguoi_nhan,
                                                $dia_chi_nguoi_nhan,
                                                $ghi_chu,
                                                $trang_thai_id
                                              
                                            );
        
           
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }else {
            // tra ve form loi 
            // dat chi thi xoa session sau khi hien thi form 

            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
            exit();

        }
    }

}



// // sua album anh 
// // - sua anh cu 
// //  + them anh moi 
// //  + khong them anh moi 
// // - khong sua anh cu 
// //  + them anh moi 
// //  + khong them anh moi 
// // - xoa anh cu 
// //  + them anh moi 
// //  + khong them anh moi 



// public function postEditAnhSanPham(){
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $san_pham_id = $_POST['san_pham_id'] ?? '';
//         // lay danh anh hien tai cua san pham 
//         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
//         // xu ly cac anh duoc gui tu from 
//         $img_array = $_FILES['img_array'];
//         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
//         // den day 
//         $current_img_ids = $_POST['current_img_ids'] ?? [];

//         // khai bao mamg de luu anh them moi hoac thay the anh cu 
//         $upload_file = [];
//         // upload anh moi hoac thay the anh cu 
//         foreach($img_array['name'] as $key=>$value){
//             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
//                 $new_file = uploadFileAlbum( $img_array,  './uploads/', $key);

//                 if ($new_file) {
//                    $upload_file[] = [
//                     'id' => $current_img_ids[$key] ?? null,
//                     'file' => $new_file
//                    ];
//                 }
//             }
//         }
//         // luu anh moi vao db va xoa anh cu 
//         foreach($upload_file as $file_info){
//             if ($file_info['id']) {
//                $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
               
//                // cap nhap anh cu 
//                $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

//                // xoa anh cu 
//                deleteFile($old_file);

//             }else{
//                 // them anh moi 
//                 $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
//             }
//         }

//         // xu ly xoa anh 

//         foreach($listAnhSanPhamCurrent as $anhSP){
//             $anh_id = $anhSP['id'];
//             if (in_array($anh_id,$img_delete)) {
//                 // xoa anh trong db
//                 $this->modelSanPham->destroyAnhSanPham($anh_id);

//                 // xoa file 
//                 deleteFile($anhSP['link_hinh_anh']);
//             }
//         }
//         header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
//         exit();

//     }
// }



//     public function deleteSanPham(){
//         $id = $_GET['id_san_pham'];
//         $sanPham = $this->modelSanPham->getDetailSanPham($id);

//         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        

//         if ($sanPham) {
//             deleteFile($sanPham['hinh_anh']);
//             $this->modelSanPham->destroySanPham($id); 

//         }
//         if ($listAnhSanPham) {
//             foreach($listAnhSanPham as $key=>$anhSP){
//                 deleteFile($anhSP['link_hinh_anh']);
//                 $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
//             }
//         }

//             header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
//             exit();
       
        
//     }

//     // chi san pham 

//     public function detailSanPham(){
//         // ham nay dung de hien thi form nhap 
//         // lay ra thong tin cua san pham can sua 
//         $id = $_GET['id_san_pham'];

//         $sanPham= $this->modelSanPham->getDetailSanPham($id);

//         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
//        if($sanPham){
//         require_once './views/sanpham/detailSanPham.php';
       
//        }else{
//         header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
//         exit();
//        }

//     }
}
