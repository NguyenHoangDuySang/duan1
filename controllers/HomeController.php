<?php 

class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public function __construct(){
      $this->modelSanPham = new SanPham();
      $this->modelTaiKhoan = new TaiKhoan();
      $this->modelGioHang = new GioHang();
      $this->modelDonHang = new DonHang();
    }

    public function home() {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
   /// chi tiet san pham client
   public function chiTietSanPham() {
    $id = $_GET['id_san_pham'];

    // Lấy thông tin chi tiết sản phẩm và bình luận
    $listSanPham = $this->modelSanPham->getAllSanPham();
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

    // Kiểm tra nếu sản phẩm tồn tại
    if ($sanPham) {
        require_once './views/detailSanPham.php';  // Tải view chi tiết sản phẩm
    } else {
        header("Location: " . BASE_URL);
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




public function addGioHang() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];

            // ✅ Lấy thông tin sản phẩm để kiểm tra tồn kho và trạng thái
            $sanPham = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $soLuongTonKho = $sanPham['so_luong'];

            // ✅ Kiểm tra nếu sản phẩm đã ngừng bán thì không cho thêm
            if ($sanPham['trang_thai'] == 0) {
                $_SESSION['error'] = "Sản phẩm đã ngừng bán, không thể thêm vào giỏ hàng!";
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=$san_pham_id");
                exit();
            }

            // ✅ Kiểm tra nếu sản phẩm hết hàng thì không cho thêm
            if ($soLuongTonKho <= 0) {
                $_SESSION['error'] = "Sản phẩm này đã hết hàng!";
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=$san_pham_id");
                exit();
            }

            // ✅ Tính tổng số lượng hiện tại trong giỏ + số lượng mới muốn thêm
            $soLuongHienTaiTrongGio = 0;
            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $soLuongHienTaiTrongGio = $detail['so_luong'];
                    break;
                }
            }

            $tongSoLuong = $soLuongHienTaiTrongGio + $so_luong;

            // ✅ Kiểm tra nếu vượt quá tồn kho thì không cho thêm
            if ($tongSoLuong > $soLuongTonKho) {
                $_SESSION['error'] = "Số lượng vượt quá tồn kho!00";
                header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=$san_pham_id");
                exit();
            }

            // ✅ Nếu không vượt, thêm hoặc cập nhật số lượng
            $checkSanPham = false;
            foreach ($chiTietGioHang as $detail) {
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
        } else {
            header("Location: " . BASE_URL . "?act=login");
            exit();
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
        header("Location: " . BASE_URL . "?act=login");
        exit();
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
                // ✅ Lấy thông tin sản phẩm để kiểm tra tồn kho
                $sanPham = $this->modelSanPham->getDetailSanPham($sanPhamId);
                $soLuongTonKho = $sanPham['so_luong'];
                

                if ($soLuong > $soLuongTonKho) {
                    $_SESSION['error'] = "Sản phẩm '{$sanPham['ten_san_pham']}' chỉ còn {$soLuongTonKho} sản phẩm trong kho!";
                    header("Location: " . BASE_URL . "?act=gio-hang");
                    exit();
                }

                if ($soLuong <= 0) {
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


//// lien he 

public function lienHe() {
    require_once './views/contact.php'; // This will be the view for your contact page
}

///
public function sendContact() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // You can process the contact data here (e.g., send an email or store in a database)
        // For example, using PHP's mail function:
        $to = "your-email@example.com"; // Your email
        $subject = "New contact from: $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Send email (you can customize this)
        if (mail($to, $subject, $body, $headers)) {
            // If the mail is sent, show a success message
            $_SESSION['success_message'] = "Cảm ơn bạn đã liên hệ với chúng tôi!";
        } else {
            // If the mail fails, show an error message
            $_SESSION['error_message'] = "Đã có lỗi xảy ra. Vui lòng thử lại!";
        }

        // Redirect back to the contact page
        header("Location: " . BASE_URL . "?act=lien-he");
        exit();
    }
}
////

public function themBinhLuan() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_client'])) {
            // Lấy thông tin người dùng và sản phẩm
            $taiKhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $sanPhamId = $_POST['san_pham_id'];
            $noiDung = $_POST['noi_dung'];

            // var_dump($noiDung);die;
            // Thêm bình luận vào cơ sở dữ liệu
            $this->modelSanPham->addBinhLuan($sanPhamId, $taiKhoan['id'], $noiDung);

            // Redirect về trang chi tiết sản phẩm sau khi thêm bình luận
            header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=$sanPhamId");
            exit();
        } else {
            // Nếu người dùng chưa đăng nhập, redirect về trang login
            header("Location: " . BASE_URL . "?act=login");
            exit();
        }
    }
}





