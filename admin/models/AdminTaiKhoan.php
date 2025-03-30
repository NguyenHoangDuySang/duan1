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



}
?>