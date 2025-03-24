<?php 
class AdminDanhMuc{
    public $conn; 
    public function __construct(){
        $this->conn = connectDB();

    }
    // list
    public function getAllDanhMuc(){
        try {
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }


    //   add

    public function insertDanhMuc($ten_danh_muc,$mo_ta){
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, mo_ta)
            VALUES (:ten_danh_muc, :mo_ta)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta
            ]);

            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // lay id can sau 

    public function getDetailDanhMuc($id){
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
                
            ]);

            return $stmt->fetch();

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }
    // sua 

    public function updateDanhMuc($id,$ten_danh_muc,$mo_ta){
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                'id' => $id,
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta
            ]);

            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }

    // xoa 


    public function destroyDanhMuc($id){
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                'id' => $id
                
            ]);

            return true;

        } catch (Exception $e) {
            echo "Lỗi" . $e ->getMessage();
        }
    }
}
?>