/// dang ky
public function dangKy() {
    require_once './models/TaiKhoan.php';
    $taiKhoanModel = new TaiKhoan();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['errors'] = [];

        $ho_ten = $_POST['ho_ten'] ?? '';
        $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
        $ngay_sinh = $_POST['ngay_sinh'] ?? '';
        $email = $_POST['email'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $gioi_tinh = $_POST['gioi_tinh'] ?? '';
        $dia_chi = $_POST['dia_chi'] ?? '';
        $mat_khau = $_POST['mat_khau'] ?? '';

        // Validate dữ liệu
        if (empty($ho_ten)) $_SESSION['errors']['ho_ten'] = 'Vui lòng nhập họ tên';
        if (empty($email)) $_SESSION['errors']['email'] = 'Vui lòng nhập email';
        if (empty($mat_khau)) $_SESSION['errors']['mat_khau'] = 'Vui lòng nhập mật khẩu';
        if (empty($so_dien_thoai)) $_SESSION['errors']['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
        if (empty($ngay_sinh)) $_SESSION['errors']['ngay_sinh'] = 'Vui lòng chọn ngày sinh';
        if (empty($gioi_tinh)) $_SESSION['errors']['gioi_tinh'] = 'Vui lòng chọn giới tính';
        if (empty($dia_chi)) $_SESSION['errors']['dia_chi'] = 'Vui lòng nhập địa chỉ';

        // Check email đã tồn tại
        if (empty($_SESSION['errors']) && $taiKhoanModel->getTaiKhoanFromEmail($email)) {
            $_SESSION['errors']['email'] = 'Email đã được đăng ký';
        }

        // Upload ảnh đại diện
        $target_file = '';
        if (!empty($anh_dai_dien) && $anh_dai_dien['error'] === 0) {
            $target_dir = "./uploads/";
            $target_file = $target_dir . basename($anh_dai_dien["name"]);
            move_uploaded_file($anh_dai_dien["tmp_name"], $target_file);
        } else {
            $_SESSION['errors']['anh_dai_dien'] = 'Vui lòng chọn ảnh đại diện';
        }

        // Nếu không có lỗi -> Lưu DB
        if (empty($_SESSION['errors'])) {
            $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tai_khoans (ho_ten, anh_dai_dien, ngay_sinh, email, so_dien_thoai, gioi_tinh, dia_chi, mat_khau, chuc_vu_id, trang_thai)
                    VALUES (:ho_ten, :anh_dai_dien, :ngay_sinh, :email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau, 2, 1)";
            
            $stmt = $taiKhoanModel->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':anh_dai_dien' => $target_file,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':mat_khau' => $hashedPassword
            ]);

            unset($_SESSION['errors']);
            header("Location: ?act=login"); // chuyển hướng đến trang login
            exit;
        }
    }

    // Load lại view nếu là GET hoặc có lỗi
    require_once './views/dangKy.php';
}



//// dang xuat 



public function dangXuat(){
    if(isset($_SESSION['user_client'])){
        unset($_SESSION['user_client']);
        header("Location: " . BASE_URL );
        exit();
    }
}
///   thanh toan 



////
public function thanhToan() {
    if (isset($_SESSION['user_client'])) {
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

        if (!$gioHang) {
            $gioHangId = $this->modelGioHang->addGioHang($user['id']);
            $gioHang = ['id'=>$gioHangId];
        }

        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        

        // ✅ KIỂM TRA LẠI SỐ LƯỢNG TRƯỚC KHI THANH TOÁN
        foreach ($chiTietGioHang as $item) {
            $sanPham = $this->modelSanPham->getDetailSanPham($item['san_pham_id']);
        
            // Kiểm tra trạng thái
            if ($sanPham['trang_thai'] == 0) {
                $_SESSION['error'] = "Sản phẩm '{$sanPham['ten_san_pham']}' đã ngừng bán!";
                header("Location: " . BASE_URL . "?act=gio-hang");
                exit();
            }
        
            // Kiểm tra tồn kho
            if ($item['so_luong'] > $sanPham['so_luong'])  {
                $_SESSION['error'] = "Sản phẩm '{$sanPham['ten_san_pham']}' chỉ còn {$sanPham['so_luong']} sản phẩm trong kho!";
                header("Location: " . BASE_URL . "?act=gio-hang");
                exit();
            }
        
            // ✅ Sau khi qua kiểm tra mới trừ kho
            $soLuongConLai = $sanPham['so_luong'] - $item['so_luong'];
            $this->modelSanPham->updateSoLuongTonKho($item['san_pham_id'], $soLuongConLai);
        }
        

        require_once './views/thanhToan.php';

    } else {
        header("Location: " . BASE_URL . "?act=login");
        exit();
    }
}

