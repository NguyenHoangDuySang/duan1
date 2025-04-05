<?php 
class TaiKhoan{
    public $conn; 
    public function __construct(){
        $this->conn = connectDB();

    }
    ///
    /// check logiin 

    public function checkLogin($email, $mat_khau){
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                // start session
                session_start();
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'ho_ten' => $user['ho_ten'],
                    'email' => $user['email'],
                    'chuc_vu_id' => $user['chuc_vu_id'],
                    'trang_thai' => $user['trang_thai'],
                    'ngay_sinh' => $user['ngay_sinh'],
                    'so_dien_thoai' => $user['so_dien_thoai'],
                    'gioi_tinh' => $user['gioi_tinh'],
                    'dia_chi' => $user['dia_chi'],
                    'anh_dai_dien' => $user['anh_dai_dien']
                ];

                // 
                if ($user['chuc_vu_id'] == 2) {
                    header('Location: ' . BASE_URL);
                    exit(); 
                } elseif ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; 
                    } else {
                        return "Tài khoản bị cấm . Vui lòng liên hệ quản trị viên.";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Bạn nhập sai email hoặc mật khẩu ";
            }
        } catch (\Exception $e) {
           echo "Lỗi" . $e->getMessage();
           return false;
        }
    }


}
    