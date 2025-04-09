<?php
class SanPham{
    public $conn ; // khai bao phuong thuc 

    public function __construct(){
        $this->conn = connectDB();
    }
    // viet ham lay toan bo danh sach san pham 
    public function getAllSanPham(){
        try {
            $sql = 'SELECT  san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    ///

    
    public function getDetailSanPham($id){
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // album anh san pham 

    public function getListAnhSanPham($id){
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }


    
    // //
     //  binh luan 
    
    

    ///
    public function getListSanPhamDanhMuc($danh_muc_id){
        try {
            $sql = 'SELECT  san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = '. $danh_muc_id ;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }


    ///

    public function addBinhLuan($sanPhamId, $taiKhoanId, $noiDung) {
        try {
            $sql = 'INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                    VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, NOW(), 1)';
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $sanPhamId,
                ':tai_khoan_id' => $taiKhoanId,
                ':noi_dung' => $noiDung
            ]);
        
            // Kiểm tra ID bình luận mới được thêm
            $lastInsertId = $this->conn->lastInsertId();
            error_log("Bình luận đã được thêm, ID: $lastInsertId"); // Ghi vào log
            return $lastInsertId; // Trả về ID của bình luận mới thêm
        } catch (Exception $e) {
            error_log("Lỗi khi thêm bình luận: " . $e->getMessage()); // Ghi vào log nếu có lỗi
        }
    }
    

    ////
    public function getBinhLuanFromSanPham($id) {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
                    FROM binh_luans
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.san_pham_id = :id AND binh_luans.trang_thai = 1';
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
        
            $binhLuans = $stmt->fetchAll();
            
            // Kiểm tra kết quả trả về
            // var_dump($binhLuans); // In ra tất cả các bình luận
            
            return $binhLuans;
        } catch (Exception $e) {
            error_log("Lỗi khi lấy bình luận: " . $e->getMessage()); // Ghi vào log nếu có lỗi
        }
    }
    
    

    public function timKiemSanPham($keyword)
    {
        $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    






}
?>