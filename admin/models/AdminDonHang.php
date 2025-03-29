<?php 
class AdminDonHang{
    public $conn; 
    public function __construct(){
        $this->conn = connectDB();

    }
    // list
    public function getAllDonHang(){
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
            

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }


    // detail don hang 
    public function getDetailDonHang($id){
                try {
                    $sql = 'SELECT don_hangs.*, 
                                    trang_thai_don_hangs.ten_trang_thai, 
                                    tai_khoans.ho_ten, 
                                    tai_khoans.email, 
                                    tai_khoans.so_dien_thoai,
                                    phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    
                    WHERE don_hangs.id = :id';
        
                    $stmt = $this->conn->prepare($sql);
        
                    $stmt->execute([':id' => $id]);
        
                    return $stmt->fetch();
        
                } catch (Exception $e) {
                    echo "Lỗi" . $e ->getMessage();
                }
            }


///  ///


public function getListSpDonHang($id){
    try {
        $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
        FROM chi_tiet_don_hangs
        INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
        WHERE chi_tiet_don_hangs.don_hang_id = :id';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetchAll();

    } catch (Exception $e) {
        echo "Lỗi" . $e ->getMessage();
    }
}
    
//  trang thai don hang 

public function getAllTrangThaiDonHang(){
    try {
        $sql = 'SELECT * FROM trang_thai_don_hangs
        ';
        

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

    } catch (Exception $e) {
        echo "Lỗi" . $e ->getMessage();
    }
}

//     //   add

//     public function insertDonHang($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
//         try {
//             $sql = 'INSERT INTO don_hangs (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh)
//             VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([
//                 ':ten_san_pham' => $ten_san_pham,
//                 ':gia_san_pham' => $gia_san_pham,
//                 ':gia_khuyen_mai' => $gia_khuyen_mai,
//                 ':so_luong' => $so_luong,
//                 ':ngay_nhap' => $ngay_nhap,
//                 ':danh_muc_id' => $danh_muc_id,
//                 ':trang_thai' => $trang_thai,
//                 ':mo_ta' => $mo_ta,
//                 ':hinh_anh' => $hinh_anh,
                
//             ]);

//             // lay id san pham vua them 
//             return $this->conn->lastInsertId();

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }

//     // insertAlbumhinhsanh 

//     public function insertAlbumAnhDonHang($san_pham_id, $link_hinh_anh){
//         try {
//             $sql = 'INSERT INTO hinh_anh_don_hangs (san_pham_id, link_hinh_anh)
//             VALUES (:san_pham_id, :link_hinh_anh)';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([
//                 ':san_pham_id' => $san_pham_id,
//                 ':link_hinh_anh' => $link_hinh_anh
                    
//             ]);

//             // lay id san pham vua them 
//             return true;

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }

//     // // lay id can sau 

//     public function getDetailDonHang($id){
//         try {
//             $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_danh_muc
//             FROM don_hangs
//             INNER JOIN trang_thai_don_hangs ON don_hangs.danh_muc_id = trang_thai_don_hangs.id
            
//             WHERE don_hangs.id = :id';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([':id' => $id]);

//             return $stmt->fetch();

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }

//     // album anh san pham 

//     public function getListAnhDonHang($id){
//         try {
//             $sql = 'SELECT * FROM hinh_anh_don_hangs WHERE san_pham_id = :id';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([':id' => $id]);

//             return $stmt->fetchAll();

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }


    
//     // // sua 

//     public function updateDonHang($san_pham_id,$ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
//         try {
//             $sql = ' UPDATE don_hangs 
//                      SET 
//                      ten_san_pham = :ten_san_pham,
//                      gia_san_pham = :gia_san_pham,
//                      gia_khuyen_mai = :gia_khuyen_mai,
//                      so_luong = :so_luong,
//                      ngay_nhap = :ngay_nhap,
//                      danh_muc_id = :danh_muc_id,
//                      trang_thai = :trang_thai,
//                      mo_ta = :mo_ta,
//                      hinh_anh = :hinh_anh
//                      WHERE id = :id';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([
//                 ':ten_san_pham' => $ten_san_pham,
//                 ':gia_san_pham' => $gia_san_pham,
//                 ':gia_khuyen_mai' => $gia_khuyen_mai,
//                 ':so_luong' => $so_luong,
//                 ':ngay_nhap' => $ngay_nhap,
//                 ':danh_muc_id' => $danh_muc_id,
//                 ':trang_thai' => $trang_thai,
//                 ':mo_ta' => $mo_ta,
//                 ':hinh_anh' => $hinh_anh,
//                 ':id' => $san_pham_id
                
//             ]);

//             // lay id san pham vua them 
//             return true;

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }


//     ///   


//     public function getDetailAnhDonHang($id){
//         try {
//             $sql = 'SELECT * FROM hinh_anh_don_hangs WHERE id = :id';

//             $stmt = $this->conn->prepare($sql);

//             $stmt->execute([':id' => $id]);

//             return $stmt->fetch();

//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }

// ////
 
// public function updateAnhDonHang($id,$new_file){
//     try {
//         $sql = ' UPDATE hinh_anh_don_hangs 
//                  SET 
//                  link_hinh_anh = :new_file
                 
                 
//                  WHERE id = :id';

//         $stmt = $this->conn->prepare($sql);

//         $stmt->execute([
//             ':new_file' => $new_file,
//             ':id' => $id,
            
            
//         ]);

//         // lay id san pham vua them 
//         return true;

//     } catch (Exception $e) {
//         echo "Lỗi" . $e ->getMessage();
//     }
// }

// /// xoa anh 

// public function destroyAnhDonHang($id){
//     try {
//         $sql = 'DELETE FROM hinh_anh_don_hangs WHERE id = :id';

//         $stmt = $this->conn->prepare($sql);

//         $stmt->execute([
//             'id' => $id
            
//         ]);

//         return true;

//     } catch (Exception $e) {
//         echo "Lỗi" . $e ->getMessage();
//     }
// }
//     // xoa tat ca 

//     public function destroyDonHang($id){
//         try {
//             $sql = 'DELETE FROM don_hangs WHERE id = :id';
    
//             $stmt = $this->conn->prepare($sql);
    
//             $stmt->execute([
//                 'id' => $id
                
//             ]);
    
//             return true;
    
//         } catch (Exception $e) {
//             echo "Lỗi" . $e ->getMessage();
//         }
//     }


   
}
?>