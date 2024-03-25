<?php
    require_once 'BaseModel.php';
    class DetailModel extends BaseModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
         
        public function getFindProduct($id){
            $sql='SELECT p.id, ct.idColor,ct.idSize, c.color, s.size, p.name, p.mota, p.chitiet, p.dacbiet, p.luotxem, p.ngaylap,ct.price, ct.soluongton, ct.image, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct JOIN color c ON c.id = ct.idcolor JOIN size s ON s.id = ct.idsize WHERE p.id = :id';
            $findProduct=$this->connect->getFind($sql,$id);
            return $findProduct;
        }
        public function getFindAllProduct($id){
            $sql='SELECT p.id, ct.idColor,ct.idSize, c.color, s.size, p.name, p.mota, p.chitiet, p.dacbiet, p.luotxem, p.ngaylap,ct.price, ct.soluongton, ct.image, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct JOIN color c ON c.id = ct.idcolor JOIN size s ON s.id = ct.idsize WHERE p.id = :id';
            $findAllProduct=$this->connect->getFindAll($sql,$id);
            return $findAllProduct;
        }
        public function getFindAllSize(){
            $sql='SELECT * FROM size';
            $findProduct=$this->connect->getAllSql($sql);
            return $findProduct;
        }
        public function getFindAllColor(){
            $sql='SELECT * FROM color';
            $findProduct=$this->connect->getAllSql($sql);
            return $findProduct;
        }
        //SELECT p.id, c.color, s.size, p.name, p.mota, p.chitiet, p.dacbiet, p.luotxem, p.ngaylap,ct.price, ct.soluongton, ct.image, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct JOIN color c ON c.id = ct.idcolor JOIN size s ON s.id = ct.idsize WHERE p.id = 1;
        public function getFindSize($id){
            $sql='SELECT p.id, ct.idColor,ct.idSize, s.size FROM product p JOIN ctproduct ct ON p.id = ct.idproduct JOIN color c ON c.id = ct.idcolor JOIN size s ON s.id = ct.idsize WHERE p.id =:id GROUP by s.size;';
            $findProduct=$this->connect->getFind($sql,$id);
            return $findProduct;
        }
        public function getAllProductSpecial() {
            $sql='SELECT DISTINCT p.id, ct.idColor,ct.idSize,p.id, p.name, ct.image, ct.price, ct.giamgia FROM product p JOIN ctproduct ct ON p.id = ct.idproduct where p.dacbiet=1 GROUP BY p.id, p.name, ct.image LIMIT 0, 8;';
            $productSpecial=$this->connect->getAllSql($sql);
            return $productSpecial;
        }
        public function findIdKH($username) {
            $sql = 'SELECT k.makh,k.email FROM khachhang k WHERE k.username = :username';
            $params = [':username' => $username];   
            $result = $this->connect->getOneSql($sql, $params);
            return $result;
        }
        public function insertBinhLuan($idhanghoa,$makh,$content,$star=0){
            $table='binhluan';
            $ngaybl = date('Y-m-d H:i:s');
            $data=[
                'mabl'=>null, 
               'idhanghoa'=>$idhanghoa, 
               'makh'=>$makh, 
               'content'=>$content, 
               'ngaybl'=>$ngaybl,
               'sao'=>$star,
               'isAccept'=>0
            ];
            return $this->connect->insertData($table, $data);
        }
        // bình luận
        public function getBinhLuan($idhanghoa){
            $sql='SELECT b.mabl, b.idhanghoa, b.makh, b.content, b.ngaybl, k.tenkh, k.avatar, b.sao FROM binhluan b JOIN khachhang k ON b.makh = k.makh WHERE b.idhanghoa = :idhanghoa and b.isAccept=1;';
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':idhanghoa', $idhanghoa, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            $rowCount = $stmt->rowCount();         
            return [
                'binhluans' => $result,
                'soluong' => $rowCount,
            ];;
        }
    }
?>