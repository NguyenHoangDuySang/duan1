<?php 
class AdminTaiKhoan{
    public $conn; 
    public function __construct(){
        $this->conn = connectDB();

    }
    // list 
    public function getAllTaiKhoan($chuc_vu_id){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';
            

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // add 

    public function insertTaiKhoan($ho_ten, $email, $so_dien_thoai, $password, $chuc_vu_id){
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id)
            VALUES (:ho_ten, :email, :so_dien_thoai, :password, :chuc_vu_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id
                
            ]);

            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // sua 

    public function getDetailTaiKhoan($id){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
                
            ]);

            return $stmt->fetch();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // 

    public function updateTaiKhoan( $id, $ho_ten, $email, $so_dien_thoai, $trang_thai){
        try {
            $sql = ' UPDATE tai_khoans 
                     SET 
                     ho_ten = :ho_ten,
                     email = :email,
                     so_dien_thoai = :so_dien_thoai,
                     trang_thai = :trang_thai
                     
                     WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $id // Thêm dòng này để tránh lỗi thiếu tham số
                
                
            ]);

            
            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }
    

    /// resetPasswor 

    public function resetPassword( $id, $mat_khau){
        try {
            $sql = ' UPDATE tai_khoans 
                     SET 
                     mat_khau = :mat_khau 
                     WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id // Thêm dòng này để tránh lỗi thiếu tham số
                
                
            ]);

            
            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }
    

     // updateTaiKhoan  khach hang 

     public function updateKhachHang( $id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai){
        try {
            $sql = ' UPDATE tai_khoans 
                     SET 
                     ho_ten = :ho_ten,
                     email = :email,
                     so_dien_thoai = :so_dien_thoai,
                     ngay_sinh = :ngay_sinh,
                     gioi_tinh = :gioi_tinh,
                     dia_chi = :dia_chi,
                     trang_thai = :trang_thai
                     
                     WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
                ':id' => $id // Thêm dòng này để tránh lỗi thiếu tham số
                
                
            ]);

            
            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }


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
                } elseif ($user['chuc_vu_id'] == 1) {
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


    /// logout admin
    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [':email' => $email]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

   
    




}
?>