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

   

//     // // sua 

//     public function formEditSanPham(){
//         // ham nay dung de hien thi form nhap 
//         // lay ra thong tin cua san pham can sua 
//         $id = $_GET['id_san_pham'];
//         $sanPham= $this->modelSanPham->getDetailSanPham($id);
//         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
//         $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
//        if($sanPham){
//         require_once './views/sanpham/editSanPham.php';
//         deleteSessionError();
//        }else{
//         header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
//         exit();
//        }

//     }


//    //  sua 
//    public function postEditSanPham(){
//     // ham nay dung de su ly them du lieu 
//     // var_dump('sssform them');
//     // kiem tra xem du lieu co phai duoc submit len khong 
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         // lay ra du lieu 
//         // lay ra du lieu cu cua san pham 
//         $san_pham_id = $_POST['san_pham_id'] ?? '';
//         // truy van 
//         $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
//         $old_file = $sanPhamOld['hinh_anh']; // lay anh cu de phuc vu sua anh 


//         $ten_san_pham = $_POST['ten_san_pham'] ?? '';
//         $gia_san_pham = $_POST['gia_san_pham'] ?? '';
//         $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
//         $so_luong = $_POST['so_luong'] ?? '';
//         $ngay_nhap = $_POST['ngay_nhap'] ?? '';
//         $danh_muc_id = $_POST['danh_muc_id'] ?? '';
//         $trang_thai = $_POST['trang_thai'] ?? '';
//         $mo_ta = $_POST['mo_ta'] ?? '';

//         $hinh_anh = $_FILES['hinh_anh'] ?? null;

       

//         // tao 1 mang trong de chua du lieu 
//         $errors = [];
//         if (empty($ten_san_pham)) {
//             $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
//         }
//         if (empty($gia_san_pham)) {
//             $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
//         }
//         if (empty($gia_khuyen_mai)) {
//             $errors['gia_khuyen_mai'] = 'Giá khuyến mãi sản phẩm không được để trống';
//         }
//         if (empty($so_luong)) {
//             $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
//         }
//         if (empty($ngay_nhap)) {
//             $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
//         }
//         if (empty($danh_muc_id)) {
//             $errors['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
//         }
//         if (empty($trang_thai)) {
//             $errors['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
//         }
       
//         $_SESSION['error'] = $errors;
//         //logic sua anh 
//         if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
//             // up load anh moi len 
//             $new_file = uploadFile($hinh_anh, './uploads/');

//             if (!empty($old_file)) { // neu co anh cu thi xoa di 
//                 deleteFile($old_file);
//             }
//         }else{
//             $new_file = $old_file;
//         }

//         // nếu không có lỗi thì tiến hành thêm san pham 
//         if (empty($errors)) {
//             // neu khong co loi thi tien hanh them san pham
//             // var_dump('okko');
//            $this->modelSanPham->updateSanPham(
//                                                 $san_pham_id,
//                                                 $ten_san_pham,
//                                                 $gia_san_pham,
//                                                 $gia_khuyen_mai,
//                                                 $so_luong,
//                                                 $ngay_nhap,
//                                                 $danh_muc_id,
//                                                 $trang_thai,
//                                                 $mo_ta,
//                                                 $new_file
//                                             );
        
           
//             header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
//             exit();
//         }else {
//             // tra ve form loi 
//             // dat chi thi xoa session sau khi hien thi form 

//             $_SESSION['flash'] = true;
//             header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
//             exit();

//         }
//     }

// }

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