/// 
public function postThanhToan(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);die;
        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
        $ghi_chu = $_POST['ghi_chu'];
        $tong_tien = $_POST['tong_tien'];
        $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

        $ngay_dat = date('Y-m-d');
        // var_dump($ngay_dat);die;
        $trang_thai_id = 1 ;

        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $tai_khoan_id = $user['id'];

        $ma_don_hang = 'DH-' . rand(1000,9999);
        // du lieu vao db
         $donHang = $this->modelDonHang->addDonHang($tai_khoan_id,
                                        $ten_nguoi_nhan,
                                        $email_nguoi_nhan,
                                        $sdt_nguoi_nhan,
                                        $dia_chi_nguoi_nhan,
                                        $ghi_chu,
                                        $tong_tien,
                                        $phuong_thuc_thanh_toan_id,
                                        $ngay_dat,
                                        $ma_don_hang,
                                        $trang_thai_id
            );
            // var_dump('them thanh cong don hang');die;
            // lay thong tin gio hang 
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            
            // luu san pham vao chi tiet don hang 
            if ($donHang) {
                // lay ra toan bo san pham trong gio hang 
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // them tung san pham tu gio hang vao chi tiet don hang
                foreach($chiTietGioHang as $item){
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];  

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,   // id don hang vua tao
                        $item['san_pham_id'],  // id san pham
                        $donGia,   // don gia 
                        $item['so_luong'],  // so luong lay tu san pham 
                        $donGia * $item['so_luong']   // thanh tien

                    );
                }
                // sau  khi them thi tien hanh xoa  san pham gio hang 
                // xoa toan bo san pham trong chi tiet gio hang 
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                // xoa thong tin gio hang nguoi dung 
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                /// them  thanh cong chuyen trang lich su mua hang 
                header("Location: " . BASE_URL . "?act=lich-su-mua-hang");
                exit();
            }else{
                var_dump('Loi dat hang');die;
            }


    }
}

/// 
public function lichSuMuaHang(){
        if (isset($_SESSION['user_client'])) {
            // lay ra thong tin tai khoan dang nhap 
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // lay ra danh sach trang thai don hang 
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            
             // lay ra danh sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');


              // lay ra danh sach tat ca don hang cua tai khoan
              $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
              require_once './views/lichSuMuaHang.php';


        }else{
            var_dump('ban chua dang nhap ');die;
        }
}

///
 
            public function chiTietMuaHang(){
                if (isset($_SESSION['user_client'])) {
                    // lay ra thong tin tai khoan dang nhap 
                    $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                    $tai_khoan_id = $user['id'];
        
                    // lay id don hang chuyen tu url
                    $donHangId =$_GET['id'];
                    // lay ra danh sach trang thai don hang 
                    $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
                    $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
                    
                    // lay ra danh sach phuong thuc thanh toan
                    $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
                    $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

                     // lay ra thong tin don hang theo id
                     $donHang = $this->modelDonHang->getDonHangById($donHangId);

                     // lay thong tin san pham cua don hang trong bang chi tiet don hang 
                     $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);

                    //  echo "<pre>";
                    //  print_r($donHang);
                    //  print_r($chiTietDonHang);

                    if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                        echo "Bạn không có quyền truy cập đơn hàng này.";
                        exit;
                    }
                    require_once './views/chiTietMuaHang.php';
                   
                }else{
                    var_dump('ban chua dang nhap ');die;
                }
            }
    
            

///
 

        public function huyDonHang(){
            if (isset($_SESSION['user_client'])) {
                // lay ra thong tin tai khoan dang nhap 
                $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $tai_khoan_id = $user['id'];
    
                // lay id don hang chuyen tu url
                $donHangId =$_GET['id'];

                // kiem tra don hang 
                $donHang = $this->modelDonHang->getDonHangById($donHangId);

                if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                   echo "Bạn không có quyền huỷ đơn hàng này !!!";
                   exit;
                }

                if ($donHang['trang_thai_id'] != 1) {
                    echo "Đơn hàng ở trạng thái 'Chưa Xác Nhận' mới có thể huỷ !!!";
                    exit;
                 }

                /// huy don hang 
                $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
                header("Location: " . BASE_URL . "?act=lich-su-mua-hang");
                exit();
            }else{
                var_dump('ban chua dang nhap ');die;
            }
        }

///  tim kiem 
 
public function timKiemSanPham() {
    $tuKhoa = $_POST['tu_khoa'] ?? '';

    // Nếu từ khóa rỗng thì quay về trang chủ
    if (trim($tuKhoa) === '') {
        header("Location: " . BASE_URL);
        exit;
    }

    $sanPhamModel = new SanPham();
    $listSanPham = $sanPhamModel->timKiemSanPham($tuKhoa);

    if (!empty($listSanPham)) {
        // Lấy sản phẩm đầu tiên và chuyển đến trang chi tiết
        $idSanPham = $listSanPham[0]['id'];
        header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $idSanPham);
        exit;
    } else {
        // Không tìm thấy sản phẩm nào → có thể đưa ra trang thông báo hoặc về trang chủ
        echo "<script>alert('Không tìm thấy sản phẩm phù hợp'); window.location.href = '" . BASE_URL . "';</script>";
        exit;
    }
}


public function goiYSanPham() {
    $tuKhoa = $_POST['tu_khoa'] ?? '';

    if (trim($tuKhoa) === '') {
        echo json_encode([]);
        exit;
    }

    $sanPhamModel = new SanPham();
    $listSanPham = $sanPhamModel->timKiemSanPham($tuKhoa);

    header('Content-Type: application/json');
    echo json_encode($listSanPham);
    exit;
}








   
}
